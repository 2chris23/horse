@extends('frontend.landing.studs.base',['user'=>$user,'stud'=>$stud])
@section('title', trans('Titulos.InstalacionesCliente'))
@php

    $logo =$stud->getLogo();


        $logobasic= url("landing/images/basic/logo.png");

            $espanol =  url("landing/img/es.png");
            $english =  url("landing/img/en.png");

            /*slider*/
            $dummy = url("landing/images/dummy.png");
            /*slider 1*/
            $text1 = "LA APLICACIÓN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO";
            $stext1 ="¡INSCRÍBETE CON NOSOTROS YA!";

            $text2 = '2 LA APLICACIÓN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';
            $stext2 ='LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';

            $horseapp ='LA APLICACIÖN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';
            $horseinscription ="¡INSCRÍBETE CON NOSOTROS YA!";

            $tittlehorsewordsale ='Horses Word Sale';
            $contenido ="Este contenido es de prueba";
            $contenido2 ="Caballos, ventas";
            $login = "Iniciar sesion";

            $imgother3 = url("landing/images/other/3.png");

    $d[0]= url("landing/images/slider/1/2.jpg");
    $d[1]= url("landing/images/slider/1/1.jpg");
    $d[2]= url('frontend/img/slides/s3.jpg');

    $text[0]= "{!! trans('users.fake.0') !!}";
    $text[1]= "{!! trans('users.fake.1') !!}";
    $text[2]= "{!! trans('users.fake.2') !!}";
  $textext[0]= "{!! trans('users.fake.0') !!}";
$text[1]= "{!! trans('users.fake.1') !!}";
$text[2]= "{!! trans('users.fake.2') !!}";
$text[3]= "{!! trans('users.fake.3') !!}";
$stext[0]= "{!! trans('users.fake.0') !!}";
$stext[1]= "{!! trans('users.fake.1') !!}";
$stext[2]= "{!! trans('users.fake.2') !!}";
$stext[3]= "{!! trans('users.fake.3') !!}";


for($i = 0;$i<5;$i++){
$d[$i]= url('img/horse/'.($i+1).'.jpg');
$t[$i] = $text[rand(0,3)];
$st[$i] = $stext[rand(0,3)];
}

$d[0]=url('img/pre1.jpg');
$d[1]=url('img/pre2.jpg');

$gallery1 = true;
$gallery2 = false;
$gallery3 = true;

@endphp
@section('fbheader')
    @include('meta',
    [
'titulo' => $stud->getTituloWeb(),
'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
'logo'=>$logo,
'imagenes' =>$stud->getPhotosModel(),
    ])

