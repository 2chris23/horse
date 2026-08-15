<?php $logo =url("landing/images/basic/logo.png"); ?>
<?php $logo =url("portal_/images/logoportal.png"); ?>

<?php
$prs = \Session::get('pre');

$usuario = \Auth::user();
$f[0] = url('landing/images/slider/1/2.jpg');
$f[1] = url('landing/images/slider/1/6.jpg');
$f[2] = url('landing/images/slider/1/9.jpg');
$f[3] = url('landing/images/slider/1/8.jpg');
$f[0] = url('landing/images/slider/1/2.jpg');
$error = (!empty(\Session::get('flash_message'))) ? \Session::get('flash_message') : null;
if (!empty($error)) {
    if (is_array($error)) {
        $e = "";
        foreach ($error as $k => $v) {
            $e .= $v . "<br>";
        }
        $error = $e;
    }
}
$horses = (isset($horses)) ? $horses : null;
$lang = \Session::get('lang');
if (empty($lang)) {
    $lang = 'es';
    \Session::put('lang', $lang);
    \Session::put('applocale', $lang);
}
App::setLocale($lang);
$Coins = \Session::get('moneda');
$Coins = empty($Coins) ? 'USD' : $Coins;
$mx = \Session::get('mexico');
$colombia = \Session::get('colombia');
$spa = \Session::get('espana');
if ($mx == true) {
    $pais = \Session::get('pais_id');
} elseif ($spa == true) {
    $pais = \Session::get('pais_id');
} elseif ($colombia == true) {
    $pais = \Session::get('pais_id');
} else {
    $pais = null;
}
$seokey = trans('seo.portalkey');
$seoDes = trans('seo.portaldescription');
if ($mx == true) {
    $seokey = trans('seo.tagsMexico');
    $seoDes = trans('seo.DescripMexico');
} elseif ($spa == true) {
    $seokey = trans('seo.tagsEspana');
    $seoDes = trans('seo.DescripEspana');
} elseif ($colombia == true) {
    $seokey = trans('seo.tagsCol');
    $seoDes = trans('seo.DescripCol');
} elseif ($prs == true) {
    $seokey = trans('seo.tagsPre');
    $seoDes = trans('seo.DescripPre');
}

$seokey = (empty($seokey)) ? trans('seo.portalkey') : $seokey;
$seoDes = (empty($seoDes)) ? trans('seo.portaldescription') : $seoDes;
$l = url(\Config::get('logos.fbhws'));
?>

        <!DOCTYPE html>
