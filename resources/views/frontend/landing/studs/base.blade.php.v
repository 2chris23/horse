@php
    $lang = \Session::get('lang');
        if (empty($lang)) {
            $lang = 'es';
            \Session::set('lang', $lang);
            \Session::set('applocale', $lang);
        }
        App::setLocale($lang);




        //$logobasic= url("landing/images/basic/logo.png");
        $logo =$stud->getLogo();
        //$logo =$stud->getLogo();
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
        $imgother3 = url("landing/images/other/3.png");

    $d[0]= url("landing/images/slider/1/2.jpg");
    $d[1]= url("landing/images/slider/1/1.jpg");
    $d[2]= url("landing/images/slider/1/3.jpg");
    /*{{--$d[2]= url('frontend/img/slides/s3.jpg');--}}*/
    $d[3]= url('frontend/img/gallery/img-2.jpg');
    $d[4]= url('frontend/img/gallery/img-3.jpg');
    $d[5]= url('frontend/img/gallery/img-4.jpg');
    $d[6]= url('frontend/img/gallery/img-5.jpg');
    $d[7]= url('frontend/img/slides/s1.jpg');
    $d[8]= url('frontend/img/slides/s2.jpg');
    $d[9]= url('frontend/img/slides/s3.jpg');

    $text[0]= "{!! trans('users.fake.0') !!}";
    $text[1]= "{!! trans('users.fake.1') !!}";
    $text[2]= "{!! trans('users.fake.2') !!}";
    $text[3]= "{!! trans('users.fake.3') !!}";
    $text[4]= "";
    $text[5]= "";
    $text[6]= "";
    $text[7]= "";
    $text[8]= "";
    $text[9]= "";
    $stext[0]= "{!! trans('users.fake.0') !!}";
    $stext[1]= "{!! trans('users.fake.1') !!}";
    $stext[2]= "{!! trans('users.fake.2') !!}";
    $stext[3]= "{!! trans('users.fake.3') !!}";
    $stext[4]= "";
    $stext[5]= "";
    $stext[6]= "";
    $stext[7]= "";
    $stext[8]= "";
    $stext[9]= "";

$favicon = url('assets/img/logo1.ico');
    if (!empty($stud)) {
        if (!empty($stud->getFav())) {
            $favicon = url('uploads/' . \Config::get('aplication.favicon') . '/' . $stud->getFav());
        }
    }


@endphp
        <!DOCTYPE html>
<html lang="{!! $lang !!}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="">
    @yield('fbheader')
    {{--<title>WHS - @yield('title')</title>--}}
    <title>{!! $stud->getName() !!} - @yield('title')</title>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{!! url('frontend/bootstrap/css/bootstrap.min.css')!!}">
    @yield('cssup')


    {{--<link rel="stylesheet" href="{!! url('frontend/bootstrap/css/bootstrap.min.css')!!}">--}}


    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css">--}}
    <link rel="stylesheet" href="{!! url('landing/js/owl-carousel/owl.theme.min.css') !!}">
    <link rel="stylesheet" href="{!! url('landing/js/owl-carousel/owl.transitions.min.css') !!}">
    <link rel="shortcut icon" href="{!!url(\Config::get('logos.favicon48')) !!}"/>

    <link rel="stylesheet" href="{!! url('frontend/owl-carousel/assets/owl.carousel.min.css')!!}">
    <link rel="stylesheet" href="{!! url('frontend/css/animate.min.css')!!}">
    <link rel="stylesheet" href="{!! url('frontend/css/meanmenu.css')!!}">
    <link rel="stylesheet" href="{!! url('frontend/css/nivo-lightbox.min.css')!!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{!! url('frontend/style.min.css')!!}">
    <link rel="stylesheet" href="{!! url('css/flags.css') !!}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.min.css"
          type="text/css">
    <script type="text/javascript" async="" src="http://static.whatshelp.io/widget-send-button/js/init.js"></script>
    {{-- FACEBOOK --}}
<!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    {{--
        <meta property="og:url" content="{!! route('MyPage',['slug'=>$user->getMySlug()]) !!}"/>
        <meta property="og:type" content="website"/>
        <meta property="og:title" content="{!! $stud->getTituloWeb() !!}"/>
        <meta property="og:description" content="{!! $stud->getSeodescripcion() !!}"/>
        <meta property="og:image" content="{!! $logo !!}"/>
        --}}



