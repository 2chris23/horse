<?php
$editado = isset($editado) ? $editado : null;
if (!empty($editado)) {
    $stud = \Auth::user()->Yeguada();
}

$lang = \Session::get('lang');
if (empty($lang)) {
    $lang = 'es';
    \Session::put('lang', $lang);
    \Session::put('applocale', $lang);
}
App::setLocale($lang);


//$logobasic= url("landing/images/basic/logo.png");
$logo = $stud->getLogo();
//$logo =$stud->getLogo();
$espanol = url("landing/img/es.png");
$english = url("landing/img/en.png");

/*slider*/
$dummy = url("landing/images/dummy.png");
/*slider 1*/
$text1 = "LA APLICACIÓN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO";
$stext1 = "¡INSCRÍBETE CON NOSOTROS YA!";

$text2 = '2 LA APLICACIÓN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';
$stext2 = 'LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';

$horseapp = 'LA APLICACIÖN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';
$horseinscription = "¡INSCRÍBETE CON NOSOTROS YA!";

$tittlehorsewordsale = 'Horses Word Sale';
$contenido = "Este contenido es de prueba";
$contenido2 = "Caballos, ventas";
$imgother3 = url("landing/images/other/3.png");

$d[0] = url("landing/images/slider/1/2.jpg");
$d[1] = url("landing/images/slider/1/1.jpg");
$d[2] = url("landing/images/slider/1/3.jpg");
/*{{--$d[2]= url('frontend/img/slides/s3.jpg');--}}*/
$d[3] = url('frontend/img/gallery/img-2.jpg');
$d[4] = url('frontend/img/gallery/img-3.jpg');
$d[5] = url('frontend/img/gallery/img-4.jpg');
$d[6] = url('frontend/img/gallery/img-5.jpg');
$d[7] = url('frontend/img/slides/s1.jpg');
$d[8] = url('frontend/img/slides/s2.jpg');
$d[9] = url('frontend/img/slides/s3.jpg');

$text[0] = "{!! trans('users.fake.0') !!}";
$text[1] = "{!! trans('users.fake.1') !!}";
$text[2] = "{!! trans('users.fake.2') !!}";
$text[3] = "{!! trans('users.fake.3') !!}";
$text[4] = "";
$text[5] = "";
$text[6] = "";
$text[7] = "";
$text[8] = "";
$text[9] = "";
$stext[0] = "{!! trans('users.fake.0') !!}";
$stext[1] = "{!! trans('users.fake.1') !!}";
$stext[2] = "{!! trans('users.fake.2') !!}";
$stext[3] = "{!! trans('users.fake.3') !!}";
$stext[4] = "";
$stext[5] = "";
$stext[6] = "";
$stext[7] = "";
$stext[8] = "";
$stext[9] = "";

$favicon = url('assets/img/logo1.ico');
if (!empty($stud)) {
    if (!empty($stud->getFav())) {
        $favicon = $stud->getFavUrl();
    }
}


?>
        <!DOCTYPE html>
<html lang="{!! $lang !!}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! trans('Titulos.Trabajo') !!} | {!! $stud->getName() !!} </title>


    {{--EEEEE--}}

    {{--<meta name="Description" content="">--}}
    @yield('fbheader')
    {{--<title>WHS - @yield('title')</title>--}}

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
    <link rel="stylesheet" id="color" href="{!! url('portal_/css/colors/defualt.css')!!}">
    <link rel="stylesheet" href="{!! url('frontend/bootstrap/css/bootstrap.min.css')!!}">
    <link rel="stylesheet" href="{!! url('frontend/alt2.min.css') !!}">
    {{--<link rel="stylesheet" href="{!! url('frontend/alt.css') !!}">--}}
