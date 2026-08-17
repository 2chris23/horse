<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>{!! $stud->getName() !!} | @yield('title')</title>
    @yield('fbheader')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="{!! $stud->getLogo() !!}"/>

    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="{!! url('theme/lotus/css/lib/font-awesome.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/lotus/css/lib/font-lotusicon.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/lotus/css/lib/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/lotus/css/lib/owl.carousel.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/lotus/css/lib/jquery-ui.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/lotus/css/lib/magnific-popup.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/lotus/css/lib/settings.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/lotus/css/lib/bootstrap-select.min.css') !!}">
    <link rel="stylesheet" href="{!! url('assets/tooltip/css/tooltipster.bundle.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/lotus/css/helper.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/lotus/css/custom.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/lotus/css/responsive.css') !!}">
    <link rel="stylesheet" href="{!! url('css/flags.css') !!}" type="text/css">
    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="{!! url('theme/lotus/css/style.css') !!}">
    @yield('cssup')
    <link href='{!! route('CssTheme4',['slug'=>$stud->slug]) !!}' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js') !!}"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js') !!}"></script>
    <![endif]-->
    @include('adsence')
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
    <script>
        window.token = '{!! csrf_token() !!}';
    </script>
    @include('zopin')
</head>
@include('frontend.landing.studs.partials.messenger')
<!--[if IE 7]>
<body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 8]>
<body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]>
<body class="ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<body> <!--<![endif]-->

{{--
<!-- PRELOADER -->
<div id="preloader">
    <span class="preloader-dot"></span>
</div>
<!-- END / PRELOADER -->
--}}

<div id="page-wrap" class="bg-white-2">
    <!-- HEADER -->
    <header id="header" class="header-v3 clearfix">

        <!-- HEADER TOP -->
    @include('frontend.landing.v4.partials.header')
    <!-- END / HEADER TOP -->

        <!-- HEADER LOGO & MENU -->
    @include('frontend.landing.v4.partials.menu')
    <!-- END / HEADER LOGO & MENU -->

    </header>
    <!-- END / HEADER -->

@yield('content')



@include('frontend.landing.v4.partials.modal')

<!-- FOOTER -->
@include('frontend.landing.v4.partials.footer')
<!-- END / FOOTER -->

    @yield('modal')
</div>
<div class="scrollup" style="display: block;">
    <a href="#">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>
<!-- LOAD JQUERY -->
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/jquery-1.11.0.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/jquery-ui.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/bootstrap-select.js') !!}"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyAb2lfsiytHD7rMhBaAvJz2CKhk05uiIuE"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=true"></script>
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/jquery.themepunch.revolution.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/jquery.themepunch.tools.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/owl.carousel.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/jquery.appear.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/jquery.countTo.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/jquery.countdown.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/jquery.parallax-1.1.3.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/jquery.magnific-popup.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/SmoothScroll.js') !!}"></script>
<!-- validate -->
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/jquery.form.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/js/lib/jquery.validate.min.js') !!}"></script>
<!-- Custom jQuery -->
<script type="text/javascript" src="{!! url('theme/lotus/js/scripts.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/baraja/js/modernizr.custom.79639.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/lotus/baraja/js/jquery.baraja.js') !!}"></script>
<script type="text/javascript" src="{!! url('theme/w/js/isotope.min.js') !!}"></script>
<script src="{!!route('JsTheme4',['slug'=>$stud->slug]) !!}"></script>
<script src="{!! url('assets/tooltip/js/tooltipster.bundle.min.js') !!}"></script>
@include('attribmoneda')
@yield('js')
</body>
</html>