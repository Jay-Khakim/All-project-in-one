@extends('layouts.app')
@section('content')
    <a href="/" class="btn btn-outline-secondary mt-2">Back</a>
    <h1> {{$todo->title}} </h1>

    <div class="badge badge-danger" >
        {{$todo->due}}
    </div>
    <hr>
    <p> {{$todo->content}} </p>
    <a href="/todo/ {{$todo->id}}/edit" class="btn btn-info mt-2">Edit</a>

@endsection