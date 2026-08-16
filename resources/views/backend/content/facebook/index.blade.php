@php($etiquetalabel = "col-xs-12 col-sm-12 col-md-12 col-lg-3 text-sm-left text-md-left text-lg-right col-12")
@php($tiquetainput = "col-xs-12 col-sm-12 col-md-12 col-lg-8 col-12")
@php($pid = $stud->getFbcontact())
@php($time = \Session::get('timezone'))
@php($time = !empty($time)?$time:Config::get('app.timezone'))

@extends('backend.layouts.base')
@section('title', trans('Titulos.Facebook') )
@section('topcss')
    {{--
   <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/bootstrap-material-design.min.css"/>
   <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   --}}

    <link type="text/css" rel="stylesheet" href="{!! route('TimeCss') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! route('ClockCss') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('/js/dropify/css/dropify.css') !!}"/>
    {{--<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.2/fullcalendar.print.css"/>--}}
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.2/fullcalendar.min.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css"/>

    <style>
        .modal-content {
            border-radius: 10px 10px;
        }

        .modal-header {
            border-radius: 10px 10px 0px 0px;
        }

        .dtp .dtp-buttons,
        .dtp-content {
            border-radius: 10px 10px 10px 10px;
        }

        .dtp-header,
        .dtp > .dtp-content > .dtp-date-view > header.dtp-header {
            border-radius: 10px 10px 0px 0px;
        }

        #dtp-svg-clock {
            height: 270px;
        }

        .dtp-buttons > .btn {
            margin-left: 10px;
        }

        .dw-c {
            /*left: -63px;*/
            top: 33px;
            margin-top: 14px;
        }

        .dw-c:before {
            position: absolute;
            top: -9px;
            right: 1px;
            display: inline-block;
            content: '';
            border-right: 10px solid transparent;
            border-bottom: 10px solid #ccc;
            border-bottom-color: #fe6b13;
            border-left: 10px solid transparent;
            border-bottom-color: #fe6b13;
        }
    </style>
@endsection
@section('topjs')

    <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
@endsection
@section('bottomjs')
    <script type="text/javascript" src="{!! url('/js/dropify/js/dropify.min.js') !!}"></script>
    {{--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
    --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="{!! route('FullCalendar.js') !!}"></script>
    {{--<script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>--}}
    <script src="{!! route('TimeJs') !!}"></script>
    {{--<script src="{!! route('BTimepicjer.js') !!}"></script>--}}
    <script src="{!! route('CalendarFacebookJs') !!}"></script>
    <script src="{!! route('ClockJs') !!}"></script>
    <script>
        $(document).ready(function () {
            /*
            $('.timenow').bootstrapMaterialDatePicker({
                date: false,
                format: 'HH:mm',
                clearButton: false,
                switchOnClick: true,
            });
*/

            /*$('.clockpicker2').clockpicker();*/
            $('.timenow').clockpicker({
                align: 'left',
                autoclose: true,
                'default': 'now'
            });
            $('.tp2').clockpicker({
                align: 'left',
                autoclose: true,
                'default': 'now'
            });
            $('.dp2').datepicker({
                todayHighlight: true,
                autoclose: true,
                orientation: "bottom"
            });

            {{--

            $('.dp2').bootstrapMaterialDatePicker({
                format: 'YYYY/MM/DD HH:mm',
                lang: '{!! App::getLocale() !!}',
                nowButton: true,
                clearButton: false,
                switchOnClick: true,
                currentDate: "{!! Funciones::AjustarFechaFormatoMaterial() !!}",
                minDate: "{!! Funciones::AjustarFechaFormatoMaterial() !!}",
                cancelText: '{!! Funciones::ReemplazarApostrofe(trans('users.cancel')) !!}',
                okText: '{!! Funciones::ReemplazarApostrofe(trans('users.okclock')) !!}',
                clearText: '{!! Funciones::ReemplazarApostrofe(trans('users.clearText')) !!}',
                nowText: '{!! Funciones::ReemplazarApostrofe(trans('users.nowText')) !!}',
            });
            --}}
            $('#calendar').fullCalendar({
                {{--timezone: "{!! $time !!}",--}}
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
                             $dia = Funciones::AjustarFechaYmdSlash($tiempo1);
                             $hora = Funciones::AjustarHoraHM($tiempo1);
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
                                    if(!empty($fa->message)){
                                        $mensaje = $fa->message;
                                    }
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
                                $mensaje =  $ga->getName().": $mensaje";
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
                        $mensaje = Funciones::ReemplazarApostrofe($mensaje);
                        @endphp
                    {
                        title: '{!!  $mensaje !!}',
                        start: moment("{!! $dia." ".$hora !!}", "YYYY/MM/DD HH:mm", true).toISOString(),
                        st: "{!! $tiempo !!}",
                        end: moment("{!! $tiempof !!}", "YYYY/MM/DD HH:mm", true).toISOString(),
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
                        sms: "{!! $mensaje !!}",
                        id: "{{$el->id}}",
                        dia: "{{$dia}}",
                        hora: "{{$hora}}",
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
                    var dia = evt_obj.dia;
                    var hora = evt_obj.hora;

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
                        $(modal).find('.dp2').val(dia);
                        $(modal).find('.tp2').val(hora);
                        $(modal).find('.sms').val(sms);
                        $(modal).find('.publicar_id').val(id);
                        $(link).insertBefore($(modal).find('.bla '));
                        $(dele).insertBefore($(modal).find('.bla '));
                        $(modal).modal('show');
                        $('#caballolib').click();
                        ObtenerDatoCaballo(h);
                    } else if (t == 3) {
                        //modal = $('#adevideo');
                        modal = $('#publicar');
                        var v = $('#linkso');
                        /*var h = evt_obj.horse;*/
                        var st = evt_obj.st, sms = evt_obj.sms, link = evt_obj.link, linkc = evt_obj.linkc;
                        var blk = evt_obj.disable;
                        if (blk == 1) {
                            $(v).find('.bla').addClass('hidden-xs-up');
                        }
                        $(v).find('#yt').val(linkc);

                        $(v).find('.sms').val(sms);
                        $(v).find('.dp2').val(dia);
                        $(v).find('.tp2').val(hora);
                        $(v).find('.publicar_id').val(id);
                        $(link).insertBefore($(v).find('.bla'));
                        $(dele).insertBefore($(v).find('.bla'));
                        $(modal).modal('show');
                        $('#caballolib').click();
                        {{--caballo t1 publicar --}}
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
                    $('.deletepost').height($('.deletepost').parent().find('[type="submit"]').height());
                    $('.linkfb').height($('.linkfb').parent().find('[type="submit"]').height());

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


        });
    </script>
@endsection
@section('content')
    {{--https://github.com/loebi-ch/jquery-clock-timepicker--}}
    {{--<script src="http://plugins.slyweb.ch/jquery-clock-timepicker/jquery-clock-timepicker.min.js"></script>--}}
    {{--
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
    --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>
                    <div class="row">
                        <div class="col-12 col-md-8 col-lg-10">
                            {!! trans('facebook.titulo_pagina') !!}
                        </div>

                        <div class=" col-md-4 col-lg-2 ">
                            <div class=" no-bg text-center pull-right center-block">
                                <button type="button" class="btn btn-default no-bg " data-toggle="dropdown">
                                    <i class="fa fa-cogs"></i>
                                    {{--<strong>Vanessa Guzmán</strong>--}}
                                    <span class="fa fa-sort-down white_bg"></span>
                                </button>
                                <div class="dropdown-menu dw-c">
                                    {{--
                                    <a class="dropdown-item title" href="#">
                                        Planificaciones diarias
                                    </a>
                                    --}}
                                    <a class="dropdown-item" href="{!! route('privacidadl') !!}" target="_blank">
                                        <i class="fa fa-key"> </i>
                                        {!! trans('facebook.privacidadb') !!}
                                    </a>
                                    <a class="dropdown-item" href="#!" onclick="BorrarDatosFb()">
                                        <i class="fa fa-minus-circle">
                                        </i>
                                        {!! trans('facebook.deletedatab') !!}

                                    </a>


                                </div>

                            </div>
                        </div>
                        <form action="{!! route('BorrarDatosFb') !!}" method="post"
                              class="hidden-xs-up">
                            {!! csrf_field() !!}
                            <button type="submit"
                                    class="btn btn-success pull-left hidden-xs-up deletedata"> borrar
                            </button>
                        </form>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12 m-t-25 row">
                        <div class="col-12 ">
                            <span class="p-l-10 ">
                                 <a href="#!" onclick="ClickAndClear('ph')" class="btn btn-warning">
                                 {!! trans('facebook.p_h') !!}
                                 </a>
                                 <button class="btn btn-raised btn-warning adv_cust_mod_btn bounceindown hidden-xs-up"
                                         id="ph"
                                         data-toggle="modal"
                                         data-target="#publicar">
                                 </button>
                             </span>
                            <span class="p-l-10 ">
                                <a href="#!" onclick="ClickAndClear('ConfFbBTN')" class="btn btn-warning">
                                    {!! trans('facebook.progdiaria') !!}

                                    </a>
                             </span>
                            {{--
                             <span class="p-l-10 pull-right">
                                 <a href="#!" onclick="ClickAndClear('btnyt')" class="btn btn-warning">
                                     {!! trans('facebook.p_yt') !!}
                                 </a>
                                 <button class="btn btn-raised btn-warning adv_cust_mod_btn bounceindown hidden-xs-up"
                                         id="btnyt" data-toggle="modal"
                                         data-target="#adevideo">
                                     {!! trans('facebook.p_yt') !!}
                                 </button>
                             </span>
--}}

                            {{--
                            <span class="p-l-10 pull-right">
                                 <a href="#!" onclick="ClickAndClear('ph')" class="btn btn-warning">
                                 {!! trans('facebook.p_h') !!}
                                 </a>
                                 <button class="btn btn-raised btn-warning adv_cust_mod_btn bounceindown hidden-xs-up"
                                         id="ph"
                                         data-toggle="modal"
                                         data-target="#publicar">
                                 {!! trans('facebook.p_h') !!}
                                 </button>
                             </span>
                            --}}
                            {{--
                            <span class="p-l-10 pull-right">
                                 <a href="#!" onclick="ClickAndClear('btnsmeh')" class="btn btn-warning">
                                     {!! trans('facebook.somehorses') !!}
                                 </a>
                                 <button class="btn btn-raised btn-warning adv_cust_mod_btn bounceindown hidden-xs-up"
                                         id="btnsmeh" data-toggle="modal"
                                         data-target="#posthorses">
                                     {!! trans('facebook.p_yt') !!}
                                 </button>
                            </span>
                            --}}
                            {{--
                            <span class="p-l-10 pull-right">
                                 <a href="#!" onclick="ClickAndClear('btnsmeha')" class="btn btn-warning">
                                     {!! trans('facebook.cubricion') !!}
                                 </a>
                                 <button class="btn btn-raised btn-warning adv_cust_mod_btn bounceindown hidden-xs-up"
                                         id="btnsmeha" data-toggle="modal"
                                         data-target="#posthorsesem">
                                     {!! trans('facebook.p_yt') !!}
                                 </button>
                             </span>
                            --}}

                            {{--
                            <span class="p-l-10 pull-right">
                                 <a href="#!" onclick="ClickAndClear('pimg')" class="btn btn-warning">
                                 {!! trans('facebook.p_img') !!}
                                 </a>
                                 <button class="btn btn-raised btn-warning adv_cust_mod_btn bounceindown hidden-xs-up"
                                         id="pimg"
                                         data-toggle="modal"
                                         data-target="#adefoto">
                                 {!! trans('facebook.p_img') !!}
                                 </button>
                             </span>
                            --}}


                            {{--@if(\Session::has('errorlogin'))
                                <span class="p-l-10 pull-right">
 <a href="{!! route('LogeoSocial',['provider'=>'facebook']) !!}" class="btn btn-warning">
 Autorizar Fb
 </a>
 </span>
                            @endif--}}
                        </div>
                        <div class="col-12 table-responsive text-xs-center m-t-20">
                            <div id='calendar'></div>
                        </div>
                        {{--
                        @if(!empty($pid))
                            <div class="col-12">
                                <a href="{!! route('Obten') !!}" class="btn-warning">Obtener Pagina</a>
                                <a href="{!! route('paywithstripe2') !!}" class="btn-warning">Obtener Pagina 2</a>
                                Contenido aqui
                            </div>
                        @else
                            <a href="{!! route('LogeoSocial',['provider'=>'facebook']) !!}" class="btn-warning">Autorizar
                                Fb</a>
                        @endif
                        --}}
                        <button class="btn btn-raised btn-warning adv_cust_mod_btn bounceindown hidden-xs-up"
                                id="ConfFbBTN"
                                data-toggle="modal"
                                data-target="#ConfFb">
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('modal')
    {{--
    @include('assets.modalesfb.caballos')
    @include('assets.modalesfb.cubricion')
    @include('assets.modalesfb.foto')
    --}}
    @include('assets.modalesfb.caballo')
    @include('assets.modalesfb.link')
    @include('assets.modalesfb.configuracion')
@endsection