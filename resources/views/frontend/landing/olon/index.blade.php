@extends('frontend.landing.v3.base')

@section('content')
    @include('frontend.landing.v3.partial.product')
    @include('frontend.landing.v3.partial.oferta')
    @include('frontend.landing.v3.partial.filtros')
    {{--PROBLEMAS CON LAS COLUMNAS --}}

    {{--
    <div class="magic-area fix"><!--Start Magic Area-->
        <div class="col-sm-12 col-md-6 image">
            <a href="#"><img src="{!! url('theme/y/img/magic.jpg') !!}" alt="magic"/></a>
        </div>
        <div class="col-sm-12 col-md-6 content">
            <h2>Use Jewelry’s magic</h2>
            <h3>buy fine jewelry</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat. Duis aute irure dolor</p>
            <a href="#">Shop Now</a>
        </div>
    </div><!--End Magic Area-->
    --}}
    @include('frontend.landing.v3.partial.tarjetas')
    {{--
    <div class="funfact section fix"><!--Start Fun Factor Area-->
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Fun Factor</h2>
                    <div class="underline"></div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="fun-factor">
                        <div class="fun-factor-in">
                            <i class="fa fa-user"></i>
                            <div class="fun-factor-out"></div>
                        </div>
                        <p class="timer" data-from="0" data-to="11250"></p>
                        <h4>Happy Customers</h4>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="fun-factor">
                        <div class="fun-factor-in">
                            <i class="fa fa-database"></i>
                            <div class="fun-factor-out"></div>
                        </div>
                        <p class="timer" data-from="0" data-to="7500"></p>
                        <h4>Items</h4>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="fun-factor">
                        <div class="fun-factor-in">
                            <i class="fa fa-eye"></i>
                            <div class="fun-factor-out"></div>
                        </div>
                        <p class="timer" data-from="0" data-to="2050"></p>
                        <h4>Views</h4>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="fun-factor">
                        <div class="fun-factor-in">
                            <i class="fa fa-money"></i>
                            <div class="fun-factor-out"></div>
                        </div>
                        <p class="timer" data-from="0" data-to="1550"></p>
                        <h4>Sales</h4>
                    </div>
                </div>
            </div>
        </div>
    </div><!--Start Fun Factor Area-->
    <div class="testimonial-area fix"><!--Start Testimonial Area-->
        <div class="overlay section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-offset-0 col-sm-12 col-md-offset-2 col-md-8">
                        <div class="testimonial-slider  owl-carousel">
                            <div class="testimonial-item">
                                <div class="image fix">
                                    <img src="{!! url('theme/y/img/testimonial/testimonial.jpg') !!}" alt=""/>
                                </div>
                                <div class="content fix">
                                    <p>Lorem ipsum dolor sit amet, consectetur adiising elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua...</p>
                                    <h3>Zasika Williams</h3>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <div class="image fix">
                                    <img src="{!! url('theme/y/img/testimonial/testimonial.jpg') !!}" alt=""/>
                                </div>
                                <div class="content fix">
                                    <p>Lorem ipsum dolor sit amet, consectetur adiising elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua...</p>
                                    <h3>Zasika Williams</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End Testimonial Area-->
    --}}
    {{--
    <div class="brand-area section fix"><!--Start Brand Area-->
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Our Brands</h2>
                    <div class="underline"></div>
                </div>
                <div class="brand-slider owl-carousel">
                    <div class="brand-item"><img src="{!! url('theme/y/img/brand/brand-1.png') !!}" alt=""/></div>
                    <div class="brand-item"><img src="{!! url('theme/y/img/brand/brand-2.png') !!}" alt=""/></div>
                    <div class="brand-item"><img src="{!! url('theme/y/img/brand/brand-3.png') !!}" alt=""/></div>
                    <div class="brand-item"><img src="{!! url('theme/y/img/brand/brand-4.png') !!}" alt=""/></div>
                    <div class="brand-item"><img src="{!! url('theme/y/img/brand/brand-5.png') !!}" alt=""/></div>
                    <div class="brand-item"><img src="{!! url('theme/y/img/brand/brand-1.png') !!}" alt=""/></div>
                    <div class="brand-item"><img src="{!! url('theme/y/img/brand/brand-2.png') !!}" alt=""/></div>
                    <div class="brand-item"><img src="{!! url('theme/y/img/brand/brand-3.png') !!}" alt=""/></div>
                    <div class="brand-item"><img src="{!! url('theme/y/img/brand/brand-4.png') !!}" alt=""/></div>
                    <div class="brand-item"><img src="{!! url('theme/y/img/brand/brand-5.png') !!}" alt=""/></div>
                </div>
            </div>
        </div>
    </div><!--End Brand Area-->
    --}}
    {{--<div class="support-area section fix"><!--Start Support Area-->
        <div class="container">
            <div class="row">
                <div class="support col-sm-3">
                    <i class="fa fa-thumbs-up"></i>
                    <h3>High quality</h3>
                    <p>Lorem ipsum dolor sit amet, conseetur adipiscing elit, consectetur</p>
                </div>
                <div class="support col-sm-3">
                    <i class="fa fa-bus"></i>
                    <h3>Fast Delivery</h3>
                    <p>Lorem ipsum dolor sit amet, conseetur adipiscing elit, consectetur</p>
                </div>
                <div class="support col-sm-3">
                    <i class="fa fa-phone"></i>
                    <h3>24/7 support</h3>
                    <p>Lorem ipsum dolor sit amet, conseetur adipiscing elit, consectetur</p>
                </div>
                <div class="support col-sm-3">
                    <i class="fa fa-random"></i>
                    <h3>14 - Day Returns</h3>
                    <p>Lorem ipsum dolor sit amet, conseetur adipiscing elit, consectetur</p>
                </div>
            </div>
        </div>
    </div><!--Start Support Area-->--}}

@endsection