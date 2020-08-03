@if ($errors->any())
    <div class="alert laert-danger">
        <ul>
            @foreach ($errors as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif