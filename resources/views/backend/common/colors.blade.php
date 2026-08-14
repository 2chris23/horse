@php($etiquetalabel = "col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-sm-left text-md-left text-lg-right ")
@php($tiquetainput = " col-xs-12 col-sm-12 col-md-9 col-lg-6 col-xl-6")
@php($validacion =(isset($validacion)?$validacion:0))

@php
    $seleccionado = (isset($seleccionado))?$seleccionado:0;

    //$color = \App\Http\Controllers\PublicController::ArrayColor();
        $color = trans('horse.color');
        $color = Publico::ArrayColor();



@endphp
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
    <div class="form-group row">
        <label class="{!! $etiquetalabel !!}">
            {{trans('color.text.select')}}
        </label>
        <div class="{!! $tiquetainput !!}" >
            <select class=" form-control" data-style="btn-primary" id="colorselect" name="colorselect"
                    placeholder="{{trans('color.placeholder.color')}}"
                    @if($validacion == 1)onchange="campos()"@endif
            >
                @foreach($color as $k=>$v)
                    <option data-tokens="{!! $k !!}" value="{!! $k !!}"
                            @if($seleccionado == $k) selected @endif>{!! trans('horse.color.'.$k) !!}</option>
                @endforeach

            </select>
        </div>
    </div>
</div>
