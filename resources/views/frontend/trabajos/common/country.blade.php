@php
    $seleccionado = (isset($seleccionado))?$seleccionado:0;
    $requerido = (isset($requerido))?$requerido:'';

    $principales = \App\Http\Controllers\PublicController::ArrayPaisPrincipal();

    $secundarios = \App\Http\Controllers\PublicController::ArrayPais();
/*{!! trans('country.name.'.$v['id']) !!}*/
@endphp

<select class=" pais w100 selectn" data-style="btn-primary"  id="country" name="country" {!! $requerido !!} placeholder="{{trans('stud.placeholder.country')}}" required>>
    @if(count($principales != 0))
        <optgroup label="{!! trans('users.recomended') !!}">
            @foreach($principales as $k=>$v)
                <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                        @if($seleccionado == $v['id']) selected @endif>{!! $v['name'] !!}</option>
            @endforeach
        </optgroup>
    @endif
    @if(count($principales != 0))
        <optgroup label="_______________________">
            @foreach($secundarios as $k=>$v)
                <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                        @if($seleccionado == $v['id']) selected @endif>{!! $v['name'] !!}</option>
            @endforeach
        </optgroup>
    @endif
</select>
