@extends('backend.layouts.base')
@section('title', trans('Titulos.PlanesStud') )
@php($decimal = 0)
@php($p1 = Funciones::AjustarNumeroMil($suscripcion->getDescuentoBase(),$decimal))
@php($p3 =  Funciones::AjustarNumeroMil($suscripcion->get3Meces(),$decimal))
@php($p6 =  Funciones::AjustarNumeroMil($suscripcion->get6Meces(),$decimal))
@php($p12 =  Funciones::AjustarNumeroMil($suscripcion->get12Meces(),$decimal))
@php($c1 = '#000')
@php($c3 = '#d66a00')
@php($c6 = '#f38f2c')
@php($c12 = '#f93')
@section('topcss')
    <link type="text/css" rel="stylesheet"
          href="{!! url('css/pages/widgets.css') !!}"/>
    {{--
    <style>
        .heading-title {
            margin-bottom: 100px;
        }
        .pricingTable {
            /*border: 7px solid #f8f8fa;*/
            border: 1px solid rgba(0, 0, 0, 0.125);
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px #e0e0e6;
            transform: scale(1);
            transition: all .5s ease 0s;
        }
        .pricingTable:hover {
            transform: scale(1.1);
            z-index: 1;
        }
        .pricingTable .title {
            font-size: 14px;
            color: #c5c5d3;
            letter-spacing: 3px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        .pricingTable .heading {
            font-size: 24px;
            font-weight: bold;
            color: #31d2b2;
            margin: 0 0 30px;
        }
        .pricingTable .pricing-content ul {
            margin-bottom: 20px;
            padding: 0;
            list-style: none;
            font-size: 15px;
            color: #727278;
            line-height: 40px;
        }
        .pricingTable .pricing-content ul li i {
            font-size: 20px;
            margin-right: 15px;
        }
        .pricingTable .price-Value {
            text-align: center;
            margin-bottom: 20px;
            opacity: 0;
            transition: all 0.3s ease 0s;
            padding-right: 5px;
        }
        .pricingTable:hover .price-Value {
            opacity: 1;
        }
        .pricingTable .value {
            font-size: 30px;
            font-weight: bold;
            color: #31d2b2;
            text-align: center;
            position: relative;
        }
        .pricingTable .currency {
            font-size: 14px;
            color: #bbb;
            position: absolute;
            top: 0;
            left: -10px;
            padding-top: 7px;
        }
        .pricingTable .month {
            font-size: 14px;
            color: #bbb;
            position: absolute;
            top: 0;
            right: -29px;
            padding-top: 7px;
        }
        .pricingTable .pricingTable-signup {
            display: block;
            width: 100%;
            font-size: 14px;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
            /*padding: 10px 50px;*/
            padding-top: 10px;
            padding-bottom: 10px;
            margin-top: -40px;
            background: #31d2b2;
            transition: all 0.5s ease 0s;
        }
        .pricingTable:hover .pricingTable-signup,
        .pricingTable.active .pricingTable-signup {
            margin-top: 0;
            width: 100%;
        }
        .pricingTable.active {
            transform: scale(1.1);
        }
        .pricingTable.active .price-Value {
            opacity: 1;
        }
        .pricingTable.green .heading,
        .pricingTable.green .value {
            color: #a8ec03;
        }
        .pricingTable.purple .heading,
        .pricingTable.purple .value {
            color: #9679e7;
        }
        .pricingTable.green .pricingTable-signup {
            background: #a8ec03;
        }
        .pricingTable.purple .pricingTable-signup {
            background: #9679e7;
        }
        @media only screen and (max-width: 990px) {
            .pricingTable {
                margin-bottom: 40px;
            }
        }
        @media only screen and (max-width: 767px) {
            .pricingTable:hover,
            .pricingTable.active {
                transform: scale(1.0);
            }
        }
        .pricingTable.c1 > .price-Value > .value,
        .pricingTable.c1 .heading,
        .pricingTable.c1.value {
            color: {!! $c1 !!};
        }
        .pricingTable.c3 > .price-Value > .value,
        .pricingTable.c3 .heading,
        .pricingTable.c3.value {
            color: {!! $c3 !!};
        }
        .pricingTable.c6 > .price-Value > .value,
        .pricingTable.c6 .heading,
        .pricingTable.c6.value {
            color: {!! $c6 !!};
        }
        .pricingTable.c12 > .price-Value > .value,
        .pricingTable.c12 .heading,
        .pricingTable.c12.value {
            color: {!! $c12 !!};
        }
        .pricingTable.c1 > a {
            background-color: {!! $c1 !!};
        }
        .pricingTable.c3 > a {
            background-color: {!! $c3 !!};
        }
        .pricingTable.c6 > a {
            background-color: {!! $c6 !!};
        }
        .pricingTable.c12 > a {
            background-color: {!! $c12 !!};
        }
        @media only screen and (max-width: 480px) {
            .pricingTable .pricingTable-signup {
                padding: 10px 20px;
            }
        }
    </style>
    --}}
    <script>
        function addtoform(nombre, valor, elemento) {
            var input = document.createElement("input");
            //input.type = "text";
            //input.name = nombre;
            input.setAttribute('value', valor);
            input.setAttribute('type', 'text');
            input.setAttribute('name', nombre);
            elemento.append(input);
            return elemento
        }

        function Plans(t) {
            var f = document.getElementById('pyments');
            f = addtoform('mes', t, f);
            f = addtoform('codigo', $('#promocionales').val(), f);
            f.submit();
        }
    </script>
    <style>
        .m-b-35 {
            margin-bottom: 35px;
        }

        .table-pricing th, .table-pricing td {
            text-align: center;
        }

        .table-pricing td {
            font-size: 15px;
        }

        .table-pricing .table-price {
            background-color: #f9f9f9;
        }

        .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td, .table tbody + tbody, .table-bordered, .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border-color: #e9e9e9;
        }

        .table thead > tr > th, .table thead > tr > td, .table tfoot > tr > th, .table tfoot > tr > td {
            background-color: #e9e9e9;
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .table-borderless tbody > tr > th, .table-borderless tbody > tr > td {
            border-top-width: 0;
        }

        .table thead > tr > th {
            font-size: 18px;
            font-weight: 300;
        }

        .table-price > h1, .table-price > .h1 {
            font-size: 2.2em;
        }
    </style>
@endsection
@section('topjs')
@endsection
@section('content')
    @php
        $sand = \Config::get('paypal.settings.mode');
        if($sand == 'sandbox'){
        $sms = "MODO DE PRUEBA";
        }else{
        $sms = 'EN VIVO';
        };
        $ctv = [
        'cantidad'=>'',
        'descripcion'=>'',
        ];
    $plan[0]=[ 'name'=>"1 Mes", 'caract'=>[0=>$ctv,1=>$ctv], 'precio'=>$p1, 'tipo' => 1];
    $plan[1]=[ 'name'=>"3 Meses", 'caract'=>[0=>$ctv,1=>$ctv], 'precio'=>$p3, 'tipo' => 3];
    $plan[2]=[ 'name'=>"6 Meses", 'caract'=>[0=>$ctv,1=>$ctv], 'precio'=>$p6, 'tipo' => 6];
    $plan[3]=[ 'name'=>"12 Meses", 'caract'=>[0=>$ctv,1=>$ctv], 'precio'=>$p12, 'tipo' => 12];
    @endphp
    <div class="row col-12 m-t-35">
        @foreach($plan as $k=>$v)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <table class="table table-borderless table-pricing">
                    <thead>
                    <tr>
                        <th>
                            {!! $v['name'] !!}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($v['caract'] as $q=>$w)
                        <tr>
                            <td>
                                <strong>
                                    {!! $w['cantidad'] !!}
                                </strong>
                                {!! $w['descripcion'] !!}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="table-price">
                            <h1>{!! $v['precio'] !!}
                                <small>
                                    <i class="fa fa-eur"></i>
                                </small>
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="javascript:void(0)" class="btn  btn-primary btn btn-warning glow_button "
                               onclick="Plans({!! $v['tipo'] !!});">
                                Buy
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
    <div class="card m-t-35 hidden-xs-up">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! $sms !!}
            </div>
            <div class="row col-12">
                <div class="col-4 m-t-35 m-b-35">
                    <div class="card">
                        <div class='card-header bg-white '>
                            Codigos Promocionales
                        </div>
                        <div class="card-block row m-t-35">
                            <div class="form-group row col-12  ">
                                <input type="text" id='promocionales' name='promocionales' class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                </div>
                <form action="{!! route('PagoSuscripcionPost') !!}" id="pyments" method="post" class="hidden-xs-up">
                    {!! csrf_field() !!}
                </form>
            </div>
        </div>
    </div>
    {{--
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="QM6Y5XFREAE86">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
    --}}

@endsection
@section('bottomjs')
@endsection
