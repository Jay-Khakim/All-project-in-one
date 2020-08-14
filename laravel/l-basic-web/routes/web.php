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
    //     return view('home');
    // })->name('home');
    
    // Route::get('/home', function () {
        //     return view('home');
        // });
        
        // Route::get('/contact', function () {
            //     return view('contact');
            // })->name('contact');
            // Route::get('/about', function () {
                //     return view('about');
                // })->name('about');
                
                // Route::post('contact/submit', function(){
                    //     // return Request::all();(
                        //     // dd( Request::all());   //Dump and die
                        // })->name('contact-form-submit');
Route::get('/', 'PagesController@getHome')->name('home');

Route::get('/contact', 'PagesController@getContactPage')->name('contact');

Route::get('/about', 'PagesController@getAboutPage')->name('about');

Route::post('contact/submit', 'ContactController@submit')->name('contact-form-submit');

Route::get('messages', 'ContactController@getMessages')->name('get-messages');