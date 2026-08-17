@extends('frontend.landing.studs.base',['user'=>$user,'stud'=>$stud])
@section('title', trans('Titulos.InstalacionesCliente'))
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
$descripcion = $stud->getDescription();
$descripcion = $stud->Traducir();
@endphp

@section('csstop')

    <style>

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
    </style>
@endsection
@section('content')



    <style>

        {{--
        .embed-responsive-4by3 {
            padding-bottom: 28%!important;
        }
        --}}
    </style>

    <!-- Banner -->
    @include('frontend.landing.studs.partials.principal',['stud'=>$stud,'titulo'=>trans('stud.menu.caption'),'texto'=>trans('landing.instalaciones')])


    <!-- about wrapper -->
    <div class="about-page-wrapper mpd0" style="padding-bottom: 80px!important;">
        <div class="description container">
            <div class="row ">

                {{--<img class="img-responsive" src="{!! url('frontend/img/about-us.jpg') !!}" alt="">--}}
                <div class="col-xs-12 col-md-6">
                    <div class="col-xs-12">
                        <img class="img-responsive logos" src="{!! $stud->getLogo() !!}" alt="{!! $stud->getName() !!}"
                        >
                    </div>
                    <div class=" col-xs-12  embed-responsive embed-responsive-4by3 m-t-40">
                        {{---<iframe class="embed-responsive-item" src="//www.youtube.com/embed/0N06Dwecp30"></iframe>--}}
                        <iframe class="embed-responsive-item"
                                src="{!! $user->getVideo()->getEmbedVideoYoutube() !!}" style="max-height: 320px;"
                                allowfullscreen></iframe>


                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="about-right-text">
                        <div class="widget-title">
                            <h4 class="font-dst">{!! trans('portal.welcometo') !!}{!! $stud->getName() !!}</h4>
                        </div>
                        <article {{--data-readmore="" aria-expanded="false" id="rmjs-1"
                                 style="max-height: none; height: 200px;"--}}>
                            <p class="first">

                                {!! $stud->getDescription() !!}

                                {{--
                                {!! $stud->Traducir() !!}

                                @if(empty($descripcion['scundario']))
                                    {!! $descripcion['principal'] !!}
                                @else
                                    {!! $descripcion['scundario'] !!}
                                @endif

                                {!! $descripcion !!}
                                --}}
                            </p>
                        </article>
                        {{--<a href="#" data-readmore-toggle="rmjs-1" aria-controls="rmjs-1">Read More</a>--}}

                    </div>
                </div>

                {{--<div class="clearfix"></div>--}}



                @foreach($stud->getInstalationsGallery()  as $k=>$v)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 images-outer m-t-15 ">
                        <div class="images-inner  ">
                            <div class="nivo-activator"></div>
                            <div class="images single-images-gl clearfix">
                                <a href="{!! $v['url'] !!}" class="nivo-trigger"
                                   data-lightbox-gallery="gallery1">
                                    {{--
                    <span class="fa fa-arrows-alt">
                    </span>
                                    --}}
                                    {{--img-thumbnail--}}
                                    <img class="img-sd  img-responsive hidden" lsrc="{!! $v['url'] !!}"
                                            {{--alt="{!! $v['name'] !!}"--}}>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </div>







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
