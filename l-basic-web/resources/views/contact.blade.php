@extends('layouts.app')
@section('content')
    
<h1>Contacts</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{$error}}</li>
                @endforeach
            </ul>
        </div>
        
    @endif
<form method="POST" action="{{route('contact-form-submit')}}" >
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name ">
    </div>

    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter Subject ">
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" class="form-control" cols="10" rows="4" placeholder="Write your message"></textarea>
    </div>
    
  <button type="submit" class="btn btn-outline-primary">Submit</button>
</form>

@endsection