<!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{!! url('portal_/css/style2.min.css')!!}">
    <!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->

    <!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->

    @include('adsence')
    @yield('cssup')


    {{--<link rel="stylesheet" href="{!! url('frontend/bootstrap/css/bootstrap.min.css')!!}">--}}


    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css">--}}
    <link rel="stylesheet" href="{!! url('landing/js/owl-carousel/owl.theme.min.css') !!}">
    <link rel="stylesheet" href="{!! url('landing/js/owl-carousel/owl.transitions.min.css') !!}">
    {{--<link rel="shortcut icon" href="{!!url(\Config::get('logos.favicon48')) !!}"/>--}}
    <link rel="shortcut icon" href="{!!$favicon !!}"/>

    <link rel="stylesheet" href="{!! url('frontend/owl-carousel/assets/owl.carousel.min.css')!!}">
    <link rel="stylesheet" href="{!! url('frontend/css/animate.min.css')!!}">
    <link rel="stylesheet" href="{!! url('frontend/css/meanmenu.css')!!}">
    <link rel="stylesheet" href="{!! url('frontend/css/nivo-lightbox.min.css')!!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{!! url('frontend/style.min.css')!!}">
    <link rel="stylesheet" href="{!! url('css/flags.css') !!}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.min.css"
          type="text/css">
    <script type="text/javascript" async="" src="http://static.whatshelp.io/widget-send-button/js/init.js"></script>
    {{-- FACEBOOK --}}
<!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    {{--
        <meta property="og:url" content="{!!StudController::LimpiarStudFromUrl(route('MyPage',['slug'=>$user->getMySlug()])) !!}"/>
        <meta property="og:type" content="website"/>
        <meta property="og:title" content="{!! $stud->getTituloWeb() !!}"/>
        <meta property="og:description" content="{!! $stud->getSeodescripcion() !!}"/>
        <meta property="og:image" content="{!! $logo !!}"/>
        --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->
    @include('googleanalitic',['ganalitic'=>$stud->getGa()])
    <script>
        window.token = '{!! csrf_token() !!}';

        function DisableElement(el) {
            $(el).prop('disabled', true);
            return null;
        };

        function EnableElement(el, clear = true) {
            $(el).prop('disabled', false);
            if (clear === true) $(el).val('');
            return null;
        };
    </script>
{{--EEEEE--}}
<!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="{!! url('frontend/working/css/bootstrap.css')!!} ">
    <link rel="stylesheet" href="{!! url('frontend/working/css/font-awesome.min.css')!!} ">
    <link rel="stylesheet" href="{!! url('frontend/working/css/jquery-ui.css')!!} ">

    <link rel="stylesheet" type="text/css" href="{!! url('frontend/working/css/jquery.tagsinput.css')!!} ">
    <link rel="stylesheet" href="{!! url('frontend/working/css/styles.css')!!} ">
    <link rel="stylesheet" href="{!! url('frontend/working/css/responsive.css')!!} ">

    <!--[if IE 9]>
    <script src="{!! url('frontend/working/js/media.match.min.js')!!}"></script>
    <![endif]-->
    <style>
        .arena::after {
            /*background: url(http://horsesworldsale.com/landing/images/slider/1/9.jpg) repeat center center fixed;*/
            /*background: url(http://horsesworldsale.com/landing/images/slider/1/10.jpg) repeat center center fixed;*/
            background: url({!! url('landing/images/slider/1/12.jpg') !!}) repeat center center fixed;
            /*background: url(http://horsesworldsale.com/landing/images/slider/1/5.png) repeat center center fixed;*/
        }

        .flotanteRedes .iconos {
            background-image: url({!! url('css/iconos_redes.png') !!});
        }

        .candidate-profile-picture .upload-img-field {
            background-repeat: no-repeat;
        }

        @if(!empty($stud->getColor()))



        .slider-active .owl-dots .owl-dot.active span, .slider-active .owl-dots .owl-dot:hover span, a#scrollUp, .btn.btn-solid {
            background-color: {!! $stud->getColor() !!};
        }

        .slide-thumbnail .flex-active-slide img {
            border-color: {!! $stud->getColor() !!}                    !important;
        }

        #scrollUp {
            border-radius: 5px;
        }

        .owl-carousel .owl-controls .owl-nav .owl-prev, .owl-carousel .owl-controls .owl-nav .owl-next, .owl-carousel .owl-controls .owl-dot {
            color: {!! $stud->getColor() !!};
        }

        .pagination li a.active, .pagination li span.active {
            color: {!! $stud->getColor() !!};
        }

        .pagination li a:hover {
            color: {!! $stud->getColor() !!};
        }

        .contact-page-wrapper .widget:hover i {
            color: #a5a5a5 !important;
            transform: scale(1.2);
        }

        .navigation .menu-wrap .menu > li a:hover, .navigation .menu-wrap .menu > li span:hover {
            color: {!! $stud->getColor() !!};
        }

        .contact-page-wrapper .widget i {
            color: {!! $stud->getColor() !!}                                                !important;
        }

        .navigation .menu-wrap .menu > li .submenu li a:hover,
        .navigation .menu-wrap .menu > li.active a, .navigation .menu-wrap .menu > li.active span,
        .contact-page-wrapper .widget:hover i, footer .footer-bar h5 i, footer .footer-bar h5 a {
            /*color: #01889a;*/
            color: {!! $stud->getColor() !!};
        }

        .navigation .menu-wrap .menu > li .submenu {

            border-top: 2px solid{!! $stud->getColor() !!};
        }

        h1 {
            color: {!! $stud->getColor() !!}                                       !important;
        }

        ul.list li:before {
            color: {!! $stud->getColor() !!};
        }

        .f-coorp {
            color: {!! $stud->getColor() !!}                        !important;
        }

        ul.list li:hover {
            color: #a5a5a5 !important;
            /*transform: scale(1.2);*/
        }

        .mean-container a.meanmenu-reveal,
        a.coorp {
            color: {!! $stud->getColor() !!}                          !important;
        }

        .content-box .info-block h4 a:hover {
            color: {!! $stud->getColor() !!}                          !important;
        }

        /*header*/

        .owl-nextf, .owl-prevf {
            color: {!! $stud->getColor() !!};
        }

        .mean-container .mean-nav ul li a:hover {
            color: {!! $stud->getColor() !!};
        }

        .mean-container a.meanmenu-reveal span {
            background: {!! $stud->getColor() !!} none repeat scroll 0 0;
        }

        .social-media > a > .fa, .iconos > .fa {
            color: {!! $stud->getColor() !!};
        }

        .sep-inside {

            background: {!! $stud->getColor() !!}                                      !important;

        }

        {{-- borrable --}}
        .social-media > a > .fa, .iconos > .fa {
            background-color: {!! $stud->getColor() !!}               !important;
        }

        {{-- borrable --}}




        {{-- borrable --}}
        .social-media > a > .fa, .iconos > .fa {
            background-color: {!! $stud->getColor() !!}               !important;
            color: #fff !important;
        }

        @endif
