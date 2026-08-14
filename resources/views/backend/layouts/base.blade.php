
{{--https://ckeditor.com/cke4/builder--}}
{{--fe6b13--}}
{{--fe6b13--}}
{{-- rgba(254,107,19,1)--}}
<?php
$mac = Agent::isSafari();
$axios = true;
$user = (empty($user)) ? \Auth::user() : $user;
use App\User;
$error_envio_contrasena = \Session::get('error_correo');/*Error para no envio de contraseña y validacion al correo*/
$lang = \Session::get('lang');
if (empty($lang)) {
    $lang = 'es';
    \Session::put('lang', $lang);
}
App::setLocale($lang);
if (!isset($user)) {
    $user = \Auth::user();
}
if (empty($user)) {
    /*Definimos el usuario generico para pruebas*/
    $user = new User();
}
$favicon = url(\Config::get('logos.favicon16'));
if (!empty($user)) {
    if (!empty($user->Yeguada())) {
        if (!empty($user->Yeguada()->getFav())) {
            $favicon = url('uploads/' . \Config::get('aplication.favicon') . '/' . $user->Yeguada()->getFav());
        }
    }
}
$loader = url('assets/loader.gif');
$logo = url(\Config::get('logos.logoh250'));
$avatar = $user->getLogo();
//$lang =(isset(\Session::get('lang')))?\Session::get('lang'):'es';//acomodar aqui el lenguaje del navegador
if (!empty(\Auth::user())) {
    $g = false;
} else {
    $g = true;
}
?>
        <!doctype html>
<html class="no-js" lang="{!! $lang !!}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | {!! \Config::get('app.name') !!}</title>
{{--{!! dd( Route::getRoutes()) !!}--}}
<!-- global styles -->
    {{--
    https://www.facebook.com/settings?tab=applications
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
    --}}
    <meta name="author" content="{!! \Config::get('app.name') !!}">
    <!-- IE Compatibility modes -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile first -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{!! url(\Config::get('logos.favicon16')) !!}"/>
    <!-- global styles -->
    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/components.min.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/custom.min.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/pages/tooltip.css') !!}"/>
    <!-- end fo global styles -->
    <!-- plugin styles -->
    {{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">--}}
    <link type="text/css" rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.min.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.min.css"/>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.buttons.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.history.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.mobile.css"/>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.min.css"></script>--}}
    <link type="text/css" rel="stylesheet" href="{!! url('cropper/Croppie-2.5.1/croppie.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('css/horse.css') !!}"/>
    {{--
    <link type="text/css" rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>
    --}}
    <link type="text/css" rel="stylesheet" href="{!! url('js/dropify/css/dropify.css') !!}"/>
    <link type="text/css" rel="stylesheet"
          href="{!! url('assets/vendors/jqueryui/jquery-ui.min.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('cropper/darkroomjs/build/darkroom.css')!!}"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.4.2/b-colvis-1.4.2/b-flash-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/fc-3.2.3/fh-3.1.3/kt-2.3.2/r-2.2.0/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.3/datatables.min.css"/>
    {{--}}<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
    <script type="text/javascript" src="{!! url('js/jquery/2.2.4/jquery.min.js') !!}"></script>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet"/>
    {!!Html::script("https://foliotek.github.io/Croppie/bower_components/exif-js/exif.js")!!}
    {{--
    {!!Html::script("cropper/canvas-toBlob.js")!!}
    {!!Html::script("cropper/Blob.js")!!}
    --}}
    {{--<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>--}}
    <link rel="stylesheet" href="{!! url('assets/switchery/switchery.min.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! url('assets/switchery/bootstrap-switch.min.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! url('assets/css/pages/radio_checkbox.css') !!}" type="text/css">
    <script src="{!! url('js/ckeditor/ckeditor.js') !!}"></script>
    <script src="{!! url('js/ckeditor/config.js') !!}"></script>
    <script src="{!! url('js/ckeditor/styles.js') !!}"></script>
    {{--<script src="{!! url('') !!}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
    @include('adsence')
    <link type="text/css" rel="stylesheet" href="{!! url('css/p_notify.css') !!}"/>
    <link rel="stylesheet" href="{!! url('css/flags.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! url('css/animate.min.css') !!}" type="text/css">
    <link rel="Stylesheet" type="text/css" href="{!! url('frontend/horses.css') !!}"/>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
    @if($axios == true)
        <script src="{!! url('js/axios/axios.min.js') !!}"></script>
    @endif
    <script>
        window.token = '{!! csrf_token() !!}';
        window.UrlEstado = "{!! route('state.ajax') !!}";
        window.UrlCiudad = "{!! route('city.ajax') !!}";
        window.urlorder = '{!! route('photo.changeorder') !!}';
        @if($axios == true)
            axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
        axios.defaults.headers.common['csrftoken'] = token;
        @endif
    </script>
    <link rel="stylesheet" href="{!! url('css/base.min.css') !!}" type="text/css">
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css"/>
    <link rel="stylesheet" href="{!! url('assets/tooltip/css/tooltipster.bundle.min.css') !!}">
    <link type="text/css" rel="stylesheet" href="{!! route('PanelCss') !!}"/>
@include('zopin')
@include('googleanalitic')
@yield('topjs')
@yield('topcss')
<!-- end of page level css -->
</head>
{{--right_menu_section--}}
{{--fixedNav_position--}}
<body class=" fixedMenu_left @if(Agent::isDesktop() !=true) sidebar-left-hidden @endif">
{{--<body>--}}
{{--sidebar quitar fixed--}}
@include('fb-back-script')
<div class="soporte-card hidden-sm-down"
     data-toggle="popover" data-trigger="hover" data-placement="left"
     title="{!! trans('popover.support.titulo') !!}"
     data-content="{!! trans('popover.support.contenido') !!}"
>
    <a href="{!! route('tickets.index') !!}" class="btn btn-warning ">
        {!! trans('soporte.texto') !!}
    </a>
</div>
{{--@include('googletranslate')--}}
<div id="wrap" class="app">
    <!-- Superior -->
@include('backend.sidebar.top')
<!-- /Superior -->
    <!-- /#top -->
    <div class="wrapper fixedNav_top">
    @if($g != true)
        <!-- lateral -->
        @include('backend.sidebar.general',['user'=>$user])


        <!-- lateral -->
        @if(\Auth::user()->isAdm())
            <!-- derecho -->
            @include('backend.sidebar.rigth')
            <!-- derecho -->
        @endif
    @endif
    <!-- /#left -->
        <div id="content" class="bg-container">
            <header class="head">
                <div class="main-bar">
                    <div class="row no-gutters">
                        @yield('pagetitleadmin')
                        <div class="col-lg-6">
                            <h4 class="nav_top_align skin_txt">
                            @yield('pagetitle')
                            @if(!empty($error_envio_contrasena))
                                {!! $error_envio_contrasena !!}
                            @endif
                            <!--
 <i class="fa fa-user">
 </i>
 Delete User
 -->
                            </h4>
                        </div>
                        {{--
                        $d['name'] = "Mi pagina";
                        $d['url'] = route('MyPage', ['id' => $user->id]);
                        $s[count($s)] = $d;
                        --}}
                        <div class="col-lg-6">
                            <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                                <li class="breadcrumb-item">
                                {{--
                                @php if(empty($user)){
                                $id = 2;
                                }else{
                                $id = $user->id;
                                }@endphp
                                --}}
                                @php($id = isset($user)?$user->id:0)
                                {{--
                                <button class="btn btn-warning glow_button">Button
                                </button>
                                <button type="button" class="btn btn-labeled btn-success">
                                <span class="btn-label">
                                <i class="fa fa-globe"></i>
                                </span>
                                Web
                                </button>
                                <button type="button" class="btn btn-labeled btn-success">
                                <span class="btn-label">
                                <i class="fa fa-globe"></i>
                                </span>
                                Web
                                </button>
                                --}}
                                {{--}}
                                <a href="#" class="btn btn-labeled btn-warning" onclick="newTab('{!! route('MyPage', ['id' => $id]) !!}')">
                                <i class="fa fa-globe" data-pack="default" data-tags="">
                                </i>
                                VER MI PAGINA WEB
                                </a>
                                <br>
                               --}}
                                @if($g != true)
                                    @if(\Auth::user()->isAdm()!=true)
                                        @if(\Auth::user()->Asociado()!=true)

                                        <!-- boton web -->
                                            <a class="btn glow_button btn-warning"
                                               {{-- href="#" onclick="newTab('{!! route('MyPageBase', ['slug'=>\Auth::user()->Yeguada()->slug]) !!}')">--}}
                                               href="{!! route('MyPageBase', ['slug'=>\Auth::user()->Yeguada()->slug]) !!}"
                                               {{--href="{!! route('MyPageBase', ['slug'=>\Auth::user()->Yeguada()->id]) !!}"--}}
                                               target="_blank">
                                                <i class="fa fa-globe" data-pack="default" data-tags="">
                                                </i>
                                                {!! trans('users.myweb') !!}
                                            </a>
                                            <!-- boton web -->
                                            @endif
                                        @endif
                                    @endif
                                </li>
                                {{--
                                <li class="breadcrumb-item">
                                <a href="#">
                                </a>
                                </li>
                                <li class="breadcrumb-item active">
                                Delete User
                                </li>
                                --}}
                            </ol>
                        </div>
                    </div>
                </div>
            </header>
        {{--
        Aviso de alerta
        --}}
        @if(count(session('flash_notification', collect())->toArray()) !=0)
            <!-- mensaje de notificacion -->
                <div class=" col-xs-offset-3 offset-3 col-6 col-xs-6 m-t-25">
                    @include('flash::message')
                </div>
                <!-- mensaje de notificacion -->
        @endif
        @if(\Session::has('paypalsms'))
            <!-- Mensaje de paypal -->
            @include('backend.common.paypal')
            <!-- Mensaje de paypal -->
        @endif
        {{--
        <a href="{{ route('payment') }}" class="btn btn-warning">
        Pagar con <i class="fa fa-cc-paypal fa-2x"></i>
        </a>
        --}}
        {{--
        Aviso de alerta
        --}}
        <!-- Parte superior -->
            <div class="outer">
                <div class="inner bg-container">
                {{-- Contenido aqui --}}
                <!-- contenido -->
                @yield('content')
                <!-- contenido -->
                    {{--
                    <div class="card">
                    <div class="card-header bg-white">
                    <i class="fa fa-user">
                    </i> Deleted Users List
                    </div>
                    <div class="card-block m-t-35 table-responsive">
                    </div>
                    </div>
                    --}}
                </div>
                <!-- /.inner -->
            </div>
        </div>
    </div>
</div>
@yield('modal')
<!-- /#wrap -->
<!-- /#footer -->
{{--
<script type="text/javascript" src="{{asset('assets/js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
--}}
<!-- global scripts -->
<script>
    {{--//document.getElementById("left").style.height = document.body.scrollHeight + 'px';--}}
    document.getElementById("left").style.height = screen.height + 'px';
</script>
{{--<script src="{!! url('assets/vendors/jqueryui/jquery-ui.min.js') !!}"></script>
@if($mac == true)
    <script src="{!! url('js/jquery.touch.min.js')!!}"></script>
@endif
--}}
@yield('antesjs')
@if($axios == false)
    <script type="text/javascript" src="{!! url('js/app.js')!!}"></script>
@endif
<script type="text/javascript" src="{!! url('assets/switchery/bootstrap-switch.min.js')!!}"></script>
<script type="text/javascript" src="{!! url('assets/switchery/switchery.min.js')!!}"></script>
<script type="text/javascript" src="{!! url('assets/js/components.js')!!}"></script>
<script type="text/javascript" src="{!! url('assets/js/custom.js')!!}"></script>
<!-- end of global scripts -->
<!-- plugin scripts -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.min.css"></script>--}}
<script src="{!! url('cropper/Croppie-2.5.1/croppie.min.js') !!}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.animate.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.buttons.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.confirm.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.nonblock.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.mobile.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.desktop.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.history.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.callbacks.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.3.2/holder.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js">
</script>
<script type="text/javascript" src="{!! url('assets/js/pages/validation.js')!!}">
</script>
<script src="{!! url('assets/vendors/jqueryui/jquery-ui.min.js') !!}"></script>
<script src="{!! url('js/jquery.touch.min.js')!!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script> {{--https://igorescobar.github.io/jQuery-Mask-Plugin/--}}
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
 This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js"
        type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/themes/explorer-fa/theme.min.js"></script>
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.min.js"></script>
<script src="https://foliotek.github.io/Croppie/bower_components/exif-js/exif.js"></script>
--}}
<script src="{!! url('js/anum.js') !!}"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js"></script>
{{--datatable--}}
{{--
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>--}}
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.4.2/b-colvis-1.4.2/b-flash-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/fc-3.2.3/fh-3.1.3/kt-2.3.2/r-2.2.0/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.3/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script src="{!! url('assets/tooltip/js/tooltipster.bundle.min.js') !!}"></script>
<script type="text/javascript" src="{!! route('lazy.js') !!}"></script>
<script type="text/javascript" src="{{route('PanelJs')}}"></script>
<script type="text/javascript" src="{{route('JsTablaCaballo')}}"></script>
@yield('bottomjs')
@if(!empty($error_envio_contrasena))
    {{-- Error cuando no se puede mandar el correo al usuario y debe cambiar la contraseña --}}
    <script>
        function errormail() {
            new PNotify({title: 'Oh No!', text: '{!! $error_envio_contrasena !!}', type: 'error'});
            return false;
        }

        $(document).ready(function () {
            errormail()
        });
    </script>
@endif
{!! $error_envio_contrasena !!}
<!-- end of plugin scripts -->
</body>
</html>
{{--
Datatable cdn
--}}
