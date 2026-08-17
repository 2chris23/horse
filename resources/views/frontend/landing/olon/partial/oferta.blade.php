<div class="banner-area fix"><!-- Product Offer Area Start -->
    @php
        $linea = 12;
        $horses = $stud->getHorses();
    @endphp
    @foreach($horses as $k=>$v)
        @php
            if($linea < 2) $linea = 12;
            $linea = abs($linea);
            if($linea < 6){
            $rnd = rand(1,$linea);
            }else{
            $rnd =  rand(1,5);
            }

            $linea = $linea-abs($rnd);

            $fat = $v->getPhotoFirstModel();
                        $img = "";
                    if(!empty($fat)){
                    $img = $fat->getUrl();
                    }
        @endphp

        <div class="col-sm-{!! $rnd !!} sin-banner ">
            <div class="imagernd">
                <a href="#">
                    <img src="{!! $img !!}" alt="{!! $v->getAltText() !!}"/>
                    <div class="wrap">
                        <h2>{!! $v->getName() !!}</h2>
                        <p>
                            {!! $rnd !!}/{!! $linea !!}
                        </p>
                    </div>
                </a>
            </div>
        </div>

    @endforeach
    {{--
    <div class="col-sm-6 sin-banner">
        <a href="#">
            <img src="{!! url('theme/y/img/offer/offer-1.jpg') !!}" alt=""/>
            <div class="wrap">
                <h2>Bracelets</h2>
                <p>perspiciatis unde omnis iste natus error sit voluptatem accm doloremque antium</p>
            </div>
        </a>
    </div>
    <div class="col-sm-4 sin-banner">
        <a href="#">
            <img src="{!! url('theme/y/img/offer/offer-2.jpg') !!}" alt=""/>
            <div class="wrap">
                <h2>Earrings</h2>
                <p>perspiciatis unde omnis iste natus error sit voluptatem accm doloremque antium</p>
            </div>
        </a>
    </div>
    <div class="col-sm-2 hidden-xs sin-banner text-1">
        <img src="{!! url('theme/y/img/offer/banner-bg.jpg') !!}" alt=""/>
        <div class="banner-text">
            <h1><span>New</span></h1>
            <h2>Arrivals</h2>
            <p>perspiciatis unde omnis iste natus error sit voluptatem accm doloremque antium</p>
            <a href="#">Shop Now</a>
        </div>
    </div>
    <div class="col-sm-2 hidden-xs sin-banner clear text-2">
        <img src="{!! url('theme/y/img/offer/banner-bg-2.jpg') !!}" alt=""/>
        <div class="banner-text">
            <h1>Sales <span>Up to</span></h1>
            <h2><span>30%</span>off</h2>
            <a href="#">Shop Now</a>
        </div>
    </div>
    <div class="col-sm-6 sin-banner">
        <a href="#">
            <img src="{!! url('theme/y/img/offer/offer-3.jpg') !!}" alt=""/>
            <div class="wrap">
                <h2>Rings</h2>
                <p>perspiciatis unde omnis iste natus error sit voluptatem accm doloremque antium</p>
            </div>
        </a>
    </div>
    <div class="col-sm-4 sin-banner">
        <a href="#">
            <img src="{!! url('theme/y/img/offer/offer-4.jpg') !!}" alt=""/>
            <div class="wrap">
                <h2>Necklaces</h2>
                <p>perspiciatis unde omnis iste natus error sit voluptatem accm doloremque antium</p>
            </div>
        </a>
    </div>
    --}}
</div><!-- Product Offer Area End -->
