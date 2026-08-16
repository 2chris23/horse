@extends('backend.layouts.base')
@section('title', trans('Titulos.SellStud') )
{{--@section('pagetitle', '<i class="fa fa-pagelines"></i>  '.trans('sell.new') )--}}
@section('topcss')

    {{--<link href="{{asset('assets/css/pages/flot_charts.css')}}" rel="stylesheet" type="text/css">--}}
@endsection
@section('topjs')

    <style>
        .m-h-400 {
            max-height: 400px !important;
        }

        .plotter, .plotter2 {
            width: 100%;
            min-height: 400px;
        }
.f-s-18{
    font-size:18px;
}

    </style>
@endsection
@section('content')

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                <div class="row">
                    <div class="col-9">
                        {!! trans('sell.graficoventa')!!}
                        @if(isset($inicial)) ({!! $inicial !!}) @endif

                    </div>

                    {{--
                    <div class="col-3 pull-right">
                        <a href="{!! route('StudClientes.index') !!}"
                           class="save btn btn-warning glow_button pull-right">
                            {!! trans('users.return') !!}
                        </a>
                    </div>
                    --}}
                </div>
            </div>
            <form class="row m-t-20" action="{!! route('sell.cambio') !!}" method="post">
                {!! csrf_field() !!}
                <div class="col-12 row pull-right">
                    <div class="col-10 text-center f-s-18">
                        {{-- 
                        @foreach($raza as $k=>$v)

                        @foreach($v as $f=>$g)
                        <span class="badge badge-warning">
                                <b>{!!trans('horse.raza.'.$f)!!}</b>
                                    {!! $g !!}
                            </span>
                        @endforeach
                        @endforeach
                        --}}


                        @foreach($sexos as $k=>$v)

                        @foreach($v as $f=>$g)
                        <span class="badge badge-warning">
                                <b>{!!trans('horse.sexs.'.$f)!!}</b>
                                    {!! $g !!}
                            </span>
                        @endforeach
                        @endforeach
                    </div>

                    <div class="col-2 ">
                        <select name="primero" id="primero" class="form-control" onchange="$('#btnsendinfo').click()">
                            @foreach($anios as $k=>$v)
                                <option value="{!! $v!!}"
                                        @if(isset($inicial))
                                        @if($v == $inicial)
                                        selected
                                        @endif
                                        @endif
                                >{!! ($v) !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2 hidden-xs-up">
                        <input type="submit" class="btn btn-warning" id="btnsendinfo" value="Consultar">
                    </div>
                    {{--
                    <div class="col-2 ">
                        <select name="segundo" id="segundo" class="form-control">
                            @foreach($anios as $k=>$v)
                                <option value="{!! $v!!}">{!! ($v) !!}</option>
                            @endforeach
                        </select>
                    </div>
                    --}}

                </div>
                <div class="col-lg-12 m-t-25 table-responsive ">

                    <div class="col-12">
                        <div id="grafico" class="plotter"></div>

                    </div>


                </div>
            </form>
        </div>
    </div>

    <div id="datos" class="card col-12 m-t-35 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                <div class="row">
                    <div class="col-9">
                        {{trans('sell.listadeventa')}}
                        @if(count($venta) !=0)
                            <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! count($venta )!!}
                        </span>
                    </span>
                        @endif

                    </div>
                    {{--
                    <div class="col-3 pull-right">
                        <a href="{!! route('StudClientes.index') !!}"
                           class="save btn btn-warning glow_button pull-right">
                            {!! trans('users.return') !!}
                        </a>
                    </div>
                    --}}
                </div>
            </div>
            <div class="row">
                {{-- 
                                <div class="col-10 "></div>

<div class="col-2 m-t-20 ">
                        <select name="primero" id="primero" class="form-control" onchange="$('#btnsendinfo').click()">
                            @foreach($anios as $k=>$v)
                                <option value="{!! $v!!}"
                                        @if(isset($inicial))
                                        @if($v == $inicial)
                                        selected
                                        @endif
                                        @endif
                                >{!! ($v) !!}</option>
                            @endforeach
                        </select>
                    </div>

--}}
                <div class="col-lg-12 m-t-25 table-responsive ">
                    <table class="table table-striped table-hover" cellspacing="0" id="tabla">
                        <thead>
                        <tr>
                            @foreach($columns as $k=>$v)
                                <th>{!! $v !!}</th>
                            @endforeach

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($venta as $k=>$v)
                            <tr>
                                @foreach($columns as $t=>$r)
                                    <td>


                                        @if($t == "doma")
                                            @if($v->doma == true or $v->doma == 1)
                                                {!! trans('horse.doma.1') !!}
                                            @else
                                                {!! trans('horse.doma.0') !!}
                                            @endif
                                        @elseif($t == "img")
                                            @php($i = 0)
                                            @foreach($v->getPhotoModel() as $o=>$p)
                                                @if($i == 0)
                                                    @include('backend.common.galleryimage',['titulo'=>$p->getName(),'sold'=>$v->sold,'id'=>$p->id,'imagen'=>$p->getUrl(),'adminpanel'=>1,'size'=>$p->Size()])
                                                    @php($i=1)

                                                @endif
                                            @endforeach

                                        @elseif($t == "color")
                                            {!! $v->getColorString() !!}

                                        @elseif($t == "raised")
                                            {!! $v->getRaisedFormat() !!}

                                        @elseif($t == "sex")
                                            {!! $v->getSexString() !!}

                                        @elseif($t == "price")
                                            @if(!empty($v->price) )

                                                @if($v->price !=0)
                                                    {{--{!! $v->getPriceMil() !!} €--}}
                                                    {!! $v->ObtenPrecioMonedaMill() !!}
                                                    {!! $v->getSimboloMoneda() !!}
                                                @endif
                                            @else
                                                @if($v->getTosold() == true)
                                                    {!! trans('users.pricecheck1') !!}
                                                @endif
                                            @endif
                                        @elseif($t == "name")
                                            <a href="{!! route('sell.show',['id'=>$v->id]) !!}">
                                                {!! $v->{$t} !!}
                                            </a>
                                        @elseif($t == "raza")
                                            {!! trans('horse.raza.'.$v->raza) !!}
                                        @elseif($t == "birthdate")
                                            @php
                                                $edad = $v->getAge();
                                        $mes = $v->getAgeMonth();
                                            @endphp


                                            @if($edad!=0)
                                                {!! trans('horse.years',['ano'=>$edad]) !!}
                                            @else
                                                {!! trans('horse.mes',['mes'=>$mes]) !!}
                                            @endif

                                        @elseif($t == "sold")
                                            @if(!empty($v->Ventas()->first()))
                                                {!! Funciones::AjustarFechaDmySlash($v->Ventas()->first()->date) !!}

                                            @endif
                                            {{--
                                            @if($v->getTosold() == true)
                                                {!! trans('horse.tosold.1') !!}
                                            @endif
                                            --}}
                                        @else
                                            {!! $v->{$t} !!}
                                        @endif
                                    </td>
                                @endforeach

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection




