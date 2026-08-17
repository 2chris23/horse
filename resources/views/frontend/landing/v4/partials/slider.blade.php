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


<section class="section-slider slider-style-2 clearfix">
    <div id="slider-revolution">
        <ul>
            @foreach($d as $k => $v)
                <li data-transition="fade">
                    <img src="{!! $d[$k] !!}" data-duration="10000" alt="">

                    <div class="tp-caption sfb fadeout slider-caption slider-caption-3" data-x="center" data-y="260"
                         data-speed="700" data-easing="easeOutBack" data-start="500">
                        {!! $st[$k] !!}
                    </div>

                    <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center"
                         data-y="365" data-easing="easeOutBack" data-speed="700" data-start="700">
                        {!! $sd[$k] !!}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
