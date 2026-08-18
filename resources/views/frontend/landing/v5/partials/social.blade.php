<div class="header_top_menu clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-12 hidden-xs text-right">
                <div class="call_us_text">
                    <a rel="nofollow" href=""><i class="fa fa-envelope-o"></i>{!! $stud->getEmail() !!}</a>
                    @php($cd = 0)
                    @foreach($stud->getPhoneModel() as $k=> $v)
                        @if($v->isNull() !== true)
                            @if($cd == 0)
                                <a rel="nofollow" href="tel:{!! $v->getFormatNumberOnly() !!}"
                                   class="no-color">
                                    <i class="fa fa-phone"></i> {!! $v->FormatNumber() !!}
                                </a>
                            @php($cd = 1)
                        @endif
                    @endif
                @endforeach
                <!--a href=""><i class="fa fa-phone"></i>061 9876 5432</a> <!-- revisar aqui -->
                </div>
            </div>

            <div class="col-md-3 col-sm-12 hidden-xs">
                <div class="head_top_social text-right">
                    @if(!empty($stud->getFacebook()->getUrlPage())or
                    !empty($stud->getPinterest()->getUrlPage()) or
                    !empty($stud->getGoogle()->getUrlPage()) or
                    !empty($stud->getTwitter()->getUrlPage()) or
                    !empty($stud->getYoutube()->getUrlPage()))

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
                </div>
            </div>

        </div>
    </div>
</div>