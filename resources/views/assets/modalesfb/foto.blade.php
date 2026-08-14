@php
    $user = \Auth::user();
    $adm = $user->isAdm();

    if($adm == true){
    $ruta = route('ProgramarPublicacionAdmin');
    }else{
    $ruta = route('ProgramarPublicacion');
    }
//$h = Horses::where(['studs_id'=>\Auth::user()->Yeguada()->id, 'tocubri'=>1 ])->get()->pluck('id')
@endphp
{{--Postear foto--}}
<div class="modal m-t-50" id="adefoto" role="dialog" aria-labelledby="modalLabelbouncedown" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white" id="modalLabelbouncedown">
                    {!! trans('facebook.imgt') !!}
                </h4>
            </div>
            <div class="modal-body">
                <form class="col-12 row" id="sombrio2" action="{!! $ruta !!}"
                      enctype="multipart/form-data"
                      method="post">
                    {!! csrf_field() !!}

                    <div class="{!! $etiquetalabel !!} m-t-25">
                        {{--{!! trans('masivo.allh') !!}--}}
                        {!! trans('facebook.p_yt_imgs') !!}
                    </div>
                    <div class="{!! $tiquetainput !!} row m-t-25">
                        @include('backend.common.dropify',['nombre'=>"fb",'tipo'=>'fb'])
                    </div>
                    <div class="{!! $etiquetalabel !!} m-t-25">
                        {{--{!! trans('masivo.allh') !!}--}}
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
                        {{--{!! trans('masivo.allh') !!}--}}
                        {!! trans('facebook.setsms') !!}
                    </div>
                    <div class="{!! $tiquetainput !!} m-t-25 row ">
 <textarea name="mensaje" rows="6"
           class="form-control sms"
           maxlength="2000"
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
                    <input type="submit" class="btn btn-warning ptfl hidden-xs-up"
                           value="{!! trans('facebook.publicar') !!}">
                    <div class="ident hidden-xs-up"></div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#sombrio2" onclick="$('.ptfl').click()" class="bla btn btn-warning">
                    {!! trans('facebook.publicar') !!}
                </a>
                <button class="btn btn-warning closeup"
                        data-dismiss="modal">{!! trans('facebook.cerrar') !!}</button>
            </div>
        </div>
    </div>
</div>
