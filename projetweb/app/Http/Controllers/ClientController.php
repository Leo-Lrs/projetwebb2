<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use Stripe\Stripe;
use App\Client;
use App\Mail\SendMail;

class ClientController extends Controller
{
    public function home()
    {
        $produits = Product::where('status', 1)->get();

        return view('client.home')->with('produits', $produits);
    }

    public function shop()
    {
        $categories = Category::get();
        $produits = Product::where('status', 1)->get();

        return view('client.shop')->with('categories', $categories)->with('produits', $produits);
    }

    public function select_par_cat(Product $produits, Category $categories, $name)
    {
        $categories = Category::get();
        $produits = Product::select('product_name', 'product_image', 'product_price')
            ->join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', $name)
            ->where('status', 1)
            ->get();

        return view('client.shop', ['produits' => $produits], ['categories' => $categories]);
    }

    public function ajouter_panier($id)
    {
        $produit = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($produit, $id);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/shop');
    }

    public function panier()
    {
        if (!Session::has('cart')) {
            return view('client.cart');
        }

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        return view('client.cart', ['products' => $cart->items]);
    }

    public function modifier_panier(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateQty($id, $request->quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect::to('/panier');
    }

    public function retirer_produit($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect('/panier');
    }

    public function paiement()
    {
        if (!Session::has('client')) {
            return view('client.login');
        }


        if (!Session::has('cart')) {
            return view('client.cart');
        }

        return view('client.checkout');
    }

    public function payer(Request $request)
    {
        if (!Session::has('cart')) {
            return view('client.cart');
        }

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_51I8PHdINTTLhKietMAjMcQJJOq876CCV3bcYxNQ1CH39mBWSe2DlhMnYOkWMhbouBmEhPtrN2KwM0tlyXV5F42Js00TKnxFCrt');

        try {

            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "eur",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));

            $order = new Order;

            $order->nom = $request->input('firstname');
            $order->adresse = $request->input('adress');
            $order->panier = serialize($cart);
            $order->payment_id = $charge->id;

            $order->save();

            $orders = Order::where('payment_id', $charge->id)->get();

            $orders->transform(function ($order, $key) {
                $order->panier = unserialize($order->panier);

                return $order;
            });

            $email = Session::get('client')->email;

            Mail::to($email)->send(new SendMail($orders));

        } catch (\Exception $e) {
            Session::put('error', $e->getMessage());
            return redirect('/paiement');
        }

        Session::forget('cart');
        //Session::put('success', 'Purchase accomplished successfully !');
        return redirect('/panier')->with('status', 'Achat accompli avec succès');
    }

    public function creer_compte(Request $request)
    {
        $this->validate($request, ['email' => 'email|required|unique:clients', 'password' => 'required|min:6']);

        $client = new Client();
        $client->email = $request->input('email');
        $client->password = bcrypt($request->input('password'));

        $client->save();

        return back()->with('status', 'Votre compte a été crée avec succès');
    }

    public function acceder_compte(Request $request)
    {
        $this->validate($request, ['email' => 'email|required', 'password' => 'required']);

        $client = Client::where('email', $request->input('email'))->first();

        if ($client) {
            if (Hash::check($request->input('password'), $client->password)) {
                Session::put('client', $client);
                return redirect('/shop');
            } else {
                return back()->with('status', 'Mauvais mot de passe ou email');
            }
        } else {
            return back()->with('status', "Vous n'avez pas de compte");
        }
    }

    public function logout()
    {
        Session::forget('client');

        return back();
    }

    public function client_login()
    {
        return view('client.login');
    }

    public function signup()
    {
        return view('client.signup');
    }
}
