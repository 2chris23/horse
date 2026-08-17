{{--
<!-- Footer -->
<footer>
    <div class="container text-center">
        <p class="credits">

            Copyright © {!! Funciones::CurrentYear()!!}
            <i class="fa fa-love"></i>
            <a target="_blank" href="{!! url('http://'.$stud->getDomain()) !!}">{!! $stud->getDomain() !!}</a>

        </p>
    </div>
</footer>
--}}

<div class="footer-top-area fix"><!--Start Footer top area-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="footer-about">
                    <div class="image">
                        <img src="{!! $stud->getLogo() !!}" alt="{!! $stud->getName() !!}"/>
                        <h3>{!! $stud->getName() !!}</h3>
                    </div>
                    {{--
                    <p>perspiciatis unde omnis iste natus error sit voluptatem accm doloremque antium, totam rem
                        aperiam, eaque ipsa perspiciatis unde omnis iste</p>
                    --}}
                </div>
                <div class="footer-contact">
                    <div class="single-contact">
                        <div class="icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="details">
                            <p>{!! $stud->getAddress() !!}, {!! $stud->getCity() !!}</p>
                            <p>{!! $stud->getStateModel()->name!!} , {!! $stud->getCountryModel()->name !!}</p>
                        </div>
                    </div>
                    <div class="single-contact">
                        <div class="icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="details">
                            @php($cd = 0)
                            @foreach($stud->getPhoneModel() as $k=> $v)
                                @if($v->isNull() !== true)
                                    @if($cd == 0)
                                        <p>
                                            <a href="tel:{!! $v->getFormatNumberOnly() !!}" class="no-color link">
                                                <span class="no-color link"> {!! $v->FormatNumber() !!} </span>
                                            </a>
                                        </p>
                                        @php($cd = 1)
                                    @endif
                                @endif
                            @endforeach

                        </div>
                    </div>
                    <div class="single-contact">
                        <div class="icon">
                            <i class="fa fa-dribbble"></i>
                        </div>
                        <div class="details">
                            <a href="#"> {!! $stud->getEmail() !!}</a>
                            <a target="_blank"
                               href="{!! url('http://'.$stud->getDomain()) !!}">{!! $stud->getDomain() !!}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="footer-quick-link footer-links">
                    <h2>Sexos</h2>
                    <ul>
                        @php($sexos = Horse::where(['studs_id' => $stud->id])->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray())
                        @foreach($sexos as $k=>$v)

                            @if($k !=0)
                                <li>
                                    <a href="index.html">
                                        {!! trans('horse.sexs.'.$v['sex']) !!}
                                    </a>
                                </li>
                            @endif
                        @endforeach

                        {{--<li><a href="index.html">Home</a></li>
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="shop-left-sidebar.html">New Arrivals</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="portfolio-1.html">Portfolio</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="#">Shortcodes</a></li>
                        <li><a href="contact.html">Contact</a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="row">
                    <div class="col-sm-8 footer-support footer-links">
                        <h2>
                            Razas
                        </h2>
                        <ul>
                            @php($razas = $stud->Horses()->select('raza', DB::raw('count(*) as total'))->groupby('raza')->get()->toArray())
                            @foreach($razas as $k=>$v)

                                @if($k !=0)

                                    <li>
                                        <a href="index.html">
                                            {!! trans('horse.raza.'.$v['raza']) !!}
                                        </a>
                                    </li>
                                @endif
                            @endforeach

                            {{--<li><a href="#">Site Map</a></li>
                            <li><a href="#">privacy Policy</a></li>
                            <li><a href="#">Your Account</a></li>
                            <li><a href="#">Term & Conditions</a></li>
                            <li><a href="#">Advance Search</a></li>
                            <li><a href="faq.html">Help & FAQs</a></li>
                            <li><a href="#">Gift Voucher</a></li>
                            <li><a href="contact-2.html">Contact Us</a></li>--}}
                        </ul>
                    </div>
                    <div class="col-sm-4 footer-account footer-links">
                        <h2>my Account</h2>
                        <ul>
                            <li><a href="#">my Account</a></li>
                            <li><a href="#">order History</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Specials</a></li>
                        </ul>
                    </div>
                </div>
                {{--<div class="footer-newslater fix">
                    <div class="wrap fix">
                        <h3>NEWS LETTER ! </h3>
                        <form action="#">
                            <input type="email" placeholder="Your E-mail...">
                            <button class="submit">SUBSCRIBE</button>
                        </form>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>
</div><!--Start Footer top area-->


{{--
<div class="footer-area fix">
<!-- Start Footer Area -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="copy-right">
                    <p>Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="payment">
                    <ul>
                        <li><a href="#"><img src="{!! url('theme/y/img/footer/paypal.jpg') !!}" alt=""/></a></li>
                        <li><a href="#"><img src="{!! url('theme/y/img/footer/visa.jpg') !!}" alt=""/></a></li>
                        <li><a href="#"><img src="{!! url('theme/y/img/footer/master.jpg') !!}" alt=""/></a></li>
                        <li><a href="#"><img src="{!! url('theme/y/img/footer/cards.jpg') !!}" alt=""/></a></li>
                        <li><a href="#"><img src="{!! url('theme/y/img/footer/discover.jpg') !!}" alt=""/></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--End Footer Area-->
--}}