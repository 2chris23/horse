@extends('frontend.landing.studs.base',['user'=>$user,'stud'=>$stud])
@section('title', trans('Titulos.FotoCliente'))
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
    @foreach($stud->getPhotosModel() as $h => $i)
        <meta property="og:image" content="{!! $i->url !!}"/>
    @endforeach
@endsection


@section('csstop')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <style>
        {{--
.nivo-trigger:hover > span{
    height: 83%;
    width: 84%;
    text-align: center;
    vertical-align: middle;
    background: black;
    opacity: 0.5;

    position: absolute;
    left: 18px;
    top: 13px;
    z-index: 1;
    color: white;
    transform: scale(1.2);
    -ms-transform: scale(1.2);
    -moz-transform: scale(1.2);
    -webkit-transform: scale(1.2);
    -o-transform: scale(1.2);
    display: unset;
}
.nivo-trigger> span{
    display: none;
}
--}}
        {{-- zoom out--}}
        .img-s {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .img-s.hidden {
            overflow: hidden;
        }

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

        /*
        .grid-item {
            float: left;
            width: 80px;
            height: 60px;
            border: 2px solid hsla(0, 0%, 0%, 0.5);
        }
*/
        .grid-item--width2 {
            width: 160px;
        }

        .grid-item--height2 {
            height: 140px;
        }

        /* fluid 5 columns */
        .grid-sizer,
        .grid-item {
            width: 20%;
        }

        @media (max-width: 480px) {
            .grid-sizer,
            .grid-item {
                width: 100%;
            }
        }

        @media (min-width: 480px) and(max-width: 768px ) {
            .grid-sizer,
            .grid-item {
                width: 100%;
            }
        }

        @media (min-width: 768px) and(max-width: 992px ) {
            .grid-sizer,
            .grid-item {
                width: 40%;
            }
        }

        @media (min-width: 992px) and(max-width: 1200px ) {
            .grid-sizer,
            .grid-item {
                width: 20%;
            }
        }

        /* 2 columns */
        .grid-item--width2 {
            width: 40%;
        }

        .p-l-7 {
            padding-left: 10px;
            margin-top: 5px;
        }

    </style>
@endsection
@section('content')
    <style>

    </style>
    @include('frontend.landing.studs.partials.principal',[
    'stud'=>$stud,
    'titulo'=>trans('stud.image'),
    'texto'=>trans('stud.imagesub')
    ])

    <div class="volunteers-wrapper images-gallery-wrapper" style="padding-bottom: 80px!important;">

        <div class="container">
            <div class="row">
                @if(count($stud->getPhotosModel()) !=0 )
                    <div class="grid">
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
                        <div class="grid-sizer col-xs-12 col-md-6 col-lg-12"></div>
                        <!-- items use Bootstrap .col- classes -->
                        {{--
                        <div class="grid-item col-xs-8">
                            <!-- wrap item content in its own element -->
                            <div class="grid-item-content">...</div>
                        </div>
                        --}}

                        @foreach($galeria as $k=>$v)
                            <div class="grid-item p-l-7 ">
                                <div class="grid-item-content ">
                                    <div class="images-outer">
                                        <div class="images single-images-gl  img-s ">
                                            <a href="{!! $v['url'] !!}" class="nivo-trigger "
                                               data-lightbox-gallery="gallery1">
                                                <span class="fa fa-arrows-alt hidden "> </span>
                                                <img src="{!! $v['url'] !!}" class="img-sd img-responsive " alt="{!! $stud->getName() !!}">
                                            </a>
                                        </div>
                                        <div class="nivo-activator"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    {{--
                    <div class="row">
                        @include('frontend.landing.studs.partials.gallery4',['imagen'=>$galeria])
                    </div>
                    --}}
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
                @endif
            </div>
        </div>

    </div>



@endsection
@section('js')
    {{--
    <script src="{!! url('mosaic/jquery.mosaicflow.min.js') !!}"> </script>
    --}}
    <script>
        var $grid = $('.grid').imagesLoaded(function () {
            {{--// init Masonry after all images have loaded--}}
            $grid.masonry({
                {{--// options...--}}
                itemSelector: '.grid-item', {{--// use a separate class for itemSelector, other than .col- --}}
                columnWidth: '.grid-sizer',
                percentPosition: true
            });
        });
    </script>

@endsection