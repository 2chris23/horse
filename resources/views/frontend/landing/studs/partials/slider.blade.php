@php
    $url = (!empty($url))?$url:null;//$v['url']
    $name = (!empty($name))?$name:null;//$stud->getName()
    $titulo = (!empty($titulo))?$titulo:null;//$v['titulo1']
    $stitulo = (!empty($stitulo))?$stitulo:null;//$v['titulo2']
    $alt = (!empty($alt))?$alt:'';//$v['titulo2']
@endphp
{{--
<!--
<div class="item linear-overlay">
    <img src="{!!$url !!}" alt="">
</div>
-->
--}}

{{--<div class="single-slider slider-screen nrbop  mh600" style="background-image: url({!! $url !!});     background-size: cover; background-repeat: no-repeat;">--}}
<div class="item linear-overlay "
        {{--
        style="background-image: url({!! $url !!});background-repeat: no-repeat;
           background-size: cover;
           background-position: center;"
   --}}>
    <div class="slider-content text-white text-center img_{!! $k !!}" style="    ">

        @if(!empty($titulo) or !empty($stitulo))
            <div class="contenedor-img-sld">
                @if(!empty($titulo))
                    <p class="b_faddown2 texto-imagen1  m-t-10 texto-shadow ">
                        {!! $titulo  !!}
                    </p>
                @endif
                @if(!empty($stitulo))
                    <p class="b_faddown2 texto-imagen2 m-t-10 texto-shadow1">
                        {!! $stitulo  !!}
                    </p>
                @endif
            </div>
        @endif
        <figure class=" ">
            <img src="{!!$url !!}" alt="{!!  $alt !!}" class="img-responsive">
        </figure>
    </div>
</div>
