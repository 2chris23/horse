@extends('backend.layouts.base')
@section('title', "Landing" )
<?php $urlfotos='https://image.flaticon.com/icons/png/128/2/2409.png'; ?>
<?php $urlcubri='https://image.flaticon.com/icons/png/128/2/2409.png'; ?>


@section('topcss')
    <link rel="Stylesheet" type="text/css" href="{!! url('css/pages/widgets.css') !!}"/>

    <style>

        .font-white {
            color: #fff !important;
        }

        .card-112 {
            height: 112px;
        }

        .card-112 > div > i {
            color: #525252;
            font-size: 3rem;
            padding-top: 11px;
        }

        .socialss > .fa {
            color: #fff;
        }
    </style>

@endsection
@section('topjs')


@endsection
@section('content')
    <?php $cubri = count(\Auth::user()->Horses()->where('tocubri',1)->get()); ?>
    <?php $fotocaballo= \Auth::user()->Horses()->with('Fotos')->get()->pluck('id'); ?>
    <?php $fotosyeguada= \Auth::user()->Yeguada()->getPhotosModel(); ?>
    <?php $videosyeguada= \Auth::user()->Yeguada()->getVideosModel(); ?>
    @php
        $ht =[];

    @endphp
    {{--
    <div class="col-12 m-t-35">
        <i class="horse horse-camino font-55">
</i>
        <i class="horse horse-comiendo font-55">
</i>
        <i class="horse horse-parado font-55">
</i>
        <i class="horse horse-parado-1 font-55">
</i>
        <i class="horse horse-pata font-55">
</i>
        <i class="horse horse-pata-1 font-55">
</i>
        <i class="horse horse-pata-2 font-55">
</i>
        <i class="horse horse-salto font-55">
</i>
    </div>
    --}}
    {{--
<div class="col-sm-6 col-12 col-lg-3">
    <div class="widget_icon_bgclr icon_align bg-white section_border">
        <div class="bg_icon bg_icon_info float-left">
            <i class="fa fa-heart-o text-info" aria-hidden="true">
</i>
        </div>
        <div class="text-right">
            <h3 id="widget_count1">2,436</h3>
            <p>Income status</p>
        </div>
    </div>


</div>
    --}}

    {{--------ICON DEMO-----------}}




    {{--------ICON DEMO-----------}}
    <div id="datos" class="card col-12 m-t-35 ">
        <div class="card-block">
            <?php $ts = count(\Auth::user()->Horses()->get()); ?>
            <div class='card-header bg-white '>
                {!! trans('portal.allhorse') !!}
                @if($ts !=0)
                    <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! $ts !!}
                        </span>
                    </span>
                @endif
                <div class="pull-right text-right totalessex ">
                    @foreach(trans('horse.raza')  as $k =>$v)
                        <?php $ht = count(\Auth::user()->Horses()->where('raza',$k)->get()); ?>
                        @if($ht!=0)
                            @if($k!=0)
                                <span class="badge badge-warning">
                                <b>{!! $ht !!}</b>
                                    {!! $v !!}
                            </span>
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                {{--
                                @foreach(trans('horse.raza') as $k=>$v)
                                    @if($k!=0)
                                        <?php $ts = count(\Auth::user()->Horses()->where('raza',$k)->get()); ?>

                                    @endif
                                    @if($ts != 0)
                                        @if($k != 0)
                                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                                                <div class="card ">
                                                    <div class="pull-left sales_icons">
                                                        {!! trans('horse.sexicon.'.$k,['size'=>55]) !!}
                                                    </div>
                                                    <div>
                                                        <h5 class="sales_orders text-right m-t-5">
                                                            {!! $v !!}
                                                        </h5>
                                                        <h1 class="sales_number m-t-15 text-right" id="orders_countup">
                                                            {!! $ts !!}
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    @endif
                                @endforeach
                                    <div class="col-12">Caballos por sexo</div>
                                --}}




                @foreach(trans('horse.sexs') as $k=>$v)
                    @if($k != 0)
                        <?php $dda =   count(\Auth::user()->Horses()->where('sex',$k)->get()); ?>
                        {{--<?php $ht[$k] = $dda ; ?>--}}
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                            <div class="card card-np">
                                <div class="pull-left sales_icons">
                                    {!! trans('horse.sexicon.'.$k,['size'=>55]) !!}
                                </div>
                                <div class="text-right">
                                    <h3 id="widget_count1">{!!$dda !!}</h3>

                                    <p>

                                        {!! $v !!}</p>
                                </div>
                            </div>
                        </div>

                        {{--
                    @else
                        <div class="col-sm-6 col-12 col-lg-3 m-t-20">
                            <div class="widget_icon_bgclr icon_align bg-white section_border">
                                <div class="bg_icon   float-left">
                                    {!! trans('horse.sexicon.'.$k,['size'=>55]) !!}
                                </div>
                                <div class="text-right">
                                    <h3 id="widget_count1">{!! count(\Auth::user()->Horses()->get()) !!}</h3>
                                    <p>{!! trans('portal.allra') !!}</p>
                                </div>
                            </div>
                        </div>--}}

                    @endif
                @endforeach


            </div>
        </div>
    </div>


    <div id="datos" class="card col-12 m-t-35 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                <?php $ts =count(\Auth::user()->Horses()->where(['tosold'=>1])->get()) ; ?>
                {!! trans('portal.sellhorse') !!}
                @if($ts !=0)
                    <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! $ts !!}
                        </span>
                    </span>
                @endif
                <div class="pull-right text-right totalessex">
                    @foreach(trans('horse.raza')  as $k =>$v)
                        <?php $ht = count(\Auth::user()->Horses()->where(['raza'=>$k,'tosold'=>1])->get()); ?>
                        @if($ht!=0)
                            @if($k!=0)
                                <span class="badge badge-warning">
                                <b>{!! $ht !!}</b> {!! $v !!}
                            </span>
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                {{---------VENTAS------------------}}

                {{--
                                @foreach(trans('horse.raza') as $k=>$v)

                                    @if($k!=0)
                                        <?php $hrs = \Auth::user()->Horses()->where(['raza'=>$k,'tosold'=>1])->get(); ?>
                                        <?php $ts = count($hrs); ?>
                                        <?php $ht[$k] = $ts; ?>
                                        <?php $cub =\Auth::user()->Horses()->where(['raza'=>$k,'tosold'=>1,'tocubri'=>1])->get() ; ?>

                                    @else
                                        <?php $hrs = \Auth::user()->Horses()->where(['tosold'=>1])->get(); ?>
                                        <?php $ts = count($hrs); ?>
                                        <?php $cub =\Auth::user()->Horses()->where(['tosold'=>1,'tocubri'=>1])->get() ; ?>
                                    @endif
                                @endforeach
                                --}}
                {{--
                    @if($ts != 0)
                        @if($k != 0)
                            <div class="col-xl-3 col-sm-6 col-12 m-t-20">
                                <div class="card p-d-15">
                                    <div class="sales_icons">
                                        <span class="bg-info">
</span>
                                        {!! trans('horse.sexicon.'.$k,['size'=>55]) !!}
                                    </div>
                                    <div>
                                        <h5 class="sales_orders text-right m-t-5">
                                            {!! $v !!}
                                        </h5>
                                        <h1 class="sales_number m-t-15 text-right" id="orders_countup">
                                            {!! $ts !!}
                                        </h1>
                                        @if(count($cub)!=0)
                                            <p class="sales_text">
                                                Cubricion : {!! count($cub) !!}
                                                {{--
                                                <span class="pull-right">
                                                    <i class="fa fa-caret-up text-mint font_18 m-r-5">
</i>
                                                    25.25%
                                                </span>
                                                -- }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-xl-3 col-sm-6 col-12 m-t-20">
                                <div class="card p-d-15">
                                    <div class="sales_icons">
                                        <span class="bg-warning">
</span>
                                        {!! trans('horse.sexicon.'.$k,['size'=>55]) !!}
                                    </div>
                                    <div>
                                        <h5 class="sales_orders text-right m-t-5">
                                            <p>{!! trans('portal.allra') !!}
                                        </h5>
                                        <h1 class="sales_number m-t-15 text-right" id="orders_countup">
                                            {!! $ts !!}
                                        </h1>
                                        @if(count($cub)!=0)
                                            <p class="sales_text">
                                                Cubricion : {!! count($cub) !!}
                                                {{--
                                                <span class="pull-right">
                                                    <i class="fa fa-caret-up text-mint font_18 m-r-5">
</i>
                                                    25.25%
                                                </span>
                                                -- }}
                                            </p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
                {{--SEXO -- }}
                <div class="col-12">Caballos en venta por sexo</div>
                --}}

                @foreach(trans('horse.sexs') as $k=>$v)
                    @if($k != 0)
                        <?php $dda =  count(\Auth::user()->Horses()->where(['tosold'=>1,'sex'=>$k])->get()); ?>
                        @if($dda !=0)
                            <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                                <div class="card card-np ">
                                    <div class="pull-left sales_icons">
                                        {!! trans('horse.sexicon.'.$k,['size'=>55]) !!}
                                    </div>
                                    <div class="text-right">

                                        <h3 id="widget_count1">{!!$dda !!}</h3>
                                        <p>
                                            {!! $v !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{--
                    @else
                        <div class="col-sm-6 col-12 col-lg-3 m-t-20">
                            <div class="widget_icon_bgclr icon_align bg-white section_border">
                                <div class="bg_icon bg_icon_warning  float-left">
                                    {!! trans('horse.sexicon.'.$k,['size'=>55]) !!}
                                </div>
                                <div class="text-right">
                                    <h3 id="widget_count1">{!! count(\Auth::user()->Horses()->where(['tosold'=>1])->get()) !!}</h3>
                                    <p>{!! trans('portal.allra') !!}</p>
                                </div>
                            </div>
                        </div>
                        --}}
                    @endif
                @endforeach
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                    <div class="card card-np ">
                        <div class="pull-left sales_icons">
                            {{--<img src="{!! $urlcubri !!}" alt="" class="img-fluid placefoto">--}}
                            <i class="fa fa-eyedropper" aria-hidden="true" style=" color:#555"></i>
                        </div>
                        <div class="text-right">
                            <h3 id="widget_count1">{!! $cubri !!}</h3>
                            <p>
                                {!! trans('horse.text.cubricions') !!}
                            </p>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>



    <div id="datos" class="card col-12 m-t-35 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('portal.directlinks') !!}
            </div>
            <div class="row">

                {{--
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                    <div class="card card-np ">
                        <div class="pull-left sales_icons">
                            Fotos de caballos
                        </div>
                        <div class="text-right">
                            <h3 id="widget_count1">{!!count($fotocaballo) !!}</h3>
                        </div>
                    </div>
                </div>
            --}}
                {{--FOTOS DE CABALLO--}}
                {{--<?php $ts = \Auth::user()->Horses()->with('Fotos')->get()->pluck('id'); ?>--}}
                <?php $ts = \Auth::user()->Yeguada()->getPhotosModel(); ?>
                @if(count($ts)!=0)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">

                        <div class="card card-np ">

                            <div class="row ">

                                {{--<?php $fot = Photo::wherein('tableid',$ts)->where(['type'=>4])->orderby('created_at','desc')->get(); ?>--}}
                                <?php $fot = $ts; ?>
                                <div class="col-8  sales_icons1 fotosimg fotosimg-small">
                                    {{--<img src="{!! $urlfotos !!}" alt="" class="img-fluid placefoto">
                                    --}}
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <?php $f = false; ?>
                                            @foreach($fot as $k=>$v)
                                                <li data-target="#carouselExampleIndicators" data-slide-to="{!! $k !!}"
                                                    @if($f == false)
                                                    class="active"
                                                        <?php $f = true; ?>
                                                        @endif
                                                >


                                                </li>
                                            @endforeach
                                        </ol>

                                        <?php $f = false; ?>

                                        <div class="carousel-inner" role="listbox">
                                            @foreach($fot as $k=>$v)

                                                {{--<?php $hrs = Horse::find($v->tableid); ?>--}}
                                                <div class="carousel-item
                                @if($f ==false) active <?php $f = true; ?> @endif ">
                                                    <figure class="fotosimg-small-figure">
                                                        <img lsrc="{!! url($v->url) !!}"
                                                             class="d-block img-fluid hidden" {{--alt="Chania" width="460" height="345"--}}>
                                                    </figure>
                                                    {{--<div class="carousel-caption d-none d-md-block">

                                                        <a href="{!! route('horse.edit',['id'=>$hrs->id]) !!}"
                                                           class="linkh">
                                                            {!! $hrs->name !!}

                                                        </a>
                                                    </div>--}}


                                                </div>

                                            @endforeach
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                           data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true">
</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                           data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true">
</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{!! route('photo.index') !!}" class="none">
                                        <h3 id="widget_count1">{!!count($fot) !!}</h3>

                                        <p>
                                            {!! trans('horse.text.photo') !!}
                                        </p>
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>
                @endif
                {{--
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                    <a href="{!! route('video.index') !!}" class="none">
                        <div class="card card-np ">
                            <div class="pull-left sales_icons fotosimg">
                                <img src="{!! $urlfotos !!}" alt="" class="img-fluid placefoto">
                            </div>
                            <div class="text-right">
                                <h3 id="widget_count1">{!!count($videosyeguada) !!}</h3>

                                <p>

                                    Albun de videos


                                </p>

                            </div>
                        </div>
                    </a>
                </div>
                --}}

                {{--VIDEOS--}}
                {{--<?php $ts = \Auth::user()->Horses()->with('Videoss')->get()->pluck('id'); ?>--}}
                <?php $ts = \Auth::user()->Yeguada()->getVideosModel(); ?>
                @if(count($ts)!=0)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">

                        <div class="card card-np ">
                            <div class="row ">
                                {{--<?php $fot = Video::wherein('tableid',$ts)->where(['type'=>4])->orderby('created_at','desc')->get(); ?>--}}
                                <?php $fot = $ts; ?>
                                <div class="col-8  sales_icons1 fotosimg fotosimg-small">
                                    {{--<img src="{!! $urlfotos !!}" alt="" class="img-fluid placefoto"> --}}
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <?php $f = false; ?>
                                            @foreach($fot as $k=>$v)
                                                <li data-target="#carouselExampleIndicators" data-slide-to="{!! $k !!}"
                                                    @if($f == false)
                                                    class="active"
                                                        <?php $f = true; ?>
                                                        @endif>

                                                </li>
                                            @endforeach
                                        </ol>

                                        <?php $f = false; ?>

                                        <div class="carousel-inner" role="listbox">
                                            @foreach($fot as $k=>$v)

                                                <div class="carousel-item
                                @if($f ==false) active <?php $f = true; ?> @endif ">
                                                    <figure class="fotosimg-small-figure">
                                                        <img lsrc="{!! url($v->getYoutubeThumb()) !!}"
                                                             class="d-block img-fluid hidden" {{--alt="Chania" width="460" height="345"--}}>
                                                    </figure>


                                                </div>

                                            @endforeach
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                           data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true">
</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                           data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true">
</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{!! route('photo.index') !!}" class="none">
                                        <h3 id="widget_count1">{!!count($fot) !!}</h3>

                                        <p>
                                            {!! trans('horse.text.videos') !!}
                                        </p>
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>
                @endif

                {{-- NUEVO CABALLO --}}
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                    <a href="{!! route('horse.create') !!}">
                        <div class="card card-np card-112 ">
                            <div class="row">
                                <div class=" sales_icons1 col-6">
                                    <i class="fa icon-black-head-horse-side-view-with-horsehair font-55"></i>
                                </div>
                                <div class="text-right col-6 p-l-0 p-r-10">
                                    <p>
                                        {!! trans('horse.new') !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- VENTAS --}}
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                    <a href="{!! route('sell.create') !!}">
                        <div class="card card-np card-112">
                            <div class="pull-left sales_icons">
                                <i class="fa fa-line-chart"></i>
                            </div>
                            <div class="text-right">
                                <h3 id="widget_count1 " class="">
                                    {!! count(App\Model\Sell::where('user_id',\Auth::user()->id)->get()) !!}
                                </h3>
                                <p>
                                    {!! trans('portal.sell') !!}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Yeguada --}}
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                    <a href="{!! route('stud.create') !!}">
                        <div class="card card-np card-112">
                            <div class="pull-left sales_icons">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="text-right">
                                <h3 id="widget_count1 " class="font-white">0</h3>
                                <p>
                                    {!! trans('stud.menu.caption') !!}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </div>
    {{-------------FOTOS DE CABALLO-------------------}}



    {{--
    <div class="col-12 row">
    <?php $ts = \Auth::user()->Horses()->with('Fotos')->get()->pluck('id'); ?>
    @if(count($ts)!=0)
        <div class="col-12 col-md-6">
            <div id="datos" class="card col-12  m-t-35 ">
                <div class="card-block">
                    <div class='card-header bg-white '>
                        FOTO CABALLOS
                    </div>
                    <div class="row">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <?php $fot = Photo::wherein('tableid',$ts)->where(['type'=>4])->orderby('created_at','desc')->get(); ?>
                        <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <?php $f = false; ?>
                                @foreach($fot as $k=>$v)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{!! $k !!}">

                                        @if($f == false)
                                            class="active"
                                            <?php $f = true; ?>
                                        @endif
                                    </li>
                                @endforeach
                            </ol>

                            <?php $f = false; ?>

                            <div class="carousel-inner" role="listbox">
                                @foreach($fot as $k=>$v)
                                    <?php $hrs = Horse::find($v->tableid); ?>
                                    <div class="carousel-item
                            @if($f ==false) active <?php $f = true; ?> @endif ">
                                        <figure>
                                            <img src="{!! url($v->url) !!}"
                                                 class="d-block img-fluid" {{--alt="Chania" width="460" height="345"-- }}>
                                        </figure>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>
                                                <a href="{!! route('horse.edit',['id'=>$hrs->id]) !!}">
                                                    {!! $hrs->name !!}

                                                </a>

                                            </h3>
                                            {{--
                                            <p>
                                                {!! trans('horse.raza.'.$hrs->raza) !!}
                                            </p>
                                            -- }}
                                        </div>


                                    </div>

                                @endforeach
                            </div>
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                               data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true">
</span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                               data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true">
</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
--}}


    {{-------------FOTOS DE YEGUADA------------------- }}
    <?php $ts = \Auth::user()->Yeguada()->getPhotosModel(); ?>
    @if(count($ts)!=0)
        <div class="col-12 col-md-6">
            <div id="datos" class="card col-12 m-t-35 ">
                <div class="card-block">
                    <div class='card-header bg-white '>
                        FOTO YEGUADA
                    </div>
                    <div class="row">
                        <div id="carouselStud" class="carousel slide" data-ride="carousel">
                        {{--<div id="myCarousel" class="carousel slide" data-ride="carousel">-- }}
                        <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <?php $f = false; ?>
                                @foreach($ts as $k=>$v)
                                    <li data-target="#carouselStud" data-slide-to="{!! $k !!}">

                                        @if($f == false)
                                            class="active"
                                            <?php $f = true; ?>
                                        @endif
                                    </li>
                                @endforeach
                            </ol>

                            <?php $f = false; ?>

                            <div class="carousel-inner" role="listbox">
                                @foreach($ts as $k=>$v)

                                    <div class="carousel-item
                        @if($f ==false) active <?php $f = true; ?> @endif ">
                                        <figure>
                                            <img src="{!! url($v->url) !!}"
                                                 class="d-block img-fluid" {{--alt="Chania" width="460" height="345"-- }}>
                                        </figure>
                                    </div>

                                @endforeach
                            </div>
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#carouselStud" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true">
</span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselStud" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true">
</span>
                                <span class="sr-only">Next</span>
                            </a>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
    --}}






    {{---------VENTAS------------------}}

    {{--
            <div class="col-sm-6 col-12 col-lg-3 media_max_573">
                <div class="widget_icon_bgclr icon_align bg-white eye_icon_border">
                    <div class="float-left progress_icon_fa">
                        <i class="fa fa-eye text-primary" aria-hidden="true">
</i>
                    </div>
                    <div class="text-right">
                        <h3 id="widget_count2">8,569</h3>
                        <p>Visitors</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12 col-lg-3 media_max_991">
                <div class="widget_icon_bgclr icon_align bg-white section_border">
                    <div class="bg_icon bg_icon_success float-left">
                        <i class="fa fa-cart-plus text-success" aria-hidden="true">
</i>
                    </div>
                    <div class="text-right">
                        <h3 id="widget_count3">4,859</h3>
                        <p>Sales</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12 col-lg-3 media_max_991">
                <div class="widget_icon_bgclr icon_align bg-white section_border">
                    <div class="bg_icon bg_icon_warning float-left">
                        <i class="fa fa-user text-warning" aria-hidden="true">
</i>
                    </div>
                    <div class="text-right">
                        <h3 id="widget_count4">32,568</h3>
                        <p>Subscribers</p>
                    </div>
                </div>
            </div>
            --}}
    {{--

    <div class="row m-t-35">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card p-d-15">
                <div class="sales_icons">
                    <span class="bg-info">
</span>
                    <i class="fa fa-shopping-cart">
</i>
                </div>
                <div>
                    <h5 class="sales_orders text-right m-t-5">ORDERS</h5>
                    <h1 class="sales_number m-t-15 text-right" id="orders_countup">1,425</h1>
                    <p class="sales_text">Total orders: 9,320
                        <span class="pull-right">
<i class="fa fa-caret-up text-mint font_18 m-r-5">
</i>25.25%</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 media_max_573">
            <div class="card p-d-15">
                <div class="sales_icons">
                    <span class="bg-danger">
</span>
                    <i class="fa fa-bar-chart">
</i>
                </div>
                <div>
                    <h5 class="sales_orders text-right m-t-5">REVENUE</h5>
                    <h1 class="sales_number m-t-15 text-right">$<span id="revenue_countup">600</span>
                    </h1>
                    <p class="sales_text">Total revenue: 8,250
                        <span class="pull-right">
<i class="fa fa-caret-down text-danger font_18 m-r-5">
</i>20%</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 media_max_1199">
            <div class="card p-d-15">
                <div class="sales_icons">
                    <span class="bg-primary">
</span>
                    <i class="fa fa-cube">
</i>
                </div>
                <div>
                    <h5 class="sales_orders text-right m-t-5">PRODUCTS</h5>
                    <h1 class="sales_number m-t-15 text-right" id="products_countup">2,100</h1>
                    <p class="sales_text">Total products: 12,100
                        <span class="pull-right">
<i class="fa fa-caret-up text-primary font_18 m-r-5">
</i>45%</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 media_max_1199">
            <div class="card p-d-15">
                <div class="sales_icons">
                    <span class="bg-warning">
</span>
                    <i class="fa fa-credit-card">
</i>
                </div>
                <div>
                    <h5 class="sales_orders text-right m-t-5">SOLD</h5>
                    <h1 class="sales_number m-t-15 text-right" id="sold_countup">1,025</h1>
                    <p class="sales_text">Total sold: 7,600
                        <span class="pull-right">
<i class="fa fa-caret-up text-warning font_18 m-r-5">
</i>24.5%</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    --}}
    <?php $sociales = \Auth::user()->Yeguada()->getSocialNetwork(); ?>








    @if(count($sociales)!=0)
        <div id="datos" class="card col-12 m-t-35 ">
            <div class="card-block">
                <div class='card-header bg-white '>
                    {!! trans('portal.socialnetwors') !!}
                </div>
                <div class="row">
                    {{--
                    <div class="col-12 col-md-1  m-t-25">
                        <div class="social-counter text-center">
                            <ul class="m-b-0">
                                @foreach($sociales as $k=>$v)

                                    <?php $t = $v->getTwitter(); ?>
                                    <?php $p =$v->getPinterest(); ?>
                                    <?php $f =$v->getFacebook(); ?>
                                    <?php $g =$v->getGoogle(); ?>
                                    <?php $i =$v->getInstagram(); ?>
                                    <?php $y =$v->getYoutube(); ?>
                                    @if(!empty($t))
                                        <li class="twitter">
                                            <a href="{!! $t !!}" target="_blank">
                                                <div class="row">
                                                    <div class="col-12 text-right social_icon_top">
<span
        class="social-icon text-center">
<i
        class="fa fa-twitter">
</i>
</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @elseif(!empty($p))
                                        <a href="{!! $p !!}" class="btn btn-pinterest socialss" target="_blank">
                                            pinterest</a>
                                    @elseif(!empty($f))

                                        <li class="facebook">
                                            <a href="{!! $f !!}" target="_blank">
                                                <div class="row">
                                                    <div class="col-12 text-right social_icon_top">
<span
        class="social-icon text-center">
<i
        class="fa fa-facebook">
</i>
</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @elseif(!empty($g))
                                        <li class="google">
                                            <a href="{!! $g !!}" target="_blank">
                                                <div class="row">
                                                    <div class="col-12 text-right social_icon_top">
<span
        class="social-icon text-center">
<i
        class="fa fa-google-plus">
</i>
</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @elseif(!empty($i))

                                        <li class="instagram">
                                            <a href="{!! $i !!}" target="_blank">
                                                <div class="row">
                                                    <div class="col-12 text-right social_icon_top">
<span
        class="social-icon text-center">
<i
        class="fa fa-instagram">
</i>
</span>
                                                    </div>

                                                </div>
                                            </a>
                                        </li>
                                    @elseif(!empty($y))

                                        <li class="youtube">
                                            <a href="{!! $y !!}" target="_blank">
                                                <div class="row">
                                                    <div class="col-12 text-right social_icon_top">
<span
        class="social-icon text-center">
<i
        class="fa fa-youtube">
</i>
</span>
                                                    </div>

                                                </div>
                                            </a>
                                        </li>
                                    @endif

                                @endforeach


                            </ul>
                        </div>
                    </div>
                    --}}
                    @if(!empty(\Auth::user()->Yeguada()->getFacebook()->getUrlPage()))
                        <div class=" col-12 col-md-4 m-t-15">
                            {{--

                                <div class="fb-page"
                                     data-href="{!! \Auth::user()->Yeguada()->getFacebook()->getUrlPage() !!}"
                                     data-small-header="false"
                                     data-adapt-container-width="true"
                                     data-hide-cover="false"
                                     data-show-facepile="true">
                                    <blockquote cite="{!! \Auth::user()->Yeguada()->getFacebook()->getUrlPage() !!}"
                                                class="fb-xfbml-parse-ignore">
                                        <a href="{!! \Auth::user()->Yeguada()->getFacebook()->getUrlPage() !!}">{!! \Auth::user()->Yeguada()->name !!}</a>
                                    </blockquote>
                                </div>

                            --}}
                            <div class="fb-page"
                                 data-href="{!! \Auth::user()->Yeguada()->getFacebook()->getUrlPage() !!}"

                                 data-small-header="false"
                                 data-adapt-container-width="true"
                                 data-hide-cover="false"
                                 {{--data-width="400"--}}
                                 {{--data-tabs="timeline"--}}
                                 data-tabs="timeline,events,messages"
                                 data-show-facepile="true">
                                <blockquote cite="{!! \Auth::user()->Yeguada()->getFacebook()->getUrlPage() !!}"
                                            class="fb-xfbml-parse-ignore">
                                    <a href="{!! \Auth::user()->Yeguada()->getFacebook()->getUrlPage() !!}">{!! \Auth::user()->Yeguada()->name !!}</a>
                                </blockquote>
                            </div>
                        </div>

                    @endif
                    @if(!empty(\Auth::user()->Yeguada()->getTwitter()->getUrlPage()))
                        <div class=" col-12 col-md-4 m-t-15 m-h-500">
                            <a class="twitter-timeline" data-height="500"
                               href="{!! \Auth::user()->Yeguada()->getTwitter()->getUrlPage() !!}?ref_src=twsrc%5Etfw"> </a>
                        </div>
                    @endif


                    <div class=" col-12 col-md-4 m-t-15">

                        <div class="fb-page"
                             data-href="https://www.facebook.com/HorsesWorldSale/"

                             data-small-header="false"
                             data-adapt-container-width="true"
                             data-hide-cover="false"
                             {{--data-width="400"--}}
                             {{--data-tabs="timeline"--}}
                             data-tabs="timeline,events,messages"
                             data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/HorsesWorldSale/"
                                        class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/HorsesWorldSale/">HorsesWorldSale</a>
                            </blockquote>
                        </div>
                    </div>
                    {{--

                    <div class=" col-12 col-md-6 m-t-15">

                        <div class="fb-page"
                             data-href="https://www.facebook.com/pkitas17"
                             data-tabs="timeline"
                             data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                             data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/pkitas17"
                                        class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/pkitas17">{!! \Auth::user()->Yeguada()->name !!}</a>
                            </blockquote>
                        </div>
                    </div>
                    <div class=" col-12 col-md-5 m-t-15 m-h-350">
                        <a class="twitter-timeline"   data-height="350"
                           href="https://twitter.com/alexvzlalibre?ref_src=twsrc%5Etfw"> </a>
                    </div>
                    --}}
                    {{--https://twitter.com/alexvzlalibre--}}
                    {{--
                    <div class="col-lg-4 m-t-25">
                        <div class="bg-white section_border">
                            <div class="row">
                                <div class="col-sm-4 col-4 m-t-15">
                                    <div class="bg-white p-d-4 text-center">
                                        <h4 class="fb_icon_color">Facebook</h4>
                                        <span>60.258</span>

                                    </div>
                                </div>
                                <div class="col-sm-4 col-4 m-t-15">
                                    <div class="bg-white p-d-4 text-center">
                                        <h4 class="twitter_icon_color">Twitter</h4>
                                        <span>25.108</span>

                                    </div>
                                </div>
                                <div class="col-sm-4 col-4 m-t-15">
                                    <div class="bg-white p-d-4 text-center">
                                        <h4 class="gplus_icon_color">Google Plus</h4>
                                        <span>15.223</span>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-4 text-center icons_border">
                                    <div class="fb_border_bottom">
                                        <h2 class="m-t-20 fb_icon_color">
                                            <span id="fb_count">60</span>%</h2>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-4 text-center icons_border">
                                    <div class="twitter_border_bottom">
                                        <h2 class="m-t-20 twitter_icon_color">
                                            <span id="twitter_count">25</span>%
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-4 text-center">
                                    <div class="gplus_border_bottom">
                                        <h2 class="m-t-20 gplus_icon_color">
                                            <span id="gplus_count">15</span>%
                                        </h2>
                                    </div>
                                </div>
                                <!--</div>-->
                            </div>

                        </div>
                    </div>
                    --}}
                </div>
            </div>
        </div>
    @endif


    <div class="offset-3 col-6 text-center  m-t-35 row">
        <div class="col-12">
            <a href="http://www.HorsesWorldSale.com" target="_blank">
                <figure>
                    <img lsrc="{!! url(\Config::get('logos.logoh250')) !!}" alt="" class="img-fluid hidden"
                         style="width: 220px">
                </figure>
            </a>
        </div>
        <div class="offset-4 col-4 row m-t-10">
            <div class="col-4">
                <a href="{!! url(\Config::get('otra.hfacebook')) !!}" target="_blank">
<span class="fa fa-facebook font-1-5" style="margin-left: 10px;">
</span>
                </a>
            </div>
            <div class="col-4">
                <a href="{!! url(\Config::get('otra.htwitter')) !!}" target="_blank">
<span class="fa fa-twitter font-1-5">
</span>
                </a>
            </div>
            <div class="col-4">
                <a href="{!! url(\Config::get('otra.hyoutube')) !!}" target="_blank">
<span class="fa fa-youtube font-1-5" style="margin-left: -10px;">
</span>
                </a>
            </div>
        </div>
        <div class="m-t-10 offset-3 col-6 text-center">
            <a href="http://www.HorsesWorldSale.com" target="_blank">www.HorsesWorldSale.com</a>
        </div>

    </div>
    {{--https://www.youtube.com/channel/UCqOKHHyTda2gjCkngPFdruw--}}
    {{--https://www.youtube.com/user/YeguadaJuanVazquez--}}

    {{--
    <?php $chanel ="UCqOKHHyTda2gjCkngPFdruw" ; ?>
    <script src="http://www.gmodules.com/ig/ifr?url=http://www.google.com/ig/modules/youtube.xml&amp;up_channel={!! $chanel !!}&amp;synd=open&amp;w=320&amp;h=390&amp;title=&amp;border=%23ffffff%7C3px%2C1px+solid+%23999999&amp;output=js">

    </script>
- -}}
    <script src=”http://www.gmodules.com/ig/ifr?url=http://www.google.com/ig/modules/youtube.xml&up_channel=&amp;{!! $chanel !!} &synd=open&w=320&h=390&title=&border=%23ffffff%7C3px%2C1px+solid+%23999999&output=js”></script>
    UCv_Sc6HfEEYFGeBpZDQxwsQ
    --}}



@endsection

@section('bottomjs')
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

@endsection
