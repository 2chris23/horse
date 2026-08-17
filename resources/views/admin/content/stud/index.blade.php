@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )
@section('topcss')

@endsection

@section('content')
    <style>
        .ui-tooltip {
            text-transform: none !important;
        }
    </style>
    <script>
        $(window).on('load', function () {
            $('.activo').css('color', 'green');
            $('.inactivo').css('color', 'red');
            $('.enlace').css('color', 'rgb(255, 153, 51)');
       });
    </script>
    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                Listado de Yeguadas

                @if(count($yeguadas) !=0)
                    <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! count($yeguadas )!!}
                        </span>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <div class="offset-9 col-3  text-right ">
                            <div class="row">
                                <div class="col-6 ">
                                    {{--<a href="{!! route('yeguadas.create') !!}"--}}
                                    <a href="{!! route('usuario.create') !!}"
                                       class="save btn btn-block btn-success glow_button">{!! trans('clientes.new') !!}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12"></div>
                        <div class=" col-12 table-responsive noSwipe m-t-20">
                            <table id="tabla" class="table table-striped table-hover" cellspacing="0">
                                <thead>
                                <tr>
                                    @foreach($columns as $k=>$v)

                                        <th {{--style="@if($k == 'status')width: 160px; @endif"--}}>
                                            {!! $v !!}
                                        </th>
                                    @endforeach
                                    <th>Activo</th>
                                    <th>Ver</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($yeguadas as $c)
                                    <tr>


                                        @foreach($columns as $k=>$v)
                                            {{--Numero de cliente/yeguada.
                                            Nombre de la yeguada x
                                            Fecha de registro para saber la antiguedad x
                                            Pais x
                                            Provincia x
                                            Persona de contacto, x
                                            Activo o no activo (puede ser un simbolo por ejemplo rojo o verde
                                            Iconos de interaccion--}}
                                            <td>
                                                @php
                                                    $i = ($i == 1)? 0:1;
                                                @endphp

                                                @if($k == "users_id")
                                                    @php
                                                        $u = User::find($c->users_id);
                                                        $n = '';
                                                        if(!empty($u)) $n = $u->getAllName();
                                                        $u = null;
                                                    @endphp
                                                    {!! $n !!}
                                                @elseif($k == "id")
                                                    {!! Funciones::RellenarCeros($c->id) !!}
                                                @elseif($k == "lastlogin")
                                                    <span >
                                                    {!!  Funciones::AjustarFechaDmySlashHms(App\Model\Inicio::where('users_id',$c->getUsersId())->orderby('created_at','desc')->first()->updated_at) !!}
                                                        </span>
                                                @elseif($k == "name")


                                                    <a href="{!! route('yeguadas.show',['id'=>$c->id]) !!}"
                                                    >

                                                        {!! $c->getName() !!}
                                                    </a>



                                                @elseif($k == "country")
                                                    {!! Funciones::NombrePais($c->country) !!}
                                                @elseif($k == "state")
                                                    {!! Funciones::NombreProvincia($c->state) !!}
                                                @elseif($k == "subscribe")
                                                    {!! Funciones::AjustarFechaDmy($c->created_at) !!}
                                                @elseif($k == "created_at")
                                                    <span data-toggle="tooltip"
                                                          title="{!! Funciones::AjustarHoraHM($c->created_at) !!}"
                                                    >
                                                    {!! Funciones::AjustarFechaDmy($c->created_at) !!}
                                                    </span>
                                                @elseif($k == "subscription")

                                                    {!! Funciones::AjustarFechaDmy($c->created_at) !!}

                                                @else
                                                    {!! $c->{$k} !!}
                                                @endif
                                            </td>
                                        @endforeach
                                        <td class="@if($i == 1) activo @else inactivo @endif"
                                            @if(!empty(App\Model\Inicio::where('users_id',$c->getUsersId())->first())) data-toggle="tooltip" title="
                                            Ultima vez en linea: {!! Funciones::AjustarFechaDmySlashHms(App\Model\Inicio::where('users_id',$c->getUsersId())->orderby('created_at','desc')->first()->updated_at) !!} " @endif
                                        >
                                            <i class="fa fa-check-square f-20 " aria-hidden="true"></i>
                                        </td>
                                        <td>
                                            {{--
                                            <a class="btn glow_button btn-warning"
                                               onclick="newTab('{!! route('MyPage', ['id' => $c->id,'slug'=>$c->slug]) !!}') "
                                               target="_blank">
                                                <i class="fa fa-eye text-success"></i>
                                            </a>
                                            --}}

                                            <a class="botoness"
                                               {{--href="#" onclick="newTab('{!! route('MyPage', ['slug'=>$c->slug]) !!}') "--}}
                                               href="{!! route('MyPageBase', ['slug'=>$c->slug]) !!}" target="_blank"

                                            >
                                                {{--<i class="fa fa-globe" data-pack="default" data-tags=""> </i>--}}
                                                <i class="fa fa-eye" data-pack="default" data-tags=""> </i>
                                            </a>
                                            <a class="botoness"
                                               href="{!! route('LoginAsGet',['id'=>$c->getUsersId()]) !!}">
                                                <i class="fa fa-exchange pad-5-5"></i>
                                                {{--<i class="fa pad-5-5 fa-key "></i>--}}
                                            </a>
                                            {{--
                                            <a class="btn glow_button btn-warning" href="{!! route('usuario.edit',['id'=>$c->getUsersId()]) !!}"  target="_blank">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </a>
                                            <a class="btn glow_button btn-warning" href="{!! route('yeguadas.edit',['id'=>$c->id]) !!}" target="_blank">
                                                <i class="fa fa-eye text-success"></i>
                                            </a>
                                            --}}
                                        </td>

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