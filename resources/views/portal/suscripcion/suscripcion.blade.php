@php
    $f[0]=url('landing/images/slider/1/1.jpg');
        $f[1]=url('landing/images/slider/1/2.jpg');
        $f[2]=url('landing/images/slider/1/3.JPG');
        $imagen = $f[rand(0,2)];
@endphp
@php($logo =url("portal_/images/logoportal.png"))

        <!DOCTYPE html>
<html lang="en">
<head>
    @include('portal.sidebar.head')
</head>
<body>
{{--
   <!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
       <div id="loader-wrapper">
      <div id="loader">
</div>
      <div class="loader-section section-left">
</div>
      <div class="loader-section section-right">
</div>
   </div>
  <!-- =-=-=-=-=-=-= Color Switcher =-=-=-=-=-=-= -->
 <div class="color-switcher" id="choose_color">
      <a href="#." class="picker_close">
<i class="fa fa-gear">
</i>
</a>
      <h5>STYLE SWITCHER</h5>
      <div class="theme-colours">
         <p> Choose Colour style </p>
         <ul>
            <li>
               <a href="#." class="defualt" id="defualt">
</a>
            </li>
            <li>
               <a href="#." class="green" id="green">
</a>
            </li>
            <li>
               <a href="#." class="blue" id="blue">
</a>
            </li>
            <li>
               <a href="#." class="red" id="red">
</a>
            </li>

            <li>
               <a href="#." class="sea-green" id="sea-green">
</a>
            </li>

         </ul>
      </div>
      <div class="clearfix">
</div>
   </div>
   --}}
