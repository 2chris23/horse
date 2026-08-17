@extends('frontend.landing.studs.base',['user'=>$user,'stud'=>$stud])
@section('title')
    @php

        $logo =$stud->getLogo();


            $logobasic= url("landing/images/basic/logo.png");

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

        $text[0]= "{!! trans('users.fake.0') !!}";
        $text[1]= "{!! trans('users.fake.1') !!}";
        $text[2]= "{!! trans('users.fake.2') !!}";
      $textext[0]= "{!! trans('users.fake.0') !!}";
    $text[1]= "{!! trans('users.fake.1') !!}";
    $text[2]= "{!! trans('users.fake.2') !!}";
    $text[3]= "{!! trans('users.fake.3') !!}";
    $stext[0]= "{!! trans('users.fake.0') !!}";
    $stext[1]= "{!! trans('users.fake.1') !!}";
    $stext[2]= "{!! trans('users.fake.2') !!}";
    $stext[3]= "{!! trans('users.fake.3') !!}";

$a = [];
    for($i = 0;$i<4;$i++){
    $d[$i]= url('img/horse/'.($i+1).'.jpg');
    $t[$i] = $text[rand(0,3)];
    $st[$i] = $stext[rand(0,3)];
    }

    $d[0]=url('img/pre1.jpg');
    $d[1]=url('img/pre2.jpg');
    //$d[2]=url('img/8.jpg');


    $gallery1 = true;
    $gallery2 = false;
    $gallery3 = true;

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

@endsection
@section('csstop')

@endsection
@section('content')


    <!-- basic-slider start -->

    <div class="slider-section">
        <div class="owl-prevf sombraizquierda oculto" style="">
            <i class="fa fa-chevron-left pull-left"></i>
        </div>
        <div class="owl-nextf sombraderecha oculto" style="">
            <i class="fa fa-chevron-right pull-right"></i>
        </div>
        {{--<div class="slider-active owl-carousel mh600">--}}
        <div class="principio owl-carousel mh600">
            @php
                $sliders = $stud->getSliders();
                $tmp = count($sliders);

            @endphp

            @if($tmp ==1 )
                @php
                    if(isset($sliders[0])){
                        $f[0]= $sliders[0] ->getUrl()   ;
                        $f[1]= $sliders[0] ->getUrl()       ;
                        }else{
                        $f= $d;
                        }
                @endphp
                @foreach($f as $k=>$s)
                    @if($k < 3)
                        @include('frontend.landing.studs.partials.slider',[
                    'url'=> $s,
                    'name'=> $stud->getName(),
                    'titulo'=> '',
                    'stitulo'=>'' ,
                'alt'=> $stud->getName(),
                    ])
                    @endif
                @endforeach
            @elseif($tmp !=0 )
                @foreach($sliders as $k=>$v)
                    @include('frontend.landing.studs.partials.slider',[
                    'url'=> $v['url'],
                    'name'=> $stud->getName(),
                    'titulo'=> $v->getTitulo1(),
                'stitulo'=> $v->getTitulo2(),
                'alt'=> $stud->getName(),
                    ])
                    {{----}}
                @endforeach
            @else

                @foreach($d as $k=>$s)
                    @if($k < 3)
                        @include('frontend.landing.studs.partials.slider',[
                    'url'=> $d[$k],
                    'name'=> $stud->getName(),
                    'titulo'=> '',
                    'stitulo'=>'' ,
                'alt'=> $stud->getName(),
                    ])


                    @endif
                @endforeach
            @endif
        </div>

    </div>



    {{-- mp50 mpd0  arena--}}
    <div class="causes-wrapper mp80 mpd0  {{--about-page-wrapper--}}">
        <div class="container">
            <div class="section-name one">
                <h2 class="font-dst">{!! trans('portal.horsepinned') !!}</h2>
                <div class="short-text">
                    <!--<h5>Uaerat litora, taciti quaerat dolor ligula laoreet!</h5>-->
                </div>
            </div>
            <div class="causes" style="padding-top: 0px!important; ">
                <div class="causes-list row">
                    @if(count($horsesfav)!=0)
                        @foreach($horsesfav as $k=>$v)
                            @if($k < 3)
                                @php
                                    $foto = $v->getPhotoModel()->first();
                                    $url = (!empty($foto))?$foto->getUrl():'';
                                    $rd = rand(0,3);

                                    $color = $v->getColorString();

                                    //$color = (!empty($color))?$color->name:null;
                                    $link =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]);



                                @endphp

                                @include('frontend.landing.studs.partials.sellcard',[
              'link'=>$link,
              'id'=> $v->id,
              'url'=> $url,
              'titulo'=> $v->getName(),
              'raza'=> $v->raza,
              'horse'=> $v,

              'stitulo'=>$text[rand(0,3)],
              'alzada'=>$v->getRaisedFormat(),
              'edad'=>$v->getAge(),
              'color'=>$color,

              ])
                            @endif
                        @endforeach
                    @else


                        @foreach($horses as $k=>$v)
                            @if($k < 3)
                                @php
                                    $foto = $v->getPhotoModel()->first();
                                    $url = (!empty($foto))?$foto->getUrl():'';
                                    $rd = rand(0,3);

                                    $color = $v->getColorString();

                                    //$color = (!empty($color))?$color->name:null;
                                    $link =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]);




                                @endphp

                                @include('frontend.landing.studs.partials.sellcard',[
              'link'=>$link,
              'id'=> $v->id,
              'url'=> $url,
              'titulo'=> $v->getName(),
'raza'=> $v->raza,
              'stitulo'=>$text[rand(0,3)],
              'alzada'=>$v->getRaisedFormat(),
              'edad'=>$v->getAge(),
              'color'=>$color,
              'horse'=>$v,

              ])
                            @endif
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>



@endsection

@section('js')
    {{--<script src="{!! url('js/snow.js') !!}"></script>--}}
    <script>

    </script>
@endsection