<html lang="{!! $lang !!}">
<head>

    @include('portal.sidebar.head')

    @include('meta', [
     'titulo' =>  \Config::get('app.name'),
     'descripcion' => $seoDes,
     'key'=>$seokey,
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
    <link rel="stylesheet" href="{!! url('portal_/css/landing.css')!!}">
    <style>
        .center-slide, .left-slide, .right-slide {

            background: #fff;
            height: 150px;
            width: 100%;

            transition: all 0.3s ease-in-out 0s;
            transition-property: all;
            transition-duration: 0.3s;
            transition-timing-function: ease-in-out;
            transition-delay: 0s;
        }

        .left-slide, .right-slide {

            padding: 0 20px;
            opacity: 0;
            position: absolute;
            bottom: 100%;
            left: 0;
            text-align: center;
            overflow: hidden;
        }

        .btnhws:hover .left-slide,
        .btnhws:hover .right-slide {
            bottom: 50%;
            opacity: 1;
            z-index: 3;
            -webkit-transform: translateY(50%);
            -ms-transform: translateY(50%);
            transform: translateY(50%);
        }

        a.btnhws {
            background: #0ef;
        }

        .tooltip {
            width: 100%;
        }
    </style>
</head>
<body>
<?php $robot= Agent::isRobot(); ?>
@if($robot != true)
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WL5JW4G" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
    </noscript>

    <!-- End Google Tag Manager (noscript) -->
@endif
@include('portal.menu.menu')

<div class="background-rotator">
    <div class="owl-carousel owl-theme background-rotator-slider">

    @for($i = 0;$i<count($f);$i++)
        <!-- Slide -->
            <?php $v = $f[$i]; ?>
            <div class="item linear-overlay">
                <img src="{!!$v !!}" alt="{!! Config::get('app.name') !!}">
            </div>
            <!-- Slide -->
        @endfor

    </div>
    <div class="search-section">
        <!-- Find search section -->
        <div class="container">
            <div class="row">
                @include('portal.partials.busqueda')
            </div>
        </div>
    </div>
    <!-- /.Find search section-->
</div>
<div class="main-content-area clearfix">

    <!-- =-=-=-=-=-=-= Categories =-=-=-=-=-=-= -->
    <section class="custom-padding gray">
        <div class="container">
            <div class="row">
                <div class="heading-panel">
                    <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        {!! trans('portal.landing.caballoagregado') !!}
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
                        @for($k = 0;$k<count($horses);$k++)
                            <?php
                            $css = null;
                            $v = $horses[$k];
                            $precio = null;
                            $rd = rand(0, 3);
                            $color = $v->getColorString(); //simple

                            $foto = $v->getFirstFoto();
                            $url = (!empty($foto)) ? $foto->getUrl() : url('portal_/images/posting/car-4.jpg');

                            $raza = $v->getRaza();
                            $alzada = $v->getRaisedFormat();


                            $link = route('portalcaballo', ['slug' => $v->ObtenerSlug()]);
                            $titulo = $v->getName();
                            $precio = Funciones::AjustarNumeroMil($v->getPrice(), 0);

                            $edad = $v->getAge();
                            $mes = $v->getAgeMonth();
                            $alttext = $v->getAltText();

                            $venta = $v->sold;
                            $slug = $v->slug;

                            ?>
                            <!-- Caballo {!! $slug !!} -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                                    <div class="white category-grid-box-1 clearfix">
                                        <a title="" href="{!! $link !!}">
                                            <div class="image">
                                                <figure class="h-313-234">
                                                    <img itemprop="image" alt="{!! $alttext !!}" src="{!! $url !!}"
                                                         onerror="this.onerror=null;this.src='{!! url('portal_/images/posting/car-4.jpg') !!}';"
                                                         class="img-responsive m-w-313 ">
                                                </figure>
                                                @if($venta == 1)
                                                    <div class="ribbon popular"></div>
                                                @endif
                                            </div>
                                        </a>
                                        @if($venta == 0)
                                        <div class="tooltip short-description-1 clearfix" @if($v->price != 0) data-slugp="{!! $slug !!}" data-urlmoneda="{!! route('MonedaCaballo').'/'.$slug !!}" @endif>
                                        @else
                                        <div class="short-description-1 clearfix">
                                        @endif
                                            <div class="category-title">
                                                <a href="{!! $link !!}">{!! trans('horse.raza.'.$raza)!!}</a>
                                            </div>
                                            <h3>
                                                <a title="" href="{!! $link !!}">
                                                    <span>
                                                        {!! $titulo !!}
                                                    </span>
                                                </a>
                                            </h3>
                                            <p>
                                                @if($edad!=0) {!! trans('horse.years',['ano'=>$edad]) !!}
                                                @else {!! trans('horse.mes',['mes'=>$mes]) !!} @endif
                                                @if(!empty($color)) , {!! $color !!} @endif
                                            </p>
                                            <span class="horse-special-price ">
                                                {{--PRECIO --}}
                                                @if(empty($precio)) <span
                                                        class="consulta"> {!! trans('users.pricecheck') !!} </span>
                                                @else <span data-getprice="{!! $slug !!}"> </span> @endif
                                            </span>

                                        </div>

                                    </div>
                                </div>
                            <!-- Caballo {!! $slug !!} -->

                            @endfor
                        @endif

                    </div>
                    <div class="text-center">
                        <div class="load-more-btn">
                            {{--<button class="btn btn-theme"> Load More <i class="fa fa-refresh"> </i> </button>--}}
                            <a class="btn btn-theme" href="{!! route('probusqueda') !!}">

                                {{--<a class="btn btn-theme" href="{!! url(trans('rutas_publicas.listaportal')) !!}">--}}

                                {!! trans('portal.seemore') !!}
                                <i class="fa fa-refresh">
                                </i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Row End -->
        </div>
    </section>
    <div class="hidden hidden-xs-up">
        @php
            $dirs = [
                               'España'=>('spain.'.\Config('aplication.host')),
                               'Mexico'=>('mexico.'.\Config('aplication.host')),
                               'Colombia'=>('colombia.'.\Config('aplication.host')),
                               'Pura Raza Español'=>('pre.'.\Config('aplication.host')),
                           ];
        @endphp
        @foreach($dirs as $k=>$v)
            <a href="{!! "http://".$v !!}"></a>
        @endforeach
    </div>

<?php $envi = \Config::get('app.env'); ?>
@if($envi != 'local')
    <!------------- nueva ------------------------>

        <section class="custom-padding gray hidden hidden-xs-up">
            <div class="container">
                <div class="row">
                    <div class="heading-panel">
                        <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                            @php
                                $dirs = [
                                    'España'=>('http://spain.'.\Config('aplication.host')),
                                    'Mexico'=>('http://mexico.'.\Config('aplication.host')),
                                    'Colombia'=>('http://colombia.'.\Config('aplication.host')),
                                    'Pura Raza Español'=>('http://pre.'.\Config('aplication.host')),
                                ];

                                $diro = [
                                'España'=>'spa',
                                    'Mexico'=>'mex',
                                    'Colombia'=>'colo',
                                    'Pura Raza Español'=>'pre',
                                ];
                            @endphp
                            @foreach($dirs as $v=>$s)
                                <div class="col-lg-3 col-md-6 col-xs-12 btnhws">
                                    <div class=" col-xs-12 left-slide" onclick="$('.btnspa').click()">
                                        <a href="{!! $s !!}" class="btnhws ">
                                            {!! $v !!}
                                        </a>
                                    </div>
                                    {{-- <div class="right-slide"></div>-- --}}
                                    <div class="col-xs-12 center-slide {!! $diro[$v] !!}">
                                        Visita {!! $v !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Middle Content Box -->
                    <div class="col-md-12 col-xs-12 col-sm-12">
                    </div>
                </div>
            </div>
            <a href="{!! url('spain.'.\Config('aplication.host')) !!}" class="btnhws hidden hidden-xs-up btnspa">
                España</a>
        </section>
        <!------------- nueva ------------------------>
    @endif
    <footer class="minimal-footer text-center">
        <div class="container">
            <div class="row address-info text-center">
                <div class="col-sm-offset-2 col-sm-4 col-md-8 col-xs-12 footer-widget text-center">
                    @include('pubsfoot')
                </div>
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
            </ul>
            <p class="copy-rights">
                <a href="{!! route('portal') !!}" class="copyright">
                    HorsesWorldSale.com</a>
                ©
                {!! Funciones::CurrentYear()!!}
                {!! trans('portal.allright') !!}
            </p>
        </div>
    </footer>

</div>
<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>
@include('portal.sidebar.foot')
<?php $robot= Agent::isRobot(); ?>
@if($robot != true)
    <script>

        $(window).on('resize', function () {
            $('.footer-widget .adsbygoogle').width(
                    {{-- //$(window).width() --}}
                    $('.footer-widget').width()
            );
        });
        $('.footer-widget .adsbygoogle').css('width', $('.footer-widget').width());
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
@endif
<script>
    var pai = typeof pai !== 'undefined' ? pai : 0;
    var edo = typeof edo !== 'undefined' ? edo : 0;
    var ciu = typeof ciu !== 'undefined' ? ciu : 0;
</script>
<script type="text/javascript" src="{!!url('assets/js/localidad.min.js')!!}"></script>
</body>
</html>