@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )

@section('topcss')

    <style>

        .pad-5-5 {
            padding-left: 5px;
            padding-right: 5px;
        }
    </style>
@endsection
@section('content')

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('clientes.list') !!}
                @if(count($clientes) !=0)
                    <span style="padding-left:10px;"><span class="badge badge-pill badge-warning notifications_badge_top">{!! count($clientes )!!}</span>
                                                 </span>
                     @endif
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <div class="offset-9 col-3  text-right ">
                            <div class="row">
                                <div class="col-6 ">
                                    <a href="{!! route('clientes.create') !!}"
                                       class="save btn btn-block btn-success glow_button">{!! trans('clientes.new') !!}</a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-12 table-responsive noSwipe m-t-20">
                            <table id="tabla" class="table table-striped table-hover" cellspacing="0">
                                <thead>
                                <tr>
                                    @foreach($columns as $k=>$v)

                                        <th {{--style="@if($k == 'status')width: 160px; @endif"--}}>
                                            {!! $v !!}
                                        </th>
                                    @endforeach
                                    <th>
                                        Redes
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                {{--
                                Yeguada
                                Pais Provincia
                                persona contacto
                                telefono
                                email
                                --}}
                                @foreach($clientes as $c)
                                    <tr>
                                        @foreach($columns as $k=>$v)
                                            <td>

                                                @if($k == "url")
                                                    {{--
                                                    @if($c->url== true)
                                                        Si
                                                    @else
                                                        No
                                                    @endif
                                                    --}}
                                                    {{--
                                                    @elseif($k=='stud')
                                                    {!! $v !!}
                                                    --}}
                                                @elseif($k=='phone')
                                                    @foreach($c->getPhoneModel() as $y=>$u)

                                                        {!! $u->FormatNumber() !!}<br>
                                                    @endforeach
                                                @elseif($k == "id")
                                                    {!! Funciones::RellenarCeros($c->id) !!}
                                                @elseif($k == "country_id")
                                                    {!! Funciones::NombrePais($c->getCountryId()) !!}
                                                @elseif($k == "state_id")
                                                    {!! Funciones::NombreProvincia($c->getStateId()) !!}

                                                @elseif($k=='name')
                                                    <a href="{!! route('clientes.edit',['id'=>$c->id]) !!}">
                                                        {!! $c->{$k} !!}
                                                    </a>
                                                @elseif($k=='stud')
                                                    <a href="{!! route('clientes.edit',['id'=>$c->id]) !!}">
                                                        {!! $c->{$k} !!}
                                                    </a>
                                                @else
                                                    {!! $c->{$k} !!}
                                                @endif
                                            </td>
                                        @endforeach
                                        <td class="f-20">
                                            {{--
                                            <a href="{!! route('clientes.edit',['id'=>$c->id]) !!}">
                                                <i class="fa pad-5-5 fa-address-book" aria-hidden="true"></i>
                                            </a>
                                            --}}
                                            @foreach($c->redes() as $r=>$q)
                                                @if($r == 'url' )
                                                    <a href="{!! $q !!}" class="pad-5-5" target="_blank">
                                                        <i class="fa pad-5-5 fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                @elseif($r == 'in')
                                                    <a href="{!! $q !!}" class="pad-5-5" target="_blank">
                                                        <i class="fa pad-5-5 fa-instagram" aria-hidden="true"></i>
                                                    </a>
                                                @elseif($r == 'pn')
                                                    <a href="{!! $q !!}" class="pad-5-5" target="_blank">
                                                        <i class="fa pad-5-5 fa-pinterest-square"
                                                           aria-hidden="true"></i>
                                                    </a>
                                                @elseif($r == 'fb')
                                                    <a href="{!! $q !!}" class="pad-5-5" target="_blank">
                                                        <i class="fa pad-5-5 fa-facebook-official"
                                                           aria-hidden="true"></i>
                                                    </a>
                                                @elseif($r == 'tw')
                                                    <a href="{!! $q !!}" class="pad-5-5" target="_blank">
                                                        <i class="fa pad-5-5 fa-twitter-square" aria-hidden="true"></i>
                                                    </a>
                                                @elseif($r == 'yt')
                                                    <a href="{!! $q !!}" class="pad-5-5" target="_blank">
                                                        <i class="fa pad-5-5 fa-youtube-square" aria-hidden="true"></i>
                                                    </a>
                                                @else

                                                @endif
                                            @endforeach
                                            {{--
                                            <a class="botoness" href="{!! route('clientes.edit',['id'=>$c->id]) !!}">
                                                <i class="fa pad-5-5 fa-eye text-success"></i>
                                            </a>
                                            --}}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{--<div class="offset-3 col-6 text-center ">
                            {{$clientes->render()}}
                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottomjs_')
    <script>
        $(document).ready(function () {


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
                    "lengthMenu": "{!! trans('users.tableregistros') !!}",
                    "emptyTable": "{!! trans('users.emptyTable') !!}",

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
        });

    </script>
@endsection
