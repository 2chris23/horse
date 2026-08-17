@php
    use App\Model\Servicio;
use App\Model\Codigopromo;
@endphp
<?php $etiquetalabel = "col-xs-12 col-sm-12 col-md-12 col-lg-3 text-sm-left text-md-left text-lg-right "; ?>
<?php $tiquetainput = " col-xs-12 col-sm-12 col-md-12 col-lg-9 "; ?>
<?php $tiquetainputsmall =  " col-xs-8 col-sm-8 col-md-8 col-lg-4 "; ?>


<?php $etiquetalabelsmall = "col-xs-12 col-sm-12 col-md-12 col-lg-3 text-sm-left text-md-left text-lg-right "; ?>
<?php $tiquetainputsmall =  "col-xs-12 col-sm-12 col-md-12 col-lg-5 "; ?>
<?php $tiquetainputsmall2 = "col-xs-2  col-sm-2  col-md-2  col-lg-2 "; ?>
<?php $dstw = "Descuento(%)"; ?>


<?php $label2='col-xs-12 col-sm-12 col-md-12 col-lg-2 text-sm-left text-md-left text-lg-right '; ?>
<?php $label3='col-12 text-center '; ?>
<?php $mensual = Servicio::where('type',1)->first(); ?>
<?php $m1 = (!empty($mensual))?$mensual->getPrice():0; ?>
<?php $d[1]= (!empty($mensual))?$mensual->getDiscount():0; ?>
<?php $d[3]=  (!empty($mensual))?$mensual->ds3:0; ?>
<?php $d[6]=  (!empty($mensual))?$mensual->dst6:0; ?>
<?php $d[12]=  (!empty($mensual))?$mensual->dst12:0; ?>
@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )

@section('topcss')

    <style>
        .f-s-20{
            font-size: 20px;
        }
        .negro {
            font-weight: bolder;
        }
.number_val.total1{
    font-size: 30px;
}
.float-right.cards_content{
    padding-right: 10px;
}
.p-l-10{
    padding-right: 10px;
}
        .pad-5-5 {
            padding-left: 5px;
            padding-right: 5px;
        }
    </style>

