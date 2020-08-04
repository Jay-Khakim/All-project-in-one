@extends('layouts.app ')
@section('content')
<h1>Edit To-do</h1>
    <form method ="POST" action="/todo/{{$todo->id}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value=" {{$todo->title}} "  placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" name="content" class="form-control" id="content" value=" {{$todo->content}} " placeholder="Enter content">
        </div>
        <div class="form-group">
            <label for="due">Due</label>
            <input type="text" name="due" class="form-control" id="due" value=" {{$todo->due}} " placeholder="Enter due">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection