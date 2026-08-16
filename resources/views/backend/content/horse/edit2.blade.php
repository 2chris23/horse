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
@section('title', trans('Titulos.HorseEditStud',['name'=>$horse->getName()]))
{{--@section('pagetitle', '<i class="fa fa-pagelines">
{{--@section('pagetitle', '<i class="fa fa-domapagelines">
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
    <link type="text/css" rel="stylesheet" href="{!!url('assets/vendors/imagehover/css/imagehover.min.css')!!}"/>
    {{--<link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css"/>--}}
    <link type="text/css" rel="stylesheet" href="{!! url('/js/dropify/css/dropify.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/bootstrap-select.min.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('js/step/css/smart_wizard.min.css') !!}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <style>
        .vistos {
            font-size: 14px;
            color: #ff9933;
            padding-left: 10px;
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
                        <div class="col-9 row">
                            @php
                                $favo = $horse->favorite;
                                if($favo == 1){
                                $vasi = '';
                                $vano='hidden-xl-down';
                                }else{
                                $vano = '';
                                $vasi='hidden-xl-down';
                                }
                            @endphp
                            <div class="col-1">
                                <a href="javascript:void(0);" id="favorite_si"
                                   data-toggle="popover" data-trigger="hover" data-placement="left"
                                   title="{!! trans('popover.horse.favorito.titulo') !!}"
                                   data-content="{!! trans('popover.horse.favorito.contenido',['name'=>$horse->name]) !!}"
                                   onclick="setfav({!! $horse->id !!},0)"
                                   class=" {!! $vasi !!} ">
                                    <i class="fa fa-star star"> </i>
                                </a>
                                <a href="javascript:void(0);" id="favorite_no"
                                   onclick="setfav({!! $horse->id !!},1)"
                                   data-toggle="popover" data-trigger="hover" data-placement="left"
                                   title="{!! trans('popover.horse.favorito.titulo') !!}"
                                   data-content="{!! trans('popover.horse.favorito.contenido',['name'=>$horse->name]) !!}"
                                   class=" {!!$vano !!} ">
                                    <i class="fa fa-star-o star"> </i>
                                </a>
                                {{--<div class="text-right star font-15" data-toggle="tooltip"
                                     title="Visitas {!! $horse->getVisitantes() !!}">
                                    <i class="fa fa-eye star font-15"></i> {!! $horse->getVisitantes() !!}
                                </div>--}}
                            </div>
                            <div class="col-11">
                                {!! trans('horse.text.edit_title',['name'=> $horse->name]) !!}
                                <span class='vistos'>
                                    ({!! trans('botones.visto',['n'=>$horse->getVisitantes()]) !!})
                                </span>
                            </div>
                        </div>
                        <div class=" col-3 pull-right ">
                            <a href="{!! route('caballoc.index') !!}" class=" btn btn-warning pull-right ">
                                {!! trans('users.return') !!}</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 m-t-25">
                        <div id="smartwizard">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="#horsedata">
                                        {!! trans('users.step',['n'=>1]) !!} <br>
                                        <small>
                                            {!! trans('horse.text.create_title') !!}
                                        </small>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#imagedata">
                                        {!! trans('users.step',['n'=>2]) !!} <br>
                                        <small>
                                            {!! trans('stud.photos') !!}
                                        </small>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#videodata">
                                        {!! trans('users.step',['n'=>3]) !!} <br>
                                        <small>
                                            {!! trans('stud.video') !!}
                                        </small>
                                    </a>
                                </li>
                            </ul>
                            <div class="m-t-25">
                                <div id="horsedata" class="row">
                                    <form action="" id="horse_" class="m-t-35 row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.name')}}:
                                                </label>
                                                <div class="{!! $tiquetainput !!}">
                                                    <input type="text" placeholder="{{trans('horse.placeholder.name')}}"
                                                           id="input_horse_name"
                                                           onchange="campos()"
                                                           name="name"
                                                           value="{{$horse->getName() }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.raised')}}:
                                                </label>
                                                <div class="{!! $tiquetainput !!}">
                                                    <input type="text"
                                                           name="raised"
                                                           placeholder="{{trans('horse.placeholder.raised')}}"
                                                           id="input_horse_raised" name="input_horse_raised"
                                                           value="{{$horse->getRaised()}}" class="form-control"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        @include('backend.common.colors',['seleccionado'=>$horse->color])
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.birthdate')}}:
                                                </label>
                                                <div class="{!! $tiquetainput !!}">
                                                    <input type="date"
                                                           placeholder="{{trans('horse.placeholder.birthdate')}}"
                                                           name="date"
                                                           id="input_horse_birthdate"
                                                           value="{{$horse->getBirthdate()}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        @include('backend.common.raza',['seleccionado'=>$horse->raza ])
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!}  ">
                                                    {{trans('horse.text.doma')}}:
                                                </label>
                                                <div class="{!! $tiquetainput !!} ">
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
                                        @include('backend.common.sex',['seleccionado'=>$horse->sex,'horse'=>$horse])
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                            <div class="form-group row">
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.stud')}}:
                                                </label>
                                                <div class="{!! $tiquetainput !!}">
                                                    <input type="text" placeholder="{{trans('horse.placeholder.stud')}}"
                                                           id="input_horse_stud"
                                                           name="input_horse_stud"
                                                           value="{{$horse->getStud()}}" class="form-control ">
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
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.tosold')}}
                                                </label>
                                                <div class="{!! $tiquetainput !!} row p-r-0">
                                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-12">
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
                                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-12 row p-r-0  monoprice {!! ($horse->getTosold() == true)?'':'hidden-xl-down' !!}">
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
                                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                                    {{trans('horse.text.description')}}
                                                </label>
                                                <div class="{!! $tiquetainput !!}">
                                                    <textarea name="input_stud_description"
                                                              id="input_stud_description">{{$horse->getDescripcion()}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="offset-3 col-6  text-center ">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                                    <a href="#" onclick="savedata()"
                                                       class=" btn btn-block btn-success glow_button ">{!! trans('users.save') !!}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$horse_id}}" id="horse_id" name="horse_id"
                                               class="form-control">
                                    </form>
                                </div>
                                <div id="imagedata" class=" row ">
                                    <div class="col-12 m-t-35" style="margin-top:50px">
                                        <div id="dro_caballo" class="col-12 "
                                             data-toggle="popover" data-trigger="hover" data-placement="bottom"
                                             title="{!! trans('popover.horse.imagenes.titulo') !!}"
                                             data-content="{!! trans('popover.horse.imagenes.contenido') !!}"
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
                                                       class="btn btn-warning pull-left  form-control drp_action_caballo btn-drp-caballo ">
                                            </div>
                                        </div>
                                        @if($mostrarmarca !=0)
                                            <div class="col-12 text-center m-t-10">
                                                <div class="row">
                                                    <div class="col-9">
                                                    </div>
                                                    <div class="col-3 predeterminadrmarca m-t-20"
                                                         @include('backend.common.marcahelp')
                                                         data-check="{!! $agua !!}">
                                        <span class="nopredeterminado text-red @if($agua!=0) hidden-xs-up @endif">
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
                                        <div class="col-12 m-t-35 row" id="photos" style=""
                                             data-toggle="popover" data-trigger="hover" data-placement="top"
                                             title="{!! trans('popover.ordenarfoto.titulo') !!}"
                                             data-content="{!! trans('popover.ordenarfoto.contenido') !!}">
                                            @foreach($horse->getPhotoModel() as $k=>$v)
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 m-t-20 ">
                                                    @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getUrl()])
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div id="videodata" class="row ">
                                    <div class=" col-12 m-t-35">
                                        <div class="form-group row">
                                            <label class="{!! $etiquetalabel !!} col-form-label ">
                                                {!! trans('video.addressvideo') !!}:
                                            </label>
                                            <div class="{!! $tiquetainput !!}">
                                                <input type="text" placeholder="{{trans('stud.text.youtube')}}"
                                                       id="input_stud_video"
                                                       name="video"
                                                       value=""
                                                       class="form-control">
                                            </div>
                                            <div class="col-2">
                                                <a href="#savedv" onclick="savevideo('{!! route('video.other') !!}')"
                                                   id="savedv" class="btn btn-waring"><i
                                                            class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12 m-t-35">
                                        <div class="form-group row">
                                            <label class="{!! $etiquetalabel !!} col-form-label ">
                                            </label>
                                            <form action="" class="{!! $etiquetalabel !!} row" id="vidoetape">
                                            </form>
                                            <div class="m-t-35 row  m-t-25 col-12" id="video">
                                                @php($videos = $horse->getVideosModel())
                                                @foreach($videos as $k=>$v)
                                                    @if(!empty($v->getEmbedVideoYoutube()))
                                                        <div class="col-3 m-t-20">
                                                            @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getYoutubeThumb(),'embed'=>$v->getEmbedVideoYoutube(),'video'=>1])
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
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
    <script src="{!! route('horseEditJs',['id'=>$horse->id]) !!}">
    </script>


    {{--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/locales/LANG.js">
        </script>
    --}}
    @if(\Session::has('facebook'))
        <script>

            var tace = "{!! \Session::get('facebook') !!}";
            swal({
                title: 'Puedes compartir el caballo {!! \Session::get('horse_name') !!} por facebook',
                type: 'success',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '¿Quieres compartirlo ahora?',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                window.open('https://www.facebook.com/sharer.php?u=' + tace, 'Compartir caballo', 'resizable=no,height=200,width=300,scrollbars=no');
                {{--window.open(tace, 'Compartir caballo', "resizable=no,height=200,scrollbars=no");--}}
            }, function (dismiss) {

            });
            {!! \Session::forget('facebook') !!}
            {!! \Session::forget('horse_name') !!}


        </script>
    @endif
    <script>
        $(window).on('load', function () {
            CKEDITOR.replace("input_stud_description");
            CKEDITOR.on('instanceReady', function (evt) {
                CKEDITOR.instances['input_stud_description'].setData('{!!  Funciones::ReemplazarApostrofe( $horse->getDescripcion()) !!}');
            });
        })

    </script>
@endsection