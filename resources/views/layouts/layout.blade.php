<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/content.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Economica:700" rel="stylesheet">

</head>
    <body>
        <header>
            @yield('header')
        </header>

        <div class="container">
            @yield('content')
        </div>
        <script type="text/javascript" src="birthday.js"></script>
    </body>
</html>