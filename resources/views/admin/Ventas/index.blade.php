@extends('backend.layouts.base')
{{--@section('pagetitle', '<i class="fa fa-pagelines"></i>  '.trans('sell.new') )--}}
@section('title', trans('sell.Tittle') )

@section('topcss')

    <style>

        .pad-5-5 {
            padding-left: 5px;
            padding-right: 5px;
        }

        .plotter, .plotter2 {
            width: 100%;
            height: 400px;
        }
    </style>

@endsection
@section('content')
    {{--
    Sumatoria Total Mes / Años
    Filtro de Grafico que funcione tambien para tablav
    --}}
    <div id="datos" class="card col-12">
        <div class="card-block">
            <div class='card-header bg-white '>
                <i class="fa fa-ticket"></i>
                Grafico de ventas

            </div>
            <div class="row">
                <div class="col-12 row m-t-35">
                    <div class="col-2 row">
                        <label for="" class="text-center col-12">Tipo</label>
                        <select {{--onchange="ObtenerDato()"--}} name="tipo" id="tipo" class="form-control col-12">
                            <option value="0">Ventas</option>
                            <option value="1">Suscripciones</option>
                        </select>
                    </div>
                    <div class="col-2 row">
                        <label for="" class="text-center col-12">Año</label>
                        <select {{--onchange="ObtenerDato()"--}} name="ano" id="ano" class="form-control col-12">
                            <option value="0">2017</option>
                            <option value="1">2018</option>
                        </select>
                    </div>

                    <div class="col-2 row">
                        <label for="" class="text-center col-12">Desde</label>
                        <select {{--onchange="ObtenerDato()"--}} name="mesini" id="" class="form-control  col-12">
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                    <div class="col-2 row">
                        <label for="" class="text-center col-12">Hasta</label>
                        <select {{--onchange="ObtenerDato()"--}} name="mesfin" id="mesfin" class="form-control  col-12">
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                    <div class="col-2 row">
                        <label for="" class="text-center col-12"> </label>
                        <span class="btn btn-warning" onclick="ObtenerDato()"> Obtener Datos</span>
                    </div>
                </div>
                <div class="col-lg-12 m-t-25 row">
                    <div class="plotter">
                        <div id="placeholder" class="demo-placeholder plotter"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Clientes--}}

    <div id="datos" class="card col-12  m-t-35">
        <div class="card-block">
            <div class='card-header bg-white '>
                <i class="fa fa-ticket"></i>
                Otros Datos
                {{--<span class="pull-right"> nuevo</span>--}}
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <div class="col-xs-12  col-sm-12 col-md-6 col-lg-3 col-xl-3 m-t-35">
                            <div class="col-xs-12  ">
                                <div class="card">
                                    <div class="card-header bg-white">
                                    <span class="card-title">
                                        <span style="padding-right: 10px;">
                                            Yeguadas Totales
                                        </span>
                                        <span class="badge badge-pill badge-warning notifications_badge_top">
                                            {!! (count($clientesPago)  +  count($clientesFalso)) !!}
                                        </span>

                                    </span>
                                        <span class="float-right">
                                        <i class="fa fa-chevron-up"></i>
                                    </span>
                                    </div>
                                    <div class="card-block row">
                                        <div class="col-12">
                                            Pago :
                                            <span class="badge badge-pill badge-warning notifications_badge_top">
                                            {!! count($clientesPago) !!}
                                        </span>
                                            <br>
                                            No han pagado :
                                            <span class="badge badge-pill badge-warning notifications_badge_top">
                                            {!! count($clientesFalso) !!}
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12  m-t-35">
                                <div class="card">
                                    <div class="card-header bg-white">
                                    <span class="card-title">
                                        <span style="padding-right: 10px;">
                                            Yeguadas este mes
                                        </span>
                                        <span class="badge badge-pill badge-warning notifications_badge_top">
                                            {!! (count($clientesPagoMes)  +  count($clientesFalsoMes)) !!}
                                        </span>
                                    </span>
                                        <span class="float-right">
                                        <i class="fa fa-chevron-up"></i>
                                    </span>
                                    </div>
                                    <div class="card-block row">
                                        <div class="col-12">
                                            Pago :
                                            <span class="badge badge-pill badge-warning notifications_badge_top">
                                            {!! count($clientesPagoMes) !!}
                                        </span><br>
                                            No han pagado :
                                            <span class="badge badge-pill badge-warning notifications_badge_top">
                                            {!! count($clientesFalsoMes) !!}
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12  col-sm-12 col-md-6 col-lg-9 col-xl-9 m-t-35 ">
                            <div class="plotter">
                                <div id="placeholder2" class="demo-placeholder plotter"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Lista de pagos--}}
    <div id="datos" class="card col-12  m-t-35">
        {{--Filtro mes, Filtro Año--}}
        <div class="card-block">
            <div class='card-header bg-white '>
                <i class="fa fa-ticket"></i>
                Lista de pagos
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">

                        <div class=" col-12 table-responsive noSwipe m-t-20">
                            <table id="tablav" class="table table-striped table-hover" cellspacing="0">
                                <thead>

                                <tr>
                                    <th> #</th>
                                    <th> Total</th>
                                    <th> Detalle</th>
                                    {{--<th> Cupones </th>--}}
                                    <th> %</th>
                                    <th> Cupones</th>
                                    <th> Moneda</th>
                                    {{--<th> Usuario</th>--}}
                                    <th> Yeguada</th>
                                    <th> Pago Id</th>
                                    <th> Fecha</th>


                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (!isset($pagos)) {

                                    $pagos = App\Model\Orden::where('id', '!=', 0)->get();
                                }

                                ?>
                                @foreach($pagos as $c)

                                    <tr>
                                        <td>{!! $c->id !!} </td>
                                        <td class="text-right"> {!! $c->getAmountFormat()  !!} </td>
                                        {{--<td>{!! $c->cupones !!} </td>--}}
                                        {{--<td>{!! $c->cupones !!} </td>--}}
                                        <td>
                                            @if(count($c->ordenitems()->get())!=0)
                                                @foreach($c->ordenitems()->get() as $s => $d)
                                                    @if($d->servicio_id == 1 and $d->tipo_servicio  == 0)

                                                        Sus. {!! $d->cantidad !!} @if($d->cantidad == 1)Mes @else
                                                            Meses  @endif {!! $d->subtotal !!} <i class="fa fa-eur"></i>
                                                    @else
                                                        {!! $d->servicio_id !!}- {!! $d->tipo_servicio !!}
                                                    @endif
                                                    {{--{!! $d->subtotal !!}--}}
                                                    <br>
                                                @endforeach


                                            @endif
                                        </td>
                                        <td class="text-right">{!! $c->getDiscountFormat() !!} </td>
                                        {{--<td>{!! $c->getUserName() !!} </td>--}}
                                        <td></td>
                                        <td></td>
                                        <td>{!! $c->getStudName() !!} </td>
                                        <td>{!! $c->payment_id !!} </td>
                                        <td>{!! Funciones::AjustarFechaDmySlash($c->created_at) !!} </td>

                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('bottomjs')
    <script language="javascript" type="text/javascript" src="{!! url('flot/excanvas.min.js') !!}"></script>
    <script language="javascript" type="text/javascript" src="{!! url('flot/jquery.flot.js') !!}"></script>
    <script>
        $(document).ready(function () {


            var table = $('#tablav').dataTable({
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
                    "lengthMenu": "{!! trans('users.tableregistros') !!}",
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
                    $('#tablav').on('page.dt', function () {
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
            {{--}}
            var t1 = $('#tablav').dataTable({
                "ajax": {
                    'url':"{!! route('fotospost.index') !!}",
                    'type':'POST',
                    'beforeSend':function(request){
                        console.log("EEEEEEEEEEEEEEEEEEE");
                        request.setRequestHeader("X-CSRF-TOKEN",token);
                        request.setRequestHeader("csrftoken",token);
                    }

                },
            });
            --}}
            {{--
            t1.ajax.url("http://horse.com/admin/Fotos").load();
                //.url("{!! route('fotospost.index') !!}").load();
            //"http://horse.com/admin/Fotos"
            --}}
            //table.ajax.url("http://horse.com/admin/Fotos").load();

            $(window).hover(function () {
                cargarimagenes();
            });
            $('#tablav tbody').on('click', 'tr', function () {
                console.log('clicl');
                //var data = table.row(this).data();
                //alert('You clicked on ' + data[0] + '\'s row');
            });
        });


        var alreadyFetched = {};

        function ObtenerDato() {
            var Tipo = $('#tipo').val();
            var mesinicio = $('#mesinicio').val();
            var ano = $('#ano').val();
            var mesfin = $('#mesfin').val();
            var datas = new FormData();

            datas.append('data', Tipo);
            datas.append('ano', ano);
            datas.append('mesinicio', mesinicio);
            datas.append('mesfin', mesfin);
            axios.post('{!! route('ventas.datos') !!}', datas)
                .then(function (response) {
                    var options = {
                        lines: {
                            show: true
                        },
                        points: {
                            show: true
                        },
                        xaxis: {
                            tickDecimals: 0,
                            tickSize: 1
                        }
                    };

                    var data = [];
                    var series = response.data;

                    var firstcoordinate = "(" + series.data[0][0] + ", " + series.data[0][1] + ")";
                    //button.siblings("span").text("Fetched " + series.label + ", first point: " + firstcoordinate);

                    // Push the new data onto our existing data array

                    if (!alreadyFetched[series.label]) {
                        alreadyFetched[series.label] = true;
                        data.push(series);
                    }


                    $.plot("#placeholder", data, options);
                    $.plot("#placeholde2r", data, options);

                    {{-- swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('clientes.newclientadviceok') !!}',
                        'success'
                    );--}}

                })
                .catch(function (error) {
                    //var err = eval(xhr.responseText.sms);
                    var e = error;
                    console.dir(e);
                    var v = e.message;
                    swal({
                        title: '{!! trans('users.tittleerror') !!}',
                        html: '{!! trans('clientes.newclientadvicebad') !!}<br>' + v,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                    $('.save').prop('disabled', false);
                });
        }

        $(function () {

            var options = {
                lines: {
                    show: true
                },
                points: {
                    show: true
                },
                xaxis: {
                    tickDecimals: 0,
                    tickSize: 1
                }
            };

            var data = [];

            $.plot("#placeholder", data, options);
            $.plot("#placeholder2", data, options);

            // Fetch one series, adding to what we already have

            var alreadyFetched = {};

            $("button.fetchSeries").click(function () {

                var button = $(this);

                // Find the URL in the link right next to us, then fetch the data

                var dataurl = button.siblings("a").attr("href");

                function onDataReceived(series) {

                    // Extract the first coordinate pair; jQuery has parsed it, so
                    // the data is now just an ordinary JavaScript object

                    var firstcoordinate = "(" + series.data[0][0] + ", " + series.data[0][1] + ")";
                    button.siblings("span").text("Fetched " + series.label + ", first point: " + firstcoordinate);

                    // Push the new data onto our existing data array

                    if (!alreadyFetched[series.label]) {
                        alreadyFetched[series.label] = true;
                        data.push(series);
                    }

                    $.plot("#placeholder", data, options);
                    $.plot("#placeholder2", data, options);
                }

                $.ajax({
                    url: dataurl,
                    type: "GET",
                    dataType: "json",
                    success: onDataReceived
                });
            });

            // Initiate a recurring data update

            $("button.dataUpdate").click(function () {

                data = [];
                alreadyFetched = {};

                $.plot("#placeholder", data, options);
                $.plot("#placeholder2", data, options);

                var iteration = 0;

                function fetchData() {

                    ++iteration;

                    function onDataReceived(series) {

                        // Load all the data in one pass; if we only got partial
                        // data we could merge it with what we already have.

                        data = [series];
                        $.plot("#placeholder", data, options);
                        $.plot("#placeholder2", data, options);
                    }

                    // Normally we call the same URL - a script connected to a
                    // database - but in this case we only have static example
                    // files, so we need to modify the URL.

                    $.ajax({
                        url: "data-eu-gdp-growth-" + iteration + ".json",
                        type: "GET",
                        dataType: "json",
                        success: onDataReceived
                    });

                    if (iteration < 5) {
                        setTimeout(fetchData, 1000);
                    } else {
                        data = [];
                        alreadyFetched = {};
                    }
                }

                setTimeout(fetchData, 1000);
            });

            // Load the first series by default, so we don't have an empty plot

            {{--$("button.fetchSeries:first").click();--}}

            // Add the Flot version string to the footer

            $("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
        });


    </script>
@endsection