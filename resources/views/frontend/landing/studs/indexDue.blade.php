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
    'logo'=>$logo,
    'key'=>$stud->words,
    'imagenes' =>$stud->getPhotosModel(),
    ])
@endsection
@section('csstop')
    <link rel="stylesheet" href="http://kenwheeler.github.io/slick/slick/slick.css">
    <link rel="stylesheet" href="http://kenwheeler.github.io/slick/slick/slick-theme.css">
    {{--
    <link rel="stylesheet" href="{!! url('js/slick/slick.css') !!}">
    <link rel="stylesheet" href="{!! url('js/slick/slick-theme.css')!!}">
    --}}
    <style>
        .h-246 {
            height: 150px !important;
        }

        .h-400 {
            min-height: 265px !important;
        }

        .carousel-inner > .item {
            display: none !important;
        }

        .carousel-inner > .active {
            display: block !important;
        }

        .mis-current {
            opacity: 1;
        }

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

        /*
                .principio .owl-controls .owl-dots {
                    margin-top: 0;
                }
                */

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

        *

        /
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
            margin-top: -50px;
            right: 0px;
            float: right !important;
            /*
            width: 100%;
            position: absolute;
            text-align: center;
            */
        }

        {{--
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
        --}}






        /*
                                                .principio .owl-controls .owl-dot {
                                                    background-color: rgba(255, 255, 255, 0.5);
                                                }
                                        */
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
            .causes-wrapper .causes-list {
                width: 280px;
                margin-left: 20px;
            }
        }

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

        .img-wrapper {
            /*min-width: 246px;*/
        }

        .content-box .info-block {
            height: 115px;
        }

        .carousel-control {
            /*background-color: black;*/
            width: 50px;
            margin-top: 40px
        }

        .carousel-control :hover,
            /*.carousel-control > i:hover*/
        .carousel-control.left, .carousel-control.right,
        .carousel-control.left:hover, .carousel-control.right:hover {
            margin-top: 40px !important;;
        }

        .carousel-control > .glyphicon,
        .carousel-control > .glyphicon:hover {
            margin-top: 0px !important;
        }

        .card-horse > .content-box {
            border: 1px solid #bdbcb9;
            min-height: 350px;

        }

        .card-horse > .content-box > .info-block {
            text-align: left;
        }

        .card-horse > .content-box > .info-block > h4 > a {

            @if(!empty($stud->getColor()))
                 color: {!! $stud->getColor() !!};
            @else
                 color: #F2B921;
            @endif
                 text-transform: capitalize;
        }

        .dotss {
            /*
                top: 40%;
            position: absolute;
            */
        }

        .slick-arrow, .slick-arrow:focus {
            background: #bbbbb8;
            top: 10px;
            width: 40px

        }

        .dotss > .slick-arrow, .dotss > .slick-arrow:focus {
            height: 353px;
        }

        .slick-arrow:hover {
            background: #949494;
        }

        .dotss > .slick-next:before {
            content: '▶' !important;
        }

        .dotss > .slick-prev:before {
            content: '◄' !important;
        }

        .dotss > .slick-next:before,
        .dotss > .slick-prev:before {
            color: #eeeeee;
            font-size: 20px;

        }

        .tiporaza > div {
            min-height: 64px;
            cursor: pointer;
            /*border: 1px solid black;*/
        }

        .textos {
            padding-top: 4%;
            color: #CB9E68;
            cursor: pointer;
            display: block;
            font-family: "Raleway", sans-serif;
            font-size: 24px;
            font-weight: 500;
            position: relative;
            text-transform: capitalize;
            transition: all .2s ease-out 0s;
        }

        .figure-type {
            min-height: 64px !important;
            min-width: 64px !important;
        }

        .figure-type > img {
            min-height: 64px !important;
            min-width: 64px !important;
        }

        .boxing {
            min-height: 480px
        }

        @media (max-height: 426px) {
            .owl-dots {
                display: none;
            }

            .figure-type {
                margin-left: -15px;
                min-height: 32px !important;
                min-width: 32px !important;
                padding-top: 15px;
            }

            .figure-type > img {
                min-height: 32px !important;
                min-width: 32px !important;
            }
        }

        @media (min-height: 427px) and (max-height: 768px) {
            .figure-type {
                margin-left: -15px;
                min-height: 32px !important;
                min-width: 32px !important;
                padding-top: 15px;
            }

            .figure-type > img {
                min-height: 32px !important;
                min-width: 32px !important;
            }
        }

        @media (min-height: 768px) and (max-height: 1195px) {
            .boxing {
                min-height: 450px
            }

            .card-horse > .content-box {
                border: 1px solid #bdbcb9;
                min-height: 400px;
            }

            .dotss > .slick-arrow, .dotss > .slick-arrow:focus {
                height: 400px;
            }
        }

        .imagen > figure {

        }

        .font-dst {
            text-transform: capitalize;
        }

        /*459*/
        .section-name {
            border-bottom: 1px solid #bdbcb9;
        }

        .p-t-35 {
            padding-top: 35px;
        }

        .dotsss > .slick-arrow,
        .dotsss > .slick-arrow:focus {
            height: 20px;
            background: transparent;
            top: 120px;
            width: 25px
        }

        .dotsss > .slick-next.slick-arrow,
        .dotsss > .slick-prev.slick-arrow,
        .dotsss > .slick-arrow > .slick-next,
        .dotsss > .slick-arrow > .slick-prev,
        .dotsss > .slick-arrow > .slick-next:before,
        .dotsss > .slick-arrow > .slick-prev:before {
            color: #eeeeee;
            font-size: 20px;

        }

        #carousel123 {

        }

        .m-t-40 {
            margin-top: 40px;
        }

        .causes-wrapper {
            padding-top: 0px;

        }

        @media (min-width: 600px) {
            .causes-wrapper {
                padding-left: 20px;

            }
        }
    </style>
    <style>
        .n-p-l {
            padding-left: 0px;
        }

        /*Puntos numeros*/

        .owl-prev {
            float: left;
            font-size: 20px;
            text-transform: uppercase;
            padding: 20px;
        }

        .owl-next {
            float: right;
            font-size: 20px;
            text-transform: uppercase;
            padding: 20px;
        }

        .owl-dots {
            counter-reset: slides-num;
            /* Initialize counter. */
            position: absolute;
            top: 100%;
            left: 50%;
            margin-top: 15px;
        }

        .owl-dots:after {
            content: counter(slides-num);
            /* get total number of items - more info on http://www.sitepoint.com/a-little-known-way-to-replace-some-scripts-with-css-counters/ */
            display: inline-block;
            font-size: 20px;
            font-weight: 700;
            vertical-align: middle;
            padding-left: 5px;

        }

        .owl-dot {
            display: inline-block;
            counter-increment: slides-num;
            /* Increment counter */
            margin-right: 20px;
            position: relative;
            height: 20px;
            margin-left: 18px;
        }

        .owl-dot span {
            display: none;
        }

        {{--
        .owl-dot.active:before {
            content: counter(slides-num) " of";
            display: inline-block;
            vertical-align: middle;
            font-size: 20px;
            position: absolute;
            left: 0;
            top: 0;
        }
        --}}
        .owl-dot.active:before {
            @if(!empty($stud->getColor()))
                 background-color: {!! $stud->getColor() !!};
            @else
                 background-color: #f9912f;
            @endif
                 color: #fff;

        }

        .owl-dot:before {
            content: counter(slides-num);
            display: inline-block;
            vertical-align: middle;
            font-size: 20px;
            position: absolute;
            left: 0;
            top: 0;
            background-color: #fff;
            color: #000;
            display: inline-block;
            height: 25px;
            width: 35px;
            margin: 0 5px;
            -webkit-border-radius: 25%;
            -moz-border-radius: 25%;
            -ms-border-radius: 25%;
            border-radius: 25%;
        }

        .owl-dots:after {
            content: counter(slides-num);
            /* get total number of items - more info on http://www.sitepoint.com/a-little-known-way-to-replace-some-scripts-with-css-counters/ */
            display: inline-block;
            font-size: 20px;
            font-weight: 700;
            vertical-align: middle;
            padding-left: 5px;
            color: #fff;
        }
    </style>

