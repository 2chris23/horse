@php
    $d7 = url('theme/w/img/hyc-1.jpg');
    $sliders = $stud->getSliders();
    $tmp = count($sliders);
    $st = [];
    $sd = [];
     $d = [];
        $d[0] = url('landing/images/slider/1/2.jpg');
        $d[1] = url('landing/images/slider/1/6.jpg');
        $d[2] = url('landing/images/slider/1/9.jpg');
        $d[3] = url('landing/images/slider/1/8.jpg');
        $st[0] = '';
        $st[1] = '';
        $st[2] = '';
        $st[3] = '';
        $sd[0] = '';
        $sd[1] = '';
        $sd[2] = '';
        $sd[3] = '';

        $d5 = $d[rand(0,3)];
        $d6 = $d[rand(0,3)];


@endphp
{{--Photo::Slider($stud->id)->first()--}}
{{-- @if(count($sliders)>1)--}}
@php

    if(!empty($sliders) and $stud->hasSlider() == true)
    {

            if($tmp == 1){

                $ts = $sliders[0];
                $d[0]= $ts->getUrl();//Probar con 1 imagen, puede dar fallo
                $st[0] = '';
                $sd[0] = '';
            }else{
                $d=[];
                foreach($sliders as $k=>$v){
                    $d[$k] = $v->getUrl();
                    $st[$k] =  $v->getTitulo1();
                    $sd[$k] =  $v->getTitulo2();
                }
                $d5 = $sliders[rand(0,count($sliders)-1)]->getUrl();
                $d6 = $sliders[rand(0,count($sliders)-1)]->getUrl();
            }

    }
@endphp




<!-- hasta aqui-->
<section id="slider" class="slider">

    {{--@if(!empty( $stud->getSliders() ))--}}
    @foreach($d as $k => $v)

        <div class="slider_overlay" style="background-image: url({!! $d[$k] !!})">
        <!--img src="{!! $d5!!}" style="background-size: cover; width: 100%"-->
            <div class="container">
                <div class="row">
                    <div class="main_slider text-center">
                        <div class="col-md-12">
                            <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                                <h1>{!! $st[$k] !!}</h1>
                                <p>{!! $sd[$k] !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{--
@else

    <div class="slider_overlay" style="background-image: url({!!$d5 !!});">
    <!--img src="{!! $d5!!}" style="background-size: cover; width: 100%"-->
        <div class="container">
            <div class="row">
                <div class="main_slider text-center">
                    <div class="col-md-12">
                        <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                            <h1>{!! $stud->getName() !!}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    --}}


</section>