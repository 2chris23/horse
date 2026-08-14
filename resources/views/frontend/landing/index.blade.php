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
            $logo = url(\Config::get('logos.logoh350'));

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
            if(!empty($error)){
            if(is_array($error)){
            //dd($error);
            if(isset($error['sms'])){
            $sms = $error['sms'];
            }else{
            $sms = null;
            }


            if(isset($error['error'])){
            $error = $error['error'];
            }else{
            $error = null;
            }


            }

            }


$favicon = url('assets/img/logo1.ico');
$favicon= url(\Config::get('logos.favicon256'));
    if (!empty($stud)) {

        if (!empty($stud->getFav())) {
            $favicon = url('uploads/' . \Config::get('aplication.favicon') . '/' . $stud->getFav());
        }
    }

@endphp
@php
    $t = '';
    /*
    foreach (trans('horse.raza') as $k=>$v){
        if($k!=0){
            $t.= trans('seo.ventakey',['t'=>$v]);
        }
    }
    */
    $key1 = $t;

@endphp

        <!DOCTYPE html>
<html lang="{!! $lang !!}">
<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>{!! \Config::get('app.name') !!}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<meta name="description" content="{!! trans('seo.appdescripcion') !!}">--}}
    <meta name="keywords" content="{!! trans('seo.apptags').', '.trans('seo.portalkey')!!} ">
    <meta name="author" content="{!! \Config::get('app.name') !!}">
    <link rel="shortcut icon" href="{!!url(\Config::get('logos.favicon48')) !!}"/>
<?php $l = url(\Config::get('logos.fb')); ?>
{{--'titulo' =>  \Config::get('app.name'),--}}
@include('meta',
  [

'titulo' =>  \Config::get('app.name'),
'key'=>trans('seo.portalkey').", $key1",
'descripcion'=>trans('seo.appdescripcion'),
'logo'=>$l,
  ])


@include('adsence')
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
    <link rel="stylesheet" href="{!! url('landing/css/landing.min.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! route('homecss')!!}">
    <link rel="stylesheet" href="{!! url('landing/css/orange.css')!!}">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.min.css"/>
    @include('googleanalitic')
    @include('zopin')
</head>
<body id="header6">
<div class="clearfix"></div>

<!-- Modal -->
<div id="loginmod" class="modal  fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body col-xs-12 login2_border login_section_top">
                <div class="close-log">
                    <button type="button" class="close close-btn" data-dismiss="modal">&times;</button>
                </div>
                <div class="login_logo login_border_radius1">
                    <h3 class="text-center text-white">
                        <img src="{!!url('logo.png')!!}" alt="{!! Config::get('app.name') !!}"
                             class="admire_logo"><br/>
                        <span class="m-t-15">{{trans('landing.login')}}</span>
                    </h3>
                </div>
                <div class="m-t-15 col-xs-12">
                    <form class="form-horizontal" id="login_validator" role="form"
                          method="POST"
                          action="{{ url('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email"
                                   class="col-form-label text-white">{{trans('landing.email')}}</label>
                            <div class="input-group">
                                <input type="text" class="form-control b_r_20" id="email" name="email"
                                       placeholder="{{trans('landing.placeholder.email')  }}">
                                <span class="input-group-addon"> <i class="fa fa-envelope text-white"></i> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password"
                                   class="col-form-label text-white">{{trans('landing.password')}}</label>
                            <div class="input-group">
                                <input type="password" class="form-control b_r_20 pwd" id="password" name="password"
                                       placeholder="{{trans('landing.placeholder.password')  }}">
                                <span class="input-group-addon"> <i class="fa fa-key text-white"></i> </span>
                            </div>
                        </div>
                        <label for="remember"><input type="checkbox" id="remember"
                                                     name="remember">{!! Funciones::ReemplazarApostrofe(trans('login.keeplog')) !!}
                        </label>'
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <button type="submit"
                                            class="btn btn-success btn-block b_r_20 m-t-20 sendlog">{{trans('landing.login')}}</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </div>
</div><!--modal-->

<div class="clearfix"></div>
<div class="outer-wrapper">
@include('frontend.landing.partials.menu')


<!-- SLIDER -->
    @include('frontend.landing.partials.slider')
    <div class="col-xs-12 m-t-90"></div>
