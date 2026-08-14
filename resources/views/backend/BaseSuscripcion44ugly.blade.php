@extends('backend.layouts.base')
@section('title', trans('Titulos.PlanesStud') )
<?php $decimal = 0; ?>
<?php $p1 = Funciones::AjustarNumeroMil($suscripcion->getDescuentoBase(),$decimal); ?>
<?php $p3 =  Funciones::AjustarNumeroMil($suscripcion->get3Meces(),$decimal); ?>
<?php $p6 =  Funciones::AjustarNumeroMil($suscripcion->get6Meces(),$decimal); ?>
<?php $p12 =  Funciones::AjustarNumeroMil($suscripcion->get12Meces(),$decimal); ?>
<?php $decimal = 0; ?>
<?php $ds1 =  Funciones::AjustarNumeroMil($suscripcion->discount,$decimal); ?>
<?php $ds3 =  Funciones::AjustarNumeroMil($suscripcion->ds3,$decimal); ?>
<?php $ds6 =  Funciones::AjustarNumeroMil($suscripcion->dst6,$decimal); ?>
<?php $ds12 =  Funciones::AjustarNumeroMil($suscripcion->dst12,$decimal); ?>

<?php $c1 = '#000'; ?>
<?php $c3 = '#d66a00'; ?>
<?php $c6 = '#f38f2c'; ?>
<?php $c12 = '#f93'; ?>
@section('topcss')

    <link type="text/css" rel="stylesheet" href="{!! url('css/pages/widgets.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('css/plan.min.css') !!}"/>

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
        {{--
        .baseThinFont, .packetsold .packet.packet-name {
            font-family: Roboto, Helvetica, Arial, sans-serif;
            font-weight: 100
        }

        .baseLightFont, .content, .list-size-module, .packetsold .precio-paquete .price-prefix, .why-getresponse .quote blockquote, h1, h2, h3 {
            font-family: Roboto, Helvetica, Arial, sans-serif;
            font-weight: 300
        }

        .baseThinFont, .packetsold .packet.packet-name {
            font-family: Roboto, Helvetica, Arial, sans-serif;
            font-weight: 100
        }

        .baseLightFont, .content, .list-size-module, .packetsold .precio-paquete .price-prefix, .why-getresponse .quote blockquote, h1, h2, h3 {
            font-family: Roboto, Helvetica, Arial, sans-serif;
            font-weight: 300
        }

.wrap{
            max-width: 1200px;
        }
--}}


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
    $plan[0]=[ 'name'=>"1 Mes", 'caract'=>[0=>$ctv,1=>$ctv], 'precio'=>$p1, 'tipo' => 1,'dst'=>$ds1,'texto'=>trans('suscripcion.mes1',['porcentaje'=>$ds1]), 'extension'=>trans('suscripcion.mes1text',['n'=>1]), 'popular'=>trans('suscripcion.mes1exclama') ];
    $plan[1]=[ 'name'=>"3 Meses", 'caract'=>[0=>$ctv,1=>$ctv], 'precio'=>$p3, 'tipo' => 3,'dst'=>$ds3,'texto'=>trans('suscripcion.mes3',['porcentaje'=>$ds3]),'extension'=>trans('suscripcion.mes3text',['n'=>3]), 'popular'=>trans('suscripcion.mes3exclama')];
    $plan[2]=[ 'name'=>"6 Meses", 'caract'=>[0=>$ctv,1=>$ctv], 'precio'=>$p6, 'tipo' => 6,'dst'=>$ds6,'texto'=>trans('suscripcion.mes6',['porcentaje'=>$ds6]),'extension'=>trans('suscripcion.mes6text',['n'=>6]), 'popular'=>trans('suscripcion.mes6exclama')];
    $plan[3]=[ 'name'=>"12 Meses", 'caract'=>[0=>$ctv,1=>$ctv], 'precio'=>$p12, 'tipo' => 12,'dst'=>$ds12,'texto'=>trans('suscripcion.mes12',['porcentaje'=>$ds12]),'extension'=>trans('suscripcion.mes12text',['n'=>12]), 'popular'=>trans('suscripcion.mes12exclama')];

    @endphp

    {{--
      <div class="tab-content">
          <div class="tab-pane active" id="home" role="tabpanel">...</div>
          <div class="tab-pane" id="profile" role="tabpanel">...</div>
          <div class="tab-pane" id="messages" role="tabpanel">...</div>
          <div class="tab-pane" id="settings" role="tabpanel">...</div>
      </div>
      --}}

    {{----------------------------------------------------------------------------------------}}
    {{--
    Como un poco de todo ( por el momento lo vamos a deshabilitar que no aparezca) lo pones pero luego lo comentamos para que no salga.
    ej https://www.apple.com/es/macbook/
    --}}
    {{--}}                    <li class="col-menu js-home home">
        <a href="#!">
            RESUMEN
        </a>
    </li>
    PLANES



