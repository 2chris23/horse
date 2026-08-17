@extends('backend.layouts.base')
@section('title', trans('horse.chooseone') )
@section('pagetitleadmin')

    @include('admin.topstud')

@endsection
@section('topcss')


    <link rel="stylesheet" href="{{asset('assets/css/unite-gallery.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/ug-theme-default.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-bottom-text.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-right-no-thumb.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-right-thumb.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-right-title-only.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/video_gallery.css')}}"/>
@endsection
@php

$videos = $stud->getVideosModel();
@endphp
@section('topjs')




@endsection
@section('content')
{{--
    <div class="card">
        <div class="card-block">
            <div class='card-header bg-white '>
                Galeria de videos
            </div>
            <div class="col-12 m-t-35">
                @include('backend.common.video',['vid'=>$stud->getVideosModel()])
            </div>
        </div>
    </div>
    --}}
    <div id="datos4" class="card col-12  ">
        {{--video--}}
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('video.myvideo') !!}
                @if(count($videos) !=0)
                    <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! count($videos )!!}
                        </span>
                    </span>
                @endif
            </div>
            <div class="row">

                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 m-t-35">
                    <div class="form-group row">
                        <label class="col-3 col-form-label text-right">
                            {!! trans('video.addressvideo') !!}:
                        </label>
                        <div class="col-6">
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
                        <div class="col-4 ">
                            <a href="#savedv" onclick="savevideo('{!! route('video.other') !!}')" id="savedv"
                               class="save btn btn-block btn-success glow_button">{!! trans('video.addvideo') !!}</a>
                        </div>
                    </div>
                </div>
                {{--
            </div>
        </div>
    </div>
    <div class="card col-12 m-t-35">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('video.myvideo') !!}
            </div>
            <div class="row">
                --}}

                <div class="m-t-35 row  m-t-25 col-12"  id="video"></div>
                    @foreach($videos as $k=>$v)
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 m-t-20">
                        @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getYoutubeThumb(),'video'=>1])
</div>
                    @endforeach
                </div>
            {{--}}
                <div class="offset-3 col-6 m-t-25 text-center">
                    <div class="row">
                        <div class="col-4 ">
                            <a href="#" class="btn btn-block btn-warning btninfo " onclick="getvideos('#video')">
                                Establecer el orden
                            </a>
                        </div>
                    </div>
                </div>
            --}}
            </div>
        </div>
    </div>

@endsection

@section('bottomjs')

    <script type="text/javascript" src="{{asset('assets/js/ug-theme-video.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/ug-theme-tiles.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/unitegallery.min.js')}}"></script>
    {{--<script type="text/javascript" src="{{asset('assets/js/video_gallery.js')}}"></script>--}}
    <script>
        function envio(form, url) {
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
        }

        function savevideo(url) {
            var form = new FormData();
            //var description = $('#input_stud_description');
            var description = $('#input_stud_video').val();
            form.append('video', description);

            swal({
                title: '{!! trans('users.usure') !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: 'Se modificará el video de presentacion, ¿Deseas continuar?<br>',
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
        window.onload = function () {
            $(function () {
                $("#video").sortable().disableSelection();
            });

            // =============start gallery2 js==========
            var gallery2 = $("#gallery2").unitegallery({
                gallery_theme: "video",
                gallery_width: 1100,
                gallery_height: 600,

            });
            // api.resize(width, height)
            // =============end gallery2 js==========
            $("#menu-toggle").on("click", function () {
                setTimeout(function () {
                    gallery2.resize();
                }, 400);
            });

        };
    </script>
    {{--
    <script type="text/javascript" src="http://unitegallery.net/unitegallery/themes/grid/ug-theme-grid.js"></script>

    <script type="text/javascript" src="http://unitegallery.net/unitegallery/js/unitegallery.min.js"></script>
    <script type="text/javascript" src="http://unitegallery.net/unitegallery/themes/grid/ug-theme-grid.js"></script>
    <script>
        $(document).ready(function(){


            // =============start gallery2 js==========
            var gallery2= $("#gallery2").unitegallery({

    gallery_width: 1100,
    gallery_height: 600,
    gallery_carousel:true,
    gallery_theme: "grid",
    theme_panel_position: "right"

    });
    // api.resize(width, height)
    // =============end gallery2 js==========


    $("#menu-toggle").on("click",function () {
    setTimeout(function () {
    gallery2.resize();
    },400);
    });
    });
    </script>
    --}}



    {{--}}<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-tubeplayer/2.1.0/jquery.tubeplayer.min.js"></script>{{--}}


@endsection