@include('portal.menu.menu')
<!-- Navigation Menu End -->
<!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area" style="padding-top: 145px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-page">
                    {{--<h1>About Us</h1>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Small Breadcrumb -->
<div class="small-breadcrumb">
    <div class="container">
        <div class=" breadcrumb-link">
            <ul>
                <li>
                    <a href="{!! route('portal') !!}">{!! trans('portal.portal') !!}</a>
                </li>
                {{--
                <li>
                    <a href="#">Pages</a>
                </li>
                --}}
                <li>
                    <a class="active" href="#">{!! trans('portal.suscribepage') !!}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Small Breadcrumb -->
<!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding pattern_dots">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                    <div class="about-us-content">
                        <div class="heading-panel">
                            <h3 class="main-title text-left">
                                {!! trans('portal.suscribepagecontenttitle') !!}
                            </h3>
                        </div>
                        <h2>
                        </h2>
                        {!! trans('portal.suscribepagecontentcontent') !!}
                        {{--
                       <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledit to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                       <p> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.It has survived not only five centuries, but also the leap into  publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                       <p>Hmply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambledit to make a type specimen It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                    <div class="about-page-featured-image">
                        <a href="#">
                            <img src="{!!$imagen !!}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
    <section class="about-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 no-padding">
                @foreach(trans('portal.cajaservicio') as $k=>$v)
                    <!-- service box 3 -->
                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                            <div class="why-us border-box text-center">
                                <h5>{!! $v['titulo'] !!}</h5>
                                <p>
                                    {!! $v['contenido'] !!}
                                </p>
                            </div>
                        </div>
                        <!-- service box end -->
                    @endforeach
                    {{--
                    <!-- service box 3 -->
                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                        <div class="why-us border-box text-center">
                            <h5>Why choose us</h5>
                            <p>Mauris eros tortor, tristique cursus porttitor et, luctus sed urna. Quisque id libero
                                risus. Aliquam accumsan erat id sem placerat tempus.</p>
                        </div>
                    </div>
                    <!-- service box end -->
                    <!-- service box 3 -->
                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                        <div class="why-us border-box text-center">
                            <h5>Our mission</h5>
                            <p>Mauris eros tortor, tristique cursus porttitor et, luctus sed urna. Quisque id libero
                                risus. Aliquam accumsan erat id sem placerat tempus.</p>
                        </div>
                        <!-- end featured-item -->
                    </div>
                    <!-- service box end -->
                    <!-- service box 3 -->
                    <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                        <div class="why-us border-box text-center">
                            <h5>Only creative solutions</h5>
                            <p>Mauris eros tortor, tristique cursus porttitor et, luctus sed urna. Quisque id libero
                                risus. Aliquam accumsan erat id sem placerat tempus.</p>
                        </div>
                        <!-- end featured-item -->
                    </div>
                    <!-- service box end -->
                    --}}
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <div class="clearfix">
    </div>
    <!-- =-=-=-=-=-=-= Statistics Counter =-=-=-=-=-=-= -->
    <div class="funfacts custom-padding parallex">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="number">
                        <span class="timer" data-from="0" data-to="{!! Publico::TotalCaballoVenta() !!}"
                              data-speed="1500"
                              data-refresh-interval="5">0</span>+
                    </div>
                    <h4>
                        {!! trans('portal.horsetotal') !!}
                    </h4>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="number">
                        <span class="timer" data-from="0" data-to="{!! Publico::TotalYeguada() !!}" data-speed="1500"
                              data-refresh-interval="5">0</span>+
                    </div>
                    <h4>
                        {!! trans('portal.yeguadatotal') !!}
                    </h4>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="number">
                        <span class="timer" data-from="0" data-to="1042" data-speed="1500"
                              data-refresh-interval="5">0</span>+
                    </div>
                    <h4>
                        {!! trans('portal.ventastotal') !!}
                    </h4>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="number">
                        <span class="timer" data-from="0" data-to="34" data-speed="1500"
                              data-refresh-interval="5">0</span>+
                    </div>

                    <h4>
                        {!! trans('portal.trabajostotal') !!}
                    </h4>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.funfacts -->
    <!-- =-=-=-=-=-=-= Statistics Counter End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Pricing =-=-=-=-=-=-= -->
    <section class="custom-padding">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Heading Area -->
                <div class="heading-panel">
                    <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1>
                            {!! trans('portal.titulocardssuscrip') !!}
                        </h1>
                        {{--
                        <!-- Short Description -->
                        <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo
                            eu, his dico ut debet consectetuer.</p>
                        --}}
                    </div>
                </div>
                <!-- Middle Content Box -->
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="row pricing">
                        <div class="col-sm-6 col-lg-4 col-md-4">
                            <div class="block">
                                <h3>
                                    {!! trans('portal.cartassuscr.left.titulo') !!}
                                </h3>
                                <span class="type">
                                    {!! trans('portal.cartassuscr.left.tipo') !!}
                                </span>
                                <span class="price">
                                    {!! trans('portal.cartassuscr.left.precio') !!}
                                </span>
                                <span class="time">
                                    {!! trans('portal.cartassuscr.left.tiempo') !!}
                                </span>
                                <ul>
                                    {!! trans('portal.cartassuscr.left.caracteristica') !!}
                                </ul>
                                <a href="#" class="btn btn-theme">
                                    {!! trans('portal.selectplan') !!}
                                    <i class="fa fa-arrow-right" aria-hidden="true"> </i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-md-4">
                            <div class="block featured">
                                <h3>
                                    {!! trans('portal.cartassuscr.center.titulo') !!}
                                </h3>
                                <span class="type">
                                    {!! trans('portal.cartassuscr.center.tipo') !!}
                                </span>
                                <span class="price">
                                    {!! trans('portal.cartassuscr.center.precio') !!}
                                </span>
                                <span class="time">
                                    {!! trans('portal.cartassuscr.center.tiempo') !!}
                                </span>
                                <ul>
                                    {!! trans('portal.cartassuscr.center.caracteristica') !!}
                                </ul>
                                <a href="#" class="btn btn-theme">
                                    {!! trans('portal.selectplan') !!}
                                    <i class="fa fa-arrow-right" aria-hidden="true"> </i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-md-4">
                            <div class="block">
                                <h3>
                                    {!! trans('portal.cartassuscr.rigth.titulo') !!}
                                </h3>
                                <span class="type">
                                    {!! trans('portal.cartassuscr.rigth.tipo') !!}
                                </span>
                                <span class="price">
                                    {!! trans('portal.cartassuscr.rigth.precio') !!}
                                </span>
                                <span class="time">
                                    {!! trans('portal.cartassuscr.rigth.tiempo') !!}
                                </span>
                                <ul>
                                    {!! trans('portal.cartassuscr.rigth.caracteristica') !!}
                                </ul>
                                <a href="#" class="btn btn-theme">
                                    {!! trans('portal.selectplan') !!}
                                    <i class="fa fa-arrow-right" aria-hidden="true"> </i>
                                </a>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Pricing End =-=-=-=-=-=-= -->
{{--
<!-- =-=-=-=-=-=-= App Download Section  =-=-=-=-=-=-= -->
<div class="app-download-section parallex">
    <!-- app-download-section-wrapper -->
    <div class="app-download-section-wrapper">
        <!-- app-download-section-container -->
        <div class="app-download-section-container">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- col-md-12 -->
                    <div class="col-md-12">
                        <!-- section-title -->
                        <div class="section-title">
                            <span>Download</span>
                            <span>
<img src="{!! url('portal_/images/logo-1.png') !!}" alt="Tiny Logo">
</span>
                            <span>Now</span>
                        </div>
                        <!-- /section-title -->
                    </div>
                    <!-- /col-md-12 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <!-- Windows Store -->
                        <a href="#" title="Windows Store" class="btn app-download-button">
<span class="app-store-btn">
                       <i class="fa fa-windows">
</i>
                       <span>
                       <span>Download From</span>
<span>Windows Store </span>
</span>
                       </span>
                        </a>
                        <!-- /Windows Store -->
                    </div>
                    <!-- /col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <!-- Google Store -->
                        <a href="#" title="Google Store" class="btn app-download-button">
<span class="app-store-btn">
                       <i class="fa fa-android">
</i>
                       <span>
                       <span>Download From</span>
<span>Google Store </span>
</span>
                       </span>
                        </a>
                        <!-- /Google Store -->
                    </div>
                    <!-- /col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <!-- Apple Store -->
                        <a href="#" title="Windows Store" class="btn app-download-button">
<span class="app-store-btn">
                       <i class="fa fa-apple">
</i>
                       <span>
                       <span>Download From</span>
<span>Apple Store </span>
</span>
                       </span>
                        </a>
                        <!-- /Apple Store -->
                    </div>
                    <!-- /col-md-4 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /app-download-section-container -->
    </div>
    <!-- /download-section-wrapper -->
</div>
<!-- =-=-=-=-=-=-= App Download Section End =-=-=-=-=-=-= -->
--}}
{{--
<!-- =-=-=-=-=-=-= Partners =-=-=-=-=-=-= -->
<div class="happy-clients-area fix">
    <div class="container">
        <div class="row clients-space">
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="client-brand-list">
                    <div class="sigle-clients-brand">
                        <a href="#">
                            <img src="{!! url('portal_/images/clients/1.svg') !!}" alt="">
                        </a>
                    </div>
                    <div class="sigle-clients-brand">
                        <a href="#">
                            <img src="{!! url('portal_/images/clients/2.svg') !!}" alt="">
                        </a>
                    </div>
                    <div class="sigle-clients-brand">
                        <a href="#">
                            <img src="{!! url('portal_/images/clients/3.svg') !!}" alt="">
                        </a>
                    </div>
                    <div class="sigle-clients-brand">
                        <a href="#">
                            <img src="{!! url('portal_/images/clients/4.svg') !!}" alt="">
                        </a>
                    </div>
                    <div class="sigle-clients-brand">
                        <a href="#">
                            <img src="{!! url('portal_/images/clients/5.svg') !!}" alt="">
                        </a>
                    </div>
                    <div class="sigle-clients-brand">
                        <a href="#">
                            <img src="{!! url('portal_/images/clients/6.svg') !!}" alt="">
                        </a>
                    </div>
                    <div class="sigle-clients-brand">
                        <a href="#">
                            <img src="{!! url('portal_/images/clients/7.svg') !!}" alt="">
                        </a>
                    </div>
                    <div class="sigle-clients-brand">
                        <a href="#">
                            <img src="{!! url('portal_/images/clients/8.svg') !!}" alt="">
                        </a>
                    </div>
                    <div class="sigle-clients-brand">
                        <a href="#">
                            <img src="{!! url('portal_/images/clients/9.svg') !!}" alt="">
                        </a>
                    </div>
                    <div class="sigle-clients-brand">
                        <a href="#">
                            <img src="{!! url('portal_/images/clients/10.svg') !!}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =-=-=-=-=-=-= Partners End =-=-=-=-=-=-= -->
--}}
<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
@include('portal.sidebar.down')
<!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
</div>
<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>
@include('portal.sidebar.foot')
</body>
</html>

