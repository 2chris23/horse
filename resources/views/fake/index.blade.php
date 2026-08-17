@php
    $logobasic= url("landing/images/basic/logo.png");
        $logo =url("landing/images/basic/logo.png");
        $logo = url('assets/img/logo2.png');
        $espanol =  url("landing/img/es.png");
        $english =  url("landing/img/en.png");
        /*slider*/
        $dummy = url("landing/images/dummy.png");
        /*slider 1*/
        $img1 = url("landing/images/slider/1/2.jpg");
        $text1 = "LA APLICACIÓN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO";
        $stext1 ="¡INSCRÍBETE CON NOSOTROS YA!";
        $img2 =url("landing/images/slider/1/1.jpg");
        $text2 = '2 LA APLICACIÓN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';
        $stext2 ='LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';
        $horseapp ='LA APLICACIÖN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';
        $horseinscription ="¡INSCRÍBETE CON NOSOTROS YA!";
        $tittlehorsewordsale ='Horses world Sale';
        $register ="Registrate";
        $login = "Iniciar sesión";
        $imgother3 = url("landing/images/other/3.png");
        $sms = \Session::get('flash_message');
        $error = 0;
        if(!empty($sms)){
            try{
                $error = (isset($sms['error'])?$sms['error']:null);
            }catch(\ErrorException $e){
                $sms['error'] = null;
            }
            try{
                $error = (isset($sms['sms'])?$sms['sms']:null);
            }catch(\ErrorException $e){
                $sms['sms'] = null;
            }
        };
@endphp
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>{!! $tittlehorsewordsale !!}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{!! url('landing/css/bootstrap.min.css') !!}" type="text/css">
    {{-- Styles --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.min.css">
    <link rel="stylesheet" href="{!! url('landing/js/rs-plugin/css/settings.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.5.0/flexslider.min.css">
    <link rel="stylesheet" href="{!! url('landing/js/isotope/isotope.css') !!}">
    <link rel="stylesheet" href="{!! url('landing/css/jquery-ui.css') !!}">
    <link rel="stylesheet" href="{!! url('landing/js/magnific-popup/magnific-popup.css') !!}">
    <link rel="stylesheet" href="{!! url('landing/css/style.css') !!}">
    {{-- Google Fonts --}}
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Dosis:400,200,300,500,600,700,800' rel='stylesheet'
          type='text/css'>
    {{-- Icon Fonts --}}
    <link rel="stylesheet" href="{!! url('landing/css/icomoon/style.css') !!}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
          type="text/css">
    {{-- SKIN --}}
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
        .form-control:focus {
            border-color: #fa6900!important;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(250, 105, 0, 0.6);
            box-shadow: inset 0 1px 1px rgba(250, 105, 0, 0.75), 0 0 8px rgba(250, 105, 0, 0.6);
        }
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
            background-color: #2180ac;
            background-image: url("{{ asset('assets/img/login.jpg') }}");
            background-size: cover;
            background-position: center;
        }
        {{--
        .flotante {
            /*http://www.albertvalleyturf.com.au/wp-content/uploads/2017/06/oz-tuff-2.jpg*/
            background-image: url("{{ asset('assets/img/login.jpg') }}");
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
        .fa-facebook-official{
            color: #3b5998!important;
        }
    </style>
    <link rel="stylesheet" href="{!! url('landing/css/orange.css')!!}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.min.css"/>
    @include('googleanalitic')
    @include('zopin')
</head>
<body id="header6">
<div id="page-top">
</div>
<div class="cliearfix"></div>

{{-- Modal --}}
<div id="loginmod" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 10px; overflow: hidden;">
            <div class="modal-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                <button type="button" class="close" data-dismiss="modal" style="font-size: 1.5em;">&times;</button>
                <h4 class="modal-title text-center" style="color: #333; font-weight: bold;">
                    <img src="{!!url('logo.png')!!}" alt="logo" style="max-height: 40px; margin-bottom: 10px;"><br/>
                    {{trans('login.login')}}
                </h4>
            </div>
            <div class="modal-body" style="padding: 30px;">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="email" class="control-label" style="color: #555;">{{trans('login.email')}}</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope text-primary"></i></span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{trans('login.placeholder.email')}}" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block" style="color: red;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top: 15px;">
                        <div class="col-md-12">
                            <label for="password" class="control-label" style="color: #555;">{{trans('login.password')}}</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock text-primary"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="{{trans('login.placeholder.password')}}" required>
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block" style="color: red;">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 20px;">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #2180ac; border: none; padding: 10px 0; font-size: 1.1em;">
                                {{trans('login.login')}}
                            </button>
                        </div>
                    </div>

                    <div class="form-group text-center" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label style="color: #555;">
                                    <input type="checkbox" name="remember"> {{trans('login.remember')}}
                                </label>
                                <a style="margin-left:15px; color: #2180ac;" href="{{ url('/password/reset') }}">{{trans('login.forgot')}}</a>
                            </div>
                        </div>
                    </div>

                    <hr style="border-top: 1px solid #ddd; margin: 20px 0;">

                    <div class="form-group text-center">
                        <div class="col-md-6 col-xs-6">
                            <a href="#" class="btn btn-block" style="background-color: #3b5998; color: white;">
                                <i class="fa fa-facebook"></i> <span class="hidden-xs">{{trans('login.facebook')}}</span>
                            </a>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <a href="#" class="btn btn-block" style="background-color: #d34836; color: white;">
                                <i class="fa fa-google-plus"></i> <span class="hidden-xs">{{trans('login.google')}}</span>
                            </a>
                        </div>
                    </div>
                    
                    <div class="form-group text-center" style="margin-top: 20px; margin-bottom: 0;">
                        <div class="col-md-12">
                            <span style="color: #555;">{{trans('login.acount')}}</span>
                            <a href="{{url('register')}}" style="color: #2180ac; font-weight: bold;">{{trans('login.sign_up')}}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="cliearfix"></div>
<div class="outer-wrapper">
    <div class="header-wrap">
        <div id="header-main-sticky-wrapper" class="sticky-wrapper"
             style="background:#fff !important; width:100%; position: relative; z-index: 1000; border-bottom: 1px solid #eee; padding: 5px 0;">
            <header id="header-main" style="background:#fff !important;">
                <div class="container">
                    <div class="navbar yamm navbar-default" style="background:transparent; border:none; margin-bottom:0;">
                        <div class="navbar-header">
                            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1"
                                    class="navbar-toggle">
                                <span class="icon-bar"> </span>
                                <span class="icon-bar"> </span>
                                <span class="icon-bar"> </span>
                            </button>
                            <a href="{{ url('/') }}" class="navbar-brand">
                                <img src="{!! $logo !!}" style="max-height: 40px; margin-top: 2px;" alt="Logo">
                            </a>
                        </div>

                        {{-- SEARCH --}}
                        {{--
                        <div class="header-x pull-right">
                            <div class="s-search">
                                <div class="ss-trigger">
                                    <i class="icon-search2">
                                    </i>
                                </div>
                                <div class="ss-content">
                                <span class="ss-close icon-cross2"> </span>
                                    <div class="ssc-inner">
                                        <form>
                                            <input type="text" placeholder="Type Search text here...">
                                            <button type="submit">
                                                <i class="icon-search2">
                                                </i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        --}}
                        <div id="navbar-collapse-1" class="navbar-collapse collapse navbar-right">
                            <ul class="nav navbar-nav">
                                {{--
                                <li class="page-scroll active">
                                    <a href="#page-top">Home</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="#1">About Us</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="#2">Services</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="#3">Portfolio</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="#4">Features</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="#6">Latest Product</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="#5">Blog</a>
                                </li>
                                --}}

                                <li class="page-scroll dropdown">
                                    <a href="https://www.smartsupp.com/es/features#" id="langsDropdown"
                                       class="account-lang dropdown-toggle" data-toggle="dropdown" style="    margin-top: 4px;">
                                        <span class="flag flag-es"></span> <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="langsDropdown">
                                        <li class="">
                                            <a rel="nofollow" href="#">
                                                <span class="flag flag-en"></span> English
                                            </a>
                                        </li>
                                        <li class="">
                                            <a rel="nofollow" href="#">
                                                <span class="flag flag-de"></span> Deutsch
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a rel="nofollow" href="#">
                                                <span class="flag flag-es"></span> Español
                                            </a>
                                        </li>
                                        <li class="">
                                            <a rel="nofollow" href="#">
                                                <span class="flag flag-fr"></span> Français
                                            </a>
                                        </li>
                                        <li class="">
                                            <a rel="nofollow" href="#">
                                                <span class="flag flag-it"></span> Italiano
                                            </a>
                                        </li>
                                        <li class="">
                                            <a rel="nofollow" href="#">
                                                <span class="flag flag-nl"></span> Nederlands
                                            </a>
                                        </li>
                                        <li class="">
                                            <a rel="nofollow" href="#">
                                                <span class="flag flag-br"></span> Português
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="page-scroll">
                                    <a href="{{ url('login') }}" class="btn btn-small btn-single" data-toggle="modal" data-target="#loginmod"> {{$login}}</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="{{ url('login') }}" class="btn btn-small btn-max">{{$register}}</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </div>
    {{-- SLIDER --}}
    <div class="slider-wrap">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-saveperformance="on"
                        data-title="Ken Burns Slide">
                        {{-- MAIN IMAGE --}}
                        <img src="{!! $dummy !!}" alt="2" data-lazyload="{!! $img1 !!}"
                             data-bgposition="right top" data-kenburns="off" data-duration="12000"
                             data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100"
                             data-bgpositionend="center bottom">
                        <div class="tp-caption tentered_white_huge lft tp-resizeme" data-endspeed="300"
                             data-easing="Power4.easeOut" data-start="400" data-speed="600" data-y="210"
                             data-hoffset="0" data-x="center"
                             style="    color: #fff;
							text-transform: uppercase;
							font-size: 40px;
							letter-spacing: 6px;
							font-family: Open Sans;
							font-weight: 400;
							"
                        >
                            {{$text1}}
                        </div>
                        <div class="tp-caption tentered_white_huge lfb tp-resizeme" data-endspeed="300"
                             data-easing="Power4.easeOut" data-start="800" data-speed="600" data-y="260"
                             data-hoffset="0" data-x="center"
                             style="    color: #fff;
							font-size: 13px;
							text-transform: uppercase;
							letter-spacing: 10px;
							"
                        >
                            {{$stext1}}
                        </div>
                        {{--
                    <div style="float:left; margin-right:20px;">
                        <a href="http://ckthemes.com/html/maxima/maxima/index.html"
                           alt="PayPal – The safer, easier way to pay online."
                           class="pull-left tp-caption lfb tp-resizeme rs-parallaxlevel-0"
                           data-x="380"
                           data-y="400"
                           data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                           data-speed="500"
                           data-start="1200"
                           data-easing="Power3.easeInOut"
                           data-splitin="none"
                           data-splitout="none"
                           data-elementdelay="0.1"
                           data-endelementdelay="0.1"
                           data-linktoslide="next"
                           style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;padding:15px 28px;
                        color: #fff;
                        text-transform: uppercase;
                        border: none;
                        background:#000;
                        font-size: 12px;
                        letter-spacing: 3px;
                        font-family: Montserrat;
                        border-radius: 0px;
                        display: table;
                        transition: .4s;
                        ;">Live Demo</a>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="ckthemes@gmail.com">
                            <input type="hidden" name="lc" value="IN">
                            <input type="hidden" name="item_name"
                                   value="Maxima - Multipurpose Bootstrap HTML Template">
                            <input type="hidden" name="amount" value="21.00">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="button_subtype" value="services">
                            <input type="hidden" name="no_note" value="0">
                            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_SM.gif:NonHostedGuest">
                            <button border="0" name="submit" alt="PayPal – The safer, easier way to pay online."
                                    class="tp-caption lfb tp-resizeme rs-parallaxlevel-0"
                                    data-x="550"
                                    data-y="400"
                                    data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="500"
                                    data-start="1200"
                                    data-easing="Power3.easeInOut"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-elementdelay="0.1"
                                    data-endelementdelay="0.1"
                                    data-linktoslide="next"
                                    style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;padding:15px 28px;
                        color: #fff;
                        text-transform: uppercase;
                        border: none;
                        background:#000;
                        font-size: 12px;
                        letter-spacing: 3px;
                        font-family: Montserrat;
                        border-radius: 0px;
                        display: table;
                        transition: .4s;
                        ;"
                                    border="0" name="submit" alt="PayPal – The safer, easier way to pay online."
                                    class="button btn-border btn-small">
                                <i class="icon-bag">
                                </i>&nbsp; Pro Version
                            </button>
                        </form>
                    </div>
                        --}}
                    </li>
                    {{-- SLIDE  --}}
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-saveperformance="on"
                        data-title="Ken Burns Slide">
                        {{-- MAIN IMAGE --}}
                        <img src="{!! $dummy !!}" alt="2" data-lazyload="{!! $img2 !!}"
                             data-bgposition="right top" data-kenburns="off" data-duration="12000"
                             data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100"
                             data-bgpositionend="center bottom">
                        <div class="tp-caption tentered_white_huge lft tp-resizeme" data-endspeed="300"
                             data-easing="Power4.easeOut" data-start="400" data-speed="600" data-y="280"
                             data-hoffset="0" data-x="center"
                             style="    color: #fff;
							text-transform: uppercase;
							font-size: 40px;
							letter-spacing: 6px;
							font-family: Montserrat;
							font-weight: 400;
							"
                        >
                            {{ $text2 }}
                        </div>
                        <div class="tp-caption tentered_white_huge lfb tp-resizeme" data-endspeed="300"
                             data-easing="Power4.easeOut" data-start="800" data-speed="600" data-y="350"
                             data-hoffset="0" data-x="center"
                             style="    color: #fff;
							font-size: 13px;
							text-transform: uppercase;
							letter-spacing: 10px;
							"
                        >
                            {{$stext2}}
                        </div>
                        {{--
                        <a href="http://ckthemes.com/html/maxima/maxima/index.html"
                           alt="PayPal – The safer, easier way to pay online."
                           class="pull-left tp-caption lfb tp-resizeme rs-parallaxlevel-0"
                           data-x="380"
                           data-y="400"
                           data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                           data-speed="500"
                           data-start="1200"
                           data-easing="Power3.easeInOut"
                           data-splitin="none"
                           data-splitout="none"
                           data-elementdelay="0.1"
                           data-endelementdelay="0.1"
                           data-linktoslide="next"
                           style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;padding:15px 28px;
							color: #fff;
							text-transform: uppercase;
							border: none;
							background:#000;
							font-size: 12px;
							letter-spacing: 3px;
							font-family: Montserrat;
							border-radius: 0px;
							display: table;
							transition: .4s;
							;">Live Demo</a>
                        --}}
                        {{--
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="ckthemes@gmail.com">
                            <input type="hidden" name="lc" value="IN">
                            <input type="hidden" name="item_name" value="Maxima - Multipurpose Bootstrap HTML Template">
                            <input type="hidden" name="amount" value="21.00">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="button_subtype" value="services">
                            <input type="hidden" name="no_note" value="0">
                            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_SM.gif:NonHostedGuest">
                            <button border="0" name="submit" alt="PayPal – The safer, easier way to pay online."
                                    class="tp-caption lfb tp-resizeme rs-parallaxlevel-0"
                                    data-x="550"
                                    data-y="400"
                                    data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="500"
                                    data-start="1200"
                                    data-easing="Power3.easeInOut"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-elementdelay="0.1"
                                    data-endelementdelay="0.1"
                                    data-linktoslide="next"
                                    style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;padding:15px 28px;
							color: #fff;
							text-transform: uppercase;
							border: none;
							background:#000;
							font-size: 12px;
							letter-spacing: 3px;
							font-family: Montserrat;
							border-radius: 0px;
							display: table;
							transition: .4s;
							;"
                                    border="0" name="submit" alt="PayPal – The safer, easier way to pay online."
                                    class="button btn-border btn-small">
                                <i class="icon-bag">
                                </i>&nbsp; Pro Version
                            </button>
                        </form>
                        --}}
                    </li>
                </ul>
                <div class="tp-bannertimer">
                </div>
            </div>
        </div>
    </div>
    {{-- INNER CONTENT --}}
    {{--
        <div class="container-fluid no-padding">
            <div class="container padding80">
                <div class="col-md-8 col-md-offset-2 text-center space50" id="1">
                    <h2 class="uppercase">¿Que hacemos?</h2>
                    <p>
                        Publicamos tus ventas en los principales portales olx.es , campus, venderya.es, casinuevo.net, http://www.manuncios.es/, divendo, mitula, milanuncios,   trovit, http://www.cambalache.es/ , http://www.mercadolibre.com.mx/ , ebay, http://www.ventadecaballos.es/, http://www.anunciosdecaballos.com/ http://www.ecumercado.com/ , http://www.equirodi.es , http://www.ecumercado.com/, http://www.sporthorses.nl/,
                        gestionamos venta de caballos, entre otras cosas
                    </p>
                </div>
                <div class="container">
                    <div class="section-info ">
                        <div class="col-md-6">
                            <h4>Why Choose Us</h4>
                            <div class="space30">
                            </div>
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseOne1">
                                                Publicacion en portales
                                                <span class="fa fa-plus">
    </span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>
                                                olx.es , campus, venderya.es, casinuevo.net, http://www.manuncios.es/, divendo, mitula, milanuncios,   trovit, http://www.cambalache.es/ , http://www.mercadolibre.com.mx/ , ebay, http://www.ventadecaballos.es/, http://www.anunciosdecaballos.com/ http://www.ecumercado.com/ , http://www.equirodi.es , http://www.ecumercado.com/, http://www.sporthorses.nl/
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix space10">
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseTwo1">
                                                Publicaciones por razas
                                                <span class="fa fa-plus">
    </span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Nam ullamcorper imperdiet luctus. Vestibulum tincidunt malesuada mi, in
                                                posuere augue cursus nec. Morbi et vehicula risus, fermentum lacinia justo.
                                                Etiam tellus arcu, eleifend tristique enim rutrum iaculis risus, id
                                                tincidunt dui fringilla sed bibendum lorem.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix space10">
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseThree1">
                                                Usuarios Regisrados
                                                <span class="fa fa-plus">
    </span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Etiam cursus pellentesque neque, eget ullamcorper augue eleifend a. In sit
                                                amet pulvinar purus. Ut in nibh tortor. Nullam quis magna sed nunc facilisis
                                                blandit vel at erat. Donec blandit et nulla sed lacinia. Quisque ullamcorper
                                                tincidunt ante, ut feugiat felis consectetur ut.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix space10">
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseFour1">
                                                Yeguadas Activas
                                                <span class="fa fa-plus">
    </span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Etiam cursus pellentesque neque, eget ullamcorper augue eleifend a. In sit
                                                amet pulvinar purus. Ut in nibh tortor. Nullam quis magna sed nunc facilisis
                                                blandit vel at erat. Donec blandit et nulla sed lacinia. Quisque ullamcorper
                                                tincidunt ante, ut feugiat felis consectetur ut.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Skills we are having</h4>
                            <div class="space30">
                            </div>
                            <div id="skills">
                                <div class="b-progress-bar" data-capacity="100" data-value="97">
                                    <div class="progress-label">Publicaciones</div>
                                    <div class="progress-scale">
                                        <div style="width: 97%;" class="progress-line">
                                        </div>
                                    </div>
                                </div>
                                <div class="b-progress-bar" data-capacity="100" data-value="86">
                                    <div class="progress-label">Ventas</div>
                                    <div class="progress-scale">
                                        <div style="width: 86%;" class="progress-line m-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="b-progress-bar" data-capacity="100" data-value="78">
                                    <div class="progress-label">Yeguadas</div>
                                    <div class="progress-scale">
                                        <div style="width: 78%;" class="progress-line m-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="b-progress-bar" data-capacity="100" data-value="65">
                                    <div class="progress-label">Usuarios activos</div>
                                    <div class="progress-scale">
                                        <div style="width: 65%;" class="progress-line m-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gap" style="height: 20px;">
                            </div>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}
    <div class="clearfix"></div>
    <div class="padding80 border-top">
        <div class="container" id="2">
            <div class="col-md-8 col-md-offset-2 text-center space50">
                <h2>{{ $tittlehorsewordsale  }}</h2>
                <p>
                    {{ $horseapp  }}
                    {{ $horseinscription  }}
                </p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <i class="icon-monitor">
                            </i>
                        </div>
                        <div class="feature-box-info">
                            <h4>Yeguadas</h4>
                            <p>mas de 1500 ganaderias se nos han unido</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <i class="icon-layout">
                            </i>
                        </div>
                        <div class="feature-box-info">
                            <h4>Galeria de imagenes</h4>
                            <p>Contamos con 100 imagenes comparidas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <i class="icon-cog3">
                            </i>
                        </div>
                        <div class="feature-box-info">
                            <h4>Publicaciones compartidas</h4>
                            <p>Hemos compartido en los principales sitios www.google.com yahoo.es </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space20">
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <i class="icon-camera">
                            </i>
                        </div>
                        <div class="feature-box-info">
                            <h4> a. Crea tu página web en un segundo</h4>
                            <p>
                                Gestiona tu pagina web, configura tus caballos, información fotos, videos, precios,
                                gestiona tu ganaderia, centro hipico, de una manera muy simple.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <i class="icon-lightbulb">
                            </i>
                        </div>
                        <div class="feature-box-info">
                            <h4>Accede desde el movil o tu pc</h4>
                            <p>Accede facilmente desde tu movil, cualquier punto del mundo solo con conexion internet,
                                para controlar tu negocio de caballos</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <i class="icon-strategy">
                            </i>
                        </div>
                        <div class="feature-box-info">
                            <h4>Tu página en varios idiomas</h4>
                            <p>Tu página en varios idiomas, para que tengas clientes en todo el mundo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pattern-grey">
        <div id="stats1" class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="stats1-info">
                        <i class=" icon-camera">
                        </i>
                        <p>
                            <span class="count count1">499</span>
                        </p>
                        <h2>Publicaciones compartidas</h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats1-info">
                        <i class="icon-lock">
                        </i>
                        <p>
                            <span class="count count1">1123</span>
                        </p>
                        <h2>Publicaciones de caballos</h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats1-info">
                        <i class="icon-trophy">
                        </i>
                        <p>
                            <span class="count count1">187</span>
                        </p>
                        <h2>Yeguadas disponibles</h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats1-info">
                        <i class="icon-telescope">
                        </i>
                        <p>
                            <span class="count count1">923</span>
                        </p>
                        <h2>Usuarios registrados</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix space90">
    </div>
    {{--
    <div class="container padding70">
        <div class="text-center space40" id="register">
            <div class="row">
                <form class="col-md-6 col-md-offset-3" id="register_valid" role="form" method="POST"
                      action="{{ route('registerpost') }}">
                    <h3>{{ trans('landing.register.tittle') }}</h3>
                    <p>{{trans('landing.register.subtittle') }}</p>
                    {{ csrf_field() }}
                    <div class="form-group row ">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"> <span
                                            class="texto-host">{!! trans('login.name')  !!}</span> </span>
                                <input type="text" required placeholder="{!!trans('login.placeholder.name') !!}"
                                       id="name" name="name" class="form-control nm1"/>
                            </div>
                            <div class="alert alert-warning @if($error !=1) hidden @endif " id="nameerror">
                                <em> @if($error ==1) {!! $smss !!} @endif </em></div>
                        </div>
                    </div>
                    {{-- Correo -- }}
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-envelope "></i> </span>
                                <input type="text" placeholder="{!!trans('login.placeholder.email') !!}" name="email"
                                       id="email" class="form-control pwd1" required/>
                            </div>
                            <div class="alert alert-warning @if($error !=2) hidden @endif " id="emailerror">
                                <em> @if($error ==2) {!! $smss !!} @endif </em></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-phone "></i> </span>
                                <input type="tel" required placeholder="{!!trans('login.placeholder.phone') !!}"
                                       name="tel" id="tel" class="form-control pwd3 numbers"/>
                            </div>
                            <div class="alert alert-warning @if($error !=3) hidden @endif " id="telerror">
                                <em> @if($error ==3) {!! $smss !!} @endif </em></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"> <span
                                            class="texto-rosa">{!! trans('login.domain') !!}/</span> </span>
                                <input type="text" required placeholder="{!!trans('login.placeholder.dominio') !!}"
                                       name="domain" id="domain" class="form-control pwd2 "/>
                            </div>
                            <div class="alert alert-warning @if($error !=4) hidden @endif " id="domerror">
                                <em> @if($error ==4) {!! $smss !!} @endif </em></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <a href="#register" id="btnreg"
                               class="btn btn-small btn-max"> {!! trans('login.signup') !!} </a>
                            <input type="submit" value=" " id="btnsendreg" class="btnsendreg hidden"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
--}}
    <div class="container padding70">
        <div class="text-center " id="4">
            <h2 class="title uppercase">Crea tu página web en un segundo</h2>
            <p>Gestiona tu pagina web, configura tus caballos, información fotos, videos, precios, gestiona tu
                ganaderia, centro hipico, de una manera muy simple.</p>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="space90">
                </div>
                <ul class="features-left">
                    <li>
                        <i class="icon-mobile">
                        </i>
                        <h3>Accede desde el movil o tu pc</h3>
                        <p>
                            Accede facilmente desde tu movil, cualquier punto del mundo solo con conexion internet, para
                            controlar tu negocio de caballos
                        </p>
                    </li>
                    <li>
                        <i class="icon-hazardous">
                        </i>
                        <h3>
                            Exporta tu información a los principales portales de internet
                        </h3>
                        <p> Exporta tus caballos, y haz que los vean en todo el mundo.
                            Podrás augmentar tus ventas, y con un solo click conseguir miles de visitas y que todos te
                            conozcan.</p>
                    </li>
                    <li>
                        <i class="icon-lock">
                        </i>
                        <h3> Tu página en varios idiomas</h3>
                        <p>Tu página en varios idiomas, para que tengas clientes en todo el mundo
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4 col-sm-push-4">
                <div class="space90">
                </div>
                <ul class="features-right">
                    <li>
                        <i class="icon-lightbulb">
                        </i>
                        <h3>
                            Subida de Imagenes
                        </h3>
                        <p>
                            Suba y edite usted mismo fotos de sus instalaciones, datos de contacto, videos, mapa de
                            donde esta.
                        </p>
                    </li>
                    <li>
                        <i class="icon-strategy">
                        </i>
                        <h3>Administracion de caballos</h3>
                        <p>
                            Administre sus caballos facilmente, por raza, doma, edad, género, competición suba fotos y
                            videos
                        </p>
                    </li>
                    <li>
                        <i class="icon-globe">
                        </i>
                        <h3>Y algunas actividades mas</h3>
                        <p> Elija si mostrar o no los precios de cada caballo.
                            Vea las visitas que tiene cada caballo y finalmente exporte los anuncios de sus caballos a
                            los mejores portales de caballos de la red conectados con todo el mundo.
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4 col-sm-pull-4">
                <div>
                    <img src="{{$imgother3}}" class="img-responsive center-block" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="border-top">
    </div>
    {{-- FOOTER --}}
    {{-- FOOTER COPYRIGHT --}}
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
                        <a class="fa fa-twitter" href="#">
                        </a>
                        <a class="fa fa-facebook" href="#">
                        </a>
                        <a class="fa fa-pinterest-p" href="#">
                        </a>
                        <a class="fa fa-youtube-play" href="#">
                        </a>
                        {{-- Redes sociales facebook + twiter + youtube + instagram--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- STYLE SWITCHER
============================================= --}}
{{--
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
--}}
{{-- END STYLE SWITCHER
============================================= --}}
{{-- jQuery --}}
<script src="{!! url('landing/js/jquery.js')!!}"></script>
{{-- Plugins --}}
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
<script src="{!! url('landing/js/gmaps/greyscale.js')!!}"></script>
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
        var text = '<div class="m-t-15 col-xs-12">' +
            '    <div class="form-group text-left">' +
            '        <label for="dd4" class="col-form-label text-left">Nombre de Usuario (Email):</label>' +
            '        <div class="input-group text-left">' +
            '            <span class="input-group-addon"> <i class="fa fa-envelope text-black"> </i> </span>' +
            '            <input type="text"  class="form-control b_r_20 eml" onchange="emp(this)" onkeyup="emp(this)" onfocus="emp(this)" name="email" placeholder="Tu Email">' +
            '        </div>' +
            '    </div>' +
            '    <div class="form-group text-left">' +
            '        <label for="dd3" class="col-form-label text-left ">Contraseña: </label>' +
            '        <div class="input-group">' +
            '            <span class="input-group-addon"> <i class="fa fa-key text-black"> </i> </span>' +
            '            <input type="password"  class="form-control b_r_20 psdw" onchange="cp(this)" onkeyup="cp(this)"onfocus="cp(this)" name="password" placeholder="Tu contraseña">' +
            '        </div>' +
            '    </div>' +
            '</div>';
        swal({
            title: '<i class="fa fa-facebook-official"></i><br>Iniciar sesión con facebook',
            //type: 'info',
            html: text,
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonColor: '##fa6900',
            focusConfirm: false,
            confirmButtonText: 'Iniciar sesión',
            confirmButtonAriaLabel: 'Thumbs up, great!',
            cancelButtonText: 'Cancelar',
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