@extends('backend.layouts.base')
@section('title', "Landing" )

@section('topcss')
    <link rel="Stylesheet" type="text/css" href="{!! url('css/pages/widgets.css') !!}"/>
    <style>
        .campo-error{
            margin-top: 25%;
            padding-bottom: 32%;
        }
    </style>

@endsection
@section('topjs')


@endsection
@section('content')
    <div class="row">
    <div class="col-sm-6 col-12 col-lg-3">
        <div class="widget_icon_bgclr icon_align bg-white section_border">
            <div class="bg_icon bg_icon_info float-left">
                <i class="fa fa-heart-o text-info" aria-hidden="true"></i>
            </div>
            <div class="text-right">
                <h3 id="widget_count1">2,436</h3>
                <p>Income status</p>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-12 col-lg-3 media_max_573">
        <div class="widget_icon_bgclr icon_align bg-white eye_icon_border">
            <div class="float-left progress_icon_fa">
                <i class="fa fa-eye text-primary" aria-hidden="true"></i>
            </div>
            <div class="text-right">
                <h3 id="widget_count2">8,569</h3>
                <p>Visitors</p>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-12 col-lg-3 media_max_991">
        <div class="widget_icon_bgclr icon_align bg-white section_border">
            <div class="bg_icon bg_icon_success float-left">
                <i class="fa fa-cart-plus text-success" aria-hidden="true"></i>
            </div>
            <div class="text-right">
                <h3 id="widget_count3">4,859</h3>
                <p>Sales</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-12 col-lg-3 media_max_991">
        <div class="widget_icon_bgclr icon_align bg-white section_border">
            <div class="bg_icon bg_icon_warning float-left">
                <i class="fa fa-user text-warning" aria-hidden="true"></i>
            </div>
            <div class="text-right">
                <h3 id="widget_count4">32,568</h3>
                <p>Subscribers</p>
            </div>
        </div>
    </div>
    </div>
    <div class="row m-t-35">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card p-d-15">
                <div class="sales_icons">
                    <span class="bg-info"></span>
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div>
                    <h5 class="sales_orders text-right m-t-5">ORDERS</h5>
                    <h1 class="sales_number m-t-15 text-right" id="orders_countup">1,425</h1>
                    <p class="sales_text">Total orders: 9,320
                        <span class="pull-right"><i class="fa fa-caret-up text-mint font_18 m-r-5"></i>25.25%</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 media_max_573">
            <div class="card p-d-15">
                <div class="sales_icons">
                    <span class="bg-danger"></span>
                    <i class="fa fa-bar-chart"></i>
                </div>
                <div>
                    <h5 class="sales_orders text-right m-t-5">REVENUE</h5>
                    <h1 class="sales_number m-t-15 text-right">$<span id="revenue_countup">600</span>
                    </h1>
                    <p class="sales_text">Total revenue: 8,250
                        <span class="pull-right"><i class="fa fa-caret-down text-danger font_18 m-r-5"></i>20%</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 media_max_1199">
            <div class="card p-d-15">
                <div class="sales_icons">
                    <span class="bg-primary"></span>
                    <i class="fa fa-cube"></i>
                </div>
                <div>
                    <h5 class="sales_orders text-right m-t-5">PRODUCTS</h5>
                    <h1 class="sales_number m-t-15 text-right" id="products_countup">2,100</h1>
                    <p class="sales_text">Total products: 12,100
                        <span class="pull-right"><i class="fa fa-caret-up text-primary font_18 m-r-5"></i>45%</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 media_max_1199">
            <div class="card p-d-15">
                <div class="sales_icons">
                    <span class="bg-warning"></span>
                    <i class="fa fa-credit-card"></i>
                </div>
                <div>
                    <h5 class="sales_orders text-right m-t-5">SOLD</h5>
                    <h1 class="sales_number m-t-15 text-right" id="sold_countup">1,025</h1>
                    <p class="sales_text">Total sold: 7,600
                        <span class="pull-right"><i class="fa fa-caret-up text-warning font_18 m-r-5"></i>24.5%</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="datos" class="card col-12 m-t-35 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                Inicio

            </div>
            <div class="row">
                <div class="col-lg-4 m-t-25">
                        <div class="social-counter text-center">
                            <ul class="m-b-0">
                                <li class="facebook">
                                    <a href="./Widgets 1 _ Admire_files/widgets1.html">
                                        <div class="row">
                                            <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-facebook"></i></span></div>
                                            <div class="col-8 text-left social_fa_top"><span class="count"><span id="fb_count">354</span>K</span> Likes</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="./Widgets 1 _ Admire_files/widgets1.html">
                                        <div class="row">
                                            <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-twitter"></i></span></div>
                                            <div class="col-8 text-left social_fa_top"><span class="count" id="tw_count">547</span> Followers</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="google">
                                    <a href="./Widgets 1 _ Admire_files/widgets1.html">
                                        <div class="row">
                                            <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-google-plus"></i></span></div>
                                            <div class="col-8 text-left social_fa_top"><span class="count" id="g+_count">678</span> Followers</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="youtube">
                                    <a href="./Widgets 1 _ Admire_files/widgets1.html">
                                        <div class="row">
                                            <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-youtube"></i></span></div>
                                            <div class="col-8 text-left social_fa_top"><span class="count"><span id="youtube_count">21</span>K</span> Subscribers</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="soundcloud">
                                    <a href="./Widgets 1 _ Admire_files/widgets1.html">
                                        <div class="row">
                                            <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-soundcloud"></i></span></div>
                                            <div class="col-8 text-left social_fa_top"><span class="count" id="sc_count">845</span> Followers</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a href="./Widgets 1 _ Admire_files/widgets1.html">
                                        <div class="row">
                                            <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-instagram"></i></span></div>
                                            <div class="col-8 text-left social_fa_top"><span class="count">2M</span> Followers</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="linkedin">
                                    <a href="./Widgets 1 _ Admire_files/widgets1.html">
                                        <div class="row">
                                            <div class="col-4 text-right social_icon_top"><span class="social-icon text-center"><i class="fa fa-linkedin"></i></span></div>
                                            <div class="col-8 text-left social_fa_top"><span class="count" id="in_count">124</span> Followers</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>

                </div>
                <div class="col-lg-4 m-t-25">
                    <div class="bg-white section_border">
                        <div class="row">
                            <div class="col-sm-4 col-4 m-t-15">
                                <div class="bg-white p-d-4 text-center">
                                    <h4 class="fb_icon_color">Facebook</h4>
                                    <span>60.258</span>

                                </div>
                            </div>
                            <div class="col-sm-4 col-4 m-t-15">
                                <div class="bg-white p-d-4 text-center">
                                    <h4 class="twitter_icon_color">Twitter</h4>
                                    <span>25.108</span>

                                </div>
                            </div>
                            <div class="col-sm-4 col-4 m-t-15">
                                <div class="bg-white p-d-4 text-center">
                                    <h4 class="gplus_icon_color">Google Plus</h4>
                                    <span>15.223</span>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-4 text-center icons_border">
                                <div class="fb_border_bottom">
                                    <h2 class="m-t-20 fb_icon_color"><span id="fb_count">60</span>%</h2>
                                </div>
                            </div>
                            <div class="col-sm-4 col-4 text-center icons_border">
                                <div class="twitter_border_bottom">
                                    <h2 class="m-t-20 twitter_icon_color"><span id="twitter_count">25</span>%</h2>
                                </div>
                            </div>
                            <div class="col-sm-4 col-4 text-center">
                                <div class="gplus_border_bottom">
                                    <h2 class="m-t-20 gplus_icon_color"><span id="gplus_count">15</span>%
                                    </h2>
                                </div>
                            </div>
                            <!--</div>-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('bottomjs')


@endsection
