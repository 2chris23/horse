@extends('frontend.landing.v4.base')
@php
    $nombre = $horse-> getName();
    $fotos = $horse->getPhotoModel();
    $raza = $horse-> getRaza();
    $mes = $horse->getAgeMonth();
    $edad = $horse->getAge();
    $alzada = $horse->getRaisedFormat();
    $sexo= $horse->getSex();
    $color = $horse->getColorString();
    $yeguada= $horse->getStud();
    $doma = $horse-> getDoma();
    $arbol = $horse->getGenealogia();
    $cubricion = $horse->tocubri;
    $pcubri = $horse->ObtenPrecioCubricionMonedaMill();
    $ParaVender= $horse->getTosold();
    $precio = Funciones::AjustarNumeroMil($horse-> getPrice());

    $fbs = Funciones::CompartirFacebook($horse->getName(),Request::fullUrl());
    $tws = Funciones::CompartirTwitter($horse->getName(),Request::fullUrl());
    $Gs = Funciones::CompartirGoogle(Request::fullUrl());
    $Ptr = Funciones::CompartirPinterest($horse->getName(),Request::fullUrl());
    $print = route('VersionImpresa',['ids'=>$horse->slug]);
@endphp
@section('title', $nombre)
@section('fbheader')
    @include('meta',
  [
  'titulo' => $horse->getName(),
  'descripcion'=>$horse->getDescripcion(),
  'logo'=>$stud->getLogo(),
  'key'=>$stud->words,
  'imagenes' =>$horse->getPhotoModel(),
  ])
    @foreach($horse->getPhotoModel() as $h => $i)
        <meta property="og:image" content="{!! $i->url !!}"/>
    @endforeach
    @foreach($horse->getVideosModel() as $h => $i)
        <meta property="og:video" content="{!! $i->getYoutubeThumb()  !!}">
        <meta name="twitter:player" content="{!! $i->getYoutubeThumb()  !!}">
    @endforeach
    @foreach($fotos as $k=>$v)
        <meta property="og:image" content="{!! $v->url !!}"/>
    @endforeach
