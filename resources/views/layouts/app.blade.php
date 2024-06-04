<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>/* styles.css */

    /* Body */
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #2c0b0e; /* Army green */


    }

    /* Navbar */
    .navbar {
        background-color: #4B5320; /* Army green */
        color: #808000; /* Olive green */
    }

    .nav-link {

        color:  #000; ; /* Olive green */
    }

    .nav-link:hover {

        color: #fff; /* White */

    }

    /* Active Link */
    .nav-link.active,
    .nav-item.active .nav-link {
        color: #fff; /* White */
        background-color: #808000; /* Olive green */
    }

    /* Dropdown Menu */
    .dropdown-menu {
        background-color: #4B5320; /* Army green */
    }

    .dropdown-item {

        color: #fff; /* Olive green */
    }

    .dropdown-item:hover {
        background-color: #808000; /* Olive green */
        color: #fff; /* White */
    }

    /* Cards */
    .card {
        background-color: #4B5320; /* Army green */
        color: #fff; /* White */
    }

    .card-header {
        background-color: #198754; /* Olive green */
        color: #fff; /* White */
    }

    .card-body {
        color: #fff; /* White */
    }

    /* Buttons */
    .btn-primary {
        background-color: #198754; /* Olive green */
        border-color: #808000; /* Olive green */
    }

    .btn-primary:hover {
        background-color: #4B5320; /* Army green */
        border-color: #4B5320; /* Army green */
        color: #808000; /* White */
    }

    /* Form Inputs */
    .form-control {
        border-color: #808000; /* Olive green */
    }

    /* Alerts */
    .alert {
        background-color: #4B5320; /* Army green */
        color: #fff; /* White */
        border-color: #808000; /* Olive green */
    }
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">

        <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="{{ route('book.index') }}" role="button" aria-expanded="false">Books Collection</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('book.index') }}">View Book</a></li>



                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="{{ route('member.index') }}" role="button" aria-expanded="false">Membership</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('member.index') }}">View Members</a></li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white"data-bs-toggle="dropdown" href="{{ route('record.index') }}" role="button" aria-expanded="false">Book Record</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('record.index') }}">View Records</a></li>

                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>

                    </ul>



                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
