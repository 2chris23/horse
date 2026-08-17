@extends('backend.layouts.base')
@section('title', trans('Titulos.NotificacionesStud') )
{{--@section('pagetitle', '<i class="fa fa-pagelines"></i>  '.trans('sell.new') )--}}
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
    <link rel="stylesheet" href="{{asset('assets/css/unite-gallery.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/ug-theme-default.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-bottom-text.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-right-no-thumb.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-right-thumb.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-right-title-only.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/video_gallery.css')}}"/>
@endsection
@php

        @endphp
@section('topjs')




@endsection
@section('content')
    {{--
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>
                    Galeria de videos
                </div>
                <div class="col-12 m-t-35">
                    @include('backend.common.video',['vid'=>\Auth::user()->Yeguada()->getVideosModel()])
                </div>
            </div>
        </div>
        --}}
    <div id="datos4" class="card col-12  ">
        {{--video--}}
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('notification.index') !!}
            </div>
            <div class="row">
                <div class=" col-12 table-responsive noSwipe m-t-20">
                    <table id="tabla" class="table table-striped table-hover" cellspacing="0">
                        <thead>
                        <tr>
                            @foreach($columns as $ck=>$cv)
                                <th>
                                    {!! $cv !!}
                                </th>
                            @endforeach

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notification as $k=>$v)
                            <tr data-id="{!! $v->id !!}">
                                @foreach($columns as $ck=>$cv)
                                    <td>
                                        @if($ck == 'created_at')
                                        {!! Funciones::AjustarFechaDmy($v->{$ck}) !!}
                                            @else
                                            {!! $v->{$ck} !!}
                                        @endif
                                    </td>
                                @endforeach
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
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

    <script>
        $(document).ready(function () {
            var data = [];

   $(window).hover(function () {
                cargarimagenes();
            });
            $('#tabla tbody').on('click', 'tr', function () {
                var d = $(this).attr('data-id');
                var url = "{!! route('notifi.show') !!}" +"/"+d;
                window.location.href = url;
            });


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


-->
