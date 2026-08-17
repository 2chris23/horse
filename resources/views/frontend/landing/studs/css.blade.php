@if(!empty($stud))
    @php($colorcoorp = $stud->getColor())
    @if(empty($stud))
        <style>
            @endif
            .btn-print,
            .fa.fa-print {
                background: #612726;
            }

            .btn-print,
            .fa.fa-print,
            .btn-print:focus,
            .fa.fa-print:focus,
            .btn-print:hover,
            .fa.fa-print:hover {
                color: #333333 !important;
                background: transparent;
                font-size: 20px !important;
            }

            .iconos > i.fa-facebook {
                padding-left: 7px;
                padding-right: 7px;

            }

            .arena::after { /*background: url(http://horsesworldsale.com/landing/images/slider/1/9.jpg) repeat center center fixed;*/ /*background: url(http://horsesworldsale.com/landing/images/slider/1/10.jpg) repeat center center fixed;*/
                background: url({!! url('landing/images/slider/1/12.jpg') !!}) repeat center center fixed; /*background: url(http://horsesworldsale.com/landing/images/slider/1/5.png) repeat center center fixed;*/
            }

            |
            footer {
                padding: 0;

            }

            .flotanteRedes .iconos {
                background-image: url({!! url('/css/iconos_redes.png') !!});
            }

            /*







            {{-- zoom in--}}         .img-sd { display: block; margin-left: auto; margin-right: auto; width: 100%; transform: scale(1); -ms-transform: scale(1); -moz-transform: scale(1); -webkit-transform: scale(1); -o-transform: scale(1); -webkit-transition: all 500ms ease-in-out; -moz-transition: all 500ms ease-in-out; -ms-transition: all 500ms ease-in-out; -o-transition: all 500ms ease-in-out; } .img-sd:hover { transform: scale(0.8); -ms-transform: scale(0.8); -moz-transform: scale(0.8); -webkit-transform: scale(0.8); -o-transform: scale(0.8); -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px; } */
            {{-- REDES SOCIALES TEMP --}}         /* .widget:hover > div > a > i.fa-facebook, .facebook:hover, a > .fa-facebook:hover, .iconos > .fa.fa-facebook-square:hover, a > .fa-facebook-square:hover, .fa-facebook-square:hover { color: #4267b2 !important; } .widget:hover > div > a > i.fa-twitter, .twitter:hover, a > .fa-twitter:hover, .iconos > .fa.fa-twitter:hover, a > .fa-twitter:hover, .fa-twitter:hover { color: #2daae2 !important } .widget:hover > div > a > i.fa-youtube, .youtube:hover, a > .fa-youtube:hover, .iconos > .fa.fa-youtube:hover, a > .fa-youtube:hover, .fa-youtube:hover { color: #ff0000 !important } */
            {{-- REDES SOCIALES TEMP --}} {{-- .navigation > .container { width: 97%; margin-left: 2%; margin-right: 2%; } --}}
        @if(!empty($colorcoorp))

        .btn-theme, .btn-light {
                color: #ffffff;
                background-color: {!! $colorcoorp !!};
                border-color: {!! $colorcoorp !!};
            }

            .btn-theme:hover, .btn-theme:focus, .btn-theme:active, .btn-theme.active, .open .dropdown-toggle.btn-theme, .btn-orange:hover {
                color: #ffffff;
                background-color: #d3d3d3;
                border-color: #d3d3d3;
            }

            .btn-print,
            .fa.fa-print,
            .btn-print:focus,
            .fa.fa-print:focus,
            .btn-print:hover,
            .fa.fa-print:hover {
                color: #333333 !important;
                background: transparent;
                font-size: 20px !important;
            }

            .slider-active .owl-dots .owl-dot.active span, .slider-active .owl-dots .owl-dot:hover span, a#scrollUp, .btn.btn-solid {
                background-color: {!! $colorcoorp !!};
            }

            .text-small {
                font-size: 12px;
            }

            .slide-thumbnail .flex-active-slide img {
                border-color: {!! $colorcoorp !!}         !important;
            }

            #scrollUp {
                border-radius: 5px;
            }

            .owl-carousel .owl-controls .owl-nav .owl-prev, .owl-carousel .owl-controls .owl-nav .owl-next, .owl-carousel .owl-controls .owl-dot {
                color: {!! $colorcoorp !!};
            }

            .pagination li a.active, .pagination li span.active {
                color: {!! $colorcoorp !!};
            }

            .pagination li a:hover {
                color: {!! $colorcoorp !!};
            }

            .contact-page-wrapper .widget:hover i {
                color: #a5a5a5 !important;
                transform: scale(1.2);
            }

            .navigation .menu-wrap .menu > li a:hover, .navigation .menu-wrap .menu > li span:hover {
                color: {!! $colorcoorp !!};
            }

            .contact-page-wrapper .widget i {
                color: {!! $colorcoorp !!}         !important;
            }

            .navigation .menu-wrap .menu > li .submenu li a:hover, .navigation .menu-wrap .menu > li.active a, .navigation .menu-wrap .menu > li.active span, .contact-page-wrapper .widget:hover i, footer .footer-bar h5 i, footer .footer-bar h5 a { /*color: #01889a;*/
                color: {!! $colorcoorp !!};
            }

            .navigation .menu-wrap .menu > li .submenu {
                border-top: 2px solid{!! $colorcoorp !!};
            }

            h1 {
                color: {!! $colorcoorp !!}         !important;
            }

            ul.list li:before {
                color: {!! $colorcoorp !!};
            }

            .f-coorp {
                color: {!! $colorcoorp !!}         !important;
            }

            ul.list li:hover {
                color: #a5a5a5 !important; /*transform: scale(1.2);*/
            }

            .mean-container a.meanmenu-reveal, a.coorp {
                color: {!! $colorcoorp !!}         !important;
            }

            .content-box .info-block h4 a:hover {
                color: {!! $colorcoorp !!}         !important;
            }

            /*header*/
            .owl-nextf, .owl-prevf {
                color: {!! $colorcoorp !!};
            }

            .mean-container .mean-nav ul li a:hover {
                color: {!! $colorcoorp !!}         !important;
            }

            .mean-container a.meanmenu-reveal span {
                background: {!! $colorcoorp !!} none repeat scroll 0 0;
            }

            .social-media > a > .fa, .iconos > .fa {
                color: {!! $colorcoorp !!};
            }

            .sep-inside {
                background: {!! $colorcoorp !!}         !important;
            }

            {{-- borrable --}} .social-media > a > .fa, .iconos > .fa {
                background-color: {!! $colorcoorp !!}         !important;
            }

            {{-- borrable --}} {{-- borrable --}} .social-media > a > .fa, .iconos > .fa {
                background-color: {!! $colorcoorp !!}         !important;
                color: #fff !important;
            }

            .link {
                color: {!! $stud->getColor() !!}



            }

            @endif

            @if($stud->getFooter() == 1)
                footer {
                margin-top: 0px !important;
                /*box-shadow: 0 0 8px 0 rgba(0,0,0,0.12);*/
            }

            .footer-bar {
                margin-top: 0px !important;
                /*e8e8e88f*/
                /*    box-shadow: 0 0 8px 0 rgba(0,0,0,0.12);*/

            }

            .raya {
                border-left: 1px solid #7e8082;
                page-break-inside: avoid;
                padding-top: 10px;
                padding-left: 10px;
                margin-bottom: 20px;
                min-height: 90px;
            }

            .ic {
                position: absolute;
                font-size: 32px !important;
            }

            a {
                text-decoration: none;
                color: black;
            }

            a:hover {
                text-decoration: none;
                color: #757171;
            }

            i {
                /*color: #757171;*/
            }

            .titulo1 {
                font-size: 15px;
                font-weight: 500;
            }

            .raya > span {
                color: #7e8082;
            }

            .newfoot {
                margin-top: 20px;
            }

            .newfoot > .container-fluid {
                background-color: #e8e8e88f;
                height: 25%;
            }

            .newfoot > .container-fluid > .row {
                padding-top: 25px;
                padding-bottom: 10px;
                padding-left: 10%;
                padding-right: 10%;
            }

            {{--
            @media(max-width: 320px){
                .newfoot{
                    width: 320px;
                }
            }
            --}}