@section('bottomjs')
    <script language="javascript" type="text/javascript" src="{!! url('flot/excanvas.min.js') !!}"></script>
    <script language="javascript" type="text/javascript" src="{!! url('flot/jquery.flot.js') !!}"></script>
    <script language="javascript" type="text/javascript" src="{!! url('flot/jquery.flot.time.min.js') !!}"></script>
    <script language="javascript" type="text/javascript" src="{!! url('flot/jquery.flot.navigate.min.js') !!}"></script>

    {{--{!! dd( trans('sell.horsesell')) !!}--}}
    <script>
        var previousPoint = null, previousLabel = null;
        $.fn.UseTooltip = function () {
            $(this).bind("plothover", function (event, pos, item) {
                if (item) {
                    if ((previousLabel != item.series.label) ||
                        (previousPoint != item.dataIndex)) {
                        previousPoint = item.dataIndex;
                        previousLabel = item.series.label;
                        $("#tooltip").remove();

                        var x = item.datapoint[0];
                        var y = item.datapoint[1];

                        var color = item.series.color;

                        showTooltip(item.pageX,
                            item.pageY,
                            color,
                            "<strong>" + item.series.label + "</strong><br>"+
                            {{-- "<strong>Mes :</strong> " + (new Date(x).getMonth() + 1) + "/" + new Date(x).getFullYear() + --}}
                            "<strong>Venta : " + y + "</strong>");
                    }
                } else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            });
        };

        function showTooltip(x, y, color, contents) {
            $('<div id="tooltip">' + contents + '</div>').css({
                position: 'absolute',
                display: 'none',
                top: y - 10,
                left: x + 10,
                border: '2px solid ' + color,
                padding: '3px',
                'font-size': '9px',
                'border-radius': '5px',
                'background-color': '#fff',
                'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
                opacity: 0.9
            }).appendTo("body").fadeIn(200);
        }

        var d1 = [
                @foreach($ventas as $k=>$v)
                @foreach($v as $r=>$s)
            [(new Date({!! $k !!},{!! ($r-1) !!}, 1, 0, 0, 0, 0)).getTime(),{!! count($s) !!}],
            @endforeach
            @endforeach
        ];
        var da = [{
            label: 'Ventas',
            data: d1,
            color: "#0077FF",

        }];
        var tmin = (new Date({!! Funciones::AjustarFechaParaJs($datemin) !!})).getTime();
        var tmax = (new Date({!! Funciones::AjustarFechaParaJs($datemax) !!})).getTime();
        var f = $.plot("#grafico", [
                {

                    label: "{!! Funciones::ReemplazarApostrofe(trans('sell.horsesell')) !!}",
                    data: d1,
                    color: "#3a8ce5"
                }],

            {
                yaxis: {
                    {{--//zoomRange: [0.1, 50],--}}

                    axisLabel: "{!! Funciones::ReemplazarApostrofe(trans('sell.Tittle')) !!}",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Verdana, Arial',
                    axisLabelPadding: 3,

                    {{--tickFormatter: function (v, axis) {
                                    return $.formatNumber(v, { format: "#,###", locale: "us" });
                                },--}}
                    {{-- tickSize: 1, --}}
                    minTickSize:1,
                    tickDecimals: 0
                }, {{--
                zoom: {
                    interactive: true,
                }, --}}
                pan: {
                    interactive: true,
                },
                xaxis:
                    {
                        axisLabel: "Mes",
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'Verdana, Arial',
                        axisLabelPadding: 10,
                        {{--//zoomRange: [10, 100],
                                        //timeformat--}}
                        mode: "time",
                        {{--//min: tmin,
                                        //max: tmax,
                                        //ticks: d1,--}}
                        minTickSize: [1, "month"],
                        dayNames: [

                            @foreach(trans('sell.dia') as $k=>$v)
                                "{!! Funciones::ReemplazarApostrofe($v) !!}",
                            @endforeach
                        ],
                        monthNames: [
                            @foreach(trans('sell.meses') as $k=>$v)
                            /*"Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"*/
                            "{!! Funciones::ReemplazarApostrofe($v) !!}",
                            @endforeach
                        ],
                        {{--timeformat: "%m/%Y",--}}
                        timeformat: "%b, %Y",
                    },
                series: {
                    lines: {
                        show: true,
                        fill: false
                    },
                    points: {
                        show: true,
                    }
                },
                grid: {hoverable: true, clickable: true},
                legend: {
                    show: true
                }
            }
        );
        $("#grafico").UseTooltip();


        $(function () {


        });


    </script>
@endsection
