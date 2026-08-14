@php($logo =url("landing/images/basic/logo.png"))
@php($logo =url("portal_/images/logoportal.png"))
@php
    $precio = Funciones::AjustarNumeroMil($horse->getPrice());
                                    $raza = $horse->getRaza();
                                    $alzada = $horse->getRaisedFormat();
                                    $edad = $horse->getAge();

@endphp
        <!DOCTYPE html>
<html lang="en">
<head>
    @include('portal.sidebar.head')
    <style>
        .h-50 {
            max-height: 50px;

        }

        .h-313-234 {
            max-height: 234px !important;
            max-width: 313px !important;
        }

        .m-w-313 {
            min-width: 313px !important;
            margin-left: 22px !important;
        }
    </style>
</head>


<body>
<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
{{--
<div id="loader-wrapper">
    <div id="loader">
</div>
    <div class="loader-section section-left">
</div>
    <div class="loader-section section-right">
</div>
</div>
--}}
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
<!-- =-=-=-=-=-=-= Light Header =-=-=-=-=-=-= -->
@include('portal.menu.light')
<!-- Navigation Menu End -->
<!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
<div class="page-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-page">
                    <h1>Single Ad Detial</h1>
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
                <li>
                    <a href="#">Pages</a>
                </li>
                <li>
                    <a class="active" href="#">Ad Detail</a>
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
    <section class="section-padding error-page pattern-bgs gray ">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- =-=-=-=-=-=-= Advertizing Sidebar =-=-=-=-=-=-= -->
                <div class="col-md-2 col-sm-2  hidden-xs hidden-sm  leftbar-stick">
                    <div class="theiaStickySidebar">
                        <img alt="" src="{!! url('portal_/images/160x600.png') !!}">
                    </div>
                </div>

                <!-- Middle Content Area -->
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <!-- Single Ad -->
                    <div class="horse-special">
                        <!-- Title -->
                        <div class="ad-box">
                            <h1>{!! $horse->getName() !!}</h1>
                            <div class="short-history">
                                <ul>
                                    <li>Published on: <b>07 Oct 2017</b>
                                    </li>
                                    <li>Category: <b>
                                            <a href="#">Used Cars</a>
                                        </b>
                                    </li>
                                    <li>Location: <b>London</b>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Listing Slider  -->
                        @if(count($horse->getPhotoModel() )!=0)
                            <div class="flexslider single-page-slider">
                                <div class="flex-viewport">
                                    <ul class="slides slide-main">
                                        @foreach($horse->getPhotoModel() as $k=>$v)
                                            <li class="">
                                                <img alt="{!! $horse->getName() !!}" src="{!! $v->getUrl() !!}"
                                                     title="">
                                            </li>
                                        @endforeach
                                        {{--
                                                                                <li class="">
                                                                                    <img alt="" src="{!! url('portal_/images/single-page/1.jpg') !!}" title="">
                                                                                </li>
                                                                            <li>
                                                                                <img alt="" src="{!! url('portal_/images/single-page/2.jpg') !!}" title="">
                                                                            </li>
                                                                            <li class="flex-active-slide">
                                                                                <img alt="" src="{!! url('portal_/images/single-page/3.jpg') !!}" title="">
                                                                            </li>
                                                                            <li>
                                                                                <img alt="" src="{!! url('portal_/images/single-page/4.jpg') !!}" title="">
                                                                            </li>
                                                                            <li>
                                                                                <img alt="" src="{!! url('portal_/images/single-page/5.jpg') !!}" title="">
                                                                            </li>
                                                                            <li>
                                                                                <img alt="" src="{!! url('portal_/images/single-page/6.jpg') !!}" title="">
                                                                            </li>
                                                                            --}}
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @if(count($horse->getPhotoModel() )!=0)
                        <!-- Listing Slider Thumb -->

                            <div class="flexslider" id="carousels">
                                <div class="flex-viewport">
                                    <ul class="slides slide-thumbnail">
                                        @foreach($horse->getPhotoModel() as $k=>$v)
                                            <li class="">
                                            <li>
                                                <img alt="{!! $horse->getName() !!}" draggable="false"
                                                     src="{!!  $v->getUrl() !!}">
                                            </li>

                                    @endforeach
                                    {{--
                                    <li>
<img alt="" draggable="false" src="{!! url('portal_/images/single-page/1_thumb.jpg') !!}">
</li>
                                    <li>
<img alt="" draggable="false" src="{!! url('portal_/images/single-page/2_thumb.jpg') !!}">
</li>
                                    <li class="flex-active-slide">
<img alt="" draggable="false"
                                                                       src="{!! url('portal_/images/single-page/3_thumb.jpg') !!}">
</li>
                                    <li>
<img alt="" draggable="false" src="{!! url('portal_/images/single-page/4_thumb.jpg') !!}">
</li>
                                    <li>
<img alt="" draggable="false" src="{!! url('portal_/images/single-page/5_thumb.jpg') !!}">
</li>
                                    <li>
<img alt="" draggable="false" src="{!! url('portal_/images/single-page/6_thumb.jpg') !!}">
</li>
                                        --}}
                                    <!-- items mirrored twice, total of 12 -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Share Ad  -->
                        @endif
                        <div class="ad-share text-center">
                            <div data-toggle="modal" data-target=".share-ad" class="ad-box col-md-4 col-sm-4 col-xs-12">
                                <i class="fa fa-share-alt">
                                </i>
                                <span class="hidetext">Comparte</span>
                            </div>
                            <a class="ad-box col-md-4 col-sm-4 col-xs-12" href="#">
                                <i class="fa fa-star active">
                                </i>
                                <span class="hidetext">Add to watchlist</span>
                            </a>
                            <div data-target=".report-quote" data-toggle="modal"
                                 class="ad-box col-md-4 col-sm-4 col-xs-12">
                                <i class="fa fa-warning">
                                </i>
                                <span class="hidetext">Report</span>
                            </div>
                        </div>
                        <div class="clearfix">
                        </div>

                        <img alt="" class="center-block margin-bottom-30"
                             src="{!! url('portal_/images/advertise-728x90.jpg') !!}">

                        <!-- Short Description  -->
                        <div class="ad-box">
                            <div class="short-features">
                                <!-- Heading Area -->
                                <div class="heading-panel">
                                    <h3 class="main-title text-left">
                                        Description
                                    </h3>
                                </div>
                                {{--
                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                    <span>
<strong>Condition</strong> :</span> Used
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                    <span>
<strong>Brand</strong> :</span> Nokia
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                    <span>
<strong>Model</strong> :</span> Lumia 625
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                    <span>
<strong>Product Type</strong>:</span> Mobile
                                </div>
                                --}}
                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                    <span>
