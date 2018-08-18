<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-grey-lightest border-indigo-dark border-t-4 leading-normal">
    @include('layouts.navbar')
    <div class="container mx-auto">

        <div class="flex flex-wrap">
            <div class="w-1/4 pr-2">
                <div class="flex flex-col pl-0 mb-0 border rounded border-grey-light bg-white font-thin">
                    <div class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-grey-light no-underline bg-teal">
                        <h4 class="text-white">All section</h4>
                    </div>

                    <div class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-grey-light no-underline">
                        <a class="text-grey-darker font-light hover:text-grey-darkest" href="/admin/posts">Posts</a>
                    </div>

                    <div class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-grey-light no-underline">
                        <a class="text-grey-darker font-light hover:text-grey-darkest" href="/admin/categories">categories</a>
                    </div>
                </div>
            </div>

            <div class="w-3/4 pl-2">
                @yield('content')
            </div>
        </div>
    </div>

    <footer class="text-base text-center text-grey-darker tracking-wide p-16">
        &copy; 2017 All right reserved
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
