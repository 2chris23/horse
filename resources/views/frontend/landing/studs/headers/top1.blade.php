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
<style>

    nav.navigation {
        padding-top: 5px;
    {{--background: url(http://yeguadajuanvazquez.com/imgs/f_web.gif);--}}

    }

    /*.modal-open*/
    .modal-content {
        margin-top: 100px !important;
    }

    .slider-section {
        /*margin-top: 90px!important;*/
    }

    .telf1 {
        @if(!empty($stud->getColor()))
              color: {!! $stud->getColor() !!};
        @else
              color: #ab1b18;
        @endif
              font-size: 16px;
        padding-right: 3px;
    }

    .email1 {
        @if(!empty($stud->getColor()))
              color: {!! $stud->getColor() !!};
        @else
              color: #ab1b18;
        @endif
              font-size: 16px;
        padding-right: 3px;
    }

    .p-l-5 {
        padding-left: 5px;
    }

    .p-l-10 {
        padding-left: 10px;
    }

    .p-l-20 {
        padding-left: 20px;
    }

    .p-l-40 {
        padding-left: 40px;
    }

    .logo-wrap > a > img {
        max-height: 75px;
        max-width: 134px;
        margin-top: -25px;
    }

    .header-extense {
        font-size: 13px;
    }

    .navigation {
        height: 90px !important;
    }

    .navigation .logo-wrap {
        padding: 5px 15px;
    }

    .navigation .menu-wrap {
        padding: 20px 0 0;
    }

    @media (max-width: 425px) {
        .navigation {
            height: 105px !important;
        }

        .slider-section {
            margin-top: 106px !important;
        }
    }

    @media (max-width: 767px) {

        .slider-section {
            margin-top: 106px !important;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .slider-section {
            margin-top: 90px !important;
        }
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .slider-section {
            margin-top: 90px !important;
        }
    }

    @media (min-width: 1200px) {
        .slider-section {
            margin-top: 90px !important;
        }

    }
</style>
<header>
    <nav class="navigation">
        <div class="container">
            <div class=" col-12 row">
                <div class="info-cabecera  col-md-10 col-md-offset-2 col-xs-9 pull-right">
                    @if(!empty( $stud->getEmail()))
                        <div class="mail pull-right p-l-10 header-extense">
                            <i class="fa fa-envelope email1"></i>
                            <span class="">
                            {!!  $stud->getEmail() !!}
                            </span>
                        </div>
                    @endif


                    @if(!empty($stud->getPhoneModel()->first()))
                        <div class="telf pull-right p-l-40  header-extense">
                            <a href="tel:{!! $stud->getPhoneModel()->first()->getFormatNumberOnly() !!}">
                                <i class="fa fa-phone telf1"></i>
                                {!! $stud->getPhoneModel()->first()->FormatNumber() !!}
                            </a>
                        </div>
                    @endif
                    <ul class="redes pull-right p-l-10 hidden-xs hidden-sm"
                        style="list-style: none;margin: 0;padding: 0;">

                        @if(!empty($stud->getFacebook()->getUrlPage()))
                            <li class="p-l-5 pull-left">
                                <a href="{!! $stud->getFacebook()->getUrlPage() !!}" target="_blank" title="">
                                    <div class="iconos ">
                                        <i class="fa fa-facebook"></i>
                                    </div>
                                </a>
                            </li>
                        @endif
                        @if(!empty($stud->getTwitter()->getUrlPage()))
                            <li class="p-l-5 pull-left">
                                <a href="{!! $stud->getTwitter()->getUrlPage() !!}" target="_blank" title="">
                                    <div class="iconos ">
                                        <i class="fa fa-twitter"></i>
                                    </div>
                                </a>
                            </li>
                        @endif
                        @if(!empty($stud->getPinterest()->getUrlPage()))
                            <li class="p-l-5 pull-left">
                                <a href="{!! $stud->getPinterest()->getUrlPage() !!}" target="_blank" title="">
                                    <div class="iconos ">
                                        <i class="fa fa-pinterest"></i>
                                    </div>
                                </a>
                            </li>
                        @endif
                        @if(!empty($stud->getInstagram()->getUrlPage()))
                            <li class="p-l-5 pull-left">
                                <a href="{!! $stud->getInstagram()->getUrlPage() !!}" target="_blank" title="">
                                    <div class="iconos ">
                                        <i class="fa fa-instagram"></i>
                                    </div>
                                </a>
                            </li>
                        @endif
                        @if(!empty($stud->getYoutube()->getUrlPage()))
                            <li class="p-l-5 pull-left">
                                <a href="{!! $stud->getYoutube()->getUrlPage() !!}" target="_blank" title="">
                                    <div class="iconos ">
                                        <i class="fa fa-youtube"></i>
                                    </div>
                                </a>
                            </li>
                        @endif





                        {{--
                        <li class="p-l-10" style="float: left;">
                            <a href="#" target="_blank">
                                <img style="margin: 0 5px;display: block;border: 0;" alt="Google+" src="google.png">
                            </a>
                        </li>
                        --}}
                    </ul>

                </div>
            </div>
            <div class="row">
                <div class="logo-wrap col-md-2 col-xs-6">
                    <a href="#">
                        <img src="{!! $logo !!}" alt="">
                    </a>
                </div>
                <div class="menu-wrap col-md-10 ">

                    <ul class="menu">
                        @include('frontend.landing.studs.partials.languaje')
                        {{--@include('frontend.landing.studs.partials.moneda')--}}
                        @php($s=(Funciones::BuscarEnString($actual,$user->getMySlug())==true
                        and Funciones::BuscarEnString($actual,'Instalaciones')!=true)
                        and Funciones::BuscarEnString($actual,'Horse')!=true
                        and Funciones::BuscarEnString($actual,'Ventas')!=true
                        and Funciones::BuscarEnString($actual,'Galeria')!=true
                        and Funciones::BuscarEnString($actual,'Contacto')!=true
                        ?'active':null)
                        <li class="{!! $s !!}">
                            <a href="{!! route('MyPage',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.home') !!}</a>
                        </li>
                        @php($s=(Funciones::BuscarEnString($actual,'Instalaciones')==true)?'active':null)
                        <li class="{!! $s !!}">
                            {{--<a href="{!! route('MyInstalation',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.instalations') !!}</a>--}}
                            <a href="{!! route('MyInstalation',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.instalations') !!}</a>
                        </li>
                        <!--Ampoliar por tipo-->
                        @php($s=(Funciones::BuscarEnString($actual,'Caballo')==true)?'active':null)
                        @php($g = $stud->getFirstHorse())
                        @if(!empty($g))
                            <li class="{!! $s !!}">
                                <span>{!! trans('stud.horses') !!}</span>
                                <ul class="submenu">
                                    @foreach($sexos as $k=>$v)
                                        @php
                                            $h = $stud->getFirstHorseBySex($k);
                                        @endphp
                                        @if($k!=0)
                                            @if(!empty($h))
                                                <li>
                                                    {{--<a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>$k,'v'=>0]) !!}">{!! $v !!}</a>--}}
                                                    <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>$k,'v'=>0]) !!}">{!! $v !!}</a>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach

                                </ul>
                            </li>
                        @endif
                        @php($s=(Funciones::BuscarEnString($actual,'Ventas')==true)?'active':null)
                        <li class="{!! $s !!}">
                            <a href="{!! route('MySell',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.sell') !!}</a>
                        </li>
                        @php($s=(Funciones::BuscarEnString($actual,'Galeria')==true)?'active':null)
                        <li class="{!! $s !!}">
                            <a href="{!! route('MyGallery',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.photos') !!}</a>
                        </li>
                        @php($s=(Funciones::BuscarEnString($actual,'Video')==true)?'active':null)
                        <li class="{!! $s !!}">
                            <a href="{!! route('MyVideo',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.video') !!}</a>
                        </li>
                        @php($s=(Funciones::BuscarEnString($actual,'Contacto')==true)?'active':null)
                        <li class="{!! $s !!}">
                            <a href="{!! route('MyContact',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.contact') !!}</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <!--[ MOBILE-MENU-AREA START ]-->
        <div class="mobile-menu-area pull-right">

            <div class="container">

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="mobile-area">
                            <div class="mobile-menu">
                                <nav id="mobile-nav">
                                    <ul>
                                        @include('frontend.landing.studs.partials.languaje')
                                        {{--@include('frontend.landing.studs.partials.moneda')--}}
                                        <li>
                                            <a href="{!! route('MyPage',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.home') !!}</a>
                                        </li>
                                        <li>
                                            <a href="{!! route('MyInstalation',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.instalations') !!}</a>
                                        </li>
                                        <li>
                                            <a href="#">{!! trans('stud.horses') !!}</a>
                                            <ul class="single">

                                                @foreach($sexos as $k=>$v)
                                                    @php
                                                        $h = $stud->getFirstHorseBySex($k);
                                                    @endphp
                                                    @if($k!=0)
                                                        @if(!empty($h))
                                                            <li>
                                                                <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>$k,'v'=>0]) !!}">{!! $v !!}</a>
                                                            </li>

                                                        @endif
                                                    @endif
                                                @endforeach
                                                {{--
                                                <li>
                                                    <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>1]) !!}">Sementales</a>

                                                </li>
                                                <li>
                                                    <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>2]) !!}">Capados</a>
                                                </li>
                                                <li>
                                                    <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>3]) !!}">Yeguas</a>
                                                </li>
                                                <li>
                                                    <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>3]) !!}">Potros</a>
                                                </li>
                                                <li>
                                                    <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>3]) !!}">Potras</a>
                                                </li>
                                                --}}

                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{!! route('MySell',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.sell') !!}</a>
                                        </li>
                                        <li>
                                            <a href="{!! route('MyGallery',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.photos') !!}</a>
                                        </li>
                                        <li>
                                            <a href="{!! route('MyVideo',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.video') !!}</a>
                                        </li>

                                        <li>
                                            <a href="{!! route('MyContact',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.contact') !!}</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--[ MOBILE-MENU-AREA END  ]-->
    </nav>
</header>
