@php
    $user = isset($user)?$user:null;
    $tiempoaviso = 60000;
    $time = \Session::get('timezone');
    $time = !empty($time)?$time:Config::get('app.timezone');

    $dia = Funciones::AjustarFechaYmdSlash();
    $hora = Funciones::AjustarHoraHM();
@endphp
@if(!empty($cd))
    <script>
        @endif
        {{--
        var tz = "{!! route('TimeZone') !!}";
        function getTimeZone(){
            axios.post(tz, form).then(function (response) {
                InfP(response.data.sms);
            }).catch(function (error) {
                console.dir(error.data);
                InfP(error.data.sms);
            });
        }
        --}}
        function ObtenerDatoCaballo(id) {
            var form = new FormData();
            $('.hwsh').html('');
            form.append('id', id);
            axios.post("{!! route('FacebookDatoCaballo') !!}", form)
                .then(function (response) {
                    var f = response.data;
                    $('.hwsh').html(f.description);
                })
                .catch(function (error) {
                    {{--
                    //console.dir(error.data);
                    //InfP(error.data.sms);
                --}}
                });
        }

        function CambiarCaballo() {
            ObtenerDatoCaballo($('#horse').val());
        }


        function EliminarPost(id) {
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('facebook.deletepostt')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! Funciones::ReemplazarApostrofe(trans('facebook.deletepostc')) !!}',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                var form = new FormData();
                form.append('id', id);
                axios.post(@if(\Auth::user()->isAdm()) "{!! route('BorrarPostAdmin') !!}"
                @else "{!! route('BorrarPost') !!}" @endif , form
            ).
                then(function (response) {
                    InfP(response.data.sms, '');
                }).catch(function (error) {
                    console.dir(error.data);
                    InfP(error.data.sms, '');
                });
                limpiarModalCaballo();
                $.each($('.closeup'), function (k, v) {
                    $(v).click();
                });
                form = null;
            }, function (dismiss) {
            });
        };

        function limpiarModalCaballo() {
            var modal = $('#publicar');
            $('.bla').removeClass('hidden-xs-up');
            $('.linkfb').remove();
            $('.hwsh').html('');
            $('.ident').html('');
            $('.bor').val('');
            $('.deletepost').remove();
            $(modal).find('.dp2').val("{!! $dia !!}");
            $(modal).find('.tp2').val("{!! $hora!!}");
            $(modal).find('.sms').val('');
            $(modal).find('.publicar_id').val('');
            $(modal).find('.linkfb').remove();
            $('#cerrarpublicar').click();
        };

        function ClickAndClear(el) {
            limpiarModalCaballo();
            $("#" + el).click();
        };

        function BorrarDatosFb() {
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('facebook.deletedata')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! Funciones::ReemplazarApostrofe(trans('facebook.deletedatahtml')) !!}',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                $('.deletedata').click();
            }, function (dismiss) {
            })
        }

        "use strict";
        $(document).ready(function () {
            {{--initialize the external events -------------------------------------------------------------------}}
            function ini_events(ele) {
                ele.each(function () {
                    var eventObject = {
                        title: $.trim($(this).text())
                    };
                    $(this).data('eventObject', eventObject);
                    {{--// make the event draggable using jQuery UI--}}
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true,
                        revertDuration: 0
                    });
                });
            }

            ini_events($('#external-events div.external-event'));
            var evt_obj;
                    {{--/* initialize the calendar --}}
                    {{--//Date for the calendar events (dummy data)--}}
            var date = new Date();
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
                    {{--
                    $('#calendar').fullCalendar({
                        timezone: "{!! $time !!}",
                        locale: "{!! App::getLocale() !!}",
                        timeFormat: "YYYY/MM/DD HH:mm",
                        currentDate: "{!! Funciones::AjustarFechaFormatoMaterial() !!}",
                        displayEventTime: false,
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        buttonText: {
                            prev: "",
                            next: "",
                            today: '{!! trans('sell.hoy') !!}',
                            month: 'M',
                            week: 'W',
                            day: 'D'
                        },
                        events: [
                                @for($i=0;$i<count($publicaciones);$i++)
                                @if(isset($publicaciones[$i]))
                                @php
                                    $el = $publicaciones[$i];
                                    $tiempo1 = \Carbon\Carbon::parse($el->publish_time);
                                    if(!empty($el->programing_date)){
                                        $tiempo1 = \Carbon\Carbon::parse($el->programing_date);
                                    }
                                    $disable = false;
                                    $hoy = \Carbon\Carbon::now();
                                    $blk = $el->getPosted();
                                     $disable = $blk;
                                    $tiempo = Funciones::AjustarFechaYmdHm($tiempo1->addMinutes(1));
                                    $tiempof = Funciones::AjustarFechaYmdHm($tiempo1,1);
                                    $tipo = $el->type;
                                    $fa =  $el->getData();
                                    $slug = '';
                                    $mensaje = $el->getMessage();
                                    $link = $el->url;
                                    $fondo = "#ff9933";
                                    if(!empty($fa)){
                                        if(isset($fa->message)){
                                            $mensaje = $fa->message;
                                        }
                                        if(isset($fa->permalink_url)){
                                            $link = $fa->permalink_url;
                                        }
                                    }
                                    $ts = $el->getOp();
                                    $linkr = $link;
                                    if(!empty($ts)){
                                        if(isset($ts->link)){
                                            $linkr = $ts->link;
                                        }
                                    }
                                    if($tipo == 1){
                                        /*Caballo*/
                                        $ga = Horses::find($el->horses_id);
                                        $titulo =  $ga->getName();
                                        $mensaje =  $ga->getName();
                                        $slug = $ga->slug;
                                        $fondo = "#b4c6ef";
                                    }elseif($tipo ==2){
                                        /*Archivo*/
                                        $titulo = Funciones::ReemplazarApostrofe(trans('facebook.file'));
                                        $fondo = "#f38e8e";
                                    }elseif($tipo ==3){
                                        /*Link*/
                                        $titulo = Funciones::ReemplazarApostrofe(trans('facebook.link'));
                                        $fondo = "#8ef391";
                                    }
                                if($blk == 1){
                                $fondo = "#bababa";
                                }
                                @endphp
                            {
                                title: '{!!  Funciones::ReemplazarApostrofe($mensaje) !!}',
                                start: moment("{!! $tiempo !!}", "YYYY-MM-DD HH:mm", true).toISOString(),
                                st: "{!! $tiempo !!}",
                                end: moment("{!! $tiempof !!}", "YYYY-MM-DD HH:mm", true).toISOString(),
                                data:{!! json_encode($el) !!},
                                @if(!empty($link))
                                link: "<a href='{!! $link !!}' class='btn btn-warning linkfb' target='_blank'> {!! Funciones::ReemplazarApostrofe(trans('facebook.visita')) !!} </a>",
                                @else
                                link: '',
                                @endif
                                linkc: "{!! $linkr !!}",
                                @if($disable == 0)
                                borrar: "<a href='#!' class='btn btn-warning deletepost' onclick='EliminarPost({!! $el->id !!})'> {!! Funciones::ReemplazarApostrofe(trans('facebook.borrar')) !!} </a>",
                                @else
                                borrar: "",
                                @endif
                                sms: "{{ $mensaje }}",
                                id: "{{$el->id}}",
                                idp: '<input type="hidden" class="hidden-xs-up idp" name="idp" value="{{$el->id}}">',
                                type:{!! $tipo !!},
                                disable:{!! $disable  !!},
                                horse: "{!!  $slug !!}",
                                backgroundColor: "{!! $fondo !!}"
                            } @if($i < count($publicaciones)) , @endif
                            @endif
                            @endfor
                        ],
                        eventClick: function (calEvent, jsEvent, view) {
                            $('.linkfb').remove();
                            limpiarModalCaballo();
                            evt_obj = calEvent;
                            var modal = undefined;
                            var t = evt_obj.type;
                            var id = evt_obj.id;
                            var idp = evt_obj.idp;
                            $.each($('.ident'), function (k, v) {
                                $(v).html(idp);
                            });
                            var dele = evt_obj.borrar;
                            if (t == 1) {
                                modal = $('#publicar');
                                var h = evt_obj.horse;
                                var st = evt_obj.st;
                                var sms = evt_obj.sms;
                                var link = evt_obj.link;
                                var blk = evt_obj.disable;
                                if (blk == 1) {
                                    $(modal).find('.bla').addClass('hidden-xs-up');
                                }
                                $(modal).find('#horse').val(h).trigger('click');
                                $(modal).find('.dp2').val(st);
                                $(modal).find('.sms').val(sms);
                                $(modal).find('.publicar_id').val(id);
                                $(link).insertBefore($(modal).find('.bla '));
                                $(dele).insertBefore($(modal).find('.bla '));
                                $(modal).modal('show');
                                ObtenerDatoCaballo(h);
                            } else if (t == 3) {
                                modal = $('#adevideo');
                                /*var h = evt_obj.horse;*/
                                var st = evt_obj.st, sms = evt_obj.sms, link = evt_obj.link, linkc = evt_obj.linkc;
                                var blk = evt_obj.disable;
                                if (blk == 1) {
                                    $(modal).find('.bla').addClass('hidden-xs-up');
                                }
                                $(modal).find('#yt').val(linkc);
                                $(modal).find('.dp2').val(st);
                                $(modal).find('.sms').val(sms);
                                $(modal).find('.publicar_id').val(id);
                                $(link).insertBefore($(modal).find('.bla '));
                                $(dele).insertBefore($(modal).find('.bla '));
                                $(modal).modal('show');

                } else {
                    var blk = evt_obj.disable;
                    if (blk == 1) {
                        $(modal).find('.bla').addClass('hidden-xs-up');
                    }
                    $("#event_title").val(evt_obj.title);
                    var currColor = evt_obj.backgroundColor;
                    colorChooser.css({
                        "background-color": evt_obj.backgroundColor,
                        "border-color": evt_obj.backgroundColor
                    }).html('type <span class="caret"></span>');
                    $('#evt_modal').modal('show').on("shown.bs.modal", function () {
                        $("#event_title").focus();
                    }).on("hidden.bs.modal", function () {
                        evt_obj = "";
                    });
                    $(".text_save").on("click", function () {
                        evt_obj.title = $("#event_title").val();
                        evt_obj.backgroundColor = currColor;
                        $('#calendar').fullCalendar('updateEvent', evt_obj);
                        setTimeout(setpopover, 100);
                    });
                }
                },
                dayClick: function (date, jsEvent, view) {
                    /*console.log('clicked on ' + date.format());*/
                    $('#calendar').fullCalendar('changeView', 'agendaDay', date.format());
                },
                editable: true,
                    droppable: false,
                    drop: function (date, allDay) {
                    return null;
                    var originalEventObject = $(this).data('eventObject');
                    var copiedEventObject = $.extend({}, originalEventObject);
                    var $calendar_badge = $(".calendar_badge");
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    copiedEventObject.backgroundColor = $(this).css("background-color");
                    copiedEventObject.borderColor = $(this).css("border-color");
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                    $calendar_badge.text(parseInt($calendar_badge.text()) + 1);
                    if ($('#drop-remove').is(':checked')) {
                        $(this).remove();
                    }
                    setpopover();
                },
                eventDrop: function () {
                    return null;
                    setTimeout(setpopover, 100);
                },
                eventResize: function () {
                    setTimeout(setpopover, 100);
                }
                });
        --}}
                    {{--ADDING EVENTS }}
                    var currColor = "#737373";
                            {{--//default--}}
                    {{--//Color chooser button--}}
            var colorChooser = $(".color-chooser-btn");
            $(".color-chooser > a").on('click', function (e) {
                e.preventDefault();
                {{--//Save color--}}
                    currColor = $(this).css("background-color");
                {{--//Add color effect to button--}}
                colorChooser
                    .css({
                        "background-color": currColor,
                        "border-color": currColor
                    })
                    .html($(this).text() + ' <span class="caret"></span>');
            });
            $("#add-new-event").on('click', function (e) {
                e.preventDefault();
                        {{--//Get value and make sure it is not null--}}
                var $newevent = $("#new-event");
                var val = $newevent.val();
                if (val.length == 0) {
                    return;
                }
                        {{--//Create event--}}
                var event = $("<div />");
                event.css({
                    "background-color": currColor,
                    "border-color": currColor,
                    "color": "#fff"
                }).addClass("external-event");
                event.html(val).append(' <i class="fa fa-times event-clear" aria-hidden="true"></i>');
                $('#external-events').prepend(event);
                {{--//Add draggable funtionality--}}
                ini_events(event);
                {{--//Remove event from text input--}}
                $newevent.val("");
            });
            $("body").on("click", "#external-events .event-clear", function () {
                $(this).closest(".external-event").remove();
                return false;
            });
            $(".modal-dialog [data-dismiss='modal']").on('click', function () {
                $("#new-event").replaceWith('<input type="text" id="new-event" class="form-control" placeholder="Event">');
            });

            function setpopover() {
                $(".fc-month-view").find(".fc-event-container a").each(function () {
                    $(this).popover({
                        placement: 'top',
                        html: true,
                        content: $(this).text(),
                        trigger: 'hover'
                    });
                });
                $(".fc-month-button").on('click', function () {
                    $(".fc-event-container a").each(function () {
                        $(this).popover({
                            placement: 'top',
                            html: true,
                            content: $(this).text(),
                            trigger: 'hover'
                        });
                    });
                    return false;
                })
            }

            $(".fc-center").find('h2').css('font-size', '18px');
            setpopover();
        });
        @if(!empty($cd))
    </script>
@endif