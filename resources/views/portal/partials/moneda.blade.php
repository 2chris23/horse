@php($monedas= Funciones::Monedas())
@php($moneda = \Session::get('moneda'))
@php($moneda = !empty($moneda)?$moneda:'EUR')

<select class="form-control select moneda" name="moneda" id="moneda" data-placeholder="{!! trans('portal.placecolor') !!}" onchange="CambioMoneda()">
    @foreach($monedas  as $k=>$v)

        <option value="{!! $k !!}"
                @if($moneda == $k)
                selected
                @endif
        >
            {!! $v !!}
        </option>

    @endforeach
</select>
<script>
    function CambioMoneda(){
        var f = new FormData();
        f.append('moneda',$('#moneda').val());


        $.ajax({
            url: '{!! route('Moneda.ajax') !!}',
            data: f,
            headers: {
                'X-CSRF-TOKEN': token,
                'csrftoken': token,
            },
            contentType: false,
            processData: false,
            type: 'POST',
            success: function (data) {
                location.reload();
            },
            error:
                function (xhr, status, error) {
                }
        });
    }
    window.load=function () {

        $('#moneda').change(function () {
            CambioMoneda();
        });
        $(document).on('click', '#moneda', function (e) {
            CambioMoneda();
        });
    };


</script>