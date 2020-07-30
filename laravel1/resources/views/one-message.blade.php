@extends('layouts.app')

@section('title-block'){{$data->subject}} @endsection

@section('content')
  <h1>{{$data->subject}}</h1>
  <div class="alert alert-info">
    <p> <strong>{{ $data->message}}</strong> </p>
    <p>{{ $data->email}}</p>
    <p> <small>{{ $data->created_at }}</small> </p>
    <a href="{{route('contact-update', $data->id)}}"> <button type="button" class="btn btn-primary" name="button">Edit</button> </a>
  </div>
@endsection
