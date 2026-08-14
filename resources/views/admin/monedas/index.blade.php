@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )

@section('topcss')
    <style>

        .pad-5-5 {
            padding-left: 5px;
            padding-right: 5px;
        }

        .badge-danger {
            background-color: #EF6F6C;
        }

        .badge-danger[href]:focus, .badge-danger[href]:hover {
            background-color: #ea423e;
        }
    </style>
@endsection
@section('content')

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                <div class="col-9">
                    Listado de monedas
                    @if(count($monedas) !=0)
                        <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! count($monedas )!!}
                        </span>
                    </span>
                    @endif
                </div>
                {{--
                <div class="col-3">
                    Regresar aqui

                </div>
                --}}
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        {{--
                        <div class="offset-9 col-3  text-right ">
                            <div class="row">
                                <div class="col-6 ">
                                    <a href="{!! route('clientes.create') !!}"
                                       class="save btn btn-block btn-success glow_button">{!! trans('clientes.new') !!}</a>
                                </div>
                            </div>
                        </div>
                        --}}
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

                                @foreach($monedas as $c)
                                    <tr id="moneda_{!! $c->id !!}">
                                        @foreach($columns as $k=>$v)
                                            <td>

                                                @if($k=='updated_at')
                                                    {!! Funciones::AjustarFechaDmySlashHms($c->updated_at) !!}
                                                @elseif($k=='nombre')
                                                    <a href="#!" onclick="Editar({!! $c->id !!})" class="subraya">
                                                        {!! $c->{$k} !!}

                                                    </a>

                                                @elseif($k=='status')
                                                    <a href="#link_{!! $c->id !!}" id="link_{!! $c->id !!}"
                                                       onclick="Active($('#link_{!! $c->id !!}'),$('#moneda_{!! $c->id !!}'),{!! $c->id !!})"
                                                       data-id="{!! $c->status !!}">
                                                        @if($c->status == 0)
                                                            <span><i class="fa fa-minus"></i> Inactivo </span>
                                                        @else
                                                            <span><i class="fa text-success fa-check"></i> Activo </span>
                                                        @endif
                                                    </a>

                                                @elseif($k=='valor')
                                                    <span id="valor_{!! $c->id !!}">
                                                        {!! $c->{$k} !!}
                                                    </span>
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
    <script>
        function Editar(id) {
            var url = "{!! route('Monedas.data') !!}";
            var form = new FormData();
            form.append('id', id);
            axios.post(url, form)
                .then(function (response) {
                    var r = response.data.data;
                    r = $.parseJSON(r);
                    console.dir(r);


                    var text = '<form id="editormoneda" class="row"> ' +
                        '    <div class="m-t-15 col-12 row"> ' +
                        '        <div class="form-group text-left col-12"> ' +
                        '            <label for="dd4" class="col-form-label text-left"> ' +
                        '                Nombre de la moneda: ' +
                        '            </label> ' +
                        '            <div class="input-group text-left"> ' +
                        '                <input type="text" class="form-control b_r_20 eml intok" value="' + r.nombre + '" name="nombre" placeholder="Nombre de la moneda" ' +
                        '                > ' +
                        '            </div> ' +
                        '        </div> ' +
                        '        <div class="form-group text-left col-12"> ' +
                        '            <label for="dd4" class="col-form-label text-left"> ' +
                        '                Nombre Corto: ' +
                        '            </label> ' +
                        '            <div class="input-group text-left"> ' +
                        '                <input type="text" class="form-control b_r_20 eml intok" value="' + r.small + '" name="small" placeholder="Nombre corto" ' +
                        '                > ' +
                        '            </div> ' +
                        '        </div> ' +
                        '        <div class="form-group text-left col-12"> ' +
                        '            <label for="dd4" class="col-form-label text-left"> ' +
                        '                Simbolo: ' +
                        '            </label> ' +
                        '            <div class="input-group text-left"> ' +
                        '                <input type="text" class="form-control b_r_20 eml intok" value="' + r.simbolo + '" name="simbolo" placeholder="Simbolo de la moneda" ' +
                        '                > ' +
                        '            </div></div></div></form>'
                    ;
                    swal({
                        title: 'Datos de la moneda',
                        /*type: 'info',*/
                        html: text,
                        showCloseButton: true,
                        showCancelButton: true,
                        confirmButtonColor: '#fa6900',
                        focusConfirm: false,
                        confirmButtonText: 'Guardar',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                        cancelButtonText: '{!! trans('users.cancel') !!}',
                        cancelButtonAriaLabel: 'Thumbs down',
                    }).then(function () {
                        var form = new FormData(document.getElementById('editormoneda'));
                        form.append('id', id);
                        axios.post("{!! route('Monedas.save') !!}", form)
                            .then(function (response) {
                                r = response.data.data;
                                var sim = r.simbolo;
                                var sn = r.small;
                                SucP('Actualización Exitosa para<br>' + r.nombre, 'Simbolo ' + sim + "<br>Nombre corto " + r.small);

                            })
                            .catch(function (error) {
                                console.error(error);
                                WarP('Problemas con la actualizacion de la moneda');
                            });

                    });


                })
                .catch(function (error) {

                    var e = error.response.data;
                    var v = e.sms;
                    swal({
                        title: '{!! trans('users.tittleerror') !!}',
                        html: '{!! trans('users.someerror') !!}<br>' + v,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                });
        }


        function Active(link, linea, id) {
            var dato = $(link).attr('data-id');
            var url = "{!! route('Monedas.status') !!}";
            var form = new FormData();
            form.append('moneda', id);
            form.append('st', dato);
            axios.post(url, form)
                .then(function (response) {
                    var r = response.data;
                    $('#valor_' + id).html(r.valor);
                    $('#link_' + id).attr('data-id', r.activa).html(r.texto);
                })
                .catch(function (error) {

                    var e = error.response.data;
                    var v = e.sms;
                    swal({
                        title: '{!! trans('users.tittleerror') !!}',
                        html: '{!! trans('users.someerror') !!}<br>' + v,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                });

        }
    </script>
@endsection
