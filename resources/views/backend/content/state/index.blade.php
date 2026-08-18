@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )
@section('content')
    <div class="table-responsive noSwipe">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th style="width:5%;">
                    <label class="custom-control custom-control-sm custom-checkbox">
                        <input type="checkbox" class="custom-control-input">
                        <span class="custom-control-indicator">
</span>
                    </label>
                </th>
                <th style="width:20%;">User</th>
                <th style="width:17%;">Last Commit</th>
                <th style="width:15%;">Milestone</th>
                <th style="width:10%;">Branch</th>
                <th style="width:10%;">Date</th>
                <th style="width:10%;">
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($city as $c)

                <tr>
                    <td>
                        <label class="custom-control custom-control-sm custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator">
                            </span>
                        </label>
                    </td>
                    <td class="user-avatar cell-detail user-info">
                        <img src="assets/img/avatar.jpg" alt="Avatar">
                        <span>{{$c->getName()}}</span>
                        <span class="cell-detail-description">Developer</span>
                    </td>
                    <td class="cell-detail"><span>{{$c->getStateString()}}</span>
                        <span class="cell-detail-description">Bootstrap Admin</span>
                    </td>
                    <td class="cell-detail"><span>{{$c->getCountryName()}}</span>
                        <span class="cell-detail-description">Bootstrap Admin</span>
                    </td>

                    <td class="cell-detail">
                        <span>master</span>
                        <span class="cell-detail-description">63e8ec3</span>
                    </td>
                    <td class="cell-detail">
                        <span>May 6, 2016</span>
                        <span class="cell-detail-description">8:30</span>
                    </td>
                    <td class="text-right">
                        <div class="btn-group btn-hspace">
                            <button type="button" data-toggle="dropdown"
                                    class="btn btn-secondary btn-xs dropdown-toggle">Open <span
                                        class="icon-dropdown s7-angle-down">
</span>
                            </button>
                            <div role="menu" class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Action</a>
                                <a href="#" class="dropdown-item">Another action</a>
                                <a href="#" class="dropdown-item">Something else here</a>
                                <div class="dropdown-divider">
                                </div>
                                <a href="#" class="dropdown-item">Separated link</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-xs-6 col-md-offset-3">
            {{$city->render()}}
        </div>
    </div>
@endsection
