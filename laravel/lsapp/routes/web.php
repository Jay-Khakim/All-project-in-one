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

Route::get('/', 'PagesController@index' );
Route::get('/about', 'PagesController@about' );
Route::get('/services', 'PagesController@services' );

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function () {
//     return "<h1>HEllo there</h1>";
// });

// Route::get('/about', function () {
//     return view('pages.about');
// });

// Route::get('/users/{id}', function ($id) {
//     return "THis is user ".$id;
// });

// Route::get('/users/{id}/{name}', function ($id, $name) {
//     return "THis is user ".$name." with an id of ".$id;
// });


Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