@if(count(session('flash_notification', collect())->toArray()) !=0)

        <div class=" col-xs-offset-3 col-xs-6 ">
            @include('flash::message')
        </div>
    @else
        <div class="clearfix"></div>
        @if(!empty($error))
            <div class="border-top">
                <div class="container" id="2">
                    <div class="col-md-8 col-md-offset-2 text-center space50">
                        @if(is_numeric($error))
                            {!!   $sms  !!}
                        @else
                            {!!   $error  !!}
                        @endif

                    </div>
                </div>
            </div>
        @endif
    @endif
    {{--
<!-- INNER CONTENT -->
    <!--
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
        -->
    --}}


    <div class=" border-top">
        <div class="container" id="2">
            <div class="col-md-8 col-md-offset-2 text-center space50">
                <h2>{{ trans('landing.tittlehorsewordsale')  }}</h2>
                <p>
                    {{ trans('landing.horseapp')  }}

                    {{ trans('landing.horseinscription')  }}

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
                            <h4>{!! trans('landing.stud.studs') !!}</h4>
                            <p>{!! trans('landing.stud.studs') !!}</p>
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
                            <h4>{!! trans('landing.gallery.tittle') !!}</h4>
                            <p>{!! trans('landing.gallery.sub') !!}</p>
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
                            <h4>{!! trans('landing.publish.tittle') !!}</h4>
                            <p>{!! trans('landing.publish.sub') !!}</p>
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
                            <h4>{!! trans('landing.web.tittle') !!}</h4>
                            <p>{!! trans('landing.web.sub') !!}</p>
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
                            <h4>{!! trans('landing.movil.tittle') !!}</h4>
                            <p>{!! trans('landing.movil.sub') !!}</p>
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
                            <h4>{!! trans('landing.ln.tittle') !!}</h4>
                            <p>{!! trans('landing.ln.sub') !!}</p>
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
                        <h2>
                            {!! trans('landing.pubcompartida') !!}
                        </h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats1-info">
                        <i class="icon-lock">
                        </i>
                        <p>
                            <span class="count count1">1123</span>
                        </p>
                        <h2>

                            {!! trans('landing.cabcompartida') !!}
                        </h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats1-info">
                        <i class="icon-trophy">
                        </i>
                        <p>
                            <span class="count count1">187</span>
                        </p>
                        <h2>
                            {!! trans('landing.yegdisponible') !!}

                        </h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats1-info">
                        <i class="icon-telescope">
                        </i>
                        <p>
                            <span class="count count1">923</span>
                        </p>
                        <h2>
                            {!! trans('landing.userreg') !!}


                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix space90">
    </div>
    @include('frontend.landing.partials.registro')

    <div class="container padding70">
        <div class="text-center " id="4">
            <h2 class="title uppercase">{!! trans('landing.web.tittle') !!}</h2>
            <p>{!! trans('landing.web.sub') !!}</p>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="space90">
                </div>
                <ul class="features-left">
                    <li>
                        <i class="icon-mobile">
                        </i>
                        <h3>
                            {!! trans('landing.movil1t') !!}
                        </h3>
                        <p>
                            {!! trans('landing.movil1s') !!}
                        </p>
                    </li>
                    <li>
                        <i class="icon-hazardous">
                        </i>
                        <h3>
                            {!! trans('landing.movil2t') !!}

                        </h3>
                        <p>
                            {!! trans('landing.movil2s') !!}
                        </p>
                    </li>
                    <li>
                        <i class="icon-lock">
                        </i>
                        <h3>{!! trans('landing.movil3t') !!}</h3>
                        <p>{!! trans('landing.movil3s') !!}</p>
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
                        <h3>{!! trans('landing.movil4t') !!}</h3>
                        <p>{!! trans('landing.movil4s') !!}</p>
                    </li>
                    <li>
                        <i class="icon-strategy">
                        </i>
                        <h3>{!! trans('landing.movil5t') !!}</h3>
                        <p>{!! trans('landing.movil5s') !!}</p>
                    </li>
                    <li>
                        <i class="icon-globe">
                        </i>
                        <h3>{!! trans('landing.movil6t') !!}</h3>
                        <p>{!! trans('landing.movil6s') !!}</p>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4 col-sm-pull-4">
                <div>

                    <img src="{{$imgother3}}" class="img-responsive center-block" alt="{!! Config::get('app.name') !!}">
                </div>
            </div>
        </div>
    </div>

    <div class="border-top">
    </div>

    <!-- FOOTER -->
    <!-- FOOTER COPYRIGHT -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p>Copyright <i class="fa fa-love">
                        </i>
                        <a href="#">
                            <span class="negro">Horses</span><span class="naranja">World</span><span class="negro">Sale.com</span>
                        </a>
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
{{--

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
--}}

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
<script src="{!! url('landing/js/jquery.sticky.min.js')!!}"></script>
<script src="{!! url('landing/js/magnific-popup/jquery.magnific-popup.min.js')!!}"></script>
<script src="{!! route('Easing.js') !!}"></script>

<script src="{!! url('landing/js/main.js')!!}"></script>
<script src="{!! route('homejs') !!}"></script>
{{--<div class="text-center">
    <label for="remember"><input type="checkbox" name="remember">{!! trans('login.keeplog') !!}</label>
</div>--}}

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
{{--<script src="{!! url('landing/js/gmaps/greyscale.js')!!}"></script>--}}
<script src="{!! url('frontend/js/awsome.js') !!}" id="awesome-gallery-script"></script>
<script>
    $(document).ready(function () {
        var hash = window.location.hash.substring(1);
        if (hash == 'login') {
            log();
        }

        {{--
        $(window).bind('hashchange', function() {
            var hash = window.location.hash.substring(1);
            console.dir(hash);
        });
        --}}
    });
</script>
</body>
</html>
