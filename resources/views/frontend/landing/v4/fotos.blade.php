@extends('frontend.landing.v4.base')
@section('title', trans('stud.photos'))
@section('fbheader')
    @include('meta',
[
'titulo' => $stud->getTituloWeb(),
'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
'logo'=>$stud->getLogo(),
'imagenes' =>$stud->getPhotosModel(),
])
    @foreach($stud->getPhotosModel() as $h => $i)
        <meta property="og:image" content="{!! $i->url !!}"/>
    @endforeach
@endsection
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner bg-9">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>{!! trans('stud.photos') !!}</h2>
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
                        @foreach($galeria as $k=>$v)
                            @php
                                if($v['url']!=''){
                                $p = Photo::find($v['id'])->getUrl();
                                }else{
                                $p='';
                                }
                            @endphp
                            <!-- ITEM -->
                                <div class="item-isotope">
                                    <div class="gallery_item">
                                        <a rel="nofollow" href="{!! $v['url'] !!}">
                                            <img src="{!! $p !!}" alt="{!! $stud->getName() !!}">
                                        </a>
                                    </div>
                                </div>
                                <!-- END / ITEM -->
                            @endforeach

                        </div>
                    </div>

                </div>
                <!-- GALLERY CONTENT -->

            </div>
        </div>
    </section>
    <!-- END / GALLERY -->
@endsection
