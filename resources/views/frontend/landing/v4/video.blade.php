@extends('frontend.landing.v4.base')
@section('title', trans('stud.video'))
@include('meta',
[
'titulo' => $stud->getTituloWeb(),
'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
'logo'=>$stud->getLogo(),

])
{{--
'imagenes' =>$stud->getPhotosModel(),
@foreach($stud->getPhotosModel() as $h => $i)
    <meta property="og:image" content="{!! $i->url !!}"/>
@endforeach
--}}
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner bg-9">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>{!! trans('stud.video') !!}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- END / SUB BANNER -->

    <!-- GALLERY -->
    <section class="section_page-gallery borde-top">
        <div class="container">
            <div class="gallery">
                <!-- GALLERY CONTENT -->
                <div class="gallery-content">

                    <div class="row">
                        <div class="gallery-isotope col-4">

                            <!-- ITEM SIZE -->
                            <div class="item-size"></div>
                            <!-- END / ITEM SIZE -->
                        @if(count($stud->getVideosModel()) !=0 )
                            @foreach($stud->getVideosModel() as $k=>$v)
                                <!-- ITEM -->
                                    <div class="item-isotope">
                                        <div class="gallery_item video">
                                            <a rel="nofollow" href="{!! $v->getNormalVideoYoutube() !!}"
                                               class="popup-youtube">
                                                <span class="fa fa-play"> </span>
                                                <img src="{!! $v->getYoutubeThumb() !!}"
                                                     alt="{!! $stud->getName()  !!}  {!! $v->getName() !!}">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- END / ITEM -->
                                @endforeach
                            @else
                                <br><br><br>
                                <div>Aún no hay fotos en esta sección</div>
                                <br><br><br>
                            @endif
                        </div>
                    </div>

                </div>
                <!-- GALLERY CONTENT -->

            </div>
        </div>
    </section>
    <!-- END / GALLERY -->
@endsection
