@php $seleccionado = (isset($seleccionado))?$seleccionado:''; $principales = \App\Http\Controllers\PublicController::ArrayDominio($seleccionado); $extension = \App\Http\Controllers\PublicController::ObtenerExtensionDominio($seleccionado); $urlbase =(isset($urlbase))?$urlbase:''; /*{!! trans('country.name.'.$v['id']) !!}*/ @endphp
<div class="col-12 row m-t-35"><label
            class=" col-xs-3 col-sm-3 col-md-3 col-lg-3 text-sm-left text-md-left text-lg-right col-form-label text-lg-left"> {!! trans('desing.domain') !!}
        : </label>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 row">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">www.</span>
            <input id="domain_id" type="text" name="domain" placeholder="{{trans('stud.placeholder.name')}}"
                   value="{!! $urlbase !!}" class="form-control editable" aria-describedby="basic-addon3"
                   style=" width: 56%;">
            <select class=" form-control editable selfix w-p-30" data-style="btn-primary" id="dom_extension"
                    name="dom_extension" placeholder="" aria-describedby="basic-addon3 ">
                @if(count($principales) != 0)
                    @foreach($principales as $k=>$v)
                        <option data-tokens="{!! $v !!}" value="{!! $v !!}" @if($extension == $v) selected @endif>
                            {!! $v !!}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>
