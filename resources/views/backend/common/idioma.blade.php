@php
    $seleccionado = \Session::get('lang');
    $seleccionado = App::getLocale();
/*
$lng['en']="English";
$lng['de']="Deutsch";
$lng['es']="Español";
$lng['fr']="Français";
$lng['it']="Italiano";
$lng['nl']="Nederlands";
$lng['pt']="Português";
*/
$lng = \Config::get('lenguaje')


/*{!! trans('country.name.'.$v['id']) !!}*/
@endphp

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
    <div class="form-group row">
        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
            {!! trans('users.chooseyoulenguaje') !!} :

        </label>
        <div class="col-xs-10 col-sm-10 col-md-6">
            <select class=" form-control" data-style="btn-primary" id="lang" name="lang"
                    placeholder="{{trans('stud.placeholder.country')}}">
                @foreach($lng as $k=>$v)
                    <option data-tokens="{!! $k !!}" value="{!! $k !!}"
                            @if($seleccionado == $k) selected @endif>{!! $v !!}</option>
                @endforeach

            </select>
        </div>
    </div>
</div>


<script>
    function changelan(id) {

        if(id==undefined ) id = $('#lang').val();
        if(id==null ) id = $('#lang').val();
        var url = '{!! route('lengauje') !!}/' + id;
        console.log(url);
        window.location.replace(url);


    }
</script>