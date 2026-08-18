@php
    $d7 = url('theme/w/img/hyc-1.jpg');
    $sliders = $stud->getSliders();
    $tmp = count($sliders);
    $st = [];
    $sd = [];
     $d = [];
        $d[0] = url('landing/images/slider/1/2.jpg');
        $d[1] = url('landing/images/slider/1/6.jpg');
        $d[2] = url('landing/images/slider/1/9.jpg');
        $d[3] = url('landing/images/slider/1/8.jpg');
        $st[0] = '';
        $st[1] = '';
        $st[2] = '';
        $st[3] = '';
        $sd[0] = '';
        $sd[1] = '';
        $sd[2] = '';
        $sd[3] = '';

        $d5 = $d[rand(0,3)];
        $d6 = $d[rand(0,3)];


@endphp
{{--Photo::Slider($stud->id)->first()--}}
{{-- @if(count($sliders)>1)--}}
@php

    if(!empty($sliders) and $stud->hasSlider() == true)
    {

            if($tmp == 1){

                $ts = $sliders[0];
                $d[0]= $ts->getUrl();//Probar con 1 imagen, puede dar fallo
                $st[0] = '';
                $sd[0] = '';
            }else{
                $d=[];
                foreach($sliders as $k=>$v){
                    $d[$k] = $v->getUrl();
                    $st[$k] =  $v->getTitulo1();
                    $sd[$k] =  $v->getTitulo2();
                }
                $d5 = $sliders[rand(0,count($sliders)-1)]->getUrl();
                $d6 = $sliders[rand(0,count($sliders)-1)]->getUrl();
            }

    }
@endphp

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="description"
          content="Se realizan actividades ecuestres tales como excursiones a caballo, clases para todos los niveles y edades, fiestas de cumpleaños, etc.">
    <meta name="keywords"
          content="Caballos, benidorm, pupilaje, boxes, excursiones a caballo, horses benidorm, montar, hipica, ecuestre, equitación, frisones, p.r.e, caballos españoles, yeguas, arabes, ">
    <title>{!! $stud->getName() !!}</title>

    <link href="http://fonts.googleapis.com/css?family=Enriqueta:400,700" rel="stylesheet" type="text/css">

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <link rel="shortcut icon" href="{!! url('theme/b/img/favicon.png') !!}" type="image/png">
    <meta name="viewport" content="initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{!! url('theme/w/slick/slick.css') !!}"/>
    <link rel="stylesheet" href="{!! url('theme/f/css/font-awesome.min.css') !!}">
    <link href='{!! route('CssTheme3',['slug'=>$stud->slug]) !!}' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{!! url('assets/tooltip/css/tooltipster.bundle.min.css') !!}">

</head>

<body class="bg-body">
<div id="fb-root"></div>

<div class="clearfix"></div>
<div class="container-fluid slide">
    <div class="row">
        <div class="col-12 row slider" style="height: 500px">
            @foreach($d as $k => $v)
                <div class="slider_overlay col-12" style="background-image: url({!! $d[$k] !!}); min-height: 500px;">
                    <div class="logo">
                        <img class="img-fluid img-responsive" src="{!! $stud->getLogo() !!}"
                             alt="{!! $stud->getName() !!}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="contenedor container  px-0">
    <div class="menu row justify-content-md-center align-items-center">
        <div class="col-md-1 p-0 h-100">
            <div class="seccion pt-4">
                <a rel="nofollow" href="{!! route('MyPage',['slug'=>$stud->slug]) !!}">
                    <div class=""><i class="fa fa-home fa-2x"></i></div>
                </a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="seccion col-md-2">
                    <a rel="nofollow"
                       href="{!! route('MyVideo',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.Tittle') !!}</a>
                </div>
                <div class="seccion col-md-2">
                    <a rel="nofollow"
                       href="{!! route('MyInstalation',['slug'=>$user->getMySlug()]) !!}"> {!! trans('stud.horses') !!}</a>
                </div>
                <div class="seccion col-md-2">
                    <a rel="nofollow"
                       href="{!! route('MySell',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.sell') !!}</a>
                </div>
                <div class="seccion col-md-2">
                    <a rel="nofollow"
                       href="{!! route('MyGallery',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.photos') !!}</a>
                </div>
                <div class="seccion col-md-2">
                    <a rel="nofollow"
                       href="{!! route('MyHorsesV1',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.video') !!}</a>
                </div>
                <div class="seccion col-md-2" data-target="#modalcontact" data-toggle="modal"
                >
                    <a rel="nofollow" href="#">{!! trans('stud.contact') !!}</a>
                </div>
            </div>
        </div>
        <div class="col-md-1 p-0 h-100">
            <div class="seccion pt-4">
                <a rel="nofollow" href="{!! route('MyPage',['slug'=>$stud->slug]) !!}">
                    <div class=""><i class="fa fa-flag fa-2x"></i></div>
                </a>
            </div>
        </div>
    </div>

    otro menu..

    <nav class="navbar navbar-expand-md bg-madera container-fluid menubar text-uppercase">
        <a rel="nofollow" href="{!! route('MyPage',['slug'=>$stud->slug]) !!}" class="d-block d-md-none">
            <div class=""><i class="fa fa-home fa-2x"></i></div>
        </a>
        <a rel="nofollow" href="{!! route('MyPage',['slug'=>$stud->slug]) !!}" class="d-block d-md-none">
            <div class=""><i class="fa fa-flag fa-2x"></i></div>
        </a>
        <button class="navbar-toggler bg-madera bars" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div><i class="fa fa-bars fa-2x"></i></div>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a rel="nofollow" class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a rel="nofollow" class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a rel="nofollow" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a rel="nofollow" class="dropdown-item" href="#">Action</a>
                        <a rel="nofollow" class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a rel="nofollow" class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a rel="nofollow" class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>


    <div class="clearfix"></div>
    <div class="contenido container">

        @yield('content')


        <div class="franjaRoja"></div>
    </div>
