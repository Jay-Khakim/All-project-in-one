@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors as $error)
                <li>
                    @php
                        echo $error
                    @endphp
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif  

@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif  