{{-- ESTE SE USA PARA DETALLE DE CABALLO --}}
<?php $logo =url("landing/images/basic/logo.png"); ?>
<?php $logo =url("portal_/images/logoportal.png"); ?>
<?php $logo =url(\Config::get('logos.favicon32')); ?>
<?php $stud = $horse->getYeguada(); ?>
<?php $Coins = \Session::get('moneda'); ?>
<?php $Coins = empty($Coins)?'USD':$Coins; ?>
@php
    $prs = \Session::get('pre');

        $lang = \Session::get('lang');
        if (empty($lang)) {
        $lang = 'es';
        \Session::put('lang', $lang);
        \Session::put('applocale', $lang);
        }
        App::setLocale($lang);
            $ffoto=\Config::get('logos.logoh250');
                $precio = Funciones::AjustarNumeroMil($horse->getPrice());
                $raza = $horse->getRaza();
                $razas = trans('horse.raza');
                $alzada = $horse->getRaisedFormat();
                $edad = $horse->getAge();

                                                    $mes = $horse->getAgeMonth();
            $sexo = $horse->getSex();
            $doma = $horse->getDoma();
            $yeguada = $horse->getStud();
            $fbs = Funciones::CompartirFacebook($horse->getName(),Request::fullUrl());
            $tws = Funciones::CompartirTwitter($horse->getName(),Request::fullUrl());
            $Gs = Funciones::CompartirGoogle(Request::fullUrl());
            $Ptr = Funciones::CompartirPinterest($horse->getName(),Request::fullUrl());
            $print = route('VersionImpresa',['ids'=>$horse->slug]);
    $css = null;
            if(!empty($Coins) and !empty($precio)) {
            $ccs = Funciones::currencyConverter($Coins, $precio);
            }

    $mx = \Session::get('mexico');
       $colombia = \Session::get('colombia');
       $spa = \Session::get('espana');
        if($mx == true){
            $pais = \Session::get('pais_id');
        }elseif($spa == true){
            $pais = \Session::get('pais_id');
        }elseif($colombia == true){
            $pais = \Session::get('pais_id');
        }else{
            $pais = null;
        }
@endphp
        <!DOCTYPE html>
<html lang="{!! $lang !!}">
<head>
    @include('portal.sidebar.head')
    @php
        $seokey = trans('seo.portalkey');
        $seoDes =  trans('seo.portaldescription');
            if($mx == true){
                $seokey = trans('seo.tagsMexico');
                $seoDes = trans('seo.DescripMexico');
            }elseif($spa == true){
                $seokey = trans('seo.tagsEspana');
                $seoDes = trans('seo.DescripEspana');
            }elseif($colombia == true){
                $seokey = trans('seo.tagsCol');
                $seoDes = trans('seo.DescripCol');
            }elseif($prs == true){
                $seokey = trans('seo.tagsPre');
                $seoDes = trans('seo.DescripPre');
            }

        $seokey = (empty($seokey))?trans('seo.portalkey'):$seokey;
        $seoDes = (empty($seoDes))?trans('seo.portaldescription'):$seoDes;
    @endphp
    @include('meta',
  [
  'titulo' => $horse->getName(),
  'descripcion'=>$horse->getDescripcion(),
'key'=>$horse->getName().', '.$horse->getYeguada()->getName().", ".$seokey,
  'logo'=>$logo,
  'imagenes' =>$horse->getPhotoModel(),
  ])
    @foreach($horse->getPhotoModel() as $h => $i)
        <meta property="og:image" content="{!! $i->url !!}"/>
    @endforeach
    @foreach($horse->getVideosModel() as $h => $i)
        <meta property="og:video" content="{!! $i->getYoutubeThumb()  !!}">
        <meta name="twitter:player" content="{!! $i->getYoutubeThumb()  !!}">
    @endforeach
    <link rel="stylesheet" href="{!! url('frontend/css/nivo-lightbox.min.css')!!}">
    <link rel="stylesheet" href="{!! url('portal_/css/horsedetail.css')!!}">
    @if(!empty($imagen))
        <style>
            .footer-area {
                background: rgba(0, 0, 0, 0) url({!! $imagen !!}) no-repeat scroll center top/ cover;
            }

            <?php $imagen = 'http://horsesworldsale.com/landing/images/slider/1/9.jpg'; ?>
            .page-header-area {
                background: rgba(0, 0, 0, 0) url({!! $imagen !!}) no-repeat scroll center top/ cover;

            }

        </style>
    @endif
    <style>
        .p-l-10 {
            padding-left: 10px !important;
        }

        .text-black {
            color: #464646 !important;
        }
    </style>

</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WL5JW4G"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
@include('portal.menu.menu')

<!-- Navigation Menu End -->
<!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->

<div class="page-header-area" style="    padding-top: 145px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-page text-center">
                    <h1>{!! $horse->getName() !!}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Small Breadcrumb -->
<div class="small-breadcrumb">
    <div class="container">
        <div class=" breadcrumb-link">
            <ul>
                <li>
                    <a href="{!! route('portal') !!}">{!! trans('portal.portal') !!}</a>
                </li>
                <li>
                    <a href="{!! route('listaportal') !!}">{!! trans('portal.listado') !!}</a>
                </li>
                <li>
                    <a class="active" href="#">{!! $horse->getName() !!}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Small Breadcrumb -->
