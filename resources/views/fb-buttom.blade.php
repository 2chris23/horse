<?php $robot= Agent::isRobot(); ?>
@if($robot != true)
    @php
        //$url =  Request::fullUrl() ;
        $url = "http://horsesworldsale.com/";
        $url = "https://www.facebook.com/HorsesWorldSale/";
            $llang = \App::getLocale();
            $llang_ = 'en_US';
            if($llang == 'en'){
            $llang_ = 'en_US';
            }elseif ($llang == 'es'){
            $llang_ = 'es_LA';
            }elseif ($llang == 'fr'){
            $llang_ = 'fr_FR';
            }
    @endphp


    <!-- Load Facebook SDK for JavaScript -->

    {{--col-xs-offset-2--}}
    <div class="col-xs-offset-2 col-xs-9 text-center " style="    height: 40px;">
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/{!! $llang_ !!}/sdk.js#xfbml=1&version=v2.8&appId=260261811093896';

                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like"
             data-href="{!!$url !!}"
             data-layout="button"
             data-action="like"
             data-size="small"
             data-show-faces="false"
             data-share="true">
        </div>
        {{--
            <div class="fb-page"
                 data-href="https://www.facebook.com/HorsesWorldSale/"
                 data-small-header="true"
                 data-adapt-container-width="true"
                 data-hide-cover="true"
                 data-show-facepile="false">
                <blockquote cite="https://www.facebook.com/HorsesWorldSale/" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/HorsesWorldSale/">HorsesWorldSale</a>
                </blockquote>
            </div>
        --}}
    </div>
@endif
