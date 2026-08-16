@php($user = isset($user)?$user:null)
@php($stud = !empty($user)?$user->Yeguada():null)
@php($tiempoaviso = 60000)
@php
    if(\Auth::user()->isAdm() != true){
$yegu = \Auth::user()->Yeguada();
$marca = $yegu->Marca();
$mostrarmarca = 0;
$agua = 0;
if(!empty($marca)){
$mostrarmarca = 1;
$agua = $yegu->MarcaAgua()->first()->status;
}
}

@endphp
@if(!empty($cd))
    <script>

        @endif



        {{--
               $('#btn-get-photo').click(function () {
                   alert(getItems('#photos'));
               });
               --}}
        function saveslider(url) {
            var form = new FormData(document.getElementById("glerias"));

            axios.post(url, form)
                .then(function (response) {
                    swal(
                        'Cambios aplicados!',
                        'Los cambios se han realizado',
                        'success'
                    )
                })
                .catch(function (error) {
                    var err = eval(xhr.responseText.sms);
                    var v = $.parseJSON(xhr.responseText);
                    swal({
                        title: 'Oops...',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v.sms,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                });
        }

        $(document).on('ready', function () {
            $("#photos").sortable({
                stop: function (ui, event) {
                    getItems('#photos');
                }
            }).disableSelection()
        });
        $('.predeterminadrmarca').on('click', function () {

                    {{--//nopredeterminado  predeterminado  campopredeterminado  #marcapredetermianda $aguapre--}}

            var s = $(this).attr('data-check');
            if (s == 0) {
                $(this).attr('data-check', 1);
                $('.nopredeterminado').addClass('hidden-xs-up');
                $('.predeterminado').removeClass('hidden-xs-up');
                $('.campopredeterminado').html('{!! Funciones::ReemplazarApostrofe(trans('desing.watermark')) !!}');
                $('#marcapredetermianda').val(1);
            } else {
                $(this).attr('data-check', 0);
                $('.predeterminado').addClass('hidden-xs-up');
                $('.nopredeterminado').removeClass('hidden-xs-up');
                $('.campopredeterminado').html('{!! Funciones::ReemplazarApostrofe(trans('desing.watermark')) !!}');
                $('#marcapredetermianda').val(0);
            }
        });
        @if(!empty($cd))
    </script>
@endif