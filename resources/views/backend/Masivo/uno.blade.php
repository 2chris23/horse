@php
    $logo = url(\Config::get('logos.logoh250'));
$piso = url(\Config::get('logos.logoh250'));
$stud = isset($stud)?$stud:\Auth::user()->Yeguada();
$headerimg = $stud->getLogo();
//$headerimg = $stud->getLogo()->Base64(450);
$imagendia = url(\Config::get('logos.logoh250'));
$fakeimg = url(\Config::get('logos.logoh250'));
$linkwindwo = url('');
$ancho = 450;
$anchotarjeta = 140 - 40;
$anchoimagen = 180;
$alto = 100;
$colorbotones = " background-color: rgb(45, 164, 168)";
$colorbotones = " #2da4a8";
$colorbotones = " orange";
$colorbotones = $stud->getColor();
$mipagina = route('MyPageBase',['slug'=>$stud->slug]);
$titulo = $stud->getName() ;
/*
$dominio = $stud->getDomain();
if(!empty($dominio)){
    $mipagina = "http://$dominio";
    $basecaballo = $mipagina.'/Caballo/';
}
*/



/*
// change amount according to your needs
$amount =500;
// change From Currency according to your needs
$from_Curr ="INR";
// change To Currency according to your needs
$to_Curr ="USD";
$converted_currency=Funciones::currencyConverter($from_Curr, $to_Curr, $amount);
// Print outout
echo $converted_currency;
*/

@endphp
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{!! $titulo !!}</title>
    <style type="text/css">
        body {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            margin: 0 !important;
            width: 100% !important;
            -webkit-text-size-adjust: 100% !important;
            -ms-text-size-adjust: 100% !important;
            -webkit-font-smoothing: antialiased !important;
        }

        .tableContent img {
            border: 0 !important;
            display: inline-block !important;
            outline: none !important;
        }

        p, h1, h2, h3, h4, ul, ol, li, div {
            margin: 0;
            padding: 0;
        }

        h1, h2, h4 {
            font-weight: normal;
            background: transparent !important;
            border: none !important;
        }

        td, table {
            vertical-align: top;
        }

        td.middle {
            vertical-align: middle;
        }

        a {
            text-decoration: none;
        }

        a.link1 {
            font-size: 16px;
            color: #a5a5a5;
        }

        a.link2 {
            font-size: 18px;
            font-weight: bold;
            color: #000000;
            text-decoration: underline;
        }

        a.link3 {
            font-size: 15px;
            font-weight: bold;
            color: #ffffff;
            /*background-color: #2da4a8;*/
            background-color: {!! $colorbotones !!};
            padding: 11px 15px;
            text-decoration: none;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            text-align: center;
            display: inline-block;
        }

        .contentEditable li {

        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            color: #000000;
            line-height: 150%;
        }

        h2 {
            font-size: 18px;
            font-weight: bold;
            color: #000000;
            line-height: 150%;
            height: 60px;
        }

        h4 {
            font-size: 16px;
            font-weight: bold;
            color: #000000;
            /*line-height: 150%;
            height: 60px;*/
        }

        p {
            font-size: 16px;
            color: #000000;
            line-height: 150%;
            text-align: left;
        }

        .bgItem {
            background: #ffffff;
            background: #fff;
        }

        .bgBody {
            background: #3f4040;
            background: transparent;
        }

        .white-card {
            background: #fff;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
        }

        .grey-card {
            /*background: gray;*/
            /*background: #dedede;*/
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
        }

        .noborderraduis {
            border-radius: 0px;
            -moz-border-radius: 0px;
            -webkit-border-radius: 0px;
        }

        .noborderraduisdown {
            border-radius: 5px 5px 0px 0px;
            -webkit-border-radius: 5px 5px 0px 0px;
            -moz-border-radius: 5px 5px 0px 0px;
        }

        .fondo-boton {
            background-color: {!! $colorbotones !!};
        }

        .imgs {
            max-width: 200px;
            max-height: 150px;
        }
    </style>
    {{--
        <script type="colorScheme" class="swatch active">
    {
        "name":"Default",
        "bgBody":"3f4040",
        "link":"555555",
        "color":"000000",
        "bgItem":"ffffff",
        "title":"000000"
    }



        </script>
    --}}