<!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding error-page pattern-bgs gray ">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class=" col-xs-12 m-t-25">
                    @include('flash::message')
                </div>
            {{--
            <!-- =-=-=-=-=-=-= Advertizing Sidebar =-=-=-=-=-=-= -->
            <div class="col-md-2 col-sm-2  hidden-xs hidden-sm  leftbar-stick">
                <div class="theiaStickySidebar">
<img alt="" src="{!! url('portal_/images/160x600.png') !!}">
</div>
            </div>
            --}}

            <!-- Middle Content Area -->
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <!-- Single Ad -->
                    <div class="horse-special">
                        <!-- Title -->
                        <div class="ad-box">
                            <h1>{!! $horse->getName() !!}</h1>

                            <div class="short-history">
                                <ul>

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
                                            {{--<a href="{!! route('portalporraza',['raza'=>$raza]) !!}">{!! trans('horse.raza.'.$raza )!!}</a>--}}
                                            <b>{!! trans('horse.raza.'.$raza )!!}</b>
                                        </b>
                                    </li>

                                    {{--
                                    <li>
                                        {!! trans('portal.location') !!} : <b>{!! $horse->getStudLocation() !!}</b>
                                    </li>--}}
                                </ul>
                            </div>
                        </div>


                    {{--
                                            <div class="images-inner  ">
                                                <div class="nivo-activator">
                                                </div>
                                                <div class="images single-images-gl clearfix ">
                                                    <a href="{!! $v->getNormalVideoYoutube() !!}"
                                                       class="nivo-trigger"
                                                       data-lightbox-gallery="gallery1"
                                                    >
                                                <span class="fa fa-play">
                                                </span>
                                                        <img lsrc="{!! $v->getYoutubeThumb() !!}" alt="{!! $v->getName() !!}" class="">
                                                    </a>
                                                </div>
                                            </div>
                                            --}}
                    <!-- Listing Slider  -->
                        @if(count($horse->getPhotoModel() )!=0)
                            <div class="flexslider single-page-slider">
                                <div class="flex-viewport">
                                    <ul class="slides slide-main">
                                        <?php $ts = count($horse->getPhotoModel()); ?>
                                        @foreach($horse->getPhotoModel() as $k=>$v)
                                            <?php $ffoto =  $v->getUrl(); ?>
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
                                                         title="" onclick="$('#img_{!! $k !!}').click()"
                                                         class="img-responsive"

                                                    >
                                                </figure>

                                            </li>
                                            <?php $ts = $k+1; ?>
                                        @endforeach

                                        @foreach($horse->getVideosModel() as $k => $v)
                                            <?php $ssd = $ts + $k; ?>
                                            <li @if($k==0) class="flex-active-slide" @endif >
                                                <div class="nivo-activator"></div>
                                                <a id="vid_{!! $k !!}"
                                                   href="{!! $v->getNormalVideoYoutube() !!}"
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
                        @if(count($horse->getPhotoModel() )!=0 or count($horse->getVideosModel())!=0)
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
                                                         class="img-responsive"
                                                         title=""
                                                         {{--onclick="Mostrar('{!! $v->getUrl() !!}')"--}}
                                                         draggable="false"
                                                    >
                                                </figure>
                                                <span class="fa fa-youtube-play">
                            </span>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <!-- Share Ad  -->
                        @endif
                        <div class="clearfix"></div>
                        <div class="ad-share text-center">
                            <div data-toggle="modal" class="ad-box col-md-4 col-sm-4 col-xs-12 h-76">
                                {{-- data-target=".share-ad" --}}

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
                                   data-url="{!! Request::fullUrl() !!}"
                                   data-title="{!!  $horse->getName() !!}"
                                   data-media="{!! $ffoto !!}"
                                   class="btn btn-pinterest sharedbtn">
                                    <i class="fa fa-pinterest">
                                    </i>
                                </a>

                                <a href="#!" rel="nofollow" class="btn btn-print sharedbtn"
                                   onclick="window.open('{!! $print !!}', '{!! $horse->getName() !!}', 'width=700,height=600,top=100,left=100,resizable,scrollbars');">
                                    <i class="fa fa-print"> </i>
                                </a>


                                {{--<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>--}}
                                {{--
                                <i class="fa fa-share-alt">
                                </i>
                                <span class="hidetext">{!! trans('portal.share') !!}</span>
                                --}}
                            </div>
                            <div class="ad-box col-md-4 col-sm-4 col-xs-12 h-76"
                                 data-target=".report-mail" data-toggle="modal"
                                    {{--}}onclick="emailo()"--}}
                            >
                                {{--
                                <div class="col-xs-3 addthis_inline_share_toolbox">
                                </div>
                                --}}
                                <div class="col-xs-12 center-block">

                                    <i class="fa fa-envelope">
                                    </i>
                                    <span class="hidetext">{!! trans('portal.watchlist') !!}</span>

                                </div>
                            </div>
                            <div
                                    data-target=".report-quote" data-toggle="modal"
                                    class="ad-box col-md-4 col-sm-4 col-xs-12 h-76">

                                <i class="fa fa-warning">
                                </i>
                                <span class="hidetext">
                                    {!! trans('portal.report') !!}
                                </span>
                            </div>
                        </div>
                        <div class="clearfix">
                        </div>

                        {{--<img alt="" class="center-block margin-bottom-30" src="{!! url('portal_/images/advertise-728x90.jpg') !!}">--}}

                    <!-- Short Description  -->
                        <div class="ad-box">
                            <div class="col-12 row">
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

                                    {{--
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span>
    <strong>Condition</strong> :</span> Used
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span>
    <strong>Brand</strong> :</span> Nokia
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span>
    <strong>Model</strong> :</span> Lumia 625
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                        <span>
    <strong>Product Type</strong>:</span> Mobile
                                    </div>
                                    --}}



                                    @if(!empty($raza))
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding p-l-10">
                                        <span>
                                            <strong>{!! trans('portal.raza') !!}</strong> :</span>
                                            {!! trans('horse.raza.'.$raza )!!}
                                        </div>
                                    @endif
                                    @if(!empty($sexo))
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding p-l-10">
                                        <span>
                                            <strong>{!! trans('portal.sex') !!}</strong> :</span>
                                            {!! trans('horse.sex.'.$sexo )!!}
                                        </div>
                                    @endif
                                    @if(!empty($edad))
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding p-l-10">
                                        <span>
<strong>{!! trans('portal.age') !!}</strong> :</span> @if(!empty($edad))
                                                {!! trans('horse.years',['ano'=>$edad]) !!}
                                            @else
                                                {!! trans('horse.yearsunkown') !!}
                                            @endif
                                        </div>
                                    @endif

                                    @if(($alzada!=0))
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding p-l-10">
                                        <span>
<strong>{!! trans('portal.raised') !!}</strong> :</span> @if(!empty($alzada))
                                                {!! $alzada !!}
                                            @endif
                                        </div>
                                    @endif
                                    @if(!empty($color))
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding p-l-10">
                                        <span>
<strong>{!! trans('portal.color') !!}</strong> :</span> @if(!empty($color))
                                                {!! $color !!}
                                            @endif
                                        </div>
                                    @endif
                                    @if(!empty($doma))
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding p-l-10">
                                        <span>
<strong>{!! trans('portal.doma') !!}</strong> :</span>
                                            @if(!empty($doma))
                                                @if($doma == 1)
                                                    {!! trans('horse.doma.'.$doma )!!}
                                                @endif
                                            @endif
                                        </div>
                                    @endif
                                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding p-l-10 mone"
                                    @if( $horse->sold == 0)
                                        @include('backend.common.toolmoneda',['horse'=>$horse,'p'=>1])
                                            @endif
                                    >
                                        <span> <strong>{!! trans('portal.price') !!}</strong> :</span>
                                        {{--
                                        {!! $precio !!} <i class="fa fa-eur"> </i>
                                        --}}


                                        @if(empty($precio))
                                            <span class="consulta">
                                                    {!! trans('users.pricecheck') !!}

                                                </span>
                                            {{--Contacto--}}
                                        <!-- CONSULTAR PRECIO AQUI -->
                                        @else
                                            <span data-getprice="{!! $horse->slug !!}">

                                                </span>
                                            {{--{!! $precio !!}
                                            <i class="fa fa-eur"> </i>--}}
                                        @endif

                                    </div>

                                    @if(!empty($horse->tocubri))
                                        @if($horse->tocubri ==1)
                                            @if($horse->cubri != 0)
                                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding p-l-10">
                                                    <span>
                                                        <strong>{!! trans('horse.text.cubricion') !!} </strong> :
                                                    </span>
                                                    <span data-getcubri="{!! $horse->slug !!}" @include('backend.common.toolmoneda',['horse'=>$horse,'c'=>1,'class'=>' spcu'])>
                                                    </span>
                                                </div>
                                            @else
                                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding p-l-10">
                                                    <span>
                                                        <strong>{!! trans('horse.text.cubricion') !!} </strong> :
                                                    </span>
                                                    <span>
                                                        {!! trans('users.pricecheck') !!}
                                                    </span>
                                                </div>
                                            @endif

                                        @endif
                                    @endif
                                    {{--
                                    @if(!empty($precio))
                                        @if( $horse->sold == 0)
                                            @include('backend.common.movilmoneda',['precio'=> $precio,'detalle'=>1])
                                        @endif
                                    @endif
                                    --}}
                                    @if(!empty($horse->getGenealogia()))
                                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding p-l-10">
                                            <span>
                                                <strong>{{trans('horse.text.genealogia')}} </strong> :
                                            </span>
                                            <a
                                                    href="{!!$horse->getGenealogia() !!}" target="_blank">
                                                {!! trans('tema1.ficha') !!}
                                            </a>
                                        </div>
                                    @endif



                                    @if(!empty($horse->getStud()))
                                        <div class="col-12 col-xs-12 no-padding p-l-10">
                                            <span>
