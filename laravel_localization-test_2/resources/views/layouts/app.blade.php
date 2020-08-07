<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            
            <ul>
                <li class="nav-item">
                    <a href="{{ route(Route::currentRouteName(), 'en') }}" class="nav-link">EN</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route(Route::currentRouteName(), 'uz') }}" class="nav-link">UZ</a>
                </li>   
                <li>
                    <a href="">{{__("Laravel")}}</a>
                    
                </li>

                <li>
                    <a href="">{{__("Login")}}</a>
                    
                </li>
            </ul>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
