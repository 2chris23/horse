@extends('backend.layouts.base')
@section('title', trans('Titulos.HorsesStud') )


@section('topcss')
    <style>

        .font-14 {
            font-size: 14px;
        }

        .ctr > ul.dropdown-menu {
            left: -300%;
        }

        .font-11 {
            font-size: 14px;
        }

        style
        .p-r-10 {
            padding-right: 10px;
        }

        .trash {
        / / color: red;
        }

        .favorite {
            /*background-color: #ffe1c2 !important;*/
        }

        .spe {
            -ms-transform: rotate(180deg); /* IE 9 */
            -webkit-transform: rotate(180deg); /* Chrome, Safari, Opera */
            transform: rotate(180deg);
        }
    </style>
@endsection
@section('content')
    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                <div class="row">
                    <div class="col-9">
                        {!! trans('trabajo.tablatitulo') !!}
                        @if(count($applications) !=0)
                            <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! count($applications )!!}
                        </span>
                    </span>
                        @endif

                    </div>
                    <div class="col-3 pull-right">
                        <a href="{!! route('StudClientes.index') !!}"
                           class="save btn btn-warning glow_button pull-right">
                            {!! trans('users.return') !!}
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        {{--
                        <div class="col-12 col-md-6 offset-md-3 text-center">
                            @foreach(trans('horse.raza')  as $k =>$v)
                                @php($ht = count(\Auth::user()->Horses()->where('raza',$k)->get()))
                                @if($ht!=0)
                                    <span class="badge badge-warning">
                                <b>{!! $ht !!}</b>
                                        {!! $v !!}
                            </span>
                                @endif
                            @endforeach

                        </div>
--}}


                        <div class=" col-12 table-responsive noSwipe m-t-25 ">

                            <table class="table table-striped table-hover " cellspacing="0" id="tabla">
                                <thead>
                                <tr>
                                    @foreach($columns as $k=>$v)

                                        <th {{--style="@if($k == 'status')width: 160px; @endif"--}}>
                                            {!! $v !!}
                                        </th>
                                    @endforeach
                                    <th>{!! trans('users.see') !!}</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($applications as $c)


                                    <tr class="horse_{!! $c->id !!}" data-id="{!! $c->id !!}">
                                        @foreach($columns as $k=>$v)
                                            <td>
                                                @if($k == "doma")
                                                    @if($c->doma == true or $c->doma == 1)
                                                        {!! trans('horse.doma.1') !!}
                                                    @else
                                                        {!! trans('horse.doma.0') !!}
                                                    @endif
                                                @elseif($k == "country_id")
                                                    @if(!empty($c->Country()->first()))
                                                        {!! $c->Country()->first()->name !!}
                                                    @endif
                                                @elseif($k=="img")

@if(!empty($c->foto))
                                                    @include('backend.common.galleryimage',
                                                    [
                                                    'titulo'=>$c->name,
                                                    'id'=>$c->id,
                                                    'imagen'=>$c->foto,
                                                    'adminpanel'=>1,

                                                    'size'=>''
                                                    ])
