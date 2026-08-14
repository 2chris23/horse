@php
    $user = \Auth::user();
    $adm = $user->isAdm();

    if($adm == true){
    $ruta = route('ProgramarPublicacionAdmin');
    $h = Horses::where('id',"!=",0)->get()->pluck('id');
    }else{
    $ruta = route('ProgramarPublicacion');
    $h = Horses::where('studs_id',$user->Yeguada()->id)->get()->pluck('id');
    }
//$h = Horses::where(['studs_id'=>\Auth::user()->Yeguada()->id, 'tocubri'=>1 ])->get()->pluck('id')
@endphp

{{--Postear caballos ---}}
<div class="modal m-t-50" id="posthorses" role="dialog" aria-labelledby="modalLabelbouncedown"
     style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white" id="modalLabelbouncedown">
                    {!! trans('facebook.p_yt_t') !!}
                </h4>
            </div>
            <div class="modal-body">
                <form class="col-12 row" id="sombrio4" action="{!!$ruta !!}"
                      method="post">
                    {!! csrf_field() !!}

                    <div class="{!! $etiquetalabel !!} m-t-25">
                        {!! trans('facebook.cantidadcaballo') !!}

                    </div>
                    <div class="{!! $tiquetainput !!} row m-t-25">

                        <select class=" form-control" data-style="btn-primary" id="canhorses" name="canhorses"
                                required
                        >
                            @for($i = 0; $i<count($h);$i++)

                                <option
                                        data-tokens="{!! ($i+1) !!}"
                                        value="{!! ($i+1) !!}"
                                >{!! ($i+1) !!}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="{!! $etiquetalabel !!} m-t-25">
                        {{--{!! trans('masivo.allh') !!}--}}
                        {!! trans('facebook.settimestart') !!}
                    </div>
                    <div class="{!! $tiquetainput !!} row m-t-25">
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control dp2" data-date-format="yyyy/mm/dd" name="dp2start"
                                   required>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control tp2" name="tp2start" required>
                        </div>
                    </div>
                    <div class="{!! $etiquetalabel !!} m-t-25">
                        {{--{!! trans('masivo.allh') !!}--}}
                        {!! trans('facebook.settimeend') !!}
                    </div>
                    <div class="{!! $tiquetainput !!} row m-t-25">
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control dp2" data-date-format="yyyy/mm/dd" name="dp2end"
                                   required>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control tp2" name="tp2end" required>
                        </div>
                    </div>
                    {{--
                    <div class="{!! $etiquetalabel !!} m-t-25">
                        {!! trans('facebook.setsms') !!}
                    </div>
                    <div class="{!! $tiquetainput !!} m-t-25 row ">
                     <textarea name="mensaje" rows="6"
       class="form-control sms"
       maxlength="2000"
       required
       placeholder="{!! trans('facebook.helpsms') !!}"></textarea>
                    </div>
                    --}}


                    {{--
                    <div class="col-12">
                    https://www.facebook.com/sharer.php?u=http://desarrollo.com/la-esmeralda/detalle/pereza
                    <iframe src="" frameborder="0"></iframe>
                    </div>
                    --}}
                    <input type="submit" class="btn btn-warning ptye2 hidden-xs-up"
                           value="{!! trans('facebook.publicar') !!}">
                    <div class="ident hidden-xs-up"></div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#sombrio4" onclick="$('.ptye2').click()" class="bla btn btn-warning ">
                    {!! trans('facebook.publicar') !!}
                </a>
                <button class="btn btn-warning closeup"
                        data-dismiss="modal">{!! trans('facebook.cerrar') !!}</button>
            </div>
        </div>
    </div>
</div>