<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->
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
    <link rel="stylesheet" href="{!! url('frontend/landing.min.css')!!}">

    <style>

        .flotanteRedes .iconos {
            background-image: url({!! url('/css/iconos_redes.png') !!});
        }
        .owl-nextf, .owl-prevf {
            color: {!! $stud->getColor() !!};
        }


        /*



        {{-- zoom in--}}



        .img-sd {
                          display: block;
                          margin-left: auto;
                          margin-right: auto;
                          width: 100%;
                          transform: scale(1);
                          -ms-transform: scale(1);
                          -moz-transform: scale(1);
                          -webkit-transform: scale(1);
                          -o-transform: scale(1);
                          -webkit-transition: all 500ms ease-in-out;
                          -moz-transition: all 500ms ease-in-out;
                          -ms-transition: all 500ms ease-in-out;
                          -o-transition: all 500ms ease-in-out;
                        }
                        .img-sd:hover {
                          transform: scale(0.8);
                          -ms-transform: scale(0.8);
                          -moz-transform: scale(0.8);
                          -webkit-transform: scale(0.8);
                          -o-transform: scale(0.8);
                          -webkit-border-radius: 10px;
                          -moz-border-radius: 10px;
                          border-radius: 10px;
                        }


                                */


        @if(!empty($stud->getColor()))
        .slider-active .owl-dots .owl-dot.active span, .slider-active .owl-dots .owl-dot:hover span, a#scrollUp, .btn.btn-solid {
            background-color: {!! $stud->getColor() !!};
        }

        .slide-thumbnail .flex-active-slide img {
            border-color: {!! $stud->getColor() !!}   !important;
        }

        #scrollUp {
            border-radius: 5px;
        }

        .owl-carousel .owl-controls .owl-nav .owl-prev, .owl-carousel .owl-controls .owl-nav .owl-next, .owl-carousel .owl-controls .owl-dot {
            color: {!! $stud->getColor() !!};
        }

        .pagination li a.active, .pagination li span.active {
            color: {!! $stud->getColor() !!};
        }

        .pagination li a:hover {
            color: {!! $stud->getColor() !!};
        }

        .contact-page-wrapper .widget:hover i {
            color: #a5a5a5 !important;
            transform: scale(1.2);
        }

        .navigation .menu-wrap .menu > li a:hover, .navigation .menu-wrap .menu > li span:hover {
            color: {!! $stud->getColor() !!};
        }

        .contact-page-wrapper .widget i {
            color: {!! $stud->getColor() !!}                               !important;
        }

        .navigation .menu-wrap .menu > li .submenu li a:hover,
        .navigation .menu-wrap .menu > li.active a, .navigation .menu-wrap .menu > li.active span,
        .contact-page-wrapper .widget:hover i, footer .footer-bar h5 i, footer .footer-bar h5 a {
            /*color: #01889a;*/
            color: {!! $stud->getColor() !!};
        }

        .navigation .menu-wrap .menu > li .submenu {

            border-top: 2px solid{!! $stud->getColor() !!};
        }

        h1 {
            color: {!! $stud->getColor() !!}                      !important;
        }

        ul.list li:before {
            color: {!! $stud->getColor() !!};
        }

        .f-coorp {
            color: {!! $stud->getColor() !!}       !important;
        }

        ul.list li:hover {
            color: #a5a5a5 !important;
            /*transform: scale(1.2);*/
        }

        .mean-container a.meanmenu-reveal,
        a.coorp {
            color: {!! $stud->getColor() !!}         !important;
        }

        .content-box .info-block h4 a:hover {
            color: {!! $stud->getColor() !!}         !important;
        }


        @endif
                                      /*header*/



        .social-media > a > .fa, .iconos > .fa {

            @if(!empty($stud->getColor()))
        color: {!! $stud->getColor() !!};

        @endif




        }


        .mean-container .mean-nav ul li a:hover {
            @if(!empty($stud->getColor()))
        color: {!! $stud->getColor() !!};

        @endif

        }

        .mean-container a.meanmenu-reveal span {
            @if(!empty($stud->getColor()))

        background: {!! $stud->getColor() !!} none repeat scroll 0 0;
            @else
        background: #01889a none repeat scroll 0 0;
        @endif




        }

        @if(!empty($stud->getColor()))
        .social-media > a > .fa, .iconos > .fa {
            color: {!! $stud->getColor() !!};
        }

        .sep-inside {

            background: {!! $stud->getColor() !!}                     !important;

        }

        @endif

    </style>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.all.min.js"></script>
    @yield('csstop')
    @include('zopin')
    <script>
        function modalshow(clase) {
            $(clase).modal('show');
        }
    </script>
