<div class="slider-section">
    {{--
    <div class="owl-prevf sombraizquierda oculto" >
        <i class="fa fa-chevron-left pull-left"></i>
    </div>
    <div class="owl-nextf sombraderecha oculto" >
        <i class="fa fa-chevron-right pull-right"></i>
    </div>
--}}
    {{--<div class="slider-active owl-carousel mh600">--}}
    <div class="principio owl-carousel mh600 corte-600">
        @php
            $sliders = $stud->getSliders();
            $tmp = count($sliders);

        @endphp
        @if($tmp==1)
            @php
                if(isset($sliders[0])){
                $d = [];
                    $d[0]= $sliders[0] ->getUrl()   ;
                    $d[1]= $sliders[0] ->getUrl()       ;
                    }
            @endphp
            @foreach($d as $k=>$s)
                @if($k < 3)
                    @include('frontend.landing.studs.partials.slider',[
                'url'=> $d[$k],
                'name'=> $stud->getName(),
                'titulo'=> '',
                'stitulo'=>'' ,
            'alt'=> $stud->getName(),
                ])

                    {{--
                    'titulo'=> $text[$k],
                'stitulo'=>$stext[$k] ,
                --}}


                @endif
            @endforeach
        @elseif($tmp !=0)
            {{--@if(count($sliders)>1)--}}

            @foreach($sliders as $k=>$v)

                {{-- Base64H'url'=> $v['url'],--}}
                {{--'url'=> $v->Base64(600),--}}
                @include('frontend.landing.studs.partials.slider',[


                'url'=> $v['url'],
                'name'=> $stud->getName(),
                'titulo'=> $v->getTitulo1(),
            'stitulo'=> $v->getTitulo2(),
            'alt'=> $stud->getName(),
                ])
                {{----}}
            @endforeach
        @else
            @php
                $d = [];
                   $d[0] = url('landing/images/slider/1/2.jpg');
        $d[1] = url('landing/images/slider/1/6.jpg');
        $d[2] = url('landing/images/slider/1/9.jpg');
        $d[3] = url('landing/images/slider/1/8.jpg');
            @endphp
            @foreach($d as $k=>$s)
                @if($k < 3)
                    @include('frontend.landing.studs.partials.slider',[
                'url'=> $d[$k],
                'name'=> $stud->getName(),
                'titulo'=> '',
                'stitulo'=>'' ,
            'alt'=> $stud->getName(),
                ])

                    {{--
                    'titulo'=> $text[$k],
                'stitulo'=>$stext[$k] ,
                --}}


                @endif
            @endforeach
        @endif
    </div>
</div>
<div class="clearfix"></div>
<script>

</script>

<div class=" col-xs-offset-3 col-xs-6 ">
    @include('flash::message')
</div>