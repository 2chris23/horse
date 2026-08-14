@php
    if(isset($dato)){
                $horses = isset($dato['horses'])?$dato['horses']:null;
                $user = isset($dato['user'])?$dato['user']:null;
                $stud = isset($dato['stud'])?$dato['stud']:null;
                $titulo = isset($dato['titulo'])?$dato['titulo']:null;
                $contenido = isset($dato['contenido'])?$dato['contenido']:null;
                $pdf = isset($dato['pdf'])?$dato['pdf']:0;
                $special = isset($dato['special'])?$dato['special']:0;
                }
                $pdf = isset($pdf)?$pdf:0;
                $special = isset($special)?$special:0;
            $logo = url(\Config::get('logos.logoh250'));
            $piso = url(\Config::get('logos.logoh250'));

            $stud = isset($stud)?$stud:\Auth::user()->Yeguada();
            $nombreyeguada = $stud->getName();
            $decsripcionyeguada=substr($stud->getDescription(),0,150);

            $direccionyeguada=$stud->getAddress();
        $direccionyeguada.= (!empty($stud->getCity()))?", ".$stud->getCity():null;
        $direccionyeguada.= !empty($stud->getStateModel()->name)?", ".$stud->getStateModel()->name:null;
        $direccionyeguada.= !empty($stud->getCountryModel()->getName())?", ".$stud->getCountryModel()->getName():null;
            $telefonoyeguada=$stud->getPhoneFormat();
            $cd = 0;
            foreach($stud->getPhoneModel() as $k=> $v){
            if($v->isNull() !== true){
                if($cd == 0){
                $telefonoyeguada = $v->FormatNumber();
                    $cd = 1;
                    }}
            }


            $correoyeguada=$stud->getEmail();
            $mipagina = route('MyPageBase',['slug'=>$stud->slug]);
            if(strlen($decsripcionyeguada > 150)){
                $decsripcionyeguada.='...';
            }


            //$headerimg = $stud->getLogo()->Base64(450);
            $headerimg = $stud->LogoBase64();
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
            $mipagina = route('MyPageBase',['slug'=>$stud->slug]);
            $titulo = $stud->getName() ;
            /*
            $dominio = $stud->getDomain();
            if(!empty($dominio)){
                $mipagina = "http://$dominio";
                $basecaballo = $mipagina.'/Caballo/';
            }
            */

            $nombrecaballo = '';
            $descripcion ='';
            $work = null;
            $fotoprincipal = null;
            $yeguadacriador  = null;
        $fotoprincipal = null;
        $linkcaballo  = null;
            $fotoprincipal = null;
                $fotos = null;
                $imagen = null;
                $descripcion = null;
                $yeguadacriador = null;

        if(isset($horses)){
        $work = $horses;
        }

            if(isset($work)){

                $fotoprincipal = null;
        /*
        $yeguadacriador  = $work->stud;
                $imagen = $work->getPhotoFirstModel();
                if(!empty($imagen)){
                    $fotoprincipal = $imagen->Base64($anchoimagen+30);
                    //$imagen = $imagen->getUrl();
                }else{
                    $fotoprincipal = null;
                }
                $fotos = $work->getPhotoModel();
                $descripcion = $work->getDescripcion();
                if(strlen($descripcion)> 161){
                    $descripcion = substr($descripcion,0,160)."...";
                }
                $raza = trans('horse.raza.'.$work->raza);
                $sexo = trans('horse.sex.'.$work->sex);
                $edad = trans('horse.sex.'.$work->sex);
                $color = trans('horse.color.'.$work->color);

                $nombrecaballo = $work->getName();
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
                */
            }


@endphp
<style>
    /*
    table {
        page-break-inside: auto;
    }

    tr {
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
    @page {
        size: auto;   /* auto is the current printer page size */
        margin: 7mm;  /* this affects the margin in the printer settings */
    }

    td,
    img {
        page-break-before: auto; /* 'always,' 'avoid,' 'left,' 'inherit,' or 'right' */
        page-break-after: auto; /* 'always,' 'avoid,' 'left,' 'inherit,' or 'right' */
        page-break-inside: avoid; /* or 'auto' */
    }

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
</style>
@include('backend.Masivo.saturno.sobre',
[
'nombreyeguada'=>$nombreyeguada,
'logo'=>$headerimg,
'mensaje'=>$contenido,
'coloryeguada'=>$coloryeguada
,'milink'=>$mipagina,
'pdf'=>$pdf,
'special'=>$special
])

{{--
@include('backend.Masivo.saturno.galeria1',compact('fotos'))
--}}

@include('backend.Masivo.saturno.varios')
@include('backend.Masivo.saturno.galeria')
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
@include('backend.Masivo.saturno.contacto')
{{--@include('backend.Masivo.saturno.foot')--}}