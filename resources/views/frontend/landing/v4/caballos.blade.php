@extends('frontend.landing.v4.base')
@php($venta= isset($venta)?$venta:0)
@php($type= isset($type)?$type:0)

@if($type == 0)
    @php($titu = trans('stud.sell'))
@else
    @php($titu = trans('horse.sexs.'.$type))
@endif
@section('title', $titu)
@if($venta!=0)
@section('fbheader')
    @include('meta',
        [
        'titulo' => $stud->getTituloWeb(),
        'descripcion'=>$stud->getSeodescripcion(),
        'key'=>$stud->words,
        'logo'=>$stud->getLogo(),
        'imagenes' =>$stud->getPhotosModel(),
        ])
@endsection
@php($web = (isset($web))?$web:trans('portal.sellhorse'))
@php($sweb = (isset($sweb))?$sweb:trans('portal.sellhorse'))
@else
@section('fbheader')
    @include('meta',
        [
        'titulo' => $stud->getTituloWeb(),
        'descripcion'=>$stud->getSeodescripcion(),
        'key'=>$stud->words,
        'logo'=>$stud->getLogo(),
        'imagenes' =>$stud->getPhotosModel(),
        ])
@endsection
@php($web = (isset($web))?$web:trans('stud.ouranimal'))
@php($sweb = (isset($sweb))?$sweb:'')
@endif
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner bg-9">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>
                        {!! $titu !!}
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- END / SUB BANNER -->

    <!-- ROOM -->
    <section class="section-room bg-white borde-top">
        <div class="container">

            <div class="room-wrap-1">
                <div class="row">
                    <!-- ITEM -->
                    @foreach($horses as $k=>$v)
                        @php
                            $nombre = $v->getName();
                            $f = $v->getPhotoFirstModel();
                            $foto = '';
                                if(!empty($f)){
                                    $foto = $f->getUrl();
                                }
                            $desc = $v->getDescripcion();
                            $ndesc = substr(strip_tags($desc), 0, 100);
                            if (strlen(strip_tags($desc)) > 150)
                                $ndesc .= '...';
                            $raza = $v-> getRaza();
                            $mes = $v->getAgeMonth();
                            $edad = $v->getAge();
                            $alzada = $v->getRaisedFormat();
                            $color = $v->getColorString();
                            $doma = $v-> getDoma();
                            $cubricion = $v->tocubri;
                            $pcubri = $v->ObtenPrecioCubricionMonedaMill();
                            $ParaVender= $v->getTosold();
                            $precio = Funciones::AjustarNumeroMil($v-> getPrice());
                        @endphp
                        <div class="col-md-6">
                            <div class="room_item-1">

                                <h2><a rel="nofollow"
                                       href="{!! route('MyHorseDetailed', ['stud'=>$stud->slug,'horse'=>$v->slug]) !!}">{!! $nombre !!}</a>
                                </h2>

                                <div class="img">
                                    <a rel="nofollow"
                                       href="{!! route('MyHorseDetailed', ['stud'=>$stud->slug,'horse'=>$v->slug]) !!}"><img
                                                class="img-center" src="{!! $foto !!}" alt=""></a>
                                </div>

                                <div class="desc">
                                    <p>{!! $ndesc !!}</p>
                                    <ul>
                                        <li>{!! trans('portal.raza') !!}: {!! trans('horse.raza.'.$raza )!!}</li>
                                        <li>{!! trans('portal.age') !!}:
                                            @if($edad!=0)
                                                {!! trans('horse.years',['ano'=>$edad]) !!}
                                            @else
                                                {!! trans('horse.mes',['mes'=>$mes]) !!}
                                            @endif</li>
                                        <li>{!! trans('portal.raised') !!}:
                                            @if(!empty($alzada))
                                                {!! $alzada !!}
                                            @endif</li>
                                        <li>{!! trans('portal.color') !!}:
                                            @if(!empty($color))
                                                {!! $color !!}
                                            @endif</li>
                                        <li>{!! trans('portal.doma') !!}:
                                            @if(!empty($doma))
                                                @if($doma == 1)
                                                    {!! trans('horse.doma.'.$doma )!!}
                                                @endif
                                            @else
                                                @php($doma = 0)
                                                {!! trans('horse.doma.'.$doma )!!}
                                            @endif</li>
                                        @if(!empty($cubricion))
                                            @if($cubricion==1)
                                                <li>{!! trans('horse.text.cubricion') !!}:
                                                    <span @include('backend.common.toolmoneda',['horse'=>$v,'c'=>1 ]) >
                                                            @if($pcubri==0)
                                                            {!! trans('users.pricecheck') !!}
                                                        @else
                                                            {!!  $pcubri !!}
                                                            <span class="coinl coinl-local">
                                                                    {!! $v->getSimboloMoneda() !!}
                                                                </span>
                                                        @endif
                                                        </span>
                                                </li>
                                            @endif
                                        @else
                                        @endif
                                    </ul>
                                </div>

                                <div class="bot">
                                    {{--<span class="price">Starting <span class="amout">$260</span> /days</span>--}}
                                    @if($ParaVender == true)
                                        <span class="price">{!! trans('portal.price') !!}:
                                            @if( $v->sold == 1)
                                                <span class="amout">{!! trans('users.sold') !!}</span>
                                            @else
                                                @if(empty($precio))
                                                    <span>{!! trans('users.pricecheck') !!}</span>
                                                @else
                                                    <span class="amout"
                                                          data-getprice="{!! $v->slug !!}" @include('backend.common.toolmoneda',['horse'=>$v,'p'=>1 ]) >
                                                                {!! $v->ObtenPrecioMonedaMill() !!}
                                                        <span class="amout" class="coinl coinl-local">
                                                                {!! $v->getSimboloMoneda() !!}
                                                            </span>
                                                        </span>
                                                @endif
                                            @endif
                                            </span>
                                    @endif
                                    <a rel="nofollow"
                                       href="{!! route('MyHorseDetailed', ['stud'=>$stud->slug,'horse'=>$v->slug]) !!}"
                                       class="awe-btn awe-btn-default bold">{!! trans('portal.seemore') !!}</a>
                                </div>

                            </div>
                        </div>
                @endforeach
                <!-- END / ITEM -->
                </div>
            </div>

        </div>
    </section>
    <!-- END / ROOM -->
@endsection