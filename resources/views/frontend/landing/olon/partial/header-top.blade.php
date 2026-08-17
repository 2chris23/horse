<div class="header-top"><!--Start Header Top Area-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="info">
                    <div class="phn-num float-left">
                        @php($cd =0 )
                        @foreach($stud->getPhoneModel() as $k=> $v)
                            @if($v->isNull() !== true)
                                @if($cd == 0)
                                    <i class="fa fa-phone float-left"></i>
                                    <p>


                                        <a href="tel:{!! $v->getFormatNumberOnly() !!}" class="no-color link">
                                            <span class="no-color link"> {!! $v->FormatNumber() !!} </span>
                                        </a>
                                    </p>
                                    @php($cd = 1)
                                @endif @endif @endforeach
                    </div>
                    <div class="mail-id float-left">
                        <i class="fa fa-envelope-o float-left"></i>
                        <p><a href="#">{!! $stud->getEmail() !!}</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">

                <div class="socials text-center">
                    @if(!empty($stud->getFacebook()->getUrlPage())or !empty($stud->getTwitter()->getUrlPage()) or !empty($stud->getYoutube()->getUrlPage()))
                        @if(!empty($stud->getFacebook()->getUrlPage()))

                            <a href="{!! $stud->getFacebook()->getUrlPage() !!}" class=""
                               target="_blank">
                                <i class="fa fa-facebook fa-fw">
                                </i>
                            </a>


                        @endif
                        @if(!empty($stud->getTwitter()->getUrlPage()))

                            <a href="{!! $stud->getTwitter()->getUrlPage() !!}" class=""
                               target="_blank">
                                <i class="fa fa-twitter fa-fw">
                                </i>
                            </a>

                        @endif
                        @if(!empty($stud->getInstagram()->getUrlPage()))

                            <a href="{!! $stud->getInstagram()->getUrlPage() !!}" class=""
                               target="_blank">
                                <i class="fa fa-instagram fa-fw">
                                </i>
                            </a>

                        @endif
                        @if(!empty($stud->getPinterest()->getUrlPage()))

                            <a href="{!! $stud->getPinterest()->getUrlPage() !!}" class=""
                               target="_blank">
                                <i class="fa fa-pinterest-p fa-fw">
                                </i>
                            </a>

                        @endif
                        @if(!empty($stud->getYoutube()->getUrlPage()))

                            <a href="{!! $stud->getYoutube()->getUrlPage() !!}" class=""
                               target="_blank">
                                <i class="fa fa-youtube fa-fw">
                                </i>
                            </a>

                        @endif
                        @if(!empty($stud->getGoogle()->getUrlPage()))

                            <a href="{!! $stud->getGoogle()->getUrlPage() !!}" class=""
                               target="_blank">
                                <i class=" fa fa-google-plus fa-fw">
                                </i>
                            </a>

                        @endif
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div id="top-menu" class="float-right">
                    @include('frontend.landing.v3.partial.languaje')
                    {{--<ul>

                        <li><a href="">My Account</a></li>
                        <li><a href="">$USD <i class="fa fa-angle-down"></i></a>
                            <ul>
                                <li><a href="">Pound</a></li>
                                <li><a href="">BDT</a></li>
                            </ul>
                        </li>
                        <li><a href="">English(UK) <i class="fa fa-angle-down"></i></a>
                            <ul>
                                <li><a href="">English(USA)</a></li>
                                <li><a href="">Bangla</a></li>
                            </ul>
                        </li>

                    </ul>--}}
                </div>
            </div>

        </div>
    </div>
</div><!--End Header Top Area-->