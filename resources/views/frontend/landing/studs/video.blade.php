@extends('frontend.landing.studs.base',['user'=>$user,'stud'=>$stud])
@section('title', trans('Titulos.VideoCliente'))
@php
    $logobasic= url("landing/images/basic/logo.png");
        $logo =$stud->getLogo();
        $espanol =  url("landing/img/es.png");
        $english =  url("landing/img/en.png");

        /*slider*/
        $dummy = url("landing/images/dummy.png");
        /*slider 1*/
        $text1 = "LA APLICACIÓN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO";
        $stext1 ="¡INSCRÍBETE CON NOSOTROS YA!";

        $text2 = '2 LA APLICACIÓN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';
        $stext2 ='LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';

        $horseapp ='LA APLICACIÖN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';
        $horseinscription ="¡INSCRÍBETE CON NOSOTROS YA!";

        $tittlehorsewordsale ='Horses Word Sale';
        $contenido ="Este contenido es de prueba";
        $contenido2 ="Caballos, ventas";
        $login = "Iniciar sesion";
        $imgother3 = url("landing/images/other/3.png");
         //dd($galeria);
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

$text[0]= "{!! trans('users.fake.0') !!}";
$text[1]= "{!! trans('users.fake.1') !!}";
$text[2]= "{!! trans('users.fake.2') !!}";
$text[3]= "{!! trans('users.fake.3') !!}";
$text[4]= "";
$text[5]= "";
$text[6]= "";
$text[7]= "";
$text[8]= "";
$text[9]= "";
$stext[0]= "{!! trans('users.fake.0') !!}";
$stext[1]= "{!! trans('users.fake.1') !!}";
$stext[2]= "{!! trans('users.fake.2') !!}";
$stext[3]= "{!! trans('users.fake.3') !!}";
$stext[4]= "";
$stext[5]= "";
$stext[6]= "";
$stext[7]= "";
$stext[8]= "";
$stext[9]= "";

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
    @foreach($stud->getVideosModel() as $k=>$v)
        <meta property="og:video" content="{!! $v->getYoutubeThumb()  !!}">
        <meta name="twitter:player" content="{!! $v->getYoutubeThumb()  !!}">
    @endforeach
@endsection

@section('content')
    @include('frontend.landing.studs.partials.principal',['stud'=>$stud,'titulo'=>trans('stud.video'),'texto'=>trans('stud.videosub')])
    <style>
        a.nivo-trigger > img {
            /*display: block;*/
            max-width: 100%;
            height: auto;
        }

        .volunteers-wrapper.images-gallery-wrapper .images-outer .images-inner .nivo-trigger span {
            line-height: 0px;

            padding-top: 35%;
        }

        /*
        .single-images-gl .nivo-trigger > img {
            height: 320px!important;
            width: auto!important;
        }
        class="img-responsive"
*/
    </style>

    <!-- basic-slider start -->
    <!-- Banner -->


    <div class="volunteers-wrapper images-gallery-wrapper" style="padding-bottom: 80px!important;">
        <div class="container">
            <div class="row">
                {{--
                <div class="col-xs-offset-3 col-xs-6">
                    <div class=" embed-responsive embed-responsive-16by9 m-t-40">
                        <iframe class="embed-responsive-item"
                                src="{!! $user->getVideo()->getEmbedVideoYoutube() !!}"></iframe>
                    </div>
                </div>
                <div class="clearfix"></div>
                --}}
                @if(count($stud->getVideosModel()) !=0 )
                    @foreach($stud->getVideosModel() as $k=>$v)
                        {{--
                        <div class="col-xs-3">
                            <div class=" embed-responsive embed-responsive-16by9 m-t-40">
                                <iframe class="embed-responsive-item"
                                        src="{!! $v->getEmbedVideoYoutube() !!}"></iframe>
                            </div>
                        </div>
                        --}}
                        <div class="col-xs-12 col-md-6 col-lg-3 images-outer ">
                            <div class="images-inner  ">
                                <div class="nivo-activator">
                                </div>
                                <div class="images single-images-gl clearfix ">
                                    <a href="{!! $v->getNormalVideoYoutube() !!}"
                                       class="nivo-trigger"
                                       data-lightbox-gallery="gallery1"
                                    >
                                        <span class="fa fa-play"> </span>
                                        <img lsrc="{!! $v->getYoutubeThumb() !!}"
                                             alt="{!! $stud->getName()  !!}  {!! $v->getName() !!}" class="hidden">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                @endif

                {{--
                @foreach($galeria  as $k=>$v)
                    <div class="col-sm-4 images-outer ">
                        <div class="images-inner  ">
                            <div class="nivo-activator">
                            </div>
                            <div class="images single-images-gl clearfix">
                                <a href="{!! $v['url'] !!}" class="nivo-trigger" data-lightbox-gallery="gallery1">
                            <span class="fa fa-arrows-alt">
                            </span>
                                    <img src="{!! $v['url'] !!}" alt="{!! $v['name'] !!}">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                --}}
            </div>
        </div>
    </div>
@endsection
