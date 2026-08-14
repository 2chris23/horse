<?php

use App\Http\Controllers\Functions;

if (isset($dato)) {
    $horses = isset($dato['horses']) ? $dato['horses'] : null;
    $user = isset($dato['user']) ? $dato['user'] : null;
    $stud = isset($dato['stud']) ? $dato['stud'] : null;
    $titulo = isset($dato['titulo']) ? $dato['titulo'] : null;
    $contenido = isset($dato['contenido']) ? $dato['contenido'] : null;
    $pdf = isset($dato['pdf']) ? $dato['pdf'] : 0;
    $special = isset($dato['special']) ? $dato['special'] : 0;
    $linkcaballo = isset($dato['linkcaballo']) ? $dato['linkcaballo'] : null;
}

$stud = isset($stud) ? $stud : \Auth::user()->Yeguada();
$linkcaballo = isset($linkcaballo) ? $linkcaballo : null;


$pdf = isset($pdf) ? $pdf : 0;
$special = isset($special) ? $special : 0;
$logo = url(\Config::get('logos.logoh250'));
$piso = url(\Config::get('logos.logoh250'));
//$stud = $stud;
$nombreyeguada = $stud->getName();
$decsripcionyeguada = substr($stud->getDescription(), 0, 150);
$direccionyeguada = $stud->getAddress();
$direccionyeguada .= (!empty($stud->getCity())) ? ", " . $stud->getCity() : null;
$direccionyeguada .= !empty($stud->getStateModel()->name) ? ", " . $stud->getStateModel()->name : null;
$direccionyeguada .= !empty($stud->getCountryModel()->getName()) ? ", " . $stud->getCountryModel()->getName() : null;
$telefonoyeguada = $stud->getPhoneFormat();
$cd = 0;
foreach ($stud->getPhoneModel() as $k => $v) {
    if ($v->isNull() !== true) {
        if ($cd == 0) {
            $telefonoyeguada = $v->FormatNumber();
            $cd = 1;
        }
    }
}
$correoyeguada = $stud->getEmail();
$mipagina = route('MyPageBase', ['slug' => $stud->slug]);
if (strlen($decsripcionyeguada > 150)) {
    $decsripcionyeguada .= '...';
}


//$headerimg = $stud->getLogo()->Base64(450);
/*
$headerimg = $stud->getLogo();
$headerimg = $stud->LogoBase64();
*/
$headerimg = $stud->getLogo();

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
$coloryeguada = $colorbotones;
$mipagina = route('MyPageBase', ['slug' => $stud->slug]);
$titulo = $stud->getName();
/*
$dominio = $stud->getDomain();
if(!empty($dominio)){
    $mipagina = "http://$dominio";
    $basecaballo = $mipagina.'/Caballo/';
}
*/

$nombrecaballo = '';
$descripcion = '';


$work = null;
$fotoprincipal = null;
$yeguadacriador = null;
$fotoprincipal = null;
//$linkcaballo  = null;


if (isset($horses)) {
    $work = $horses;
}

