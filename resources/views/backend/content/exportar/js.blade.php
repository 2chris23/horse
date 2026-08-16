@php($cd = null)
@if(!empty($cd))
    <script>
        @endif
        function OcultarCk(el, t = 0) {
            if (t == 1) {
                $(el).find('input[type="checkbox"]').prop('checked', false);
                $(el).addClass('hidden-xs-up');
            } else {
                $(el).removeClass('hidden-xs-up');
            }
        }

        function PorVenta() {
            AmbosFiltros();
            return null;
            var c = $("#venta");
            var t = $(c).prop('checked');

            var Ocsexo = $("div[data-ventas='0']");
            var Ocsraza = $("div[data-ventar='0']");
            var Occolor = $("div[data-ventac='0']");
            var filtrossexo = $("div[data-ventas='1']");
            var filtrosraza = $("div[data-ventar='1']");
            var filtroscolor = $("div[data-ventac='1']");

            if (t == true) {

                $.each(Ocsexo, function (k, v) {
                    $(v).find('.sexoss').prop('checked', false);
                    OcultarCk(v, 1)
                    /*$(v).addClass('hidden-xs-up');*/
                });
                $.each(Ocsraza, function (k, v) {
                    $(v).find('.razasc').prop('checked', false);
                    OcultarCk(v, 1)
                });
                $.each(Occolor, function (k, v) {
                    $(v).find('.capas').prop('checked', false);
                    OcultarCk(v, 1)
                });
                /*****************************************/
                $.each(filtrossexo, function (k, v) {
                    OcultarCk(v)

                });
                $.each(filtrosraza, function (k, v) {

                    OcultarCk(v)
                });
                $.each(filtroscolor, function (k, v) {

                    OcultarCk(v)
                });
            } else {
                $.each(Ocsexo, function (k, v) {
                    OcultarCk(v)
                });
                $.each(Ocsraza, function (k, v) {
                    OcultarCk(v)
                });
                $.each(Occolor, function (k, v) {
                    OcultarCk(v)
                });
                $.each(filtrossexo, function (k, v) {
                    OcultarCk(v)
                });
                $.each(filtrosraza, function (k, v) {
                    OcultarCk(v)
                });
                $.each(filtroscolor, function (k, v) {
                    OcultarCk(v)
                });
            }

        }

        function Porcubri() {
            AmbosFiltros();
            return null;
            var c = $("#cubricion");
            var t = $(c).prop('checked');
            var Ocsexo = $("div[data-cubris='0']");
            var Ocsraza = $("div[data-cubrir='0']");
            var Occolor = $("div[data-cubric='0']");
            /*****************************************/
            var filtrossexo = $("div[data-cubris='1']");
            var filtrosraza = $("div[data-cubrir='1']");
            var filtroscolor = $("div[data-cubric='1']");

            var c = $("#venta");
            var t = $(c).prop('checked');

            var Ocsexo = $("div[data-ventas='0']");
            var Ocsraza = $("div[data-ventar='0']");
            var Occolor = $("div[data-ventac='0']");
            var filtrossexo = $("div[data-ventas='1']");
            var filtrosraza = $("div[data-ventar='1']");
            var filtroscolor = $("div[data-ventac='1']");

            if (t == true) {

                $.each(Ocsexo, function (k, v) {
                    $(v).find('.sexoss').prop('checked', false);
                    OcultarCk(v, 1)
                    /*$(v).addClass('hidden-xs-up');*/
                });
                $.each(Ocsraza, function (k, v) {
                    $(v).find('.razasc').prop('checked', false);
                    OcultarCk(v, 1)
                });
                $.each(Occolor, function (k, v) {
                    $(v).find('.capas').prop('checked', false);
                    OcultarCk(v, 1)
                });
                /*****************************************/
                $.each(filtrossexo, function (k, v) {
                    OcultarCk(v)

                });
                $.each(filtrosraza, function (k, v) {

                    OcultarCk(v)
                });
                $.each(filtroscolor, function (k, v) {

                    OcultarCk(v)
                });
            } else {
                $.each(Ocsexo, function (k, v) {
                    OcultarCk(v)
                });
                $.each(Ocsraza, function (k, v) {
                    OcultarCk(v)
                });
                $.each(Occolor, function (k, v) {
                    OcultarCk(v)
                });
                $.each(filtrossexo, function (k, v) {
                    OcultarCk(v)
                });
                $.each(filtrosraza, function (k, v) {
                    OcultarCk(v)
                });
                $.each(filtroscolor, function (k, v) {
                    OcultarCk(v)
                });
            }


        }

        function FSexo() {
            var se = $('.sexoss');
            var fn = $('.cadb');
            var d = [];
            $.each(se, function (k, v) {
                var p = $(v).prop('checked');
                if (p == true) {
                    d.push($(v).val());
                }
            });
            var t = d.length;
            $.each(fn, function (k, v) {
                OcultarCk(v, 1)
            });

            var dat1 = '', dat2 = '', sat1 = '', sat2 = '', aat1 = '', aat2 = '';
            var pr = '';

            var c1 = $("#cubricion");
            var t1 = $(c1).prop('checked');
            var v = 0;

            if (t1 == true) {

                v = 1;
                t1 = 1;
            } else {
                v = 0;
                t1 = 0;
            }
            if (v == 1) {
                {{--dat1 = "[data-cubris='" + v + "']";--}}
                    sat1 = "[data-cubrir='" + v + "']";
                aat1 = "[data-cubric='" + v + "']";
                {{--console.error($("#cubricion").prop('checked') + " cub " + v + " v1");--}}
                    pr = sat1 + aat1;

                $.each(d, function (k, v) {
                    var s = "[data-sexod-" + v + "='" + v + "']";
                    pr = "div" + s + sat1;
                    var sa = $(pr);
                    $.each(sa, function (r, s) {
                        {{--console.dir(s);--}}
                        OcultarCk(s);
                    });
                    pr = "div" + s + aat1;
                    sa = $(pr);
                    $.each(sa, function (r, s) {
                        {{--console.dir(s);--}}
                        OcultarCk(s);
                    });
                });
            }


            var c2 = $("#venta");
            var t2 = $(c2).prop('checked');

            var w = 0;

            if (t2 == true) {
                w = 1;
                t2 = 1;
            } else {
                w = 0;
                t2 = 0;
            }
            if (w == 1) {
                {{--dat2 = "[data-ventas='" + w + "']";--}}
                sat2 = "[data-ventar='" + w + "']";
                aat2 = "[data-ventac='" + w + "']";

                $.each(d, function (k, v) {
                    var s = "[data-sexod-" + v + "='" + v + "']";
                    pr = "div" + s + sat2;
                    var sa = $(pr);
                    $.each(sa, function (r, s) {
                        {{--console.dir(s);--}}
                        OcultarCk(s);
                    });
                    pr = "div" + s + aat2;
                    sa = $(pr);
                    $.each(sa, function (r, s) {
                        {{-- console.dir(s);--}}
                        OcultarCk(s);
                    });
                });
                {{--//pr = pr + sat2 + aat2;--}}
            }


            if (t != 0) {
                return null;
            } else {
                $.each(fn, function (k, v) {
                    OcultarCk(v)
                });
            }

        }

        function AmbosFiltros() {
            /*cubri*/
            var c1 = $("#cubricion");
            var t1 = $(c1).prop('checked');
            var c2 = $("#venta");
            var t2 = $(c2).prop('checked');
            var v = 0;
            var w = 0;
            if (t1 == true) {
                v = 1;
                t1 = 1;
            } else {
                v = 0;
                t1 = 0;
            }
            if (t2 == true) {
                w = 1;
                t2 = 1;
            } else {
                w = 0;
                t2 = 0;
            }

            var dat1 = '', dat2 = '', sat1 = '', sat2 = '', aat1 = '', aat2 = '';

            if (v == 1) {
                dat1 = "[data-cubris='" + v + "']";
                sat1 = "[data-cubrir='" + v + "']";
                aat1 = "[data-cubric='" + v + "']";
            }

            if (w == 1) {
                dat2 = "[data-ventas='" + w + "']";
                sat2 = "[data-ventar='" + w + "']";
                aat2 = "[data-ventac='" + w + "']";
            }

            var cc = $("div[data-cleared='1']");
            $.each(cc, function (k, v) {
                OcultarCk(v)

            });
            if (t1 == 0 && t2 == 0) {
                return null;
            }

            $.each(cc, function (k, v) {
                OcultarCk(v, 1)

            });
            var Ocsexo = $("div" + dat1 + dat2);
            var Ocsraza = $("div" + sat1 + sat2);
            var Occolor = $("div" + aat1 + aat2);


            $.each(Ocsexo, function (k, v) {
                OcultarCk(v)

            });
            $.each(Ocsraza, function (k, v) {
                OcultarCk(v)
            });
            $.each(Occolor, function (k, v) {
                OcultarCk(v)
            });
            /*****************************************/


            /*venta*/


        }

        $('.cbade').on('click', function () {
            FSexo();

        });
        var my_custom_options = {
            "no-duplicate": true,
            "tags-input-name": "words",
            "edit-on-delete": false,
            "forbidden-chars": [",", "?"],
        };

        var iframes = $('#previews');
        var tabless = null;

        function OcultarTodo() {
            var c = $('#todosts');
            var at = $(c).prop('checked');
            if (at == true) {
                $(c).prop('checked', false);
                $('.cub').removeClass('hidden-xs-up');
                $('.ven').removeClass('hidden-xs-up');
                $('.sxos').removeClass('hidden-xs-up');
                $('.rass').removeClass('hidden-xs-up');
                $('.cabab').removeClass('hidden-xs-up');
            } else {

                $(c).prop('checked', true);
                $('.cub').addClass('hidden-xs-up');
                $('.ven').addClass('hidden-xs-up');
                $('.sxos').addClass('hidden-xs-up');
                $('.rass').addClass('hidden-xs-up');
                $('.cabab').addClass('hidden-xs-up');
            }
        }

        $(document).ready(function () {
            $(window).hover(function () {
                cargarimagenes();
                $('tr[data-fav="1"]').addClass('favorite');
            });


        });

        function deleteit(id) {
            var dat = new FormData();
            dat.append('seti', '');
            var url = "{!! route('caballoc.del') !!}" + "/" + id;
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: 'Deseas borrar el caballo?',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                $.ajax({
                    url: url,
                    data: dat,
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'csrftoken': token,
                    },
                    contentType: false,
                    processData: false,
                    async: false,
                    type: 'POST',
                    success: function (data) {
                        var s = $.parseJSON(data);
                        if (s === 1) {

                            {{-- BORRAR //no fav--}}
                            $('.horse_' + id).addClass('hidden-xl-down').prop('checked', false);
                        }
                    },
                    error:
                        function (xhr, status, error) {
                            var v = $.parseJSON(xhr.responseText);
                            console.error('error');
                            console.dir(v);
                        }
                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
            });


            dat = null;

        }

        function setfav(id, valu) {

                    {{-- BORRAR //caballoc.fav--}}
            var dat = new FormData();
            dat.append('seti', valu);
            var url = "{!! route('caballoc.fav') !!}" + "/" + id;
            $.ajax({
                url: url,
                data: dat,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                async: false,
                type: 'POST',
                success: function (data) {
                    var s = $.parseJSON(data);
                    console.dir(s);
                    if (s === 0) {

                        {{-- BORRAR //no fav--}}

                        {{-- BORRAR //$('tr[data-id=128]').removeClass('favorite');--}}
                        $('tr[data-id=' + id + ']').removeClass('favorite').attr('data-fav', 0);
                        $('#favorite_si_' + id).addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_no_' + id).removeClass('hidden-xl-down').prop('checked', true);
                    } else {

                        {{-- BORRAR //fav--}}
                        $('tr[data-id=' + id + ']').addClass('favorite').attr('data-fav', 1);
                        $('#favorite_no_' + id).addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_si_' + id).removeClass('hidden-xl-down').prop('checked', true);
                    }
                },
                error:
                    function (xhr, status, error) {
                        var v = $.parseJSON(xhr.responseText);
                        console.error('error');
                        console.dir(v);
                    }
            });
            dat = null;

        }

                @if(\Session::has('facebook'))
        var tace = "{!! \Session::get('facebook') !!}";
        swal({
            title: 'Puedes compartir el caballo {!! \Session::get('horse_name') !!} por facebook',
            type: 'success',
            showCancelButton: true,
            confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
            cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonColor: '#4fb7fe',
            html: '¿Quieres compartirlo ahora?',
            cancelButtonColor: '#EF6F6C',
            buttonsStyling: false
        }).then(function () {
            window.open('https://www.facebook.com/sharer.php?u=' + tace, 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');
            {{--window.open(tace, 'Compartir caballo', "resizable=no,height=200,scrollbars=no");--}}
        }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                    '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                    '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                    'success'
                )
            }
        });

        {!! \Session::forget('facebook') !!}
        {!! \Session::forget('horse_name') !!}

        @endif

        function Vendido(id) {
            swal({
                title: 'Confirmacion de venta',
                type: 'success',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '¿Haz vendido este caballo?',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {


                var url = "{!! route('horse.vendido') !!}" + "/" + id;
                var dat = new FormData();
                dat.append('seti', id);
                $.ajax({
                    url: url,
                    data: dat,
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'csrftoken': token,
                    },
                    contentType: false,
                    processData: false,
                    async: false,
                    type: 'POST',
                    success: function (data) {
                        var s = $.parseJSON(data);
                        if (s === 1) {

                            {{-- BORRAR //no fav--}}
                            $('.horse_' + id).addClass('hidden-xl-down').prop('checked', false);
                        }

                    },
                    error:
                        function (xhr, status, error) {
                            var v = $.parseJSON(xhr.responseText);
                            console.error('error');
                            console.dir(v);
                        }
                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask') )!!}',
                        '',
                        'success'
                    )
                }
            });
        }

        $('#sex').on('change', function () {
            var g = $('#sex').val();
            if (g !== '0') {
                $('[type=search]').val($('#sex option:selected').text()).trigger('keyup');
            } else {
                $('[type=search]').val('').trigger('keyup');
            }

        });
        $('#raza').on('change', function () {
            var g = $('#raza').val();
            if (g !== '0') {
                $('[type=search]').val($('#raza option:selected').text()).trigger('keyup');
            } else {
                $('[type=search]').val('').trigger('keyup');
            }
        });
        $('#color').on('change', function () {
            var g = $('#color').val();
            if (g !== '0') {
                $('[type=search]').val($('#color option:selected').text()).trigger('keyup');
            } else {
                $('[type=search]').val('').trigger('keyup');
            }
        });

        $('.sexy').on('click', function () {
            var val = $(this).attr('data-val');
            var s = $('#tabla').find('tr');
            $.each(s, function (k, v) {
                var ds = $(v).attr('data-sex');
                if (ds === val) {
                    var ck = $(val).find('[type="checkbox"]');
                    var at = ck.attr('checked');
                    if (at === 'checked') {

                    } else if (at === undefined) {
                        console.dir(at);
                        $(v).click()

                    }
                }

            });
        });

        function Special(datae, valor) {
            var selector = $('.dataTables_length').val();
            var cv = selector.val();
            $('.dataTables_length option[value="-1"]').attr('selected', 'selected').trigger('change');

            var s = $('#tabla').find('tr');
            $.each(s, function (k, v) {
                var ds = $(v).attr(datae);
                if (ds === valor) {
                    var ck = $(val).find('[type="checkbox"]');
                    var at = ck.attr('checked');
                    if (at === undefined) {
                        console.dir(at);
                        $(v).click()
                    }
                }

            });
            $('.dataTables_length option[value=' + cv + ']').attr('selected', 'selected').trigger('change');

        }

        $('.fsexos').click(function () {
            if ($('#mostrarsexo').prop('checked') === false) {
                /*$('#cardsex').removeClass('hidden-xs-up');*/
                $(this).addClass('btn-outline-warning');
                $('#mostrarsexo').prop('checked', true);
            } else {
                /*$('#cardsex').addClass('hidden-xs-up');*/
                $(this).removeClass('btn-outline-warning');
                $('#mostrarsexo').prop('checked', false);
            }
        });


        $('.fraza').click(function () {
            if ($('#mostrarraza').prop('checked') === false) {
                /*$('#cardraza').removeClass('hidden-xs-up');*/
                $(this).addClass('btn-outline-warning');
                $('#mostrarraza').prop('checked', true);
            } else {
                /*$('#cardraza').addClass('hidden-xs-up');*/
                $(this).removeClass('btn-outline-warning');
                $('#mostrarraza').prop('checked', false);
            }
        });

        $('.fv').click(function () {
            if ($('#mostrarv').prop('checked') === false) {
                /*$('#cardv').removeClass('hidden-xs-up');*/
                $(this).addClass('btn-outline-warning');
                $('#mostrarv').prop('checked', true);
            } else {
                /*$('#cardv').addClass('hidden-xs-up');*/
                $(this).removeClass('btn-outline-warning');
                $('#mostrarv').prop('checked', false);
            }
        });
        $('.ventas').click(function () {
            if ($('#venta').prop('checked') === false) {
                $(this).addClass('btn-outline-warning');
                $('#venta').prop('checked', true);
            } else {
                $(this).removeClass('btn-outline-warning');
                $('#venta').prop('checked', false);
            }
        });
        $('.todost').click(function () {
            if ($('#todosts').prop('checked') === false) {
                $(this).addClass('btn-outline-warning');
                $('#todosts').prop('checked', true);
            } else {
                $(this).removeClass('btn-outline-warning');
                $('#todosts').prop('checked', false);
            }

            OcultarTodo()
        });
        $('.fcapa').click(function () {
            if ($('#mostrarcapa').prop('checked') === false) {
                /*$('#cardcapa').removeClass('hidden-xs-up');*/
                $(this).addClass('btn-outline-warning');
                $('#mostrarcapa').prop('checked', true);
            } else {
                /*$('#cardcapa').addClass('hidden-xs-up');*/
                $(this).removeClass('btn-outline-warning');
                $('#mostrarcapa').prop('checked', false);
            }
        });

        $('.razas').on('click', function () {
            $('.razasc').prop('checked', true).attr('checked', 'checked');
        });
        $('.sexos').on('click', function () {
            $('.sexoss').prop('checked', true).attr('checked', 'checked');
        });
        $('.capa').on('click', function () {
            $('.capas').prop('checked', true).attr('checked', 'checked');
        });

        /*
                $(".fa-chevron-up").on("click", function () {
                    $(this).closest('.card').find('.card-block').slideToggle();
                    $(this).toggleClass("fa-chevron-up").toggleClass("fa-chevron-down");
                });
                */

        $(".card-header .fa-chevron-down").on("click", function () {
            $(this).closest('.card').find('.card-block').slideToggle();
            $(this).toggleClass("fa-chevron-down").toggleClass("fa-chevron-up");
        });
        $(".card-header").on("click", function () {
            var s = $(this).attr('data-no');
            if (s === undefined) {
                if ($(this).find('fa-chevron-down') === undefined) {
                    $(this).find('fa-chevron-up').click();
                } else if ($(this).find('fa-chevron-up') === undefined) {
                    $(this).find('fa-chevron-down').click();
                }


                {{-- BORRAR //$(this).closest('.card').find('.card-block').slideToggle();--}}

                {{-- BORRAR //$(this).toggleClass("fa-chevron-down").toggleClass("fa-chevron-up");--}}
            }
        });

        {{-- BORRAR //url: "{!! route('exportar.indexpost') !!}",--}}
        function test() {
            var form = new FormData(document.getElementById('enviado'));
            var url = "{!! route('exportar.indexpostpv') !!}";
            $('#previews').addClass('col-12').contents().find('html').html('');
            axios.post(url, form)
                .then(function (response) {
                    var contenido = undefined;
                    console.dir(response);
                    if (response.data.vista !== undefined) {
                        contenido = response.data.vista;
                        var buenos = response.data.buenos;
                        {{--
                        var malos = response.data.malos;
                        if (malos.length !== 0) {
                            WarP('Advertencia', 'Las siguientes direcciones de correo pueden estar equivocadas ' + malos);
                        }
                        --}}
                    } else {
                        contenido = response.data;
                        if (contenido.length < 1) {
                            WarP('Advertencia', 'No se encontraron caballos');
                            contenido = '';
                        }
                    }


                    {{--


--}}
                    $('#previews').addClass('col-12').contents().find('html').html(contenido);
                })
                .catch(function (error) {
                    console.error('error ');
                    console.dir(error);
                    ErrP('ERROR', 'No se pudo completar la solicitud');

                });

        }

        function EnviarCorreo() {

            {{-- BORRAR //valInput--}}
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '¿Estas seguro de enviar el correo a todos sus destinatarios?',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                $('#envido').click();
            }, function (dismiss) {

            });

        };


        $('#tabla tbody').on('click', 'tr', function () {
            var c = $(this).find('.slee');
            var at = $(c).prop('checked');
            if (at == true) {
                $(c).prop('checked', false);
            } else {
                $(c).prop('checked', true);


            }
        });

        $('.tod').on('click', function () {
            OcultarTodo()

        });

        var tags = $(".tag-box").tagging(my_custom_options);
        $('#cubricion').on('click', function () {
            Porcubri();
        });
        $('#venta').on('click', function () {
            PorVenta();
        });


        @if(!empty($cd)) </script>
    tod -> todos
    cub -> cubricion
    ven -> ventas
    sxos-> sexos
    rass-> razas
    cabab-> Caballos
    fitro para sexo
    data-ventas data-ventar data-ventac
    data-cubris

    data-cubrir
    data-cubric
    fitro para raza
    data-ventar data-ventac
    data-cubrir
    data-cubric
    fitro para color
    data-ventac
    data-cubric

@endif