<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name')  }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/remixicon.css') }}">
    @yield('stylesheets', '')
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/main/main.js') }}"></script>
    <script src="{{ asset('js/shop/shop.js') }}"></script>
</head>
<body>
    @yield('header', View::make('header'))
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
