
@extends('frontend.landing.studs.base',['user'=>$user,'stud'=>$stud])
@section('title', trans('Titulos.FotoCliente'))
@php


@endphp

@section('csstop')
    <link rel="stylesheet" href="{!! url('js/gallery/flowgallery.css')!!}">
    <link rel="stylesheet" href="{!! url('js/gallery/materialize.min.css')!!}">

    <script>
        var token = "{!! csrf_token() !!}";
    </script>
@endsection
@section('content')
    {{--
    <style>
        a.nivo-trigger > img {
            height: 320px;
            width: auto;
        }
    </style>
--}}
    @include('frontend.landing.studs.partials.principal',[
    'stud'=>$stud,
    'titulo'=>trans('stud.image'),
    'texto'=>trans('stud.imagesub')
    ])

    <div class="volunteers-wrapper images-gallery-wrapper" style="padding-bottom: 80px!important;">
        <div class="container">

            <div class="row grid">
                <div class="col-12" id="gallery"></div>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>



@endsection
@section('js')
    <script src="{!! url('js/gallery/velocity.min.js') !!}"> </script>
    <script src="{!! url('js/gallery/velocity.ui.min.js') !!}"> </script>
    <script src="{!! url('js/gallery/materialize.min.js') !!}"> </script>
    <script src="{!! url('js/gallery/mediaelement-an-player.min.js') !!}"> </script>
    <script src="{!! url('js/gallery/jquery.flowgallery.min.js') !!}"> </script>
    <script>
        $('#gallery').flowGallery({
            gridType: 'rows',
            justifyLastRow: true,
            horizontalGutter: 10,
            verticalGutter: 10,
            items: {style: 'tile', enterAnimation: 'slideRight'},
            /*captionShowAnimation: 'expand',*/
            captionShowAnimation: 'shrink',
            enableCache: false,
            enableDeepLinking: false,
            loadItemChunks: false,
            configUrl: '{!! route('MyGallery2post',['slug'=>$stud->slug]) !!}'
        });
    </script>

    {{--


    <script>
        var $grid = $('.grid').imagesLoaded(function () {
            // init Masonry after all images have loaded
            $grid.masonry({
                // options...
                itemSelector: '.grid-item', // use a separate class for itemSelector, other than .col-
                columnWidth: '.grid-sizer',
                percentPosition: true
            });
        });
    </script>
    --}}

@endsection
