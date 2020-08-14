@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-outline-secondary">Go Back</a>
    <br>
    <br>
    <h1>{{$post->title}}</h1>
    <img style="width: 100%;" src="/storage/cover_images/{{$post->cover_image}}" alt="">
    <br>
    <br>
    <br>
    <div>
        {{$post->body}}
    </div>
    <hr> 
    <small>Written on {{$post->created_at}} by <strong>{{ $post->user->name}} </small>
    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary">Edit</a>
            {!!Form::open(['action'=> ['PostsController@destroy', $post->id], 'method'=>'Post', 'class'=>'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class'=>'btn btn-outline-danger'])}}
            {!!Form::close()!!}
        @endif
    
    @endif
    
@endsection