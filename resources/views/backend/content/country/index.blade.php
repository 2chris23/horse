@php
    $marcaprimaria="fa-bookmark";
    $marcasecundaria="fa-bookmark";
@endphp
@extends('backend.layouts.base')
@section('title', trans('horse.chooseone') )
@section('content')

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                Listado de paises
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <div class=" col-12 table-responsive noSwipe m-t-20">
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
                                @foreach($country as $c)
                                    <tr>
                                        @foreach($columns as $k=>$v)

                                            <td>
                                                @if($k == "status")
                                                    <button id="pri_{!! $c->id !!}" type="button"
                                                            class="btn btn-labeled @if($c->getStatus() == true) btn-warning @else btn-primario @endif "
                                                            onclick="principal({!! $c->id !!})">

                                                <span class="btn-label">
                                                    <i class="fa @if($c->getStatus() == true) {!! $marcaprimaria !!} @else {!! $marcasecundaria !!} @endif "></i>
                                                </span>
                                                        @if($c->getStatus() == true) Principal @else Secundario @endif
                                                    </button>
                                                @else
                                                    {!! $c->{$k} !!}
                                                @endif


                                            </td>
                                        @endforeach
                                        {{--
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
                                        --}}

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{--
                        <div class="col-xs-6 col-md-offset-3">
                            {{$country->render()}}
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function principal(id) {
            var form = new FormData();
            form.append('id', id);
            $.ajax({
                url: '{!! route('country.change') !!}',
                data: form,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {
                    var data = $.parseJSON(data);
                    var d = data.st;
                    if (d === true) {
                        $('#pri_' + id).addClass('btn-warning').removeClass('btn-primario').html('<span class="btn-label"> <i class="fa {!! $marcaprimaria !!}"></i> </span> Principal');
                    } else {
                        $('#pri_' + id).addClass('btn-primario').removeClass('btn-warning').html('<span class="btn-label"> <i class="fa {!! $marcasecundaria !!}"></i> </span> Secndario');
                    }
                    //swal.insertQueueStep(data.ip)
                    swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('users.successchange') !!}',
                        'success'
                    )
                },
                error:
                    function (xhr, status, error) {
                        var err = eval(xhr.responseText.sms);
                        var v = $.parseJSON(xhr.responseText);
                        swal({
                            title: '{!! trans('users.tittleerror') !!}',
                            html: '{!! trans('users.someerror') !!}<br>' + v.sms,
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        });
                    }
            });

        }
    </script>
@endsection


@section('bottomjs')
    <script>
        $(document).on('load', function () {
            var data = [];


            var table = $('#tabla').dataTable({
                "order": [[0, "desc"]],
                "pageLength": 25,

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
                    "lengthMenu": "{!! trans('users.tableregistros') !!}","emptyTable": "{!! trans('users.emptyTable') !!}",
                    "paginate": {
                        "first": "{!! trans('users.tablefirst') !!}",
                        "last": "{!! trans('users.tablelast') !!}",
                        "next": "{!! trans('users.tablenext') !!}",
                        "previous": "{!! trans('users.tableprevious') !!}",

                    },


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


            $(window).hover(function () {
                cargarimagenes();
            });
            $('#tabla tbody').on('click', 'tr', function () {
                console.log('clicl');
                //var data = table.row(this).data();
                //alert('You clicked on ' + data[0] + '\'s row');
            });


        });
    </script>
@endsection