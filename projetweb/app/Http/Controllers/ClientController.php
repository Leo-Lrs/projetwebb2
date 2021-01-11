<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ClientController extends Controller
{
    public function home()
    {
        $produits = Product::where('status',1)->get();
        
        return view('client.home')->with('produits', $produits);
    }

    public function shop()
    {
        $categories = Category::get();
        $produits = Product::where('status',1)->get();
        
        return view('client.shop')->with('categories', $categories)->with('produits', $produits);
    }

    public function select_par_cat(Product $produits, Category $categories, $name)
    {
        $categories = Category::get();
        //$produits = Product::whereid('category_id', $id)->where('status', 1)->get();
        $produits = Product::select('product_name', 'product_image', 'product_price')
        ->join('category_product', 'products.id', '=', 'category_product.product_id')
        ->where('category_product.category_id', $name)
        ->where('status', 1)
        ->get();

        return view('client.shop', ['produits' => $produits], ['categories' => $categories]);
    }

    public function panier()
    {
        return view('client.cart');
    }

    public function client_login()
    {
        return view('client.login');
    }

    public function signup()
    {
        return view('client.signup');
    }

    public function paiement()
    {
        return view('client.checkout');
    }
}
