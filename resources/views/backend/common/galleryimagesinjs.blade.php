@php
    $titulo = (isset($titulo ))?$titulo:null;
    $embed = (isset($embed ))?$embed:null;
    $imagen = (isset($imagen ))?$imagen:null;
    $id = (isset($id ))?$id:null;
$video = (isset($video))?'video':'photo';
$Mensaje = (isset($Mensaje))?$Mensaje:null;
$adminpanel = (isset($adminpanel))?$adminpanel:null;
$specialvideo = (isset($specialvideo))?$specialvideo:null;
$size = (isset($size))?$size:null;

@endphp
<div class="dropify-wrapper has-preview sortable-item " id="maxy_{!! $id !!}" data-id="{!! $id !!}"
     @if(!empty($adminpanel))style=" height: 100px; width: 100px; border:none; background: transparent;;"
     @endif @if(!empty($specialvideo))style=" height: 100px;width: 100px;"@endif > @if(empty($adminpanel) and empty($specialvideo))
        <button type="button" class="dropify-clear"
                onclick="erasephoto(this,{{$id}},'{!! $video !!}')">{!! trans('users.delete') !!}</button> @endif @if(!empty($Mensaje))
        <button type="button" class="dropify-clear Titulos" style="top: 150px;"
                onclick="aviso({{$id}})">{!! trans('users.change') !!} {!! trans('users.tittles') !!} </button> @endif
    <div class="dropify-preview" @if(empty($adminpanel) and empty($specialvideo)) style="display: block;"
         @endif @if(!empty($adminpanel))style=" display: block; top: -6px; left: -9px; background: transparent;"
         @endif @if(!empty($specialvideo))style=" display: block; top: -6px; left: -9px;"@endif ><span
                class="dropify-render"> <a style="display: none;"
                                           class="fancybox-buttons zoom thumb_zoom img_{!! $id !!} fancybox.iframe"
                                           href="{{$embed}}" style="display: none;">  </a> <img lsrc="{{$imagen}}"
                                                                                                class="fancybox-buttons  hidden zoom thumb_zoom img_zoom_{!! $id !!}">  </span>
        <div class="dropify-infos infos_{!! $id !!}" onclick="$('.img_{!! $id !!}').click()">
            <div class="dropify-infos-inner"></div>
        </div>
    </div>
</div>