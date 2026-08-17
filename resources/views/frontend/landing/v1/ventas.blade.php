@if($venta!=0)
    @section('title', trans('Titulos.VentaCliente'))
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
    @section('title', trans('Titulos.HorsesStud'))
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

@extends('frontend.landing.v1.base')
@section('content')

    @include('frontend.landing.v1.partials.baner',['texto'=>$web,'clase'=>'about-banner','stex'=>$sweb])

    @if(count($horses)==0)
        <section id="gallery" class="gallery margin-top-120 bg-white">
            <div class="container">
                <div class="row">
                    <div class=" col-xs-offset-3 col-xs-6 m-t-20">
                        @include('flash::message')
                    </div>
                    <div class="main-gallery main-model roomy-80">
                        {{--
                        <h3 class="text-uppercase text-white">
                            {!! trans('stud.contactus') !!}
                        </h3>
                        --}}
                        <p>
                        <h4 class="text-uppercase">
                            <div class="text-center row " style=" min-height: 100px; max-height: 337px; ">
                                <div class="col-offset-3 col-6 f-s-16 " style="padding-bottom:30px">
                                    {!! trans('portal.nohorse') !!}
                                </div>
                                {{--
                                <figure>
                                    <img src="{!! $stud->getLogo(); !!}" alt="" class="img-responsive">
                                </figure>
                                --}}

                                <a href="{!! route('MyContact',['slug'=>$user->getMySlug()]) !!}"
                                   class="btn-contact coorp"
                                   @if(!empty($stud->getColor()))
                                   style="
                                           color: {!! $stud->getColor() !!};
                                           "
                                        @endif


                                >
                                    {!! trans('stud.contact') !!}
                                </a>


                            </div>
                        </h4>

                        </p>
                    </div>
                </div>
            </div>
        </section>


    @else
        <section id="gallery" class="gallery margin-top-120 bg-white">
            <div class="container">
                <div class="row">
                    <div class=" col-xs-offset-3 col-xs-6 m-t-20">
                        @include('flash::message')
                    </div>
                    <div class="main-gallery main-model roomy-80">
                        <div class="col-md-12 m-bottom-60">
                            <div class="filters-button-group sm-text-center">
                                <button class="button is-checked" data-filter="*">{!! trans('portal.allra') !!}</button>
                                @foreach($sexos as $k=>$v)
                                    <button class="button" id="{!! trans('horse.sexs.'.$v['sex']) !!}"
                                            id='{!! trans('horse.sex.'.$v['sex']) !!}'
                                            data-filter=".{!! trans('horse.sexs.'.$v['sex']) !!}">{!! trans('horse.sexs.'.$v['sex']) !!}</button>
                                @endforeach
                                {{--<button class="button " data-filter="solde">Vendidos</button>--}}
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="grid models text-center">
                            @foreach($horses as $k=>$v)

                                @php
                                    $img = '';
                                    $p = $v->getPhotoFirstModel();
                                    if(!empty($p)){
                                        $img = $p->getUrl();
                                        //$img = $p->Base64(200);
                                        //$img = $p->getCacheUrl(200,200);
                                    }else{
                                        $img ='';
                                    }
                                $sold = ($v->sold == 1) ?'sold':'';

                                @endphp
                                <div class="grid-item model-item transition metal ium @if($v->sold == 1) solde @endif {!! trans('horse.sexs.'.$v->sex) !!}">
                                    <div class="model_item m-top-30">
                                        <div class="model_img">
                                            @if($v->sold == 1)
                                                <div class="sold sold-n"></div>
                                            @endif
                                            <figure class="figure-center tam-img-270">
                                                @if($img !='')
                                                    <img lsrc="{!!$img !!}" alt="{!! $v->getAltText() !!}"
                                                         class="img-responsive hidden  lazy"/>
                                                @endif
                                            </figure>

                                            <a href="{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]) !!}"
                                               class="btn btn-default m-top-20">
                                                {!! trans('portal.seemore') !!}
                                                <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                            <div class="model_caption">
                                                <h5 class="text-white">{!! $v->getName() !!}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End off col-md-3 -->

                            @endforeach

                        </div>
                        <div class="clearfix"></div>

                    </div>

                </div>
            </div><!-- Portfolio container end -->
        </section><!-- End off portfolio section -->
    @endif


@endsection