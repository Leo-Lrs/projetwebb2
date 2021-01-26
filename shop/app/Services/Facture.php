<?php
namespace App\Services;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
class Facture
{
    public function create(Order $order, $paid = false)
    {
        $order->load('adresses', 'products', 'user');
        // Adresse de facturation
        $addressOrder = $order->adresses->first();
        $text = $addressOrder->address;
        if($addressOrder->addressbis) {
            $text .= "\n" . $addressOrder->addressbis;
        }
        $invoice = [
            'kind' => 'vat',
            'test' => config('invoice.test') ? 'true' : 'false',
            'title' => 'Commande référence ' . $order->reference,
            'buyer_street' => $text,
            'buyer_post_code' => $addressOrder->postal,
            'buyer_city' => $addressOrder->city,
            'buyer_company' => $addressOrder->professionnal ? '1' : '0',
            'buyer_email' => $order->user->email,
            'buyer_phone' => $addressOrder->phone,
            'payment_type' => $order->payment_text,
            'payment_to' => now()->endOfMonth()->addMonth()->format('Y-m-d'),
            'status' => $paid ? 'Payé' : 'Créé',
        ];
        // Bon de commande éventuel
        if($order->payment === 'mandat') {
            $invoice['oid'] = $order->purchase_order;
        }
        // Si la facture a été payée
        if($paid) {
            //$invoice['paid_date'] = now()->format('Y-m-d');
            $invoice['paid'] = $order->totalOrder;
        }
        // Si c'est un professionnel
        if($addressOrder->professionnal) {
            $invoice['buyer_name'] = "$addressOrder->company";
            if(isset($addressOrder->name)) {
                $invoice['buyer_first_name'] = $addressOrder->firstname;
                $invoice['buyer_last_name'] = $addressOrder->name;  
            } else {
                $invoice['buyer_first_name'] = $order->user->firstname;
                $invoice['buyer_last_name'] = $order->user->name;     
            }
        } else {
            //$invoice['buyer_name'] = "$addressOrder->name $addressOrder->firstname";
            $invoice['buyer_first_name'] = $addressOrder->firstname;
            $invoice['buyer_last_name'] = $addressOrder->name;
        }
        // Adresse et boîte postale
        $text = $addressOrder->address;
        if($addressOrder->addressbis) {
            $text .= " " . $addressOrder->addressbis;
        }
        if($addressOrder->bp) {
            $text .= " " . $addressOrder->bp;
        }
        $invoice['buyer_street'] = $text;
        // Produits
        $positions = [];
        foreach($order->products as $product) {
            array_push($positions, [
                'name' => $product->name,
                'quantity' => $product->quantity,
                'total_price_gross' => $product->total_price_gross,
                'code' => $product->code,
            ]);
        }
        $invoice['positions'] = $positions;
        // Envoi
        return Http::post(config('invoice.url') . 'invoices.json', [
            'api_token' => config('invoice.token'),
            'invoice' => $invoice,
        ]);
    }
}