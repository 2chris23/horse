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
            ]@endphp
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
        ]@endphp
        @endif
    @endforeach
@endif

<div id="parallax">
    <div class="cab-slider hidden">
        @foreach($ts as $k=>$v)
            <div class="col-xs-12 ">
                {{--style="z-index: 999;"--}}
                <div class="hola1 {{--animated infinite bounce--}}"
                     {!! $animacionslickslide !!}

                >

                    <p class="b_faddown2 texto-imagen1  m-t-10 texto-shadow ">
                        {!! $v['titulo'] !!}
                    </p>
                    <p class="b_faddown2 texto-imagen2 m-t-10 texto-shadow">
                        {!! $v['stitulo'] !!}
                    </p>

                </div>

                <img lsrc="{!!$v['url'] !!}" alt="{!! $v['alt'] !!}">

            </div>
        @endforeach
        {{--
        <div>
            <img lsrc="{!! url('theme/w/img/model1.jpg') !!}">
        </div>
        <div>
            <img lsrc="{!! url('theme/w/img/parallax-bg1-.jpg') !!}">
        </div>
        --}}
    </div>
</div>
<div class="clearfix"></div>
<section id="hero" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="herotext">
                    {{--
                    <div style="height: 165px;"></div>
                    <!--h1 class="wow bounceInDown" data-wow-duration="1s" data-wow-delay="0.1s">VELERO JV</h1>
                    <p class="lead wow zoomIn" data-wow-duration="2s" data-wow-delay="0.5s">
                        Nueva Promesa 2017
                    </p>
                    <p>
                        <a href="#" class="btn btn-default btn-lg wow fadeInLeft" role="button"> View Gallery </a> &nbsp; <a href="#" class="btn btn-default btn-lg wow fadeInRight" role="button">Find a Cause</a>
                    </p-->
                </div>
                --}}
            </div>
            <div class="col-md-7">
            </div>
        </div>
    </div>
    </div>
</section>
<div class="clearfix"></div>