@extends('backend.layouts.base')
@section('title', trans('horse.chooseone') )
@section('content')
    <div class="table-responsive noSwipe">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>{{ trans('city.attrib.name') }}</th>
                <th>{{ trans('city.attrib.status') }}</th>
                <th>{{ trans('city.attrib.state_id') }}</th>
                <th>{{ trans('city.attrib.created_by') }}</th>
                <th>{{ trans('city.attrib.updated_by') }}</th>
                <th>{{ trans('city.attrib.deleted_by') }}</th>
                <th style="width:10%;"></th>

            </tr>
            </thead>
            <tbody class="no-border-x">
            @foreach($city as $c)

                <tr>
                    <td class="user-avatar cell-detail user-info">
                        <span>{{$c->getName()}}</span>
                        <span class="cell-detail-description"></span>
                    </td>
                    <td class="cell-detail">
                        <span>{{$c->getStatus()}}</span>
                        <span class="cell-detail-description"></span>
                    </td>
                    <td class="cell-detail">
                        <span>{{$c->getStateString()}}</span>
                        <span class="cell-detail-description">{{$c->getCountryName()}}</span>
                    </td>
                    <td class="cell-detail">
                        <span>{{$c->getCreatedBy()}}</span>
                        <span class="cell-detail-description"></span>
                    </td>

                    <td class="cell-detail">
                        <span>{{$c->getUpdatedBy()}}</span>
                        <span class="cell-detail-description"></span>
                    </td>
                    <td class="cell-detail">
                        <span>{{$c->getDeletedBy()}}</span>
                        <span class="cell-detail-description"></span>
                    </td>
                    <td class="text-right">
                        <div class="btn-group btn-hspace">
                            <button type="button" data-toggle="dropdown"
                                    class="btn btn-secondary btn-xs dropdown-toggle">Open
                                <span class="icon-dropdown s7-angle-down"> </span>
                            </button>
                            <div role="menu" class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Action</a>
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
            {{$city->render()}}
        </div>
    </div>
@endsection