Podemos poner periodo y que los precios varien entre varios planes, Ponemos el gratis o barato, el normal, y el premium y segun el periodo los precios se actualizan


Mira aqui como estan arriba mensual 1 año 2 años
https://conversionxl.com/wp-content/uploads/2012/03/optimizelt.jpg

https://conversionxl.com/wp-content/uploads/2012/03/vzaar.jpg

O simplemente ponemos como lo tenemos ahora con los precios de las mensualidades.
https://www.getresponse.es/
https://secure.getresponse.com/pricing/es?_ga=2.260684552.403764513.1512724041-1034217402.1512724041


EL MAS POPULAR pon 6 meses   y el de 12 meses pon   Mejor oferta!

Pones el precio 171€ (10% Descuento de 180€)  boton renovar


Ver mas ejemplos lo cual puedes utilizar sus graficos

https://ochikaperu.myshopify.com/admin/account/pricing?dialog=true



Puedes utilizar estos graficos
http://preview.themeforest.net/item/appland-app-landing-page/full_screen_preview/20875565?_ga=2.124289738.176334315.1512582834-1991273181.1500082262


http://skmahi.com/html/appm/appm_demo/index.html

graficos para caracteristicas o para precios
http://preview.themeforest.net/item/appgo-app-landing-page/full_screen_preview/20815086?_ga=2.51978857.176334315.1512582834-1991273181.1500082262
mas diseño

http://preview.themeforest.net/item/rocket-app-landing-page/full_screen_preview/20817286?_ga=2.111823428.176334315.1512582834-1991273181.1500082262


Mas diseños
https://codecanyon.net/item/amazing-pricing-tables/20112091?s_rank=5
http://preview.codecanyon.net/item/pricing-tables-vc-addon/full_screen_preview/19505119?_ga=2.258264002.950362582.1512726525-1991273181.1500082262

https://codecanyon.net/item/wordpress-pricing-table-plugin/20841735?s_rank=1


Interesante si queremos poner el plan y a la izquierda cosas que incluye
http://trystack.mediumra.re/sections-pricing.html





Caracteristicas
http://preview.themeforest.net/item/ozone-app-apps-games-landing-page-template-responsive-html5-template/full_screen_preview/20145901?_ga=2.223364827.176334315.1512582834-1991273181.1500082262

http://preview.themeforest.net/item/creatink-multiconcept-html5-template/full_screen_preview/20562297?_ga=2.39156832.2104900953.1511626964-1991273181.1500082262



