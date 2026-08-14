@php($user = isset($user)?$user:null)
@php($stud = !empty($user)?$user->Yeguada():null)
@php($cd = null)
@if(!empty($cd))
    <style>
        @endif
        .cd-top {
            visibility: visible;
        }

        .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
            background-color: #f58936;
            border-color: #f58936;
        }

        .second-class, .second-classp {
            display: none;
        }

        .morera {
            text-align: right;
        }

        .fkbtn {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #bdbdbd;
            height: 100%;
            position: absolute;
            right: 0;
            top: 0;
            width: 40px;
        }

        .fkbtn:hover {
            -webkit-appearance: button;
            cursor: pointer;
        }

        .fa-search {
            padding-top: 25% !important;
        }

        .novo {
            /*max-height: 350px;
            width: 100%;
            */
            height: 210px;
            margin: 0 auto !important;
        }

        .novo > figure {
            margin: 0 auto !important;
            min-height: 313px;
        }

        #searching {
            margin: 0;
            padding: 0;
            width: 19em;
            right: -18.8em;
            top: 0;
            height: 100%;
            position: fixed;
            overflow-y: hidden;
            background-color: #f0f0f0;
            transition: right 0.4s ease-in-out;
        }

        #searching:hover {
            right: 0;
            overflow-x: hidden;
            overflow-y: scroll;
        }

        #searching ul {
            margin: 0;
            padding: 0;
            /*border-left: 3px solid #37abc8;*/
        }

        #searching li {
            display: block;
        }

        #searching li a {
            display: block;
            color: #232323;
            padding: 0.6em 1em;
            /*border-bottom: 1px solid #4a4a4a;*/
            transition-property: border-bottom, background-color;
            transition-duration: 0.4s;
            transition-delay: 0.1s;
        }

        #searching li a:hover {
            background-color: #4a4a4a;
            border-bottom: 1px solid #f58936;
        }

        #searching-label {
            display: inline-block;
            background: #f58936;
            position: fixed;
            right: 4px;
            top: 2%;
            opacity: 0.67;
            z-index: 100;
            font-size: 14px;
            font-family: Helvetica, arial, freesans, clean, sans-serif;
            padding-right: 20px;
        }

        #searching-label a {
            color: #f0f0f0;
            display: block;
            width: 3em;
            padding: 0.4em 0 0.6em 1em;
        }

        #searching-label:hover {
            opacity: 1;
        }

        .pagination > li > span {

            padding: 9px 14px;
        }
        @if(!empty($cd)) </style> @endif {{--Borrar el 15/01/2018--}}