<?php $logo =url("portal_/images/logoportal.png"); ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    @include('portal.sidebar.head')
    @include('meta',
[
'titulo' =>  \Config::get('app.name'),
'descripcion'=>'',

'logo'=>$logo,
])
</head>
<body>
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
   <!-- =-=-=-=-=-=-= Light Header =-=-=-=-=-=-= -->
   --}}
@include('portal.menu.menu')
<!-- Navigation Menu End -->
<!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-=  -->
<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area" style="padding-top: 145px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-page">
                    {{--<h1>Get In Touch</h1>--}}
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
                <li><a href="{!! route('portal') !!}">{!! trans('portal.portal') !!}</a></li>
                <li><a href="#">Pages</a></li>
                <li><a class="active" href="#">Contact</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Small Breadcrumb -->
<!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding ">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 no-padding commentForm">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="">
                            <h2>
                                {!! trans('portal.sendsms') !!}
                            </h2>
                            <form method="post" action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="{!! trans('portal.placholdername') !!}"
                                                   id="name" name="name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" placeholder="{!! trans('portal.placholderemail') !!}"
                                                   id="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="{!! trans('portal.placholdersubject') !!}"
                                                   id="subject" name="subject" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <textarea cols="12" rows="7"
                                                      placeholder="{!! trans('portal.placholdersms') !!}" id="message"
                                                      name="message" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <button class="btn btn-theme"
                                                type="submit">{!! trans('portal.contactsend') !!}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="contactInfo">
                            <h2>
                                {!! trans('portal.contactinfo') !!}
                            </h2>
                            <div class="singleContadds">
                                <i class="fa fa-map-marker"></i>
                                <p>
                                    {!! Config::get('otra.ubicacion') !!}

                                </p>
                                {{--
                               <p>
                                  Model Town Link Road Lahore, 60 Street. Pakistan 54770
                               </p>
                                --}}
                            </div>
                            <div class="singleContadds phone">
                                <i class="fa fa-phone"></i>
                                {!! Config::get('otra.telefono') !!}
                                {{--
                               <p>
                                  0123 456 78 90 - <span>Office</span>
                               </p>
                               <p>
                                  0123 456 78 90 - <span>Mobile</span>
                               </p>
                                --}}
                            </div>
                            <div class="singleContadds">
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:{!! Config::get('otra.correocontacto') !!}">{!! Config::get('otra.correocontacto') !!}</a>
                                {{--<a href="mailto:contact@scriptsbundle.com">contact@scriptsbundle.com</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
    @include('portal.sidebar.down2')
</div>
<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>
@include('portal.sidebar.foot')
</body>
</html>

