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

<header>
    <nav class="navigation">
        <div class="container">
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
                                    {{--
                                    <li>
                                        <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>1,'v'=>0]) !!}">Sementales</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>2,'v'=>0]) !!}">Capados</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>3,'v'=>0]) !!}">Yeguas</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>3,'v'=>0]) !!}">Potros</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>3,'v'=>0]) !!}">Potras</a>
                                    </li>
                                    --}}

                                    {{--<li>
    <a href=""class="active">Service Detail</a>
    </li>--}}
                                </ul>
                                {{--Route::get('/{id?}/caballos/{type?}','StudController@ClientGallery')->name('MyHorses');--}}
                            </li>
                        @endif
                        @php($s=(Funciones::BuscarEnString($actual,'Ventas')==true)?'active':null)
                        <li class="{!! $s !!}">
                            {{--<a href="{!! route('MySell',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.sell') !!}</a>--}}
                            <a href="{!! route('MySell',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.sell') !!}</a>
                        </li>

                        @php($s=(Funciones::BuscarEnString($actual,'Galeria')==true)?'active':null)
                        <li class="{!! $s !!}">
                            {{--<a href="{!! route('MyGallery',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.photos') !!}</a>--}}
                            <a href="{!! route('MyGallery',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.photos') !!}</a>
                        </li>
                        @php($s=(Funciones::BuscarEnString($actual,'Video')==true)?'active':null)
                        <li class="{!! $s !!}">
                            {{--}}<a href="{!! route('MyVideo',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.video') !!}</a>--}}
                            <a href="{!! route('MyVideo',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.video') !!}</a>
                        </li>
                        @php($s=(Funciones::BuscarEnString($actual,'Contacto')==true)?'active':null)
                        <li class="{!! $s !!}">
                            {{----<a href="{!! route('MyContact',['slug'=>$user->getMySlug(),'id'=>$user->id]) !!}">{!! trans('stud.contact') !!}</a>--}}
                            <a href="{!! route('MyContact',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.contact') !!}</a>
                        </li>


                    </ul>
                </div>
                {{--}}
                <div class="col-md-1 col-xs-6">
                    <div id="search-toggle">
                        <i class="fa fa-search">
</i>
                    </div>
                </div>
                --}}
            </div>
        </div>

        <!--[ MOBILE-MENU-AREA START ]-->
        <div class="mobile-menu-area">
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
