<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Clinic Box</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Economica:700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">
</head>
<body>
        <header>
            <h1>
             <a href="/"　class="header_logo">Clinic Box</a>  
            </h1>
            <nav class="pc-nav">
                <ul>
                @if (Route::has('login'))
                        @auth
                            <li><a href="{{ route('birthdays.index') }}">RECORD </a></li>
                            <li>  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    LOGOUT</a></li>
                                        <form id='logout-form' action="{{ route('logout')}}" method="POST" style="display: none;">
                                        {{@csrf_field()}}
                        @else
                            <li><a href="{{ route('login') }}"> LOGIN    </a></li>

                            @if (Route::has('register'))
                               <li><a href="{{ route('register') }}">REGISTER</a><li>
                            @endif
                        @endauth
                @endif
                </ul>
            </nav>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
