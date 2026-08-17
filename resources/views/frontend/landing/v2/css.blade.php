@if(!empty($stud)) @php($colorcoorp = $stud->getColor()) @if(empty($stud))
    <style> @endif {{--INICIO--}} @php $d7 = url('theme/w/img/hyc-1.jpg'); $sliders = $stud->getSliders(); $tmp = count($sliders); @endphp @if(!empty(Photo::Slider($stud->id)->first())) {{-- @if(count($sliders)>1)--}} @php($d5 = $sliders[rand(0,count($sliders)-1)]->getUrl()) @php($d6 = $sliders[rand(0,count($sliders)-1)]->getUrl()) @else @php $d = []; $d[0] = url('landing/images/slider/1/2.jpg'); $d[1] = url('landing/images/slider/1/6.jpg'); $d[2] = url('landing/images/slider/1/9.jpg'); $d[3] = url('landing/images/slider/1/8.jpg'); $d5 = $d[rand(0,3)]; $d6 = $d[rand(0,3)]; @endphp @endif #parallax .slick-list {
            top: 80px
        }

        @include('assets.css.lotes')
 /* [data-animation-in] { opacity: 0; } */
        #parallax .slick-list .hola1 {
            position: absolute;
            left: 50%; /*top: 50%;*/
        }

        #gallery img:hover {
            transform: scale(1.8);
        }

        .btn-print,
        .fa.fa-envelope,
        .fa.fa-print {
            color: #612726;
            margin-top: -5px;
            font-size: 20px;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            -ms-transition: all 0.5s;
            -o-transition: all 0.5s;
            transition: all 0.5s;
        }

        .fa.fa-print:hover,
        .fa.fa-envelope:hover,
        .btn-print:hover {
            color: #612726;
            margin-top: -10px;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            -ms-transition: all 0.5s;
            -o-transition: all 0.5s;
            transition: all 0.5s;
        }

        .fa.fa-envelope, .fa.fa-envelope:hover {
            color: #444 !important;
            margin-top: 5px;
        }

        .fa.fa-envelope:hover {
            margin-top: -1px;
        }
        .corte {
            float: left;
            overflow: hidden;
            position: relative;
            height: 160px;
            margin-left: 10px;
        }

        .corte img {
            position: absolute;
            margin-left: -15px;
            transform: scale(1.5);
            transition: all 1s;
            -webkit-transition: all 1s;
            -moz-transition: all 1s;
            -o-transition: all 1s;
        }

        .slick-arrow {
            z-index: 55;
        }

        .carousel-inner .slick-arrow, .gal-videos .slick-arrow {
            top: 37%;

        }

        .corte-240 {
            height: 240px;
        }

        .corte-440 {
            height: 440px;
        }

        .corte-440 figure {
            margin: 0 auto;
            display: inline;
        }

        .corte-440 img { /*height: 100%;*/
            transform: scale(1);
            margin: 0 auto;
            display: inline;
            position: inherit;
        }

        .center-image {
            float: left;
            overflow: hidden;
            position: relative;
        }

        .center-image figure {
            margin: 0 auto;
            display: inline;
        }

        .center-image img {
            height: 100%;
            transform: scale(1);
            margin: 0 auto;
            display: inline;
            position: inherit;
        }

        #about .wrapsection {
            padding-top: 70px !important;
        }

        #gallery .slick-prev:before, #gallery .slick-next:before {
            color: #fff !important;
        }

        .hand {
            cursor: pointer;
        }

        .main-gallery .description {
            margin-left: 10px;
        }

        #parallax {
            {{-- width: 100%; top: 0; position: relative; background-position: center center; background-repeat: no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; z-index: -100; --}}    margin-top: unset !important;
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
            margin-left: 50px;
            text-align: center;
        }

        .texto-imagen2 { /*margin: 60px !important;*/ /*color: #000000 !important;*/
            color: #ffffff !important;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-family: 'Raleway', sans-serif;
            font-weight: 700; /*#ffffff 0.1em 0.1em 0.3em*/
            margin-left: 50px;
            text-align: center;
        }

        .contenedor-img-sld {
            z-index: 99;
            position: absolute;
            width: 100%;
        }

        .bg5 {
            {{--background-image: url({!! url('theme/w/img/parallax-bg1.jpg')!!});--}}    background-image: url({!! url('landing/images/slider/1/4.jpg') !!});
        }

        .bg6 {
            {{--background-image: url({!! url('theme/w/img/cabecera-0.jpg')!!});--}}    background-image: url({!! $d5 !!});
        {{--background-image: url({!! $d6 !!});--}}

        }

        .bg7 {
            background-image: url({!! $d7 !!});
        }

        .texto-shadow, .texto-shadow1 {
            text-shadow: #000 0.1em 0.1em 0.5em;
        }

        .navbar-brand > img {
            max-width: 140px;
        {{--border: 1px solid black;--}} {{--margin-top: -40px;--}}

        }

        .hola1 {
            color: white;
            top: 280px;
            position: sticky;
            margin-bottom: 0px;
            margin-top: 0px;
            float: left;
            left: 50%;
            text-align: center;
        }

        .slick-prev {
            left: -35px
        }

        .slick-next {
            right: -25px
        }

        .slick-prev:before, .slick-next:before {
            font-size: 50px;
        }

        {{-- .slick-next:before { content: '▶' !important; } .slick-prev:before { content: '<' !important; } --}} .hola1 {
            top: 0px;
        }

        {{-- @media (max-width: 1023px) { .hola1 { background-attachment: unset; margin-top: 0; background-attachment: unset; margin-top: 80px; height: 200px; } } --}} .carousel-inner > .slick-list {
            margin-right: 50px;
            margin-left: 50px;
        }

        .carousel-inner > .slick-prev {
            left: 5px;
        }

        .carousel-inner > .slick-next {
            right: 32px;
        }

        .figure-fix {
            height: 120px;
            width: 360px;
            background: #fff;
            display: table-cell;
            text-align: center;
            vertical-align: middle;
        }

        .figure-fix > img { /* max-height: 270px; max-width: 262px; height: auto; width: 262px; */
            margin: 0 auto;
        }

        .figure-fix2 {
            width: auto;
            height: 90px;
        }

        figure.figure-fix2 > img {
            top: 0px;
            position: absolute;
            min-width: 90px;
            width: auto;
            min-height: 85px;
        }

        .figure-fixed3 {
            height: 150px;
        }

        figure.figure-fixed3 > img {
            position: absolute;
            min-width: 90px;
            min-height: 85px;
            left: 50%;
            top: 50%;
            height: 100%;
            width: auto;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        span.fa-youtube-play {
            position: absolute;
            top: 35%;
            left: 47%;
            font-size: 50px;
            color: red;
            text-shadow: #3e3838 0.1em 0.1em 0.5em;
        }

        figure.figure-fix > img {
            -webkit-transform: scale(1.4);
            -moz-transform: scale(1.4);
            -o-transform: scale(1.4);
            -ms-transform: scale(1.4);
            transform: scale(1.4);
            transition: all 1s;
            min-width: 240px;
            min-height: 150px;
        }

        .modal-body {
            background-color: #ffffff;
            border-radius: 0px 0px 5px 5px;
        }

        figure.figure-fix > img {
            -webkit-transform: scale(1.5);
            -moz-transform: scale(1.5);
            -o-transform: scale(1.5);
            -ms-transform: scale(1.5);
            transform: scale(1.5);
            transition: all 1s;
            min-width: 240px;
            min-height: 150px;
        }

        /************************/ /* ---- isotope ---- */
        #fotos .grid {
            margin: 0;
            padding: 0;
        }

        /* clear fix */
        #fotos .grid:after {
            content: '';
            display: block;
            clear: both;
        }

        /* ---- .grids-item ---- */
        #fotos .grids-item {
            position: relative;
            margin: 5px;
            width: 220px;
            overflow: hidden;
        }

        #fotos .grids-item img {
            width: 100%;
            height: 100%;
            height: auto;
            transition: all 0.6s;
        }

        #fotos .grids-item:hover img {
            transform: scale(1.1);
        }

        #fotos .grids-item:hover .grid_hover_area {
            opacity: 1;
        }

        #fotos .grid_hover_area {
            background-color: rgba(7, 8, 10, 0.50);
            height: 100%;
            opacity: 0;
            position: absolute;
            text-align: center;
            top: 0%;
            left: 0%;
            width: 100%;
            transition: opacity .3s ease-in-out;
            -webkit-transition: opacity .3s ease-in-out;
            -moz-transition: opacity .3s ease-in-out;
            -o-transition: opacity .3s ease-in-out;
        }

        #fotos .grid_hover_area .btn {
            padding: 0.5rem 1rem;
        }

        #fotos .grid_hover_text a {
            display: block;
        }

        @media (max-width: 768px) {
            #fotos .grids-item {
                position: relative;
                margin: 5px;
                width: 290px;
                overflow: hidden;
            }
        }

        @media (max-width: 425px) {
            .corte {
                height: 200px;
            }

            .corte-440 {
                height: 240px;
            }

            #fotos .grids-item {
                position: relative;
                margin: 5px;
                width: 300px;
                overflow: hidden;
            }
        }

        /************************/
        .wrapsection {
            padding-top: 70px;
            padding-bottom: 70px;
        }

        .bg-w {
            background-color: #ffffff;
        }

        .m-l-10 {
            margin-left: 10px;
        }

        .p-r-8 {
            padding-right: 8px;
        }

        .m-t-70 {
            margin-top: 70px;
        }

        .p-t-70 {
            padding-top: 70px;
        }

        .p-b-70 {
            padding-bottom: 70px;
        }

        .p-b-20 {
            padding-bottom: 20px;
        }

        .img-caballo {
            max-width: 300px;
            max-height: 300px;
            border-radius: 150px;
        }

        .p-b-50 {
            padding-bottom: 50px;
        }

        .btn-fb {
            background: #3b5998 none repeat scroll 0 0;
            color: #fff;
        }

        .btn-twitter {
            background: #00aced none repeat scroll 0 0;
            color: #fff;
        }

        .btn-gplus {
            background: #d14433 none repeat scroll 0 0;
            color: #fff;
            padding-right: 5px;
        }

        .btn-pinterest {
            background: #bd081c none repeat scroll 0 0;
            color: #fff;
        }

        #gallery a img {
            margin-bottom: 0px;
            display: block;
            width: 100%;
            max-width: 100%;
            max-height: 1024px;
        }

        #gallery .description {
            background-color: #fff;
            display: block;
            padding: 15px 15px;
            color: #333; /* text-transform: uppercase; */
            clear: both; /*position: absolute;*/
            top: 50%;
            min-height: 60px;
            width: 100%;
        }

        .bgt {
            background-color: transparent !important;
            background: transparent;

        }

        .bgs {
            background-size: 2500px;
        }

        .media_img {
            height: 240px;
            background: white;
        }

        div.candidate-profile-picture > a,
        .savest,
        .upload-img-field .btn,
            /*#contact input#submit {*/
        .btn-special-black {
            padding-top: 10px;
            -webkit-appearance: button;
            cursor: pointer;
            width: auto;
            /* margin-top: 20px; */
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0;
            color: #fff !important;
            /* padding: 0px 20px; */
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 3px;
            /*font-size: 14px;*/
            /*height: 40px;*/
            margin-bottom: 0px;
            padding-bottom: 5px;
            border: 0;
            margin-left: 2px;

            color: #ffffff;
        }

        .m-top-10 {
            margin-top: 10px;
        }

        .m-top-20 {
            margin-top: 20px;
        }

        .m-top-30 {
            margin-top: 30px;
        }

        .m-top-40 {
            margin-top: 40px;
        }

        .m-top-50 {
            margin-top: 50px;
        }

        .m-top-60 {
            margin-top: 60px;
        }

        .m-top-70 {
            margin-top: 70px;
        }

        #header > div > nav > ul > li:nth-child(1) > div > button:hover, #header > div > nav > ul > li:nth-child(1) > div > button {
            background-color: #fff;
            border-color: #FFF;
        }

        .candidate-general-info ul.candidate-registration li input {
            margin: 0;
            color: #666;
            display: block;
            padding: 9px 15px;
            width: 100%;
            height: 100%;
            border: 1px solid #ccc;
            -webkit-border-radius: 3px;
            border-radius: 0;
            background-image: none;
            color: inherit;
            vertical-align: middle;
            font-size: 14px;
            line-height: 20px;
            font-weight: 600;
            -webkit-transition: all 0.25s ease-out;
            -moz-transition: all 0.25s ease-out;
            -o-transition: all 0.25s ease-out;
            transition: all 0.25s ease-out;
        }

        .main-gallery .grid-item:hover img {
            transform: scale(1.8);
        }

        .figure-fix {
            height: 120px !important;
            background: #fff;
            display: table-cell;
            text-align: center;
            vertical-align: middle;
            margin: 0 auto; /* height: 100%; */ /*width: 100%;*/
        }

        .link {
            text-shadow: #000 1px 1px 1px;
        }

        #SocialShare {
            position: sticky;
            float: right;
            right: 0px;
            background: #fff;
            padding-left: 10px;
            padding-right: 15px;
            top: 40%;
            z-index: 3;
            width: 50px;
        }

        @if(!empty($colorcoorp)) .separator_auto {
            background: {!! $colorcoorp !!};
        }

        .nav .caret, .nav a:hover .caret {
            border-top-color: {!! $colorcoorp !!};
            border-bottom-color: {!! $colorcoorp !!};
        }

        .btn-special, .btn-special:hover, a, a:hover, .navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus, .navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {
            color: {!! $colorcoorp !!};
        }

        .btn-default, .btn-special {
            padding: 10px;
            border: 1px solid{!! $colorcoorp !!};
            background-color: #ffffff;
            color: {!! $colorcoorp !!};
            border-radius: 40px;
            transition: 1s all;
        }

        .btn-default:hover, .btn-special:hover {
            padding: 10px;
            background-color: {!! $colorcoorp !!};
            color: #ffffff;
            border: 1px solid #ffffff;
            border-radius: 40px;
            transition: 1s all;
        }

        @endif @if(!empty($stud->getFront())) @if(!empty($stud->getFront()->getUrl())) @endif @endif .hola1 {
            top: 280px;
        }

        @media (max-width: 425px) {
            /*xs*/
            .hola1 {
                top: 100px;
            }

            .contenedor-img-sld { /*sin top*/
                margin-top: 0%;
            }

            .texto-imagen1 {
                font-size: 20px; /*font-weight: 300;*/
            }

            .texto-imagen2 { /*sin margen*/
                font-size: 20px; /*font-weight: 300;*/
            }
        }

        @media (max-width: 767px) {
            .hola1 {
                top: 280px;
            }

            .contenedor-img-sld { /*sin top*/
                margin-top: 16%;
            }

            .texto-imagen1 {
                font-size: 35px; /*font-weight: 300;*/
            }

            .texto-imagen2 { /*sin margen*/
                font-size: 20px;
                display: none; /*font-weight: 300;*/
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

        @media (max-width: 426px) {
            #SocialShare {
                top: unset;
                width: auto;
                z-index: 5;
                bottom: 1px;
                position: fixed;
                right: unset;;
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

        @media (max-width: 767px) {
            .hola1 {
                top: 280px;
            }
        }

        @media (max-width: 425px) {
            .hola1 {
                top: 100px;
            }
        }

        .slick-prev:before, .slick-next:before {
            font-family: 'FontAwesome';
        }

        .slick-prev:before {
            content: '\f053';
        }

        .slick-next:before {
            content: '\f054';
        }

        .p-t-10 {
            padding-top: 10px !important;
        }

        .p-s-10 {
            padding-left: 10px;
            padding-right: 10px;
        }

        .bandera > span.flag {
            margin-top: 3px;
        }

        #logo {
            max-width: 140px;
            max-height: 140px;

        }
        .bandera > span.caret {
            margin-top: -4px;
        }

        .maintitle .lead {

            min-height: 70px;
        }

        #hero {
            margin-top: 110px;
        }

        /* scrollup */

        .scrollup {
            width: 30px;
            height: 30px;
            border-radius: 15px;
            opacity: .3;
            position: fixed;
            bottom: 20px;
            right: 25px;
            color: #fff;
            cursor: pointer;
            background-color: #000;
            z-index: 1000;
            transition: opacity .5s, background-color .5s;
            -moz-transition: opacity .5s, background-color .5s;
            -webkit-transition: opacity .5s, background-color .5s;
        }

        .scrollup:hover {
            @if(!empty($colorcoorp))

             background: {!! $colorcoorp !!};
            @else
             background: #ee997b;
            @endif
             opacity: 1;
        }

        .scrollup i {
            font-size: 13px;
            position: absolute;
            opacity: 1;
            color: #fff;
            left: 50%;
            top: 50%;
            margin-top: -7px;
            margin-left: -6px;
            text-decoration: none;

        }

        .scrollup.active-section {
            top: unset !important;
        }

        .tooltip {
            font: normal 16px "Raleway", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-weight: 300;
            overflow-x: hidden;
            line-height: 1.5;
            color: #444 !important;
        }

        {{--INICIO--}} @if(empty($stud)) </style> @endif @endif