@php($animacionslick='
data-animation-in="bounceInLeft"

')
@php($animacionslick1='
data-animation-in="flipInX"
')

@php
    $razas = $stud->Horses()->select('raza', DB::raw('count(*) as total'))->groupby('raza')->get()->toArray();
      $colores =  $stud->Horses()->select('color', DB::raw('count(*) as total'))->groupby('color')->get()->toArray();
      $colorcoorp = $stud->getColor();
      $lang = \Session::get('lang');
      if (empty($lang)) {
          $lang = 'es';
          \Session::set('lang', $lang);
          \Session::set('applocale', $lang);
      }
      App::setLocale($lang);

      $favicon = url('assets/img/logo1.ico');
      if (!empty($stud)) {
          if (!empty($stud->getFav())) {
              $favicon = $stud->getFavUrl();
          }
      }
       $Coins = \Session::get('moneda');
      $css = null;
      $Coins = empty($Coins)?'USD':$Coins;
      $sexos = Horse::where(['studs_id' => $stud->id])->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();
 $error = (!empty(\Session::get('flash_message')))?\Session::get('flash_message'):null;
            if(!empty($error)){
            if(is_array($error)){
            //dd($error);
            if(isset($error['sms'])){
            $sms = $error['sms'];
            }else{
            $sms = null;
            }


            if(isset($error['error'])){
            $error = $error['error'];
            }else{
            $error = null;
            }


            }

            }
@endphp
        <!doctype html>
<html lang="{!! $lang !!}">
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>{!! $horse->getName() !!} | {!! $stud->getName() !!}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">

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

    <link rel="icon" type="image/png" href="{!! $stud->getLogo() !!}">
    <link rel="stylesheet" href="{!! url('assets/tooltip/css/tooltipster.bundle.min.css') !!}">
    <!-- Styles -->
    <link rel='stylesheet' href='{!! url('theme/w/css/bootstrap.min.css') !!}'>
    <link rel='stylesheet' href='{!! url('theme/w/css/animate.min.css') !!}'>
    <link rel='stylesheet' href="{!! url('theme/w/css/font-awesome.min.css') !!}"/>
    <link rel='stylesheet' href="{!! url('theme/w/css/style.css') !!}"/>
    <link rel="stylesheet" type="text/css" href="{!! url('theme/w/slick/slick.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/w/slick/slick-theme.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/w/css/horses.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/w/social/jssocials.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/w/social/jssocials-theme-minima.css') !!}">
    <link rel="stylesheet" href="{!! url('portal_/css/animate.min.css')!!}" type="text/css">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800' rel='stylesheet'
          type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon -->
    @include('adsence')
    @if(!empty($stud->getGa()))
    <!-- Google Analytics -->

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', '{!! $stud->getGa() !!}', 'auto');
            ga('send', 'pageview');

        </script>
        <!-- End Google Analytics -->
    @endif
    @include('zopin')
    <link rel="stylesheet" href="{!! url('css/flags.css') !!}" type="text/css">
    <link rel="shortcut icon" href="#">

    <link href='{!! route('CssTheme2',['slug'=>$stud->slug]) !!}' rel='stylesheet' type='text/css'>

</head>
<body>
@include('frontend.landing.v2.partials.social')
@include('frontend.landing.studs.partials.messenger')
<!-- Begin Hero Bg -->

<!-- End Hero Bg
	================================================== -->
<!-- Start Header
	================================================== -->
@include('frontend.landing.v2.partials.navbar',['trabajo'=>true])
@include('frontend.landing.v2.partials.slider',['horsew'=>$horse])


@php
    $f = (count($fotos)!=0)?$fotos[0]:null;
    $edad = $horse->getAge();
    $mes = $horse->getAgeMonth();
    $sold = ($horse->sold == 1) ?'sold':'';
    $fbs = Funciones::CompartirFacebook($horse->getName(),Request::fullUrl());
    $tws = Funciones::CompartirTwitter($horse->getName(),Request::fullUrl());
    $Gs = Funciones::CompartirGoogle(Request::fullUrl());
    $Ptr = Funciones::CompartirPinterest($horse->getName(),Request::fullUrl());
    $print = route('VersionImpresa',['ids'=>$horse->slug]);

@endphp

{{--@include('frontend.landing.v1.partials.baner',['texto'=>$horse->getName(),'clase'=>'about-banner'])--}}

<!--Model Details Section-->
<section id="about" class="parallax section">
    <div class="wrapsection">
        <div class="parallax-overlay"></div>
        <div class="container">
            <div class="row">
                <div class=" col-xs-offset-3 col-xs-6 ">
                    @include('flash::message')
                </div>
                <div class="main_about text-center">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="item active about_item ">
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 p-top-40">
                                <div class="col-xs-12 m_details_img corte corte-440 text-center">
                                    <figure class="figure-center  center-block text-center">
                                        <a href="@if($f!=''){!! $f->getUrl() !!}@endif" class="popup-img">
                                            <img lsrc="@if($f!=''){!! $f->getUrl() !!}@endif"
                                                 class="{!! $sold !!} img-responsive  center-block "
                                                 alt="{!! $horse->getAltText() !!}">
                                        </a>


                                    </figure>
                                    @if($horse->sold == 1)
                                        <div class="sold sold-n sold-b"></div>
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-xs-12 m-top-20 text-right pull-right">


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
                                           class="btn btn-twitter sharedbtn p-r-8">
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
                                        <a href="#!" class="btn btn-print sharedbtn" rel="nofollow"
                                           onclick="window.open('{!! $print !!}', '{!! $horse->getName() !!}', 'width=700,height=600,top=100,left=100,resizable,scrollbars');">
                                            <i class="fa fa-print"> </i>
                                        </a>
                                    </div>
                                    <div class="col-xs-2" data-target=".report-mail" data-toggle="modal">
                                        {{--<div class="addthis_inline_share_toolbox"></div>--}}
                                        <i class="fa fa-envelope">
                                        </i>
                                        {{--<span class="hidetext">{!! trans('portal.watchlist') !!}</span>--}}

                                    </div>


                                </div>

                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 p-top-40">
                                <div class="margin-top-120"></div>
                                <h2>
                                    <div class="col-xs-12 text-center">
                                        {!! $horse->getName() !!}
                                    </div>


                                </h2>
                                <div class="clearfix"></div>
                                <div class="person_details m-top-20 ">
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
                                            <div class="col-xs-6">
                                                    <span @include('backend.common.toolmoneda',['horse'=>$horse,'c'=>1,'class'=>'mone no-color'])>

                                                             {!! $horse->ObtenPrecioCubricionMonedaMill() !!}
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
                                                        <span
                                                                @include('backend.common.toolmoneda',['horse'=>$horse,'c'=>1,'class'=>'mone no-color'])
                                                        >
                                                             {!! $horse->ObtenPrecioMonedaMill() !!}
                                                            <span class="coinl coinl-local">
                        {!! $horse->getSimboloMoneda() !!}
                    </span>
                                                            {{--
                                                        {!! Funciones::AjustarNumeroMil($horse->getPrice()) !!}
                                                            <i class="fa fa-eur"></i>
                                                            --}}
                                                    </span>

                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    <div class="clearfix"></div>
                                    {{--
                                <div class="col-md-12 col-xs-12  text-center">
                                    <button type="button" class="btn m-top-20 btn-special-black"
                                            data-toggle="modal"
                                            data-target=".price-quote">
                                        {!! trans('portal.emailcontact') !!}
                                    </button>
                                </div>
                                    --}}
                                    <div class="col-xs-12  m-top-20 text-left">
                                        <div class=" col-xs-3 m-w-100">
                                            <figure>
                                                <img src="{!! $horse->getYeguada()->getLogo() !!}"
                                                     alt="{!! $horse->getYeguada()->getName() !!}"
                                                     class="img-responsive">
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
                                            <div class="m-top-10 col-xs-12 fix-text-200">

                                                <span class="no-color"> {!! $stud->getEmail() !!} </span>

                                            </div>
                                            @php($cd = 0)
                                            @foreach($stud->getPhoneModel() as $k=> $v)
                                                @if($v->isNull() !== true)
                                                    @if($cd == 0)
                                                        <div class="m-top-10 col-xs-12 fix-text-200">
                                                            <a href="tel:{!! $v->getFormatNumberOnly() !!}"
                                                               class="no-color">
                                                                <span class="no-color"> {!! $v->FormatNumber() !!} </span>
                                                            </a></div>
                                                        @php($cd = 1)
                                                    @endif
                                                @endif
                                            @endforeach


                                        </div>


                                    </div>


                                </div>
                                <div class="col-xs-12 row text-center m-top-20">

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
                        </div>

                    </div> <!-- End off container -->
                </div> <!-- End off container -->
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="m_details_content m-bottom-40 hidden-sm hidden-xs text-left">
                        <hr/>
                        <p>
                            {!! $horse->getDescripcion() !!}
                        </p>
                    </div>
                    <div class="col-xs-12"></div>
                    {{--
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-top-40">
                            <div class="m_details_content m-bottom-40 visible-sm visible-xs">
                                <hr/>
                                <p>
                                    {!! $horse->getDescripcion() !!}
                                </p>

                            </div>
                        </div><!-- End off row -->--}}
                </div>
            </div>
        </div>
    </div>

</section> <!-- End off Model Details Section -->

<section id="slider" class="parallax section bg6">
    <div class="wrapsection">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="maintitle">
                        <h3 class="section-title texto-shadow ">
                            {!! trans('stud.image') !!}
                        </h3>
                        <p class="lead texto-shadow ">
                            {{-- conoce un poco mas de nosotros --}}
                        </p>
                    </div>
                    {{--
                    <p class="lead text-center texto-shadow " style="height: 250px; padding-top: 120px;">
                        {!! trans('tema2.sms2') !!}
                    </p>
                    --}}

                </div>
            </div>
        </div>
    </div>
</section>
<section class="section bg-w">
    <div class="wrapsection">
        <div class="container">
            <div class="row" id="fotos">
                {{--
                <div class="section-title text-center videos p-b-20">
                    {!! trans('tema2.videofotos') !!}
                </div>
                --}}
                <div class="clearfix"></div>
                @php($fotos = $horse->getPhotoModel())
                @if(count($fotos)!=0)
                    <div class="row" id="fotos">
                        {{--
                        <div class="section-title text-center col-md-12">
                            {!! trans('stud.image') !!}
                        </div>
                        --}}
                        <div class="clearfix"></div>
                        <div class="col-xs-offset-1 col-xs-10 m-top-20">
                            <div class="grids text-center hidden ">
                                @for($i=1;$i<count($fotos);$i++)
                                    @php($t = $fotos[$i])
                                    <div class="grids-item ">
                                        <a href="@if(!empty($t)){!! $t->getUrl() !!}@endif" class="popup-img">
                                            <img lsrc="@if(!empty($t)){!! $t->getUrl() !!}@endif"
                                                 alt="{!! $horse->getAltText() !!}">
                                        </a>
                                    </div><!-- End off grid item -->
                                @endfor
                            </div>
                        </div>
                        {{--
                        <div class="cab-carousel col-xs-10 col-sm-12 col-md-12 m-top-20 hidden">
                            @foreach($stud->getPhotosModel()  as $k=>$v)
                                <div class="col-xs-12 text-center">
                                    <a href="{!! $v['url'] !!}" class="popup-img">
                                        <figure class="figure-fix2">
                                            <img lsrc="{!!$v['url'] !!}" alt="{!! $stud->getName()  !!} ">
                                        </figure>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        --}}
                    </div>
                @endif
                <div class="clearfix"></div>

                @if(count($horse->getVideosModel())!=0)
                    <div class="row" id="videos">
                        <div class="section-title text-center videos">
                            {!! trans('stud.video') !!}
                        </div>
                        <div class="col-xs-offset-1 col-xs-10 m-auto">
                            <div class="gal-videos row">
                                @foreach($horse->getVideosModel() as $k=>$v)
                                    <div class="col-md-3 col-sm-5 col-xs-12 trg">
                                        <a href="{!! $v->getNormalVideoYoutube() !!}" class="popup-youtube">

                                            <img lsrc="{!! $v->getYoutubeThumb() !!}"
                                                 {!! $animacionslick1 !!}
                                                 alt="{!! $horse->getAltText() !!}">
                                            <span class="fa fa-youtube-play" {!! $animacionslick1 !!}> </span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>
<!--Gallery Section-->


@include('frontend.landing.v1.modal.contacto',['horse'=>$horse])
@include('portal.Modal.email',['horse'=>$horse])
<section class="whitecolor parallax section bg7">
    <div class="wrapsection">
        <div class="container">
            <div class="row">
                <div class="col-md-12 sol-sm-12">
                    <div class="maintitle">
                        {{--
                        <h3 class="section-title justtitle texto-shadow ">
                            {!! trans('tema2.sms3titulo') !!}
                        </h3>
                        <p class="lead bottom0 texto-shadow ">
                            {!! trans('tema2.sms3') !!}
                        </p>
--}}
                        <h3 class="section-title texto-shadow ">
                            {!! trans('stud.contact') !!}
                        </h3>
                        <p class="lead texto-shadow ">

                            {{--ara cualquier consulta póngase en contacto con nosotros, estaremos encantados de atenderle. Gracias por su interés.--}}
                            {{--'contactsmshorse'=>'Si quieres saber mas sobre ":name", no dudes en contactarnos',--}}
                            {!! trans('tema2.contactsmshorse',['name'=>$horse->getName()]) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contactarea" class="parallax section" style="background-image: url({!! url('theme/w/img/madera-.jpg')!!});
        background-repeat: repeat-y;">
    <div class="wrapsection">
        <div class="parallax-overlay" style="background-color: black;opacity:0.1;"></div>
        <div class="container">
            <div class="row">
                @include('frontend.landing.v2.partials.contact',['caballo'=>$horse])
            </div>
            @include('frontend.landing.v2.partials.info')
        </div>
    </div>
</section>
<div class="scrollup" style="display: block;"><a href="#"><i class="fa fa-chevron-up"></i></a></div>
@include('frontend.landing.v2.partials.footer')

<script src="{!! url('theme/w/js/jquery.min.js') !!}"></script>
<script src="{!! url('theme/w/js/bootstrap.min.js') !!}"></script>
<script src="{!! url('theme/w/js/waypoints.min.js') !!}"></script>
<script src="{!! url('theme/w/js/jquery.scrollTo.min.js') !!}"></script>
<script src="{!! url('theme/w/js/jquery.localScroll.min.js') !!}"></script>
<script src="{!! url('theme/w/js/jquery.magnific-popup.min.js') !!}"></script>
<script src="{!! url('theme/w/slick/slick.min.js') !!}"></script>
<script src="{!! url('theme/w/js/slick-animate.js') !!}"></script>
<script src="{!! url('theme/w/js/validate.js') !!}"></script>
<script src="{!! url('theme/w/js/common.js') !!}"></script>
<script src="{!! url('theme/w/js/vjquery.js') !!}"></script>
<script src="{!! url('theme/w/js/isotope.min.js') !!}"></script>
<script src="{!! url('theme/w/social/jssocials.min.js') !!}"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a28c20e7932ab9f"></script>

<script src="{!!route('JsTheme2',['slug'=>$stud->slug]) !!}"></script>
<script src="{!! url('assets/tooltip/js/tooltipster.bundle.min.js') !!}"></script>
@include('attribmoneda')
</body>
</html>
