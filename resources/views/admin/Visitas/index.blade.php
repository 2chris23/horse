@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )


@section('content')

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                Listado de tus caballos
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <div class=" col-12 table-responsive noSwipe">
                            <table id="tablavis" class="table table-striped table-hover" style="border-collapse: none !important;">
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
                                @foreach($clientes as $c)
                                    <tr>
                                        @foreach($columns as $k=>$v)

                                            <td>
                                                @if($k == "url")
                                                    <img src="{!! $c->getYoutubeThumb() !!}" alt="">
                                                @elseif($k == "id")
                                                    {!! Funciones::RellenarCeros($c->id) !!}
                                                @elseif($k == "color")
                                                    {!! $c->getColorString() !!}

                                                @elseif($k == "raised")
                                                    {!! $c->getRaisedFormat() !!}

                                                @elseif($k == "sex")
                                                    {!! $c->getSexString() !!}

                                                @elseif($k == "price")
                                                    {!! $c->getPriceMil() !!}

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
                                            <a href="{!! route('clientes.edit',['id'=>$c->id]) !!}">
                                                <i class="fa fa-eye text-success"></i>
                                            </a>
                                            <a href="{!! route('clientes.edit',['id'=>$c->id]) !!}">
                                                <i class="fa fa-eye text-success"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="offset-3 col-6 text-center ">
                            {{$clientes->render()}}
                        </div>
                        <div class="offset-3 col-6  text-center">
                            <div class="row">
                                <div class="col-4 ">
                                    <a href="{!! route('clientes.create') !!}"
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

@section('bottomjs')
    <script>
        $(document).ready(function () {
            var table = $('#tablavis').DataTable({
                "order": [[0, "desc"]],
                "pageLength": 25,
                "language": {
                    "decimal": ",",
                    "thousands": ".",
                    //"lengthMenu": "Mostrando _MENU_ registros por pagina",
                    "zeroRecords": "{!! trans('users.zerorecord') !!}",
                    "info": "{!! trans('users.tableinfo') !!}",
                    "loadingRecords": "{!! trans('users.tableloading') !!}",
                    "processing": "{!! trans('users.tablebusy') !!}",
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
                    {{--
                    "ajax": {
                        "url": "data.json",

                        "dataSrc": function (json) {
                            for (var i = 0, ien = json.length; i < ien; i++) {
                                json[i][0] = '<a href="/message/' + json[i][0] + '>View message</a>';
                            }
                            return json;
                        }
                    }
                    --}}
                }
            });

            $('th').css('border', 'none!important');

            $('#tablavis tbody').on('click', 'tr', function () {
                console.log('clicl');
                //var data = table.row(this).data();
                //alert('You clicked on ' + data[0] + '\'s row');
            });
        });
    </script>
@endsection