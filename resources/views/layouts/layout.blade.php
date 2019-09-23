<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">

</head>
<body>
<div class="container">

    <div class="row header-topic">
        @if (Route::has('login'))
            <div class="">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="col-md-12 navbar-laravel text-center">
            <div class="justify-content-center">
                <a href="/images"><h1>CMS - El Hefé</h1></a>
            </div>
            <div class="links pt-3 pb-3">
                <a href="/images">Home</a>
                    <a href="/images">Upload image</a>
            </div>
        </div>

    </div>
    @yield('content')

</div>

</body>
</html>
