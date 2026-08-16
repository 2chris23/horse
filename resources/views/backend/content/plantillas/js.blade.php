@php($cd = null) @if(!empty($cd))
    <script> @endif
        function PruebaTemplte(id, url) {
            var s = $('#btnmod1');
            var d = $('#th' + id).closest('form').attr('data-check');
            if(id<=2){
                $(s).html('{!!  Funciones::ReemplazarApostrofe(trans('desing.change')) !!}').attr('data-type', id);
            }else{
                $(s).html('{!!  Funciones::ReemplazarApostrofe(trans('desing.plantillanext')) !!}').attr('data-type', id);
            }

            $('#imgtarget').attr('src', url);
            $('#btnmod').click();
        }

        function EnviarPlantilla(id) {
            var el = $('#th' + id);
            $('.bloqueo').addClass('blq');
            var s = $(el).attr('data-check');
            if (s == 0) {
                LimpiarTextoSeleccion();
                var form = new FormData();
                form.append('desing', $(el).attr('data-id'));
                var url = '{!! route('ThemesPost') !!}';
                axios.post(url, form).then(function (response) {
                    clearsel();
                    seleccionar(response.data.desing);
                }).catch(function (error) {
                    clearsel();
                    seleccionar(error.data.desing);
                });
            }
            $('.bloqueo').removeClass('blq');
        }

        $('.predeterminadrmarca').on('click', function () {
       });
        $('#btnmod1').on('click', function () {
            var id = $(this).attr('data-type');
            EnviarPlantilla(id);
            $('#closemod').click();
       });

        function clearsel() {
            var v = $('.predeterminadrmarca');
            $.each(v, function (k, v) {
                $(v).find('.textos').addClass('btn-warning').removeClass('btn-danger');
                $(v).attr('data-check', 0);
                $(v).find($('.seleccionado')).addClass('hidden-xs-up');
                $(v).find($('.noseleccionado')).removeClass('hidden-xs-up');
                $(v).find($('.campopredeterminado')).html('{!! Funciones::ReemplazarApostrofe(trans('desing.predeno')) !!}');
                $(v).find($('.themesel')).val(0);
           });
        }

        function seleccionar(id) {
            var nosi = 'Seleccionado';
            var s = 4;
            var v = $('form');
            $.each(v, function (k, v) {
                var tt = $(v).attr('data-id');
                if (tt === undefined) {
                    return null;
                }
                if (tt == id) {
                    $(v).attr('data-check', 1).closest('.card').addClass('selected');
                    $(v).find($('.themesel')).val(1);
                    $(v).find('.textos').html(nosi).removeClass('btn-warning').addClass('btn-danger');
                    $(v).find($('.bloqueo')).addClass('blq');
                } else {
                    $(v).find($('.bloqueo')).removeClass('blq');
                    $(v).find('.textos').addClass('btn-warning').removeClass('btn-danger');
                    $(v).attr('data-check', 0);
                    $(v).find($('.themesel')).val(0);
                }
           });
        }

        function LimpiarTextoSeleccion() {

            var nos = '{!! Funciones::ReemplazarApostrofe(trans('users.change')) !!}',
                ted = $('.predeterminadrmarca'), te = $('.textos');
            $.each(te, function (k, v) {
                $(v).html(nos);
            });
            $.each(ted, function (k, v) {
                $(v).closest('.card').removeClass('selected');
           });
        }

        $(document).on('load', function () {
            var v = $(window).height();
            $('.modal-img').height((50 * v) / 100);
        });
        $(window).on('resize', function () {
            var v = $(window).height();
            if (v < 750) {
                $('body').removeClass('fixedMenu_left');
            } else {
                $('body').addClass('fixedMenu_left');
            }
            $('.modal-img').height((50 * v) / 100);
        }) @if(!empty($cd)) </script> @endif