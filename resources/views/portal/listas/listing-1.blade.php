<?php $horses = Horse::where('id','!=',0)->get(); ?>
@extends('portal.base')
@section('content')
    <style>.h-246{
            height: 313px;
        }</style>
    <section class="section-padding gray">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Middle Content Area -->
                <div class="col-md-8 col-md-push-4 col-lg-8 col-sx-12 white-bg">
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
                        <div class="posts-masonry">
                            <?php $j=0; ?>
                            @foreach($horses as $k=>$v)

                                @php
                                    $foto = $v->getPhotoModel()->first();
                                    $url = (!empty($foto))?$foto->getUrl():'';
                                    $rd = rand(0,3);
                                    $color = $v->getColorString();
                                    $link ="#!";
                                    $titulo = $v->getName();
                                    $precio = Funciones::AjustarNumeroMil($v->getPrice());
                                    $raza = $v->getRaza();
                                    $alzada = $v->getRaisedFormat();
                                    $edad = $v->getAge();
                                    //$color = (!empty($color))?$color->name:null;
                                    //$link =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->id]);
                                    //if($venta == 1) $link =route('MySellDetailSell',['stud'=>$stud->slug,'horse'=>$v->id]);
                                    $photo = $v->getPhotoModel();
                                @endphp

                                @if($j== 4)
                                    {{--Aviso publicitario--}}
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                        <section class="advertising">
                                            <a href="{!! route('SuscripcionIndex') !!}">
                                                <div class="banner">
                                                    <div class="wrapper">
                                                        <span class="title">Do you want your property to be listed here?</span>
                                                        <span class="submit">Submit it now! <i
                                                                    class="fa fa-plus-square"></i></span>
                                                    </div>
                                                </div>
                                                <!-- /.banner-->
                                            </a>
                                        </section>
                                    </div>
                                    <?php $j=0; ?>
                                @endif
                                <?php $j++; ?>

                            <!-- Listing Ad Grid -->
                                <div class="col-md-6 col-xs-12 col-sm-6">
                                    <!-- Ad Box -->
                                    <div class="category-grid-box">
                                        <!-- Ad Img -->
                                        <div class="category-grid-img">
                                            <figure class="h-246">
                                            @if(!empty($photo) && count($photo)!=0)
                                                <img class="img-responsive" alt=""
                                                     src="{!! $photo[0]->getUrl() !!}"
                                                     style="    min-height: 313px; margin: auto !important; ">
                                            @else
                                                <img class="img-responsive" alt=""
                                                     src="{!! url('portal_/images/posting/car-3.jpg') !!}"
                                                     style="    min-height: 313px; margin: auto !important; ">
                                        @endif
                                            </figure>
                                        <!-- Ad Status -->
                                            <span class="ad-status">
                                            Featured
                                        </span>
                                            <!-- User Review -->
                                            <div class="user-preview">
                                                <a href="#">
                                                    <img src="{!! url('portal_/images/users/1.jpg') !!}"
                                                         class="avatar avatar-small"
                                                         alt="">
                                                </a>
                                            </div>

                                        <!-- View Details -->
                                            <a href="" class="view-details">
                                                View Details
                                            </a>
                                            <!-- Additional Info -->

                                            <div class="additional-information">
                                                <p> {!! $alzada !!}</p>
                                                <p> {!! trans('horse.razashort.'.$raza)!!}</p>
                                                <p> {!! $edad !!} {!! trans('horse.years') !!}</p>
                                            </div>
                                            <!-- Additional Info End-->
                                        </div>
                                        <!-- Ad Img End -->
                                        <div class="short-description">
                                            <!-- Ad Category -->
                                            <div class="category-title">
                                            <span>
                                                <a href="#">
                                                    Electronics & Gedgets
                                                </a>
                                            </span>
                                            </div>
                                            <!-- Ad Title -->
                                            <h3>
                                                <a title="" href="single-page-listing.html">
                                                    {!! $titulo !!}
                                                </a>
                                            </h3>
                                            <!-- Price -->
                                            <div class="price">
                                                {!! $precio !!}
                                                <span class="negotiable">
                                                (Negotiable)
                                            </span>
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
                            @endforeach
                            {{--
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <!-- Ad Box -->
                                <div class="category-grid-box">
                                    <!-- Ad Img -->
                                    <div class="category-grid-img">
                                        <img class="img-responsive" alt=""
                                             src="{!! url('portal_/images/posting/car-3.jpg') !!}">
                                        <!-- Ad Status --><span class="ad-status"> Featured </span>
                                        <!-- User Review -->
                                        <div class="user-preview">
                                            <a href="#"> <img src="{!! url('portal_/images/users/1.jpg') !!}"
                                                              class="avatar avatar-small"
                                                              alt=""> </a>
                                        </div>
                                        <!-- View Details --><a href="" class="view-details">View Details</a>
                                        <!-- Additional Info -->
                                        <div class="additional-information">
                                            <p>Registration 2017</p>
                                            <p> 3.0 Diesel</p>
                                            <p> 230 HP</p>
                                            <p> Body Coupe</p>
                                            <p> 80 000 Miles</p>
                                        </div>
                                        <!-- Additional Info End-->
                                    </div>
                                    <!-- Ad Img End -->
                                    <div class="short-description">
                                        <!-- Ad Category -->
                                        <div class="category-title"><span><a href="#">Electronics & Gedgets</a></span>
                                        </div>
                                        <!-- Ad Title -->
                                        <h3><a title="" href="single-page-listing.html">2017 Honda Civic EX</a></h3>
                                        <!-- Price -->
                                        <div class="price">$18,200 <span class="negotiable">(Negotiable)</span></div>
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
                            <!-- Listing Ad Grid -->
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <!-- Ad Box -->
                                <div class="category-grid-box">
                                    <!-- Ad Img -->
                                    <div class="category-grid-img">
                                        <img class="img-responsive" alt=""
                                             src="{!! url('portal_/images/posting/house-1.jpg') !!}">
                                        <!-- Ad Status --><span class="ad-status"> Featured </span>
                                        <!-- User Review -->
                                        <div class="user-preview">
                                            <a href="#"> <img src="{!! url('portal_/images/users/1.jpg') !!}"
                                                              class="avatar avatar-small"
                                                              alt=""> </a>
                                        </div>
                                        <!-- View Details --><a href="" class="view-details">View Details</a>
                                        <!-- Additional Info -->
                                        <div class="additional-information">
                                            <p>Size: 800 Sq. Ft</p>
                                            <p> 2 Beds</p>
                                            <p> 1 Full Bath</p>
                                            <p> Single Family</p>
                                            <p> Built in 2015</p>
                                        </div>
                                        <!-- Additional Info End-->
                                    </div>
                                    <!-- Ad Img End -->
                                    <div class="short-description">
                                        <!-- Ad Category -->
                                        <div class="category-title"><span><a href="#">Real Estate</a></span></div>
                                        <!-- Ad Title -->
                                        <h3><a title="" href="single-page-listing.html">Lorem ipsum dolor sit amet</a>
                                        </h3>
                                        <!-- Price -->
                                        <div class="price">$195,000 <span class="negotiable">(Negotiable)</span></div>
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
                            <!-- Listing Ad Grid -->
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <!-- Ad Box -->
                                <div class="category-grid-box">
                                    <!-- Ad Img -->
                                    <div class="category-grid-img">
                                        <img class="img-responsive" alt=""
                                             src="{!! url('portal_/images/posting/spo-3.jpg') !!}">
                                        <!-- Ad Status --><span class="ad-status"> Featured </span>
                                        <!-- User Review -->
                                        <div class="user-preview">
                                            <a href="#"> <img src="{!! url('portal_/images/users/3.jpg') !!}"
                                                              class="avatar avatar-small"
                                                              alt=""> </a>
                                        </div>
                                        <!-- View Details --><a href="" class="view-details">View Details</a>
                                        <!-- Additional Info -->
                                        <div class="additional-information">
                                            <p>Size: 800 Sq. Ft</p>
                                            <p> 2 Beds</p>
                                            <p> 1 Full Bath</p>
                                            <p> Single Family</p>
                                            <p> Built in 2015</p>
                                        </div>
                                        <!-- Additional Info End-->
                                    </div>
                                    <!-- Ad Img End -->
                                    <div class="short-description">
                                        <!-- Ad Category -->
                                        <div class="category-title"><span><a href="#">Sports & Equipment</a></span>
                                        </div>
                                        <!-- Ad Title -->
                                        <h3><a title="" href="single-page-listing.html">Vestibulum est nunc</a></h3>
                                        <!-- Price -->
                                        <button data-toggle="modal" data-target=".price-quote" class="btn btn-success">
                                            Email For Price
                                        </button>
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
                            <!-- Listing Ad Grid -->
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <!-- Ad Box -->
                                <div class="category-grid-box">
                                    <!-- Ad Img -->
                                    <div class="category-grid-img">
                                        <img class="img-responsive" alt=""
                                             src="{!! url('portal_/images/posting/look-1.jpg') !!}">
                                        <!-- Ad Status --><span class="ad-status"> Featured </span>
                                        <!-- User Review -->
                                        <div class="user-preview">
                                            <a href="#"> <img src="{!! url('portal_/images/users/1.jpg') !!}"
                                                              class="avatar avatar-small"
                                                              alt=""> </a>
                                        </div>
                                        <!-- View Details --><a href="" class="view-details">View Details</a>
                                        <!-- Additional Info -->
                                        <div class="additional-information">
                                            <p>26 y/o female, Scorpio</p>
                                            <p> Odessa, Ukraine</p>
                                            <p> English(Basic)</p>
                                            <p> Have no children</p>
                                            <p> Height: 5'6" - 5'7" (166-170cm)</p>
                                        </div>
                                        <!-- Additional Info End-->
                                    </div>
                                    <!-- Ad Img End -->
                                    <div class="short-description">
                                        <!-- Ad Category -->
                                        <div class="category-title"><span><a href="#">Looking For</a></span></div>
                                        <!-- Ad Title -->
                                        <h3><a title="" href="single-page-listing.html">Looking For Friendship</a></h3>
                                        <!-- Price -->
                                        <button data-toggle="modal" data-target=".price-quote" class="btn btn-success">
                                            <i class="fa fa-envelope-o"> </i>Send Message
                                        </button>
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
                            <!-- Advertizing -->
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <section class="advertising">
                                    <a href="{!! route('SuscripcionIndex') !!}">
                                        <div class="banner">
                                            <div class="wrapper">
                                                <span class="title">Do you want your property to be listed here?</span>
                                                <span class="submit">Submit it now! <i
                                                            class="fa fa-plus-square"></i></span>
                                            </div>
                                        </div>
                                        <!-- /.banner-->
                                    </a>
                                </section>
                            </div>
                            <!-- Advertizing End -->
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <!-- Ad Box -->
                                <div class="category-grid-box">
                                    <!-- Ad Img -->
                                    <div class="category-grid-img">
                                        <img class="img-responsive" alt=""
                                             src="{!! url('portal_/images/posting/mob-2.jpg') !!}">
                                        <!-- Ad Status -->
                                        <!-- User Review -->
                                        <div class="user-preview">
                                            <a href="#"> <img src="{!! url('portal_/images/users/2.jpg') !!}"
                                                              class="avatar avatar-small"
                                                              alt=""> </a>
                                        </div>
                                        <!-- View Details --><a href="" class="view-details">View Details</a>
                                        <!-- Additional Info -->
                                        <div class="additional-information">
                                            <p>Released 2015, November</p>
                                            <p> 5.5 inches</p>
                                            <p> 23 MP</p>
                                            <p>3GB RAM</p>
                                            <p> 3430mAh</p>
                                            <p> Android OS, v6.0</p>
                                        </div>
                                        <!-- Additional Info End-->
                                    </div>
                                    <!-- Ad Img End -->
                                    <div class="short-description">
                                        <!-- Ad Category -->
                                        <div class="category-title"><span><a href="#">Mobile Phones</a></span></div>
                                        <!-- Ad Title -->
                                        <h3><a title="" href="single-page-listing.html">Sony Xperia Z5 </a></h3>
                                        <!-- Price -->
                                        <div class="price">$250 <span class="negotiable">(Negotiable)</span></div>
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
                            <!-- Listing Ad Grid -->
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <!-- Ad Box -->
                                <div class="category-grid-box">
                                    <!-- Ad Img -->
                                    <div class="category-grid-img">
                                        <img class="img-responsive" alt=""
                                             src="{!! url('portal_/images/posting/lap-6.jpg') !!}">
                                        <!-- Ad Status -->
                                        <!-- User Review -->
                                        <div class="user-preview">
                                            <a href="#"> <img src="{!! url('portal_/images/users/4.jpg') !!}"
                                                              class="avatar avatar-small"
                                                              alt=""> </a>
                                        </div>
                                        <!-- View Details --><a href="" class="view-details">View Details</a>
                                        <!-- Additional Info -->
                                        <div class="additional-information">
                                            <p>13.3-inch </p>
                                            <p> 1.6GHz dual-core</p>
                                            <p> Intel HD Graphics 6000</p>
                                            <p>8GB Ram </p>
                                            <p>LED-backlit glossy widescreen</p>
                                        </div>
                                        <!-- Additional Info End-->
                                    </div>
                                    <!-- Ad Img End -->
                                    <div class="short-description">
                                        <!-- Ad Category -->
                                        <div class="category-title"><span><a href="#">Electronics & Gedgets</a></span>
                                        </div>
                                        <!-- Ad Title -->
                                        <h3><a title="" href="single-page-listing.html">Dell Inspiron 13 Core i7</a>
                                        </h3>
                                        <!-- Price -->
                                        <div class="price">$450 <span class="negotiable">(Negotiable)</span></div>
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
                            <!-- Listing Ad Grid -->
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <!-- Ad Box -->
                                <div class="category-grid-box">
                                    <!-- Ad Img -->
                                    <div class="category-grid-img">
                                        <img class="img-responsive" alt=""
                                             src="{!! url('portal_/images/posting/9.jpg') !!}">
                                        <!-- Ad Status --><span class="ad-status"> Featured </span>
                                        <!-- User Review -->
                                        <div class="user-preview">
                                            <a href="#"> <img src="{!! url('portal_/images/users/5.jpg') !!}"
                                                              class="avatar avatar-small"
                                                              alt=""> </a>
                                        </div>
                                        <!-- View Details --><a href="" class="view-details">View Details</a>
                                        <!-- Additional Info -->
                                        <div class="additional-information">
                                            <p>Registration 2017</p>
                                            <p> 3.0 Diesel</p>
                                            <p> 230 HP</p>
                                            <p> Body Coupe</p>
                                            <p> 80 000 Miles</p>
                                        </div>
                                        <!-- Additional Info End-->
                                    </div>
                                    <!-- Ad Img End -->
                                    <div class="short-description">
                                        <!-- Ad Category -->
                                        <div class="category-title"><span><a href="#">Electronics & Gedgets</a></span>
                                        </div>
                                        <!-- Ad Title -->
                                        <h3><a title="" href="single-page-listing.html">Audi A7 3.0T quattro
                                                Prestige</a></h3>
                                        <!-- Price -->
                                        <div class="price">$57,988</div>
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
                            <!-- Listing Ad Grid -->
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <!-- Ad Box -->
                                <div class="category-grid-box">
                                    <!-- Ad Img -->
                                    <div class="category-grid-img">
                                        <img class="img-responsive" alt=""
                                             src="{!! url('portal_/images/posting/cam-6.jpg') !!}">
                                        <!-- Ad Status -->
                                        <!-- User Review -->
                                        <div class="user-preview">
                                            <a href="#"> <img src="{!! url('portal_/images/users/2.jpg') !!}"
                                                              class="avatar avatar-small"
                                                              alt=""> </a>
                                        </div>
                                        <!-- View Details --><a href="" class="view-details">View Details</a>
                                        <!-- Additional Info -->
                                        <div class="additional-information">
                                            <p>20.1 MP 1" Exmor RS BSI CMOS Sensor </p>
                                            <p> BIONZ X Image Processor </p>
                                            <p> Internal UHD 4K</p>
                                            <p>3.0" 921.6k-Dot Tilting LCD Monitor </p>
                                            <p> Sony 16-50mm f/3.5-5.6 OSS Zoom Lens </p>
                                        </div>
                                        <!-- Additional Info End-->
                                    </div>
                                    <!-- Ad Img End -->
                                    <div class="short-description">
                                        <!-- Ad Category -->
                                        <div class="category-title"><span><a href="#">Cameras & Accessories</a></span>
                                        </div>
                                        <!-- Ad Title -->
                                        <h3><a title="" href="single-page-listing.html">Sony Xperia Z5 </a></h3>
                                        <!-- Price -->
                                        <div class="price">$250 <span class="negotiable">(Negotiable)</span></div>
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
                            --}}
                        </div>
                        <!-- Ads Archive End -->
                        <div class="clearfix"></div>
                        <!-- Pagination -->
                        <div class="text-center margin-bottom-30">
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
                    <!-- Row End -->
                </div>
                <!-- Middle Content Area  End -->
                <!-- Left Sidebar -->
                <div class="col-md-4 col-md-pull-8 col-sx-12">
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
                                                                 src="{!! url('portal_/images/posting/car-3.jpg') !!}">
                                                            <!-- Ad Status -->
                                                            <!-- User Review -->
                                                            <div class="user-preview">
                                                                <a href="#"> <img
                                                                            src="{!! url('portal_/images/users/2.jpg') !!}"
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
                                                                 src="{!! url('portal_/images/posting/fur-3.jpg') !!}">
                                                            <!-- Ad Status -->
                                                            <!-- User Review -->
                                                            <div class="user-preview">
                                                                <a href="#"> <img
                                                                            src="{!! url('portal_/images/users/2.jpg') !!}"
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
                                                                 src="{!! url('portal_/images/posting/mob-6.jpg') !!}">
                                                            <!-- Ad Status -->
                                                            <!-- User Review -->
                                                            <div class="user-preview">
                                                                <a href="#"> <img
                                                                            src="{!! url('portal_/images/users/2.jpg') !!}"
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
                                                                 src="{!! url('portal_/images/posting/cam-2.jpg') !!}">
                                                            <!-- Ad Status -->
                                                            <!-- User Review -->
                                                            <div class="user-preview">
                                                                <a href="#"> <img
                                                                            src="{!! url('portal_/images/users/2.jpg') !!}"
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
                                                                 src="{!! url('portal_/images/posting/cam-2.jpg') !!}">
                                                            <!-- Ad Status -->
                                                            <!-- User Review -->
                                                            <div class="user-preview">
                                                                <a href="#"> <img
                                                                            src="{!! url('portal_/images/users/2.jpg') !!}"
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
                                                        <img src="{!! url('portal_/images/posting/thumb-1.jpg') !!}"
                                                             alt="">
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
                                                        <img src="{!! url('portal_/images/posting/thumb-2.jpg') !!}"
                                                             alt="">
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
                                                        <img src="{!! url('portal_/images/posting/thumb-3.jpg') !!}"
                                                             alt="">
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
                                                        <img src="{!! url('portal_/images/posting/thumb-4.jpg') !!}"
                                                             alt="">
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
                                                        <img src="{!! url('portal_/images/posting/thumb-5.jpg') !!}"
                                                             alt="">
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
@endsection
@section('content1')
    <!-- =-=-=-=-=-=-= Quote Modal =-=-=-=-=-=-= -->
    <div class="modal fade price-quote" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Email for Price</h3>
                </div>
                <div class="modal-body">
                    <!-- content goes here -->
                    <form>
                        <div class="form-group  col-md-6">
                            <label>Your Name</label>
                            <input type="text" class="form-control" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group  col-md-6">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group  col-md-12">
                            <label>Contact No</label>
                            <input type="text" class="form-control" placeholder="Contact No">
                        </div>
                        <div class="form-group  col-md-12">
                            <label>Comments</label>
                            <textarea
                                    placeholder="What is the price of the Honda Civic 2017 you have in your inventory?"
                                    rows="3" class="form-control">What is the price of the 2015 Honda Accord EX-L you have in your inventory?</textarea>
                        </div>
                        <div class="col-md-12"><img src="{!! url('portal_/images/captcha.gif' )!!}" alt=""
                                                    class="img-responsive"></div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 margin-bottom-20 margin-top-20">
                            <button type="submit" class="btn btn-theme btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection