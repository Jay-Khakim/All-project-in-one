<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $req){
      // dd($req);
      // dd($req->input('subject'));
      // $validation = $req -> validate([
      //   "subject"=>'required|min:5|max:50',
      //   "message" => 'required|min:15|max:500'
      // ]);
      $contact =new Contact();
      $contact->name =$req->input('name');
      $contact->email =$req->input('email');
      $contact->subject =$req->input('subject');
      $contact->message =$req->input('message');

      $contact ->save();

      return redirect()->route('home')->with('success',  'Message has been sent!');
    }

    public function allData(){
      $contact = new Contact;

      // 1st option
      // $contact =new Contact;
      // dd($contact->all());

      // 2nd option
      // $contact = Contact::all();
      // dd($contact);

      // 3rd option
      // dd(Contact::all());

      // return view('messages',['data' => Contact::all()->orderBy('id', 'desc')]);
      // return view('messages',['data'=>$contact->orderBy('id', 'asc')->skip(1)->take(1)->get()]);
      // return view('messages',['data'=>$contact->where('subject', '<>', 'Testing')->get()]);
      // '<>' SQL operator  is the operator as '!=' with the meaning as not equal
      return view('messages',['data'=>$contact->all()]);

    }
    // public function allDate(){
      // $contact = new Contact;
      // return view ('messages', ['data' =>[$contact->find(2)]]); //This line for displaying only one data
      // return view('messages', ['data'=>[$contact->inRandomOrder()->get()]]);
    // }
    public function showOneMessage($id){
      $contact = new Contact;
      return view ('one-message', ['data' =>$contact->find($id)]);
    }

    public function updateMessage($id){
      $contact = new Contact;
      return view('update-message', ['data' =>$contact->find($id)]);
    }

    public function updateMessageSubmit($id, ContactRequest $req){
      // dd($req);
      // dd($req->input('subject'));
      // $validation = $req -> validate([
      //   "subject"=>'required|min:5|max:50',
      //   "message" => 'required|min:15|max:500'
      // ]);
      $contact =Contact::find($id);
      $contact->name =$req->input('name');
      $contact->email =$req->input('email');
      $contact->subject =$req->input('subject');
      $contact->message =$req->input('message');

      $contact ->save();

      return redirect()->route('contact-data-one', $id)->with('success',  'Message has been Edited!');
    }


}
