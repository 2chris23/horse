@extends('frontend.landing.v5.base')
@section('content')
    <!-- sliders -->
    @include('frontend.landing.v5.partials.sliders')
    <!-- caballos -->
    <section id="ourPakeg" class="ourPakeg">
        <div class="container">
            <div class="main_pakeg_content">
                <div class="row">
                    <div class="head_title text-center">
                        <h4>{!! $horse->getName() !!}</h4>
                    </div>
                    @php
                        $f = $horse->getPhotoFirstModel();
                        $foto = '';
                        if(!empty($f)){
                            $foto = $f->getUrl();
                        }
                        $edad = $horse->getAge();
                        $mes = $horse->getAgeMonth();
                        $sold = ($horse->sold == 1) ?'sold':'';
                    @endphp
                    <div class="single_pakeg_one text-right wow rotateInDownRight pak"
                         style="background:url({!! $foto !!}) left center no-repeat;">
                        <div class="col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6 peq">
                            <div class="single_pakeg_text">
                                <div class="pakeg_title">
                                    <h4>{!! $horse->getName() !!}</h4>
                                </div>
                                <div class="row text-left ">
                                    <div class="col-xs-6 ">
                                        {!! trans('portal.raza') !!}:
                                    </div>
                                    <div class="col-xs-6 ">
                                        {!! trans('horse.raza.'.$horse->raza) !!}
                                    </div>
                                </div>
                                <div class="row text-left  ">
                                    <div class="col-xs-6 ">
                                        {!! trans('portal.age') !!}:
                                    </div>
                                    <div class="col-xs-6 ">
                                        @if($edad!=0)
                                            {!! trans('horse.years',['ano'=>$edad]) !!}
                                        @else
                                            {!! trans('horse.mes',['mes'=>$mes]) !!}
                                        @endif
                                    </div>
                                </div>
                                <div class="row text-left  ">
                                    <div class="col-xs-6 ">
                                        {!! trans('stud.text.raised') !!}:
                                    </div>
                                    <div class="col-xs-6 ">
                                        {!! $horse->getRaisedFormat() !!}
                                    </div>
                                </div>
                                <div class="row text-left  ">
                                    <div class="col-xs-6 ">
                                        {!! trans('portal.sex') !!} :
                                    </div>
                                    <div class="col-xs-6 ">
                                        {!! trans('horse.sex.'.$horse->sex )!!}
                                    </div>
                                </div>
                                <div class="row text-left  ">
                                    <div class="col-xs-6 ">
                                        {!! trans('horse.attrib.color') !!}:
                                    </div>
                                    <div class="col-xs-6 ">
                                        {!! trans('horse.color.'.$horse->color) !!}
                                    </div>
                                </div>
                                @if(!empty($horse->getStud() ))
                                    @if($horse->getStud() !='')
                                        <div class="row text-left  ">
                                            <div class="col-xs-6 ">
                                                {!! trans('horse.text.stud') !!}:
                                            </div>
                                            <div class="col-xs-6 ">
                                                {!! $horse->getStud() !!}
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                <div class="row text-left  ">
                                    <div class="col-xs-6 ">
                                        {!! trans('portal.doma') !!}:
                                    </div>
                                    <div class="col-xs-6 ">
                                        @if($horse->getDoma() != 1 )
                                            {!! trans('horse.doma.0' )!!}
                                        @else
                                            {!! trans('horse.doma.'.$horse->doma )!!}
                                        @endif
                                    </div>
                                </div>
                                @if(!empty($horse->getGenealogia()))
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {{trans('horse.text.genealogia')}}:
                                        </div>
                                        <div class="col-xs-6 ">
                                            <a rel="nofollow" href="{!! url($horse->getGenealogia()) !!}"
                                               target="_blank">
                                                {!! trans('tema1.ficha') !!}
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($horse->tocubri))
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('horse.text.cubricion') !!}:
                                        </div>
                                        <div class="col-xs-6 ">
                                                <span class="mone no-color" @include('backend.common.toolmoneda',['precio'=>$horse->ObtenPrecioCubricionMoneda()])>
                                                     {!! $horse->ObtenPrecioMonedaMill() !!}
                                                    <span class="coinl coinl-local">
                        {!! $horse->getSimboloMoneda() !!}
                    </span>
                                                    {{--
                                                    {!!Funciones::AjustarNumeroMil($horse->getCubriPrice())   !!}
                                                    <i class="fa fa-eur"></i>
                                                    --}}
                                                </span>
                                        </div>
                                    </div>
                                @endif
                                @if($horse->getTosold() == true)
                                    <div class="row text-left  ">
                                        <div class="col-xs-6 ">
                                            {!! trans('portal.price') !!}:</p>
                                        </div>
                                        <div class="col-xs-6 ">
                                            @if( $horse->sold == 1)
                                                {!! trans('users.sold') !!}
                                            @else
                                                @if(empty($horse->getPrice()))
                                                    <span class="consulta no-color">
                                                            {!! trans('users.pricecheck') !!}
                                                        </span>
                                                @else
                                                    <span class="mone no-color" @include('backend.common.toolmoneda',['precio'=>$horse->getPrice()]) >
                                                            {!! Funciones::AjustarNumeroMil($horse->getPrice()) !!}
                                                        <i class="fa fa-eur"></i>
                                                        </span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fotos y videos -->
    @include('frontend.landing.v5.partials.portafolio')
@endsection