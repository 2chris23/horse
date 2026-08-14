@php($logo =url("landing/images/basic/logo.png"))
@php($logo =url("portal_/images/logoportal.png"))
@php

    $f[0]=url('landing/images/slider/1/2.jpg');
$f[1]=url('landing/images/slider/1/6.jpg');
$f[2]=url('landing/images/slider/1/9.jpg');
$f[3]=url('landing/images/slider/1/8.jpg');
$f[0]=url('landing/images/slider/1/2.jpg');


//$f[0]=url('landing/images/slider/1/1.jpg');//borrar
//$f[2]=url('landing/images/slider/1/3.JPG');//borrar
//$f[3]=url('landing/images/slider/1/4.jpg');//borrar
// $f[1]=url('landing/images/slider/1/5.png');
//$f[2]=url('landing/images/slider/1/6.jpg');
//$f[3]=url('landing/images/slider/1/7.jpg');

//$f[3]=url('landing/images/slider/1/9.jpg');
//$f[4]=url('landing/images/slider/1/8.jpg');
//$f[6]=url('landing/images/slider/1/10.jpg');
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
$horses = (isset($horses))?$horses:null;
$lang = \Session::get('lang');
if (empty($lang)) {
$lang = 'es';
\Session::put('lang', $lang);
\Session::put('applocale', $lang);
}
App::setLocale($lang);
@endphp
        <!DOCTYPE html>
<html lang="{!! $lang !!}">

<head>
    @include('portal.sidebar.head')
    @php($l = url(\Config::get('logos.fbhws')))
    @include('meta',
  [
'titulo' =>  \Config::get('app.name'),
'descripcion'=>trans('seo.portaldescription'),

'logo'=>$l,
  ])
    <script>
        window.token = '{!! csrf_token() !!}';
        window.UrlEstado = "{!! route('state.ajax') !!}";
        window.UrlCiudad = "{!! route('city.ajax') !!}";
        window.urlorder = '{!! route('photo.changeorder') !!}';

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
    <style>

        .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
            color: #ffffff !important;
            background-color: rgba(245, 137, 54, 0.5) !important;
        }

        /*Menu*/
        .menu-list-items {
            background: rgb(255, 255, 255) !important;
        }

        .transparent-header .mega-menu > section.menu-list-items .menu-links > li > a {
            color: black !important;
        }

        .horse-special-price {
            margin-top: -67px !important;
        }

        .short-description-1 {
            padding-top: 30px !important;
            padding-bottom: 0px !important;
        }

        .white.category-grid-box-1 .short-description-1 {
            padding-bottom: 0px !important;
            padding-top: 7px !important;
        }

        /*Menu*/
        .linear-overlay {
            /*background: transparent;;*/
            background: rgba(36, 40, 47, 0.5);;
        }
    </style>
</head>


<body>
{{--
<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
<div id="loader-wrapper">
    <div id="loader">
</div>
    <div class="loader-section section-left">
</div>
    <div class="loader-section section-right">
</div>
</div>
--}}
{{--
<!-- =-=-=-=-=-=-= Color Switcher =-=-=-=-=-=-= -->
<div class="color-switcher" id="choose_color">
    <a href="#." class="picker_close">
<i class="fa fa-gear">
</i>
</a>
    <h5>STYLE SWITCHER</h5>
    <div class="theme-colours">
        <p> Choose Colour style </p>
        <ul>
            <li>
                <a href="#." class="defualt" id="defualt">
</a>
            </li>
            <li>
                <a href="#." class="green" id="green">
</a>
            </li>
            <li>
                <a href="#." class="blue" id="blue">
</a>
            </li>
            <li>
                <a href="#." class="red" id="red">
</a>
            </li>

            <li>
                <a href="#." class="sea-green" id="sea-green">
</a>
            </li>

        </ul>
    </div>
    <div class="clearfix">
</div>
</div>
--}}
@include('portal.menu.menu')
<!-- =-=-=-=-=-=-= Background Rotator =-=-=-=-=-=-= -->
<div class="background-rotator">
    <!-- slider start-->
    <div class="owl-carousel owl-theme background-rotator-slider">
        <!-- Slide -->
        @foreach($f as $k=>$v)
            <div class="item linear-overlay">
                <img src="{!!$v !!}" alt="">
            </div>
            {{--
            <div class="item linear-overlay">
<img src="{!! url('portal_/images/slider/4.jpg') !!}" alt="">
</div>
            <!-- Slide -->
            <div class="item linear-overlay">
<img src="{!! url('portal_/images/slider/2.jpg') !!}" alt="">
</div>
            <!-- Slide -->
            <div class="item linear-overlay">
<img src="{!! url('portal_/images/slider/3.jpg') !!}" alt="">
</div>}
                --}}
        @endforeach
    </div>
    <div class="search-section">
        <!-- Find search section -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Heading -->
                    <div class="content">

                        <div class="heading-caption">
                            {{--<h1>Dinos que estas buscando</h1>--}}
                            <p>
                                {!! trans('portal.landing.subtitulo') !!}
                            </p>
                        </div>

                        <div class="search-form">
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="#raza" data-toggle="tab">
                                        {!! trans('portal.tabraza') !!}
                                    </a>
                                </li>
                                <li>
                                    <a href="#pais" data-toggle="tab">
                                        {!! trans('portal.tabcountry') !!}
                                    </a>
                                </li>
                                {{--
                                <li>
                                    <a href="#sex" data-toggle="tab">Sexo</a>
                                </li>
                                --}}

                            </ul>
                            <div class="tab-content clearfix">
                                <div class="tab-pane active" id="raza">
                                    <form id="busqueda" method="post" action="{!! route('buscarpais') !!}">
                                        {!! csrf_field() !!}
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                @include('portal.partials.raza')
                                                {{--
                                                <!-- Category -->
                                                <select class="category form-control" name="seleccion" id="seleccion">
                                                    @php($raza = trans('horse.raza'))
                                                    @foreach($raza as $k => $v)
                                                        @if($k==0)
                                                            <option value="{!! $k !!}" selected>Todas las razas</option>
                                                        @else
                                                            <option value="{!! $k !!}">{!! $v !!}</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                                --}}
                                            </div>
                                            <!-- Input Field -->
                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                <input type="text" class="form-control" name="texto"
                                                       placeholder="{!! trans('portal.RazaBusqueda') !!}"/>
                                            </div>

                                            <!-- Search Button -->
                                            <input type="submit" class="hidden" id="env1">
                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                <a href="#!" onclick="Buscar()" class="btn btn-theme btn-block">
                                                    {!! trans('portal.BottomSearch') !!}
                                                    <i class="fa fa-search" aria-hidden="true">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane " id="pais">
                                    <form id="paiss">
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                <!-- Category -->
                                                @include('portal.partials.country')
                                                {{--
                                                <select class="category form-control" name="seleccionp" id="seleccionp">
                                                    @php($raza = trans('horse.raza'))
                                                    @foreach($raza as $k => $v)
                                                        @if($k==0)
                                                            <option value="{!! $k !!}" selected>Todas las razas</option>
                                                        @else
                                                            <option value="{!! $k !!}">{!! $v !!}</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                                --}}
                                            </div>
                                            <!-- Input Field -->
                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                @include('portal.partials.state')
                                            </div>

                                            <!-- Search Button -->
                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                <a href="#!" onclick="BuscarP()"
                                                   class="btn btn-theme btn-block">{!! trans('portal.BottomSearch') !!}
                                                    <i
                                                            class="fa fa-search" aria-hidden="true">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                {{--
                                <div class="tab-pane " id="sex">
                                    <form id="sexx">
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                <!-- Category -->
                                                @include('portal.partials.country')

                                            </div>
                                            <!-- Input Field -->
                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                @include('portal.partials.state')
                                            </div>

                                            <!-- Search Button -->
                                            <div class="col-md-4 col-xs-12 col-sm-4">
                                                <a href="#!" onclick="BuscarP()" class="btn btn-theme btn-block">{!! trans('portal.BottomSearch') !!}
                                                    <i
                                                            class="fa fa-search" aria-hidden="true">
</i>
</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.Find search section-->
</div>
<!-- =-=-=-=-=-=-= Background Rotator End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">

    <!-- =-=-=-=-=-=-= Categories =-=-=-=-=-=-= -->
    <section class="custom-padding gray">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Heading Area -->

                <div class="heading-panel">
                    <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        {!! trans('portal.landing.caballoagregado') !!}

                        {{--
                        <!-- Short Description -->
                        <p class="heading-text">
                            Estos son los ultimos caballos que han agregado nuestros clientes, ¿Te gustaria ver mas
                            detalles?
                        </p>
                        --}}
                        @if(!empty($error))

                            <p class="heading-text">
                                {!!   $error  !!}
                            </p>
                        @endif
                    </div>
                </div>
                <!-- Middle Content Box -->
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <!-- Row -->
                    <div class="row">
                        @if(!empty($horses))
                            @foreach($horses as $k=>$v)
                                @php
                                    $foto = $v->getPhotoModel()->first();
                                    $url = (!empty($foto))?$foto->getUrl():url('portal_/images/posting/car-4.jpg');
                                    $rd = rand(0,3);
                                    $color = $v->getColorString();
                                    $link =route('portalcaballo',['slug'=>$v->slug]);
                                    $titulo = $v->getName();
                                    $precio = Funciones::AjustarNumeroMil($v->getPrice(),0);
                                    $raza = $v->getRaza();
                                    $alzada = $v->getRaisedFormat();
                                    $edad = $v->getAge();
                                        $mes = $v->getAgeMonth();
                                    //$color = (!empty($color))?$color->name:null;
                                    //$link =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->id]);
                                    //if($venta == 1) $link =route('MySellDetailSell',['stud'=>$stud->slug,'horse'=>$v->id]);
                                    $photo = $v->getPhotoModel();
                                @endphp
                                {{--
                                    @include('portal.partials.carta1',[
                                  'foto' =>$foto,
                                          'url' =>$url,
                                          'rd' =>$rd,
                                          'color' =>$color,
                                          'link' =>$link,
                                          'titulo' =>$titulo,
                                          'precio' =>$precio,
                                          'raza' =>$raza,
                                          'alzada' =>$alzada,
                                          'edad' =>$edad,
                                          'photo' => $photo,
                                    ])
                                --}}

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                                    <div class="white category-grid-box-1 clearfix">
                                        <!-- Image Box -->
                                        <a title="" href="{!! $link !!}">
                                            <div class="image">
                                                <figure class="h-313-234">
                                                    <img alt="{!! $v->getName() !!}" src="{!! $url !!}"
                                                         class="img-responsive m-w-313">
                                                </figure>
                                            </div>
                                        </a>
                                        <!-- Short Description -->
                                        <div class="short-description-1 clearfix">
                                            <!-- Category Title -->
                                            <div class="category-title">
                                                <span>
                                                <a
                                                        href="{!! $link !!}">{!! trans('horse.raza.'.$raza)!!}</a>
                                                </span>
                                            </div>
                                            <!-- Ad Title -->
                                            <h3>
                                                <a title="" href="{!! $link !!}">{!! $titulo !!}</a>
                                            </h3>
                                            <!-- Location -->
                                            <p>
                                                @if($edad!=0)
                                                    {!! trans('horse.years',['ano'=>$edad]) !!}
                                                @else
                                                    {!! trans('horse.mes',['mes'=>$mes]) !!}
                                                @endif
                                                @if(!empty($color))
                                                    , {!! $color !!}
                                                @endif
                                            </p>
                                            <span class="horse-special-price">
                                            @if(empty($precio))
                                                <span class="consulta">
                                                    {!! trans('users.pricecheck') !!}

                                                </span>
                                                {{--Contacto--}}
                                                <!-- CONSULTAR PRECIO AQUI -->
                                            @else

                                                {!! $precio !!}
                                                <i class="fa fa-eur"> </i>

                                            @endif
                                            </span>
                                        </div>
                                        {{--
                                        <!-- Ad Meta Stats -->
                                        <div class="horse-special-info-1">
                                            <ul>

                                                <li>
                                                    <i class="fa fa-eye">
                                                    </i>
                                                    <a href="#">445 Views</a>
                                                </li>


                                                <li>
                                                    <i class="fa fa-clock-o">
                                                    </i>{!! trans('portal.minago',['min'=>15]) !!}
                                                </li>

                                            </ul>
                                        </div>
                                        --}}
                                    </div>
                                </div>
                            @endforeach

                        @endif
                        {{--
                        <!-- Listing Ad Grid -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                            <div class="white category-grid-box-1 clearfix">
                                <!-- Image Box -->
                                <div class="image">
                                    <img alt="Tour Package" src="{!! url('portal_/images/posting/car-4.jpg') !!}" class="img-responsive">
                                </div>
                                <!-- Short Description -->
                                <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title">
<span>
<a href="#">Sports & Equipment</a>
</span>
</div>
                                    <!-- Ad Title -->
                                    <h3>
                                        <a title="" href="single-page-listing.html">Honda Civic 2017 Sports Edition</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location">
<i class="fa fa-map-marker">
</i> Houghton Street London</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star-o">
</i>
                                        <span class="rating-count">(2)</span>

                                    </div>
                                    <!-- Price -->
                                    <span class="horse-special-price">$370</span>
                                </div>
                                <!-- Ad Meta Stats -->
                                <div class="horse-special-info-1">
                                    <ul>
                                        <li>
<i class="fa fa-eye">
</i>
<a href="#">445 Views</a>
</li>
                                        <li>
<i class="fa fa-clock-o">
</i>15 minutes ago </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Listing Ad Grid -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                            <div class="white category-grid-box-1 clearfix">
                                <!-- Image Box -->
                                <div class="image">
                                    <img alt="Tour Package" src="{!! url('portal_/images/posting/list-7.jpg') !!}" class="img-responsive">
                                </div>
                                <!-- Short Description -->
                                <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title">
<span>
<a href="#">Sports & Equipment</a>
</span>
</div>
                                    <!-- Ad Title -->
                                    <h3>
                                        <a title=" href="single-page-listing.html">Rolex Yacht-Master 40</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location">
<i class="fa fa-map-marker">
</i> Houghton Street London</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star-o">
</i>
                                        <span class="rating-count">(2)</span>

                                    </div>
                                    <!-- Price -->
                                    <span class="horse-special-price">$110</span>
                                </div>
                                <!-- Ad Meta Stats -->
                                <div class="horse-special-info-1">
                                    <ul>
                                        <li>
<i class="fa fa-eye">
</i>
<a href="#">445 Views</a>
</li>
                                        <li>
<i class="fa fa-clock-o">
</i>15 minutes ago </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Listing Ad Grid -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                            <div class="white category-grid-box-1 clearfix">
                                <!-- Image Box -->
                                <div class="image">
                                    <div id="carousel-1" class="carousel slide slide-carousel" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-1" data-slide-to="0" class="active">
</li>
                                            <li data-target="#carousel-1" data-slide-to="1">
</li>
                                        </ol>
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="{!! url('portal_/images/posting/list-9.jpg') !!}" alt="Image">
                                            </div>
                                            <div class="item">
                                                <img src="{!! url('portal_/images/posting/list-6.jpg') !!}" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Short Description -->
                                <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title">
<span>
<a href="#">Sports & Equipment</a>
</span>
</div>
                                    <!-- Ad Title -->
                                    <h3>
                                        <a title=" href="single-page-listing.html">Honda CBR 1000RR for Sale</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location">
<i class="fa fa-map-marker">
</i> Houghton Street London</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star-o">
</i>
                                        <span class="rating-count">(2)</span>

                                    </div>
                                    <!-- Price -->
                                    <span class="horse-special-price">$900</span>
                                </div>
                                <!-- Ad Meta Stats -->
                                <div class="horse-special-info-1">
                                    <ul>
                                        <li>
<i class="fa fa-eye">
</i>
<a href="#">445 Views</a>
</li>
                                        <li>
<i class="fa fa-clock-o">
</i>15 minutes ago </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Listing Ad Grid -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                            <div class="white category-grid-box-1 clearfix">
                                <!-- Image Box -->
                                <div class="image">
                                    <img alt="Tour Package" src="{!! url('portal_/images/posting/grid-1.jpg') !!}" class="img-responsive">
                                </div>
                                <!-- Short Description -->
                                <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title">
<span>
<a href="#">Computer & Equipment</a>
</span>
</div>
                                    <!-- Ad Title -->
                                    <h3>
                                        <a title=" href="single-page-listing.html">Gigabyte's Z170X motherboard </a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location">
<i class="fa fa-map-marker">
</i> Houghton Street London</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star-o">
</i>
                                        <span class="rating-count">(2)</span>

                                    </div>
                                    <!-- Price -->
                                    <span class="horse-special-price">$215</span>
                                </div>
                                <!-- Ad Meta Stats -->
                                <div class="horse-special-info-1">
                                    <ul>
                                        <li>
<i class="fa fa-eye">
</i>
<a href="#">445 Views</a>
</li>
                                        <li>
<i class="fa fa-clock-o">
</i>15 minutes ago </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Listing Ad Grid -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                            <div class="white category-grid-box-1 clearfix">
                                <!-- Image Box -->
                                <div class="image">
                                    <div id="carousel-2" class="carousel slide slide-carousel" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-2" data-slide-to="0" class="active">
</li>
                                            <li data-target="#carousel-2" data-slide-to="1">
</li>
                                            <li data-target="#carousel-2" data-slide-to="2">
</li>
                                        </ol>
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="{!! url('portal_/images/posting/list-5.jpg') !!}" alt="Image">
                                            </div>
                                            <div class="item">
                                                <img src="{!! url('portal_/images/posting/list-10.jpg') !!}" alt="Image">
                                            </div>
                                            <div class="item">
                                                <img src="{!! url('portal_/images/posting/mob-6.jpg') !!}" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Short Description -->
                                <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title">
<span>
<a href="#">Mobiles</a>
</span>
</div>
                                    <!-- Ad Title -->
                                    <h3>
                                        <a title=" href="single-page-listing.html">Xperia Z5 Premium</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location">
<i class="fa fa-map-marker">
</i> Houghton Street London</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <span class="rating-count">(5)</span>

                                    </div>
                                    <!-- Price -->
                                    <span class="horse-special-price">$350</span>
                                </div>
                                <!-- Ad Meta Stats -->
                                <div class="horse-special-info-1">
                                    <ul>
                                        <li>
<i class="fa fa-eye">
</i>
<a href="#">445 Views</a>
</li>
                                        <li>
<i class="fa fa-clock-o">
</i>15 minutes ago </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Listing Ad Grid -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                            <div class="white category-grid-box-1 clearfix">
                                <!-- Image Box -->
                                <div class="image">
                                    <img alt="Tour Package" src="{!! url('portal_/images/posting/house-4.jpg') !!}" class="img-responsive">
                                </div>
                                <!-- Short Description -->
                                <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title">
<span>
<a href="#">Real Estate</a>
</span>
</div>
                                    <!-- Ad Title -->
                                    <h3>
                                        <a title=" href="single-page-listing.html">Brand New House For Sale</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location">
<i class="fa fa-map-marker">
</i> Houghton Street London</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star-o">
</i>
                                        <i class="fa fa-star-o">
</i>
                                        <span class="rating-count">(3)</span>

                                    </div>
                                    <!-- Price -->
                                    <span class="horse-special-price">$43,000</span>
                                </div>
                                <!-- Ad Meta Stats -->
                                <div class="horse-special-info-1">
                                    <ul>
                                        <li>
<i class="fa fa-eye">
</i>
<a href="#">445 Views</a>
</li>
                                        <li>
<i class="fa fa-clock-o">
</i>15 minutes ago </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Listing Ad Grid -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                            <div class="white category-grid-box-1 clearfix">
                                <!-- Image Box -->
                                <div class="image">
                                    <div id="carousel-3" class="carousel slide slide-carousel" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-3" data-slide-to="0" class="active">
</li>
                                            <li data-target="#carousel-3" data-slide-to="1">
</li>
                                            <li data-target="#carousel-3" data-slide-to="2">
</li>
                                        </ol>
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="{!! url('portal_/images/posting/car-3.jpg') !!}" alt="Image">
                                            </div>
                                            <div class="item">
                                                <img src="{!! url('portal_/images/posting/car-5.jpg') !!}" alt="Image">
                                            </div>
                                            <div class="item">
                                                <img src="{!! url('portal_/images/posting/car-6.jpg') !!}" alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Short Description -->
                                <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title">
<span>
<a href="#">Car & Bikes</a>
</span>
</div>
                                    <!-- Ad Title -->
                                    <h3>
                                        <a title=" href="single-page-listing.html">2010 Audi A5 Auto quattro MY10 </a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location">
<i class="fa fa-map-marker">
</i> Houghton Street London</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star-o">
</i>
                                        <span class="rating-count">(2)</span>

                                    </div>
                                    <!-- Price -->
                                    <span class="horse-special-price">$205,000</span>
                                </div>
                                <!-- Ad Meta Stats -->
                                <div class="horse-special-info-1">
                                    <ul>
                                        <li>
<i class="fa fa-eye">
</i>
<a href="#">445 Views</a>
</li>
                                        <li>
<i class="fa fa-clock-o">
</i>15 minutes ago </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Listing Ad Grid -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                            <div class="white category-grid-box-1 clearfix">
                                <!-- Image Box -->
                                <div class="image">
                                    <img alt="Tour Package" src="{!! url('portal_/images/posting/mob-4.jpg') !!}" class="img-responsive">
                                </div>
                                <!-- Short Description -->
                                <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title">
<span>
<a href="#">Sports & Equipment</a>
</span>
</div>
                                    <!-- Ad Title -->
                                    <h3>
                                        <a title=" href="single-page-listing.html">Apple iPhone 6s 64GB</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location">
<i class="fa fa-map-marker">
</i> Houghton Street London</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star-o">
</i>
                                        <span class="rating-count">(4)</span>

                                    </div>
                                    <!-- Price -->
                                    <span class="horse-special-price">$220</span>
                                </div>
                                <!-- Ad Meta Stats -->
                                <div class="horse-special-info-1">
                                    <ul>
                                        <li>
<i class="fa fa-eye">
</i>
<a href="#">445 Views</a>
</li>
                                        <li>
<i class="fa fa-clock-o">
</i>15 minutes ago </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Listing Ad Grid -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                            <div class="white category-grid-box-1 clearfix">
                                <!-- Image Box -->
                                <div class="image">
                                    <img alt="Tour Package" src="{!! url('portal_/images/posting/list-13.jpg') !!}" class="img-responsive">
                                </div>
                                <!-- Short Description -->
                                <div class="short-description-1 clearfix">
                                    <!-- Category Title -->
                                    <div class="category-title">
<span>
<a href="#">Computer & Laptops</a>
</span>
</div>
                                    <!-- Ad Title -->
                                    <h3>
                                        <a title=" href="single-page-listing.html">Apple Macbook Pro i3</a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location">
<i class="fa fa-map-marker">
</i> Houghton Street London</p>
                                    <!-- Rating -->
                                    <div class="rating">
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star">
</i>
                                        <i class="fa fa-star-o">
</i>
                                        <span class="rating-count">(4)</span>

                                    </div>
                                    <!-- Price -->
                                    <span class="horse-special-price">$500</span>
                                </div>
                                <!-- Ad Meta Stats -->
                                <div class="horse-special-info-1">
                                    <ul>
                                        <li>
<i class="fa fa-eye">
</i>
<a href="#">445 Views</a>
</li>
                                        <li>
<i class="fa fa-clock-o">
</i>15 minutes ago </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        --}}
                    </div>
                    <div class="text-center">
                        <div class="load-more-btn">
                            {{--<button class="btn btn-theme"> Load More <i class="fa fa-refresh">
</i>
</button>--}}
                            <a class="btn btn-theme" href="{!! route('listaportal') !!}">
                                {!! trans('portal.seemore') !!}
                                <i class="fa fa-refresh">
                                </i>
                            </a>
                        </div>
                    </div>
                </div>


                <!-- Middle Content Box End -->
                {{--}}
                <!-- Heading Area -->
                <div class="heading-panel">
                    <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1>Browse <span class="heading-color"> Ads</span> By Categories</h1>
                        <!-- Short Description -->
                        <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo
                            eu, his dico ut debet consectetuer.</p>
                    </div>
                </div>
                <!-- Middle Content Box -->
                <div class="col-md-12 col-xs-12 col-sm-12 ">
                    <div class="row">
                        <!-- Category List -->
                        <ul class="category-list-style">
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#">Cars & Trucks<span>(897 Ads)</span>
                                    <i class="flaticon-transport-9">
</i>
                                </a>
                            </li>
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#">Bikes & Cycles<span>(397 Ads)</span>
                                    <i class="flaticon-transport-4">
</i>
                                </a>
                            </li>
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#">Sports<span>(897 Ads)</span>
                                    <i class="flaticon-bowling">
</i>
                                </a>
                            </li>
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#"> Mobiles & Tablets <span>(230 Ads)</span>
                                    <i class="flaticon-technology-19">
</i>
                                </a>
                            </li>
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#">Music & Art <span>(97 Ads)</span>
                                    <i class="flaticon-music-3">
</i>
                                </a>
                            </li>
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#">Real Estate<span>(1123 Ads)</span>
                                    <i class="flaticon-internet">
</i>
                                </a>
                            </li>
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#">Gedgets<span>(300 Ads)</span>
                                    <i class="flaticon-technology-13">
</i>
                                </a>
                            </li>
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#"> Matrimonial <span>(230 Ads)</span>
                                    <i class="flaticon-shapes-2">
</i>
                                </a>
                            </li>
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#">Services<span>(1247 Ads)</span>
                                    <i class="flaticon-construction">
</i>
                                </a>
                            </li>
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#"> Electronics<span>(3397 Ads)</span>
                                    <i class="flaticon-technology-21">
</i>
                                </a>
                            </li>
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#">Pets<span>(111 Ads)</span>
                                    <i class="flaticon-dog-1">
</i>
                                </a>
                            </li>
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#"> Clothing<span>(2230 Ads)</span>
                                    <i class="flaticon-woman-1">
</i>
                                </a>
                            </li>
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#"> Jobs<span>(7230 Ads)</span>
                                    <i class="flaticon-info">
</i>
                                </a>
                            </li>
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#"> Property & Land<span>(2230 Ads)</span>
                                    <i class="flaticon-internet-2">
</i>
                                </a>
                            </li>
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#"> Education<span>(130 Ads)</span>
                                    <i class="flaticon-education">
</i>
                                </a>
                            </li>
                            <!-- Category -->
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="#"> Camera<span>(1230 Ads)</span>
                                    <i class="flaticon-technology-15">
</i>
                                </a>
                            </li>
                        </ul>
                        <!-- Category List End -->
                    </div>
                </div>
                <!-- Middle Content Box End -->
--}}
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Categories End =-=-=-=-=-=-= -->
{{--
<!-- =-=-=-=-=-=-= How It Work =-=-=-=-=-=-= -->
<section class="section-padding white">
    <!-- Main Container -->
    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- Heading Area -->
            <div class="heading-panel">
                <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                    <!-- Main Title -->
                    <h1>How It <span class="heading-color"> Work</span>
</h1>
                    <!-- Short Description -->
                    <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo
                        eu, his dico ut debet consectetuer.</p>
                </div>
            </div>
            <!-- Middle Content Box -->
            <div class="col-xs-12 col-md-12 col-sm-12 ">
                <div class="row">
                    <div class="how-it-work text-center">
                        <div class="how-it-work-icon">
<i class="flaticon-people">
</i>
</div>
                        <h4>Create Your Account</h4>
                        <p>Duis posuere nec libero efficitur maecenas ut aliquam augue dapibus elit nullam eleifend
                            odio aliquam gravida mauris.</p>
                    </div>
                    <div class="how-it-work text-center ">
                        <div class="how-it-work-icon">
<i class="flaticon-people-2">
</i>
</div>
                        <h4>Post Free Ad</h4>
                        <p>Duis posuere nec libero efficitur maecenas ut aliquam augue dapibus elit nullam eleifend
                            odio aliquam gravida mauris.</p>
                    </div>
                    <div class="how-it-work text-center">
                        <div class="how-it-work-icon ">
<i class="flaticon-heart-1">
</i>
</div>
                        <h4>Deal Done</h4>
                        <p>Duis posuere nec libero efficitur maecenas ut aliquam augue dapibus elit nullam eleifend
                            odio aliquam gravida mauris.</p>
                    </div>
                </div>
            </div>
            <!-- Middle Content Box End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Main Container End -->
</section>
<!-- =-=-=-=-=-=-= How It Work End =-=-=-=-=-=-= -->
--}}
{{--
<!-- =-=-=-=-=-=-= Abs By Countries =-=-=-=-=-=-= -->
<section class="section-padding gray">
    <!-- Main Container -->
    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- Heading Area -->
            <div class="heading-panel">
                <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                    <!-- Main Title -->
                    <h1>Explore<span class="heading-color"> Ads</span> By Location</h1>
                    <!-- Short Description -->
                    <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo
                        eu, his dico ut debet consectetuer.</p>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="row">
                    <!-- Countries Masonry Grid -->
                    <div id="ads-countries" class="posts-masonry">
                        <!-- Country Ads -->
                        <div class="col-sm-6 col-xs-12 col-md-4">
                            <a href="#">
                                <div class="country-box">
                                    <img class="img-responsive"
                                         src="{!! url('portal_/images/countries/aus.png') !!}" alt="">
                                    <div class="country-description">
                                        <h2 class="country-name">Australia</h2>
                                        <p class="country-ads">
<span>3118</span> Ads</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Country Ads -->
                        <div class="col-sm-6 col-xs-12 col-md-4">
                            <a href="#">
                                <div class="country-box">
                                    <img class="img-responsive"
                                         src="{!! url('portal_/images/countries/france.png') !!}" alt="">
                                    <div class="country-description">
                                        <h2 class="country-name">France</h2>
                                        <p class="country-ads">
<span>209</span> Ads</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Country Ads -->
                        <div class="col-sm-6 col-xs-12 col-md-4">
                            <a href="#">
                                <div class="country-box">
                                    <img class="img-responsive"
                                         src="{!! url('portal_/images/countries/bangladesh.png') !!}" alt="">
                                    <div class="country-description">
                                        <h2 class="country-name">Bangladesh</h2>
                                        <p class="country-ads">
<span>712</span> Ads</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Country Ads -->
                        <div class="col-sm-6 col-xs-12 col-md-4">
                            <a href="#">
                                <div class="country-box">
                                    <img src="{!! url('portal_/images/countries/usa.png') !!}" alt=""
                                         class="img-responsive">
                                    <div class="country-description">
                                        <h2 class="country-name">united states</h2>
                                        <p class="country-ads">
<span>3385</span> Ads</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Country Ads -->
                        <div class="col-sm-6 col-xs-12 col-md-4">
                            <a href="#">
                                <div class="country-box">
                                    <img class="img-responsive"
                                         src="{!! url('portal_/images/countries/england.png') !!}" alt="">
                                    <div class="country-description">
                                        <h2 class="country-name">England</h2>
                                        <p class="country-ads">
<span>281</span> Ads</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Country Ads -->
                        <div class="col-sm-6 col-xs-12 col-md-4">
                            <a href="#">
                                <div class="country-box">
                                    <img class="img-responsive"
                                         src="{!! url('portal_/images/countries/mexico.png') !!}" alt="">
                                    <div class="country-description">
                                        <h2 class="country-name">mexico</h2>
                                        <p class="country-ads">
<span>48</span> Ads</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Country Ads -->
                        <div class="col-sm-6 col-xs-12 col-md-4">
                            <a href="#">
                                <div class="country-box">
                                    <img class="img-responsive"
                                         src="{!! url('portal_/images/countries/pakistan.png') !!}" alt="">
                                    <div class="country-description">
                                        <h2 class="country-name">Pakistan</h2>
                                        <p class="country-ads">
<span>1218</span> Ads</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Country Ads -->
                        <div class="col-sm-6 col-xs-12 col-md-4">
                            <a href="#">
                                <div class="country-box">
                                    <img src="{!! url('portal_/images/countries/africa.png') !!}"
                                         class="img-responsive" alt="">
                                    <div class="country-description">
                                        <h2 class="country-name">South Africa</h2>
                                        <p class="country-ads">
<span>798</span> Ads</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Country Ads -->
                        <div class="col-sm-6 col-xs-12 col-md-4">
                            <a href="#">
                                <div class="country-box">
                                    <img class="img-responsive"
                                         src="{!! url('portal_/images/countries/brazil.png') !!}" alt="">
                                    <div class="country-description">
                                        <h2 class="country-name">Brazil</h2>
                                        <p class="country-ads">
<span>318</span> Ads</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Countries Masonry Grid End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Main Container End -->
</section>

<!-- =-=-=-=-=-=-= Abs By Countries End =-=-=-=-=-=-= -->
--}}
{{--
<!-- =-=-=-=-=-=-= Statistics Counter =-=-=-=-=-=-= -->
<div class="funfacts custom-padding  parallex">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <div class="number">
<span class="timer" data-from="0" data-to="1238" data-speed="1500"
                                          data-refresh-interval="5">0</span>+
                </div>
                <h4>Completed <span>Project</span>
</h4>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <div class="number">
<span class="timer" data-from="0" data-to="820" data-speed="1500"
                                          data-refresh-interval="5">0</span>+
                </div>
                <h4>Expert <span>Worker</span>
</h4>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <div class="number">
<span class="timer" data-from="0" data-to="1042" data-speed="1500"
                                          data-refresh-interval="5">0</span>+
                </div>
                <h4>Happy <span>Client</span>
</h4>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <div class="number">
<span class="timer" data-from="0" data-to="34" data-speed="1500"
                                          data-refresh-interval="5">0</span>+
                </div>
                <h4>Award <span>Winner</span>
</h4>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /.funfacts -->

<div class="clearfix">
</div>
<!-- =-=-=-=-=-=-= Statistics Counter End =-=-=-=-=-=-= -->
--}}
<!-- =-=-=-=-=-=-= Pricing =-=-=-=-=-=-= -->
{{--
<section class="custom-padding">
    <!-- Main Container -->
    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- Heading Area -->
            <div class="heading-panel">
                <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                    <!-- Main Title -->
                    <h1>Choose the best <span class="heading-color"> subscription </span>for you</h1>
                    <!-- Short Description -->
                    <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo
                        eu, his dico ut debet consectetuer.</p>
                </div>
            </div>
            <!-- Middle Content Box -->
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="row pricing">
                    <div class="col-sm-6 col-lg-4 col-md-4">
                        <div class="block">
                            <h3>Individual</h3>
                            <span class="type">Standalone</span>
                            <span class="price">$0</span>
                            <span class="time">30 days free trail</span>
                            <ul>
                                <li>All the awesomeness</li>
                                <li>Up to 15 projects</li>
                                <li>Unlimited tasks</li>
                                <li>Basic Dashboards</li>
                            </ul>
                            <a href="#" class="btn btn-theme">Select Plan <i class="fa fa-arrow-right"
                                                                             aria-hidden="true">
</i>
</a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-md-4">
                        <div class="block featured">
                            <h3>Business</h3>
                            <span class="type">Teams</span>
                            <span class="price">$5</span>
                            <span class="time">after the 14 days free trial</span>
                            <ul>
                                <li>All the awesomeness</li>
                                <li>Up to 15 projects</li>
                                <li>Unlimited tasks</li>
                                <li>Basic Dashboards</li>
                            </ul>
                            <a href="#" class="btn btn-theme">Select Plan <i class="fa fa-arrow-right"
                                                                             aria-hidden="true">
</i>
</a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-md-4">
                        <div class="block">
                            <h3>Complex</h3>
                            <span class="type">Companies</span>
                            <span class="price">$10</span>
                            <span class="time">after the 14 days free trial</span>
                            <ul>
                                <li>All the awesomeness</li>
                                <li>Up to 15 projects</li>
                                <li>Unlimited tasks</li>
                                <li>Basic Dashboards</li>
                            </ul>
                            <a href="#" class="btn btn-theme">Select Plan <i class="fa fa-arrow-right"
                                                                             aria-hidden="true">
</i>
</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Main Container End -->
</section>

<!-- =-=-=-=-=-=-= Pricing End =-=-=-=-=-=-= -->
--}}
{{--
<!-- =-=-=-=-=-=-= App Download Section  =-=-=-=-=-=-= -->
<div class="app-download-section parallex">
    <!-- app-download-section-wrapper -->
    <div class="app-download-section-wrapper">
        <!-- app-download-section-container -->
        <div class="app-download-section-container">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- col-md-12 -->
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <!-- section-title -->
                        <div class="section-title">
<span>Download</span>
<span>
<img
                                        src="{!! url('portal_/images/logo-1.png') !!}"
                                        alt="Tiny Logo">
</span>
<span>Now</span>
                        </div>
                        <!-- /section-title -->
                    </div>
                    <!-- /col-md-12 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <!-- Windows Store -->
                        <a href="#" title="Windows Store" class="btn app-download-button">
<span
                                    class="app-store-btn">
                       <i class="fa fa-windows">
</i>
                       <span>
                       <span>Download From</span>
<span>Windows Store </span>
</span>
                       </span>
                        </a>
                        <!-- /Windows Store -->
                    </div>
                    <!-- /col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <!-- Google Store -->
                        <a href="#" title="Google Store" class="btn app-download-button">
<span
                                    class="app-store-btn">
                       <i class="fa fa-android">
</i>
                       <span>
                       <span>Download From</span>
<span>Google Store </span>
</span>
                       </span>
                        </a>
                        <!-- /Google Store -->
                    </div>
                    <!-- /col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <!-- Apple Store -->
                        <a href="#" title="Windows Store" class="btn app-download-button">
<span
                                    class="app-store-btn">
                       <i class="fa fa-apple">
</i>
                       <span>
                       <span>Download From</span>
<span>Apple Store </span>
</span>
                       </span>
                        </a>
                        <!-- /Apple Store -->
                    </div>
                    <!-- /col-md-4 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /app-download-section-container -->
    </div>
    <!-- /download-section-wrapper -->
</div>

<!-- =-=-=-=-=-=-= App Download Section End =-=-=-=-=-=-= -->
--}}
<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
    <footer class="minimal-footer text-center">
        <div class="container">
            <div class="row address-info">
                {{--
                <div class="col-sm-4 col-md-4 col-xs-12 footer-widget">
                    <h2>Nuestros telefonos</h2>
                    <p>
<span>+90 555 999 77 44</span> , <span>+90 505 959 75 24 </span>
</p>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-12 footer-widget">
                    <h2>Nuestra direccion</h2>
                    <p>
<span>1 LoopText Center London</span> , <span> CA 112</span>
<span>United Kingdom </span>
</p>
                </div>
                --}}
                <div class="col-sm-4 col-md-4 col-xs-12 footer-widget">
                    {{--
                    <h2>Nuestros telefonos</h2>
                    <p>
<span>+90 555 999 77 44</span> , <span>+90 505 959 75 24 </span>
</p>
                    --}}
                </div>
                {{--
                <div class="col-sm-4 col-md-4 col-xs-12 footer-widget">
                    <h2>Manten el contacto</h2>
                    <p>
<a href="#">{!! \Config::get('otra.correocontacto') !!}</a>
</p>
                </div>
                --}}
            </div>
            <ul class="footer-social text-center">

                <li>
                    <a href="{!! url(\Config::get('otra.hfacebook')) !!}" target="_blank">
