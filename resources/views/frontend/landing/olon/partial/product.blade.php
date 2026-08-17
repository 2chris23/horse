<div class="featured-product section fix"><!--start Featured Product Area-->
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>Weekly Featured Products</h2>
                <div class="underline"></div>
            </div>
            <div class="col-sm-12">
                <!-- Featured slider Area Start -->
                <div class="feature-pro-slider owl-carousel">
                @foreach($horses as $k=>$v)
                    @php($fat = $v->getPhotoFirstModel())
                    @php
                        $img = "";
                            if(!empty($fat)){
                            $img = $fat->getUrl();
                            }
                    @endphp
                    <!-- Single Product Start -->
                        <div class="product-item fix">
                            <div class="product-img-hover">
                                <!-- Product image -->
                                <a href="product-details.html" class="pro-image fix">
                                    <img src="{!! $img !!}"
                                         alt="{!! $v->getAltText() !!}"/>
                                </a>
                                <!-- Product action Btn -->
                                <div class="product-action-btn">
                                    <a class="quick-view" href="#"><i class="fa fa-search"></i></a>
                                    <a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>
                                    <a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="pro-name-price-ratting">
                                <!-- Product Name -->
                                <div class="pro-name">
                                    <a href="product-details.html">
                                        {!! $v->getName() !!}
                                    </a>
                                </div>
                                <!-- Product Ratting -->
                                <div class="pro-ratting">
                                    <i class="on fa fa-star"></i>
                                    <i class="on fa fa-star"></i>
                                    <i class="on fa fa-star"></i>
                                    <i class="on fa fa-star"></i>
                                    <i class="on fa fa-star-half-o"></i>
                                </div>
                                <!-- Product Price -->
                                <div class="pro-price fix pull-right">
                                    <p>
                                        {{--
                                        <span class="old">
                                            $165
                                        </span>
                                        --}}
                                        <span class="new pull-right">
                                        $150
                                    </span>
                                    </p>
                                </div>
                            </div>
                        </div><!-- Single Product End -->
                @endforeach
                <!-- Single Product Start -->
                    {{--
                    <!-- Single Product Start -->
                    <div class="product-item fix">
                        <div class="product-img-hover">
                            <!-- Product image -->
                            <a href="product-details.html" class="pro-image fix"><img
                                        src="{!! url('theme/y/img/featured/1.jpg') !!}"
                                        alt="featured"/></a>
                            <!-- Product action Btn -->
                            <div class="product-action-btn">
                                <a class="quick-view" href="#"><i class="fa fa-search"></i></a>
                                <a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>
                                <a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="pro-name-price-ratting">
                            <!-- Product Name -->
                            <div class="pro-name">
                                <a href="product-details.html">Product Name Demo</a>
                            </div>
                            <!-- Product Ratting -->
                            <div class="pro-ratting">
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star-half-o"></i>
                            </div>
                            <!-- Product Price -->
                            <div class="pro-price fix">
                                <p><span class="old">$165</span><span class="new">$150</span></p>
                            </div>
                        </div>
                    </div><!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="product-item fix">
                        <div class="product-img-hover">
                            <!-- Product image -->
                            <a href="product-details.html" class="pro-image fix"><img
                                        src="{!! url('theme/y/img/featured/2.jpg') !!}"
                                        alt="featured"/></a>
                            <!-- Product action Btn -->
                            <div class="product-action-btn">
                                <a class="quick-view" href="#"><i class="fa fa-search"></i></a>
                                <a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>
                                <a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="pro-name-price-ratting">
                            <!-- Product Name -->
                            <div class="pro-name">
                                <a href="product-details.html">Product Name Demo</a>
                            </div>
                            <!-- Product Ratting -->
                            <div class="pro-ratting">
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star-half-o"></i>
                            </div>
                            <!-- Product Price -->
                            <div class="pro-price fix">
                                <p><span class="old">$165</span><span class="new">$150</span></p>
                            </div>
                        </div>
                    </div><!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="product-item fix">
                        <div class="product-img-hover">
                            <!-- Product image -->
                            <a href="product-details.html" class="pro-image fix"><img
                                        src="{!! url('theme/y/img/featured/3.jpg') !!}"
                                        alt="featured"/></a>
                            <!-- Product action Btn -->
                            <div class="product-action-btn">
                                <a class="quick-view" href="#"><i class="fa fa-search"></i></a>
                                <a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>
                                <a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="pro-name-price-ratting">
                            <!-- Product Name -->
                            <div class="pro-name">
                                <a href="product-details.html">Product Name Demo</a>
                            </div>
                            <!-- Product Ratting -->
                            <div class="pro-ratting">
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star-half-o"></i>
                            </div>
                            <!-- Product Price -->
                            <div class="pro-price fix">
                                <p><span class="old">$165</span><span class="new">$150</span></p>
                            </div>
                        </div>
                    </div><!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="product-item fix">
                        <div class="product-img-hover">
                            <!-- Product image -->
                            <a href="product-details.html" class="pro-image fix"><img
                                        src="{!! url('theme/y/img/featured/4.jpg') !!}"
                                        alt="featured"/></a>
                            <!-- Product action Btn -->
                            <div class="product-action-btn">
                                <a class="quick-view" href="#"><i class="fa fa-search"></i></a>
                                <a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>
                                <a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="pro-name-price-ratting">
                            <!-- Product Name -->
                            <div class="pro-name">
                                <a href="product-details.html">Product Name Demo</a>
                            </div>
                            <!-- Product Ratting -->
                            <div class="pro-ratting">
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star-half-o"></i>
                            </div>
                            <!-- Product Price -->
                            <div class="pro-price fix">
                                <p><span class="old">$165</span><span class="new">$150</span></p>
                            </div>
                        </div>
                    </div><!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="product-item fix">
                        <div class="product-img-hover">
                            <!-- Product image -->
                            <a href="product-details.html" class="pro-image fix"><img
                                        src="{!! url('theme/y/img/featured/1.jpg') !!}"
                                        alt="featured"/></a>
                            <!-- Product action Btn -->
                            <div class="product-action-btn">
                                <a class="quick-view" href="#"><i class="fa fa-search"></i></a>
                                <a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>
                                <a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="pro-name-price-ratting">
                            <!-- Product Name -->
                            <div class="pro-name">
                                <a href="product-details.html">Product Name Demo</a>
                            </div>
                            <!-- Product Ratting -->
                            <div class="pro-ratting">
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star-half-o"></i>
                            </div>
                            <!-- Product Price -->
                            <div class="pro-price fix">
                                <p><span class="old">$165</span><span class="new">$150</span></p>
                            </div>
                        </div>
                    </div><!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="product-item fix">
                        <div class="product-img-hover">
                            <!-- Product image -->
                            <a href="product-details.html" class="pro-image fix"><img
                                        src="{!! url('theme/y/img/featured/2.jpg') !!}"
                                        alt="featured"/></a>
                            <!-- Product action Btn -->
                            <div class="product-action-btn">
                                <a class="quick-view" href="#"><i class="fa fa-search"></i></a>
                                <a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>
                                <a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="pro-name-price-ratting">
                            <!-- Product Name -->
                            <div class="pro-name">
                                <a href="product-details.html">Product Name Demo</a>
                            </div>
                            <!-- Product Ratting -->
                            <div class="pro-ratting">
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star-half-o"></i>
                            </div>
                            <!-- Product Price -->
                            <div class="pro-price fix">
                                <p><span class="old">$165</span><span class="new">$150</span></p>
                            </div>
                        </div>
                    </div><!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="product-item fix">
                        <div class="product-img-hover">
                            <!-- Product image -->
                            <a href="product-details.html" class="pro-image fix"><img
                                        src="{!! url('theme/y/img/featured/3.jpg') !!}"
                                        alt="featured"/></a>
                            <!-- Product action Btn -->
                            <div class="product-action-btn">
                                <a class="quick-view" href="#"><i class="fa fa-search"></i></a>
                                <a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>
                                <a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="pro-name-price-ratting">
                            <!-- Product Name -->
                            <div class="pro-name">
                                <a href="product-details.html">Product Name Demo</a>
                            </div>
                            <!-- Product Ratting -->
                            <div class="pro-ratting">
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star-half-o"></i>
                            </div>
                            <!-- Product Price -->
                            <div class="pro-price fix">
                                <p><span class="old">$165</span><span class="new">$150</span></p>
                            </div>
                        </div>
                    </div><!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="product-item fix">
                        <div class="product-img-hover">
                            <!-- Product image -->
                            <a href="product-details.html" class="pro-image fix"><img
                                        src="{!! url('theme/y/img/featured/4.jpg') !!}"
                                        alt="featured"/></a>
                            <!-- Product action Btn -->
                            <div class="product-action-btn">
                                <a class="quick-view" href="#"><i class="fa fa-search"></i></a>
                                <a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>
                                <a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="pro-name-price-ratting">
                            <!-- Product Name -->
                            <div class="pro-name">
                                <a href="product-details.html">Product Name Demo</a>
                            </div>
                            <!-- Product Ratting -->
                            <div class="pro-ratting">
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star-half-o"></i>
                            </div>
                            <!-- Product Price -->
                            <div class="pro-price fix">
                                <p><span class="old">$165</span><span class="new">$150</span></p>
                            </div>
                        </div>
                    </div><!-- Single Product End -->
                    --}}
                </div><!-- Featured slider Area End -->
            </div>
        </div>
    </div>
</div><!--End Featured Product Area-->
