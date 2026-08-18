@extends('frontend.landing.studs.base',['user'=>$user,'stud'=>$stud])
@section('title',$horse->getName())
@php
    /* AQUI */
            $next = (isset($next))?$next:null;
            $prev = (isset($prev))?$prev:null;
            $imgf =$stud->getLogo();
            $logobasic= url("landing/images/basic/logo.png");
            $fotos = $horse->getPhotoModel();
            $nombre = $horse-> getName();
            $doma = $horse-> getDoma();
            $raza = $horse-> getRaza();
            $precio = Funciones::AjustarNumeroMil($horse-> getPrice());
            $bday = $horse-> getBirthdate();
            $raised = $horse-> getRaised();
            $ParaVender= $horse->getTosold();

            $cubri= Funciones::AjustarNumeroMil($horse-> getCubri()). " €";
            $vendido= $horse->getSold();
            $yeguada= $horse->getStud();
            $sex= $horse->getSex();
            $color = $horse->getColorString();
            //$fotos = Photo::find(39);
            if($vendido == false)$vendido = 0;
            $doma = ($doma == 'true' or $doma==true)?1: 0;
            $link =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$horse->id]);
            $precio = Funciones::AjustarNumeroMil($horse->getPrice());
            $raza = $horse->getRaza();
            $razas = trans('horse.raza');
            $alzada = $horse->getRaisedFormat();
            $edad = $horse->getAge();
            $mes = $horse->getAgeMonth();
            $sexo = $horse->getSex();
            $doma = $horse->getDoma();
            $yeguada = $horse->getStud();
            if(!empty($fotos->first())){
            $imgf = $fotos->first()->url;
            }

$fbs = Funciones::CompartirFacebook($horse->getName(),Request::fullUrl());
$tws = Funciones::CompartirTwitter($horse->getName(),Request::fullUrl());
$Gs = Funciones::CompartirGoogle(Request::fullUrl());
$Ptr = Funciones::CompartirPinterest($horse->getName(),Request::fullUrl());
$print = route('VersionImpresa',['ids'=>$horse->slug]);
$css = null;

$Coins = empty($Coins)?'USD':$Coins;
        if(!empty($Coins) and !empty($precio)) {
        if($horse->sold !=1 and $horse->getTosold() == true){
        $ccs = Funciones::currencyConverter($Coins, $precio);
        }

        }


@endphp
@section('fbheader')
    @include('meta',
  [
  'titulo' => $horse->getName(),
  'descripcion'=>$horse->getDescripcion(),
  'logo'=>$imgf,
  'key'=>$stud->words,
  'imagenes' =>$horse->getPhotoModel(),
  ])
    @foreach($horse->getPhotoModel() as $h => $i)
        <meta property="og:image" content="{!! $i->url !!}"/>
    @endforeach
    @foreach($horse->getVideosModel() as $h => $i)
        <meta property="og:video" content="{!! $i->getYoutubeThumb()  !!}">
        <meta name="twitter:player" content="{!! $i->getYoutubeThumb()  !!}">
    @endforeach
    @foreach($fotos as $k=>$v)
        <meta property="og:image" content="{!! $v->url !!}"/>
    @endforeach
@endsection
@section('cssup')
    {{--
        <link rel="stylesheet" href="{!! url('frontend/alt2.css') !!}">
        <!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->

        <link rel="stylesheet" href="{!! url('portal_/css/style.css')!!}">
        --}}

    <!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->
    <link href="{!! url('portal_/css/nouislider.min.css')!!}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Listing Slider =-=-=-=-=-=-= -->
    <link href="{!! url('portal_/css/slider.min.css')!!}" rel="stylesheet">
    <!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->
    <link rel="stylesheet" id="color" href="{!! url('portal_/css/colors/defualt.css')!!}">
    <link rel="stylesheet" href="{!! url('frontend/css/nivo-lightbox.min.css')!!}">
    <style>
        .text-black {
            color: #464646 !important;
        }

        .ui-tooltip.ui-widget.ui-corner-all.ui-widget-content {
            background: black;
            color: white;
            min-width: 100px;
            width: auto;
            border-radius: 4px;
            text-align: center;
            max-width: 150px;
            white-space: pre-wrap;
        }

        .contactPhone,
        .contactEmail {
            padding-left: 80px;
        }

    </style>
