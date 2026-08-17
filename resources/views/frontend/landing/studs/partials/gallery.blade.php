@php
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

@endphp
<!-- Footer -->
{{--https://codepen.io/mcraiganthony/pen/NxGxqm--}}
<style>
    /*
    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }
    html {
        background-color: #f0f0f0;
    }
    body {
        color: #999999;
        font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-style: normal;
        font-weight: 400;
        letter-spacing: 0;
        padding: 1rem;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -moz-font-feature-settings: "liga" on;
    }
    */
    img {
        height: auto;
        max-width: 100%;
        vertical-align: middle;
    }

    .card__title > .btn {
        background-color: white;
        border: 1px solid #cccccc;
        color: #696969;
        padding: 0.5rem;
        text-transform: lowercase;
    }

    .card__title > .btn--block {
        display: block;
        width: 100%;
    }

    .cards {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .cards__item {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        padding: 1rem;
    }

    @media (min-width: 40rem) {
        .cards__item {
            width: 50%;
        }
    }

    @media (min-width: 56rem) {
        .cards__item {
            width: 33.3333%;
        }
    }

    .card {
        background-color: white;
        border-radius: 0.25rem;
        box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        overflow: hidden;
        min-width: 320px;
    }

    .card:hover .card__image {
        -webkit-filter: contrast(100%);
        filter: contrast(100%);
    }

    .card__content {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        padding: 1rem;
    }

    .card__image {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
        -webkit-filter: contrast(70%);
        filter: contrast(70%);
        overflow: hidden;
        position: relative;
        -webkit-transition: -webkit-filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
        transition: -webkit-filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
        transition: filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
        transition: filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91), -webkit-filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
    }

    .card__image::before {
        content: "";
        display: block;
        padding-top: 56.25%;
    }

    @media (min-width: 40rem) {
        .card__image::before {
            padding-top: 66.6%;
        }
    }

    /*
        .card__image--flowers {
            background-image: url(https://unsplash.it/800/600?image=82);
        }

        .card__image--river {
            background-image: url(https://unsplash.it/800/600?image=11);
        }

        .card__image--record {
            background-image: url(https://unsplash.it/800/600?image=39);
        }

        .card__image--fence {
            background-image: url(https://unsplash.it/800/600?image=59);
        }
    */
    @foreach($d as $k=>$v)
    .card__image--{!! $k !!}  {
        background-image: url({!! url($v) !!});
    }
    @endforeach
    .card__title {
        color: #696969;
        font-size: 1.25rem;
        font-weight: 300;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .card__text {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        font-size: 0.875rem;
        line-height: 1.5;
        margin-bottom: 1.25rem;
    }


</style>


<ul class="cards">
    @foreach($d as $k => $v)
        @if($k<5)
        <li class="cards__item">
            <div class="card">
                <div class="card__image card__image--{!! $k !!}"></div>
                <div class="card__content">
                    <div class="card__title">
                    {{--Titulo si se necesita --}}
                        {!! $text[$k] !!}
                    </div>
                    {{--
                    <p class="card__text">
                        {!! $text[$k] !!}
                    </p>
                    --}}
                    <button class="btn btn--block card__btn">Button</button>
                </div>
            </div>
        </li>
        @endif

    @endforeach

</ul>
<div class="clearfix"></div>
