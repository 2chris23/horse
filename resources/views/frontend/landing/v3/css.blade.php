@if(!empty($stud))
    @php($colorcorp = $stud->getColor())
    @if(empty($stud))
        <style>
            @endif

            {{--INICIO--}}
                {!! '@charset "UTF-8";' !!}
               /* CSS Document */

            html, body, div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, abbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp, small, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, figcaption, figure, footer, header, hgroup, menu, nav, section, summary, time, mark, audio, video {
                margin: 0;
                padding: 0;
                border: 0;
                outline: 0;
                font-size: 100%;
                vertical-align: baseline;
                background: transparent
            }

            body {
                line-height: 1
            }

            article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section, div, a {
                display: block
            }

            nav ul {
                list-style: none
            }

            blockquote, q {
                quotes: none
            }

            blockquote:before, blockquote:after, q:before, q:after {
                content: none
            }

            a {
                margin: 0;
                padding: 0;
                font-size: 100%;
                vertical-align: baseline;
                background: transparent;
                color: inherit;
                text-decoration: inherit
            }

            ins {
                background-color: #ff9;
                color: #000;
                text-decoration: none
            }

            mark {
                background-color: #ff9;
                color: #000;
                font-style: italic;
                font-weight: bold
            }

            del {
                text-decoration: line-through
            }

            abbr[title], dfn[title] {
                border-bottom: 1px dotted;
                cursor: help
            }

            table {
                border-collapse: collapse;
                border-spacing: 0
            }

            hr {
                display: block;
                height: 1px;
                border: 0;
                border-top: 1px solid #ccc;
                margin: 1em 0;
                padding: 0
            }

            input, select {
                vertical-align: middle
            }

            html, body, a {
                height: 100%;
            }

            *:focus {
                outline: none;
            }

            .clear {
                clear: both;
            }

            .left {
                float: left;
            }

            .right {
                float: right;
            }

            body {
                border-top: 4px solid{!! $colorcorp !!};
                background-image: url({{ url('theme/b/img/bg.jpg') }});
                background-repeat: repeat;
                font-family: 'Enriqueta', serif;
                font-size: 16px;
            }

            @if(!empty($stud->getFront()))
                @if(!empty($stud->getFront()->getUrl()))
                .bg-body {
                background-image: url({!! $stud->getFront()->getUrl() !!});
                background-attachment: fixed;
            }

            @endif
            @endif

            .slide {
                position: relative;
                margin: 0 auto;
                z-index: -1;
                text-align: center;
            }

            .slide li img {
                max-width: 100%;
                height: auto;
            }

            .slide .logo {
                position: absolute;
                left: 50%;
                top: 19%;
                margin-left: -143px;
                width: 286px;
            }

            .slider_overlay {
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                /*background:rgba(0, 0, 0, .6);*/
                width: 100%;
                top: 0;
                left: 0;
            }

            .slider {
                padding: 0;
                margin: 0;
            }

            .contenedor {
                margin-top: -135px;
                background-image: url({{ url('theme/b/img/bg.jpg') }});
                background-repeat: repeat;
                position: relative;
                z-index: 10;
                box-shadow: 6px 0 15px -4px rgba(0, 0, 0, 0.3), -6px 0 8px -4px rgba(0, 0, 0, 0.3);

            }

            .contenedor .menu {
                height: 80px;
                background-image: url({{ url('theme/b/img/bgMenu.jpg') }});
                color: #FFF;
                font-size: 13px;
            }

            .menubar {
                height: 80px;
                font-size: 1em;
            }

            .bars, .bars:focus {
                outline-color: transparent;
                background: transparent;
            }

            .contenedor .menu .seccion {
                border-right: 1px solid #000;
                border-left: 1px solid rgba(255, 255, 255, 0.2);
                height: 100%;
                overflow: hidden;
                text-align: center;
                position: relative;
                text-transform: uppercase;
                line-height: 80px;
            }

            /*

                        .contenedor .menu .seccion:first-child {
                            border-left: none;
                        }

                        .contenedor .menu .seccion:last-child {
                            border-right: none;
                        }
            */

            .contenedor .menu .seccion a {
                display: block;
                height: 100%;

            }

            .franjaRoja {
                width: 100%;
                height: 4px;
                background-color: {!! $colorcorp !!};
                margin-top: 90px;
            }

            /* - Home - */

            .home {
                width: 1000px;
                margin: 0 auto;
            }

            .home .eslogan {
                text-align: center;
                margin: 40px 0 40px 0;
                font: 50px/48px Times, "Times New Roman", serif;
                font-style: italic;
                color: #514d43;
            }

            .home .eslogan .peque {
                font-size: 36px;
            }

            .home .separacion {
                background-image: url({{ url('theme/b/img/separacion.png') }});
                width: 100%;
                background-repeat: repeat;
                height: 2px;
                margin-bottom: 45px;
            }

            .home .bienvenidos {
                width: 280px;
                color: #514d43;
                margin-right: 58px;
                float: left;
            }

            .home .bienvenidos .titulo {
                font-size: 20px;
                line-height: 24px;
                text-transform: uppercase;
            }

            .home .bienvenidos .img img {
                width: 100%;
                height: auto;
            }

            .home .bienvenidos .texto {
                margin-top: 32px;
                font-size: 16px;
                line-height: 18px;
            }

            .home .excursiones {
                width: 300px;
                margin-right: 50px;
                float: left;
            }

            .home .excursiones .titulo {
                font-size: 30px;
                color: #62a516;
                margin-bottom: 22px;
            }

            .home .excursiones .excursion {
                margin-bottom: 20px;
                color: #514d43;

            }

            .home .excursiones .excursion .cajaExcursion {
                overflow: hidden;
                position: relative;
                padding-bottom: 10px;
            }

            .home .excursiones .excursion .dia {
                float: left;
                border-right: 2px solid #62a516;
            }

            .home .excursiones .excursion .dia .numero {
                font-size: 50px;
            }

            .home .excursiones .excursion .dia .mes {
                text-transform: uppercase;
            }

            .home .excursiones .excursion .texto {
                float: left;
                font-size: 14px;
                padding: 0px 0 0px 10px;
                max-width: 180px;

                position: relative;
                z-index: 10;

            }

            .home .more {
                text-align: right;
                text-transform: uppercase;
                color: #da0008;
                font-size: 11px;
                font-weight: bold;
                margin-top: 10px;
            }

            .home .facebookCol {
                width: 310px;
                float: left;
            }

            #fb-root {
                display: none;
            }

            /* To fill the container and nothing else */

            .fb_iframe_widget, .fb_iframe_widget span, .fb_iframe_widget span iframe[style] {
                width: 100% !important;
            }

            /* - Rancho - */

            .rancho {
                width: 950px;
                margin: 0 auto;
                padding-left: 25px;
                padding-right: 25px;
            }

            .tituloSeccion {
                margin-top: 45px;
                color: #514d43;
                font-size: 40px;
            }

            .subtituloSeccion {
                margin-top: 9px;
                font-family: Times, "Times New Roman", serif;
                font-size: 16px;
                font-style: italic;
                color: #9d0b0f;
            }

            .rancho .texto {
                float: left;
                width: 460px;
                font-size: 16px;
                color: #514d43;
                text-align: justify;
                margin-top: 40px;
                margin-right: 68px;
            }

            .rancho .texto p {
                padding-bottom: 27px;
            }

            .rancho .imagenes {
                float: left;
                width: 408px;
            }

            .rancho .imagenes img.grande {
                width: 380px;
                height: auto;
                border: 8px solid #fff;
                margin-left: 12px;
                margin-top: 40px;

            }

            .rancho .imagenes img.peque {
                width: 174px;
                height: auto;
                border: 8px solid #fff;
                margin-top: 26px;
                margin-left: 12px;
            }

            /* - Venta - */

            .venta {
                width: 1000px;
                margin: 0 auto;
            }

            .venta .tituloSeccion {
                padding-left: 30px;
            }

            .venta .subtituloSeccion {
                padding-left: 30px;
            }

            .venta .separacion {
                background-image: url({{ url('theme/b/img/separacion.png') }});
                width: 100%;
                background-repeat: repeat;
                height: 2px;
                margin-bottom: 45px;
                margin-top: 22px;
            }

            .venta .tiposCaballo {
                width: 320px;
                float: left;
                color: #514d43;
                font-size: 18px;
            }

            .venta .tiposCaballo ul {
                list-style: none;
            }

            .venta .tiposCaballo li {
                background: url({{ url('theme/b/img/flechaVenta.png') }}    no-repeat left center; padding-left: 30px; } .venta .tiposCaballo .separacion { background-image: url({{ url('theme/b/img/separacion.png') }});
                width: 100%;
                background-repeat: repeat;
                height: 2px;
                margin-bottom: 15px;
                margin-top: 10px;
            }

            .venta .caballos {
                float: left;
                margin-left: 15px;
            }

            .venta .caballos .caballo {
                width: 490px;
                margin-bottom: 47px;
                float: left;
            }

            .venta .caballos .img {
                float: left;
            }

            .venta .caballos .img img {
                width: 220px;
                height: auto;
                border: 8px solid #fff;
            }

            .venta .caballos .info {
                float: left;
                margin-left: 20px;
            }

            .venta .caballos .info .titulo {
                text-transform: uppercase;
                font-size: 18px;
                color: #514d43;
                width: 180px;
                float: left;
                margin-bottom: 50px;
            }

            .venta .caballos .info .precio {
                float: right;
                width: 75px;
                font-size: 18px;
                color: #514d43;
                border-left: 1px solid #900a0e;
                padding-left: 20px;
            }

            .venta .caballos .infoTexto {
                font-size: 14px;
                color: #514d43;
            }

            .venta .caballos .info .separacion {
                margin-top: 15px;
                margin-bottom: 15px;
            }

            .venta .caballos .fotos {
                background-image: url({{ url('theme/b/img/sprite.png') }});
                background-position: 0px -166px;
                padding-left: 20px;
                background-repeat: no-repeat;
                font-size: 12px;
            }

            /*contacto*/

            .contacto {
                width: 1000px;
                margin: 0 auto;
                font-size: 16px;
                color: #514d43;
            }

            .contacto .separacion {
                background-image: url({{ url('theme/b/img/separacion.png') }});
                width: 100%;
                background-repeat: repeat;
                height: 2px;
                margin-bottom: 45px;
                margin-top: 22px;
            }

            .contacto .datosContacto {
                width: 375px;
                float: left;

            }

            .contacto .datosContacto a {
                color: #ff8a00;
                display: inline-block;
            }

            .contacto .datosContacto ul {
                list-style: none;
            }

            .contacto .datosContacto li {
                background-image: url({{ url('theme/b/img/sprite.png') }});
                background-repeat: no-repeat;
                padding-left: 28px;
            }

            .contacto .datosContacto .separacion {
                margin-top: 23px;
                margin-bottom: 23px;
            }

            .contacto .datosContacto .telf {
                background-position: 0px -189px;
            }

            .contacto .datosContacto .fax {
                background-position: 0px -237px;
            }

            .contacto .datosContacto .email {
                background-position: 0px -289px;
            }

            .contacto .datosContacto .web {
                background-position: 0px -339px;
            }

            .contacto .map {
                float: left;
                margin-left: 19px;
            }

            .contacto .map {
                font-weight: bold;
            }

            .contacto .map_canvas {
                border: 8px solid #fff;
                margin-top: 25px;
            }

            /*pie*/

            .pie {
                width: 100%;
                min-height: 280px;
                background-image: url({{ url('theme/b/img/bgFooter.jpg') }});
                background-repeat: repeat;
                margin-top: -113px;
                padding-top: 137px;
                position: relative;
                z-index: 2;
                color: #fff;
            }

            .contenedorPie {
                width: 1040px;
                margin: 0 auto;
                position: relative;
            }

            .pie .siguenos {
                float: left;
                margin-right: 175px;
                margin-left: 19px;
            }

            .pie .siguenos .titulo {
                font-size: 14px;
                font-weight: bold;
                margin-bottom: 14px;
            }

            .pie .siguenos .redSocial {
                margin-top: 8px;
                color: #878686;
                font-size: 12px;
                line-height: 32px;
                background-image: url({{ url('theme/b/img/redes.png') }});
                background-repeat: no-repeat;
                padding-left: 50px;
                background-position: 0px 0px;

            }

            .pie .siguenos .redSocial.rss {
                background-position: 0px -84px;
            }

            .pie .siguenos .redSocial.twitter {
                background-position: 0px -42px;
            }

            .pie .siguenos .redSocial.facebook {
                background-position: 0px -126px;

            }

            .pie .instalaciones {
                float: left;
            }

            .pie .instalaciones .titulo {
                font-size: 14px;
                font-weight: bold;
            }

            .pie .instalaciones img {
                margin-top: 14px;
            }

            .pie .caballo {
                position: absolute;
                right: 0px;
                top: -100px;
            }

            .pie .separacion {
                background-color: #181513;
                width: 100%;
                height: 2px;
                margin-top: 3em;
                border-bottom: 1px solid #45413d;
            }

            .pie .separacion .destacado {
                width: 136px;
                height: 2px;
                background-color: {!! $colorcorp !!};
            }

            .pie .logoRancho {
                float: left;
                max-width: 70px;
                max-height: 70px
            }

            .pie .copy {
                float: left;
                line-height: 49px;
                font-size: 12px;
                /*color: #635f5b;
                margin-left: 32px;*/
            }

            .ib {
                display: inline-block;
            }

            .bg-madera {
                background-image: url({{ url('theme/b/img/bgMenu.jpg') }});
                color: #fff;
            }

            .close, .close:hover {
                color: #fff;
            }

            .bg-colorcorp {
                background-color: {!! $colorcorp !!};
            }

            .btn-corp {
                background-color: {!! $colorcorp !!};
                color: white;
            }

            .btn-corp:hover, .btn-corp:focus {
                background-color: {!! $colorcorp !!};
                filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.8));
                border-color: none;
            }

            .btn-cancel:hover, .btn-cancel:focus {
                filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.8));
                border-color: none;
            }

            .modal-footer a {
                height: 100%;
                padding: 6px;
                border-radius: 35px;
                line-height: 1.33;
            }

            .text-small {
                font-size: 0.8rem;
            }

            .info .fa {
                font-size: 1.3em;
            }

            @media screen and (max-width: 1040px) {
                .contenedor {
                    margin-top: -80px;
                }

                .contenedorPie {
                    width: 95%;
                    margin: 0 auto;
                }

                .contenedor .menu .seccion.big {
                    width: 12%;
                }

                .contenedor .menu .seccion.small {
                    width: 12%;
                }

                .contenedor .menu .seccion .casa {
                    left: 45%;
                }

                .home, .rancho, .venta, .contacto {
                    width: 98%;

                }

                .rancho, .venta, .contacto {
                    padding: 0;
                    margin: 0 auto;
                }

                .home .bienvenidos {
                    width: 28%;
                    margin-right: 6%;
                }

                .home .excursiones {
                    width: 30%;
                    margin-right: 5%;
                }

                .home .facebookCol {
                    width: 30%;
                    float: left;
                }

                .rancho .texto {
                    width: 48%;
                    margin-right: 8%;
                }

                .rancho .imagenes {
                    width: 44%
                }

                .rancho .imagenes img {
                    margin-left: 4% !important;
                    border: 4px solid #fff !important;
                }

                .rancho .imagenes img.grande {
                    width: 91%;
                }

                .rancho .imagenes img.peque {
                    width: 42%;
                }

                .venta .tiposCaballo {
                    clear: both;
                    float: none;
                    width: 100%;
                    margin: 0 auto;
                }

                .venta .caballos {
                    clear: both;
                    float: none;
                    margin: 0 auto;
                    margin-top: 50px;
                }

                .venta .caballos .caballo .img {
                    width: 50%;
                }

                .venta .caballos .caballo .img img {
                    border: 2px solid #fff;
                    width: 98%;
                }

                .venta .caballos {
                    width: 93%;
                }

                .venta .caballos .caballo {
                    width: 50%;
                }

                .venta .caballo .info {
                    width: 40%;
                    margin-left: 3%;
                }

                .venta .caballos .info .titulo {
                    width: 73%;
                }

                .venta .caballos .info .precio {
                    width: 21%;
                    padding-left: 4%;
                }

                .contacto .datosContacto {
                    width: 100%;
                    clear: both;
                    float: none;
                }

                .contacto .map {
                    float: none;
                    width: 96%;
                    margin: 0;
                    margin-top: 30px;
                }

                .contacto .map_canvas {
                    width: 100% !important;
                }

            }

            @media screen and (max-width: 770px) {
                .excursiones, .facebookCol, .bienvenidos {
                    clear: both;
                    float: none;
                    width: 100% !important;
                    margin-right: 0px;
                    margin-top: 50px;
                }

                @media screen and (max-width: 700px) {
                    .slide .logo img {
                        width: 200px;
                        height: auto;
                    }

                    .slide .logo {
                        margin-left: -100px;
                    }
                }

                @media screen and (max-width: 660px) {

                    .pie .siguenos {
                        clear: both;
                        float: none;
                        width: 100px;
                        margin: 0 auto;
                    }

                    .pie .instalaciones {
                        clear: both;
                        float: none;
                        width: 330px;
                        margin: 0 auto;
                        margin-top: 30px;
                    }

                    .pie .logoRancho {
                        clear: both;
                        float: none;
                        width: 136px;
                        margin: 0 auto;
                    }

                    .pie .copy {
                        lear: both;
                        float: none;
                        width: 100%;;
                        margin: 0 auto;
                        line-height: 12px;
                        margin-top: 10px;
                    }

                    .rancho .texto {
                        clear: both;
                        float: none;
                        width: 100%;
                    }

                    .rancho .imagenes {
                        clear: both;
                        float: none;
                        width: 100%;
                        text-align: center;
                    }

                    .rancho .imagenes img.peque {
                        width: 43%;
                    }

                    .rancho .imagenes img {
                        margin-left: 0 !important;
                    }

                    .venta .caballo .img {
                        clear: both;
                        float: none;
                        width: 100%;
                        margin: 0 auto;
                    }

                    .venta .caballo .info {
                        clear: both;
                        float: none;
                        margin: 0 auto;
                        margin-top: 10px;

                    }

                    #tabs {
                        border-bottom: 0px solid #a0b0e9;
                        margin: 0;
                        height: 24px;
                        width: 100%;
                        white-space: nowrap;
                    }

                    #tabs ul {
                        margin: 0;
                        padding: 0 6px;
                        list-style: none;
                    }

                    #tabs ul li {
                        display: inline;
                        margin: 0;
                        padding: 0;
                        font-size: 11px;
                    }

                    #tabs ul li a, .tabs ul li a:link, .tabs ul li a:active, .tabs ul li a:visited, .tabs ul li a:hover {
                        text-decoration: none;
                        color: #000;
                    }

                    #tabs ul li a {
                        float: left;
                        margin: 0 2px 0 0;
                        padding: 0 0 0 18px;
                        vertical-align: bottom;
                        background: #fff url({{ url('theme/b/img/icons/tabs/tabs-bg.png') }}) repeat-x;
                    }

                    #tabs ul li a span {
                        float: left;
                        display: block;
                        margin: 0;
                        padding: 0 18px 0 0;
                        height: 24px;
                        line-height: 24px;
                        cursor: pointer;
                        background: url({{ url('theme/b/img/icons/tabs/tabs-bg.png') }}) 100% 0 repeat-x;
                    }

                    #tabs ul li a:hover {
                        background-position: 0 -100px;
                    }

                    #tabs ul li a:hover span {
                        background-position: 100% -100px;
                    }

                    #tabs ul li#current a, .tabs ul li#current a:hover {
                        position: relative;
                        margin-bottom: -1px;
                        background-position: 0 -50px;
                    }

                    #tabs ul li#current a span, .tabs ul li#current a:hover span {
                        height: 25px;
                        background-position: 100% -50px;
                    }

                }
            {{--INICIO--}}
            @if(empty($stud))
        </style>
    @endif
@endif
