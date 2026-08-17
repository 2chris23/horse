<?php $user = isset($user)?$user:null; ?>
<?php $stud = !empty($user)?$user->Yeguada():null; ?>
<?php $cd = null; ?>
@if(!empty($cd))
    <style>
        @endif

        @include('assets.css.lotes')

        .sales_icons {
            padding-top: 2px;
        }

        .sales_icons i {
            color: #555555 !important;

        }

        .sales_icons i.horse {

            font-size: 40px !important;
        }

        .pad-5-5 {
            padding-left: 5px;
            padding-right: 5px;
        }

        .pad-3-3 {
            padding-left: 3px;
            padding-right: 3px;
        }

        .p-r-3 {
            padding-right: 3px;
        }

        .p-l-3 {
            padding-left: 3px;
        }

        .favorite {
            /*background-color: #ffe1c2 !important;*/
        }

        .m-b-35 {
            margin-bottom: 35px;
        }

        .portalesno {
            background: rgba(128, 128, 128, .3);
            border-radius: 5px;
        }

        {{--
        .ui-widget-shadow {
            -webkit-box-shadow: -5px -5px 5px #000;
            box-shadow: -5px -5px 5px #0000;
        }
        --}}
          .predeterminadrmarca {
            cursor: pointer;
        }

        .ribbon {
            height: 94px;
            width: 78px;
            position: absolute;
            top: 0;
            z-index: 1;
            padding: 0 12px;
            /* background-size: 100% auto; */
        }

        .ribon-sm {
            height: 100px;
            width: 215px;
        }

        .ribbon-midde {
            left: 40%;
            top: 60px;
        }

        .ribbon-fix-content {
            background-size: 100% auto !important;
            top: 30%;

        }

        .linkh {
            color: #fff;
            top: 50% !important;
            position: sticky;

        }

        .sales_icons1 {
            left: 0;
            top: 0;

            line-height: 60px;
            text-align: center;
        }

        .p-l-r-5 {
            padding-left: 5px;
            padding-right: 5px;
        }
        .font-1-5 {
            font-size: 1.5em;
        }

        .font-15 {
            font-size: 15px;
        }

        .m-h-350 {
            max-height: 350px !important;
        }

        .m-h-500 {
            max-height: 500px !important;
        }

        .fotosimg {
            left: 15px;
        }

        .fotosimg-small {
            height: 100px;
        }

        .fotosimg-small-figure {
            /*height: 100px;*/
            max-height: 90px !important;
            min-height: 80px !important;
            margin: 0 auto;
        }

        .fotosimg-small-figure > img {
            max-height: 100px;
            width: auto !important;
            margin: 0 auto;
        }

        .campo-error {
            margin-top: 25%;
            padding-bottom: 32%;
        }

        .font-35 {
            font-size: 35px;
        }

        .font-55 {
            font-size: 55px;
        }

        .font-65 {
            font-size: 65px;
        }

        .font-45 {
            font-size: 45px;
        }

        .carousel-caption {
            /*background-color: #0000004d !important;*/
        }

        .carousel-item > figure {
            max-height: 640px;
            min-height: 480px;
            width: auto;
        }

        .widget_icon_bgclr .bg_icon .font-55,
        .sales_icons .font-55 {
            color: #525252 !important;
            font-size: 55px !important;
        }

        .card-np {
            padding-right: 10px;
            padding-top: 10px;
            min-height: 84px;
        }

        .totalessex {
            padding-top: -10px;
            font-size: 18px;
        }

        .placefoto {
            width: 40px;
            height: auto;
        }

        td {
            display: table-cell !important;
            vertical-align: middle !important;
        }

        .ctr > .dropdown-toggle::after {
            display: none !important;
        }

        .ctr > ul.dropdown-menu {
            left: -100%;
        }

        .ctr > ul.dropdown-menu > li > a {
            padding-left: 15px;

        }

        .ui-widget-shadow {
            -webkit-box-shadow: -5px -5px 5px transparent;
            box-shadow: -5px -5px 5px transparent;
        }

        .p-r-10 {
            padding-right: 10px;
        }

        .m-t-45 {
            margin-top: 45px;
        }

        .ctr {
            top: 50%;
            left: 25%;
            position: relative;
        }

        .p-r-10 {
            padding-right: 10px;
        }

        {{--fe6b13--}}
        {{--ffb366--}}

