@if(!empty($stud->getFacebook()->getUrlPage())or
                    !empty($stud->getPinterest()->getUrlPage()) or
                    !empty($stud->getGoogle()->getUrlPage()) or
                    !empty($stud->getTwitter()->getUrlPage()) or
                    !empty($stud->getYoutube()->getUrlPage()))
    <div id="SocialShare">
        <div class="jssocials-shares">


            @if(!empty($stud->getFacebook()->getUrlPage()))

                <div class="jssocials-share jssocials-share-facebook">
                    <a target="_blank"
                       href="{!! $stud->getFacebook()->getUrlPage() !!}"
                       class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                        <i class="fa fa-facebook jssocials-share-logo">
                        </i>
                        <span class="jssocials-share-count"> </span>
                    </a>
                </div>


            @endif
            @if(!empty($stud->getTwitter()->getUrlPage()))
                <div class="jssocials-share jssocials-share-twitter">
                    <a href="{!! $stud->getTwitter()->getUrlPage() !!}" target="_blank"
                       class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                        <i
                                class="fa fa-twitter jssocials-share-logo">
                        </i>
                        <span class="jssocials-share-count"></span>
                    </a>
                </div>
            @endif
            @if(!empty($stud->getInstagram()->getUrlPage()))
                <a href="{!! $stud->getInstagram()->getUrlPage() !!}" target="_blank"><i
                            class="fa fa-instagram"></i></a>
            @endif
            @if(!empty($stud->getPinterest()->getUrlPage()))
                <div class="jssocials-share jssocials-share-pinterest">
                    <a target="_blank"
                       href="{!! $stud->getPinterest()->getUrlPage() !!}"
                       class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                        <i
                                class="fa fa-pinterest jssocials-share-logo">
                        </i>
                        <span class="jssocials-share-count"> </span>
                    </a>
                </div>
            @endif
            @if(!empty($stud->getYoutube()->getUrlPage()))
                <div class="jssocials-share jssocials-share-googleplus">
                    <a target="_blank"
                       href="{!! $stud->getYoutube()->getUrlPage() !!}"
                       class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                        <i
                                class="fa fa-youtube jssocials-share-logo">
                        </i>
                        <span class="jssocials-share-count">
</span>
                    </a>
                </div>

            @endif
            @if(!empty($stud->getGoogle()->getUrlPage()))
                <div class="jssocials-share jssocials-share-googleplus">
                    <a target="_blank"
                       href="{!! $stud->getGoogle()->getUrlPage() !!}"
                       class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                        <i
                                class="fa fa-google jssocials-share-logo">
                        </i>
                        <span class="jssocials-share-count">
</span>
                    </a>
                </div>
            @endif



            {{--<div class="jssocials-share jssocials-share-email">
                <a target="_self"
                   href="mailto:?subject=%20Www.yeguadajosefer%40nixiweb.com&amp;body=http%3A%2F%2Fdesarrollo.com%2Fla-esmeralda"
                   class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                    <i
                            class="fa fa-at jssocials-share-logo">
                    </i>
                    <span class="jssocials-share-count">
    </span>
                </a>
            </div>--}}






            {{--
            <div class="jssocials-share jssocials-share-whatsapp">
                <a target="_self"
                   href="whatsapp://send?text=http%3A%2F%2Fdesarrollo.com%2Fla-esmeralda %20Www.yeguadajosefer%40nixiweb.com"
                   class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                    <i
                            class="fa fa-whatsapp jssocials-share-logo">
                    </i>
                    <span class="jssocials-share-count">
    </span>
                </a>
            </div>
            <div class="jssocials-share jssocials-share-linkedin">
                <a target="_blank"
                   href="https://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2Fdesarrollo.com%2Fla-esmeralda"
                   class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                    <i
                            class="fa fa-linkedin jssocials-share-logo">
                    </i>
                    <span class="jssocials-share-count">
    </span>
                </a>
            </div>
            <div class="jssocials-share jssocials-share-stumbleupon">
                <a target="_blank"
                   href="http://www.stumbleupon.com/submit?url=http%3A%2F%2Fdesarrollo.com%2Fla-esmeralda"
                   class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                    <i
                            class="fa fa-stumbleupon jssocials-share-logo">
                    </i>
                    <span
                            class="jssocials-share-count">
    </span>
                </a>
            </div>
            <div class="jssocials-share jssocials-share-telegram">
                <a target="_self"
                   href="tg://msg?text=http%3A%2F%2Fdesarrollo.com%2Fla-esmeralda %20Www.yeguadajosefer%40nixiweb.com"
                   class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                    <i
                            class="fa fa-telegram jssocials-share-logo">
                    </i>
                    <span class="jssocials-share-count">
    </span>
                </a>
            </div>
            <div class="jssocials-share jssocials-share-viber">
                <a target="_self"
                   href="viber://forward?text=http%3A%2F%2Fdesarrollo.com%2Fla-esmeralda %20Www.yeguadajosefer%40nixiweb.com"
                   class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                    <i
                            class="fa fa-volume-control-phone jssocials-share-logo">
                    </i>
                    <span
                            class="jssocials-share-count">
    </span>
                </a>
            </div>
            <div class="jssocials-share jssocials-share-pocket">
                <a target="_blank"
                   href="https://getpocket.com/save?url=http%3A%2F%2Fdesarrollo.com%2Fla-esmeralda"
                   class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                    <i
                            class="fa fa-get-pocket jssocials-share-logo">
                    </i>
                    <span
                            class="jssocials-share-count">
    </span>
                </a>
            </div>
            <div class="jssocials-share jssocials-share-messenger">
                <a target="_self"
                   href="fb-messenger://share?link=http%3A%2F%2Fdesarrollo.com%2Fla-esmeralda"
                   class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                    <i
                            class="fa fa-commenting jssocials-share-logo">
                    </i>
                    <span
                            class="jssocials-share-count">
    </span>
                </a>
            </div>
            <div class="jssocials-share jssocials-share-vkontakte">
                <a target="_blank"
                   href="https://vk.com/share.php?url=http%3A%2F%2Fdesarrollo.com%2Fla-esmeralda&amp;description=%20Www.yeguadajosefer%40nixiweb.com"
                   class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                    <i
                            class="fa fa-vk jssocials-share-logo">
                    </i>
                    <span class="jssocials-share-count">
    </span>
                </a>
            </div>
            --}}
        </div>
    </div>
@endif
