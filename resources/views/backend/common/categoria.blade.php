@php
    $seleccionado = (isset($seleccionado))?$seleccionado:0;
    $requerido = (isset($requerido))?$requerido:'';
    $principales = trans('stud.categoriacontacto');

/*{!! trans('country.name.'.$v['id']) !!}*/
@endphp
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
    <div class="form-group row">
        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
            {{trans('stud.text.category')}} :
        </label>
        <div class="col-xs-10 col-sm-10 col-md-6">
            <select class=" form-control" data-style="btn-primary" id="categoria" name="categoria"
                    {!! $requerido !!} onchange="cambiarcat();"
                    placeholder="{{trans('stud.placeholder.category')}}">
                        @foreach($principales as $k=>$v)
                            <option data-tokens="{!! $k !!}" value="{!!  $k !!}"
                                    @if($seleccionado ==  $k) selected @endif>{!! $v !!}</option>
                        @endforeach

            </select>
        </div>
    </div>
</div>
