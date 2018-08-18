<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('blog.name', 'Blog')  . config('blog.description') }}</title>

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-grey-lightest border-indigo-dark border-t-4 leading-normal">
    <header class="flex flex-col">
        <a href="/"><img class="border-8 border-white block h-48 w-48 rounded-full mx-auto my-4 relative" src="/img/me.jpg"></a>
        <div class="bg-grey-light p-12 md:p-24 -mt-16">
            <h2 class="text-center mt-2 italic font-sans">Mehdi Lamaaffar</h2>
            <div class="mx-auto w-100 md:w-3/5 mt-2">
                <p>Hi! I'm Mehdi Lamaaffar. I Laravel developer, I am a dedicated web developer with a passion for creating modern, eye catching websites.</p>
                <p>I am someone who always has an eye on my target. I endeavor to deliver high-quality work on time, every time.</p>
                <p>Find me as mehdii.lamaaffar <a href="https://twitter.com/mehdilamaaffar" target="_blink" class="font-bold text-black italic">@twitter</a> and <a href="https://github.com/mehdilamaaffar" target="_blink" class="font-bold text-black italic">@github</a> and Lamaaffar.mehdi <a href="https://www.instagram.com/lamaaffar_mehdi/" target="_blink" class="font-bold text-black italic">@instagram</a>.</p>
            </div>
        </div>
    </header>

    <div class="container md:mx-auto md:w-2/2 lg:w-1/2 p-4">

        @yield('content')

        <footer class="text-base text-center text-grey-darker tracking-wide p-16">
            &copy; 2017 All right reserved
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}"></script>
</body>
</html>
