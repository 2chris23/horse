@php
    $pdf = isset($pdf)?$pdf:0;
    $nombreyeguada = isset($nombreyeguada)?$nombreyeguada:'';
    $logo = isset($logo)?$logo:'';
    $mensaje = isset($mensaje)?$mensaje:'';
    $coloryeguada = isset($coloryeguada)?$coloryeguada:'#e94654';
    $special = isset($special)?$special:0;
    $linkcaballo = isset($linkcaballo)?$linkcaballo:null;

@endphp

@include('backend.Masivo.saturno.mensaje',['mensaje'=>$mensaje,'pdf'=>$pdf,'special'=>$special,'linkcaballo'=>$linkcaballo])

<table class="" border="0" align="center" width="100%"
       cellspacing="0" cellpadding="0" style="width: 100% ;">
    <tbody>
    <tr>
        <td bgcolor="#ffffff" align="center">
            <table class="table600" border="0" width="600" cellspacing="0" cellpadding="0" style="width: 600px ;">
                <tbody>
                <tr>
                    <td align="center">
                        <a href="{!! $milink !!}" style="color:unset;text-decoration:unset">
                            <img src="{!! $logo !!}"
                                 style="width: 55px ;"
                                 alt="{!! $nombreyeguada !!}" width="50">
                        </a>
                    </td>

                </tr>
                <!-- End Underline -->
                <tr>
                    <td style="font-size: 1px; line-height: 1px;" height="10">&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-family: 'Raleway', sans-serif; font-size: 18px; font-weight: 700; color: #333333; {{--line-height: 36px;--}} letter-spacing: 2px;"
                        align="center">
                        <singleline label="title">
                            <a href="{!! $milink !!}" style="color:unset;text-decoration:unset">
                                {{ $nombreyeguada  }}
                            </a>
                        </singleline>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <table border="0" width="100" cellspacing="0" cellpadding="0" style="width: 100px ;">
                            <!-- Edit Underline -->
                            <tbody>
                            <tr>
                                <td style="border-bottom: 1px solid {!! $coloryeguada !!};"
                                    height="10">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 1px; line-height: 15px;" height="15">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
