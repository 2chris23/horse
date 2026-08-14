@php
    $lang = \Session::get('lang');
    if (empty($lang)) {
        $lang = 'es';
        \Session::put('lang', $lang);
        \Session::put('applocale', $lang);
    }
    App::setLocale($lang);


            //$text1 = trans('landing.texto1');
            //$stext1 = trans('landing.stexto1');
            //$register =trans('landing.signup');
            //$login =trans('landing.login');

            //$text2 = trans('landing.texto2');
            //$stext2 = trans('landing.stexto2');

            //$horseapp =trans('landing.horseapp');
            //$horseinscription =trans('landing.horseinscription');


        $logobasic= url("landing/images/basic/logo.png");
            $logo =url("landing/images/basic/logo.png");
            $logo = url('assets/img/logo2.png');
            $espanol =  url("landing/img/es.png");
            $english =  url("landing/img/en.png");

            /*slider*/
            $dummy = url("landing/images/dummy.png");
            /*slider 1*/
            $img1 = url("landing/images/slider/1/2.jpg");


            $img2 =url("landing/images/slider/1/1.jpg");

            //$tittlehorsewordsale ='Horses world Sale';


            $imgother3 = url("landing/images/other/3.png");
            $error = (!empty(\Session::get('flash_message')))?\Session::get('flash_message'):null;


$favicon = url('assets/img/logo1.ico');
    if (!empty($stud)) {

        if (!empty($stud->getFav())) {
            $favicon = url('uploads/' . \Config::get('aplication.favicon') . '/' . $stud->getFav());
        }
    }

@endphp
        <!DOCTYPE html>
