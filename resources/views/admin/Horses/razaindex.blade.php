@extends('backend.layouts.base')
@section('title', trans('horse.razas'))

@section('content')

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                <div class="col-9">
                    Listado de razas
                    @if(count($razas) != 0)
                        <span style="padding-left:10px;">
                            <span class="badge badge-pill badge-warning notifications_badge_top">
                                {!! count($razas) !!}
                            </span>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <div class=" col-12 table-responsive noSwipe m-t-20">
                            <table id="TablaAdmin" class="table table-striped table-hover" cellspacing="0">
                                <thead>
                                <tr>
                                    @foreach($columns as $k => $v)
                                        <th>{!! $v !!}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($razas as $raza)
                                    <tr>
                                        <td>{!! $raza->id !!}</td>
                                        <td>{!! $raza->getName() !!}</td>
                                        <td>{!! ($raza->status == true) ? 'Activo' : 'Inactivo' !!}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No hay razas registradas.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
