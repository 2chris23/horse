@if(!empty($stud))
    @php($colorcorp = $stud->getColor())
    @if(empty($stud))
        <style>
            @endif

    {{--INICIO--}}

    a:hover, a:focus {
                text-decoration: none;
            }

	@if(!empty($colorcorp))
              /*backgrounds*/

            .contact-fa:after, #header.header-v3 .header_content .header_menu .menu > li > a:hover:after,
            #header.header-v3 .header_content .header_menu .menu .sub-menu li a:hover,
            #header.header-v3 .header_content .header_menu .menu .sub-menu li.current-menu-item a,
            .header_top .header_right .dropdown ul li.active a,
            .header_top .header_right .dropdown ul li a:hover,
            .menu-bars:hover span:before,
            .menu-bars:hover span:after,
            .menu-bars.active span:before,
            .menu-bars.active span:after,
            .menu-bars span,
            .menu-bars span:before,
            .menu-bars span:after,
            .mcab:hover:after,
            .scrollup:hover,
            .awe-btn.awe-btn-12:hover,
            .awe-btn.awe-btn-default:hover,
            #footer .footer_top .mailchimp .mailchimp-form .awe-btn:hover,
            .section-map.style-2 .contact-map .contact:after {
                background-color: {!! $colorcorp !!};
            }

            /*botones*/
            .awe-btn.awe-btn-12:hover,
            .awe-btn.awe-btn-default:hover,
            #footer .footer_top .mailchimp .mailchimp-form .awe-btn:hover,
            .check-availability h2:before,
            .form-control:focus {
                border-color: {!! $colorcorp !!};
            }

            /*letras*/
            #header.header-v3 .header_top .socials a:hover,
            #header.header-v3 .header_top .socials a.active,
            .header_mobile .header_menu,
            .header_mobile .header_menu ul li .sub-menu,
            .owl-controls .owl-prev:hover,
            .owl-controls .owl-next:hover,
            .item.room-item-style-2 .outer .bgr .details .title a:hover,
            .item.room-item-style-2 .outer .bgr .details .title a:focus,
            .c-main,
            .contact-f a:hover,
            .contact-f span:hover,
            .header_mobile .header_menu ul li a:hover,
            .header_mobile .header_menu ul li.current-menu-item > a,
            .room_item-1 h2 a:hover,
            .sig .btn-special-black:hover,
            .sig .btn-special-black:focus,
            span.fa-play:hover,
            footer.footer-style-3 a:hover,
            footer .copyright .social a:hover i,
            .check-availability h2:before {
                color: {!! $colorcorp !!};
            }

            .owl-controls .owl-prev:hover,
            .owl-controls .owl-next:hover,
            .room-detail_thumbs a:hover::before,
            .room-detail_thumbs .owl-item.active a:before {
                border-color: {!! $colorcorp !!};
            }

            @endif
    
    .white,
            .room-detail_total .btn:hover,
            .room-detail_total .btn:focus,
            #footer .footer_top .mailchimp .mailchimp-form .awe-btn:hover,
            .awe-btn-cancel:hover,
            .actions span:active,
            .btn-fb,
            .btn-twitter,
            .btn-gplus,
            .btn-pinterest,
            .btn-print,
            .btn-envelope {
                color: #fff;
            }

            .black,
            .awe-btn.awe-btn-default {
                color: #000;
            }

            #header.header-v3 .header_top .socials a:hover,
            #header.header-v3 .header_top .socials a.active {
                background-color: transparent;
            }

            #header.header-v3 .header_top {
                padding-top: 10px;
                padding-bottom: 5px;
            }

            #header.header-v3 .header_top .logo-top {
                /*max-height: 65px;*/
                max-width: 85px;
            }

            #header.header-v3.header-sticky .header_top .logo-top {
                margin-top: 0px;
                max-width: 75px;
            }

            .logo-top img {
                webkit-filter: drop-shadow(1px 1px 3px #fff);
                filter: drop-shadow(1px 1px 3px #fff);
            }

            #header.header-v3 .header_content .header_menu .menu .sub-menu {
                background: rgba(0, 0, 0, 0.9);
            }

            #header.header-v3 .header_content .header_menu .menu > li a {
                line-height: 50px;
            }

            .header_content .menu > li > a {
                font-size: 16px;
            }

            .header_mobile .header_menu,
            .header_mobile .header_menu ul li .sub-menu {
                background-color: white;
                color: #000;
            }

            .header_mobile .header_menu ul li a {
                color: #000;
            }

            .mcab {
                line-height: 50px;
                background-color: transparent;
                color: #fff;
                position: relative;
                transition: all 200ms linear;
                font-size: 16px;
                display: block;
                padding: 0 20px;
                font-weight: 500;
                text-transform: uppercase;
            }

            .mcab:hover:after {
                content: "";
                height: 2px;
                position: absolute;
                bottom: 0;
                left: 20px;
                right: 20px;
                width: auto;
                animation: moveFromLeft 400ms ease;
                box-sizing: border-box;
            }

            .h-tarjeta {
                height: 400px;
            }

            /* barajas */

            .baraja-main {
                width: 90%;
                max-width: 960px;
                margin: 0 auto;
                padding: 0;
            }

            .baraja-demo {
                width: 250px;
                margin: 30px auto;
                color: #aaa;
            }

            .baraja-demo h4 {
                color: #666;
                font-size: 14px;
                padding: 8px 10px 5px;
                margin: 20px 3px 5px;
                border-bottom: 1px solid #f0f0f0;
            }

            .baraja-demo p {
                font-size: 12px;
                font-weight: 700;
                padding: 0 10px;
                margin: 10px 3px 0;
            }

            .baraja-demo ul.baraja-container li {
                border-radius: 10px;
                padding: 5px;
                box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.08);
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .baraja-demo li img {
                display: block;
                margin: 0 auto;
                /*width: 100%;*/
                border-radius: 10px 10px 0 0;
                max-height: 300px;
                width: auto;
            }

            ul.baraja-container {
                width: 250px;
                height: 310px;
                /*margin: 0 auto 30px;*/
                position: relative;
                padding: 0;
                list-style-type: none;
                margin-bottom: 30px;
            }

            ul.baraja-container li {
                width: 100%;
                height: 100%;
                margin: 0;
                position: absolute;
                top: 0;
                left: 0;
                cursor: pointer;
                background: #fff;
                pointer-events: auto;
                -webkit-backface-visibility: hidden;
                -moz-backface-visibility: hidden;
                -ms-backface-visibility: hidden;
                -o-backface-visibility: hidden;
                backface-visibility: hidden;
            }

            .actions {
                width: 100%;
                padding: 0 0 20px 0;
            }

            .actions span {
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
                background: #fff;
                color: #888;
                font-weight: 700;
                font-size: 12px;
                font-size: 1.2rem;
                text-align: center;
                display: inline-block;
                cursor: pointer;
                padding: 5px 10px;
                text-transform: uppercase;
                margin: 3px;
                border-radius: 3px;

            }

            .actions span:hover {
                background: #f7f7f7;
            }

            .actions span:active {
                background: #aaa;
                box-shadow: 0 1px 1px rgba(255, 255, 255, 0.5);
            }

            .actions span.disabled {
                opacity: 0.8;
                color: #ddd;
            }

            #nav-prev, #nav-next {
                width: 30px;
                height: 30px;
                font-size: 18px;
                line-height: 20px;
            }

            .img-hover-box .img {
                overflow: initial;
            }

            .img-hover-box .img img {
                transition: none;
            }

            .img-hover-box .img:hover img {
                transform: none;
            }

            .section-home-about.style-2 .home-about .img-hover-box {
                padding-right: 0px;
            }

            .grid {
                margin: 0;
                padding: 0;
            }

            .grid:after {
                content: '';
                display: block;
                clear: both;
            }

            .grid-item {
                position: relative;
                margin: 0px;
                /*width: 372px;*/
                overflow: hidden;
                padding: 2px;
            }

            .grid-item img {
                width: 100%;
                height: 100%;
                height: auto;
                transition: all 0.6s;

            }

            /*.grid-item:hover img {
                transform: scale(1.1);
            }*/
            .grid-item:hover .grid_hover_area {
                opacity: 1;
            }

            .grids-item {
                position: relative;
                margin: 0;
                width: 20%;
                overflow: hidden;
                padding: 3px;
            }

            .grids-item img {
                width: 100%;
                height: 100%;
                height: auto;
                transition: all 0.6s;
            }

            /*
            .grids-item:hover img {
                transform: scale(1.1);
            }*/
            .grids-item:hover .grid_hover_area {
                opacity: 1;
            }

            .section-news .item:hover img {
                transform: none;
            }

            .mh-300 {
                max-height: 300px;
            }

            .w80 {
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }

            span.fa-play {
                position: absolute;
                top: 43%;
                left: 48%;
                font-size: 40px;
                color: #fff;
                text-shadow: #3e3838 0.1em 0.1em 0.5em;
            }

            .bgr-footer, .bg-9 {
                background: url({!! $stud->getFront()->getUrl() !!}) center center no-repeat;
                background-size: cover;
            }

            footer .copyright {
                background-color: #232323;
            }

            #footer .footer_top .mailchimp .mailchimp-form .awe-btn {
                background-color: transparent;
                color: #000;
            }

            #footer .footer_top .mailchimp .mailchimp-form {
                margin-left: 0px;
            }

            .mt-15 {
                margin-top: 15px;
            }

            .pt-5 {
                padding-top: 5px;
            }

            input[type="tel"] {
                background: none;
                background-color: #fff;
                height: 40px;
                line-height: 40px;
                padding: 0 12px;
                font-size: 12px;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                font-family: 'Montserrat';
            }

            select,
            textarea,
            .form-control,
            input[type="search"],
            input[type="text"],
            input[type="url"],
            input[type="number"],
            input[type="password"],
            input[type="email"],
            input[type="file"],
            input[type="tel"],
            input[type=date],
            input[type=time],
            input[type=datetime-local],
            input[type=month] {
                width: 100%;
                color: #232323;
                border: 2px solid #232323;
                -webkit-transition: all .3s ease;
                border-radius: 0;
                height: 40px;
                line-height: 40px;
                padding: 0 12px;
                font-weight: normal;
                font-family: 'Montserrat';
                font-size: 12px;
            }

            .candidate-general-info ul.candidate-registration li {
                font-size: 12px;
            }

            .candidate-general-info ul.candidate-registration li input {
                padding: 0 8px;
                border: 2px solid #232323;
                width: 100%;
            }

            .candidate-general-info ul.candidate-registration li select {
                padding: 0 5px;
            }

            .candidate-general-info ul.candidate-registration li input[type="date"] {
                padding-right: 0px;
            }

            .nicEdit-main {
                font-family: 'Montserrat';
                color: #666;
            }

            .form-control:focus {
                box-shadow: none;
            }

            .awe-btn-cancel {
                border: 2px solid #000;
            }

            .awe-btn-cancel:hover {
                background-color: #ada5a5;
                border-color: #ada5a5;
            }

            .sub-banner {
                padding-top: 20px;
            }

            .about-item .img {
                margin-top: 50px;
            }

            .gallery-content .gallery_item:hover:before {
                top: unset;
                opacity: 0;
            }

            .gallery-content .video {
                height: auto;
                line-height: unset;
            }

            .room-detail_img .room_img-item img {
                height: 450px;
                width: auto;
            }

            /*
                        .slid .owl-wrapper-outer {
                            max-height: 500px;
                        }
            */
            .owl-controls .owl-prev,
            .owl-controls .owl-next,
            .room-detail .owl-prev,
            .room-detail .owl-next {
                color: #000;
                border: 2px solid #000;
            }

            .datos {
                border-top: 1px solid #e4e4e4;
                padding: 15px 30px 33px 30px;
            }

            .room-detail_book .datos .campo {
                display: block;
                clear: both;
                font-size: 12px;
                font-family: 'Montserrat';
                font-weight: bold;
                text-transform: uppercase;
                margin-top: 10px;
                margin-bottom: 10px;
                max-width: 100%;
            }

            div.campo span {
                font-weight: normal;
                text-transform: none;
            }

            .tit {
                color: #232323;
                font-size: 16px;
                font-weight: bold;
                margin-top: 10px;
                line-height: 1.5em;
                font-family: 'Montserrat';
                margin-bottom: 10px;
                box-sizing: border-box;
            }

            .sig {
                border-top: 1px solid #e4e4e4;
                padding: 15px 0px;
                margin: 0;
                font-family: 'Montserrat';
            }

            .sig a {
                font-size: 12px;
            }

            .tooltip {
                font-family: 'Montserrat';
                opacity: 1;
                display: initial;
                position: initial;
            }

            .btn {
                padding: 4px 8px 2px 8px;
            }

            .btn-fb {
                padding-left: 10px;
                padding-right: 10px;
                background-color: #3b5998;
            }

            .btn-twitter {
                background-color: #00aced;
            }

            .btn-gplus {
                background-color: #d14433;
            }

            .btn-pinterest {
                background-color: #bd081c;
            }

            .btn-print {
                background-color: #612726;
            }

            .btn-envelope {
                background-color: #0fb391;
            }

            .room-compare_item .img img {
                width: auto;
                max-height: 200px;
                position: relative;
                left: 50%;
                -webkit-transform: translatex(-50%);
            }

            .room-compare_item .text ul {
                padding-left: 20px;
            }

            .cbold {
                text-align: center;
                font-weight: bold;
            }

            .borde-top {
                margin-bottom: 70px;
                padding-top: 50px;
                border-top: 1px solid #e4e4e4;
            }

            .mb70 {
                margin-bottom: 70px;
            }

            .section-about {
                padding-bottom: 0px;
            }

            .section-room,
            .section-room-detail,
            .section_page-gallery {
                padding-bottom: 0;
            }

            .header_top .header_right .dropdown ul li a {
                text-align: left;
            }

            .header_top .header_right .dropdown ul li a .flag {
                padding-right: 0px;
            }

            .photo {
                width: 20%;
                padding: 4px;
            }

            .room_item-1 .img img {
                width: auto;
                max-height: 400px;
            }

            .room_item-1 .desc p {
                min-height: 42px;
            }

            .room_item-1 .img:before {
                background: transparent;
            }

            .up-finst {
                display: block;
                position: relative;
                margin-top: 45px;
            }

            .up-finst .finst {
                position: relative;
            }

            .up-finst .finst img {
                height: 450px;
                width: auto;
            }


            .contact-map {
                height: 600px;
            }

            #map {
                height: 100%;
                width: 100%;
            }

            .contact.contact-f {
                position: absolute;
                top: 50%;
                right: 0;
                left: 0;
                margin: 0 auto;
                transform: translateY(-50%);
            }

            .contact-f p, .contact-f a, .contact-f span {
                color: black;
            }

            .footer_top, .section-map .footer_top h2 {
                color: white;
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
                @if(!empty($colorcorp))
                      background: {!! $colorcorp !!};
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

            .contact-fa:after {
                content: "\f041";
                font: normal normal normal 14px/1 FontAwesome;
                color: #fff;
                font-size: 30px;
                width: 60px;
                height: 60px;
                line-height: 60px;
                border-radius: 50%;
                position: absolute;
                left: 0;
                right: 0;
                bottom: 70px;
                margin: 0 auto;
            }

            .section-map,
            .section-map > .bgr-footer {
                min-height: 500px;
            }

            .contact-map {
                height: 300px;
            }

            footer.footer-style-3 .footer_top .ot-heading h2 {
                color: #232323;
            }

            .add-skills-field input[type="file"] {
                border: none;
                line-height: 0;
            }

            .candidate-profile-picture .upload-img-field {
                background: url(/theme/lotus/images/foto-perfil.png);
                background-size: contain;
                background-repeat: no-repeat;
                background-position-x: center;
            }

            #map {
                height: 300px !important;
            }

            .contact-map {
                height: 350px;
            }

            .mfp-wrap .mfp-prevent-close {
                border: none;
                width: 90px;
            }

            .tp-simpleresponsive .caption,
            .tp-simpleresponsive .tp-caption {
                filter: drop-shadow(1px 1px 5px #000) !important;
            }

            @media (max-width: 1200px) {
                #header.header-v3.header-sticky {
                    margin-top: -68px;
                }

                .photo {
                    width: 25%;
                }

                .room-compare_item .img img {
                    max-height: 160px;
                }
            }

            @media (max-width: 991px) {
                .h-tarjeta {
                    height: 300px;
                }

                .photo {
                    width: 33.3333333%;
                }

                .room-compare_item .img img {
                    max-height: 200px;
                }

                .about .about-item .text {
                    padding: 0 15px;
                }

                .header_content .menu > li > a,
                .header_content .menu > li > span {
                    padding: 0 12px;
                }
            }

            @media (max-width: 767px) {
                .photo {
                    width: 50%;
                }

                .room-compare_item .img img {
                    max-height: 175px;
                }

                .tam-tarj {
                    width: 50%;
                }

                .margt {
                    margin-top: 15px;
                }
            }

            @media (max-width: 480px) {
                #header.header-v3.header-sticky {
                    margin-top: -52px;
                }

                .photo {
                    width: 100%;
                }

                .w-pq {
                    width: 100%;
                }

                .room-compare_item .img img {
                    max-height: 200px;
                }

                .tam-tarj {
                    width: 100%;
                    margin-left: 0px;
                }

                .h-tarjeta {
                    height: 360px;
                }
            }

            @media (max-width: 360px) {
                #header.header-v3.header-sticky {
                    margin-top: -52px;
                }

                .h-tarjeta {
                    height: 300px;
                }
            }

            @media (min-width: 769px) {
                #header.header-v3.header-sticky {
                    margin-top: 0px;
                }

                #header.header-v3 .header_top .logo-top {
                    display: inline-block;
                }
            }

            {{--INICIO--}}
            @if(empty($stud))
        </style>
    @endif
@endif
