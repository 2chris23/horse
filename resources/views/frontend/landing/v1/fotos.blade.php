@section('title', trans('Titulos.FotoCliente'))
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

@extends('frontend.landing.v1.base')
@section('content')
    @include('frontend.landing.v1.partials.baner',['texto'=>trans('stud.image'),'clase'=>'fotos','stex'=>trans('stud.imagesub')])

    <section id="gallery" class="gallery margin-top-120 bg-white">
        <div class="container">
            <div class="row">
                <div class=" col-xs-offset-3 col-xs-6 m-t-20">
                    @include('flash::message')
                </div>
                <div class="main-gallery main-model roomy-80">
                    <div class="col-md-12 m-bottom-60">
                        <div class="col-md-12">
                            <div class="head_title text-left sm-text-center wow fadeInDown">
                                <h2>
                                    {!! trans('horse.text.photo') !!}
                                </h2>
                                <!--h5><em>Esos son todos nuestros ejemplares...</em></h5-->
                                <div class="separator_left"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="grid models text-center">
                        @foreach($galeria as $k=>$v)
                            @php
                                if($v['url']!=''){
                                $p = Photo::find($v['id'])->getUrl();
                                }else{
                                $p='';
                                }
                            @endphp

                            <div class="grid-item model-item">
                                <a href="{!! $v['url'] !!}" class="popup-img">
                                    <img alt="{!! $stud->getName() !!}" lsrc="{!! $p !!}" class="hidden lazy">
                                </a>
                            </div><!-- End off grid item -->
                        @endforeach
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
        </div><!-- Portfolio container end -->
    </section><!-- End off portfolio section -->


@endsection
