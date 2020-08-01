@extends('layouts.app')

@section('title')
    {{$page->title}}
    
@endsection
@section('content')
    {!!$page->content !!}       
{{-- {!!   !!}    use this for reading the html by laravel --}}         
    
@endsection