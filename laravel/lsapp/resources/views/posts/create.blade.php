@extends('layouts.app')

@section('content')
    <h1>Create Posts</h1>
    {!! Form::open(['action'  =>'PostsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', [  'id'=>'article-ckeditor', 'class'=>'form-control description', 'placeholder'=>'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-outline-primary'])}}
    {!! Form::close() !!}
@endsection

{{-- <textarea class="description" name="description"></textarea> --}}
@section('custom_js')
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
        <script>
            tinymce.init({
                selector:'textarea.description',
                width: 900,
                height: 300
            });
        </script>

@endsection
      