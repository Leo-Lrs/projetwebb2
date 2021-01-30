<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ { Address };
use Cart;

class DetailsController extends Controller
{
    /**
     * Show the order details
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {        
        // Panier
        $content = Cart::getContent();
        $total = Cart::getTotal();              
        return response()->json([ 
            'view' => view('command.partials.detail', compact('content', 'total'))->render(), 
        ]);
    }
}
