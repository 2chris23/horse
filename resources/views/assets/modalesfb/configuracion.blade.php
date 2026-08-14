<?php $etiquetalabel = "col-xs-12 col-sm-12 col-md-12 col-lg-3 text-sm-left text-md-left text-lg-right col-12"; ?>
<?php $tiquetainput = "col-xs-12 col-sm-12 col-md-12 col-lg-8 col-12"; ?>
@php
    use App\Model\Autopostconf;$user = \Auth::user();
    $adm = $user->isAdm();
   
    if($adm == true){
    $ruta = route('ConfigurarPublicacion');
    $diarias = Autopostconf::CaballoDiarioAdmin($user->id)->first();
    $cubriciones = Autopostconf::CubricionDiarioAdmin($user->id)->first();
    $ventas = Autopostconf::VentasnDiarioAdmin($user->id)->first();
   
    $ctdiario = (!empty($diarias))?count($diarias->getHoras()):0;
    $ctcub = (!empty($cubriciones))?count($cubriciones->getHoras()):0;
    $ctvent = (!empty($ventas))?count($ventas->getHoras()):0;
    }else{
    $ruta = route('ConfigurarPublicacion');
    $diarias = Autopostconf::CaballoDiario($user->Yeguada())->first();
    $cubriciones = Autopostconf::CubricionDiario($user->Yeguada())->first();
    $ventas = Autopostconf::VentasnDiario($user->Yeguada())->first();


    $videos = Autopostconf::VideoInstalacionDiario($user->Yeguada())->first();
    $fotos= Autopostconf::FotosInstalacionDiario($user->Yeguada())->first();

   
    $ctdiario = (!empty($diarias))?count($diarias->getHoras()):0;
    $ctcub = (!empty($cubriciones))?count($cubriciones->getHoras()):0;
    $ctvent = (!empty($ventas))?count($ventas->getHoras()):0;




    }
   $textoactivo = trans('facebook.Activo');