.ribbon.popular {
            background: rgba(0, 0, 0, 0) url({!! url('portal_/images/featured.png') !!}) no-repeat scroll 0 0;
        }

        .soporte-card {
            float: right;
            z-index: 555555;
            top: 40%;
            right: 0;
            position: fixed;
            writing-mode: vertical-lr;
            letter-spacing: 1px;

        }

        .soporte-card > a {
            padding-left: 7px;
            padding-right: 7px;
            font-size: 14px;
            padding-bottom: 15px;
        }

        .blq {
            position: absolute;
            transition: all 1s;
            width: 100%;
            height: 100%;
            background: #bbbaba;
            opacity: 0.5;
            border-radius: 3px;
        }

        .debug {
            border: 1px solid black;
        }

        .btn-nice {
            position: relative;
            display: inline-block;
            cursor: pointer;
            margin: 0 auto;
            -webkit-transition: all 0.4s ease-in;
            transition: all 0.4s ease-in;
        }

        .btn-nice span[class^='ion'] {
            position: relative;
        }

        .btn-nice:before {
            content: '';
            background-color: #ffffff;
            border-radius: 50%;
            display: block;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            -webkit-transform: scale(0.001, 0.001);
            transform: scale(0.001, 0.001);
        }

        .btn-nice:focus {
            outline: 0;
            color: #fff;
        }

        .btn-nice:focus:before {
            -webkit-animation: effect_dylan 0.8ms ease-in-out 6000s;
            -webkit-transform-origin: top;

            /*-webkit-animation: effect_dylan 0.8s ease-out;*/
            animation: effect_dylan 0.8s ease-out;
        }

        @-webkit-keyframes effect_dylan {
            50% {
                -webkit-transform: scale(1.5, 1.5);
                transform: scale(1.5, 1.5);
                opacity: 0;
            }
            99% {
                -webkit-transform: scale(0.001, 0.001);
                transform: scale(0.001, 0.001);
                opacity: 0;
            }
            100% {
                -webkit-transform: scale(0.001, 0.001);
                transform: scale(0.001, 0.001);
                opacity: 1;
            }
        }

        @keyframes effect_dylan {
            50% {
                -webkit-transform: scale(1.5, 1.5);
                transform: scale(1.5, 1.5);
                opacity: 0;
            }
            99% {
                -webkit-transform: scale(0.001, 0.001);
                transform: scale(0.001, 0.001);
                opacity: 0;
            }
            100% {
                -webkit-transform: scale(0.001, 0.001);
                transform: scale(0.001, 0.001);
                opacity: 1;
            }
        }

        .tag-box.editable.tagging:focus,
        .form-control:focus {
            border-color: #fe6b13 !important;
            {{--
                -webkit-box-shadow: inset hoff voff blur color;
                -moz-box-shadow: inset hoff voff blur color;
                box-shadow: inset hoff voff blur color;
                --}}
   -webkit-box-shadow: inset 0 1px 1px rgba(250, 105, 0, 0.75), 0 0 8px rgba(250, 105, 0, 0.6);
            -moz-box-shadow: inset 0 1px 1px rgba(250, 105, 0, 0.75), 0 0 8px rgba(250, 105, 0, 0.6);
            box-shadow: inset 0 1px 1px rgba(250, 105, 0, 0.75), 0 0 8px rgba(250, 105, 0, 0.6);

        }

        .favorite > td > a, .favorite, .favorite .fa.fa-cog {
            color: #fe6b13;
        }

        .caballitos {
            /*font-weight: 600;*/
        }

        .favorite {
            font-weight: 800;
        }

        /*
                .favorite:first-child td > :before {
                    font: normal normal normal 14px/1 FontAwesome;
                    content: "\f005";
                    color: #fe6b13;
                    position: absolute;
                }
                */

        .favorite ul {
            font-weight: normal;
        }

        .text-red {
            color: red;
        }

        .input-map-float {
            float: left;
            position: absolute;
            top: 5px;
            left: 20px;
            cursor: pointer;
        }

        .input-map-float .fa-map-marker {
            color: blue;
            font-size: 25px;
        }

        .text-small {
            font-size: 12px;
            line-height: normal;
        }

        .subraya {

        }
        {{--
        #map {
            height: 100%;
            min-height: 300px !important;;
            min-width: 300px !important;;
            position: initial !important;
            height: 100%;
            min-height: 300px !important;
            min-width: 300px !important;
            position: initial !important;
        }
        #maps > div:nth-child(1) {
            overflow: hidden;
        }
        --}}
        td .tooltip,
  .tdo {
            opacity: 1;
            position: inherit;
        }

        .colorspl > div {
            margin-top: 15px;
        }

        #map > div:nth-child(1) {
            overflow: hidden;
        }

        .fa.fa-print.star {
            font-size: 20px;
        }

        .no-border {
            border: none;
        }

        .deletepost {
            height: 35px;
        }

        .ui-tooltip,
        .ui-tooltip-content {
            text-transform: initial !important;
        }

        .sms_left_side,
        .sms_left_side i,
        .sms_left_side a {
            background-color: #f93;
            color: #fff;
        }
        @if(!empty($cd)) </style> @endif {{--Borrar el 15/01/2018--}}
