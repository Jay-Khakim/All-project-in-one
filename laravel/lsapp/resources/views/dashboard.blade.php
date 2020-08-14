@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    <a href="/posts/create" class="btn btn-outline-primary">Create Post</a>
                    <br>
                    <br>
                    <h3>Your Blog Posts</h3>
                    @if (count($posts)>0)
                        <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary">Edit</a></td>
                                <td> {!!Form::open(['action'=> ['PostsController@destroy', $post->id], 'method'=>'Post', 'class'=>'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class'=>'btn btn-outline-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <h6>You don't have any posts!</h6>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
