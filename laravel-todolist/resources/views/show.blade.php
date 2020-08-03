@extends('layouts.app')
@section('content')
    <a href="/" class="btn btn-outline-primary">Back</a>
    <h1> {{$todo->title}} </h1>

    <div class="label label-danger" >
        {{$todo->due}}
    </div>
    <hr>
    <p> {{$todo->content}} </p>
@endsection