<strong>{{trans('horse.text.stud')}} </strong> :</span>

                                            {!! $horse->getStud() !!}
                                        </div>
                                        <br>
                                    @endif
                                </div>
                            </div>
                            <!-- Short Features  -->
                            <div class="col-12 row">
                                <div class="desc-points p-l-10">
                                    {!! $horse->getDescripcion() !!}
                                    {{--
                                    <ul>
                                        <li>
                                            Looking to sell the car urgently.
                                        </li>
                                        <li>
                                            Engine is good condition.
                                        </li>
                                        <li>
                                            Complete service history available.
                                        </li>
                                        <li>
                                            Original return file is available.
                                        </li>
                                        <li>
                                            After Market Alloy rims.
                                        </li>
                                        <li>
                                            As good as a brand new car.
                                        </li>
                                        <li>
                                            Lady Driven Car in Immaculate Condition.
                                        </li>
                                        <li>
                                            No Work Required in Car.
                                        </li>
                                        <li>
                                            Excellent Mileage , Local Average = 14 km , Long Average = 16 km .
                                        </li>
                                    </ul>
                                    --}}
                                </div>
                            </div>
                            {{--
                            <!-- Related Image  -->
                            <div class="ad-related-img">
                                <img src="{!! url('portal_/images/car-img1.png') !!}" alt=""
                                     class="img-responsive center-block">
                            </div>

                            <!-- Ad Specifications -->
                            --}}
                            {{--
                            <div class="specification">
                                <!-- Heading Area -->
                                <div class="heading-panel">
                                    <h3 class="main-title text-left">
                                        Specifications
                                    </h3>
                                </div>

                                <div class="ad-row row">
                                    <div class="col-md-6 col-xs-12 col-sm-12">

                                        <img alt="" src="{!! url('portal_/images/300x250.gif') !!}">
                                    </div>
                                    <div class="col-md-6 col-xs-12 col-sm-12">

                                        <img alt="" src="{!! url('portal_/images/300x250.gif') !!}">
                                    </div>
                                </div>

                                <p>
                                    samsung galaxy note 2 new condition with handsfree and charger urgent sale. with
                                    book pouch original 4g lte. 16 gb condition 10/10 andriod kitkat4.4.2
                                </p>
                                <p>
                                    Bank Leased 5 Year plan 2013 Honda Civic 1.8 Vti Oriel Prosmatec Automatic ( New
                                    Shape ) Attractive Silver Color 1 year installments paid Lahore Reg number Well
                                    Maintained Insurance + tracker etc included Options: Sunroof
                                </p>
                                <p>
                                    Chilled AC Power Windows Power Steering ABS braking system ETC 15000 km carefully
                                    driven No SMS / Email , Serious Buyers Requested To Call .
                                </p>
                                <p>
                                    Chilled AC Power Windows Power Steering ABS braking system ETC 15000 km carefully
                                    driven No SMS / Email , Serious Buyers Requested To Call .
                                </p>
                                <p>
                                    Bank Leased 5 Year plan 2013 Honda Civic 1.8 Vti Oriel Prosmatec Automatic ( New
                                    Shape ) Attractive Silver Color 1 year installments paid Lahore Reg number Well
                                    Maintained Insurance + tracker etc included Options: Sunroof
                                </p>
                            </div>
                            --}}
                            <div class="clearfix">
                            </div>
                        </div>
                        <div class="clearfix">
                        </div>
                        {{--
                                                <img alt="" class="center-block margin-top-30 margin-bottom-30"
                                                     src="{!! url('portal_/images/advertise-728x90.jpg') !!}">
                                                --}}

                    </div>
                    <!-- Single Ad End -->
                    {{--
                    <!-- Single Ad -->
                    <div class="horse-special">
                        <!-- Title -->
                        <div class="ad-box">
                            <h1>{!! $horse->getName() !!}</h1>
                            <div class="short-history">
                                <ul>
                                    <li>Published on: <b>07 Oct 2017</b>
    </li>
                                    <li>Category: <b>
    <a href="#">Used Cars</a>
    </b>
    </li>
                                    <li>Location: <b>London</b>
    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Listing Slider  -->
                        <div class="flexslider single-page-slider">
                            <div class="flex-viewport">
                                <ul class="slides slide-main">
                                    <li class="">
    <img alt="" src="{!! url('portal_/images/single-page/1.jpg') !!}" title="">
    </li>
                                    <li>
    <img alt="" src="{!! url('portal_/images/single-page/2.jpg') !!}" title="">
    </li>
                                    <li class="flex-active-slide">
    <img alt="" src="{!! url('portal_/images/single-page/3.jpg') !!}" title="">
    </li>
                                    <li>
    <img alt="" src="{!! url('portal_/images/single-page/4.jpg') !!}" title="">
    </li>
                                    <li>
    <img alt="" src="{!! url('portal_/images/single-page/5.jpg') !!}" title="">
    </li>
                                    <li>
    <img alt="" src="{!! url('portal_/images/single-page/6.jpg') !!}" title="">
    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Listing Slider Thumb -->
                        <div class="flexslider" id="carousels">
                            <div class="flex-viewport">
                                <ul class="slides slide-thumbnail">
                                    <li>
    <img alt="" draggable="false" src="{!! url('portal_/images/single-page/1_thumb.jpg') !!}">
    </li>
                                    <li>
    <img alt="" draggable="false" src="{!! url('portal_/images/single-page/2_thumb.jpg') !!}">
    </li>
                                    <li class="flex-active-slide">
    <img alt="" draggable="false" src="{!! url('portal_/images/single-page/3_thumb.jpg') !!}">
    </li>
                                    <li>
    <img alt="" draggable="false" src="{!! url('portal_/images/single-page/4_thumb.jpg') !!}">
    </li>
                                    <li>
    <img alt="" draggable="false" src="{!! url('portal_/images/single-page/5_thumb.jpg') !!}">
    </li>
                                    <li>
    <img alt="" draggable="false" src="{!! url('portal_/images/single-page/6_thumb.jpg') !!}">
    </li>
                                    <!-- items mirrored twice, total of 12 -->
                                </ul>
                            </div>
                        </div>
                        <!-- Share Ad  -->
                        <div class="ad-share text-center">
                            <div data-toggle="modal" data-target=".share-ad" class="ad-box col-md-4 col-sm-4 col-xs-12">
                                <i class="fa fa-share-alt">
    </i>
    <span class="hidetext">Share</span>
                            </div>
                            <a class="ad-box col-md-4 col-sm-4 col-xs-12" href="#">
    <i class="fa fa-star active">
    </i>
    <span class="hidetext">Add to watchlist</span>
    </a>
                            <div data-target=".report-quote" data-toggle="modal" class="ad-box col-md-4 col-sm-4 col-xs-12">
                                <i class="fa fa-warning">
    </i>
    <span class="hidetext">Report</span>
                            </div>
                        </div>
                        <div class="clearfix">
    </div>

                        <img alt="" class="center-block margin-bottom-30" src="{!! url('portal_/images/advertise-728x90.jpg') !!}">

                        <!-- Short Description  -->
                        <div class="ad-box">
                            <div class="short-features">
                                <!-- Heading Area -->
                                <div class="heading-panel">
                                    <h3 class="main-title text-left">
                                        Description
                                    </h3>
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                    <span>
    <strong>Condition</strong> :</span> Used
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                    <span>
    <strong>Brand</strong> :</span> Nokia
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                    <span>
    <strong>Model</strong> :</span> Lumia 625
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                    <span>
    <strong>Product Type</strong>:</span> Mobile
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                    <span>
    <strong>Date</strong> :</span> 2014-10-06
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                    <span>
    <strong>Price</strong> :</span> Rs. 22,000
                                </div>
                            </div>
                            <!-- Short Features  -->
                            <div class="desc-points">
                                <ul>
                                    <li>
                                        Looking to sell the car urgently.
                                    </li>
                                    <li>
                                        Engine is good condition.
                                    </li>
                                    <li>
                                        Complete service history available.
                                    </li>
                                    <li>
                                        Original return file is available.
                                    </li>
                                    <li>
                                        After Market Alloy rims.
                                    </li>
                                    <li>
                                        As good as a brand new car.
                                    </li>
                                    <li>
                                        Lady Driven Car in Immaculate Condition.
                                    </li>
                                    <li>
                                        No Work Required in Car.
                                    </li>
                                    <li>
                                        Excellent Mileage , Local Average = 14 km , Long Average = 16 km .
                                    </li>
                                </ul>
                            </div>
                            <!-- Related Image  -->
                            <div class="ad-related-img">
                                <img src="{!! url('portal_/images/car-img1.png') !!}" alt="" class="img-responsive center-block">
                            </div>
                            <!-- Ad Specifications -->
                            <div class="specification">
                                <!-- Heading Area -->
                                <div class="heading-panel">
                                    <h3 class="main-title text-left">
                                        Specifications
                                    </h3>
                                </div>

                                <div class="ad-row row">
                                    <div class="col-md-6 col-xs-12 col-sm-12">

                                        <img alt="" src="{!! url('portal_/images/300x250.gif') !!}">
                                    </div>
                                    <div class="col-md-6 col-xs-12 col-sm-12">

                                        <img alt="" src="{!! url('portal_/images/300x250.gif') !!}">
                                    </div>
                                </div>

                                <p>
                                    samsung galaxy note 2 new condition with handsfree and charger urgent sale. with book pouch original 4g lte. 16 gb condition 10/10 andriod kitkat4.4.2
                                </p>
                                <p>
                                    Bank Leased 5 Year plan 2013 Honda Civic 1.8 Vti Oriel Prosmatec Automatic ( New Shape ) Attractive Silver Color 1 year installments paid Lahore Reg number Well Maintained Insurance + tracker etc included Options: Sunroof
                                </p>
                                <p>
                                    Chilled AC Power Windows Power Steering ABS braking system ETC 15000 km carefully driven No SMS / Email , Serious Buyers Requested To Call .
                                </p>
                                <p>
                                    Chilled AC Power Windows Power Steering ABS braking system ETC 15000 km carefully driven No SMS / Email , Serious Buyers Requested To Call .
                                </p>
                                <p>
                                    Bank Leased 5 Year plan 2013 Honda Civic 1.8 Vti Oriel Prosmatec Automatic ( New Shape ) Attractive Silver Color 1 year installments paid Lahore Reg number Well Maintained Insurance + tracker etc included Options: Sunroof
                                </p>
                            </div>
                            <div class="clearfix">
    </div>
                        </div>
                        <div class="clearfix">
    </div>

                        <img alt="" class="center-block margin-top-30 margin-bottom-30" src="{!! url('portal_/images/advertise-728x90.jpg') !!}">

                    </div>
                    <!-- Single Ad End -->
                    --}}
                    {{--
                <!-- Price Alert -->
                    <div class="alert-box-container  margin-top-30">
                        <div class="well">
                            <h3>{!! trans('portal.cretealert') !!}</h3>


                            <p>{!! trans('portal.cratealertsub') !!}</p>
                            <form>
                                <div class="row">
                                    <div class="col-md-5 col-xs-12 col-sm-12">
                                        <input placeholder="Enter Your Email " type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-12">
                                        <select class="alerts">

                                            <option value="1">{!! trans('portal.daily') !!}</option>
                                            <option value="7">{!! trans('portal.weekly') !!}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-xs-12 col-sm-12">
                                        <input class="btn btn-theme btn-block" value="Submit" type="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Price Alert End -->
                    --}}
                    {{--
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <div class="grid-panel margin-top-30">
        <div class="heading-panel">
            <div class="col-xs-12 col-md-12 col-sm-12">
                <h3 class="main-title text-left">
                    Related Ads
                </h3>
            </div>
        </div>
        <!-- Ads Archive -->
        <div class="posts-masonry">
            <div class="col-md-12 col-xs-12 col-sm-12">
                <!-- Ads Listing -->
                <div class="ads-list-archive">
                    <!-- Image Block -->
                    <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                        <!-- Img Block -->
                        <div class="ad-archive-img">
                            <a href="#">
                                <div class="ribbon popular">
</div>
                                <img class="img-responsive" src="{!! url('portal_/images/posting/10.jpg') !!}" alt="">
                            </a>
                        </div>
                        <!-- Img Block -->
                    </div>
                    <!-- Ads Listing -->
                    <div class="clearfix visible-xs-block">
</div>
                    <!-- Content Block -->
                    <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                        <!-- Ad Desc -->
                        <div class="ad-archive-desc">
                            <!-- Price -->
                            <div class="horse-special-price">$38,000</div>
                            <!-- Title -->
                            <h3>2013 BMW M3 GTR </h3>
                            <!-- Category -->
                            <div class="category-title">
<span>
<a href="#">Car & Bikes</a>
</span>
</div>
                            <!-- Short Description -->
                            <div class="clearfix visible-xs-block">
</div>
                            <p class="hidden-sm">Lorem ipsum dolor sit amet, quem convenire interesset
                                ut vix, maiestatis inciderint no, eos in elit dicat.....</p>
                            <!-- Ad Features -->
                            <ul class="add_info">
                                <!-- Contact Details -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i class="fa fa-phone">
</i>
</span>
                                        <div class="tooltip-content">
                                            <h4>Call Timings</h4>
                                            <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                            <br>
<strong>Saturday</strong> 09.00 AM - 5.30 PM
                                            <br>
<strong>Sunday</strong>
<span
                                                    class="label label-success">+92-123-4567</span>
                                        </div>
                                    </div>
                                </li>
                                <!-- Address -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i
                                                    class="fa fa-map-marker">
</i>
</span>
                                        <div class="tooltip-content">
                                            <h4>Address</h4>
                                            Musee du Louvre, 75058 Paris - France
                                        </div>
                                    </div>
                                </li>
                                <!-- Ad Type -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i class="fa fa-cog">
</i>
</span>
                                        <div class="tooltip-content">
<strong>Condition</strong>
<span
                                                    class="label label-danger">Used</span>
</div>
                                    </div>
                                </li>
                                <!-- Ad Type -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i class="fa fa-check-square-o">
</i>
</span>
                                        <div class="tooltip-content">
<strong>Warrinty</strong>
<span
                                                    class="label label-danger">No </span>
</div>
                                    </div>
                                </li>
                            </ul>
                            <!-- Ad History -->
                            <div class="clearfix archive-history">
                                <div class="last-updated">Last Updated: 1 day ago</div>
                                <div class="ad-meta">
<a class="btn save-ad">
<i
                                                class="fa fa-heart-o">
</i> Save Ad.</a>
<a
                                            class="btn btn-success">
<i class="fa fa-phone">
</i> View
                                        Details.</a>
</div>
                            </div>
                        </div>
                        <!-- Ad Desc End -->
                    </div>
                    <!-- Content Block End -->
                </div>
                <!-- Ads Listing -->
                <div class="ads-list-archive">
                    <!-- Image Block -->
                    <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                        <!-- Img Block -->
                        <div class="ad-archive-img">
                            <a href="#">
                                <div class="ribbon popular">
</div>
                                <img class="img-responsive" src="{!! url('portal_/images/posting/9.jpg') !!}" alt="">
                            </a>
                        </div>
                        <!-- Img Block -->
                    </div>
                    <!-- Ads Listing -->
                    <div class="clearfix visible-xs-block">
</div>
                    <!-- Content Block -->
                    <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                        <!-- Ad Desc -->
                        <div class="ad-archive-desc">
                            <!-- Price -->
                            <div class="horse-special-price">$500</div>
                            <!-- Title -->
                            <h3>Honda Civic 2017 Sports Edition</h3>
                            <!-- Category -->
                            <div class="category-title">
<span>
<a href="#">Car & Bikes</a>
</span>
</div>
                            <!-- Short Description -->
                            <div class="clearfix visible-xs-block">
</div>
                            <p class="hidden-sm">Lorem ipsum dolor sit amet, quem convenire interesset
                                ut vix, maiestatis inciderint no, eos in elit dicat.....</p>
                            <!-- Ad Features -->
                            <ul class="add_info">
                                <!-- Contact Details -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i class="fa fa-phone">
</i>
</span>
                                        <div class="tooltip-content">
                                            <h4>Call Timings</h4>
                                            <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                            <br>
<strong>Saturday</strong> 09.00 AM - 5.30 PM
                                            <br>
<strong>Sunday</strong>
<span
                                                    class="label label-success">+92-123-4567</span>
                                        </div>
                                    </div>
                                </li>
                                <!-- Address -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i
                                                    class="fa fa-map-marker">
</i>
</span>
                                        <div class="tooltip-content">
                                            <h4>Address</h4>
                                            Musee du Louvre, 75058 Paris - France
                                        </div>
                                    </div>
                                </li>
                                <!-- Ad Type -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i class="fa fa-cog">
</i>
</span>
                                        <div class="tooltip-content">
<strong>Condition</strong>
<span
                                                    class="label label-danger">Used</span>
</div>
                                    </div>
                                </li>
                                <!-- Ad Type -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i class="fa fa-check-square-o">
</i>
</span>
                                        <div class="tooltip-content">
<strong>Warrinty</strong>
<span
                                                    class="label label-danger">No </span>
</div>
                                    </div>
                                </li>
                            </ul>
                            <!-- Ad History -->
                            <div class="clearfix archive-history">
                                <div class="last-updated">Last Updated: 1 day ago</div>
                                <div class="ad-meta">
<a class="btn save-ad">
<i
                                                class="fa fa-heart-o">
</i> Save Ad.</a>
<a
                                            class="btn btn-success">
<i class="fa fa-phone">
</i> View
                                        Details.</a>
</div>
                            </div>
                        </div>
                        <!-- Ad Desc End -->
                    </div>
                    <!-- Content Block End -->
                </div>
                <!-- Ads Listing -->
                <div class="ads-list-archive">
                    <!-- Image Block -->
                    <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                        <!-- Img Block -->
                        <div class="ad-archive-img">
                            <a href="#">
                                <div class="ribbon popular">
</div>
                                <img class="img-responsive" src="{!! url('portal_/images/posting/2.jpg') !!}" alt="">
                            </a>
                        </div>
                        <!-- Img Block -->
                    </div>
                    <!-- Ads Listing -->
                    <div class="clearfix visible-xs-block">
</div>
                    <!-- Content Block -->
                    <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                        <!-- Ad Desc -->
                        <div class="ad-archive-desc">
                            <!-- Price -->
                            <div class="horse-special-price">$449</div>
                            <!-- Title -->
                            <h3>Sony Cyber-shot 20.2-Megapixel</h3>
                            <!-- Category -->
                            <div class="category-title">
<span>
<a href="#">Art & Toys </a>
</span>
</div>
                            <!-- Short Description -->
                            <div class="clearfix visible-xs-block">
</div>
                            <p class="hidden-sm">Lorem ipsum dolor sit amet, quem convenire interesset
                                ut vix, maiestatis inciderint no, eos in elit dicat.....</p>
                            <!-- Ad Features -->
                            <ul class="add_info">
                                <!-- Contact Details -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i class="fa fa-phone">
</i>
</span>
                                        <div class="tooltip-content">
                                            <h4>Call Timings</h4>
                                            <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                            <br>
<strong>Saturday</strong> 09.00 AM - 5.30 PM
                                            <br>
<strong>Sunday</strong>
<span
                                                    class="label label-success">+92-123-4567</span>
                                        </div>
                                    </div>
                                </li>
                                <!-- Address -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i
                                                    class="fa fa-map-marker">
</i>
</span>
                                        <div class="tooltip-content">
                                            <h4>Address</h4>
                                            Musee du Louvre, 75058 Paris - France
                                        </div>
                                    </div>
                                </li>
                                <!-- Ad Type -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i class="fa fa-cog">
</i>
</span>
                                        <div class="tooltip-content">
<strong>Condition</strong>
<span
                                                    class="label label-danger">Used</span>
</div>
                                    </div>
                                </li>
                                <!-- Ad Type -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i class="fa fa-check-square-o">
</i>
</span>
                                        <div class="tooltip-content">
<strong>Warrinty</strong>
<span
                                                    class="label label-danger">No </span>
</div>
                                    </div>
                                </li>
                            </ul>
                            <!-- Ad History -->
                            <div class="clearfix archive-history">
                                <div class="last-updated">Last Updated: 1 day ago</div>
                                <div class="ad-meta">
<a class="btn save-ad">
<i
                                                class="fa fa-heart-o">
</i> Save Ad.</a>
<a
                                            class="btn btn-success">
<i class="fa fa-phone">
</i> View
                                        Details.</a>
</div>
                            </div>
                        </div>
                        <!-- Ad Desc End -->
                    </div>
                    <!-- Content Block End -->
                </div>
                <!-- Ads Listing -->
                <div class="ads-list-archive">
                    <!-- Image Block -->
                    <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                        <!-- Img Block -->
                        <div class="ad-archive-img">
                            <a href="#">
<img class="img-responsive" src="{!! url('portal_/images/posting/1.jpg') !!}" alt="">
                            </a>
                        </div>
                        <!-- Img Block -->
                    </div>
                    <!-- Ads Listing -->
                    <div class="clearfix visible-xs-block">
</div>
                    <!-- Content Block -->
                    <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                        <!-- Ad Desc -->
                        <div class="ad-archive-desc">
                            <!-- Price -->
                            <div class="horse-special-price">$350</div>
                            <!-- Title -->
                            <h3>Sony Xperia Z5 Waterproof</h3>
                            <!-- Category -->
                            <div class="category-title">
<span>
<a href="#">Mobiles</a>
</span>
</div>
                            <!-- Short Description -->
                            <div class="clearfix visible-xs-block">
</div>
                            <p class="hidden-sm">Lorem ipsum dolor sit amet, quem convenire interesset
                                ut vix, maiestatis inciderint no, eos in elit dicat.....</p>
                            <!-- Ad Features -->
                            <ul class="add_info">
                                <!-- Contact Details -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i class="fa fa-phone">
</i>
</span>
                                        <div class="tooltip-content">
                                            <h4>Call Timings</h4>
                                            <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                            <br>
<strong>Saturday</strong> 09.00 AM - 5.30 PM
                                            <br>
<strong>Sunday</strong>
<span
                                                    class="label label-success">+92-123-4567</span>
                                        </div>
                                    </div>
                                </li>
                                <!-- Address -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i
                                                    class="fa fa-map-marker">
</i>
</span>
                                        <div class="tooltip-content">
                                            <h4>Address</h4>
                                            Musee du Louvre, 75058 Paris - France
                                        </div>
                                    </div>
                                </li>
                                <!-- Ad Type -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i class="fa fa-cog">
</i>
</span>
                                        <div class="tooltip-content">
<strong>Condition</strong>
<span
                                                    class="label label-danger">Used</span>
</div>
                                    </div>
                                </li>
                                <!-- Ad Type -->
                                <li>
                                    <div class="custom-tooltip tooltip-effect-4">
                                        <span class="tooltip-item">
<i class="fa fa-check-square-o">
</i>
</span>
                                        <div class="tooltip-content">
<strong>Warrinty</strong>
<span
                                                    class="label label-danger">No </span>
</div>
                                    </div>
                                </li>
                            </ul>
                            <!-- Ad History -->
                            <div class="clearfix archive-history">
                                <div class="last-updated">Last Updated: 1 day ago</div>
                                <div class="ad-meta">
<a class="btn save-ad">
<i
                                                class="fa fa-heart-o">
</i> Save Ad.</a>
<a
                                            class="btn btn-success">
<i class="fa fa-phone">
</i> View
                                        Details.</a>
</div>
                            </div>
                        </div>
                        <!-- Ad Desc End -->
                    </div>
                    <!-- Content Block End -->
                </div>
                <img alt="" class="center-block margin-top-30 margin-bottom-30"
                     src="{!! url('portal_/images/advertise-728x90.jpg') !!}">
            </div>
        </div>


    </div>

    <!-- =-=-=-=-=-=-= Latest Ads End =-=-=-=-=-=-= -->
                    --}}
                </div>
                <div class="col-md-4 col-xs-12 col-sm-12">
                    <!-- Sidebar Widgets -->
                    <div class="sidebar">
                        <!-- Contact info -->
                        <div class="contact white-bg">
                            <!-- Email Button trigger modal -->
                            <button class="btn-block btn-contact contactEmail" data-toggle="modal"
                                    data-target=".price-quote">
                                {!! trans('portal.emailcontact') !!}
                            </button>
                        @if(!empty($horse->getStudPhone()))
                            <?php $ph = $horse->getStudPhone(); ?>
                            @if(isset($ph[0]))
                                <?php $ph = Phone::find($ph[0]['id']); ?>
                                <!-- Email Modal -->
                                    <button
                                            {{--onclick="Llamar({!! $ph->getFormatNumberOnly() !!},this)"--}}
                                            class="btn-block btn-contact contactPhone number" data-last="111111X">
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
                        <!-- Price info block -->
                        <div class="ad-listing-price mone"
                        @if( $horse->sold == 0)
                            @include('backend.common.toolmoneda',['horse'=>$horse,'p'=>1])
                                @endif
                        >
                            <p>
                            @if( $horse->sold == 1)
                                {!! trans('users.sold') !!}
                            @else
                                @if(empty($precio))
                                    {!! trans('users.pricecheck') !!}
                                    {{--Contacto--}}
                                    <!-- CONSULTAR PRECIO AQUI -->
                                    @else
                                        <span data-getprice="{!! $horse->slug !!}">

                                                </span>
                                        {{--
                                            {!! $precio !!}
                                            <i class="fa fa-eur"> </i>
                                        --}}
                                        {{--
                                            @include('backend.common.movilmoneda',['precio'=> $precio])
                                        --}}
                                    @endif
                                @endif

                            </p>
                        </div>
                        <!-- User Info -->
                        <div class="white-bg user-contact-info">
                            <div class="user-info-card">
                                <div class="user-photo col-md-4 col-sm-3  col-xs-4">
                                    @if(!is_string($stud))
                                        <img src="{!! $stud->getLogo() !!}" alt="{!! $stud->name !!}">
                                    @else
                                        {{--<?php \Log::critical('EPA PROBLEMAS CON '.$horse->id); ?>--}}
                                    @endif
                                </div>
                                <div class="user-information no-padding col-md-8 col-sm-9 col-xs-8">
                                    <span class="user-name">
                                        <span class="hover-color"
                                        >{!! $horse->getStudName() !!}</span>
                                    </span>

                                    <div class="item-date">
                                        @if(!is_string($stud))
                                            @if(!empty($stud->getAddress()))
                                                <span class="ad-pub">
                                                 {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}
                                                    , {!! $stud->getStateModel()->name!!}
                                                    , {!! $stud->getCountryModel()->getName() !!}
                                                    {{--{!! trans('portal.pubdate',['date'=>Funciones::AjustarFechaDmy($horse->created_at)]) !!}--}}
                                            </span>

                                                <br>
                                            @endif


                                        @else
                                            {{--<?php \Log::critical('EPA PROBLEMAS CON ADDREESSS '.$horse->id); ?>--}}
                                        @endif
                                    </div>

                                    {{--
                                    <div class="item-date">

                                        <span class="ad-pub">{!! trans('portal.pubdate',['date'=>Funciones::AjustarFechaDmy($horse->created_at)]) !!}</span>
                                        <br>

                                    </div>
                                    --}}
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                            @if(!empty($horse))
                                @if(!empty($horse->getUser()))
                                    <?php $publicaciones = $horse->getUser()->CaballosPublicadosPorRaza(); ?>
                                @endif
                            @endif
                            @if(!empty($publicaciones))

                                <div class="ad-listing-meta">
                                    {{--
                                    <ul>
                                        @foreach($razas as $k=>$v)
                                            @if($k !=0)
                                                <?php $total = $horse->getUser()->CaballosPublicadosPorRaza($k); ?>
                                                @if(count($total)!=0)
                                                    <li>{!! $v !!}: <span
                                                                class="color">{!! count($horse->getUser()->CaballosPublicadosPorRaza($k)) !!}</span>
                                                    </li>

                                                @endif
                                            @endif
                                        @endforeach


                                    </ul>
                                    --}}
                                </div>
                            @endif
                            <div id="itemMap" style="width: 100%; height: 370px; margin-bottom:5px;">
                                <a
                                        href="{!! route('listaportal') !!}"

                                        class="btn-block btn-contact  volver" style=" ">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    {!! trans('stud.horsedetail.goback') !!}
                                </a>
                                <div class="col-xs-12 m-t-10  text-center">
                                    @include('fb-widget')
                                </div>


                                <ins class="adsbygoogle"
                                     style="display:block;padding-top: 10px"
                                     data-ad-client="ca-pub-5526230813846865"
                                     data-ad-format="rectangle"
                                     {{--data-ad-slot="9942917403"--}}
                                     data-ad-slot="2466207474"
                                ></ins>
                                <div class="clearfix"></div>
                            </div>
                        </div>


                        {{--
                        <!-- Featured Ads -->
                        <div class="widget">
                            <div class="widget-heading">
                                <h4 class="panel-title">
<a>Featured Ads</a>
</h4>
                            </div>
                            <div class="widget-content">
                                <div class="featured-slider-3">
                                    <!-- Featured Ads -->
                                    <div class="item">
                                        <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                            <!-- Ad Box -->
                                            <div class="category-grid-box">
                                                <!-- Ad Img -->
                                                <div class="category-grid-img">
                                                    <img class="img-responsive" alt="" src="images/posting/car-3.jpg">
                                                    <!-- Ad Status -->
                                                    <!-- User Review -->
                                                    <div class="user-preview">
                                                        <a href="#">
<img src="images/users/2.jpg" class="avatar avatar-small" alt="">
</a>
                                                    </div>
                                                    <!-- View Details -->
<a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                    <!-- Ad Category -->
                                                    <div class="category-title">
<span>
<a href="#">Cars</a>
</span>
</div>
                                                    <!-- Ad Title -->
                                                    <h3>
<a title="" href="single-page-listing.html">2017 Honda Civic EX</a>
</h3>
                                                    <!-- Price -->
                                                    <div class="price">$18,200 <span class="negotiable">(Negotiable)</span>
</div>
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                    <ul>
                                                        <li>
<i class="fa fa-map-marker">
</i>London</li>
                                                        <li>
<i class="fa fa-clock-o">
</i> 15 minutes ago </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Ad Box End -->
                                        </div>
                                    </div>
                                    <!-- Featured Ads -->
                                    <div class="item">
                                        <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                            <!-- Ad Box -->
                                            <div class="category-grid-box">
                                                <!-- Ad Img -->
                                                <div class="category-grid-img">
                                                    <img class="img-responsive" alt="" src="images/posting/fur-3.jpg">
                                                    <!-- Ad Status -->
                                                    <!-- User Review -->
                                                    <div class="user-preview">
                                                        <a href="#">
<img src="images/users/2.jpg" class="avatar avatar-small" alt="">
</a>
                                                    </div>
                                                    <!-- View Details -->
<a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                    <!-- Ad Category -->
                                                    <div class="category-title">
<span>
<a href="#">Cameras & Accessories</a>
</span>
</div>
                                                    <!-- Ad Title -->
                                                    <h3>
<a title="" href="single-page-listing.html">Office Furniture For Sale </a>
</h3>
                                                    <!-- Price -->
                                                    <div class="price">$250 <span class="negotiable">(Negotiable)</span>
</div>
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                    <ul>
                                                        <li>
<i class="fa fa-map-marker">
</i>London</li>
                                                        <li>
<i class="fa fa-clock-o">
</i> 15 minutes ago </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Ad Box End -->
                                        </div>
                                    </div>
                                    <!-- Featured Ads -->
                                    <div class="item">
                                        <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                            <!-- Ad Box -->
                                            <div class="category-grid-box">
                                                <!-- Ad Img -->
                                                <div class="category-grid-img">
                                                    <img class="img-responsive" alt="" src="images/posting/mob-6.jpg">
                                                    <!-- Ad Status -->
                                                    <!-- User Review -->
                                                    <div class="user-preview">
                                                        <a href="#">
<img src="images/users/2.jpg" class="avatar avatar-small" alt="">
</a>
                                                    </div>
                                                    <!-- View Details -->
<a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                    <!-- Ad Category -->
                                                    <div class="category-title">
<span>
<a href="#">Cameras & Accessories</a>
</span>
</div>
                                                    <!-- Ad Title -->
                                                    <h3>
<a title="" href="single-page-listing.html">Sony Xperia Z5 </a>
</h3>
                                                    <!-- Price -->
                                                    <div class="price">$250 <span class="negotiable">(Negotiable)</span>
</div>
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                    <ul>
                                                        <li>
<i class="fa fa-map-marker">
</i>London</li>
                                                        <li>
<i class="fa fa-clock-o">
</i> 15 minutes ago </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Ad Box End -->
                                        </div>
                                    </div>
                                    <!-- Featured Ads -->
                                    <div class="item">
                                        <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                            <!-- Ad Box -->
                                            <div class="category-grid-box">
                                                <!-- Ad Img -->
                                                <div class="category-grid-img">
                                                    <img class="img-responsive" alt="" src="images/posting/cam-2.jpg">
                                                    <!-- Ad Status -->
                                                    <!-- User Review -->
                                                    <div class="user-preview">
                                                        <a href="#">
<img src="images/users/2.jpg" class="avatar avatar-small" alt="">
</a>
                                                    </div>
                                                    <!-- View Details -->
<a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                    <!-- Ad Category -->
                                                    <div class="category-title">
<span>
<a href="#">Cameras & Accessories</a>
</span>
</div>
                                                    <!-- Ad Title -->
                                                    <h3>
<a title="" href="single-page-listing.html">Sony Xperia Z5 </a>
</h3>
                                                    <!-- Price -->
                                                    <div class="price">$250 <span class="negotiable">(Negotiable)</span>
</div>
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                    <ul>
                                                        <li>
<i class="fa fa-map-marker">
</i>London</li>
                                                        <li>
<i class="fa fa-clock-o">
</i> 15 minutes ago </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Ad Box End -->
                                        </div>
                                    </div>
                                    <!-- Featured Ads -->
                                    <div class="item">
                                        <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                            <!-- Ad Box -->
                                            <div class="category-grid-box">
                                                <!-- Ad Img -->
                                                <div class="category-grid-img">
                                                    <img class="img-responsive" alt="" src="images/posting/cam-2.jpg">
                                                    <!-- Ad Status -->
                                                    <!-- User Review -->
                                                    <div class="user-preview">
                                                        <a href="#">
<img src="images/users/2.jpg" class="avatar avatar-small" alt="">
</a>
                                                    </div>
                                                    <!-- View Details -->
<a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                    <!-- Ad Category -->
                                                    <div class="category-title">
<span>
<a href="#">Cameras & Accessories</a>
</span>
</div>
                                                    <!-- Ad Title -->
                                                    <h3>
<a title="" href="single-page-listing.html">Sony Xperia Z5 </a>
</h3>
                                                    <!-- Price -->
                                                    <div class="price">$250 <span class="negotiable">(Negotiable)</span>
</div>
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                    <ul>
                                                        <li>
<i class="fa fa-map-marker">
</i>London</li>
                                                        <li>
<i class="fa fa-clock-o">
</i> 15 minutes ago </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Ad Box End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Recent Ads -->
                        <div class="widget">
                            <div class="widget-heading">
                                <h4 class="panel-title">
<a>Recent Ads</a>
</h4>
                            </div>
                            <div class="widget-content recent-ads">
                                <!-- Ads -->
                                <div class="recent-ads-list">
                                    <div class="recent-ads-container">
                                        <div class="recent-ads-list-image">
                                            <a href="#" class="recent-ads-list-image-inner">
                                                <img src="images/posting/thumb-1.jpg" alt="">
                                            </a>
<!-- /.recent-ads-list-image-inner -->
                                        </div>
                                        <!-- /.recent-ads-list-image -->
                                        <div class="recent-ads-list-content">
                                            <h3 class="recent-ads-list-title">
                                                <a href="#">Sony Xperia Z1</a>
                                            </h3>
                                            <ul class="recent-ads-list-location">
                                                <li>
<a href="#">New York</a>,</li>
                                                <li>
<a href="#">Brooklyn</a>
</li>
                                            </ul>
                                            <div class="recent-ads-list-price">
                                                $ 17,000
                                            </div>
                                            <!-- /.recent-ads-list-price -->
                                        </div>
                                        <!-- /.recent-ads-list-content -->
                                    </div>
                                    <!-- /.recent-ads-container -->
                                </div>
                                <!-- Ads -->
                                <div class="recent-ads-list">
                                    <div class="recent-ads-container">
                                        <div class="recent-ads-list-image">
                                            <a href="#" class="recent-ads-list-image-inner">
                                                <img src="images/posting/thumb-2.jpg" alt="">
                                            </a>
<!-- /.recent-ads-list-image-inner -->
                                        </div>
                                        <!-- /.recent-ads-list-image -->
                                        <div class="recent-ads-list-content">
                                            <h3 class="recent-ads-list-title">
                                                <a href="#">2017 BMW i8</a>
                                            </h3>
                                            <ul class="recent-ads-list-location">
                                                <li>
<a href="#">New York</a>,</li>
                                                <li>
<a href="#">Brooklyn</a>
</li>
                                            </ul>
                                            <div class="recent-ads-list-price">
                                                $ 66,000
                                            </div>
                                            <!-- /.recent-ads-list-price -->
                                        </div>
                                        <!-- /.recent-ads-list-content -->
                                    </div>
                                    <!-- /.recent-ads-container -->
                                </div>
                                <!-- Ads -->
                                <div class="recent-ads-list">
                                    <div class="recent-ads-container">
                                        <div class="recent-ads-list-image">
                                            <a href="#" class="recent-ads-list-image-inner">
                                                <img src="images/posting/thumb-3.jpg" alt="">
                                            </a>
<!-- /.recent-ads-list-image-inner -->
                                        </div>
                                        <!-- /.recent-ads-list-image -->
                                        <div class="recent-ads-list-content">
                                            <h3 class="recent-ads-list-title">
                                                <a href="#">Dell Latitude e7440</a>
                                            </h3>
                                            <ul class="recent-ads-list-location">
                                                <li>
<a href="#">New York</a>,</li>
                                                <li>
<a href="#">Brooklyn</a>
</li>
                                            </ul>
                                            <div class="recent-ads-list-price">
                                                $ 37,000
                                            </div>
                                            <!-- /.recent-ads-list-price -->
                                        </div>
                                        <!-- /.recent-ads-list-content -->
                                    </div>
                                    <!-- /.recent-ads-container -->
                                </div>
                                <!-- Ads -->
                                <div class="recent-ads-list">
                                    <div class="recent-ads-container">
                                        <div class="recent-ads-list-image">
                                            <a href="#" class="recent-ads-list-image-inner">
                                                <img src="images/posting/thumb-4.jpg" alt="">
                                            </a>
<!-- /.recent-ads-list-image-inner -->
                                        </div>
                                        <!-- /.recent-ads-list-image -->
                                        <div class="recent-ads-list-content">
                                            <h3 class="recent-ads-list-title">
                                                <a href="#">Sport Stylish Steering</a>
                                            </h3>
                                            <ul class="recent-ads-list-location">
                                                <li>
<a href="#">New York</a>,</li>
                                                <li>
<a href="#">Brooklyn</a>
</li>
                                            </ul>
                                            <div class="recent-ads-list-price">
                                                $ 11,000
                                            </div>
                                            <!-- /.recent-ads-list-price -->
                                        </div>
                                        <!-- /.recent-ads-list-content -->
                                    </div>
                                    <!-- /.recent-ads-container -->
                                </div>
                                <!-- Ads -->
                                <div class="recent-ads-list">
                                    <div class="recent-ads-container">
                                        <div class="recent-ads-list-image">
                                            <a href="#" class="recent-ads-list-image-inner">
                                                <img src="images/posting/thumb-5.jpg" alt="">
                                            </a>
<!-- /.recent-ads-list-image-inner -->
                                        </div>
                                        <!-- /.recent-ads-list-image -->
                                        <div class="recent-ads-list-content">
                                            <h3 class="recent-ads-list-title">
                                                <a href="#">Apple Wrist Watches</a>
                                            </h3>
                                            <ul class="recent-ads-list-location">
                                                <li>
<a href="#">New York</a>,</li>
                                                <li>
<a href="#">Brooklyn</a>
</li>
                                            </ul>
                                            <div class="recent-ads-list-price">
                                                $ 20,000
                                            </div>
                                            <!-- /.recent-ads-list-price -->
                                        </div>
                                        <!-- /.recent-ads-list-content -->
                                    </div>
                                    <!-- /.recent-ads-container -->
                                </div>
                            </div>
                        </div>
                        <!-- Saftey Tips  -->
                        <div class="widget">
                            <div class="widget-heading">
                                <h4 class="panel-title">
<a>Safety tips for deal</a>
</h4>
                            </div>
                            <div class="widget-content saftey">
                                <ol>
                                    <li>Use a safe location to meet seller</li>
                                    <li>Avoid cash transactions</li>
                                    <li>Beware of unrealistic offers</li>
                                </ol>
                            </div>
                        </div>
                        --}}
                    </div>
                    <!-- Sidebar Widgets End -->
                    <!-- Middle Content Area  End -->
                    {{--
                                    <!-- =-=-=-=-=-=-= Advertizing Sidebar =-=-=-=-=-=-= -->
                                    <div class="col-md-2 col-sm-2 hidden-xs hidden-sm rightbar-stick">
                                        <div class="theiaStickySidebar">
<img alt="" src="{!! url('portal_/images/160x600.png') !!}">
</div>
                                    </div>
                                    --}}
                </div>
                <!-- Row End -->

            </div>
            <!-- Main Container End -->


    </section>
    <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
    <!-- Slideshow container -->

