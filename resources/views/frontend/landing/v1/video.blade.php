@section('title', trans('Titulos.VideoCliente'))
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
    @include('frontend.landing.v1.partials.baner',['texto'=>trans('stud.video'),'clase'=>'videos','stex'=>trans('stud.videosub')])

    <!--Gallery Section-->
    <section id="gallery" class="gallery margin-top-120 bg-grey">
        <!-- Gallery container-->
        <div class="container">
            <div class="row">
                <div class=" col-xs-offset-3 col-xs-6 m-t-20">
                    @include('flash::message')
                </div>
                <div class="main-gallery roomy-80">
                    <div class="col-md-12 m-bottom-70">
                        <div class="head_title text-left sm-text-center wow fadeInDown">
                            <h2>
                                {!! trans('horse.text.videos') !!}
                            </h2>
                            <!--h5><em>Estos son todos los videos que tenemos de nuestros ejemplares..</em></h5-->
                            <div class="separator_left"></div>
                        </div>
                    </div>


                    <div class="clearfix"></div>
                    {{--<a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto">Open YouTube video</a><br>--}}
                    <div class="grid text-center">
                        @if(count($stud->getVideosModel()) !=0 )
                            @foreach($stud->getVideosModel() as $k=>$v)
                                @include('frontend.landing.v1.partials.videopill')
                            @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div><!-- Portfolio container end -->
    </section><!-- End off portfolio section -->


@endsection
@section('js')

@endsection
