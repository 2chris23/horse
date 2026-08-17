@extends('backend.layouts.base')
@section('title', trans('Titulos.HorsesStud') )


@section('topcss')
    <style>
.previsual{
    min-height: 300px;
}
        .text-black {
            color: black;
        }

        .font-14 {
            font-size: 14px;
        }

        m-b-0 {
            margin-bottom: 0px;
        }

        .ctr > ul.dropdown-menu {
            left: -300%;
        }

        .font-11 {
            font-size: 14px;
        }

        style
        .p-r-10 {
            padding-right: 10px;
        }

        .trash {
        / / color: red;
        }

        .favorite {
            /*background-color: #ffe1c2 !important;*/
        }

        .spe {
            -ms-transform: rotate(180deg); /* IE 9 */
            -webkit-transform: rotate(180deg); /* Chrome, Safari, Opera */
            transform: rotate(180deg);
        }

        .seleccionado {
            background-color: #ff9933 !important;
            color: white;
            -webkit-transition: all 0.5s ease-out;
            -moz-transition: all 0.5s ease-out;
            -ms-transition: all 0.5s ease-out;
            -o-transition: all 0.5s ease-out;
            transition: all 0.5s ease-out;
        }

        .nm {

            -webkit-transition: all 0.5s ease-out;
            -moz-transition: all 0.5s ease-out;
            -ms-transition: all 0.5s ease-out;
            -o-transition: all 0.5s ease-out;
            transition: all 0.5s ease-out;
        }
    </style>