@endsection
@section('content')
    @php
        //$url =  Request::fullUrl() ;
        $url = "http://horsesworldsale.com/";
        $url = "https://www.facebook.com/HorsesWorldSale/";
        $llang = \App::getLocale();
        $llang_ = 'en_US';
        if($llang == 'en'){
        $llang_ = 'en_US';
        }elseif ($llang == 'es'){
        $llang_ = 'es_LA';
        }elseif ($llang == 'fr'){
        $llang_ = 'fr_FR';
        }
    @endphp
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/{!! $llang_ !!}/sdk.js#xfbml=1&version=v2.8&appId=260261811093896';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
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

    @php($razass = $stud->Horses()->with('Fotos')->groupby('raza')->get()->pluck('raza'))

    <div class="causes-wrapper m-t-40 mpd0 col-xs-12 {{--about-page-wrapper--}}">
        <div class="container col-xs-12 boxing">
            <div class="section-name one col-xs-12">
                <div class="col-xs-12 dotsss"></div>
                <div class="razasplaces col-xs-12 hidden">

                    <div class="tiporaza" data-type="0">
                        <div class="col-xs-12 text-center">
                            <div class="imagen col-xs-4 text-center">
                                {{--<i class="fa fa-facebook"></i>--}}
                                <div class="col-xs-offset-3 col-xs-6">
                                    <figure class="img-responsive figure-type">
                                        <img src="{!! url(\Config::get('logos.favicon64')) !!}" alt=""
                                             class="img-responsive">
                                    </figure>
                                </div>
                            </div>
                            <div class="textos col-xs-8 text-left">
                                TODAS
                            </div>
                        </div>
                    </div>

                    @foreach($razass as $k => $v)
                        <div class="tiporaza" data-type="{!! $v !!}">
                            <div class="col-xs-12 text-center">
                                <div class="imagen col-xs-4 text-center">
                                    {{--<i class="fa fa-facebook"></i>--}}
                                    <div class="col-xs-offset-3 col-xs-6">
                                        <figure class="img-responsive figure-type">
                                            <img src="{!! url(\Config::get('logos.favicon64')) !!}" alt=""
                                                 class="img-responsive">
                                        </figure>
                                    </div>
                                </div>
                                <div class="textos col-xs-8 text-left">
                                    {!! trans('horse.raza.'.$v) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                {{--<h2 class="font-dst ">{!! trans('portal.horsepinned') !!}</h2>

                <div class="short-text">
                    <!--<h5>Uaerat litora, taciti quaerat dolor ligula laoreet!</h5>-->
                --}}

            </div>
            <div class="causes col-xs-12 col-md-8  p-t-35 n-p-l">
                <h2 class="font-dst text-left">{!! trans('portal.horsepinned') !!}</h2>
                <div class="col-xs-12 row">
                    @php($todos = $stud->Horses()->with('Fotos')->get())
                    <div class="causes-list col-xs-12 n-p-l"
                         style="  height: 300px;  {{-- background-color: #80808054; --}}">
                        <div class=" col-xs-12 row" style="    padding-left: 15px; margin-right: -30px;">

                            <div class="col-xs-12 dotss"></div>
                            <div class="carousel carousel-showmanymoveone slide col-xs-12" id="carousel123">
                                <div class="hidden">
                                    <div class="hidden" id="razasstodas">
                                        @foreach($todos as $k=>$v)
                                            @php
                                                $foto = $v->getPhotoModel()->first();
                                                $url = (!empty($foto))?$foto->getUrl():'';
                                                $rd = rand(0,3);
                                                $color = $v->getColorString();
                                                //$color = (!empty($color))?$color->name:null;
                                                $link =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]);
                                            @endphp
                                            @include('frontend.landing.studs.partials.sellcardli',[
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
                                                'va'=>$k,
                                                ])
                                        @endforeach
                                    </div>
                                    @foreach($razass as $k => $v)
                                        @php($rs21 = $stud->Horses()->with('Fotos')->where('raza',$v)->get())
                                        <div class="hidden" id="razaid-{!! $v !!}" data-type="{!! $v !!}">
                                            @foreach($rs21 as $r=>$s)
                                                @php
                                                    $foto = $s->getPhotoModel()->first();
                                                    $url = (!empty($foto))?$foto->getUrl():'';
                                                    $rd = rand(0,3);
                                                    $color = $s->getColorString();
                                                    //$color = (!empty($color))?$color->name:null;
                                                    $link =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$s->slug]);
                                                @endphp
                                                @include('frontend.landing.studs.partials.sellcardli',[
                                                    'link'=>$link,
                                                    'id'=> $s->id,
                                                    'url'=> $url,
                                                    'titulo'=> $s->getName(),
                                                    'raza'=> $s->raza,
                                                    'horse'=> $s,
                                                    'stitulo'=>$text[rand(0,3)],
                                                    'alzada'=>$s->getRaisedFormat(),
                                                    'edad'=>$s->getAge(),
                                                    'color'=>$color,
                                                    'va'=>$r,
                                                    ])
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                                <div class="carousel-inner hidden">
                                    @foreach($todos as $k=>$v)
                                        @php
                                            $foto = $v->getPhotoModel()->first();
                                            $url = (!empty($foto))?$foto->getUrl():'';
                                            $rd = rand(0,3);
                                            $color = $v->getColorString();
                                            //$color = (!empty($color))?$color->name:null;
                                            $link =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]);
                                        @endphp
                                        @include('frontend.landing.studs.partials.sellcardli',[
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
                                            'va'=>$k,
                                            ])
                                    @endforeach
                                    @php($horsesfav = [])
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
                                                {{--@include('frontend.landing.studs.partials.sellcard',[--}}
                                                @include('frontend.landing.studs.partials.sellcardli',[
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
                                                    'va'=>$k,
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
                                                {{--@include('frontend.landing.studs.partials.sellcard',[--}}
                                                @include('frontend.landing.studs.partials.sellcardli',[
                                                    'va'=>$k,
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
                                </div>
                            </div>


                        </div>
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
                    {{--
                        <ol class="carousel-indicators">
                        @foreach($todos as $k=>$v)
                            <li data-target="#carousel123" data-slide-to="{!! $k !!}" @if($k == 0 ) class="active" @endif></li>
                        @endforeach
                        </ol>
                        --}}
                    {{-- <a class="left carousel-control" href="#carousel123" data-slide="prev"><i
                    class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right carousel-control" href="#carousel123" data-slide="next"><i
                    class="glyphicon glyphicon-chevron-right"></i></a>-- --}}
                    <div class="clearfix"></div>

                </div>

            </div>

            @if(!empty($stud->getFacebook()->getUrlPage()))
                <div class=" col-xs-12 col-md-4 p-t-35  ">

                    <h2 class="font-dst text-left">Siguenos en Facebook </h2>
                    <div class="col-xs-12 m-t-40">
                        <div class="fb-page"
                             data-href="{!! $stud->getFacebook()->getUrlPage() !!}"
                             data-small-header="false"
                             data-adapt-container-width="true"
                             data-hide-cover="false"
                             data-show-facepile="true">
                            <blockquote cite="{!! $stud->getFacebook()->getUrlPage() !!}"
                                        class="fb-xfbml-parse-ignore">
                                <a href="{!! $stud->getFacebook()->getUrlPage() !!}">{!! $stud->name !!}</a>
                            </blockquote>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endif

            <div class="col-xs-12">
                <div id="facebook-feed-container"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    {{--
    $(document).ready(function(){
    $('.causes-list').bxSlider({
    minSlides:3,
    maxSlides:33,
    slideSelector:'.h-400',
    /*slideWidth:'100%',*/
    adaptiveHeight: true,
    responsive:false,
    /*slideWidth:100%,*/
    });
    });
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
    <script src="{!! url('js/jquery.facebookfeed.js') !!}"></script>

    {{--<script src="{!! url('js/slick/slick.js') !!}"></script>--}}
    <script src="http://kenwheeler.github.io/slick/slick/slick.js"></script>
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
    </script>

    <script>
        $(document).ready(function () {
            $('.carousel-inner').slick({
                dots: false,
                lazyLoad: 'ondemand',
                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay: true,
                prevArrow: '<button type="button" data-role="none" class="slick-prev"tabindex="0" role="button"></button>',
                nextArrow: '<button type="button" data-role="none" class="slick-next" tabindex="0" role="button"></button>',

                appendArrows: '.dotss',
                autoplaySpeed: 5000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 760,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            }).removeClass('hidden');


            $('.razasplaces').slick({
                dots: false,
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay: true,
                prevArrow: '<button type="button" data-role="none" class="slick-prev"tabindex="0" role="button"></button>',
                nextArrow: '<button type="button" data-role="none" class="slick-next" tabindex="0" role="button"></button>',
                appendArrows: '.dotsss',
                autoplaySpeed: 5000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            }).removeClass('hidden');
        });
                {{--
                FUNCIONA PARA REMOVER
                function remover(){
                    var total = $('.carousel-inner .item').length;
                    for(var i = 0; i <= total+1; i++){

                        $('.carousel-inner').slick('slickRemove',1,true);
                    }
                }
                $('.tiporaza').on('click', function () {
                    remover();
                    var v = $(this).attr('data-type');
                    $.each($('#razaid-'+v+' .item'),function(k,v){
                        $('.carousel-inner').slick('slickAdd',$(v).html());
                    });
                });
                --}}
        var filterd = false;
        $('.tiporaza').on('click', function () {
            var s = $(this).attr('data-type');
            var ids = '.raza-' + s;
            if (filterd === true) {
                $('.carousel-inner').slick('slickUnfilter');
                console.dir('paso a limpiar');
            }

            if (s !== 0) {
                filterd = true;
                $('.carousel-inner').slick('slickFilter', ids);
            } else {

                filterd = true;
                $('.carousel-inner').slick('slickFilter', '.radto');


            }

        });
    </script>
{{--
    <script>

        $(window).on('resize', function () {
            var s = $('footer').width() - 20;
            $('.causes-wrapper').css('width', s + "px");
        });

        $(window).on('load', function () {
            var s = $('footer').width() - 20;
            $('.causes-wrapper').css('width', s + "px");
        });
    </script>
    --}}
@endsection
