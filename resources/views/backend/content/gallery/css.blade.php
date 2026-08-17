@php($cd = null)
@if(!empty($cd))
    <style>
        @endif

        /*
            .swal2-modal {
                min-height: 300px;
            }
            */
        .campopredeterminado {
            padding-left: 10px;
        }

        .cr-vp-square {
            border: 2px dotted #fff !important;
            /*border: 1px solid #fff !important;*/
        }

        .informaciond {
            /*
            background-color: rgba(52, 125, 255, 0.36);
         border-radius: 10px;
            */
        }

        .selfix {
            /*width: 25%!important;*/
            background-color: #eceeef;
        }

        {{--
       .gallery-style {
           width: 100px !important;
           height: 70px !important;
       }

       .gallery-elem {
           margin-right: 10px !important;
           margin-top: 10px !important;
       }
   --}}

    .inline_table {
            display: inline-table;
            margin-left: 15px;

        }

        .colorspl > .inline_table {
            margin-top: 15px;
        }

        .redondo {
            width: 25px;
            height: 25px;
            border-radius: 50px;
            box-shadow: -1px 1px 5px 2px #ccc;
        }
        .corte{
            float:left;
            /*margin:.5em 10px .5em 0;*/
            overflow:hidden; /* this is important */
            position:relative; /* this is important too */
            /*
            border:1px solid #ccc;
            width:150px;
            */
            height:200px;
        }
        .corte img{
            position:absolute;
        }
        @php($cd = null)
        @if(!empty($cd))
    </style>
@endif
