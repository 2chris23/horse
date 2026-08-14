@php($titulo = "")
@php($subtitulo = "")
@php
    $f[0]=url('landing/images/slider/1/2.jpg');
$f[1]=url('landing/images/slider/1/6.jpg');
$f[2]=url('landing/images/slider/1/9.jpg');
$f[3]=url('landing/images/slider/1/8.jpg');
$lang = \Session::get('lang');
if (empty($lang)) {
$lang = 'es';
\Session::put('lang', $lang);
\Session::put('applocale', $lang);
}
App::setLocale($lang);
@endphp
@php($logo =url("portal_/images/logoportal.png"))
        <!DOCTYPE html>
<html lang="{!! $lang !!}">
<head>
    @include('portal.sidebar.head')
    @yield('social')


    <link rel="stylesheet" href="{!! url('portal_/css/base1.css')!!}">
</head>


<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WL5JW4G"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
{{--
<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- =-=-=-=-=-=-= Color Switcher =-=-=-=-=-=-= -->
<div class="color-switcher" id="choose_color">
   <a href="#." class="picker_close"><i class="fa fa-gear"></i></a>
   <h5>STYLE SWITCHER</h5>
   <div class="theme-colours">
      <p> Choose Colour style </p>
      <ul>
         <li>
            <a href="#." class="defualt" id="defualt"></a>
         </li>
         <li>
            <a href="#." class="green" id="green"></a>
         </li>
         <li>
            <a href="#." class="blue" id="blue"></a>
         </li>
         <li>
            <a href="#." class="red" id="red"></a>
         </li>

         <li>
            <a href="#." class="sea-green" id="sea-green"></a>
         </li>

      </ul>
   </div>
   <div class="clearfix"> </div>
</div>
<!-- =-=-=-=-=-=-= Colored Header =-=-=-=-=-=-= -->
--}}
@include('portal.menu.menu')
<!-- Navigation Menu End -->
<!-- Navigation Menu End -->
<!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area" style="padding-top: 145px;">

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-page">


                    <h1>{!! $titulo !!}</h1>
                    <span>{!! $subtitulo !!}</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="small-breadcrumb type-2">
                    <div class="breadcrumb-link">
                        <ul>
                            <li><a href="{!! route('portal') !!}">{!! trans('portal.portal') !!}</a></li>
                            <li><a class="active"
                                   href="{!! route('listaportal') !!}">{!! trans('portal.listado') !!}</a></li>

                            {{--
                            <li><a href="#">Pages</a></li>
                            <li><a href="elements.html">Category</a></li>
                            <li><a class="active" href="#">Listing</a></li>
                            --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
@yield('content')
<!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
    @include('portal.sidebar.down')
</div>
<!-- Main Content Area End -->{{--
<!-- Post Ad Sticky -->
<a href="#" class="sticky-post-button hidden-xs">
         <span class="sell-icons">
         <i class="flaticon-transport-9"></i>
         </span>
    <h4>SELL</h4>
</a>--}}
<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>
<!-- =-=-=-=-=-=-= Quote Modal =-=-=-=-=-=-= -->
@yield('content1')

@include('portal.sidebar.foot')
@yield('js')
<script>
    {{--
    $(window).on('load',function(){
        $("select").select2({
            placeholder: "{!! trans('users.chooseone') !!}",
            allowClear: true,
            width: '100%'
        });
   });
    --}}
</script>
</body>
</html>