@endif
                                                @elseif($k == "age")

                                                    {!! $c->Anio()!!}


                                                @elseif($k == "state_id")
                                                    @if(!empty($c->State()->first()))

                                                        {!! $c->State()->first()->name !!}
                                                    @endif


                                                @elseif($k == "created_at")
                                                    {!! Funciones::AjustarFechaDmySlash($c->created_at)!!}


                                                @elseif($k == "skills")
                                                    @php($ski = $c->getSkills())
                                                    @foreach($ski as $r=>$s)
                                                        {!! trans('categorias.trabajo.'.$s) !!}<br>
                                                    @endforeach

                                                @else
                                                    {{$c->{$k} }}
                                                @endif
                                            </td>
                                        @endforeach

                                        <td class="row">
                                            {{--@include('backend.content.horse.botones.index',['modelo'=>$c])--}}
                                            <a href="{!! route('Aplications.show',['id'=>$c->id]) !!}" class="p-r-10"
                                               data-toggle="toottip" data-trigger="hover" title="Ver"
                                                    {{--data-content="Editar"--}}
                                            >
                                                <i class="fa fa-eye text-success"></i>
                                            </a>

                                            {{--
                                            @include('backend.content.horse.botones.dropdown',['modelo'=>$c])
                                            <a href="{!! route('horse.edit',['id'=>$c->id]) !!}" class="p-r-10"
                                               data-toggle="popover"data-trigger="hover"  title="Editar" data-content="Editar"
                                            >
                                                <i class="fa fa-pencil text-success"></i>
                                            </a>
                                            @php
                                                $favo = $c->favorite;
                                                if($favo == 1){
                                                $vasi = '';
                                                $vano='hidden-xl-down';
                                                }else{
                                                $vano = '';
                                                $vasi='hidden-xl-down';
                                                }
                                            @endphp

                                            <a href="javascript:void(0);" id="favorite_si_{!! $c->id !!}"
                                               data-toggle="popover" data-trigger="hover" title="Favorito" data-content="Favorito"
                                               onclick="setfav({!! $c->id !!},0)"
                                               class=" {!! $vasi !!} p-r-10 ">
                                                <i class="fa fa-star star star-small"> </i>
                                            </a>
                                            <a href="javascript:void(0);" id="favorite_no_{!! $c->id !!}"
                                               data-toggle="popover" data-trigger="hover" title="Favorito" data-content="Favorito"
                                               onclick="setfav({!! $c->id !!},1)"
                                               class=" {!!$vano !!} p-r-10 ">
                                                <i class="fa fa-star-o star star-small"> </i>
                                            </a>
                                            <a href="javascript:void(0);"
                                               data-toggle="popover" data-trigger="hover" title="Borrar" data-content="Borrar"
                                               onclick="deleteit({!! $c->id !!})"
                                               class="p-r-10"
                                            >
                                                <i class="fa fa-trash text-danger trash"> </i>
                                            </a>
                                            <a href="javascript:void(0);"
                                               data-toggle="popover" data-trigger="hover" title="Exportar" data-content="Exportar"
                                               onclick=" exportar({!! $c->id !!})"
                                               class="p-r-10 "
                                            >
                                                <i class="fa fa-share "> </i>
                                            </a>
--}}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{--
                                                <div class="offset-3 col-6 text-center ">
                                                    {{$applications->render()}}
                                                </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('bottomjs')
    <script>
        $(document).ready(function () {


            $(window).hover(function () {
                cargarimagenes();
                $('tr[data-fav="1"]').addClass('favorite');
            });
            $('#tabla tbody').on('click', 'tr', function () {
                console.log('clicl');
                //var data = table.row(this).data();
                //alert('You clicked on ' + data[0] + '\'s row');
            });
        });

        function deleteit(id) {
            var dat = new FormData();
            dat.append('seti', '');
            var url = "{!! route('caballoc.del') !!}" + "/" + id;
            swal({
                title: '{!! trans('users.usure') !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: 'Deseas borrar el caballo?',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                $.ajax({
                    url: url,
                    data: dat,
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'csrftoken': token,
                    },
                    contentType: false,
                    processData: false,
                    async: false,
                    type: 'POST',
                    success: function (data) {
                        var s = $.parseJSON(data);
                        if (s === 1) {
                            //no fav
                            $('.horse_' + id).addClass('hidden-xl-down').prop('checked', false);
                        }
                    },
                    error:
                        function (xhr, status, error) {
                            var v = $.parseJSON(xhr.responseText);
                            console.error('error');
                            console.dir(v);
                        }
                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! trans('users.canceltask') !!}',
                        '{!! trans('users.cancelmodal') !!}',
                        'error'
                    )
                }
           });


            dat = null;

        }

        function setfav(id, valu) {
            //caballoc.fav
            var dat = new FormData();
            dat.append('seti', valu);
            var url = "{!! route('caballoc.fav') !!}" + "/" + id;
            $.ajax({
                url: url,
                data: dat,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                async: false,
                type: 'POST',
                success: function (data) {
                    var s = $.parseJSON(data);
                    console.dir(s)
                    if (s === 0) {
                        //no fav
                        //$('tr[data-id=128]').removeClass('favorite');
                        $('tr[data-id=' + id + ']').removeClass('favorite').attr('data-fav', 0);
                        $('#favorite_si_' + id).addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_no_' + id).removeClass('hidden-xl-down').prop('checked', true);
                    } else {
                        //fav
                        $('tr[data-id=' + id + ']').addClass('favorite').attr('data-fav', 1);
                        $('#favorite_no_' + id).addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_si_' + id).removeClass('hidden-xl-down').prop('checked', true);
                    }
                },
                error:
                    function (xhr, status, error) {
                        var v = $.parseJSON(xhr.responseText);
                        console.error('error');
                        console.dir(v);
                    }
            });
            dat = null;

        }

                @if(\Session::has('facebook'))
        var tace = "{!! \Session::get('facebook') !!}";
        swal({
            title: 'Puedes compartir el caballo {!! \Session::get('horse_name') !!} por facebook',
            type: 'success',
            showCancelButton: true,
            confirmButtonText: '{!! trans('text.yes') !!}',
            cancelButtonText: '{!! trans('text.no') !!}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonColor: '#4fb7fe',
            html: '¿Quieres compartirlo ahora?',
            cancelButtonColor: '#EF6F6C',
            buttonsStyling: false
        }).then(function () {
            window.open('https://www.facebook.com/sharer.php?u=' + tace, 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');
            {{--window.open(tace, 'Compartir caballo', "resizable=no,height=200,scrollbars=no");--}}
        }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                    '{!! trans('users.canceltask') !!}',
                    '{!! trans('users.cancelmodal') !!}',
                    'success'
                )
            }
       });
        {!! \Session::forget('facebook') !!}
        {!! \Session::forget('horse_name') !!}

        @endif


    </script>
    {{--@include('backend.common.exportar')--}}
@endsection

<!--var table = $('#tabla').dataTable({
"order": [[0, "asc"]],
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

-->
