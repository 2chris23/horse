@php($robot= Agent::isRobot())
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



    <div class="fb-page"
         data-href="https://www.facebook.com/HorsesWorldSale/"
         data-small-header="false"
         data-adapt-container-width="true"
         data-hide-cover="false"
         data-show-facepile="false">
        <blockquote cite="https://www.facebook.com/HorsesWorldSale/"
                    class="fb-xfbml-parse-ignore">
            <a href="https://www.facebook.com/HorsesWorldSale/">HorsesWorldSale</a>
        </blockquote>
    </div>


@endif