.btn-contact, .btn-contact:hover, .btn-contact:focus {
                -moz-border-bottom-colors: none;
                -moz-border-left-colors: none;
                -moz-border-right-colors: none;
                -moz-border-top-colors: none;
                border-color: -moz-use-text-color -moz-use-text-color #ccc;
                border-image: none;
                border-radius: 0;
                border-style: none none solid;
                border-width: medium medium 1px;
                color: #232323;
                font-size: 20px;
                height: 90px;
                padding-left: 10px;
                padding-right: 10px;
                text-align: left;
                font-size: 18px;
                text-transform: capitalize;
            }

            @endif

                #maps {
                height: 100%;

                min-height: 300px !important;;
                min-width: 300px !important;;
                /*position: initial !important;*/
                height: 100%;
                min-height: 300px !important;
                min-width: 300px !important;
                position: initial !important;
                height: 300px;
                overflow: hidden;
            }

            #maps > div:nth-child(1) {
                overflow: hidden;
            }

            .volver:hover, .volver:focus, .volver:active,
            .btn-contact, .btn-contact:hover, .btn-contact:focus {
                /*.btn-contact, .btn-contact:hover, .btn-contact:focus {*/
                padding-left: 80px !important;

            }

            .p-l-10:focus,
            .p-l-10:hover,
            .p-l-10 {
                padding-left: 10px !important;
            }

            .tooltip {
                display: inherit;
                z-index: 1;
            }

            .tooltipster-fade.tooltipster-show {
                margin-top: -75px;
            }
            @if(empty($stud)) </style>
    @endif
@endif