@endsection
@section('content')

    <div id="datos" class="card col-12 m-t-35 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                Precio Mensualidad
                {{--
                Listado de posibles clientes @if(count($clientes) !=0)
                    <span style="padding-left:10px;"><span class="badge badge-pill badge-warning notifications_badge_top">{!! count($clientes )!!}</span>
                                                 </span>
                     @endif
                --}}
                <a href="#!" onclick="GuardarPlan()" class="btn btn-warning pull-right">Guardar</a>
            </div>
            <div class="row">
                <div class="card-block row">
                    <form class="row" id="precional">
                        <input type="hidden" name="idserv" class="hidden-xs-up" id="idserv"
                               value="{!! $mensual->id !!}">
                        <div class="col-2"></div>
                        <div class="col-3 row">
                            <div class="col-12">
                                <div class="form-group  m-t-25 row ">
                                    <label class="col-12 col-form-label text-center negro ">
                                        1 Mes
                                    </label>
                                    <div class="m-t-10 col-12 row form-group">
                                        <label for="mes1" class="col-4 col-form-label">
                                            Precio
                                        </label>
                                        {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 ">--}}
                                        <div class="col-8">
                                            <input
                                                    onchange="calculo()"
                                                    id="mes1"
                                                    name="mes1"
                                                    type="text" placeholder="{{trans('stud.placeholder.name')}}"
                                                    value="{!! $m1 !!}" class="form-control   numbers numeros">
                                        </div>
                                    </div>

                                    {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3  ">--}}
                                    <div class="col-12 row form-group">
                                        <label for="mes1" class="col-4">{!! $dstw !!}</label>
                                        <div class="col-8">
                                            <input
                                                    onchange="calculo()"
                                                    name="mes1dst"
                                                    id="mes1dst"
                                                    type="text"
                                                    value="{!! $d[1] !!}"

                                                    placeholder="%"
                                                    class="form-control  numbers percent">
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-4 row  m-t-35">
                            <div class="col-12">
                                <div class=" bg-warning top_cards">
                                    <div class="row icon_margin_left">

                                        <div class="col-5 icon_padd_left">
                                            <div class="float-left">
                                                <span class="fa-stack fa-sm">
                                                    {{--<i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-usd fa-stack-1x fa-inverse text-warning revenue_icon"></i>
                                                    <i class="fa fa-eur fa-stack-1x fa-inverse text-warning revenue_icon"></i>--}}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-7 icon_padd_right">
                                            <div class="float-right cards_content">

                                                <span class="number_val total1" id="">
                                                </span>
                                                <i class="fa fa-eur fa-2x"></i>

                                                <br>
                                                <span class="card_description ">
Mensualidad
                                                </span>

                                            </div>
                                        </div>
                                        {{--
                                        <div class="col-5"></div>
                                        <div class="col-7 icon_padd_right">
                                            <div class="float-right cards_content">
                                                3 Meses
                                                <span class="number_val total3" id="">
                                                </span>
                                                <i class="fa fa-long-arrow-up fa-2x"></i>
                                            </div>
                                        </div>

                                        <div class="col-5"></div>
                                        <div class="col-7 icon_padd_right">
                                            <div class="float-right cards_content">
                                                6 Meses
                                                <span class="number_val total6" id="">
                                                </span>
                                                <i class="fa fa-long-arrow-up fa-2x"></i>

                                            </div>
                                        </div>
                                        <div class="col-5"></div>
                                        <div class="col-7 icon_padd_right">
                                            <div class="float-right cards_content">
                                                12 Meses
                                                <span class="number_val total12" id="">
                                                </span>
                                                <i class="fa fa-long-arrow-up fa-2x"></i>
                                            </div>
                                        </div>
                                        --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="bg-white section_border ">
                                    <div class="row">
                                        <div class="col-sm-4 col-4 m-t-15">
                                            <div class="bg-white p-d-4 text-center">
                                                <h5 class="">3 Meses</h5>
                                                <span class="total3 f-s-20"></span> <i class="fa fa-eur"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-4 m-t-15">
                                            <div class="bg-white p-d-4 text-center">
                                                <h5 class="">6 Meses</h5>
                                                <span class="total6 f-s-20"></span><i class="fa fa-eur"></i>

                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-4 m-t-15">
                                            <div class="bg-white p-d-4 text-center">

                                                <h5 class="">12 Meses</h5>
                                                <span class="total12 f-s-20"></span><i class="fa fa-eur"></i>

                                            </div>
                                        </div>
                                    </div>
                                    {{--
                                    <div class="row">
                                        <div class="col-sm-4 col-4 text-center icons_border">
                                            <div class="fb_border_bottom">
                                                <h2 class="m-t-20 fb_icon_color"><span id="fb_count">60</span>%</h2>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-4 text-center icons_border">
                                            <div class="twitter_border_bottom">
                                                <h2 class="m-t-20 twitter_icon_color"><span id="twitter_count">25</span>%</h2>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-4 text-center">
                                            <div class="gplus_border_bottom">
                                                <h2 class="m-t-20 gplus_icon_color"><span id="gplus_count">15</span>%
                                                </h2>
                                            </div>
                                        </div>
                                        <!--</div>-->
                                    </div>
                                    --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group  m-t-25 row ">
                                <label class="col-4 col-form-label text-center ">
                                    Moneda
                                </label>
                                <div class=" col-8 row form-group">
                                    <select class=" form-control"
                                            data-style="btn-primary"
                                            id="mes1moneda"
                                            name="mes1moneda">


                                        <option data-tokens="0" value="0"
                                                selected
                                        >Euro
                                        </option>


                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-12"></div>
                        <div class="col-1"></div>
                        <div class="col-3 row">

                            <div class="form-group  m-t-25 row ">
                                <label class="col-12 col-form-label text-center negro ">
                                    3 Meses
                                </label>
                                <div class="m-t-10 col-12 row form-group">
                                    <label for="mes3" class="col-4 col-form-label p-l-10">
                                        Precio
                                    </label>
                                    {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 ">--}}
                                    <div class="col-8">
                                        <input
                                                onchange="calculo()"
                                                disabled
                                                id="mes3"
                                                name="mes3"
                                                type="text" placeholder="{{trans('stud.placeholder.name')}}"
                                                value="0" class="form-control   numbers numeros">
                                    </div>
                                </div>

                                {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3  ">--}}
                                <div class="col-12 row form-group">
                                    <label for="mes3" class="col-4">{!! $dstw !!}</label>
                                    <div class="col-8">
                                        <input
                                                onchange="calculo()"
                                                name="mes3dst"
                                                id="mes3dst"
                                                type="text"
                                                value="0"
                                                placeholder="%"
                                                class="form-control  numbers percent">
                                    </div>
                                </div>
                                <div class="{!! $label3 !!} row">
                                    <div class="col-4">
                                        Total:
                                    </div>
                                    <div class="col-4 text-right">
                                        <label class="total3  f-s-20"></label><i class="fa fa-eur"></i>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-3 row">
                            <div class="form-group  m-t-25 row ">
                                <label class="col-12 col-form-label text-center negro">
                                    6 Meses
                                </label>
                                <div class="m-t-10 col-12 row form-group">
                                    <label for="mes6" class="col-4 col-form-label">
                                        Precio
                                    </label>
                                    {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 ">--}}
                                    <div class="col-8">
                                        <input
                                                onchange="calculo()"
                                                disabled
                                                id="mes6"
                                                name="mes6"
                                                type="text" placeholder="{{trans('stud.placeholder.name')}}"
                                                value="0" class="form-control   numbers numeros">
                                    </div>
                                </div>

                                {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3  ">--}}
                                <div class="col-12 row form-group">
                                    <label for="mes6dst" class="col-4 p-l-10">{!! $dstw !!}</label>
                                    <div class="col-8">
                                        <input
                                                onchange="calculo()"

                                                name="mes6dst"
                                                id="mes6dst"
                                                type="text"
                                                value="0"
                                                placeholder="%"
                                                class="form-control  numbers percent">
                                    </div>
                                </div>
                                <div class="{!! $label3 !!} row">
                                    <div class="col-4">
                                        Total:
                                    </div>
                                    <div class="col-4 text-right">
                                        <label class="total6  f-s-20"></label><i class="fa fa-eur"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-3 row">
                            <div class="form-group  m-t-25 row ">
                                <label class="col-12 col-form-label text-center negro">
                                    12 Meses
                                </label>
                                <div class="m-t-10 col-12 row form-group">
                                    <label for="mes12" class="col-4 col-form-label">
                                        Precio
                                    </label>
                                    {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 ">--}}
                                    <div class="col-8">
                                        <input
                                                onchange="calculo()"
                                                disabled
                                                id="mes12"
                                                name="mes12"
                                                type="text" placeholder="{{trans('stud.placeholder.name')}}"
                                                value="0" class="form-control   numbers numeros">
                                    </div>
                                </div>

                                {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3  ">--}}
                                <div class="col-12 row form-group">
                                    <label for="mes12" class="col-4 p-l-10">{!! $dstw !!}</label>
                                    <div class="col-8">
                                        <input
                                                onchange="calculo()"

                                                name="mes12dst"
                                                id="mes12dst"
                                                type="text"
                                                value="0"
                                                placeholder="%"
                                                class="form-control  numbers percent">
                                    </div>
                                </div>
                                <div class="{!! $label3 !!} row">
                                    <div class="col-4">
                                        Total:
                                    </div>
                                    <div class="col-4 text-right">
                                        <label class="total12 f-s-20"></label><i class="fa fa-eur"></i>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    {{--
    <div id="datos" class="card col-12 m-t-35 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                Descuento
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <div class=" col-12 table-responsive noSwipe m-t-20">
                            descuento a los planes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --}}



    {{--Lista de pagos--}}
    {{--
    <div id="datos" class="card col-12  m-t-35">
        <div class="card-block">
            <div class='card-header bg-white '>
                <i class="fa fa-ticket"></i>
                Lista de pagos
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">

                        <div class=" col-12 table-responsive noSwipe m-t-20">
                            <table id="tabla" class="table table-striped table-hover" cellspacing="0">
                                <thead>

                                <tr>
                                    <th> #</th>
                                    <th> Total</th>
                                    <th> Descuentos</th>
                                    <th> Usuario</th>
                                    <th> Yeguada</th>
                                    <th> Pago Id</th>
                                    <th> Detalle</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    use App\Model\Orden;
                                    $pagos = Orden::where('id','!=',0)->get();

                                @endphp
                                @foreach($pagos as $c)

                                    <tr>
                                        <td>{!! $c->id !!} </td>
                                        <td class="text-right"> {!! $c->getAmountFormat()  !!} </td>

                                        <td class="text-right">{!! $c->getDiscountFormat() !!} </td>
                                        <td>{!! $c->getUserName() !!} </td>
                                        <td>{!! $c->getStudName() !!} </td>
                                        <td>{!! $c->payment_id !!} </td>

                                        <td>
                                            @if(count($c->ordenitems()->get())!=0)
                                                @foreach($c->ordenitems()->get() as $s => $d)
                                                    @if($d->servicio_id == 1 and $d->tipo_servicio  == 0)
                                                        1 Mes
                                                    @else
                                                        {!! $d->servicio_id !!}- {!! $d->tipo_servicio !!}
                                                    @endif
                                                    {!! $d->subtotal !!} <br>
                                                @endforeach


                                            @endif
                                        </td>


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
--}}

    {{--Codigos promocionales--}}
    <div class="modal fade in display_none" id="responsive" tabindex="-1" role="dialog" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">
                        Generar Codigo
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="modal-body">
                    <form class="row" id="nuevocodigo">
                        <div class="col-12 m-b-35">
                            <div class="col-9 m-t-35 row">
                                <div class="{!! $etiquetalabel !!}">
                                    Nombre:
                                </div>
                                <div class="{!! $tiquetainput !!}">
                                    <input type="text" name='nombre' class="form-control">
                                </div>
                            </div>
                            <div class="col-9 m-t-35 row">
                                <div class="{!! $etiquetalabel !!}">
                                    Codigo:
                                </div>
                                <div class="{!! $tiquetainput !!}">
                                    <input type="text" name='promocionales' class="form-control">
                                </div>
                            </div>
                            <div class="col-9 m-t-35 row">
                                <div class="{!! $etiquetalabel !!}">
                                    Fecha de inicio:
                                </div>
                                <div class="{!! $tiquetainput !!}">
                                    <input type="date" name='fechainicio' class="form-control">
                                </div>
                            </div>
                            <div class="col-9 m-t-35 row">
                                <div class="{!! $etiquetalabel !!}">
                                    Fecha de fin:
                                </div>
                                <div class="{!! $tiquetainput !!}">
                                    <input type="date" name='fechafin' class="form-control">
                                </div>
                            </div>
                            <div class="col-9 m-t-35 row">
                                <div class="{!! $etiquetalabel !!}">
                                    Descuento :
                                </div>
                                <div class="col-4">
                                    <input type="number" name='usos' value="0" class="form-control">
                                </div>
                                <div class="col-4">
                                    {{--check activo--}}
                                    {{--<input type="number" name='status' value="0" class="form-control">--}}
                                    <div class="{!! $tiquetainput !!} ">
                                        <input type="hidden" value="0" name="status" id="status">
                                        <button type="button" id="status_si"
                                                class=" btn btn-labeled btn-success hidden-xl-down ">
                                                    <span class="btn-label">
                                                    <i class="fa fa-check"> </i>
                                                </span>
                                            Activo
                                        </button>
                                        <button type="button" id="status_no"
                                                class=" btn btn-labeled btn-danger">
                                                <span class="btn-label">
                                                    <i class="fa fa-close"> </i>
                                                </span>
                                            Inactivo
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-9 m-t-35 row">
                                <div class="{!! $etiquetalabel !!}">
                                    Contraseña de Administrador:
                                </div>
                                <div class="{!! $tiquetainput !!}">
                                    <input type="password" name='psw' id='pwdc' class="form-control">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closer">Close</button>
                    <button type="button" onclick="CreteCod()" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div id="datos" class="card col-12  m-t-35">
        <div class="card-block">
            <div class='card-header bg-white '>
                <i class="fa fa-ticket"></i> Codigos promocionales
                <span class="pull-right">
                <a class="btn btn-success btn-md adv_cust_mod_btn" data-toggle="modal" data-href="#responsive"
                   href="#responsive">
                                Nuevo
                            </a><br>
                </span>
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <?php $codigos = Codigopromo::all(); ?>
                        <div class=" col-12 table-responsive noSwipe m-t-20">
                            <table id="tabla1" class="table table-striped table-hover" cellspacing="0">
                                <thead>

                                <tr>
                                    <th> #</th>
                                    <th> Nombre</th>
                                    <th> Codigo</th>
                                    <th> Descuento (%)</th>
                                    <th> Inicio</th>
                                    <th> Fin</th>
                                    <th> Estado</th>
                                    <th> Acciones</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($codigos as $c)

                                    <tr>

                                        <td class="@if(!$c->isActivo() ) alert-dagner @endif">{!! $c->id !!} </td>
                                        <td class="@if(!$c->isActivo() ) alert-dagner @endif"> {!! $c->getName()  !!} </td>
                                        <td class=""> {!! $c->getCode()  !!} </td>
                                        <td class="text-right"> {!! $c->getDst()  !!} </td>
                                        <td class=""> {!! Funciones::AjustarFechaDmy($c->getInicio())  !!} </td>
                                        <td class="@if(!$c->isActivo() ) alert-dagner @endif"> {!! Funciones::AjustarFechaDmy($c->getFin())  !!} </td>

                                        <td class=""> {!! $c->getStatusStr()  !!} </td>
                                        <td>


                                        </td>


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


    <div id="datos" class="card col-12  m-t-35">
        <div class="card-block">
            <div class='card-header bg-white '>
                <i class="fa fa-ticket"></i>
                Otros Servicios
                <span class="pull-right"> nuevo</span>
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">

                        <div class=" col-12 table-responsive noSwipe m-t-20">
                            tabla

                            demo
                            reg falso, 10 eur
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
            $('.percent').mask("00", {reverse: false});//%
            $('.numeros').mask("00", {reverse: false});

            $('#mes3dst').val({!! $d[3] !!});
            $('#mes6dst').val({!! $d[6] !!});
            $('#mes12dst').val({!! $d[12] !!});
            calculo();




            var table1 = $('#tabla1').dataTable({
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
                        //var info = table.page.info();
                        //console.log( 'Showing page: '+info.page+' of '+info.pages );
                        cargarimagenes();
                        $('.page-link').on('click', function () {
                            cargarimagenes();
                        });
                    });
                },
            });
            $('#tabla1 tbody').on('click', 'tr', function () {
                console.log('clicl');

            });
        });

        function calculo(va) {
            if (va === undefined) va = 1;
            var base = $('#mes1').val();
            var dst1 = $('#mes1dst').val();


            var dst3 = $('#mes3dst').val();
            var dst6 = $('#mes6dst').val();
            var dst12 = $('#mes12dst').val();
            var ddst1 = base;
            var ddst3 = base;
            var ddst6 = base;
            var ddst12 = base;


            if (dst1 !== 0) {
                ddst1 = base - (base * (dst1 / 100));
            }
            var valor3 = ddst1 * 3,
                valor6 = ddst1 * 6,
                valor12 = ddst1 * 12;

            if (dst3 !== 0) {
                ddst3 = valor3 - (valor3 * (dst3 / 100));
            }
            if (dst6 !== 0) {
                ddst6 = valor6 - (valor6 * (dst6 / 100));
            }
            if (dst12 !== 0) {
                ddst12 = valor12 - (valor12 * (dst12 / 100));
            }

            $('#mes3').val(valor3.toFixed(0));
            $('#mes6').val(valor6.toFixed(0));
            $('#mes12').val(valor12.toFixed(0));

            $('.total1').html(ddst1.toFixed(0));
            $('.total3').html(ddst3.toFixed(0));
            $('.total6').html(ddst6.toFixed(0));
            $('.total12').html(ddst12.toFixed(0));
        }


        function GuardarPlan() {
            /*#navbar-collapse-1*/
            /*logingbut*/

            var text = '<div class="m-t-15 col-xs-12">' +
                '    <div class="form-group text-left">' +
                '        <label for="dd3" class="col-form-label text-left ">Introduce la contraseña de administrador: </label>' +
                '        <div class="input-group">' +
                '            <span class="input-group-addon"> <i class="fa fa-key text-black"> </i> </span>' +
                '            <input type="password"  class="form-control b_r_20 psdw intok"  name="psw" placeholder="{!! trans('landing.yourpassword') !!}">' +
                '        </div>' +
                '    </div>' +
                '</div>'
            ;
            swal({
                title: 'Verificacion de seguridad',
                //type: 'info',
                html: text,
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonColor: '#fa6900',
                focusConfirm: false,
                confirmButtonText: 'Guardar',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText: '{!! trans('users.cancel') !!}',
                cancelButtonAriaLabel: 'Thumbs down',
            }).then(function () {
                var pd = $('.psdw').val();
                var form = new FormData(document.getElementById('precional'));
                form.append('psw', pd);
                var url = "{!! route('FijarPrecioPost') !!}";
                axios.post(url, form)
                    .then(function (response) {
                        console.dir(response);

                   })
                    .catch(function (error) {
                        console.error('error');
                        console.dir(error);
                    });
                console.log(url)


            });

        }

        $('.intok').keypress(function (e) {
            console.log(e.keyCode);
            if (e.which === 13) {
                $('.swal2-confirm').click();
            }
        });
        $('#status_si').on('click', function (e) {
            $('#status_si').addClass('hidden-xl-down').prop('checked', false);
            $('#status_no').removeClass('hidden-xl-down').prop('checked', true);
            $('#status').val(0);
        });
        $('#status_no').on('click', function (e) {
            $('#status').val(1);
            $('#status_no').addClass('hidden-xl-down').prop('checked', false);
            $('#status_si').removeClass('hidden-xl-down').prop('checked', true);
        });


        $('.closer').on('click', function () {
            setTimeout(function () {
                $('.modal-backdrop').click()
                //$('#responsive').modal('hide');
                //$('#responsive').removeClass('in').removeClass('show');
                //$('body').removeClass('modal-open');
                //$('.modal-backdrop').remove();
                //modal fade in display_none
                //
            }, 2000);
            //
       });

        function CreteCod() {


            //var pd = $('#pwdc').val();
            var form = new FormData(document.getElementById('nuevocodigo'));
            var url = "{!! route('GuardarNuevoCodigo') !!}";
            //form.append('psw', pd);
            axios.post(url, form)
                .then(function (response) {
                    console.dir(response);

               })
 .catch(function (error) {
                    console.error('error');
                    console.dir(error);
                });
            console.log(url)


        }
    </script>

@endsection

<!--var table = $('#tabla').dataTable({
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
//var info = table.page.info();
//console.log( 'Showing page: '+info.page+' of '+info.pages );
cargarimagenes();
$('.page-link').on('click', function () {
cargarimagenes();
});
});
},
});
$('#tabla tbody').on('click', 'tr', function () {
console.log('clicl');

});-->
