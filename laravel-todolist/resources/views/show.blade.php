@extends('layouts.app')
@section('content')
    <a href="/" class="btn btn-outline-secondary mt-2">Back</a>
    <h1> {{$todo->title}} </h1>

    <div class="badge badge-danger" >
        {{$todo->due}}
    </div>
    <hr>
    <p> {{$todo->content}} </p>
    <div class="row">
        <a href="/todo/ {{$todo->id}}/edit" class="btn btn-outline-info mt-2">Edit</a>

        <form action="/todo/ {{$todo->id}}" method="POST">
            @csrf 
            @method('DELETE')
            <button class="btn btn-outline-danger mt-2 ml-2 float-right" type="submit" name="submit">Delete</button>
        </form>

    </div>

@endsection