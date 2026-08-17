<footer>

    <!-- Footer Content -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3  col-sm-6 col-xs-12">
                    <!-- Info Widget -->
                    <div class="widget">
                        <div class="logo">
                            <img alt="{!! Config::get('app.name') !!}" src="{!! $logo !!}">
                        </div>
                        <p>
                            {!! trans('portal.pagelogo') !!}

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
                    </div>
                    <!-- Info Widget Exit -->
                </div>
                <div class="col-md-3  col-sm-6 col-xs-12">
                    <!-- Follow Us -->
                    <div class="widget socail-icons">
                        <h5>
                            {!! trans('portal.followus') !!}
                        </h5>
                        <ul>

                            <li>
                                <a class="fb" href="{!! url(\Config::get('otra.hfacebook')) !!}" target="_blank">
                                    <i class="fa fa-facebook">
                                    </i>
                                </a>
                                <span>Facebook</span>
                            </li>
                            <li>
                                <a class="twitter" href="{!! url(\Config::get('otra.htwitter')) !!}" target="_blank">
                                    <i class="fa fa-twitter">
                                    </i>
                                </a>
                                <span>Twitter</span>
                            </li>
                            <li>
                                <a class="fb" href="{!! url(\Config::get('otra.hyoutube')) !!}" target="_blank">
                                    <i class="fa fa-youtube">
                                    </i>
                                </a>
                                <span>Youtube</span>
                            </li>
                            {{--
                            <li>
                                <a class="linkedin" href="">
                                    <i class="fa fa-linkedin">
                                    </i>
                                </a>
                                <span>Linkedin</span>
                            </li>

                            <li>
                                <a class="googleplus" href="">
                                    <i
                                            class="fa fa-google-plus">
                                    </i>
                                </a>
                                <span>Google+</span>
                            </li>
                            --}}
                        </ul>
                    </div>
                    <!-- Follow Us End -->
                </div>
                <div class="col-md-6  col-sm-6 col-xs-12">
                    <!-- Newslatter -->
                    <div class="widget widget-newsletter">
                        <h5>
                            {!! trans('portal.subscribe') !!}
                        </h5>
                        <div class="fieldset">
                            <p>
                                {!! trans('portal.subscribetext') !!}

                            </p>
                            <form>
                                <input class="" value="Enter your email address" type="text">
                                <input class="submit-btn" name="submit" value="Submit" type="submit">
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
                        <p>{{--{!! trans('portal.allright') !!}--}}

                            HorsesWorldSales
                            ©
                            {!! Funciones::CurrentYear()!!}
                            {!! trans('portal.allright') !!}{{--
                            <a
                                    href="#" >Scriptsbundle</a>
                            --}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
