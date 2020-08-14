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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/{cat}', 'ProductController@showCategory')->name('showCategory');
Route::get('/{alias}/{product_id}', 'ProductController@show')->name('showProduct');

Route::get('/cart', function(){
  return view('home.cart');
})->name('cart');

Route::get('/categories', function () {
    return view('home.categories');
})->name('categories');

Route::get('/checkout', function () {
    return view('home.checkout');
})->name('checkout');

Route::get('/contact', function () {
    return view('home.contact');
})->name('contact');

Route::get('/product', function () {
    return view('home.product');
})->name('product');
