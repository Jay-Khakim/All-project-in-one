@extends('layouts.app')

@section('title-block')Updating Message @endsection

@section('content')
  <h1>Updating Message</h1>


  <form  action="{{route('contact-update-submit', $data->id)}}" method="post">

    @csrf
    <div class="form-group">
      <label for="name">Name: </label>
      <input type="text" class="form-control" name="name" placeholder="Name" id="name" value="{{$data->name}}">
    </div>

    <div class="form-group">
      <label for="email">E-mail: </label>
      <input type="email" class="form-control" name="email" placeholder="E-mail" id="email" value="{{$data->email}}">
    </div>

    <div class="form-group">
      <label for="subject">Subject: </label>
      <input type="text" class="form-control" name="subject" placeholder="Subject" id="subject" value="{{$data->subject}}">
    </div>

    <div class="form-group">
      <label for="message">Message: </label>
      <textarea name="message" id="message" placeholder="Write your message" class="form-control" value="{{$data->message}} rows="2" cols="30"></textarea>

      <button type="submit"  class=" btn btn-success">Edit</button>
    </div>

  </form>
@endsection