@endsection
@section('csstop')
    <style>

        .causes-wrapper {
            background: transparent;
        }

        .sombraizquierda {
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0.65+0,0+100;Neutral+Density */
            background: -moz-linear-gradient(left, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 100%) !important; /* FF3.6-15 */
            background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 100%) !important;; /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to right, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 100%) !important;; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#a6000000', endColorstr='#00000000', GradientType=1) !important;; /* IE6-9 */
        }

        .sombraderecha {
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0.65+0,0+100;Neutral+Density */
            background: -moz-linear-gradient(right, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 100%) !important;; /* FF3.6-15 */
            background: -webkit-linear-gradient(right, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 100%) !important;; /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to left, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 100%) !important;; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#a6000000', endColorstr='#00000000', GradientType=1) !important;; /* IE6-9 */
        }

        .texto-imagen1 {
            text-transform: uppercase;
            color: #fff !important;
            font-size: 40px;
            font-weight: 300;
        }

        .texto-imagen2 {
            /*margin: 60px !important;*/
            /*color: #000000 !important;*/
            color: #ffffff !important;
            letter-spacing: 2px;
            text-transform: uppercase;
            /*#ffffff 0.1em 0.1em 0.3em*/
        }

        .contenedor-img-sld {
            z-index: 99;
            position: absolute;
            width: 100%;
        }

        .oculto {
            display: none !important;
        }

        .principio .owl-controls .owl-prev {
            left: 10px;
        }

        .principio .owl-controls .owl-next {
            right: 10px;
        }

        .principio .owl-controls .owl-dots {
            margin-top: 0;
        }

        .principio .owl-controls .owl-next,
        .principio .owl-controls .owl-prev {
            position: absolute;
            top: 40%;
            font-size: 2em;
            -ms-transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: all ease 0.3s;
            transition: all ease 0.3s;
        }

        .principio .owl-controls .owl-prev, .principio .owl-controls .owl-next {
            top: calc(50% - 27px);
        }

        .principio .owl-controls .owl-prev {
            left: -20px;
        }

        .principio .owl-controls .owl-next {
            right: -20px;
        }

        .principio .owl-controls .owl-dots {
            margin-top: -35px;
            width: 100%;
            position: absolute;
            text-align: center;
        }

        .principio .owl-controls .owl-dot {
            background-color: rgba(255, 255, 255, 1);
            display: inline-block;
            height: 12px;
            width: 12px;
            margin: 0 5px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 50%;
        }

        .principio .owl-controls .owl-dot {
            background-color: rgba(255, 255, 255, 0.5);
        }

        .principio .owl-controls .owl-prev,
        .principio .owl-controls .owl-next {
            color: rgba(255, 255, 255, 0.5);
        }

        .owl-dot.active {
            background-color: #ff8601;
        }

        .principio .owl-controls .owl-prev:hover,
        .principio .owl-controls .owl-next:hover {
            color: #fff;
        }

        .principio .owl-controls .owl-dot.active {
            background-color: rgba(255, 255, 255, 1);
        }

        .owl-prevf, .owl-nextf {

            width: 10% !important;
            position: absolute;
            display: block !IMPORTANT;
            z-index: 3;
            padding-top: 0px;
            padding-bottom: 0px;
            top: 0px;
        }

        .causes-wrapper {
            z-index: 3;
        }

        /*.owl-next,*/
        .owl-nextf {
            right: 0px !important;
        }

        .owl-prevf {

        }

        .owl-nextf > .fa,
        .owl-prevf > .fa {
            position: absolute;
            font-size: 30px;
            color: #fff;
            /*text-shadow: 6px 6px 0px rgba(0,0,0,0.2);*/
            text-shadow: 2px 8px 6px rgba(0, 0, 0, 0.2),
            0px -5px 35px rgba(255, 255, 255, 0.3);
        }

        .owl-prevf > .fa {

            left: 50% !important;
        }

        .owl-nextf > .fa {
            right: 50% !important;
        }

        .owl-dot {
            -webkit-box-shadow: 0px 0px 8px 0.2px #928f8f;
            -moz-box-shadow: 0px 0px 8px 0.2px #928f8f;
            box-shadow: 0px 0px 8px 0.2px #928f8f;
        }

        .owl-dot.active {

        }

        /*

        .owl-next > i, .owl-prev > i,
        .owl-nextf > i, .owl-prevf > i {
            top: 50% !important;
            position: absolute !important;

        }
        .owl-controls{
            position: unset!important;
            top: 0px!important;
            left: 0px!important;
        }
        /*
        .owl-prev, .owl-next {
            color: #ffcc00 !important;
            padding-top: 23% !important;
            padding-left: 30px !important;
            padding-right: 30px !important;
            top: 0px !important;;
            margin-top: 0px !important;
            //position: relative !important;
            font-size: 35px !important;
            padding-bottom: 22% !important;
        }
    * /
        .owl-prev,.owl-prevf  {
            /*
            float: left !important;;
            left: 0px !important;
            margin-left: 0px!important;
            * /
            position: absolute;
            margin-left: -20px;
            display: block!IMPORTANT;
            top: 0px;
            position: absolute;
            /* padding-top: 41px; *-/
        padding-top:

        79
        %
        ;
        /*height: 100%;*-/
        width:

        100
        px

        ;

        }




        .owl-nextf, .owl-prevf {
            position: absolute !important;
            padding-top: 24%;
            padding-bottom: 24%;
            z-index: 5;
            font-size: 30px;
        }


        .owl-nav {
            display: none;
            width: 100% !important;
            margin-top: 0px !important;;
            position: absolute !important;;
            top: 0px !important;;
            left: 0px !important;;
            height: 600px !important;;
        }
        */

        @media (max-width: 425px) {
            /*xs*/
            .contenedor-img-sld {
                /*sin top*/

                margin-top: 0%;
            }

            .texto-imagen1 {
                font-size: 20px;
                /*font-weight: 300;*/
            }

            .texto-imagen2 {
                /*sin margen*/
                font-size: 20px;
                /*font-weight: 300;*/
            }

            .owl-nextf > .fa, .owl-prevf > .fa {
                font-size: 15px;
            }

            .owl-prevf, .owl-nextf {
                padding-top: 18%;
                padding-bottom: 18%;

            }
        }

        @media (max-width: 767px) {
            .contenedor-img-sld {
                /*sin top*/
                margin-top: 16%;
            }

            .texto-imagen1 {
                font-size: 35px;
                /*font-weight: 300;*/
            }

            .texto-imagen2 {
                /*sin margen*/
                font-size: 20px;
                display: none;
                /*font-weight: 300;*/
            }

            .owl-nextf > .fa, .owl-prevf > .fa {
                font-size: 25px;
            }

            .owl-prevf, .owl-nextf {
                padding-top: 17%;
                padding-bottom: 18%;

            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            /*sm*/
            .contenedor-img-sld {
                /*sin top*/
                margin-top: 16%;
            }

            .contenedor-img-sld {
                /*sin top*/
                margin-top: 16%;
            }

            .texto-imagen1 {
                font-size: 38px !important;
                /*font-weight: 300;*/
            }

            .texto-imagen2 {
                /*sin margen*/
                font-size: 20px;
                /*font-weight: 300;*/
            }

            .owl-nextf > .fa, .owl-prevf > .fa {
                font-size: 25px;
            }

            .owl-prevf, .owl-nextf {
                padding-top: 17%;
                padding-bottom: 18%;

            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            /*sm*/
            .contenedor-img-sld {
                /*sin top*/
                margin-top: 19%;
            }

            .texto-imagen1 {
                font-size: 38px !important;
                /*font-weight: 300;*/
            }

            .texto-imagen2 {
                /*sin margen*/
                font-size: 20px;
                padding-top: 8px;
                /*font-weight: 300;*/
            }

            .owl-nextf > .fa, .owl-prevf > .fa {
                font-size: 25px;
            }

            .owl-prevf, .owl-nextf {
                padding-top: 17%;
                padding-bottom: 18%;

            }
        }

        @media (min-width: 1200px) {
            /*lg*/
            /*sm*/
            .m-h-435 {
                max-height: 503px !important;
            }

            .contenedor-img-sld {
                /*sin top*/
                margin-top: 23%;
            }

            .texto-imagen1 {
                font-size: 40px !important;
                /*font-weight: 300;*/
            }

            .texto-imagen2 {
                /*sin margen*/
                font-size: 20px;
                padding-top: 8px;
            }

            .owl-nextf > .fa, .owl-prevf > .fa {
                font-size: 25px;
            }

            .owl-prevf, .owl-nextf {
                padding-top: 17%;
                padding-bottom: 18%;

            }
        }


    </style>
@endsection
@section('content')


    <!-- basic-slider start -->

    <div class="slider-section">
        <div class="owl-prevf sombraizquierda oculto" style="">
            <i class="fa fa-chevron-left pull-left"></i>
        </div>
        <div class="owl-nextf sombraderecha oculto" style="">
            <i class="fa fa-chevron-right pull-right"></i>
        </div>
        {{--<div class="slider-active owl-carousel mh600">--}}
        <div class="principio owl-carousel mh600">
            @php
                $sliders = $stud->getSliders();
                $tmp = count($sliders);

            @endphp
            @if(!empty(Photo::Slider($stud->id)->first()))
                {{--@if(count($sliders)>1)--}}
                @foreach($sliders as $k=>$v)

                    @include('frontend.landing.studs.partials.slider',[
                    'url'=> $v['url'],
                    'name'=> $stud->getName(),
                    'titulo'=> $v->getTitulo1(),
                'stitulo'=> $v->getTitulo2(),
                    ])
                    {{----}}
                @endforeach
            @else
                @foreach($d as $k=>$s)
                    @if($k < 3)
                        @include('frontend.landing.studs.partials.slider',[
                    'url'=> $d[$k],
                    'name'=> $stud->getName(),
                    'titulo'=> '',
                    'stitulo'=>'' ,
                    ])

                        {{--
                        'titulo'=> $text[$k],
                    'stitulo'=>$stext[$k] ,
                    --}}


                    @endif
                @endforeach
            @endif
        </div>

    </div>



    <!-- basic-slider end -->
    <!-- SLIDER -->
    {{--
    <div class="slider-section">
        <div class="tp-banner-container">
            <div class="tp-banner-full">
                <ul>
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-saveperformance="on"
                        data-title="Ken Burns Slide">
                        <!-- MAIN IMAGE -->


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
                        <!--

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
                        -->


                    </li>

                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-saveperformance="on"
                        data-title="Ken Burns Slide">
                        <!-- MAIN IMAGE -->

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
                    </li>
                </ul>
                <div class="tp-bannertimer">
                </div>
            </div>
        </div>
    </div>
    --}}
    <!-- / SLIDER -->
    <!-- Why Choose -->
    {{--
    <div class="features-wrapper one">
        <div class="container">
            <div class="section-name one">
                <h2>Why Choose Us</h2>
                <div class="short-text">
                    <h5>Here is all Reasons to Work With Us</h5>
                </div>
            </div>
            <div class="row features">
                <div class="col-md-4 col-sm-6 ">
                    <div class="feature clearfix">
                        <div class="icon_we">
    <i class="fa fa-lightbulb-o">
    </i>
    </div>
                        <h4>Great Ideas</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, maiores officia placeat
                            incidunt aperiam</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature  higlight clearfix">
                        <div class="icon_we">
    <i class="fa fa-file-text-o" aria-hidden="true">
    </i>
    </div>
                        <h4>Clear Information</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, maiores officia placeat
                            incidunt aperiam</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 hidden-sm ">
                    <div class="feature clearfix">
                        <div class="icon_we">
    <i class="fa fa-line-chart" aria-hidden="true">
    </i>
    </div>
                        <h4>Increased Profit</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, maiores officia placeat
                            incidunt aperiam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --}}

    <!-- Services -->
    {{--
    <div class="causes-wrapper">
        <div class="container">
            <div class="section-name one">
                <h2>Nuestras Instalaciones</h2>
                <div class="short-text">
                    <h5>Tenemos 555000333 hectareas para nuestros caballos</h5>
                </div>
            </div>
            <div class="causes">
                <div class="causes-list row">
                    {{--
                    @if($gallery1 == true)
                        @include('frontend.landing.studs.partials.gallery')
                    @endif
                    @if($gallery2 == true)
                        @include('frontend.landing.studs.partials.gallery2')
                    @endif
-- }}
                    @foreach($galeria  as $k=>$v)

                        <div class="cause-wrapper col-md-4 col-xs-12 col-sm-6 legal health">
                            <div class="cause content-box">
                                <div class="img-wrapper">
                                    <div class="overlay">
                                    </div>

                                    <img class="img-responsive" src="{!! $v['url'] !!}" alt=""
                                         style="max-height: 250px; max-width: 320px">
                                </div>
                                <div class="info-block">
                                    <h4>
                                        <a href="#">{!! $v['url'] !!}</a>
                                    </h4>
                                    <p>
                                        Con accesos practicos.---
                                    </p>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    {{--
                    <div class="cause-wrapper col-md-4 col-xs-12 col-sm-6 legal health">
                        <div class="cause content-box">
                            <div class="img-wrapper">
                                <div class="overlay">
                                </div>

                                <img class="img-responsive" src="{!! $d[0] !!}" alt="">
                            </div>
                            <div class="info-block">
                                <h4>
                                    <a href="#">Los Mehores Establos</a>
                                </h4>
                                <p>
                                    Con accesos practicos.---
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="cause-wrapper col-md-4 col-xs-12 col-sm-6 education poor health legal">
                        <div class="cause content-box">
                            <div class="img-wrapper">
                                <div class="overlay">
                                </div>
                                <img class="img-responsive" src="{!! $d[1] !!}" alt="">
                            </div>
                            <div class="info-block">
                                <h4>
                                    <a href="#">Excelentes condiciones</a>
                                </h4>
                                <p>contamos con todo lo necesario para el parto</p>
                            </div>
                        </div>
                    </div>
                    <div class="cause-wrapper col-md-4 col-xs-12 col-sm-6 ugent poor animals-wildlife hidden-sm  ">
                        <div class="cause content-box">
                            <div class="cause content-box">
                                <div class="img-wrapper">
                                    <div class="overlay">
                                    </div>
                                    <img class="img-responsive" src="{!! $d[2] !!}" alt="">
                                </div>
                                <div class="info-block">
                                    <h4>
                                        <a href="#">Animales de clase mundial</a>
                                    </h4>
                                    <p>
                                        Criamos los mejores especimenes
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    -- }}

                </div>
            </div>
        </div>
    </div>
    --}}

    {{-- mp50 mpd0  arena--}}
    <div class="causes-wrapper mp80 mpd0  {{--about-page-wrapper--}}">
        <div class="container">
            <div class="section-name one">
                <h2 class="font-dst">{!! trans('portal.horsepinned') !!}</h2>
                <div class="short-text">
                    <!--<h5>Uaerat litora, taciti quaerat dolor ligula laoreet!</h5>-->
                </div>
            </div>
            <div class="causes" style="padding-top: 0px!important; ">
                <div class="causes-list row">
                    @if(count($horsesfav)!=0)
                        @foreach($horsesfav as $k=>$v)
                            @if($k < 3)
                                @php
                                    $foto = $v->getPhotoModel()->first();
                                    $url = (!empty($foto))?$foto->getUrl():'';
                                    $rd = rand(0,3);

                                    $color = $v->getColorString();

                                    //$color = (!empty($color))?$color->name:null;
                                    $link =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]);



                                @endphp

                                @include('frontend.landing.studs.partials.sellcard',[
              'link'=>$link,
              'id'=> $v->id,
              'url'=> $url,
              'titulo'=> $v->getName(),
              'raza'=> $v->raza,
              'horse'=> $v,

              'stitulo'=>$text[rand(0,3)],
              'alzada'=>$v->getRaisedFormat(),
              'edad'=>$v->getAge(),
              'color'=>$color,

              ])
                            @endif
                        @endforeach
                    @else


                        @foreach($horses as $k=>$v)
                            @if($k < 3)
                                @php
                                    $foto = $v->getPhotoModel()->first();
                                    $url = (!empty($foto))?$foto->getUrl():'';
                                    $rd = rand(0,3);

                                    $color = $v->getColorString();

                                    //$color = (!empty($color))?$color->name:null;
                                    $link =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]);




                                @endphp

                                @include('frontend.landing.studs.partials.sellcard',[
              'link'=>$link,
              'id'=> $v->id,
              'url'=> $url,
              'titulo'=> $v->getName(),
'raza'=> $v->raza,
              'stitulo'=>$text[rand(0,3)],
              'alzada'=>$v->getRaisedFormat(),
              'edad'=>$v->getAge(),
              'color'=>$color,
              'horse'=>$v,

              ])
                            @endif{{--}}
                    @include('frontend.landing.studs.partials.sellcard',[
                'url'=> url('frontend/img/services/l/servicio1.jpg'),
                'titulo'=> 'YEGUAS Descarada XCII',
                'stitulo'=>'' ,
                ])
                        --}}
                        @endforeach
                    @endif
                    {{--
                      @include('frontend.landing.studs.partials.sellcard',[
                                    'url'=> url('frontend/img/services/l/servicio1.jpg'),
                                    'titulo'=> 'YEGUAS Descarada XCII',
                                    'stitulo'=>'' ,
                                    ])
                                        @include('frontend.landing.studs.partials.sellcard',[
                                  'url'=> url('frontend/img/services/l/servicio2.jpg'),
                                  'titulo'=> 'POTROS LEGO',

                                  'stitulo'=>'' ,
                                  ])
                                        @include('frontend.landing.studs.partials.sellcard',[
                              'url'=> url('frontend/img/services/l/servicio3.jpg'),
                              'titulo'=> 'SEMENTALES DIVO XXX',
                              'stitulo'=>'' ,
                              ])
                              --}}
                </div>
            </div>
        </div>
    </div>
    {{--
  <!-- work togather -->
  <div class="donation-wrapper-home work_togathers ">
      <div class="parallax-mask">
  </div>
      <div class="container">
          <div class="work_togather">
              <h2>Start Your Business</h2>
              <h1>Let’s Work Togather!!</h1>
          </div>
      </div>
  </div>
  --}}
    {{--
    <!-- team -->
    <div class="team-wrapper">
        <div class="container">
            <div class="section-name one">
                <h2>Meet Our Team</h2>
                <div class="short-text">
                    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
                </div>
            </div>

            <div class="team-members row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-member">
                        <div class="best-volunteer">
                            <div class="voluntee-image">
                                <a href="#" title="">
    <img src="{!! url('frontend/img/team-1.jpg')!!}" alt="">
    </a>
                            </div>
                            <ul class="socials">
                                <li>
    <a href="#" title="">
    <i class="fa fa-twitter" aria-hidden="true">
    </i>
    </a>
    </li>
                                <li>
    <a href="#" title="">
    <i class="fa fa-facebook" aria-hidden="true">
    </i>
    </a>
    </li>
                                <li>
    <a href="#" title="">
    <i class="fa fa-youtube-play" aria-hidden="true">
    </i>
    </a>
    </li>

                            </ul>
                            <span>
    <a href="#" title="">Founder & CEO</a>
    </span>
                            <h2>
    <a href="#" title="">Tom Petterson</a>
    </h2>
                            <p>Nullam turpis mauris, egestas sed rutrum quis, egestas quis diam. Morbi at congue justo, a
                                co.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-member">
                        <div class="best-volunteer">
                            <div class="voluntee-image">
                                <a href="#" title="">
    <img src="{!! url('frontend/img/team-2.jpg')!!}" alt="">
    </a>
                            </div>
                            <ul class="socials">
                                <li>
    <a href="#" title="">
    <i class="fa fa-twitter" aria-hidden="true">
    </i>
    </a>
    </li>
                                <li>
    <a href="#" title="">
    <i class="fa fa-facebook" aria-hidden="true">
    </i>
    </a>
    </li>
                                <li>
    <a href="#" title="">
    <i class="fa fa-youtube-play" aria-hidden="true">
    </i>
    </a>
    </li>

                            </ul>
                            <span>
    <a href="#" title="">Chairman</a>
    </span>
                            <h2>
    <a href="#" title="">Anna Hanaceck</a>
    </h2>
                            <p>Nullam turpis mauris, egestas sed rutrum quis, egestas quis diam. Morbi at congue justo, a
                                co.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 hidden-sm">
                    <div class="single-member">
                        <div class="best-volunteer">
                            <div class="voluntee-image">
                                <a href="#" title="">
    <img src="{!! url('frontend/img/team-3.jpg')!!}" alt="">
    </a>
                            </div>
                            <ul class="socials">
                                <li>
    <a href="#" title="">
    <i class="fa fa-twitter" aria-hidden="true">
    </i>
    </a>
    </li>
                                <li>
    <a href="#" title="">
    <i class="fa fa-facebook" aria-hidden="true">
    </i>
    </a>
    </li>
                                <li>
    <a href="#" title="">
    <i class="fa fa-youtube-play" aria-hidden="true">
    </i>
    </a>
    </li>

                            </ul>
                            <span>
    <a href="#" title="">Director</a>
    </span>
                            <h2>
    <a href="#" title="">Jack Brianel</a>
    </h2>
                            <p>Nullam turpis mauris, egestas sed rutrum quis, egestas quis diam. Morbi at congue justo, a
                                co.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    --}}
    <!-- Team -->
    {{--
    <div class="volunteers-need-wrapper volunteers-wrapper">
        <div class="parallax-mask">
    </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="weneed-volunt info-block">
                        <h2>Like Our Company?</h2>
                        <p>Nullam turpis mauris, egestas sed rutrum quis, egestas quis diam. Morbi at congue justo, a co.
                            Fusce eget ante volutpat, rutrum orci non, scelerisque enim. Fusce eget nibh ornare,
                            fringillolvenenatis eros. Nulla laoreet sagittis est, quis dapibus justo malesuada sed.</p>
                        <a href="#" class="btn btn-big">Join Us</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    --}}




