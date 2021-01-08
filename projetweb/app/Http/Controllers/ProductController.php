<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ajouterproduit()
    {
        return view('admin.ajouterproduit');
    }

    public function sauverproduit(Request $request)
    {

    }
}
