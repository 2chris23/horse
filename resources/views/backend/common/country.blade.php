<?php
    $seleccionado = (isset($seleccionado))?$seleccionado:0;
    $requerido = (isset($requerido))?$requerido:'';

    $principales = \App\Http\Controllers\PublicController::ArrayPaisPrincipal();

    $secundarios = \App\Http\Controllers\PublicController::ArrayPais();
/*{!! trans('country.name.'.$v['id']) !!}*/
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
    <div class="form-group row">
        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
            {{trans('stud.text.country')}}:
        </label>
        <div class="col-xs-10 col-sm-10 col-md-6">
            <select class=" form-control" data-style="btn-primary" id="country" name="country" {!! $requerido !!}
                    placeholder="{{trans('stud.placeholder.country')}}">
                @if(count($principales) != 0)
                    <optgroup label="{!! trans('users.recomended') !!}">
                        @foreach($principales as $k=>$v)
                            <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                                    @if($seleccionado == $v['id']) selected @endif>{!! $v['name'] !!}</option>
                        @endforeach
                    </optgroup>
                @endif
                @if(count($secundarios) != 0)
                    <optgroup label="_______________________">
                        @foreach($secundarios as $k=>$v)
                            <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                                    @if($seleccionado == $v['id']) selected @endif>{!! $v['name'] !!}</option>
                        @endforeach
                    </optgroup>
                @endif
            </select>
        </div>
    </div>
</div>
