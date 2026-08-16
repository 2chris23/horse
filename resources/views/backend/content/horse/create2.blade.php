@php($etiquetalabel = "col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-sm-left text-md-left text-lg-right ")
@php($tiquetainput = " col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ")
@php($Monedas = Publico::ArrayMonedas())
@php
    $horse_id =(empty($horse->id))?0:$horse->id;
if(\Auth::user()->isAdm() != true){
    $yegu = \Auth::user()->Yeguada();
    $marca = $yegu->Marca();
    $mostrarmarca = 0;
    $agua = 0;
    if(!empty($marca)){
    $mostrarmarca = 1;
    $agua = $yegu->MarcaAgua()->first()->status;
    }
    }
@endphp
@extends('backend.layouts.base')
{{--@section('title', trans('horse.Tittle') )--}}
@section('title', trans('Titulos.HorseNewStud'))
{{--@section('pagetitle', '<i class="fa fa-pagelines">
</i>  '.trans('horse.new') )
--}}
@section('topcss')
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css"/>
    {{--<link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/timeline2.css')!!}"/>--}}
    {{--<link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/calendar_custom.css')!!}"/>--}}
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/profile.min.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/gallery.css')!!}"/>
    {{--
    <link type="text/css" rel="stylesheet"
          href="{!!url('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css')!!}"/>
    --}}
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css"/>
    <link type="text/css" rel="stylesheet" href="{!!url('adropzssets/vendors/imagehover/css/imagehover.min.css')!!}"/>
    {{--<link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css"/>--}}
    <link type="text/css" rel="stylesheet" href="{!! url('/js/dropify/css/dropify.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/bootstrap-select.min.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('js/step/css/smart_wizard.min.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('js/step/css/smart_wizard_theme_circles.min.css') !!}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <style>
        .desha {
            background-color: #e9e9e9;
        }
    </style>
@endsection
@section('dd')
    {{--<script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js">
</script>--}}
@endsection
@section('content')
@php
    $etiquetalabel = "col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-sm-left text-md-left text-lg-right ";
    $tiquetainput = " col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ";
    $Monedas = \App\Http\Controllers\PublicController::ArrayMonedas();
@endphp
    <script>
        var dasdas = null;
    </script>
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>
                    <div class="row">
                        {{--
                        <br>
</br> <a href="{!! route('MyHorseDetailed',['stud'=>\Auth::user()->Yeguada()->slug,'horse'=>$horse->id]) !!}" target="_blank"> Link pa ver</a>
                        --}}
                        <div class="col-8">
                            {!! trans('horse.text.create_title') !!}
                        </div>
                        <div class=" col-3 ">
                            <a href="{!! route('caballoc.index') !!}" class=" btn btn-warning pull-right right">
                                {!! trans('users.return') !!}</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 m-t-25">
                        <div id="smartwizard">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-1" id="p1l">
                                        {!! trans('users.step',['n'=>1]) !!} <br>
                                        <small>
                                            {!! trans('horse.text.create_title') !!}
                                        </small>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-2" id="p2l">
                                        {!! trans('users.step',['n'=>2]) !!} <br>
                                        <small>
                                            {!! trans('stud.photos') !!}
                                        </small>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-3" id="p3l">
                                        {!! trans('users.step',['n'=>3]) !!} <br>
                                        <small>
                                            {!! trans('stud.video') !!}
                                        </small>
                                    </a>
                                </li>
                                {{--
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-4">Step Title{{--<br/>
                                        <small>Step description</small>-- }}
                                    </a>
                                </li>
                                --}}
                            </ul>
                            <div class="m-t-25">
                                <div id="step-1" class="row m-t-25">
                                    <form action="" id="horse_" class="m-t-25 row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                                    {{trans('horse.text.name')}}:
                                                </label>
                                                <div class="col-xs-10 col-sm-10 col-md-6">
                                                    <input type="text" placeholder="{{trans('horse.placeholder.name')}}"
                                                           id="input_horse_name"
                                                           onchange="campos()"
                                                           required
                                                           name="name"
                                                           value="{{$horse->getName() }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                                    {{trans('horse.text.raised')}}:
                                                </label>
                                                <div class="col-6 form-group ">
                                                    <input type="text"
                                                           name="raised"
                                                           placeholder="{{trans('horse.placeholder.raised')}}"
                                                           id="input_horse_raised" name="input_horse_raised"
                                                           value="{{$horse->getRaised()}}" class="form-control"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        @include('backend.common.colors',['seleccionado'=>$horse->color,'validacion'=>1])
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                                    {{trans('horse.text.birthdate')}}:
                                                </label>
                                                <div class="col-xs-10 col-sm-10 col-md-6">
                                                    <input type="date"
                                                           placeholder="{{trans('horse.placeholder.birthdate')}}"
                                                           name="date"
                                                           id="input_horse_birthdate"
                                                           value="{{$horse->getBirthdate()}}" class="form-control nac">
                                                </div>
                                            </div>
                                        </div>
                                        @include('backend.common.raza',['seleccionado'=>$horse->raza ])
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                                    {{trans('horse.text.doma')}}:
                                                </label>
                                                <div class="col-xs-10 col-sm-10 col-md-6">
                                                    <button type="button" id="input_horse_doma_si"
                                                            class=" btn btn-labeled btn-success
{!! ($horse->getDoma() == true )?'':'hidden-xl-down' !!} ">
                                                        <input type="hidden" value="{!! $horse->getDoma() !!}"
                                                               name="doma" id="doma">
                                                        <span class="btn-label">
                                                    <i class="fa fa-check"> </i>
                                                </span>
                                                        {{trans('text.yes')}}
                                                    </button>
                                                    <button type="button" id="input_horse_doma_no"
                                                            class=" btn btn-labeled btn-danger {!! ($horse->getDoma() == false)?'':'hidden-xl-down' !!} ">
                                                <span class="btn-label">
                                                    <i class="fa fa-close"> </i>
                                                </span>
                                                        {{trans('text.no')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                                    {{trans('horse.text.sex')}}:
                                                </label>
                                                <div class="col-xs-10 col-sm-10 col-md-6">
                                                    <select class=" form-control" data-style="btn-primary"
                                                            onchange="cubric()"
                                                            onselect="cubric()"
                                                            id="input_horse_sex"
                                                            name="sex"
                                                    >
                                                        @foreach(Publico::Arraysex() as $k=>$v)
                                                            <option data-tokens="{!! $k !!}" value="{!! $k !!}"
                                                                    @if($k==$horse->sex) selected @endif>{!! $v !!}</option>
                                                        @endforeach
                                                        {{--
                                                        <option data-tokens="1">Semental</option>
                                                        <option data-tokens="2">Capado</option>
                                                        <option data-tokens="3">Hembra</option>
                                                        <option data-tokens="3">Potro</option>
                                                        <option data-tokens="3">Potra</option>
                                                        --}}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                                    {{trans('horse.text.stud')}}:
                                                </label>
                                                <div class="col-xs-10 col-sm-10 col-md-6">
                                                    <input type="text" placeholder="{{trans('horse.placeholder.stud')}}"
                                                           id="input_horse_stud"
                                                           name="input_horse_stud"
                                                           value="{{$horse->getStud()}}" class="form-control ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center cubris">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!} col-form-label text-right">
                                                    {{trans('horse.text.cubricion')}}:
                                                </label>
                                                <div class="{!! $tiquetainput !!} row  p-r-0 ">
                                                    <div class="col-2 col-sn-12 col-md-3">
                                                        <button type="button" id="cubri_si"
                                                                class=" btn btn-labeled btn-success {!! ($horse->getToCubri() == true)?'':'hidden-xl-down' !!}">
                                                <span class="btn-label">
                                                    <i class="fa fa-check">
</i>
                                                </span>
                                                            {{trans('text.yes')}}
                                                        </button>
                                                        <button type="button" id="cubri_no"
                                                                class=" btn btn-labeled btn-danger {!!  ($horse->getToCubri() == false)?'':'hidden-xl-down' !!} ">
                                                <span class="btn-label">
                                                    <i class="fa fa-close">
</i>
                                                </span>
                                                            {{trans('text.no')}}
                                                        </button>
                                                        <input type="hidden" value="{!! $horse->getToCubri() !!}"
                                                               name="cubribol" id="cubribol">
                                                    </div>
                                                    <div class="col-4 col-sm-12 col-md-5 cubricon {!! ($horse->getToCubri() == true)?'':'hidden-xl-down' !!}">
                                                        <input type="text"
                                                               placeholder="{{trans('horse.placeholder.price')}}"
                                                               id="cubri"
                                                               name="cubri"
                                                               value="{{$horse->ObtenPrecioCubricionMonedaMill()}}"
                                                               class="form-control numbers ">
                                                    </div>
                                                    <div class="col-4 col-sn-12 col-md-4 cubricon {!! ($horse->getToCubri() == true)?'':'hidden-xl-down' !!}">
                                                        <select class=" form-control "
                                                                data-style="btn-primary"
                                                                id="moneda1"
                                                                name="moneda1"
                                                                placeholder=""
                                                                onchange="cambioa()"
                                                                onselect="cambioa()"
                                                                aria-describedby="basic-addon3 ">


                                                            @foreach($Monedas as $k=>$v)
                                                                <option data-tokens="{!! $v['small'] !!}"
                                                                        value="{!! $v['small'] !!}"
                                                                        @if($horse->getMonedabase() == $v['small']) selected @endif>
                                                                    {!! $v['nombre'] !!}
                                                                    {{--({!! $v['small'] !!})--}}

                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.genealogia')}}:
                                                </label>
                                                <div class="{!! $tiquetainput !!}">
                                                    <input type="url"
                                                           placeholder="{{trans('horse.placeholder.genealogia')}}"
                                                           id="genealogia"
                                                           name="genealogia"
                                                           value="{{$horse->getGenealogia()}}" class="form-control ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!}">
                                                    {{trans('horse.text.tosold')}}
                                                </label>
                                                <div class="{!! $tiquetainput !!} row p-r-0 ">
                                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-3 col-12">
                                                        <button type="button" id="check_si"
                                                                class=" btn btn-labeled btn-success {!! ($horse->getTosold() == true)?'':'hidden-xl-down' !!}">
                                                <span class="btn-label">
                                                    <i class="fa fa-check"> </i>
                                                </span>
                                                            {{trans('text.yes')}}
                                                        </button>
                                                        <button type="button" id="check_no"
                                                                class=" btn btn-labeled btn-danger {!!  ($horse->getTosold() == false)?'':'hidden-xl-down' !!} ">
                                                <span class="btn-label">
                                                    <i class="fa fa-close">
</i>
                                                </span>
                                                            {{trans('text.no')}}
                                                        </button>
                                                        <input type="hidden" value="{!! $horse->getTosold() !!}"
                                                               name="tosold" id="tosold">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-12 row monoprice p-r-0 {!! ($horse->getTosold() == true)?'':'hidden-xl-down' !!}">
                                                        <div class="col-6 col-xs-12">
                                                            <input type="text"
                                                                   placeholder="{{trans('horse.placeholder.price')}}"
                                                                   id="input_horse_price"
                                                                   name="price"
                                                                   value="{{Funciones::AjustarNumeroMil($horse->getPrice())}}"
                                                                   class="form-control numbers ">
                                                            <input class="form-check-input hidden-xl-down"
                                                                   type="checkbox"
                                                                   id="tosold"
                                                                   id="input_horse_tosold"
                                                                   value="{{$horse->getTosold()}}" {!! ($horse->getTosold() == true)?'checked':'' !!}>
                                                        </div>
                                                        <div class="col-6 col-xs-12">
                                                            <select class=" form-control "
                                                                    data-style="btn-primary"
                                                                    id="moneda"
                                                                    name="moneda"
                                                                    placeholder=""
                                                                    onchange="cambiob()"
                                                                    onselect="cambiob()"
                                                                    aria-describedby="basic-addon3 ">


                                                                @foreach($Monedas as $k=>$v)
                                                                    <option data-tokens="{!! $v['small'] !!}"
                                                                            value="{!! $v['small'] !!}"
                                                                            @if($horse->getMonedabase() == $v['small']) selected @endif>
                                                                        {!! $v['nombre'] !!}
                                                                        {{--({!! $v['small'] !!})--}}

                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                                    {{trans('horse.text.description')}}
                                                </label>
                                                <div class="col-9" id="stud_description">
                                                    <textarea name="input_stud_description"
                                                              id="input_stud_description">{{$horse->getDescripcion()}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="offset-3 col-6  text-center hidden-xs-up">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                                    <a href="#" onclick="savedata()"
                                                       class=" btn btn-block btn-success glow_button hidden-xs-up">{!! trans('users.save') !!}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$horse_id}}" id="horse_id" name="horse_id"
                                               class="form-control">
                                    </form>
                                </div>
                                <div id="step-2" class=" row ">
                                    <div class="col-12 m-t-35" style="margin-top:50px">
                                        <div id="dro_caballo" class="col-12 "
                                             data-toggle="popover"
                                             data-trigger="hover"
                                             data-placement="bottom"
                                             title="Carga de imagenes"
                                             data-content="Las imagenes se cargaran, cuando le des Guardar en el paso 3"
                                        >
                                            <div class="offset-1 col-10">
                                                <div id="caballo"
                                                     class="dropzone dropzone-previews dz-clickable  ">
                                                    <div class="dz-default dz-message">
                                                        <span><i class="fa fa-cloud-upload fa-6" aria-hidden="true"
                                                                 style="    font-size: 60px;"></i></span>
                                                        <span>
                                                        <br>
                                                            {!! trans('text.drop_file') !!}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 m-t-10 hidden-xs-up">
                                                <input required="required" type="submit" id="savec"
                                                       value="{!! trans('text.save') !!}"
                                                       class="btn btn-warning pull-left hidden-xs-up form-control drp_action_caballo btn-drp-caballo ">
                                            </div>
                                        </div>
                                        @if($mostrarmarca !=0)
                                            <div class="col-12 text-center m-t-10">
                                                <div class="row">
                                                    <div class="col-9">
                                                    </div>
                                                    <div class="col-3 predeterminadrmarca m-t-20"
                                                         data-check="{!! $agua !!}" @include('backend.common.marcahelp')>
                                        <span class="nopredeterminado text-red @if($agua!=0) hidden-xs-up @endif ">
                                            <i class="fa fa-times"></i>
                                        </span>
                                                        <span class="predeterminado text-success @if($agua!=1) hidden-xs-up @endif">
                                            <i class="fa fa-check"></i>
                                        </span>
                                                        @if($agua == 1)
                                                            <span class="campopredeterminado"> {!! trans('desing.watermark') !!} </span>
                                                        @else
                                                            <span class="campopredeterminado"> {!! trans('desing.watermark') !!} </span>
                                                        @endif
                                                        <input type="hidden" name="marcapredetermianda"
                                                               id="marcapredetermianda"
                                                               value="{!! $agua !!}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div id="step-3" class="row ">
                                    <div class=" col-12 m-t-35">
                                        <div class="form-group row">
                                            <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                                {!! trans('video.addressvideo') !!}:
                                            </label>
                                            <div class="col-xs-10 col-sm-10 col-md-6">
                                                <input type="text" placeholder="{{trans('stud.text.youtube')}}"
                                                       id="input_stud_video"
                                                       name="video"
                                                       value=""
                                                       class="form-control">
                                            </div>
                                            <div class="col-2">
                                                <a href="#!" class="btn btn-waring" onclick="addvideo()"><i
                                                            class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12 m-t-35">
                                        <div class="form-group row">
                                            <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                            </label>
                                            <form action="" class="col-xs-10 col-sm-10 col-md-6 row" id="vidoetape">
                                            </form>
                                        </div>
                                    </div>
                                    {{--
                                    <div id="step-4" class="">
                                        Step Content
                                    </div>
                                    --}}
                                </div>
                            </div>
                        </div>
                        {{--
                        <form action="{!! route('horse.store') !!}" method="post" id="form_horse">
                            <input type="hidden" value="{{$horse_id}}" id="horse_id" class="form-control">
                        </form>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--
        <div class="col-md-12 m-t-35">
            <div class="card">
                <div class="card-block">
                    <div class='card-header bg-white '>
                        {!! trans('horse.text.images') !!}
                    </div>
                    <div class="row">
                        <div class="col-12 m-t-35" style="margin-top:50px">
                            @include('backend.common.dropzone',['nombre'=>"caballo",'tipo'=>'horse','MaxFile'=>'5','horse'=>$horse_id,'oculto'=>true])
                        </div>
                        <div class="col-12 m-t-35" id="photos">
                            <div class="row">
                                @foreach($horse->getPhotoModel() as $k=>$v)
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3  m-t-20 ">
                                        @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getUrl()])
                                    </div>
                                @endforeach</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php($videos = $horse->getVideosModel())
        <div class="col-md-12 m-t-35">
            <div class="card">
                <div class="card-block">
                    <div class='card-header bg-white '>
                        {!! trans('video.myvideo') !!}
                    </div>
                    <div class="row">
                        <div class=" col-12 m-t-35">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {!! trans('video.addressvideo') !!}:
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="text" placeholder="{{trans('stud.text.youtube')}}"
                                           id="input_stud_video"
                                           value=""
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="offset-3 col-6 m-t-15 text-center">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                    <a href="#savedv" onclick="savevideo('{!! route('video.other') !!}')" id="savedv"
                                       class="save btn btn-block btn-success glow_button">{!! trans('video.addvideo') !!}</a>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-35 row  m-t-25 col-12" id="video">
</div>
                        @foreach($videos as $k=>$v)
                            <div class="col-3 m-t-20">
                                @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getYoutubeThumb(),'video'=>1])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    --}}
@endsection
@section('bottomjs')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{!! url('/js/dropify/js/dropify.min.js') !!}">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js">
    </script>
    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js">
    </script>--}}
    {{--https://cdnjs.com/libraries/moment.js/2.17.1--}}
    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js">
    </script>--}}
    <!--End of Plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js">
    </script>
    <script type="text/javascript" src="{!!url('assets/js/pages/gallery.js')!!}">
    </script>
    <script type="text/javascript" src="{!!url('assets/js/pages/modals.js')!!}">
    </script>
    <script type="text/javascript" src="{!!url('assets/js/bootstrap-select.min.js')!!}">
    </script>
    <!-- piexif.min.js is only needed for restoring exif data in resized images and when you
        wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js"
            type="text/javascript">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js">
    </script>
    <script src="{!! url('js/step/js/jquery.smartWizard.min.js') !!}">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/locales/LANG.js">
    </script>
    <script>
        var horse_id ={{$horse_id}};
        var finis = 0;
        var drp = null;
        Dropzone.autoDiscover = false;
        Dropzone.options.myAwesomeDropzone = false;
        var typep_caballo = 'horse';
        var subida_caballo = 0;
        var dropconp_caballo = {
            url: "{!!route('caballoc.s2')!!}",
            {{--//url: "{!!route('imagenes')!!}",--}}
            method: "post",
            uploadMultiple: true,
            {{--//uploadMultiple: false,--}}
            autoProcessQueue: false,
            maxFilesize: 10,
            parallelUploads: 20,
            maxFiles: 10,
            headers: {
                'X-CSRF-TOKEN': token,
                'csrftoken': token,
            },
            acceptedFiles: 'image/*',
            clickable: '#caballo',
            init: function () {
                var myDropzone = this;
                drp = this;
                $(".btn-drp-caballo").click(function (e) {
                    {{--// Make sure that the form isn't actually being sent.--}}
                    e.preventDefault();
                    e.stopPropagation();
                    {{--/*
                    if(drp_action_caballo == 1){
                        return null;
                    }
                    */--}}
                    if (lastp !== 2) {
                        {{--/*Aviso para ir al ulimo paso*/--}}
                        $('#fakesave').addClass('desha');
                        ErrP('{!! Funciones::ReemplazarApostrofe(trans('error.errorNoSave')) !!}', 'Es necesario continuar con los pasos para completar el registro de tu caballo');
                        return null;
                    } else {
                        if (validar() == true) {
                            $('#fakesave').removeClass('desha');
                        } else {
                            $('#fakesave').addClass('desha');
                            return null;
                        }
                    }
                    if (drp.getQueuedFiles().length == 0) {
                        guardado2();
                    }
                    $(this).html("{!! Funciones::ReemplazarApostrofe(trans('users.sending')) !!}");
                    if ($("#caballo").hasClass("dz-started")) { // eligio archivos pa subir
                        {{--//                        if (horse_id !== 0) {--}}
                        if (fisrts !== 0) return null;
                        fisrts = 1;
                        myDropzone.processQueue();
                    } else {
                        {{--// no esta subiendo archivos--}}
                    }
                    {{--//saveDatosContacto();
                    //nFiles = flyerPhotoDropZone.getQueuedFiles().length;--}}
                });
                this.on("sendingmultiple", function () {
                    console.log('subiendo varios')
                    $('#p2l').click();
                    $('#fakesave').prop('disabled', true);
                    InfP('Creando el caballo', 'Por favor, espera mientras se suben las imagenes');
                });
                this.on("addedfiles", function (files) {
                    subida_caballo = this.getQueuedFiles().length;
                });
                this.on("addedfile", function (files) {
                    subida_caballo = this.getQueuedFiles().length;
                });
                this.on("removedfile", function (files) {
                    subida_caballo = this.getQueuedFiles().length;
                });
                this.on("successmultiple", function (files, response) {
                    $('#fakesave').prop('disabled', false);
                    SucP('Carga de imagenes', 'Las imagenes se cargaron exitosamente');
                    archivos_ya_subieron = 1;
                    nombres_archivos = response;
                    GalleryUpload = 1;
                    drp_action_caballo = 0;
                    window.location.href = "{!! route('caballoc.index') !!}";
                });
                this.on("errormultiple", function (files, response) {
                    GalleryUpload = 1;
                    $('#fakesave').prop('disabled', false);
                    ErrP('Error', 'Se ha encontrado un error subiendo algunas imagenes');
                });
                this.on('sending', function (file, xhr, formData) {
                    {{--//var uno = new FormData(document.getElementById('horse_'));--}}
                    @if($mostrarmarca!=0)
                    {{-- para marca de agua predeterminada --}}
                    formData.append('marca', $('#marcapredetermianda').val());
                    @endif
                    formData.append('descripcion', CKEDITOR.instances['input_stud_description'].getData());
                    $("#vidoetape").find("input").each(function () {
                        formData.append($(this).attr("name"), $(this).val());
                    });
                    $("#horse_").find("input").each(function () {
                        formData.append($(this).attr("name"), $(this).val());
                    });
                    $("#horse_").find("input").each(function () {
                        formData.append($(this).attr("name"), $(this).val());
                    });
                    formData.append('type', typep_caballo);
                    formData.append('raza', $('#input_horse_raza').val());
                    formData.append('sex', $('#input_horse_sex').val());
                    formData.append('colorselect', $('#colorselect').val());
                    @if(($horse!== null))
                    formData.append('id', horse_id);
                    @endif
                    @if(\Auth::user()->isAdm() and !empty($stud))
                    formData.append('stud_id', {!! $stud->id !!});
                    @endif
                });
                this.on('queuecomplete', function () {
                    $('#fakesave').prop('disabled', false);
                });
                this.on("success", function (response) {
                    GalleryUpload = 1;
                    drp_action_caballo = 0;
                    SucP('{!! Funciones::ReemplazarApostrofe(trans('users.cargaImg')) !!}', '{!! Funciones::ReemplazarApostrofe(trans('users.cargaImgOk')) !!}');
                    {{--//console.log(response);--}}
                });
                this.on("addedfile", function (file) {
                            {{--// Create the remove button
                            //var removeButton = Dropzone.createElement("<button>Remove file</button>");--}}
                    var removeButton = Dropzone.createElement('<a href="javascript:void(0)" class="btn btn-warning pull-right remover">{!! Funciones::ReemplazarApostrofe(trans('text.RemoveFile')) !!}</a>');
                            {{--// Capture the Dropzone instance as closure.--}}
                    var _this = this;
                    {{--// Listen to the click event--}}
                    removeButton.addEventListener("click", function (e) {
                        _this.removeFile(file);
                    });
                    {{--// Add the button to the file preview element.--}}
                    file.previewElement.appendChild(removeButton);
                });
                this.on("error", function (file, response) {
                    {{--// do stuff here.--}}
                    console.dir(response);
                    GlobalError = 1;
                    var ErrorSms = Dropzone.createElement(response.sms + '<br><a class="dz-remove" href="javascript:undefined;" data-dz-remove="">{!! Funciones::ReemplazarApostrofe(trans('text.RemoveFile')) !!}</a>');
                    if (response.sms !== undefined) {
                        ErrP('{!! Funciones::ReemplazarApostrofe(trans('error.errorImageUp')) !!}', response.sms);
                    } else {
                        ErrP('{!! Funciones::ReemplazarApostrofe(trans('error.errorImageUp')) !!}', '{!! Funciones::ReemplazarApostrofe(trans('error.Desconocido')) !!}');
                    }
                    ErrorSms.addEventListener("click", function (e) {
                        myDropzone.removeFile(file);
                    });
                    $(file.previewElement).find('.dz-error-message').text("").append(response).append(ErrorSms);
                });
            }
        };
        var drp_action_caballo = 0;
        {{--//called when key is pressed in textbox
        //var dp_caballo=new Dropzone("div#caballo", dropconp_caballo);
        //$(window).on('load',--}}
        $(document).ready(
            function () {
                $('.drp_action_caballo').on('click', function () {
                    if (drp_action_caballo == 1) {
                        return null;
                    }
                    drp_action_caballo = 1;
                });
                new Dropzone("div#caballo", dropconp_caballo);
            });
        $('.selectpicker').selectpicker('refresh');

        function envio(form, url) {
            axios.post(url, form)
                .then(function (response) {
                    var r = response;
                    console.dir(r);
                    {{--//var s = $.parseJSON(data);
                    //$('#video').append(s.el);--}}
                    $('#video').append(response.el);
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange')) !!}',
                        response.sms,
                        'success'
                    );
                })
                .catch(function (error) {
                            {{--//var err = eval(xhr.responseText.sms);--}}
                    var e = error;
                            {{--console.dir(e);--}}
                    var v = e.message;
                    swal({
                        title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                    $('.save').prop('disabled', false);
                });
            {{--
            $.ajax({
                url: url,
                data: form,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {
                    var s = $.parseJSON(data);
                    $('#video').append(s.el);
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange') !!}',
                        s.sms,
                        'success'
                    )
                },
                error:
                    function (xhr, status, error) {
                        var err = eval(xhr.responseText.sms);
                        var v = $.parseJSON(xhr.responseText);
                        swal({
                            title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror') !!}',
                            html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror') !!}<br>' + v.sms,
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        });
                    }
            });
            --}}
        }

        function HabilitarCaballos(clear = true) {
            EnableElement(raised, clear);
            EnableElement(name, clear);
            EnableElement(birthdate, clear);
            EnableElement(raza, clear);
            EnableElement(doma, clear);
            EnableElement(sex, clear);
            EnableElement(tosold, clear);
            EnableElement(price, clear);
            EnableElement(id, clear);
            EnableElement($('.save'), clear);
            EnableElement($('.cancel'), clear);
        }

        function savedata() {
            {{--//$('.save').on('click', function (e) {
            //e.preventDefault();
            //DisableElement($('.save'));
            //DisableElement($('.cancel'));--}}
            $('.save').prop('disabled', true);
            var formElement = document.getElementById("horse_");
            var form = new FormData(formElement);
            var doma, tosold;
            var raised = $('#input_horse_raised').val();
            var birthdate = $('#input_horse_birthdate').val();
            var name = $('#input_horse_name').val();
            var raza = $('#input_horse_raza').val();
            var stud = $('#input_horse_stud').val();
            var sex = $('#input_horse_sex').val();
            var price = $('#input_horse_price').val();
            var cubri = $('#cubri').val();
            var id = horse_id;
            var description = CKEDITOR.instances['input_stud_description'].getData();
            var color = $('#colorselect').val();
            var s = $('#input_horse_doma_si').hasClass('hidden-xl-down');
            var d = $('#check_si').hasClass('hidden-xl-down');
            if (s === true) {
                doma = false;
            } else {
                doma = true;
            }
            if (d === true) {
                tosold = false;
            } else {
                tosold = true;
            }
            form.append('raised', raised);
            form.append('name', name);
            form.append('color', color);
            form.append('birthdate', birthdate);
            form.append('raza', raza);
            form.append('doma', doma);
            form.append('tosold', tosold);
            form.append('stud', stud);
            form.append('sex', sex);
            form.append('price', price);
            form.append('id', id);
            form.append('description', description);
            form.append('cubri', cubri);
            {{--//EnableElement($('.save'), true);
            //EnableElement($('.cancel'), true);--}}
            axios.post('{!! route('horse.store') !!}', form)
                .then(function (response) {
                    var r = response.data;
                    horse_id = r.id;
                    $('#horse_id').val(horse_id);
                    {{--//$('.fileinput-upload-button').click();
                    //$('.btn-drp-caballo').click();--}}
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange')) !!}',
                        r.sms,
                        'success'
                    );
                    window.location.href = '{!! route('caballoc.index') !!}';
                    $('.save').prop('disabled', false);
                })
                .catch(function (error) {
                            {{--//var err = eval(xhr.responseText.sms);--}}
                    var e = error.response;
                    var v = e.data.sms;
                    swal({
                        title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                    $('.save').prop('disabled', false);
                });
        };
        $('#tosold').change(function () {
            if ($(this).is(":checked")) {
                console.log('check');
                $('#cardsell').removeClass('hidden-xl-down');
                return null;
            }
            $('#cardsell').addClass('hidden-xl-down');
            return null;
            {{--/*
            $('#textbox1').val($(this).is(':checked'));
            */--}}
        });
        $('#check_si').on('click', function (e) {
            $('#check_si').addClass('hidden-xl-down').prop('checked', false);
            {{--$('#tosold').prop('checked', false);--}}
            {{--$('#cardsell').addClass('hidden-xl-down');--}}
            $('.monoprice').addClass('hidden-xl-down');
            $('#check_no').removeClass('hidden-xl-down').prop('checked', true);
            $('#tosold').val(0);
        });
        $('#check_no').on('click', function (e) {
            $('#check_no').addClass('hidden-xl-down').prop('checked', false);
            $('#tosold').val(1);
            {{--
            $('#tosold').prop('checked', true);
            --}}
            {{--$('#cardsell').removeClass('hidden-xl-down');--}}
            $('.monoprice').removeClass('hidden-xl-down');
            $('#check_si').removeClass('hidden-xl-down').prop('checked', true);
        });
        $('#input_horse_doma_si').on('click', function (e) {
            $('#input_horse_doma_si').addClass('hidden-xl-down').prop('checked', false);
            $('#input_horse_doma_no').removeClass('hidden-xl-down').prop('checked', true);
            $('#doma').val(0);
        });
        $('#input_horse_doma_no').on('click', function (e) {
            $('#doma').val(1);
            $('#input_horse_doma_no').addClass('hidden-xl-down').prop('checked', false);
            $('#input_horse_doma_si').removeClass('hidden-xl-down').prop('checked', true);
        });
        $('#cubri_si').on('click', function (e) {
            $('#cubri_si').addClass('hidden-xl-down').prop('checked', false);
            $('#cubri_no').removeClass('hidden-xl-down').prop('checked', true);
            $('.cubricon').addClass('hidden-xl-down');
            $('#cubribol').val(0);
        });
        $('#cubri_no').on('click', function (e) {
            $('#cubribol').val(1);
            $('.cubricon').removeClass('hidden-xl-down');
            $('#cubri_no').addClass('hidden-xl-down').prop('checked', false);
            $('#cubri_si').removeClass('hidden-xl-down').prop('checked', true);
        });

        function savevideo(url) {
            var form = new FormData();
                    {{--//var description = $('#input_stud_description');--}}
            var description = $('#input_stud_video').val();
            form.append('video', description);
            form.append('type', 'horse');
            form.append('horse_id', horse_id);
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! Funciones::ReemplazarApostrofe(trans('users.caballocambiovideo')) !!}<br>',

                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                envio(form, url);
                $('#input_stud_video').val();
                {{--/*
                swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                */--}}
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
            });
        }

        var tada = null;
        var fst = 0;
        $(document).on("ready", function () {
            $('#input_horse_raised').mask("000 cm", {reverse: true});
            $('#input_horse_price').mask("000.000.000.000", {reverse: true});
            $('#cubri').mask("000.000.000.000", {reverse: true});
            $("#photos").sortable().disableSelection();
            {{--//$('#smartwizard').smartWizard({ //ajaxSettings: {} });--}}
                tada = $('#smartwizard').smartWizard({
                {{--//theme:'circles',
                    //theme: 'default', // theme for the wizard, related css need to include for other than default theme--}}
                lang: {
                    {{--// Language variables--}}
                    next: '{!! Funciones::ReemplazarApostrofe(trans('portal.next')) !!}',
                    previous: '{!! Funciones::ReemplazarApostrofe(trans('portal.back')) !!}'
                },
                showStepURLhash: false,
                {{--//disabledSteps: [1, 2],--}}
                toolbarSettings: {
                    toolbarPosition: 'bottom', {{--// none, top, bottom, both--}}
                    toolbarButtonPosition: 'right', {{--// left, right--}}
                    showNextButton: true, {{-- // show/hide a Next button--}}
                    showPreviousButton: true,{{-- // show/hide a Previous button--}}
                    {{--
                            toolbarExtraButtons: [
                                $('<button></button>').text('Guardar')
                                    .addClass('btn btn-info btn-warning pull-right')
                                    .on('click', function () {
                                        //if(fisrts === 0) guardado2();
                                        if(fisrts === 0) $('#savec').click();;
                                    }),
                                $('<button></button>').text('Cancelar')
                                    .addClass('btn btn-danger pull-right')
                                    .on('click', function () {
                                        alert('Cancel button click');
                                   });
                            ]
                            --}}
                },
            });
        });
        $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
            if (stepNumber === 0) {
                $('.sw-btn-prev').addClass('hidden-xs-up');
            } else {
                $('.sw-btn-prev').removeClass('hidden-xs-up');
            }
            if (stepNumber === 2) {
                $('.sw-btn-next').addClass('hidden-xs-up');
            } else {
                $('.sw-btn-next').removeClass('hidden-xs-up');
            }
            if (stepNumber === 2) {
                $('#fakesave').removeClass('hidden-xs-up');
            } else {
                $('#fakesave').addClass('hidden-xs-up');
            }
            addbtn(stepNumber);
            {{--//alert("You are on step " + stepNumber + " now");--}}
        }).on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
            /*console.dir(stepNumber);
            console.dir(stepDirection);
            console.dir("---------------");*/
            /*
                        if (
                            $('#colorselect').val() === 0 &&
                            $('#input_horse_raza').val() === 0 &&
                            $('#input_horse_name').val().length === 0
                        ) {
                            console.log('uno');
                            tada.smartWizard({
                                disabledSteps: [1, 2],
                           });
                        } else {
                            console.log('dos');
                            $("#smartwizard").smartWizard({
                                disabledSteps: [],
                           });
                        }
                    */
            /*
            if (stepNumber == 1) {
            }
            */
            {{--//alert("You are on step " + stepNumber + " now");--}}
        });
        $('#input_horse_sex').on('change', function () {
            cubric();
        });

        function cubric() {
            var t = $('#input_horse_sex').val();
            if (t == 1) {
                $('.cubris').removeClass('hidden-xl-down');
            } else if (t == 4) {
                $('.cubris').removeClass('hidden-xl-down');
            } else {
                $('.cubris').addClass('hidden-xl-down');
            }
            campos();
        }

        function cambioa() {
            $('#moneda').val($('#moneda1').val()).trigger('change');
        }

        function cambiob() {
            $('#moneda1').val($('#moneda').val()).trigger('change');
        }

        var fisrts = 0;

        function guardado2() {
            var uno = new FormData(document.getElementById('horse_'));
            uno.append('descripcion', CKEDITOR.instances['input_stud_description'].getData());
            $("#vidoetape").find("input").each(function () {
                uno.append($(this).attr("name"), $(this).val());
            });
            drp_action_caballo = 1;
            axios.post("{!!route('caballoc.s2')!!}", uno)
                .then(function (response) {
                    var r = response;
                    {{--//dasdas = response;--}}
                    console.dir(response.data.horse_id);
                    horse_id = response.data.horse_id;
                    $('#horse_id').val(horse_id);
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange')) !!}',
                        response.sms,
                        'success'
                    );
                    window.location.href = "{!! route('caballoc.index') !!}";
                    drp_action_caballo = 0;
                })
                .catch(function (error) {
                            {{--//var err = eval(xhr.responseText.sms);--}}
                    var e = error.response.data;
                    console.dir(e);
                    var v = e.sms;
                    console.dir(v);
                    swal({
                        title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                    drp_action_caballo = 0;
                });
        }

        $(document).on("ready", function () {
            CKEDITOR.replace("input_stud_description");
            CKEDITOR.on('instanceReady', function (evt) {
                CKEDITOR.instances['input_stud_description'].setData('{!! $horse->getDescripcion() !!}');
            });
            $("#photos").sortable().disableSelection();
        });

        function addvideo() {
                    {{--//vidoetape--}}
            var d = $('#input_stud_video').val();
            var s = '<div class="col-12 row"><div class="col-9"><input type="text" id="video" name="video[]"class="form-control " disabled value="' + d + '"></div><div class="col-3"><a href="#!" class="btn btn-waring" onclick="removevideo(this)" ><i class="fa fa-minus"></i></a></div></div>'
            $('#vidoetape').append(s);
            $('#input_stud_video').val('');
        }

        function removevideo(el) {
            var t = $(el).parent().parent().remove();
        }

        var lastp = 0;

        function addbtn(step) {
            lastp = step;
            if (step === 2) {
                if (validar() == true) {
                    $('#fakesave').removeClass('desha');
                } else {
                    $('#fakesave').addClass('desha');
                }
            }
            if (fst != 0) return null;
            fst = 1;
            var btn = "<a href=\"#!\" id=\"fakesave\"class=\"btn btn-warning pull-right hidden-xs-up desha\" onclick=\"$('#savec').click()\">{!! Funciones::ReemplazarApostrofe(trans('users.save')) !!}</a>";
            var p = $('.btn-toolbar').children();
            var pe = $(p).find('.btn-default');
            $.each(pe, function (k, v) {
                $(v).addClass('btn-warning');
            });
            $(p).addClass('col-12 row').prepend('<div class="col-3"></div>').append(btn);
        }

        function validar() {
            if (
                $('#colorselect').val() !== 0 &&
                $('#input_horse_raza').val() !== 0 &&
                $('#input_horse_sex').val() !== 0 &&
                $('#input_horse_name').val().length == 0) {

                ErrorCampos('{!! Funciones::ReemplazarApostrofe(trans('error.errorNoSave')) !!}', '{!! Funciones::ReemplazarApostrofe(trans('error.errorNoHorseName')) !!}');

                return false;
            }
            return true;
        }

        function ErrorCampos(titulo, texto) {
            new PNotify({title: titulo, text: texto, type: 'error'});
            return false;
        }

        $(window).on('load', function () {
            $('.sw-btn-next').on('mouseover', function (e) {
                campos();
            });
        });

        function campos() {
            var v1 = $('#colorselect').val();
            var e = 0;
            var v2 = ($('#input_horse_raza').val());
            var f = 0;
            var v3 = ($('#input_horse_name').val().length);
            var g = 0;
            var v4 = $('#input_horse_sex').val();
            var h = 0;
            if (v1 == 0) {
                e = 1
            } else {
                e = 0
            }
            if (v2 == 0) {
                f = 1
            } else {
                f = 0
            }
            if (v3 == 0) {
                g = 1
            } else {
                g = 0
            }
            if (v4 == 0) {
                h = 1
            } else {
                he = 0
            }
            var el = $('#colorselect');
            if (e == 1) {
                $(el).addClass('has-danger');
            } else {
                $(el).removeClass('has-danger');
            }
            el = $('#input_horse_raza');
            if (f == 1) {
                $(el).addClass('has-danger');
            } else {
                $(el).removeClass('has-danger');
            }
            el = $('#input_horse_name');
            if (g == 1) {
                $(el).addClass('has-danger');
            } else {
                $(el).removeClass('has-danger');
            }
            el = $('#input_horse_sex');
            if (h == 1) {
                $(el).addClass('has-danger');
            } else {
                $(el).removeClass('has-danger');
            }
            if (e == 0 && f == 0 && g == 0 && h == 0) {
                $('.sw-btn-next').removeProp('disabled');
                return true;
            } else {
                $('.sw-btn-next').prop('disabled', true);
                return false;
            }
        }

        $('#input_horse_raza').on('change', function () {
            campos();
        });
        $('#colorselect').on('change', function () {
            campos();
        });
        $(window).on('load', function () {
            $('.predeterminadrmarca').on('click', function () {
                        {{--//nopredeterminado  predeterminado  campopredeterminado  #marcapredetermianda $aguapre--}}
                var s = $(this).attr('data-check');
                if (s == 0) {
                    $(this).attr('data-check', 1);
                    $('.nopredeterminado').addClass('hidden-xs-up');
                    $('.predeterminado').removeClass('hidden-xs-up');
                    $('.campopredeterminado').html('{!! Funciones::ReemplazarApostrofe(trans('desing.watermark')) !!}');
                    $('#marcapredetermianda').val(1);
                } else {
                    $(this).attr('data-check', 0);
                    $('.predeterminado').addClass('hidden-xs-up');
                    $('.nopredeterminado').removeClass('hidden-xs-up');
                    $('.campopredeterminado').html('{!! Funciones::ReemplazarApostrofe(trans('desing.watermark')) !!}');
                    $('#marcapredetermianda').val(0);
                }
            });
        });
    </script>
@endsection
