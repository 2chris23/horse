<?php $etiquetalabel = "col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-sm-left text-md-left text-lg-right "; ?>
<?php $tiquetainput = " col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 "; ?>
@php
    $seleccionado = (isset($seleccionado))?$seleccionado:0;
    $principales = \App\Http\Controllers\PublicController::ArrayRazaPrincipal();
    $secundarios = \App\Http\Controllers\PublicController::ArrayRaza();
//dd($principales);


@endphp
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
    <div class="form-group row">
        <label class="{!! $etiquetalabel !!}">
            {{trans('horse.text.raza')}} :
        </label>
        <div class="{!! $tiquetainput !!}">
            <select class=" form-control"
                    data-style="btn-primary"
                    id="input_horse_raza"
                    name="raza"
                    placeholder="{{trans('stud.placeholder.country')}}">
                @if(count($principales != 0))
                    <optgroup label="{!! trans('users.recomended') !!}">
                        @foreach(\App\Http\Controllers\PublicController::ArrayRazaPrincipal() as $k=>$v)
                            <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                                    @if($seleccionado == $v['id']) selected @endif>{!! trans('horse.raza.'.$v['id']) !!}</option>
                        @endforeach
                    </optgroup>
                @endif

                <optgroup label="">
                </optgroup>
                <optgroup label="_______________________">
                    @foreach(\App\Http\Controllers\PublicController::ArrayRaza() as $k=>$v)
                        @if($v['id'] !== 29)
                        <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                                @if($seleccionado == $v['id']) selected @endif>{!!  trans('horse.raza.'.$v['id']) !!}</option>
                        @endif
                    @endforeach
                </optgroup>



                    <optgroup label="_______________________">
                        @foreach(\App\Http\Controllers\PublicController::ArrayRaza() as $k=>$v)
                            @if($v['id'] == 29)
                            <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                                    @if($seleccionado == $v['id']) selected @endif>{!!  trans('horse.raza.'.$v['id']) !!}</option>
                            @endif
                        @endforeach
                    </optgroup>

            </select>
        </div>
    </div>
</div>
