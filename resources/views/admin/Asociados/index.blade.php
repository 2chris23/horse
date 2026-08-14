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
                <div class="row">
                    <div class="col-9">
                        Listado de Asociados
                        @if(count($users) !=0)
                            <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! count($users )!!}
                        </span>
                    </span>
                        @endif


                    </div>
                    <div class="col-3  text-right ">
                        <div class="row">
                            <div class="col-6 ">
                                <a href="{!! route('Asociados.new') !!}"
                                   class="save btn btn-block btn-success glow_button">{!! trans('clientes.new') !!}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <div class=" col-12 table-responsive noSwipe m-t-20">
                            <table id="TablaAdmin" class="table table-striped table-hover" cellspacing="0"
                                   data-url="{!! route('HorsesIndexAdmin') !!}" data-token="{!! csrf_token() !!}">
                                <thead>
                                <tr>
                                    @foreach($columns as $v)
                                        <th>
                                            {!! trans('asociados.campos.'.$v) !!}
                                        </th>
                                    @endforeach
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $c)
                                    <tr>
                                        @foreach($columns as $k)
                                            <td>
                                                @if($k=='stud')

                                                    {!! $c->getPriceMil() !!}
                                                @elseif($k == "action")

                                                    @if(count($repor->toArray())!=0)
                                                        REPORTES
                                                        <span style="padding-left:10px;">
                                                            <span class="badge badge-pill badge-danger notifications_badge_top">
                                                                {!! count($repor->toArray()) !!}
                                                            </span>
                                                        </span>
                                                        <br>
                                                    @endif

                                                    <a href="#!" class="dropify-clear"
                                                       onclick="erasehorse(this,{{$c->id}})">
                                                        <i class="fa fa-trash" aria-hidden="true">
                                                        </i>
                                                    </a>
                                                @else
                                                    {!! $c->{$k} !!}
                                                @endif
                                            </td>

                                        @endforeach
                                        <td>
                                            <a href="{!! route('Asociados.edit',['user'=>$c->id]) !!}">Editar</a>

                                            <a class="botoness"
                                               href="{!! route('LoginAsGet',['id'=>$c->id]) !!}">
                                                <i class="fa fa-exchange pad-5-5"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 text-center">
                            {!! $users->render() !!}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottomjs')
    <script>

        function erasehorse(el, id) {
            var url = "{!! route('caballo.borrar') !!}";
            var form = new FormData();
            form.append('horse_id', id);
            swal({
                title: 'Borrar un caballo',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! trans('users.usuredeletehorse') !!}',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                axios.post(url, form)
                    .then(function (response) {
                        var r = response.data;
                        $(el).parent().parent().remove();
                        swal(
                            '{!! trans('users.applychange') !!}',
                            r.sms,
                            'success'
                        );

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
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! trans('users.canceltask') !!}',
                        '{!! trans('users.canceltaskbyuser') !!}',
                        'error'
                    )
                }
            });
        }


        $(window).hover(function () {
            cargarimagenes();
        });
    </script>
@endsection