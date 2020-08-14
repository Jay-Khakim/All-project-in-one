<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
      // $products = Product::where('id', 5)->first();
      // dd($products);
      // foreach ($products as $product) {
      //   echo "Title: ".$product->title;
      //   echo "<br>";
      //   echo "Title: ".$product->price."$";
      //   echo "<br>";
      //   echo "-------------------------";
      //   echo "<br>";
      // }
      // dd($products);
      $products = Product::orderBy('created_at')->take(8)->get();
      return view('home.index',[
        'products'=>$products
      ]);
    }

}