if (!empty($work)) {

    try {
        $s = $work->id;
    } catch (\ErrorException $e) {
        $work = $work->first();
    }

    if (!empty($work)) {
        $imagen = $work->getPhotoFirstModel();
        $fotos = $work->getPhotoModel();
    } else {
        $imagen = null;
        $fotos = null;
    }


    $yeguadacriador = $work->stud;
    $fotoprincipal = null;
    if (!empty($imagen)) {
        if (isset($fotos[0])) {
            array_pull($fotos, 0);
        }
        //$fotoprincipal = $imagen->Base64($anchoimagen+30);
        //$imagen = $imagen->getUrl();
        $fotoprincipal = $imagen->getUrl();
    } else {
        $fotoprincipal = null;
    }

    /*
    $descripcion = $work->getDescripcion();
    if(strlen($descripcion)> 161){
        $descripcion = substr($descripcion,0,160)."...";
    }
    */
    $nombrecaballo = $work->getName();
    if (!empty($linkcaballo)) {
        $linkcaballo = $linkcaballo;
    } else {
        if (isset($basecaballo)) {
            $linkcaballo = $basecaballo . $work->slug;
        } else {
            $linkcaballo = route('MyHorseDetailedBase', ['stud' => $stud->slug, 'horse' => $work->slug]);
        }
    }

    $color = trans('horse.color.' . $work->color);

    $raza = trans('horse.raza.' . $work->raza);
    $sexo = trans('horse.sex.' . $work->sex);

    $edad = trans('horse.sex.' . $work->sex);
    $color = $work->getColorString();
    $descripcion = $raza;
    $descripcion .= '<br>' . $sexo;
    if ($work->getDoma() != 1) {
        $descripcion .= '<br>' . trans('horse.doma.0');
    } else {
        $descripcion .= '<br>' . trans('horse.doma.' . $work->doma);
    }
    $alzada = $work->getRaisedFormat();
    if ($alzada != 0) {
        $descripcion .= '<br>' . $alzada;
    }
    //TableHtml
    $edad = $work->getAge();
    $mes = $work->getAgeMonth();

    if ($edad != 0) {
        $descripcion .= "<br>" . trans('horse.years', ['ano' => $edad]);
    } else {
        $descripcion .= "<br>" . trans('horse.mes', ['mes' => $mes]);
    }

    if (!empty($color)) {
        $descripcion .= '<br>' . $color;
    }
    $tocubri = $work->tocubri;
    if (!empty($tocubri)) {
        $cubri = Funciones::AjustarNumeroMil($work->ObtenPrecioCubricionMoneda()) . " " . $work->getSimboloMoneda();
        $descripcion .= '<br>' . trans('horse.text.cubricion') . " $cubri";
    }
    $tosold = $work->tosold;
    if ($tosold != 0) {
        $sold = $work->sold;
        if ($sold != 1) {
            if ($work->price != 0) {
                $precio = Funciones::AjustarNumeroMil($work->ObtenPrecioMonedaMill()) . " " . $work->getSimboloMoneda();/* " €";*/
                $descripcion .= '<br>' . trans('portal.price') . " $precio";
            } else {
                $descripcion .= '<br>' . trans('users.pricecheck') . "<br>";
            }
        } else {
            $descripcion .= '<br>' . trans('users.sold') . "<br>";
        }
    }


    /************************************/
    /************************************/
    /************************************/
    $descripcion = '';
    $descripcion .= Functions::TableHtml(trans('portal.raza') . ': ', trans('horse.raza.' . $work->raza), $coloryeguada);
    //$descripcion .= trans('portal.age') . ': ';
    if ($edad != 0) {
        $descripcion .= Functions::TableHtml(trans('portal.age') . ': ', trans('horse.years', ['ano' => $edad]), $coloryeguada);
        //$descripcion .= trans('horse.years', ['ano' => $edad]) . "<br>";
    } else {
        $descripcion .= Functions::TableHtml(trans('portal.age') . ': ', trans('horse.mes', ['mes' => $mes]), $coloryeguada);
        //$descripcion .= trans('horse.mes', ['mes' => $mes]) . "<br>";
    }
    if (!empty($work->raised)) {
        $descripcion .= Functions::TableHtml(trans('stud.text.raised') . ': ', $work->getRaisedFormat(), $coloryeguada);
        //$descripcion .= trans('stud.text.raised') . ': ' . $work->getRaisedFormat() . "<br>";
    }
    if (!empty($work->sex)) {
        $descripcion .= Functions::TableHtml(trans('portal.sex') . ': ', trans('horse.sex.' . $work->sex), $coloryeguada);
        //$descripcion .= trans('portal.sex') . ': ' . trans('horse.sex.' . $work->sex) . "<br>";
    }
    if (!empty($work->color)) {
        $descripcion .= Functions::TableHtml(trans('horse.attrib.color') . ': ', trans('horse.color.' . $work->color), $coloryeguada);
        //$descripcion .= trans('horse.attrib.color') . ': ' . trans('horse.color.' . $work->color) . "<br>";
    }

    /*
    if (!empty($work->getStud())) {
        if ($work->getStud() != '') {
            $descripcion .= trans('horse.text.stud') . ' : ' . $work->getStud() . "<br>";
        }
    }
    */
    //$descripcion .= trans('portal.doma') . ': ';
    if ($work->getDoma() != 1) {
        $descripcion .= Functions::TableHtml(trans('portal.doma') . ': ', trans('horse.doma.0'), $coloryeguada);
        //$descripcion .= trans('horse.doma.0') . "<br>";
    } else {
        $descripcion .= Functions::TableHtml(trans('portal.doma') . ': ', trans('horse.doma.' . $work->doma), $coloryeguada);
        //$descripcion .= trans('horse.doma.' . $work->doma) . "<br>";
    }
    /* if(!empty($work->getGenealogia())){
        trans('horse.text.genealogia') : <a href=" url($work->getGenealogia()) " target="_blank"> trans('tema1.ficha') </a>
    } */
    if (!empty($work->tocubri)) {

        $descripcion .= Functions::TableHtml(trans('horse.text.cubricion') . ': ', Funciones::AjustarNumeroMil($work->ObtenPrecioCubricionMoneda()) . " " . $work->getSimboloMoneda(), $coloryeguada);
        //$descripcion .= trans('horse.text.cubricion') . ': ' . Funciones::AjustarNumeroMil($work->getCubriPrice()) . "€ <br>";
    }
    if ($work->getTosold() == true) {
        //$descripcion .= Functions::TableHtml(trans('portal.price') . ': ', );
        //$descripcion .= trans('portal.price') . ': ';
        if ($work->sold == 1) {
            //$descripcion .= trans('users.sold');
            $descripcion .= Functions::TableHtml(trans('portal.price') . ': ', trans('users.sold'), $coloryeguada);
        } else {
            if (empty($work->getPrice())) {
                //$descripcion .= trans('users.pricecheck') . "<br>";
                $descripcion .= Functions::TableHtml(trans('portal.price') . ': ', trans('users.pricecheck'), $coloryeguada);
            } else {

                //$descripcion .= "".Funciones::AjustarNumeroMil($work->getPrice()) . "€<br>";
                $descripcion .= Functions::TableHtml(trans('portal.price') . ': ', Funciones::AjustarNumeroMil($work->getPrice()) . " " . $work->getSimboloMoneda(), $coloryeguada);
            }
        }
    }
    /************************************/
    /************************************/
    /************************************/


}
if (isset($linkcaballo)) {
    //$descripcion .=  'Link: '.$linkcaballo;
}

