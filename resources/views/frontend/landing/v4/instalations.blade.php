@extends('frontend.landing.v4.base')
@section('title', {!! trans('stud.instalations') !!})
@section('fbheader')
    @include('meta',
    [
    'titulo' => $stud->getTituloWeb(),
    'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
    'logo'=>$stud->getLogo(),
    'imagenes' =>$stud->getPhotosModel(),
    ])
@endsection
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner bg-9">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>{!! trans('tema3.aboutus', ['name'=>$stud->getName()]) !!}</h2>
                    {{--<p>Lorem Ipsum is simply dummy text of the printing</p>--}}
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->
    
    <!-- ABOUT -->
    <section class="section-about borde-top">
        <div class="container">

            <div class="about">

                <!-- ITEM -->
                <div class="about-item row">

                    <div class="img owl-single slid col-xs-12 col-md-6 up-finst">
                        @php($fotos = $stud->getInstalationsGallery())
                        @if(count($fotos)!=0)
                            @foreach($fotos  as $k=>$v)
                                <div class="finst">
                                    <img src="{!!$v['url'] !!}" alt="{!! $stud->getName() !!}"
                                         class="img-responsive img-center">
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="text col-xs-12 col-md-6">
                        <h2 class="heading">{!! trans('stud.instalations') !!}</h2>
                        <div class="desc">
                            {!! $stud->getDescription() !!}
                        </div>
                    </div>

                </div>
                <!-- END / ITEM -->

                <!-- ITEM -->
                <div class="about-item about-right row">
                    @php($v = $user->getVideo())
                    @if(!empty($v))
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                            <div class="item grid text-center">
                                <div class="grid-item">
                                    <a rel="nofollow" href="{!! $v->getNormalVideoYoutube() !!}"
                                       class="popup-youtube">
                                        <span class="fa fa-play"> </span>
                                        <img src="{!! $v->getYoutubeThumb() !!}"
                                             alt="{!! $stud->getName()  !!}  {!! $v->getName() !!}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- END / ITEM -->

            </div>

        </div>
    </section>
    <!-- END / ABOUT -->
    @include('frontend.landing.v4.partials.sexos')

@endsection