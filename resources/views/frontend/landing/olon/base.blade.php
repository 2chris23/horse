@php
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

@endphp
        <!DOCTYPE HTML>
<html lang="{!! $lang !!}">
<head>
    <meta charset="UTF-8">
    <title>{!! $stud->getName() !!}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fav Icon -->
    <link id="favicon" rel="icon" href="{!! $favicon !!}"/>
    <!-- Google Font Raleway -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:200,300,500,400,600,700,800' rel='stylesheet'
          type='text/css'>
    <!-- Google Font Dancing Script -->
    <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{!! url('theme/y/css/bootstrap.min.css') !!}"/>
    <link rel="stylesheet" href="{!! url('landing/css/jquery-ui.css') !!}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="{!! url('theme/y/css/font-awesome.min.css') !!}"/>
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="{!! url('theme/y/css/owl.carousel.min.css') !!}"/>
    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="{!! url('theme/y/css/animate.min.css') !!}"/>
    <!-- simpleLens CSS -->
    <link rel="stylesheet" type="text/css" href="{!! url('theme/y/css/jquery.simpleLens.css') !!}"/>
    <!-- Price Slider CSS -->
    <link rel="stylesheet" type="text/css" href="{!! url('theme/y/css/jquery-price-slider.css') !!}"/>
    <!-- MeanMenu CSS -->
    <link rel="stylesheet" type="text/css" href="{!! url('theme/y/css/meanmenu.min.css') !!}"/>
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" type="text/css" href="{!! url('theme/y/css/magnific-popup.css') !!}"/>
    <!-- Nivo Slider CSS -->
    <link rel="stylesheet" type="text/css" href="{!! url('theme/y/css/nivo-slider.css') !!}"/>

    {{--
    <!-- Stylesheet CSS -->
    <link rel="stylesheet" type="text/css" href="{!! url('theme/y/style.css') !!}"/>
    --}}
    <link href='{!! route('CssTheme3',['slug'=>$stud->slug]) !!}' rel='stylesheet' type='text/css'>
    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{!! url('theme/y/css/responsive.css') !!}"/>
    <!--[if IE]>

    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js') !!}"></script><![endif]-->
    <link rel="stylesheet" href="{!! url('landing/js/isotope/isotope.css') !!}">
    <link rel="stylesheet" href="{!! url('css/flags.css') !!}" type="text/css">

</head>
<body>
@include('frontend.landing.v3.partial.header-top')
@include('frontend.landing.v3.partial.header-area')
@include('frontend.landing.v3.partial.header-menu')
@include('frontend.landing.v3.partial.slider')

@yield('content')
@include('frontend.landing.v3.partial.foot')

{{--
<!-- jQuery 2.1.4 -->
<script type="text/javascript" src="{!! url('theme/y/js/jquery-2.1.4.min.js') !!}"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="{!! url('theme/y/js/bootstrap.min.js') !!}"></script>
--}}
<script src="{!! url('theme/w/js/jquery.min.js') !!}"></script>
<script src="{!! url('theme/w/js/bootstrap.min.js') !!}"></script>


<!-- Owl Carousel JS -->
<script type="text/javascript" src="{!! url('theme/y/js/owl.carousel.min.js') !!}"></script>
<!--countTo JS -->
<script type="text/javascript" src="{!! url('theme/y/js/jquery.countTo.js') !!}"></script>
<!-- mixitup JS -->
<script type="text/javascript" src="{!! url('theme/y/js/jquery.mixitup.min.js') !!}"></script>
<!-- magnific popup JS -->
<script type="text/javascript" src="{!! url('theme/y/js/jquery.magnific-popup.min.js') !!}"></script>
<!-- Appear JS -->
<script type="text/javascript" src="{!! url('theme/y/js/jquery.appear.js') !!}"></script>
<!-- MeanMenu JS -->
<script type="text/javascript" src="{!! url('theme/y/js/jquery.meanmenu.min.js') !!}"></script>
<!-- Nivo Slider JS -->
<script type="text/javascript" src="{!! url('theme/y/js/jquery.nivo.slider.pack.js') !!}"></script>
<!-- Scrollup JS -->
<script type="text/javascript" src="{!! url('theme/y/js/jquery.scrollup.min.js') !!}"></script>
<!-- simpleLens JS -->
<script type="text/javascript" src="{!! url('theme/y/js/jquery.simpleLens.min.js') !!}"></script>
<!-- Price Slider JS -->
<script type="text/javascript" src="{!! url('theme/y/js/jquery-price-slider.js') !!}"></script>
<!-- WOW JS -->
<script type="text/javascript" src="{!! url('theme/y/js/wow.min.js') !!}"></script>
<script src="{!! url('landing/js/jquery-ui.min.js')!!}"></script>
<script src="{!! url('theme/v/js/isotope.min.js') !!}"></script>
<script>
    new WOW().init();
</script>
{{--<!-- Main JS -->
<script type="text/javascript" src="{!! url('theme/y/js/main.js') !!}"></script>
--}}
<script src="{!!route('JsTheme3',['slug'=>$stud->slug]) !!}"></script>

</body>

</html>


