@extends('layouts.app')

@section('title')
    Customers List
@endsection

@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach ($customers as $customer)
                <hr>
                <li class="list-group-item"> <strong> {{$customer->name}}</strong></li>
                <li class="list-group-item">{{$customer->email}}</li>
                <li class="list-group-item">{{$customer->phone}}</li>
                <br><br>
                
            @endforeach
        </ul>
        
    </div>
@endsection