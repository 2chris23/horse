@php($a = (isset($a))?$a:null)
@php($modelo = (isset($modelo))?$modelo:null)
<a href="{!! route('horse.edit',['id'=>$modelo->id]) !!}" class="p-r-10"
   data-toggle="popover" data-trigger="hover" data-placement="left"  title="{!! trans('popover.horse.editar.titulo') !!}" data-content="{!! trans('popover.horse.editar.contenido',['name'=>$modelo->name]) !!}"
>
    {{--<i class="fa fa-eye text-success"></i>--}}
    <i class="fa fa-pencil text-success"></i>
</a>
@php
    $favo = $modelo->favorite;
    if($favo == 1){
    $vasi = '';
    $vano='hidden-xl-down';
    }else{
    $vano = '';
    $vasi='hidden-xl-down';
    }
@endphp

<a href="javascript:void(0);" id="favorite_si_{!! $modelo->id !!}"
   data-toggle="popover" data-trigger="hover" data-placement="left" title="{!! trans('popover.horse.favorito.titulo') !!}" data-content="{!! trans('popover.horse.favorito.contenido',['name'=>$modelo->name]) !!}"
   onclick="setfav({!! $modelo->id !!},0)"
   class=" {!! $vasi !!} p-r-10 ">
    <i class="fa fa-star star star-small"> </i>
</a>
<a href="javascript:void(0);" id="favorite_no_{!! $modelo->id !!}"
   data-toggle="popover" data-trigger="hover"data-placement="left" title="{!! trans('popover.horse.favorito.titulo') !!}" data-content="{!! trans('popover.horse.favorito.contenido',['name'=>$modelo->name]) !!}"
   onclick="setfav({!! $modelo->id !!},1)"
   class=" {!!$vano !!} p-r-10 ">
    <i class="fa fa-star-o star star-small"> </i>
</a>
<a href="javascript:void(0);"
   data-toggle="popover" data-trigger="hover" data-placement="left"title="{!! trans('popover.horse.borrar.titulo') !!}" data-content="{!! trans('popover.horse.borrar.contenido',['name'=>$modelo->name]) !!}"
   onclick="deleteit({!! $modelo->id !!})"
   class="p-r-10"
>
    <i class="fa fa-trash text-danger trash"> </i>
</a>
<a href="javascript:void(0);"
   data-toggle="popover" data-trigger="hover" data-placement="left" title="{!! trans('popover.horse.exportar.titulo') !!}" data-content="{!! trans('popover.horse.exportar.contenido',['name'=>$modelo->name]) !!}"
   onclick=" exportar({!! $modelo->id !!})"
   class="p-r-10 "
>
    <i class="fa fa-share"> </i>
</a>


