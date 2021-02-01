<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ { Address, Shop, State, Product, User, Page };
use App\Mail\{ NewOrder, Ordered, ProductAlert };
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Notifications\NewOrder as NewOrderNotification;
use Barryvdh\DomPDF\PDF;
use Swift_TransportException;
use Cart;

class OrderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {        
        $addresses = $request->user()->addresses()->get();
        if($addresses->isEmpty()) {
            return redirect()->route('adresses.create')->with('message', 'Vous devez créer au moins une adresse pour pouvoir passer une commande.');
        }

        $user = $request->user();
        $content = Cart::getContent();
        $total = Cart::getTotal();
        
        return view('command.index', compact('user', 'addresses', 'content', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Vérification du stock
        $items = Cart::getContent();
        foreach($items as $row) {
            $product = Product::findOrFail($row->id);
            if($product->quantity < $row->quantity) {
                $request->session()->flash('message', 'Nous sommes désolés mais le produit "' . $row->name . '" ne dispose pas d\'un stock suffisant pour satisfaire votre demande. Il ne nous reste plus que ' . $product->quantity . ' exemplaires disponibles.');
                return back();
            }
        }

        // Client
        $user = $request->user();

        // Facturation
        $address_facturation = Address::findOrFail($request->facturation);

        // Enregistrement commande
        $order = $user->orders()->create([
            'reference' => strtoupper(Str::random(8)),
            'total' => Cart::getTotal(),
            'payment' => $request->payment,
            'state_id' => State::whereSlug($request->payment)->first()->id,
        ]);


        // Enregistrement adresse de facturation
        $order->adresses()->create($address_facturation->toArray());

        // Enregistrement des produits
        foreach($items as $row) {
            $order->products()->create(
                [
                    'name' => $row->name,
                    'total_price_gross' => ($row->price * $row->quantity),
                    'quantity' => $row->quantity,
                    'code' => $row->code,
                ]
            );        
            // Mise à jour du stock
            $product = Product::findOrFail($row->id);
            $product->quantity -= $row->quantity;
            $product->save();
            // Alerte stock
            if($product->quantity <= $product->quantity_alert) {
                $shop = Shop::firstOrFail();
                $admins = User::whereAdmin(true)->get();
                foreach($admins as $admin) {
                    Mail::to($admin)->send(new ProductAlert($shop, $product));
                }
            }
        }

        // On vide le panier
        Cart::clear();
        Cart::session($request->user())->clear();
        
        // Notification au client
        $shop = Shop::firstOrFail();
        $page = Page::whereSlug('conditions-generales-de-vente')->first();
        // dd($request);
        Mail::to($request->user())->send(new Ordered($shop, $order, $page));
        
        // Notification à l'administrateur
        $shop = Shop::firstOrFail();
        $admins = User::whereAdmin(true)->get();
        foreach($admins as $admin) {
            Mail::to($admin)->send(new NewOrder($shop, $order, $user));
            $admin->notify(new NewOrderNotification($order));
        }        
                

        return redirect(route('commandes.confirmation', $order->id));
    }
}