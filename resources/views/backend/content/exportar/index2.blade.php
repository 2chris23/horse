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
            /* color: red;*/
        }

        /*
                .favorite {
                    background-color: #ffe1c2 !important;
                }
        */
        .spe {
            -ms-transform: rotate(180deg); /* IE 9 */
            -webkit-transform: rotate(180deg); /* Chrome, Safari, Opera */
            transform: rotate(180deg);
        }

        .seleccionado {
            background-color: #ff9933 !important;
            color: white;
            -webkit-transition: all 0.5s ease-out;
            -moz-transition: all 0.5s ease-out;
            -ms-transition: all 0.5s ease-out;
            -o-transition: all 0.5s ease-out;
            transition: all 0.5s ease-out;
        }

        .nm {

            -webkit-transition: all 0.5s ease-out;
            -moz-transition: all 0.5s ease-out;
            -ms-transition: all 0.5s ease-out;
            -o-transition: all 0.5s ease-out;
            transition: all 0.5s ease-out;
        }
    </style>
@endsection
@section('content')
    {!! \Session::forget('horse') !!}

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                <div class="row">
                    <div class="col-9">
                        {!! trans('horse.horselist') !!}

                        @if(count($horses) !=0)
                            <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! count($horses )!!}
                        </span>
                    </span>
                        @endif

                    </div>
                    <div class="col-3 pull-right">
                        <a href="{!! route('horse.create') !!}"
                           class="save btn btn-warning glow_button pull-right">{!! trans('horse.newhorse') !!}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <div class="col-12 row">
                            <div class="col-3 row">
                                <div class="col-4">
                                    <label for="sex">Sexo</label>
                                </div>
                                <div class="col-8">
                                    <select name="sex" id="sex" class="form-control">
                                        <option value="0">{!! trans('portal.allra') !!}</option>
                                        @foreach($sex as $k=>$v)
                                            <option value="{!! $v->sex !!}">{!! trans('horse.sex.'.$v->sex) !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3 row">
                                <div class="col-4">

                                    <label for="raza">Raza</label></div>
                                <div class="col-8">
                                    <select name="raza" id="raza" class="form-control">
                                        <option value="0">{!! trans('portal.allra') !!}</option>
                                        @foreach($raza as $k=>$v)
                                            <option value="{!! $v->raza !!}">{!! trans('horse.raza.'.$v->raza )!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3 row">
                                <div class="col-4">
                                    <label for="color">Color</label></div>
                                <div class="col-8">
                                    <select name="color" id="color" class="form-control">
                                        <option value="0">{!! trans('portal.allra') !!}</option>
                                        @foreach($raza as $k=>$v)
                                            <option value="{!! $v->color !!}">{!! trans('horse.color.'.$v->raza )!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
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

                        <div class="col-12  text-left m-t-20">
                            @foreach(trans('horse.sexs')  as $k =>$v)
                                @php($ht = count(\Auth::user()->Horses()->where('sex',$k)->get()))
                                @if($ht!=0)
                                    <span class="badge badge-warning font-11 sexy" data-val="{!! $k !!}">
                                <b>{!! $ht !!}</b>
                                        {!! $v !!}
                            </span>
                                @endif
                            @endforeach
                            @php($ts =  count(\Auth::user()->Horses()->where('tocubri',1)->get()))

                            @if($ts!=0)
                                <span class="badge badge-warning font-11">
                                <b>{!! $ts !!}</b>
                                    {!! trans('horse.text.cubricions') !!}
                            </span>
                            @endif
                        </div>
                        <form class=" col-12 table-responsive noSwipe m-t-25 "
                              action="{!! route('exportar.indexpost') !!}" method="post">
                            {!! csrf_field() !!}
                            <table class="table table-striped table-hover " cellspacing="0" id="tabla">
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
                                @foreach($horses as $c)
                                    <tr data-sex="{!! $c->sex !!}" data-color="{!! $c->color !!}"
                                        data-raza="{!! $c->raza !!}" class="nm horse_{!! $c->id !!}"
                                        data-id="{!! $c->id !!}"
                                        data-visita="{!! $c->getVisitantes() !!}"
                                        id="horse_{!! $c->id !!}"
                                        {{--
                                        @if( $c->getVisitantes()  !=0 )
                                        data-toggle="tooltip" title="Visitas {!! $c->getVisitantes() !!}"
                                        @endif
                                        --}}
                                        @if(($c->favorite) == true)   data-fav='{!! $c->favorite !!}'@endif >
                                        @foreach($columns as $k=>$v)

                                            <td>

                                                @if($k == "doma")
                                                    @if($c->doma == true or $c->doma == 1)
                                                        {!! trans('horse.doma.1') !!}
                                                    @else
                                                        {!! trans('horse.doma.0') !!}
                                                    @endif
                                                @elseif($k == "img")
                                                    @php($i = 0)
                                                    @foreach($c->getPhotoModel() as $o=>$p)
                                                        @if($i == 0)
                                                            @include('backend.common.galleryimage',['titulo'=>$p->getName(),'id'=>$p->id,'imagen'=>$p->getUrl(),'adminpanel'=>1,'size'=>$p->Size()])
                                                            @php($i=1)
                                                        @endif
                                                    @endforeach

                                                @elseif($k == "sel")
                                                    <input type="checkbox" name="horsesel[]" value="{!! $c->id !!}"
                                                           id="ck_{!! $c->id !!}">

                                                @elseif($k == "color")
                                                    {!! $c->getColorString() !!}

                                                @elseif($k == "raised")
                                                    {!! $c->getRaisedFormat() !!}

                                                @elseif($k == "sex")
                                                    {!! trans('horse.sex.'.$c->sex) !!}

                                                @elseif($k == "price")
                                                    @if(!empty($c->price) )

                                                        @if($c->price !=0)
                                                            {!! $c->ObtenPrecioMonedaMill() !!}
                                                            {!! $c->getSimboloMoneda() !!}

                                                            {{--{!! $c->getPriceMil() !!} €--}}
                                                        @endif
                                                    @else
                                                        @if($c->getTosold() == true)
                                                            {!! trans('users.pricecheck1') !!}
                                                        @endif
                                                    @endif

                                                @elseif($k == "name")
                                                    <a href="{!! route('horse.edit',['id'=>$c->id]) !!}">
                                                        {{--<a href="{!! route('caballoc.e2',['id'=>$c->id]) !!}">--}}
                                                        {!! $c->{$k} !!}


                                                    </a>
                                                @elseif($k == "raza")
                                                    {!! trans('horse.raza.'.$c->raza) !!}

                                                @elseif($k == "birthdate")
                                                    {!! Funciones::AjustarFechaDmy($c->birthdate)!!}

                                                @elseif($k == "tosold")
                                                    @if($c->getTosold() == true)
                                                        {!! trans('horse.tosold.1') !!}

                                                    @endif
                                                @else
                                                    {!! $c->{$k} !!}
                                                @endif
                                            </td>
                                        @endforeach


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="col-9"></div>
                            <div class="col-4">
                                <input type="submit" value="enviar">
                            </div>
                        </form>
                        {{--
                                                <div class="offset-3 col-6 text-center ">
                                                    {{$horses->render()}}
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
        var tabless= null;

        $(document).ready(function () {


            tabless = $('#tabla').dataTable({
                "order": [[0, "asc"]],
                "pageLength": 5,
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
                $('tr[data-fav="1"]').addClass('favorite');
            });
            $('#tabla tbody').on('click', 'tr', function () {
                var ck = $('#ck_' + $(this).attr('data-id'));
                var at = ck.attr('checked');
                if (at === 'checked') {
                    ck.prop('checked', false).removeAttr('checked');
                    $(this).removeClass('seleccionado').attr('data-sel', 0);
                } else if (at === undefined) {
                    ck.prop('checked', true).attr('checked', 'checked');
                    $(this).addClass('seleccionado').attr('data-sel', 1);
                } else {
                    ck.prop('checked', true).attr('checked', 'checked');
                    $(this).addClass('seleccionado').attr('data-sel', 1);
                }
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

        function Vendido(id) {
            swal({
                title: 'Confirmacion de venta',
                type: 'success',
                showCancelButton: true,
                confirmButtonText: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '¿Haz vendido este caballo?',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {


                var url = "{!! route('horse.vendido') !!}" + "/" + id;
                var dat = new FormData();
                dat.append('seti', id);
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
                        '',
                        'success'
                    )
                }
           });
        }

        $('#sex').on('change', function () {
            var g = $('#sex').val();
            if (g !== '0') {
                $('[type=search]').val($('#sex option:selected').text()).trigger('keyup');
            } else {
                $('[type=search]').val('').trigger('keyup');
            }

       });
        $('#raza').on('change', function () {
            var g = $('#raza').val();
            if (g !== '0') {
                $('[type=search]').val($('#raza option:selected').text()).trigger('keyup');
            } else {
                $('[type=search]').val('').trigger('keyup');
            }
       });
        $('#color').on('change', function () {
            var g = $('#color').val();
            if (g !== '0') {
                $('[type=search]').val($('#color option:selected').text()).trigger('keyup');
            } else {
                $('[type=search]').val('').trigger('keyup');
            }
        });

        $('.sexy').on('click', function () {
            var val = $(this).attr('data-val');
            var s = $('#tabla').find('tr');
            $.each(s, function (k, v) {
                var ds = $(v).attr('data-sex');
                if (ds === val) {
                    var ck = $(val).find('[type="checkbox"]');
                    var at = ck.attr('checked');
                    if (at === 'checked') {

                    } else if (at === undefined) {
                        console.dir(at);
                        $(v).click()

                    }
                }

            });
       });
        function Special( datae,valor ){
            var selector = $('.dataTables_length').val();
            var cv = selector.val();
            $('.dataTables_length option[value="-1"]').attr('selected', 'selected').trigger('change');

            var s = $('#tabla').find('tr');
            $.each(s, function (k, v) {
                var ds = $(v).attr(datae);
                if (ds === valor) {
                    var ck = $(val).find('[type="checkbox"]');
                    var at = ck.attr('checked');
                    if (at === undefined) {
                        console.dir(at);
                        $(v).click()
                    }
                }

            });
            $('.dataTables_length option[value='+cv+']').attr('selected', 'selected').trigger('change');

        }
    </script>
    @include('backend.common.exportar')
@endsection