<strong>Edad</strong> :</span> @if(!empty($edad))
                                        {!! $edad !!} {!! trans('horse.years') !!}
                                    @else
                                        {!! trans('horse.yearsunkown') !!}
                                    @endif
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                    <span>
<strong>Capa</strong> :</span> @if(!empty($color))
                                        {!! $color !!}
                                    @endif
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                    <span>
<strong>Precio</strong> :</span> {!! $precio !!} <i class="fa fa-eur">
                                    </i>
                                </div>
                            </div>
                            <!-- Short Features  -->
                            <div class="desc-points">
                                {!! $horse->getDescripcion() !!}
                                {{--
                                <ul>
                                    <li>
                                        Looking to sell the car urgently.
                                    </li>
                                    <li>
                                        Engine is good condition.
                                    </li>
                                    <li>
                                        Complete service history available.
                                    </li>
                                    <li>
                                        Original return file is available.
                                    </li>
                                    <li>
                                        After Market Alloy rims.
                                    </li>
                                    <li>
                                        As good as a brand new car.
                                    </li>
                                    <li>
                                        Lady Driven Car in Immaculate Condition.
                                    </li>
                                    <li>
                                        No Work Required in Car.
                                    </li>
                                    <li>
                                        Excellent Mileage , Local Average = 14 km , Long Average = 16 km .
                                    </li>
                                </ul>
                                --}}
                            </div>
                            <!-- Related Image  -->
                            <div class="ad-related-img">
                                <img src="{!! url('portal_/images/car-img1.png') !!}" alt=""
                                     class="img-responsive center-block">
                            </div>
                            <!-- Ad Specifications -->
                            {{--
                            <div class="specification">
                                <!-- Heading Area -->
                                <div class="heading-panel">
                                    <h3 class="main-title text-left">
                                        Specifications
                                    </h3>
                                </div>

                                <div class="ad-row row">
                                    <div class="col-md-6 col-xs-12 col-sm-12">

                                        <img alt="" src="{!! url('portal_/images/300x250.gif') !!}">
                                    </div>
                                    <div class="col-md-6 col-xs-12 col-sm-12">

                                        <img alt="" src="{!! url('portal_/images/300x250.gif') !!}">
                                    </div>
                                </div>

                                <p>
                                    samsung galaxy note 2 new condition with handsfree and charger urgent sale. with
                                    book pouch original 4g lte. 16 gb condition 10/10 andriod kitkat4.4.2
                                </p>
                                <p>
                                    Bank Leased 5 Year plan 2013 Honda Civic 1.8 Vti Oriel Prosmatec Automatic ( New
                                    Shape ) Attractive Silver Color 1 year installments paid Lahore Reg number Well
                                    Maintained Insurance + tracker etc included Options: Sunroof
                                </p>
                                <p>
                                    Chilled AC Power Windows Power Steering ABS braking system ETC 15000 km carefully
                                    driven No SMS / Email , Serious Buyers Requested To Call .
                                </p>
                                <p>
                                    Chilled AC Power Windows Power Steering ABS braking system ETC 15000 km carefully
                                    driven No SMS / Email , Serious Buyers Requested To Call .
                                </p>
                                <p>
                                    Bank Leased 5 Year plan 2013 Honda Civic 1.8 Vti Oriel Prosmatec Automatic ( New
                                    Shape ) Attractive Silver Color 1 year installments paid Lahore Reg number Well
                                    Maintained Insurance + tracker etc included Options: Sunroof
                                </p>
                            </div>
                            --}}
                            <div class="clearfix">
                            </div>
                        </div>
                        <div class="clearfix">
                        </div>

                        <img alt="" class="center-block margin-top-30 margin-bottom-30"
                             src="{!! url('portal_/images/advertise-728x90.jpg') !!}">

                    </div>
                    <!-- Single Ad End -->
                {{--
                <!-- Single Ad -->
                <div class="horse-special">
                    <!-- Title -->
                    <div class="ad-box">
                        <h1>{!! $horse->getName() !!}</h1>
                        <div class="short-history">
                            <ul>
                                <li>Published on: <b>07 Oct 2017</b>
</li>
                                <li>Category: <b>
<a href="#">Used Cars</a>
</b>
</li>
                                <li>Location: <b>London</b>
</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Listing Slider  -->
                    <div class="flexslider single-page-slider">
                        <div class="flex-viewport">
                            <ul class="slides slide-main">
                                <li class="">
<img alt="" src="{!! url('portal_/images/single-page/1.jpg') !!}" title="">
</li>
                                <li>
<img alt="" src="{!! url('portal_/images/single-page/2.jpg') !!}" title="">
</li>
                                <li class="flex-active-slide">
<img alt="" src="{!! url('portal_/images/single-page/3.jpg') !!}" title="">
</li>
                                <li>
<img alt="" src="{!! url('portal_/images/single-page/4.jpg') !!}" title="">
</li>
                                <li>
<img alt="" src="{!! url('portal_/images/single-page/5.jpg') !!}" title="">
</li>
                                <li>
<img alt="" src="{!! url('portal_/images/single-page/6.jpg') !!}" title="">
</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Listing Slider Thumb -->
                    <div class="flexslider" id="carousels">
                        <div class="flex-viewport">
                            <ul class="slides slide-thumbnail">
                                <li>
<img alt="" draggable="false" src="{!! url('portal_/images/single-page/1_thumb.jpg') !!}">
</li>
                                <li>
<img alt="" draggable="false" src="{!! url('portal_/images/single-page/2_thumb.jpg') !!}">
</li>
                                <li class="flex-active-slide">
<img alt="" draggable="false" src="{!! url('portal_/images/single-page/3_thumb.jpg') !!}">
</li>
                                <li>
<img alt="" draggable="false" src="{!! url('portal_/images/single-page/4_thumb.jpg') !!}">
</li>
                                <li>
<img alt="" draggable="false" src="{!! url('portal_/images/single-page/5_thumb.jpg') !!}">
</li>
                                <li>
<img alt="" draggable="false" src="{!! url('portal_/images/single-page/6_thumb.jpg') !!}">
</li>
                                <!-- items mirrored twice, total of 12 -->
                            </ul>
                        </div>
                    </div>
                    <!-- Share Ad  -->
                    <div class="ad-share text-center">
                        <div data-toggle="modal" data-target=".share-ad" class="ad-box col-md-4 col-sm-4 col-xs-12">
                            <i class="fa fa-share-alt">
</i>
<span class="hidetext">Share</span>
                        </div>
                        <a class="ad-box col-md-4 col-sm-4 col-xs-12" href="#">
<i class="fa fa-star active">
</i>
<span class="hidetext">Add to watchlist</span>
</a>
                        <div data-target=".report-quote" data-toggle="modal" class="ad-box col-md-4 col-sm-4 col-xs-12">
                            <i class="fa fa-warning">
</i>
<span class="hidetext">Report</span>
                        </div>
                    </div>
                    <div class="clearfix">
</div>

                    <img alt="" class="center-block margin-bottom-30" src="{!! url('portal_/images/advertise-728x90.jpg') !!}">

                    <!-- Short Description  -->
                    <div class="ad-box">
                        <div class="short-features">
                            <!-- Heading Area -->
                            <div class="heading-panel">
                                <h3 class="main-title text-left">
                                    Description
                                </h3>
                            </div>
                            <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                <span>
<strong>Condition</strong> :</span> Used
                            </div>
                            <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                <span>
<strong>Brand</strong> :</span> Nokia
                            </div>
                            <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                <span>
<strong>Model</strong> :</span> Lumia 625
                            </div>
                            <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                <span>
<strong>Product Type</strong>:</span> Mobile
                            </div>
                            <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                <span>
<strong>Date</strong> :</span> 2014-10-06
                            </div>
                            <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                <span>
<strong>Price</strong> :</span> Rs. 22,000
                            </div>
                        </div>
                        <!-- Short Features  -->
                        <div class="desc-points">
                            <ul>
                                <li>
                                    Looking to sell the car urgently.
                                </li>
                                <li>
                                    Engine is good condition.
                                </li>
                                <li>
                                    Complete service history available.
                                </li>
                                <li>
                                    Original return file is available.
                                </li>
                                <li>
                                    After Market Alloy rims.
                                </li>
                                <li>
                                    As good as a brand new car.
                                </li>
                                <li>
                                    Lady Driven Car in Immaculate Condition.
                                </li>
                                <li>
                                    No Work Required in Car.
                                </li>
                                <li>
                                    Excellent Mileage , Local Average = 14 km , Long Average = 16 km .
                                </li>
                            </ul>
                        </div>
                        <!-- Related Image  -->
                        <div class="ad-related-img">
                            <img src="{!! url('portal_/images/car-img1.png') !!}" alt="" class="img-responsive center-block">
                        </div>
                        <!-- Ad Specifications -->
                        <div class="specification">
                            <!-- Heading Area -->
                            <div class="heading-panel">
                                <h3 class="main-title text-left">
                                    Specifications
                                </h3>
                            </div>

                            <div class="ad-row row">
                                <div class="col-md-6 col-xs-12 col-sm-12">

                                    <img alt="" src="{!! url('portal_/images/300x250.gif') !!}">
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12">

                                    <img alt="" src="{!! url('portal_/images/300x250.gif') !!}">
                                </div>
                            </div>

                            <p>
                                samsung galaxy note 2 new condition with handsfree and charger urgent sale. with book pouch original 4g lte. 16 gb condition 10/10 andriod kitkat4.4.2
                            </p>
                            <p>
                                Bank Leased 5 Year plan 2013 Honda Civic 1.8 Vti Oriel Prosmatec Automatic ( New Shape ) Attractive Silver Color 1 year installments paid Lahore Reg number Well Maintained Insurance + tracker etc included Options: Sunroof
                            </p>
                            <p>
                                Chilled AC Power Windows Power Steering ABS braking system ETC 15000 km carefully driven No SMS / Email , Serious Buyers Requested To Call .
                            </p>
                            <p>
                                Chilled AC Power Windows Power Steering ABS braking system ETC 15000 km carefully driven No SMS / Email , Serious Buyers Requested To Call .
                            </p>
                            <p>
                                Bank Leased 5 Year plan 2013 Honda Civic 1.8 Vti Oriel Prosmatec Automatic ( New Shape ) Attractive Silver Color 1 year installments paid Lahore Reg number Well Maintained Insurance + tracker etc included Options: Sunroof
                            </p>
                        </div>
                        <div class="clearfix">
</div>
                    </div>
                    <div class="clearfix">
</div>

                    <img alt="" class="center-block margin-top-30 margin-bottom-30" src="{!! url('portal_/images/advertise-728x90.jpg') !!}">

                </div>
                <!-- Single Ad End -->
                --}}
                <!-- Price Alert -->
                    <div class="alert-box-container  margin-top-30">
                        <div class="well">
                            <h3>Create Alert</h3>
                            <p>Receive emails for the latest ads matching your search criteria</p>
                            <form>
                                <div class="row">
                                    <div class="col-md-5 col-xs-12 col-sm-12">
                                        <input placeholder="Enter Your Email " type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4 col-xs-12 col-sm-12">
                                        <select class="alerts">
                                            <option value="1">Daily</option>
                                            <option value="7">Weekly</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-xs-12 col-sm-12">
                                        <input class="btn btn-theme btn-block" value="Submit" type="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Price Alert End -->
                    {{--
             <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
             <div class="grid-panel margin-top-30">
                 <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12">
                         <h3 class="main-title text-left">
                             Related Ads
                         </h3>
                     </div>
                 </div>
                 <!-- Ads Archive -->
                 <div class="posts-masonry">
                     <div class="col-md-12 col-xs-12 col-sm-12">
                         <!-- Ads Listing -->
                         <div class="ads-list-archive">
                             <!-- Image Block -->
                             <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                                 <!-- Img Block -->
                                 <div class="ad-archive-img">
                                     <a href="#">
                                         <div class="ribbon popular">
</div>
                                         <img class="img-responsive" src="{!! url('portal_/images/posting/10.jpg') !!}" alt="">
                                     </a>
                                 </div>
                                 <!-- Img Block -->
                             </div>
                             <!-- Ads Listing -->
                             <div class="clearfix visible-xs-block">
</div>
                             <!-- Content Block -->
                             <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                                 <!-- Ad Desc -->
                                 <div class="ad-archive-desc">
                                     <!-- Price -->
                                     <div class="horse-special-price">$38,000</div>
                                     <!-- Title -->
                                     <h3>2013 BMW M3 GTR </h3>
                                     <!-- Category -->
                                     <div class="category-title">
<span>
<a href="#">Car & Bikes</a>
</span>
</div>
                                     <!-- Short Description -->
                                     <div class="clearfix visible-xs-block">
</div>
                                     <p class="hidden-sm">Lorem ipsum dolor sit amet, quem convenire interesset
                                         ut vix, maiestatis inciderint no, eos in elit dicat.....</p>
                                     <!-- Ad Features -->
                                     <ul class="add_info">
                                         <!-- Contact Details -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i class="fa fa-phone">
</i>
</span>
                                                 <div class="tooltip-content">
                                                     <h4>Call Timings</h4>
                                                     <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                                     <br>
<strong>Saturday</strong> 09.00 AM - 5.30 PM
                                                     <br>
<strong>Sunday</strong>
<span
                                                             class="label label-success">+92-123-4567</span>
                                                 </div>
                                             </div>
                                         </li>
                                         <!-- Address -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i
                                                             class="fa fa-map-marker">
</i>
</span>
                                                 <div class="tooltip-content">
                                                     <h4>Address</h4>
                                                     Musee du Louvre, 75058 Paris - France
                                                 </div>
                                             </div>
                                         </li>
                                         <!-- Ad Type -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i class="fa fa-cog">
</i>
</span>
                                                 <div class="tooltip-content">
<strong>Condition</strong>
<span
                                                             class="label label-danger">Used</span>
</div>
                                             </div>
                                         </li>
                                         <!-- Ad Type -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i class="fa fa-check-square-o">
</i>
</span>
                                                 <div class="tooltip-content">
<strong>Warrinty</strong>
<span
                                                             class="label label-danger">No </span>
</div>
                                             </div>
                                         </li>
                                     </ul>
                                     <!-- Ad History -->
                                     <div class="clearfix archive-history">
                                         <div class="last-updated">Last Updated: 1 day ago</div>
                                         <div class="ad-meta">
<a class="btn save-ad">
<i
                                                         class="fa fa-heart-o">
</i> Save Ad.</a>
<a
                                                     class="btn btn-success">
<i class="fa fa-phone">
</i> View
                                                 Details.</a>
</div>
                                     </div>
                                 </div>
                                 <!-- Ad Desc End -->
                             </div>
                             <!-- Content Block End -->
                         </div>
                         <!-- Ads Listing -->
                         <div class="ads-list-archive">
                             <!-- Image Block -->
                             <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                                 <!-- Img Block -->
                                 <div class="ad-archive-img">
                                     <a href="#">
                                         <div class="ribbon popular">
</div>
                                         <img class="img-responsive" src="{!! url('portal_/images/posting/9.jpg') !!}" alt="">
                                     </a>
                                 </div>
                                 <!-- Img Block -->
                             </div>
                             <!-- Ads Listing -->
                             <div class="clearfix visible-xs-block">
</div>
                             <!-- Content Block -->
                             <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                                 <!-- Ad Desc -->
                                 <div class="ad-archive-desc">
                                     <!-- Price -->
                                     <div class="horse-special-price">$500</div>
                                     <!-- Title -->
                                     <h3>Honda Civic 2017 Sports Edition</h3>
                                     <!-- Category -->
                                     <div class="category-title">
<span>
<a href="#">Car & Bikes</a>
</span>
</div>
                                     <!-- Short Description -->
                                     <div class="clearfix visible-xs-block">
</div>
                                     <p class="hidden-sm">Lorem ipsum dolor sit amet, quem convenire interesset
                                         ut vix, maiestatis inciderint no, eos in elit dicat.....</p>
                                     <!-- Ad Features -->
                                     <ul class="add_info">
                                         <!-- Contact Details -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i class="fa fa-phone">
</i>
</span>
                                                 <div class="tooltip-content">
                                                     <h4>Call Timings</h4>
                                                     <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                                     <br>
<strong>Saturday</strong> 09.00 AM - 5.30 PM
                                                     <br>
<strong>Sunday</strong>
<span
                                                             class="label label-success">+92-123-4567</span>
                                                 </div>
                                             </div>
                                         </li>
                                         <!-- Address -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i
                                                             class="fa fa-map-marker">
</i>
</span>
                                                 <div class="tooltip-content">
                                                     <h4>Address</h4>
                                                     Musee du Louvre, 75058 Paris - France
                                                 </div>
                                             </div>
                                         </li>
                                         <!-- Ad Type -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i class="fa fa-cog">
</i>
</span>
                                                 <div class="tooltip-content">
<strong>Condition</strong>
<span
                                                             class="label label-danger">Used</span>
</div>
                                             </div>
                                         </li>
                                         <!-- Ad Type -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i class="fa fa-check-square-o">
</i>
</span>
                                                 <div class="tooltip-content">
<strong>Warrinty</strong>
<span
                                                             class="label label-danger">No </span>
</div>
                                             </div>
                                         </li>
                                     </ul>
                                     <!-- Ad History -->
                                     <div class="clearfix archive-history">
                                         <div class="last-updated">Last Updated: 1 day ago</div>
                                         <div class="ad-meta">
<a class="btn save-ad">
<i
                                                         class="fa fa-heart-o">
</i> Save Ad.</a>
<a
                                                     class="btn btn-success">
<i class="fa fa-phone">
</i> View
                                                 Details.</a>
</div>
                                     </div>
                                 </div>
                                 <!-- Ad Desc End -->
                             </div>
                             <!-- Content Block End -->
                         </div>
                         <!-- Ads Listing -->
                         <div class="ads-list-archive">
                             <!-- Image Block -->
                             <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                                 <!-- Img Block -->
                                 <div class="ad-archive-img">
                                     <a href="#">
                                         <div class="ribbon popular">
</div>
                                         <img class="img-responsive" src="{!! url('portal_/images/posting/2.jpg') !!}" alt="">
                                     </a>
                                 </div>
                                 <!-- Img Block -->
                             </div>
                             <!-- Ads Listing -->
                             <div class="clearfix visible-xs-block">
</div>
                             <!-- Content Block -->
                             <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                                 <!-- Ad Desc -->
                                 <div class="ad-archive-desc">
                                     <!-- Price -->
                                     <div class="horse-special-price">$449</div>
                                     <!-- Title -->
                                     <h3>Sony Cyber-shot 20.2-Megapixel</h3>
                                     <!-- Category -->
                                     <div class="category-title">
<span>
<a href="#">Art & Toys </a>
</span>
</div>
                                     <!-- Short Description -->
                                     <div class="clearfix visible-xs-block">
</div>
                                     <p class="hidden-sm">Lorem ipsum dolor sit amet, quem convenire interesset
                                         ut vix, maiestatis inciderint no, eos in elit dicat.....</p>
                                     <!-- Ad Features -->
                                     <ul class="add_info">
                                         <!-- Contact Details -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i class="fa fa-phone">
</i>
</span>
                                                 <div class="tooltip-content">
                                                     <h4>Call Timings</h4>
                                                     <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                                     <br>
<strong>Saturday</strong> 09.00 AM - 5.30 PM
                                                     <br>
<strong>Sunday</strong>
<span
                                                             class="label label-success">+92-123-4567</span>
                                                 </div>
                                             </div>
                                         </li>
                                         <!-- Address -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i
                                                             class="fa fa-map-marker">
</i>
</span>
                                                 <div class="tooltip-content">
                                                     <h4>Address</h4>
                                                     Musee du Louvre, 75058 Paris - France
                                                 </div>
                                             </div>
                                         </li>
                                         <!-- Ad Type -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i class="fa fa-cog">
</i>
</span>
                                                 <div class="tooltip-content">
<strong>Condition</strong>
<span
                                                             class="label label-danger">Used</span>
</div>
                                             </div>
                                         </li>
                                         <!-- Ad Type -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i class="fa fa-check-square-o">
</i>
</span>
                                                 <div class="tooltip-content">
<strong>Warrinty</strong>
<span
                                                             class="label label-danger">No </span>
</div>
                                             </div>
                                         </li>
                                     </ul>
                                     <!-- Ad History -->
                                     <div class="clearfix archive-history">
                                         <div class="last-updated">Last Updated: 1 day ago</div>
                                         <div class="ad-meta">
<a class="btn save-ad">
<i
                                                         class="fa fa-heart-o">
</i> Save Ad.</a>
<a
                                                     class="btn btn-success">
<i class="fa fa-phone">
</i> View
                                                 Details.</a>
</div>
                                     </div>
                                 </div>
                                 <!-- Ad Desc End -->
                             </div>
                             <!-- Content Block End -->
                         </div>
                         <!-- Ads Listing -->
                         <div class="ads-list-archive">
                             <!-- Image Block -->
                             <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                                 <!-- Img Block -->
                                 <div class="ad-archive-img">
                                     <a href="#">
<img class="img-responsive" src="{!! url('portal_/images/posting/1.jpg') !!}" alt="">
                                     </a>
                                 </div>
                                 <!-- Img Block -->
                             </div>
                             <!-- Ads Listing -->
                             <div class="clearfix visible-xs-block">
</div>
                             <!-- Content Block -->
                             <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                                 <!-- Ad Desc -->
                                 <div class="ad-archive-desc">
                                     <!-- Price -->
                                     <div class="horse-special-price">$350</div>
                                     <!-- Title -->
                                     <h3>Sony Xperia Z5 Waterproof</h3>
                                     <!-- Category -->
                                     <div class="category-title">
<span>
<a href="#">Mobiles</a>
</span>
</div>
                                     <!-- Short Description -->
                                     <div class="clearfix visible-xs-block">
</div>
                                     <p class="hidden-sm">Lorem ipsum dolor sit amet, quem convenire interesset
                                         ut vix, maiestatis inciderint no, eos in elit dicat.....</p>
                                     <!-- Ad Features -->
                                     <ul class="add_info">
                                         <!-- Contact Details -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i class="fa fa-phone">
</i>
</span>
                                                 <div class="tooltip-content">
                                                     <h4>Call Timings</h4>
                                                     <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                                     <br>
<strong>Saturday</strong> 09.00 AM - 5.30 PM
                                                     <br>
<strong>Sunday</strong>
<span
                                                             class="label label-success">+92-123-4567</span>
                                                 </div>
                                             </div>
                                         </li>
                                         <!-- Address -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i
                                                             class="fa fa-map-marker">
</i>
</span>
                                                 <div class="tooltip-content">
                                                     <h4>Address</h4>
                                                     Musee du Louvre, 75058 Paris - France
                                                 </div>
                                             </div>
                                         </li>
                                         <!-- Ad Type -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i class="fa fa-cog">
</i>
</span>
                                                 <div class="tooltip-content">
<strong>Condition</strong>
<span
                                                             class="label label-danger">Used</span>
</div>
                                             </div>
                                         </li>
                                         <!-- Ad Type -->
                                         <li>
                                             <div class="custom-tooltip tooltip-effect-4">
                                                 <span class="tooltip-item">
<i class="fa fa-check-square-o">
</i>
</span>
                                                 <div class="tooltip-content">
<strong>Warrinty</strong>
<span
                                                             class="label label-danger">No </span>
</div>
                                             </div>
                                         </li>
                                     </ul>
                                     <!-- Ad History -->
                                     <div class="clearfix archive-history">
                                         <div class="last-updated">Last Updated: 1 day ago</div>
                                         <div class="ad-meta">
<a class="btn save-ad">
<i
                                                         class="fa fa-heart-o">
</i> Save Ad.</a>
<a
                                                     class="btn btn-success">
<i class="fa fa-phone">
</i> View
                                                 Details.</a>
</div>
                                     </div>
                                 </div>
                                 <!-- Ad Desc End -->
                             </div>
                             <!-- Content Block End -->
                         </div>
                         <img alt="" class="center-block margin-top-30 margin-bottom-30"
                              src="{!! url('portal_/images/advertise-728x90.jpg') !!}">
                     </div>
                 </div>


             </div>

             <!-- =-=-=-=-=-=-= Latest Ads End =-=-=-=-=-=-= -->
                             --}}
                </div>
                <!-- Middle Content Area  End -->

                <!-- =-=-=-=-=-=-= Advertizing Sidebar =-=-=-=-=-=-= -->
                <div class="col-md-2 col-sm-2 hidden-xs hidden-sm rightbar-stick">
                    <div class="theiaStickySidebar">
                        <img alt="" src="{!! url('portal_/images/160x600.png') !!}">
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
    <footer>
        <!-- Footer Content -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3  col-sm-6 col-xs-12">
                        <!-- Info Widget -->
                        <div class="widget">
                            <div class="logo">
                                <img alt="" src="{!! url('portal_/images/logo-1.png') !!}">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et dolor eget erat
                                fringilla port.</p>
                            <ul>
                                <li>
                                    <img src="{!! url('portal_/images/appstore.png') !!}" alt="">
                                </li>
                                <li>
                                    <img src="{!! url('portal_/images/googleplay.png') !!}" alt="">
                                </li>
                            </ul>
                        </div>
                        <!-- Info Widget Exit -->
                    </div>
                    <div class="col-md-3  col-sm-6 col-xs-12">
                        <!-- Follow Us -->
                        <div class="widget socail-icons">
                            <h5>Follow Us</h5>
                            <ul>
                                <li>
                                    <a class="fb" href="">
                                        <i class="fa fa-facebook">
                                        </i>
                                    </a>
                                    <span>Facebook</span>
                                </li>
                                <li>
                                    <a class="twitter" href="">
                                        <i class="fa fa-twitter">
                                        </i>
                                    </a>
                                    <span>Twitter</span>
                                </li>
                                <li>
                                    <a class="linkedin" href="">
                                        <i class="fa fa-linkedin">
                                        </i>
                                    </a>
                                    <span>Linkedin</span>
                                </li>
                                <li>
                                    <a class="googleplus" href="">
                                        <i
                                                class="fa fa-google-plus">
                                        </i>
                                    </a>
                                    <span>Google+</span>
                                </li>
                            </ul>
                        </div>
                        <!-- Follow Us End -->
                    </div>
                    <div class="col-md-6  col-sm-6 col-xs-12">
                        <!-- Newslatter -->
                        <div class="widget widget-newsletter">
                            <h5>Singup fffffffffffff</h5>
                            <div class="fieldset">
                                <p>We may send you information about related events, webinars, products and services
                                    which we believe.</p>
                                <form>
                                    <input class="" value="Enter your email address" type="text">
                                    <input class="submit-btn" name="submit" value="Submit" type="submit">
                                </form>
                            </div>
                        </div>
                        <!-- Newslatter -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyrights -->
        <div class="copyrights">
            <div class="container">
                <div class="copyright-content">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {{--
                            <p>© 2017 AForest All rights reserved. Design by <a
                                        href="http://themeforest.net/user/scriptsbundle/portfolio" target="_blank">Scriptsbundle</a>
                            </p>
                            --}}
                            <p>© {!! Funciones::CurrentYear()!!} HorsesWorldSales
                                {{--
                                <a
                                        href="#" >Scriptsbundle</a>
                                --}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
</div>
<!-- Main Content Area End -->
<!-- Post Ad Sticky -->{{--
<a href="#" class="sticky-post-button hidden-xs">
         <span class="sell-icons">
         <i class="flaticon-transport-9">
</i>
         </span>
    <h4>SELL</h4>
</a>--}}
<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>

<!-- =-=-=-=-=-=-= Quote Modal =-=-=-=-=-=-= -->
<div class="modal fade price-quote" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span
                            class="sr-only">Close</span>
                </button>
                <h3 class="modal-title" id="lineModalLabel">Email for Price</h3>
            </div>
            <div class="modal-body">
                <div class="recent-ads">
                    <div class="recent-ads-list">
                        <div class="recent-ads-container">
                            <div class="recent-ads-list-image">
                                <a href="#" class="recent-ads-list-image-inner">
                                    <img src="{!! url('portal_/images/car.png') !!}" alt="">
                                </a>
                                <!-- /.recent-ads-list-image-inner -->
                            </div>
                            <!-- /.recent-ads-list-image -->
                            <div class="recent-ads-list-content">
                                <h3 class="recent-ads-list-title">
                                    <a href="#">{!! $horse->getName() !!}</a>
                                </h3>
                                <ul class="recent-ads-list-location">
                                    <li>
                                        <a href="#">New York</a>,
                                    </li>
                                    <li>
                                        <a href="#">Brooklyn</a>
                                    </li>
                                </ul>
                                <div class="recent-ads-list-price">
                                    {!! $precio !!} <i class="fa fa-eur">
                                    </i>
                                </div>
                                <!-- /.recent-ads-list-price -->
                            </div>
                            <!-- /.recent-ads-list-content -->
                        </div>
                        <!-- /.recent-ads-container -->
                    </div>
                </div>
                <!-- content goes here -->
                <form>
                    <div class="form-group  col-md-6  col-sm-6">
                        <label>Your Name</label>
                        <input type="text" class="form-control" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group  col-md-6  col-sm-6">
                        <label>Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group  col-md-12  col-sm-12">
                        <label>Contact No</label>
                        <input type="text" class="form-control" placeholder="Contact No">
                    </div>
                    <div class="form-group  col-md-12  col-sm-12">
                        <label>Comments</label>
                        <textarea placeholder="What is the price of the Honda Civic 2017 you have in your inventory?"
                                  rows="3" class="form-control">What is the price of the 2015 Honda Accord EX-L you have in your inventory?</textarea>
                    </div>
                    <div class="col-md-12  col-sm-12">
                        <img src="{!! url('portal_/images/captcha.gif') !!}" alt="" class="img-responsive">
                    </div>
                    <div class="clearfix">
                    </div>
                    <div class="col-md-12  col-sm-12 margin-bottom-20 margin-top-20">
                        <button type="submit" class="btn btn-theme btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- =-=-=-=-=-=-= Share Modal =-=-=-=-=-=-= -->
<div class="modal fade share-ad" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span
                            class="sr-only">Close</span>
                </button>
                <h3 class="modal-title">Share</h3>
            </div>
            <div class="modal-body">
                <div class="recent-ads">
                    <div class="recent-ads-list">
                        <div class="recent-ads-container">
                            <div class="recent-ads-list-image">
                                <a href="#" class="recent-ads-list-image-inner">
                                    <img src="{!! url('portal_/images/car.png') !!}" alt="">
                                </a>
                                <!-- /.recent-ads-list-image-inner -->
                            </div>
                            <!-- /.recent-ads-list-image -->
                            <div class="recent-ads-list-content">
                                <h3 class="recent-ads-list-title">
                                    <a href="#">{!! $horse->getName() !!}</a>
                                </h3>
                                <ul class="recent-ads-list-location">
                                    <li>
                                        <a href="#">New York</a>,
                                    </li>
                                    <li>
                                        <a href="#">Brooklyn</a>
                                    </li>
                                </ul>
                                <div class="recent-ads-list-price">
                                    {!! $precio !!} <i class="fa fa-eur">
                                    </i>
                                </div>
                                <!-- /.recent-ads-list-price -->
                            </div>
                            <!-- /.recent-ads-list-content -->
                        </div>
                        <!-- /.recent-ads-container -->
                    </div>
                </div>
                <h3>Descripcion</h3>
                {!! $horse->getDescripcion() !!}
                <h3>Link</h3>
                <p>
                    <a href="{!! route('portalcaballo',['slug'=>$horse->slug]) !!}">{!! route('portalcaballo',['slug'=>$horse->slug]) !!}</a>
                </p>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-fb btn-md">
                    <i class="fa fa-facebook">
                    </i>
                </a>
                <a class="btn btn-twitter btn-md">
                    <i class="fa fa-twitter">
                    </i>
                </a>
                <a class="btn btn-gplus btn-md">
                    <i class="fa fa-google-plus">
                    </i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- =-=-=-=-=-=-= Report Ad Modal =-=-=-=-=-=-= -->
<div class="modal fade report-quote" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span
                            class="sr-only">Close</span>
                </button>
                <h3 class="modal-title">Why are you reporting this ad?</h3>
            </div>
            <div class="modal-body">
                <!-- content goes here -->
                <form>
                    <div class="skin-minimal">
                        <div class="form-group col-md-6 col-sm-6">
                            <ul class="list">
                                <li>
                                    <input type="radio" id="spam" name="minimal-radio">
                                    <label for="spam">Spam</label>
                                </li>
                                <li>
                                    <input type="radio" id="duplicated" name="minimal-radio">
                                    <label for="duplicated">Duplicated</label>
                                </li>
                            </ul>
                        </div>
                        <div class="form-group  col-md-6 col-sm-6">
                            <ul class="list">
                                <li>
                                    <input type="radio" id="offensive" name="minimal-radio">
                                    <label for="offensive">Offensive</label>
                                </li>
                                <li>
                                    <input type="radio" id="expired" name="minimal-radio" checked>
                                    <label for="expired">Expired</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group  col-md-12 col-sm-12">
                        <label>Comments</label>
                        <textarea placeholder="This ad not belong to me" rows="3" class="form-control">This ad not belong to me</textarea>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <img src="{!! url('portal_/images/captcha.gif') !!}" alt="" class="img-responsive">
                    </div>
                    <div class="clearfix">
                    </div>
                    <div class="col-md-12 col-sm-12 margin-bottom-20 margin-top-20">
                        <button type="submit" class="btn btn-theme btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- =-=-=-=-=-=-= Ad Detail Modal =-=-=-=-=-=-= -->
<div class="sticky-ad-detail">
    <div class="container">
        <div class="col-md-7 col-sm-12 col-xs-12 no-padding">
            <div class="">
                <h3>{!! $horse->getName() !!}</h3>
                <div class="short-history">
                    <ul>
                        <li>Published on: <b>07 Oct 2017</b>
                        </li>
                        <li>Location: <b>London</b>
                        </li>
                        <li>Category: <b>
                                <a href="#">Used Cars</a>
                            </b>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5  col-sm-12 col-xs-12 no-padding">
            <div class="pull-left row">
                <div class="col-md-6 col-sm-6 col-xs-12 ">
                    <a href="javascript:void(0)" class="btn btn-block pull-left btn-phone number "
                       data-last="111111X">
                        <i class="fa fa-phone">
                        </i> 0320<span>XXXXXXX</span>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a data-toggle="modal" data-target=".price-quote" href="javascript:void(0)"
                       class="btn btn-block pull-left btn-message">
                        <i class="icon-envelope">
                        </i> Message Seller</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('portal.sidebar.foot')
<!-- For This Page Only -->
<script type="text/javascript">
    (function ($) {
        "use strict";

        /* ======= Show Number ======= */
        $('.number').click(function () {
            $(this).find('span').text($(this).data('last'));
        });

        /* ======= Ad Detail On Scroll ======= */
        //caches a jQuery object containing the header element
        var header = $(".sticky-ad-detail");
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 500) {
                header.addClass("show-sticky-ad-detail");
            } else {
                header.removeClass("show-sticky-ad-detail");
            }
        });
    })(jQuery);
    $(window).on('load', function () {
        $("select").select2({
            placeholder: "{!! trans('users.chooseone') !!}",
            allowClear: true,
            width: '100%'
        });
   });
</script>
</body>
</html>

