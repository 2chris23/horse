@php($animacionslick='
data-animation-in="flipInX"

')
@php($animacionslick1='
data-animation-in="flipInX"
')
{{--
data-animation-out="bounceOutRight"
data-delay-out="5"
data-duration-in="2"
data-duration-out="2"
'--}}
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
    <title>{!! $stud->getName() !!}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    @include('meta',
[
'titulo' =>  $stud->getName() ,
'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
'logo'=>$stud->getLogo(),
'imagenes' =>$stud->getPhotosModel(),
])
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

</head>
<body>
@include('frontend.landing.v2.partials.social')
@include('frontend.landing.studs.partials.messenger')
<!-- Begin Hero Bg -->

<!-- End Hero Bg
	================================================== -->
<!-- Start Header
	================================================== -->
@include('frontend.landing.v2.partials.navbar')
@include('frontend.landing.v2.partials.slider')


<!-- Intro
	================================================== -->

<!-- About
	================================================== -->

<section id="about" class="parallax section"
         style="background-image: url({!! url('theme/w/img/1.jpg')!!});">
    <div class="wrapsection">
        <div class="parallax-overlay"></div>
        <div class="container">
            <div class="row">
                <div class=" col-xs-offset-3 col-xs-6 ">
                    @include('flash::message')
                </div>
                <div class="main_about text-center">
                    <div class="item active about_item">
                        <div class="col-sm-10 col-sm-offset-1">

                            <div class="test_authour">
                                <img class="img-circle tam-img-150" lsrc="{!! $stud->getLogo() !!}" alt=""/>
                                <h2>{!! trans('portal.welcometo') !!}{!! $stud->getName() !!}</h2>
                                {{--
                                <h5><em>La yeguada Juan Vázquez lleva más de una década dedicada exclusivamente a la
                                        cría, selección y entrenamiento de caballos españoles. Su máxima es cría
                                        caballos españoles de alto nivel que sirvan para el deporte.</em></h5>
                                --}}
                                <div class="separator_auto"></div>
                            </div>


                            <div class="about_content wow fadeIn m-top-40 text-justify">
                                {{-- <p>No cabe duda de que los caballos españoles son aptos para el deporte. Sólo hay que
                                     ver los resultados que muchos de ellos han obtenido en diferentes disciplinas en
                                     numerosas competiciones, campeonatos del mundo, mundiales, olimpiadas para darse
                                     cuenta de que tienen algo especial. Algo que les hace diferentes, que no se
                                     encuentran en los caballos denominados warmblood, algo que cautiva a jinetes,
                                     espectadores y amantes de los animales.</p>
                                 <p>Estos caballos son únicos, y por eso se merecen todo el cuidado y dedicación de
                                     aquellos que tienen la suerte de poder criarlos y entrenarlos para llegar en un
                                     futuro a la alta competición.</p>
                                 <p>La yeguada Juan Vázquez es consciente del potencial de estos caballos y por eso desde
                                     el minuto uno no dudó en que su cría estaría enfocada hacia el deporte, huyendo, por
                                     tanto, de todas esas modas que se guían únicamente por el color y la belleza.</p>
                                 <p>Pero no por criar caballos de deporte se ha dejado de lado la morfología, el
                                     carácter, el ‟ duende” que atesoran estos caballos. Creemos en el caballo
                                     completo.</p>--}}
                                {!! $stud->getDescription() !!}
                                {{--}}
                                <button class="mas">Leer más...</button>
                                <p class="mov hidden">Desde nuestros inicios hemos seleccionado nuestras yeguas y
                                    sementales con los mismos parámetros que se seleccionan los caballos en las
                                    asociaciones más exitosas de Europa. Para ello buscamos yeguas con buena altura,
                                    belleza y movimientos, “si no se mueven y no son atléticas no sirven”, al igual que
                                    los sementales que han competido y siguen compitiendo en concursos de alto nivel en
                                    doma clásica.</p>
                                <p class="mov hidden">A día de hoy podemos estar orgullosos de decir que todos nuestros
                                    ejemplares cumplen con unos mínimos requisitos que los hacen aptos para el deporte.
                                    Esperamos que a través de nuestra página web vea nuestros caballos y se decida a
                                    venir a visitarlos. En nuestra yeguada estaremos encantados de ofrecerle lo que
                                    necesite, asesorarlo en la compra, gestión o entrenamiento de su caballo. En
                                    definitiva, aprovéchese de nuestra experiencia y trabajo, obtenga garantías y
                                    resultados.</p>
                                <button class="menos hidden">Leer menos.</button>
                                --}}
                            </div>
                            @php($v = $user->getVideo())
                            @if(!empty($v))
                                @if(!empty($v->getUrl()))
                                    <div class="col-xs-12 p-b-50">
                                        <a href="{!! $v->getNormalVideoYoutube() !!}" class="popup-youtube">
                                            <span class="fa fa-youtube-play"> </span>
                                            <img lsrc="{!! $v->getYoutubeThumb() !!}"
                                                 alt="{!! $stud->getName()  !!}  {!! $v->getName() !!}">
                                        </a>
                                    </div>
                                @endif
                            @endif


                            {{--<div>
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/hgfRtadv9k8?rel=0"
                                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen
                                        class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8"></iframe>
                            </div>--}}

                        </div>


                    </div>

                </div>
                @php($fotos = $stud->getInstalationsGallery())
                @if(count($fotos)!=0)
                    <div class="col-md-offset-1 col-md-10 col-xs-12">
                        <div class="carousel-inner  col-xs-12 m-top-40 hidden ">
                            @foreach($fotos  as $k=>$v)
                                <div class="col-lg-3 col-xs-12 text-center corte">
                                    <a href="#" onclick="$('#real_{!! $k !!}').click()"
                                            {!! $animacionslick !!}
                                    >
                                        <img lsrc="{!!$v['url'] !!}" alt="{!! $stud->getName()  !!} "
                                             {!! $animacionslick !!}
                                             class="img-responsive">
                                        {{--<figure class="figure-fix2">
                                        </figure>--}}
                                    </a>
                                </div>

                            @endforeach

                        </div>
                    </div>
                    <div class="hidden">
                        @foreach($fotos as $k=>$v)
                            <a id='real_{!! $k !!}' href="{!! $v['url'] !!}" class="popup-img">
                                <img lsrc="{!!$v['url'] !!}" alt="{!! $stud->getName()  !!} " class="img-responsive">
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Random ================================================== -->
<section class="parallax section bg5">
    <div class="wrapsection">
        <div class="parallax-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 sol-sm-12">
                    <div class="maintitle">
                        <h3 class="section-title justtitle">
                            {!! trans('stud.ouranimal') !!}

                        </h3>
                        <p class="lead bottom0 wow bounceInUp">
                            {!! trans('tema2.ouranimaltext') !!}

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Gallery
	================================================== -->
@php($horses=isset($horses)?$horses:$data['horses'])
<section id="gallery" class="parallax section"
         style="background-image: url({!! url('theme/w/img/madera-.jpg')!!});background-repeat: repeat-y;">
    <div class="wrapsection">
        <div class="parallax-overlay"><!-- style="background-color:#00c1c1;opacity:0.9;"--></div>
        <div class="container">
            <div class="row">
                <!--div class="col-md-12 col-sm-12">
                    <div class="maintitle">
                        <h3 class="section-title">Nuestros Caballos</h3>
                        <p class="lead wow flipInX">
                            Podrás encontrar todos nuestros caballos en esta sección... 
                        </p>
                    </div>
                </div-->
                <div class="main-gallery">
                    @if(count($horses)!=0)

                        <div class="col-md-12 m-bottom-60">
                            <div class="filtros sm-text-center">


                                <button class="button  buttom-filter  {!! trans('portal.allra') !!} is-checked"
                                        data-filter=".{!! trans('portal.allra') !!}"> {!! trans('portal.allra') !!}</button>
                                @foreach($sexos as $k=>$v)
                                    @php($ls = strtolower(trans('horse.sexs.'.$v['sex']) ))
                                    <button class="button buttom-filter {!! trans('horse.sexs.'.$v['sex']) !!}"
                                            id="{!! trans('horse.sexs.'.$v['sex']) !!}"
                                            data-filter=".{!! $ls !!}">
                                        {!! trans('horse.sexs.'.$v['sex']) !!}
                                    </button>

                                @endforeach
                                <button class="button buttom-filter sold "
                                        data-filter=".sold"> {!! trans('horse.attrib.tosold') !!}</button>

                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="grid col-xs-12 text-center hidden">


                            @foreach($horses as $k=>$v)
                                @php
                                    $foto = $v->getPhotoFirstModel();
                                    if(!empty($foto)){
                                        $foto = $foto->getUrl();
                                    }else{
                                        $foto = '';
                                    }
                                    $edad = $v->getAge();
                                    $mes = $v->getAgeMonth();
                                    $sold = ($v->tosold == 1) ?'sold':'';
                                $ls = strtolower(trans('horse.sexs.'.$v['sex']) );
                                $an  = $animacionslick1;
                                $adn = " data-animation-in='zoomInUp' data-duration-in='2' ";
                                $an = '';
                                $adn = $an;
                                @endphp
                                <div class="{!! $ls !!}  {!! trans('portal.allra') !!} {!! $sold !!} hand m-top-20 col-md-3 col-xs-12 grid-item "
                                     data-type="{!! trans('horse.raza.'.$v->raza) !!} {!! trans('horse.sexs.'.$v->sex) !!}  {!! $sold !!} {!! trans('portal.allra') !!}"
                                     onclick="reloade('{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]) !!}')"
                                        {{--onclick="$('#horseman_{!! $v->slug !!}').click()"--}}>
                                    <div class="col-xs-12 media_img corte corte-240" {!! $an !!} >
                                        <figure class="figure-fix" {!! $an !!} >
                                            @if($foto !='')
                                                <img lsrc="{!! $foto !!}" alt="{!! $v->getAltText() !!}" class="">
                                            @endif
                                        </figure>
                                    </div>
                                    <div class="description col-xs-12"
                                            {{$adn}}
                                    >
                                        <span class="caption">{!! $v->getName() !!}
                                            <small>({!! trans('horse.raza.'.$v->raza) !!}, @if($edad!=0)
                                                    {!! trans('horse.years',['ano'=>$edad]) !!}
                                                @else
                                                    {!! trans('horse.mes',['mes'=>$mes]) !!}
                                                @endif )</small></span>
                                        <span class="camera">{!! trans('horse.sexicon.1') !!}</span>
                                        <div class="clearfix"></div>
                                    </div>
                                    <a id='horseman_{!! $v->slug !!}'
                                       href="{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]) !!}"> </a>
                                </div>
                            @endforeach

                        </div>
                    @else

                        <div class="maintitle texto-shadow">
                            <h3 class="section-title justtitle">

                            </h3>
                            <p class="lead bottom0 wow bounceInUp"
                               style="visibility: visible; animation-name: bounceInUp;">
                                {!! trans('portal.nohorse') !!}
                                {{--
                                            <a href="#contactarea"
                                               class="btn-contact coorp"
                                               @if(!empty($stud->getColor()))
                                               style="
                                                       color: {!! $stud->getColor() !!};
                                                       "
                                                    @endif
                                            >

                                                {!! trans('stud.contact') !!}
                                            </a>
                                            --}}
                            </p>
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Text Carousel ================================================== -->
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
                            {!! trans('stud.imagesub') !!}

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
{{--<!-- FAQ ================================================== -->--}}
@php($fotos = $stud->getPhotosModel())
@if(count($fotos)!=0 or count($stud->getVideosModel())!=0)
    <section class="section">
        <div class="wrapsection">
            <div class="container">
                @if(count($fotos)!=0)
                    <div class="row" id="fotos">
                        {{--
                        <div class="section-title text-center col-md-12">
                            {!! trans('stud.image') !!}
                        </div>
                        --}}
                        <div class="clearfix"></div>
                        <div class="col-xs-12 m-top-20"></div>
                        <div class="grids text-center hidden ">

                            @for($i=1;$i<count($fotos);$i++)
                                @php($t = $fotos[$i])
                                <div class="grids-item ">
                                    <a href="@if(!empty($t)){!! $t->getUrl() !!}@endif" class="popup-img">
                                        <img lsrc="@if(!empty($t)){!! $t->getUrl() !!}@endif"
                                             alt="{!! $stud->getName() !!}">
                                    </a>
                                </div><!-- End off grid item -->
                            @endfor
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
                @if(count($stud->getVideosModel())!=0)
                    <div class="row" id="videos">
                        <div class="section-title text-center videos">
                            {!! trans('stud.video') !!}
                        </div>
                        <div class="col-xs-offset-1 col-xs-10 m-auto">
                            <div class="gal-videos row animateslick hidden"
                                    {!! $animacionslick !!}
                            >
                                @foreach($stud->getVideosModel() as $k=>$v)
                                    <div class="col-md-3 col-sm-5 col-xs-12 trg "

                                    >
                                        <a href="{!! $v->getNormalVideoYoutube() !!}" class="popup-youtube"
                                        >


                                            <img lsrc="{!! $v->getYoutubeThumb() !!}"
                                                 {!! $animacionslick !!}
                                                 alt="{!! $stud->getName()  !!}  {!! $v->getName() !!}">
                                            <span class="fa fa-youtube-play"
                                                    {!! $animacionslick !!}
                                            > </span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
<!-- Random
	================================================== -->
{{--style="background-image: url({!! url('theme/w/img/hyc-1.jpg')!!});"--}}
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
<script src="{!! url('theme/w/social/jssocials.min.js') !!}"></script>
<script src="{!! url('theme/v/js/isotope.min.js') !!}"></script>


<script src="{!!route('JsTheme2',['slug'=>$stud->slug]) !!}"></script>
</body>
</html>

