@php($a = (isset($a))?$a:null)
@php($modelo = (isset($modelo))?$modelo:null)
@if(!empty($modelo))
    @php

        $favo = $modelo->favorito;
        if($favo == 1){
        $vasi = '';
        $vano='hidden-xl-down';
        }else{
        $vano = '';
        $vasi='hidden-xl-down';
        }
    @endphp

    <div class="dropdown dropup  ctr">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-cog"></i>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a href="javascript:void(0);" id="favorite_si_{!! $modelo->id !!}"
                   data-toggle="popover" data-trigger="hover" data-placement="left"
                   title="{!! trans('popover.horse.favorito.titulo') !!}"
                   data-content="{!! trans('popover.favorito.contenido',['name'=>$modelo->nombre]) !!}"

                   onclick="Favorito({!! $modelo->id !!},0)"
                   class=" {!! $vasi !!} p-r-10 " fav>
                    <i class="fa fa-star star star-small"> </i>
                    {!! trans('botones.favorito') !!}
                </a>
                <a href="javascript:void(0);" id="favorite_no_{!! $modelo->id !!}"
                   data-toggle="popover" data-trigger="hover" data-placement="left"
                   title="{!! trans('popover.horse.favorito.titulo') !!}"
                   data-content="{!! trans('popover.favorito.contenido',['name'=>$modelo->nombre]) !!}"
                   onclick="Favorito({!! $modelo->id !!},1)"
                   class=" {!!$vano !!} p-r-10 ">
                    <i class="fa fa-star-o star star-small"> </i>
                    {!! trans('botones.favorito') !!}
                </a>


            </li>
            <li>

                <a href="{!! route('StudClientes.edit',['id'=>$modelo->id]) !!}" class="p-r-10"
                   data-toggle="popover" data-trigger="hover" data-placement="left"
                   title="{!! trans('popover.horse.editar.titulo') !!}"
                   data-content="{!! trans('popover.horse.editar.contenido',['name'=>$modelo->nombre]) !!}"
                >

                    {{--<i class="fa fa-eye text-success"></i>--}}
                    <i class="fa fa-pencil star-small star"></i>
                    {!! trans('botones.editar') !!}
                </a>


            </li>
            <li>
                <a href="javascript:void(0);"
                   data-toggle="popover" data-trigger="hover" data-placement="left"
                   title="{!! trans('popover.horse.borrar.titulo') !!}"
                   data-content="{!! trans('popover.horse.borrar.contenido',['name'=>$modelo->nombre]) !!}"
                   onclick="BorrarContacto({!! $modelo->id !!})"
                   class="p-r-10"
                >
                    <i class="fa fa-trash star star-small trash"> </i>
                    {!! trans('botones.borrar') !!}
                </a>


            </li>

        </ul>
        {{--<i class="fa fa-arrows-alt"></i>--}}
    </div>

@endif
