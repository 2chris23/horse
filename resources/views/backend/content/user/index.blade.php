@extends('backend.layouts.base')
@section('title', trans('Titulos.PerfilStud') )
@section('content')
    <userlist>

    </userlist>
    {{--
    <div class="table-responsive noSwipe">
        <table class="table table-striped table-hover">
            <thead>
            <tr>

                <th>{{ trans('users.attrib.email') }}</th>
                <th>{{ trans('users.attrib.password') }}</th>
                <th>{{ trans('users.attrib.type') }}</th>
                <th>{{ trans('users.attrib.created_by') }}</th>
                <th>{{ trans('users.attrib.updated_by') }}</th>
                <th>{{ trans('users.attrib.deleted_by') }}</th>
                <th style="width:10%;"></th>
            </tr>
            </thead>
            <tbody class="no-border-x">
            @foreach($users as $c)

                <tr>
                    <td class="user-avatar cell-detail user-info">
                        <span>{{$c->getEmail()}}</span>
                        <span class="cell-detail-description">Bootstrap Admin</span>
                    </td>
                    <td class="cell-detail">
                        <span>{{$c->getPassword()}}</span>
                        <span class="cell-detail-description">Bootstrap Admin</span>
                    </td>
                    <td class="cell-detail">
                        <span>{{$c->getType()}}</span>
                        <span class="cell-detail-description"></span>
                    </td>
                    <td class="cell-detail">
                        <span>{{$c->getCreatedBy()}}</span>
                        <span class="cell-detail-description">Bootstrap Admin</span>
                    </td>

                    <td class="cell-detail">
                        <span>{{$c->getUpdatedBy()}}</span>
                        <span class="cell-detail-description">63e8ec3</span>
                    </td>
                    <td class="cell-detail">
                        <span>{{$c->getDeletedBy()}}</span>
                        <span class="cell-detail-description">8:30</span>
                    </td>
                    <td class="text-right">
                        <div class="btn-group btn-hspace">
                            <button type="button" data-toggle="dropdown"
                                    class="btn btn-secondary btn-xs dropdown-toggle">Open
                                <span class="icon-dropdown s7-angle-down"> </span>
                            </button>
                            <div role="menu" class="dropdown-menu dropdown-menu-right">
                                <a href="{!! route('user.edit',['id'=>$c->id]) !!}" class="dropdown-item">Editar</a>
                                <a href="#" class="dropdown-item">Another action</a>
                                <a href="#" class="dropdown-item">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Separated link</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-xs-6 col-md-offset-3 text-center">
            {{$users->render()}}
        </div>
    </div>
    --}}
@endsection
