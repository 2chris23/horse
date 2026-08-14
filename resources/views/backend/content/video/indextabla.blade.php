@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )

@section('topcss')
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css"/>

    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/timeline2.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/calendar_custom.css')!!}"/>

    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/gallery.css')!!}"/>


    {{--<link type="text/css" rel="stylesheet" href="#" id="skin_change"/>--}}

    <link type="text/css" rel="stylesheet" href="{!!url('assets/vendors/imagehover/css/imagehover.min.css')!!}"/>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <link type="text/css" rel="stylesheet" href="{!! url('phone/css/intlTelInput.css') !!}"/>

    <style>

        .pad-5-5 {
            padding-left: 5px;
            padding-right: 5px;
        }

        .img-tmp {
            max-height: 100px !important;
            width: auto !important;
            margin: auto !important;
        }

        .img-tmp > dropify-preview {
            display: block !important;
            top: 0px !important;
            left: 0px !important;
            padding: 0px !important;
        }

        .img-tmp > dropify-preview > dropify-render > img {
            padding: 0px !important;
        }

    </style>
@endsection
@section('content')

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('video.allvideos') !!}
                @if(count($video) !=0)
                    <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! count($video )!!}
                        </span>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <div class=" col-12 table-responsive noSwipe m-t-20">
                            <table id="tabla" class="table table-striped table-hover" cellspacing="0">
                                <thead>
                                <tr>
                                    @foreach($columns as $k=>$v)

                                        <th {{--style="@if($k == 'status')width: 160px; @endif"--}}>
                                            {!! $v !!}
                                        </th>
                                    @endforeach

                                </tr>
                                </thead>

                                <tbody>
                                <?php $cont = 0; ?>
                                @foreach($video as $c)
                                    {{--<?php $c->Optimizar(); ?>--}}
                                    {{--
                                    FatalErrorException in Decoder.php line 136:
Allowed memory size of 165675008 bytes exhausted (tried to allocate 24576 bytes)
in Decoder.php line 136

                                    --}}
                                    <tr>
                                        @foreach($columns as $k=>$v)
                                            <td>
                                                @if($k=='stud')
                                                    <a href="{!! route('clientes.edit',['id'=>$c->id]) !!}">
                                                        {!! $c->getStudName() !!}
                                                    </a>
                                                @elseif($k == "id")
                                                    <?php $cont = $cont + 1; ?>
                                                    {!! Funciones::RellenarCeros($cont) !!}
                                                @elseif($k=='type')
                                                    {!! $c->getTypeString() !!}
                                                @elseif($k=='tableid')
                                                    {!! $c->ObtenerNombrePadre() !!}
                                                @elseif($k=='created_at')
                                                    {!! Funciones::AjustarFechaDmy($c->created_at) !!}
                                                @elseif($k=='url')
                                                    @if(!empty($c->getEmbedVideoYoutube()))
                                                        @include('backend.common.galleryimage',['titulo'=>$c->getName(),'id'=>$c->id,'imagen'=>$c->getYoutubeThumb(),'embed'=>$c->getEmbedVideoYoutube(),'video'=>1,'specialvideo'=>1])
                                                    @endif
                                                @elseif($k == "action")
                                                    <a href="#!" class="dropify-clear"
                                                       onclick="erasephoto(this,{{$c->id}},'video')">
                                                        <i class="fa fa-trash" aria-hidden="true"> </i>
                                                    </a>
                                                @else
                                                    {!! $c->{$k} !!}
                                                @endif
                                            </td>

                                        @endforeach
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottomjs')

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-calendar/0.2.5/js/calendar.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js">
    </script>
    <script type="text/javascript" src="{!!url('assets/js/pages/gallery.js')!!}"></script>
    <script type="text/javascript" src="{!! url('js/dropify/js/dropify.min.js') !!}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js"></script>
    <!--End of plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/gallery.js')}}"></script>

    <script>
        $(document).ready(function () {
            var data = [];



        });
    </script>

@endsection


<!--var table = $('#tabla').dataTable({
"order": [[0, "desc"]],
"pageLength": 25,

"language": {
"decimal": ",",
"thousands": ".",
//"lengthMenu": "Mostrando _MENU_ registros por pagina",
"zeroRecords": "{!! trans('users.zerorecord') !!}",
"info": "{!! trans('users.tableinfo') !!}",
"loadingRecords": "{!! trans('users.tableloading') !!}",
//"processing": "{!! trans('users.tablebusy') !!}",
//"search": "Filter records:",
"search": "{!! trans('users.tablesearch') !!}",
"infoEmpty": "{!! trans('users.tableinfoempty') !!}",
"infoFiltered": "{!! trans('users.tableinfofilter') !!}",
"emptyTable": "{!! trans('users.tableempty') !!}",
"lengthMenu": 'Mostrando <select>' +
    '<option value="5">5</option>' +
    '<option value="10">10</option>' +
    '<option value="25">25</option>' +
    '<option value="50">50</option>' +
    '<option value="100">100</option>' +
    '<option value="-1">All</option>' +
    '</select> registros',
"paginate": {
"first": "{!! trans('users.tablefirst') !!}",
"last": "{!! trans('users.tablelast') !!}",
"next": "{!! trans('users.tablenext') !!}",
"previous": "{!! trans('users.tableprevious') !!}",

},
{{--
            "ajax": {
                'url': "{!! route('fotospost.index') !!}",
                'type': 'POST',
                'beforeSend': function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", token);
                    request.setRequestHeader("csrftoken", token);
                }

            },
            --}}


        },

        "fnInitComplete": function (oSettings, json) {
        $('#tabla').on('page.dt', function () {
        //var info = table.page.info();
        //console.log( 'Showing page: '+info.page+' of '+info.pages );
        cargarimagenes();
        $('.page-link').on('click', function () {
        cargarimagenes();
        });
        });
        },

        //"processing": true,
        //"serverSide": true,
        });


        $(window).hover(function () {
        cargarimagenes();
        });
        $('#tabla tbody').on('click', 'tr', function () {
        console.log('clicl');
        //var data = table.row(this).data();
        //alert('You clicked on ' + data[0] + '\'s row');
});
-->