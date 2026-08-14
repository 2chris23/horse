@php
    $numero = (isset($numero))?$numero:null;
    $nombre = (isset($nombre))?$nombre:'phone';
    $texto = (isset($texto))?$texto:trans('personal.text.phone');
    $place = (isset($place))?$place:trans('personal.placeholder.phone');
    $pais = (isset($pais))?$pais:'es';
    $exte = (isset($exte))?$exte:'34';
    $id = (isset($id))?$id:null;
$ta = rand(1000,9999);
$ts = rand(1000,9999);
$tt = rand($ta,$ts);

$cod = "c$id"."_"."$tt";

$ext = "e$id"."_"."$tt";
$bases ="$id"."_"."$tt"


@endphp
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
    <div class="form-group row">
        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
            {{ $texto }}:
        </label>
        <div class="col-xs-10 col-sm-10 col-md-6">

            <input type="tel"
                   placeholder="{{trans('personal.placeholder.phone')}}"
                   id="{!! $nombre !!}"
                   name="{!! $nombre !!}"
                   value="{!! $numero !!}"
                   data-base = "{!! $bases !!}"
                   class="form-control telefonos numbers {!! $cod !!} "
                   onkeyup="telefonos(this,'{{ $ext }}','{{ $cod }}')"
                   onchange="telefonos(this,'{{ $ext }}','{{ $cod }}')"
                   onkeydown="telefonos(this,'{{ $ext }}','{{ $cod }}')"
            >
        </div>
        <input type="hidden" id="id_{!! $nombre !!}" name="id_{!! $nombre !!}" value="{!! $id !!}">

    </div>
    <input type="hidden" class="ext" data-id="{{ $ext }}" id="ext_{!! $nombre !!}" name="ext_{!! $nombre !!}"
           value="{!! $exte !!}">
    <input type="hidden" class="extc" data-id="{{ $cod }}" id="extc_{!! $nombre !!}" name="extc_{!! $nombre !!}"
           value="{!! $pais !!}">
</div>

<script>

    function telefonos(el, ext, cod) {
        $('[data-id=' + ext + ']').val($(el).parent().find('.country-list').find('.active').attr('data-dial-code'));
        $('[data-id=' + cod + ']').val($(el).parent().find('.country-list').find('.active').attr('data-country-code'));
    }
    $(window).on('load', function () {
        @if(!empty($pais))
        $('.{!! $cod !!}').intlTelInput("setCountry", "{!! $pais !!}").intlTelInput("setNumber", "{!! $numero !!}");
        @endif
        $(".intl-tel-input").css('width', "100%");
        telefonos($('.{!! $cod !!}'), '{{ $ext }}', '{{ $cod }}');
    });


</script>