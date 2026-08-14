{{-- Logo simple negro se usa--}}

<?php
$prs = \Session::get('pre');
$logo = url("portal_/images/logoportal.png");
$logo = url(\Config::get('logos.favicon32'));
$favicon = $logo;
$favicon = url(\Config::get('logos.favicon16'));
$logo = url(\Config::get('logos.logoh250'));
//Cambio de iamgenes
$f[0] = url('landing/images/slider/1/2.jpg');
$f[1] = url('landing/images/slider/1/6.jpg');
$f[2] = url('landing/images/slider/1/9.jpg');
$f[3] = url('landing/images/slider/1/8.jpg');
$imagen = $f[rand(0, 3)];
$error = (!empty(\Session::get('flash_message'))) ? \Session::get('flash_message') : null;
if (!empty($error)) {
    if (is_array($error)) {
        $e = "";
        foreach ($error as $k => $v) {
            $e .= $v . "<br>";
        }
        $error = $e;
    }
}
$mx = \Session::get('mexico');
$spa = \Session::get('espana');
$colombia = \Session::get('colombia');
if ($mx == true) {
    $pais = \Session::get('pais_id');
} elseif ($spa == true) {
    $pais = \Session::get('pais_id');
} elseif ($colombia == true) {
    $pais = \Session::get('pais_id');
} else {
    $pais = null;
}
?>
@if($mx == true)
    <title>{!! trans('Titulos.PortalMx') !!} | {!! \Config::get('app.name') !!}</title>
@elseif($spa == true)
    <title>{!! trans('Titulos.PortalEs') !!} | {!! \Config::get('app.name') !!}</title>
@elseif($colombia == true)
    <title>{!! trans('Titulos.PortalCol') !!} | {!! \Config::get('app.name') !!}</title>
@elseif($prs == true)
    <title>{!! trans('Titulos.PortalPre') !!} | {!! \Config::get('app.name') !!}</title>
@else
    <title>{!! trans('Titulos.Portal') !!} | {!! \Config::get('app.name') !!}</title>
@endif
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
{{--<meta name="description" content="">--}}
<meta name="author" content="{!! \Config::get('app.name') !!}">
<!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
{{--<link rel="icon" href="{!! url('assets/img/logo1.ico') !!}" type="image/x-icon"/>--}}
<link rel="icon" href="{!! $favicon !!}" type="image/x-icon"/>
<link type="text/css" rel="stylesheet" href="{!! url('assets/vendors/jqueryui/jquery-ui.min.css') !!}"/>
<!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="{!! url('portal_/css/bootstrap.min.css')!!}">
<!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="{!! url('portal_/css/style.min.css')!!}">
<!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
{{--<link rel="stylesheet" href="{!! url('portal_/css/font-awesome.css')!!}" type="text/css">--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
      type="text/css">
<!-- =-=-=-=-=-=-= Flat Icon =-=-=-=-=-=-= -->
<link href="{!! url('portal_/css/flaticon.css')!!}" rel="stylesheet">
<!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
<link rel="stylesheet" href="{!! url('portal_/css/et-line-fonts.min.css')!!}" type="text/css">
<!-- =-=-=-=-=-=-= Menu Drop Down =-=-=-=-=-=-= -->
<link rel="stylesheet" href="{!! url('portal_/css/forest-menu.min.css')!!}" type="text/css">
<!-- =-=-=-=-=-=-= Animation =-=-=-=-=-=-= -->
<link rel="stylesheet" href="{!! url('portal_/css/animate.min.css')!!}" type="text/css">
<!-- =-=-=-=-=-=-= Select Options =-=-=-=-=-=-= -->
<link href="{!! url('portal_/css/select2.min.css')!!}" rel="stylesheet"/>
<!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->
<link href="{!! url('portal_/css/nouislider.min.css')!!}" rel="stylesheet">
<!-- =-=-=-=-=-=-= Listing Slider =-=-=-=-=-=-= -->
<link href="{!! url('portal_/css/slider.min.css')!!}" rel="stylesheet">
<!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
<link rel="stylesheet" type="text/css" href="{!! url('portal_/css/owl.carousel.min.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! url('portal_/css/owl.theme.min.css')!!}">
<!-- =-=-=-=-=-=-= Check boxes =-=-=-=-=-=-= -->
<link href="{!! url('portal_/skins/minimal/minimal.css')!!}" rel="stylesheet">
<!-- =-=-=-=-=-=-= Responsive Media =-=-=-=-=-=-= -->
<link href="{!! url('portal_/css/responsive-media.min.css')!!}" rel="stylesheet">
<!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->
<link rel="stylesheet" id="color" href="{!! url('portal_/css/colors/defualt.css')!!}">
<!-- =-=-=-=-=-=-= For Style Switcher =-=-=-=-=-=-= -->
<link rel="stylesheet" id="theme-color" type="text/css" href="#"/>
<!-- JavaScripts -->
<script src="{!! route('Modernizer.js') !!}"></script>
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.css"/>
<link type="text/css" rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.buttons.css"/>
<link type="text/css" rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.history.css"/>
<link type="text/css" rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.mobile.css"/>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
<link type="text/css" rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.min.css"/>
@include('googleanalitic')
<script>
    window.token = '{!! csrf_token() !!}';
    window.UrlEstado = "{!! route('state.ajax') !!}";
    window.UrlCiudad = "{!! route('city.ajax') !!}";
</script>
<script src="{!! url('portal_/js/jquery.min.js') !!}"></script>
<script src="{!! url('portal_/js/select2.min.js') !!}"></script>
<!-- End Google Analytics -->
<link rel="stylesheet" href="{!! url('assets/tooltip/css/tooltipster.bundle.min.css') !!}">
<link rel="stylesheet" href="{!! route('CssPortal') !!}">
<script src="{!! url('js/axios/axios.min.js') !!}"></script>
@include('adsence')
@include('zopin')

{{--
        $Coins = \Session::get('moneda');
        $css = null;
        $Coins = empty($Coins)?'USD':$Coins;

--}}