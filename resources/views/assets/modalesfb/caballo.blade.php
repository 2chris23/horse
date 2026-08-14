@php
    $user = \Auth::user();
    $adm = $user->isAdm();

    if($adm == true){
    $ruta = route('ProgramarPublicacionAdmin');
    $horses = Horses::where('id',"!=",0)->orderby('name','asc')->get();
    }else{
    $ruta = route('ProgramarPublicacion');
    $horses = Horses::where('studs_id',$user->Yeguada()->id)->orderby('name','asc')->get();
    }
//$h = Horses::where(['studs_id'=>\Auth::user()->Yeguada()->id, 'tocubri'=>1 ])->get()->pluck('id')
@endphp

{{--Postear Puiblicar caballo--}}
{{--}}
<div class="modal m-t-50" id="publicar" role="dialog" aria-labelledby="modalLabelbouncedown" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white" id="modalLabelbouncedown">
                    {!! trans('facebook.p_yt_h') !!}
                </h4>
            </div>
            <div class="modal-body">
                <form class="col-12 row" id="sombrio" action="{!! $ruta !!}"
                      method="post">

                    {!! csrf_field() !!}
                    <input type="hidden" name="id" class="hidden-xs-up publicar_id">

                    <div class="{!! $etiquetalabel !!} m-t-25">
                        {{--{!! trans('masivo.allh') !!}-- }}
                        {!! trans('facebook.p_yt_hs') !!}
                    </div>
                    <div class="{!! $tiquetainput !!} row m-t-25">
                        <select class=" form-control" data-style="btn-primary" id="horse" name="horse"
                                onchange="CambiarCaballo()"
                                required
                        >
                            <option
                                    {{--@if($seleccionado == $v['id']) selected @endif-- }}
                            >{!! trans('users.chooseone')!!}</option>
                            @for($i = 0; $i<count($horses);$i++)
                                <?php $h = $horses[$i]; ?>
                                <?php $slug = $h->slug; ?>
                                <?php $name = $h->getName(); ?>
                                <option
                                        data-tokens="{!! $slug !!}"
                                        value="{!! $slug !!}"
                                        {{--@if($seleccionado == $v['id']) selected @endif-- }}
                                >{!! $name !!}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="{!! $etiquetalabel !!} m-t-25">
                        {{--{!! trans('masivo.allh') !!}-- }}
                        {!! trans('facebook.settime') !!}
                    </div>
                    <div class="{!! $tiquetainput !!} row m-t-25">
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control dp2" data-date-format="yyyy/mm/dd" name="dp2"
                                   required>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control tp2" name="tp2" required>
                        </div>
                    </div>
                    <div class="{!! $etiquetalabel !!} m-t-25">
                        {{--{!! trans('masivo.allh') !!}-- }}
                        {!! trans('facebook.setsms') !!}
                    </div>
                    <div class="{!! $tiquetainput !!} m-t-25 row ">
 <textarea name="mensaje" rows="6"
           maxlength="2000"
           class="form-control sms"
           placeholder="{!! trans('facebook.helpsms') !!}"></textarea>
                    </div>
                    <div class="col-12  row hwsh"></div>
                    <input type="submit" class="btn btn-warning ptfly hidden-xs-up"
                           value="{!! trans('facebook.publicar') !!}">
                    <div class="ident hidden-xs-up"></div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#sombrio" onclick="$('.ptfly').click()" class=" bla btn btn-warning">
                    {!! trans('facebook.publicar') !!}
                </a>
                <a href="#sombrio" onclick="limpiarModalCaballo()" class="btn btn-warning ">
                    {!! trans('facebook.cerrar') !!}
                </a>
                <button class="btn btn-warning hidden-xs-up closeup" id="cerrarpublicar"
                        data-dismiss="modal">{!! trans('facebook.cerrar') !!}</button>
            </div>
        </div>
    </div>
</div>
--}}