Tambien podemos poner el modal ese en el footer con una oferta!!
(no hacer por ahora)




    --}}


    {{--
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
                                    <i class="fa fa-eur">
</i>
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
    --}}
    <div class="col-12 row">
        <div class="c-stickynav js-index-menu col-12" id="hw-menu">
            <div class="row text-center justify-content-center scrollmenu" style="position: relative;">
                <ul id="index-menu2">
                    {{--
                    <li class="nav-item col-menu js-limited js-menu-single uppercase ">
                        <a href="#resu2" class="anime">
                            RESUMEN
                        </a>
                    </li>
                    --}}
                    <li class="nav-item col-menu js-limited js-menu-single uppercase ">
                        <a href="#plan2" class="anime">
                            PLANES
                        </a>
                    </li>
                    {{--
                    <li class="nav-item col-menu js-ss17 js-menu-single uppercase">
                        <a href="#patro2" class="anime">
                            PLAN PATROCINIO
                        </a>
                    </li>
                    --}}
                    {{--
                    <li class="nav-item col-menu js-original js-menu-single uppercase">
                        <a href="#otro2" class="anime">
                            OTROS PRODUCTOS Tienda (ocuta aun)
                        </a>
                    </li>
                    --}}
                    <li class="nav-item  col-menu js-kids js-menu-single uppercase">
                        <a href="#sopor2" class="anime">
                            SOPORTE FAQ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-12 col-lg-12 offset-xl-1 col-xl-10 m-t-35 text-center ">
        {{--
        <div class="row wrap  " id="resu2">
            <div class="col-12 row">
                Resumen move<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>
            </div>
        </div>
        --}}
        <div class="row wrap  " id="plan2">
            <div class="main packets">
                @foreach($plan as $k=>$v)

                    <div class="paquete-otem @if($k == 2) midi @else mini @endif  @if($k == 0) paqn @endif">

                        @if($v['popular']!='')
                            <div class="badge-most-popular">{!! $v['popular'] !!}</div>
                        @endif

                        <div class="item nombre-item">
                            {!! $v['name'] !!}
                        </div>
                        <div class="item descripcion-item">
                            {!! $v['texto'] !!}
                            {{--
                            @if($k ==0)
                            <br>
                            <br>
                            @else
                            <br>
                            - {!! $v['dst'] !!} % <br>
                            @endif
                            --}}
                            {{--
                            @foreach($v['caract'] as $r=>$t)

                                {!! $t['descripcion'] !!}<br>
                                @endforeach
                            --}}
                            {{--Texto 1<br>
                            Texto 2--}}

                        </div>
                        <div class="item precio-item">
                            <div class="precio-paquete">
                                {{--<sup>$</sup>--}}
                                <span class="amount">
                            {!! $v['precio'] !!}
                        </span>
                                <span id="monthIndicator" class="month-indicator indicator active">
                            <i class="fa fa-eur"> </i> {{--/mes--}}
                        </span>
                                <div class="predio-pago-info">
                            <span id="paidPeriodMonth" class="predio-pago">
                            </span>
                                    <span id="paidPeriodYearly" class="predio-pago active"
                                          data-package-period="12">
                                {!! $v['extension'] !!}
                            </span>
                                    {{--
                                    <span id="paidPeriod2Yearly" class="predio-pago"
                                    >
                                facturado cada 2 años
                            </span>
                                    --}}
                                </div>
                            </div>
                        </div>
                        <div class="item paquete-otem-cta">
                            <button type="submit" class="choose-plan-button cta" onclick="Plans({!! $v['tipo'] !!});">
                                @lang('suscripcion.btnpago')
                            </button>
                        </div>

                        @if($v['popular']!='')
                            <div class="badge-most-popular bottom">{!! $v['popular'] !!}</div>
                    @endif

                    <!--
                        <div class="item paquete-otem-features">
                            <div class="paquete-otem-features-header">E-mail Marketing</div>
                            <div class="paquete-otem-features-name">Autorespuestas</div>
                            <div class="paquete-otem-features-name">Páginas de destino (Básico)</div>
                            <div class="paquete-otem-features-header badge">Automatización de Marketing</div>
                            <div class="paquete-otem-features-name">Flujos de trabajo</div>
                            <div class="paquete-otem-features-name">Etiquetas</div>
                            <div class="paquete-otem-features-header feature-multi-user">1 usuario</div>
                        </div>

                        <div class="item paquete-otem-cta-bottom" data-packet-name="mini">
                            <button type="submit" class="choose-plan-button cta" data-type="1"
                                    data-params="packet_usd_mini" data-ats-pricing-packets-email="button2">Elija
                                el plan
                            </button>
                        </div>
                        -->
                    </div>
                @endforeach
                {{--
                <div class="paquete-otem midi " >
                    <div class="badge-most-popular">¡El más popular!</div>
                    <div class="item nombre-item" >Pro</div>
                    <div class="item descripcion-item">Para comerciantes enfocados<br> en
                        crecimiento y PYMES
                    </div>
                    <div class="item precio-item" >
                        <div class="precio-paquete">
                            <sup>$</sup>
                            <span class="amount"
                                  >40.18</span>
                            <span id="monthIndicator" class="month-indicator indicator active">/mes</span>
                            <div class="predio-pago-info">
                                <span id="paidPeriodMonth" class="predio-pago" >
                                    facturado mensualmente</span>
                                <span id="paidPeriodYearly" class="predio-pago active"
                                      >facturado anualmente</span>
                                <span id="paidPeriod2Yearly" class="predio-pago" >facturado cada 2 años</span>
                            </div>
                        </div>
                    </div>
                    <div class="item paquete-otem-cta">
                        <button type="submit" class="choose-plan-button cta" >Elija el
                            plan
                        </button>
                    </div>
                    <!--
                    <div class="item paquete-otem-features">
                        <div class="paquete-otem-features-header">E-mail Marketing</div>
                        <div class="paquete-otem-features-name">Autorespuestas</div>
                        <div class="paquete-otem-features-name">Páginas de destino (Pro)</div>
                        <div class="paquete-otem-features-name">Webinars 100 asistentes</div>
                        <div class="paquete-otem-features-header badge">Automatización de Marketing</div>
                        <div class="paquete-otem-features-name">Flujos de trabajo</div>
                        <div class="paquete-otem-features-name">Etiquetas</div>
                        <div class="paquete-otem-features-name">Puntuación</div>
                        <div class="paquete-otem-features-name">Carrito Abandonado</div>
                        <div class="paquete-otem-features-name">Seguimiento de Eventos Web</div>
                        <div class="paquete-otem-features-name">Segmentación de Automatización</div>
                        <div class="paquete-otem-features-header feature-multi-user">3 usuarios</div>
                        <div class="paquete-otem-features-header feature-crm">CRM</div>
                    </div>
                    <div class="item paquete-otem-cta-bottom" data-packet-name="midi">
                        <button type="submit" class="choose-plan-button cta" data-type="1"
                                data-params="packet_usd_midi" data-ats-pricing-packets-pro="button2">Elija
                            el plan
                        </button>
                    </div>
                    -->
                    <div class="badge-most-popular bottom">¡El más popular!</div>
                </div>
                    --}}

            </div>
        </div>
        {{--}}
                <div class="row wrap  " id="patro2">
                    <div class="col-12 row">
                        patrocinio move<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>
                    </div>
                </div>
                <div class="row wrap  " id="otro2">
                    <div class="col-12 row">
                        otro move<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>
                    </div>
                </div>
                --}}

        <div class="row wrap  " id="sopor2">
            <div class="col-12 row">
                soporte move<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>
            </div>
        </div>
    </div>

    <div id="testa">
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
    Adria
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="FC87C59ARQ5VG">
        <input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0"
               name="submit" alt="PayPal, la forma rápida y segura de pagar en Internet.">
        <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
    </form>
    --}}

    {{--
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="QS2QZ46F773K8">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
        </form>

        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="BKCWSAFGGEZTA">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
            <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
        </form>

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="QM6Y5XFREAE86">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
    - -} }
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="KH387JNTXLBNA">
        <input type="image" src="https://www.sandbox.paypal.com/es_XC/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.sandbox.paypal.com/es_XC/i/scr/pixel.gif" width="1" height="1">
    </form>
    --}}
    {{--@include('TDC')--}}
@endsection
@section('bottomjs')
    {{--
    <script src="https://js.braintreegateway.com/web/3.25.0/js/client.min.js">
</script>
    <script src="https://js.braintreegateway.com/web/3.25.0/js/paypal-checkout.min.js">
</script>
    <script>
        paypal.Button.render({
            braintree: braintree,
            // Other configuration
        }, '#testa');
    </script>
    --}}
    <script>
        $(function () {
            "use strict";
            $(".anime").on('click', function (e) {
                var className = $(this).attr("href");
                console.log(className);
                if (className.charAt(0) === "#") {
                    e.preventDefault();
                    var hash = this.hash,
                        scrollTopOffset = $(hash).offset().top;
                    $('html, body').animate({
                        scrollTop: scrollTopOffset
                    }, 500);
                }
            });
        });
    </script>
@endsection
