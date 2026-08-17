@php
    $seleccionado = (isset($seleccionado))?$seleccionado:0;
    $principales = \App\Http\Controllers\PublicController::ArrayPaisPrincipal();
    $secundarios = \App\Http\Controllers\PublicController::ArrayPais(1);
/*{!! trans('country.name.'.$v['id']) !!}*/
$mx = \Session::get('mexico');
  $spa = \Session::get('espana');
  $colombia = \Session::get('colombia');
   if($mx == true){
       $pais = \Session::get('pais_id');
   }elseif($spa == true){
       $pais = \Session::get('pais_id');
   }elseif($colombia == true){
       $pais = \Session::get('pais_id');
   }else{
       $pais = null;
   }
$mx = !empty($mx)?$mx:false;
$spa = !empty($spa)?$spa:false;
$colombia = !empty($colombia)?$colombia:false;
@endphp


<select class=" form-control" data-style="btn-primary" id="country" name="country"
        placeholder="{{trans('stud.placeholder.country')}}">
    <option data-tokens="0" value="0" selected>
        {!! trans('portal.allra') !!}
    </option>
    @if(!empty($principales) && count($principales) != 0)
        <optgroup label="{!! trans('users.recomended') !!}">
            @foreach($principales as $k=>$v)
                <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                        @if($seleccionado == $v['id']) selected @endif>{!! $v['name'] !!}</option>
            @endforeach
        </optgroup>
    @endif
    @if(!empty($secundarios) && count($secundarios) != 0)
        <optgroup label="_______________________">
            @foreach($secundarios as $k=>$v)
                <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                        @if($seleccionado == $v['id']) selected @endif>{!! $v['name'] !!}</option>
            @endforeach
        </optgroup>
    @endif
</select>

@if(!empty($pais))
            <script>

                $(window).on('load', function () {
                    $('#country').on("select2:select", function (e) {
                        Envio(1);
                    }).on("change", function (e) {
                        Envio(1);
                    });
                    @if(!empty($country))
                    window.setTimeout(function () {
                        $('#country').val({!! $pais !!}).trigger('change');
                    }, 3000);
                    @endif
                });

            </script>
            @endif
