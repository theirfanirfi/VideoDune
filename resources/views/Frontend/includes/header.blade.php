<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Videodune</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon
        ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

        <!-- All css files are included here
        ============================================ -->
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/icofont.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/core.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">

        <!-- Modernizr JS -->
        <script src="{{ URL::asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience</p>
        <![endif]-->
        <!--Main Wrapper Start-->
        <div class="wrapper bg-white fix">
            <!--Bg White Start-->
            <div class="bg-white">
                <!--Header Area Start-->
                <header class="header-area">
                    <div class="header-top hidden-xs">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 hidden-xs">
                                    <div class="top-left">
                                        <ul>
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="top-right">
                                        <ul>
                                            <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                                            <li><a href="#"><i class="icofont icofont-social-google-plus"></i></a></li>
                                            <li><a href="#"><i class="icofont icofont-social-pinterest"></i></a></li>
                                            <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-logo-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-xs-8">
                                    <div class="header-logo">
                                        <a href="index.html"><img src="images/logo/logo.png" alt="logo" /></a>
                                    </div>
                                </div>
                                <div class="col-md-9 col-xs-12">
                                    <div class="main-menu text-right">
                                        <nav>
                                            <ul>
                                                <li class="active"><a href="{{ route('home') }}">Home</a>
                                                </li>
                                                <li><a href="{{ route('videos') }}">Videos</a></li>
                                                <li><a href="{{ route('myvideos') }}">My Videos</a></li>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="mobile-menu"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- End of Header Area -->
