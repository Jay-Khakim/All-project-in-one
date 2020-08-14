<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getHome(){
        return view('home');
    }

    public function getContactPage(){
        return view('contact');
    }

    public function getAboutPage(){
        return view('about');
    }
}
