@php($a = (isset($a))?$a:null)
@php($modelo = (isset($modelo))?$modelo:null)
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


<div class="dropdown  dropup ctr">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-cog">
        </i>
    </a>
    <ul class="dropdown-menu" role="menu">

        {{-- EVeces --}}
        <li>
            <a href="javascript:void(0);" id="favorite_si_{!! $modelo->id !!}"
               data-toggle="popover" data-trigger="hover" data-placement="left"
               title="{!! trans('popover.horse.favorito.titulo') !!}"
               data-content="{!! trans('popover.horse.favorito.contenido',['name'=>$modelo->name]) !!}"
               onclick="setfav({!! $modelo->id !!},0)"
               class=" {!! $vasi !!} p-r-10 ">
                <i class="fa fa-star star star-small"> </i>
                {!! trans('botones.favorito') !!}
            </a>

            <a href="javascript:void(0);" id="favorite_no_{!! $modelo->id !!}"
               data-toggle="popover" data-trigger="hover" data-placement="left"
               title="{!! trans('popover.horse.favorito.titulo') !!}"
               data-content="{!! trans('popover.horse.favorito.contenido',['name'=>$modelo->name]) !!}"
               onclick="setfav({!! $modelo->id !!},1)"
               class=" {!!$vano !!} p-r-10 ">
                <i class="fa fa-star-o star star-small"> </i>
                {!! trans('botones.favorito') !!}
            </a>

        </li>
        {{--
        <li>
            <a href="javascript:void(0);"
               class="p-r-10 "
            >
                <i class="fa fa-star-o star-small star"> </i>
                Vendido
            </a>
</li>
        --}}
        <li>
            <a href="{!! route('horse.edit',['id'=>$modelo->id]) !!}" class="p-r-10"
               data-toggle="popover" data-trigger="hover" data-placement="left"
               title="{!! trans('popover.horse.editar.titulo') !!}"
               data-content="{!! trans('popover.horse.editar.contenido',['name'=>$modelo->name]) !!}"
            >
                {{--<i class="fa fa-eye text-success">
</i>--}}
                <i class="fa fa-pencil star-small star">
                </i>
                {!! trans('botones.editar') !!}
            </a>
        </li>
        <li>
            <a href="javascript:void(0);"
               data-toggle="popover" data-trigger="hover" data-placement="left"
               title="{!! trans('popover.horse.borrar.titulo') !!}"
               data-content="{!! trans('popover.horse.borrar.contenido',['name'=>$modelo->name]) !!}"
               onclick="deleteit({!! $modelo->id !!})"
               class="p-r-10"
            >
                <i class="fa fa-trash star-small star trash"> </i>
                {!! trans('botones.borrar') !!}
            </a>
        </li>
        <div class="dropdown-divider">
        </div>
        {{-- Enviar por email--}}
        {{--
        <li>
            <a href="javascript:void(0);"
               class="p-r-10"
            >
                <i class="fa fa-pencil star-small star">
</i>
                Enviar por email
            </a>
</li>
        --}}
        <li>
            <a href="javascript:void(0);"
               data-toggle="popover" data-trigger="hover" data-placement="left"
               title="{!! trans('popover.horse.exportar.titulo') !!}"
               data-content="{!! trans('popover.horse.exportar.contenido',['name'=>$modelo->name]) !!}"
               onclick=" exportar({!! $modelo->id !!})"
               class="p-r-10 "
            >
                <i class="fa fa-share star-small star"> </i>
                {!! trans('botones.exportar') !!}
            </a>
        </li>

        <li>
            <a href="{!! route('MyHorseDetailed',['stud'=>\Auth::user()->Yeguada()->slug,'horse'=>$modelo->slug]) !!}"
               target="_blank" class="p-r-10">

                <i class="fa fa-eye star-small star">
                </i>
                {!! trans('botones.visto',['n'=>$modelo->getVisitantes()]) !!}

            </a>
        </li>
        @if($modelo->sold != 1 and $modelo->tosold==1)
            <li>
                <a href="#!" onclick="Vendido({!! $modelo->id !!})"
                   class="p-r-10">
                    <i class="fa fa-eye star-small star">
                    </i>
                    Vendido

                </a>
            </li>

        @endif

        {{--


        <a href="{!! route('MyHorseDetailed',['stud'=>\Auth::user()->Yeguada()->slug,'horse'=>$horse->id]) !!}" target="_blank">
         Link pa ver</a>
        --}}


    </ul>

</div>






