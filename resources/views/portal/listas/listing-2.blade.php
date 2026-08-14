@php($horses = Horse::where('id','!=',0)->get())
@extends('portal.base')
@section('content')
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-8 col-md-push-4 col-lg-8 col-sx-12">
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

                           @php($j=0)
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
                                 @php($j=0)
                              @endif
                              @php($j++)
                           {{--
                              <p> {!! $alzada !!}</p>
                              <p> {!! trans('horse.razashort.'.$raza)!!}</p>
                              <p> {!! $edad !!} {!! trans('horse.years') !!}</p>
                           --}}
                           <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="category-grid-box-1">
                                 <div class="image">
                                    <img alt="Tour Package" src="images/posting/car-3.jpg" class="img-responsive">
                                    <div class="ribbon popular"></div>
                                    <div class="price-tag">
                                       <div class="price"><span>$205,000</span></div>
                                    </div>
                                 </div>
                                 <div class="short-description-1 clearfix">
                                    <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                    <h3><a title="" href="single-page-listing.html">Honda Civic 2017 Sports Edition</a></h3>
                                 </div>
                                 <div class="horse-special-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">London</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           @endforeach

                           {{--
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="category-grid-box-1">
                                 <div class="image">
                                    <img alt="Tour Package" src="images/posting/car-3.jpg" class="img-responsive">
                                    <div class="ribbon popular"></div>
                                    <div class="price-tag">
                                       <div class="price"><span>$205,000</span></div>
                                    </div>
                                 </div>
                                 <div class="short-description-1 clearfix">
                                    <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                    <h3><a title="" href="single-page-listing.html">Honda Civic 2017 Sports Edition</a></h3>
                                 </div>
                                 <div class="horse-special-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">London</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="category-grid-box-1">
                                 <div class="image">
                                    <img alt="Tour Package" src="images/posting/list-13.jpg" class="img-responsive">
                                    <div class="price-tag">
                                       <div class="price"><span>$1,129</span></div>
                                    </div>
                                 </div>
                                 <div class="short-description-1 clearfix">
                                    <div class="category-title"> <span><a href="#">Laptops</a></span> </div>
                                    <h3><a title="" href="single-page-listing.html">Sony VAIO Duo Convertible 13.3" i7 </a></h3>
                                 </div>
                                 <div class="horse-special-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">London</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="category-grid-box-1">
                                 <div class="image">
                                    <img alt="Tour Package" src="images/posting/mob-2.jpg" class="img-responsive">
                                    <div class="price-tag">
                                       <div class="price"><span>$350</span></div>
                                    </div>
                                 </div>
                                 <div class="short-description-1 clearfix">
                                    <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                    <h3><a title="" href="single-page-listing.html">Sony Xperia Z5 Waterproof For Sale</a></h3>
                                 </div>
                                 <div class="horse-special-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">London</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="category-grid-box-1">
                                 <div class="image">
                                    <img alt="Tour Package" src="images/posting/list-11.jpg" class="img-responsive">
                                    <div class="price-tag">
                                       <div class="price"><span>$120</span></div>
                                    </div>
                                 </div>
                                 <div class="short-description-1 clearfix">
                                    <div class="category-title"> <span><a href="#">Games & Console</a></span> </div>
                                    <h3><a title="" href="single-page-listing.html">Xbox 360 + Games + Accessories </a></h3>
                                 </div>
                                 <div class="horse-special-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">London</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Advertizing -->
                           <div class="col-md-12 col-xs-12 col-sm-12">
                              <section class="advertising">
                                 <a href="{!! route('SuscripcionIndex') !!}">
                                    <div class="banner">
                                       <div class="wrapper">
                                          <span class="title">Do you want your property to be listed here?</span>
                                          <span class="submit">Submit it now! <i class="fa fa-plus-square"></i></span>
                                       </div>
                                    </div>
                                    <!-- /.banner-->
                                 </a>
                              </section>
                           </div>
                           <!-- Advertizing End -->
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="category-grid-box-1">
                                 <div class="image">
                                    <img alt="Tour Package" src="images/posting/list-2.jpg" class="img-responsive">
                                    <div class="price-tag">
                                       <div class="price"><span>$205,000</span></div>
                                    </div>
                                 </div>
                                 <div class="short-description-1 clearfix">
                                    <div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
                                    <h3><a title="" href="single-page-listing.html">Honda CBR 1000RR for Sale</a></h3>
                                 </div>
                                 <div class="horse-special-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">London</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="category-grid-box-1">
                                 <div class="image">
                                    <img alt="Tour Package" src="images/posting/list-14.jpg" class="img-responsive">
                                    <div class="price-tag">
                                       <div class="price"><span>$205,000</span></div>
                                    </div>
                                 </div>
                                 <div class="short-description-1 clearfix">
                                    <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                    <h3><a title="" href="single-page-listing.html">Rolex Yacht-Master 40</a></h3>
                                 </div>
                                 <div class="horse-special-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">London</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="category-grid-box-1">
                                 <div class="image">
                                    <img alt="Tour Package" src="images/posting/list-1.jpg" class="img-responsive">
                                    <div class="price-tag">
                                       <div class="price"><span>$205,000</span></div>
                                    </div>
                                 </div>
                                 <div class="short-description-1 clearfix">
                                    <div class="category-title"> <span><a href="#">Sports & Equipment</a></span> </div>
                                    <h3><a title="" href="single-page-listing.html">Honda Civic 2017 Sports Edition</a></h3>
                                 </div>
                                 <div class="horse-special-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">London</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="category-grid-box-1">
                                 <div class="image">
                                    <img alt="Tour Package" src="images/posting/list-4.jpg" class="img-responsive">
                                    <div class="price-tag">
                                       <div class="price"><span>$1,129</span></div>
                                    </div>
                                 </div>
                                 <div class="short-description-1 clearfix">
                                    <div class="category-title"> <span><a href="#">Laptops</a></span> </div>
                                    <h3><a title="" href="single-page-listing.html">Sony VAIO Duo Convertible 13.3" i7 </a></h3>
                                 </div>
                                 <div class="horse-special-info-1">
                                    <ul>
                                       <li> <i class="fa fa-map-marker"></i><a href="#">London</a> </li>
                                       <li> <i class="fa fa-clock-o"></i>15 minutes ago </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- Listing Ad Grid -->
                           --}}
                        </div>
                        <!-- Ads Archive End -->  
                        <div class="clearfix"></div>
                        <!-- Pagination -->  
                        <div class="col-md-12 col-xs-12 col-sm-12">
                           <ul class="pagination pagination-lg">
                              <li> <a href="#"> <i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>
                              <li> <a href="#">1</a> </li>
                              <li class="active"> <a href="#">2</a> </li>
                              <li> <a href="#">3</a> </li>
                              <li> <a href="#">4</a> </li>
                              <li><a href="#"> <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
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
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    Categories
                                    </a>
                                 </h4>
                                 <!-- Title End -->
                              </div>
                              <!-- Content -->
                              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                 <div class="panel-body categories">
                                    <ul>
                                       <li><a href="#"><i class="flaticon-data"></i>Electronics & Gedget<span>(1029)</span></a></li>
                                       <li><a href="#"><i class="flaticon-transport-6"></i>Cars & Vehicles<span>(1228)</span></a></li>
                                       <li><a href="#"><i class="flaticon-mortgage"></i>Property<span>(178)</span></a></li>
                                       <li><a href="#"><i class="flaticon-technology-8"></i>Mobile & Tablets<span>(2178)</span></a></li>
                                       <li><a href="#"><i class="flaticon-suitcase"></i>Jobs<span>(7178)</span></a></li>
                                       <li><a href="#"><i class="flaticon-search"></i>Home & Garden<span>(7163)</span></a></li>
                                       <li><a href="#"><i class="flaticon-dog"></i>Pets & Animals<span>(8709)</span></a></li>
                                       <li><a href="#"><i class="flaticon-science"></i>Health & Beauty<span>(3129)</span></a></li>
                                       <li><a href="#"><i class="flaticon-game"></i>Hobby, Sport & Kids<span>(2019)</span></a></li>
                                       <li><a href="#"><i class="flaticon-food"></i>Food & Agriculture<span>(323)</span></a></li>
                                       <li><a href="#"><i class="flaticon-blouse"></i>Women & Children Cloths<span>(425)</span></a></li>
                                       <li><a href="#"><i class="flaticon-technology-22"></i>Cameras & Security<span>(3223)</span></a></li>
                                       <li><a href="#"><i class="flaticon-technology-45"></i>Office Product<span>(3283)</span></a></li>
                                       <li><a href="#"><i class="flaticon-wrench"></i>Arts, Crafts & Sewing<span>(3221)</span></a></li>
                                       <li><a href="#"><i class="flaticon-cogwheel-2"></i>Others<span>(3129)</span></a></li>
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
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    Brands
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
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
                                             <input  type="checkbox" id="minimal-checkbox-1">
                                             <label for="minimal-checkbox-1">All Brands</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-2">
                                             <label for="minimal-checkbox-2">Samsung</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-3">
                                             <label for="minimal-checkbox-3">Apple</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-4">
                                             <label for="minimal-checkbox-4">Nokia</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-5">
                                             <label for="minimal-checkbox-5">Sony</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-6">
                                             <label for="minimal-checkbox-6">Blackberry</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-7">
                                             <label for="minimal-checkbox-7">HTC</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-8">
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
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    Condition
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                 <div class="panel-body">
                                    <div class="skin-minimal">
                                       <ul class="list">
                                          <li>
                                             <input tabindex="7" type="radio" id="minimal-radio-1" name="minimal-radio">
                                             <label for="minimal-radio-1">New</label>
                                          </li>
                                          <li>
                                             <input tabindex="8" type="radio" id="minimal-radio-2" name="minimal-radio" checked>
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
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    Price
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                 <div class="panel-body">
                                    <span class="price-slider-value">Price ($) <span id="price-min"></span> - <span id="price-max"></span></span>
                                    <div id="price-slider"></div>
                                 </div>
                              </div>
                           </div>
                           <!-- Pricing Panel End -->
                           <!-- Featured Ads Panel -->
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" >
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
                                                   <img class="img-responsive" alt="" src="images/posting/car-3.jpg">
                                                   <!-- Ad Status -->
                                                   <!-- User Review -->
                                                   <div class="user-preview">
                                                      <a href="#"> <img src="images/users/2.jpg" class="avatar avatar-small" alt=""> </a>
                                                   </div>
                                                   <!-- View Details --><a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                   <!-- Ad Category -->
                                                   <div class="category-title"> <span><a href="#">Cars</a></span> </div>
                                                   <!-- Ad Title -->
                                                   <h3><a title="" href="single-page-listing.html">2017 Honda Civic EX</a></h3>
                                                   <!-- Price -->
                                                   <div class="price">$18,200 <span class="negotiable">(Negotiable)</span></div>
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                   <ul>
                                                      <li><i class="fa fa-map-marker"></i>London</li>
                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
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
                                                   <img class="img-responsive" alt="" src="images/posting/fur-3.jpg">
                                                   <!-- Ad Status -->
                                                   <!-- User Review -->
                                                   <div class="user-preview">
                                                      <a href="#"> <img src="images/users/2.jpg" class="avatar avatar-small" alt=""> </a>
                                                   </div>
                                                   <!-- View Details --><a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                   <!-- Ad Category -->
                                                   <div class="category-title"> <span><a href="#">Cameras & Accessories</a></span> </div>
                                                   <!-- Ad Title -->
                                                   <h3><a title="" href="single-page-listing.html">Office Furniture For Sale </a></h3>
                                                   <!-- Price -->
                                                   <div class="price">$250 <span class="negotiable">(Negotiable)</span></div>
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                   <ul>
                                                      <li><i class="fa fa-map-marker"></i>London</li>
                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
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
                                                   <img class="img-responsive" alt="" src="images/posting/mob-6.jpg">
                                                   <!-- Ad Status -->
                                                   <!-- User Review -->
                                                   <div class="user-preview">
                                                      <a href="#"> <img src="images/users/2.jpg" class="avatar avatar-small" alt=""> </a>
                                                   </div>
                                                   <!-- View Details --><a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                   <!-- Ad Category -->
                                                   <div class="category-title"> <span><a href="#">Cameras & Accessories</a></span> </div>
                                                   <!-- Ad Title -->
                                                   <h3><a title="" href="single-page-listing.html">Sony Xperia Z5 </a></h3>
                                                   <!-- Price -->
                                                   <div class="price">$250 <span class="negotiable">(Negotiable)</span></div>
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                   <ul>
                                                      <li><i class="fa fa-map-marker"></i>London</li>
                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
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
                                                   <img class="img-responsive" alt="" src="images/posting/cam-2.jpg">
                                                   <!-- Ad Status -->
                                                   <!-- User Review -->
                                                   <div class="user-preview">
                                                      <a href="#"> <img src="images/users/2.jpg" class="avatar avatar-small" alt=""> </a>
                                                   </div>
                                                   <!-- View Details --><a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                   <!-- Ad Category -->
                                                   <div class="category-title"> <span><a href="#">Cameras & Accessories</a></span> </div>
                                                   <!-- Ad Title -->
                                                   <h3><a title="" href="single-page-listing.html">Sony Xperia Z5 </a></h3>
                                                   <!-- Price -->
                                                   <div class="price">$250 <span class="negotiable">(Negotiable)</span></div>
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                   <ul>
                                                      <li><i class="fa fa-map-marker"></i>London</li>
                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
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
                                                   <img class="img-responsive" alt="" src="images/posting/cam-2.jpg">
                                                   <!-- Ad Status -->
                                                   <!-- User Review -->
                                                   <div class="user-preview">
                                                      <a href="#"> <img src="images/users/2.jpg" class="avatar avatar-small" alt=""> </a>
                                                   </div>
                                                   <!-- View Details --><a href="" class="view-details">View Details</a>
                                                </div>
                                                <!-- Ad Img End -->
                                                <div class="short-description">
                                                   <!-- Ad Category -->
                                                   <div class="category-title"> <span><a href="#">Cameras & Accessories</a></span> </div>
                                                   <!-- Ad Title -->
                                                   <h3><a title="" href="single-page-listing.html">Sony Xperia Z5 </a></h3>
                                                   <!-- Price -->
                                                   <div class="price">$250 <span class="negotiable">(Negotiable)</span></div>
                                                </div>
                                                <!-- Addition Info -->
                                                <div class="ad-info">
                                                   <ul>
                                                      <li><i class="fa fa-map-marker"></i>London</li>
                                                      <li><i class="fa fa-clock-o"></i> 15 minutes ago </li>
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
                              <div class="panel-heading" >
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
   @endsection
