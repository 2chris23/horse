@php
    $lang = \Session::get('lang');
        if (empty($lang)) {
            $lang = 'es';
            \Session::put('lang', $lang);
            \Session::put('applocale', $lang);
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
            $favicon = $stud->getFavUrl();
        }
    }
    $Coins = \Session::get('moneda');
        $css = null;
        $Coins = empty($Coins)?'USD':$Coins;




@endphp
        <!DOCTYPE html>
<html lang="{!! $lang !!}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{!! $stud->getName() !!} | @yield('title')</title>

    {{--<meta name="Description" content="">--}}
    @yield('fbheader')
    {{--<title>WHS - @yield('title')</title>--}}

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}

    <link rel="stylesheet" id="color" href="{!! url('portal_/css/colors/defualt.css')!!}">
    <link rel="stylesheet" href="{!! url('frontend/bootstrap/css/bootstrap.min.css')!!}">
    <link rel="stylesheet" href="{!! url('frontend/alt2.min.css') !!}">
    {{--<link rel="stylesheet" href="{!! url('frontend/alt.css') !!}">--}}
<!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="{!! url('portal_/css/style2.min.css')!!}">
    <!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->

    <!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->

    @include('adsence')
    @yield('cssup')


    {{--<link rel="stylesheet" href="{!! url('frontend/bootstrap/css/bootstrap.min.css')!!}">--}}


    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css">--}}
    <link rel="stylesheet" href="{!! url('landing/js/owl-carousel/owl.theme.min.css') !!}">
    <link rel="stylesheet" href="{!! url('landing/js/owl-carousel/owl.transitions.min.css') !!}">
    <link rel="stylesheet" href="{!! url('frontend/owl-carousel/assets/owl.carousel.min.css')!!}">
    {{--<link rel="shortcut icon" href="{!!url(\Config::get('logos.favicon48')) !!}"/>--}}
    <link rel="shortcut icon" href="{!!$favicon !!}"/>


    <link rel="stylesheet" href="{!! url('frontend/css/animate.min.css')!!}">
    <link rel="stylesheet" href="{!! url('frontend/css/meanmenu.css')!!}">
    <link rel="stylesheet" href="{!! url('frontend/css/nivo-lightbox.min.css')!!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{!! url('css/flags.css') !!}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.min.css"
          type="text/css">
    <script type="text/javascript" async="" src="http://static.whatshelp.io/widget-send-button/js/init.js"></script>
    <link rel="stylesheet" href="{!! url('frontend/style.min.css')!!}">
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





    {{--
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <link rel="stylesheet" href="http://www.mislider.com/css/mislider.css">
    --}}



    {{--<link rel="stylesheet" href="{!! url('js/slide/css/bootstrap3-showmanyslideonecarousel.min.css') !!}">--}}
    <link rel="stylesheet" href="{!! url('js/slide/css/bootstrap3-showmanyslideonecarousel.min.css') !!}">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    {{--<script type="text/javascript" src="{!! url('js/slide/js/bootstrap3-showmanyslideonecarousel.min.js') !!}"></script>--}}
    {{--<script type="text/javascript" src="http://www.mislider.com/js/mislider.js"></script>-}}
    {{--
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.5/jquery.jcarousel-core.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.5/jquery.jcarousel.min.js"></script>
    --}}

    {{--
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.8.0/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.8.0/slick.min.js"></script>
        --}}

    @yield('csstop')

    @include('zopin')

    <script>
        function modalshow(clase) {
            $(clase).modal('show');
        };

    </script>
    <link rel="stylesheet" href="{!! url('assets/tooltip/css/tooltipster.bundle.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! route('CssTheme0',['stud'=>$stud->slug]) !!}"/>
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
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"> </script>--}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
</script>
<script src="{!! url('js/readmore/readmore.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('frontend//js/jquery.meanmenu.min.js')!!}"></script>
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
<script src="https://maps.googleapis.com/maps/api/js?sensor=true&key=AIzaSyAWBy20udR6mPH_V4Qm9_7Fn5BoyyVyzyA&libraries=places"></script>
<script type="text/javascript" src="{!! url('frontend/js/mail.min.js')!!}">
</script>
{{--
<script type="text/javascript" src="{!! url('frontend/js/gmaps.js')!!}">
</script>
--}}
<script type="text/javascript" src="{!! url('frontend/js/plugins.js')!!}"></script>
<script type="text/javascript" src="{!! url('frontend/js/js.min.js')!!}"></script>
<script src="{!! url('landing/js/jquery-ui.min.js')!!}"></script>
<script src="{!! url('js/jquery.touch.min.js')!!}"></script>
<script src="{!! url('landing/js/jquery.appear.min.js')!!}"></script>
<script src="{!! url('landing/js/jquery.sticky.min.js')!!}"></script>
<script src="{!! url('landing/js/rs-plugin/js/jquery.themepunch.tools.min.js')!!}"></script>
<script src="{!! url('landing/js/rs-plugin/js/jquery.themepunch.revolution.min.js')!!}"></script>
<script src="{!! route('Easing.js') !!}"></script>

<script src="{!! route('JsTheme0',['slug'=>$stud->slug])!!}"></script>
<script src="{!! url('assets/tooltip/js/tooltipster.bundle.min.js') !!}"></script>
@include('attribmoneda')

@yield('js')
@php($envi = \Config::get('app.env'))
@if($envi == 'local')
    @include('resizedebug');
@endif
@yield('modal')
</body>
</html>
