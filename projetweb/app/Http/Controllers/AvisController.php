<?php

namespace App\Http\Controllers;

use App\Avis;
use App\Product;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function ajouter_avis($id)
    {
        $product = Product::find($id);

        return view("client.ajouter_avis")->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sauver_avis(Request $request)
    {
        $avis = new Avis();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Avis  $avis
     * @return \Illuminate\Http\Response
     */
    public function show(Avis $avis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Avis  $avis
     * @return \Illuminate\Http\Response
     */
    public function edit(Avis $avis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Avis  $avis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avis $avis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Avis  $avis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avis $avis)
    {
        //
    }
}
