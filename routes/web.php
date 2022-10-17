<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('produit/{id}', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
Route::get('/admindashbord', [App\Http\Controllers\HomeController::class, 'admindashbord'])->name('admindashbord');


// produits
Route::get('/produit', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/produit/cree', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('/produit/save', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');



// articles
Route::get('/articles', [App\Http\Controllers\ArticlesController::class, 'index'])->name('articles.index');
Route::get('/articles/cree', [App\Http\Controllers\ArticlesController::class, 'create'])->name('articles.create');
Route::post('/articles/save', [App\Http\Controllers\ArticlesController::class, 'store'])->name('articles.store');



// categories
Route::get('/categories', [App\Http\Controllers\CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/cree', [App\Http\Controllers\CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [App\Http\Controllers\CategorieController::class, 'store'])->name('categories.store');



// souscategories
Route::get('/soucategories', [App\Http\Controllers\SouscategorieController::class, 'index'])->name('souscategories.index');
Route::get('/souscategories/cree', [App\Http\Controllers\SouscategorieController::class, 'create'])->name('souscategories.create');
Route::post('/souscategories/store', [App\Http\Controllers\SouscategorieController::class, 'store'])->name('souscategories.store');



// marques
Route::get('/marques', [App\Http\Controllers\MarqueController::class, 'index'])->name('marques.index');
Route::get('/marques/cree', [App\Http\Controllers\MarqueController::class, 'create'])->name('marques.create');
Route::post('/marques/store', [App\Http\Controllers\MarqueController::class, 'store'])->name('marques.store');

// panier
Route::get('cart', [App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [App\Http\Controllers\CartController::class, 'clearAllCart'])->name('cart.clear');