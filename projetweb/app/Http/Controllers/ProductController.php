<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function ajouterproduit()
    {
        $categories = Category::all();
        return view('admin.ajouterproduit')->with('categories', $categories);
    }

    public function sauverproduit(Request $request)
    {
        $this->validate($request, ['product_name' => 'required|unique:products', 'product_price' => 'required', 'product_code' => 'required', 'product_quantite' => 'required', 'product_image' => 'image|nullable|max:1999']);
        if($request->hasFile('product_image')){
            // 1 : get file name with ext
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            // 2 : get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // 3 : get just file ext
            $extension = $request->file('product_image')->getClientOriginalExtension();
            // 4 : file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // 5 : upload l'image
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }
        $product = new Product();
        $product->product_name=$request->input('product_name');
        $product->product_description=$request->input('product_description');
        $product->product_price = $request->input('product_price');
        $product->product_code = $request->input('product_code');
        $product->product_quantite = $request->input('product_quantite');
        $product->product_image = $fileNameToStore;
        $product->status = 1;

        $product->save();
        
        $product->categories()->attach($request->input('categories'));

        return redirect('/ajouterproduit')->with('status', 'Le produit '.$product->product_name.' a été ajouté avec succès');
    }

    public function produits()
    {
        $produits= Product::get();
        return view('admin.produits')->with('produits', $produits);
    }

    public function edit_produit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.editproduit')->with('product', $product)->with('categories', $categories);
    }

    public function modifierproduit(Request $request)
    {
        $this->validate($request, ['product_name' => 'required', 'product_price' => 'required', 'product_code' => 'required', 'product_quantite' => 'required', 'product_image' => 'image|nullable|max:1999']);

        $product = Product::find($request->input('id'));
        $product->product_name=$request->input('product_name');
        $product->product_description=$request->input('product_description');
        $product->product_price = $request->input('product_price');
        $product->product_code = $request->input('product_code');
        $product->product_quantite = $request->input('product_quantite');

        if($request->hasFile('product_image')){
            // 1 : get file name with ext
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
            // 2 : get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // 3 : get just file ext
            $extension = $request->file('product_image')->getClientOriginalExtension();
            // 4 : file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // 5 : upload l'image
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);

            if($product->product_image != 'noimage.jpg')
            {
                Storage::delete('public/product_images/'.$product->image);
            }

            $product->product_image = $fileNameToStore;
        }

        $product->update();
        $product->categories()->attach($request->input('categories'));
        $product->categories()->detach();
        $product->categories()->attach($request->input('categories'));
        $product->update();

        return redirect('/produits')->with('status', 'Le produit '.$product->product_name.' a été modifié avec succès');
    }
}