@endsection
@section('csstop')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <link rel="stylesheet" href="{!! url('frontend/css/horsedetail.css')!!}">
    @if(!empty( $stud->getColor()))
        <style>

            .box h4 a:hover, .category-grid-box .short-description h3 a:hover, .category-grid-box .view-details:hover, .ad-listing .ad-content h3 a:hover, .car-details h4:hover, .post-title a:hover, .post-info a:hover, .popular-categories li a:hover, .font-color, .ad-location-gird .location-title-disc h5:hover, .ad-location-gird .location-title-disc h5 a:hover, .footer-content .footer-widget .contact-info li:hover, .footer-content .footer-widget.links-widget li a:hover, .footer-content .news-widget .news-post a:hover, ul.category-list-style li a:hover, .funfacts h4 span, .horse-special .ad-box .short-history li b, .horse-special .ad-box .short-history li b a, .ad-box i, .share-ad .modal-body p a, .item-date a, .blog-sidebar .widget .widget-content .tagcloud a:hover, .blog-sidebar .widget .widget-content ul li a:hover, .comming-soon-grid .count-down #clock > span, .features .features-text h3:hover, .features .features-text h3 a:hover, .site-map-list li a:hover, .header-top ul li a:hover, .ad-archive-desc h3:hover, .ad-archive-desc h3 a:hover, .footer-area .contact-info li .icon, .heading-color, .ad-preview-details .overview-price span, .ad-listing .content-area .price, .category-grid-box-1 a:hover, .category-grid i, .hero .content p:first-child b, ul.category-list-data li:hover::before, ul.category-list-data li:hover a, ul.category-list-data li:hover a span, .category-list-title h5 > a:hover, .view-more a:hover, .category-grid-box .short-description .price, .horse-special-price, ul.category-list-style li:hover a i, .sidebar .side-menu nav .nav > li > a:hover, .filter-brudcrums-sort ul li a:hover, .skin-minimal .list li label:hover, .advertising .banner .submit, .recent-ads .recent-ads-list-price, .bread-3.page-header-area .small-breadcrumb .breadcrumb-link ul li a.active, .ad .content-zone .short-description-1 h3 a:hover, .user-profile ul li:hover a, .user-profile ul li.active a, .dashboard-menu-container ul li.active .menu-name, .dashboard-menu-container ul li:hover .menu-name, .tags-share .tags ul li a, .comment-list .comment .comment-info .author-desc .author-title li a:hover, .why-us:hover i, .why-us:hover h5, .card .nav-tabs > li.active > a, .card .nav-tabs > li > a:hover, .accordion-title a:hover, .usefull-info .info-content h3:hover, .mega-menu .drop-down a:hover, .mega-menu .drop-down-tab-bar a:hover, .recent-ads .recent-ads-list-title a:hover, .singleContadds i, .white.category-grid-box-1 .horse-special-info-1 ul li:hover, .white.category-grid-box-1 .horse-special-info-1 ul li a:hover, .ad-listing .content-area h3 a:hover {
                color: {!! $stud->getColor() !!};
            }
            {{-- COLOR ICONHOS --}}


        </style>
    @endif
    {{--
        <script src="{!! url('html5gallery/html5lightbox.js') !!}"></script>
    --}}
