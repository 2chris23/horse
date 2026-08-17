@php($etiquetalabel = "col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-sm-left text-md-left text-lg-right ")
@php($tiquetainput = " col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ")

@php

    $horse_id =(empty($horse->id))?0:$horse->id;
@endphp
@extends('backend.layouts.base')
{{--@section('title', trans('horse.Tittle') )--}}
@section('title', trans('Titulos.HorseEditStud',['name'=>$horse->getName()]))
{{--@section('pagetitle', '<i class="fa fa-pagelines">
{{--@section('pagetitle', '<i class="fa fa-domapagelines">
</i>  '.trans('horse.new') )
--}}
@section('topcss')

    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css"/>
    {{--<link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/timeline2.css')!!}"/>--}}
    {{--<link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/calendar_custom.css')!!}"/>--}}
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/profile.min.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/gallery.css')!!}"/>
    {{--
    <link type="text/css" rel="stylesheet"
          href="{!!url('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css')!!}"/>
    --}}
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css"/>

    <link type="text/css" rel="stylesheet" href="{!!url('assets/vendors/imagehover/css/imagehover.min.css')!!}"/>
    {{--<link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css"/>--}}
    <link type="text/css" rel="stylesheet" href="{!! url('/js/dropify/css/dropify.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/bootstrap-select.min.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('js/step/css/smart_wizard.min.css') !!}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <style>

        .vistos {
            font-size: 14px;
            color: #ff9933;
            padding-left: 10px;
        }
        .Vendido{
            font-size: 14px;
            color: red;
            padding-left: 10px;
        }
    </style>



@endsection
@section('dd')

    {{--<script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js">
</script>--}}



@endsection
@section('content')
    <script>
        var dasdas = null;
    </script>
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>
                    <div class="row">
                        {{--
                        <br>
</br> <a href="{!! route('MyHorseDetailed',['stud'=>\Auth::user()->Yeguada()->slug,'horse'=>$horse->id]) !!}" target="_blank"> Link pa ver</a>
                        --}}

                        <div class="col-9 row">
                            @php
                                $favo = $horse->favorite;
                                if($favo == 1){
                                $vasi = '';
                                $vano='hidden-xl-down';
                                }else{
                                $vano = '';
                                $vasi='hidden-xl-down';
                                }
                            @endphp
                            <div class="col-1">
                                <a href="javascript:void(0);" id="favorite_si"
                                   data-toggle="popover" data-trigger="hover" data-placement="left"
                                   title="{!! trans('popover.horse.favorito.titulo') !!}"
                                   data-content="{!! trans('popover.horse.favorito.contenido',['name'=>$horse->name]) !!}"
                                   onclick="setfav({!! $horse->id !!},0)"
                                   class=" {!! $vasi !!} ">

                                    <i class="fa fa-star star"> </i>


                                </a>
                                <a href="javascript:void(0);" id="favorite_no"
                                   onclick="setfav({!! $horse->id !!},1)"
                                   data-toggle="popover" data-trigger="hover" data-placement="left"
                                   title="{!! trans('popover.horse.favorito.titulo') !!}"
                                   data-content="{!! trans('popover.horse.favorito.contenido',['name'=>$horse->name]) !!}"
                                   class=" {!!$vano !!} ">
                                    <i class="fa fa-star-o star"> </i>
                                </a>

                                {{--<div class="text-right star font-15" data-toggle="tooltip"
                                     title="Visitas {!! $horse->getVisitantes() !!}">
                                    <i class="fa fa-eye star font-15"></i> {!! $horse->getVisitantes() !!}
                                </div>--}}

                            </div>
                            <div class="col-11">
                                {!! trans('horse.text.edit_title',['name'=> $horse->name]) !!}
                                <span class='vistos'>
                                    ({!! trans('botones.visto',['n'=>$horse->getVisitantes()]) !!})
                                </span>
{{--
                                <span class="Vendido pull-right">
                                    Vendido el {!! $venta->getFechaSlash() !!}
                                </span>
--}}
                            </div>

                        </div>
                        <div class=" col-3 pull-right ">
                            <a href="{!! route('sell.create') !!}" class=" btn btn-warning pull-right ">
                                {!! trans('users.return') !!}</a>

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-12 m-t-25">
                        @if($horse->sold == 1)

                            <div class="ribbon popular ribon-sm ribbon-midde"></div>
                        @endif
                        <div id="smartwizard">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="#horsedata">
                                        {!! trans('users.step',['n'=>1]) !!} <br>
                                        <small>
                                            {!! trans('horse.text.create_title') !!}
                                        </small>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#imagedata">
                                        {!! trans('users.step',['n'=>2]) !!} <br>
                                        <small>
                                            {!! trans('stud.photos') !!}
                                        </small>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#videodata">
                                        {!! trans('users.step',['n'=>3]) !!} <br>
                                        <small>
                                            {!! trans('stud.video') !!}
                                        </small>

                                    </a>

                                </li>

                            </ul>
                            <div class="m-t-25">
                                <div id="horsedata" class="row">
                                    <form action="" id="horse_" class="m-t-35 row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.name')}}:
                                                </label>
                                                <div class="{!! $tiquetainput !!}">
                                                    <input disabled type="text" placeholder="{{trans('horse.placeholder.name')}}"
                                                           id="input_horse_name"
                                                           onchange="campos()"
                                                           name="name"
                                                           value="{{$horse->getName() }}" class="form-control">

                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.raised')}}:
                                                </label>
                                                <div class="{!! $tiquetainput !!}">
                                                    <input disabled type="text"
                                                           name="raised"
                                                           placeholder="{{trans('horse.placeholder.raised')}}"
                                                           id="input_horse_raised" name="input_horse_raised"
                                                           value="{{$horse->getRaised()}}" class="form-control"
                                                    >


                                                </div>
                                            </div>
                                        </div>
                                        @include('backend.common.colors',['seleccionado'=>$horse->color])
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.birthdate')}}:
                                                </label>
                                                <div class="{!! $tiquetainput !!}">
                                                    <input disabled type="date"
                                                           placeholder="{{trans('horse.placeholder.birthdate')}}"
                                                           name="date"
                                                           id="input_horse_birthdate"
                                                           value="{{$horse->getBirthdate()}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        @include('backend.common.raza',['seleccionado'=>$horse->raza ])

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!}  ">
                                                    {{trans('horse.text.doma')}}:
                                                </label>
                                                <div class="{!! $tiquetainput !!} ">
                                                    <button type="button" id="input_horse_doma_si"
                                                            class=" btn btn-labeled btn-success
                                        {!! ($horse->getDoma() == true )?'':'hidden-xl-down' !!} ">
                                                        <input disabled type="hidden" value="{!! $horse->getDoma() !!}"
                                                               name="doma" id="doma">

                                                        <span class="btn-label">
                                                    <i class="fa fa-check"> </i>
                                                </span>
                                                        {{trans('text.yes')}}
                                                    </button>
                                                    <button type="button" id="input_horse_doma_no"
                                                            class=" btn btn-labeled btn-danger {!! ($horse->getDoma() == false)?'':'hidden-xl-down' !!} ">
                                                <span class="btn-label">
                                                    <i class="fa fa-close"> </i>
                                                </span>
                                                        {{trans('text.no')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @include('backend.common.sex',['seleccionado'=>$horse->sex,'horse'=>$horse])

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.stud')}}:
                                                </label>
                                                <div class="{!! $tiquetainput !!}">
                                                    <input disabled type="text" placeholder="{{trans('horse.placeholder.stud')}}"
                                                           id="input_horse_stud"
                                                           name="input_horse_stud"
                                                           value="{{$horse->getStud()}}" class="form-control ">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.genealogia')}}:
                                                </label>
                                                <div class="{!! $tiquetainput !!}">
                                                    <input disabled type="url"
                                                           placeholder="{{trans('horse.placeholder.genealogia')}}"
                                                           id="genealogia"
                                                           name="genealogia"
                                                           value="{{$horse->getGenealogia()}}" class="form-control ">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.tosold')}}
                                                </label>
                                                <div class="col-xs-3 col-sm-3 col-md-2 col-lg-1">
                                                    <button type="button" id="check_si"
                                                            class=" btn btn-labeled btn-success {!! ($horse->getTosold() == true)?'':'hidden-xl-down' !!}">
                                                <span class="btn-label">
                                                    <i class="fa fa-check"> </i>
                                                </span>
                                                        {{trans('text.yes')}}
                                                    </button>
                                                    <button type="button" id="check_no"
                                                            class=" btn btn-labeled btn-danger {!!  ($horse->getTosold() == false)?'':'hidden-xl-down' !!} ">
                                                <span class="btn-label">
                                                    <i class="fa fa-close">
</i>
                                                </span>
                                                        {{trans('text.no')}}
                                                    </button>
                                                    <input disabled type="hidden" value="{!! $horse->getTosold() !!}"
                                                           name="tosold" id="tosold">
                                                </div>
                                                <div class="col-xs-3 col-sm-9 col-md-4 col-lg-5">
                                                    <input disabled type="text"
                                                           placeholder="{{trans('horse.placeholder.price')}}"
                                                           id="input_horse_price"
                                                           name="price"
                                                           value="{{Funciones::AjustarNumeroMil($horse->getPrice())}}"
                                                           class="form-control numbers {!! ($horse->getTosold() == true)?'':'hidden-xl-down' !!}">

                                                    <input disabled class="form-check-input hidden-xl-down" type="checkbox"
                                                           id="tosold"
                                                           id="input_horse_tosold"
                                                           value="{{$horse->getTosold()}}" {!! ($horse->getTosold() == true)?'checked':'' !!}>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.description')}}
                                                </label>
                                                <div class="{!! $tiquetainput !!}">

                                {{$horse->getDescripcion()}}


                                                </div>
                                            </div>
                                        </div>
                                        <div class="offset-3 col-6  text-center ">
                                            {{--
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                                    <a href="#" onclick="savedata()"
                                                       class=" btn btn-block btn-success glow_button ">{!! trans('users.save') !!}</a>
                                                </div>
                                            </div>
                                            --}}
                                        </div>
                                        <input disabled type="hidden" value="{{$horse_id}}" id="horse_id" name="horse_id"
                                               class="form-control">
                                    </form>
                                </div>
                                <div id="imagedata" class=" row ">
                                    <div class="col-12 m-t-35" style="margin-top:50px">



                                        <div class="col-12 m-t-35 row" id="photos" style=""
                                             data-toggle="popover" data-trigger="hover" data-placement="top"
                                             title="{!! trans('popover.ordenarfoto.titulo') !!}"
                                             data-content="{!! trans('popover.ordenarfoto.contenido') !!}">

                                            @foreach($horse->getPhotoModel() as $k=>$v)
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 m-t-20 ">
                                                    @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getUrl()])
                                                </div>
                                            @endforeach
                                        </div>


                                    </div>
                                </div>

                                <div id="videodata" class="row ">

                                    <div class=" col-12 m-t-35">
                                        <div class="form-group row">
                                            <label class="{!! $etiquetalabel !!} col-form-label ">

                                            </label>
                                            <form action="" class="{!! $etiquetalabel !!} row" id="vidoetape">

                                            </form>

                                            <div class="m-t-35 row  m-t-25 col-12" id="video">
                                                @php($videos = $horse->getVideosModel())
                                                @foreach($videos as $k=>$v)
                                                    @if(!empty($v->getEmbedVideoYoutube()))
                                                        <div class="col-3 m-t-20">
                                                            @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getYoutubeThumb(),'embed'=>$v->getEmbedVideoYoutube(),'video'=>1])
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>


                                        </div>
                                    </div>
                                    {{--
                                    <div id="step-4" class="">
                                        Step Content
                                    </div>
                                    --}}
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--
        <div class="col-md-12 m-t-35">
            <div class="card">
                <div class="card-block">
                    <div class='card-header bg-white '>
                        {!! trans('horse.text.images') !!}
                    </div>
                    <div class="row">
                        <div class="col-12 m-t-35" style="margin-top:50px">
                            @include('backend.common.dropzone',['nombre'=>"caballo",'tipo'=>'horse','MaxFile'=>'5','horse'=>$horse_id,'oculto'=>true])
                        </div>


                        <div class="col-12 m-t-35" id="photos">
                            <div class="row">
                                @foreach($horse->getPhotoModel() as $k=>$v)
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3  m-t-20 ">
                                        @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getUrl()])
                                    </div>
                                @endforeach</div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php($videos = $horse->getVideosModel())

        <div class="col-md-12 m-t-35">
            <div class="card">
                <div class="card-block">
                    <div class='card-header bg-white '>
                        {!! trans('video.myvideo') !!}
                    </div>
                    <div class="row">
                        <div class=" col-12 m-t-35">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {!! trans('video.addressvideo') !!}:
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input disabled type="text" placeholder="{{trans('stud.text.youtube')}}"
                                           id="input_stud_video"

                                           value=""
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="offset-3 col-6 m-t-15 text-center">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                    <a href="#savedv" onclick="savevideo('{!! route('video.other') !!}')" id="savedv"
                                       class="save btn btn-block btn-success glow_button">{!! trans('video.addvideo') !!}</a>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-35 row  m-t-25 col-12" id="video">
</div>
                        @foreach($videos as $k=>$v)
                            <div class="col-3 m-t-20">
                                @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getYoutubeThumb(),'video'=>1])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    --}}
@endsection

@section('bottomjs')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{!! url('/js/dropify/js/dropify.min.js') !!}">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js">
    </script>
    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js">
    </script>--}}
    {{--https://cdnjs.com/libraries/moment.js/2.17.1--}}
    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js">
    </script>--}}
    <!--End of Plugin scripts-->
    <!--Page level scripts-->

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js">
    </script>

    <script type="text/javascript" src="{!!url('assets/js/pages/gallery.js')!!}">
    </script>
    <script type="text/javascript" src="{!!url('assets/js/pages/modals.js')!!}">
    </script>
    <script type="text/javascript" src="{!!url('assets/js/bootstrap-select.min.js')!!}">
    </script>
    <!-- piexif.min.js is only needed for restoring exif data in resized images and when you
        wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js"
            type="text/javascript">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js">
    </script>
    <script src="{!! url('js/step/js/jquery.smartWizard.min.js') !!}">
    </script>
    {{--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/locales/LANG.js">
        </script>
    --}}
    <script>
        var testo = null;
        var horse_id ={{$horse_id}};
        var finis = 0;
        var drp = null;
        var typep_caballo = 'horse';
        var subida_caballo = 0;
        //called when key is pressed in textbox
        //var dp_caballo=new Dropzone("div#caballo", dropconp_caballo);
        //$(window).on('load',
        $(document).ready(
            function () {

            });


    </script>

    <script>
