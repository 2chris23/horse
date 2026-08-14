@php($logo = url(\Config('logos.blanco750X')))
<footer class="footer-area">
    <!--Footer Upper-->
    <div class="footer-content">
        <div class="container">
            <div class="row ">
                <!--Two 4th column-->
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">
                        <div class="col-lg-7 col-sm-6 col-xs-12 column">
                            <div class="footer-widget about-widget">
                                <div class="logo">
                                    <a href="{!! route('portal') !!}">
                                        <img alt="{!! Config::get('app.name') !!}" class="img-responsive logo-foot"
                                             src="{!! $logo !!}">

                                    </a>
                                </div>
                                <div class="text">
                                    <p>
                                        {!! trans('portal.footertext') !!}
                                    </p>
                                </div>
                                <ul class="contact-info">
                                    {{--
                                    <li>
                                        <span class="icon fa fa-map-marker">
                                        </span> 60 Link Road Lhr. Pakistan 54770
                                    </li>
                                    <li>
                                        <span class="icon fa fa-phone">
                                        </span> (042) 1234567890
                                    </li>
                                    --}}
                                    {{--
                                    <li>
                                        <span class="icon fa fa-envelope-o">
                                        </span> {!! \Config::get('otra.correocontacto') !!}
                                    </li>
                                    --}}
                                    {{--
                                    <li>
                                        <span class="icon fa fa-fax">
                                        </span> (042) 1234 7777
                                    </li>
                                    --}}
                                </ul>
                                <div class="social-links-two clearfix">

                                    <a class="facebook img-circle" href="{!! url(\Config::get('otra.hfacebook')) !!}"
                                       target="_blank">
                                        <span class="fa fa-facebook-f">
                                        </span>
                                    </a>
                                    <a class="twitter img-circle" href="{!! url(\Config::get('otra.htwitter')) !!}"
                                       target="_blank">
                                        <span class="fa fa-twitter">
                                        </span>
                                    </a>
                                    <a class="youtube img-circle" href="{!! url(\Config::get('otra.hyoutube')) !!}"
                                       target="_blank">
                                        <span class="fa fa-youtube">
                                        </span>
                                    </a>


                                    {{--
                                    <a class="google-plus img-circle" href="#">
                                        <span class="fa fa-google-plus">
                                        </span>
                                    </a>
                                    <a class="linkedin img-circle" href="#">
                                        <span class="fa fa-pinterest-p">
                                        </span>
                                    </a>
                                    <a class="linkedin img-circle" href="#">
                                        <span class="fa fa-linkedin">
                                        </span>
                                    </a>
                                    --}}
                                </div>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="col-lg-5 col-sm-6 col-xs-12 column">
                            <div class="heading-panel">
                                <h3 class="main-title text-left">Publicidad</h3>
                            </div>
                            <div class="footer-widget links-widget">
                                <ul>
                                    <li><a href="{!! route('SuscripcionIndex') !!}"> Suscripcion</a></li>
                                    <li><a href="{!! route('PublicidadIndex') !!}"> Publicidad</a></li>
                                    {{--<li><a href="{!! route('ContactoIndex') !!}"> Contacto</a></li>--}}
                                </ul>
                                {{--
                                <ul>
                                    <li>
                                        <a href="#">Web Development</a>
                                    </li>
                                    <li>
                                        <a href="#">Web Designing</a>
                                    </li>
                                    <li>
                                        <a href="#">Android Development</a>
                                    </li>
                                    <li>
                                        <a href="#">Theme Development</a>
                                    </li>
                                    <li>
                                        <a href="#">IOS Development</a>
                                    </li>
                                </ul>
                                --}}
                            </div>
                        </div>

                    </div>
                </div>
                <!--Two 4th column End-->
                <!--Two 4th column-->
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">

                    <!--Footer Column-->
                    {{--<div class="col-lg-7 col-sm-6 col-xs-12 column">
                        <div class="footer-widget news-widget">
                            <div class="heading-panel">
                                <h3 class="main-title text-left"> Contacto </h3>
                            </div>
                            <!--News Post-->
                            <div class="news-post">
                                <div class="icon">
                                </div>
                                <div class="news-content">
                                    <figure class="image-thumb">
                                        <img alt="" src="{!! url('portal_/images/blog/popular-2.jpg') !!}">
                                    </figure>
                                    <a href="#">If you need a crown or lorem an implant you will pay it gap it</a>
                                </div>
                                <div class="time">July 2, 2014</div>
                            </div>
                            <!--News Post-->
                            <div class="news-post">
                                <div class="icon">
                                </div>
                                <div class="news-content">
                                    <figure class="image-thumb">
                                        <img alt="" src="{!! url('portal_/images/blog/popular-1.jpg') !!}">
                                    </figure>
                                    <a href="#">If you need a crown or lorem an implant you will pay it gap it</a>
                                </div>
                                <div class="time">July 2, 2014</div>
                            </div>
                        </div>
                    </div>--}}

                        <div class="col-lg-5 col-sm-6 col-xs-12 column">
                            <div class="footer-widget links-widget">
                                <div class="heading-panel">
                                    <h3 class="main-title text-left"> Contacto </h3>
                                </div>
                                <ul>

                                    <li>
                                        {!! trans('portal.contactinfo') !!}
                                        <a href="{!! route('ContactoIndex') !!}">Contacto</a>
                                    </li>
                                    {{--
                                    <li>
                                        <a href="{!! route('portalporestado') !!}/0/0">Pais</a>
                                    </li>
                                    --}}
                                    {{--
                                    <li>
                                        <a href="#!">Pais</a>
                                    </li>

                                    <li>
                                        <a href="about.html">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Our Team</a>
                                    </li>
                                    <li>
                                        <a href="#">Our Services</a>
                                    </li>
                                    <li>
                                        <a href="index-7.html">One Page</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact Us</a>
                                    </li>
                                    --}}
                                </ul>
                            </div>
                        </div>
                    <!--Footer Column-->
                        <div class="col-lg-5 col-sm-6 col-xs-12 column">
                            <div class="footer-widget links-widget">
                                <div class="heading-panel">
                                    <h3 class="main-title text-left"> Aplicacion </h3>
                                </div>
                                <ul>
                                    {!! trans('portal.appinfo') !!}

                                    <li>
                                        <a href="{!! route('landinghome') !!}">Aplicacion</a>
                                    </li>
{{--
                                    <li>
                                        <a href="{!! route('portalporraza') !!}/0">Razas</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('portalporestado') !!}/0/0">Pais</a>
                                    </li>
                                    --}}
                                    {{--
                                    <li>
                                        <a href="#!">Pais</a>
                                    </li>
                                    
                                    <li>
                                        <a href="about.html">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Our Team</a>
                                    </li>
                                    <li>
                                        <a href="#">Our Services</a>
                                    </li>
                                    <li>
                                        <a href="index-7.html">One Page</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact Us</a>
                                    </li>
                                    --}}
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!--Two 4th column End-->
            </div>
        </div>
    </div>
    <!--Footer Bottom-->
    <div class="footer-copyright">
        <div class="container clearfix">
            <!--Copyright-->
            <div class="copyright text-center">
                {{--{!! trans('portal.allright') !!}--}}

                    <a href="{!! route('landinghome') !!}" class="copyright" target="_blank">
                        HorsesWoldSales.com</a>
                ©
                {!! Funciones::CurrentYear()!!}
                {!! trans('portal.allright') !!}
                {{--All rights reserved--}}


                {{--
                    <a
                        href="http://themeforest.net/user/scriptsbundle/portfolio" target="_blank">Scriptsbundle</a>
                        All Rights Reserved
                --}}

            </div>

        </div>
    </div>
</footer>