@endsection
@section('content')
    <!-- basic-slider start -->
    <!-- Banner -->
    @include('frontend.landing.studs.partials.principal',['stud'=>$stud,'titulo'=>trans('stud.horses'),'texto'=>trans('stud.ouranimal')])
    <style>

        .work-all,
        .post-prev.pull-left,
        .post-next.pull-right {
            @if(!empty($stud->getColor()))
                          color: {!! $stud->getColor() !!};
            @else
                                                          color: #01889a !important;
        @endif
                                              /*background: #f6f6f6;*/
            /*top: 210px;*/
        }

        .colorc {
            border: 1px @if(!empty($stud->getColor())) {!! $stud->getColor() !!} solid;
            @else                      #01889a solid;
        @endif










        }

        .work-all:hover,
        .post-prev.pull-left:hover,
        .post-next.pull-right:hover {
            color: #a5a5a5 !important;
        }

        .work-all, .work-all:hover {
            margin: auto;
            margin-left: 50%;
        }

        .ad-box:hover, .ad-box:focus, .ad-box:active {
            padding: 20px 30px;
        }

        .volver {
            @if(!empty($stud->getColor()))
                                                          color: {!! $stud->getColor() !!};
            @else
                                                          color: #01889a !important;
        @endif







        }

        .volver:hover, .volver:focus, .volver:active {
            color: #a5a5a5 !important;
        }

        .videop > i {
            position: fixed;
            z-index: 99;
            top: 25px;
            /*border: 1px solid wheat;*/
            margin-left: 45px;
            font-size: 30px;
            @if(!empty($stud->getColor()))
                                                          color: {!! $stud->getColor() !!};
            @else
                                                          color: #01889a !important;
            @endif
                                         text-shadow: 0px 0px 17px rgba(0, 0, 0, 1);
        }

        .grid-panel .location-icon i, .widget-newsletter .fieldset form .submit-btn, .ad-listing .content-area .additional-info li a:hover, .noUi-connect, .card .nav-tabs > li > a::after, .ad-listing-price p, .mega-menu .drop-down-multilevel li.activeTriggerMobile, .mega-menu .drop-down-multilevel li:hover {
            @if(!empty($stud->getColor()))
                                                          background: {!! $stud->getColor() !!} none repeat scroll 0 0 !important;
            @else
                                                          background: #f58936 none repeat scroll 0 0 !important;
        @endif










        }

        .pull-left.pull-right {
            position: inherit;
            padding-top: 30px;
            padding-bottom: 30px;
            margin-left: -20px;
        }

        .st-191 {
            top: 191px;
        }

        .namehor {
            margin-top: 25px !important;
        }

        @media (max-width: 475px) {
            .post-prev,
            .post-prev:hover,
            .post-prev:focus,
            .post-prev:active {
                display: none;
            }

        }

        @media (min-width: 320px) {
            .post-prev,
            .post-prev:hover,
            .post-prev:focus,
            .post-prev:active {

                padding-top: 365px;
                left: 14px;
            }

            .novo, .novo > img {
                height: auto !important;
            }

            .namehor {
                margin-top: -15px !important;
            }
        }

        @media (min-width: 576px) {
            .namehor {
                margin-top: 25px !important;
            }

            .novo, .novo > img {
                height: auto !important;
            }
        }

        @media (min-width: 768px) {
            .post-prev,
            .post-prev:hover,
            .post-prev:focus,
            .post-prev:active {
                padding-top: 450px;
                left: 14px;
            }

            .novo, .novo > img {
                height: 340px !important;
                margin: 0 auto !important;
            }
        }

        @media (min-width: 867px) {
            .novo, .novo > img {
                height: auto !important;
            }
        }

        @media (min-width: 992px) {
            .novo, .novo > img {
                height: 340px !important;
                margin: 0 auto !important;
            }
        }

        @media (min-width: 1200px) {
            .novo, .novo > img {
                height: 430px !important;
                margin: 0 auto !important;
            }
        }
    </style>
    <div class="blog-page-wrapper row">
        <div class="container">


            <!-- Middle Content Area -->
            <div class="col-md-8 col-xs-12 col-sm-12">
                <!-- Single Ad -->
                <div class="horse-special">
                    <!-- Title -->
                    <div class="ad-box">
                        <h1>{!! $horse->getName() !!}</h1>
                        <div class="short-history">
                            <ul>
                                {{--sex--}}
                                @if(!empty($sexo))
                                    <li>
                                        {!! trans('portal.sex') !!} : <b>
                                            @if($sexo!=0)
                                                {!! trans('horse.sex.'.$sexo )!!}
                                            @endif
                                        </b>
                                @endif
                                <li>
                                    {!! trans('portal.age') !!} : <b>
                                        @if($edad!=0)
                                            {!! trans('horse.years',['ano'=>$edad]) !!}
                                        @else
                                            {!! trans('horse.mes',['mes'=>$mes]) !!}
                                        @endif
                                    </b>
                                </li>
                                <li>{!! trans('portal.raza') !!} : <b>
                                        {{--{!! route('portalporraza',['raza'=>$raza]) !!}--}}
                                        <b>{!! trans('horse.raza.'.$raza )!!}</b>
                                    </b>
                                </li>
                                {{--
                                <li>
                                    {!! trans('portal.location') !!} :
                                    <b>{!! $horse->getStudLocation() !!}</b>
                                </li>
                                --}}
                            </ul>
                        </div>
                    </div>
                    <!-- Listing Slider  -->
                    @if(count($horse->getPhotoModel() )!=0)
                        <div class="flexslider single-page-slider ">
                            <div class="flex-viewport">
                                <ul class="slides slide-main">
                                    @php($ts = count($horse->getPhotoModel()))
                                    @foreach($horse->getPhotoModel() as $k=>$v)
                                        @php($ffoto =  $v->getUrl())
                                        <li @if($k==0) class="flex-active-slide" @endif >
                                            <div class="nivo-activator">
                                            </div>
                                            <a id="img_{!! $k !!}" href="{!! $v->getUrl() !!}"
                                               class="nivo-trigger"

                                               data-lightbox-gallery="gallery1"
                                            >
                                            </a>
                                            <figure>
                                                <img alt="{!! $horse->getAltText() !!}" src="{!! $v->getUrl() !!}"
                                                     class="img-responsive"
                                                     title="" onclick="$('#img_{!! $k !!}').click()"
                                                        {{--onclick="Mostrar('{!! $v->getUrl() !!}')"--}}
                                                        {{--
                                                onclick="showSlides('{!!$k !!}')"
                                                data-toggle="modal"
                                                data-target="#zooms"
                                                --}}
                                                >
                                            </figure>

                                        </li>
                                        @php($ts = $k+1)
                                    @endforeach

                                    @foreach($horse->getVideosModel() as $k => $v)
                                        @php($ssd = $ts + $k)
                                        <li @if($k==0) class="flex-active-slide" @endif >
                                            <div class="nivo-activator">
                                            </div>
                                            <a id="vid_{!! $k !!}" href="{!! $v->getNormalVideoYoutube() !!}"
                                               class="nivo-trigger"
                                               data-lightbox-gallery="gallery1"
                                            >
                                            </a>
                                            <span class="fa fa-youtube-play"
                                                  onclick="$('#vid_{!! $k !!}').click()"> </span>
                                            <figure>
                                                <img alt="{!! $horse->getAltText() !!}"
                                                     src="{!! $v->getYoutubeThumb() !!}"
                                                     title=""
                                                     class="img-responsive"
                                                     onclick="$('#vid_{!! $k !!}').click()"
                                                        {{--onclick="Mostrar('{!! $v->getUrl() !!}')"--}}
                                                        {{--onclick="showSlides('{!!$k !!}')"
                                                        data-toggle="modal"
                                                        data-target="#zooms"--}}
                                                >
                                            </figure>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @if($horse->sold == 1)

                                <div class="ribbon popular ribbon-fix"></div>
                            @endif
                        </div>

                    @endif

                    @if(count($horse->getPhotoModel() )!=0)
                    <!-- Listing Slider Thumb -->
                        <div class="flexslider hidden-xs" id="carousels">
                            <div class="flex-viewport">
                                <ul class="slides slide-thumbnail">
                                    @foreach($horse->getPhotoModel() as $k=>$v)
                                        {{--<li class="">--}}
                                        <li>
                                            <figure>
                                                <img alt="{!! $horse->getAltText() !!}" draggable="false"
                                                     class="img-responsive"
                                                     src="{!!  $v->getUrl() !!}">
                                            </figure>
                                        </li>

                                    @endforeach
                                    @foreach($horse->getVideosModel() as $k => $v)
                                        <li>
                                            <figure>
                                                <img alt="{!! $horse->getAltText() !!}"
                                                     src="{!! $v->getYoutubeThumb() !!}"
                                                     title=""
                                                     class="img-responsive"
                                                     {{--onclick="Mostrar('{!! $v->getUrl() !!}')"--}}
                                                     draggable="false"
                                                >
                                            </figure>
                                            <span class="fa fa-youtube-play"> </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Share Ad  -->
                    @endif
                    <div class="ad-share text-center">
                        {{--
                        <a class="ad-box col-md-4 col-sm-4 col-xs-12"
                           href="#!"
                           onclick="window.open('https://www.facebook.com/sharer.php?u={!! $link !!}&t={!! $horse->getName() !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                           target="_blank">
                            <i class="fa fa-share-alt">
                            </i>
                            <span class="hidetext">{!! trans('portal.share') !!}</span>
                        </a>
                        onclick="mostrarrecomendar('.share-ad')"
                        --}}
                        <div class="ad-box col-md-4 col-sm-4 col-xs-12 h-76">

                            <a href="#!"
                               onclick="window.open('{!! $fbs !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                               class="btn btn-fb sharedbtn">
                                <i class="fa fa-facebook">
                                </i>
                            </a>
                            <a href="#!"
                               onclick="window.open('{!! $tws !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                               class="btn btn-twitter sharedbtn">
                                <i class="fa fa-twitter">
                                </i>
                            </a>
                            <a href="#!"
                               onclick="window.open('{!! $Gs !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                               class="btn btn-gplus sharedbtn">
                                <i class="fa fa-google-plus">
                                </i>
                            </a>
                            <a href="#!"
                               onclick="window.open('{!! $Ptr !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                               class="btn btn-pinterest sharedbtn">
                                <i class="fa fa-pinterest">
                                </i>
                            </a>
                            <a href="#!" class="btn btn-print sharedbtn" rel="nofollow"
                               onclick="window.open('{!! $print !!}', '{!! $horse->getName() !!}', 'width=700,height=600,top=100,left=100,resizable,scrollbars');">
                                <i class="fa fa-print"> </i> </a>

                            {{--
                            <i class="fa fa-share-alt">
                            </i>
                            <span class="hidetext">{!! trans('portal.share') !!}</span>
                            --}}
                        </div>

                    <!--
                        <div class="col-xs-2" data-target=".report-mail" data-toggle="modal">
                            {{--<div class="addthis_inline_share_toolbox"></div>--}}
                            <i class="fa fa-envelope">
                            </i>

                        </div>
                          <div class="col-xs-12 center-block">

                            <i class="fa fa-envelope">
                            </i>
                            <span class="hidetext">{!! trans('portal.watchlist') !!}</span>

                        </div>
                        -->


                        <a class="ad-box col-md-4 col-sm-4 col-xs-12 h-76"
                           {{--href="#!" onclick="emailo()"--}}
                           data-target=".report-mail" data-toggle="modal"
                        >
                            <div class="col-xs-12">
                                <i class="fa fa-envelope">
                                </i>

                                {{--<span class="hidetext">{!! trans('portal.recomendar') !!}</span>--}}
                                <span class="hidetext">{!! trans('portal.watchlist') !!}</span>
                            </div>
                            {{--
                            <i class="fa fa-envelope active">
                            </i>
                            <span class="hidetext">{!! trans('portal.recomendar') !!}</span>
                            --}}
                        </a>
                        <div
                                {{--onclick="mostrarreportar('.report-quote');"--}}
                                {{--data-target=".report-quote" data-toggle="modal"--}}
                                class="ad-box col-md-4 col-sm-4 col-xs-12 h-76">
                            <i class="fa fa-warning">
                            </i>
                            <span class="hidetext">
                                    {!! trans('portal.ofertar') !!}
                                </span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- Short Description  -->
                    <div class="ad-box">
                        <div class="col-12 row ">
                            <div class="short-features">
                                <!-- Heading Area -->
                                <div class="heading-panel">
                                    {{--
                                    Palabra detalle
                                    <h3 class="main-title text-left">
                                        {!! trans('portal.detailed') !!}
                                    </h3>
                                    --}}
                                </div>
                                @if(!empty($raza))
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span>
                                            <strong>{!! trans('portal.raza') !!}</strong> :</span>
                                        {!! trans('horse.raza.'.$raza )!!}
                                    </div>
                                @endif
                                @if(!empty($sexo))
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span>
                                            <strong>{!! trans('portal.sex') !!}</strong> :</span>
                                        {!! trans('horse.sex.'.$sexo )!!}
                                    </div>
                                @endif
                                @if(!empty($edad))
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span>
<strong>{!! trans('portal.age') !!}</strong> :</span> @if(!empty($edad))
                                            {!! trans('horse.years',['ano'=>$edad]) !!}
                                        @else
                                            {!! trans('horse.yearsunkown') !!}
                                        @endif
                                    </div>
                                @endif
                                @if(($alzada!=0))
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span>
<strong>{!! trans('portal.raised') !!}</strong> :</span> @if(!empty($alzada))
                                            {!! $alzada !!}
                                        @endif
                                    </div>
                                @endif
                                @if(!empty($color))
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span>
<strong>{!! trans('portal.color') !!}</strong> :</span> @if(!empty($color))
                                            {!! $color !!}
                                        @endif
                                    </div>
                                @endif
                                @if(!empty($doma))
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span>
<strong>{!! trans('portal.doma') !!}</strong> :</span>
                                        @if(!empty($doma))
                                            @if($doma == 1)
                                                {!! trans('horse.doma.'.$doma )!!}
                                            @endif
                                        @endif
                                    </div>
                                @endif
                                @if($ParaVender == true)
                                    <div class='col-sm-4 col-md-4 col-xs-12 no-padding mone'
                                            {{--@if(!empty($ccs)) data-toggle="tooltip" data-placement="top" title="{!! Funciones::AjustarNumeroMil($ccs,2) !!} {!! $Coins !!}" @endif--}}
                                    >
                                        <span> <strong>{!! trans('portal.price') !!}</strong> :
                                            @if( $horse->sold == 1)
                                                {!! trans('users.sold') !!}
                                            @else

                                                @if(empty($precio))
                                                    <span class="consulta">
                                                    {!! trans('users.pricecheck') !!}

                                                </span>

                                                    {{--Contacto--}}
                                                <!-- CONSULTAR PRECIO AQUI -->
                                                @else
                                                    <span data-getprice="{!! $horse->slug !!}" @include('backend.common.toolmoneda',['horse'=>$horse,'p'=>1 ]) >

                                                        {!! $horse->ObtenPrecioMonedaMill() !!}
                                                        <span class="coinl coinl-local">
                                                        {!! $horse->getSimboloMoneda() !!}
                                                    </span>
                                                </span>
                                                    {{--
                                                    {!! $precio !!}
                                                    <i class="fa fa-eur"> </i>
                                                    --}}
                                                @endif
                                            @endif
                                        </span>

                                    </div>
                                    {{--
                                                                        @if(!empty($precio))
                                                                            @if( $horse->sold == 0)
                                                                                @include('backend.common.movilmoneda',['precio'=> $precio,'detalle'=>1])
                                                                            @endif
                                                                        @endif
                                                                        --}}
                                @endif


                                @if(!empty($horse->tocubri))
                                    @if($horse->tocubri ==1)
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                            <span> <strong>{!! trans('horse.text.cubricion') !!} </strong> :
                                                <span @include('backend.common.toolmoneda',['horse'=>$horse,'c'=>1 ]) >
                                                    {!!  $horse->ObtenPrecioCubricionMonedaMill() !!}
                                                    <span class="coinl coinl-local">
                                                        {!! $horse->getSimboloMoneda() !!}
                                                    </span>
                                                </span>
                                            </span>

                                            {{--
                                            {!! Funciones::AjustarNumeroMil($horse->getCubri()) !!}
                                            <i class="fa fa-eur"> </i>
                                            --}}
                                        </div>
                                    @endif
                                @endif

                                @if(!empty($horse->getGenealogia()))
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                            <span>
<strong>{{trans('horse.text.genealogia')}} </strong> :</span>


                                        <a
                                                href="{!!$horse->getGenealogia() !!}" target="_blank">
                                            {!! trans('tema1.ficha') !!}
                                        </a>
                                    </div>
                                @endif
                                @if(!empty($horse->getStud()))
                                    <div class="col-12 col-xs-12 no-padding">
                                            <span>
                                            <strong>{{trans('horse.text.stud')}} </strong> :</span>

                                        {!! $horse->getStud() !!}
                                    </div>
                                    <br>
                                @endif
                            </div>
                        </div>
                        <!-- Short Features  -->
                        <div class="col-12 row m-t-25">
                            <div class="desc-points text-justify">
                                {!! $horse->getDescripcion() !!}
                            </div>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <!-- Single Ad End -->
            </div>
            <div class="col-md-4 col-xs-12 col-sm-12">
                <!-- Sidebar Widgets -->
                <div class="sidebar">
                    <!-- Contact info -->
                    <div class="contact white-bg">
                        <!-- Email Button trigger modal -->
                    {{--<button class="btn-block btn-contact contactEmail" data-toggle="modal"
                            data-target=".price-quote">
                        {!! trans('portal.emailcontact') !!}
                    </button>--}}
                    <!-- Email Button trigger modal -->
                        <button onclick="mostrarrecomendar('.price-quote')"
                                class="btn-block btn-contact contactEmail"
                                {{--
data-toggle="modal"
data-target=".price-quote"
--}}
                        >
                            {!! trans('portal.emailcontact') !!}
                        </button>
                    {{--
                    <div class="col-12">
                        <a class="btn-block btn-contact contactEmail volver"
                           href="{!! route('MyContact',['slug'=>$user->getMySlug()]) !!}">
                            {!! trans('portal.emailcontact') !!}
                        </a>
                    </div>
                    --}}
                    @if(!empty($horse->getStudPhone()))
                        @php($ph = $horse->getStudPhone())
                        @if(isset($ph[0]))
                            @php($ph = Phone::find($ph[0]['id']))
                            <!-- Email Modal -->
                                <button
                                        {{-- onclick="Llamar('{!! $ph->getFormatNumberOnly() !!}', this)"--}}
                                        class="btn-block btn-contact contactPhone number"
                                        data-last="111111X">

                                    <a href="tel:{{ $ph->getFormatNumberOnly() }}" class="text-black">
                                        {!! $ph->FormatNumber()!!}
                                    </a>
                                    {{--
                                    <span>XXXXXXX</span>
                                    --}}
                                </button>
                            @endif
                        @endif
                    </div>
                @if($ParaVender == true)
                    <!-- Price info block -->
                        <div
                             @if(!empty($precio))
                             data-getprice="{!! $horse->slug !!}"
                             @include('backend.common.toolmoneda',['horse'=>$horse,'p'=>1,'class'=>" ad-listing-price mone "])
                             @else
                             class="ad-listing-price mone"
                                @endif


                        >

                            <p>

                                @if( $horse->sold == 1)
                                    {!! trans('users.sold') !!}
                                @else
                                    @if(empty($precio))
                                        <span class="">
                                                    {!! trans('users.pricecheck') !!}

                                                </span>
                                        {{--Contacto--}}
                                    <!-- CONSULTAR PRECIO AQUI -->
                                    @else

                                        {!! $horse->ObtenPrecioMonedaMill() !!}
                                        <span class="coinl coinl-local">
                                                        {!! $horse->getSimboloMoneda() !!}
                                                    </span>

                                        {{--
                                                                                {!! $horse->ObtenPrecioMonedaMill() !!}

                                                                                <span class="coinl ">
                                                                {!! $horse->getSimboloMoneda() !!}
                                                            </span>
                                                                            --}}
                                        {{--
                                            {!! $precio !!}
                                            <i class="fa fa-eur"> </i>
                                        --}}
                                        {{--@include('backend.common.movilmoneda',['precio'=> $precio]) --}}

                                    @endif
                                @endif

                            </p>
                        </div>
                @endif

                <!-- User Info -->
                    <div class="white-bg user-contact-info">
                        <div class="user-info-card"
                             style="    border-style: none none solid; border-width: medium medium 1px;">
                            <div class="user-photo col-md-4 col-sm-3  col-xs-4">

                                <img src="{!! $horse->getYeguada()->getLogo() !!}"
                                     alt="{!! $horse->getYeguada()->getName() !!}">
                            </div>
                            <div class="user-information no-padding col-md-8 col-sm-9 col-xs-8">
                                    <span class="user-name">
                                        <span class="hover-color"
                                        >{!! $horse->getStudName() !!}</span>
                                    </span>
                                <div class="item-date">
                                    @if(!empty($stud->getAddress()))
                                        <span class="ad-pub">
                                                 {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}
                                            , {!! $stud->getStateModel()->name!!}
                                            , {!! $stud->getCountryModel()->name !!}
                                            {{--{!! trans('portal.pubdate',['date'=>Funciones::AjustarFechaDmy($horse->created_at)]) !!}--}}
                                            </span>
                                        <br>
                                    @endif
                                </div>
                            </div>
                            <div class="clearfix">
                            </div>
                        </div>
                        {{--
                        @php($publicaciones = $horse->getUser()->CaballosPublicadosPorRaza())
                        @if(!empty($publicaciones))
                            <div class="ad-listing-meta">
                                <ul>
                                    @foreach($razas as $k=>$v)
                                        @if($k !=0)
                                            @php($total = $horse->getUser()->CaballosPublicadosPorRaza($k))
                                            @if(count($total)!=0)
                                                <li>{!! $v !!}: <span
                                                            class="color">{!! count($horse->getUser()->CaballosPublicadosPorRaza($k)) !!}</span>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        --}}
                        <div id="itemMap" style="width: 100%; height: 370px; margin-bottom:5px;">
                            {{--volver --}}
                            <a
                                    @if($venta == 1)
                                    href="{!! route('MySell',['slug'=>$user->getMySlug()]) !!}"
                                    @else
                                    href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>$tipo,'v'=>0]) !!}"
                                    @endif
                                    class="btn-block btn-contact  volver" style=" ">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                {!! trans('stud.horsedetail.goback') !!}
                            </a>
                            {{--siguiente --}}
                            @if(!empty($prev))
                                <a class="volver btn-block btn-contact " href="{!! $prev !!}">
                                        <span>
                                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                            {!! trans('portal.back') !!}</span>
                                </a>
                            @endif
                            {{-- anterior --}}
                            @if(!empty($next))
                                <a class=" volver  btn-block btn-contact " href="{!! $next !!}">
                                        <span>{!! trans('portal.next') !!}
                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                            </span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row End -->


        </div>
    </div>
