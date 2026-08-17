@php
    $razas = $stud->Horses()->select('raza', DB::raw('count(*) as total'))->groupby('raza')->get()->toArray();
      $colores =  $stud->Horses()->select('color', DB::raw('count(*) as total'))->groupby('color')->get()->toArray();
      $colorcoorp = $stud->getColor();
      $lang = \Session::get('lang');
      if (empty($lang)) {
          $lang = 'es';
          \Session::put('lang', $lang);
          \Session::put('applocale', $lang);
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
    <style>
        .hola1{
            top:320px;
            left: 5%;
        }

        </style>
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

@php($f = (count($fotos)!=0)?$fotos[0]:null)
@php
    $edad = $horse->getAge();
    $mes = $horse->getAgeMonth();
    $sold = ($horse->sold == 1) ?'sold':'';
$fbs = Funciones::CompartirFacebook($horse->getName(),Request::fullUrl());
$tws = Funciones::CompartirTwitter($horse->getName(),Request::fullUrl());
$Gs = Funciones::CompartirGoogle(Request::fullUrl());
$Ptr = Funciones::CompartirPinterest($horse->getName(),Request::fullUrl());
@endphp

{{--@include('frontend.landing.v1.partials.baner',['texto'=>$horse->getName(),'clase'=>'about-banner'])--}}

<!--Model Details Section-->
<section id="about" class="parallax section" >
    <div class="wrapsection">
        <div class="parallax-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="main_about text-center">
                    <div class="item active about_item">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12 p-top-40">
                                <div class="col-xs-12 m_details_img ">
                                    <figure class="figure-center">
                                        <img lsrc="@if($f!=''){!! $f->getUrl() !!}@endif"
                                             alt="{!! $horse->getAltText() !!}"
                                             class="{!! $sold !!} img-responsive"/>
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
                                               class="btn btn-default m-top-20 btn-special">
                                                <i class="fa fa-long-arrow-left"></i>
                                                {!! trans('portal.back') !!}

                                            </a>
                                        @endif

                                    </div>
                                    <div class=" col-xs-12 col-md-4 text-center">
                                        <a href="{!! route('MyHorsesV1',['slug'=>$user->getMySlug()]) !!}"
                                           class="btn btn-default m-top-20 btn-special">
                                            {!! trans('users.return') !!}
                                        </a>
                                    </div>

                                    <div class=" col-xs-12 col-md-4 text-center ">
                                        @if(!empty($next))
                                            <a href="{!! $next !!}"
                                               class="btn btn-default m-top-20 btn-special">
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
                                    <div class="col-lg-5 col-md-5 col-xs-7 ">
                                        {!! $horse->getName() !!}
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-xs-5 ">
                                        <div class="col-xs-2 m-l-10">
                                            <a href="#!"
                                               onclick="window.open('{!! $fbs !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                                               class="btn btn-fb sharedbtn">
                                                <i class="fa fa-facebook">
                                                </i>
                                            </a>
                                        </div>
                                        <div class="col-xs-2 m-l-10 ">
                                            <a href="#!"
                                               onclick="window.open('{!! $tws !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                                               class="btn btn-twitter sharedbtn p-r-8">
                                                <i class="fa fa-twitter">
                                                </i>
                                            </a>
                                        </div>
                                        <div class="col-xs-2 m-l-10">
                                            <a href="#!"
                                               onclick="window.open('{!! $Gs !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                                               class="btn btn-gplus sharedbtn">
                                                <i class="fa fa-google-plus">
                                                </i>
                                            </a>
                                        </div>
                                        <div class="col-xs-2 m-l-10">
                                            <a href="#!"
                                               onclick="window.open('{!! $Ptr !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                                               class="btn btn-pinterest sharedbtn">
                                                <i class="fa fa-pinterest">
                                                </i>
                                            </a>
                                        </div>
                                        <div class="col-xs-2 m-l-10">
                                            <div class="addthis_inline_share_toolbox"></div>
                                        </div>
                                    </div>

                                </h2>
                                <div class="clearfix"></div>
                                <div class="person_details m-top-40 ">
                                    @if($horse->sold == 1)
                                        <div class="sold sold-n sold-s"></div>
                                    @endif
                                    <div class="row">
                                        <div class="col-xs-6 text-left  ">
                                            {!! trans('portal.raza') !!}:<br>
                                            {{--Fecha de Nacimiento:<br>--}}
                                            {!! trans('portal.age') !!}:<br>
                                            {!! trans('stud.text.raised') !!}:<br>
                                            {!! trans('portal.sex') !!} :<br>
                                            {!! trans('horse.attrib.color') !!}:<br>
                                            @if(!empty($horse->getStud() ))
                                                @if($horse->getStud() !='')
                                                    {!! trans('horse.text.stud') !!}:<br>

                                                @endif
                                            @endif
                                            @if(!empty($horse->getDoma()))
                                                {!! trans('portal.doma') !!}:<br>
                                            @endif
                                            {{--Yeguada:<br>--}}
                                            @if(!empty($horse->getGenealogia()))
                                                {{trans('horse.text.genealogia')}}:<br>
                                            @endif
                                            @if(!empty($horse->tocubri))
                                                {!! trans('horse.text.cubricion') !!}:<br>
                                            @endif
                                            @if($horse->getTosold() == true)
                                                {!! trans('portal.price') !!}:</p>
                                            @endif


                                        </div>
                                        <div class="col-xs-6 text-left ">
                                            {!! trans('horse.raza.'.$horse->raza) !!}<br>
                                            {{--{!! $horse->getBirthdate() !!}<br>--}}
                                            @if($edad!=0)
                                                {!! trans('horse.years',['ano'=>$edad]) !!}
                                            @else
                                                {!! trans('horse.mes',['mes'=>$mes]) !!}
                                            @endif<br>
                                            {!! $horse->getRaisedFormat() !!}<br>
                                            {!! trans('horse.sex.'.$horse->sex )!!}<br>
                                            {!! trans('horse.color.'.$horse->color) !!}<br>
                                            @if(!empty($horse->getStud() ))
                                                @if($horse->getStud() !='')
                                                    {!! $horse->getStud() !!}<br>

                                                @endif
                                            @endif
                                            @if(!empty($horse->getDoma()))
                                                @if(!empty($horse->getDoma()))
                                                    @if($horse->getDoma() == 1)
                                                        {!! trans('horse.doma.'.$horse->doma )!!} <br>
                                                    @endif
                                                @endif
                                            @endif
                                            {{--{!! $horse->getStud() !!}<br>--}}
                                            @if(!empty($horse->getGenealogia()))
                                                <a href="{!! url($horse->getGenealogia()) !!}" target="_blank">
                                                    {!! trans('tema1.ficha') !!}
                                                </a><br>
                                            @endif
                                            @if(!empty($horse->tocubri))
                                                <span class="mone no-color" @include('backend.common.toolmoneda',['precio'=>$horse->getCubriPrice()])>
                                                {!!Funciones::AjustarNumeroMil($horse->getCubriPrice())   !!}
                                                    <i class="fa fa-eur"></i>
                                            </span>
                                                <br>
                                            @endif
                                            @if($horse->getTosold() == true)
                                                @if( $horse->sold == 1)
                                                    {!! trans('users.sold') !!}
                                                @else
                                                    @if(empty($horse->getPrice()))
                                                        <span class="consulta no-color">
                                                    {!! trans('users.pricecheck') !!}
                                                </span>
                                                    @else
                                                        <span class="mone no-color" @include('backend.common.toolmoneda',['precio'=>$horse->getPrice()]) >
                                                        {!! Funciones::AjustarNumeroMil($horse->getPrice()) !!}
                                                            <i class="fa fa-eur"></i>
                                                    </span>
                                                    @endif
                                                @endif
                                            @endif

                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 col-xs-12  text-center">
                                            <button type="button" class="btn btn-default m-top-20 btn-special"
                                                    data-toggle="modal"
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
                                </div>


                            </div>
                        </div>

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
    </div>

</section> <!-- End off Model Details Section -->


<section class="section">
    <div class="wrapsection bg-w p-t-70 p-b-70">
        <div class="container">
                <div class="section-title text-center videos p-b-20">
                    {!! trans('tema2.videofotos') !!}
                </div>
                <div class="col-md-11 col-xs-10 m-top-20 m-auto">
                    <div class="gal-videos row">
                        @foreach($horse->getPhotoModel()  as $k=>$v)
                            <div class="col-md-3 col-sm-5 col-xs-12">
                                <a href="{!! $v['url'] !!}" class="popup-img">
                                        <img lsrc="{!!$v['url'] !!}" alt="{!! $horse->getAltText() !!}">
                                </a>
                            </div>
                        @endforeach
                        @if(count($horse->getVideosModel()) !=0 )
                            @foreach($horse->getVideosModel() as $k=>$v)
                                <div class="col-md-3 col-sm-5 col-xs-12">
                                    <a href="{!! $v->getNormalVideoYoutube() !!}" class="popup-youtube">
                                        <span class="fa fa-youtube-play"> </span>
                                        <img lsrc="{!! $v->getYoutubeThumb() !!}"
                                             alt="{!! $stud->getName()  !!}  {!! $v->getName() !!}">
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
        </div>
    </div>
</section>
<!--Gallery Section-->


@include('frontend.landing.v1.modal.contacto',['horse'=>$horse])
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
                            {!! trans('tema2.contactsms') !!}
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
                @include('frontend.landing.v2.partials.contact')
            </div>
            @include('frontend.landing.v2.partials.info')
        </div>
    </div>
</section>

@include('frontend.landing.v2.partials.footer')
<script src="{!! url('theme/w/js/jquery.min.js') !!}"></script>
<script src="{!! url('theme/w/js/bootstrap.min.js') !!}"></script>
<script src="{!! url('theme/w/js/waypoints.min.js') !!}"></script>
<script src="{!! url('theme/w/js/jquery.scrollTo.min.js') !!}"></script>
<script src="{!! url('theme/w/js/jquery.localScroll.min.js') !!}"></script>
<script src="{!! url('theme/w/js/jquery.magnific-popup.min.js') !!}"></script>
<script src="{!! url('theme/w/slick/slick.min.js') !!}"></script>
<script src="{!! url('theme/w/js/validate.js') !!}"></script>
<script src="{!! url('theme/w/js/common.js') !!}"></script>
<script src="{!! url('theme/w/js/vjquery.js') !!}"></script>
<script src="{!! url('theme/w/js/isotope.min.js') !!}"></script>
<script src="{!! url('theme/w/social/jssocials.min.js') !!}"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a28c20e7932ab9f"></script>

<script src="{!!route('JsTheme2',['slug'=>$stud->slug]) !!}"></script>
<script>
    $(window).on('load',function () {
        var w = $(window).width(), el = $('.flotante');

        var ws = ((35*w)/100);
        if (ws >  440){
            ws = 440;
        }
        //$('.hola1').css('top',ws+'px');
    }).resize(function () {
        var w = $(window).width(), el = $('.flotante');
        var ws = ((35*w)/100);
        if (ws >  440){
            ws = 440;
        }
        //$('.hola1').css('top',ws+'px');
    });
</script>
</body>
</html>

