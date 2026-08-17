{{-- Se usa. fondo negro --}}
<?php $logo = url(\Config('logos.blanco750X')); ?>
<footer class="footer-area">
    <!--Footer Upper-->
    <div class="footer-content">
        <div class="container">
            <div class="row ">
                <!--Two 4th column-->
                <style>
                    @media (min-width: 320px) {

                        .logofigure{
                        {{-- LG --}}
                          {{--padding-left: 15%;--}}
                        {{-- sm --}}
                           {{--padding-left: 7%;--}}
}
                    }

                    @media (min-width: 576px) {

                    }

                    @media (min-width: 768px) {
                        .logofigure{
                        {{-- LG --}}
                           {{--padding-left: 15%;--}}
                        {{-- sm --}}
                          {{--padding-left: 7%;--}}
}
                    }

                    @media (min-width: 867px) {
                    }

                    @media (min-width: 992px) {
                    }

                    @media (min-width: 1200px) {

                    }

                </style>
                <div class="row clearfix">
                    <div class="col-xs-12 col-md-offset-2 col-md-8 column">
                        <div class="footer-widget about-widget">
                            <div class="col-xs-offset-3 col-xs-6 text-center m-t-20 logo">
                            {{--<div class="logo text-center" style="left: 33%; position: relative;">--}}
                                <a href="{!! route('portal') !!}">
                                    <figure class="logofigure" style="    ">
                                    <img alt="{!! Config::get('app.name') !!}" class="img-responsive logo-foot"
                                         src="{!! $logo !!}">
                                    </figure>
                                </a>
                            </div>
                            <div class="col-xs-offset-3 col-xs-6 text-center m-t-20">
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
                            <div class="col-xs-offset-4 col-sm-offset-5 col-xs-6 col-md-offset-5 col-md-4 social-links-two clearfix text-center" >
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
                </div>
                <!--Two 4th column End-->
                <!--Two 4th column-->
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">
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

                <a href="{!! route('portal') !!}" class="copyright" >
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
