<?php $cd = null; ?>
@if(!empty($cd))
    <script>
        @endif
        function log() {
                    {{--#navbar-collapse-1--}}
                    {{--logingbut--}}
            var v = $(window).height();
            if (v < 750) $('.logingbut').click();
            if (v < 455) {
                $('.swal2-container').css('top', '36px');
            } else {
                $('.swal2-container').css('top', '');
            }
            var text = '<div class="m-t-15 col-xs-12">' +
                ' <div class="form-group text-left">' +
                ' <label for="dd4" class="col-form-label text-left">{!! Funciones::ReemplazarApostrofe(trans('landing.username') )!!}:</label>' +
                ' <div class="input-group text-left">' +
                ' <span class="input-group-addon"> <i class="fa fa-envelope text-black"> </i> </span>' +
                ' <input type="text" class="form-control b_r_20 eml intok" onchange="emp(this)" onkeyup="emp(this)" onfocus="emp(this)" name="email" placeholder="{!! Funciones::ReemplazarApostrofe(trans('landing.youremail')) !!}">' +
                ' </div>' +
                ' </div>' +
                ' <div class="form-group text-left">' +
                ' <label for="dd3" class="col-form-label text-left ">{!! Funciones::ReemplazarApostrofe(trans('landing.password')) !!}: </label>' +
                ' <div class="input-group">' +
                ' <span class="input-group-addon"> <i class="fa fa-key text-black"> </i> </span>' +
                ' <input type="password" class="form-control b_r_20 psdw intok" onchange="cp(this)" onkeyup="cp(this)"onfocus="cp(this)" name="password" placeholder="{!! Funciones::ReemplazarApostrofe(trans('landing.yourpassword')) !!}">' +
                ' </div>' +
                ' </div>' +
                '<div class="text-center">' +
                '    <label for="remember"><input type="checkbox"  id="remember2" name="remember" @if(Agent::isDesktop()!=true) checked="on" @endif > {!! Funciones::ReemplazarApostrofe(trans('login.keeplog')) !!}</label>' +
                '</div>' +
                '</div>' +
                '<a class="btn btn-link" href="{{ route('OlvidoGet') }}">' +
                ' {!! Funciones::ReemplazarApostrofe(trans('users.forgotpassword')) !!}' +
                ' </a>'
            ;
            swal({
                title: '{!! trans('landing.login') !!}',
                {{--type: 'info',--}}
                html: text,
                showCloseButton: true,
                showCancelButton: false,
                confirmButtonColor: '#fa6900',
                focusConfirm: false,
                confirmButtonText: '{!! trans('landing.login') !!}',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText: '{!! trans('users.cancel') !!}',
                cancelButtonAriaLabel: 'Thumbs down',
            }).then(function () {
                var es = $('.eml').val();
                var pd = $('.psdw').val();
                if (validateEmail(es)) {
                    $('#email2').val(es);
                    $('#password2').val(pd);
                    $('#remember').prop('checked', $('#remember2').prop('checked'));
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
                {{--console.log(e.keyCode);--}}
                if (e.which === 13) {
                    $('.swal2-confirm').click();
                }
            });
            {{--, function (dismiss) {
            if (dismiss === 'cancel') {
            }
            });
            };--}}
        }

        function cp(e) {
            $('#password').val($(e).val());
        }

        function validate(e) {
            var email = $("#email").val();
            if (validateEmail(email)) {
                {{--
                $("#email").text(email + " is valid :)");
                $("#email").css("color", "green");
                --}}
            } else {
                {{--
                $("#email").text(email + " is not valid :(");
                $("#email").css("color", "red");
                --}}
            }
            return false;
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

        {{--
        $('#slog').on('click', function () {
        var el = $('.flotante');
        if ($(el).hasClass('hidden') === true) {
        $(el).removeClass('hidden');
        return null;
        }
        $(el).addClass('hidden');
        return null;
        });
        --}}
        $(window).ready(function () {
            var w = $(window).width(), el = $('.flotante');
            var ws = w - 340;
            $(el)
                .css('overflow', 'hidden')
                .css('overflow', 'hidden')
                .css('position', 'absolute')
                .css('left', ws + "px")
                .css('float', 'right');
        });
        $(window).resize(function () {
            var w = $(window).width(), el = $('.flotante');
            var ws = w - 340;
            $(el)
                .css('overflow', 'hidden')
                .css('overflow', 'hidden')
                .css('position', 'absolute');
            if (w < 320) {
                $(el)
                    .css('left', ws + "px")
                    .css('float', 'right')
                    .css('top', '175px');
            } else if (w < 576) {
                $(el)
                    .css('left', ws + "px")
                    .css('float', 'right')
                    .css('top', '180px');
            } else if (w < 768
            ) {
                $(el)
                    .css('margin-left', ws + 'px')
                    .css('float', 'right')
                    .css('top', '19px')
            }
            else if (w < 867
            ) {
                $(el)
                    .css('margin-left', ws + 'px')
                    .css('float', 'right')
                    .css('top', '19px');
            }
            else if (w < 992) {
                $(el)
                    .css('margin-left', ws + 'px')
                    .css('float', 'right')
                    .css('top', '50px');
            }
            else {
                $(el)
                    .css('margin-left', ws + 'px')
                    .css('float', 'right')
                    .css('top', '50px');
            }
        });
        $('.swal2-confirm').on('click', function () {
            var es = $('.eml').val();
            if (validateEmail(es)) {
                $('#email').val(es);
                $('.sendlog').click();
            } else {
                {{--console.dir('correo fail');--}}
            }
        });
        $('#btnreg').on('click', function (e) {
            var v, d, p, a,
                v = $('.pwd3').val();
            d = $('.pwd1');
            a = $('.nm1').val();
            p = $('.pwd2').val();
            var s = validateEmail(d.val());
            var tres = a.length;
            var uno = v.length;
            var dos = p.length;
            if (s === true && uno >= 6 && dos >= 4) {
                $('#btnsendreg').click();
            } else {
                if (uno < 6) {
                    {{--console.log('Telefono vacio');--}}
                    $('#telerror').html('<em>Numero invalido</em>').removeClass('hidden');
                }
                if (dos < 4) {
                    {{--console.log('dominio vacio');--}}
                    $('#domerror').html('<em>Campo requerido</em>').removeClass('hidden');
                }
                if (s !== true) {
                    {{--console.log('correo vacio');--}}
                    $('#emailerror').html('<em>Campo requerido</em>').removeClass('hidden');
                }
                if (tres < 1) {
                    {{--console.log('nombre ');--}}
                    $('#nameerror').html('<em>Campo requerido</em>').removeClass('hidden');
                }
            }
        });
        $(document).ready(function () {
            {{--called when key is pressed in textbox--}}
            $(".numbers").keypress(function (e) {
                {{--if the letter is not digit then display error and don't type anything--}}
                if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                    {{--display error message
                    $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    --}}
                        return false;
                }
            });
        });

        {{--
        $("#validate").bind("click", validate);
        $('.swal2-confirm')
        .css("color"," rgb(255, 255, 255)")
        .css("background-color"," rgb(92, 184, 92)")
        .css("border-color"," rgb(76, 174, 76)");
        --}}

        $('.rem').on('click', function () {
            $('#remember').click();
        })

        @if(!empty($cd))
    </script>
@endif
