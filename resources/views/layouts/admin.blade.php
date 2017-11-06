<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container">
        @include('layouts.navbar')

        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <div class="list-group-item bg-teal">
                        <h4 class="list-group-item-heading">All section</h4>
                    </div>
                    <div class="list-group-item">
                        <a href="/admin/posts">Posts</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    <footer id="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="copyright">&copy; 2017 All right reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
