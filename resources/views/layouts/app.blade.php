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

    <!-- CSS -->
    @vite(['resources/css/app.css'])

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <img src="{{ asset('welcome/logo.png') }}" alt="Lion" class="img-fluid img-left"
                    style="max-height: 80px">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Financial School') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end bg-white" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item nav-dropdown" href="{{ route('lessons.index') }}">Lessons</a>
                                    <a class="dropdown-item nav-dropdown" href="{{ route('lessons.create') }}">Create
                                        Lesson</a>
                                    <a class="dropdown-item nav-dropdown" href="{{ route('lessons.show_deleted') }}">Deleted
                                        Lessons</a>
                                    <hr class="text-black">
                                    <a class="dropdown-item nav-dropdown" href="{{ route('exercises.index') }}">Exercises</a>
                                    <a class="dropdown-item nav-dropdown" href="{{ route('exercises.create') }}">Create
                                        exercise</a>
                                    <a class="dropdown-item nav-dropdown" href="{{ route('exercises.show_deleted') }}">Deleted
                                        exercises</a>
                                        <hr class="text-black">
                                    <a class="dropdown-item nav-dropdown" href="{{ route('logout') }}"
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
