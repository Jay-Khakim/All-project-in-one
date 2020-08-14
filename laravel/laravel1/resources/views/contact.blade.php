@extends('layouts.app')

@section('title-block')Contacts @endsection

@section('content')
  <h1>Contacts page</h1>


  <form  action="{{route('contact-form')}}" method="post">

    @csrf
    <div class="form-group">
      <label for="name">Name: </label>
      <input type="text" class="form-control" name="name" placeholder="Name" id="name" value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name'], ENT_QUOTES); ?>">
    </div>

    <div class="form-group">
      <label for="email">E-mail: </label>
      <input type="email" class="form-control" name="email" placeholder="E-mail" id="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>">
    </div>

    <div class="form-group">
      <label for="subject">Subject: </label>
      <input type="text" class="form-control" name="subject" placeholder="Subject" id="subject" value="<?php if (isset($_POST['subject'])) echo htmlspecialchars($_POST['subject'], ENT_QUOTES); ?>">
    </div>

    <div class="form-group">
      <label for="message">Message: </label>
      <textarea name="message" id="message" placeholder="Write your message" class="form-control" rows="2" cols="30"></textarea>

      <button type="submit"  class=" btn btn-success">Send</button>
    </div>

  </form>
@endsection
