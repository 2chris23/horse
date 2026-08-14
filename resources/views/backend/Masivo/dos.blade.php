@php($moneda = '<i class="fa fa-eur"></i>')
@php($titulo = "")
@php($subtitulo = "")
@php($logo =url("portal_/images/logoportal.png"))
@php($raza=(isset($raza))?$raza:0)

@php
    $f[0]=url('landing/images/slider/1/2.jpg');
    $f[1]=url('landing/images/slider/1/6.jpg');
    $f[2]=url('landing/images/slider/1/9.jpg');
    $f[3]=url('landing/images/slider/1/8.jpg');
    if(isset($horses)) $horses_ = $horses;
    $raza = (isset($raza))?$raza:null;
    $color = (isset($color))?$color:null;
    $country = (isset($country))?$country:null;
    $state = (isset($state))?$state:null;
    $sex = (isset($sex))?$sex:null;
    $doma = (isset($doma))?$doma:null;
    $raisedmin = (isset($raisedmin))?$raisedmin:null;
    $raisedmax = (isset($raisedmax))?$raisedmax:null;
    $pricemax = (isset($pricemax))?$pricemax:null;
    $pricemin = (isset($pricemin))?$pricemin:null;
$escritorio = Agent::isDesktop();
    $f[0]=url('landing/images/slider/1/2.jpg');
$f[1]=url('landing/images/slider/1/6.jpg');
$f[2]=url('landing/images/slider/1/9.jpg');
$f[3]=url('landing/images/slider/1/8.jpg');
$lang = \Session::get('lang');
if (empty($lang)) {
$lang = 'es';
\Session::put('lang', $lang);
\Session::put('applocale', $lang);
}
App::setLocale($lang);
@endphp
@php($logo =url("portal_/images/logoportal.png"))
@php($logo =url("portal_/images/logoportal.png"))
@php($logo =url(\Config::get('logos.favicon32')))
@php($favicon =$logo)
@php
    $favicon =  url(\Config::get('logos.favicon16'));
    $logo =url(\Config::get('logos.logoh250')) ;
    //Cambio de iamgenes
        $f[0]=url('landing/images/slider/1/2.jpg');
        $f[1]=url('landing/images/slider/1/6.jpg');
        $f[2]=url('landing/images/slider/1/9.jpg');
        $f[3]=url('landing/images/slider/1/8.jpg');
    $imagen = $f[rand(0,3)];
    $error = (!empty(\Session::get('flash_message')))?\Session::get('flash_message'):null;
    if(!empty($error)){
    if(is_array($error)){
        $e = "";
            foreach($error as $k=>$v){

                $e .=$v."<br>";
            }
        $error = $e;
    //dd($e);
    }
    }
$t = '';
$key1 = $t;
@endphp
        <!DOCTYPE html>
<html lang="{!! $lang !!}">
<head>
    {{-- Logo simple negro se usa--}}

    <title>{!! trans('Titulos.Portal') !!} | {!! \Config::get('app.name') !!}</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

    @include('meta', [ 'titulo' =>  trans('Titulos.Portal'). " | " . \Config::get('app.name'), 'descripcion'=>trans('seo.portaldescription'), 'logo'=>$logo, 'key'=>trans('seo.portalkey').", $key1", ])
<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    {{--<meta name="description" content="">--}}
    <meta name="author" content="{!! \Config::get('app.name') !!}">
    {{--<title>AdForest | Largest Classifieds Portal</title>--}}
    {{--<title>Venta de Caballos | {!! \Config::get('app.name') !!}</title>--}}
