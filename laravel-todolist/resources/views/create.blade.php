@extends('layouts.app ')
@section('content')
<h1>Create New To-do</h1>
    <form method ="POST" action="/todo">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value=" {{old("title")}} "  placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" name="content" class="form-control" id="content" value=" {{old("content")}} " placeholder="Enter content">
        </div>
        <div class="form-group">
            <label for="due">Due</label>
            <input type="text" name="due" class="form-control" id="due" value=" {{old("due")}} " placeholder="Enter due">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection