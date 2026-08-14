<!DOCTYPE html>
<html lang="en">
<head>
    @include('portal.sidebar.head')
</head>
<body>
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
    <div class="clearfix"></div>
</div>
<!-- =-=-=-=-=-=-= Colored Header =-=-=-=-=-=-= -->
<div class="colored-header">
    <!-- Top Bar -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Header Top Left -->
                <div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">
                    <ul class="listnone">
                        <li><a href="about.html"><i class="fa fa-heart-o" aria-hidden="true"></i> About</a></li>
                        <li><a href="faqs.html"><i class="fa fa-folder-open-o" aria-hidden="true"></i> FAQS</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe" aria-hidden="true"></i>
                                Language <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">Swedish</a></li>
                                <li><a href="#">Arabic</a></li>
                                <li><a href="#">Russian</a></li>
                                <li><a href="#">chinese</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Header Top Right Social -->
                <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
                    <div class="pull-right">
                        <ul class="listnone">
                            <li><a href="login.html"><i class="fa fa-sign-in"></i> Log in</a></li>
                            <li><a href="register.html"><i class="fa fa-unlock" aria-hidden="true"></i> Register</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false"><i class="icon-profile-male"
                                                                                 aria-hidden="true"></i> Umair <span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="profile.html">User Profile</a></li>
                                    <li><a href="profile-2.html">User Profile 2</a></li>
                                    <li><a href="archives.html">Archives</a></li>
                                    <li><a href="active-ads.html">Active Ads</a></li>
                                    <li><a href="pending-ads.html">Pending Ads</a></li>
                                    <li><a href="favourite.html">Favourite Ads</a></li>
                                    <li><a href="messages.html">Message Panel</a></li>
                                    <li><a href="deactive.html">Account Deactivation</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- Navigation Menu -->
    <nav id="menu-1" class="mega-menu">
        <!-- menu list items container -->
        <section class="menu-list-items">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <!-- menu logo -->
                        <ul class="menu-logo">
                            <li>
                                <a href="{!! route('portal') !!}"><img src="images/logo.png" alt="logo"> </a>
                            </li>
                        </ul>
                        <!-- menu links -->
                        <ul class="menu-links">
                            <!-- active class -->
                            <li>
                                <a href="javascript:void(0)"> Home <i class="fa fa-angle-down fa-indicator"></i></a>
                                <div class="drop-down grid-col-8">
                                    <!--grid row-->
                                    <div class="grid-row">
                                        <!--grid column 3-->
                                        <div class="grid-col-4">
                                            <ul>
                                                <li><a href="{!! route('portal') !!}">Home 1 - Default </a></li>
                                                <li><a href="index-transparent.html">Home 2 (Transparent)</a></li>
                                                <li><a href="index-2.html">Home 3 (Variation)</a></li>
                                                <li><a href="index-3.html">Home 4 (Master Slider)</a></li>
                                            </ul>
                                        </div>
                                        <div class="grid-col-4">
                                            <ul>
                                                <li><a href="index-4.html">Home 5 (With Map Listing)</a></li>
                                                <li><a href="index-5.html">Home 6 (Modern Style)</a></li>
                                                <li><a href="index-6.html">Home 7 (Variation)</a></li>
                                                <li><a href="index-7.html">Home 8 (Category Slider)</a></li>
                                            </ul>
                                        </div>
                                        <div class="grid-col-4">
                                            <ul>
                                                <li><a href="index-10.html">Home 11 (Modern Home)</a></li>
                                                <li><a href="index-8.html">Home 9 (Landing Page)</a></li>
                                                <li><a href="index-9.html">Home 10 (Variation)</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Listing <i class="fa fa-angle-down fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel">
                                    <li>
                                        <a href="javascript:void(0)">Grid Style<i
                                                    class="fa fa-angle-right fa-indicator"></i> <span
                                                    class="label label-info">New</span></a>
                                        <!-- drop down second level -->
                                        <ul class="drop-down-multilevel">
                                            <li><a href="listing.html">Listing Grid 1</a></li>
                                            <li><a href="listing-1.html">Listing Grid 2</a></li>
                                            <li><a href="listing-2.html">Listing Grid 3</a></li>
                                            <li><a href="listing-7.html">Listing Featured <span
                                                            class="label label-info">New</span></a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">List Style<i
                                                    class="fa fa-angle-right fa-indicator"></i> </a>
                                        <!-- drop down second level -->
                                        <ul class="drop-down-multilevel">
                                            <li><a href="listing-3.html">List View 1</a></li>
                                            <li><a href="listing-4.html">List View 2</a></li>
                                            <li><a href="listing-5.html">List View 3</a></li>
                                            <li><a href="listing-6.html">List View 4</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Single Ad<i
                                                    class="fa fa-angle-right fa-indicator"></i> <span
                                                    class="label label-info">New</span></a>
                                        <!-- drop down second level -->
                                        <ul class="drop-down-multilevel">
                                            <li><a href="single-page-listing.html">Single Ad Detail</a></li>
                                            <li><a href="single-page-listing-featured.html">Ad (Featured) <span
                                                            class="label label-info">New</span></a></li>
                                            <li><a href="single-page-listing-2.html">Single Ad 2</a></li>
                                            <li><a href="single-page-listing-3.html">Single Ad (Adsense)</a></li>
                                            <li><a href="single-page-expired.html">Single Ad (Closed)</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="icons.html">Classified Icons </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Categories <i
                                            class="fa fa-angle-down fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel">

                                    <li><a href="category-2.html">Modern Variation</a></li>
                                    <li><a href="category-3.html">Minimal Variation</a></li>
                                    <li><a href="category-4.html">Fancy Variation</a></li>

                                    <li><a href="category-6.html">Flat Variation</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Dashboard <i class="fa fa-angle-down fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel">
                                    <li><a href="profile.html">User Profile</a></li>
                                    <li><a href="profile-2.html">User Profile 2</a></li>
                                    <li><a href="archives.html">Archives</a></li>
                                    <li><a href="active-ads.html">Active Ads</a></li>
                                    <li><a href="pending-ads.html">Pending Ads</a></li>
                                    <li><a href="favourite.html">Favourite Ads</a></li>
                                    <li><a href="messages.html">Message Panel</a></li>
                                    <li><a href="deactive.html">Account Deactivation</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Pages <i class="fa fa-angle-down fa-indicator"></i></a>
                                <!-- drop down full width -->
                                <div class="drop-down grid-col-12">
                                    <!--grid row-->
                                    <div class="grid-row">
                                        <!--grid column 2-->
                                        <div class="grid-col-3">
                                            <h4>Blog</h4>
                                            <ul>
                                                <li><a href="blog.html">Blog With Right Sidebar</a></li>
                                                <li><a href="blog-1.html">Blog With Masonry Style</a></li>
                                                <li><a href="blog-2.html">Blog Without Sidebar</a></li>
                                                <li><a href="blog-details.html">Single Blog </a></li>
                                                <li><a href="blog-details-1.html">Single Blog (Adsense) </a></li>
                                            </ul>
                                        </div>
                                        <!--grid column 2-->
                                        <div class="grid-col-3">
                                            <h4>Miscellaneous</h4>
                                            <ul>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="cooming-soon.html">Comming Soon</a></li>
                                                <li><a href="elements.html">Shortcodes</a></li>
                                                <li><a href="error.html">404 Page</a></li>
                                                <li><a href="faqs.html">FAQS</a></li>
                                            </ul>
                                        </div>
                                        <!--grid column 2-->

                                        <div class="grid-col-3">
                                            <h4>Others</h4>
                                            <ul>
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="register.html">Register</a></li>
                                                <li><a href="pricing.html">Pricing</a></li>
                                                <li><a href="site-map.html">Site Map</a></li>
                                                <li><a href="{!! route('SuscripcionIndex') !!}">Post Ad</a></li>
                                            </ul>
                                        </div>
                                        <!--grid column 2-->
                                        <div class="grid-col-3">
                                            <h4>Detail Page</h4>
                                            <ul>
                                                <li><a href="post-ad-2.html">Post Ad 2</a></li>
                                                <li><a href="single-page-listing.html">Single Ad Detail</a></li>
                                                <li><a href="single-page-listing-2.html">Single Ad 2</a></li>
                                                <li><a href="single-page-listing-3.html">Single Ad (Adsense)</a></li>
                                                <li><a href="single-page-expired.html">Single Ad (Closed)</a></li>
                                            </ul>
                                        </div>
                                        <!--grid column 2-->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Drop Down <i class="fa fa-angle-down fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel">
                                    <li><a href="#">Item one</a></li>
                                    <li>
                                        <a href="javascript:void(0)">Items Right Side <i
                                                    class="fa fa-angle-right fa-indicator"></i> </a>
                                        <!-- drop down second level -->
                                        <ul class="drop-down-multilevel">
                                            <li>
                                                <a href="javascript:void(0)"> <i class="fa fa-buysellads"></i> Level 2
                                                    <i class="fa fa-angle-right fa-indicator"></i></a>
                                                <!-- drop down third level -->
                                                <ul class="drop-down-multilevel">
                                                    <li><a href="#">Level 3</a></li>
                                                    <li><a href="#">Level 3</a></li>
                                                    <li><a href="#">Level 3</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"> <i class="fa fa-dashcube"></i> Level 2 <i
                                                            class="fa fa-angle-right fa-indicator"></i></a>
                                                <!-- drop down third level -->
                                                <ul class="drop-down-multilevel">
                                                    <li><a href="#">Level 3</a></li>
                                                    <li><a href="#">Level 3</a></li>
                                                    <li><a href="#">Level 3</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"> <i class="fa fa-heartbeat"></i> Level 2 <i
                                                            class="fa fa-angle-right fa-indicator"></i></a>
                                                <!-- drop down third level -->
                                                <ul class="drop-down-multilevel">
                                                    <li><a href="#">Level 3</a></li>
                                                    <li><a href="#">Level 3</a></li>
                                                    <li><a href="#">Level 3</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"> <i class="fa fa-medium"></i> Level 2 <i
                                                            class="fa fa-angle-right fa-indicator"></i></a>
                                                <!-- drop down third level -->
                                                <ul class="drop-down-multilevel">
                                                    <li><a href="#">Level 3</a></li>
                                                    <li><a href="#">Level 3</a></li>
                                                    <li><a href="#">Level 3</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"> <i class="fa fa-leanpub"></i> Level 2 <i
                                                            class="fa fa-angle-right fa-indicator"></i> </a>
                                                <!-- drop down third level -->
                                                <ul class="drop-down-multilevel">
                                                    <li><a href="#">Level 3</a></li>
                                                    <li><a href="#">Level 3</a></li>
                                                    <li><a href="#">Level 3</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Item 2</a></li>
                                    <li>
                                        <a href="javascript:void(0)">Items Left Side <i
                                                    class="fa fa-angle-left fa-indicator"></i> </a>
                                        <!-- add class left-side -->
                                        <ul class="drop-down-multilevel left-side">
                                            <li>
                                                <a href="#"> <i class="fa fa-forumbee"></i> Level 2</a>
                                            </li>
                                            <li>
                                                <a href="#"> <i class="fa fa-hotel"></i> Level 2</a>
                                            </li>
                                            <li>
                                                <a href="#"> <i class="fa fa-automobile"></i> Level 2</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"> <i class="fa fa-heartbeat"></i> Level 2 <i
                                                            class="fa fa-plus fa-indicator"></i> </a>
                                                <!--drop down second level-->
                                                <ul class="drop-down-multilevel">
                                                    <li><a href="#">Level 3</a></li>
                                                    <li><a href="#">Level 3</a></li>
                                                    <li><a href="#">Level 3</a></li>
                                                    <li><a href="#">Level 3</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#"> <i class="fa fa-bookmark"></i> Level 2</a>
                                            </li>
                                            <li>
                                                <a href="#"> <i class="fa fa-bell"></i> Level 2</a>
                                            </li>
                                            <li>
                                                <a href="#"> <i class="fa fa-soccer-ball-o"></i> Level 2</a>
                                            </li>
                                            <li>
                                                <a href="#"> <i class="fa fa-life-ring"></i> Level 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Item 4</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact </a></li>
                        </ul>
                        <ul class="menu-search-bar">
                            <li>
                                <a href="{!! route('SuscripcionIndex') !!}" class="btn btn-light"><i class="fa fa-plus"
                                                                                  aria-hidden="true"></i> Post Free
                                    Ad</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </nav>
