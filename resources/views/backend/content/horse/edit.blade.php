@php($etiquetalabel = "col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-sm-left text-md-left text-lg-right ")
@php($tiquetainput = " col-xs-12 col-sm-12 col-md-9 col-lg-6 col-xl-6")

@php
    $horse_id = $horse->id;
@endphp
@extends('backend.layouts.base')
@section('title', trans('Titulos.HorseEditStud',['name'=>$horse->getName()]))
{{--@section('title', trans('horse.Tittle') )--}}
{{--@section('pagetitle', '<i class="fa fa-pagelines"></i>  '.trans('horse.new') )--}}
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>




@endsection
@section('dd')

    {{--<script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>--}}



@endsection
@section('content')
    <style>
        .right {
            float: right !important;
        }
    </style>
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>

                    <div class="row">
                        {{--
                        <br></br> <a href="{!! route('MyHorseDetailed',['stud'=>\Auth::user()->Yeguada()->slug,'horse'=>$horse->id]) !!}" target="_blank"> Link pa ver</a>
                        --}}

                        <div class="col-9">
                            {!! trans('horse.text.create_title') !!}
                        </div>
                        <div class=" col-3 ">
                            <a href="{!! route('caballoc.index') !!}" class=" btn btn-warning pull-right right"> {!! trans('users.return') !!}</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 m-t-25">
                        <form action="" id="horse_" class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="{!! $etiquetalabel !!} col-form-label ">
                                        {{trans('horse.text.name')}}:
                                    </label>
                                    <div class="{!! $tiquetainput !!}">
                                        <input type="text" placeholder="{{trans('horse.placeholder.name')}}"
                                               id="input_horse_name"
                                               value="{{$horse->getName() }}" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="{!! $etiquetalabel !!} col-form-label ">
                                        {{trans('horse.text.raised')}}:
                                    </label>
                                    <div class="{!! $tiquetainput !!} form-group ">
                                        <input type="text" placeholder="{{trans('horse.placeholder.raised')}}"
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
                                        <input type="date" placeholder="{{trans('horse.placeholder.birthdate')}}"
                                               id="input_horse_birthdate"
                                               value="{{$horse->getBirthdate()}}" class="form-control nac">
                                    </div>
                                </div>
                            </div>
                            @include('backend.common.raza',['seleccionado'=>$horse->raza ])
                            {{--
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                                            <div class="form-group row">
                                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                                    {{trans('horse.text.raza')}}:
                                                                </label>
                                                                <div class="{!! $tiquetainput !!}">
                                                                    <select class=" form-control" data-style="btn-primary"
                                                                            id="input_horse_raza">
                                                                        @foreach(trans('horse.raza') as $k=>$v)
                                                                            <option data-tokens="{!! $k !!}" value="{!! $k !!}" @if($horse->raza == $k) selected @endif>{!! $v !!}</option>
                                                                       @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        --}}

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="{!! $etiquetalabel !!} col-form-label ">
                                        {{trans('horse.text.doma')}}:
                                    </label>
                                    <div class="{!! $tiquetainput !!}">
                                        <button type="button" id="input_horse_doma_si"
                                                class=" btn btn-labeled btn-success {!! ($horse->getDoma() == true )?'':'hidden-xl-down' !!} "

                                        >

                                                <span class="btn-label">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                            {{trans('text.yes')}}
                                        </button>
                                        <button type="button" id="input_horse_doma_no"
                                                class=" btn btn-labeled btn-danger {!! ($horse->getDoma() == false)?'':'hidden-xl-down' !!} ">
                                                <span class="btn-label">
                                                    <i class="fa fa-close"></i>
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
                                        <input type="text" placeholder="{{trans('horse.placeholder.stud')}}"
                                               id="input_horse_stud" name="input_horse_stud"
                                               value="{{$horse->getStud()}}" class="form-control ">
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
                                                    <i class="fa fa-check"></i>
                                                </span>
                                            {{trans('text.yes')}}
                                        </button>
                                        <button type="button" id="check_no"
                                                class=" btn btn-labeled btn-danger {!!  ($horse->getTosold() == false)?'':'hidden-xl-down' !!} ">
                                                <span class="btn-label">
                                                    <i class="fa fa-close"></i>
                                                </span>
                                            {{trans('text.no')}}
                                        </button>
                                    </div>

                                    <div class="col-xs-3 col-sm-9 col-md-4 col-lg-5">
                                        <input type="text" placeholder="{{trans('horse.placeholder.price')}}"
                                               id="input_horse_price"
                                               value="{{Funciones::AjustarNumeroMil($horse->getPrice())}}"
                                               class="form-control numbers {!! ($horse->getTosold() == true)?'':'hidden-xl-down' !!}">

                                        <input class="form-check-input hidden-xl-down" type="checkbox" id="tosold"
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
                            <textarea name="input_stud_description" id="input_stud_description" name="input_stud_description">
                                {{$horse->getDescripcion()}}
                            </textarea>
                                        <script>
                                            $(window).on("load", function () {

                                                CKEDITOR.replace("input_stud_description");
                                                CKEDITOR.on('instanceReady', function (evt) {
                                                    CKEDITOR.instances['input_stud_description'].setData('{!! $horse->getDescripcion() !!}');

                                                });


                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="offset-3 col-6  text-center">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                        <a href="#" onclick="savedata()"
                                           class=" btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="{{$horse_id}}" id="horse_id" class="form-control">
                        </form>

                    </div>

                    {{--
                    <form action="{!! route('horse.update',['id'=>$horse->id]) !!}" method="post" id="form_horse">
                        <input type="hidden" value="{{$horse_id}}" id="horse_id" class="form-control">
                    </form>
                    --}}

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 m-t-35">
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>
                    {!! trans('horse.text.images') !!}
                </div>
                <div class="row">
                    <div class="col-12 m-t-35" style="margin-top:50px">
                        @include('backend.common.dropzone',['nombre'=>"caballo",'tipo'=>'horse','MaxFile'=>100,'horse'=>$horse_id,'oculto'=>true])
                    </div>


                    <div class="col-12 m-t-35 row" id="photos">
                            @foreach($horse->getPhotoModel() as $k=>$v)
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 m-t-20 m-t-20 ">
                                    @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getUrl()])
                                </div>
                            @endforeach

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

                    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 m-t-35">
                        <div class="form-group row">
                            <label class="{!! $etiquetalabel !!} col-form-label ">
                                {!! trans('video.addressvideo') !!}:
                            </label>
                            <div class="{!! $tiquetainput !!}">
                                <input type="text" placeholder="{{trans('stud.text.youtube')}}"
                                       id="input_stud_video"
                                       {{--{!! \Auth::user()->getVideo()->getUrl() !!}--}}
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
                        @foreach($videos as $k=>$v)
                            @if(!empty($v->getEmbedVideoYoutube()))
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 m-t-20 m-t-20">
                                    @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getYoutubeThumb(),'embed'=>$v->getEmbedVideoYoutube(),'video'=>1])
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottomjs')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{!! url('/js/dropify/js/dropify.min.js') !!}"></script>
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
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js"></script>

    <script type="text/javascript" src="{!!url('assets/js/pages/gallery.js')!!}"></script>
    <script type="text/javascript" src="{!!url('assets/js/pages/modals.js')!!}"></script>
    <script type="text/javascript" src="{!!url('assets/js/bootstrap-select.min.js')!!}"></script>
    <!-- piexif.min.js is only needed for restoring exif data in resized images and when you
        wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js"
            type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/locales/LANG.js"></script>
    <script>


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
            //$('.save').on('click', function (e) {
            //e.preventDefault();
            //DisableElement($('.save'));
            //DisableElement($('.cancel'));
            $('.save').prop('disabled', true);
            var formElement = document.getElementById("horse_");
            var form = new FormData(formElement);
            var doma, tosold;
            var raised = $('#input_horse_raised').val();
            var birthdate = $('#input_horse_birthdate').val();
            var name = $('#input_horse_name').val();
            var raza = $('#input_horse_raza').val();
            var stud = $('#input_horse_stud').val();
            var sex = $('#input_horse_sex').val();
            var price = $('#input_horse_price').val();
            var id = $('#horse_id').val();
            var cubri = $('#cubri').val();
            var description = CKEDITOR.instances['input_stud_description'].getData();
            var color = $('#colorselect').val();
            var s = $('#input_horse_doma_si').hasClass('hidden-xl-down');
            var d = $('#check_si').hasClass('hidden-xl-down');
            if (s === true) {
                doma = 0;
            } else {
                doma = 1;
            }
            if (d === true) {
                tosold = 0;
            } else {
                tosold = 1;
            }

            form.append('raised', raised);
            form.append('name', name);
            form.append('color', color);
            form.append('birthdate', birthdate);
            form.append('raza', raza);
            form.append('doma', doma);
            form.append('tosold', tosold);
            form.append('stud', stud);
            form.append('sex', sex);
            form.append('price', price);
            form.append('cubri', cubri);
            form.append('id', id);
            form.append('description', description);
            //EnableElement($('.save'), true);
            //EnableElement($('.cancel'), true);

            axios.post('{!! route('horse.update',['id'=>$horse->id]) !!}', form)
                .then(function (response) {
                    var r = response.data;
                    horse_id = r.id;
                    $('#horse_id').val(horse_id);
                    $('.fileinput-upload-button').click();

                    //$('.btn-drp-caballo').click();
                    swal(
                        '{!! trans('users.applychange') !!}',
                        r.sms,
                        'success'
                    )
                    $('.save').prop('disabled', false);
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
            /*
            $.ajax({
                url: "{!! route('horse.update',['id'=>$horse->id]) !!}",
                data: form,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {

                    var v = $.parseJSON(data);
                    console.log(data);
                    $('#horse_id').val(data.id);

                    horse_id = v.id;
                    $('.btn-drp-caballo').click();
                },
                error: function (data) {

                    console.log(data);
                }
            });
            */
            //});
        };
        $('#tosold').change(function () {
            if ($(this).is(":checked")) {
                console.log('check');
                $('#cardsell').removeClass('hidden-xl-down');
                return null;
            }
            $('#cardsell').addClass('hidden-xl-down');
            return null;
            /*
            $('#textbox1').val($(this).is(':checked'));
            */
        });
        $('#check_si').on('click', function (e) {
            $('#check_si').addClass('hidden-xl-down').prop('checked', false);
            {{--$('#tosold').prop('checked', false);--}}
            {{--$('#cardsell').addClass('hidden-xl-down');--}}
            $('#input_horse_price').addClass('hidden-xl-down');
            $('#check_no').removeClass('hidden-xl-down').prop('checked', true);
        });
        $('#check_no').on('click', function (e) {

            $('#check_no').addClass('hidden-xl-down').prop('checked', false);
            {{--
            $('#tosold').prop('checked', true);
            --}}
            {{--$('#cardsell').removeClass('hidden-xl-down');--}}
            $('#input_horse_price').removeClass('hidden-xl-down');
            $('#check_si').removeClass('hidden-xl-down').prop('checked', true);
        });


        $('#input_horse_doma_si').on('click', function (e) {
            $('#input_horse_doma_si').addClass('hidden-xl-down').prop('checked', false);
            $('#input_horse_doma_no').removeClass('hidden-xl-down').prop('checked', true);
        });
        $('#input_horse_doma_no').on('click', function (e) {

            $('#input_horse_doma_no').addClass('hidden-xl-down').prop('checked', false);
            $('#input_horse_doma_si').removeClass('hidden-xl-down').prop('checked', true);
        });

        function savevideo(url) {
            var form = new FormData();
            //var description = $('#input_stud_description');
            var description = $('#input_stud_video').val();
            form.append('video', description);
            form.append('type', 'horse');
            form.append('horse_id', horse_id);

            swal({
                title: '{!! trans('users.usure') !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! Funciones::ReemplazarApostrofe(trans('users.caballocambiovideo')) !!}<br>',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                envio(form, url);
                $('#input_stud_video').val();

                /*
                swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                */
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! trans('users.canceltask') !!}',
                        '{!! trans('users.cancelmodal') !!}',
                        'error'
                    )
                }
           });

        }

        $(document).on("ready", function () {

            $('#input_horse_raised').mask("000 cm", {reverse: true});
            $('#input_horse_price').mask("000.000.000.000 €", {reverse: true});
            $('#cubri').mask("000.000.000.000 €", {reverse: true});

            $("#photos").sortable({
                stop: function (ui, event) {
                    getItems('#photos');
                }
            }).disableSelection();
        });
       
    </script>

@endsection