</head>
<body paddingwidth="0" paddingheight="0" class='bgBody'
      style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;"
      offset="0" toppadding="0" leftpadding="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableContent bgBody" align="center"
       style='font-family:Helvetica, sans-serif;'>


    <tr>
        <td align='center' class='movableContentContainer'>

            <!-- =============== START HEADER =============== -->
            <div class='movableContent'>
                <table width="{!! $ancho !!}" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td height='20'>
                        </td>
                    </tr>
                    <tr>{{--
                        <td width='400' align="left">
                            <div class="contentEditableContainer contentImageEditable">
                                <div class="contentEditable">
                                    <img src="{!! url($logo) !!}" alt="Logo"
                                         data-default="placeholder" data-max-width="300" data-max-height="100">
                                </div>
                            </div>
                        </td>
                        --}}
                        <td width='20'>
                        </td>
                        <td width='180' align="right" valign="bottom" style='vertical-align: bottom;'>
                            <div class="contentEditableContainer contentTextEditable">
                                <div class="contentEditable">
                                    {{--<a target='_blank' href="{!! $linkwindwo !!}" class='link1'>Open in browser</a>--}}
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class='movableContent'>
                <table width="{!! $ancho !!}" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td height='20'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="contentEditableContainer contentImageEditable">
                                <div class="contentEditable">
                                    <img src="{!! $headerimg !!}" alt="Header Image" width='{!! $ancho !!}' height='226'
                                         data-default="placeholder" data-max-width="{!! $ancho !!}">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td height='10' class="fondo-boton" {{--bgcolor="2da4a8"--}}>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- =============== END HEADER =============== -->
            <!-- =============== START BODY =============== -->

            <div class='movableContent'>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td height='20'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="{!! $ancho !!}" border="0" cellspacing="0" cellpadding="0" align="center"
                                   class='bgItem white-card'
                                   style='border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;'>
                                <tr>
                                    <td colspan="5" height='10'>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='20'>
                                    </td>
                                    <td width="{!! $ancho - 50!!}">
                                        <div class="contentEditableContainer contentTextEditable">
                                            <div class="contentEditable">
                                                <h2 style='font-size: 24px;'>{!! $titulo !!}</h2>
                                                @if(!empty($contenido))
                                                    <p>
                                                        {{$contenido}}
                                                    </p>
                                                    <br/>
                                                @endif
                                                <p style='text-align: right;'>
                                                    <a target='_blank' href="{!! $mipagina !!}" class='link2'>
                                                        Ver mi pagina
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td width='20'>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            @for($i = 0; $i < count($horses);$i++)

                <div class='movableContent'>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td height='10'>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="{!! $ancho - 50 !!}" border="0" cellspacing="0" cellpadding="0"
                                       align="center">

                                    @for($z = 0;$z<3;$z++)
                                        @php
                                            $work = null;
                                        if(isset($horses[$i])){
                                            $work = $horses[$i];
                                            $imagen = $work->getPhotoFirstModel();
                                            if(!empty($imagen)){
                                                //$imagen = $imagen->Base64($anchoimagen+30);
                                                $imagen = $imagen->getUrl();
                                            }else{
                                                $imagen = null;
                                            }
                                            $descripcion = $work->getDescripcion();
                                            if(strlen($descripcion)> 161){
                                                $descripcion = substr($descripcion,0,160)."...";
                                            }
                                            $raza = trans('horse.raza.'.$work->raza);
                                            $sexo = trans('horse.sex.'.$work->sex);
                                            $edad = trans('horse.sex.'.$work->sex);
                                            $color = trans('horse.color.'.$work->color);

                                            $nombre = $work->getName();
                                            if(isset($basecaballo)){
                                                $linkcaballo = $basecaballo.$work->slug;
                                            }else{
                                                $linkcaballo = route('MyHorseDetailedBase',['stud'=>$stud->slug,'horse'=>$work->slug]);
                                            }
                                            $color = $work->getColorString();
                                            $descripcion=$raza;
                                            $alzada = $work->getRaisedFormat();
                                            if($alzada != 0) {
                                                $descripcion.= '<br>'.$alzada ;
                                                }
                                            if($edad != 0) {
                                                $descripcion .= '<br>'.trans('horse.years',['ano'=>$work->getAge()]) ;
                                            } else {
                                                 $descripcion .= '<br>'.trans('horse.mes',['mes'=>$work->getAge()]) ;
                                            }
                                            if(!empty($color)){
                                                $descripcion .= '<br>'.$color ;
                                            }
                                        }


                                        @endphp

                                        @if(!empty($work))

                                            <tr>
                                                <td colspan="2" height="5"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" height="5" style="border-top: 1px solid grey;"></td>
                                            </tr>
                                            <tr align="center" valign="middle">
                                                <td  width="{!! $anchoimagen !!}" align="center" valign="middle" class="corte">
                                                    @if(!empty($imagen))
                                                        <a href="{!! $linkcaballo !!}">
                                                        <img src="{!! $imagen !!}" alt="image"
                                                             {{--
                                                             width="{!! $anchoimagen-30 !!}"
                                                             height="150"
                                                             --}}
                                                             class="imgs"
                                                             {{--
                                                             data-default="placeholder"
                                                             data-max-width="150"
                                                             data-max-height="150"
                                                             --}}
                                                        >
                                                        </a>
                                                    @endif

                                                </td>
                                                <td width="100">
                                                    <a href="{!! $linkcaballo !!}">
                                                        <h4 style="text-align: left; padding-left: 10px">
                                                            {{$nombre}}
                                                        </h4>
                                                        <div class="contentEditableContainer contentTextEditable"
                                                             style="padding-top: 10px;padding-left: 10px">
                                                            <p style="text-align: left; font-size: 14px; font-weight: normal">
                                                                {!! $descripcion !!}
                                                            </p>

                                                        </div>
                                                    </a>


                                                </td>
                                            </tr>

                                        @endif
                                        @php($i = $i+1)
                                    @endfor

                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
        @endfor


        <!-- =============== END BODY =============== -->
            <!-- =============== START FOOTER =============== -->

            <div class='movableContent'>


                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <table width="{!! $ancho !!}" border="0" cellspacing="0" cellpadding="0" align="center"
                               class='bgItem '>
                            <tr>
                            <tr>
                                <td height="10">
                                </td>
                            </tr>
                            <td height='10' class="fondo-boton" {{--class="fondo-boton"--}} >
                            </td>
                            </tr>
                        </table>

                    </tr>
                    <tr>
                        <td>
                            <table width="{!! $ancho !!}" border="0" cellspacing="0" cellpadding="0" align="center"
                                   class='bgItem grey-card noborderraduis'>
                                <tr>
                                    <td height='20'>
                                    </td>
                                </tr>
                                <tr>
                                    <td align='center'>
                                        <table width="204" border="0" cellspacing="0" cellpadding="0" align="center"
                                               class='bgItem'>
                                            <tr>
                                                <td width='1' align="center">
                                                    <div class="contentEditableContainer contentFacebookEditable grey-card noborderraduis">
                                                        <div class="contentEditable">
                                                            {{--<img src="{!! url('logos/facebook.png') !!}" alt="Facebook"
                                                                 data-default="placeholder" width='50' height='50'
                                                                 data-max-width="50" data-customIcon="true">--}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td width='200' align="center">
                                                    <div class="contentEditableContainer contentTwitterEditable grey-card noborderraduis">
                                                        <div class="contentEditable corte">
                                                            {{--<img src="{!! url('logos/twitter.png') !!}" alt="Twitter"--}}
                                                            <img src="{!! $piso !!}" alt="HorsesWorldSales.com"
                                                                 {{--
                                                                 width="200" height="50"
                                                                 --}}
                                                                 {{--
                                                                 data-default="placeholder"
                                                                 data-max-width="50" data-customicon="true"
                                                                 --}}
                                                            >
                                                        </div>
                                                    </div>
                                                </td>
                                                <td width='1' align="center">
                                                    <div class="contentEditableContainer contentImageEditable grey-card noborderraduis">
                                                        <div class="contentEditable">
                                                            {{--<img src="{!! url('logos/pinterest.png') !!}"
                                                                 alt="Pinterest" width='50'
                                                                 height='50' data-max-width="50">--}}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>

            <div class='movableContent'>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <td>
                            <table width="{!! $ancho !!}" border="0" cellspacing="0" cellpadding="0" align="center"
                                   class='bgItem grey-card noborderraduis'>
                                <tr>
                                    <td height='20'>
                                    </td>
                                </tr>
                                <tr>
                                    <td align='center'>
                                        <div class="contentEditableContainer contentTextEditable">
                                            <div class="contentEditable">
                                                <p style='color:#a5a5a5;text-align:center;font-size:11px;line-height:19px;'>
                                                    <a target='_blank' href="#" style='color:#a5a5a5'>
                                                        Enviado a traves de HorsesWorldSales.com
                                                    </a>

                                                    <br>
                                                    Enviado por {!! $titulo !!}
                                                    <br>
                                                    Enviado el {!! Funciones::AjustarFechaDmySlash() !!}
                                                    <br>
                                                    {{--
                                                    [CLIENTS.COMPANY_NAME] <br>
                                                    [CLIENTS.ADDRESS] <br>
                                                    [CLIENTS.PHONE] <br>
                                                    <a target='_blank' href="[FORWARD]" style="color:#a5a5a5;">Forward
                                                        to a friend</a> <br>
                                                    <a target='_blank' href="[UNSUBSCRIBE]" style='color:#a5a5a5;'>Unsubscribe</a>
                                                    --}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height='20'>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- =============== END FOOTER =============== -->


        </td>
    </tr>
</table>

</body>
</html>