</div>
<!-- Navigation Menu End -->
<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
<!-- Small Breadcrumb -->
<div class="bread-2 page-header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-5 col-xs-12">
                <div class="header-page">
                    <h1>List View - 4</h1>
                </div>
            </div>
            <div class="col-md-4 col-sm-7 col-xs-12">
                <div class="small-breadcrumb">
                    <div class=" breadcrumb-link">
                        <ul>
                            <li><a href="{!! route('portal') !!}">{!! trans('portal.portal') !!}</a></li>
                            <li><a href="#">Pages</a></li>
                            <li><a href="elements.html">Category</a></li>
                            <li><a class="active" href="#">Listing</a></li>
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
    <section class="section-padding gray">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Middle Content Area -->
                <div class="col-md-8 col-lg-8 col-sx-12 white-bg">
                    <!-- Row -->
                    <div class="row">
                        <!-- Sorting Filters -->
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                            <!-- Sorting Filters Breadcrumb -->
                            <div class="filter-brudcrums">
                                <span>Showing <span class="showed">1 - 20</span> of <span class="showed">42211</span> results</span>
                                <div class="filter-brudcrums-sort">
                                    <ul>
                                        <li><span>Sort by:</span></li>
                                        <li><a href="#">Updated date</a></li>
                                        <li><a href="#">Price</a></li>
                                        <li><a href="#">New</a></li>
                                        <li><a href="#">Used</a></li>
                                        <li><a href="#">Warranty</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sorting Filters Breadcrumb End -->
                        </div>
                        <!-- Sorting Filters End-->
                        <div class="clearfix"></div>
                        <!-- Ads Archive -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <ul>
                                <!-- Ad Archive -->
                                <li class="ad">
                                    <div class="content-zone">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="img-zone">
                                                <img class="img-responsive" src="images/posting/9.jpg" alt="">
                                                <div class="quick-view"><a href="#ad-preview" data-toggle="modal"
                                                                           class="view-button"><i
                                                                class="fa fa-search"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="short-description-1 ">
                                                <!-- Category Title -->
                                                <div class="category-title"><span><a href="#">Sports &amp; Equipment</a></span>
                                                </div>
                                                <!-- Ad Title -->
                                                <h3>
                                                    <a title="" href="single-page-listing.html">Honda Civic 2017 Sports
                                                        Edition</a>
                                                </h3>
                                                <!-- Location -->
                                                <p class="location"><i class="fa fa-map-marker"></i> Houghton Street
                                                    London</p>
                                                <!-- Rating -->
                                                <div class="rating">
                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <span
                                                            class="rating-count">(5)</span>
                                                </div>
                                                <!-- Price --><span class="horse-special-price">$370</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Ad Archive -->
                                <li class="ad">
                                    <div class="content-zone">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="img-zone">
                                                <img class="img-responsive" src="images/posting/list-7.jpg" alt="">
                                                <div class="quick-view"><a href="#ad-preview" data-toggle="modal"
                                                                           class="view-button"><i
                                                                class="fa fa-search"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="short-description-1 ">
                                                <!-- Category Title -->
                                                <div class="category-title"><span><a href="#">Sports &amp; Equipment</a></span>
                                                </div>
                                                <!-- Ad Title -->
                                                <h3>
                                                    <a title="" href="single-page-listing.html">Rolex Yacht-Master
                                                        40</a>
                                                </h3>
                                                <!-- Location -->
                                                <p class="location"><i class="fa fa-map-marker"></i> Houghton Street
                                                    London</p>
                                                <!-- Rating -->
                                                <div class="rating">
                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i
                                                            class="fa fa-star-o"></i> <span
                                                            class="rating-count">(4)</span>
                                                </div>
                                                <!-- Price --><span class="horse-special-price">$110</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Ad Archive -->
                                <li class="ad">
                                    <div class="content-zone">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="img-zone">
                                                <img class="img-responsive" src="images/posting/7.jpg" alt="">
                                                <div class="quick-view"><a href="#ad-preview" data-toggle="modal"
                                                                           class="view-button"><i
                                                                class="fa fa-search"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="short-description-1 ">
                                                <!-- Category Title -->
                                                <div class="category-title"><span><a href="#">Sports &amp; Equipment</a></span>
                                                </div>
                                                <!-- Ad Title -->
                                                <h3>
                                                    <a title="" href="single-page-listing.html">Honda CBR 1000RR for
                                                        Sale</a>
                                                </h3>
                                                <!-- Location -->
                                                <p class="location"><i class="fa fa-map-marker"></i> Houghton Street
                                                    London</p>
                                                <!-- Rating -->
                                                <div class="rating">
                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star-o"></i> <span
                                                            class="rating-count">(4)</span>
                                                </div>
                                                <!-- Price --><span class="horse-special-price">$900</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Ad Archive -->
                                <li class="ad">
                                    <div class="content-zone">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="img-zone">
                                                <img class="img-responsive" src="images/posting/grid-1.jpg" alt="">
                                                <div class="quick-view"><a href="#ad-preview" data-toggle="modal"
                                                                           class="view-button"><i
                                                                class="fa fa-search"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="short-description-1 ">
                                                <!-- Category Title -->
                                                <div class="category-title"><span><a
                                                                href="#">Computer & Equipment</a></span></div>
                                                <!-- Ad Title -->
                                                <h3>
                                                    <a title="" href="single-page-listing.html">Gigabyte's Z170X
                                                        motherboard </a>
                                                </h3>
                                                <!-- Location -->
                                                <p class="location"><i class="fa fa-map-marker"></i> Houghton Street
                                                    London</p>
                                                <!-- Rating -->
                                                <div class="rating">
                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star-o"></i> <span
                                                            class="rating-count">(4)</span>
                                                </div>
                                                <!-- Price --><span class="horse-special-price">$215</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Ad Archive -->
                                <li class="ad">
                                    <div class="content-zone">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="img-zone">
                                                <img class="img-responsive" src="images/posting/mob-4.jpg" alt="">
                                                <div class="quick-view"><a href="#ad-preview" data-toggle="modal"
                                                                           class="view-button"><i
                                                                class="fa fa-search"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="short-description-1 ">
                                                <!-- Category Title -->
                                                <div class="category-title"><span><a href="#">Sports &amp; Equipment</a></span>
                                                </div>
                                                <!-- Ad Title -->
                                                <h3>
                                                    <a title="" href="single-page-listing.html">Apple iPhone 6s 64GB</a>
                                                </h3>
                                                <!-- Location -->
                                                <p class="location"><i class="fa fa-map-marker"></i> Houghton Street
                                                    London</p>
                                                <!-- Rating -->
                                                <div class="rating">
                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i
                                                            class="fa fa-star-o"></i> <span
                                                            class="rating-count">(2)</span>
                                                </div>
                                                <!-- Price --><span class="horse-special-price">$220</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Ad Archive -->
                                <li class="ad">
                                    <div class="content-zone">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="img-zone">
                                                <img class="img-responsive" src="images/posting/house-3.jpg" alt="">
                                                <div class="quick-view"><a href="#ad-preview" data-toggle="modal"
                                                                           class="view-button"><i
                                                                class="fa fa-search"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="short-description-1 ">
                                                <!-- Category Title -->
                                                <div class="category-title"><span><a href="#">Real Estate</a></span>
                                                </div>
                                                <!-- Ad Title -->
                                                <h3>
                                                    <a title="" href="single-page-listing.html">Brand New House For
                                                        Sale</a>
                                                </h3>
                                                <!-- Location -->
                                                <p class="location"><i class="fa fa-map-marker"></i> Houghton Street
                                                    London</p>
                                                <!-- Rating -->
                                                <div class="rating">
                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <span
                                                            class="rating-count">(5)</span>
                                                </div>
                                                <!-- Price --><span class="horse-special-price">$370</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Ad Archive -->
                                <li class="ad">
                                    <div class="content-zone">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="img-zone">
                                                <img class="img-responsive" src="images/posting/14.jpg" alt="">
                                                <div class="quick-view"><a href="#ad-preview" data-toggle="modal"
                                                                           class="view-button"><i
                                                                class="fa fa-search"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="short-description-1 ">
                                                <!-- Category Title -->
                                                <div class="category-title"><span><a href="#">Car & Bikes</a></span>
                                                </div>
                                                <!-- Ad Title -->
                                                <h3>
                                                    <a title="" href="single-page-listing.html">2010 Audi A5 Auto
                                                        quattro MY10 </a>
                                                </h3>
                                                <!-- Location -->
                                                <p class="location"><i class="fa fa-map-marker"></i> Houghton Street
                                                    London</p>
                                                <!-- Rating -->
                                                <div class="rating">
                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star-o"></i> <span
                                                            class="rating-count">(4)</span>
                                                </div>
                                                <!-- Price --><span class="horse-special-price">$205,000</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Ad Archive -->
                                <li class="ad">
                                    <div class="content-zone">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="img-zone">
                                                <img class="img-responsive" src="images/posting/lap-5.jpg" alt="">
                                                <div class="quick-view"><a href="#ad-preview" data-toggle="modal"
                                                                           class="view-button"><i
                                                                class="fa fa-search"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="short-description-1 ">
                                                <!-- Category Title -->
                                                <div class="category-title"><span><a href="#">Laptops</a></span></div>
                                                <!-- Ad Title -->
                                                <h3>
                                                    <a title="" href="single-page-listing.html">Dell Latitude e7440 </a>
                                                </h3>
                                                <!-- Location -->
                                                <p class="location"><i class="fa fa-map-marker"></i> Houghton Street
                                                    London</p>
                                                <!-- Rating -->
                                                <div class="rating">
                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i
                                                            class="fa fa-star-o"></i> <span
                                                            class="rating-count">(3)</span>
                                                </div>
                                                <!-- Price --><span class="horse-special-price">$370</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Ad Archive -->
                                <li class="ad">
                                    <div class="content-zone">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="img-zone">
                                                <img class="img-responsive" src="images/posting/mob-6.jpg" alt="">
                                                <div class="quick-view"><a href="#ad-preview" data-toggle="modal"
                                                                           class="view-button"><i
                                                                class="fa fa-search"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="short-description-1 ">
                                                <!-- Category Title -->
                                                <div class="category-title"><span><a href="#">Mobiles</a></span></div>
                                                <!-- Ad Title -->
                                                <h3>
                                                    <a title="" href="single-page-listing.html">Xperia Z5 Premium</a>
                                                </h3>
                                                <!-- Location -->
                                                <p class="location"><i class="fa fa-map-marker"></i> Houghton Street
                                                    London</p>
                                                <!-- Rating -->
                                                <div class="rating">
                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <span
                                                            class="rating-count">(5)</span>
                                                </div>
                                                <!-- Price --><span class="horse-special-price">$170</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Ad Archive -->
                                <li class="ad">
                                    <div class="content-zone">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="img-zone">
                                                <img class="img-responsive" src="images/posting/2.jpg" alt="">
                                                <div class="quick-view"><a href="#ad-preview" data-toggle="modal"
                                                                           class="view-button"><i
                                                                class="fa fa-search"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="short-description-1 ">
                                                <!-- Category Title -->
                                                <div class="category-title"><span><a href="#">Cameras</a></span></div>
                                                <!-- Ad Title -->
                                                <h3>
                                                    <a title="" href="single-page-listing.html">Digital Camera For
                                                        Sale</a>
                                                </h3>
                                                <!-- Location -->
                                                <p class="location"><i class="fa fa-map-marker"></i> Houghton Street
                                                    London</p>
                                                <!-- Rating -->
                                                <div class="rating">
                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star-o"></i> <span
                                                            class="rating-count">(4)</span>
                                                </div>
                                                <!-- Price --><span class="horse-special-price">$410</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <!-- Pagination -->
                            <div class="text-center margin-top-30 margin-bottom-30">
                                <ul class="pagination ">
                                    <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- Pagination End -->
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Middle Content Area  End -->
                <!-- Left Sidebar -->
                <div class="col-md-4 col-sm-12 col-sx-12">
                    <!-- Sidebar Widgets -->
                    <div class="sidebar">
                        <!-- Panel group -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <!-- Categories Panel -->
                            <div class="panel panel-default">
                                <!-- Heading -->
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <!-- Title -->
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="more-less glyphicon glyphicon-plus"></i>
                                            Categories
                                        </a>
                                    </h4>
                                    <!-- Title End -->
                                </div>
                                <!-- Content -->
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body categories">
                                        <ul>
                                            <li><a href="#"><i class="flaticon-data"></i>Electronics & Gedget<span>(1029)</span></a>
                                            </li>
                                            <li><a href="#"><i class="flaticon-transport-6"></i>Cars & Vehicles<span>(1228)</span></a>
                                            </li>
                                            <li><a href="#"><i class="flaticon-mortgage"></i>Property<span>(178)</span></a>
                                            </li>
                                            <li><a href="#"><i class="flaticon-technology-8"></i>Mobile & Tablets<span>(2178)</span></a>
                                            </li>
                                            <li><a href="#"><i class="flaticon-suitcase"></i>Jobs<span>(7178)</span></a>
                                            </li>
                                            <li><a href="#"><i class="flaticon-search"></i>Home &
                                                    Garden<span>(7163)</span></a></li>
                                            <li><a href="#"><i class="flaticon-dog"></i>Pets &
                                                    Animals<span>(8709)</span></a></li>
                                            <li><a href="#"><i class="flaticon-science"></i>Health &
                                                    Beauty<span>(3129)</span></a></li>
                                            <li><a href="#"><i class="flaticon-game"></i>Hobby, Sport &
                                                    Kids<span>(2019)</span></a></li>
                                            <li><a href="#"><i class="flaticon-food"></i>Food &
                                                    Agriculture<span>(323)</span></a></li>
                                            <li><a href="#"><i class="flaticon-blouse"></i>Women & Children Cloths<span>(425)</span></a>
                                            </li>
                                            <li><a href="#"><i class="flaticon-technology-22"></i>Cameras &
                                                    Security<span>(3223)</span></a></li>
                                            <li><a href="#"><i class="flaticon-technology-45"></i>Office Product<span>(3283)</span></a>
                                            </li>
                                            <li><a href="#"><i class="flaticon-wrench"></i>Arts, Crafts & Sewing<span>(3221)</span></a>
                                            </li>
                                            <li><a href="#"><i class="flaticon-cogwheel-2"></i>Others<span>(3129)</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Categories Panel End -->
                            <!-- Brands Panel -->
                            <div class="panel panel-default">
                                <!-- Heading -->
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                           aria-controls="collapseTwo">
                                            <i class="more-less glyphicon glyphicon-plus"></i>
                                            Brands
                                        </a>
                                    </h4>
                                </div>
                                <!-- Content -->
                                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <!-- Search -->
                                        <div class="search-widget">
                                            <input placeholder="search" type="text">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                        <!-- Brands List -->
                                        <div class="skin-minimal">
                                            <ul class="list">
                                                <li>
                                                    <input type="checkbox" id="minimal-checkbox-1">
                                                    <label for="minimal-checkbox-1">All Brands</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="minimal-checkbox-2">
                                                    <label for="minimal-checkbox-2">Samsung</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="minimal-checkbox-3">
                                                    <label for="minimal-checkbox-3">Apple</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="minimal-checkbox-4">
                                                    <label for="minimal-checkbox-4">Nokia</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="minimal-checkbox-5">
                                                    <label for="minimal-checkbox-5">Sony</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="minimal-checkbox-6">
                                                    <label for="minimal-checkbox-6">Blackberry</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="minimal-checkbox-7">
                                                    <label for="minimal-checkbox-7">HTC</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="minimal-checkbox-8">
                                                    <label for="minimal-checkbox-8">Motorola</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Brands List End -->
                                    </div>
                                </div>
                            </div>
                            <!-- Brands Panel End -->
                            <!-- Condition Panel -->
                            <div class="panel panel-default">
                                <!-- Heading -->
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                                           aria-controls="collapseThree">
                                            <i class="more-less glyphicon glyphicon-plus"></i>
                                            Condition
                                        </a>
                                    </h4>
                                </div>
                                <!-- Content -->
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <div class="skin-minimal">
                                            <ul class="list">
                                                <li>
                                                    <input tabindex="7" type="radio" id="minimal-radio-1"
                                                           name="minimal-radio">
                                                    <label for="minimal-radio-1">New</label>
                                                </li>
                                                <li>
                                                    <input tabindex="8" type="radio" id="minimal-radio-2"
                                                           name="minimal-radio" checked>
                                                    <label for="minimal-radio-2">Used</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Condition Panel End -->
                            <!-- Pricing Panel -->
                            <div class="panel panel-default">
                                <!-- Heading -->
                                <div class="panel-heading" role="tab" id="headingfour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapsefour" aria-expanded="false"
                                           aria-controls="collapsefour">
                                            <i class="more-less glyphicon glyphicon-plus"></i>
                                            Price
                                        </a>
                                    </h4>
                                </div>
                                <!-- Content -->
                                <div id="collapsefour" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingfour">
                                    <div class="panel-body">
                                        <span class="price-slider-value">Price ($) <span id="price-min"></span> - <span
                                                    id="price-max"></span></span>
                                        <div id="price-slider"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pricing Panel End -->
                            <!-- Featured Ads Panel -->
                            <div class="panel panel-default">
                                <!-- Heading -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a>
                                            Featured Ads
                                        </a>
                                    </h4>
                                </div>
                                <!-- Content -->
                                <div class="panel-collapse">
                                    <div class="panel-body recent-ads">
                                        <div class="featured-slider-3">
                                            <!-- Featured Ads -->
                                            <div class="item">
                                                <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                                    <!-- Ad Box -->
                                                    <div class="category-grid-box">
                                                        <!-- Ad Img -->
                                                        <div class="category-grid-img">
                                                            <img class="img-responsive" alt=""
                                                                 src="images/posting/car-3.jpg">
                                                            <!-- Ad Status -->
                                                            <!-- User Review -->
                                                            <div class="user-preview">
                                                                <a href="#"> <img src="images/users/2.jpg"
                                                                                  class="avatar avatar-small" alt="">
                                                                </a>
                                                            </div>
                                                            <!-- View Details --><a href="" class="view-details">View
                                                                Details</a>
                                                        </div>
                                                        <!-- Ad Img End -->
                                                        <div class="short-description">
                                                            <!-- Ad Category -->
                                                            <div class="category-title"><span><a
                                                                            href="#">Cars</a></span></div>
                                                            <!-- Ad Title -->
                                                            <h3><a title="" href="single-page-listing.html">2017 Honda
                                                                    Civic EX</a></h3>
                                                            <!-- Price -->
                                                            <div class="price">$18,200 <span class="negotiable">(Negotiable)</span>
                                                            </div>
                                                        </div>
                                                        <!-- Addition Info -->
                                                        <div class="ad-info">
                                                            <ul>
                                                                <li><i class="fa fa-map-marker"></i>London</li>
                                                                <li><i class="fa fa-clock-o"></i> 15 minutes ago</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Ad Box End -->
                                                </div>
                                            </div>
                                            <!-- Featured Ads -->
                                            <div class="item">
                                                <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                                    <!-- Ad Box -->
                                                    <div class="category-grid-box">
                                                        <!-- Ad Img -->
                                                        <div class="category-grid-img">
                                                            <img class="img-responsive" alt=""
                                                                 src="images/posting/fur-3.jpg">
                                                            <!-- Ad Status -->
                                                            <!-- User Review -->
                                                            <div class="user-preview">
                                                                <a href="#"> <img src="images/users/2.jpg"
                                                                                  class="avatar avatar-small" alt="">
                                                                </a>
                                                            </div>
                                                            <!-- View Details --><a href="" class="view-details">View
                                                                Details</a>
                                                        </div>
                                                        <!-- Ad Img End -->
                                                        <div class="short-description">
                                                            <!-- Ad Category -->
                                                            <div class="category-title"><span><a href="#">Cameras & Accessories</a></span>
                                                            </div>
                                                            <!-- Ad Title -->
                                                            <h3><a title="" href="single-page-listing.html">Office
                                                                    Furniture For Sale </a></h3>
                                                            <!-- Price -->
                                                            <div class="price">$250 <span class="negotiable">(Negotiable)</span>
                                                            </div>
                                                        </div>
                                                        <!-- Addition Info -->
                                                        <div class="ad-info">
                                                            <ul>
                                                                <li><i class="fa fa-map-marker"></i>London</li>
                                                                <li><i class="fa fa-clock-o"></i> 15 minutes ago</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Ad Box End -->
                                                </div>
                                            </div>
                                            <!-- Featured Ads -->
                                            <div class="item">
                                                <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                                    <!-- Ad Box -->
                                                    <div class="category-grid-box">
                                                        <!-- Ad Img -->
                                                        <div class="category-grid-img">
                                                            <img class="img-responsive" alt=""
                                                                 src="images/posting/mob-6.jpg">
                                                            <!-- Ad Status -->
                                                            <!-- User Review -->
                                                            <div class="user-preview">
                                                                <a href="#"> <img src="images/users/2.jpg"
                                                                                  class="avatar avatar-small" alt="">
                                                                </a>
                                                            </div>
                                                            <!-- View Details --><a href="" class="view-details">View
                                                                Details</a>
                                                        </div>
                                                        <!-- Ad Img End -->
                                                        <div class="short-description">
                                                            <!-- Ad Category -->
                                                            <div class="category-title"><span><a href="#">Cameras & Accessories</a></span>
                                                            </div>
                                                            <!-- Ad Title -->
                                                            <h3><a title="" href="single-page-listing.html">Sony Xperia
                                                                    Z5 </a></h3>
                                                            <!-- Price -->
                                                            <div class="price">$250 <span class="negotiable">(Negotiable)</span>
                                                            </div>
                                                        </div>
                                                        <!-- Addition Info -->
                                                        <div class="ad-info">
                                                            <ul>
                                                                <li><i class="fa fa-map-marker"></i>London</li>
                                                                <li><i class="fa fa-clock-o"></i> 15 minutes ago</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Ad Box End -->
                                                </div>
                                            </div>
                                            <!-- Featured Ads -->
                                            <div class="item">
                                                <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                                    <!-- Ad Box -->
                                                    <div class="category-grid-box">
                                                        <!-- Ad Img -->
                                                        <div class="category-grid-img">
                                                            <img class="img-responsive" alt=""
                                                                 src="images/posting/cam-2.jpg">
                                                            <!-- Ad Status -->
                                                            <!-- User Review -->
                                                            <div class="user-preview">
                                                                <a href="#"> <img src="images/users/2.jpg"
                                                                                  class="avatar avatar-small" alt="">
                                                                </a>
                                                            </div>
                                                            <!-- View Details --><a href="" class="view-details">View
                                                                Details</a>
                                                        </div>
                                                        <!-- Ad Img End -->
                                                        <div class="short-description">
                                                            <!-- Ad Category -->
                                                            <div class="category-title"><span><a href="#">Cameras & Accessories</a></span>
                                                            </div>
                                                            <!-- Ad Title -->
                                                            <h3><a title="" href="single-page-listing.html">Sony Xperia
                                                                    Z5 </a></h3>
                                                            <!-- Price -->
                                                            <div class="price">$250 <span class="negotiable">(Negotiable)</span>
                                                            </div>
                                                        </div>
                                                        <!-- Addition Info -->
                                                        <div class="ad-info">
                                                            <ul>
                                                                <li><i class="fa fa-map-marker"></i>London</li>
                                                                <li><i class="fa fa-clock-o"></i> 15 minutes ago</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Ad Box End -->
                                                </div>
                                            </div>
                                            <!-- Featured Ads -->
                                            <div class="item">
                                                <div class="col-md-12 col-xs-12 col-sm-12 no-padding">
                                                    <!-- Ad Box -->
                                                    <div class="category-grid-box">
                                                        <!-- Ad Img -->
                                                        <div class="category-grid-img">
                                                            <img class="img-responsive" alt=""
                                                                 src="images/posting/cam-2.jpg">
                                                            <!-- Ad Status -->
                                                            <!-- User Review -->
                                                            <div class="user-preview">
                                                                <a href="#"> <img src="images/users/2.jpg"
                                                                                  class="avatar avatar-small" alt="">
                                                                </a>
                                                            </div>
                                                            <!-- View Details --><a href="" class="view-details">View
                                                                Details</a>
                                                        </div>
                                                        <!-- Ad Img End -->
                                                        <div class="short-description">
                                                            <!-- Ad Category -->
                                                            <div class="category-title"><span><a href="#">Cameras & Accessories</a></span>
                                                            </div>
                                                            <!-- Ad Title -->
                                                            <h3><a title="" href="single-page-listing.html">Sony Xperia
                                                                    Z5 </a></h3>
                                                            <!-- Price -->
                                                            <div class="price">$250 <span class="negotiable">(Negotiable)</span>
                                                            </div>
                                                        </div>
                                                        <!-- Addition Info -->
                                                        <div class="ad-info">
                                                            <ul>
                                                                <li><i class="fa fa-map-marker"></i>London</li>
                                                                <li><i class="fa fa-clock-o"></i> 15 minutes ago</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Ad Box End -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Featured Ads Panel End -->
                            <!-- Latest Ads Panel -->
                            <div class="panel panel-default">
                                <!-- Heading -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a>
                                            Recent Ads
                                        </a>
                                    </h4>
                                </div>
                                <!-- Content -->
                                <div class="panel-collapse">
                                    <div class="panel-body recent-ads">
                                        <!-- Ads -->
                                        <div class="recent-ads-list">
                                            <div class="recent-ads-container">
                                                <div class="recent-ads-list-image">
                                                    <a href="#" class="recent-ads-list-image-inner">
                                                        <img src="images/posting/thumb-1.jpg" alt="">
                                                    </a><!-- /.recent-ads-list-image-inner -->
                                                </div>
                                                <!-- /.recent-ads-list-image -->
                                                <div class="recent-ads-list-content">
                                                    <h3 class="recent-ads-list-title">
                                                        <a href="#">Sony Xperia Z1</a>
                                                    </h3>
                                                    <ul class="recent-ads-list-location">
                                                        <li><a href="#">New York</a>,</li>
                                                        <li><a href="#">Brooklyn</a></li>
                                                    </ul>
                                                    <div class="recent-ads-list-price">
                                                        $ 17,000
                                                    </div>
                                                    <!-- /.recent-ads-list-price -->
                                                </div>
                                                <!-- /.recent-ads-list-content -->
                                            </div>
                                            <!-- /.recent-ads-container -->
                                        </div>
                                        <!-- Ads -->
                                        <div class="recent-ads-list">
                                            <div class="recent-ads-container">
                                                <div class="recent-ads-list-image">
                                                    <a href="#" class="recent-ads-list-image-inner">
                                                        <img src="images/posting/thumb-2.jpg" alt="">
                                                    </a><!-- /.recent-ads-list-image-inner -->
                                                </div>
                                                <!-- /.recent-ads-list-image -->
                                                <div class="recent-ads-list-content">
                                                    <h3 class="recent-ads-list-title">
                                                        <a href="#">2017 BMW i8</a>
                                                    </h3>
                                                    <ul class="recent-ads-list-location">
                                                        <li><a href="#">New York</a>,</li>
                                                        <li><a href="#">Brooklyn</a></li>
                                                    </ul>
                                                    <div class="recent-ads-list-price">
                                                        $ 66,000
                                                    </div>
                                                    <!-- /.recent-ads-list-price -->
                                                </div>
                                                <!-- /.recent-ads-list-content -->
                                            </div>
                                            <!-- /.recent-ads-container -->
                                        </div>
                                        <!-- Ads -->
                                        <div class="recent-ads-list">
                                            <div class="recent-ads-container">
                                                <div class="recent-ads-list-image">
                                                    <a href="#" class="recent-ads-list-image-inner">
                                                        <img src="images/posting/thumb-3.jpg" alt="">
                                                    </a><!-- /.recent-ads-list-image-inner -->
                                                </div>
                                                <!-- /.recent-ads-list-image -->
                                                <div class="recent-ads-list-content">
                                                    <h3 class="recent-ads-list-title">
                                                        <a href="#">Dell Latitude e7440</a>
                                                    </h3>
                                                    <ul class="recent-ads-list-location">
                                                        <li><a href="#">New York</a>,</li>
                                                        <li><a href="#">Brooklyn</a></li>
                                                    </ul>
                                                    <div class="recent-ads-list-price">
                                                        $ 37,000
                                                    </div>
                                                    <!-- /.recent-ads-list-price -->
                                                </div>
                                                <!-- /.recent-ads-list-content -->
                                            </div>
                                            <!-- /.recent-ads-container -->
                                        </div>
                                        <!-- Ads -->
                                        <div class="recent-ads-list">
                                            <div class="recent-ads-container">
                                                <div class="recent-ads-list-image">
                                                    <a href="#" class="recent-ads-list-image-inner">
                                                        <img src="images/posting/thumb-4.jpg" alt="">
                                                    </a><!-- /.recent-ads-list-image-inner -->
                                                </div>
                                                <!-- /.recent-ads-list-image -->
                                                <div class="recent-ads-list-content">
                                                    <h3 class="recent-ads-list-title">
                                                        <a href="#">Sport Stylish Steering</a>
                                                    </h3>
                                                    <ul class="recent-ads-list-location">
                                                        <li><a href="#">New York</a>,</li>
                                                        <li><a href="#">Brooklyn</a></li>
                                                    </ul>
                                                    <div class="recent-ads-list-price">
                                                        $ 11,000
                                                    </div>
                                                    <!-- /.recent-ads-list-price -->
                                                </div>
                                                <!-- /.recent-ads-list-content -->
                                            </div>
                                            <!-- /.recent-ads-container -->
                                        </div>
                                        <!-- Ads -->
                                        <div class="recent-ads-list">
                                            <div class="recent-ads-container">
                                                <div class="recent-ads-list-image">
                                                    <a href="#" class="recent-ads-list-image-inner">
                                                        <img src="images/posting/thumb-5.jpg" alt="">
                                                    </a><!-- /.recent-ads-list-image-inner -->
                                                </div>
                                                <!-- /.recent-ads-list-image -->
                                                <div class="recent-ads-list-content">
                                                    <h3 class="recent-ads-list-title">
                                                        <a href="#">Apple Wrist Watches</a>
                                                    </h3>
                                                    <ul class="recent-ads-list-location">
                                                        <li><a href="#">New York</a>,</li>
                                                        <li><a href="#">Brooklyn</a></li>
                                                    </ul>
                                                    <div class="recent-ads-list-price">
                                                        $ 20,000
                                                    </div>
                                                    <!-- /.recent-ads-list-price -->
                                                </div>
                                                <!-- /.recent-ads-list-content -->
                                            </div>
                                            <!-- /.recent-ads-container -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Latest Ads Panel End -->
                        </div>
                        <!-- panel-group end -->
                    </div>
                    <!-- Sidebar Widgets End -->
                </div>
                <!-- Left Sidebar End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
@include('portal.sidebar.foot')
</body>
</html>