@endsection
@section('js')
    {{--pop--}}
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a28c20e7932ab9f"></script>
    {{-- Barra --}}
    <script type="text/javascript" src="{!! url('frontend/js/nivo-lightbox.min.js')!!}"></script>
    {{--<script src="{!! url('js/gelery/pgwslideshow.min.js') !!}"></script>--}}
    <!-- Carousel Slider  -->
    <script src="{!! url('portal_/js/carousel.min.js') !!}"></script>
    <script src="{!! url('portal_/js/slide.min.js') !!}"></script>
    {{--
    <script src="{!! url('mosaic/jquery.mosaicflow.min.js') !!}"> </script>
    --}}

    <script>
        function emailo() {
            $('.at-svc-email').click();
        }

        /*==========  Single Page SLider With Thumb ==========*/
        $('#carousels').flexslider({
            animation: "slide",
            controlNav: false,
            directionNav: true,
            animationLoop: false,
            slideshow: true,
            itemWidth: 110,
            itemMargin: 2,
            asNavFor: '.single-page-slider'
        });
        $('.single-page-slider').flexslider({
            animation: "slide",
            controlNav: false,
            directionNav: true,
            animationLoop: false,
            slideshow: true,
            maxItems: 1,
            {{--//itemMargin: 2,--}}

            sync: "#carousel"
        });
        {{--}}
        var $grid = $('.grid').imagesLoaded(function () {
            // init Masonry after all images have loaded
            $grid.masonry({
                // options...
                itemSelector: '.grid-item', // use a separate class for itemSelector, other than .col-
                columnWidth: '.grid-sizer',
                percentPosition: true
            });
        });
        $('article').readmore({
            speed: 500, collapsedHeight: 400,
            moreLink: '<a href="#">Lee mas</a>',
            lessLink: '<a href="#">Lee Menos</a>',
        });
        --}}
        $('.owl-carousel').owlCarousel({
            loop: true,
            items: 3,
            margin: 10,
            nav: true,
            dots: false,
            {{--//nav: false,--}}
            lazyLoad: true,
            URLhashListener: true,
            autoplayHoverPause: true,
            startPosition: 'URLHash',
            video: true,
            {{--//autoWidth: true,--}}
            navText: ["<", ">"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });
        $('article').readmore({
            speed: 500, collapsedHeight: 103,
            moreLink: '<a href="#" >{!! trans('portal.readmore') !!}</a>',
            lessLink: '<a href="#">{!! trans('portal.readless') !!}</a>',
        });

        function contacto() {
            var s = "<div class=\"contact-message col-12\">" +
                "    <form id=\"contact-form\" action=\"{!! route('contacto.accion') !!}\" method=\"post\">" +
                "        <input type=\"hidden\" value=\"{!! csrf_token() !!}\" id=\"_token\" name=\"_token\">" +
                "        <div class=\"col-xs-12\">" +
                "            <div class=\"col-xs-12 form-control\">" +
                "                <div class=\"single-input field col-xs-12 form-control\">" +
                "                    <input name=\"name\" class=\"form_control\" type=\"text\"" +
                "                           placeholder=\"nombre y apellido\">" +
                "                </div>" +
                "            </div>" +
                "            <div class=\"col-xs-12\">" +
                "                <div class=\"single-input field col-xs-12 form-control\">" +
                "                    <input name=\"email\" class=\"form_control\" type=\"text\"" +
                "                           placeholder=\"correo electronico (opcional)\">" +
                "                </div>" +
                "            </div>" +
                "            <div class=\"col-xs-12\">" +
                "                <div class=\"single-input field col-xs-12 form-control\">" +
                "                    <input name=\"phone\" class=\"form_control\" type=\"tel\"" +
                "                           placeholder=\"Escribe tu numero de contacto\">" +
                "                </div>" +
                "            </div>" +
                "" +
                "        </div>" +
                "        <div class=\"col-xs-12 \" style=\"padding-bottom: 86px;\">" +
                "            <div class=\"col-xs-12\">" +
                "                <div class=\"single-input field col-xs-12 form-control\">" +
                "                    <textarea name=\"message\" class=\"form_control\"" +
                "                              placeholder=\"Escribe tu mensaje\"></textarea>" +
                "                </div>" +
                "            </div>" +
                "            <div class=\"col-xs-12\">" +
                "                <div class=\"send-button field col-xs-12 form-control\">" +
                "                    <button type=\"submit\" class=\"btn btn-big btn-solid\">" +
                "                        <span> Enviar </span></button>" +
                "                </div>" +
                "            </div>" +
                "        </div>" +
                "    </form>" +
                "</div>";
            swal({
                title: 'Contaca con {!! $stud->getName() !!}',
                /*type: 'info',*/
                html: s,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> Contacta',
                confirmButtonAriaLabel: '',
                cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i>',
                cancelButtonAriaLabel: '{!! trans('users.cancel') !!}',
            });
        }

        function mostrarreportar(el) {
            modalshow(el);
        }

        function mostrarrecomendar(el) {
            modalshow(el);
        }


        var nivoActivator = $('.nivo-activator');
        $('.slider-btn, .nivo-trigger').nivoLightbox({
            theme: 'default',
            afterShowLightbox: function () {
                $('.nivo-lightbox-prev').html('<i class="fa fa-chevron-left"></i>').css('left', '5%').css('font-size', '30px').css('color', 'white');

                $('.nivo-lightbox-next').html('<i class="fa fa-chevron-right"></i>').css('right', '5%').css('font-size', '30px').css('color', 'white');
                $('.nivo-lightbox-close').html('<i class="fa fa-times"></i>').css('color', 'white');
                {{--$(' .nivo-lightbox-image img').addClass('img-responsive');--}}
            }
        });
        {{--
        $('.mone').on('click', function () {
            $(this).tooltip('enable').tooltip('open');
        });

        $.each($("[rel=tooltip]"), function (k, v) {
            var s = $(v).attr('data-title');
            var r = s;

            $(v).attr('data-title', r).attr('title', r)
                .tooltip({
                    html: true,
                    title: r,
                    placement: "auto",
                    track: true,
                    content: function () {
                        return $(this).prop('title');
                    },
                    open: function (event, ui) {
                        ui.tooltip.animate({top: ui.tooltip.position().top + 10}, "fast");
                    },
                    position: {

                    }
                });

       });
        --}}

    </script>
@endsection
@section('modal')
    @include('portal.Modal.contacto',['horse'=>$horse])
    @include('portal.Modal.compart',['horse'=>$horse])
    @include('portal.Modal.report',['horse'=>$horse])
    @include('portal.Modal.detalle',['horse'=>$horse])
    @include('portal.Modal.email',['horse'=>$horse])
@endsection
