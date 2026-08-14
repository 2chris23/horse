@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )


@section('content')

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                Listado de tus caballos
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
                                    <th>
                                        Mas
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($consultas as $c)
                                    <tr>
                                        @foreach($columns as $k=>$v)

                                            <td>
                                                @if($k == "url")
                                                    {!! $c->url !!}
                                                @elseif($k == "updated_at")
                                                    {!! Funciones::AjustarFechaDmySlashHms($c->updated_at) !!}
                                                @elseif($k == "created_at")
                                                    {!! Funciones::AjustarFechaDmySlashHms($c->created_at) !!}
                                                @else
                                                    {!! $c->{$k} !!}
                                                @endif
                                            </td>
                                        @endforeach
                                        <td>
                                            <a href="{!! route('clientes.edit',['id'=>$c->id]) !!}">
                                                <i class="fa fa-eye text-success"></i>
                                            </a>
                                            <a href="{!! route('clientes.edit',['id'=>$c->id]) !!}">
                                                <i class="fa fa-eye text-success"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="offset-3 col-6  text-center">
                            <div class="row">
                                <div class="col-4 ">
                                    <a href="{!! route('clientes.create') !!}"
                                       class="save btn btn-block btn-success glow_button">{!! trans('clientes.new') !!}</a>
                                </div>
                            </div>
                        </div>
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