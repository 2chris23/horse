@php
    $fotos = isset($fotos)?$fotos:null;

    if(!empty($fotos)){


    if(isset($fotos[1])){
    $foto1 = $fotos[1];
        array_pull($fotos,1);
    }
        if(isset($fotos[2])){
            $foto2 = $fotos[2];
            array_pull($fotos,2);
        }
    }



@endphp
@if(!empty($fotos))
    <table
            class="" border="0" align="center" width="100%"
            style="width: 100% ;"
            cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td bgcolor="#ffffff" align="center">
                <table class="table600" border="0" width="600" cellspacing="0" cellpadding="0" style="width: 600px ;">
                    <tbody>
                    {{--
                    <tr>
                        <td
                            style="font-family: 'Raleway', sans-serif; font-size: 24px; font-weight: 700; color: #333333; letter-spacing: 2px; line-height: 24px;"
                            align="left">
                            <singleline label="title">{!! trans('horse.text.photo') !!}</singleline>
                        </td>
                    </tr>
                    --}}
                    <!-- Underline -->
                    {{--}}
                    <tr>
                        <td align="left">
                            <table border="0" width="75" cellspacing="0" cellpadding="0" style="width: 75px ;">
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
                    <!-- End Underline -->
                    --}}
                    <tr>
                        <td>
                            <table class="full-width"
                                   style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; width: 280px ;"
                                   border="0"
                                   align="left" width="300" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td align="center" class="corte-2"
                                        {{--
                                        @if(isset($foto1))
                                        style=" background:url('{!! $foto1->getUrl()!!}');background-position: center; background-size: cover;"
                                        @endif
                                            --}}
                                        >


                                    @if(isset($foto1))
                                        <img class="img-full"
                                             {{--src="{!! $foto1->Base64($anchoimagen+30) !!}"--}}
                                             src="{!! $foto1->getUrl() !!}"
                                             {{--style=" background:url('{!! $foto1->getUrl()!!}');background-position: center; background-size: cover;"--}}
                                             alt="img" >
                                            @endif

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- SPACE -->
                            {{--
                            <table class="full-width"
                                   style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;width: 1px ;"
                                   border="0"
                                   align="left" width="1" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td style="font-size: 1px; line-height: 1px;width: 1px ;" width="1" height="20">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- END SPACE -->
                            --}}
                            <table class="full-width"
                                   style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; width: 280px ;"
                                   border="0"
                                   align="right" width="287" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td align="center" class="corte-2"
                                        @if(isset($foto2))
                                        {{--style=" background:url('{!! $foto2->getUrl()!!}');background-position: center; background-size: cover;"--}}
                                            @endif>
                                        @if(isset($foto2))
                                        <img class="img-full"
                                             {{--src="{!! $foto2->Base64($anchoimagen+30) !!}"--}}
                                             src="{!! $foto2->getUrl() !!}"
                                             {{--style=" background:url('{!! $foto2->getUrl()!!}');background-position: center; background-size: cover;"--}}
                                             alt="img">
                                            @endif

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    {{--
                    <tr>
                        <td style="font-size: 1px; line-height: 25px;" height="25">&nbsp;</td>
                    </tr>--}}
                    <tr>
                        <td>
                            @include('backend.Masivo.saturno.galeria1',['fotos'=>$fotos])
                        </td>
                    </tr>

                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@endif