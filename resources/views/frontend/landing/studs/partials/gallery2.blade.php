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
    {{--
    @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,600,700,900);
    body {
        background: #dce1df;
        color: #4f585e;
        font-family: 'Source Sans Pro', sans-serif;
        text-rendering: optimizeLegibility;
    }
    --}}

    a.btn {
        background: #0096a0;
        border-radius: 4px;
        box-shadow: 0 2px 0px 0 rgba(0, 0, 0, 0.25);
        color: #ffffff;
        display: inline-block;
        padding: 6px 30px 8px;
        position: relative;
        text-decoration: none;
        -webkit-transition: all 0.1s 0s ease-out;
        transition: all 0.1s 0s ease-out;
    }

    .no-touch a.btn:hover {
        background: #00a2ad;
        box-shadow: 0px 8px 2px 0 rgba(0, 0, 0, 0.075);
        -webkit-transform: translateY(-2px);
        transform: translateY(-2px);
        -webkit-transition: all 0.25s 0s ease-out;
        transition: all 0.25s 0s ease-out;
    }

    .no-touch a.btn:active,
    a.btn:active {
        background: #008a93;
        box-shadow: 0 1px 0px 0 rgba(255, 255, 255, 0.25);
        -webkit-transform: translate3d(0, 1px, 0);
        transform: translate3d(0, 1px, 0);
        -webkit-transition: all 0.025s 0s ease-out;
        transition: all 0.025s 0s ease-out;
    }

    div.cards {
        margin: 80px auto;
        max-width: 960px;
        text-align: center;
    }

    div.card {
        background: #ffffff;
        display: inline-block;
        margin: 8px;
        max-width: 300px;
        -webkit-perspective: 1000;
        perspective: 1000;
        position: relative;
        text-align: left;
        -webkit-transition: all 0.3s 0s ease-in;
        transition: all 0.3s 0s ease-in;
        z-index: 1;
    }

    div.card img {
        max-width: 300px;
    }

    div.card div.card-title {
        background: #ffffff;
        padding: 6px 15px 10px;
        position: relative;
        z-index: 0;
    }

    div.card div.card-title a.toggle-info {
        border-radius: 32px;
        height: 32px;
        padding: 0;
        position: absolute;
        right: 15px;
        top: 10px;
        width: 32px;
    }

    div.card div.card-title a.toggle-info span {
        background: #ffffff;
        display: block;
        height: 2px;
        position: absolute;
        top: 16px;
        -webkit-transition: all 0.15s 0s ease-out;
        transition: all 0.15s 0s ease-out;
        width: 12px;
    }

    div.card div.card-title a.toggle-info span.left {
        right: 14px;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    div.card div.card-title a.toggle-info span.right {
        left: 14px;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }

    div.card div.card-title h2 {
        font-size: 24px;
        font-weight: 700;
        letter-spacing: -0.05em;
        margin: 0;
        padding: 0;
    }

    div.card div.card-title h2 small {
        display: block;
        font-size: 18px;
        font-weight: 600;
        letter-spacing: -0.025em;
    }

    div.card div.card-description {
        padding: 0 15px 10px;
        position: relative;
        font-size: 14px;
    }

    div.card div.card-actions {
        box-shadow: 0 2px 0px 0 rgba(0, 0, 0, 0.075);
        padding: 10px 15px 20px;
        text-align: center;
    }

    div.card div.card-flap {
        background: #d9d9d9;
        position: absolute;
        width: 100%;
        -webkit-transform-origin: top;
        transform-origin: top;
        -webkit-transform: rotateX(-90deg);
        transform: rotateX(-90deg);
    }

    div.card div.flap1 {
        -webkit-transition: all 0.3s 0.3s ease-out;
        transition: all 0.3s 0.3s ease-out;
        z-index: -1;
    }

    div.card div.flap2 {
        -webkit-transition: all 0.3s 0s ease-out;
        transition: all 0.3s 0s ease-out;
        z-index: -2;
    }

    div.cards.showing div.card {
        cursor: pointer;
        opacity: 0.6;
        -webkit-transform: scale(0.88);
        transform: scale(0.88);
    }

    .no-touch div.cards.showing div.card:hover {
        opacity: 0.94;
        -webkit-transform: scale(0.92);
        transform: scale(0.92);
    }

    div.card.show {
        opacity: 1 !important;
        -webkit-transform: scale(1) !important;
        transform: scale(1) !important;
    }

    div.card.show div.card-title a.toggle-info {
        background: #ff6666 !important;
    }

    div.card.show div.card-title a.toggle-info span {
        top: 15px;
    }

    div.card.show div.card-title a.toggle-info span.left {
        right: 10px;
    }

    div.card.show div.card-title a.toggle-info span.right {
        left: 10px;
    }

    div.card.show div.card-flap {
        background: #ffffff;
        -webkit-transform: rotateX(0deg);
        transform: rotateX(0deg);
    }

    div.card.show div.flap1 {
        -webkit-transition: all 0.3s 0s ease-out;
        transition: all 0.3s 0s ease-out;
    }

    div.card.show div.flap2 {
        -webkit-transition: all 0.3s 0.2s ease-out;
        transition: all 0.3s 0.2s ease-out;
    }

</style>


<div class="cards">
    @foreach($d as $k => $v)
        @if($k< 5)
            <div class="card">
                <img src="{!! url($v) !!}">
                <div class="card-title">
                    <a href="#" class="toggle-info btn">
                        <span class="left"></span>
                        <span class="right"></span>
                    </a>
                    <h2>
                        {!! $text[$k] !!}

                        {{--
                        Card title
                        <small>Image from unsplash.com</small>
                        --}}
                    </h2>
                </div>
                <div class="card-flap flap1">
                    <div class="card-description">
                        {!! $text[$k] !!}
                        {{--
                        This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when
                        they're not available etc.
                        --}}
                    </div>
                    <div class="card-flap flap2">
                        <div class="card-actions">
                            <a href="#" class="btn">Vea mas</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
<div class="clearfix"></div>



