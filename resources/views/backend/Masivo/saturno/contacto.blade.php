@php
    $print = isset($print)?$print:0;
    $special = isset($special)?$special:0;

        $nombreyeguada=isset($nombreyeguada )?$nombreyeguada :'';
        $decsripcionyeguada=isset($decsripcionyeguada )?$decsripcionyeguada :'';
        $mipagina=isset($mipagina )?$mipagina :'';
        $direccionyeguada=isset($direccionyeguada )?$direccionyeguada :'';
        $telefonoyeguada=isset($telefonoyeguada )?$telefonoyeguada :'';
        $correoyeguada=isset($correoyeguada )?$correoyeguada :'';
        $linkcaballo=isset($linkcaballo )?$linkcaballo :null;


@endphp

<table
        class="" border="0" align="center" width="100%" cellspacing="0" cellpadding="0" style="width: 100% ;">
    <tbody>
    <tr>
        <!-- Background -->
        <td bgcolor="#ffffff" align="center">
            <table class="table600" border="0" width="600" cellspacing="0" cellpadding="0" style="width: 600px ;">
                <tbody>

                <tr>
                    <td>
                        <!-- SPACE -->
                        <table style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; width: 1px ;"
                               border="0"
                               align="center" width="1" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td style="width: 1px ;font-size: 1px; line-height: 1px;" width="1" height="10">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- END SPACE -->
                        <table class="container2-2"
                               style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; width: 600px ;"
                               border="0"
                               align="center" width="170" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td align="center">

                                        <img src="{!! $headerimg !!}"
                                             style="width: 40px ;"
                                             alt="{!! $nombreyeguada !!}" width="50">

                                </td>
                            </tr>
                            <tr>
                                <td
                                        style="font-family: 'Raleway', sans-serif; font-size: 15px; font-weight: 400; color: #5e5e5e; line-height: 20px; font-size: 16px; font-weight: 600;"
                                        align="center">
                                    <singleline label="title">
                                        {!! $nombreyeguada !!}
                                    </singleline>
                                </td>
                            </tr>
                            <tr>
                               <td style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 400; color: #888896; "
                                    align="center">
                                   <singleline>{!! $direccionyeguada !!}</singleline>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 400; color: #888896; line-height: 24px;"
                                    align="center">
                                    <multiline>{!! str_replace('<br>','',$correoyeguada)." / ".str_replace('<br>','',$telefonoyeguada) !!}  </multiline>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 400; color: #e54a39; "
                                    align="center">
                                    <unsubscribe>
                                        <a href="{!! $mipagina !!}" style="color:{!! $coloryeguada !!}">
                                            {!! $mipagina !!}
                                        </a>

                                    </unsubscribe>
                                </td>
                            </tr>


                            @if($print != 1)
                                {{--
                                <tr>
                                    <td style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 400; color: #888896; "
                                        align="center">
                                        <singleline>Enviado
                                            el {!! Funciones::AjustarFechaDmySlash() !!}</singleline>
                                    </td>
                                </tr>
--}}







                                @if($special!=1)

                                <tr>
                                    <td style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 400; color: #888896; line-height: 24px;"
                                        align="center">
                                        <singleline>
                                            {{--
                                            @if(count($horses) == 1)
                                                @php($s = [0=>$horses->slug])
                                            @elseif(count($horses) > 1)

                                                @foreach($horses as $k=>$v)
                                                    @php($s[$k] = $v->slug)
                                                @endforeach
                                            @endif

                                            @php($ids = Funciones::RetornoSlugCaballo($s))
                                            <a href="{!! route('VersionImpresa',['ids'=>$ids]) !!}"
                                               style="color:{!! $coloryeguada !!}">
                                                <img src="{!! url('logos/print.png') !!}"
                                                     alt="print"
                                                     style="height: 20px;width: 18px;" height="20"
                                                     width="18">

                                            </a>
                                            --}}

                                        </singleline>
                                    </td>
                                </tr>
                                @endif

                            <tr>
                                <td style="font-size: 1px; line-height: 20px;" height="20">&nbsp;</td>
                            </tr>
                            <tr>
                                <td
                                        style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 400; color: #888896; line-height: 24px;text-align: center;"
                                        align="center">
                                    <multiline>
                                        @if(!empty($stud->getFacebook()->getUrlPage()))
                                            <a href="{!! $stud->getFacebook()->getUrlPage() !!}" target="_blank"
                                               title="">
                                                <img src="{!! url('logos/iconoface1.png') !!}" alt="facebook"
                                                             style="height: 30px;width: 30px;" height="30"
                                                             width="30"></a>
                                        @endif
                                        @if(!empty($stud->getTwitter()->getUrlPage()))
                                            <span style="padding-right: 20px;"></span>
                                            <a href="{!! $stud->getTwitter()->getUrlPage() !!}" target="_blank"
                                               title=""><img src="{!! url('logos/iconotwit1.png') !!}" alt="twitter"
                                                             style="height: 30px;width: 30px;" height="30"
                                                             width="30"></a>
                                        @endif

                                        {{--
                                    @if(!empty($stud->getPinterest()->getUrlPage()))

                                        <a href="{!! $stud->getPinterest()->getUrlPage() !!}" target="_blank" title="">
                                            <i class="fa p-l-10 fa-pinterest"></i> {!! $stud->getPinterest()->getUrlPage() !!}
                                        </a><br>

                                    @endif
                                    @if(!empty($stud->getInstagram()->getUrlPage()))

                                        <a href="{!! $stud->getInstagram()->getUrlPage() !!}" target="_blank" title="">
                                            <i class="fa p-l-10 fa-instagram"></i> {!! $stud->getInstagram()->getUrlPage() !!}
                                        </a><br>

                                    @endif
                                    --}}
                                        @if(!empty($stud->getYoutube()->getUrlPage()))
                                            <span style="padding-right: 20px;"></span>
                                            <a href="{!! $stud->getYoutube()->getUrlPage() !!}" target="_blank"
                                               title=""><img src="{!! url('logos/iconoyou1.png') !!}" alt="youtube"
                                                             style="height: 30px;width: 30px;" height="30"
                                                             width="30"></a>
                                        @endif
                                        {{--{!! $decsripcionyeguada !!}--}}

                                    </multiline>
                                </td>
                            </tr>
                            @endif

                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 1px; line-height: 1px;" height="20">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
@if($print == 1)
    <script type="text/javascript">window.print();</script>
@endif