?>
<style>
    @page {
        size: auto;   /* auto is the current printer page size */
        margin: 7mm;  /* this affects the margin in the printer settings */
    }

    /*
    table {
        page-break-inside: auto;
        page-break-after: auto;
    }

    tr {
        page-break-inside: avoid;
        page-break-after: auto;
    }

    td {
        page-break-inside: avoid;
        page-break-after: auto;
    }


    thead {
        display: table-header-group;
    }

    tfoot {
        display: table-footer-group;
    }
    */
    td,
    img {
        page-break-before: auto; /* 'always,' 'avoid,' 'left,' 'inherit,' or 'right' */
        page-break-after: auto; /* 'always,' 'avoid,' 'left,' 'inherit,' or 'right' */
        page-break-inside: avoid; /* or 'auto' */
    }

    @media print {
        .no-show {
            display: none;
        }

    }

    .corte-3,
    .corte-2,
    .corte {
        float: left;
        overflow: hidden;
        position: relative;
        height: 200px;
        margin-left: 10px;
        width: 100%;
        margin: 0 auto;
        margin-top: 15px;
        background-position: center;
        background-size: cover;
    }

    .corte-3 {

    }

    .corte-3 img,
    .corte-2 img,
    .corte img {
        {{--position: absolute;
            margin-left: -15px;
            transform: scale(1);
            transition: all 1s;
            -webkit-transition: all 1s;
            -moz-transition: all 1s;
            -o-transition: all 1s;
            width: 100%;
            height: auto;
            left: 0px;
            max-height: 300px;
            max-width: 300px;
            height: auto;
            width: auto;--}}
                   position: absolute;
        /* margin-left: -15px; */
        transform: scale(1);
        transition: all 1s;
        -webkit-transition: all 1s;
        -moz-transition: all 1s;
        -o-transition: all 1s;
        /*max-height: 200px;*/
        /*max-width: 200px;*/
        top: 0px;
        width: 200px;
        height: auto;
        margin-left: -100px;
    }

    .corte-2 img {
        width: 300px;
        height: auto;
        margin-left: -150px;
    }

    .corte-3 img {
        margin-left: -180px;
        width: 310px;
    }
