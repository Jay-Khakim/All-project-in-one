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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post(
  '/contact/all/{id}/update',
   "ContactController@updateMessageSubmit"
   )->name('contact-update-submit');

Route::get(
  '/contact/all/{id}/update',
   "ContactController@updateMessage"
   )->name('contact-update');

Route::get('/contact/all/{id}', "ContactController@showOneMessage")->name('contact-data-one');
Route::get('/contact/all', "ContactController@allData")->name('contact-data');
Route::post('/contact/submit', "ContactController@submit")->name('contact-form');
