<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-grey-lighter">
    @yield('content')
    @stack('scripts')
</body>
</html>
