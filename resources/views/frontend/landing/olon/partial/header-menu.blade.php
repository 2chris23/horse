@php($actual =Request::url())
@php($sexos = Publico::Arraysexs())
<div class="menu-area"><!--Start Main Menu Area-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-menu hidden-sm hidden-xs">
                    <nav>
                        <ul>
                            {{--@include('frontend.landing.v1.partials.lenguaje')--}}
                            @php($s=(Funciones::BuscarEnString($actual,$user->getMySlug())==true
                            and Funciones::BuscarEnString($actual,'Instalaciones')!=true)
                            and Funciones::BuscarEnString($actual,'Horse')!=true
                            and Funciones::BuscarEnString($actual,'Ventas')!=true
                            and Funciones::BuscarEnString($actual,'Galeria')!=true
                            and Funciones::BuscarEnString($actual,'Contacto')!=true
                            ?'active':null)
                            <li class="{!! $s !!}">
                                <a href="{!! route('MyPage',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.home') !!}</a>
                            </li>
                            @php($s=(Funciones::BuscarEnString($actual,'Instalaciones')==true)?'active':null)
                            <li class="{!! $s !!}">
                                <a href="{!! route('MyInstalation',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.instalations') !!}</a>
                            </li>
                            {{--
                                                        @php($s=(Funciones::BuscarEnString($actual,'Caballo')==true)?'active':null)
                                                        <li class="{!! $s !!}">
                                                            <a href="{!! route('MyHorsesV1',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.horses') !!}</a>
                                                        </li>
                                                        --}}


                            @php($g = $stud->getFirstHorse())
                            @if(!empty($g))

                                <li class="{!! $s !!}">
                                    <a href="#">
                                        {!! trans('stud.horses') !!}
                                    </a>

                                    <ul class="sub-menu">
                                        @foreach($sexos as $k=>$v)
                                            @php
                                                $h = $stud->getFirstHorseBySex($k);
                                            @endphp
                                            @if($k!=0)
                                                @if(!empty($h))
                                                    <li>
                                                        <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>$k,'v'=>0]) !!}">{!! $v !!}</a>
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif

                            @php($s=(Funciones::BuscarEnString($actual,'Ventas')==true)?'active':null)
                            <li class="{!! $s !!}">
                                {{--<a href="{!! route('MySell',['id'=>$user->id,'slug'=>$user->getMySlug()]) !!}">{!! trans('stud.sell') !!}</a>--}}
                                <a href="{!! route('MySell',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.sell') !!}</a>
                            </li>
                            @php($s=(Funciones::BuscarEnString($actual,'Galeria')==true)?'active':null)
                            <li class="{!! $s !!}">
                                {{--<a href="{!! route('MyGallery',['id'=>$user->id,'slug'=>$user->getMySlug()]) !!}">{!! trans('stud.photos') !!}</a>--}}
                                <a href="{!! route('MyGallery',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.photos') !!}</a>
                            </li>
                            @php($s=(Funciones::BuscarEnString($actual,'Video')==true)?'active':null)
                            <li class="{!! $s !!}">
                                {{--}}<a href="{!! route('MyVideo',['id'=>$user->id,'slug'=>$user->getMySlug()]) !!}">{!! trans('stud.video') !!}</a>--}}
                                <a href="{!! route('MyVideo',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.video') !!}</a>
                            </li>
                            @php($s=(Funciones::BuscarEnString($actual,'Contacto')==true)?'active':null)
                            <li class="{!! $s !!}">
                                {{----<a href="{!! route('MyContact',['slug'=>$user->getMySlug(),'id'=>$user->id]) !!}">{!! trans('stud.contact') !!}</a>--}}
                                <a href="{!! route('MyContact',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.contact') !!}</a>
                            </li>


                        </ul>
                        {{--
                        <ul>
                            <li><a href="index.html" class="active">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2.html">Home 2</a></li>
                                    <li><a href="index-3.html">Home 3</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Pages</a>
                                <div class="mega-menu mega-menu-page">
                                    <div class="column-1 column">
                                        <ul>
                                            <li><a href="about-us.html">About US</a></li>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                                            <li><a href="blog-right-sidebar.html">Blog right sidebar</a></li>
                                            <li><a href="blog-details.html">Blog details</a></li>
                                        </ul>
                                    </div>
                                    <div class="column-2 column">
                                        <ul>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="coming-soon.html">Coming soon</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="contact-2.html">Contact 2</a></li>
                                        </ul>
                                    </div>
                                    <div class="column-3 column">
                                        <ul>
                                            <li><a href="faq.html">FAQ</a></li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="portfolio.html">Portfolio 3 column</a></li>
                                            <li><a href="portfolio-2.html">Portfolio 4 column</a></li>
                                            <li><a href="404.html">404</a></li>
                                        </ul>
                                    </div>
                                    <div class="column-4 column">
                                        <ul>
                                            <li><a href="shop.html">Shop</a></li>
                                            <li><a href="shop-list.html">Shop list</a></li>
                                            <li><a href="shop-left-sidebar.html">Shop left sidebar</a></li>
                                            <li><a href="shop-right-sidebar.html">Shop right sidebar</a></li>
                                            <li><a href="product-details.html">Product details</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a href="shop.html">Shop</a>
                                <div class="mega-menu mega-menu-1">
                                    <div class="column-1 column">
                                        <ul>
                                            <li><a href="shop-list.html">rings</a></li>
                                            <li><a href="shop-left-sidebar.html">diamond ring</a></li>
                                            <li><a href="shop-right-sidebar.html">gold ring</a></li>
                                            <li><a href="shop-list.html">sliver ring</a></li>
                                            <li><a href="shop-left-sidebar.html">Platinum ring</a></li>
                                        </ul>
                                    </div>
                                    <div class="column-2 column">
                                        <ul>
                                            <li><a href="shop-list.html">Bracelets</a></li>
                                            <li><a href="shop-left-sidebar.html">diamond Bracelets</a></li>
                                            <li><a href="shop-right-sidebar.html">gold Bracelets</a></li>
                                            <li><a href="shop-left-sidebar.html">sliver Bracelets</a></li>
                                            <li><a href="shop-right-sidebar.html">Platinum Bracelets</a></li>
                                        </ul>
                                    </div>
                                    <div class="column-3 column">
                                        <ul>
                                            <li><a href="shop-list.html">lecklaces</a></li>
                                            <li><a href="shop-right-sidebar.html">diamond lecklaces</a></li>
                                            <li><a href="shop-left-sidebar.html">gold lecklaces</a></li>
                                            <li><a href="shop-right-sidebar.html">sliver lecklaces</a></li>
                                            <li><a href="shop-left-sidebar.html">Platinum lecklaces</a></li>
                                        </ul>
                                    </div>
                                    <div class="column-4 column">
                                        <a href="#"><img src="{!! url('theme/y/img/product/10.jpg') !!}" alt=""/></a>
                                    </div>
                                </div>
                            </li>
                            <li><a href="shop.html">New Arrivals</a>
                                <div class="mega-menu mega-menu-1">
                                    <div class="column-1 column">
                                        <ul>
                                            <li><a href="shop-list.html">rings</a></li>
                                            <li><a href="shop-left-sidebar.html">diamond ring</a></li>
                                            <li><a href="shop-right-sidebar.html">gold ring</a></li>
                                            <li><a href="shop-list.html">sliver ring</a></li>
                                            <li><a href="shop-left-sidebar.html">Platinum ring</a></li>
                                        </ul>
                                    </div>
                                    <div class="column-2 column">
                                        <ul>
                                            <li><a href="shop-list.html">Bracelets</a></li>
                                            <li><a href="shop-left-sidebar.html">diamond Bracelets</a></li>
                                            <li><a href="shop-right-sidebar.html">gold Bracelets</a></li>
                                            <li><a href="shop-left-sidebar.html">sliver Bracelets</a></li>
                                            <li><a href="shop-right-sidebar.html">Platinum Bracelets</a></li>
                                        </ul>
                                    </div>
                                    <div class="column-3 column">
                                        <ul>
                                            <li><a href="shop-list.html">lecklaces</a></li>
                                            <li><a href="shop-right-sidebar.html">diamond lecklaces</a></li>
                                            <li><a href="shop-left-sidebar.html">gold lecklaces</a></li>
                                            <li><a href="shop-right-sidebar.html">sliver lecklaces</a></li>
                                            <li><a href="shop-left-sidebar.html">Platinum lecklaces</a></li>
                                        </ul>
                                    </div>
                                    <div class="column-4 column">
                                        <ul>
                                            <li><a href="shop-right-sidebar.html">earrings</a></li>
                                            <li><a href="shop-list.html">diamond earrings</a></li>
                                            <li><a href="shop-left-sidebar.html">gold earrings</a></li>
                                            <li><a href="shop-list.html">sliver earrings</a></li>
                                            <li><a href="shop-left-sidebar.html">Platinum earrings</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a href="portfolio.html">Portfolio</a>
                                <ul class="sub-menu">
                                    <li><a href="portfolio.html">Portfolio 3 column</a></li>
                                    <li><a href="portfolio-2.html">Portfolio 4 column</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">Blog Page</a></li>
                                    <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                                    <li><a href="blog-right-sidebar.html">Blog right sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact</a>
                                <ul class="sub-menu">
                                    <li><a href="contact.html">Contact 1</a></li>
                                    <li><a href="contact-2.html">Contact 2</a></li>
                                </ul>
                            </li>
                        </ul>
                        --}}
                    </nav>
                </div>
                <div class="mobile-menu hidden-md hidden-lg">
                    <nav>
                        <ul>
                            <li><a href="index.html" class="active">Home</a>
                                <ul>
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2.html">Home 2</a></li>
                                    <li><a href="index-3.html">Home 3</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul>
                                    <li><a href="about-us.html">About US</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                                    <li><a href="blog-right-sidebar.html">Blog right sidebar</a></li>
                                    <li><a href="blog-details.html">Blog details</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="coming-soon.html">Coming soon</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="contact-2.html">Contact 2</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="portfolio.html">Portfolio 3 column</a></li>
                                    <li><a href="portfolio-2.html">Portfolio 4 column</a></li>
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="shop-list.html">Shop list</a></li>
                                    <li><a href="shop-left-sidebar.html">Shop left sidebar</a></li>
                                    <li><a href="shop-right-sidebar.html">Shop right sidebar</a></li>
                                    <li><a href="product-details.html">Product details</a></li>
                                </ul>
                            </li>
                            <li><a href="shop.html">Shop</a>
                                <ul>
                                    <li><a href="shop-list.html">rings</a>
                                        <ul>
                                            <li><a href="shop-left-sidebar.html">diamond ring</a></li>
                                            <li><a href="shop-right-sidebar.html">gold ring</a></li>
                                            <li><a href="shop-list.html">sliver ring</a></li>
                                            <li><a href="shop-left-sidebar.html">Platinum ring</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-list.html">Bracelets</a>
                                        <ul>
                                            <li><a href="shop-left-sidebar.html">diamond Bracelets</a></li>
                                            <li><a href="shop-right-sidebar.html">gold Bracelets</a></li>
                                            <li><a href="shop-left-sidebar.html">sliver Bracelets</a></li>
                                            <li><a href="shop-right-sidebar.html">Platinum Bracelets</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-list.html">lecklaces</a>
                                        <ul>
                                            <li><a href="shop-right-sidebar.html">diamond lecklaces</a></li>
                                            <li><a href="shop-left-sidebar.html">gold lecklaces</a></li>
                                            <li><a href="shop-right-sidebar.html">sliver lecklaces</a></li>
                                            <li><a href="shop-left-sidebar.html">Platinum lecklaces</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="shop.html">New Arrivals</a>
                                <ul>
                                    <li><a href="shop-list.html">rings</a>
                                        <ul>
                                            <li><a href="shop-left-sidebar.html">diamond ring</a></li>
                                            <li><a href="shop-right-sidebar.html">gold ring</a></li>
                                            <li><a href="shop-list.html">sliver ring</a></li>
                                            <li><a href="shop-left-sidebar.html">Platinum ring</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-list.html">Bracelets</a>
                                        <ul>
                                            <li><a href="shop-left-sidebar.html">diamond Bracelets</a></li>
                                            <li><a href="shop-right-sidebar.html">gold Bracelets</a></li>
                                            <li><a href="shop-left-sidebar.html">sliver Bracelets</a></li>
                                            <li><a href="shop-right-sidebar.html">Platinum Bracelets</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-list.html">lecklaces</a>
                                        <ul>
                                            <li><a href="shop-right-sidebar.html">diamond lecklaces</a></li>
                                            <li><a href="shop-left-sidebar.html">gold lecklaces</a></li>
                                            <li><a href="shop-right-sidebar.html">sliver lecklaces</a></li>
                                            <li><a href="shop-left-sidebar.html">Platinum lecklaces</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-right-sidebar.html">earrings</a>
                                        <ul>
                                            <li><a href="shop-right-sidebar.html">diamond lecklaces</a></li>
                                            <li><a href="shop-left-sidebar.html">gold earrings</a></li>
                                            <li><a href="shop-list.html">sliver earrings</a></li>
                                            <li><a href="shop-left-sidebar.html">Platinum earrings</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="portfolio.html">Portfolio</a>
                                <ul>
                                    <li><a href="portfolio.html">Portfolio 3 column</a></li>
                                    <li><a href="portfolio-2.html">Portfolio 4 column</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog 1</a></li>
                                    <li><a href="blog-left-sidebar.html">Blog 2</a></li>
                                    <li><a href="blog-right-sidebar.html">Blog 3</a></li>
                                </ul>
                            </li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact</a>
                                <ul>
                                    <li><a href="contact.html">Contact 1</a></li>
                                    <li><a href="contact-2.html">Contact 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div><!--End Main Menu Area-->
