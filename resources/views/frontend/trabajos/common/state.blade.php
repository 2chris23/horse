@php
    $label = (isset($label))?$label:trans('stud.text.state');
    $place = (isset($place))?$place:trans('stud.placeholder.state');
$requerido = (isset($requerido))?$requerido:'';
@endphp


<select class="w100 pais selectn" data-style="btn-primary" {!! $requerido  !!} id="state"
        name="state"
        disabled=true
        placeholder="{!! $place !!}">
    <option data-tokens="0" value="0">
        {!! trans('state.chooseme') !!}
    </option>
</select>
