@extends('layouts.app')
@section('content')
    
<h1>Home</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore non, fugiat ea, eius minus obcaecati odit quis quisquam illum excepturi ipsum, amet iste exercitationem porro nostrum. Saepe commodi praesentium necessitatibus.</p>
@endsection

@section('sidebar')
    @parent
    <p>This is appended to the Sidebar</p>
@endsection
