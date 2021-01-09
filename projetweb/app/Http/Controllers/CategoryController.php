<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function ajoutercategorie()
    {
        return view('admin.ajoutercategorie');
    }

    public function sauvercategorie(Request $request)
    {
        $this->validate($request, ['category_name' => 'required']);

        $categorie = new Category();

        $categorie->category_name = $request->input('category_name');

        $categorie->save();

        return redirect('/ajoutercategorie')->with('status', 'La catégorie '.$categorie->category_name.' a été ajouté avec succès');
    }

    public function categories()
    {
        $categories = Category::get();
        return view('admin.categories')->with('categories', $categories);
    }
}
