<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>EcoTour</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('assets/tourist/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
        href="{{ asset('assets/tourist/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="{{ asset('assets/tourist/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="{{ asset('assets/tourist/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="{{ asset('assets/tourist/img/apple-touch-icon-144x144-precomposed.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Satisfy" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('assets/tourist/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/tourist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/tourist/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/tourist/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/tourist/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/tourist/css/icon_fonts/css/all_icons.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('assets/tourist/css/custom.css') }}" rel="stylesheet">

    <!-- Modernizr -->
    <script src="{{ asset('assets/tourist/js/modernizr.js') }}"></script>

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    @livewireStyles

</head>

<body>

    <!--[if lte IE 8]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
    <![endif]-->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->
    <!--
    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div> -->
    <!-- End Preload -->

    <!-- Header================================================== -->
    <div id="header_1">
        <header>
            <div id="top_line">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <a href="tel://004542344599" id="phone_top">+256 123 456 789</a>
                            <span id="opening">Mon - Sat 8.00/18.00</span>
                        </div>
                        <div class="col-md-6 col-sm-6 hidden-xs">
                            <ul id="top_links">
                                <li><a href="#0" id="wishlist_link">Wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End row -->
                </div>
                <!-- End container-->
            </div>
            <!-- End top line-->

            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div id="">
                            <h1 class="m-0 text-primary" style="font-size: 1.5rem;">EcoTour Uganda</h1>
                            <i class="fas fa-globe ms-2" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>

                    <nav class="col-md-9 col-sm-9 col-xs-9">
                        <ul id="tools_top">
                            <li><a href="#" class="search-overlay-menu-btn"><i class="icon-search-6"></i></a></li>
                        </ul>
                        <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);">
                            <span>Menu mobile</span>
                        </a>
                        <div class="main-menu">
                            <div id="header_menu" class="d-flex align-items-center">
                                <h1 class="m-0 text-primary" style="font-size: 1.5rem;">EcoTour Uganda</h1>
                                <i class="fas fa-globe ms-2" style="font-size: 1.5rem;"></i>
                                <!-- Example Font Awesome icon -->
                            </div>

                            <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                            <ul>
                                <li><a href="{{ route('tourist.browse-experiences') }}">Home</a></li>
                                <li><a href="{{ route('tourist.about') }}">About Us</a></li>
                                <li><a href="{{ route('tourist.faq') }}">FAQ</a></li>
                                <li><a href="{{ route('tourist.contact') }}">Contact Us</a></li>
                                <li>
                                    <!-- Button to Login Page or Dashboard -->
                                    <a href="{{ Auth::check() ? route(Auth::user()->role . '.dashboard') : route('login') }}"
                                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                        {{ Auth::check() ? 'Go to Dashboard' : 'Log In' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End main-menu -->
                    </nav>
                </div>
            </div>
            <!-- container -->
        </header>

        <!-- End Header -->
    </div>
    <!-- End Header 1-->

    {{ $slot }}



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <h3>Need Help?</h3>
                    <a href="tel://+256123456789" id="phone">+256 123 456 789</a>
                    <a href="mailto:support@ecotouruganda.com" id="email_footer">support@ecotouruganda.com</a>
                </div>
                <div class="col-md-2 col-sm-3">
                    <h3>About</h3>
                    <ul>
                        <li><a href="{{ route('tourist.about') }}">About Us</a></li>
                        <li><a href="{{ route('tourist.faq') }}">FAQ</a></li>
                        <li><a
                                href="{{ Auth::check() ? route(Auth::user()->role . '.dashboard') : route('login') }}">Login</a>
                        </li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-sm-12">
                    <h3>Newsletter</h3>
                    <div id="message-newsletter_2"></div>
                    <form method="post" action="assets/newsletter.php" name="newsletter_2" id="newsletter_2">
                        <div class="form-group">
                            <input name="email_newsletter_2" id="email_newsletter_2" type="email" value=""
                                placeholder="Your email" class="form-control" required>
                        </div>
                        <input type="submit" value="Subscribe" class="btn_1" id="submit-newsletter_2">
                    </form>
                </div>
            </div>
            <!-- End row -->
            <hr>
            <div class="row">
                <div class="col-sm-8">
                    <div class="styled-select">
                        <select class="form-control" name="lang" id="lang">
                            <option value="English" selected>English</option>
                            <option value="Luganda">Luganda</option>
                            <option value="Swahili">Swahili</option>
                        </select>
                    </div>
                    <span id="copy">© EcoTour Uganda <span id="currentYear"></span> - All rights reserved</span>
                </div>
                <div class="col-sm-4" id="social_footer">
                    <ul>
                        <li><a href="https://www.facebook.com/EcoTourUganda" target="_blank"><i
                                    class="icon-facebook"></i></a></li>
                        <li><a href="https://twitter.com/EcoTourUganda" target="_blank"><i class="icon-twitter"></i></a>
                        </li>
                        <li><a href="https://plus.google.com/EcoTourUganda" target="_blank"><i
                                    class="icon-google"></i></a></li>
                        <li><a href="https://www.instagram.com/EcoTourUganda" target="_blank"><i
                                    class="icon-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </footer>

    <!-- End footer -->

    <div id="toTop"></div>
    <!-- Back to top button -->

    <!-- Search Menu -->
    <div class="search-overlay-menu">
        <span class="search-overlay-close"><i class="icon_close"></i></span>
        <form role="search" id="searchform" method="get">
            <input value="" name="q" type="search" placeholder="Search..." />
            <button type="submit"><i class="icon-search-6"></i>
            </button>
        </form>
    </div>
    <!-- End Search Menu -->

    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('assets/tourist/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/tourist/js/common_scripts_min.js') }}"></script>
    <script src="{{ asset('assets/tourist/assets/validate.js') }}"></script>
    <script src="{{ asset('assets/tourist/js/jquery.tweet.min.js') }}"></script>
    <script src="{{ asset('assets/tourist/js/functions.js') }}"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('assets/tourist/js/video_header.js') }}"></script>
    <script>
    'use strict';
    HeaderVideo.init({
        container: $('.header-video'),
        header: $('.header-video--media'),
        videoTrigger: $("#video-trigger"),
        autoPlayVideo: true
    });
    </script>

    <script>
    document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>

    @livewireScripts
    @stack('scripts')
</body>

</html>
