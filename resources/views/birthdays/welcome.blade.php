<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
        <title>Birthday Box</title>
        <link rel="stylesheet" href="{{asset('css/welcome.css') }}">
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <link href="https://fonts.googleapis.com/css?family=Economica:700" rel="stylesheet">
    </head>
    <body>
        <!-- 共通ヘッダー -->
        <header>
             <a href="/" id="header_logo">Birthday Box</a>  
        <!-- ログインしている時、していない時で表示を変更させている -->
            <nav id="pc-nav">
                <ul>
                @if (Route::has('login'))
                        @auth
                            <li><a href="{{ route('birthdays.index') }}">RECORD    </a></li>
                            <li>  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    LOGOUT</a></li>
                                        <form id='logout-form' action="{{ route('logout')}}" method="POST" style="display: none;">
                                        {{@csrf_field()}}
                        @else
                            <li><a href="{{ route('login') }}"> LOGIN      </a></li>

                            @if (Route::has('register'))
                               <li><a href="{{ route('register') }}">REGISTER</a><li>
                            @endif
                        @endauth
                @endif
                </ul>
            </nav>
        </header>
        <!-- ファーストビュー -->
        <section class="wrapper">
            <div class="container">
                <h2> Birthday Box</h2>
            </div>
        </section>
    </body>
</html>
