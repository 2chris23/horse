@php($user = \Auth::user())
@php($stud = $user->Yeguada())
@php($stud = $user->getSubcritiondate())

@extends('backend.layouts.base')
{{--@section('title', trans('horse.chooseone') )--}}
@section('title', trans('Titulos.SuscripcionStud'))
{{--@section('pagetitle', '<i class="fa fa-pagelines"></i>  '.trans('sell.new') )--}}
@section('topcss')

    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css"/>

    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/timeline2.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/calendar_custom.css')!!}"/>

    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/gallery.css')!!}"/>


    {{--<link type="text/css" rel="stylesheet" href="#" id="skin_change"/>--}}

    <link type="text/css" rel="stylesheet" href="{!!url('assets/vendors/imagehover/css/imagehover.min.css')!!}"/>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <link type="text/css" rel="stylesheet" href="{!! url('phone/css/intlTelInput.css') !!}"/>
    <link rel="stylesheet" href="{{asset('assets/css/unite-gallery.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/ug-theme-default.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-bottom-text.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-right-no-thumb.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-right-thumb.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-right-title-only.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/video_gallery.css')}}"/>
@endsection

@section('topjs')




@endsection
@section('content')


    {{--Codigos promocionales--}}
    <div class="card col-12  m-t-35">
        <div class="card-block">
            <div class='card-header bg-white '>
                <i class="fa fa-ticket"></i> Codigos promocionales
                <span class="pull-right"> nuevo</span>
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <div class=" col-12 table-responsive noSwipe m-t-20">
                            tabla
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Servicios--}}
    <div class="card col-12  m-t-35">
        <div class="card-block">
            <div class='card-header bg-white '>
                <i class="fa fa-ticket"></i>
                Otros Servicios
                <span class="pull-right"> nuevo</span>
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">

                        <div class=" col-12 table-responsive noSwipe m-t-20">
                            tabla

                            demo
                            reg falso, 10 eur
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Ordenes--}}
    <div class="card col-12  m-t-35">
        <div class="card-block">
            <div class='card-header bg-white '>
                <i class="fa fa-ticket"></i>
                Ordenes
                <span class="pull-right"> nuevo</span>
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">


                        <div class=" col-12 table-responsive noSwipe m-t-25">
                            @php($ordenes = \Auth::user()->OrdenItem()->get())
                            @php($orden = \Auth::user()->OrdenItem()->first())
                            <table class="table table-striped table-hover" cellspacing="0" id="tabla">
                                {{--
                                <thead>
                                <tr>

                                    @foreach($orden as $k=>$v)

                                        <th>
                                            {!! $v !!}
                                        </th>
                                    @endforeach
                                    <th>{!! trans('users.see') !!}</th>

                                </tr>

                                </thead>
                                --}}
                                <tbody>



                                @foreach($ordenes as $k=>$v)
                                    <tr>
                                        <td> {!! $v->id !!} </td>
                                        <td> {!! $v->servicio_id !!} </td>
                                        <td> {!! $v->tipo_servicio !!} </td>
                                        <td> {!! $v->subtotal !!} </td>
                                        <td> {!! $v->status !!} </td>
                                        <td> {!! $v->status !!} </td>
                                        <td> {!! $v->created_at !!} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            tabla

                            demo
                            reg falso, 10 eur
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('bottomjs')

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-calendar/0.2.5/js/calendar.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js">
    </script>
    <script type="text/javascript" src="{!!url('assets/js/pages/gallery.js')!!}"></script>
    <script type="text/javascript" src="{!! url('/js/dropify/js/dropify.min.js') !!}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js"></script>
    <!--End of plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/gallery.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/ug-theme-video.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/ug-theme-tiles.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/unitegallery.min.js')}}"></script>
    {{--<script type="text/javascript" src="{{asset('assets/js/video_gallery.js')}}"></script>--}}
    <script>
        function envio(form, url) {
            axios.post(url, form)
                .then(function (response) {
                    var r = response;
                    var el = r.data.el;

               })
 .catch(function (error) {
                    //var err = eval(xhr.responseText.sms);
                    var e = error;
                    console.dir(e);
                });
        }


    </script>

@endsection
