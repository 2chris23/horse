@extends('backend.layouts.base')
@php
    //$iconos = "https://www.multiplicalia.com/wp-content/uploads/2016/09/facebook-ads-logo.png";
    //$iconos = "https://www.angelosada.com/wp-content/uploads/2015/04/facebook-ads-300x174.png";
    $iconos = "http://blog.wsibsns.mx/wp-content/uploads/2014/06/facebook-ads-tutorial.png";
    $wsimg  = "https://seeklogo.com/images/W/whatsapp-logo-8AE44BBBB0-seeklogo.com.png";
$plus[0] ='<div class="col-3 text-center"><figure><img src="'. $iconos .'" alt="" class="img-responsive"  style="    max-width: 30px;"> </figure></div> <div class="col-9 text-center">Alcance 120 millones de clientes</div>';
$plus[1] ='<div class="col-12 text-center">Banners publicitarios</div>';

//$plus[0] ='<img src="'. $iconos .'" alt="" class="img-responsive"  style="max-width: 30px;"> Alcance 120 millones de clientes<br>';
$plus[0] ='<img src="'. $iconos .'" alt="" class="img-responsive"  style="max-width: 30px;">  Banners publicitarios';
//$plus[2] ='Hospedaje de Dominio';
//$plus[2] ='Exportar anuncios a otros portales de venta';
$fbpromo = "<img src=\"$iconos\" alt=\"\" class=\"img-responsive\" style=\"max-width: 30px;\"> ".trans('suscripcion.banner');
$teres = $fbpromo;

@endphp

@section('title', trans('Titulos.PlanesStud') )

@php($decimal = 0)
@php($p1 = Funciones::AjustarNumeroMil($suscripcion->getDescuentoBase(),$decimal))

@php($p3 =  Funciones::AjustarNumeroMil($suscripcion->get3Meces(),$decimal))

@php($p6 =  Funciones::AjustarNumeroMil($suscripcion->get6Meces(),$decimal))
@php($p12 =  Funciones::AjustarNumeroMil($suscripcion->get12Meces(),$decimal))
@php($decimal = 0)
@php($ds1 =  Funciones::AjustarNumeroMil($suscripcion->discount,$decimal))
@php($ds3 =  Funciones::AjustarNumeroMil($suscripcion->ds3,$decimal))
@php($ds6 =  Funciones::AjustarNumeroMil($suscripcion->dst6,$decimal))
@php($ds12 =  Funciones::AjustarNumeroMil($suscripcion->dst12,$decimal))

