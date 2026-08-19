<?php $cd = null; ?>
@if(!empty($cd))
    <style>
        @endif
 {{--
 <style>
 .flotante {
 /*http://www.albertvalleyturf.com.au/wp-content/uploads/2017/06/oz-tuff-2.jpg*/
 background-image: url(http://www.albertvalleyturf.com.au/wp-content/uploads/2017/06/oz-tuff-2.jpg);
 border-radius: 10px;
 width: 320px;
 /*clear: both;*/
 position: absolute;
 top: 23px;
 z-index: 999;
 }
 </style>
 --}}
 {{--Borrar el 15/01/2018--}}


        .negro {
            color: black;
        }

        .naranja {
            color: #fa6900 !important;
        }

        .form-control:focus {
            border-color: #fa6900 !important;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(250, 105, 0, 0.6);
            box-shadow: inset 0 1px 1px rgba(250, 105, 0, 0.75), 0 0 8px rgba(250, 105, 0, 0.6);
        }

        .button {
            font-family: arial;
        }

        .otheritem {
            max-width: 100% !important;
            background: #004097;
            padding: 20px;
            margin: 0 auto;
        }

        .noMargin {
            margin: 0 !important;
        }

        .noborder {
            border: 0 !important;
        }

        .otheritem {
            clear: both;
            overflow: hidden
        }

        .otheritem ul {
            border-top: 0px;
        }

        .otheritem ul li {
            margin: 0px 40px 0 0;
            overflow: inherit;
            float: left;
        }

        .otheritem ul li img {
            max-width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
            display: block;
            border: 1px solid #235BA9;
        }

        ul.fivecol li {
            width: 100%;
            float: left;

        }

        .fivecol {
            overflow: hidden;
        }

        .btn-max {
            border: #fa6900 1px solid;
            background-color: transparent;
            margin-top: 10px;
        }

        .btn-max:hover {
            background-color: #fa6900;
            border: #fa6900 1px solid;
            margin-top: 10px;
        }

        .btn-grey {
            border: rgb(85, 85, 85) 1px solid;
            margin-top: 10px;
        }

        .btn-red {
            border: #D9534F 1px solid;
            background-color: transparent;
            margin-top: 10px;
        }

        .btn-red:hover {
            background-color: #D9534F;
            border: #D9534F 1px solid;
            margin-top: 10px;
        }

        .btn-single {
            margin-top: 10px;
        }

        /**/
        .login2_border {
            background: rgba(255, 255, 255, 0.5);
            padding: 25px 30px 20px 30px;
            box-shadow: 0 0 7px 0 #777;
            border-radius: 10px;
        }

        .login_section_top {
            margin: 10% 0;
        }

        .m-r-0 {
            margin: 0;
        }

        .m-r-5 {
            margin-right: 5px;
        }

        .m-r-20 {
            margin-right: 20px;
        }

        @for($i = 0;$i<12;$i++)
        <?php $f = $i*10; ?>
        .m-t-{!! $f+5 !!} { margin-top: {!! $f+5 !!}px; }
        .m-t-{!! $f+10 !!} { margin-top: {!! $f+10 !!}px; }
@endfor

        .m-l-0 {
            margin-left: 0;
        }

        .m-l-10 {
            margin-left: 10px;
        }

        .m-l-20 {
            margin-left: 20px;
        }

        .m-r-15 {
            margin-right: 15px;
        }

        .m-b-0 {
            margin-bottom: 0;
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .p-b-15 {
            padding-bottom: 15px;
        }

        .p-b-20 {
            padding-bottom: 20px;
        }

        .p-t-15 {
            padding-top: 15px;
        }

        .p-t-25 {
            padding-top: 25px;
        }

        .p-l-0 {
            padding-left: 0;
        }

        .p-r-0 {
            padding-right: 0;
        }

        .p-lr-0 {
            padding-left: 0;
            padding-right: 0;
        }

        .p-l-5 {
            padding-left: 5px;
        }

        .p-d-0 {
            padding: 0;
        }

        .p-d-15 {
            padding: 15px;
        }

        .p-l-10 {
            padding-left: 10px;
        }

        .b_r_20 {
            border-radius: 20px;
        }

        .custom-control .custom-control-indicator {
            margin-top: 13px;
        }

        .custom-checkbox .custom-control-indicator {
            border-radius: 0.25rem;
        }

        .custom-control-indicator {
            pointer-events: all !important;
        }

        .custom-control-indicator {
            position: absolute;
            top: 0.4rem;
            left: 0;
            display: block;
            width: 1rem;
            height: 1rem;
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: rgb(221, 221, 221);
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 50% 50%;

        }

        .custom-control {
            position: relative;
            display: -ms-inline-flexbox;
            display: inline-flex;
            min-height: 1.8rem;
            padding-left: 1.5rem;
            margin-right: 1rem;
            cursor: pointer;
        }

        .text-white {
            color: rgb(255, 255, 255);
        }

        .text-center {
            text-align: center !important;
        }

        .login_drop {
            width: 320px;
            position: absolute;
            margin-left: -70px;
            background: rgba(255, 255, 255, 0.5);
        }

        .login2_border {
            /*background: transparent;*/
            background: transparent;
            background-image: url(http://www.albertvalleyturf.com.au/wp-content/uploads/2017/06/oz-tuff-2.jpg);
        }

        @media (min-width: 320px) {
            .flotante {
                /*left: 18%;*/
                /*left : 10px;*/
                /*float: right;*/
                top: 175px;
            }
        }

        @media (min-width: 576px) {
            .flotante {
                /*left: 18%;*/
                /*left : 10px;*/
                /*float: right;*/
                top: 180px;
            }
        }

        @media (min-width: 768px) {
            .flotante {
                /*right: 100px;*/
                /*left : 10px;*/
                /*float: right;*/
                top: 19px;

            }
        }

        @media (min-width: 867px) {
            .flotante {
                /*right: 100px;*/
                /*left : 10px;*/
                /*float: right;*/
                top: 19px;
            }
        }

        @media (min-width: 992px) {
            .flotante {
                /*right: 100px;*/
                /*left : 10px;*/
                /*float: right;*/
                top: 50px;
            }
        }

        @media (min-width: 1200px) {
            .flotante {
                /*right: 100px;*/
                /*left : 10px;*/
                /*float: right;*/
                top: 50px;
            }
        }

        /* Modal login fix: override legacy margin-top that splits the modal */
        #loginmod .modal-dialog {
            margin: 30px auto !important;
            max-width: 420px !important;
        }

        .close-log {
            background: rgb(255, 255, 255);
            border-radius: 21px;
            padding-bottom: 21px;
            float: right;
            height: 31px;
            width: 33px;
            margin-top: -40px;
            margin-right: -43px;
        }

        .close-btn {
            background: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
            margin-right: 7px;
            font-size: 2em;
        }

        #header-main .yamm img {
            width: 210px !important;
            margin-top: -8px;
            height: auto;
        }

        .negro {
            color: black;
        }

        .naranja {
            color: #fa6900 !important;
        }

        .form-control:focus {
            border-color: #fa6900 !important;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(250, 105, 0, 0.6);
            box-shadow: inset 0 1px 1px rgba(250, 105, 0, 0.75), 0 0 8px rgba(250, 105, 0, 0.6);
        }

        .button {
            font-family: arial;
        }

        .otheritem {
            max-width: 100% !important;
            background: #004097;
            padding: 20px;
            margin: 0 auto;
        }

        .noMargin {
            margin: 0 !important;
        }

        .noborder {
            border: 0 !important;
        }

        .otheritem {
            clear: both;
            overflow: hidden
        }

        .otheritem ul {
            border-top: 0px;
        }

        .otheritem ul li {
            margin: 0px 40px 0 0;
            overflow: inherit;
            float: left;
        }

        .otheritem ul li img {
            max-width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
            display: block;
            border: 1px solid #235BA9;
        }

        ul.fivecol li {
            width: 100%;
            float: left;
        }

        .fivecol {
            overflow: hidden;
        }

        .btn-max {
            border: #fa6900 1px solid;
            background-color: transparent;
            margin-top: 10px;
        }

        .btn-max:hover {
            background-color: #fa6900;
            border: #fa6900 1px solid;
            margin-top: 10px;
        }

        .btn-grey {
            border: rgb(85, 85, 85) 1px solid;
            margin-top: 10px;
        }

        .btn-red {
            border: #D9534F 1px solid;
            background-color: transparent;
            margin-top: 10px;
        }

        .btn-red:hover {
            background-color: #D9534F;
            border: #D9534F 1px solid;
            margin-top: 10px;
        }

        .btn-single {
            margin-top: 10px;
        }

        .login2_border {
            background: rgba(255, 255, 255, 0.5);
            padding: 25px 30px 20px 30px;
            box-shadow: 0 0 7px 0 #777;
            border-radius: 10px;
        }

        .login_section_top {
            margin: 10% 0;
        }

        .m-r-0 {
            margin: 0;
        }

        .m-r-5 {
            margin-right: 5px;
        }

        .m-r-20 {
            margin-right: 20px;
        }

        .m-t-5 {
            margin-top: 5px;
        }

        .m-t-10 {
            margin-top: 10px !important;
        }

        .m-t-15 {
            margin-top: 15px;
        }

        .m-t-20 {
            margin-top: 20px;
        }

        .m-t-25 {
            margin-top: 25px;
        }

        .m-t-30 {
            margin-top: 30px;
        }

        .m-t-35 {
            margin-top: 35px;
        }

        .m-t-40 {
            margin-top: 40px;
        }

        .m-l-0 {
            margin-left: 0;
        }

        .m-l-10 {
            margin-left: 10px;
        }

        .m-l-20 {
            margin-left: 20px;
        }

        .m-r-15 {
            margin-right: 15px;
        }

        .m-b-0 {
            margin-bottom: 0;
        }

        .m-b-20 {
            margin-bottom: 20px;
        }

        .p-b-15 {
            padding-bottom: 15px;
        }

        .p-b-20 {
            padding-bottom: 20px;
        }

        .p-t-15 {
            padding-top: 15px;
        }

        .p-t-25 {
            padding-top: 25px;
        }

        .p-l-0 {
            padding-left: 0;
        }

        .p-r-0 {
            padding-right: 0;
        }

        .p-lr-0 {
            padding-left: 0;
            padding-right: 0;
        }

        .p-l-5 {
            padding-left: 5px;
        }

        .p-d-0 {
            padding: 0;
        }

        .p-d-15 {
            padding: 15px;
        }

        .p-l-10 {
            padding-left: 10px;
        }

        .b_r_20 {
            border-radius: 20px;
        }

        .custom-control .custom-control-indicator {
            margin-top: 13px;
        }

        .custom-checkbox .custom-control-indicator {
            border-radius: 0.25rem;
        }

        .custom-control-indicator {
            pointer-events: all !important;
        }

        .custom-control-indicator {
            position: absolute;
            top: 0.4rem;
            left: 0;
            display: block;
            width: 1rem;
            height: 1rem;
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: rgb(221, 221, 221);
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 50% 50%;
        }

        .custom-control {
            position: relative;
            display: -ms-inline-flexbox;
            display: inline-flex;
            min-height: 1.8rem;
            padding-left: 1.5rem;
            margin-right: 1rem;
            cursor: pointer;
        }

        .text-white {
            color: rgb(255, 255, 255);
        }

        .text-center {
            text-align: center !important;
        }

        .login_drop {
            width: 320px;
            position: absolute;
            margin-left: -70px;
            background: rgba(255, 255, 255, 0.5);
        }

        @media (min-width: 320px) {
            .flotante {
                top: 175px;
            }
        }
        @media (max-width: 346px) {
            #header-main .yamm img {
                width: 150px !important;
                margin-top: 0px;

            }
        }

        @media (min-width: 576px) {
            .flotante {
                top: 180px;
            }
        }

        @media (min-width: 768px) {
            .flotante {
                top: 19px;
            }
        }

        @media (min-width: 867px) {
            .flotante {
                top: 19px;
            }
        }

        @media (min-width: 992px) {
            .flotante {
                top: 50px;
            }
        }

        @media (min-width: 1200px) {
            .flotante {
                top: 50px;
            }
        }
        #header6, #header6 .is-sticky header,
        #header-main-sticky-wrapper {
            height: 80px!important;
            background: #f8f8f8;
        }

        #header-main .navbar{
            margin-top: 10px;
        }

        .navbar-brand img {
            width: 210px;
            margin-top: -8px;
        }

        .account-lang {
            margin-top: 4px;
        }

        .firsttext {
            color: #fff;
            text-transform: uppercase;
            font-size: 40px;
            letter-spacing: 6px;
            font-family: Open Sans;
            font-weight: 400;
        }

        .secondtext {
            color: #fff;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 10px;
        }
        .slider-wrap{
            top:80px;
        }
        .tp-bannertimer {
            top: 0px;
        }

        .tp-bgimg {
            background-color: rgba(0, 0, 0, 0);
            background-repeat: no-repeat;
            background-position: right top;
            width: 100%;
            height: 100%;
            opacity: 1;
            visibility: inherit;
        }
        .slot,.slotslide{
            width: 100%!important;
        }
        .tp-bgimg,.slotslide>div{
            background-size: cover;
            background-position:center!important;
            {{--
            background-position-y: top!important;
            background-position-x: center;
            --}}

        }

        @media (max-width: 767px) {
            .navbar-nav {
                background: #f8f8f8;
            }
        }

        @if(!empty($cd))
    </style>
@endif
{{--Borrar el 15/01/2018--}}
