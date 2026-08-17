<?php $cd = null; ?> @if(!empty($cd))
    <style> @endif @php $f[0]=url('landing/images/slider/1/2.jpg'); $f[1]=url('landing/images/slider/1/6.jpg'); $f[2]=url('landing/images/slider/1/9.jpg'); $f[3]=url('landing/images/slider/1/8.jpg'); $imagen = $f[rand(0,3)]; @endphp .category-grid-box-1 .image {
            height: 220px;
        }

        .h-50 {
            max-height: 50px;
        }

        .h-313-234 {
            max-height: 234px !important;
            max-width: 313px !important;
        }

        .m-w-313 {
            min-width: 313px !important;
            margin-left: 22px !important;
        }

        .h-50 {
            max-height: 50px;
        }

        .h-313-234 {
            max-height: 234px !important;
            max-width: 313px !important;
        }

        .m-w-313 {
            min-width: 313px !important;
            margin-left: 22px !important;
        }

        /*Menu*/
        .corte {
            overflow: hidden; /*white-space: nowrap;*/
            text-overflow: ellipsis;
            height: 40px;
        }

        .corte-dow {
            position: absolute;
            bottom: -224px;
            left: 0px;
        }

        .page-header-area {
            padding-top: 190px !important;
        }

        .menu-list-items {
            background: rgb(255, 255, 255) !important;
        }

        .transparent-header .mega-menu > section.menu-list-items .menu-links > li > a {
            color: black !important;
        }

        /*Menu*/
        .mega-menu .menu-logo > li > a img {
            width: 90% !important;
            margin-top: 25px !important;;
        }

        .footer-area {
            background: rgba(0, 0, 0, 0) url({!! $imagen !!}) no-repeat scroll center top/ cover;
        }

        .page-header-area::before { /*background: rgba(36, 40, 47, 0.5);*/
            background: transparent;
        }

        .logo-foot { /*background-color: white;*/
        }

        .consulta {
            color: #a0a0a0;
            font-size: 14px;
            font-weight: 400;
        }

        <?php $imagen = 'http://horsesworldsale.com/landing/images/slider/1/9.jpg'; ?> .page-header-area {
            background: rgba(0, 0, 0, 0) url({!! $imagen !!}) no-repeat scroll center top/ cover;
        }

        .btn-print, .fa.fa-print {
            color: #612726;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            -ms-transition: all 0.5s;
            -o-transition: all 0.5s;
            transition: all 0.5s;
        }

        .fa.fa-print:hover, .btn-print:hover {
            color: #612726;
            margin-top: -10px;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            -ms-transition: all 0.5s;
            -o-transition: all 0.5s;
            transition: all 0.5s;
        }

         .mega-menu .menu-search-bar {
             margin-top: 15px;
         }

        .btnpub, .logom {
            margin-top: 10px;
        }

        @media (max-width: 321px) {
            ul.menu-logo > li > a > img {
                width: 248px !important;

            }

            .banner-dd {
                width: 248px !important;
            }

            .mega-menu .menu-mobile-collapse-trigger {
                {{-- Ocultamos el menu --}}
display: none;
            }
        }

        @media (max-width: 321px) {
            .menu-mobile-collapse-trigger {
                {{-- Ocultamos el menu --}}
display: none !important;
            }

            ul.menu-logo > li > a > img {
                width: 230px !important;

            }

            .logom {
                /*
                height: 27px!important;
                width: auto !important;
                */
                max-width: 220px !important;
                height: auto;
            }
        }

        @media (min-width: 322px) {
            .logom {
            {{--width: 96% !important;;
                    margin-top: 25px !important;
                    max-width: 220px !important;
                    height: auto;--}}




}

            .menu-mobile-collapse-trigger {
                {{-- Ocultamos el menu --}}
display: none !important;
            }

        }

        .advertising .banner .submit {
            width: 35%;
        }
        .tooltip{
            display:inline-block;

        }
        .spcu{
            font-family: 'Source Sans Pro',sans-serif;
            color: #777;
            font-size: 16px;
            line-height: 1.7em;
            font-weight: 400;
        }
    @if(!empty($cd)) </style> @endif {{--Borrar el 15/01/2018--}}
