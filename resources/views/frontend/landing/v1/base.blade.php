@php
    $razas = $stud->Horses()->select('raza', DB::raw('count(*) as total'))->groupby('raza')->get()->toArray();
    $sexos =  $stud->Horses()->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();
    $colores =  $stud->Horses()->select('color', DB::raw('count(*) as total'))->groupby('color')->get()->toArray();
    $colorcoorp = $stud->getColor();
    $lang = \Session::get('lang');
    if (empty($lang)) {
        $lang = 'es';
        \Session::put('lang', $lang);
        \Session::put('applocale', $lang);
    }
    App::setLocale($lang);

    $favicon = url('assets/img/logo1.ico');
    if (!empty($stud)) {
        if (!empty($stud->getFav())) {
            $favicon = $stud->getFavUrl();
        }
    }
     $Coins = \Session::get('moneda');
    $css = null;
    $Coins = empty($Coins)?'USD':$Coins;
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
@endphp
        <!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="{!! $lang !!}"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="{!! $lang !!}"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="{!! $lang !!}"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="{!! $lang !!}"> <!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {!! $stud->getName() !!}</title>
    @yield('fbheader')
    <link rel="icon" type="image/png" href="{!! $favicon !!}">
    <link rel="shortcut icon" href="{!!$favicon !!}"/>
    <!--Google Fonts link-->
    @include('adsence')
    @yield('cssup')
    @if(!empty($stud->getGa()))
    <!-- Google Analytics -->

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', '{!! $stud->getGa() !!}', 'auto');
            ga('send', 'pageview');

        </script>
        <!-- End Google Analytics -->
    @endif
    @yield('cssup')
    <link rel="stylesheet" href="{!! url('landing/js/owl-carousel/owl.theme.min.css') !!}">
    <link rel="stylesheet" href="{!! url('landing/js/owl-carousel/owl.transitions.min.css') !!}">
    <link rel="stylesheet" href="{!! url('frontend/owl-carousel/assets/owl.carousel.min.css')!!}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{!! url('theme/v/css/slick.css"') !!}">
    <link rel="stylesheet" href="{!! url('theme/v/css/slick-theme.css"') !!}">
    <link rel="stylesheet" href="{!! url('theme/v/css/animate.css"') !!}">
    <link rel="stylesheet" href="{!! url('theme/v/css/fonticons.css"') !!}">
    {{--<link rel="stylesheet" href="{!! url('theme/v/css/font-awesome.min.css"') !!}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--<link rel="stylesheet" href="{!! url('theme/v/css/Dropdown.min.css"') !!}">--}}
    <link rel="stylesheet" href="{!! url('theme/v/css/bootstrap.css"') !!}">


    <link rel="stylesheet" href="{!! url('theme/v/css/magnific-popup.css"') !!}">
    <link rel="stylesheet" href="{!! url('theme/v/css/bootsnav.css"') !!}">

    <link rel="stylesheet" href="{!! url('frontend/share/css/contact-buttons.css"') !!}">
    <!--For Plugins external css-->
<!--<link rel="stylesheet" href="{!! url('theme/v/css/plugins.css"') !!} "/>-->
    <!--Theme custom css -->
    <link rel="stylesheet" href="{!! url('theme/v/css/style.css"') !!}">
    <link rel="stylesheet" href="{!! url('theme/v/css/vstyle.css"') !!}">

<!--<link rel="stylesheet" href="{!! url('theme/v/css/colors/maron.css"') !!}">-->
    <!--Theme Responsive css-->
    <link rel="stylesheet" href="{!! url('theme/v/css/responsive.css"') !!}"/>
    <script src="{!! url('theme/v/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') !!}"></script>
    {{--<script src="{!! url('theme/v/js/vendor/jquery-1.11.2.min.js') !!}"></script>--}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{!! route('lazy.js') !!}"></script>


    {{--<script src="{!! url('landing/js/jquery-ui.min.js')!!}"></script>--}}

    @include('zopin')
    <link rel="stylesheet" href="{!! url('css/flags.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! url('assets/tooltip/css/tooltipster.bundle.min.css') !!}">
    <link rel="stylesheet" href="{!! route('CssTheme1',['slug'=>$stud->slug]) !!}">

</head>

<body data-spy="scroll" data-target=".navbar-collapse">
{{--
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
        </div>
    </div>
</div>
--}}

@include('frontend.landing.studs.partials.messenger')
<div class="culmn">
    @include('frontend.landing.v1.partials.navbar')
    @yield('content')
    @include('frontend.landing.v1.partials.footer')

</div>
<div class="scrollup" style="display: block;"><a href="#"><i class="fa fa-chevron-up"></i></a></div>
<!-- JS includes -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
{{--<script src="{!! url('theme/v/js/vendor/bootstrap.min.js') !!}"></script>--}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
</script>

<script src="{!! url('theme/v/js/isotope.min.js') !!}"></script>
<script src="{!! url('theme/v/js/jquery.magnific-popup.js') !!}"></script>
<script src="{!! route('Easing.js') !!}"></script>
<script src="{!! url('theme/v/js/slick.min.js') !!}"></script>
<script src="{!! url('theme/v/js/jquery.collapse.js') !!}"></script>
<script src="{!! url('theme/v/js/bootsnav.js') !!}"></script>

<script src="{!! url('frontend/share/js/jquery.contact-buttons.js') !!}"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyD_tAQD36pKp9v4at5AnpGbvBUsLCOSJx8"></script>
<script src="{!! url('theme/v/js/gmaps.min.js') !!}"></script>
{{--
<script>
    $('.mone').on('click', function () {
        $(this).tooltip('enable').tooltip('open');
    });
</script>
--}}

@yield('js')

<script src="{!! url('theme/v/js/plugins.js') !!}"></script>
<script src="{!!route('JsTheme1',['slug'=>$stud->slug]) !!}"></script>
{{--<script src="{!! url('theme/v/js/main.js') !!}"></script>--}}
<script src="{!! url('assets/tooltip/js/tooltipster.bundle.min.js') !!}"></script>
@include('attribmoneda')
</body>
@yield('modal')
</html>