<html lang="{!! $lang !!}">
<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>{!! \Config::get('app.name') !!}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="{!! \Config::get('app.name') !!}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{!! url('landing/css/bootstrap.min.css') !!}" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.min.css">
    <link rel="stylesheet" href="{!! url('landing/js/rs-plugin/css/settings.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.5.0/flexslider.min.css">
    <link rel="stylesheet" href="{!! url('landing/js/isotope/isotope.css') !!}">
    <link rel="stylesheet" href="{!! url('landing/css/jquery-ui.css') !!}">
    <link rel="stylesheet" href="{!! url('landing/js/magnific-popup/magnific-popup.css') !!}">
    <link rel="stylesheet" href="{!! url('landing/css/style.css') !!}">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,200,300,500,600,700,800' rel='stylesheet'
          type='text/css'>

    <!-- Icon Fonts -->
    <link rel="stylesheet" href="{!! url('landing/css/icomoon/style.css') !!}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
          type="text/css">

    <!-- SKIN -->
    <link rel="stylesheet" href="{!! url('landing/css/color-scheme/default-black.css') !!}" type="text/css">
    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/pages/login3.css') !!}"/>
    <link rel="stylesheet" href="{!! url('css/flags.css') !!}" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
    </script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.2/jquery.xdomainrequest.min.js">
    </script>
    <![endif]-->

    <style>
        .button {
            font-family: arial;
        }

        .otheritem {
            max-width: 100% !important;
            background: #004097;
            padding: 20px;
            margin: 0 auto;
        }

        .noMargin {
            margin: 0 !important;
        }

        .noborder {
            border: 0 !important;
        }

        .otheritem {
            clear: both;
            overflow: hidden
        }

        .otheritem ul {
            border-top: 0px;
        }

        .otheritem ul li {
            margin: 0px 40px 0 0;
            overflow: inherit;
            float: left;
        }

        .otheritem ul li img {
            max-width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
            display: block;
            border: 1px solid #235BA9;
        }

        ul.fivecol li {
            width: 100%;
            float: left;

        }

        .fivecol {
            overflow: hidden;
        }

        .btn-max {
            border: #fa6900 1px solid;
            background-color: transparent;
            margin-top: 10px;
        }

        .btn-success {
            background-color: #fa6900;
            border-color: #fa6900;
        }

        .btn-max:hover {
            background-color: #fa6900;
            border: #fa6900 1px solid;
            margin-top: 10px;
        }

        .btn-grey {
            border: rgb(85, 85, 85) 1px solid;
            margin-top: 10px;
        }

        .btn-red {
            border: #D9534F 1px solid;
            background-color: transparent;
            margin-top: 10px;
        }

        .btn-red:hover {
            background-color: #D9534F;
            border: #D9534F 1px solid;
            margin-top: 10px;
        }

        .btn-single {
            margin-top: 10px;
        }

        /**/
        .login2_border {
            background: rgba(255, 255, 255, 0.5);
            padding: 25px 30px 20px 30px;
            box-shadow: 0 0 7px 0 #777;
            border-radius: 10px;
        }

        .login_section_top {
            margin: 10% 0;
        }

        .m-r-0 {
            margin: 0;
        }

        .m-r-5 {
            margin-right: 5px;
        }

        .m-r-20 {
            margin-right: 20px;
        }

        .m-t-5 {
            margin-top: 5px;
        }

        .m-t-10 {
            margin-top: 10px !important;
        }

        .m-t-15 {
            margin-top: 15px;
        }

        .m-t-20 {
            margin-top: 20px;
        }

        .m-t-25 {
            margin-top: 25px;
        }

        .m-t-30 {
            margin-top: 30px;
        }

        .m-t-35 {
            margin-top: 35px;
        }

        .m-t-40 {
            margin-top: 40px;
        }

        .m-l-0 {
            margin-left: 0;
        }

        .m-l-10 {
            margin-left: 10px;
        }

        .m-l-20 {
            margin-left: 20px;
        }

        .m-r-15 {
            margin-right: 15px;
        }

        .m-b-0 {
            margin-bottom: 0;
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .p-b-15 {
            padding-bottom: 15px;
        }

        .p-b-20 {
            padding-bottom: 20px;
        }

        .p-t-15 {
            padding-top: 15px;
        }

        .p-t-25 {
            padding-top: 25px;
        }

        .p-l-0 {
            padding-left: 0;
        }

        .p-r-0 {
            padding-right: 0;
        }

        .p-lr-0 {
            padding-left: 0;
            padding-right: 0;
        }

        .p-l-5 {
            padding-left: 5px;
        }

        .p-d-0 {
            padding: 0;
        }

        .p-d-15 {
            padding: 15px;
        }

        .p-l-10 {
            padding-left: 10px;
        }

        .b_r_20 {
            border-radius: 20px;
        }

        .custom-control .custom-control-indicator {
            margin-top: 13px;
        }

        .custom-checkbox .custom-control-indicator {
            border-radius: 0.25rem;
        }

        .custom-control-indicator {
            pointer-events: all !important;
        }

        .custom-control-indicator {
            position: absolute;
            top: 0.4rem;
            left: 0;
            display: block;
            width: 1rem;
            height: 1rem;
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: rgb(221, 221, 221);
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 50% 50%;

        }

        .custom-control {
            position: relative;
            display: -ms-inline-flexbox;
            display: inline-flex;
            min-height: 1.8rem;
            padding-left: 1.5rem;
            margin-right: 1rem;
            cursor: pointer;
        }

        .text-white {
            color: rgb(255, 255, 255);
        }

        .text-center {
            text-align: center !important;
        }

        .login_drop {
            width: 320px;
            position: absolute;
            margin-left: -70px;
            background: rgba(255, 255, 255, 0.5);
        }

        .login2_border {
            /*background: transparent;*/
            background: transparent;
            background-image: url(http://www.albertvalleyturf.com.au/wp-content/uploads/2017/06/oz-tuff-2.jpg);
        }

        {{--
        .flotante {
            /*http://www.albertvalleyturf.com.au/wp-content/uploads/2017/06/oz-tuff-2.jpg*/
            background-image: url(http://www.albertvalleyturf.com.au/wp-content/uploads/2017/06/oz-tuff-2.jpg);
            border-radius: 10px;
            width: 320px;
            /*clear: both;*/
            position: absolute;
            top: 23px;
            z-index: 999;
        }
--}}
        @media (min-width: 320px) {
            .flotante {
                /*left: 18%;*/
                /*left : 10px;*/
                /*float: right;*/
                top: 175px;
            }
        }

        @media (min-width: 576px) {
            .flotante {
                /*left: 18%;*/
                /*left : 10px;*/
                /*float: right;*/
                top: 180px;
            }
        }

        @media (min-width: 768px) {
            .flotante {
                /*right: 100px;*/
                /*left : 10px;*/
                /*float: right;*/
                top: 19px;

            }
        }

        @media (min-width: 867px) {
            .flotante {
                /*right: 100px;*/
                /*left : 10px;*/
                /*float: right;*/
                top: 19px;
            }
        }

        @media (min-width: 992px) {
            .flotante {
                /*right: 100px;*/
                /*left : 10px;*/
                /*float: right;*/
                top: 50px;
            }
        }

        @media (min-width: 1200px) {
            .flotante {
                /*right: 100px;*/
                /*left : 10px;*/
                /*float: right;*/
                top: 50px;
            }
        }

        .modal-dialog {
            margin-top: 100px;
        }

        .close-log {
            background: rgb(255, 255, 255);
            /* z-index: 99999; */
            border-radius: 21px;
            /* border-color: rgb(255, 0, 0); */
            /*border: 1px rgb(255, 255, 255) solid;*/
            padding-bottom: 21px;
            float: right;
            height: 31px;
            width: 33px;
            margin-top: -40px;
            /* margin-left: -19px; */
            margin-right: -43px;
        }

        .close-btn {
            background: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
            margin-right: 7px;
            font-size: 2em;
        }
    </style>
    <link rel="stylesheet" href="{!! url('landing/css/orange.css')!!}">
    <link rel="shortcut icon" href="{!!url(\Config::get('logos.favicon48')) !!}"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.min.css"/>
    @include('googleanalitic')
</head>
<body id="header6">

<div class="clearfix"></div>
<div class="clearfix"></div>
<div class="outer-wrapper">
    <div class="header-wrap">
        <div id="header-main-sticky-wrapper" class="sticky-wrapper"
             style="height: 50px; background:#f8f8f8 !important;">
            <header id="header-main">
                <div class="container">
                    <div class="navbar yamm navbar-default">
                        <div class="navbar-header">
                            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1"
                                    class="navbar-toggle logingbut">
                                <span class="icon-bar"> </span>
                                <span class="icon-bar"> </span>
                                <span class="icon-bar"> </span>
                            </button>
                            <a href="#" class="navbar-brand">
                                <img src="{!! $logo !!}" style="     width: 130px;margin-top: 2px;" alt="">
                            </a>
                        </div>

                        <div id="navbar-collapse-1" class="navbar-collapse collapse navbar-right">
                            <ul class="nav navbar-nav">

                                @include('frontend.landing.partials.languaje')

                                <li class="page-scroll">
                                    {{--<a href="{!! route('login') !!}" class="btn btn-small btn-single">{{$login}}</a>--}}
                                    {{--<a href="#loginf" id="slog" class="btn btn-small btn-single " data-toggle="modal" data-target="#loginmod"> {{$login}}</a>--}}
                                    {{--<a href="#slog" id="slog" onclick="log()"
                                       class="btn btn-small btn-single "> {{trans('landing.login')}}</a>--}}


                                <li class="page-scroll">
                                    {{--<a href="#register" class="btn btn-small btn-max">{{trans('landing.signup')}}</a>--}}

                                </li>
                                {{--
                                <li class="page-scroll">
                                    <a href="{!! route('pruebaemail') !!}" class="btn btn-small btn-max">{{$register}}>></a>
                                </li>
                                --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </div>

    <div class="clearfix"></div>
    @if(!empty($error))
        <div class="padding80 border-top">
            <div class="container" id="2">
                <div class="col-md-8 col-md-offset-2 text-center space50">



                </div>
            </div>
        </div>
    @endif
    <div class="padding80 border-top">
        @yield('content')
    </div>
    <div class="padding80 ">
        <div class="container" id="2">
            <div class="col-md-8 col-md-offset-2 text-center space50">

            </div>
        </div>
    </div>


    <div class="clearfix space90"></div>
    <div class="clearfix space90"></div>


    <!-- FOOTER -->
    <!-- FOOTER COPYRIGHT -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p>Copyright <i class="fa fa-love">
                        </i>
                        <a href="#">HorsesworldSale.com</a>
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="f-social pull-right">
                        <a class="fa fa-facebook" href="{!! url(\Config::get('otra.hfacebook')) !!}" target="_blank">
                        </a>

                        <a class="fa fa-twitter" href="{!! url(\Config::get('otra.htwitter')) !!}" target="_blank">
                        </a>

                        {{--
                        <a class="fa fa-pinterest-p" href="#" target="_blank">
                        </a>
                        --}}
                        <a class="fa fa-youtube-play" href="{!! url(\Config::get('otra.hyoutube')) !!}" target="_blank">
                        </a>
                        <!-- Redes sociales facebook + twiter + youtube + instagram-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- STYLE SWITCHER
============================================= -->
<!--
<div class="b-settings-panel">
    <div class="settings-section">
		<span>
		Boxed
		</span>
        <div class="b-switch">
            <div class="switch-handle">
            </div>
        </div>
        <span>
		Wide
		</span>
    </div>
    <hr class="dashed" style="margin: 15px 0px;">
    <h5>Main Background</h5>
    <div class="settings-section bg-list">
        <div class="bg-pattern1">
        </div>
        <div class="bg-pattern2">
        </div>
        <div class="bg-pattern6">
        </div>
        <div class="bg-pattern10">
        </div>
        <div class="bg-pattern16">
        </div>
        <div class="bg-pattern4">
        </div>
        <div class="bg-pattern5">
        </div>
        <div class="bg-pattern7">
        </div>
        <div class="bg-pattern9">
        </div>
        <div class="bg-pattern11">
        </div>
        <div class="bg-pattern12">
        </div>
        <div class="bg-pattern13">
        </div>
        <div class="bg-pattern17">
        </div>
        <div class="bg-pattern8">
        </div>
        <div class="bg-pattern14">
        </div>
        <div class="bg-pattern15">
        </div>
        <div class="bg-pattern3">
        </div>
        <div class="bg-pattern18">
        </div>
    </div>
    <hr class="dashed" style="margin: 15px 0px;">
    <h5>Color Scheme</h5>
    <div class="settings-section color-list">
        <div data-src="{!! url('landing/css/color-scheme/moderate-green.css')!!}" style="background: #8ec249">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/vivid-blue.css')!!}" style="background: #228dff">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/orange.css')!!}" style="background: #fa6900">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/brown.css')!!}" style="background: #a68c69">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/yellow.css')!!}" style="background: #fabe28">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/violet.css')!!}" style="background: #ba01ff">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/strong-cyan.css')!!}" style="background: #00b9bd">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/soft-cyan.css')!!}" style="background: #4bd5ea">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/red.css')!!}" style="background: #ff0104">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/lite-brown.css')!!}" style="background: #f3a76d">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/lime-green.css')!!}" style="background: #3bdbad">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/light-voilet.css')!!}" style="background: #aaa5ff">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/gray-green.css')!!}" style="background: #697060">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/gray-cyan.css')!!}" style="background: #aeced2">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/de-green.css')!!}" style="background: #b6cd71">
        </div>
        <div data-src="{!! url('landing/css/color-scheme/cream.css')!!}" style="background: #e0d6b2">
        </div>

    </div>
    <div class="btn-settings">
    </div>
</div>
-->
<!-- END STYLE SWITCHER
============================================= -->


<!-- jQuery -->
<script src="{!! url('landing/js/jquery.js')!!}"></script>
<!-- Plugins -->
<script src="{!! url('landing/js/bootstrap.min.js')!!}"></script>
<script src="{!! url('landing/js/menu.js')!!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script src="{!! url('landing/js/rs-plugin/js/jquery.themepunch.tools.min.js')!!}"></script>
<script src="{!! url('landing/js/rs-plugin/js/jquery.themepunch.revolution.min.js')!!}"></script>
<script src="{!! route('Easing.js') !!}"></script>
<script src="{!! url('landing/js/isotope/isotope.pkgd.js')!!}"></script>
<script src="{!! url('landing/js/jflickrfeed.min.js')!!}"></script>
<script src="{!! url('landing/js/tweecool.js')!!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.5.0/jquery.flexslider-min.js"></script>
<script src="{!! url('landing/js/easypie/jquery.easypiechart.min.js')!!}"></script>
<script src="{!! url('landing/js/jquery-ui.min.js')!!}"></script>
<script src="{!! url('js/jquery.touch.min.js')!!}"></script>
<script src="{!! url('landing/js/jquery.appear.min.js')!!}"></script>
<script src="{!! url('landing/js/jquery.inview.js')!!}"></script>
<script src="{!! url('landing/js/jquery.countdown.min.js')!!}"></script>
<script src="{!! url('landing/js/jquery.sticky.js')!!}"></script>
<script src="{!! url('landing/js/magnific-popup/jquery.magnific-popup.min.js')!!}"></script>
<script src="{!! route('Easing.js') !!}"></script>

<script src="{!! url('landing/js/main.js')!!}"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
{{--<script src="{!! url('landing/js/gmaps/greyscale.js')!!}"></script>--}}
<script src="{!! url('frontend/js/awsome.js') !!}" id="awesome-gallery-script"></script>
<script>
    {{--
    $('#slog').on('click', function () {
    var el = $('.flotante');
        if ($(el).hasClass('hidden') === true) {
            $(el).removeClass('hidden');
            return null;
        }
        $(el).addClass('hidden');
        return null;

    });
    --}}
    $(window).ready(function () {
        var w = $(window).width(), el = $('.flotante');
        var ws = w - 340;
        $(el)
            .css('overflow', 'hidden')
            .css('overflow', 'hidden')
            .css('position', 'absolute')
            .css('left', ws + "px")
            .css('float', 'right');
    });
    $(window).resize(function () {
        var w = $(window).width(), el = $('.flotante');
        var ws = w - 340;
        $(el)
            .css('overflow', 'hidden')
            .css('overflow', 'hidden')
            .css('position', 'absolute');
        if (w < 320) {
            $(el)
                .css('left', ws + "px")
                .css('float', 'right')

                .css('top', '175px');

        } else if (w < 576) {
            $(el)
                .css('left', ws + "px")
                .css('float', 'right')

                .css('top', '180px');
        } else if (w < 768
        ) {
            $(el)
                .css('margin-left', ws + 'px')
                .css('float', 'right')

                .css('top', '19px')


        }
        else if (w < 867
        ) {
            $(el)
                .css('margin-left', ws + 'px')
                .css('float', 'right')

                .css('top', '19px');

        }
        else if (w < 992) {
            $(el)
                .css('margin-left', ws + 'px')

                .css('float', 'right')

                .css('top', '50px');

        }
        else {
            $(el)
                .css('margin-left', ws + 'px')
                .css('float', 'right')
                .css('top', '50px');
        }

    });

    function log() {
        /*#navbar-collapse-1*/
        /*logingbut*/
        var v = $(window).height();
        if (v < 750) $('.logingbut').click();
        if (v < 455) {
            $('.swal2-container').css('top', '36px');
        } else {
            $('.swal2-container').css('top', '');
        }
        var text = '<div class="m-t-15 col-xs-12">' +
            '    <div class="form-group text-left">' +
            '        <label for="dd4" class="col-form-label text-left">{!! trans('landing.username') !!}:</label>' +
            '        <div class="input-group text-left">' +
            '            <span class="input-group-addon"> <i class="fa fa-envelope text-black"> </i> </span>' +
            '            <input type="text"  class="form-control b_r_20 eml" onchange="emp(this)" onkeyup="emp(this)" onfocus="emp(this)" name="email" placeholder="{!! trans('landing.youremail') !!}">' +
            '        </div>' +
            '    </div>' +
            '    <div class="form-group text-left">' +
            '        <label for="dd3" class="col-form-label text-left ">{!! trans('landing.password') !!}: </label>' +
            '        <div class="input-group">' +
            '            <span class="input-group-addon"> <i class="fa fa-key text-black"> </i> </span>' +
            '            <input type="password"  class="form-control b_r_20 psdw" onchange="cp(this)" onkeyup="cp(this)"onfocus="cp(this)" name="password" placeholder="{!! trans('landing.yourpassword') !!}">' +
            '        </div>' +
            '    </div>' +
            '</div>';
        swal({
            title: '{!! trans('landing.login') !!}',
            //type: 'info',
            html: text,
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonColor: '#fa6900',
            focusConfirm: false,
            confirmButtonText: '{!! trans('landing.login') !!}',
            confirmButtonAriaLabel: 'Thumbs up, great!',
            cancelButtonText: '{!! trans('users.cancel') !!}',
            cancelButtonAriaLabel: 'Thumbs down',
        }).then(function () {
            var es = $('.eml').val();
            var pd = $('.psdw').val();
            if (validateEmail(es)) {
                $('#email').val(es);
                $('#password').val(pd);
                $('.sendlog').click();
            } else {
                swal(
                    'Email no valido!',
                    'Por favor escribelo de nuevo',
                    'error'
                )
            }


        });

        /*, function (dismiss) {
            if (dismiss === 'cancel') {
            }
        });
    };*/
    }

    function cp(e) {
        $('#password').val($(e).val());
    }


    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function validate(e) {
        var email = $("#email").val();

        if (validateEmail(email)) {
            //$("#email").text(email + " is valid :)");
            //$("#email").css("color", "green");
        } else {
            //$("#email").text(email + " is not valid :(");
            //$("#email").css("color", "red");
        }
        return false;
    }


    function emp(e) {
        var v = $(e).val();
        $('#email').val(v);
        if (validateEmail(v)) {
            $('.swal2-confirm').prop("disabled", false);

        } else {
            $('.swal2-confirm').prop("disabled", true);
        }

    }

    $('.swal2-confirm').on('click', function () {
        var es = $('.eml').val();

        if (validateEmail(es)) {
            $('#email').val(es);
            $('.sendlog').click();
        } else {
            console.dir('correo fail');
        }

    });


    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    $('#btnreg').on('click', function (e) {
        var v, d, p, a,
            v = $('.pwd3').val();
        d = $('.pwd1');
        a = $('.nm1').val();
        p = $('.pwd2').val();
        var s = validateEmail(d.val());
        var tres = a.length;
        var uno = v.length;
        var dos = p.length;
        console.log('uno ' + uno);
        console.log('dos ' + dos);
        console.log('tres ' + tres);
        if (s === true && uno >= 6 && dos >= 4) {
            $('#btnsendreg').click();
        } else {
            if (uno < 6) {
                console.log('Telefono vacio');
                $('#telerror').html('<em>Numero invalido</em>').removeClass('hidden');
            }
            if (dos < 4) {
                console.log('dominio vacio');
                $('#domerror').html('<em>Campo requerido</em>').removeClass('hidden');
            }
            if (s !== true) {
                console.log('correo vacio');
                $('#emailerror').html('<em>Campo requerido</em>').removeClass('hidden');
            }
            if (tres < 1) {
                console.log('nombre ');
                $('#nameerror').html('<em>Campo requerido</em>').removeClass('hidden');
            }
        }
    });
    $(document).ready(function () {
        //called when key is pressed in textbox
        $(".numbers").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#errmsg").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });
    });

    //$("#validate").bind("click", validate);
    /*
    $('.swal2-confirm')
            .css("color"," rgb(255, 255, 255)")
            .css("background-color"," rgb(92, 184, 92)")
            .css("border-color"," rgb(76, 174, 76)");
    */
</script>
</body>
</html>


<script>


</script>