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


    <div class="card col-12">
        <div class="card-header bg-white row">
            <div class="col-9">
            {!! trans('photo.allphoto') !!}
            </div>
            <div class="col-3">
                <a href="{!! route('fotos.index') !!}" class="btn pull-right"><i class="fa fa-bars"></i>Vista tabla </a>
            </div>
        </div>
        <div class="card-block">
            <div class="m-t-35 row " id="photos">

                @foreach($photo as $k=>$v)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 m-t-20">
                        @include('backend.common.galleryimage',['titulo'=>$v['name'],'id'=>$v['id'],'imagen'=>$v['url']])
                    </div>
                @endforeach

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
<!--{{--
                    axios.post("{!! route('fotospost.index') !!}")
                        .then(function (response) {
                            var r = response.data;
                            var c = response.colums;
                            $.each(r,function(k,v){
                                $.each

                            });
                            //var s = $.parseJSON(data);
                            //$('#video').append(s.el);


                       })
                        .catch(function (error) {
                            //var err = eval(xhr.responseText.sms);
                            var e = error;
                            console.dir(e);
                            var v = e.message;
                            swal({
                                title: '{!! trans('users.tittleerror') !!}',
                                html: '{!! trans('users.someerror') !!}<br>' + v,
                                type: 'error',
                                confirmButtonColor: '#4fb7fe'
                            });
                            $('.save').prop('disabled', false);
                        });
                        var table = $('#tabla').DataTable({
                    --}}

        var table = $('#tabla').dataTable({
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
{{--}}
var t1 = $('#tabla').dataTable({
    "ajax": {
        'url':"{!! route('fotospost.index') !!}",
        'type':'POST',
        'beforeSend':function(request){
            console.log("EEEEEEEEEEEEEEEEEEE");
            request.setRequestHeader("X-CSRF-TOKEN",token);
            request.setRequestHeader("csrftoken",token);
        }

    },
});
--}}
{{--
t1.ajax.url("http://horse.com/admin/Fotos").load();
    //.url("{!! route('fotospost.index') !!}").load();
//"http://horse.com/admin/Fotos"
--}}
        //table.ajax.url("http://horse.com/admin/Fotos").load();

        $(window).hover(function () {
        cargarimagenes();
        });
        $('#tabla tbody').on('click', 'tr', function () {
        console.log('clicl');
        //var data = table.row(this).data();
        //alert('You clicked on ' + data[0] + '\'s row');
});
-->
