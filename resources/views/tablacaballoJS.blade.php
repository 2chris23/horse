<?php $cd = null; ?>
@if(!empty($cd))
    <script>
                @endif
        var tabfoto = $('#tablafoto');
        var tabvideo = $('#tablavideo');
        var s = null;
        $.fn.dataTable.ext.errMode = 'none';
        if (tabfoto != undefined) {
                <?php
                $co = [
                    'id' => '#',
                    'url' => trans('photo.image'),
                    'type' => 'Tipo',
                    'tableid' => trans('photo.tableid'),
                    'tama' => trans('size', ['kb' => 'kb']),
                    'created_at' => trans('photo.Uploaded'),
                    'action' => trans('photo.delete'),
                ];
                ?>
            var url = $('#tablafoto').attr('data-url');
            axios.get(url).then(function (response) {
                s = response.data;
                table = $('#tablafoto').dataTable({
                    "order": [[0, "desc"]],
                    "data": s,
                    "columns": [@foreach($co as $f=>$a)
                    {
                        data: '{!! $f !!}',
                        name: '{!! $a !!}'
                    }, @endforeach ],
                    "pageLength": 25,
                    "language": {
                        "decimal": ",",
                        "thousands": ".",
                        "zeroRecords": "{!! trans('users.zerorecord') !!}",
                        "info": "{!! trans('users.tableinfo') !!}",
                        "loadingRecords": "{!! trans('users.tableloading') !!}",
                        "processing": "{!! trans('users.tablebusy') !!}",
                        {{--//"search": "Filter records:",--}}
                        "search": "{!! trans('users.tablesearch') !!}",
                        "infoEmpty": "{!! trans('users.tableinfoempty') !!}",
                        "infoFiltered": "{!! trans('users.tableinfofilter') !!}",
                        {{--"emptyTable": "{!! trans('users.tableempty') !!}",--}}
                        "lengthMenu": "{!! trans('users.tableregistros') !!}",
                        "emptyTable": "{!! trans('users.emptyTable') !!}",
                        "paginate": {
                            "first": "{!! trans('users.tablefirst') !!}",
                            "last": "{!! trans('users.tablelast') !!}",
                            "next": "{!! trans('users.tablenext') !!}",
                            "previous": "{!! trans('users.tableprevious') !!}",
                        },
                    },
                    "fnInitComplete": function (oSettings, json) {
                        $('#tablafoto').on('page.dt', function () {
                            cargarimagenes();
                            // FIXED: Removed nested click handler that was stacking
                            // on every pagination, causing exponential execution
                        }).removeClass('hidden').removeClass('hidden-xs-up');
                    },
                    {{--
            //"processing": true,
            //"serverSide": true,
                    --}}
                });
            });
        }
        if (tabvideo != undefined) {
                <?php
                $co = [
                    'id' => '#',
                    'url' => trans('video.video'),
                    'type' => trans('video.type'),
                    'tableid' => trans('video.stud'),
                    'name' => trans('video.tittles'),
                    'created_at' => trans('video.Uploaded'),
                    'action' => trans('video.delete'),
                ];
                ?>
            var url = $('#tablavideo').attr('data-url');
            axios.get(url).then(function (response) {
                s = response.data;
                table = $('#tablavideo').dataTable({
                    "order": [[0, "desc"]],
                    "data": s,
                    "columns": [@foreach($co as $f=>$a)
                    {
                        data: '{!! $f !!}',
                        name: '{!! $a !!}'
                    }, @endforeach ],
                    "pageLength": 25,
                    "language": {
                        "decimal": ",",
                        "thousands": ".",
                        "zeroRecords": "{!! trans('users.zerorecord') !!}",
                        "info": "{!! trans('users.tableinfo') !!}",
                        "loadingRecords": "{!! trans('users.tableloading') !!}",
                        "processing": "{!! trans('users.tablebusy') !!}",
                        {{--//"search": "Filter records:",--}}
                        "search": "{!! trans('users.tablesearch') !!}",
                        "infoEmpty": "{!! trans('users.tableinfoempty') !!}",
                        "infoFiltered": "{!! trans('users.tableinfofilter') !!}",
                        {{--"emptyTable": "{!! trans('users.tableempty') !!}",--}}
                        "lengthMenu": "{!! trans('users.tableregistros') !!}",
                        "emptyTable": "{!! trans('users.emptyTable') !!}",
                        "paginate": {
                            "first": "{!! trans('users.tablefirst') !!}",
                            "last": "{!! trans('users.tablelast') !!}",
                            "next": "{!! trans('users.tablenext') !!}",
                            "previous": "{!! trans('users.tableprevious') !!}",
                        },
                    },
                    "fnInitComplete": function (oSettings, json) {
                        $('#tablavideo').on('page.dt', function () {
                            cargarimagenes();
                            // FIXED: Removed nested click handler stacking
                        });
                    },
                    {{--
            //"processing": true,
            //"serverSide": true,
                    --}}
                }).removeClass('hidden').removeClass('hidden-xs-up');
            });

        }
        if ($('#tabla') !== undefined) {
            var table = undefined, m = 0;
            /*$(document).ready(function () {*/
            if (table !== undefined) {
                if (table.name !== undefined) {
                    m = 1;
                }
            }
            if (m !== 1) {
                var horseindex = $('#TablaAdmin');
                var normal = $('#tabla');
                if (horseindex != undefined) {
                    var url = $('#TablaAdmin').attr('data-url');
                    <?php
                        if (\Auth::check() && (\Auth::user()->isAdm() or \Auth::user()->Asociado())) {
                            $columnsHorse1 = [
                                'id' => '#',
                                'img' => 'Imagen',
                                'stud' => trans('horse.attrib.stud'),
                                'name' => trans('horse.attrib.name'),
                                'raza' => trans('horse.attrib.raza'),
                                'sex' => trans('horse.attrib.sex'),
                                'color' => trans('horse.attrib.color'),
                                'price' => trans('horse.attrib.price'),
                                'action' => trans('photo.delete'),
                            ];
                        } else {
                            $columnsHorse1 = [
                                'name' => trans('horse.attrib.name'),
                                'img' => trans('stud.photos'),
                                'raised' => trans('horse.attrib.raised'),
                                'birthdate' => trans('horse.age'),
                                'raza' => trans('horse.attrib.raza'),
                                'doma' => trans('horse.attrib.doma'),
                                'sex' => trans('horse.attrib.sex'),
                                'stud' => trans('horse.attrib.stud'),
                                'color' => trans('horse.attrib.color'),
                                'tosold' => trans('horse.attrib.tosold'),
                                'price' => trans('horse.attrib.price'),
                                'action' => trans('users.see'),
                            ];
                        }
                        ?>
                        table = $('#TablaAdmin').dataTable({
                        "order": [[0, "desc"]],
                        "pageLength": 25,
                        "language": {
                            "decimal": ",",
                            "thousands": ".",
                            {{--//"lengthMenu": "Mostrando _MENU_ registros por pagina",--}}
                            "zeroRecords": "{!! trans('users.zerorecord') !!}",
                            "info": "{!! trans('users.tableinfo') !!}",
                            "loadingRecords": "{!! trans('users.tableloading') !!}",
                            "processing": "{!! trans('users.tablebusy') !!}",
                            {{--//"search": "Filter records:",--}}
                            "search": "{!! trans('users.tablesearch') !!}",
                            "infoEmpty": "{!! trans('users.tableinfoempty') !!}",
                            "infoFiltered": "{!! trans('users.tableinfofilter') !!}",
                            {{--"emptyTable": "{!! trans('users.tableempty') !!}",--}}
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
                        "ajax": url,
                        "columns": [
                                @foreach($columnsHorse1 as $f=>$a)
                            {
                                data: '{!! $f !!}', name: '{!! $a !!}'
                            },
                            @endforeach
                        ]
                    }).removeClass('hidden').removeClass('hidden-xs-up');
                } else if (normal != undefined) {
                    table = $('#tabla').dataTable({
                        "order": [[0, "desc"]],
                        "pageLength": 25,
                        "language": {
                            "decimal": ",",
                            "thousands": ".",
                            {{--//"lengthMenu": "Mostrando _MENU_ registros por pagina",--}}
                            "zeroRecords": "{!! trans('users.zerorecord') !!}",
                            "info": "{!! trans('users.tableinfo') !!}",
                            "loadingRecords": "{!! trans('users.tableloading') !!}",
                            "processing": "{!! trans('users.tablebusy') !!}",
                            {{--//"search": "Filter records:",--}}
                            "search": "{!! trans('users.tablesearch') !!}",
                            "infoEmpty": "{!! trans('users.tableinfoempty') !!}",
                            "infoFiltered": "{!! trans('users.tableinfofilter') !!}",
                            {{--"emptyTable": "{!! trans('users.tableempty') !!}",--}}
                            "lengthMenu": "{!! trans('users.tableregistros') !!}",
                            "emptyTable": "{!! trans('users.emptyTable') !!}",
                            "paginate": {
                                "first": "{!! trans('users.tablefirst') !!}",
                                "last": "{!! trans('users.tablelast') !!}",
                                "next": "{!! trans('users.tablenext') !!}",
                                "previous": "{!! trans('users.tableprevious') !!}",
                            },
                        },
                        "fnInitComplete": function (oSettings, json) {
                            $('#tabla').removeClass('hidden-xs-up').on('page.dt', function () {
                                {{--
                                //var info = table.page.info();
                                //console.log( 'Showing page: '+info.page+' of '+info.pages );
                                console.dir(oSettings);
                                --}}
                                cargarimagenes();
                                $('.page-link').on('click', function () {
                                    cargarimagenes();
                                });
                            });
                        },
                        {{--
                //"processing": true,
                //"serverSide": true,
                        --}}
                    }).removeClass('hidden').removeClass('hidden-xs-up');
                }

            }
            $(window).hover(function () {
                cargarimagenes();
            });
            $('#tabla tbody').on('click', 'tr', function () {
                console.log('clicl');
            });
        }

        if ($('#tablah') !== undefined) {
            var table = undefined, m = 0;
            <?php
                if (\Auth::check() && (\Auth::user()->isAdm() or \Auth::user()->Asociado())) {
                    $columnsHorse1 = [
                        'id' => '#',
                        'img' => 'Imagen',
                        'stud' => trans('horse.attrib.stud'),
                        'name' => trans('horse.attrib.name'),
                        'raza' => trans('horse.attrib.raza'),
                        'sex' => trans('horse.attrib.sex'),
                        'color' => trans('horse.attrib.color'),
                        'price' => trans('horse.attrib.price'),
                        'action' => trans('photo.delete'),
                    ];
                } else {
                    $columnsHorse1 = [
                        'name' => trans('horse.attrib.name'),
                        'img' => trans('stud.photos'),
                        'raised' => trans('horse.attrib.raised'),
                        'birthdate' => trans('horse.age'),
                        'raza' => trans('horse.attrib.raza'),
                        'doma' => trans('horse.attrib.doma'),
                        'sex' => trans('horse.attrib.sex'),
                        'stud' => trans('horse.attrib.stud'),
                        'color' => trans('horse.attrib.color'),
                        'tosold' => trans('horse.attrib.tosold'),
                        'price' => trans('horse.attrib.price'),
                        'action' => trans('users.see'),
                    ];
                }
                ?>
            if (table !== undefined) {
                if (table.name !== undefined) {
                    m = 1;
                }
            }
            if (m !== 1) {
                table = $('#tablah').dataTable({
                    "order": [[0, "asc"]],
                    "pageLength": 25,
                    "language": {
                        "decimal": ",",
                        "thousands": ".",
                        {{--//"lengthMenu": "Mostrando _MENU_ registros por pagina",--}}
                        "zeroRecords": "{!! trans('users.zerorecord') !!}",
                        "info": "{!! trans('users.tableinfo') !!}",
                        "loadingRecords": "{!! trans('users.tableloading') !!}",
                        {{--//"processing": "{!! trans('users.tablebusy') !!}",--}}
                                {{--//"search": "Filter records:",--}}
                        "search": "{!! trans('users.tablesearch') !!}",
                        "infoEmpty": "{!! trans('users.tableinfoempty') !!}",
                        "infoFiltered": "{!! trans('users.tableinfofilter') !!}",
                        {{--"emptyTable": "{!! trans('users.tableempty') !!}",--}}
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
                        $('#tablah').removeClass('hidden-xs-up').on('page.dt', function () {
                            cargarimagenes();
                            $('.page-link').on('click', function () {
                                cargarimagenes();
                            });
                        });
                    },
                }).removeClass('hidden').removeClass('hidden-xs-up');
            }
            $(window).hover(function () {
                cargarimagenes();
            });
            $('#tablah tbody').on('click', 'tr', function () {
                console.log('clicl');
                {{--//var data = table.row(this).data();
                //alert('You clicked on ' + data[0] + '\'s row');--}}
            });

        }

        ;
        if ($('#tablaw') !== undefined) {

            var table = $('#tablaw').dataTable({
                "order": [[0, "asc"]],
                "pageLength": 25,
                "language": {
                    "decimal": ",",
                    "thousands": ".",
                    "zeroRecords": "{!! trans('users.zerorecord') !!}",
                    "info": "{!! trans('users.tableinfo') !!}",
                    "loadingRecords": "{!! trans('users.tableloading') !!}",
                    "search": "{!! trans('users.tablesearch') !!}",
                    "infoEmpty": "{!! trans('users.tableinfoempty') !!}",
                    "infoFiltered": "{!! trans('users.tableinfofilter') !!}",
                    "lengthMenu": "{!! trans('users.tableregistros') !!}",
                    "emptyTable": "{!! trans('users.emptyTable') !!}",
                    "paginate": {
                        "first": "{!! trans('users.tablefirst') !!}",
                        "last": "{!! trans('users.tablelast') !!}",
                        "next": "{!! trans('users.tablenext') !!}",
                        "previous": "{!! trans('users.tableprevious') !!}",

                    },

                },

                "fnInitComplete": function (oSettings, json) {
                    $('#tabla').on('page.dt', function () {
                        cargarimagenes();
                        $('.page-link').on('click', function () {
                            cargarimagenes();
                        });
                    });
                },
            });

        }
        $(window).on('load', function () {
            $('table').removeClass('hidden').removeClass('hidden-xs-up');
        });

        <?php $cd = null; ?>
        @if(!empty($cd))
    </script>
@endif