</head>
<body>
@include('frontend.landing.studs.partials.messenger')
{{--@include('googletranslate')--}}
@if(!empty($stud->getFacebook()->getUrlPage())or !empty($stud->getTwitter()->getUrlPage()) or !empty($stud->getYoutube()->getUrlPage()))
    <div class="flotanteRedes">
        @if(!empty($stud->getFacebook()->getUrlPage()))
            <a href="{!! $stud->getFacebook()->getUrlPage() !!}" target="_blank" title="">
                <div class="iconos ">
                    <i class="fa fa-facebook-square"></i>
                </div>
            </a>
        @endif
        @if(!empty($stud->getTwitter()->getUrlPage()))
            <a href="{!! $stud->getTwitter()->getUrlPage() !!}" target="_blank" title="">
                <div class="iconos ">
                    <i class="fa fa-twitter"></i>
                </div>
            </a>
        @endif
        @if(!empty($stud->getPinterest()->getUrlPage()))
            <a href="{!! $stud->getPinterest()->getUrlPage() !!}" target="_blank" title="">
                <div class="iconos ">
                    <i class="fa fa-pinterest"></i>
                </div>
            </a>
        @endif
        @if(!empty($stud->getInstagram()->getUrlPage()))
            <a href="{!! $stud->getInstagram()->getUrlPage() !!}" target="_blank" title="">
                <div class="iconos ">
                    <i class="fa fa-instagram"></i>
                </div>
            </a>
        @endif
        @if(!empty($stud->getYoutube()->getUrlPage()))
            <a href="{!! $stud->getYoutube()->getUrlPage() !!}" target="_blank" title="">
                <div class="iconos ">
                    <i class="fa fa-youtube"></i>
                </div>
            </a>
        @endif
        {{--
        <div class="iconos inglaterra">
            <a href="#" title="Español"></a>
        </div>
        <div class="iconos espana">
            <a href="#" title="English"></a>
        </div>
        <div class="iconos rusia">
            <a href="#" title="Ruso"></a>
        </div>
        --}}
    </div>
@endif
@if($stud->getHeader() == 0)
    @include('frontend.landing.studs.headers.top',['logo'=>$logo])
@elseif($stud->getHeader() == 1)
    @include('frontend.landing.studs.headers.top1',['logo'=>$logo])
@else
    @include('frontend.landing.studs.headers.top',['logo'=>$logo])
@endif


{{--@include('frontend.landing.studs.partials.top',['logo'=>$logo])--}}
@yield('content')




@include('frontend.landing.studs.footer.foot',['user'=>$user])


