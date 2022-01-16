<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('main.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('css/app.csss') }}" rel="stylesheet">--}}
</head>
<body>
<div id="app">

    <!--BEGIN HEADER-->
    <div id="header">
        <div class="top_info">
            <div class="logo">
                <a href="{{ url('/') }}">Auto<span>Dealer</span></a>
            </div>
            <nav class="navbar navbar-expand-md navbar-light shadow-sm">
                <div class="container d-flex justify-content-end">
                    <ul class="navbar-nav text-right">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white"
                                       href="{{ route('login') }}">{{ __('Авторизация') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white"
                                       href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown d-flex align-items-center">
                                <div class="mr-3">{{ Auth::user()->name }}</div>
                                <div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <div class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">
                                                <i class="fas fa-sign-out-alt"></i>
                                                выйти
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
