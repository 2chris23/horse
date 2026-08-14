@extends('backend.layouts.base')
@section('title', "Landing" )
<?php
$urlfotos = 'https://image.flaticon.com/icons/png/128/2/2409.png';
$urlcubri = 'https://image.flaticon.com/icons/png/128/2/2409.png';
$cubri = count(Horses::where('tocubri', 1)->get());
$fotocaballo = Horses::with('Fotos')->get()->pluck('id');
$fotosyeguada = Photo::where(['type' => 2])->get();
$videosyeguada = Video::where(['type' => 3])->get();
$yeguadas = Stud::all();
$ht = [];
$yeg = null;

$user = \Auth::user();
$asoc = $user->Asociado();
$caballos = Horses::get();

if ($asoc == true) {
    $control = $user->ControlAsociado();
    $paises = $control->getPaises();
    //$yeguadas = Stud::all();
    $yeguadas = Stud::wherein('country', $paises)->get();
    $yeg = $yeguadas->pluck('id');
    $caballos = Horses::wherein('studs_id', $yeg)->get();

    $cubri = count(Horses::where('tocubri', 1)->wherein('studs_id', $yeg)->get());
    $fotocaballo = Horses::with('Fotos')->wherein('studs_id', $yeg)->get()->pluck('id');
    $fotosyeguada = Photo::where(['type' => 2])->get();
    $videosyeguada = Video::where(['type' => 3])->get();

}

?>

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

    <div id="datos" class="card col-12 m-t-35 ">
        <div class="card-block">
            <?php $ts = count($caballos); ?>
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
                        @if(empty($yeg))
                            <?php $ht = count(Horses::where('raza',$k)->get()); ?>
                        @else
                            <?php $ht = count(Horses::where('raza',$k)->wherein('studs_id',$yeg)->get()); ?>
                        @endif
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
                                        <?php $ts = count(Horses::where('raza',$k)->get()); ?>

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
                        @if(empty($yeg))
                            <?php $dda =   count(Horses::where('sex',$k)->get()); ?>
                        @else
                            <?php $dda =   count(Horses::where('sex',$k)->wherein('studs_id',$yeg)->get()); ?>
                        @endif


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
                                    <h3 id="widget_count1">{!! count(Horses::get()) !!}</h3>
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

                @if(empty($yeg))
                    <?php $ts =count(Horses::where(['tosold'=>1])->get()) ; ?>
                @else
                    <?php $ts =count(Horses::where(['tosold'=>1])->wherein('studs_id',$yeg)->get()); ?>
                @endif
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

                        @if(empty($yeg))
                            <?php $ht = count(Horses::where(['raza'=>$k,'tosold'=>1])->get()); ?>
                        @else
                            <?php $ht = count(Horses::where(['raza'=>$k,'tosold'=>1])->wherein('studs_id',$yeg)->get()); ?>
                        @endif
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
                @foreach(trans('horse.sexs') as $k=>$v)
                    @if($k != 0)
                        <?php
                        if (empty($yeg)) {
                            $dda = count(Horses::where(['tosold' => 1, 'sex' => $k])->get());
                        } else {
                            $dda = count(Horses::where(['tosold' => 1, 'sex' => $k])->wherein('studs_id', $yeg)->get());
                        }
                        ?>
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
                                    <h3 id="widget_count1">{!! count(Horses::where(['tosold'=>1])->get()) !!}</h3>
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
                {{--<?php $ts = Horses::with('Fotos')->get()->pluck('id'); ?>--}}
                <?php $ts = $fotosyeguada; ?>
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
                                    <a href="{!! route('fotos.index') !!}" class="none">
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
                {{--<?php $ts = Horses::with('Videoss')->get()->pluck('id'); ?>--}}
                <?php $ts = $videosyeguada; ?>
                @if(count($ts)!=0)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">

                        <div class="card card-np ">
                            <div class="row ">
                                {{--<?php $fot = Video::wherein('tableid',$ts)->where(['type'=>4])->orderby('created_at','desc')->get(); ?>--}}
                                <?php $fot = $ts; ?>
                                <div class="col-8  sales_icons1 fotosimg fotosimg-small">
                                    {{--<img src="{!! $urlfotos !!}" alt="" class="img-fluid placefoto"> --}}
                                    <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <?php $f = false; ?>
                                            @foreach($fot as $k=>$v)
                                                <li data-target="#carouselExampleIndicators1"
                                                    data-slide-to="{!! $k !!}">
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
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators1"
                                           role="button"
                                           data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true">
</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators1"
                                           role="button"
                                           data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true">
</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{!! route('videos.index') !!}" class="none">
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
                {{--
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                    <a href="{!! route('horse.create') !!}">
                        <div class="card card-np card-112 ">
                            <div class="row">
                                <div class=" sales_icons1 col-7">
                                    <i class="fa icon-black-head-horse-side-view-with-horsehair font-55"></i>
                                </div>
                                <div class="text-right col-5">
                                    <p>
                                        {!! trans('horse.new') !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                --}}
                {{-- Yeguada --}}
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                    <a href="{!! route('yeguadas.index') !!}">
                        <div class="card card-np card-112">
                            <div class="pull-left sales_icons">
                                <i class="fa fa-address-book"> </i>
                            </div>
                            <div class="text-right">
                                <h3 id="widget_count1 " class="">
                                    {!! count($yeguadas) !!}
                                </h3>
                                <p>
                                    {!! trans('stud.registered') !!}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                {{--Yeguadas Pagas --}}
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                    <a href="{!! route('yeguadas.index') !!}">
                        <div class="card card-np card-112">
                            <div class="pull-left sales_icons">
                                <i class="fa fa-address-book"> </i>
                            </div>
                            <div class="text-right">
                                <h3 id="widget_count1 " class="">0</h3>
                                <p>
                                    {!! trans('clientes.Tittle') !!}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                    <a href="https://www.google.es/adsense/start/" target="_blank">
                        <div class="card card-np card-112">
                            <div class="pull-left sales_icons">
                                <i class="fa fa-google"></i>
                            </div>
                            <div class="text-right">
                                <h3 id="widget_count1 " class="font-white">0</h3>
                                <p>
                                    GoogleAdsence
                                </p>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                    <a href="https://analytics.google.com/" target="_blank">
                        <div class="card card-np card-112">
                            <div class="pull-left sales_icons">
                                <i class="fa fa-area-chart"></i>
                            </div>
                            <div class="text-right">
                                <h3 id="widget_count1 " class="font-white">0</h3>
                                <p>
                                    Google Analitics
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                {{--
                  $d['name'] = trans('users.service');
            $d['icon'] = '<i class="fa fa-briefcase"> </i>';
            $d['url'] = route('servicios.index');


                --}}
                {{-- VENTAS --}}
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                    <a href="{!! route('ventas.index') !!}">
                        <div class="card card-np card-112">
                            <div class="pull-left sales_icons">
                                <i class="fa fa-line-chart"></i>
                            </div>
                            <div class="text-right">
                                <h3 id="widget_count1 " class="font-white">0</h3>
                                <p>
                                    {!! trans('portal.sell') !!}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Yeguada --}}
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 m-t-20">
                    <a href="{!! route('clientes.index') !!}">
                        <div class="card card-np card-112">
                            <div class="pull-left sales_icons">
                                <i class="fa fa-address-card"> </i>
                            </div>
                            <div class="text-right">
                                <h3 id="widget_count1 " class="font-white">0</h3>
                                <p>
                                    {!! trans('users.clientesposible') !!}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </div>
    {{-------------FOTOS DE CABALLO-------------------}}


    <div id="datos" class="card col-12 m-t-35 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('portal.socialnetwors') !!}
            </div>
            <div class="row">


                <div class=" col-12 col-md-4 m-t-15 m-h-500">
                    <a class="twitter-timeline" data-height="500"
                       href="https://twitter.com/HorsesWorldSale?ref_src=twsrc%5Etfw"> </a>
                </div>
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
            </div>
        </div>
    </div>


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
