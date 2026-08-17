@extends('frontend.landing.studs.base',['user'=>$user,'stud'=>$stud])
@section('title', trans('Titulos.DetalleCliente',['name',$horse->getName()]))
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

$text[0]= "Nuestro mejor caballo";
$text[1]= "Nuestra mejor Yegua";
$text[2]= "Lo mejor en crias";
$text[3]= "Excelente servicio";
$text[4]= "";
$text[5]= "";
$text[6]= "";
$text[7]= "";
$text[8]= "";
$text[9]= "";
$stext[0]= "Nuestro mejor caballo";
$stext[1]= "Nuestra mejor Yegua";
$stext[2]= "Lo mejor en crias";
$stext[3]= "Excelente servicio";
$stext[4]= "";
$stext[5]= "";
$stext[6]= "";
$stext[7]= "";
$stext[8]= "";
$stext[9]= "";
$text[0]= "Nuestro mejor caballo";
$text[1]= "Nuestra mejor Yegua";
$text[2]= "Lo mejor en crias";
$text[3]= "Excelente Animal";
$stext[0]= "Nuestro mejor caballo";
$stext[1]= "Nuestra mejor Yegua";
$stext[2]= "Lo mejor en crias";
$stext[3]= "Excelente Animal";


for($i = 0;$i<20;$i++){
$d[$i]= url('img/horse/'.($i+1).'.jpg');
$t[$i] = $text[rand(0,3)];
$st[$i] = $stext[rand(0,3)];
}

@endphp
@section('fbheader')
    <meta property="og:url" content="{!! route('MyPage',['slug'=>$user->getMySlug()]) !!}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{!! $stud->getTituloWeb() !!}"/>
    <meta property="og:description" content="{!! $stud->getSeodescripcion() !!}"/>
    <meta property="og:image" content="{!! $logo !!}"/>
@endsection

@section('csstop')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <style>
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
            width: 50%;
        }

        /* 2 columns */
        .grid-item--width2 {
            width: 40%;
        }

        .content-box .img-wrapper img {
            height: 400px !important;
            width: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

    </style>
@endsection
@section('content')

    <style type="text/css">

        .asg-image {
            height: 0px !important;
        }


    </style>

    <!-- basic-slider start -->
    <!-- Banner -->
    @include('frontend.landing.studs.partials.principal',['stud'=>$stud,'titulo'=>'Caballos','texto'=>trans('stud.ouranimal')])

    <div class="volunteers-wrapper images-gallery-wrapper">
        <div class="container">
            <div class="section-name one">
                <h2>Galeria</h2>
                <div class="short-text">
                    <h5>Esto son alguno de nuestros caballos</h5>
                </div>
            </div>
            <div class="row grid">
                {{--
                @foreach($d as $c)
                    <div class="col-sm-4 images-outer ">
                        <div class="images-inner  ">
                            <div class="nivo-activator">
                            </div>
                            <div class="images single-images-gl clearfix">
                                <a href="{!! $c !!}" class="nivo-trigger" data-lightbox-gallery="gallery1">
                            <span class="fa fa-arrows-alt">
                            </span>
                                    <img src="{!! $c !!}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                --}}
                <div class="grid-sizer col-xs-4"></div>
                <!-- items use Bootstrap .col- classes -->
                {{--
                <div class="grid-item col-xs-8">
                    <!-- wrap item content in its own element -->
                    <div class="grid-item-content">...</div>
                </div>
                --}}
                @foreach($d as $k=>$c)
                    <div class=" grid-item  h-400" id="horse_card_{!! $k !!}">
                        <div class="grid-item-content ">
                            <a href="#horse_card_{!! $k !!}">
                                <div class="cause content-box">
                                    <div class="img-wrapper">
                                        <div class="overlay">
                                        </div>
                                        <img class="img-responsive h-246" src="{!!$c !!}" alt="">
                                    </div>
                                    <div class="info-block">
                                        <h4><a href="#">Galopante</a></h4>
                                        <p>{!! $t[$k] !!}</p>
                                        {{--
                                        <div class="donet_btn service-btn">
                                            <a href="service-single.html" class="btn btn-min btn-solid"><i class="fa fa-archive"></i><span>Learn more</span></a>
                                        </div>
                                        --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{--

                        <div class="grid-item col-xs-4">
                            <img src="{!! $c !!}" class="img-responsive" alt="">

                        </div>

                    --}}
                @endforeach

            </div>
        </div>
    </div>



@endsection

@section('js')
    <script>
                {{--
                var grid = $('.grid').masonry({

                    itemSelector: '.grid-item',

                    // use element for option
                    columnWidth: '.grid-sizer',

                    percentPosition: true

                });
                grid.imagesLoaded().progress( function() {
                    grid.masonry('layout');
                });
                --}}
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
@endsection