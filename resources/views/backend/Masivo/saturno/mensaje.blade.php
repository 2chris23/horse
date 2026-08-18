@php
    $mensaje = isset($mensaje)?$mensaje:'';
    $print = isset($print)?$print:0;
    $special = isset($special)?$special:0;
    $linkcaballo = isset($linkcaballo)?$linkcaballo:null;



@endphp


@if($print != 1)
    {{--
    <table class="" border="0" align="center" width="600"
           cellspacing="0" cellpadding="0" style="width: 600px">
        <tbody>
        <tr>
            <td bgcolor="#ffffff" align="center">
                &nbsp;
                <br>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    --}}
    <table class="" border="0" align="center" width="600"
           cellspacing="0" cellpadding="0" style="width: 600px">
        <tbody>
        <tr>
            <td bgcolor="#ffffff" align="center">
                <table class="table600" border="0" width="600" cellspacing="0" cellpadding="0" style="width: 600px ;">
                    <tbody>

                    <tr>
                        <td style="font-size: 1px; line-height: 15px;" height="15">&nbsp;</td>
                    </tr>

                    <!-- End Underline -->


                    @if($special == 1)
                        <tr>
                            <td style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 400; color: #888896; "
                                align="right">
                                <singleline>
                                    @if(!empty($linkcaballo))
                                        <a href="{!! $linkcaballo !!}">
                                            {{-- style="color:{!! $coloryeguada !!}"--}}
                                            Version Web
                                        </a>
                                        |
                                    @endif
                                    @if(count($horses) == 1)
                                        @php($s = [0=>$horses->slug])
                                    @elseif(count($horses) > 1)

                                        @foreach($horses as $k=>$v)
                                            @php($s[$k] = $v->slug)
                                        @endforeach
                                    @endif

                                    @php($ids = Funciones::RetornoSlugCaballo($s))
                                    <a href="{!! route('VersionImpresa',['ids'=>$ids]) !!}"
                                            {{--style="color:{!! $coloryeguada !!}"--}}
                                    >
                                        Imprimir

                                        <img src="{!! url('logos/print.png') !!}"
                                             alt="print"
                                             style="height: 20px;width: 18px;" height="20"
                                             width="18">


                                    </a>

                                </singleline>
                            </td>
                        </tr>
                    @endif
                    @if(!empty($mensaje) and $pdf == 0)
                        <tr>
                            <td style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 400; color: #888896; "
                                align="right">
                                <singleline>
                                    Enviado
                                    el {!! Funciones::AjustarFechaDmySlash() !!}
                                    <br>
                                </singleline>
                            </td>
                        </tr>
                    @endif

                    <tr>
                        <td style="font-size: 1px; line-height: 15px;width:600px" height="20" width="200">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>

                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <table class="" border="0" align="left" width="600"
           cellspacing="0" cellpadding="0" style="width: 600px ;">
        <tbody>
        <tr>
            <td bgcolor="#ffffff" align="center">
                <br>
                &nbsp;
                <br>
            </td>
        </tr>
        </tbody>
    </table>


@endif
@if(!empty($mensaje))
    <table class="" border="0" align="center" width="100%"
           cellspacing="0" cellpadding="0" style="width: 100% ;">
        <tbody>

        <tr>
            <td bgcolor="#ffffff" align="center">
                <table class="table600" border="0" width="600" cellspacing="0" cellpadding="0" style="width: 600px ;">
                    <tbody>

                    <tr>
                        <td style="font-size: 1px; line-height: 15px;" height="15">&nbsp;</td>
                    </tr>

                    <!-- End Underline -->
                    @if(!empty($mensaje) and $pdf == 0)
                        <tr>
                            <td style="font-size: 1px; line-height: 1px;" height="10">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 400; color: #8f96a1; line-height: 24px;"
                                align="left">
                                <multiline>
                                    <p>&nbsp;
                                    </p>
                                    {!! $mensaje !!}

                                </multiline>
                            </td>
                        </tr>
                    @endif

                    <tr>
                        <td style="font-size: 1px; line-height: 15px;" height="30">&nbsp;</td>
                    </tr>

                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@endif
