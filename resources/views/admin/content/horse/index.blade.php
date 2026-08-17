@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )
@section('pagetitleadmin')

    @include('admin.topstud')
    <div class="row col-12 m-t-25">
        {{--
        <div class="col-8"></div>
        <div class="col-3 pull-right">
            <a class="btn btn-warning pull-right" href="{!! route('yeguadas.show',['id'=>$stud->id]) !!}">
                {!! trans('users.return') !!}
            </a>
        </div>
        --}}
        {{--Ajustar nuevo y editar con el nuevo modelo--}}
    </div>


@endsection
@section('content')

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                Listado de Caballos
                @if(count($horses) !=0)
                    <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! count($horses )!!}
                        </span>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <div class=" col-12 table-responsive noSwipe">
                            <table id="tabla" class="table table-striped table-hover" cellspacing="0">
                                <thead>
                                <tr>
                                    @foreach($columns as $k=>$v)

                                        <th {{--style="@if($k == 'status')width: 160px; @endif"--}}>
                                            {!! $v !!}
                                        </th>
                                    @endforeach

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($horses as $c)
                                    <tr>
                                        @foreach($columns as $k=>$v)

                                            <td>
                                                @if($k == "doma")
                                                    @if($c->doma == true)
                                                        Domado
                                                    @else
                                                        No Domado
                                                    @endif
                                                @elseif($k == "color")
                                                        {!! $c->getColorString() !!}

                                                @elseif($k == "name")
                                                    <a href="{!! route('caballo.editar',['id'=>$c->id]) !!}">
                                                        {!! $c->getName() !!}
                                                    </a>

                                                @elseif($k == "raised")
                                                        {!! $c->getRaisedFormat() !!}

                                                @elseif($k == "sex")
                                                        {!! $c->getSexString() !!}

                                                @elseif($k == "price")
                                                        {!! $c->getPriceMil() !!}

                                                @elseif($k == "raza")
                                                        {!! trans('horse.raza.'.$c->raza) !!}

                                                @elseif($k == "tosold")
                                                    @if($c->getTosold() == true)
                                                        Publicado
                                                        @else
                                                    @endif
                                                @else
                                                    {!! $c->{$k} !!}
                                                @endif
                                            </td>
                                        @endforeach
                                        <td>
                                            <a href="{!! route('caballo.editar',['id'=>$c->id]) !!}">
                                                <i class="fa fa-eye text-success"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
{{--}}
                        <div class="offset-3 col-6 text-center ">
                            {{$horses->render()}}
                        </div>
                        --}}
                        <div class="offset-3 col-6  text-center">
                            <div class="row">
                                <div class="col-4 ">
                                    <a href="{!! route('horse.create') !!}"
                                       class="save btn btn-block btn-success glow_button">{!! trans('clientes.new') !!}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection