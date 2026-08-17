@php
        $label = (isset($label))?$label:trans('stud.text.state');
        $place = (isset($place))?$place:trans('stud.placeholder.state');
$requerido = (isset($requerido))?$requerido:'';
        @endphp

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
    <div class="form-group row">
        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
            {!! $label !!}:
        </label>
        <div class="col-xs-10 col-sm-10 col-md-6">
            <select class=" form-control" data-style="btn-primary" {!! $requerido  !!}
                    id="state"
                    name="state"
                    disabled=true
                    placeholder="{!! $place !!}">
                <option data-tokens="0" value="0">
                    {!! trans('state.chooseme') !!}
                </option>
            </select>
        </div>
    </div>
</div>
