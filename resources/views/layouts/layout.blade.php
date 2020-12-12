<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="{{asset('css/content.css') }}">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Economica:700" rel="stylesheet">

    <!-- 部品化 -->
</head>
    <body>
        <header>
            @yield('header')
        </header>

        <div class="container">
            @yield('content')
        </div>

     <script type="text/javascript" src="js/birthday.js"></script>
    </body>
</html>