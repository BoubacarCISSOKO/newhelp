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


// produits
Route::get('/produit', [App\Http\Controllers\ProductController::class, 'create'])->name('products.index');
Route::get('/produit/cree', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('/produit/save', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');


// categories
Route::get('/categories', [App\Http\Controllers\CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/cree', [App\Http\Controllers\CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [App\Http\Controllers\CategorieController::class, 'store'])->name('categories.store');