@endsection
@section('content')
    {!! \Session::forget('horse') !!}

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                <div class="row">
                    <div class="col-9">
                        {!! trans('horse.horselist') !!}

                        @if(count($horses) !=0)
                            <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! count($horses )!!}
                        </span>
                    </span>
                        @endif

                    </div>
                    <div class="col-3 pull-right">
                        <a href="{!! route('horse.create') !!}"
                           class="save btn btn-warning glow_button pull-right">{!! trans('horse.newhorse') !!}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        {{--
                        <div class="col-12 row">
                            <div class="col-3 row">
                                <div class="col-4">
                                    <label for="sex">Sexo</label>
                                </div>
                                <div class="col-8">
                                    <select name="sex" id="sex" class="form-control">
                                        <option value="0">{!! trans('portal.allra') !!}</option>
                                        @foreach($sex as $k=>$v)
                                            <option value="{!! $v->sex !!}">{!! trans('horse.sex.'.$v->sex) !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3 row">
                                <div class="col-4">

                                    <label for="raza">Raza</label></div>
                                <div class="col-8">
                                    <select name="raza" id="raza" class="form-control">
                                        <option value="0">{!! trans('portal.allra') !!}</option>
                                        @foreach($raza as $k=>$v)
                                            <option value="{!! $v->raza !!}">{!! trans('horse.raza.'.$v->raza )!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3 row">
                                <div class="col-4">
                                    <label for="color">Color</label></div>
                                <div class="col-8">
                                    <select name="color" id="color" class="form-control">
                                        <option value="0">{!! trans('portal.allra') !!}</option>
                                        @foreach($color as $k=>$v)
                                            <option value="{!! $v->color !!}">{!! trans('horse.color.'.$v->raza )!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        --}}


                        {{--
                        <div class="col-12 col-md-6 offset-md-3 text-center">
                            @foreach(trans('horse.raza')  as $k =>$v)
                                @php($ht = count(\Auth::user()->Horses()->where('raza',$k)->get()))
                                @if($ht!=0)
                                    <span class="badge badge-warning">
                                <b>{!! $ht !!}</b>
                                        {!! $v !!}
                            </span>
                                @endif
                            @endforeach

                        </div>
--}}



                        {{--
                                                <div class="col-12  text-left m-t-20">
                                                    @foreach(trans('horse.sexs')  as $k =>$v)
                                                        @php($ht = count(\Auth::user()->Horses()->where('sex',$k)->get()))
                                                        @if($ht!=0)
                                                            <span class="badge badge-warning font-11 sexy" data-val="{!! $k !!}">
                                                        <b>{!! $ht !!}</b>
                                                                {!! $v !!}
                                                    </span>
                                                        @endif
                                                    @endforeach
                                                    @php($ts =  count(\Auth::user()->Horses()->where('tocubri',1)->get()))

                                                    @if($ts!=0)
                                                        <span class="badge badge-warning font-11">
                                                        <b>{!! $ts !!}</b>
                                                            {!! trans('horse.text.cubricions') !!}
                                                    </span>
                                                    @endif
                                                </div>
                                                --}}
                        <form class=" col-12 table-responsive noSwipe m-t-25 row"
                              id="enviado" action="{!! route('exportar.indexpost') !!}" method="post">
                            <div class="row">
                                {!! csrf_field() !!}
                                <div class="col-lg-4 col-md-6 col-12  row">
                                    <div class="col-lg col-12">
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <span class="card-title">
                                                    Filtros
                                                </span>

                                            </div>
                                            <div class="card-block  col-12 row ">


                                                <div class="col-lg col-12 m-t-35  card">
                                                    <div class="card-header bg-white">
                                                <span class="card-title">
                                                    Razas
                                                </span>
                                                        <span class="float-right">
                                                        <i class="fa fa-chevron-down"></i>
                                                </span>
                                                    </div>


                                                    <div class="card-block m-t-20 col-12 " style="display: none;">
                                                        <div class="p-l-10 row">
                                                            <div class="col-12 row">
                                                                @foreach($raza as $k=>$v)
                                                                    @if($k!=0)
                                                                        <div class="col-md-12 col-12 font-14 m-b-0">
                                                                            <div class="checkbox">
                                                                                <label class="text-success">
                                                                                    <input type="checkbox" name="raza[]"
                                                                                           value="{!! $k !!}"
                                                                                           class="razasc">
                                                                                    <span class="cr"><i
                                                                                                class="cr-icon fa fa-check"></i></span>
                                                                                    <span class="text-black">
                                                            {!! trans('horse.raza.'.$v->raza )!!}
                                                        </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach

                                                            </div>
                                                            <div class="col-1"></div>
                                                            <div class=" col-3 text-center">
                                                                <a href="#!" class="btn btn-warning razas">Todas las
                                                                    razas </a>
                                                            </div>
                                                            <div class="col-12 m-t-20"></div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg col-12 m-t-35 card">
                                                    <div class="card-header bg-white">
                                    <span class="card-title">
                                        Capas
                                    </span>
                                                        <span class="float-right"> <i
                                                                    class="fa fa-chevron-down"></i> </span>
                                                    </div>

                                                    <div class="card-block m-t-20 col-12 " style="display: none;">
                                                        <div class="p-l-10 row">
                                                            <div class="col-12 row">
                                                                @foreach($color as $k=>$v)
                                                                    @if($k!=0)
                                                                        <div class="col-md-12 col-12 font-14 m-b-0">
                                                                            <div class="checkbox">
                                                                                <label class="text-success">
                                                                                    <input type="checkbox"
                                                                                           name="color[]"
                                                                                           value="{!! $k !!}"
                                                                                           class="capas">
                                                                                    <span class="cr"><i
                                                                                                class="cr-icon fa fa-check"></i></span>
                                                                                    <span class="text-black">
                                                            {!! trans('horse.color.'.$v->color )!!}
                                                        </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>


                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="col-1"></div>
                                                            <div class=" col-3 text-center">
                                                                <a href="#!" class="btn btn-warning capa">Todas las
                                                                    capas </a>
                                                            </div>
                                                            <div class="col-12 m-t-20"></div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="col-lg col-12 m-t-35 card">
                                                    <div class="card-header bg-white">
                                    <span class="card-title">
                                        Sexos

                                    </span>
                                                        <span class="float-right"> <i
                                                                    class="fa fa-chevron-down"></i> </span>
                                                    </div>
                                                    <div class="card-block m-t-20 col-12 " style="display: none;">
                                                        <div class="p-l-10 row">
                                                            <div class="col-12 row">
                                                                @foreach($sex as $k=>$v)
                                                                    @if($k!=0)

                                                                        <div class="col-md-12 col-12 font-14 m-b-0">
                                                                            <div class="checkbox">
                                                                                <label class="text-success">
                                                                                    <input type="checkbox" name="sexo[]"
                                                                                           value="{!! $k !!}"
                                                                                           class="sexoss">
                                                                                    <span class="cr"><i
                                                                                                class="cr-icon fa fa-check"></i></span>
                                                                                    <span class="text-black">
                                                            {!! trans('horse.sex.'.$v->sex )!!}
                                                        </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>



                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="col-1"></div>
                                                            <div class=" col-3 text-center">
                                                                <a href="#!" class="btn btn-warning sexos">Todos los
                                                                    sexos</a>
                                                            </div>
                                                            <div class="col-12 m-t-20"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6 col-12 row ">
                                    <div class="col-12 card media_max_991">
                                        <div class="card-header bg-white">
                                            <i class="fa fa-edit"></i>
                                            Envia Correos
                                        </div>
                                        <div class="card-block p-l-10 p-r-10 m-t-35">

                                            <div class="form-group">
                                                <input type="email" name="para" class="form-control" placeholder="Para" required="">
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
                                            <div class="form-group">
                                                <input type="text" name="titulo" class="form-control m-t-25" placeholder="Subject *"
                                                       required="">
                                            </div>
                                            <div class="form-group mail_compose_wysi">
                                                {{--
                                                <ul class="wysihtml5-toolbar" style=""><li class="dropdown">
                                                        <a class="btn dropdown-toggle btn-secondary" data-toggle="dropdown">

                                                            <span class="glyphicon glyphicon-font"></span>

                                                            <span class="current-font">Normal text</span>
                                                            <b class="caret"></b>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="p" tabindex="-1" class="btn-secondary" href="javascript:;" unselectable="on">Normal text</a></li>
                                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" tabindex="-1" class="btn-secondary" href="javascript:;" unselectable="on">Heading 1</a></li>
                                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" tabindex="-1" class="btn-secondary" href="javascript:;" unselectable="on">Heading 2</a></li>
                                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3" tabindex="-1" class="btn-secondary" href="javascript:;" unselectable="on">Heading 3</a></li>
                                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h4" tabindex="-1" class="btn-secondary" href="javascript:;" unselectable="on">Heading 4</a></li>
                                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h5" tabindex="-1" class="btn-secondary" href="javascript:;" unselectable="on">Heading 5</a></li>
                                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h6" tabindex="-1" class="btn-secondary" href="javascript:;" unselectable="on">Heading 6</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <div class="btn-group">
                                                            <a class="btn btn-secondary" data-wysihtml5-command="bold" title="CTRL+B" tabindex="-1" href="javascript:;" unselectable="on">Bold</a>
                                                            <a class="btn btn-secondary" data-wysihtml5-command="italic" title="CTRL+I" tabindex="-1" href="javascript:;" unselectable="on">Italic</a>
                                                            <a class="btn btn-secondary" data-wysihtml5-command="underline" title="CTRL+U" tabindex="-1" href="javascript:;" unselectable="on">Underline</a>

                                                            <a class="btn btn-secondary" data-wysihtml5-command="small" title="CTRL+S" tabindex="-1" href="javascript:;" unselectable="on">Small</a>

                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-secondary" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="blockquote" data-wysihtml5-display-format-name="false" tabindex="-1" href="javascript:;" unselectable="on">

                                                            <span class="fa fa-quote-left"></span>

                                                        </a>
                                                    </li>
                                                    <li>
                                                        <div class="btn-group">
                                                            <a class="btn fa fa-list btn-secondary" data-wysihtml5-command="insertUnorderedList" title="Unordered list" tabindex="-1" href="javascript:;" unselectable="on">

                                                                <span class="glyphicon glyphicon-list"></span>

                                                            </a>
                                                            <a class="btn fa fa-th-list btn-secondary" data-wysihtml5-command="insertOrderedList" title="Ordered list" tabindex="-1" href="javascript:;" unselectable="on">

                                                                <span class="glyphicon glyphicon-th-list"></span>

                                                            </a>
                                                            <a class="btn fa fa-align-left btn-secondary" data-wysihtml5-command="Outdent" title="Outdent" tabindex="-1" href="javascript:;" unselectable="on">

                                                                <span class="glyphicon glyphicon-indent-right"></span>

                                                            </a>
                                                            <a class="btn fa fa-align-right btn-secondary" data-wysihtml5-command="Indent" title="Indent" tabindex="-1" href="javascript:;" unselectable="on">

                                                                <span class="glyphicon glyphicon-indent-left"></span>

                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="bootstrap-wysihtml5-insert-link-modal modal fade">
                                                            <div class="modal-dialog ">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <a class="close btn-secondary" data-dismiss="modal">×</a>
                                                                        <h3>Insert link</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input value="http://" class="bootstrap-wysihtml5-insert-link-url form-control">
                                                                        <label class="checkbox"> <input type="checkbox" class="bootstrap-wysihtml5-insert-link-target" checked="">Open link in new window</label>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                                        <a href="#" class="btn btn-primary btn-secondary" data-dismiss="modal">Insert link</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="btn btn-secondary" data-wysihtml5-command="createLink" title="Insert link" tabindex="-1" href="javascript:;" unselectable="on">

                                                            <span class="glyphicon glyphicon-share fa fa-share"></span>

                                                        </a>
                                                    </li>
                                                    <li>
                                                        <div class="bootstrap-wysihtml5-insert-image-modal modal fade">
                                                            <div class="modal-dialog ">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <a class="close btn-secondary" data-dismiss="modal">×</a>
                                                                        <h3>Insert image</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input value="http://" class="bootstrap-wysihtml5-insert-image-url form-control">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                                        <a class="btn btn-primary btn-secondary" data-dismiss="modal">Insert image</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="btn btn-secondary" data-wysihtml5-command="insertImage" title="Insert image" tabindex="-1" href="javascript:;" unselectable="on">

                                                            <span class="glyphicon glyphicon-picture fa fa-picture-o"></span>

                                                        </a>
                                                    </li>
                                                </ul>
                                                --}}
                                                <textarea name="conten" class="wysihtml5 form-control m-t-20"> Algun texto de descripcion </textarea>
                                                {{--}}
                                            </textarea>
                                            <input type="hidden" name="_wysihtml5_mode" value="1">
                                            <iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="display: block; background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(206, 212, 218); border-style: solid; border-width: 1px; clear: none; float: none; margin: 20px 0px 0px; outline: rgb(73, 80, 87) none 0px; outline-offset: 0px; padding: 5.25px 10.5px; position: static; top: auto; left: auto; right: auto; bottom: auto; z-index: auto; vertical-align: baseline; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 3.5px; width: 100%; height: auto;">
                                            </iframe>
                                            --}}
                                            </div>
                                            <div class="form-group m-t-20">
                                                <button type="submit" class="btn btn-warning"><i
                                                            class="fa fa-reply"></i> Enviar
                                                </button>
                                                <a href="#!" class="btn btn-warning"><i
                                                            class="fa fa-close"></i> Cancelar</a>
                                            </div>

                                        </div>
                                    </div>
                                    {!! csrf_field() !!}


                                    <div class="col-lg col-12 m-t-35  card">
                                        <div class="card-header bg-white">
                                                <span class="card-title">
                                                    Vista de correo
                                                </span>
                                            <span class="float-right">
                                                        <i class="fa fa-chevron-down"></i>
                                                </span>
                                        </div>


                                        <div class="card-block m-t-20 col-12 " style="display: none;">
                                            <div class="p-l-10 row">
                                                <iframe  id='previews'  class="col-12 previsual"  frameborder="0"></iframe>
                                            </div>

                                        </div>
                                    </div>

                                    {{--
                                    <div class=" col-12 table-responsive noSwipe m-t-25 "
                                         action="{!! route('exportar.indexpost') !!}" method="post">

                                        <table class="table table-striped table-hover " cellspacing="0" id="tabla">
                                            <thead>
                                            <tr>
                                                @foreach($columns as $k=>$v)

                                                    <th >
                                                        {!! $v !!}
                                                    </th>
                                                @endforeach

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($horses as $c)
                                                <tr data-sex="{!! $c->sex !!}" data-color="{!! $c->color !!}"
                                                    data-raza="{!! $c->raza !!}" class="nm horse_{!! $c->id !!}"
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
                                                                <input type="checkbox" name="horsesel[]" value="{!! $c->id !!}"
                                                                       id="ck_{!! $c->id !!}">

                                                            @elseif($k == "color")
                                                                {!! $c->getColorString() !!}

                                                            @elseif($k == "raised")
                                                                {!! $c->getRaisedFormat() !!}

                                                            @elseif($k == "sex")
                                                                {!! trans('horse.sex.'.$c->sex) !!}

                                                            @elseif($k == "price")
                                                                @if(!empty($c->price) )

                                                                    @if($c->price !=0)
                                                                        {!! $c->getPriceMil() !!} €
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
                                    --}}
                                </div>


                                {{--7}}
                                <div class="col-12 row">
                                    <div class="col-4">
                                        Direcciones de correo destino
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="correos" class="form-control">
                                    </div>
                                </div>


                                {!! csrf_field() !!}


                                <div class="col-8"></div>
                                <div class="col-4">
                                    <input type="submit" value="enviar" class="btn btn-warning">
                                </div>
                                --}}
                            </div>

                        </form>
                        {{--
                                                <div class="offset-3 col-6 text-center ">
                                                    {{$horses->render()}}
                                                </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('bottomjs')
    {{--<script type="text/javascript" src="{!! url('assets/js/pages/radio_checkbox.js')!!}"></script>--}}
    <script type="text/javascript" src="{{asset('assets/js/pages/gallery.js')}}"></script>
    <script>
        var frr = "{!! route('exportar.indexpost') !!}";
        var iframes = $('#previews');
        var tabless = null;

        $(document).ready(function () {
            $(window).hover(function () {
                cargarimagenes();
                $('tr[data-fav="1"]').addClass('favorite');
            });
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
                    {{--
                                "ajax": {
                                    'url': "{!! route('fotospost.index') !!}",
                                    'type': 'POST',
                                    'beforeSend': function (request) {
                                        request.setRequestHeader("X-CSRF-TOKEN", token);
                                        request.setRequestHeader("csrftoken", token);
                                    }

                                },
                                --}}


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

        });

        function deleteit(id) {
            var dat = new FormData();
            dat.append('seti', '');
            var url = "{!! route('caballoc.del') !!}" + "/" + id;
            swal({
                title: '{!! trans('users.usure') !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: 'Deseas borrar el caballo?',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                $.ajax({
                    url: url,
                    data: dat,
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'csrftoken': token,
                    },
                    contentType: false,
                    processData: false,
                    async: false,
                    type: 'POST',
                    success: function (data) {
                        var s = $.parseJSON(data);
                        if (s === 1) {
                            //no fav
                            $('.horse_' + id).addClass('hidden-xl-down').prop('checked', false);
                        }
                    },
                    error:
                        function (xhr, status, error) {
                            var v = $.parseJSON(xhr.responseText);
                            console.error('error');
                            console.dir(v);
                        }
                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! trans('users.canceltask') !!}',
                        '{!! trans('users.cancelmodal') !!}',
                        'error'
                    )
                }
           });


            dat = null;

        }

        function setfav(id, valu) {
            //caballoc.fav
            var dat = new FormData();
            dat.append('seti', valu);
            var url = "{!! route('caballoc.fav') !!}" + "/" + id;
            $.ajax({
                url: url,
                data: dat,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                async: false,
                type: 'POST',
                success: function (data) {
                    var s = $.parseJSON(data);
                    console.dir(s)
                    if (s === 0) {
                        //no fav
                        //$('tr[data-id=128]').removeClass('favorite');
                        $('tr[data-id=' + id + ']').removeClass('favorite').attr('data-fav', 0);
                        $('#favorite_si_' + id).addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_no_' + id).removeClass('hidden-xl-down').prop('checked', true);
                    } else {
                        //fav
                        $('tr[data-id=' + id + ']').addClass('favorite').attr('data-fav', 1);
                        $('#favorite_no_' + id).addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_si_' + id).removeClass('hidden-xl-down').prop('checked', true);
                    }
                },
                error:
                    function (xhr, status, error) {
                        var v = $.parseJSON(xhr.responseText);
                        console.error('error');
                        console.dir(v);
                    }
            });
            dat = null;

        }

                @if(\Session::has('facebook'))
        var tace = "{!! \Session::get('facebook') !!}";
        swal({
            title: 'Puedes compartir el caballo {!! \Session::get('horse_name') !!} por facebook',
            type: 'success',
            showCancelButton: true,
            confirmButtonText: '{!! trans('text.yes') !!}',
            cancelButtonText: '{!! trans('text.no') !!}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonColor: '#4fb7fe',
            html: '¿Quieres compartirlo ahora?',
            cancelButtonColor: '#EF6F6C',
            buttonsStyling: false
        }).then(function () {
            window.open('https://www.facebook.com/sharer.php?u=' + tace, 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');
            {{--window.open(tace, 'Compartir caballo', "resizable=no,height=200,scrollbars=no");--}}
        }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                    '{!! trans('users.canceltask') !!}',
                    '{!! trans('users.cancelmodal') !!}',
                    'success'
                )
            }
       });

        {!! \Session::forget('facebook') !!}
        {!! \Session::forget('horse_name') !!}

        @endif

        function Vendido(id) {
            swal({
                title: 'Confirmacion de venta',
                type: 'success',
                showCancelButton: true,
                confirmButtonText: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '¿Haz vendido este caballo?',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {


                var url = "{!! route('horse.vendido') !!}" + "/" + id;
                var dat = new FormData();
                dat.append('seti', id);
                $.ajax({
                    url: url,
                    data: dat,
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'csrftoken': token,
                    },
                    contentType: false,
                    processData: false,
                    async: false,
                    type: 'POST',
                    success: function (data) {
                        var s = $.parseJSON(data);
                        if (s === 1) {
                            //no fav
                            $('.horse_' + id).addClass('hidden-xl-down').prop('checked', false);
                        }

                    },
                    error:
                        function (xhr, status, error) {
                            var v = $.parseJSON(xhr.responseText);
                            console.error('error');
                            console.dir(v);
                        }
                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! trans('users.canceltask') !!}',
                        '',
                        'success'
                    )
                }
           });
        }

        $('#sex').on('change', function () {
            var g = $('#sex').val();
            if (g !== '0') {
                $('[type=search]').val($('#sex option:selected').text()).trigger('keyup');
            } else {
                $('[type=search]').val('').trigger('keyup');
            }

       });
        $('#raza').on('change', function () {
            var g = $('#raza').val();
            if (g !== '0') {
                $('[type=search]').val($('#raza option:selected').text()).trigger('keyup');
            } else {
                $('[type=search]').val('').trigger('keyup');
            }
       });
        $('#color').on('change', function () {
            var g = $('#color').val();
            if (g !== '0') {
                $('[type=search]').val($('#color option:selected').text()).trigger('keyup');
            } else {
                $('[type=search]').val('').trigger('keyup');
            }
        });

        $('.sexy').on('click', function () {
            var val = $(this).attr('data-val');
            var s = $('#tabla').find('tr');
            $.each(s, function (k, v) {
                var ds = $(v).attr('data-sex');
                if (ds === val) {
                    var ck = $(val).find('[type="checkbox"]');
                    var at = ck.attr('checked');
                    if (at === 'checked') {

                    } else if (at === undefined) {
                        console.dir(at);
                        $(v).click()

                    }
                }

            });
       });

        function Special(datae, valor) {
            var selector = $('.dataTables_length').val();
            var cv = selector.val();
            $('.dataTables_length option[value="-1"]').attr('selected', 'selected').trigger('change');

            var s = $('#tabla').find('tr');
            $.each(s, function (k, v) {
                var ds = $(v).attr(datae);
                if (ds === valor) {
                    var ck = $(val).find('[type="checkbox"]');
                    var at = ck.attr('checked');
                    if (at === undefined) {
                        console.dir(at);
                        $(v).click()
                    }
                }

            });
            $('.dataTables_length option[value=' + cv + ']').attr('selected', 'selected').trigger('change');

        }

        $('.razas').on('click', function () {
            $('.razasc').prop('checked', true).attr('checked', 'checked');
        });
        $('.sexos').on('click', function () {
            $('.sexoss').prop('checked', true).attr('checked', 'checked');
        });
        $('.capa').on('click', function () {
            $('.capas').prop('checked', true).attr('checked', 'checked');
        });

        /*
                $(".fa-chevron-up").on("click", function () {
                    $(this).closest('.card').find('.card-block').slideToggle();
                    $(this).toggleClass("fa-chevron-up").toggleClass("fa-chevron-down");
                });
                */

        $(".card-header .fa-chevron-down").on("click", function () {
            $(this).closest('.card').find('.card-block').slideToggle();
            $(this).toggleClass("fa-chevron-down").toggleClass("fa-chevron-up");
        });
        //url: "{!! route('exportar.indexpost') !!}",
        function test() {

            var form = new FormData(document.getElementById('enviado'));
            var url = frr;
            axios.post(url, form)
                .then(function (response) {
                    console.dir(response);
                    var contenido = response.data.vista;
                    var buenos = response.data.buenos;
                    var malos = response.data.malos;
                    WarP('Advertencia','Las siguientes direcciones de correo pueden estar equivocadas ' +malos);

                    $('#previews').addClass('col-12').contents().find('html').html(contenido);

               })
 .catch(function (error) {
                    console.error('error ');
                    console.dir(error);


                });

        }
    </script>
    @include('backend.common.exportar')
@endsection