<!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
    {{--<link rel="icon" href="{!! url('assets/img/logo1.ico') !!}" type="image/x-icon"/>--}}
    <link rel="icon" href="{!! $favicon !!}" type="image/x-icon"/>
    <!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{!! url('portal_/css/bootstrap.css')!!}">
    <!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{!! url('portal_/css/style.css')!!}">
    <!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
    {{--<link rel="stylesheet" href="{!! url('portal_/css/font-awesome.css')!!}" type="text/css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
          type="text/css">
    <!-- =-=-=-=-=-=-= Flat Icon =-=-=-=-=-=-= -->
    <link href="{!! url('portal_/css/flaticon.css')!!}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{!! url('portal_/css/et-line-fonts.min.css')!!}" type="text/css">
    <!-- =-=-=-=-=-=-= Menu Drop Down =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{!! url('portal_/css/forest-menu.min.css')!!}" type="text/css">
    <!-- =-=-=-=-=-=-= Animation =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{!! url('portal_/css/animate.min.css')!!}" type="text/css">
    <!-- =-=-=-=-=-=-= Select Options =-=-=-=-=-=-= -->
    <link href="{!! url('portal_/css/select2.min.css')!!}" rel="stylesheet"/>
    <!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->
    <link href="{!! url('portal_/css/nouislider.min.css')!!}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Listing Slider =-=-=-=-=-=-= -->
    <link href="{!! url('portal_/css/slider.min.css')!!}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
    <link rel="stylesheet" type="text/css" href="{!! url('portal_/css/owl.carousel.min.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! url('portal_/css/owl.theme.min.css')!!}">
    <!-- =-=-=-=-=-=-= Check boxes =-=-=-=-=-=-= -->
    <link href="{!! url('portal_/skins/minimal/minimal.css')!!}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Responsive Media =-=-=-=-=-=-= -->
    <link href="{!! url('portal_/css/responsive-media.min.css')!!}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->
    <link rel="stylesheet" id="color" href="{!! url('portal_/css/colors/defualt.css')!!}">
    <!-- =-=-=-=-=-=-= For Style Switcher =-=-=-=-=-=-= -->
    <link rel="stylesheet" id="theme-color" type="text/css" href="#"/>
    <!-- JavaScripts -->
    <script src="{!! route('Modernizer.js') !!}"></script>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.buttons.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.history.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.mobile.css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    @include('googleanalitic')
    <script>
        window.token = '{!! csrf_token() !!}';
        window.UrlEstado = "{!! route('state.ajax') !!}";
        window.UrlCiudad = "{!! route('city.ajax') !!}";
    </script>
    <style>
        .category-grid-box-1 .image {
            height: 220px;
        }

        .h-50 {
            max-height: 50px;

        }

        .h-313-234 {
            max-height: 234px !important;
            max-width: 313px !important;
        }

        .m-w-313 {
            min-width: 313px !important;
            margin-left: 22px !important;
        }

        .h-50 {
            max-height: 50px;

        }

        .h-313-234 {
            max-height: 234px !important;
            max-width: 313px !important;
        }

        .m-w-313 {
            min-width: 313px !important;
            margin-left: 22px !important;
        }

        /*Menu*/
        .corte {

            overflow: hidden;
            /*white-space: nowrap;*/
            text-overflow: ellipsis;
            height: 40px;

        }

        .corte-dow {
            position: absolute;
            bottom: -224px;
            left: 0px;
        }

        .page-header-area {
            padding-top: 190px !important;
        }

        .menu-list-items {
            background: rgb(255, 255, 255) !important;
        }

        .transparent-header .mega-menu > section.menu-list-items .menu-links > li > a {
            color: black !important;
        }

        /*Menu*/
        .mega-menu .menu-logo > li > a img {
            width: 90% !important;
            margin-top: 25px !important;;
        }

        .footer-area {
            background: rgba(0, 0, 0, 0) url({!! $imagen !!}) no-repeat scroll center top/ cover;
        }

        .page-header-area::before {
            /*background: rgba(36, 40, 47, 0.5);*/
            background: transparent;
        }

        .logo-foot {
            /*background-color: white;*/
        }

        .consulta {
            color: #a0a0a0;
            font-size: 14px;
            font-weight: 400;
        }

        @php($imagen = 'http://horsesworldsale.com/landing/images/slider/1/9.jpg')
    .page-header-area {
            background: rgba(0, 0, 0, 0) url({!! $imagen !!}) no-repeat scroll center top/ cover;
        }

    </style>

    @include('meta', [ 'titulo' =>  \Config::get('app.name'), 'descripcion'=>'', 'logo'=>$logo, ])
    <link rel="stylesheet" href="{!! route('Search.css')!!}">
    <link rel="stylesheet" href="{!! url('portal_/css/base1.css')!!}">
</head>
<body>
<!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area" style="padding-top: 145px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-page">
                    <h1>{!! $titulo !!}</h1>
                    <span>{!! $subtitulo !!}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding gray">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Middle Content Area -->
                <div class="{{--col-md-12 col-md-push-4 col-lg-8 --}} col-lg-12 col-md-12 col-xl-12 col-xs-12 col-sx-12">
                    <!-- Row -->
                    <div class="row">
                        <div class="clearfix"></div>
                        <!-- Ads Archive -->
                        <div class="posts-masonry" id="fieldhorses">
                            <div class="col-md-12 col-xs-12 col-sm-12" id="horsesplace">
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                @include('portal.listas.partials.horse',['horses'=>$horses])
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}

                            </div>

                        </div>
                        <!-- Ads Archive End -->
                        <!-- Advertizing -->
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <section class="advertising">
                                <a href="{!! route('landinghome') !!}">
                                    <div class="banner">
                                        <div class="wrapper">
                                            <span class="title">
                                                {!! trans('portal.publicidad2.titulo') !!}
                                            </span>
                                            <span class="submit">
                                                {!! trans('portal.publicidad2.subtitulo') !!}
                                                <i class="fa fa-plus-square"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- /.banner-->
                                </a>
                            </section>
                        </div>
                        <!-- Advertizing End -->
                        <div class="clearfix"></div>
                        <!-- Pagination -->
                        <!-- Pagination End -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Middle Content Area  End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
    {{-- Se usa. fondo negro --}}
    @php($logo = url(\Config('logos.blanco750X')))
    <footer class="footer-area">
        <!--Footer Upper-->
        <div class="footer-content">
            <div class="container">
                <div class="row ">
                    <!--Two 4th column-->
                    <div class="row clearfix">
                        <div class="col-xs-12 col-md-offset-2 col-md-8 column">
                            <div class="footer-widget about-widget ">
                                <div class="col-xs-offset-3 col-xs-6 text-center m-t-20 logo">
                                    {{--<div class="logo text-center" style="left: 33%; position: relative;">--}}
                                    <a href="{!! route('portal') !!}">
                                        <figure class="logofigure" style="    ">
                                            <img alt="" class="img-responsive logo-foot"
                                                 src="{!! $logo !!}">
                                        </figure>
                                    </a>
                                </div>
                                <div class="col-xs-offset-3 col-xs-6 text-center m-t-20">
                                    <p>
                                        {!! trans('portal.footertext') !!}
                                    </p>
                                </div>
                                <ul class="contact-info">

                                </ul>
                                <div class="col-xs-offset-4 col-sm-offset-5 col-xs-6 col-md-offset-5 col-md-4 social-links-two clearfix text-center">
                                    <a class="facebook img-circle" href="{!! url(\Config::get('otra.hfacebook')) !!}"
                                       target="_blank">
                                        <span class="fa fa-facebook-f">
                                        </span>
                                    </a>
                                    <a class="twitter img-circle" href="{!! url(\Config::get('otra.htwitter')) !!}"
                                       target="_blank">
                                        <span class="fa fa-twitter">
                                        </span>
                                    </a>
                                    <a class="youtube img-circle" href="{!! url(\Config::get('otra.hyoutube')) !!}"
                                       target="_blank">
                                        <span class="fa fa-youtube">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Two 4th column End-->
                </div>
            </div>
        </div>
        <!--Footer Bottom-->
        <div class="footer-copyright">
            <div class="container clearfix">
                <!--Copyright-->
                <div class="copyright text-center">
                    {{--{!! trans('portal.allright') !!}--}}

                    <a href="{!! route('portal') !!}" class="copyright">
                        HorsesWoldSales.com</a> ©
                    {!! Funciones::CurrentYear()!!}
                    {!! trans('portal.allright') !!}
                    {{--All rights reserved--}}
                    {{--
                        <a
                            href="http://themeforest.net/user/scriptsbundle/portfolio" target="_blank">Scriptsbundle</a>
                            All Rights Reserved
                    --}}
                </div>
            </div>
        </div>
    </footer>
</div>

</body>
</html>

