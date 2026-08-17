@extends('backend.layouts.base')
@section('title', trans('horse.chooseone') )
@section('pagetitle', '<i class="fa fa-pagelines"></i>  '.trans('sell.new') )
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
    //$video_url = "https://www.youtube.com/embed/sogCtOe8FFY?controls=2&showinfo=true&rel=0&enablejsapi=1&origin=http%3A%2F%2Fdemo.lorvent.com&widgetid=1";

/* http://unitegallery.net/index.php?page=video-items-syntax */
$vid[0] = 'sogCtOe8FFY';

$vid[1] = 'UZwXbecjg1Y';
$vid[2] = 'bq7Sg8a-VJA';
$vid[3] = 'EWApVfTaGr4';
$vid[4] = '7_g3nx3XWqs';
$vid[5] = 'A3PDXmYoF5U';

@endphp
@section('topjs')



@endsection
@section('content')

    <div class="card">
        <div class="card-block">
            <div class='card-header bg-white '>
                Galeria de videos
            </div>


            <div id="gallery2"
                 style="margin: 0px auto; max-width: 1100px; min-width: 150px; height: 509px; width: auto;"
                 class="ug-gallery-wrapper ug-under-960 ug-theme-video ug-videoskin-right-thumb">
                @foreach($vid as $k=>$v)
                    <div data-type="youtube"
                         data-videoid="{!! $v !!}"
                         {{--
                         data-title="GoPro Demo"
                         data-description="by Go Pro"
                         --}}
                         data-title=""
                         data-description=""
                    ></div>
                @endforeach

            </div>
        </div>
    </div>


@endsection



@section('bottomjs')

    <script type="text/javascript" src="{{asset('assets/js/ug-theme-video.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/ug-theme-tiles.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/unitegallery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/video_gallery.js')}}"></script>



@endsection
