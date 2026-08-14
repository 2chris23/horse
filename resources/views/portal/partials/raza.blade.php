@php
    $seleccionado = (isset($seleccionado))?$seleccionado:0;
    $principales = \App\Http\Controllers\PublicController::ArrayRazaPrincipal();
    $secundarios = \App\Http\Controllers\PublicController::ArrayRazaSecundaria();
//dd($principales);


@endphp

<select class=" form-control" data-style="btn-primary" id="seleccion" name="raza"
        placeholder="{{trans('stud.placeholder.country')}}">
    <option data-tokens="0" value="0" selected>
        {!! trans('portal.allra') !!}
    </option>
    @if(count($principales != 0))
        <optgroup label="{!! trans('users.recomended') !!}">
            @for($i = 0;$i<count($principales);$i++)
                {{--@foreach($principales as $k=>$v)--}}
                @php($v = $principales[$i])
                <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                        @if($seleccionado == $v['id']) selected @endif>{!! trans('horse.raza.'.$v['id']) !!}
                </option>
            @endfor
            {{--@endforeach--}}
        </optgroup>
    @endif

    {{--<optgroup label=""> </optgroup>--}}
    <optgroup label="_______________________">
        @for($i = 0;$i<count($secundarios);$i++)
            {{--@foreach($secundarios as $k=>$v)--}}
            @php($v = $secundarios[$i])
            @if($v['id'] != 29)
            <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                    @if($seleccionado == $v['id']) selected @endif>{!!  trans('horse.raza.'.$v['id']) !!}</option>
            @endif
            {{--@endforeach--}}
        @endfor
    </optgroup>

    <optgroup label="_______________________">
        @for($i = 0;$i<count($secundarios);$i++)
            {{--@foreach($secundarios as $k=>$v)--}}
            @php($v = $secundarios[$i])
            @if($v['id'] == 29)
                <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                        @if($seleccionado == $v['id']) selected @endif>{!!  trans('horse.raza.'.$v['id']) !!}</option>
            @endif
            {{--@endforeach--}}
        @endfor
    </optgroup>
{{--
    @if(count($principales != 0))
        @foreach(\App\Http\Controllers\PublicController::ArrayRazaPrincipal() as $k=>$v)
            <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                    @if($seleccionado == $v['id']) selected @endif>{!! trans('horse.raza.'.$v['id']) !!}</option>
        @endforeach

    @endif


    @foreach(\App\Http\Controllers\PublicController::ArrayRaza() as $k=>$v)
        <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                @if($seleccionado == $v['id']) selected @endif>{!!  trans('horse.raza.'.$v['id']) !!}</option>
    @endforeach
--}}

</select>

