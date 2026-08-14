@php
$lang = \Session::get('lang');
if (empty($lang)) {
$lang = 'es';
\Session::put('lang', $lang);
\Session::put('applocale', $lang);
}
App::setLocale($lang);
@endphp
<!DOCTYPE html>
<html lang="{!! $lang !!}">
  <head>@include('portal.sidebar.head')
    @yield('social')
    <link rel="stylesheet" href="{!! url('portal_/css/base.css')!!}">
  </head>
  <body>
    {{--
    <!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    --}}
    {{--
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
    <!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
    <!-- Small Breadcrumb -->
    <div class="bread-2 page-header-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12 col-sm-5 col-xs-12">
            <div class="header-page">
              <h1>Category Grid - 2</h1>
            </div>
          </div>
          <div class="col-md-4 col-sm-7 col-xs-12">
            <div class="small-breadcrumb">
              <div class=" breadcrumb-link">
                <ul>
                  <li><a href="{!! route('portal') !!}">{!! trans('portal.portal') !!}</a></li>
                  <li><a href="#!">Pages</a></li>
                  <li><a href="#!">Category</a></li>
                  <li><a class="active" href="#!">Listing</a></li>
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
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </body>
</html>