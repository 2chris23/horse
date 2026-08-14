<?php $cd = null; ?>
@if(!empty($cd))
    <script>
                @endif
        var pai = 0;
        var edo = 0;
        var tools = [];
        axios.defaults.headers.common['X-CSRF-TOKEN'] = "{!! csrf_token() !!}";
        axios.defaults.headers.common['csrftoken'] = "{!! csrf_token() !!}";


        function cargarimagenes() {
            $(function () {
                $.each(document.images, function () {
                    var this_image = this;
                    if ($(this_image).hasClass('lazy')) {
                        $(this_image).removeClass('hidden').Lazy({
                            attribute: 'lsrc',
                            delay: 1000,
                        });
                    } else {
                        var src = $(this_image).attr('src') || '';
                        if (!src.length > 0) {
                                    {{--//this_image.src = options.loading; // show loading--}}
                            var lsrc = $(this_image).attr('lsrc') || '';
                            if (lsrc.length > 0) {
                                var img = new Image();
                                img.src = lsrc;
                                $(img).load(function () {
                                    this_image.src = this.src;
                                    $(this_image).removeClass('hidden');
                                });
                            }
                        }
                    }

                });
            });
        };

        function getPrice(v, d) {
            $(v).html('').append(d.precio + " <span class=\"coinl \">" + d.moneda + "</span>");
        };

                function getCubri(v, d) {
                    $(v).html('').append(d.cubri + " <span class=\"coinl \">" + d.moneda + "</span>");
                };

                function tooltipsnew(v, d) {
                    var toolconf = {
                        animation: 'fade',
                        delay: 200,
                        theme: 'tooltipster-borderless',
                        trigger: 'hover',
                        content: d,
                        multiple: true,
                        contentAsHTML: true,
                        contentCloning: false
                    };
                    var s = $(v).tooltipster(toolconf);


                };


        function ObtenerPrecios() {
            var s = $('[data-getprice]');
            var d = new FormData();
            var to = 0;
            $.each(s, function (k, v) {
                d.append(k, $(v).attr('data-getprice'));
                to = to + 1;
            });
            if (to != 0) {

                axios.post("{!! route('ObtenerPrecioCaballos') !!}", d).then(function (data) {
                    var horses = data.data.horses;

                    $.each(horses, function (k, v) {
                        $.each(v, function (a, b) {
                            s = $('[data-getprice="' + b.slug + '"]');
                            getPrice(s, b);
                            if ($('.recent-ads-list-price').val() != undefined) {
                                getPrice($('.recent-ads-list-price'), b);
                            }
                        });
                    });


                }).catch(function (error) {
                    console.dir(error);
                });
            }
            to = 0;
            s = $('[data-getcubri]');
            d = new FormData();
            $.each(s, function (k, v) {
                d.append(k, $(v).attr('data-getcubri'));
                to = to + 1;
            });
            if (to != 0) {
                axios.post("{!! route('ObtenerCubricionCaballos') !!}", d).then(function (data) {
                    var horses = data.data.horses;
                    $.each(horses, function (k, v) {
                        s = $('[data-getcubri="' + v.slug + '"]');
                        getCubri(s, v);
                    });


                }).catch(function (error) {
                    console.dir(error);
                });
            }
            to = 0;
            s = $('[data-slugp]');
            var ptool = new FormData();
            $.each(s, function (k, v) {
                ptool.append(k, $(v).attr('data-slugp'));
                to = to + 1;
            });
            if (to != 0) {

                axios.post("{!! route('ObtenerPreciosCaballos') !!}", ptool).then(function (data) {
                    var horses = data.data.horses;

                    $.each(horses, function (k, v) {
                        $.each(v, function (a, b) {

                            s = $('[data-slugp="' + b.slug + '"]');
                            $(s).tooltipster({
                                animation: 'fade',
                                delay: 200,
                                theme: 'tooltipster-borderless',
                                trigger: 'hover',
                                content: b.precio,
                                multiple: true,
                                contentAsHTML: true,
                                contentCloning: false
                            });

                        });
                    });
                }).catch(function (error) {
                    console.dir(error);
                });
            }
            to = 0;


            var sa = $('[data-slugc]');
            var ctool = new FormData();
            $.each(sa, function (k, v) {
                ctool.append(k, $(v).attr('data-slugc'));
                to = to + 1;
            });
            if (to == 0) {
                axios.post("{!! route('ObtenerCubricionesCaballos') !!}", ctool).then(function (data) {
                    var horses = data.data.horses;
                    $.each(horses, function (k, v) {
                        s = $('[data-slugc="' + v.slug + '"]');
                        /*tooltipsnew(s, v.precio);*/
                        $(s).tooltipster({
                            animation: 'fade',
                            delay: 200,
                            theme: 'tooltipster-borderless',
                            trigger: 'hover',
                            content: v.tool,
                            multiple: true,
                            contentAsHTML: true,
                            contentCloning: false
                        });
                    });
                }).catch(function (error) {
                    console.dir(error);
                });
            }

        }

        function emp(e) {
            var v = $(e).val();
            $('#email').val(v);
            if (validateEmail(v)) {
                $('.swal2-confirm').prop("disabled", false);
            } else {
                $('.swal2-confirm').prop("disabled", true);
            }
        }

        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

        function cp(e) {
            $('#password').val($(e).val());
        }

        function log() {
            /*#navbar-collapse-1*/
            /*logingbut*/
            var v = $(window).height();
            if (v < 750) $('.logingbut').click();
            if (v < 455) {
                $('.swal2-container').css('top', '36px');
            } else {
                $('.swal2-container').css('top', '');
            }
            var text = '<div class="m-t-15 col-xs-12">' +
                ' <div class="form-group text-left">' +
                ' <label for="dd4" class="col-form-label text-left">{!! Funciones::ReemplazarApostrofe(trans('landing.username')) !!}:</label>' +
                ' <div class="input-group text-left">' +
                ' <span class="input-group-addon"> <i class="fa fa-envelope text-black"> </i> </span>' +
                ' <input type="text" class="form-control b_r_20 eml intok" onchange="emp(this)" onkeyup="emp(this)" onfocus="emp(this)" name="email" placeholder="{!! Funciones::ReemplazarApostrofe(trans('landing.youremail')) !!}">' +
                ' </div>' +
                ' </div>' +
                ' <div class="form-group text-left">' +
                ' <label for="dd3" class="col-form-label text-left ">{!! Funciones::ReemplazarApostrofe(trans('landing.password')) !!}: </label>' +
                ' <div class="input-group">' +
                ' <span class="input-group-addon"> <i class="fa fa-key text-black"> </i> </span>' +
                ' <input type="password" class="form-control b_r_20 psdw intok" onchange="cp(this)" onkeyup="cp(this)"onfocus="cp(this)" name="password" placeholder="{!! Funciones::ReemplazarApostrofe(trans('landing.yourpassword') ) !!}">' +
                ' </div>' +
                ' </div>' +
                '</div>' +
                '<a class="btn btn-link" href="{{ route('OlvidoGet') }}">' +
                ' {!! Funciones::ReemplazarApostrofe(trans('users.forgotpassword')) !!}' +
                ' </a>'
            ;
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('landing.login')) !!}',
                /*type: 'info',*/
                html: text,
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonColor: '#fa6900',
                focusConfirm: false,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('landing.login')) !!}',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('users.cancel')) !!}',
                cancelButtonAriaLabel: 'Thumbs down',
            }).then(function () {
                var es = $('.eml').val();
                var pd = $('.psdw').val();
                if (validateEmail(es)) {
                    $('#email').val(es);
                    $('#password').val(pd);
                    $('.sendlog').click();
                } else {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('error.emailinvalid')) !!}!',
                        '{!! Funciones::ReemplazarApostrofe(trans('error.emailwrite')) !!}',
                        'error'
                    )
                }
            });
            $('.intok').keypress(function (e) {
                /*console.log(e.keyCode);*/
                if (e.which === 13) {
                    $('.swal2-confirm').click();
                }
            });
            /*, function (dismiss) {
            if (dismiss === 'cancel') {
            }
            });
            };*/
        }

        function DisableElement(el) {
            $(el).prop('disabled', true);
            return null;
        };

        function EnableElement(el, clear = true) {
            $(el).prop('disabled', false);
            if (clear === true) $(el).val('');
            return null;
        };
        $(window).on('load', function () {
            cargarimagenes();
            ObtenerPrecios();
        });
        (function ($) {
            "use strict";
            $(".minimal-category").slice(0, 12).show();
            $("#loadMore").on('click', function (e) {
                e.preventDefault();
                $(".minimal-category:hidden").slice(0, 4).slideDown();
                if ($(".minimal-category:hidden").length == 0) {
                    $("#load").fadeOut('slow');
                }
                $('html,body').animate({
                    scrollTop: $(this).offset().top
                }, 1500);
            });
        })(jQuery);

        function Buscar() {
                    {{-- //$('#env1').click(); --}}

            var id = $('#seleccion').val();
            var url = "{!! route('portalporraza') !!}" + '/' + id;
            window.location.replace(url);

        }

        function BuscarP() {
            var id = $('#seleccion').val();
            var url = "{!! route('portalporraza') !!}" + '/' + id;
            /*
            var country = $('#country').val();
            var state = $('#state').val();
            if (country == null) country = 0;
            if (country == undefined) country = 0;
            if (state == null) state = 0;
            if (state == undefined) state = 0;
            var url = "{!! route('portalporestado') !!}" + '/' + country + '/' + state;
        window.location.replace(url);
*/
        }

        var pai = 0;
        var edo = 0;


        @if(!empty($cd))

    </script>
@endif

