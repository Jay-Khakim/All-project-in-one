<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Message;

class ContactController extends Controller
{
    public function submit(ContactRequest $request){
        // dd($request->input('email'));
        $message = new Message();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');
        $message->save();

        return redirect()->route('home')->with('success', 'Message has been sent!');
    }

    public function getMessages(){
        $messages = Message::all();
        // dd($messages);
        return view('messages', ['messages'=> $messages]);
    }
}