<span class="fa fa-facebook">
</span>
                    </a>
                </li>
                <li>
                    <a href="{!! url(\Config::get('otra.htwitter')) !!}" target="_blank">
<span class="fa fa-twitter">
</span>
                    </a>
                </li>
                <li>
                    <a href="{!! url(\Config::get('otra.hyoutube')) !!}" target="_blank">
<span class="fa fa-youtube">
</span>
                    </a>
                </li>


                {{--<li>
<a href="#">
<span class="fa fa-google-plus">
</span>
</a>
</li>
                <li>
<a href="#">
<span class="fa fa-linkedin-square">
</span>
</a>
</li>--}}
            </ul>

            <p class="copy-rights">{!! trans('portal.derechos') !!} ©
                <a href="{!! route('portal') !!}" class="copyright">
                    www.HorsesWorldSale.com</a>
            </p>
        </div>
    </footer>
    <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
</div>
{{--
<!-- Post Ad Sticky -->
<a href="#" class="sticky-post-button">
         <span class="sell-icons">
         <i class="flaticon-transport-9">
</i>
         </span>
    <h4>Sell</h4>
</a>
--}}
<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>

@include('portal.sidebar.foot')


<script type="text/javascript">
    (function ($) {
        "use strict";
        $(".minimal-category").slice(0, 12).show();
        $("#loadMore").on('click', function (e) {
            e.preventDefault();
            $(".minimal-category:hidden").slice(0, 4).slideDown();
            if ($(".minimal-category:hidden").length == 0) {
                $("#load").fadeOut('slow');
            }
            $('html,body').animate({
                scrollTop: $(this).offset().top
            }, 1500);
        });
    })(jQuery);

    function Buscar() {
        //$('#env1').click();

        var id = $('#seleccion').val();
        var url = "{!! route('portalporraza') !!}" + '/' + id;
        window.location.replace(url);

    }

    function BuscarP() {
        var id = $('#seleccion').val();
        var url = "{!! route('portalporraza') !!}" + '/' + id;
        /*
        var country = $('#country').val();
        var state = $('#state').val();
        if (country == null) country = 0;
        if (country == undefined) country = 0;
        if (state == null) state = 0;
        if (state == undefined) state = 0;
        var url = "{!! route('portalporestado') !!}" + '/' + country + '/' + state;
        window.location.replace(url);
*/
    }

    var pai = 0;
    var edo = 0;
</script>
<script type="text/javascript" src="{!!url('assets/js/localidad.min.js')!!}"></script>
</body>
</html>