</div>

<div class="modal fade" id="modalcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-madera">
                <h5 class="modal-title" id="exampleModalLongTitle">{!! trans('stud.contact') !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10">
                            <form class="text-left " id="contact" name="contact"
                                  action="{!! route('contacto.accion') !!}" method="post">
                                <input type="hidden" value="{!! csrf_token() !!}" id="_token" name="_token">
                                <input type="hidden" value="{!! $stud->id !!}" id="stud" name="stud">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-4 wow fadeIn animated animated" data-wow-delay="0.1s"
                                             data-wow-duration="2s">
                                            <label for="name"
                                                   class="texto-shadow pb-2">{!! trans('stud.namecontact') !!}
                                                <span class="required">*</span>
                                            </label>
                                            <input name="name" class="form-control" type="text" size="30"
                                                   placeholder="{!! trans('stud.namecontactplace') !!}" required>
                                        </div>
                                        <div class="col-md-4 wow fadeIn animated" data-wow-delay="0.3s"
                                             data-wow-duration="2s">
                                            <label for="email"
                                                   class="texto-shadow pb-2">{!! trans('stud.emailcontact') !!}
                                                <span class="required">*</span>
                                            </label>
                                            <input name="email" class="form-control" type="text" size="30" required
                                                   placeholder="{!! trans('stud.emailcontactplace') !!}">
                                        </div>
                                        <div class="col-md-4 wow fadeIn animated" data-wow-delay="0.3s"
                                             data-wow-duration="2s">
                                            <label for="phone"
                                                   class="texto-shadow pb-2">{!! trans('stud.phonecontact') !!}</label>
                                            <input name="phone" class="form-control numbers" type="tel" size="30"
                                                   placeholder="{!! trans('stud.phonecontactplace') !!}">
                                        </div>
                                    </div>
                                    <div class="wow fadeIn animated" data-wow-delay="0.3s" data-wow-duration="1.5"
                                         style="margin-top:15px;">
                                        <label for="message" class="texto-shadow pb-2">{!! trans('stud.smscontact') !!}
                                            <span class="required">*</span>
                                        </label>
                                        <textarea name="message" class="form-control" rows="6"
                                                  placeholder="{!! trans('stud.smscontactplace') !!}"
                                                  required></textarea>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center text-small pt-3">
                    {!! trans('tema1.whorwithus',['link'=>route('TrabajoIndex',['slug'=>$stud->slug])]) !!}
                </div>
                <div class="row mt-3 justify-content-around info">
                    <div class="col-md-4">
                        @if(!empty($stud->getAddress()))
                            <div class="mt-2 col-10 text-center mx-auto">
                                <i class="fa fa-map-marker mb-2"></i>
                                <br>
                                {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}
                                , {!! $stud->getStateModel()->name!!}, {!! $stud->getCountryModel()->name !!}
                            </div>
                        @endif
                    </div>
                    <br>
                    <div class="col-md-4">
                        @php($cd = 0)
                        @foreach($stud->getPhoneModel() as $k=> $v)
                            @if($v->isNull() !== true)
                                <div class="mt-2 col-10 text-center mx-auto">
                                    @if($cd == 0)
                                        <i class="fa fa-phone mb-2"></i>
                                        <br>
                                        @php($cd = 1)
                                    @endif
                                    <a rel="nofollow" href="tel:{!! $v->getFormatNumberOnly() !!}" class="no-color">
                                        {!! $v->FormatNumber() !!}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <br>
                    <div class="col-md-4">
                        <div class="mt-2 col-10 text-center mx-auto">
                            <i class="fa fa-envelope mb-2"></i>
                            <br>
                            {!! $stud->getEmail() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-madera">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            @if(!empty($stud->getFacebook()->getUrlPage())or
                            !empty($stud->getPinterest()->getUrlPage()) or
                            !empty($stud->getGoogle()->getUrlPage()) or
                            !empty($stud->getTwitter()->getUrlPage()) or
                            !empty($stud->getYoutube()->getUrlPage()))
                                <div class="row">
                                    @if(!empty($stud->getFacebook()->getUrlPage()))
                                        <a rel="nofollow" href="{!! $stud->getFacebook()->getUrlPage() !!}"
                                           class="mr-1 bg-colorcorp">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                    @endif
                                    @if(!empty($stud->getTwitter()->getUrlPage()))
                                        <a rel="nofollow" href="{!! $stud->getTwitter()->getUrlPage() !!}"
                                           target="_blank"
                                           class="mr-1 bg-colorcorp">
                                            <i class="fa fa-twitter-square"></i>
                                        </a>
                                    @endif
                                    @if(!empty($stud->getInstagram()->getUrlPage()))
                                        <a rel="nofollow" href="{!! $stud->getInstagram()->getUrlPage() !!}"
                                           target="_blank"
                                           class="mr-1 bg-colorcorp">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    @endif
                                    @if(!empty($stud->getPinterest()->getUrlPage()))
                                        <a rel="nofollow" href="{!! $stud->getPinterest()->getUrlPage() !!}"
                                           target="_blank"
                                           class="mr-1 bg-colorcorp">
                                            <i class="fa fa-pinterest-square"></i>
                                        </a>
                                    @endif
                                    @if(!empty($stud->getYoutube()->getUrlPage()))
                                        <a rel="nofollow" href="{!! $stud->getYoutube()->getUrlPage() !!}"
                                           target="_blank"
                                           class="mr-1 bg-colorcorp">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    @endif
                                    @if(!empty($stud->getGoogle()->getUrlPage()))
                                        <a rel="nofollow" href="{!! $stud->getGoogle()->getUrlPage() !!}"
                                           target="_blank"
                                           class="mr-1 bg-colorcorp">
                                            <i class="fa fa-google-plus-square"></i>
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{!! trans('masivo.cancel') !!}</button>
                            <button type="button" class="btn btn-corp">{!! trans('masivo.send') !!}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pie container-fluid">
    <div class="contenedorPie row">
        <div class="col-12">
            <div class="row mt-3 justify-content-around info">
                <div class="col-md-4">
                    @if(!empty($stud->getAddress()))
                        <div class="mt-2 col-10 text-center mx-auto">
                            <i class="fa fa-map-marker mb-2"></i>
                            <br>
                            {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}
                            , {!! $stud->getStateModel()->name!!}, {!! $stud->getCountryModel()->name !!}
                        </div>
                    @endif
                </div>
                <br>
                <div class="col-md-4">
                    @php($cd = 0)
                    @foreach($stud->getPhoneModel() as $k=> $v)
                        @if($v->isNull() !== true)
                            <div class="mt-2 col-10 text-center mx-auto">
                                @if($cd == 0)
                                    <i class="fa fa-phone mb-2"></i>
                                    <br>
                                    @php($cd = 1)
                                @endif
                                <a rel="nofollow" href="tel:{!! $v->getFormatNumberOnly() !!}" class="no-color">
                                    {!! $v->FormatNumber() !!}
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <br>
                <div class="col-md-4">
                    <div class="mt-2 col-10 text-center mx-auto">
                        <i class="fa fa-envelope mb-2"></i>
                        <br>
                        {!! $stud->getEmail() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="separacion col-12 row mx-0">
            <div class="destacado col-3 mx-auto"></div>
        </div>
        {{--<div class="logoRancho col-sm-3">
            <img class="img-fluid img-thumbnail" src="{!! $stud->getLogo() !!}" alt="{!! $stud->getName() !!}">
        </div>--}}
        <div class="copy col-12 text-center">
            <div class="wow fadeInRight " data-wow-duration="1s" style="padding-top: 4px">
                <a rel="nofollow" class="ib" target="_blank"
                   href="{!! url('http://'.$stud->getDomain()) !!}">{!! $stud->getDomain() !!} </a>
                © {!! Funciones::CurrentYear()!!} {!! trans('portal.allright') !!}
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<script src="{!! url('theme/w/js/jquery.min.js') !!}"></script>
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
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-9710293-50', 'caballosbenidorm.com');
    ga('send', 'pageview');

</script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBH7dgmzgLwEpBPD4cmHDrOfLkwG1Kxnjk&sensor=false">
</script>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script src="{!! url('assets/tooltip/js/tooltipster.bundle.min.js') !!}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="{!! url('theme/w/slick/slick.min.js') !!}"></script>
<script src="{!! url('theme/w/js/slick-animate.js') !!}"></script>
<script src="{!!route('JsTheme3',['slug'=>$stud->slug]) !!}"></script>
@include('attribmoneda')
</body>
</html>
