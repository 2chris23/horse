@extends('backend.layouts.base')
@section('title', trans('Titulos.HorsesStud') )
@php($malos = isset($malos)?$malos:null)
@php($etiquetalabel = "col-xs-12 col-sm-12 col-md-12 col-lg-3 text-sm-left text-md-left text-lg-right col-12")
@php($tiquetainput = "col-xs-12 col-sm-12 col-md-12 col-lg-8 col-12")
@php($iconock = "fa fa-rocket")
@php($iconock = "fa fa-check")

@section('topcss')
    <link type="text/css" rel="stylesheet" href="{!!url('js/tags/tag.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!route('MailCss')!!}"/>

@endsection
@section('content')
    {!! \Session::forget('horse') !!}

    {{--
    http://app.horsesworldsale.com/print/urano-x,veterano-vi,divo-xxx,urgente-jv,potra-palomina,descarada-xcii,velero-jv,lego-jv,pimpoyo,darkness,chimuelo,vasco-jv,negan-lp,nina-ricci-lp,nemo-lp,lamborghini-lp,jazmin,watch-this-b,pajarita-xvii,marilyn,carisma-jm,chiquillo,urbano-jv,vela-xv,potros-de-1-ano-1,vurlo-jv,quisquillosa-mango,potros-de-1-ano-2,uriel-jv,potros-3-anos,velero-jv-ii,impetuoso-gap-ii,historico-jl,ibero-jl,ejemplar-frison,potros-de-1-ano-3,potros-de-2-anos,gusarapo-a,escudero-jl,carbonero-jl,yeguas-pre,etrusco-jl,yegua-castana,adivina,fiesta-viii,flamenca-jv,hiervabuena-jg,lantana-jv,limena-jv-ii,oraima-s,veterana-jv,mosquetero,fogosa-xxxiv,tordito,bruc-de-la-sauleda,sugar,acuarela,chiquicookie,pancho,americo,preferido-jf,spirit
    --}}
    <form class=" col-12 table-responsive noSwipe  m-t-20"
          id="enviado" action="{!! route('exportar.indexpost') !!}" method="post">
        <div class="row">
            {!! csrf_field() !!}
            <div class="col-12  card media_max_991">
                <div class="card-header bg-white row" data-no="true">
                    <div class="col-9">
                        <i class="fa fa-edit"></i>
                        {!! trans('masivo.sendt') !!}
                    </div>

                    <div class="col-3 pull-right">
                        {{--<a href="#!" class="btn  btn-outline-warning" onclick="test()">
                            {!! trans('masivo.preview') !!}
                        </a>--}}

                    </div>

                </div>
                <div class="card-block m-l-0 m-t-35 row form-group p-r-0">

                    <div class="col-12 text-center">

                    </div>
                    <div class="{!! $etiquetalabel !!}">
                        {{--{!! trans('masivo.allh') !!}--}}
                        {!! trans('masivo.fgeneral') !!}
                    </div>
                    <div class="{!! $tiquetainput !!}  row ">
                        <div class="col-4 checkbox tod">
                            <label class="text-success ">
                                <input type="checkbox" id="todosts" name="todosts" value="0">
                                <span class="cr"><i class="cr-icon {!! $iconock !!}"></i></span>
                                <span class="text-black">
                                        {!! trans('masivo.allh') !!}
                                        </span>

                            </label>
                        </div>
                        <div class="col-4 checkbox cub ">
                            <label class="text-success">
                                <input type="checkbox" id="cubricion" name="cubricion" value="1">
                                <span class="cr"><i class="cr-icon {!! $iconock !!}"></i></span>
                                <span class="text-black">
                                        {!! trans('masivo.scubri') !!}
                                        </span>

                            </label>
                        </div>
                        <div class="col-4 checkbox ven">
                            <label class="text-success">
                                <input type="checkbox" id="venta" name="venta" value="1">
                                <span class="cr"><i class="cr-icon {!! $iconock !!}"></i></span>
                                <span class="text-black">
                                    {!! trans('masivo.sventa') !!}
                                    </span>

                            </label>
                        </div>
                    </div>

                    @php($cero =1)
                    @if(count($sex) != 0)
                        {{--'venta_r','venta_s','venta_c','cubri_s','cubri_c','cubri_r'--}}

                        <div class="{!! $etiquetalabel !!} sxos">
                            Sexos
                        </div>
                        <div class="{!! $tiquetainput !!}  row sxos">

                            @foreach($sex as $k=>$v)
                                @if($v->sex!=0)
                                    {{--'venta_r','','venta_c','','cubri_c','cubri_r'--}}
                                    @php
                                        $venta_sexo = ' data-ventas="0" ';
                                        $cubri_sexo = '  data-cubris="0" ';
                                        if(in_array($v->sex,$venta_s)){
                                            $venta_sexo=' data-ventas="1" ';
                                        }
                                        if(in_array($v->sex,$cubri_s)){
                                            $cubri_sexo=' data-cubris="1" ';
                                        }
                                    @endphp
                                    <div class="col-12 col-md-3 checkbox cbade "
                                         data-ee="{!! $v->sex !!}"

                                         data-cleared="1" {!! $cubri_sexo !!} {!! $venta_sexo !!}
                                            {{--
                                         data-totov="{!! json_encode($venta_s) !!}"
                                         data-totoc="{!! json_encode($cubri_s) !!}"
                                         --}}
                                    >
                                        <label class="text-success">
                                            <input type="checkbox"
                                                   name="sexo[]"
                                                   value="{!! $v->sex !!}"
                                                   class="sexoss ">
                                            <span class="cr"><i
                                                        class="cr-icon fa fa-check"></i></span>
                                            <span class="text-black"
                                                  data-el='{{json_encode($v) }}'>
                                                            {!! trans('horse.sex.'.$v->sex )!!}
                                                        </span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    @endif


                    @if(count($razass)!=0)
                        <div class="{!! $etiquetalabel !!} rass"></div>
                        <div class="{!! $tiquetainput !!}  row m-l-0 rass">

                            {{--<div class="col-12 col-md-4 p-r-0  " id="cardsex">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        <span class="card-title">
                                            {!! trans('masivo.sexos') !!}

                                        </span>
                                        <span class="float-right"> <i
                                                    class="fa fa-chevron-down"></i> </span>
                                    </div>
                                    <div class="card-block m-t-20 col-12 "
                                         style="display: none;">
                                        <div class="p-l-10 row">
                                            <div class="col-12 row">
                                                @php($cero =1)
                                                @foreach($sex as $k=>$v)
                                                    @if($v->sex!=0)
                                                        <div class="col-md-6 col-12 font-14 m-b-0">
                                                            <div class="checkbox">
                                                                <label class="text-success">
                                                                    <input type="checkbox"
                                                                           name="sexo[]"
                                                                           value="{!! $v->sex !!}"
                                                                           class="sexoss">
                                                                    <span class="cr"><i
                                                                                class="cr-icon fa fa-check"></i></span>
                                                                    <span class="text-black"
                                                                          data-el='{{json_encode($v) }}'>
                                                                {!! trans('horse.sex.'.$v->sex )!!}
                                                            </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @elseif($v->sex==0)
                                                        @php($cero =0)
                                                        <div class="col-md-6 col-12 font-14 m-b-0">
                                                            <div class="checkbox">
                                                                <label class="text-success">
                                                                    <input type="checkbox"
                                                                           name="sexo[]"
                                                                           value="{!! $v->sex !!}"
                                                                           class="sexoss">
                                                                    <span class="cr"><i
                                                                                class="cr-icon fa fa-check"></i></span>
                                                                    <span class="text-black" data-el=''>
                                                                {!! trans('portal.allra' )!!}
                                                            </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                @if($cero == 1)
                                                    <div class="col-md-6 col-12 font-14 m-b-0">
                                                        <div class="checkbox">
                                                            <label class="text-success">
                                                                <input type="checkbox"
                                                                       name="sexo[]"
                                                                       value="{!! 0!!}"
                                                                       class="sexoss">
                                                                <span class="cr"><i
                                                                            class="cr-icon fa fa-check"></i></span>
                                                                <span class="text-black" data-el=''>
                                                                {!! trans('portal.allra' )!!}
                                                            </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-1"></div>
                                            <div class=" col-3 text-center">
                                                <a href="#!" class="btn btn-warning sexos">
                                                    {!! trans('masivo.saoll') !!}
                                                </a>
                                            </div>
                                            <div class="col-12 m-t-20"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>--}}
                            @if(count($razass)!=0)
                                <div class="col-12  col-md-6 " id="cardraza">
                                    <div class="card  row m-r-5">
                                        <div class="card-header bg-white">
                                                <span class="card-title">
                                                    {!! trans('masivo.razas') !!}
                                                </span>
                                            <span class="float-right">
                                                        <i class="fa fa-chevron-down"></i>
                                                </span>
                                        </div>
                                        <div class="card-block m-t-20 col-12 "
                                             style="display: none;">
                                            <div class="p-l-10 row">
                                                <div class="col-12 row">

                                                    @php($cero = 1)
                                                    @foreach($razass as $k=>$v)
                                                        @if($v->raza!=0)
                                                            {{--'','','venta_c','','cubri_c',''--}}

                                                            @php
                                                                $venta_sexo = ' data-ventar="0" ';
                                                                $cubri_sexo = '  data-cubrir="0" ';
                                                                if(in_array($v->raza,$venta_r)){
                                                                    $venta_sexo=' data-ventar="1" ';
                                                                }
                                                                if(in_array($v->raza,$cubri_r)){
                                                                    $cubri_sexo=' data-cubrir="1" ';
                                                                }
                                                            @endphp
                                                            <div class="col-md-6 col-12 font-14 m-b-0  cadb"
                                                                 @php
                                                                     $d = '';
                                                                         $s = \Auth::user()->Yeguada()->Horses()->where('raza', $v->raza)->groupby('sex')->get();

                                                                         foreach($s as $r=>$e){

                                                                         $d .= ' data-sexod-'.$e->sex.'="'. $e->sex  .'"';

                                                                         }
                                                                 @endphp

                                                                 {!! $d !!}
                                                                 data-ee="{!! $v->raza !!}"
                                                                 data-cleared="1"
                                                                    {!! $cubri_sexo !!} {!! $venta_sexo !!}
                                                                    {{--
                                                            data-totov="{!! json_encode($venta_r) !!}"
                                                            data-totoc="{!! json_encode($cubri_r) !!}"
                                                            --}}
                                                            >
                                                                <div class="checkbox">
                                                                    <label class="text-success">
                                                                        <input type="checkbox"
                                                                               name="raza[]"
                                                                               value="{!! $v->raza !!}"
                                                                               class="razasc">
                                                                        <span class="cr">
                                                                    <i class="cr-icon fa fa-check"></i>
                                                                </span>
                                                                        <span class="text-black"
                                                                              data-el='{{json_encode($v) }}'>
                                                                            {!! trans('horse.raza.'.$v->raza )!!}

                                                                </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    @if($cero ==1)
                                                        <div class="col-md-6 col-12 font-14 m-b-0 hidden-xs-up">
                                                            <div class="checkbox">
                                                                <label class="text-success">
                                                                    <input type="checkbox"
                                                                           name="raza[]"
                                                                           value="{!! 0 !!}"
                                                                           class="razasss">
                                                                    <span class="cr"><i
                                                                                class="cr-icon fa fa-check"></i></span>
                                                                    <span class="text-black" data-el=''>
                                                            {!! trans('portal.allra' )!!}
                                                        </span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                    @endif


                                                </div>

                                                <div class="col-1"></div>
                                                <div class=" col-3 text-center">
                                                    <a href="#!" class="btn btn-warning razas">
                                                        {!! trans('masivo.sall') !!}
                                                    </a>
                                                </div>
                                                <div class="col-12 m-t-20"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(count($color)!=0)
                                <div class="col-12  col-md-6 " id="cardcapa">
                                    <div class="card row m-l-5">
                                        <div class="card-header bg-white">
                                    <span class="card-title">
                                        {!! trans('masivo.capas') !!}
                                    </span>
                                            <span class="float-right"> <i
                                                        class="fa fa-chevron-down"></i> </span>
                                        </div>

                                        <div class="card-block m-t-20 col-12 "
                                             style="display: none;">
                                            <div class="p-l-10 row">
                                                <div class="col-12 row">
                                                    @php($cero = 1)
                                                    @foreach($color as $k=>$v)
                                                        @if($v->color!=0)

                                                            {{--'','','','','cubri_c',''--}}

                                                            @php
                                                                $venta_sexo = ' data-ventac="0" ';
                                                                $cubri_sexo = '  data-cubric="0" ';
                                                                if(in_array($v->color,$venta_c)){
                                                                    $venta_sexo=' data-ventac="1" ';
                                                                }
                                                                if(in_array($v->color,$cubri_c)){
                                                                    $cubri_sexo=' data-cubric="1" ';
                                                                }
                                                            @endphp
                                                            <div class="col-md-6 col-12 font-14 m-b-0 cadb"
                                                                 data-cleared="1"
                                                                    @php
                                                                        $s = \Auth::user()->Yeguada()->Horses()->select('sex')->where('color', $v->color)->get();
                                                                        $d = '';


                                                                            foreach($s as $r=>$e){
                                                                                $d .=" data-sexod-".$e->sex.'="'.$e->sex . '"';
                                                                           }

                                                                    @endphp
                                                                    {!! $d !!}
                                                                    {!! $cubri_sexo !!} {!! $venta_sexo !!}
                                                            >
                                                                <div class="checkbox">
                                                                    <label class="text-success">
                                                                        <input type="checkbox"
                                                                               name="color[]"
                                                                               value="{!! $v->color !!}"
                                                                               class="capas">
                                                                        <span class="cr"><i
                                                                                    class="cr-icon fa fa-check"></i></span>
                                                                        <span class="text-black"
                                                                              data-el='{{json_encode($v) }}'>
                                                            {!! trans('horse.color.'.$v->color )!!}
                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>


                                                        @elseif($v->color ==0)
                                                            {{--
                                                            @php($cero = 0)
                                                            <div class="col-md-6 col-12 font-14 m-b-0">
                                                                <div class="checkbox">
                                                                    <label class="text-success">
                                                                        <input type="checkbox"
                                                                               name="color[]"
                                                                               value="{!! $v->color !!}"
                                                                               class="sexoss">
                                                                        <span class="cr"><i
                                                                                    class="cr-icon fa fa-check"></i></span>
                                                                        <span class="text-black" data-el=''>
                                                                        {!! trans('portal.allra' )!!}
                                                                    </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            --}}

                                                        @endif

                                                    @endforeach
                                                    @if($cero == 1)
                                                        <div class="col-md-6 col-12 font-14 m-b-0 hidden-xs-up">
                                                            <div class="checkbox">
                                                                <label class="text-success">
                                                                    <input type="checkbox"
                                                                           name="color[]"
                                                                           value="{!! 0 !!}"
                                                                           class="colorr">
                                                                    <span class="cr"><i
                                                                                class="cr-icon fa fa-check"></i></span>
                                                                    <span class="text-black" data-el=''>
                                                            {!! trans('portal.allra' )!!}
                                                        </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="col-1"></div>
                                                <div class=" col-3 text-center">
                                                    <a href="#!" class="btn btn-warning capa">
                                                        {!! trans('masivo.sall') !!}
                                                    </a>
                                                </div>

                                                <div class="col-12 m-t-20"></div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif


                        </div>
                    @endif
                    <div class="col-12 m-t-40 ">
                        <hr>
                    </div>
                    @if(count($horses)!=0)
                        <div class="{!! $etiquetalabel !!} cabab"></div>
                        <div class="{!! $tiquetainput !!}  row  cabab">
                            <div class="col-12 m-t-20 m-l-15 card" id="cardv">

                                <div class="card-header bg-white">
                                                            <span class="card-title">
                                                                {!! trans('masivo.lista') !!}
                                                            </span>
                                    <span class="float-right"> <i
                                                class="fa fa-chevron-down"></i> </span>
                                </div>
                                <div class="card-block m-t-20 col-12 "
                                     style="display: none;">
                                    <div class="p-l-10 row">
                                        <div class="col-12 row">
                                            <div class=" col-12 table-responsive noSwipe m-t-25 "
                                                 action="{!! route('exportar.indexpost') !!}"
                                                 method="post">

                                                <table class="table table-striped table-hover "
                                                       cellspacing="0" id="tabla">
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
                                                    @foreach($horses as $c)
                                                        <tr data-sex="{!! $c->sex !!}"
                                                            data-color="{!! $c->color !!}"
                                                            data-raza="{!! $c->raza !!}"
                                                            class="nm horse_{!! $c->id !!}"
                                                            data-id="{!! $c->id !!}"
                                                            data-visita="{!! $c->getVisitantes() !!}"
                                                            id="horse_{!! $c->id !!}"

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

                                                                    @elseif($k == "sel")
                                                                        <div class="col-12 checkbox">
                                                                            <label class="text-success sle">
                                                                                <input type="checkbox"
                                                                                       name="horsesel[]"
                                                                                       class="slee"
                                                                                       value="{!! $c->id !!}"
                                                                                       id="ck_{!! $c->id !!}">

                                                                                <span class="cr"><i
                                                                                            class="cr-icon {!! $iconock !!}"></i></span>
                                                                                <span class="text-black">

                                                                            </span>
                                                                            </label>
                                                                        </div>




                                                                    @elseif($k == "color")
                                                                        {!! $c->getColorString() !!}

                                                                    @elseif($k == "raised")
                                                                        {!! $c->getRaisedFormat() !!}

                                                                    @elseif($k == "sex")
                                                                        {!! trans('horse.sex.'.$c->sex) !!}

                                                                    @elseif($k == "price")
                                                                        @if(!empty($c->price) )

                                                                            @if($c->price !=0)
                                                                                {!! $c->ObtenPrecioMonedaMill() !!}
                                                                                {!! $c->getSimboloMoneda() !!}
                                                                                {{--CMAR MONEDA --}}
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

                                                                    @elseif($k == "birthdate")
                                                                        {!! Funciones::AjustarFechaDmy($c->birthdate)!!}

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
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif


                    {{--
                    <div class=" col-2 text-center">
                        <a href="#!" class="btn btn-warning fsexos">
                            <input type="checkbox" id="mostrarsexo"
                                   class="hidden-xs-up">
                            {!! trans('masivo.fsexo') !!}
                        </a>
                    </div>

                    <div class=" col-2 text-center">
                        <a href="#!" class="btn btn-warning fcapa">
                            <input type="checkbox" id="mostrarcapa"
                                   class="hidden-xs-up">
                            {!! trans('masivo.fcapa') !!}
                        </a>
                    </div>
                    <div class=" col-2 text-center">
                        <a href="#!" class="btn btn-warning fraza">
                            <input type="checkbox" id="mostrarraza"
                                   class="hidden-xs-up">
                            {!! trans('masivo.fraza') !!}
                        </a>
                    </div>
                    <div class=" col-2 text-center">
                        <a href="#!" class="btn btn-warning fv">
                            <input type="checkbox" id="mostrarv"
                                   class="hidden-xs-up">
                            {!! trans('masivo.bcaballo') !!}
                        </a>
                    </div>
                    --}}
                    {{--
                                            <div class=" col-2 text-center">
                                                <a href="#!" class="btn btn-warning ventas">
                                                    <input type="checkbox" id="cubricion" name="cubricion" value="0"
                                                           class="hidden-xs-up">
                                                    {!! trans('masivo.scubri') !!}
                                                </a>
                                            </div>
                                            --}}

                    {{--
                    <div class=" col-2 text-center">
                        <a href="#!" class="btn btn-warning todost">
                            <input type="checkbox" id="todosts" name="todosts" value="0"
                                   class="hidden-xs-up">
                            {!! trans('masivo.allh') !!}
                        </a>
                    </div>
                    --}}
                    <div class="col-12 m-t-20 clearfix"></div>


                    <div class="{!! $etiquetalabel !!}">
                        <label for="para">{!! trans('masivo.destina') !!}</label>
                    </div>
                    <div class="{!! $tiquetainput !!}">
                        <div class="tag-box editable"
                             data-no-duplicate="true"
                             data-tags-input-name="para"
                             placeholder="Para"
                             required=""
                             id="para">{!! $malos !!}</div>
                        {{--
                        <input type="text" name="para" class="form-control"
                               placeholder="Para" required="">
                        --}}
                    </div>

                    {{--<div class="form-group">
                        <div class="row">
                            <div class="col-md-6 m-t-10">
                                <input type="email" class="form-control" placeholder="Cc">
                            </div>
                            <div class="col-md-6 m-t-10">
                                <input type="email" class="form-control" placeholder="Bcc">
                            </div>
                        </div>
                    </div>--}}
                    <div class="col-12 m-t-10 clearfix"></div>

                    <div class="{!! $etiquetalabel !!}">
                        <label for="titulo">
                            {!! trans('masivo.asin') !!}
                        </label>
                    </div>
                    <div class="{!! $tiquetainput !!}">
                        <input type="text" name="titulo" class="form-control"
                               placeholder="{!! trans('masivo.asinp') !!}"
                               required="">
                    </div>
                    <div class="col-12 m-t-10 clearfix"></div>

                    <div class="{!! $etiquetalabel !!}">
                        <label for="conten">
                            {!! trans('masivo.conten') !!}
                        </label>
                    </div>
                    <div class="{!! $tiquetainput !!}">
                                    <textarea name="conten" class="wysihtml5 form-control " rows="5"
                                              placeholder="{!! trans('masivo.contenp') !!}"></textarea>
                    </div>
                    {{--}}
                </textarea>
                <input type="hidden" name="_wysihtml5_mode" value="1">
                <iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="display: block; background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(206, 212, 218); border-style: solid; border-width: 1px; clear: none; float: none; margin: 20px 0px 0px; outline: rgb(73, 80, 87) none 0px; outline-offset: 0px; padding: 5.25px 10.5px; position: static; top: auto; left: auto; right: auto; bottom: auto; z-index: auto; vertical-align: baseline; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 3.5px; width: 100%; height: auto;">
                </iframe>
                --}}
                    <div class="col-12 m-t-10 clearfix"></div>

                    <div class="{!! $etiquetalabel !!}">
                    </div>
                    <div class="{!! $tiquetainput !!}">
                        {{--<span class="p-l-10"></span>--}}

                        <a href="#!" class="btn btn-warning" onclick="EnviarCorreo()">
                            {{--<i class="fa fa-reply"></i>--}}
                            {!! trans('masivo.send') !!}
                        </a>
                        <button type="submit" class="hidden-xs-up" id="envido">
                            {{--<i class="fa fa-reply"></i>--}}
                            {!! trans('masivo.send') !!}
                        </button>
                        <span class="p-l-10"></span>

                        <a href="{!! route('caballoc.index') !!}" class="btn btn-outline-danger">
                            {{--<i class="fa fa-close"></i>--}}
                            {!! trans('masivo.cancel') !!}
                        </a>
                    </div>
                    <div class="col-12 m-t-10 clearfix"></div>


                </div>
            </div>
        </div>

    </form>
    <div class=" col-12 table-responsive noSwipe  m-t-20">
        <div class="row">
            <div class=" col-12 card">
                <div class="card-header bg-white">
                                                <span class="card-title">
                                                    <i class="fa fa-eye"></i>
                                                    {!! trans('masivo.vercorreo') !!}
                                                </span>
                    <span class="float-right">
                                                        <i class="fa fa-chevron-up"></i>
                                                </span>
                </div>
                <div class="card-block m-t-20 col-12 row">
                    <div class="{!! $etiquetalabel !!}">

                    </div>
                    <div class="{!! $tiquetainput !!}  row ">
                        <div class="col-12 checkbox">
                            {!! trans('masivo.previewc',['boton'=>'<a href="#!" class="btn  btn-outline-warning" onclick="test()"> '.trans('masivo.preview') .' </a>']) !!}
                        </div>
                    </div>
                    <div class="col-12 m-t-10"></div>
                    <div class="{!! $etiquetalabel !!}">

                    </div>
                    <div class="{!! $tiquetainput !!}  row col-lg-9">

                        <iframe id='previews' class="col-12 previsual" frameborder="0"></iframe>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
{{--
tabless = $('#tabla').dataTable({
"order": [[0, "asc"]],
"pageLength": 5,
"language": {
"decimal": ",",
"thousands": ".",
//"lengthMenu": "Mostrando _MENU_ registros por pagina",
"zeroRecords": "{!! trans('users.zerorecord') !!}",
"info": "{!! trans('users.tableinfo') !!}",
"loadingRecords": "{!! trans('users.tableloading') !!}",
//"processing": "{!! trans('users.tablebusy') !!}",
//"search": "Filter records:",
"search": "{!! trans('users.tablesearch') !!}",
"infoEmpty": "{!! trans('users.tableinfoempty') !!}",
"infoFiltered": "{!! trans('users.tableinfofilter') !!}",
"emptyTable": "{!! trans('users.tableempty') !!}",
"lengthMenu": "{!! trans('users.tableregistros') !!}",
"emptyTable": "{!! trans('users.emptyTable') !!}",
"paginate": {
"first": "{!! trans('users.tablefirst') !!}",
"last": "{!! trans('users.tablelast') !!}",
"next": "{!! trans('users.tablenext') !!}",
"previous": "{!! trans('users.tableprevious') !!}",

},
},

"fnInitComplete": function (oSettings, json) {
$('#tabla').on('page.dt', function () {
//var info = table.page.info();
//console.log( 'Showing page: '+info.page+' of '+info.pages );
cargarimagenes();
$('.page-link').on('click', function () {
cargarimagenes();
});
});
},

//"processing": true,
//"serverSide": true,
});
--}}
@section('bottomjs')
    {{--<script type="text/javascript" src="{!! url('assets/js/pages/radio_checkbox.js')!!}"></script>--}}
    <script type="text/javascript" src="{{asset('assets/js/pages/gallery.js')}}"></script>
    <script src="{!! url('js/tags/tagging.js') !!}"></script>
    <script src="{!! route('MailJs') !!}"></script>

    @include('backend.common.exportar')
    <script>
        var venta_r = {!! json_encode($venta_r) !!};
        var venta_c = {!! json_encode($venta_c) !!};
        var venta_s = {!! json_encode($venta_s) !!};
        var cubri_s = {!! json_encode($cubri_s) !!};
        var cubri_c = {!! json_encode($cubri_c) !!};
        var cubri_r = {!! json_encode($cubri_r) !!};
        {{--'','','','','',''--}}


    </script>
@endsection