@endphp
{{--Postear link--}}
<div class="modal m-t-50" id="ConfFb" role="dialog" aria-labelledby="modalLabelbouncedown" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white" id="modalLabelbouncedown">
                    {!! trans('facebook.progdiaria') !!}
                </h4>
            </div>
            <div class="modal-body col-12 ">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header bg-white">
                            <ul class="nav nav-tabs card-header-tabs float-left">
                                <li class="nav-item hidden-xs-up">
                                    <a class="nav-link " data-toggle="tab"
                                       href="#caballosd">
                                        {!! trans('facebook.horses') !!}
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab"
                                       href="#caballov">{!! trans('facebook.sell') !!}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab"
                                       href="#caballosc">{!! trans('horse.text.cubricions') !!}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                       href="#videoy">{!! trans('tema2.menu.video') !!}</a>
                                </li>
                                <li class="nav-item hidden hidden-xs-up">
                                    <a class="nav-link " data-toggle="tab"
                                       href="#fotoy">{!! trans('tema2.menu.foto') !!}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content card-body">
                            <div class="tab-pane  container hidden-xs-up " id="caballosd">
                                {{--Caballos--}}
                                <form class="col-12 form-control no-border m-t-10" action="{!! $ruta !!}" method="post">
                                    <div class="row">
                                        {!! csrf_field() !!}
                                        <div class="{!! $etiquetalabel !!} m-t-10">

                                        </div>
                                        <div class="{!! $tiquetainput !!} row m-t-10">
                                            {!! trans('facebook.programacion1',['type'=>trans('facebook.type.0')]) !!}
                                            {{--{!! trans('facebook.cabdiariatext') !!}--}}

                                        </div>

                                        <div class="{!! $etiquetalabel !!} m-t-20">
                                            {!! trans('facebook.horsetopub') !!}
                                            <span data-toggle="tooltip"
                                                  title="{{ trans('facebook.programacion2') }}"
                                                  style="    padding: .5rem .75rem;">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>

                                        </div>
                                        <div class="{!! $tiquetainput !!} row m-t-10">
                                            <div class="col-xs-6 col-md-3">
                                                <input type="number" name="cantidaddiaria" value="{!! $ctdiario !!}"
                                                       class="number form-control"
                                                       min="0"
                                                       @if(\Auth::user()->isAdm())
                                                       max="{!! count(Horses::where('id',"!=",0)->get()->pluck('id')) !!}"
                                                       @else
                                                       max="{!! count(Horses::where('studs_id',\Auth::user()->Yeguada()->id)->get()->pluck('id')) !!}"
                                                       @endif
                                                       onchange="addtimeday(this)">

                                            </div>


                                            {{-- --}}
                                        </div>
                                        <div class="{!! $etiquetalabel !!} m-t-15 ">
                                            {!! trans('facebook.horaspub') !!}
                                            <span
                                                    data-toggle="tooltip"
                                                    title="{{
                                            trans('facebook.programacion3')
                                            }}"
                                            >
                                        <i class="fa fa-info-circle"></i>
                                    </span>
                                        </div>
                                        <div class="{!! $tiquetainput !!} times row placec">
                                            @if(!empty($diarias))
                                                <?php $post = $diarias->getHoras(); ?>
                                                @foreach($post as $k=>$v)
                                                    <div class="col-12 col-md-6 col-lg-4 m-t-10">
                                                        <div class="input-group">
                                                             <span class="input-group-addon" id="basic-addon1">
                                                                 <i class="fa fa-clock-o"></i>
                                                             </span>
                                                            <input type="text" class=" timers timenow form-control"
                                                                   name="timehorsec[]"
                                                                   aria-describedby="basic-addon1"
                                                                   value="{!! Funciones::AjustarHoraTZ($v) !!}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>


                                        <div class="{!! $etiquetalabel !!} m-t-20">

                                        </div>
                                        <div class="{!! $tiquetainput !!} row m-t-10">
                                            <?php $aguapre = (!empty($diarias))?((!empty($diarias->status))?$diarias->status:0):0; ?>
                                            <div class="col-12 confac m-t-10  m-t-10 "
                                                 data-check="{!! $aguapre !!}">
                                                 <span class="nopredeterminado text-red @if($aguapre!=0) hidden-xs-up @endif">
                                                    <i class="fa fa-times"> </i>
                                                 </span>
                                                <span class="predeterminado text-success @if($aguapre!=1) hidden-xs-up @endif">
                                                    <i class="fa fa-check"> </i>
                                                 </span>
                                                @if($aguapre == 1)
                                                    <span class="campopredeterminado"> {!! $textoactivo !!} </span>
                                                @else
                                                    <span class="campopredeterminado"> {!! $textoactivo !!} </span>
                                                @endif
                                                <input type="hidden" name="activo"
                                                       id="marcapredetermianda"
                                                       class="marcapredetermianda hidden hidden-xs-up"
                                                       value="{!! $aguapre !!}">
                                                <span
                                                        data-toggle="tooltip"
                                                        title="{{
                                            trans('facebook.programacion5')
                                            }}
                                                        {{--
                                                        {{
                                                        trans('facebook.programacion5')
                                                        }}
                                                        --}}
                                                                "
                                                >
                                        <i class="fa fa-info-circle"></i>
                                    </span>
                                            </div>


                                        </div>

                                        <div class="{!! $etiquetalabel !!} m-t-25 m-b-20">
                                        </div>
                                        <div class="{!! $tiquetainput !!} m-t-25 row ">
                                            <input type="submit" class="btn btn-warning m-b-20"
                                                   value="{!! trans('users.save') !!}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane active container" id="caballov">
                                {{--Venta--}}
                                <form class="col-12 form-control no-border m-t-10" action="{!! $ruta !!}" method="post">
                                    <div class="row">
                                        {!! csrf_field() !!}
                                        <div class="{!! $etiquetalabel !!} m-t-10">

                                        </div>
                                        <div class="{!! $tiquetainput !!} row m-t-10">
                                            {!! trans('facebook.programacion1',['type'=>trans('facebook.type.1')]) !!}
                                            {{--{!! trans('facebook.vendiariatext') !!}--}}


                                        </div>

                                        <div class="{!! $etiquetalabel !!} m-t-20">
                                            {!! trans('facebook.horsetopub') !!}
                                            <span data-toggle="tooltip"
                                                  title="{{ trans('facebook.programacion2') }}"
                                                  style="    padding: .5rem .75rem;">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                        </div>
                                        <div class="{!! $tiquetainput !!} row m-t-20">
                                            <div class="col-xs-6 col-md-3">
                                                <input type="number" name="cantidaddiariaventa"
                                                       class="number form-control"
                                                       min="0"
                                                       @if(\Auth::user()->isAdm())
                                                       max="{!! count(Horses::where('id',"!=",0)->where(['tosold'=>1,'sold'=>0])->get()->pluck('id')) !!}"
                                                       @else
                                                       max="{!! count(Horses::where('studs_id',\Auth::user()->Yeguada()->id)->where(['tosold'=>1,'sold'=>0])->get()->pluck('id')) !!}"
                                                       @endif
                                                       value="{!! $ctcub !!}"
                                                       onchange="addtimedaysell(this)">
                                            </div>


                                        </div>
                                        <div class="{!! $etiquetalabel !!} m-t-15">
                                            {!! trans('facebook.horaspub') !!}
                                            <span
                                                    data-toggle="tooltip"
                                                    title="{{
                                            trans('facebook.programacion3')
                                            }}"
                                            >
                                        <i class="fa fa-info-circle"></i>
                                    </span>
                                        </div>
                                        <div class="{!! $tiquetainput !!} row placed">
                                            @if(!empty($cubriciones))
                                                <?php $post = $cubriciones->getHoras(); ?>
                                                @foreach($post as $k=>$v)
                                                    <div class="col-12 col-md-6 col-lg-4 m-t-10">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1">
                                                                <i class="fa fa-clock-o"></i>
                                                            </span>
                                                            <input type="text" class=" timerssell timenow form-control"
                                                                   name="timehorsef[]"
                                                                   aria-describedby="basic-addon1"
                                                                   value="{!! Funciones::AjustarHoraTZ($v) !!}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="{!! $etiquetalabel !!} m-t-25 m-b-20">
                                        </div>
                                        <div class="{!! $tiquetainput !!} m-t-25 row ">
                                            <?php $aguapre = (!empty($ventas))?((!empty($ventas->status))?$ventas->status:0):0; ?>
                                            <div class="col-12 confac m-t-10  m-t-10 "
                                                 data-check="{!! $aguapre !!}">
                                                 <span class="nopredeterminado text-red @if($aguapre!=0) hidden-xs-up @endif">
                                                    <i class="fa fa-times"> </i>
                                                 </span>
                                                <span class="predeterminado text-success @if($aguapre!=1) hidden-xs-up @endif">
                                                    <i class="fa fa-check"> </i>
                                                </span>
                                                @if($aguapre == 1)
                                                    <span class="campopredeterminado"> {!! $textoactivo !!} </span>
                                                @else
                                                    <span class="campopredeterminado"> {!! $textoactivo !!} </span>
                                                @endif
                                                <input type="hidden" name="activo"
                                                       id="marcapredetermianda"

                                                       class="marcapredetermianda hidden hidden-xs-up"
                                                       value="{!! $aguapre !!}">
                                                <span data-toggle="tooltip"
                                                      title="{{ trans('facebook.programacion5') }}">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="{!! $etiquetalabel !!} m-t-25 m-b-20">
                                        </div>
                                        <div class="{!! $tiquetainput !!} m-t-25 row ">
                                            <input type="submit" class="btn btn-warning m-b-20"
                                                   value="{!! trans('users.save') !!}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane container" id="caballosc">
                                {{--Cubricion--}}
                                <form class="col-12 form-control no-border m-t-10" action="{!! $ruta !!}" method="post">
                                    <div class="row">
                                        {!! csrf_field() !!}
                                        <div class="{!! $etiquetalabel !!} m-t-10">

                                        </div>
                                        <div class="{!! $tiquetainput !!} row m-t-10">
                                            {!! trans('facebook.programacion1',['type'=>trans('facebook.type.2')]) !!}
                                            {{--{!! trans('facebook.cubdiariatext') !!}--}}


                                        </div>


                                        <div class="{!! $etiquetalabel !!} m-t-20">
                                            {!! trans('facebook.horsetopub') !!}
                                            <span data-toggle="tooltip"
                                                  title="{{ trans('facebook.programacion2') }}"
                                                  style="    padding: .5rem .75rem;">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                        </div>
                                        <div class="{!! $tiquetainput !!} row m-t-20">
                                            <div class="col-xs-6 col-md-3">
                                                <input type="number" name="cantidaddiariacub"
                                                       class="number form-control"
                                                       min="0"
                                                       @if(\Auth::user()->isAdm())
                                                       max="{!! count(Horses::where('id',"!=",0)->where(['tocubri'=>1])->get()->pluck('id')) !!}"
                                                       @else
                                                       max="{!! count(Horses::where('studs_id',\Auth::user()->Yeguada()->id)->where(['tocubri'=>1])->get()->pluck('id')) !!}"
                                                       @endif
                                                       onchange="addtimedaycub(this)"
                                                       value="{!! $ctvent !!}">
                                            </div>


                                            {{-- --}}
                                        </div>
                                        <div class="{!! $etiquetalabel !!} m-t-15">
                                            {!! trans('facebook.horaspub') !!}
                                            <span
                                                    data-toggle="tooltip"
                                                    title="{{
                                            trans('facebook.programacion3')
                                            }}"
                                            >
                                        <i class="fa fa-info-circle"></i>
                                    </span>
                                        </div>
                                        <div class="{!! $tiquetainput !!} row placef">
                                            @if(!empty($ventas))
                                                <?php $post = $ventas->getHoras(); ?>
                                                @foreach($post as $k=>$v)
                                                    <div class="col-12 col-md-6 col-lg-4 m-t-10">
                                                        <div class="input-group">
                                                             <span class="input-group-addon" id="basic-addon1">
                                                                 <i class="fa fa-clock-o"></i>
                                                             </span>
                                                            <input type="text" class=" timerscub timenow form-control"
                                                                   name="timehorsed[]"
                                                                   aria-describedby="basic-addon1"
                                                                   value="{!! Funciones::AjustarHoraTZ($v) !!}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="{!! $etiquetalabel !!} m-t-20">

                                        </div>
                                        <div class="{!! $tiquetainput !!} row m-t-10">
                                            <?php $aguapre = (!empty($cubriciones))?((!empty($cubriciones->status))?$cubriciones->status:0):0; ?>
                                            <div class="col-12 confac m-t-10  m-t-10 "
                                                 data-check="{!! $aguapre !!}">
                                                 <span class="nopredeterminado text-red @if($aguapre!=0) hidden-xs-up @endif">
                                                    <i class="fa fa-times"> </i>
                                                 </span>
                                                <span class="predeterminado text-success @if($aguapre!=1) hidden-xs-up @endif">
                                                    <i class="fa fa-check"> </i>
                                                 </span>
                                                @if($aguapre == 1)
                                                    <span class="campopredeterminado"> {!! $textoactivo !!} </span>
                                                @else
                                                    <span class="campopredeterminado"> {!! $textoactivo !!} </span>
                                                @endif
                                                <input type="hidden" name="activo"
                                                       id="marcapredetermianda"

                                                       class="marcapredetermianda hidden hidden-xs-up"
                                                       value="{!! $aguapre !!}">
                                                <span data-toggle="tooltip"
                                                      title="{{ trans('facebook.programacion5') }}">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="{!! $etiquetalabel !!} m-t-25 m-b-20">
                                        </div>
                                        <div class="{!! $tiquetainput !!} m-t-25 row ">
                                            <input type="submit" class="btn btn-warning m-b-20"
                                                   value="{!! trans('users.save') !!}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane container" id="videoy">
                                {{--Videos--}}
                                <form class="col-12 form-control no-border m-t-10" action="{!! $ruta !!}" method="post">
                                    <div class="row">
                                        {!! csrf_field() !!}
                                        <div class="{!! $etiquetalabel !!} m-t-10">

                                        </div>
                                        <div class="{!! $tiquetainput !!} row m-t-10">
                                            {!! trans('facebook.programacion1',['type'=>trans('facebook.type.3')]) !!}
                                            {{--{!! trans('facebook.vendiariatext') !!}--}}


                                        </div>

                                        <div class="{!! $etiquetalabel !!} m-t-15">
                                            {!! trans('facebook.horaspub') !!}
                                            <span
                                                    data-toggle="tooltip"
                                                    title="{{ trans('facebook.programacion3') }}">
                                                <i class="fa fa-info-circle"></i>
                                            </span>
                                        </div>

                                        <div class="{!! $tiquetainput !!} row placedvid">
                                            @if(!empty($videos))
                                                <?php $post = $videos->horas; ?>
                                                <div class="col-12 col-md-6 col-lg-4 m-t-20">
                                                    <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1">
                                                                <i class="fa fa-clock-o"></i>
                                                            </span>

                                                        <input type="text" class=" timerssell timenow form-control"
                                                               name="vtyeguada"
                                                               aria-describedby="basic-addon1"
                                                               value="{!! Funciones::AjustarHoraTZ($post) !!}">

                                                    </div>
                                                </div>

                                            @else
                                                <div class="col-12 col-md-6 col-lg-4 m-t-20">
                                                    <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1">
                                                                <i class="fa fa-clock-o"></i>
                                                            </span>
                                                        <input type="text" class=" timerssell timenow form-control"
                                                               name="vtyeguada"
                                                               aria-describedby="basic-addon1"
                                                        >
                                                    </div>
                                                </div>
                                            @endif
                                        </div>


                                        <div class="{!! $etiquetalabel !!} m-t-25 m-b-20">
                                        </div>
                                        <div class="{!! $tiquetainput !!} m-t-25 row ">
                                            <?php $aguapre = (!empty($videos))?((!empty($videos->status))?$videos->status:0):0; ?>
                                            <div class="col-12 confac m-t-10  m-t-10 "
                                                 data-check="{!! $aguapre !!}">
                                                 <span class="nopredeterminado text-red @if($aguapre!=0) hidden-xs-up @endif">
                                                    <i class="fa fa-times"> </i>
                                                 </span>
                                                <span class="predeterminado text-success @if($aguapre!=1) hidden-xs-up @endif">
                                                    <i class="fa fa-check"> </i>
                                                </span>
                                                @if($aguapre == 1)
                                                    <span class="campopredeterminado"> {!! $textoactivo !!} </span>
                                                @else
                                                    <span class="campopredeterminado"> {!! $textoactivo !!} </span>
                                                @endif
                                                <input type="hidden" name="vyeguada"
                                                       id="marcapredetermianda"

                                                       class="marcapredetermianda hidden hidden-xs-up"
                                                       value="{!! $aguapre !!}">
                                                <span data-toggle="tooltip"
                                                      title="{{ trans('facebook.programacion5') }}">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="{!! $etiquetalabel !!} m-t-25 m-b-20">
                                        </div>
                                        <div class="{!! $tiquetainput !!} m-t-25 row ">
                                            <input type="submit" class="btn btn-warning m-b-20"
                                                   value="{!! trans('users.save') !!}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane container hidden hidden-xs-up" id="fotoy">
                                {{--Fotos--}}
                                <form class="col-12 form-control no-border m-t-10" action="{!! $ruta !!}" method="post">
                                    <div class="row">
                                        {!! csrf_field() !!}
                                        <div class="{!! $etiquetalabel !!} m-t-10">

                                        </div>
                                        <div class="{!! $tiquetainput !!} row m-t-10">
                                            {!! trans('facebook.programacion1',['type'=>trans('facebook.type.4')]) !!}
                                            {{--{!! trans('facebook.vendiariatext') !!}--}}


                                        </div>

                                        <div class="{!! $etiquetalabel !!} m-t-15">
                                            {!! trans('facebook.horaspub') !!}
                                            <span
                                                    data-toggle="tooltip"
                                                    title="{{ trans('facebook.programacion3') }}">
                                                <i class="fa fa-info-circle"></i>
                                            </span>
                                        </div>
                                        <div class="{!! $tiquetainput !!} row placedvid">
                                            @if(!empty($fotos))
                                                <?php $post = $fotos->horas; ?>

                                                <div class="col-12 col-md-6 col-lg-4 m-t-10">
                                                    <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1">
                                                                <i class="fa fa-clock-o"></i>
                                                            </span>

                                                        <input type="text" class=" timerssell timenow form-control"
                                                               name="ftyeguada"
                                                               aria-describedby="basic-addon1"
                                                               value="{!! Funciones::AjustarHoraTZ($post) !!}">
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-12 col-md-6 col-lg-4 m-t-10">
                                                    <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1">
                                                                <i class="fa fa-clock-o"></i>
                                                            </span>
                                                        <input type="text" class=" timerssell timenow form-control"
                                                               name="ftyeguada"
                                                               aria-describedby="basic-addon1"
                                                        >
                                                    </div>
                                                </div>


                                            @endif
                                        </div>

                                        <div class="{!! $etiquetalabel !!} m-t-25 m-b-20">
                                        </div>
                                        <div class="{!! $tiquetainput !!} m-t-25 row ">
                                            <?php $aguapre = (!empty($fotos))?((!empty($fotos->status))?$fotos->status:0):0; ?>
                                            <div class="col-12 confac m-t-10  m-t-10 "
                                                 data-check="{!! $aguapre !!}">
                                                 <span class="nopredeterminado text-red @if($aguapre!=0) hidden-xs-up @endif">
                                                    <i class="fa fa-times"> </i>
                                                 </span>
                                                <span class="predeterminado text-success @if($aguapre!=1) hidden-xs-up @endif">
                                                    <i class="fa fa-check"> </i>
                                                </span>
                                                @if($aguapre == 1)
                                                    <span class="campopredeterminado"> {!! $textoactivo !!} </span>
                                                @else
                                                    <span class="campopredeterminado"> {!! $textoactivo !!} </span>
                                                @endif
                                                <input type="hidden" name="fyeguada"
                                                       id="marcapredetermianda"

                                                       class="marcapredetermianda hidden hidden-xs-up"
                                                       value="{!! $aguapre !!}">
                                                <span data-toggle="tooltip"
                                                      title="{{ trans('facebook.programacion5') }}">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="{!! $etiquetalabel !!} m-t-25 m-b-20">
                                        </div>
                                        <div class="{!! $tiquetainput !!} m-t-25 row ">
                                            <input type="submit" class="btn btn-warning m-b-20"
                                                   value="{!! trans('users.save') !!}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning closeup"
                        data-dismiss="modal">{!! trans('facebook.cerrar') !!}</button>
            </div>
        </div>
    </div>