.ml10 {
            margin-left: 10px;
        }

        .selectn {
            padding: 0px;
            font-size: 12px;
            color: #666;
            font-weight: normal;
            border: 1px solid #ccc;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .mp50 {
            margin-top: 50px;
        }

        .mp50 > .container > .one {
            margin-top: -35px;
        }

        .btn, .btn:hover {
            padding: 7px 15px !important;
            border-radius: 5px;

        }

        .ml5, .ml5:hover {
            margin-left: 5px !important;
        }

        .candidate-registration li input, .w100, .w100 > input {
            width: 100% !important;
        }

        .uou-custom-select .fa {
            display: none !important;
        }

        .pdt5 {
            padding-top: 5px;
        }

        body {
            background: #f5f5f5 !important;
            background-color: #f5f5f5;
        }

        h5, .h5 {
            font-size: 14px;
            line-height: 14px;
            margin: 0px;
        }

        .header-page-title {
            background: url({!! $stud->getFront()->getUrl() !!}) center center no-repeat;
        }

        .ui-slider .ui-slider-handle:before {
            display: none;
        }

        .header-page-title .title-overlay {
            background: rgba(36, 40, 47, 0.5);
        }

        .main-wrapper {
            margin-top: 10%;
        }

        .logo-wrap > a > img {
            /*max-height: 75px !important;*/
            max-width: 134px;
            /*margin-top: -25px;*/
        }

        .text-head {
            color: #fff;
        }

        .pd0s {
            padding-bottom: 0px !important;
        }

        .header-page-title {
            margin-top: 90px !important;
        }

        .candidate-single-content label {
            text-transform: none;
        }

        .navigation .menu-wrap .menu > li a, .navigation .menu-wrap .menu > li span {
            color: #444;
            cursor: pointer;
            display: block;
            font-family: "Raleway", sans-serif;
            font-size: 15px;
            font-weight: 500;
            position: relative;
            text-transform: uppercase;
            transition: all .2s ease-out 0s;
        }

        .header-extense {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
        }

        .mobile-menu-area {
            margin-top: 0px;
        }

        @if(!empty($stud->getColor()))

        .skill-edit-content .ui-slider .ui-slider-handle, .ui-slider .ui-slider-range, .skill-edit-content .ui-widget-content, .btn-default {
            background: {!! $stud->getColor() !!}             !important;
        }

        .skill-edit-content .ui-slider .ui-slider-handle {
            border: 3px solid{!! $stud->getColor() !!};
            box-shadow: inset 2px 2px 2px{!! $stud->getColor() !!};
            background: {!! $stud->getColor() !!}             !important;

        }

        @endif
        .candidate-general-info ul.candidate-registration li input {
            adding: 0px;
            font-size: 12px;
            color: #666;
            font-weight: normal;
            border: 1px solid #ccc;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .candidate-general-info ul.candidate-registration li input,
        .candidate-general-info ul.candidate-registration li select {
            height: 40px;
            padding: 9px;
        }

        .newfoot > .container-fluid > .row {
            padding-top: 25px;
            padding-bottom: 10px;
            padding-left: 10%;
            padding-right: 10%;
        }

        .raya {
            border-left: 1px solid #7e8082;
            page-break-inside: avoid;
            padding-top: 10px;
            padding-left: 10px;
            margin-bottom: 20px;
            min-height: 90px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .p-l-10:focus, .p-l-10:hover, .p-l-10 {
            padding-left: 10px !important;
        }

        footer .footer-bar {
            margin-top: 0px;
        }
    </style>
    <script>
        window.UrlEstado = "{!! route('state.ajax') !!}";
        window.token = '{!! csrf_token() !!}';
        window.UrlCiudad = "{!! route('city.ajax') !!}";
    </script>

</head>

<body>
@if(empty($editado))
    {{--@include('frontend.landing.studs.headers.top')--}}
    @include('frontend.landing.studs.partials.messenger')
    {{--@include('googletranslate')--}}

    @if(!empty($stud->getFacebook()->getUrlPage())or !empty($stud->getTwitter()->getUrlPage()) or !empty($stud->getYoutube()->getUrlPage()))
        <div class="flotanteRedes">
            @if(!empty($stud->getFacebook()->getUrlPage()))
                <a href="{!! $stud->getFacebook()->getUrlPage() !!}" target="_blank" title="">
                    <div class="iconos ">
                        <i class="fa fa-facebook-square"></i>
                    </div>
                </a>
            @endif
            @if(!empty($stud->getTwitter()->getUrlPage()))
                <a href="{!! $stud->getTwitter()->getUrlPage() !!}" target="_blank" title="">
                    <div class="iconos ">
                        <i class="fa fa-twitter"></i>
                    </div>
                </a>
            @endif
            @if(!empty($stud->getPinterest()->getUrlPage()))
                <a href="{!! $stud->getPinterest()->getUrlPage() !!}" target="_blank" title="">
                    <div class="iconos ">
                        <i class="fa fa-pinterest"></i>
                    </div>
                </a>
            @endif
            @if(!empty($stud->getInstagram()->getUrlPage()))
                <a href="{!! $stud->getInstagram()->getUrlPage() !!}" target="_blank" title="">
                    <div class="iconos ">
                        <i class="fa fa-instagram"></i>
                    </div>
                </a>
            @endif
            @if(!empty($stud->getYoutube()->getUrlPage()))
                <a href="{!! $stud->getYoutube()->getUrlPage() !!}" target="_blank" title="">
                    <div class="iconos ">
                        <i class="fa fa-youtube"></i>
                    </div>
                </a>
            @endif
            {{--
            <div class="iconos inglaterra">
                <a href="#" title="Español"></a>
            </div>
            <div class="iconos espana">
                <a href="#" title="English"></a>
            </div>
            <div class="iconos rusia">
                <a href="#" title="Ruso"></a>
            </div>
            --}}
        </div>
    @endif
    @if($stud->getHeader() == 0)
        @include('frontend.landing.studs.headers.top',['logo'=>$logo])
    @elseif($stud->getHeader() == 1)
        @include('frontend.landing.studs.headers.top1',['logo'=>$logo])
    @else
        @include('frontend.landing.studs.headers.top',['logo'=>$logo])
    @endif
@endif
<div id="main-wrapper contd">

    {{--
        <header id="header">
            <div class="header-top-bar">
                <!--
                HEADER TOP BAR WITH NOTIFICATION FOR REGISTER USER
                -->

                <div class="header-notification-bar" style="display:none;">
                    <div class="register-user">

                        <div class="container">
                            <div class="row">

                                <div class="col-md-3 col-sm-3">
                                    <div class="logo-section">
                                        <a href="index.html"><img src="img/logo-bu.png" alt=""></a>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-5">
                                    <div class="search-form">

                                        <form action="#">
                                            <button class="dropdown-search"><i class="fa fa-angle-down"></i> <i
                                                        class="fa fa-bars"></i></button>
                                            <input type="search" placeholder="Search...">
                                            <button class="search-button"><i class="fa fa-search"></i></button>
                                        </form>

                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-4">
                                    <div class="notification-section text-right">

                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fa fa-envelope-o"></i></a><span
                                                        class="new-notification">3</span></li>
                                            <li><a href="#"><i class="fa fa-bell-o"></i></a><span
                                                        class="new-notification">3</span></li>
                                            <li class="user-profile-pic"><a href="#"><img
                                                            src="../frontend/img/content/agent-img-1.jpg" alt=""></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div> <!-- end .row -->
                        </div> <!-- end .container -->
                    </div> <!-- end .register-user -->
                </div> <!-- end. header-notification-bar  -->

                <!--
                END HEADER NOTIFICATION TOP BAR
                -->

                <!--
                HEADER TOP BAR FOR NON REGISTER USER
                -->

                <div class="header-notification-bar">
                    <div class="non-register-user">

                        <div class="container">
                            <div class="row">

                                <div class="col-md-3 col-sm-3">
                                    <div class="logo-section">
                                        <a href="index.html"><img src="img/logo-bu.png" alt=""></a>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-5">
                                    <div class="search-form">

                                        <form action="#">
                                            <button class="dropdown-search"><i class="fa fa-caret-down"></i> <i
                                                        class="fa fa-bars"></i></button>
                                            <input type="search" placeholder="Search..." class="topbar-search-input">
                                            <button class="search-button"><i class="fa fa-search"></i></button>
                                        </form>

                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-4">
                                    <div class="notification-section text-right">

                                        <ul class="list-inline">
                                            <li><a href="#">EN<i class="fa fa-caret-down"></i></a>
                                                <ul>
                                                    <li><a href="#">DE</a></li>
                                                    <li><a href="#">ES</a></li>
                                                    <li><a href="#">IT</a></li>
                                                </ul>

                                            </li>
                                            <li><a href="#">Login</a></li>
                                            <li><a href="#">Register</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div> <!-- end .row -->
                        </div> <!-- end .container -->
                    </div> <!-- end .visitors-top-bar -->
                </div> <!-- end. header-notification-bar  -->


                <!--
                END HEADER TOP BAR FOR WITHOUT LOGIN USER
                -->

                <!-- Navigation -->
                <div class="main-navbar">

                    <nav class="navbar navbar-default">
                        <div class="container">

                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                        data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="index.html"><img src="img/logo-bu.png" alt=""></a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class=""><a href="index.html">Home</a></li>

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-haspopup="true"
                                           aria-expanded="false">Job
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="job-search.html">job search</a></li>
                                            <li><a href="job-preview.html">Job Preview</a></li>
                                            <li><a href="job-registration(full-width).html">Job Registration
                                                    (full-width)</a></li>
                                            <li><a href="job-registration(sidebar).html">Job Registration (sidebar)</a></li>

                                        </ul>
                                    </li>
                                    <li class="dropdown active">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-haspopup="true"
                                           aria-expanded="false">Candidate
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="candidate-profile.html">candidate profile</a></li>
                                            <li><a href="candidate-registration.html">Candidate registration</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="professionals.html">Professionals</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-haspopup="true"
                                           aria-expanded="false">Our clients
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="clients.html">Our clients</a></li>
                                            <li><a href="add-client.html">Quick add client</a></li>
                                            <li><a href="client-profile(tab1).html">Client profile</a></li>
                                            <li><a href="client-profile(tab2).html">Client team</a></li>
                                            <li><a href="client-profile(tab3).html">Applicants</a></li>
                                            <li><a href="client-registration.html">Client registration</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-haspopup="true"
                                           aria-expanded="false">Agent
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="our-agents.html">Our agents</a></li>
                                            <li><a href="agent-profile.html">Agent profile</a></li>
                                            <li><a href="add-agents.html">Add agent</a></li>
                                        </ul>
                                    </li>
                                    <!-- <li><a href="#">Blog</a></li> -->
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-haspopup="true"
                                           aria-expanded="false">Registration
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="register-process1.html">Registration step 1</a></li>
                                            <li><a href="register-process2.html">Registration step 2</a></li>
                                            <li><a href="register-process3.html">Registration step 3</a></li>
                                            <li><a href="register-process4.html">Registration step 4</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                </ul>

                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container -->
                    </nav>
                </div> <!-- main-navbar -->
            </div>
            <!-- end .header-top-bar -->
        </header> <!-- end #header -->
        --}}

    {{-- CARLOS cambiar registro por edicion--}}
    @include('frontend.landing.studs.partials.principal',['stud'=>$stud,'titulo'=>trans('trabajo.headt'),'texto'=>trans('trabajo.getdata')])
    {{--
    <div class="header-page-title clearfix">
        <div class="title-overlay"></div>
        <div class="container">
            <h1><span class="text-head">
                    {!! trans('trabajo.headt') !!}
                </span></h1>
            <ol class="breadcrumb">
                <li>
                    <span class="text-head">{!! $stud->name !!}</span>

                </li>

            </ol>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Candidate Registration</li>
            </ol>
        </div> <!-- end .container -->

    </div> <!-- end .header-page-title -->
    --}}

    <div id="page-content">
        <div class="container">
            <div class="page-content">
                <div class="">

                    <!--<ul class="nav nav-tabs">-->
                    <!--<li class="active"><a href="#candidate-profile">Porfile</a></li>-->
                    <!--<li><a href="#candidate-cv">CV</a></li>-->
                    <!--<li><a href="#candidate-documents">Documents</a></li>-->
                    <!--<li><a href="#candidate-protfolio">Portfolio</a></li>-->
                    <!--<li><a href="#candidate-blog">Blog</a></li>-->
                    <!--<li><a href="#candidate-contacts">Contacts</a></li>-->
                    <!--</ul>-->

                    <div class="tab-content">
                        <div class="tab-pane active mt20" id="candidate-profile">
                            @if(empty($editado))

                                <form enctype="multipart/form-data" class="row"
                                      action="{!!StudController::LimpiarStudFromUrl(route('TrabajoIndexPost',['slug'=>$stud->slug])) !!}"
                                      method="post">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="studid" value="{!! $stud->id !!}">
                                    @include('frontend.trabajos.partials.left')
                                    @include('frontend.trabajos.partials.right')


                                </form> <!-- end .row -->
                            @else

                                <form enctype="multipart/form-data" class="row"
                                      action="{!!StudController::LimpiarStudFromUrl(route('TrabajoIndexPost',['slug'=>$stud->slug])) !!}"
                                      method="post">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="studid" value="{!! $stud->id !!}">
                                    @include('frontend.trabajos.partials.leftedit')
                                    @include('frontend.trabajos.partials.right')


                                </form> <!-- end .row -->
                            @endif
                        </div> <!-- end .tabe pane -->

                        {{--
                                                <div class="tab-pane" id="candidate-cv">
                                                    <h3 class="tab-title">Profile</h3>
                                                    <p>Here goes the content</p>
                                                </div> <!-- end .tab-pane -->

                                                <div class="tab-pane" id="candidate-documents">
                                                    <h3 class="tab-title">Products/Services</h3>
                                                    <p>Here goes the content</p>
                                                </div> <!-- end .tab-pane -->

                                                <div class="tab-pane" id="candidate-protfolio">
                                                    <h3 class="tab-title">Portfolio</h3>
                                                    <p>Here goes the content</p>
                                                </div> <!-- end .tab-pane -->
                        --}}
                    </div> <!-- end .tab-content -->
                </div> <!-- end .responsive-tabs.dashboard-tabs -->

            </div> <!-- end .page-content -->
        </div> <!-- end .container -->
    </div> <!-- end #page-content -->
    {{--@include('frontend.trabajos.partials.foot')--}}
    @if(empty($editado))
        @include('frontend.landing.studs.footer.foot',['user'=>$user])
    @endif


</div> <!-- end #main-wrapper -->

<!-- Scripts -->
{{--<script src="{!! url('frontend/working/js/jquery-3.1.1.min.js')!!}"></script>--}}
<script src="{!! url('frontend/working/js/jquery.ba-outside-events.min.js')!!}"></script>
<script src="{!! url('frontend/working/js/jquery.inview.min.js')!!}"></script>
<script src="{!! url('frontend/working/js/jquery.responsive-tabs.js')!!}"></script>
<script src="{!! url('frontend/working/js/jquery.tagsinput.min.js')!!}"></script>
<script src="{!! url('frontend/working/js/owl.carousel.js')!!}"></script>
<script>
            @php
                $paistrabajo = \Session::get('pais_id');
                $paistrabajo = (!empty($paistrabajo))?$paistrabajo:0;
            @endphp
    var pai = {!! $paistrabajo !!};
    var edo = 0;

</script>

{{--<script src="{!! url('frontend/working/js/bootstrap.js')!!}"></script>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="{!! url('frontend//js/jquery.meanmenu.min.js')!!}"></script>
<script src="{!! url('frontend/working/js/jquery-ui.js')!!}"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=true&key=AIzaSyAWBy20udR6mPH_V4Qm9_7Fn5BoyyVyzyA&libraries=places"></script>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script src="{!! url('frontend/working/js/scripts.js')!!}"></script>

<script type="text/javascript" src="{!! url('frontend/js/plugins.js')!!}"></script>
<script type="text/javascript" src="{!! url('frontend/js/js.min.js')!!}"></script>
<script src="{!! url('landing/js/jquery-ui.min.js')!!}"></script>
<script src="{!! url('js/jquery.touch.min.js')!!}"></script>

<script src="{!! url('phone/js/intlTelInput.js') !!}"></script>


<script type="text/javascript">
    $('#tags').tagsInput();

    bkLib.onDomLoaded(function () {
        nicEditors.editors.push(
            new nicEditor().panelInstance(
                document.getElementById('myNicEditor')
            )
        );
        nicEditors.editors.push(
            new nicEditor().panelInstance(
                document.getElementById('myNicEditor2')
            )
        );

    });
    //bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    {{--

    var input = document.getElementById('foto');
    var preview = document.querySelector('.preview');
    input.style.opacity = 0;
    input.addEventListener('change', updateImageDisplay);
    function updateImageDisplay() {
        while(preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        var curFiles = input.files;
        if(curFiles.length === 0) {
            var para = document.createElement('p');
            para.textContent = 'No files currently selected for upload';
            preview.appendChild(para);
        } else {
            var list = document.createElement('ol');
            //preview.appendChild(list);
            for(var i = 0; i < curFiles.length; i++) {
                var listItem = document.createElement('li');
                var para = document.createElement('p');
                if(validFileType(curFiles[i])) {
                    para.textContent = 'File name ' + curFiles[i].name + ', file size ' + returnFileSize(curFiles[i].size) + '.';
                    var image = document.createElement('img');
                    image.src = window.URL.createObjectURL(curFiles[i]);

                    listItem.appendChild(image);
                    listItem.appendChild(para);

                } else {
                    list.appendChild(listItem);

                    /*
                    para.textContent = 'File name ' + curFiles[i].name + ': Not a valid file type. Update your selection.';
                    */
                    listItem.appendChild(image);
                    listItem.appendChild(para);

                }

                list.appendChild(listItem);
            }
        }
    }
    var fileTypes = [
        'image/*',

    ]

    function validFileType(file) {
        for(var i = 0; i < fileTypes.length; i++) {
            if(file.type === fileTypes[i]) {
                return true;
            }
        }

        return false;
    }
    --}}
    $(".numbers").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            //$("#errmsg").html("Digits Only").show().fadeOut("slow");
            return false;
        }
    });
    $('.savest').on('click', function () {
        $('#enviome').click();
    });
            {{--
            $(".telefonos").intlTelInput({
                // allowDropdown: false,
                // autoHideDialCode: false,
                // autoPlaceholder: "off",
                // dropdownContainer: "body",
                // excludeCountries: ["us"],
                // formatOnDisplay: false,

                preferredCountries: ['mx', 'es', 'nl', 'de', 'us'],
                separateDialCode: true,
                utilsScript: "{!! url('phone/js/utils.js') !!}"

            });
            --}}
    var UrlEstado = "{!! route('state.ajax') !!}";
    window.token = '{!! csrf_token() !!}';
    var UrlCiudad = "{!! route('city.ajax') !!}";

    function DisableElement(el) {
        $(el).prop('disabled', true);
        return null;
    };

    function EnableElement(el, clear = true) {
        $(el).prop('disabled', false);
        if (clear === true) $(el).val('');
        return null;
    };

</script>
<script type="text/javascript" src="{!!url('assets/js/localidad.js')!!}"></script>
</body>
</html>
