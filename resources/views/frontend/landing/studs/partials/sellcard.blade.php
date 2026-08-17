@php

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
    $tagss = '';
    if(!empty($horse)){
    $edad = $horse->getAge();
    $mes = $horse->getAgeMonth();
    $tagss =  $horse->getAltText() ;
    }


//$link = route('MyHorseDetailed');
@endphp
<div class="col-md-4 col-sm-6 col-xs-12 h-400" id="horse_card_{!! $id !!}">
    <div class="cause content-box">
        <div class="img-wrapper" id="info_b_{!! $id !!}">

            <a href="{!! $link !!}">
                <div class="overlay">
                </div>
                <figure class="h-246">
                    @if($url != '')
                        <img class="img-responsive hidden " lsrc="{!!$url !!}" alt="{!! $tagss !!}"
                             style="    max-height: auto; max-height: 200% !important; ">
                    @endif
                </figure>
                @if($horse->sold == 1)
                    <div class="ribbon popular "></div>
                @endif
            </a>
        </div>
        <div class="info-block" id="info_b{!! $id !!}">
            <a href="{!! $link !!}">
                <h4>
                    <a href="{!! $link !!}">{!! $titulo !!}</a>
                </h4>


                {{--<p>{!! substr($stitulo , 0, 100);!!}</p>--}}
                {{--raza + altura + edad + color--}}
                <p>{!! trans('horse.razashort.'.$raza)!!}
                    @if($alzada != 0)
                        {!! $alzada !!},
                    @endif
                    @if($edad != 0)
                        {!! trans('horse.years',['ano'=>$edad]) !!},

                    @else
                        {!! trans('horse.mes',['mes'=>$mes]) !!},
                    @endif


                    @if(!empty($color))
                        {!! $color !!}
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