@endsection
@section('content')
    <style>
        .recent-ads-list-location li {
            display: inline;
        }
    </style>


    <!-- SUB BANNER -->
    <section class="section-sub-banner bg-9">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>{!! $nombre !!}</h2>
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->

    <!-- ROOM DETAIL -->
    <section class="section-room-detail bg-white borde-top">
        <div class="container">

            <!-- DETAIL -->
            <div class="room-detail mb70">
                <div class="row">
                    <div class="col-md-9 col-sm-7 col-xs-12">

                        <!-- LAGER IMGAE -->
                        <div class="room-detail_img">
                            @for($i=0;$i<count($fotos);$i++)
                                @php($t = $fotos[$i])
                                <div class="room_img-item">
                                    <img src="@if(!empty($t)){!! $t->getUrl() !!}@endif"
                                         alt="{!! $horse->getAltText() !!}" class="img-responsive img-center">
                                </div>
                            @endfor
                        </div>
                        <!-- END / LAGER IMGAE -->
                    </div>
                    <div class="col-md-3 col-sm-5 col-xs-12">

                        <!-- FORM BOOK -->
                        <div class="room-detail_book">

                            <div class="room-detail_total">

                                <div class="tit">{!! $nombre !!}</div>
                                <div>
                                    <span class="socials">
                                        <a rel="nofollow" href="#"
                                           onclick="window.open('{!! $fbs !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                                           class="btn btn-fb sharedbtn">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a rel="nofollow" href="#"
                                           onclick="window.open('{!! $tws !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                                           class="btn btn-twitter sharedbtn">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a rel="nofollow" href="#"
                                           onclick="window.open('{!! $Gs !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                                           class="btn btn-gplus sharedbtn">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a rel="nofollow" href="#"
                                           onclick="window.open('{!! $Ptr !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                                           class="btn btn-pinterest sharedbtn">
                                            <i class="fa fa-pinterest-p"></i>
                                        </a>
                                        <a rel="nofollow" href="#" class="btn btn-print sharedbtn"
                                           onclick="window.open('{!! $print !!}', '{!! $horse->getName() !!}', 'width=700,height=600,top=100,left=100,resizable,scrollbars');">
                                            <i class="fa fa-print"></i>
                                        </a>
                                        <a rel="nofollow" href="#" class="btn btn-envelope sharedbbtn"
                                           data-target=".report-mail" data-toggle="modal"
                                        >
                                            <i class="fa fa-envelope"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>

                            <div class="datos">
                                @if(!empty($raza))
                                    <div class="campo">{!! trans('portal.raza') !!}:
                                        <span>{!! trans('horse.raza.'.$raza )!!}</span>
                                    </div>
                                @endif
                                @if(!empty($edad))
                                    <div class="campo">{!! trans('portal.age') !!}:
                                        <span>
                                            @if($edad!=0)
                                                {!! trans('horse.years',['ano'=>$edad]) !!}
                                            @else
                                                {!! trans('horse.mes',['mes'=>$mes]) !!}
                                            @endif
                                        </span>
                                    </div>
                                @endif
                                @if(($alzada!=0))
                                    <div class="campo">{!! trans('portal.raised') !!}:
                                        @if(!empty($alzada))
                                            <span>{!! $alzada !!}</span>
                                        @endif
                                    </div>
                                @endif
                                @if(!empty($sexo))
                                    <div class="campo">{!! trans('portal.sex') !!}:
                                        <span>{!! trans('horse.sex.'.$sexo )!!}</span>
                                    </div>
                                @endif
                                @if(!empty($color))
                                    <div class="campo">{!! trans('portal.color') !!}:
                                        <span>{!! $color !!}</span>
                                    </div>
                                @endif
                                @if(!empty($yeguada))
                                    <div class="campo">{!! trans('horse.text.stud') !!}:
                                        <span>{!! $yeguada !!}</span>
                                    </div>
                                @endif
                                @if(!empty($doma))
                                    <div class="campo">{!! trans('portal.doma') !!}:
                                        <span>
                                            @if($doma == 1)
                                                {!! trans('horse.doma.'.$doma )!!}
                                            @endif
                                        </span>
                                    </div>
                                @endif
                                @if(!empty($arbol))
                                    <div class="campo">{!! trans('horse.text.genealogia') !!}:
                                        <span>
                                            <a rel="nofollow" href="{!! $arbol !!}" target="_blank">
                                                {!! trans('tema1.ficha') !!}
                                            </a>
                                        </span>
                                    </div>
                                @endif
                                @if(!empty($cubricion))
                                    @if($cubricion==1)
                                        <div class="campo">{!! trans('horse.text.cubricion') !!}:
                                            <span @include('backend.common.toolmoneda',['horse'=>$horse,'c'=>1 ]) >
                                                @if($pcubri==0)
                                                    {!! trans('users.pricecheck') !!}
                                                @else
                                                    {!!  $pcubri !!}
                                                    <span class="coinl coinl-local">
                                                        {!! $horse->getSimboloMoneda() !!}
                                                    </span>
                                                @endif
                                            </span>
                                        </div>
                                    @endif
                                @endif
                                @if($ParaVender == true)
                                    <div class="campo">{!! trans('portal.price') !!}:
                                        @if( $horse->sold == 1)
                                            <span>{!! trans('users.sold') !!}</span>
                                        @else
                                            @if(empty($precio))
                                                <span>{!! trans('users.pricecheck') !!}</span>
                                            @else
                                                <span data-getprice="{!! $horse->slug !!}" @include('backend.common.toolmoneda',['horse'=>$horse,'p'=>1 ]) >
                                                        {!! $horse->ObtenPrecioMonedaMill() !!}
                                                    <span class="coinl coinl-local">
                                                        {!! $horse->getSimboloMoneda() !!}
                                                    </span>
                                                </span>
                                            @endif
                                        @endif
                                    </div>
                                @endif
                                <div class="cbold">
                                    <button class="awe-btn awe-btn-default mt10"
                                            onclick="mostrarrecomendar('.price-quote')">{!! trans('portal.emailcontact') !!}</button>
                                </div>
                            </div>

                            <div class="row sig">
                                @if(!empty($prev))
                                    <div class=" col-xs-12  @if(!empty($next)) col-md-6 @endif text-center">
                                        @if(!empty($prev))
                                            <a href="{!! $prev !!}"
                                               class="btn  m-top-20 btn-special-black p-t-10 p-s-10">
                                                <i class="fa fa-long-arrow-left"></i>
                                                {!! trans('portal.back') !!}

                                            </a>
                                        @endif

                                    </div>
                                @endif
                                @if(!empty($next))
                                    <div class=" col-xs-12 @if(!empty($prev)) col-md-6 @endif text-center ">
                                        @if(!empty($next))
                                            <a href="{!! $next !!}"
                                               class="btn  m-top-20 btn-special-black p-t-10 p-s-10">
                                                {!! trans('portal.next') !!}
                                                <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        @endif

                                    </div>
                                @endif
                                <div class=" col-xs-12 col-md-12 text-center">
                                    <a href="{!! route('MyHorsesV1',['slug'=>$user->getMySlug()]) !!}"
                                       class="btn  m-top-20 btn-special-black p-t-10 p-s-10">
                                        {!! trans('users.return') !!}
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!-- END / FORM BOOK -->

                    </div>
                </div>
            </div>
            <!-- END / DETAIL -->
            <div class="row borde-top">
                {!! $horse->getDescripcion() !!}
            </div>
            <div class="row borde-top">
                <div class="g-pho">
                    @for($i=0;$i<count($fotos);$i++)
                        @php($t = $fotos[$i])

                        <a rel="nofollow" href="@if(!empty($t)){!! $t->getUrl() !!}@endif" class="photo popup-img">
                            <img src="@if(!empty($t)){!! $t->getUrl() !!}@endif"
                                 alt="{!! $horse->getAltText() !!}">
                        </a>
                    @endfor

                </div>
            </div>
            @php($videos = $horse->getVideosModel())
            @if(count($videos) !=0 )
                <div class="row borde-top">
                    <div class="room-detail_package">
                        @foreach($videos as $k => $v)
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="item grid text-center">
                                    <div class="img grid-item">
                                        <a rel="nofollow" href="{!! $v->getNormalVideoYoutube() !!}"
                                           class="popup-youtube">

                                            <span class="fa fa-play"> </span>
                                            <img src="{!! $v->getYoutubeThumb() !!}"
                                                 alt="{!! $stud->getName()  !!}  {!! $v->getName() !!}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        @endif

        <!-- COMPARE ACCOMMODATION -->
            <div class="room-detail_compare">
                <h2 class="room-compare_title">*Otros Ejemplares*</h2>

                <div class="room-compare_content">

                    <div class="row">
                        <!-- ITEM -->
                        @php
                            $hor = Horses::CaballosAzar($stud->id,4,$horse->id)->get();


                        @endphp

                        @foreach($hor as $k=>$v)
                            @php
                                $f = $v->getPhotoFirstModel();
                                $foto = '';
                                    if(!empty($f)){
                                        $foto = $f->url;
                                    }
                                $name = $v->getName();
                                $raza = $v->getRaza();
                                $edad = $v->getAge();
                                $mes = $v->getAgeMonth();
                                $sexo = $v->getSex();
                            @endphp
                            <div class="col-xs-6 col-md-3 w-pq">
                                <div class="room-compare_item">
                                    <div class="img">
                                        <a rel="nofollow"
                                           href="{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]) !!}">
                                            <img src="{!! $foto !!}" alt="">
                                        </a>
                                    </div>

                                    <div class="text">
                                        <h2 class="text-center"><a rel="nofollow" href="">{!! $name !!}</a></h2>

                                        <ul>
                                            <li>{!! trans('portal.raza') !!}: {!! trans('horse.raza.'.$raza )!!}</li>
                                            <li>{!! trans('portal.age') !!}: @if($edad!=0)
                                                    {!! trans('horse.years',['ano'=>$edad]) !!}
                                                @else
                                                    {!! trans('horse.mes',['mes'=>$mes]) !!}
                                                @endif</li>
                                            <li>{!! trans('portal.sex') !!}: @if($sexo!=0)
                                                    {!! trans('horse.sex.'.$sexo )!!}
                                                @endif</li>
                                        </ul>
                                    </div>
                                    <div class="cbold">
                                        <a rel="nofollow"
                                           href="{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]) !!}"
                                           class="awe-btn awe-btn-default mt10">{!! trans('portal.seemore') !!}</a>

                                    </div>

                                </div>
                            </div>
                    @endforeach
                    <!-- END / ITEM -->
                    </div>

                </div>
            </div>
            <!-- END / COMPARE ACCOMMODATION -->

        </div>
    </section>


    <!-- END / SHOP DETAIL -->

@endsection

@section('js')
    <script>
        function modalshow(clase) {
            $(clase).modal('show');
        };

        function mostrarreportar(el) {
            modalshow(el);
        }

        function mostrarrecomendar(el) {
            modalshow(el);
        }

        $(document).on('ready', function () {
            $('.recent-ads-container').find('.recent-ads-list-image').addClass('col-xs-4');
            $('.recent-ads-container').find('.recent-ads-list-content').addClass('col-xs-8');

            $('.recent-ads-container').append('<div class="clearfix"></div>');
            $('.recent-ads').parent().find('form').append('<div class="clearfix"></div>');
            $('.btn-theme').addClass('awe-btn').addClass('awe-btn-default').addClass('bold').addClass('mt10').removeClass('btn-block').removeClass('btn').parent().addClass('text-center');

        })
    </script>

@endsection
@section('modal')
    @include('portal.Modal.contacto',['horse'=>$horse])
    @include('portal.Modal.email',['horse'=>$horse])
    {{--
    @include('portal.Modal.report',['horse'=>$horse])

    @include('portal.Modal.compart',['horse'=>$horse])

    @include('portal.Modal.detalle',['horse'=>$horse])

    --}}
@endsection
