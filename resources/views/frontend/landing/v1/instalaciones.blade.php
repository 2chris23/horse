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
@section('title', trans('Titulos.InstalacionesCliente'))

@extends('frontend.landing.v1.base')
@section('content')
    @include('frontend.landing.v1.partials.baner',['clase'=>'about-banner','texto'=>trans('stud.menu.caption'), 'stex'=>trans('landing.instalaciones')])
    {{--
    <section id="hello" class="about-banner bg-mega">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="main_home text-center">
                    <div class="about_text">
                        <h1 class="text-white text-uppercase text-shadow">Nuestras instalaciones</h1>
                        <!--ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><a href="#">About Us</a></li>
                        </ol-->
                    </div>
                </div>
            </div><!--End off row-->
        </div><!--End off container -->
    </section> <!--End off Home Sections-->
--}}

    <!--About Sections-->
    <section id="feature" class="ab_feature roomy-100">
        <div class="container">
            <div class="row">
                <div class=" col-xs-offset-3 col-xs-6 m-t-20">
                    @include('flash::message')
                </div>
                <div class="main_ab_feature">
                    <div class="col-md-6 col-xs-12">
                        <div class="col-xs-12">
                            <!-- Head Title -->

                            <div class="head_title">
                                <h2>
                                    {!! trans('tema1.aboutus') !!}
                                </h2>
                                <h5>
                                    <em>

                                    </em>
                                </h5>
                                <div class="separator_left"></div>
                            </div><!-- End off Head Title -->

                            <div class="ab_feature_content wow fadeIn m-top-40">
                                <p>
                                    {!! $stud->getDescription() !!}
                                </p>

                            </div>
                        </div>
                        @php($v = $user->getVideo())
                        @if(!empty($v))
                            @if(!empty($v->getUrl()))

                            <div class="col-xs-12 text-center m-top-40">
                                <a href="{!! $v->getNormalVideoYoutube() !!}" class="popup-youtube">
                                    <span class="fa fa-play"> </span>
                                    <img lsrc="{!! $v->getYoutubeThumb() !!}"
                                         alt="{!! $stud->getName()  !!}  {!! $v->getName() !!}" class="hidden lazy">
                                </a>
                            </div>
                        @endif
                        @endif
                    </div>

                    <div class="col-md-6 col-xs-12">
                        {{--<div class="ab_feature_photo wow fadeIn sm-m-top-40">
                            <div class="row">

                                @foreach($stud->getInstalationsGallery()  as $k=>$v)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="ab_feature_item m-top-20">
                                            <img lsrc="{!! $v['url'] !!}" alt="{!! $stud->getName() !!}"/>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>--}}
                        <div class="clearfix"></div>
                        <div class="grid models text-center wow">
                            @foreach($stud->getInstalationsGallery()   as $k=>$v)
                                @php
                                    if($v['url']!=''){
                                    $p = Photo::find($v['id'])->getUrl();
                                    }else{
                                    $p='';
                                    }
                                @endphp

                                <div class="grid-item model-item col-md-4 col-sm-6 col-xs-12 m-top-20">
                                    <a href="{!! $v['url'] !!}" class="popup-img">
                                        <img alt="{!! $stud->getName() !!}" lsrc="{!!  $v['url']  !!}"
                                             class="hidden lazy">
                                    </a>
                                </div><!-- End off grid item -->
                            @endforeach
                        </div>
                        <div class="clearfix"></div>


                    </div>
                </div>
            </div><!--End off row-->
        </div><!--End off container -->
    </section>


    <!--Simple Section-->
    <section id="simple" class="simple bg-grey roomy-80">
        <div class="container">
            <div class="row">
                <div class="main_simple text-center">
                    <div class="col-md-12">
                        <h2>
                            {!! trans('tema1.visita.titulo') !!}
                        </h2>

                        <p>
                            {!! trans('tema1.visita.stitulo') !!}
                            {{--
                           Escribenos y con gusto te atenderemos...
                          Eusus legentis in iis qui facit eorum claritatem.
                           Investigationes demonstraverunt lectores legere
                           me lius quod ii legunt saepius. Duis autem vel eum iriure dolor in hendrerit vulputate velit
                           esse
                           molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan
                           blandit
                           praesent luptatum.--}}
                        </p>

                        <a href="{!! route('MyContact',['slug'=>$user->getMySlug()]) !!}"
                           class="btn btn-default m-top-40">{!! trans('stud.contact') !!}
                            <i class="fa fa-long-arrow-right"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
