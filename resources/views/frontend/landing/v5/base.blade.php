@php($animacionslick='
data-animation-in="flipInX"

')

@php

    $lang = \Session::get('lang');
      if (empty($lang)) {
          $lang = 'es';
          \Session::set('lang', $lang);
          \Session::set('applocale', $lang);
      }
      App::setLocale($lang);
@endphp

        <!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="{!! $lang !!}"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{!! $stud->getName() !!}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('meta',
        [
        'titulo' =>  $stud->getName() ,
        'descripcion'=>$stud->getSeodescripcion(),
        'key'=>$stud->words,
        'logo'=>$stud->getLogo(),
        'imagenes' =>$stud->getPhotosModel(),
        ])
    <link rel="icon" type="image/png" href="{!! $stud->getLogo() !!}">

    <link rel="stylesheet" href="{!! url('theme/f/css/bootstrap.min.css') !!}">
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{!! url('theme/f/css/font-awesome.min.css') !!}">
    <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->
    <link rel="stylesheet" href="{!! url('theme/f/slick/slick.css') !!}">
    <link rel="stylesheet" href="{!! url('theme/f/slick/slick-theme.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/f/css/magnific-popup.css') !!}">

    <!--For Plugins external css-->
    <link rel="stylesheet" href="{!! url('theme/f/css/animate/animate.css') !!}"/>
    <link rel="stylesheet" href="{!! url('theme/f/css/plugins.css') !!}"/>

    <!--Theme custom css -->
    <link rel="stylesheet" href="{!! url('theme/f/css/style.css') !!}">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="{!! url('theme/f/css/responsive.css') !!}"/>
    <link href='{!! route('CssTheme5',['slug'=>$stud->slug]) !!}' rel='stylesheet' type='text/css'>

    <script src="{!! url('theme/f/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') !!}"></script>
</head>
<body class="body">
<div class='preloader'>
    <div class='loaded'>&nbsp;</div>
</div>
<header id="home" class="navbar-fixed-top menu-scroll">
@include('frontend.landing.v5.partials.social')
<!-- End navbar-collapse-->
    @include('frontend.landing.v5.partials.menu')
</header> <!-- End Header Section -->

@yield('content')
<!--Footer-->
@include('frontend.landing.v5.partials.footer')

<div class="scrollup">
    <a rel="nofollow" href="#"><i class="fa fa-chevron-up"></i></a>
</div>


<script src="{!! url('theme/f/js/vendor/jquery-1.11.2.min.js') !!}"></script>
<script src="{!! url('theme/f/js/vendor/bootstrap.min.js') !!}"></script>
<script src="{!! url('theme/f/js/jquery.magnific-popup.min.js') !!}"></script>
<script src="{!! route('Easing.js') !!}"></script>
<script src="{!! url('theme/f/js/wow/wow.min.js') !!}"></script>
<script src="{!! url('theme/f/js/plugins.js') !!}"></script>
<script src="{!! url('theme/f/js/main.js') !!}"></script>
<script src="{!! url('theme/f/js/foo.js') !!}"></script>
<script src="{!! url('theme/f/slick/slick.min.js') !!}"></script>
<script src="{!! url('theme/f/js/slick-animate.js') !!}"></script>
<script src="{!! url('theme/v/js/isotope.min.js') !!}"></script>
</body>
</html>