@include('portal.sidebar.down')
{{--@include('portal.sidebar.down4')--}}
<!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
</div>
<!-- Main Content Area End -->{{--
<!-- Post Ad Sticky -->
<a href="#" class="sticky-post-button hidden-xs">
         <span class="sell-icons">
         <i class="flaticon-transport-9">
</i>
         </span>
    <h4>SELL</h4>
</a>--}}

<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>

@include('portal.Modal.contacto',['horse'=>$horse])
@include('portal.Modal.compart',['horse'=>$horse])
@include('portal.Modal.report',['horse'=>$horse])
@include('portal.Modal.detalle',['horse'=>$horse])
@include('portal.Modal.email',['horse'=>$horse])
{{--@include('portal.Modal.zoom',['horse'=>$horse])--}}




@include('portal.sidebar.foot')

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a28c20e7932ab9f"></script>
<!-- For This Page Only -->
<script type="text/javascript" src="{!! url('frontend/js/nivo-lightbox.min.js')!!}"></script>
<script>


    var nivoActivator = $('.nivo-activator');

    function emailo() {
        $('.at-svc-email').click();
    }

    (function ($) {
        "use strict";

        /* ======= Show Number ======= */
        $('.number').click(function () {
            $(this).find('span').text($(this).data('last'));
        });

        /* ======= Ad Detail On Scroll ======= */

        var header = $(".sticky-ad-detail");
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 500) {
                header.addClass("show-sticky-ad-detail");
            } else {
                header.removeClass("show-sticky-ad-detail");
            }
        });
    })(jQuery);
    $('.slider-btn, .nivo-trigger').nivoLightbox({
        theme: 'default',
        afterShowLightbox: function () {
            $('.nivo-lightbox-prev')
                .html('<i class="fa fa-chevron-left"></i>')
                .css('left', '5%').css('font-size', '30px')
                .css('color', 'white');
            $('.nivo-lightbox-next')
                .html('<i class="fa fa-chevron-right"></i>')
                .css('right', '5%')
                .css('font-size', '30px')
                .css('color', 'white');
            $('.nivo-lightbox-close')
                .html('<i class="fa fa-times"></i>')
                .css('color', 'white');
        }
    });
    $(window).on('load', function () {
        $("select").select2({
            placeholder: "{!! trans('users.chooseone') !!}",
            allowClear: true,
            width: '100%'
        });

        {{--niv();--}}

    });
    $('div.alert').not('.alert-important').delay(60000).fadeOut(60000);

    function Mostrar(url) {
        console.log(url);
    }

    (adsbygoogle = window.adsbygoogle || []).push({});

    function Llamar(tel, el) {
        var s = "<a href='tel:" + tel + "' class='teleff'></a>";
        console.dir(s);
        $(el).after(s);
        $('.teleff').click();
        $('.teleff').remove()
    }

    $('.mone').on('click', function () {
        $(this).tooltip('enable').tooltip('open');
    });


</script>
</body>
</html>

