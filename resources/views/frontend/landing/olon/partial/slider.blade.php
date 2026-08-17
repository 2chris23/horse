@php
    /*data-animation-in="rotateInDownRight"*/
        $animacionslickslide='

    data-animation-in="slideInDown"
    data-duration-in="2"
    ';
        $sliders = $stud->getSliders();
        $tmp = count($sliders);
    $ts = [];
    $hor = isset($horsew)?$horsew:null;
    $d = [];
    $d[0] = url('landing/images/slider/1/2.jpg');
    $d[1] = url('landing/images/slider/1/6.jpg');
    $d[2] = url('landing/images/slider/1/9.jpg');
    $d[3] = url('landing/images/slider/1/8.jpg');

@endphp

@if(!empty(Photo::Slider($stud->id)->first()) and empty($hor))
    {{--@if(count($sliders)>1)--}}

    @foreach($sliders as $k=>$v)
        @php
            $ts[$k] = [
                'url'=> $v['url'],
                'name'=> $stud->getName(),
                'titulo'=> $v->getTitulo1(),
                'stitulo'=> $v->getTitulo2(),
                'alt'=> $stud->getName(),
            ]
        @endphp
    @endforeach
@elseif(!empty($hor))
    @if(count($hor->getPhotoModel())!=0)
        @foreach($hor->getPhotoModel()  as $k=>$v)
            @php
                $ts[$k] = [
                    'url'=> $v->getUrl(),
                    'name'=> $v->getName(),
                    'titulo'=> $hor->getName(),
                    'stitulo'=> '',
                    'alt'=> $hor->getAltText(),
                ]
            @endphp
        @endforeach
    @else
        @foreach($d as $k=>$s)
            @if($k < 3)
                @php
                    $ts[$k] = [
                        'url'=> $d[$k],
                        'name'=> $stud->getName(),
                        'titulo'=> '',
                        'stitulo'=>'' ,
                        'alt'=> $stud->getName(),
                    ]
                @endphp
            @endif
        @endforeach
    @endif
@else
    @foreach($d as $k=>$s)
        @if($k < 3)
            @php
                $ts[$k] = [
                        'url'=> $d[$k],
                        'name'=> $stud->getName(),
                        'titulo'=> '',
                        'stitulo'=>'' ,
                        'alt'=> $stud->getName(),
                    ]
            @endphp
        @endif
    @endforeach
@endif

<!-- HOME SLIDER -->
<div class="slider-wrap home-1-slider">
    <div id="mainSlider" class="nivoSlider slider-image">

        @foreach($ts as $k=>$s)
            <img src="{!! $s['url'] !!}" alt="{!! $s['alt'] !!}" title="#htmlcaption{!! $k !!}"/>
        @endforeach
        {{--
        <img src="{!! url('theme/y/img/slider/1.jpg') !!}" alt="main slider" title="#htmlcaption1"/>
        <img src="{!! url('theme/y/img/slider/2.jpg') !!}" alt="main slider" title="#htmlcaption2"/>
        --}}
    </div>
    @foreach($ts as $k=>$v)
        <div id="htmlcaption{!! $k !!}" class="nivo-html-caption slider-caption-{!! $k !!}">
            <div class="slider-progress"></div>
            <div class="slide{!! $k !!}-text slide-text">
                <div class="middle-text">
                    <div class="cap-title wow slideInRight" data-wow-duration=".9s" data-wow-delay="0s">
                        <h1>
                            {!! $v['titulo'] !!}
                        </h1>
                    </div>
                    <div class="cap-dec wow slideInRight" data-wow-duration="1.3s" data-wow-delay="0s">
                        <h2>
                            {!! $v['stitulo'] !!}
                        </h2>
                    </div>
                    <div class="cap-readmore wow fadeInUpBig" data-wow-duration="1.5s" data-wow-delay="0s">
                        <a href="#">
                            {!! $v['name'] !!}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{--
    <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
        <div class="slider-progress"></div>
        <div class="slide1-text slide-text">
            <div class="middle-text">
                <div class="cap-title wow slideInRight" data-wow-duration=".9s" data-wow-delay="0s">
                    <h1>
                        Exclusive Jewelry
                    </h1>
                </div>
                <div class="cap-dec wow slideInRight" data-wow-duration="1.3s" data-wow-delay="0s">
                    <h2>
                        to express personality
                    </h2>
                </div>
                <div class="cap-readmore wow fadeInUpBig" data-wow-duration="1.5s" data-wow-delay="0s">
                    <a href="#">
                        Shop Now
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="htmlcaption2" class="nivo-html-caption slider-caption-2">
        <div class="slider-progress"></div>
        <div class="slide2-text slide-text">
            <div class="middle-text">
                <div class="cap-title wow bounceInDown" data-wow-duration=".9s" data-wow-delay="0s">
                    <h1>
                        Exclusive Jewelry
                    </h1>
                </div>
                <div class="cap-dec wow bounceInRight" data-wow-duration="1.5s" data-wow-delay="0s">
                    <h2>
                        to express personality
                    </h2>
                </div>
                <div class="cap-readmore wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                    <a href="#">
                        Shop Now
                    </a>
                </div>
            </div>
        </div>
    </div>--}}
</div>
<!-- HOME SLIDER -->
