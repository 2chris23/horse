@php($videos = \Auth::user()->Yeguada()->getVideosModel())
@extends('backend.layouts.base')
{{--@section('title', trans('horse.chooseone') )--}}
@section('title', trans('Titulos.VideosStud'))
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
    {{--
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>
                    Galeria de videos
                </div>
                <div class="col-12 m-t-35">
                    @include('backend.common.video',['vid'=>\Auth::user()->Yeguada()->getVideosModel()])
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
                            {!! trans('video.addressvideo') !!} :
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

                <div class="m-t-35 row  m-t-25 col-12" id="video">
                    @foreach(\Auth::user()->Yeguada()->getVideosModel() as $k=>$v)
                        @if(!empty($v->getEmbedVideoYoutube()))
                            <div class="col-3 m-t-20">
                                @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getYoutubeThumb(),'embed'=>$v->getEmbedVideoYoutube(),'video'=>1])
                            </div>
                        @endif
                    @endforeach
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
    <script type="text/javascript" src="{{route('video.js')}}"></script>
    {{--<script type="text/javascript" src="{{asset('assets/js/video_gallery.js')}}"></script>--}}

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