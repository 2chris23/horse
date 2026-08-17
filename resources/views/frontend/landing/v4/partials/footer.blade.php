<footer id="footer" class="footer-style-3 text-center">
    <div class="contact-map">
        <div id="map" class="awe-parallax" data-styles="silver"
             data-locations="{!! $stud->getLat() !!},{!! $stud->getLng() !!}"
             data-center="{!! $stud->getLat() !!},{!! $stud->getLng() !!}">
        </div>
        <div class="container contact contact-f text-center">
            <div class="footer_top">
                <div class="ot-heading row-20 mb40 text-center">
                    <h2>{!! trans('stud.contactus') !!}</h2>
                    <p class="sub">{!! trans('stud.contactustext') !!}</p>
                </div>
                <div class="mailchimp mb30 text-center">
                    <a rel="nofollow" href="#"
                       class="awe-btn btn-medium font-hind bold f12 awe-btn-default awe-btn-default f13"
                       data-target="#modalcontact" data-toggle="modal">{!! trans('stud.contact') !!}</a>
                </div>
            </div>

        </div>


        <div class="copyright">
            <div class="container">
                <p class="pull-left inline-block f14 col-sm-4 text-left">
                    Copyright © {!! Funciones::CurrentYear()!!} <a rel="nofollow" target="_blank"
                                                                   href="{!! url($stud->getDomain()) !!}">{!! $stud->getDomain() !!}</a>
                </p>
                <div class="social inline-block col-sm-4">
                    @if(!empty($stud->getFacebook()->getUrlPage())or
                    !empty($stud->getPinterest()->getUrlPage()) or
                    !empty($stud->getGoogle()->getUrlPage()) or
                    !empty($stud->getTwitter()->getUrlPage()) or
                    !empty($stud->getYoutube()->getUrlPage()))

                        @if(!empty($stud->getFacebook()->getUrlPage()))
                            <a rel="nofollow" class="mr10" href="{!! $stud->getFacebook()->getUrlPage() !!}"
                               target="_blank"><i
                                        class="fa fa-facebook f16"></i></a>
                        @endif
                        @if(!empty($stud->getTwitter()->getUrlPage()))
                            <a rel="nofollow" class="mr10" href="{!! $stud->getTwitter()->getUrlPage() !!}"
                               target="_blank"><i
                                        class="fa fa-twitter f16"></i></a>
                        @endif
                        @if(!empty($stud->getInstagram()->getUrlPage()))
                            <a rel="nofollow" class="mr10" href="{!! $stud->getInstagram()->getUrlPage() !!}"
                               target="_blank"><i
                                        class="fa fa-instagram f16"></i></a>
                        @endif
                        @if(!empty($stud->getPinterest()->getUrlPage()))
                            <a rel="nofollow" class="mr10" href="{!! $stud->getPinterest()->getUrlPage() !!}"
                               target="_blank"><i
                                        class="fa fa-pinterest-p f16"></i></a>
                        @endif
                        @if(!empty($stud->getYoutube()->getUrlPage()))
                            <a rel="nofollow" class="mr10" href="{!! $stud->getYoutube()->getUrlPage() !!}"
                               target="_blank">
                                <i class="fa fa-youtube f16"></i>
                            </a>
                        @endif
                        @if(!empty($stud->getGoogle()->getUrlPage()))
                            <a rel="nofollow" class="mr10" href="{!! $stud->getGoogle()->getUrlPage() !!}"
                               target="_blank">
                                <i class="fa fa-google-plus f16"></i>
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>