</style>
{{--




--}}
@if(!empty($horses))

    @include('backend.Masivo.saturno.sobre',
    [
    'nombreyeguada'=>$nombreyeguada,
    'logo'=>$headerimg,
    'mensaje'=>$contenido,
    'coloryeguada'=>$coloryeguada,
    'milink'=>$mipagina,
    'pdf'=>$pdf,
    'special'=>$special,
    'linkcaballo'=>$linkcaballo
    ])

    <table class="currentTable" border="0"
           align="center" width="100%" cellspacing="0" cellpadding="0" style="width: 100%">
        <tbody>
        <tr>
            <td bgcolor="#ffffff" align="center">
                <table class="table600" border="0" width="600" cellspacing="0" cellpadding="0" style="width: 600px;">
                    <tbody>

                    <tr>
                        <td align="center">

                        </td>
                    </tr>
                    <!-- End Underline -->
                    <tr>
                        <td style="font-family: 'Raleway', sans-serif; text-align: left; font-size: 18px; font-weight: 700; color: #333333;  letter-spacing: 2px;"
                            height="30">
                            {!! $nombrecaballo !!}
                        </td>
                    </tr>
                    <tr>
                        <td>

                            <table class="full-width"
                                   style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; width: 287px"
                                   border="0"
                                   align="right" width="287" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td align="center" class="center corte-3">
                                        <a href="{!! $linkcaballo !!}">

                                            <img class="img-full"
                                                 src="{!! $fotoprincipal !!}"
                                                 {{--
                                                 @if(isset($fotoprincipal))
                                                 style=" background:url('{!!  $fotoprincipal !!}');background-position: center; background-size: cover;"
                                                 @endif
                                                         --}}
                                                 alt="img">


                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- SPACE -->
                            <table class="full-width"
                                   style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; width: 1px"
                                   border="0"
                                   align="right" width="1" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td style="font-size: 30px; line-height: 30px;width: 1px" width="1" height="30">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END SPACE -->
                            <table class="full-width"
                                   style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;width: 287px;font-weight: 700;"
                                   border="0"
                                   align="left" width="250" cellspacing="0" cellpadding="0">
                                <tbody>
                                {{--
                                <tr>
                                    <td data-color="Article Left Title" data-size="Article Left Title"

                                        style="font-family: 'Raleway', sans-serif; font-size: 24px; font-weight: 700; color: #333333; letter-spacing: 2px; line-height: 32px;">
                                        <singleline label="title">{{ $nombrecaballo }}</singleline>
                                    </td>
                                </tr>
                                --}}
                                <tr>
                                    <td style="font-size: 1px; line-height: 10px;" height="10">&nbsp;</td>
                                </tr>
                                @if(!empty($yeguadacriador))
                                    <tr>


                                        <td
                                                style="font-family: 'Raleway', sans-serif; font-size: 13px;
                                                {{--font-weight: 700;--}}
                                                        color: {!! $coloryeguada !!}; letter-spacing: 2px; line-height: 18px;">
                                            <singleline>
                                                {!! Functions::TableHtml(trans('horse.hierro') . ': ', $yeguadacriador ,$coloryeguada) !!}

                                            </singleline>
                                        </td>
                                    </tr>
                                @endif

                                <tr>
                                    <td
                                            style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 400; color: #8f96a1; ">
                                        <multiline>{!! $descripcion !!} </multiline>
                                    </td>
                                </tr>
                                {{--
                                <tr>
                                    <td style="font-size: 1px; line-height: 20px;" height="20">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td
                                            style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 500; color: #e94654; line-height: 24px;">
                                        <a href="{!! $linkcaballo !!}" target="_blank"
                                           style="color: #e94654; text-decoration: none;">
                                            <singleline label="button">
                                                Visitame
                                            </singleline>
                                        </a>
                                    </td>
                                </tr>
                                --}}
                                </tbody>
                            </table>


                            <!-- SPACE -->
                            <table class="full-width"
                                   style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; width: 1px"
                                   border="0" align="left" width="1" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td style="width: 1px ;font-size: 40px; line-height: 1px;" width="1" height="10">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END SPACE -->
                        </td>
                    </tr>

                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>

    {{--
    @include('backend.Masivo.saturno.galeria1',compact('fotos'))
    --}}
    @if(count($fotos)!=0)
        @include('backend.Masivo.saturno.galeria')
    @endif
    {{--
    <table  class="" border="0" align="center" width="100%"
           cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td bgcolor="#ffffff" align="center">
                @include('backend.Masivo.saturno.varios')
            </td>
        </tr>
        </tbody>
    </table>
    --}}

    @include('backend.Masivo.saturno.contacto',['special'=>$special,'linkcaballo'=>$linkcaballo,'nombrecaballo'=>$nombrecaballo])
    {{--@include('backend.Masivo.saturno.foot')--}}
@else

@endif