</div>
<script>
    function addtimeday(el) {
        var val = $(el).val();
        cleartimeday();
        var max = $(el).attr('max');
        if (val <= max) {
            val = val;
        } else {
            val = max;
        }
        if (val < 0) {
            val = 0;
        }
        AddClock(val);
    }

    function addtimedaysell(el) {
        var val = $(el).val();
        cleartimedaysell();
        var max = $(el).attr('max');
        if (val <= max) {
            val = val;
        } else {
            val = max;
        }

        if (val < 0) {
            val = 0;
        }
        AddClockSell(val);
    }

    function addtimedaycub(el) {
        var val = $(el).val();


        cleartimedaycub();
        var max = $(el).attr('max');
        if (val <= max) {
            val = val;
        } else {
            val = max;
        }

        if (val < 0) {
            val = 0;
        }
        AddClockCub(val);
    }

    function cleartimedaycub() {
        $.each($('.timerscub'), function (k, v) {
            $(v).remove();
        });
    }

    function cleartimedaysell() {
        $.each($('.timerssell'), function (k, v) {
            $(v).remove();
        });
    }

    function cleartimeday() {
        $.each($('.timers'), function (k, v) {
            $(v).remove();
        });
    }

    function conftimer(el) {
        {{--
$(el).bootstrapMaterialDatePicker({
date: false,
format: 'HH:mm',
lang: '{!! App::getLocale() !!}',
 nowButton: true,
 clearButton: false,
 switchOnClick: true,
 cancelText: '{!! Funciones::ReemplazarApostrofe(trans('users.cancel')) !!}',
 okText: '{!! Funciones::ReemplazarApostrofe(trans('users.okclock')) !!}',
 clearText: '{!! Funciones::ReemplazarApostrofe(trans('users.clearText')) !!}',
 nowText: '{!! Funciones::ReemplazarApostrofe(trans('users.nowText')) !!}',
 });
 --}}
        $(el).clockpicker({
            align: 'left',
            autoclose: true,
            'default': 'now'
        });
    }

    function AddClock(ck) {
        $('.placec').html('');
        var tday = "tday", eso = null;
        for (i = 0; i < ck; i++) {
            eso = '<div class="timers col-12 col-md-6 col-lg-4 m-t-10">' +
                '<div class="input-group">' +
                '<span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>' +
                '<input type="text" class=" inp' + i + ' form-control" name="timehorsec[]" aria-describedby="basic-addon1">' +
                '</div></div>';
            $('.placec').append(eso);
            conftimer($('.inp' + i))
        }
    }

    function AddClockSell(ck) {
        $('.placed').html('');
        var tday = "tday", eso = null;
        for (i = 0; i < ck; i++) {
            eso = '<div class="timerssell col-12 col-md-6 col-lg-4 m-t-10">' +
                '<div class="input-group">' +
                '<span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>' +
                '<input type="text" class=" inp' + i + ' form-control" name="timehorsef[]" aria-describedby="basic-addon1">' +
                '</div></div>';
            $('.placed').append(eso);
            conftimer($('.inp' + i))
        }
    }

    function AddClockCub(ck) {
        $('.placef').html('');
        var tday = "tday", eso = null;
        for (i = 0; i < ck; i++) {
            eso = '<div class="timerscub col-12 col-md-6 col-lg-4 m-t-10">' +
                '<div class="input-group">' +
                '<span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>' +
                '<input type="text" class=" inp' + i + ' form-control" name="timehorsed[]" aria-describedby="basic-addon1">' +
                '</div></div>';
            $('.placef').append(eso);
            conftimer($('.inp' + i))
        }
    }

    $(document).on('ready', function () {
        $('.confac').on('click', function () {
            var s = $(this).attr('data-check');
            if (s == 0) {
                $(this).attr('data-check', 1);
                $(this).find('.nopredeterminado').addClass('hidden-xs-up');
                $(this).find('.predeterminado').removeClass('hidden-xs-up');
                $(this).find('.campopredeterminado').html('{!! Funciones::ReemplazarApostrofe($textoactivo) !!}');
                $(this).find('.marcapredetermianda').val(1);
            } else {
                $(this).attr('data-check', 0);
                $(this).find('.predeterminado').addClass('hidden-xs-up');
                $(this).find('.nopredeterminado').removeClass('hidden-xs-up');
                $(this).find('.campopredeterminado').html('{!! Funciones::ReemplazarApostrofe($textoactivo) !!}');
                $(this).find('.marcapredetermianda').val(0);
            }
        });
    })
</script>

