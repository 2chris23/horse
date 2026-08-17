@extends('layouts.metronic')
@section('title', trans('horse.chooseone.Tittle') )
@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <i class="fa fa-table">
            </i> Datatable with Default ordering
        </div>
        <div class="card-block m-t-35">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap">
                <div class="row">
                    <div class="col-md-5 col-12">
                        <div class="dataTables_length" id="example1_length">
                            <label>Show <select name="example1_length" aria-controls="example1"
                                                class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label>
                        </div>
                    </div>
                    <div class="col-md-7 col-12">
                        <div id="example1_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control input-sm" placeholder=""
                                                 aria-controls="example1">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example1" class="display table table-stripped table-bordered dataTable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Id</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.sold') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.name') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.doma') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.raised') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.birthdate') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.raza') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.stud') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.price') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.tosold') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.selled') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.users_id') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.created_by') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.updated_by') }}</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1">{{ trans('horse.attrib.deleted_by') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Id</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.sold') }}</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.name') }}</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.doma') }}</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.raised') }}</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.birthdate') }}</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.raza') }}</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.stud') }}</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.price') }}</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.tosold') }}</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.selled') }}</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.users_id') }}</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.created_by') }}</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.updated_by') }}</th>
                            <th rowspan="1" colspan="1">{{ trans('horse.attrib.deleted_by') }}</th>

                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach($horses as $c)
                            @php
                                $a=(!isset($a))?0:$a++;
                                    $class = '';
                                        if (($a % 2) == 1){ $class = "odd";}
                                    if (($a % 2) == 0)
                                    { $class = "even";}
                            @endphp

                            <tr role="row" class="{{$class}}">
                                <td>
                                    {{$c->id}}
                                </td>
                                <td>
                                    {{$c->getSold()}}
                                </td>
                                <td>
                                    {{$c->getName()}}
                                </td>
                                <td>
                                    {{$c->getDoma()}}
                                </td>

                                <td>
                                    {{$c->getRaised()}}
                                </td>
                                <td>
                                    {{$c->getBirthdate()}}
                                </td>
                                <td>
                                    {{$c->getRaza()}}
                                </td>
                                <td>
                                    {{$c->getStud()}}
                                </td>
                                <td>
                                    {{$c->getPrice()}}
                                </td>
                                <td>
                                    {{$c->getToSold()}}
                                </td>
                                <td>
                                    {{$c->getSelled()}}
                                </td>
                                <td>
                                    {{$c->getUsersId()}}
                                </td>
                                <td class="cell-detail">
                                    {{$c->getCreatedBy()}}
                                </td>

                                <td class="cell-detail">
                                    {{$c->getUpdatedBy()}}
                                </td>
                                <td class="cell-detail">
                                    {{$c->getDeletedBy()}}
                                </td>
                                <td class="text-right">
                                    <div class="btn-group btn-hspace">
                                        <button type="button" data-toggle="dropdown"
                                                class="btn btn-secondary btn-xs dropdown-toggle">Open
                                            <span class="icon-dropdown s7-angle-down"> </span>
                                        </button>
                                        <div role="menu" class="dropdown-menu dropdown-menu-right">
                                            <a href="{!! route('horse.edit',['id'=>$c->id]) !!}" class="dropdown-item">Editar</a>
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
                        {{--
                        <tr role="row" class="odd">
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td class="sorting_1">66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                        </tr>
                        <tr role="row" class="even">
                            <td>Michael Silva</td>
                            <td>Marketing Designer</td>
                            <td>London</td>
                            <td class="sorting_1">66</td>
                            <td>2012/11/27</td>
                            <td>$198,500</td>
                        </tr>
                        --}}
                        </tbody>
                    </table>
                </div>
                {{--
                <div class="row">
                    <div class="col-md-5 col-12">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10
                            of 57 entries
                        </div>
                    </div>
                    <div class="col-md-7 col-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            <ul class="pagination">
                                <li class="paginate_button previous disabled" id="example1_previous">
                                    <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a>
                                </li>
                                <li class="paginate_button active">
                                    <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a>
                                </li>
                                <li class="paginate_button ">
                                    <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a>
                                </li>
                                <li class="paginate_button ">
                                    <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a>
                                </li>
                                <li class="paginate_button ">
                                    <a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a>
                                </li>
                                <li class="paginate_button ">
                                    <a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a>
                                </li>
                                <li class="paginate_button ">
                                    <a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a>
                                </li>
                                <li class="paginate_button next" id="example1_next">
                                    <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>--}}
                <div class="row">
                    <div class="col-md-5 col-12">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                            Showing 1 to 10 of 57 entries
                        </div>
                    </div>
                    <div class="col-md-7 col-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            <ul class="pagination">
                                {{$horses->render()}}
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{--
        <div class="card">
            <div class="card-header bg-white">
                <i class="fa fa-user"> </i>
                Listado de Caballos
            </div>
            <div class="card-block m-t-35 table-responsive">
                <div class="table-responsive noSwipe">
                    <table id="tabla" class="table table-striped table-hover" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>{{ trans('horse.attrib.sold') }}</th>
                            <th>{{ trans('horse.attrib.name') }}</th>
                            <th>{{ trans('horse.attrib.doma') }}</th>
                            <th>{{ trans('horse.attrib.raised') }}</th>
                            <th>{{ trans('horse.attrib.birthdate') }}</th>
                            <th>{{ trans('horse.attrib.raza') }}</th>
                            <th>{{ trans('horse.attrib.stud') }}</th>
                            <th>{{ trans('horse.attrib.price') }}</th>
                            <th>{{ trans('horse.attrib.tosold') }}</th>
                            <th>{{ trans('horse.attrib.selled') }}</th>
                            <th>{{ trans('horse.attrib.users_id') }}</th>
                            <th>{{ trans('horse.attrib.created_by') }}</th>
                            <th>{{ trans('horse.attrib.updated_by') }}</th>
                            <th>{{ trans('horse.attrib.deleted_by') }}</th>

                            <th style="width:10%;">
                            </th>
                        </tr>
                        </thead>
                        <tbody class="no-border-x">
                        @foreach($horses as $c)

                            <tr>
                                <td class="user-avatar cell-detail user-info">
                                    <span>{{$c->id}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>
                                <td class="user-avatar cell-detail user-info">
                                    <span>{{$c->getSold()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>
                                <td class="user-avatar cell-detail user-info">
                                    <span>{{$c->getName()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>
                                <td class="user-avatar cell-detail user-info">
                                    <span>{{$c->getDoma()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>

                                <td class="user-avatar cell-detail user-info">
                                    <span>{{$c->getRaised()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>
                                <td class="user-avatar cell-detail user-info">
                                    <span>{{$c->getBirthdate()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>
                                <td class="user-avatar cell-detail user-info">
                                    <span>{{$c->getRaza()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>
                                <td class="user-avatar cell-detail user-info">
                                    <span>{{$c->getStud()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>
                                <td class="user-avatar cell-detail user-info">
                                    <span>{{$c->getPrice()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>
                                <td class="user-avatar cell-detail user-info">
                                    <span>{{$c->getToSold()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>
                                <td class="user-avatar cell-detail user-info">
                                    <span>{{$c->getSelled()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>
                                <td class="user-avatar cell-detail user-info">
                                    <span>{{$c->getUsersId()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>
                                <td class="cell-detail">
                                    <span>{{$c->getCreatedBy()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>

                                <td class="cell-detail">
                                    <span>{{$c->getUpdatedBy()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>
                                <td class="cell-detail">
                                    <span>{{$c->getDeletedBy()}}</span>
                                    <span class="cell-detail-description">
    </span>
                                </td>
                                <td class="text-right">
                                    <div class="btn-group btn-hspace">
                                        <button type="button" data-toggle="dropdown"
                                                class="btn btn-secondary btn-xs dropdown-toggle">Open
                                            <span class="icon-dropdown s7-angle-down"> </span>
                                        </button>
                                        <div role="menu" class="dropdown-menu dropdown-menu-right">
                                            <a href="{!! route('horse.edit',['id'=>$c->id]) !!}" class="dropdown-item">Editar</a>
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
                    <div class="col-xs-6 col-md-offset-3 text-center">
                        {{$horses->render()}}
                    </div>
                </div>
            </div>
        </div>
    --}}

@endsection