@php($c1 = '#000')
@php($c3 = '#d66a00')
@php($c6 = '#f38f2c')
@php($c12 = '#f93')
@section('topcss')
    <link type="text/css" rel="stylesheet" href="{!! url('css/icomoon/style.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('css/pages/widgets.css') !!}"/>
    {{-- <link type="text/css" rel="stylesheet" href="{!! url('css/plan.min.css') !!}"/>- --}}
    <link type="text/css" rel="stylesheet" href="{!! route('suscripcion.css') !!}"/>


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
    /*
    var f = ($(this).find('.pricesc').val() * 1);
    var d = ($(this).find('.pricesd').val() * 1);
    var f1 = ({!! $p1 !!} * 1);
    var dif = f1-(f/d);
    var dift = dif*d;
    */

    //console.log('tiempo '+d+' precio '+f+' div '+(f/d));
    /*
    console.log('Ahorra '+dif+ ' mes');
    console.log('Ahorra '+dift+ ' por '+d+' mes');
    */
        //trans('suscripcion.mes1',['porcentaje'=>$ds1])

    $plan[0]=[
        'name'=>trans('suscripcion.tmes1'),
        'caract'=>[0=>$ctv,1=>$ctv],
        'precio'=>$p1,
        'tipo' => 1,
        'dst'=>$ds1,
        'texto'=>'',
        'tooltip'=>'',

        'extension'=>trans('suscripcion.mes1text',['n'=>1]),
        'popular'=>'',
        'caracteristicas'=>trans('suscripcion.caracteristica1'),
    ];

    $tsa =$p1-($p3/3);
    $ts = Funciones::AjustarNumeroMil($tsa,2);
    $tsa = $tsa *3;
    $ts1 = ((int)Funciones::AjustarNumeroMil($tsa,2));


    $plan[1]=[
        'name'=>trans('suscripcion.tmesN',['N'=>'3']),
        'caract'=>[0=>$ctv,1=>$ctv], 'precio'=>$p3,
        'tipo' => 3,
        'dst'=>$ds3,
        'texto'=>trans('suscripcion.mes3', ['porcentaje'=>$ds3]),
        'extension'=>trans('suscripcion.mes3text',['n'=>3]),
         'popular'=>'',
         'tooltip'=>"Ahorra ".Funciones::AjustarNumeroMil($p1-($p3/3),2)." al mes o ".Funciones::AjustarNumeroMil(((($p3/3)-$p1)*3),2)." por 3 meses",
        'caracteristicas'=>trans('suscripcion.caracteristica3'),
    ];
    $tsa =$p1-($p6/6);
    $ts = Funciones::AjustarNumeroMil($tsa,2);
    $tsa = $tsa *6;
    $ts1 = ((int)Funciones::AjustarNumeroMil($tsa,2));

    $plan[2]=[
        'name'=>trans('suscripcion.tmesN',['N'=>'6']),
        'caract'=>[0=>$ctv,1=>$ctv],
        'precio'=>$p6,
        'tipo' => 6,
        'dst'=>$ds6,
        /*'tooltip'=>"Por menos de 50 € al mes, ahorra ".$ts." al mes o ".$ts1." por 6 meses",*/
        'tooltip'=>"Por menos de 50 € al mes, ahorra ".$ts." € al mes ",
        'texto'=>trans('suscripcion.mes6',['porcentaje'=>$ds6]),
        'extension'=>trans('suscripcion.mes6text',['n'=>6]),
        'popular'=>trans('suscripcion.mes6exclama'),
        'caracteristicas'=>trans('suscripcion.caracteristica6'),
    ];
    $mesnormal = 12*$p1;
    $doce = $p12;
    $ahorra = $mesnormal - $doce;
    $mesdoce = ($p12/12);


    $tsa =$p1-($p12/12);
    $tsb = Funciones::AjustarNumeroMil($p12-$tsa,2);
    $ts = Funciones::AjustarNumeroMil($tsa,2);
    $tsa = $tsa *12;
    $ts1 = ((int)Funciones::AjustarNumeroMil($tsa,2));
    /*'tooltip'=>"Por mes  ".$mesdoce." al mes, Ahorra  ".$ahorra."",*/
    $plan[3]=[
        'name'=>trans('suscripcion.tmesN',['N'=>'12']),
        'caract'=>[0=>$ctv,1=>$ctv],
        'precio'=>$p12,
        'tipo' => 12,
        'dst'=>$ds12,

        'tooltip'=>"Por menos de 50€ al mes, ahorra ".$ahorra."€",
        'texto'=>trans('suscripcion.mes12',['porcentaje'=>$ds12])."<br>".$teres,
        'extension'=>trans('suscripcion.mes12text',['n'=>12]),
        'popular'=>trans('suscripcion.mes12exclama'),
        'caracteristicas'=>trans('suscripcion.caracteristica12'),
    ];

    @endphp

    {{--
      <div class="tab-content">
          <div class="tab-pane active" id="home" role="tabpanel">...</div>
          <div class="tab-pane" id="profile" role="tabpanel">...</div>
          <div class="tab-pane" id="messages" role="tabpanel">...</div>
          <div class="tab-pane" id="settings" role="tabpanel">...</div>
      </div>
      
                    Como un poco de todo ( por el momento lo vamos a deshabilitar que no aparezca) lo pones pero luego lo comentamos para que no salga.
                    ej https://www.apple.com/es/macbook/
                                        <li class="col-menu js-home home">
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




    <div class="col-12 row text-center">
        <div class="col-12 text-center">
            <p class=" promo " style="font-size: 18px">
                {!! trans('suscripcion.plancabecera') !!}
            </p>
        </div>
        {{--
        <div class="c-stickynav js-index-menu col-12" id="hw-menu">
            <div class="row text-center justify-content-center scrollmenu" style="position: relative;">
                <ul id="index-menu2">
                    {{--
                    <li class="nav-item col-menu js-limited js-menu-single uppercase ">
                        <a href="#resu2" class="anime">
                            RESUMEN
                        </a>
                    </li>
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
        <li class="nav-item  col-menu js-kids js-menu-single uppercase">
            <a href="#sopor2" class="anime">
                SOPORTE FAQ
            </a>
        </li>
    </ul>

</div>
</div>
--}}
    </div>


    {{--<div class="col-12 col-md-12 col-lg-12 offset-xl-1 col-xl-10 m-t-45 text-center ">--}}
    <div class="col-xl-10 offset-xl-1 col-12 col-md-10 offset-md-1 row ">
        {{--
        <div class="row wrap  " id="resu2">
            <div class="col-12 row">
                Resumen move<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>
            </div>
        </div>
--}}
        <div class="col-12 m-t-45  text-center row   wrap  " id="plan2">
            <div class="wrap main packets row">
                @foreach($plan as $k=>$v)
                    @php($pop = $v['popular'])
                    <div class="paquete-otem @if($k == 2) midi @else mini @endif  @if($k == 0) paqn @endif  @if($k != 0) quickka @endif col-12 col-md-6 col-lg-3"
                    >
                        @if($k != 0)
                            <input type="hidden" value="{!! $v['precio'] !!}" class="pricesc">
                            <input type="hidden" value="{!! $v['tipo'] !!}" class="pricesd">
                        @endif

                        @if($v['popular']!='')
                            <div class="badge-most-popular">{!! $v['popular'] !!}</div>
                        @endif

                        <div class="item nombre-item">
                            {!! $v['name'] !!}
                        </div>

                        <div class="item descripcion-item" @if($k == 3)  data-toggle="tooltip"
                             data-placement="top"
                             title="{!! $v['tooltip'] !!}" @endif>
                            {!! $v['texto'] !!}


                        </div>
                        <div class="item precio-item" @if($k ==3 )  data-toggle="tooltip" data-placement="top"
                             title="{!! $v['tooltip'] !!}" @endif>
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
                            <button type="submit" class="choose-plan-button cta"
                                    onclick="Plans({!! $v['tipo'] !!});">
                                @lang('suscripcion.btnpago')
                            </button>
                        </div>


                        @if($pop!='')
                            <div class="badge-most-popular bottom">{!! $pop !!}</div>
                        @endif
                        @if($k == 4)
                            <div class="item paquete-otem-features">
                                {{--
                                <div class="paquete-otem-features-header ">

                                </div>
                                --}}
                                {!! $fbpromo !!}


                                {{--
                                <div class="paquete-otem-features-name">
                                    Soporte
                                </div>
                                --}}
                                {{--
                                <div class="paquete-otem-features-name">
                                    <img src="{!! $wsimg !!}" alt="" class="img-responsive"  style="    max-width: 30px;">

                                </div>
                                --}}
                                {{--
                                <div class="paquete-otem-features-name">Páginas de destino (Básico)</div>
                                <div class="paquete-otem-features-header badge">Automatización de Marketing</div>
                                <div class="paquete-otem-features-name">Flujos de trabajo</div>
                                <div class="paquete-otem-features-name">Etiquetas</div>
                                <div class="paquete-otem-features-header feature-multi-user">1 usuario</div>
                                --}}
                            </div>


                        @endif

                        {{--
                                                <div class="item paquete-otem-features">
                                                    @foreach($v['caracteristicas'] as $r => $s)
                                                        {{--<div class="paquete-otem-features-header">E-mail Marketing</div>-- }}
                                                        <div class="paquete-otem-features-name">{!! ($s) !!}</div>
                                                        {{--
                                                        <div class="paquete-otem-features-name">Páginas de destino (Básico)</div>
                                                        <div class="paquete-otem-features-header badge">Automatización de Marketing</div>
                                                        <div class="paquete-otem-features-name">Flujos de trabajo</div>
                                                        <div class="paquete-otem-features-name">Etiquetas</div>
                                                        <div class="paquete-otem-features-header feature-multi-user">1 usuario</div>

                                                    @endforeach
                                                </div>
                                                --}}

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
        <!------------------------------------------------------------>
        {{--@include('backend.content.plan.base')--}}
        {{--@include('backend.content.plan.tabs')--}}


        @include('backend.content.plan.cards')
        {{--@include('backend.content.plan.bscards')--}}


    <!------------------------------------------------------------>
        {{--
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


                <div class="row wrap  " id="sopor2">
                    <div class="col-12 row">
                        soporte move<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>
                    </div>
                </div>
                --}}
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
    <div class="offset-3 col-6 text-center  m-t-35 row">
        <div class="col-12 m-t-35">
            <a href="http://www.HorsesWorldSale.com" target="_blank">
                <figure>
                    <img src="{!! url(\Config::get('logos.logoh250')) !!}" alt="" class="img-fluid"
                         style="width: 220px">
                </figure>
            </a>
        </div>
        <div class="offset-4 col-4 row m-t-10">
            <div class="col-4">
                <a href="{!! url(\Config::get('otra.hfacebook')) !!}" target="_blank">
<span class="fa fa-facebook font-1-5" style="margin-left: 10px;">
</span>
                </a>
            </div>
            <div class="col-4">
                <a href="{!! url(\Config::get('otra.htwitter')) !!}" target="_blank">
<span class="fa fa-twitter font-1-5">
</span>
                </a>
            </div>
            <div class="col-4">
                <a href="{!! url(\Config::get('otra.hyoutube')) !!}" target="_blank">
<span class="fa fa-youtube font-1-5" style="margin-left: -10px;">
</span>
                </a>
            </div>
        </div>
        <div class="m-t-10 offset-3 col-6 text-center">
            <a href="http://www.HorsesWorldSale.com" target="_blank">www.HorsesWorldSale.com</a>
        </div>

    </div>
@endsection
@section('bottomjs')
    <script src="{!! route('suscripcion.js') !!}">
    </script>
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
        {{--
        $('.quickka').hover(function () {


            var f = ($(this).find('.pricesc').val() * 1);
            var d = ($(this).find('.pricesd').val() * 1);
            var f1 = ({!! $p1 !!} * 1
        )
            ;
            var dif = f1 - (f / d);
            var dift = dif * d;

            //console.log('tiempo '+d+' precio '+f+' div '+(f/d));
            console.log('Ahorra ' + dif + ' mes');
            console.log('Ahorra ' + dift + ' por ' + d + ' mes');
        });
        --}}

    </script>
@endsection
