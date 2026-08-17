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
$fotos = (isset($fotos))?$fotos:null;

@endphp
@if(!empty($fotos))
    <blockquote>
        {{--
        <i class="fa fa-quote-left">
        </i>
        --}}
        <div class="row grid">
            <div class="grid-sizer col-xs-4"></div>
            @foreach($fotos as $k=>$v)
                <div class="grid-item p-l-7 ">
                    <div class="grid-item-content ">
                        <div class="images-outer">
                            <div class="images single-images-gl ">
                                <a href="{!! $v->getUrl() !!}" class="nivo-trigger"
                                   data-lightbox-gallery="gallery1">
                                    <span class="fa fa-arrows-alt hidden"> </span>
                                    <img src="{!! $v->getUrl()  !!}" class="img-responsive"
                                         alt="{!! $v->getName() !!}">
                                </a>
                            </div>
                            <div class="nivo-activator"></div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </blockquote>
@endif