$(document).on('ready',function(){
    var s = $('select');
    $.each(s,function(k,v){
        $(v).attr('disabled','disabled');
    });
    s = $('input');
    $.each(s,function(k,v){
        $(v).attr('disabled','disabled');
   });
});

        $('.selectpicker').selectpicker('refresh');


        function envio(form, url) {
            axios.post(url, form)
                .then(function (response) {
                    var r = response;
                    console.dir(r);
                    //var s = $.parseJSON(data);
                    //$('#video').append(s.el);
                    $('#video').append(response.el);
                    swal(
                        '{!! trans('users.applychange') !!}',
                        response.sms,
                        'success'
                    );

               })
                .catch(function (error) {
                    //var err = eval(xhr.responseText.sms);
                    var e = error;
                    console.dir(e);
                    var v = e.message;
                    swal({
                        title: '{!! trans('users.tittleerror') !!}',
                        html: '{!! trans('users.someerror') !!}<br>' + v,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                    $('.save').prop('disabled', false);
                });
            {{--
            $.ajax({
                url: url,
                data: form,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {
                    var s = $.parseJSON(data);
                    $('#video').append(s.el);


                    swal(
                        '{!! trans('users.applychange') !!}',
                        s.sms,
                        'success'
                    )
                },
                error:
                    function (xhr, status, error) {
                        var err = eval(xhr.responseText.sms);
                        var v = $.parseJSON(xhr.responseText);
                        swal({
                            title: '{!! trans('users.tittleerror') !!}',
                            html: '{!! trans('users.someerror') !!}<br>' + v.sms,
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        });
                    }
            });
            --}}
        }

        function HabilitarCaballos(clear = true) {
            EnableElement(raised, clear);
            EnableElement(name, clear);
            EnableElement(birthdate, clear);
            EnableElement(raza, clear);
            EnableElement(doma, clear);
            EnableElement(sex, clear);
            EnableElement(tosold, clear);
            EnableElement(price, clear);
            EnableElement(id, clear);
            EnableElement($('.save'), clear);
            EnableElement($('.cancel'), clear);
        }

        function savedata() {


        };
        $('#tosold').change(function () {

            return null;

        });
        $('#check_si').on('click', function (e) {

        });
        $('#check_no').on('click', function (e) {

        });


        $('#input_horse_doma_si').on('click', function (e) {

        });
        $('#input_horse_doma_no').on('click', function (e) {

        });


        function savevideo(url) {


        }

        var tada = null;
        var fst = 0;
        $(document).on("ready", function () {
            $('#input_horse_raised').mask("000 cm", {reverse: true});
            $('#input_horse_price').mask("000.000.000.000 €", {reverse: true});
            $('#cubri').mask("000.000.000.000 €", {reverse: true});


            $("#photos").sortable({
                stop: function (ui, event) {
                    getItems('#photos');
                }
            }).disableSelection();
            //$('#smartwizard').smartWizard({ //ajaxSettings: {} });
            tada = $('#smartwizard').smartWizard({
                lang: {  // Language variables
                    next: 'Siguente',
                    previous: 'Anterior'
                },
                contentCache: false,
                contentURL: null,
                toolbarSettings: {
                    toolbarPosition: 'none', // none, top, bottom, both
                    toolbarButtonPosition: 'right', // left, right
                    showNextButton: false, // show/hide a Next button
                    showPreviousButton: false, // show/hide a Previous button
                },
                anchorSettings: {
                    anchorClickable: true, // Enable/Disable anchor navigation
                    enableAllAnchors: true, // Activates all anchors clickable all times
                    markDoneStep: true, // Add done css
                    markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
                    enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                },
            });
        }).on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
            //addbtn(stepNumber);

            if (stepNumber === 0) {
                $('.sw-btn-prev').addClass('hidden-xs-up');
            } else {
                $('.sw-btn-prev').removeClass('hidden-xs-up');
            }
            if (stepNumber === 2) {
                $('.sw-btn-next').addClass('hidden-xs-up');
            } else {
                $('.sw-btn-next').removeClass('hidden-xs-up');
            }

            if (stepNumber === 2) {
                $('#fakesave').removeClass('hidden-xs-up');
            } else {
                $('#fakesave').addClass('hidden-xs-up');
            }

            //alert("You are on step " + stepNumber + " now");
        });

        var fisrts = 0;

        function guardado2() {


        }

        $(document).on("ready", function () {

            CKEDITOR.replace("input_stud_description");
            CKEDITOR.on('instanceReady', function (evt) {
                CKEDITOR.instances['input_stud_description'].setData('{!! $horse->getDescripcion() !!}');

            });

            $("#photos").sortable().disableSelection();
        });

        function addvideo() {
            //vidoetape
            var d = $('#input_stud_video').val();
            var s = '<div class="col-12 row"><div class="col-9"><input disabled type="text" id="video" name="video[]"class="form-control " disabled value="' + d + '"></div><div class="col-3"><a href="#!" class="btn btn-waring" onclick="removevideo(this)" ><i class="fa fa-minus"></i></a></div></div>'
            $('#vidoetape').append(s);

            $('#input_stud_video').val('');

        }

        function removevideo(el) {
            var t = $(el).parent().parent().remove();
        }

        var lastp = 0;

        function addbtn(step) {
            lastp = step;
            if (step === 2) {
                if (validar() == true) {
                    $('#fakesave').removeClass('desha');
                } else {
                    $('#fakesave').addClass('desha');
                }
            }

            lastp = step;
            if (step === 2) {
                if (validar() == true) {
                    $('#fakesave').removeClass('desha');
                } else {
                    $('#fakesave').addClass('desha');
                }
            }
            if (fst != 0) return null;
            fst = 1;
            var btn = "<a href=\"#!\" id=\"fakesave\"class=\"btn btn-warning pull-right hidden-xs-up desha\" onclick=\"$('#savec').click()\">Guardar</a>";
            $('.btn-toolbar').children().addClass('col-12 row').append(btn);
        }


        function validar() {

            if (
                $('#colorselect').val() !== 0 &&
                $('#input_horse_raza').val() !== 0 &&
                $('#input_horse_sex').val() !== 0 &&
                $('#input_horse_name').val().length == 0) {
                ErrorCampos('{!! Funciones::ReemplazarApostrofe(trans('error.errorNoSave')) !!}', '{!! Funciones::ReemplazarApostrofe(trans('error.errorNoHorseName')) !!}');
                return false;

            }

            return true;
        }

        function ErrorCampos(titulo, texto) {
            new PNotify({title: titulo, text: texto, type: 'error'});
            return false;
        }

        function setfav(id, valu) {
            //caballoc.fav

        }

        $('#favorite_si').on('click', function (e) {

        });
        $('#favorite_no').on('click', function (e) {


        });
        $(window).on('load', function () {
            $('.sw-btn-next').on('mouseover', function (e) {
                campos();
           });
       });

        function campos() {
            var v1 = $('#colorselect').val();
            var e = 0;
            var v2 = ($('#input_horse_raza').val());
            var f = 0;
            var v3 = ($('#input_horse_name').val().length);
            var g = 0;
            var v4 = $('#input_horse_sex').val();
            var h = 0;


            if (v1 == 0) {
                e = 1
            }
            if (v2 == 0) {
                f = 1
            }
            if (v3 == 0) {
                g = 1
            }
            if (v4 == 0) {
                h = 1
            }


            var el = $('#colorselect');
            if (e === 1) {
                $(el).addClass('has-danger');
            } else {
                $(el).removeClass('has-danger');
            }

            el = $('#input_horse_raza');
            if (f === 1) {
                $(el).addClass('has-danger');
            } else {
                $(el).removeClass('has-danger');
            }

            el = $('#input_horse_name');
            if (g === 1) {
                $(el).addClass('has-danger');
            } else {
                $(el).removeClass('has-danger');
            }

            el = $('#input_horse_sex');
            if (h === 1) {
                $(el).addClass('has-danger');
            } else {
                $(el).removeClass('has-danger');
            }


            if (e === 0 && f === 0 && g === 0 && h === 0) {


                $('.sw-btn-next').removeProp('disabled');
                return true;
            } else {

                $('.sw-btn-next').prop('disabled', true);
                return false;
            }

        }


        $('#input_horse_raza').on('change', function () {
            campos();
        });
        $('#colorselect').on('change', function () {
            campos();
       });

    </script>
@endsection
