@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($messages as $mes)
        <hr>
        <h2>{{$mes->subject}}</h2>
        <small> Sent by {{$mes->name}} at {{$mes->created_at}}</small>
        <br><br>
        <p>{{$mes->message}}</p>
        <small>{{$mes->email}}</small>
        <br><br>
        <hr>
    @endforeach
</div>
    
@endsection