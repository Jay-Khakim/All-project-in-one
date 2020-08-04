@extends('layouts.app')

@section('content')
    <hr>
    <h1>Todos</h1>
    @if (count($todos)>0)
        @foreach ($todos as $todo)
            <div class="card p-2 m-3">
                <h2> <a href="todo/{{$todo->id}}">{{$todo->title}}</a>  </h2>
                <h3>{{$todo->content}}</h3>
                <span class="badge badge-danger"> {{ $todo->due}} </span>
            </div>
            
        @endforeach
    @endif
@endsection