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

@endphp
<!-- Footer -->
<style>
    footer{
        padding:0;
    }

</style>
<footer >
    {{--
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="about widget clearfix">
                    <div class="logo-wrap">
                        <a href="#">{!! $tittlehorsewordsale !!}</a>
                    </div>
                    <p> En nuestras instalaciones contamos con los mejores animales para la cria</p>
                    <div class="social-media-icons">
                        <a href="#">
                            <i class="fa fa-twitter">
                            </i>
                            <span>Twitter</span>
                        </a>
                        <a href="#">
                            <i class="fa fa-google-plus">
                            </i>
                            <span>Google +</span>
                        </a>
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="#">
                            <i class="fa fa-pinterest"></i>
                            <span>Pinterest</span>
                        </a>
                        <a href="#">
                            <i class="fa fa-youtube-play"></i>
                            <span>Youtube</span>
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 ">
                <div class="quick-links widget clearfix">
                    <h4 class="title">Conocenos</h4>


                    <div class="links">
                        <a href="#">
                            <i class="fa fa-angle-double-right">
                            </i>Instalaciones</a>
                        <a href="#">
                            <i class="fa fa-angle-double-right">
                            </i>Caballos</a>
                        <a href="#">
                            <i class="fa fa-angle-double-right">
                            </i>ventas</a>
                        <a href="#">
                            <i class="fa fa-angle-double-right">
                            </i>fotos</a>
                        <a href="#">
                            <i class="fa fa-angle-double-right">
                            </i>videos</a>
                        <a href="#">
                            <i class="fa fa-angle-double-right">
                            </i>contacto</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 ">
                <div class="tags-outer widget clearfix">
                    <h4 class="title">Tags</h4>
                    <div class="tags">
                        <a href="#">
                            <span>business</span>
                        </a>
                        <a href="#">
                            <span>clean</span>
                        </a>
                        <a href="#">
                            <span>company</span>
                        </a>
                        <a href="#">
                            <span>consulting</span>
                        </a>
                        <a href="#">
                            <span>corporate</span>
                        </a>
                        <a href="#">
                            <span>blog</span>
                        </a>
                        <a href="#">
                            <span>minimal</span>
                        </a>
                        <a href="#">
                            <span>marketing</span>
                        </a>
                        <a href="#">
                            <span>portfolio</span>
                        </a>
                        <a href="#">
                            <span>services</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="subcribe widget clearfix">
                    <!--
                    <h4 class="title">Subscribe</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate provident amet
                        reprehenderit!</p>
                    <form action="#">
                        <div class="field">
                            <input type="email" name="e-mail" placeholder="Your E-mail">
                        </div>
                        <div class="field">
                            <button class="btn btn-min btn-solid">
                                <span>Subscibe</span>
                            </button>
                        </div>
                    </form>
                    -->
                </div>
            </div>
        </div>

    </div>
    --}}
    <div class="footer-bar ">
        <div class="container">
            <h5>{{--{!! trans('portal.allright') !!}--}}

                {{--<a href="#">{!! trans('login.domain') !!}</a>--}}
                <a href="{!! url('http://'.$stud->getDomain()) !!}">{!! $stud->getDomain() !!}</a>
                ©
                {!! Funciones::CurrentYear()!!}
                {!! trans('portal.allright') !!}
                {{--All Rights Reserved--}}</h5>
        </div>
    </div>
</footer>
