<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Birthday Box</title>
        <link rel="stylesheet" href="{{asset('css/welcome.css') }}">
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <link href="https://fonts.googleapis.com/css?family=Economica:700" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>
             <a href="/"　class="header_logo">Birthday Box</a>  
            </h1>
            <nav class="pc-nav">
                <ul>
                @if (Route::has('login'))
                        @auth
                            <li><a href="{{ route('birthdays.index') }}">RECORD ｜</a></li>
                            <li>  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    LOGOUT</a></li>
                                        <form id='logout-form' action="{{ route('logout')}}" method="POST" style="display: none;">
                                        {{@csrf_field()}}
                        @else
                            <li><a href="{{ route('login') }}"> LOGIN  |  </a></li>

                            @if (Route::has('register'))
                               <li><a href="{{ route('register') }}">REGISTER</a><li>
                            @endif
                        @endauth
                @endif
                </ul>
            </nav>
        </header>
        
        <section class="wrapper">
            <div class="container">
                <h2> Birthday Box</h2>
            </div>
        </section>
    </body>
</html>
