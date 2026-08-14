@php($user = isset($user)?$user:null)
@php($stud = !empty($user)?$user->Yeguada():null)

@php($tiempoaviso = 60000)
@if(!empty($cd))
    <script>
        @endif

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
            $.each(s, function (k, v) {
                d.append(k, $(v).attr('data-getprice'));
            });

            axios.post("{!! route('ObtenerPrecioCaballosAdmin') !!}", d).then(function (data) {
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


            var s = $('[data-getcubri]');
            var d = new FormData();
            $.each(s, function (k, v) {
                d.append(k, $(v).attr('data-getcubri'));
            });

            axios.post("{!! route('ObtenerCubricionCaballosAdmin') !!}", d).then(function (data) {
                var horses = data.data.horses;
                $.each(horses, function (k, v) {
                    s = $('[data-getcubri="' + v.slug + '"]');
                    getCubri(s, v);
                });

            }).catch(function (error) {
                console.dir(error);
            });

            var s = $('[data-slugp]');
            var ptool = new FormData();
            $.each(s, function (k, v) {
                ptool.append(k, $(v).attr('data-slugp'));
            });


            axios.post("{!! route('ObtenerPreciosCaballosAdmin') !!}", ptool).then(function (data) {
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


            var sa = $('[data-slugc]');
            var ctool = new FormData();
            $.each(sa, function (k, v) {
                ctool.append(k, $(v).attr('data-slugc'));
            });
            axios.post("{!! route('ObtenerCubricionesCaballosAdmin') !!}", ctool).then(function (data) {
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

        function DisableElement(el) {
            $(el).prop('disabled', true);
            return null;
        };

        function EnableElement(el, clear = true) {
            $(el).prop('disabled', false);
            if (clear === true) $(el).val('');
            return null;
        };

        function AddFormDisable(el, form, name_var) {
            {{--//DisableElement(el);--}}
            form.append(name_var, $(el).val());
            return form;
        };
        $('.dropify-infos').on('hover', function () {
            $('.dropify-infos').hover();
        });

        function newTab(url) {
            var form = document.createElement("form");
            form.method = "GET";
            form.action = url;
            form.target = "_blank";
            document.body.appendChild(form);
            form.submit();
        }

        $(document).ready(function () {
            ObtenerPrecios();
            $('[data-toggle="popover"]').popover();
            {{--//called when key is pressed in textbox--}}
            $(".numbers").keypress(function (e) {
                {{--//if the letter is not digit then display error and don't type anything--}}
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    {{--//display error message
                    //$("#errmsg").html("Digits Only").show().fadeOut("slow");--}}
                        return false;
                }
            });
            if ($('.nac').val() !== undefined) {

                $("input[type='date']").datepicker({
                    maxDate: "+1d",
                    dateFormat: 'yy-mm-dd',
                    showButtonPanel: true,
                    changeMonth: true,
                    changeYear: true,
                    minDate: '-50Y',
                }).keydown(function (e) {
                    return false;
                });

            } else {
                $.datepicker.regional['{!! App::getLocale() !!}'] = {
                    closeText: '{!! Funciones::ReemplazarApostrofe(trans('facebook.cerrar')) !!}',
                    prevText: '< ',
                    nextText: ' >',
                    currentText: '{!! Funciones::ReemplazarApostrofe(trans('sell.hoy')) !!}',
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthNamesShort: [
                        @php($mes = trans('sell.meses'))
                                @for($i =0;$i<count($mes);$i++)
                                @if(isset($mes[$i]))
                            '{!! Funciones::ReemplazarApostrofe($mes[$i]) !!}'
                        @if(isset($mes[$i+1])) {!! ',' !!} @endif

                        @endif
                        @endfor

                        {{--'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'--}}
                    ],
                    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                    dayNamesMin: [
                        @php($mes = trans('sell.dia'))
                                @for($i =0;$i<count($mes);$i++)
                                @if(isset($mes[$i])) '{!! Funciones::ReemplazarApostrofe($mes[$i]) !!}' @if(isset($mes[$i+1])) {!! ',' !!} @endif @endif
                        @endfor
                        {{--'Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'--}}
                    ],
                    weekHeader: 'Sm',
                    dateFormat: 'dd/mm/yy',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: '',
                };
                $.datepicker.setDefaults($.datepicker.regional['{!! App::getLocale() !!}']);
            }
            ;
            $('.phone').mask("+(###)###-##-##-##");
            cargarimagenes();
            {{--
            $("select").select2({
                placeholder: "{!! trans('users.chooseone') !!}",
                allowClear: true,
                //dropdownCssClass: "bigdrop",
                width: '100%'
            });
            --}}
        });

        function getItems(el) {
            var columns = [], s = new FormData();
            $($(el).find('.sortable-item')).each(function () {
                {{--//console.dir($(this).attr('data-id'));--}}
                columns.push($(this).attr('data-id'));
            });
            s.append('orden', JSON.stringify(columns));
            $.ajax({
                url: urlorder,
                data: s,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {
                    /*
                    var v = $.parseJSON(data);
                    console.dir(data);
                    console.dir(v);
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange')) !!}',
                    '{!! Funciones::ReemplazarApostrofe(trans('users.successchange')) !!}',
                    'success'
                )
                */
                },
                error:
                    function (xhr, status, error) {
                        /*
                        var err = eval(xhr.responseText.sms);
                        var v = $.parseJSON(xhr.responseText);
                        swal({
                            title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v.sms,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                    */
                    }
            });
            {{--//console.dir(columns);--}}
                return columns.join('|');
        }

        function getvideos(el) {
            var columns = [], s = new FormData();
            $($(el).find('.sortable-item')).each(function () {
                columns.push($(this).attr('data-id'));
            });
            s.append('video', JSON.stringify(columns));
            $.ajax({
                url: urlorder,
                data: s,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {
                    var v = $.parseJSON(data);
                    /*
                    console.dir(data);
                    console.dir(v);
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange')) !!}',
                    '{!! Funciones::ReemplazarApostrofe(trans('users.successchange')) !!}',
                    'success'
                )
                */
                },
                error:
                    function (xhr, status, error) {
                        var err = eval(xhr.responseText.sms);
                        var v = $.parseJSON(xhr.responseText);
                        /*
                        swal({
                            title: '{!!Funciones::ReemplazarApostrofe( trans('users.tittleerror')) !!}',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v.sms,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                    */
                    }
            });
            {{--//console.dir(columns);--}}
                return columns.join('|');
        }

        function erasephoto(el, id, type) {
            var url = '{!! route('erase.media'); !!}';
            var s = new FormData();
            s.append(type, id);
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.deleteimage')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! Funciones::ReemplazarApostrofe(trans('users.deleteimageask')) !!}',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                $.ajax({
                    url: url,
                    data: s,
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'csrftoken': token,
                    },
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {
                        $(el).parent().remove();
                        console.dir(data);
                        {{--//var v = $.parseJSON(data);--}}
                        InfP('Borrado de imagen', 'Se ha borrado la imagen ' + id);
                        {{--swal(
                            '{!! Funciones::ReemplazarApostrofe(('users.applychange')) !!}',
                            '{!! Funciones::ReemplazarApostrofe(trans('users.successchange')) !!}',
                            'success'
                        )--}}
                    },
                    error:
                        function (xhr, status, error) {
                            var err = eval(xhr.responseText.sms);
                            var v = $.parseJSON(xhr.responseText);
                            swal({
                                title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                                html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v.sms,
                                type: 'error',
                                confirmButtonColor: '#4fb7fe'
                            });
                        }
                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltaskbyuser')) !!}',
                        'error'
                    )
                }
            })
        }

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
        }

        $(window).on('resize', function () {
            var v = $(window).height();
            if (v < 750) {
                $('body').removeClass('fixedMenu_left');
            } else {
                $('body').addClass('fixedMenu_left');
            }
        });
        $('div.alert').not('.alert-important').delay({!! $tiempoaviso !!}).fadeOut({!! $tiempoaviso !!});

        function getdata() {
            axios.get('/panel/tickets/data')
                .then(function (response) {
                    adr = response.data;
                })
                .catch(function (error) {
                            {{--//var err = eval(xhr.responseText.sms);--}}
                    var e = error;
                    console.dir(e);
                    var v = e.message;
                    swal({
                        title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                    $('.save').prop('disabled', false);
                });
        };

        function clearnumber(el) {
            var s = $(".telefonos");
            $.each(s, function (k, v) {
                var base = $(v).attr('data-base');
                var ext = $(v).parent().find('.country-list').find('.active').attr('data-dial-code');
                var cod = $(v).parent().find('.country-list').find('.active').attr('data-country-code');
                var el = $(v);
                console.dir(el);

                $('[data-id=e' + base + ']').val(ext);
                $('[data-id=c' + base + ']').val(cod);

            });

            if (el !== undefined) {
                if (el !== '') {
                    $(el).click();
                }
            }
        };

        $.each($("[rel=tooltip]"), function (k, v) {
            var s = $(v).attr('data-title');
            var r = s;
            {{--//var r = $("[rel=tooltip]").tooltip({html:true});--}}
            /*
            r = r.replace('<br>', '  ');
            r = r.replace('<br>', '  ');
            r = r.replace('<br>', '  ');
            r = r.replace('<br>', '  ');
            */
            $(v).attr('data-title', r).attr('title', r)
                .tooltip({
                    html: true,
                    title: r,
                    placement: "auto",
                    track: true,
                    content: function () {
                        return $(this).prop('title');
                    },
                    open: function (event, ui) {
                        ui.tooltip.animate({top: ui.tooltip.position().top + 10}, "fast");
                    },
                    position: {
                        {{--//my: "center bottom-20",
                                    //at: "center bottom",--}}
                        /*
                        using: function (position, feedback) {
                            $(this).css(position);
                            $("<div>")
                                .addClass("arrow")
                                .addClass(feedback.vertical)
                                .addClass(feedback.horizontal)
                                .appendTo(this);
                        }
                        */
                    }
                });

        });

        function SucP(titulo, contenido) {
            PNotify.prototype.options.styling = "fontawesome";

            new PNotify({
                title: titulo,
                text: contenido,
                type: 'success',
                delay: {!! $tiempoaviso !!},
                /*
                animate: {
                    animate: true,
                    in_class: 'slideInDown',
                    out_class: 'slideOutUp'
                }*/
            });

        };

        function WarP(titulo, contenido) {
            PNotify.prototype.options.styling = "fontawesome";
            new PNotify({
                title: titulo,
                text: contenido,
                type: 'warning',
                delay: {!! $tiempoaviso !!},
                /*
                animate: {
                    animate: true,
                    in_class: 'slideInDown',
                    out_class: 'slideOutUp'
                }
                */
            });
        };

        function InfP(titulo, contenido) {
            PNotify.prototype.options.styling = "fontawesome";
            new PNotify({
                title: titulo,
                text: contenido,
                delay: {!! $tiempoaviso !!},
                type: 'info',
                /*
                animate: {
                    animate: true,
                    in_class: 'slideInDown',
                    out_class: 'slideOutUp'
                }
                */
            });
        };

        function ErrP(titulo, contenido) {
            PNotify.prototype.options.styling = "fontawesome";
            new PNotify({
                title: titulo,
                delay: {!! $tiempoaviso !!},
                text: contenido,
                type: 'error',
                /*
                animate: {
                    animate: true,
                    in_class: 'slideInDown',
                    out_class: 'slideOutUp'
                }
                */
            });
        };


        @if(!empty($cd))
    </script>
@endif