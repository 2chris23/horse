@extends('backend.layouts.base')
@section('title', trans('Titulos.NotificacionesDetalleStud',['asunto'=>$notification->asunto ]) )
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>
                    <div class="row">
                        <div class="col-9">
                            Asunto : {!! $notification->asunto !!}
                        </div>
                        <div class=" col-3 ">
                            <a href="{!! route('notifi.index') !!}" class=" btn btn-warning pull-right right"> Regresar
                                al listado</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 m-t-25">
                        @foreach($columns as $ck=>$cv)
                            @if($ck != 'asunto' and $ck != 'id')
                                @if($ck == 'created_at')
                                    <label for="">{!! $cv !!}:
                                        <strong>{{ Funciones::AjustarFechaDmy($notification->{$ck}) }}</strong></label>
                                    <br>
                                @else
                                    <label for="">{!! $cv !!}: <strong>{{ $notification->{$ck} }}</strong></label><br>

                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection
