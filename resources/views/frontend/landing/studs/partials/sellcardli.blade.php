@php

    $va = (!empty($va))?$va:0;//$v['id']
    $id = (!empty($id))?$id:null;//$v['id']
    $url = (!empty($url))?$url:null;//$v['url']
    $link = (!empty($link))?$link:'#!';//$v['url']
    $titulo = (!empty($titulo))?$titulo:null;//$v['titulo1']
    $stitulo = (!empty($stitulo))?$stitulo:null;//$v['titulo2']
    $raza = (!empty($raza))?$raza:0;//$v['titulo2']
    $alzada = (!empty($alzada))?$alzada:null;//$v['titulo2']
    $edad = (!empty($edad))?$edad:null;//$v['titulo2']
    $color = (!empty($color))?$color:null;//$v['titulo2']
    $horse = (empty($horse))?new Horse():$horse;
    if(!empty($horse)){
    $edad = $horse->getAge();
    $mes = $horse->getAgeMonth();
    }


//$link = route('MyHorseDetailed');
@endphp
<div class="item  row raza-{!! $raza !!} raza-0">
    <div class=" col-xs-12 card-horse{{-- col-xl-3 col-md-3 col-sm-6 col-sm-12  col-xs-12 row card-horse --}}" id="horse_card_{!! $id !!}">
        <div class="cause content-box">
            <div class="img-wrapper" id="info_b_{!! $id !!}">
                <a href="{!! $link !!}">
                    <div class="overlay">
                    </div>
                    <figure class="h-246">
                        <img class="img-responsive " data-lazy ="{!!$url !!}" {{-- lsrc="{!!$url !!}"  --}}alt=""
                             style="    max-height: auto; max-height: 200% !important; ">
                    </figure>
                </a>
            </div>
            <div class="info-block" id="info_b{!! $id !!}">
                <a href="{!! $link !!}">
                    <h4>
                        <a href="{!! $link !!}">{{--{!! trans('horse.attrib.name') !!}--}} {!! $titulo !!}</a>
                    </h4>
                    <p>
                        {!! trans('horse.attrib.raza') !!}: {!! trans('horse.raza.'.$raza)!!}<br>
                        @if($alzada != 0)
                            {!! trans('horse.attrib.raised') !!}: {!! $alzada !!}<br>
                        @endif
                        @if($edad != 0)
                            {!! trans('horse.age') !!}: {!! trans('horse.years',['ano'=>$edad]) !!}<br>

                        @else
                            {!! trans('horse.age') !!}: {!! trans('horse.mes',['mes'=>$mes]) !!}<br>
                        @endif


                        @if(!empty($color))
                            {!! trans('horse.attrib.color') !!}: {!! $color !!}<br>
                        @endif
                    </p>

                    {{--<a href="{!! $link !!}" class="btn btn-primary btn-block text-center"> {!! trans('portal.readmore') !!}</a>--}}
                    {{--
    <p>{!! $stitulo !!}</p>
                    <div class="donet_btn service-btn">
                        <a href="service-single.html" class="btn btn-min btn-solid">
    <i class="fa fa-archive">
    </i>
    <span>Learn more</span>
    </a>
                    </div>
                    --}}
                </a>
            </div>
        </div>
        <script>
            $('#info_b{!! $id !!}').on('click', function () {
                window.location.assign("{!! $link !!}");
           });
            $('#info_b_{!! $id !!}').on('click', function () {
                window.location.assign("{!! $link !!}");
           });
        </script>
    </div>
</div>
