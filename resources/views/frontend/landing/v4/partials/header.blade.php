<div class="header_top">
    <div class="container">
        <div class="header_left float-left">
            <span><i class="fa fa-envelope-o"></i> {!! $stud->getEmail() !!}</span>
            @php($cd = 0)
            @foreach($stud->getPhoneModel() as $k=> $v)
                @if($v->isNull() !== true)
                    @if($cd == 0)
                        <span>
                            <i class="lotus-icon-phone"></i>
                            <a class="white"
                               href="tel:{!! $v->getFormatNumberOnly() !!}"> {!! $v->FormatNumber() !!}</a>
                        </span>
                        @php($cd = 1)
                    @endif
                @endif
            @endforeach
        </div>

        <div class="header_right float-right">
            <span class="socials">
                @if(!empty($stud->getFacebook()->getUrlPage())or
                !empty($stud->getPinterest()->getUrlPage()) or
                !empty($stud->getGoogle()->getUrlPage()) or
                !empty($stud->getTwitter()->getUrlPage()) or
                !empty($stud->getYoutube()->getUrlPage()) or
                !empty($stud->getInstagram()->getUrlPage()))

                    @if(!empty($stud->getFacebook()->getUrlPage()))
                        <a rel="nofollow" href="{!! $stud->getFacebook()->getUrlPage() !!}" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                    @endif
                    @if(!empty($stud->getTwitter()->getUrlPage()))
                        <a rel="nofollow" href="{!! $stud->getTwitter()->getUrlPage() !!}" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                    @endif
                    @if(!empty($stud->getInstagram()->getUrlPage()))
                        <a rel="nofollow" href="{!! $stud->getInstagram()->getUrlPage() !!}" target="_blank"><i
                                    class="fa fa-instagram"></i></a>
                    @endif
                    @if(!empty($stud->getPinterest()->getUrlPage()))
                        <a rel="nofollow" href="{!! $stud->getPinterest()->getUrlPage() !!}" target="_blank"><i
                                    class="fa fa-pinterest-p"></i></a>
                    @endif
                    @if(!empty($stud->getYoutube()->getUrlPage()))
                        <a rel="nofollow" href="{!! $stud->getYoutube()->getUrlPage() !!}" target="_blank">
                            <i class="fa fa-youtube"></i>
                        </a>
                    @endif
                    @if(!empty($stud->getGoogle()->getUrlPage()))
                        <a rel="nofollow" href="{!! $stud->getGoogle()->getUrlPage() !!}" target="_blank">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    @endif
                @endif
            </span>
            {{--
            <div class="dropdown currency">
                <span>USD <i class="fa fa"></i></span>
                <ul>
                    <li class="active"><a rel="nofollow" href="#">USD</a></li>
                    <li><a rel="nofollow" href="#">EUR</a></li>
                </ul>
            </div>
            --}}

            @include('frontend.landing.v4.partials.lenguaje')

        </div>
        <!-- HEADER LOGO -->
        <a rel="nofollow" class="logo-top img-responsive" href="{!! route('MyPage',['slug'=>$user->getMySlug()]) !!}">
            <img src="{!! $stud->getLogo() !!}" alt="">
        </a>
        <!-- END / HEADER LOGO -->

    </div>
</div>
