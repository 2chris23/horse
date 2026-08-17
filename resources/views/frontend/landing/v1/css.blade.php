@php($escritorio = Agent::isDesktop())

@if(!empty($stud)) @php($colorcoorp = $stud->getColor()) @if(empty($stud))
    <style> @endif {{--INICIO--}}
  {{--
     @php
    $d = [];
     $d[0] = url('landing/images/slider/1/2.jpg');
        $d[1] = url('landing/images/slider/1/6.jpg');
        $d[2] = url('landing/images/slider/1/9.jpg');
        $d[3] = url('landing/images/slider/1/8.jpg');
$rnd = rand(0,3);
@endphp
@if(!empty(Photo::Slider($stud->id)->first()))
    @php
        $sliders =Photo::Slider($stud->id)->get();
    $g = count($sliders)-1;
    $ws = $sliders[rand(0,$g)];
    $img = $ws['url'];
    @endphp
@else
    @php
    $ws = $d[rand(0,3)];
    $img = $ws;
    @endphp

@endif
--}}

@if(!empty($stud->getFront()))
    @if(!empty($stud->getFront()->getUrl()))

        .foo-bg {
            background: url({!! $stud->getFront()->getUrl() !!}) no-repeat top center;
        }

        @endif
@endif
@include('assets.css.lotes')
.figure-center {
            width: 100%;
        }

        .fix-text-200 {
            min-width: 200px;
        }

        .p-bottom-30 {
            padding-bottom: 30px;
        }

        .model_item {
            height: 270px;
        }

        .model_img {
            /*height: 298px;*/
            height: auto;
        }

        .home_text {
            margin-top: 200px;
        }

        .contact-buttons-bar {
            z-index: 1;
        }

        .btn-print,
        .fa.fa-print {
            color: #612726;
            margin-top: -5px;

            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            -ms-transition: all 0.5s;
            -o-transition: all 0.5s;
            transition: all 0.5s;
            font-size: 20px;
        }

        .fa.fa-print:hover,
        .btn-print:hover {
            color: #612726;
            margin-top: -10px;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            -ms-transition: all 0.5s;
            -o-transition: all 0.5s;
            transition: all 0.5s;
        }

        .span.fa-play {
            top: 45%;
        }

        .main_home {
            padding: 0;
            margin-top: 300px;
        }

        #hello {
            height: 450px;
        }

        #hello, .about-banner, .contact-banner, .videos, .fotos {
            background-attachment: unset;
            margin-top: 0;
        }

        .foo-bg {
            background-attachment: fixed;
            background-size: cover;
            background-color: #fff;
        }

        .ont {
            z-index: 1;
        }

        .img-shadow:after {
            position: absolute;
            bottom: 4%;
            z-index: -1;
            height: 20%;
            max-height: 100px;
            max-width: 460px;
            width: 60%;
            content: "";
            -webkit-box-shadow: 0 17px 10px rgba(0, 0, 0, .7);
            box-shadow: 0 17px 10px rgba(0, 0, 0, .7);
            left: auto;
            right: 4%;
            -webkit-transform: rotate(2deg);
            -ms-transform: rotate(2deg);
            transform: rotate(2deg); /*z-index: 1;*/
            opacity: .4;
        }

        .img-shadow:before {
            position: absolute;
            bottom: 4%;
            left: 4%;
            z-index: -1;
            height: 20%;
            max-height: 100px;
            max-width: 460px;
            width: 60%;
            content: "";
            -webkit-box-shadow: 0 17px 10px rgba(0, 0, 0, .7);
            box-shadow: 0 17px 10px rgba(0, 0, 0, .7);
            -webkit-transform: rotate(-2deg);
            -ms-transform: rotate(-2deg);
            transform: rotate(-2deg); /*z-index: 1;*/
            opacity: .4;
        }

        .owl-prevf, .owl-nextf {
            color: #ffffff;
        }

        .owl-prevf > .fa {
            padding-left: 30px;
        }

        .owl-nextf > .fa {
            padding-right: 30px;
        }

        .candidate-profile-picture a.btn-default {
            color: #000000;
        }

        .candidate-profile-picture a.btn-default:hover {
            color: #fff;
        }

        .candidate-registration input {
            width: 100% !important;
            border: 1px solid #ccc !important;;
        }

        .btn-black {
            border: 2px solid !important; /*background-color: transparent;*/
            padding: 0.8rem 2.5rem;
            padding-bottom: 12px !important;
            border-radius: 30px;
            transition: all 0.6s;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 600;
        }

        .p-r-20 {
            padding-right: 20px;
        }

        .dropdown.open > .dropdown-menu {
            display: block !important;
            opacity: 1;
        }

        .m-t-30 {
            margin-top: 30px;
        }

        .bandera {
            border: none;
            padding: 0px;
            background-color: transparent !important;
            color: #6f6f6f;
        }

        .inline {
            display: inline-block !important;
        }

        .sombraizquierda { /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0.65+0,0+100;Neutral+Density */
            background: -moz-linear-gradient(left, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 100%) !important; /* FF3.6-15 */
            background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 100%) !important;; /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to right, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 100%) !important;; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#a6000000', endColorstr='#00000000', GradientType=1) !important;; /* IE6-9 */
        }

        .sombraderecha { /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0.65+0,0+100;Neutral+Density */
            background: -moz-linear-gradient(right, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 100%) !important;; /* FF3.6-15 */
            background: -webkit-linear-gradient(right, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 100%) !important;; /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to left, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 100%) !important;; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#a6000000', endColorstr='#00000000', GradientType=1) !important;; /* IE6-9 */
        }

        .texto-imagen1 {
            text-transform: uppercase;
            color: #fff !important;
            font-size: 40px;
            font-weight: 300;
            font-family: 'Raleway', sans-serif;
            font-size: 4.286rem;
            font-weight: 700;
        }

        .texto-imagen2 { /*margin: 60px !important;*/ /*color: #000000 !important;*/
            color: #ffffff !important;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-family: 'Raleway', sans-serif;
            font-weight: 700; /*#ffffff 0.1em 0.1em 0.3em*/
        }

        .contenedor-img-sld {
            z-index: 99;
            position: absolute;
            width: 100%;
        }

        .oculto {
            display: none !important;
        }

        .contenedor-img-sld { /* border: 1px solid white; color: red; top: 50%; */
            z-index: 1;
            align-items: center;
            position: absolute; /* float: right!important; */
            width: 100%;
        }

        .texto-imagen1 {
            text-transform: uppercase;
            color: #fff !important;
            font-size: 40px;
            font-weight: 300;
        }

        .texto-shadow, .texto-shadow1 {
            text-shadow: #000 0.1em 0.1em 0.5em;
        }

        .slider-content.text-white p {
            color: #fff;
            margin-bottom: 34px;
            font-size: 18px;
        }

        .owl-item.active .b_faddown2 {
            -webkit-animation: fadeInDown 1000ms ease-in-out;
            -moz-animation: fadeInDown 1000ms ease-in-out;
            -ms-animation: fadeInDown 1000ms ease-in-out;
            animation: fadeInDown 1000ms ease-in-out;
        }

        .flecha {
            top: 45%;
            position: absolute;
            font-size: 30px;
            display: none;
        }

        .flecha-derecha {
            right: 1px;
        }

        .flecha-izquierda {
            left: 1px;
        }

        @media (max-width: 1023px) {
            #hello, .about-banner, .contact-banner, .videos, .fotos {
                background-attachment: unset;
                margin-top: 0;
                background-attachment: unset;
                margin-top: 80px;
                height: 200px;
            }

            .texto-imagen1 {
                font-size: 30px !important;

            }
        }

        .about-banner, .contact-banner, .videos, .fotos {
            height: 450px;
        }

        .home_text {
            margin-top: 0px;
        }

        @media (max-width: 425px) {
            /*xs*/
            .contenedor-img-sld { /*sin top*/
                margin-top: 0%;
            }

            .texto-imagen1 {
                font-size: 20px !important; /*font-weight: 300;*/
            }

            .texto-imagen2 { /*sin margen*/
                font-size: 20px; /*font-weight: 300;*/
            }

            .home_text {
                margin-top: 0px;
            }

            .about-banner, .contact-banner, .videos, .fotos {
                height: 200px;
            }

            .home_text {
                margin-top: 40px;
            }
        }

        @media (max-width: 767px) {
            .contenedor-img-sld { /*sin top*/
                margin-top: 16%;
            }

            .texto-imagen1 {
                font-size: 35px !important;; /*font-weight: 300;*/
            }

            .texto-imagen2 { /*sin margen*/
                font-size: 20px;
                display: none; /*font-weight: 300;*/
            }

            .home_text {
                margin-top: 100px;
            }

            .about-banner, .contact-banner, .videos, .fotos {
                height: 340px;
            }

            .home_text {
                margin-top: 0px;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            /*sm*/
            .contenedor-img-sld { /*sin top*/
                margin-top: 16%;
            }

            .contenedor-img-sld { /*sin top*/
                margin-top: 16%;
            }

            .texto-imagen1 {
                font-size: 38px !important; /*font-weight: 300;*/
            }

            .texto-imagen2 { /*sin margen*/
                font-size: 20px; /*font-weight: 300;*/
            }

            .about-banner, .contact-banner, .videos, .fotos {
                height: 0px;
            }

            .home_text {
                margin-top: 0px;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            /*sm*/
            .contenedor-img-sld { /*sin top*/
                margin-top: 19%;
            }

            .texto-imagen1 {
                font-size: 38px !important; /*font-weight: 300;*/
            }

            .texto-imagen2 { /*sin margen*/
                font-size: 20px;
                padding-top: 8px; /*font-weight: 300;*/
            }
        }

        @media (min-width: 1200px) {
            /*lg*/
            /*sm*/
            .m-h-435 {
                max-height: 503px !important;
            }

            .contenedor-img-sld { /*sin top*/
                margin-top: 23%;
            }

            .texto-imagen1 {
                font-size: 40px !important; /*font-weight: 300;*/
            }

            .texto-imagen2 { /*sin margen*/
                font-size: 20px;
                padding-top: 8px;
            }

            .owl-slide {
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            }
        }

        @if(!empty($colorcoorp))
        .coorp,
        .candidate-profile-picture a.btn-default:hover {
            border-color: {!! $colorcoorp !!};
            background-color: {!! $colorcoorp !!};
        }

        .cooprlink {
            color: {!! $colorcoorp !!}       !important;

        }

        .coorp {
            color: #fff;
        }

        #navbar-menu > ul > li > a:hover, #navbar-menu > ul > li:hover, .active > a, a, .main-gallery .button:hover, .active > a, .main-gallery .button.is-checked, h1 span, h2 span, h3 span, h4 span, h5 span, p span {
            color: {!! $colorcoorp !!};;
        }

        .nav li a:hover, .active > a {
            color: {!! $colorcoorp !!}          !important;
        }

        .separator_left, .separator_auto {
            background: {!! $colorcoorp !!};
        }

        .redes i, .object, .work_separator1:before, .work_separator2:before {
            background-color: {!! $colorcoorp !!}          !important;
        }

        .btn-default:hover {
            border-color: {!! $colorcoorp !!};
            background-color: {!! $colorcoorp !!};
        }

        .contact-button-link.show-hide-contact-bar:hover, .scrollup:hover {
            background: {!! $colorcoorp !!}          !important;
        }

        #loading {
            color: #fff;
        }

        .nav > li > a:hover {
        }

        @endif@if(!empty($stud->getFront())) @if(!empty($stud->getFront()->getUrl())) .foo-bg {
            background: url({!! $stud->getFront()->getUrl() !!}) center center no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-color: #fff;
        }

        @endif @endif
        .model_img {
            height: 270px;
        }

        .tam-img-270, .tam-img-270 > img {
            /*height: 100%;*/
            width: 100%;

        }

        /*
        .model_img{
            background-size: cover;
            background-position: center;
            transition: all 1s;
        }
        .model_img:hover{

            transition: all 1s;

            background-position: center;
            background-repeat: no-repeat;

        }
        */
        .model_item > .model_img > figure > img {

            -webkit-transform: scale(1.4);
            -moz-transform: scale(1.4);
            -o-transform: scale(1.4);
            -ms-transform: scale(1.4);
            transform: scale(1.4);
            transition: all 1s;
            min-width: 240px;
            min-height: 150px;
        }

        .model_item:hover > .model_img > figure > img {
            -webkit-transform: scale(1.5);
            -moz-transform: scale(1.5);
            -o-transform: scale(1.5);
            -ms-transform: scale(1.5);
            transform: scale(1.5);
            transition: all 1s;
            min-width: 240px;
            min-height: 150px;
        }

        .sold-n {
            z-index: 1;

        }

        .boxi {
            height: 270px;

        }

        .m-b-30 {
            margin-bottom: 30px;
        }

        @if($escritorio!=true)


        .texto-imagen1 {
            font-size: 30px !important
        }

        .about-banner {
            background-attachment: unset;
            margin-top: 100px;
        }

        .main_home {
            margin-top: 100px;
        }

        .principio {
            margin-top: 100px;
        }

        @endif

        .corte-600 {
            float: left;
            overflow: hidden;
            position: relative;
            height: 600px;
            /*margin-left: 10px;*/
            /*margin-bottom: 80px;*/
        }

        .corte-600 img {
            /*
            position: absolute;
            margin-left: -15px;
            transform: scale(1.5);
            */
            transition: all 1s;
            -webkit-transition: all 1s;
            -moz-transition: all 1s;
            -o-transition: all 1s;
        }

        @media (max-width: 426px) {
            .corte-600 {
                top: -20px;
                max-height: 250px;
                height: 100%;

            }
        }

        @media (min-width: 427px) and (max-width: 770px) {

            .corte-600 {
                top: -20px;
                max-height: 400px;
                height: 100%;

            }
        }

        @media (min-width: 771px) {

            .corte-600 {
                max-height: 600px;
                height: 100%;

            }
        }

        #contact-buttons-bar {
            top: 300px;
        }

        .btn-theme {
            margin-top: 10px;
        }

        .modal-backdrop {
            z-index: 50;
        }

        /*
        body.modal-open  > div:nth-child(2){

        }
        */
        .tooltip {
            font: normal 16px "Raleway", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-weight: 300;
            overflow-x: hidden;
            line-height: 1.5;
            color: #444 !important;
        }
        {{--INICIO--}} @if(empty($stud)) </style> @endif@endif
