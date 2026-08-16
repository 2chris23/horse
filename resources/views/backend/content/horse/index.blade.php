@extends('backend.layouts.base')
@section('title', trans('Titulos.HorsesStud') )


@section('topcss')
    <link type="text/css" rel="stylesheet" href="{!!url('js/tags/tag.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!! route('cliente.horse.indexcss')!!}"/>
@endsection
@section('content')
    {!! \Session::forget('horse') !!}
    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                <div class="row">
                    <div class="col-9">
                        {!! trans('horse.horselist') !!}

                        @if(count($horses) !=0)
                            <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! count($horses )!!}
                        </span>
                    </span>
                        @endif

                    </div>
                    <div class="col-3 pull-right">
                        <a href="{!! route('horse.create') !!}"
                           class="save btn btn-warning glow_button pull-right">{!! trans('horse.newhorse') !!}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        {{--
                        <div class="col-12 col-md-6 offset-md-3 text-center">
                            @foreach(trans('horse.raza')  as $k =>$v)
                                @php($ht = count(\Auth::user()->Horses()->where('raza',$k)->get()))
                                @if($ht!=0)
                                    <span class="badge badge-warning">
                                <b>{!! $ht !!}</b>
                                        {!! $v !!}
                            </span>
                                @endif
                            @endforeach

                        </div>
--}}

                        <div class="col-9  text-left">
                            @foreach(trans('horse.sexs')  as $k =>$v)
                                @php($ht = count(\Auth::user()->Horses()->where('sex',$k)->get()))
                                @if($ht!=0)
                                    <span class="badge badge-warning font-11">
                                <b>{!! $ht !!}</b>
                                        {!! $v !!}
                            </span>
                                @endif
                            @endforeach
                            @php($ts =  count(\Auth::user()->Horses()->where('tocubri',1)->get()))

                            @if($ts!=0)
                                <span class="badge badge-warning font-11">
                                <b>{!! $ts !!}</b>
                                    {!! trans('horse.text.cubricions') !!}
                            </span>
                            @endif
                        </div>
                        @if(count($horses)!=0)
                        <div class="col-3  text-right">
                            <a href="{!! route('exportar.index') !!}"
                               class="save btn glow_button pull-right">
                                <i class="fa fa-envelope-o star-small star">
                                </i>
                                {!! trans('botones.sendemail') !!}
                            </a>
                        </div>
                        @endif
                        {{--
                                                <div class=" col-12 table-responsive noSwipe m-t-25 ">

                                                    <table id="TablaAdmin" class="table table-striped table-hover" cellspacing="0"
                                                           data-url="{!! route('HorsesIndexAdmin') !!}" data-token="{!! csrf_token() !!}">
                                                        <thead>
                                                        <tr>
                                                            @foreach($columns as $k=>$v)
                                                                <th>
                                                                    {!! $v !!}
                                                                </th>
                                                            @endforeach
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>


                                                </div>
                        --}}

                        <div class=" col-12 table-responsive noSwipe m-t-25 ">

                            <table class="table table-striped table-hover caballitos hidden-xs-up" cellspacing="0"
                                   id="tablah">
                                <thead>
                                <tr>
                                    @foreach($columns as $k=>$v)

                                        <th >
                                            {!! $v !!}
                                        </th>
                                    @endforeach


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($horses as $c)


                                    <tr class="horse_{!! $c->id !!}" data-id="{!! $c->id !!}"
                                        data-visita="{!! $c->getVisitantes() !!}"
                                        @if(($c->favorite) == true)   data-fav='{!! $c->favorite !!}'@endif >
                                        @foreach($columns as $k=>$v)

                                            <td>

                                                @if($k == "doma")
                                                    @if($c->doma == true or $c->doma == 1)
                                                        {!! trans('horse.doma.1') !!}
                                                    @else
                                                        {!! trans('horse.doma.0') !!}
                                                    @endif
                                                @elseif($k == "img")
                                                    @php($i = 0)
                                                    @foreach($c->getPhotoModel() as $o=>$p)
                                                        @if($i == 0)
                                                            @include('backend.common.galleryimage',['titulo'=>$p->getName(),'id'=>$p->id,'imagen'=>$p->getUrl(),'adminpanel'=>1,'size'=>$p->Size()])
                                                            @php($i=1)
                                                        @endif
                                                    @endforeach

                                                @elseif($k == "color")
                                                    {!! $c->getColorString() !!}

                                                @elseif($k == "raised")
                                                    {!! $c->getRaisedFormat() !!}

                                                @elseif($k == "sex")
                                                    {!! $c->getSexString() !!}

                                                @elseif($k == "price")
                                                    @if(!empty($c->price) )
                                                        @if($c->price !=0)

                                                            <span @if( $c->sold == 0) @include('backend.common.toolmoneda',['horse'=>$c,'p'=>1,'class'=>' tdo ']) @endif >
                                                                {!! $c->ObtenPrecioMonedaMill() !!}
                                                                {!! $c->getSimboloMoneda() !!}

                                                                </span>


                                                        @endif
                                                    @else
                                                        @if($c->getTosold() == true)
                                                            {!! trans('users.pricecheck1') !!}
                                                        @endif
                                                    @endif

                                                @elseif($k == "name")
                                                    <a href="{!! route('horse.edit',['id'=>$c->id]) !!}">
                                                        {!! $c->{$k} !!}


                                                    </a>
                                                @elseif($k == "raza")
                                                    {!! trans('horse.raza.'.$c->raza) !!}

                                                @elseif($k == "action")
                                                    @include('backend.content.horse.botones.dropdown',['modelo'=>$c])
                                                @elseif($k == "birthdate")
                                                    @php
                                                        $edad = $c->getAge();
                                                $mes = $c->getAgeMonth();
                                                    @endphp

                                                @if($edad!=0)
                                                        {!! trans('horse.years',['ano'=>$edad]) !!}
                                                    @else
                                                        {!! trans('horse.mes',['mes'=>$mes]) !!}
                                                        @endif

                                                @elseif($k == "tosold")
                                                    @if($c->getTosold() == true)
                                                        {!! trans('horse.tosold.1') !!}

                                                    @endif
                                                @else

                                                    {!! $c->{$k} !!}
                                                @endif
                                            </td>
                                        @endforeach


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{--
                                                <div class="offset-3 col-6 text-center ">
                                                    {{$horses->render()}}
                                                </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('bottomjs')
    <script src="{!! url('js/tags/tagging.js') !!}"></script>
    <script src="{!! route('cliente.horse.indexjs') !!}"></script>
    @include('backend.common.enviocorreo')
    @include('backend.common.exportar')
@endsection