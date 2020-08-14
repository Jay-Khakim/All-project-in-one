<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  // $categories = Category::orderBy('id')->get();
  //
  // View::share([
  //   'categories'->$categories
  // ]);

  public function category(){
    $categories = Category::orderBy('id')->get();
    return view('home.category', ['categories'->$categories]);
  }
}
