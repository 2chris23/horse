@php($fotos = $horse->getPhotoModel())
@section('title',$horse->getName())
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

@extends('frontend.landing.v1.base')

@section('content')

    @php($f = (count($fotos)!=0)?$fotos[0]:null)
    @php
        $edad = $horse->getAge();
        $mes = $horse->getAgeMonth();
        $sold = ($horse->sold == 1) ?'sold':'';
    $fbs = Funciones::CompartirFacebook($horse->getName(),Request::fullUrl());
$tws = Funciones::CompartirTwitter($horse->getName(),Request::fullUrl());
$Gs = Funciones::CompartirGoogle(Request::fullUrl());
$Ptr = Funciones::CompartirPinterest($horse->getName(),Request::fullUrl());
    $print = route('VersionImpresa',['ids'=>$horse->slug]);
    @endphp

    @include('frontend.landing.v1.partials.baner',['texto'=>$horse->getName(),'clase'=>'about-banner'])

    <!--Model Details Section-->

    <section id="m_details" class="m_details p-top-60 p-bottom-30 fix">
        <div class="container">
            <div class="row">
                <div class=" col-xs-offset-3 col-xs-6 m-t-20">
                    @include('flash::message')
                </div>
                <div class="main_details">
                    <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12 p-top-40">

                        <div class="col-xs-12 m_details_img ">

                            <figure class="figure-center">
                                <img lsrc="@if($f!=''){!! $f->getUrl() !!}@endif" alt="{!! $horse->getAltText() !!}"
                                     class="{!! $sold !!} img-responsive hidden  lazy"/>
                            </figure>
                            @if($horse->sold == 1)
                                <div class="sold sold-n sold-b"></div>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 row ">
                            <div class=" col-xs-12 col-md-4 text-center">
                                @if(!empty($prev))
                                    <a href="{!! $prev !!}"
                                       class="btn btn-default m-top-20">
                                        <i class="fa fa-long-arrow-left"></i>
                                        {!! trans('portal.back') !!}

                                    </a>
                                @endif

                            </div>

                            <div class=" col-xs-12 col-md-4 text-center">
                                <a href="{!! route('MyHorsesV1',['slug'=>$user->getMySlug()]) !!}"
                                   class="btn btn-default m-top-20">
                                    {!! trans('users.return') !!}
                                </a>
                            </div>

                            <div class=" col-xs-12 col-md-4 text-center ">
                                @if(!empty($next))
                                    <a href="{!! $next !!}"
                                       class="btn btn-default m-top-20">
                                        {!! trans('portal.next') !!}
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                @endif

                            </div>

                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12 p-top-40">
                        <div class="margin-top-120"></div>
                        <h2>
                            <div class="col-lg-6 col-md-6 col-xs-7 ">
                                {!! $horse->getName() !!}
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-5 ">
                                <div class="col-xs-2">
                                    <a href="#!"
                                       onclick="window.open('{!! $fbs !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                                       class="btn btn-fb sharedbtn">
                                        <i class="fa fa-facebook">
                                        </i>
                                    </a>
                                </div>
                                <div class="col-xs-2">
                                    <a href="#!"
                                       onclick="window.open('{!! $tws !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                                       class="btn btn-twitter sharedbtn">
                                        <i class="fa fa-twitter">
                                        </i>
                                    </a>
                                </div>
                                <div class="col-xs-2">
                                    <a href="#!"
                                       onclick="window.open('{!! $Gs !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                                       class="btn btn-gplus sharedbtn">
                                        <i class="fa fa-google-plus">
                                        </i>
                                    </a>
                                </div>
                                <div class="col-xs-2">
                                    <a href="#!"
                                       onclick="window.open('{!! $Ptr !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                                       class="btn btn-pinterest sharedbtn">
                                        <i class="fa fa-pinterest">
                                        </i>
                                    </a>
                                </div>
                                <div class="col-xs-2">
                                    <a href="#!" rel="nofollow" class="btn btn-print sharedbtn"
                                       onclick="window.open('{!! $print !!}', '{!! $horse->getName() !!}', 'width=700,height=600,top=100,left=100,resizable,scrollbars');">
                                        <i class="fa fa-print"> </i> </a>
                                </div>


                                <div class="col-xs-2" data-target=".report-mail" data-toggle="modal">
                                    {{--<div class="addthis_inline_share_toolbox"></div>--}}
                                    <a href="#!" rel="nofollow" class="btn btn-print sharedbtn"
                                            {{--onclick="window.open('{!! $print !!}', '{!! $horse->getName() !!}', 'width=700,height=600,top=100,left=100,resizable,scrollbars');"--}}
                                    >
                                        <i class="fa fa-envelope">
                                        </i>
                                    </a>
                                    {{--<span class="hidetext">{!! trans('portal.watchlist') !!}</span>--}}

                                </div>
                            </div>

                        </h2>
                        <div class="clearfix"></div>
                        <div class="person_details m-top-20 ">
                            @if($horse->sold == 1)
                                <div class="sold sold-n sold-s"></div>
                            @endif


                            @if($horse->sold == 1)
                                <div class="sold sold-n sold-s"></div>
                            @endif
                            <div class="row text-left  ">
                                <div class="col-xs-6 ">
                                    {!! trans('portal.raza') !!}:
                                </div>
                                <div class="col-xs-6 ">
                                    {!! trans('horse.raza.'.$horse->raza) !!}
                                </div>
                            </div>
                            <div class="row text-left  ">
                                <div class="col-xs-6 ">
                                    {!! trans('portal.age') !!}:
                                </div>
                                <div class="col-xs-6 ">
                                    @if($edad!=0)
                                        {!! trans('horse.years',['ano'=>$edad]) !!}
                                    @else
                                        {!! trans('horse.mes',['mes'=>$mes]) !!}
                                    @endif
                                </div>
                            </div>
                            <div class="row text-left  ">
                                <div class="col-xs-6 ">
                                    {!! trans('stud.text.raised') !!}:
                                </div>
                                <div class="col-xs-6 ">
                                    {!! $horse->getRaisedFormat() !!}
                                </div>
                            </div>
                            <div class="row text-left  ">
                                <div class="col-xs-6 ">
                                    {!! trans('portal.sex') !!} :
                                </div>
                                <div class="col-xs-6 ">
                                    {!! trans('horse.sex.'.$horse->sex )!!}
                                </div>
                            </div>
                            <div class="row text-left  ">
                                <div class="col-xs-6 ">
                                    {!! trans('horse.attrib.color') !!}:
                                </div>
                                <div class="col-xs-6 ">
                                    {!! trans('horse.color.'.$horse->color) !!}
                                </div>
                            </div>
                            @if(!empty($horse->getStud() ))
                                @if($horse->getStud() !='')
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('horse.text.stud') !!}:
                                        </div>
                                        <div class="col-xs-6 ">
                                            {!! $horse->getStud() !!}
                                        </div>
                                    </div>
                                @endif
                            @endif
                            <div class="row text-left  ">
                                <div class="col-xs-6 ">
                                    {!! trans('portal.doma') !!}:
                                </div>
                                <div class="col-xs-6 ">
                                    @if($horse->getDoma() != 1 )
                                        {!! trans('horse.doma.0' )!!}
                                    @else
                                        {!! trans('horse.doma.'.$horse->doma )!!}
                                    @endif

                                </div>
                            </div>
                            @if(!empty($horse->getGenealogia()))
                                <div class="row text-left  ">
                                    <div class="col-xs-6 ">
                                        {{trans('horse.text.genealogia')}}:
                                    </div>
                                    <div class="col-xs-6 ">
                                        <a href="{!! url($horse->getGenealogia()) !!}" target="_blank">
                                            {!! trans('tema1.ficha') !!}
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($horse->tocubri))
                                <div class="row text-left  ">
                                    <div class="col-xs-6 ">
                                        {!! trans('horse.text.cubricion') !!}:
                                    </div>
                                    <div class="col-xs-6 ">
                                                    <span class="mone no-color"

                                                            @include('backend.common.toolmoneda',['horse'=>$horse,'c'=>1])
                                                    >
                                                        {!!  $horse->ObtenPrecioCubricionMonedaMill() !!}
                                                        <span class="coinl coinl-local">
                        {!! $horse->getSimboloMoneda() !!}
                    </span>
                                                        {{--
                                                {!!Funciones::AjustarNumeroMil($horse->getCubriPrice())   !!}
                                                        <i class="fa fa-eur"></i>
                                                        --}}
                                            </span>
                                    </div>
                                </div>
                            @endif
                            @if($horse->getTosold() == true)
                                <div class="row text-left  ">
                                    <div class="col-xs-6 ">
                                        {!! trans('portal.price') !!}:</p>
                                    </div>
                                    <div class="col-xs-6 ">
                                        @if( $horse->sold == 1)
                                            {!! trans('users.sold') !!}
                                        @else
                                            @if(empty($horse->getPrice()))
                                                <span class="consulta no-color">
                                                    {!! trans('users.pricecheck') !!}
                                                </span>
                                            @else
                                                <span class="mone no-color"

                                                        @include('backend.common.toolmoneda',['horse'=>$horse,'p'=>1])
                                                >
                                                    {!! $horse->ObtenPrecioMonedaMill() !!}
                                                    <span class="coinl coinl-local">
                        {!! $horse->getSimboloMoneda() !!}
                    </span>
                                                    {{--{!! Funciones::AjustarNumeroMil($horse->getPrice()) !!}
                                                <i class="fa fa-eur"></i>--}}
                                                    </span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="clearfix"></div>


                            <div class="col-md-12 col-xs-12  text-center">
                                <button type="button" class="btn btn-default m-top-20" data-toggle="modal"
                                        data-target=".price-quote">
                                    {!! trans('portal.emailcontact') !!}
                                </button>
                                {{--
                                <a href="#!" onclick="mostrarrecomendar('.price-quote')"
                                   class="btn btn-default m-top-20">
                                    Contacte por mail

                                </a>
                                <a href="#!" onclick="mostrarrecomendar('.price-quote')"
                                   class="btn btn-default m-top-20">
                                    Contacte por mail

                                </a>
                                --}}
                            </div>
                            <div class="col-xs-12  m-top-20">
                                <div class=" col-xs-3 m-w-100">
                                    <figure>
                                        <img src="{!! $horse->getYeguada()->getLogo() !!}"
                                             alt="{!! $horse->getYeguada()->getName() !!}" class="img-responsive">
                                    </figure>
                                </div>
                                <div class="col-xs-9 ">
                                    <div class="col-xs-12 text-tittle">
                                        <a class="hover-color" href="#">
                                            {!! $horse->getStudName() !!}
                                        </a>
                                    </div>
                                    @if(!empty($stud->getAddress()))
                                        <div class="m-top-10 col-xs-12 fix-text-200">
                                            {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}
                                            , {!! $stud->getStateModel()->name!!}
                                            , {!! $stud->getCountryModel()->name !!}
                                            {{--{!! trans('portal.pubdate',['date'=>Funciones::AjustarFechaDmy($horse->created_at)]) !!}--}}
                                        </div>
                                    @endif

                                    @php($cd = 0)
                                    @foreach($stud->getPhoneModel() as $k=> $v)
                                        @if($v->isNull() !== true)
                                            @if($cd == 0)
                                                <div class="m-top-10 col-xs-12 fix-text-200">
                                                    <a href="tel:{!! $v->getFormatNumberOnly() !!}"
                                                       class="no-color">
                                                        <span class="no-color"> {!! $v->FormatNumber() !!} </span>
                                                    </a></div> @php($cd = 1) @endif @endif @endforeach


                                </div>
                            </div>


                        </div>
                        <div class="clearfix"></div>
                        <div class="m_details_content m-top-20  m-bottom-40 hidden-sm hidden-xs">
                            <hr/>
                            <p>
                                {!! $horse->getDescripcion() !!}
                            </p>
                        </div>
                        <div class="col-xs-12">


                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-top-40">
                        <div class="m_details_content m-bottom-40 visible-sm visible-xs">
                            <hr/>
                            <p>
                                {!! $horse->getDescripcion() !!}
                            </p>

                        </div>
                    </div><!-- End off row -->
                </div> <!-- End off container -->
            </div>
        </div>
    </section> <!-- End off Model Details Section -->




    <!--Gallery Section-->
    <section id="gallery" class="gallery margin-top-120 bg-grey">
        <!-- Gallery container-->
        <div class="container">
            <div class="row">
                <div class="main-gallery roomy-80">
                    <!--div class="col-md-12 m-bottom-70">
                        <div class="head_title text-left sm-text-center wow fadeInDown">
                            <h2>Recent Works</h2>
                            <h5><em>Some our recent works is here. Discover them now!</em></h5>
                            <div class="separator_left"></div>
                        </div>
                    </div-->


                    <div class="clearfix"></div>

                    <div class="grid text-center hoddem">
                        @for($i=1;$i<count($fotos);$i++)
                            @php($t = $fotos[$i])
                            <div class="grid-item">
                                <a href="@if(!empty($t)){!! $t->getUrl() !!}@endif" class="popup-img">
                                    <img lsrc="@if(!empty($t)){!! $t->getUrl() !!}@endif"
                                         alt="{!! $horse->getAltText() !!}" class="hidden  lazy">
                                </a>
                            </div><!-- End off grid item -->
                        @endfor
                        @if(count($horse->getVideosModel()) !=0 )
                            @foreach($horse->getVideosModel() as $k=>$v)
                                @include('frontend.landing.v1.partials.videopill')
                            @endforeach
                        @endif

                    </div>

                    <div class="clearfix"></div>

                </div>
            </div>
        </div><!-- Portfolio container end -->
    </section><!-- End off portfolio section -->

@endsection
@section ('js')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a28c20e7932ab9f"></script>
    <script>

    </script>
@endsection
@section('modal')
    @include('frontend.landing.v1.modal.contacto',['horse'=>$horse])
    @include('portal.Modal.email',['horse'=>$horse])
@endsection
