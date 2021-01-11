<?php

use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

// Client
Route::get('/', 'ClientController@home');
Route::get('/shop', 'ClientController@shop');
Route::get('/panier', 'ClientController@panier');
Route::get('/client_login', 'ClientController@client_login');
Route::get('/signup', 'ClientController@signup');
Route::get('/paiement', 'ClientController@paiement');
Route::get('/select_par_cat/{id}', 'ClientController@select_par_cat');

// Admin
Route::get('/admin', 'AdminController@dashboard');
Route::get('/commandes', 'AdminController@commandes');

// Catégories / Plateformes
Route::get('/ajoutercategorie', 'CategoryController@ajoutercategorie');
Route::post('sauvercategorie', 'CategoryController@sauvercategorie');
Route::get('/categories', 'CategoryController@categories');
Route::get('/edit_categorie/{id}', 'CategoryController@edit_categorie');
Route::post('/modifiercategorie', 'CategoryController@modifiercategorie');
Route::get('/supprimercategorie/{id}', 'CategoryController@supprimercategorie');

// Porduits / Jeux
Route::get('/ajouterproduit', 'ProductController@ajouterproduit');
Route::post('/sauverproduit', 'ProductController@sauverproduit');
Route::get('/produits', 'ProductController@produits');
Route::get('/edit_produit/{id}', 'ProductController@edit_produit');
Route::post('/modifierproduit', 'ProductController@modifierproduit');
Route::get('/supprimerproduit/{id}', 'ProductController@supprimerproduit');
Route::get('/activer_produit/{id}', 'ProductController@activer_produit');
Route::get('/desactiver_produit/{id}', 'ProductController@desactiver_produit');