@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )

@section('topjs')
    <link type="text/css" rel="stylesheet" href="{!! url('assets/vendors/select2/css/select2.min.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/pages/dataTables.bootstrap.css') !!}"/>
@endsection

@section('topcss')
    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/pages/tables.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
@endsection

@section('content')

    <div class="card">
        <div class="card-header bg-white">
            User Grid
        </div>
        <div class="card-block m-t-35" id="user_body">
            <div class="table-toolbar">
                <div class="btn-group">
                    <a href="add_user.html" id="editable_table_new" class=" btn btn-default">
                        Add User <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="btn-group float-xs-right users_grid_tools">
                    <div class="tools"></div>
                </div>
            </div>
            <div>
                <div>
                    <div id="editable_table_wrapper" class="dataTables_wrapper dt-bootstrap no-footer">
                        <div class="text-right">
                            <div class="dt-buttons btn-group"><a class="btn buttons-copy buttons-html5 btn-secondary"
                                                                 tabindex="0" aria-controls="editable_table"
                                                                 href="#"><span>Copy</span></a><a
                                        class="btn buttons-csv buttons-html5 btn-secondary" tabindex="0"
                                        aria-controls="editable_table" href="#"><span>CSV</span></a><a
                                        class="btn buttons-print btn-secondary" tabindex="0"
                                        aria-controls="editable_table" href="#"><span>Print</span></a></div>
                        </div>
                        <div>
                            <div id="editable_table_filter" class="dataTables_filter"><label>Search:<input
                                            class="form-control input-sm" placeholder="" aria-controls="editable_table"
                                            type="search"></label></div>
                        </div>
                        <div class="dataTables_length" id="editable_table_length"><label>Show <select
                                        name="editable_table_length" aria-controls="editable_table"
                                        class="form-control input-sm select2-hidden-accessible" tabindex="-1"
                                        aria-hidden="true">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                               style="width: 75px;"><span class="selection"><span
                                                class="select2-selection select2-selection--single" role="combobox"
                                                aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                aria-labelledby="select2-editable_table_length-8f-container"><span
                                                    class="select2-selection__rendered"
                                                    id="select2-editable_table_length-8f-container" title="10">10</span><span
                                                    class="select2-selection__arrow" role="presentation"><b
                                                        role="presentation"></b></span></span></span><span
                                            class="dropdown-wrapper" aria-hidden="true"></span></span> entries</label>
                        </div>
                        <div class="table-responsive">
                            <table class="table  table-striped table-bordered table-hover dataTable no-footer"
                                   id="editable_table" role="grid" aria-describedby="editable_table_info">
                                <thead>
                                <tr role="row">
                                    <th class="wid-20 sorting_asc" tabindex="0" rowspan="1" colspan="1"
                                        aria-controls="editable_table" style="width: 142px;" aria-sort="ascending"
                                        aria-label="Username: activate to sort column descending">Username
                                    </th>
                                    <th class="wid-25 sorting" tabindex="0" rowspan="1" colspan="1"
                                        aria-controls="editable_table" style="width: 232px;"
                                        aria-label="E-Mail: activate to sort column ascending">E-Mail
                                    </th>
                                    <th class="wid-10 sorting" tabindex="0" rowspan="1" colspan="1"
                                        aria-controls="editable_table" style="width: 58px;"
                                        aria-label="Gender: activate to sort column ascending">Gender
                                    </th>
                                    <th class="wid-20 sorting" tabindex="0" rowspan="1" colspan="1"
                                        aria-controls="editable_table" style="width: 118px;"
                                        aria-label="City: activate to sort column ascending">City
                                    </th>
                                    <th class="wid-15 sorting" tabindex="0" rowspan="1" colspan="1"
                                        aria-controls="editable_table" style="width: 51px;"
                                        aria-label="Status: activate to sort column ascending">Status
                                    </th>
                                    <th class="wid-10 sorting" tabindex="0" rowspan="1" colspan="1"
                                        aria-controls="editable_table" style="width: 59px;"
                                        aria-label="Actions: activate to sort column ascending">Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">Ahmad.Nader89</td>
                                    <td>Ahmad_Nader91@yahoo.com</td>
                                    <td>Female</td>
                                    <td class="center">South Coleville</td>
                                    <td class="center">Approved</td>
                                    <td><a href="view_user.html" data-toggle="tooltip" data-placement="top"
                                           title="View User"><i class="fa fa-eye text-success"></i></a>&nbsp; &nbsp;<a
                                                class="edit" data-toggle="tooltip" data-placement="top" title="Edit"
                                                href="edit_user.html"><i class="fa fa-pencil text-warning"></i></a>&nbsp;
                                        &nbsp;<a class="delete hidden-xs hidden-sm" data-toggle="tooltip"
                                                 data-placement="top" title="Delete" href="delete_user.html"><i
                                                    class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">Alexandria.OConner</td>
                                    <td>Alexandria30@gmail.com</td>
                                    <td>Male</td>
                                    <td class="center">Hellenfort</td>
                                    <td class="center">Approved</td>
                                    <td><a href="view_user.html" data-toggle="tooltip" data-placement="top"
                                           title="View User"><i class="fa fa-eye text-success"></i></a>&nbsp; &nbsp;<a
                                                class="edit" data-toggle="tooltip" data-placement="top" title="Edit"
                                                href="edit_user.html"><i class="fa fa-pencil text-warning"></i></a>&nbsp;
                                        &nbsp;<a class="delete hidden-xs hidden-sm" data-toggle="tooltip"
                                                 data-placement="top" title="Delete" href="delete_user.html"><i
                                                    class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">Alice_Rempel76</td>
                                    <td>Alice36@hotmail.com</td>
                                    <td>Male</td>
                                    <td class="center">South Jaquelin</td>
                                    <td class="center">Approved</td>
                                    <td><a href="view_user.html" data-toggle="tooltip" data-placement="top"
                                           title="View User"><i class="fa fa-eye text-success"></i></a>&nbsp; &nbsp;<a
                                                class="edit" data-toggle="tooltip" data-placement="top" title="Edit"
                                                href="edit_user.html"><i class="fa fa-pencil text-warning"></i></a>&nbsp;
                                        &nbsp;<a class="delete hidden-xs hidden-sm" data-toggle="tooltip"
                                                 data-placement="top" title="Delete" href="delete_user.html"><i
                                                    class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">Amira.Rolfson</td>
                                    <td>Amira86@gmail.com</td>
                                    <td>Male</td>
                                    <td class="center">Donnieburgh</td>
                                    <td class="center">Approved</td>
                                    <td><a href="view_user.html" data-toggle="tooltip" data-placement="top"
                                           title="View User"><i class="fa fa-eye text-success"></i></a>&nbsp; &nbsp;<a
                                                class="edit" data-toggle="tooltip" data-placement="top" title="Edit"
                                                href="edit_user.html"><i class="fa fa-pencil text-warning"></i></a>&nbsp;
                                        &nbsp;<a class="delete hidden-xs hidden-sm" data-toggle="tooltip"
                                                 data-placement="top" title="Delete" href="delete_user.html"><i
                                                    class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">Ardella_VonRueden</td>
                                    <td>Ardella_VonRueden@hotmail.com</td>
                                    <td>Female</td>
                                    <td class="center">Buckridgeview</td>
                                    <td class="center">Approved</td>
                                    <td><a href="view_user.html" data-toggle="tooltip" data-placement="top"
                                           title="View User"><i class="fa fa-eye text-success"></i></a>&nbsp; &nbsp;<a
                                                class="edit" data-toggle="tooltip" data-placement="top" title="Edit"
                                                href="edit_user.html"><i class="fa fa-pencil text-warning"></i></a>&nbsp;
                                        &nbsp;<a class="delete hidden-xs hidden-sm" data-toggle="tooltip"
                                                 data-placement="top" title="Delete" href="delete_user.html"><i
                                                    class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">Billy_Osinski</td>
                                    <td>Billy_Osinski66@gmail.com</td>
                                    <td>Female</td>
                                    <td class="center">Rennerstad</td>
                                    <td class="center">Approved</td>
                                    <td><a href="view_user.html" data-toggle="tooltip" data-placement="top"
                                           title="View User"><i class="fa fa-eye text-success"></i></a>&nbsp; &nbsp;<a
                                                class="edit" data-toggle="tooltip" data-placement="top" title="Edit"
                                                href="edit_user.html"><i class="fa fa-pencil text-warning"></i></a>&nbsp;
                                        &nbsp;<a class="delete hidden-xs hidden-sm" data-toggle="tooltip"
                                                 data-placement="top" title="Delete" href="delete_user.html"><i
                                                    class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">Breanna15</td>
                                    <td>Breanna.Ratke@hotmail.com</td>
                                    <td>Male</td>
                                    <td class="center">North Jadaton</td>
                                    <td class="center">Approved</td>
                                    <td><a href="view_user.html" data-toggle="tooltip" data-placement="top"
                                           title="View User"><i class="fa fa-eye text-success"></i></a>&nbsp; &nbsp;<a
                                                class="edit" data-toggle="tooltip" data-placement="top" title="Edit"
                                                href="edit_user.html"><i class="fa fa-pencil text-warning"></i></a>&nbsp;
                                        &nbsp;<a class="delete hidden-xs hidden-sm" data-toggle="tooltip"
                                                 data-placement="top" title="Delete" href="delete_user.html"><i
                                                    class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">Brendan72</td>
                                    <td>Brendan_Sipes10@yahoo.com</td>
                                    <td>Female</td>
                                    <td class="center">North Vicentaside</td>
                                    <td class="center">Approved</td>
                                    <td><a href="view_user.html" data-toggle="tooltip" data-placement="top"
                                           title="View User"><i class="fa fa-eye text-success"></i></a>&nbsp; &nbsp;<a
                                                class="edit" data-toggle="tooltip" data-placement="top" title="Edit"
                                                href="edit_user.html"><i class="fa fa-pencil text-warning"></i></a>&nbsp;
                                        &nbsp;<a class="delete hidden-xs hidden-sm" data-toggle="tooltip"
                                                 data-placement="top" title="Delete" href="delete_user.html"><i
                                                    class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">Brook93</td>
                                    <td>Brook64@yahoo.com</td>
                                    <td>Male</td>
                                    <td class="center">Schmittchester</td>
                                    <td class="center">Approved</td>
                                    <td><a href="view_user.html" data-toggle="tooltip" data-placement="top"
                                           title="View User"><i class="fa fa-eye text-success"></i></a>&nbsp; &nbsp;<a
                                                class="edit" data-toggle="tooltip" data-placement="top" title="Edit"
                                                href="edit_user.html"><i class="fa fa-pencil text-warning"></i></a>&nbsp;
                                        &nbsp;<a class="delete hidden-xs hidden-sm" data-toggle="tooltip"
                                                 data-placement="top" title="Delete" href="delete_user.html"><i
                                                    class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">Brown20</td>
                                    <td>Brown4@yahoo.com</td>
                                    <td>Male</td>
                                    <td class="center">Katrinafort</td>
                                    <td class="center">Approved</td>
                                    <td><a href="view_user.html" data-toggle="tooltip" data-placement="top"
                                           title="View User"><i class="fa fa-eye text-success"></i></a>&nbsp; &nbsp;<a
                                                class="edit" data-toggle="tooltip" data-placement="top" title="Edit"
                                                href="edit_user.html"><i class="fa fa-pencil text-warning"></i></a>&nbsp;
                                        &nbsp;<a class="delete hidden-xs hidden-sm" data-toggle="tooltip"
                                                 data-placement="top" title="Delete" href="delete_user.html"><i
                                                    class="fa fa-trash text-danger"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-5 col-12">
                                <div class="dataTables_info" id="editable_table_info" role="status" aria-live="polite">
                                    Showing 1 to 10 of 67 entries
                                </div>
                            </div>
                            <div class="col-md-7 col-12">
                                <div class="dataTables_paginate paging_simple_numbers" id="editable_table_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button previous disabled" id="editable_table_previous"><a
                                                    href="#" aria-controls="editable_table" data-dt-idx="0"
                                                    tabindex="0">Previous</a></li>
                                        <li class="paginate_button active"><a href="#" aria-controls="editable_table"
                                                                              data-dt-idx="1" tabindex="0">1</a></li>
                                        <li class="paginate_button "><a href="#" aria-controls="editable_table"
                                                                        data-dt-idx="2" tabindex="0">2</a></li>
                                        <li class="paginate_button "><a href="#" aria-controls="editable_table"
                                                                        data-dt-idx="3" tabindex="0">3</a></li>
                                        <li class="paginate_button "><a href="#" aria-controls="editable_table"
                                                                        data-dt-idx="4" tabindex="0">4</a></li>
                                        <li class="paginate_button "><a href="#" aria-controls="editable_table"
                                                                        data-dt-idx="5" tabindex="0">5</a></li>
                                        <li class="paginate_button "><a href="#" aria-controls="editable_table"
                                                                        data-dt-idx="6" tabindex="0">6</a></li>
                                        <li class="paginate_button "><a href="#" aria-controls="editable_table"
                                                                        data-dt-idx="7" tabindex="0">7</a></li>
                                        <li class="paginate_button next" id="editable_table_next"><a href="#"
                                                                                                     aria-controls="editable_table"
                                                                                                     data-dt-idx="8"
                                                                                                     tabindex="0">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection

@section('bottomjs')
    <script type="text/javascript" src="{!! url('assets/js/pages/users.js') !!}"></script>
@endsection
