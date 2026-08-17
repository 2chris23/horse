
@extends('frontend.landing.studs.base',['user'=>$user,'stud'=>$stud])
@php
    $logo = $logo =$stud->getLogo();;
        $descripcion = $stud->getDescription();
        //$descripcion = $stud->Traducir();
@endphp
@section('fbheader')
    @include('meta',
    [
    'titulo' => $stud->getTituloWeb(),
    'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
    'logo'=>$logo,
    'imagenes' =>$stud->getPhotosModel(),
    ])
@endsection
@section('title', trans('Titulos.InstalacionesCliente'))


@section('csstop')

    <style>
        .img-sd:hover {
            /*border:1px solid rgba(36,40,47,0.5);*/
            transform: scale(1.2);
            -ms-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -webkit-transform: scale(1.2);
            -o-transform: scale(1.2);
        }

        .img-sd {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            transform: scale(1);
            -ms-transform: scale(1);
            -moz-transform: scale(1);
            -webkit-transform: scale(1);
            -o-transform: scale(1);
            -webkit-transition: all 500ms ease-in-out;
            -moz-transition: all 500ms ease-in-out;
            -ms-transition: all 500ms ease-in-out;
            -o-transition: all 500ms ease-in-out;
        }

        article + [data-readmore-toggle], article[data-readmore] {
            display: block;
            width: 100%;
        }

        article[data-readmore] {
            transition: height 500ms;
            overflow: hidden;
        }

        /* fluid 5 columns */
        .grid-sizer,
        .grid-item {
            width: 20%;
        }

        /* 2 columns */
        .grid-item--width2 {
            width: 40%;
        }

        /* clearfix */
        .grid:after {
            content: '';
            display: block;
            clear: both;
        }

        .grid-item {
            width: 160px;
            height: 120px;
            float: left;
            background: #D26;
            border: 2px solid #333;
            border-color: hsla(0, 0%, 0%, 0.5);
            border-radius: 5px;
        }

        .grid-item--width2 {
            width: 320px;
        }

        .grid-item--width3 {
            width: 480px;
        }

        .grid-item--width4 {
            width: 640px;
        }

        .grid-item--height2 {
            height: 200px;
        }

        .grid-item--height3 {
            height: 260px;
        }

        .grid-item--height4 {
            height: 360px;
        }

        .mw300 {
            width: 370px !important;
            height: auto;
        }

        .logos {
            /* width: 424px !important; */
            max-height: 190px !important;
            /* max-width: 400px !important; */
            /*max-height: auto !important;*/
            margin: 0 auto;
        }

        {{--
        .embed-responsive-4by3 {
            padding-bottom: 28%!important;
        }
        --}}
        .no-pad {
            padding: 0px;
        }

        .embed-responsive-4by3 {
            padding-bottom: 54%;
        }
    </style>
@endsection
@section('content')

    <!-- Banner -->
    @include('frontend.landing.studs.partials.principal',['stud'=>$stud,'titulo'=>trans('stud.menu.caption'),'texto'=>trans('landing.instalaciones')])


    <!-- about wrapper -->
    <div class="about-page-wrapper mpd0" style="padding-bottom: 80px!important;">
        <div class="description container">
            <div class="row ">

                <div class="col-offset-3 col-6">
                    <figure>
                        <img class="img-responsive logos" src="{!! $stud->getLogo() !!}" alt="{!! $stud->getName() !!}">
                    </figure>
                </div>
                <div class="col-offset-3 col-6 text-center m-t-25">
                    <h4 class="font-dst">{!! trans('portal.welcometo') !!}{!! $stud->getName() !!}</h4>
                </div>
                <div class="col-xs-offset-1 col-10">
                    <div class="col-offset-2 col-8 col-offset-2">
                        <article>
                            <p class="first text-justify">
                                {!! $stud->getDescription() !!}
                                {{--
                                {!! $stud->Traducir() !!}
                                --}}
                            </p>
                        </article>
                    </div>
                </div>
                <div class="clearfix"></div>
                @php($video = $user->getVideo())
                {{--
                <div class="col-xs-12 col-md-offset-2  col-md-8 m-t-40">
                    <div class="images-inner  ">
                        <div class="nivo-activator">
                        </div>
                        <div class="images single-images-gl clearfix ">
                            <a href="{!! $video->getNormalVideoYoutube() !!}"
                               class="nivo-trigger"
                               data-lightbox-gallery="gallery1"
                            >
                            <span class="fa fa-play hidden">
                            </span>
                                <img lsrc="{!! $video->getYoutubeThumb() !!}" alt="{!! $video->getName() !!}" class="">
                            </a>
                        </div>
                    </div>
                </div>
                --}}

                <div class="col-xs-12 col-md-offset-2  col-md-8 m-t-40">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item "
                                src="{!! $user->getVideo()->getEmbedVideoYoutube() !!}"

                allowfullscreen>

                </iframe>
            </div>
        </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 no-pad">
        @foreach($stud->getInstalationsGallery()  as $k=>$v)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 images-outer no-pad ">
                <div class="images-inner  ">
                    <div class="nivo-activator"></div>
                    <div class="images single-images-gl clearfix">
                        <a href="{!! $v['url'] !!}" class="nivo-trigger"
                           data-lightbox-gallery="gallery1">
                            <img class="img-sd  img-responsive hidden" lsrc="{!! $v['url'] !!}"
                                 alt="{!! $stud->getName() !!}">
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="clearfix"></div>







@endsection
@section('js')
    <script>
        {{--
        $(function(){ /* to make sure the script runs after page load */

            $('a.read_more').click(function(event){ /* find all a.read_more elements and bind the following code to them */

                event.preventDefault(); /* prevent the a from changing the url */
                $(this).parents('.item').find('.more_text').show(); /* show the .more_text span */

            });

        });first
        --}}
        {{--
        $('article').readmore({
            speed: 75,
            maxHeight: 500,
            collapsedHeight: 200,
        });
        --}}
        $('article').readmore({
            speed: 500, collapsedHeight: 330,
            moreLink: '<a href="#" >{!! trans('portal.readmore') !!}</a>',
            lessLink: '<a href="#">{!! trans('portal.readless') !!}</a>',
        });
    </script>
@endsection
