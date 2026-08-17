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
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '260261811093896',
                xfbml: true,
                version: 'v2.8'
            });
            FB.AppEvents.logPageView();
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/{!! $llang_ !!}/sdk.js#xfbml=1&version=v2.8&appId=260261811093896';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endif
