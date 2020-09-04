<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactMessageController extends Controller
{
    public function create(){
        return view('contact');
    }

    public function store(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            "message" => 'required'
        ]);

        Mail::send('emails.contact-message', [
            'msg' =>$request->message
        ], function ($mail) use($request){
            $mail-> from($request->email, $request->name);

            $mail -> to('mgmediajay@gmail.com')->subject('Contact to mgmedi');
        });

        return redirect()->back()->with('flash_message', 'Thank you for you message');
    }

}
