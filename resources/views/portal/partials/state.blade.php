@php
    $label = (isset($label))?$label:trans('stud.text.state');
    $place = (isset($place))?$place:trans('stud.placeholder.state');

@endphp
    <select class=" form-control" data-style="btn-primary"
            id="state"
            name="state"
            disabled="true"
            placeholder="{!! $place !!}">
        <option data-tokens="0" value="0">
            {!! trans('state.chooseme') !!}
        </option>
    </select>
