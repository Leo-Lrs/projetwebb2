<?php

namespace App\Http\Controllers;

use App\Models\{ Product, Page, Category };
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show home page
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input("search");
        if ($search) {
            $products = Product::where('name', 'like', '%' . $search . '%')
            ->paginate(10);
        } else {
            $products = Product::whereActive(true)->paginate(10);
        }

        $categories = Category::all();
        return view('home', compact('products', 'categories'))->with('products', $products);
    }

    public function category($id)
    {
        $products = Product::whereActive(true)->get();
        $categories = Category::find($id);
        $category = $categories->slug;
        // dd($category);
        $products = Product::where('category_id', $id)->get();
        return view('home', compact('products', 'category'));
    }

    public function page(Page $page)
    {
        return view('page', compact('page'));
    }
}
