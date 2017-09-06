<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>КНТЕУ - @yield('title')</title>

    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="@yield('body-classes')">

    <div id="app">
        <navbar user="{{ Auth::check() ? json_encode(Auth::user()) : 'empty' }}"
                time="{{ json_encode($time) }}"
        ></navbar>

        @yield('content')
    </div>

    <script src="{{ secure_asset('js/app.js') }}"></script>
</body>
</html>
