@php

    $d[0]= url("landing/images/slider/1/2.jpg");
$d[1]= url("landing/images/slider/1/1.jpg");
$d[2]= url('frontend/img/slides/s3.jpg');
$d[3]= url('frontend/img/gallery/img-2.jpg');
$d[4]= url('frontend/img/gallery/img-3.jpg');
$d[5]= url('frontend/img/gallery/img-4.jpg');
$d[6]= url('frontend/img/gallery/img-5.jpg');
$d[7]= url('frontend/img/slides/s1.jpg');
$d[8]= url('frontend/img/slides/s2.jpg');
$d[9]= url('frontend/img/slides/s3.jpg');

@endphp
@extends('backend.layouts.base')
@section('title', trans('sell.Tittle') )
@section('pagetitle', '<i class="fa fa-pagelines"></i>  '.trans('sell.new') )
@section('topcss')

    <!--Plugin styles -->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css"/>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css"/>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/imagehover/css/imagehover.min.css')}}"/>
    <!--End of plugin-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/gallery.css')}}"/>
@endsection
@section('topjs')



@endsection
@section('content')

    <div class="col-lg-12 m-t-35">
        <div class="card">
            <div class="card-header bg-white">
                Galeria de imagenes
            </div>
            <div class="card-block">
                <div class="m-t-35 row no-gutters">
                    @foreach($d as $k=>$v)
                        <div class="col-xl-2 col-lg-3 col-md-4 col-xs-6 gallery-border">
                            <a class="fancybox-buttons zoom thumb_zoom"
                               data-fancybox-group="button"
                               title="Image Title {{$k}}"
                               href="{{$v}}">
                                <img src="{{$v}}"
                                     class="img-fluid gallery-style" alt="Image1"></a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>

@endsection


@section('bottomjs')


    <!--Plugin scripts-->
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/holderjs/js/holder.js')}}"></script>
    {{--
    <script type="text/javascript" src="{{asset('assets/vendors/fancybox/js/jquery.fancybox.pack.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fancybox/js/jquery.fancybox-buttons.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fancybox/js/jquery.fancybox-thumbs.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fancybox/js/jquery.fancybox-media.js')}}"></script>
    --}}

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js"></script>


    <!--End of plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/gallery.js')}}"></script>

@endsection
