<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BESTOURS - Travel and Tours multipurpose template">
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

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('assets/tourist/css/custom.css') }}" rel="stylesheet">

    <!-- Modernizr -->
    <script src="{{ asset('assets/tourist/js/modernizr.js') }}"></script>

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

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
                            <a href="tel://004542344599" id="phone_top">0045 043204434</a><span id="opening">Mon - Sat
                                8.00/18.00</span>
                        </div>
                        <div class="col-md-6 col-sm-6 hidden-xs">
                            <ul id="top_links">
                                <li><a href="#0" id="wishlist_link">Wishlist</a>
                                </li>
                                <li><a href="#0">PURCHASE THIS TEMPLATE</a>
                                </li>
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
                        <div id="logo_home">
                            <h1><a href="index.html" title="City tours travel template">BesTours Travel&amp;Excursion
                                    Multipurpose Template</a></h1>
                        </div>
                    </div>
                    <!-- welcome.blade.php -->
                    <div class="flex items-center justify-center min-h-screen bg-gray-100">
                        <div class="text-center">
                            <!-- Button to Login Page or Dashboard -->
                            <a
                                href="{{ Auth::check() ? route(Auth::user()->role . '.dashboard') : route('login') }}"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                {{ Auth::check() ? 'Go to Dashboard' : 'Log In' }}
                            </a>
                        </div>
                    </div>


                    <nav class="col-md-9 col-sm-9 col-xs-9">
                        <ul id="tools_top">
                            <li><a href="#" class="search-overlay-menu-btn"><i class="icon-search-6"></i></a>
                            </li>
                        </ul>
                        <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close"
                            href="javascript:void(0);"><span>Menu mobile</span></a>
                        <div class="main-menu">
                            <div id="header_menu">
                                <img scr="assets/tourist/img/logo_menu.png" width="145" height="34" alt="Bestours">
                            </div>
                            <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu">Home</a>
                                    <ul>
                                        <li><a href="index.html">Home Video background</a>
                                        </li>
                                        <li><a href="index_2.html">Home Layer Slider</a>
                                        </li>
                                        <li><a href="index_3.html">Home Full Header</a>
                                        </li>
                                        <li><a href="index_4.html">Home Popup</a>
                                        </li>
                                        <li><a href="index_5.html">Home Cookie bar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu">Tours</a>
                                    <ul>
                                        <li><a href="grid.html">Grid view</a>
                                        </li>
                                        <li><a href="list.html">List view</a>
                                        </li>
                                        <li><a href="detail-page.html">Tour Detail</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('tourist.about') }}">About us</a>
                                </li>
                                <li><a href="{{ route('tourist.faq') }}">Faq</a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu">Other pages</a>
                                    <ul>
                                        <li><a href="index_3.html">Header Version 2</a>
                                        </li>
                                        <li><a href="blog.html">Blog</a>
                                        </li>
                                        <li><a href="blog_post.html">Blog post</a>
                                        </li>
                                        <li><a href="gallery.html">Gallery</a>
                                        </li>
                                        <li><a href="maintenance.html">Mantainance</a>
                                        </li>
                                        <li><a href="profile.html">Team Profile</a>
                                        </li>
                                        <li><a href="contacts_2.html">Contact 2</a>
                                        </li>
                                        <li><a href="coming_soon/index.html">Coming soon</a>
                                        </li>
                                        <li><a href="shortcodes.html">Shortcodes</a>
                                        </li>
                                        <li><a href="icon_pack_1.html">Icon pack 1</a>
                                        </li>
                                        <li><a href="icon_pack_2.html">Icon pack 2</a>
                                        </li>
                                        <li><a href="icon_pack_3.html">Icon pack 3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contacts.html">Contact us</a>
                                </li>
                                <li class="megamenu submenu">
                                    <a href="javascript:void(0);" class="show-submenu-mega">More demos</a>
                                    <div class="menu-wrapper">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h3>Museum Tours</h3>
                                                <div class="menu-item">
                                                    <a href="#"><img scr="assets/tourist/img/menu-demo-1.jpg"
                                                            width="400" height="226" alt="" class="img-responsive">
                                                    </a>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, et cum civibus referrentur, at
                                                        propriae forensibus qui. Duo aliquip necessitatibus ne.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h3>Adventure Tours</h3>
                                                <div class="menu-item">
                                                    <a href="#"><img scr="assets/tourist/img/menu-demo-2.jpg"
                                                            width="400" height="226" alt="" class="img-responsive">
                                                    </a>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, et cum civibus referrentur, at
                                                        propriae forensibus qui. Duo aliquip necessitatibus ne.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h3>Travel Tours</h3>
                                                <div class="menu-item">
                                                    <a href="#"><img scr="assets/tourist/img/menu-demo-3.jpg"
                                                            width="400" height="226" alt="" class="img-responsive">
                                                    </a>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, et cum civibus referrentur, at
                                                        propriae forensibus qui. Duo aliquip necessitatibus ne.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="hidden-xs">
                                        <p class="text-center hidden-xs">
                                            <a href="#" class="btn_outline">MORE DEMOS SOON</a>
                                    </div>
                                    <!-- End menu-wrapper -->
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

    <!-- SubHeader =============================================== -->
    <section class="header-video">
        <div id="hero_video">
            <div id="animate_intro">
                <h3>Enjoy a Perfect Tour</h3>
                <p>
                    Find the best Tours and Excursion at the best price
                </p>
            </div>
        </div>
        <img scr="{{ asset('assets/tourist/img/video_fix.png') }}" alt="" class="header-video--media"
            data-video-src="{{ asset('assets/tourist/video/intro') }}"
            data-teaser-source="{{ asset('assets/tourist/video/intro') }}" data-provider="" data-video-width="1920"
            data-video-height="750">
    </section>
    <!-- End Header video -->
    <!-- End SubHeader ============================================ -->

    <section class="wrapper">
        <div class="divider_border"></div>

        <div class="container">

            <div class="main_title">
                <h2>Our <span>Top</span> Adventure Tours</h2>
                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                    <div class="img_wrapper">
                        <div class="ribbon">
                            <span>Popular</span>
                        </div>
                        <div class="price_grid">
                            <sup>$</sup>23
                        </div>
                        <div class="img_container">
                            <a href="detail-page.html">
                                <img scr="assets/tourist/img/tour_list_1.jpg" width="800" height="533"
                                    class="img-responsive" alt="">
                                <div class="short_info">
                                    <h3>Rafting &amp; Boating</h3>
                                    <em>Duration 45 mins</em>
                                    <p>
                                        A quam morbi ut arcu, eget neque molestie, ullamcorper congue pharetra,
                                        hendrerit odio consectetuer.
                                    </p>
                                    <div class="score_wp">Superb
                                        <div class="score">7.5</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End img_wrapper -->
                </div>

                <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                    <div class="img_wrapper">
                        <div class="ribbon">
                            <span>Popular</span>
                        </div>
                        <div class="price_grid">
                            <sup>$</sup>19
                        </div>
                        <div class="img_container">
                            <a href="detail-page.html">
                                <img scr="assets/tourist/img/tour_list_2.jpg" width="800" height="533"
                                    class="img-responsive" alt="">
                                <div class="short_info">
                                    <h3>Advantage Canyon</h3>
                                    <em> Duration 60 min</em>
                                    <p>
                                        A quam morbi ut arcu, eget neque molestie, ullamcorper congue pharetra,
                                        hendrerit odio consectetuer.
                                    </p>
                                    <div class="score_wp">Superb
                                        <div class="score">7.5</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End img_wrapper -->
                </div>

                <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                    <div class="img_wrapper">
                        <div class="ribbon">
                            <span>Popular</span>
                        </div>
                        <div class="price_grid">
                            <sup>$</sup>32
                        </div>
                        <div class="img_container">
                            <a href="detail-page.html">
                                <img scr="assets/tourist/img/tour_list_5.jpg" width="800" height="533"
                                    class="img-responsive" alt="">
                                <div class="short_info">
                                    <h3>West Adventure</h3>
                                    <em>Duration 60 min</em>
                                    <p>
                                        A quam morbi ut arcu, eget neque molestie, ullamcorper congue pharetra,
                                        hendrerit odio consectetuer.
                                    </p>
                                    <div class="score_wp">Superb
                                        <div class="score">7.5</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End img_wrapper -->
                </div>

                <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                    <div class="img_wrapper">
                        <div class="ribbon">
                            <span>Popular</span>
                        </div>
                        <div class="price_grid">
                            <sup>$</sup>20
                        </div>
                        <div class="img_container">
                            <a href="detail-page.html">
                                <img scr="assets/tourist/img/tour_list_6.jpg" width="800" height="533"
                                    class="img-responsive" alt="">
                                <div class="short_info">
                                    <h3>Raft Grand Canyon</h3>
                                    <em>Duration 90 min</em>
                                    <p>
                                        A quam morbi ut arcu, eget neque molestie, ullamcorper congue pharetra,
                                        hendrerit odio consectetuer.
                                    </p>
                                    <div class="score_wp">Superb
                                        <div class="score">7.5</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End img_wrapper -->
                </div>

                <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                    <div class="img_wrapper">
                        <div class="ribbon">
                            <span>Popular</span>
                        </div>
                        <div class="price_grid">
                            <sup>$</sup>22
                        </div>
                        <div class="img_container">
                            <a href="detail-page.html">
                                <img scr="assets/tourist/img/tour_list_7.jpg" width="800" height="533"
                                    class="img-responsive" alt="">
                                <div class="short_info">
                                    <h3>Western River</h3>
                                    <em>Duration 45 min</em>
                                    <p>
                                        A quam morbi ut arcu, eget neque molestie, ullamcorper congue pharetra,
                                        hendrerit odio consectetuer.
                                    </p>
                                    <div class="score_wp">Superb
                                        <div class="score">7.5</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End img_wrapper -->
                </div>

                <div class="col-md-4 col-sm-6 wow fadeIn animated" data-wow-delay="0.2s">
                    <div class="img_wrapper">
                        <div class="ribbon">
                            <span>Popular</span>
                        </div>
                        <div class="price_grid">
                            <sup>$</sup>42
                        </div>
                        <div class="img_container">
                            <a href="detail-page.html">
                                <img scr="assets/tourist/img/tour_list_9.jpg" width="800" height="533"
                                    class="img-responsive" alt="">
                                <div class="short_info">
                                    <h3>Colorado River</h3>
                                    <em>Duration 45 min</em>
                                    <p>
                                        A quam morbi ut arcu, eget neque molestie, ullamcorper congue pharetra,
                                        hendrerit odio consectetuer.
                                    </p>
                                    <div class="score_wp">Superb
                                        <div class="score">7.5</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End img_wrapper -->
                </div>

            </div>
            <!-- End row -->

            <div class="main_title_2">
                <h3>View other <span>popular</span> tours</h3>
                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
            </div>
            <div class="row list_tours">
                <div class="col-sm-6">
                    <h3>New Tours</h3>
                    <ul>
                        <li>
                            <div>
                                <a href="detail-page.html">
                                    <figure><img scr="assets/tourist/img/thumb_tabs_1.jpg" alt="thumb"
                                            class="img-rounded" width="60" height="60">
                                    </figure>
                                    <h4>Adipisci voluptatum ea</h4>
                                    <small>Duration 1hr 20 minutes</small>
                                    <span class="price_list">$23</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="detail-page.html">
                                    <figure><img scr="assets/tourist/img/thumb_tabs_2.jpg" alt="thumb"
                                            class="img-rounded" width="60" height="60">
                                    </figure>
                                    <h4>Splendide suscipiantur</h4>
                                    <small>Duration 1hr 20 minutes</small>
                                    <span class="price_list">$23</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="detail-page.html">
                                    <figure><img scr="assets/tourist/img/thumb_tabs_3.jpg" alt="thumb"
                                            class="img-rounded" width="60" height="60">
                                    </figure>
                                    <h4>Vide omnium perpetua</h4>
                                    <small>Duration 1hr 20 minutes</small>
                                    <span class="price_list">$23</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6">
                    <h3>Special offers</h3>
                    <ul>
                        <li>
                            <div>
                                <a href="detail-page.html">
                                    <figure><img scr="assets/tourist/img/thumb_tabs_4.jpg" alt="thumb"
                                            class="img-rounded" width="60" height="60">
                                    </figure>
                                    <h4>Quo quidam vidisse</h4>
                                    <small>Duration 1hr 20 minutes</small>
                                    <span class="price_list"><em>$23</em>$19</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="detail-page.html">
                                    <figure><img scr="assets/tourist/img/thumb_tabs_5.jpg" alt="thumb"
                                            class="img-rounded" width="60" height="60">
                                    </figure>
                                    <h4>Integre alterum</h4>
                                    <small>Duration 1hr 20 minutes</small>
                                    <span class="price_list"><em>$23</em>$19</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="detail-page.html">
                                    <figure><img scr="assets/tourist/img/thumb_tabs_6.jpg" alt="thumb"
                                            class="img-rounded" width="60" height="60">
                                    </figure>
                                    <h4>Tation mollis appetere</h4>
                                    <small>Duration 1hr 20 minutes</small>
                                    <span class="price_list"><em>$23</em>$19</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- End row -->

            <p class="text-center add_bottom_45">
                <a href="grid.html" class="btn_1">Explore all tours (24)</a>
            </p>

        </div>
    </section>
    <!-- End section -->

    <section class="container margin_60">
        <div class="main_title">
            <h3>Why choose BesTours</h3>
            <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="box_how">
                    <div class="icon_how"><span class="icon_set_1_icon-81"></span>
                    </div>
                    <h4>Best price guarantee</h4>
                    <p>Lorem ipsum dolor sit amet, et cum civibus referrentur, at propriae forensibus qui. Duo aliquip
                        necessitatibus ne.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box_how">
                    <div class="icon_how"><span class="icon_set_1_icon-94"></span>
                    </div>
                    <h4>Professional local guides</h4>
                    <p>Lorem ipsum dolor sit amet, et cum civibus referrentur, at propriae forensibus qui. Duo aliquip
                        necessitatibus ne.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box_how">
                    <div class="icon_how"><span class="icon_set_1_icon-92"></span>
                    </div>
                    <h4>Certifcate of Excellence</h4>
                    <p>Lorem ipsum dolor sit amet, et cum civibus referrentur, at propriae forensibus qui. Duo aliquip
                        necessitatibus ne.</p>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </section>
    <!-- End Container -->

    <section class="promo_full">
        <div class="promo_full_wp">
            <div>
                <h3>What Clients say<span>Id tale utinam ius, an mei omnium recusabo iracundia.</span></h3>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="owl-carousel owl-theme carousel_testimonials">
                                <div>
                                    <div class="box_overlay">
                                        <div class="pic">
                                            <figure><img scr="assets/tourist/img/testimonial_1.jpg" alt=""
                                                    class="img-circle">
                                            </figure>
                                            <h4>Roberta<small>12 October 2015</small></h4>
                                        </div>
                                        <div class="comment">
                                            "Mea ad postea meliore fuisset. Timeam repudiare id eum, ex paulo dictas
                                            elaboraret sed, mel cu unum nostrud."
                                        </div>
                                    </div>
                                    <!-- End box_overlay -->
                                </div>

                                <div>
                                    <div class="box_overlay">
                                        <div class="pic">
                                            <figure><img scr="assets/tourist/img/testimonial_1.jpg" alt=""
                                                    class="img-circle">
                                            </figure>
                                            <h4>Roberta<small>12 October 2015</small></h4>
                                        </div>
                                        <div class="comment">
                                            "No nam indoctum accommodare, vix ei discere civibus philosophia. Vis ea
                                            dicant diceret ocurreret."
                                        </div>
                                    </div>
                                    <!-- End box_overlay -->
                                </div>

                                <div>
                                    <div class="box_overlay">
                                        <div class="pic">
                                            <figure><img scr="assets/tourist/img/testimonial_1.jpg" alt=""
                                                    class="img-circle">
                                            </figure>
                                            <h4>Roberta<small>12 October 2015</small></h4>
                                        </div>
                                        <div class="comment">
                                            "No nam indoctum accommodare, vix ei discere civibus philosophia. Vis ea
                                            dicant diceret ocurreret."
                                        </div>
                                    </div>
                                    <!-- End box_overlay -->
                                </div>

                            </div>
                            <!-- End carousel_testimonials -->
                        </div>
                        <!-- End col-md-8 -->
                    </div>
                    <!-- End row -->
                </div>
                <!-- End container -->
            </div>
            <!-- End promo_full_wp -->
        </div>
        <!-- End promo_full -->
    </section>
    <!-- End section -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <h3>Need help?</h3>
                    <a href="tel://004542344599" id="phone">+45 423 445 99</a>
                    <a href="mailto:help@citytours.com" id="email_footer">help@bestours.com</a>
                </div>
                <div class="col-md-2 col-sm-3">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">About us</a>
                        </li>
                        <li><a href="#">FAQ</a>
                        </li>
                        <li><a href="#">Login</a>
                        </li>
                        <li><a href="">Register</a>
                        </li>
                        <li><a href="#">Terms and condition</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6">
                    <h3>Twitter feed</h3>
                    <div class="latest-tweets" data-number="10" data-username="ansonika" data-mode="fade"
                        data-pager="false" data-nextselector=".tweets-next" data-prevselector=".tweets-prev"
                        data-adaptiveheight="true">
                        <!-- data-username="your twitter username" -->
                    </div>
                    <div class="tweet-control">
                        <div class="tweets-prev"></div>
                        <div class="tweets-next"></div>
                    </div>
                    <!-- End .tweet-control -->
                </div>
                <div class="col-md-3 col-sm-12">
                    <h3>Newsletter</h3>
                    <div id="message-newsletter_2">
                    </div>
                    <form method="post" action="assets/newsletter.php" name="newsletter_2" id="newsletter_2">
                        <div class="form-group">
                            <input name="email_newsletter_2" id="email_newsletter_2" type="email" value=""
                                placeholder="Your email" class="form-control">
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
                            <option value="French">French</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Russian">Russian</option>
                        </select>
                    </div>
                    <span id="copy">© BestTours 2021 - All rights reserved</span>
                </div>
                <div class="col-sm-4" id="social_footer">
                    <ul>
                        <li><a href="#"><i class="icon-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="icon-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="icon-google"></i></a>
                        </li>
                        <li><a href="#"><i class="icon-instagram"></i></a>
                        </li>
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

</body>

</html>
