@php($cd = null)@if(!empty($cd))
    <script>
        @endif


        function saveSeo() {
            var form = new FormData(document.getElementById('seo'));
            var url = $('#seo').find('.url').val();
            axios.post(url, form)
                .then(function (response) {
                    $('#seo').closest('.card').find('.edito').click();
                    {{--
                    swal(
                    '{!! trans('users.applychange') !!}',
'{!! trans('users.successchange') !!}',
'success'
)
--}}
                })
                .catch(function (error) {
                    console.dir(error.data);


                });

        }

        function savechat() {
            var form = new FormData(document.getElementById('chateo'));
            var url = $('#chateo').find('.url').val();
            axios.post(url, form)
                .then(function (response) {
                    $('#chateo').closest('.card').find('.edito').click();
                    {{--
                    swal(
                    '{!! trans('users.applychange') !!}',
'{!! trans('users.successchange') !!}',
'success'
)
--}}
                })
                .catch(function (error) {
                    console.dir(error.data);


                });

        }

        function savehead() {
            var form = new FormData(document.getElementById('headfoot'));
            var url = $('#headfoot').find('.url').val();
            axios.post(url, form)
                .then(function (response) {
                    $('#headfoot').closest('.card').find('.edito').click();
                    {{--
                    swal(
                    '{!! trans('users.applychange') !!}',
'{!! trans('users.successchange') !!}',
'success'
)
--}}
                })
                .catch(function (error) {
                    console.dir(error.data);


                });

        }

        function savehead() {
            var form = new FormData(document.getElementById('headfoot'));
            var url = $('#headfoot').find('.url').val();
            axios.post(url, form)
                .then(function (response) {
                    $('#headfoot').closest('.card').find('.edito').click();
                    {{--
                    swal(
                    '{!! trans('users.applychange') !!}',
'{!! trans('users.successchange') !!}',
'success'
)
--}}
                })
                .catch(function (error) {
                    console.dir(error.data);


                });

        }

        function savecolor2() {
            var form = new FormData(document.getElementById('colorin'));
            var url = $('#colorin').find('.url').val();
            {{-- //$('#colorin').closest('.card').css('background-color') --}}
            axios.post(url, form)
                .then(function (response) {
                    $('#colorin').closest('.card').find('.edito').click();
                    {{--
                    swal(
                    '{!! trans('users.applychange') !!}',
'{!! trans('users.successchange') !!}',
'success'
)
--}}
                })
                .catch(function (error) {
                    console.dir(error.data);


                });

        }

        function saveaguaimg() {
            var form = new FormData(document.getElementById('imgwater'));
            var url = $('#imgwater').find('.url').val();
            axios.post(url, form)
                .then(function (response) {
                    $('#imgwater').closest('.card').find('.edito').click();
                    {{--
                    swal(
                    '{!! trans('users.applychange') !!}',
'{!! trans('users.successchange') !!}',
'success'
)
--}}
                })
                .catch(function (error) {
                    console.dir(error.data);


                });

        }

        function BotonCancelar(el) {
            console.log('clicl en ');
            console.dir(this);
            var card = $(el).closest('.card');

            $(card).find('.edito').click()
        }

        function savetheme() {
            $('#cambiartema').click();

        }


        function saveheadimg() {
            var form = new FormData(document.getElementById('imghead'));
            var url = $('#imghead').find('.url').val();
            axios.post(url, form)
                .then(function (response) {
                    $('#imghead').closest('.card').find('.edito').click();
                    {{--
                    swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('users.successchange') !!}',
                        'success'
                    )
                    --}}
                })
                .catch(function (error) {
                    console.dir(error.data);


                });

        }


        $('canvas').addClass('img-fluid');


        var my_custom_options = {
            "no-duplicate": true,
            "tags-input-name": "words",
            "edit-on-delete": false,
        };
        $(window).on('resize', function () {
            var a = $(window).width();
            var eh = a * .6;
            var ea = eh * .3, fh = eh * .83;
            var fa = fh * .35, ff = fh * .72;
            $(".cr-boundary").css('width', eh).css('heigth', ea);
            {{-- //$(".cr-viewport.cr-vp-square").css('width',fh).css('heigth',fa); --}}
            $("canvas").css('transform', 'translate3d(-' + fh + ', -' + ff + 'px, 0px) scale(0.2341);');


        });
        $(".tag-box").tagging(my_custom_options);


        $(window).on('load', function () {
            {{-- //$('.croppie-container.cr-viewpor').css("border","1px solid #000");
            //$('.cr-vp-square').css("border","1px dotted #fff"); --}}

        });
        $(".fa-pencil").on('click', function (e) {

            var entradas = $(this).closest('.card').find('.editable');
            var btn = $(this).closest('.card').find('.boton');
            if (!$(this).hasClass("fa-pencil")) {
                $.each(entradas, function (k, v) {
                    $(v).attr('disabled', 'disabled');
                });
                $(btn).addClass('hidden-xs-up');
            } else {
                $.each(entradas, function (k, v) {
                    $(v).removeProp('disabled');

                });
                $(btn).removeClass('hidden-xs-up');
            }
            $(this).toggleClass('fa-check').toggleClass('fa-pencil');

            /*console.dir(entradas);*/
        });
        {{--
        $(".fa-pencil").on('click', function (e) {
            var edit = $(this).closest('.card').find('.card-header .card-title').text();
            var editable = $(this).closest('.card').find('.card-header');
            var editBox = "<div class='card_editbox'><input type='text' class='form-control text_for_save' maxlength='20' value='" + edit + "'></div>";

            var edit = $(this).closest('.card').find('.card-header .card-title').text();
            var editable = $(this).closest('.card').find('.card-header');
            var editBox = "<div class='card_editbox'><input type='text' class='form-control text_for_save' maxlength='20' value='" + edit + "'></div>";
            if (!$(this).hasClass("fa-check")) {
                editable.after(editBox);
                $(this).closest('.card').find("input").focus().setCursorToTextEnd();
            } else {
                $(this).closest(".card").find(".card_editbox").remove();
            }
            $(this).toggleClass('fa-check').toggleClass('fa-pencil');

        });
        --}}
        $('.redondo').on('click', function () {
            var v = $(this).attr('data-color');

            $.jPicker.List[0].color.active.val('hex', v);
            var e = $(this).closest('.card').find('.card-header');
            $('#colore').val(v);
            $(e).css('background-color', v + "!important")

        });


        $('.predeterminadrmarca').on('click', function () {
                    {{-- //nopredeterminado  predeterminado  campopredeterminado  #marcapredetermianda $aguapre --}}

            var s = $(this).attr('data-check');
            if (s == 0) {
                $(this).attr('data-check', 1);
                $('.nopredeterminado').addClass('hidden-xs-up');
                $('.predeterminado').removeClass('hidden-xs-up');
                $('.campopredeterminado').html('{!! Funciones::ReemplazarApostrofe(trans('desing.prede')) !!}');
                $('#marcapredetermianda').val(1);
            } else {
                $(this).attr('data-check', 0);
                $('.predeterminado').addClass('hidden-xs-up');
                $('.nopredeterminado').removeClass('hidden-xs-up');
                $('.campopredeterminado').html('{!! Funciones::ReemplazarApostrofe(trans('desing.predeno')) !!}');
                $('#marcapredetermianda').val(0);
            }
        });


        $(document).on('load', function () {
            $(function () {
                $("#sliders").sortable({
                    stop: function (ui, event) {
                        getItems('#sliders');
                    }
                }).disableSelection();
                $("#photos").sortable({
                    stop: function (ui, event) {
                        getItems('#photos');
                    }
                }).disableSelection();
                $("#video").sortable({
                    stop: function (ui, event) {
                        getvideos('#video');
                    }
                }).disableSelection();
            });
        }).on('ready', function () {
            var s = $(document).find('.editable');
            $.each(s, function (k, v) {
                $(v).attr('disabled', 'disabled');
            });
            $("#photos").sortable({
                stop: function (ui, event) {
                    getItems('#photos');
                }
            }).disableSelection()
        });

        @php($cd = null)@if(!empty($cd))
    </script>
@endif