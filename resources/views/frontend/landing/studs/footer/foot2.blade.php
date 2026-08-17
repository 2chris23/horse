@php
    use App\Models\Stud;$logobasic= url("landing/images/basic/logo.png");
        //$logo =$stud->getLogo();
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

$caballos= $stud->getHorses();


    $actual =Request::url();
//$sexos = Publico::Arraysex();
$sexos = Publico::Arraysexs();

@endphp


<div class="newfoot">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <i class="fa fa-map-marker fa-3x ic" aria-hidden="true"></i>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 raya">
                    <label class="titulo1">{!! trans('stud.address') !!}</label>
                    <div class="col-12 m-t-5"></div>
                    <span>
                        {!! $stud->getAddress() !!},
                        @if(!empty($stud->getCity() ))
                            {!! $stud->getCity() !!},
                        @endif
                        @if(!empty($stud->getStateModel() ))
                            @if(!empty($stud->getStateModel()->name ))
                                {!! $stud->getStateModel()->name!!},
                            @endif
                        @endif
                        @if(!empty($stud->getCountryModel() ))
                            @if(!empty($stud->getCountryModel()->name ))
                                {!! $stud->getCountryModel()->name !!}
                            @endif
                        @endif
                    </span>
                    <div class="col-12 m-t-5"></div>
                    {{--
                    <span>
                        GoogleMaps
                    </span>
                    --}}

                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <i class="fa fa-envelope-o fa-2x ic" aria-hidden="true"></i>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 raya">
                    <label class="titulo1">{!! trans('stud.emailcontact') !!}</label>
                    <div class="col-12 m-t-5"></div>
                    <span>
                        {!! $stud->getEmail() !!}
                    </span>
                    <div class="col-12 m-t-5"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <i class="fa fa-mobile fa-2x ic" aria-hidden="true"></i>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 raya">
                    <label class="titulo1">{!! trans('stud.text.phone') !!}</label>
                    <div class="col-12 m-t-5"></div>
                    @foreach($stud->getPhoneModel() as $k=> $v)
                        @if($v->isNull() !== true)
                            <a href="tel:{!! $v->getFormatNumberOnly() !!}">
                                <span> {!! $v->FormatNumber() !!} </span>
                            </a>
                            <div class="col-12"></div>

                        @endif

                    @endforeach


                </div>

            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    {{--<img src="formas.svg" alt="" style="color: #757171; height: 2em; width: 2em;">--}}
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 raya">
                    <label class="titulo1">{!! trans('stud.socialmedia') !!}</label>
                    <div class="col-12 "></div>


                    @if(!empty($stud->getFacebook()->getUrlPage()))

                        <a href="{!! $stud->getFacebook()->getUrlPage() !!}" target="_blank" title="">
                            <i class="fa p-l-10 fa-facebook-square"></i>
                        </a>

                    @endif
                    @if(!empty($stud->getTwitter()->getUrlPage()))

                        <a href="{!! $stud->getTwitter()->getUrlPage() !!}" target="_blank" title="">
                            <i class="fa p-l-10 fa-twitter"></i>
                        </a>

                    @endif
                    @if(!empty($stud->getPinterest()->getUrlPage()))

                        <a href="{!! $stud->getPinterest()->getUrlPage() !!}" target="_blank" title="">
                            <i class="fa p-l-10 fa-pinterest"></i>
                        </a>

                    @endif
                    @if(!empty($stud->getInstagram()->getUrlPage()))

                        <a href="{!! $stud->getInstagram()->getUrlPage() !!}" target="_blank" title="">
                            <i class="fa p-l-10 fa-instagram"></i>
                        </a>

                    @endif
                    @if(!empty($stud->getYoutube()->getUrlPage()))

                        <a href="{!! $stud->getYoutube()->getUrlPage() !!}" target="_blank" title="">
                            <i class="fa p-l-10 fa-youtube"></i>
                        </a>

                    @endif





                    {{--
                    <li class="p-l-10" style="float: left;">
                        <a href="#" target="_blank">
                            <img style="margin: 0 5px;display: block;border: 0;" alt="Google+" src="google.png">
                        </a>
                    </li>
                    --}}






                    {{--
                    <h6>
                        <a href="#">Facebook</a>
                    </h6>
                    <h6>
                        <a href="#">Twitter</a>
                    </h6>
                    <h6>
                        <a href="#">Youtube</a>
                    </h6>
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>
@php($envi = \Config::get('app.env'))
@if($envi == 'local')
    <script>

        $(window).on('resize', function () {
            /*
            var s = ((99*$(document).width())) /100;
            console.log('w'+$(window).width());
            console.log('w'+$(document).width());
            console.log('f'+ s);
            */
            var s = $(window).width();
            $('.newfoot').css('max-width', s + "px").css('width', s + 'px');

        });

        $(window).on('load', function () {
            /*
            var s = ((99*$(document).width())) /100;
            console.log('w'+$(window).width());
            console.log('w'+$(document).width());
            console.log('f'+ s);
            */
            var s = $(window).width();
            $('.newfoot').css('max-width', s + "px").css('width', s + 'px');
        });

    </script>
@endif
