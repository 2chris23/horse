<?php $logo = url(\Config('logos.blanco750X')); ?>
<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
<footer>
    <!-- Footer Content -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3  col-sm-6 col-xs-12">
                    <!-- Info Widget -->
                    <div class="widget">
                        <div class="logo">
                            <img alt="{!! Config::get('app.name') !!}" src="{!! $logo !!}" class="img-responsive logo-foot">
                        </div>
                        <p>
                            {!! trans('portal.footertext') !!}
                        </p>
                        {{--
                        <ul>
                            <li>
                                <img src="{!! url('portal_/images/appstore.png') !!}" alt="">
                            </li>
                            <li>
                                <img src="{!! url('portal_/images/googleplay.png') !!}" alt="">
                            </li>
                        </ul>
                        --}}
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
                    <!-- Info Widget Exit -->
                </div>
                {{--}}                <div class="col-md-3  col-sm-6 col-xs-12">
                    <!-- Follow Us -->
                    <div class="widget socail-icons">
                        <h5>Follow Us</h5>
                        <ul>
                            <li>
                                <a class="fb" href="">
                                    <i class="fa fa-facebook">
                                    </i>
                                </a>
                                <span>Facebook</span>
                            </li>
                            <li>
                                <a class="twitter" href="">
                                    <i class="fa fa-twitter">
                                    </i>
                                </a>
                                <span>Twitter</span>
                            </li>
                            <li>
                                <a class="linkedin" href="">
                                    <i class="fa fa-linkedin">
                                    </i>
                                </a>
                                <span>Linkedin</span>
                            </li>
                            <li>
                                <a class="googleplus" href="">
                                    <i class="fa fa-google-plus">
                                    </i>
                                </a>
                                <span>Google+</span>
                            </li>
                        </ul>
                    </div>
                    <!-- Follow Us End -->
                </div>
                --}}
                <div class="col-md-6  col-sm-6 col-xs-12">
                    <!-- Newslatter -->
                    <div class="widget widget-newsletter">
                        <h5>
                            Comparte
                        </h5>
                        <div class="fieldset">
                            <p>
                                Puedes recomendar Horses World Sale para que se suscriba
                            </p>
                            <form>
                                <input class="" value="{!! trans('portal.placholderemail') !!}" type="text">
                                <input class="submit-btn" name="submit" value="{!! trans('portal.submitsuscribe') !!}"
                                       type="submit">
                            </form>
                        </div>
                    </div>
                    <!-- Newslatter -->
                </div>
            </div>
        </div>
    </div>
    <!-- Copyrights -->
    <div class="copyrights">
        <div class="container">
            <div class="copyright-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p>
                            {{--{!! trans('portal.allright') !!}--}}

                            <a href="{!! route('landinghome') !!}" class="copyright" target="_blank">
                                HorsesWoldSales.com</a>
                            ©
                            {!! Funciones::CurrentYear()!!}
                            {!! trans('portal.allright') !!}

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>

<!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->