 @extends('layouts.app')
 @section('title')
     Main
 @endsection

 @section('content')
    <div class="jumbotron text-center">
        <h1>{{$title}} </h1>
        <p>This is a laravel lesson</p>
        <p><a class="btn btn-outline-primary btn-lg" href="{{ route('login') }}" role="button">Login</a>
        <a class="btn btn-outline-success btn-lg" href="{{ route('register') }}" role="button">Register</a></p>
     <div>
 @endsection