{{--cnd bootstrap https://cdnjs.com/libraries/twitter-bootstrap/3.3.5--}}
<!-- Scripts -->

{{--<script type="text/javascript" src="{!! url('frontend/bootstrap/js/bootstrap.min.js') !!}"></script>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
</script>
<script src="{!! url('js/readmore/readmore.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('frontend//js/jquery.meanmenu.min.js')!!}">
</script>
<script type="text/javascript" src="{!! url('frontend/js/progress-bar-appear.min.js')!!}">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
</script>
<script type="text/javascript" src="{!! url('frontend/js/nivo-lightbox.min.js')!!}">
</script>
<script type="text/javascript" src="{!! url('frontend/js/isotope.min.js')!!}">
</script>
<script type="text/javascript" src="{!! url('frontend/js/countdown.js')!!}">
</script>
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBEypW1XtGLWpikFPcityAok8rhJzzWRw"> </script>--}}
<script src="https://maps.googleapis.com/maps/api/js?sensor=true&key=AIzaSyAWBy20udR6mPH_V4Qm9_7Fn5BoyyVyzyA&libraries=places"
></script>
<script type="text/javascript" src="{!! url('frontend/js/mail.min.js')!!}">
</script>
{{--
<script type="text/javascript" src="{!! url('frontend/js/gmaps.js')!!}">
</script>
--}}
<script type="text/javascript" src="{!! url('frontend/js/plugins.js')!!}">
</script>
<script type="text/javascript" src="{!! url('frontend/js/js.min.js')!!}">
</script>
<script src="{!! url('landing/js/jquery-ui.min.js')!!}">
</script>
<script src="{!! url('landing/js/jquery.appear.min.js')!!}">
</script>
<script src="{!! url('landing/js/jquery.sticky.min.js')!!}">
</script>
<script src="{!! url('landing/js/rs-plugin/js/jquery.themepunch.tools.min.js')!!}">
</script>
<script src="{!! url('landing/js/rs-plugin/js/jquery.themepunch.revolution.min.js')!!}">
</script>
<script src="{!! url('landing/js/jquery.easing.min.js')!!}">
</script>
<script src="{!! url('landing/js/jquery.easing/jquery.easing.min.js')!!}">
</script>

<script>
    // SLIDER REVOLUTION
    jQuery('.tp-banner').show().revolution({
        dottedOverlay: "none",
        delay: 16000,
        startwidth: 400,
        startheight: 400,
        hideThumbs: 200,

        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 5,

        navigationType: "bullet",
        navigationArrows: "solo",
        navigationStyle: "preview1",

        touchenabled: "on",
        onHoverStop: "on",

        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,

        parallax: "mouse",
        parallaxBgFreeze: "on",
        parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],

        keyboardNavigation: "off",

        navigationHOffset: 0,
        navigationVOffset: 20,
        navigationHAlign: "top",				// Vertical Align top,center,bottom
        navigationVAlign: "bottom",				// Horizontal Align left,center,right


        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,

        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,

        shadow: 0,
        fullWidth: "on",
        fullScreen: "off",

        spinner: "spinner4",

        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,

        shuffle: "off",

        autoHeight: "off",
        forceFullWidth: "off",


        hideThumbsOnMobile: "off",
        hideNavDelayOnMobile: 1500,
        hideBulletsOnMobile: "off",
        hideArrowsOnMobile: "off",
        hideThumbsUnderResolution: 0,

        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        videoJsPath: "rs-plugin/videojs/",
        fullScreenOffsetContainer: ""
    });

    // SLIDER REVOLUTION
    jQuery('.tp-banner1').show().revolution({
        dottedOverlay: "none",
        delay: 16000,
        startwidth: 1170,
        startheight: 550,
        hideThumbs: 200,

        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 5,

        //navigationType: "bullet",
        navigationType: "thumb",
        navigationArrows: "solo",
        navigationStyle: "preview5",

        touchenabled: "on",
        onHoverStop: "on",

        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,

        parallax: "mouse",
        parallaxBgFreeze: "on",
        parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],

        keyboardNavigation: "off",

        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 0,
        navigationVOffset: 20,

        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,

        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,

        shadow: 0,
        fullWidth: "on",
        fullScreen: "off",

        spinner: "spinner4",

        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,

        shuffle: "off",

        autoHeight: "off",
        forceFullWidth: "off",


        hideThumbsOnMobile: "off",
        hideNavDelayOnMobile: 1500,
        hideBulletsOnMobile: "off",
        hideArrowsOnMobile: "off",
        hideThumbsUnderResolution: 0,

        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        videoJsPath: "rs-plugin/videojs/",
        fullScreenOffsetContainer: ""
    });

    // SLIDER REVOLUTION
    jQuery('.tp-banner-full').show().revolution({
        dottedOverlay: "none",
        delay: 16000,
        startwidth: 1170,
        startheight: 700,
        hideThumbs: 200,

        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 5,

        navigationType: "bullet",
        navigationArrows: "solo",
        navigationStyle: "preview5",

        touchenabled: "on",
        onHoverStop: "on",

        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,

        parallax: "mouse",
        parallaxBgFreeze: "on",
        parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],

        keyboardNavigation: "on",

        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 0,
        navigationVOffset: 20,

        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,

        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,

        shadow: 0,
        fullWidth: "on",
        fullScreen: "on",

        spinner: "spinner4",

        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,

        shuffle: "off",

        autoHeight: "off",
        forceFullWidth: "off",


        hideThumbsOnMobile: "off",
        hideNavDelayOnMobile: 1500,
        hideBulletsOnMobile: "off",
        hideArrowsOnMobile: "off",
        hideThumbsUnderResolution: 0,

        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        videoJsPath: "{!! url('landing/js/rs-plugin/videojs/') !!}",
        fullScreenOffsetContainer: ""
    });

</script>
@yield('js')
{{--https://whatshelp.io/widget/?utm_campaign=multy_widget&utm_medium=widget&utm_source=ochika.com--}}
<script>
    function cargarimagenes() {
        $(function () {
            $.each(document.images, function () {
                var this_image = this;
                var src = $(this_image).attr('src') || '';
                if (!src.length > 0) {
                    //this_image.src = options.loading; // show loading
                    var lsrc = $(this_image).attr('lsrc') || '';
                    if (lsrc.length > 0) {
                        var img = new Image();
                        img.src = lsrc;
                        $(img).load(function () {
                            this_image.src = this.src;
                        });
                    }
                }
            });
        });

    }

    $(document).on('ready', function () {
        cargarimagenes();
   });
</script>


@yield('modal')
</body>
</html>