@endsection

@section('js')
    @if($gallery2 == true)
        <script>
            $(document).ready(function () {
                var zindex = 10;

                $("div.card").click(function (e) {
                    e.preventDefault();

                    var isShowing = false;

                    if ($(this).hasClass("show")) {
                        isShowing = true
                    }

                    if ($("div.cards").hasClass("showing")) {
                        // a card is already in view
                        $("div.card.show")
                            .removeClass("show");

                        if (isShowing) {
                            // this card was showing - reset the grid
                            $("div.cards")
                                .removeClass("showing");
                        } else {
                            // this card isn't showing - get in with it
                            $(this)
                                .css({zIndex: zindex})
                                .addClass("show");

                        }

                        zindex++;

                    } else {
                        // no cards in view
                        $("div.cards")
                            .addClass("showing");
                        $(this)
                            .css({zIndex: zindex})
                            .addClass("show");

                        zindex++;
                    }

                });
            });
        </script>
    @endif
    {{--<script src="{!! url('js/snow.js') !!}"></script>--}}
    <script>

        $('.owl-nextf').on('click', function () {
            $('.owl-next').click();
        });
        $('.owl-prevf').on('click', function () {
            $('.owl-prev').click();
        });
        $(document).ready(function () {
            $('.owl-nextf').removeClass('oculto');
            $('.owl-prevf').removeClass('oculto');
            //$.fn.snow();
        });

        $('.principio').owlCarousel({
            loop: true,
            autoplay: false,
            autoplayTimeout: 15000,
            items: 1,
            nav: true,
            responsiveClass: true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
            navText: ['<i class="ion-chevron-left"><i/>', '<i class="ion-chevron-right"><i/>'],
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                1000: {
                    items: 1,
                }
            }
        });

        var ancho = $(window).width();
        var principio = $('.principio');
        /*
        if (ancho > 767) {
            principio.on('translated.owl.carousel', function (event) {
                $(".principio .owl-item img").removeClass("animated fadeIn");
                $(".principio .owl-item img").fadeOut(1000);
            });

        }
        */
        /*
                $(window).on('resize', function () {
                    var h = $('.principio').height();
                    var t = h + "!important;";
                    var p = (h / 2);
                    console.log(t);
                    $('.owl-nextf').css('height', t).css('padding-top', p).css('padding-bottom', p);
                    $('.owl-prevf').css('height', t).css('padding-top', p).css('padding-bottom', p);

                });
                $(document).on('ready', function () {
                    var h = $('.principio').height();
                    var t = h + "!important;";
                    var p = (h / 2);
                    console.log(t);
                    $('.owl-nextf').css('height', t).css('padding-top', p).css('padding-bottom', p);
                    $('.owl-prevf').css('height', t).css('padding-top', p).css('padding-bottom', p);

               });
                */
    </script>
@endsection