<div class="modal m-t-50" id="publicar" role="dialog" aria-labelledby="modalLabelbouncedown" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white" id="modalLabelbouncedown">
                    {!! trans('facebook.pubs') !!}
                </h4>
            </div>

            <div class="modal-body col-12 ">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header bg-white">
                            <ul class="nav nav-tabs card-header-tabs float-left">
                                <li class="nav-item">
                                    <a class="nav-link active" id='caballosfab' data-toggle="tab"
                                       href="#caballosfa">{!! trans('facebook.horses') !!}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="caballolib" data-toggle="tab"
                                       href="#caballoli">{!! trans('facebook.links') !!}</a>
                                </li>{{--
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#caballosc">Cubriciones</a>
                                </li>--}}
                            </ul>
                        </div>
                        <div class="tab-content card-body">
                            <div class="tab-pane active container" id="caballosfa">
                                {{--Caballos--}}
                                <form class="col-12 row" id="sombrio" action="{!! $ruta !!}"
                                      method="post">

                                    {!! csrf_field() !!}
                                    <input type="hidden" name="id" class="hidden-xs-up publicar_id bor">

                                    <div class="{!! $etiquetalabel !!} m-t-25">
                                        {{--{!! trans('masivo.allh') !!}--}}
                                        {!! trans('facebook.p_yt_hs') !!}
                                    </div>
                                    <div class="{!! $tiquetainput !!} row m-t-25">
                                        <select class=" form-control" data-style="btn-primary" id="horse" name="horse"
                                                onchange="CambiarCaballo()"
                                                required
                                        >
                                            <option
                                                    {{--@if($seleccionado == $v['id']) selected @endif--}}
                                            >{!! trans('users.chooseone')!!}</option>
                                            @for($i = 0; $i<count($horses);$i++)
                                                <?php $h = $horses[$i]; ?>
                                                <?php $slug = $h->slug; ?>
                                                <?php $name = $h->getName(); ?>
                                                <option
                                                        data-tokens="{!! $slug !!}"
                                                        value="{!! $slug !!}"
                                                        {{--@if($seleccionado == $v['id']) selected @endif--}}
                                                >{!! $name !!}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="{!! $etiquetalabel !!} m-t-25 hdt">
                                        {{--{!! trans('masivo.allh') !!}--}}
                                        {!! trans('facebook.settime') !!}
                                    </div>
                                    <div class="{!! $tiquetainput !!} row m-t-25 hdt">
                                        <div class="col-12 col-md-6">
                                            <input type="text" class="form-control dp2" data-date-format="yyyy/mm/dd"
                                                   name="dp2"
                                                   required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" class="form-control tp2" name="tp2" required>
                                        </div>
                                    </div>
                                    <div class="{!! $etiquetalabel !!} m-t-25">
                                        {!! trans('facebook.setsms') !!}

                                    </div>
                                    <div class="{!! $tiquetainput !!} m-t-25 row ">
                                        <textarea name="mensaje" rows="6" maxlength="2000" class="form-control sms bor"
                                                  placeholder="{!! trans('facebook.helpsms') !!}"></textarea>
                                    </div>
                                    <div class="col-12  row hwsh"></div>

                                    <div class="{!! $etiquetalabel !!} m-t-25 m-b-20">
                                    </div>
                                    <div class="{!! $tiquetainput !!} m-t-25 row ">
                                        <input type="submit" class="btn btn-warning ptfly bla m-b-20"
                                               value="{!! trans('facebook.publicar') !!}">
                                    </div>
                                    <div class="ident hidden-xs-up"></div>
                                </form>
                            </div>
                            <div class="tab-pane container" id="caballoli">
                                {{--Venta--}}
                                <form class="col-12 row" id="linkso" action="{!! $ruta !!}"
                                      method="post">
                                    {!! csrf_field() !!}
                                    <div class="{!! $etiquetalabel !!} m-t-25">
                                        {{--{!! trans('masivo.allh') !!}--}}
                                        {!! trans('facebook.p_yt_l') !!}
                                    </div>
                                    <div class="{!! $tiquetainput !!} row m-t-25">
                                        <input type="url" class="form-control bor" name="yt" id="yt"
                                               placeholder="{!! trans('facebook.p_yt_lp') !!}" required>
                                    </div>
                                    <div class="{!! $etiquetalabel !!} m-t-25  hdt">
                                        {{--{!! trans('masivo.allh') !!}--}}
                                        {!! trans('facebook.settime') !!}
                                    </div>
                                    <div class="{!! $tiquetainput !!} row m-t-25  hdt">
                                        <div class="col-12 col-md-6">
                                            <input type="text" class="form-control dp2" data-date-format="yyyy/mm/dd"
                                                   name="dp2"
                                                   required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" class="form-control tp2" name="tp2" required>
                                        </div>

                                    </div>
                                    <div class="{!! $etiquetalabel !!} m-t-25">
                                        {{--{!! trans('masivo.allh') !!}--}}
                                        {!! trans('facebook.setsms') !!}
                                    </div>
                                    <div class="{!! $tiquetainput !!} m-t-25 row ">
 <textarea name="mensaje" rows="6"
           maxlength="2000"
           class="form-control sms bor"

           placeholder="{!! trans('facebook.helpsms') !!}"></textarea>
                                    </div>
                                    {{--
                                    <div class="{!! $etiquetalabel !!} m-t-10">
                                    </div>
                                    <div class="{!! $tiquetainput !!} m-t-10 row ">
                                        @include('assets.partial.FbIcons')
                                    </div>
                                    --}}
                                    {{--
                                    <div class="col-12">
                                    https://www.facebook.com/sharer.php?u=http://desarrollo.com/la-esmeralda/detalle/pereza
                                    <iframe src="" frameborder="0"></iframe>
                                    </div>
                                    --}}
                                    <div class="{!! $etiquetalabel !!} m-t-25 m-b-20">
                                    </div>
                                    <div class="{!! $tiquetainput !!} m-t-25 row ">
                                        <input type="submit" class="btn btn-warning ptye  bla m-b-20"
                                               value="{!! trans('facebook.publicar') !!}">
                                    </div>
                                    <div class="ident hidden-xs-up"></div>

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


<div class="modal fade" id="evt_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"> </i> Edit
                    Event
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="input-group"><input type="text" id="event_title" class="form-control"
                                                placeholder="Event">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default text-white dropdown-toggle color-chooser-btn"
                                data-toggle="dropdown"> Default <span class="caret"> </span></button>
                        <div class="dropdown-menu float-right cal_modal_type color-chooser"><a
                                    class="color_primary text-center dropdown-item text-white"
                                    href="#"> Primary </a> <a
                                    class="color_success text-center dropdown-item text-white"
                                    href="#"> Success </a> <a
                                    class="color_info text-center dropdown-item text-white"
                                    href="#"> Info </a> <a
                                    class="color_warning text-center dropdown-item text-white"
                                    href="#"> warning </a> <a
                                    class="color_danger text-center dropdown-item text-white"
                                    href="#"> Danger </a></div>
                    </div> <!--  /btn-group  --> </div> <!--  /input-group  --> </div>
            <div class="modal-footer">
                <button type="button" class="bla btn btn-danger float-right" data-dismiss="modal"> Close <i
                            class="fa fa-times"> </i></button>
                <button type="button" class="btn btn-success pull-left text_save" data-dismiss="modal"> Update
                </button>
            </div>
        </div>
    </div>
</div>
