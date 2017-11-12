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
    <link href="{{ secure_asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header id="site-header">
            <div class="row">
                <div class="col-md-4 col-sm-5 col-xs-8">
                    <div class="logo">
                        <h1><a href="/">{{ config('app.name') }}</a></h1>
                    </div>
                </div><!-- col-md-4 -->
                <div class="col-md-8 col-sm-7 col-xs-4">
                    <nav class="main-nav" role="navigation">
                        <div class="navbar-header">
                            <button type="button" id="trigger-overlay" class="navbar-toggle">
                                <span class="ion-navicon"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                {{--  <li class="cl-effect-11"><a href="/" data-hover="Home">Home</a></li>  --}}
                                {{--  <li class="cl-effect-11"><a href="/about" data-hover="About">About</a></li>  --}}
                                {{--  <li class="cl-effect-11"><a href="/contact" data-hover="Contact">Contact</a></li>  --}}
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                    <div id="header-search-box">
                        <a id="search-menu" href="#"><span id="search-icon" class="ion-ios-search-strong"></span></a>
                        <div id="search-form" class="search-form">
                            <form role="search" method="get" id="searchform" action="/search">
                                <input type="search" name="keyword" placeholder="Search" required>
                                <button type="submit"><span class="ion-ios-search-strong"></span></button>
                            </form>
                        </div>
                    </div>
                </div><!-- col-md-8 -->
            </div>
        </header>
    </div>

    <div class="content-body">
        <div class="container">
            <div class="row">
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

    <!-- Mobile Menu -->
    <div class="overlay overlay-hugeinc">
        <button type="button" class="overlay-close"><span class="ion-ios-close-empty"></span></button>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="full-width.html">Blog</a></li>
                {{--  <li><a href="about.html">About</a></li>  --}}
                {{--  <li><a href="contact.html">Contact</a></li>  --}}
            </ul>
        </nav>
    </div>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/vendor.js') }}"></script>
    <script src="{{ secure_asset('js/app.js') }}"></script>
</body>
</html>
