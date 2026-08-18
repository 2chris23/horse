@php($max = 6)
@if(!empty($fotos))

    <table class="table600" border="0" width="600" align="center" cellspacing="0" cellpadding="0">
        <tbody>
        @php($pasada = 0)
        @php($cd = 0)
        @foreach($fotos as $k=>$v)

            {{--@for($i =0 ;$i < count($fotos);$i++ )--}}
            @if($k != 2)

                @if($cd< $max)
                    @php
                        $i = $cd;
                        $tsda = $v;
                            //$tsda = isset($fotos[$i])?$fotos[$i]:null;
                        $s = ($i%3) ;
                        if($s == 2){
                        $pasada = 1;
                        }elseif($s ==0){
                        $pasada = 0;
                        }else{
                        $pasada = 2;}
                    @endphp


                    @if(!empty($tsda))
                        @if($s==0 and $pasada==0)
                            <tr>
                                @endif
                                <td style="font-size: 1px; line-height: 20px;" height="20"
                                    class=" @if($k>5) no-show @endif ">
                                    @if($s<3)
                                        <table class="full-width "
                                               {{--height="122" width="183"--}}
                                               style="border-collapse:collapse; mso-table-lspace:0pt;width: 183px;height: 183px;
                               mso-table-rspace:0pt;" border="0"
                                               align="center" cellspacing="0" cellpadding="0"
                                        >
                                            <tbody>
                                            <tr>

                                                <td align="center"
                                                    class="corte" {{--style = "background:url('{!! $tsda->geturl() !!}');background-position: center; background-size: cover;"--}}>

                                                    <img
                                                            class="img-full"
                                                            {{--src="{!! $tsda->Base64($anchoimagen+30) !!}"--}}
                                                            src="{!! $tsda->getUrl() !!}"
                                                            alt="{!! $tsda->getUrl() !!}"
                                                            style="min-width: 183px;min-height: 122px;display: inline-block;
                                                                {{--background:url('{!! $tsda->geturl() !!}');background-position: center; background-size: cover;--}}">
                                                </td>

                                            </tr>
                                            </tbody>
                                        </table>
                                @endif

                                <!--------------fffffffffffffffffffffff---------------->
                                </td>
                                @if($s==0 and $pasada==1)
                            </tr>
                        @endif
                    @endif
                @endif
                @php($cd++)
            @endif
        @endforeach
        {{--@endfor--}}


        <tr>
            <td style="font-size: 1px; line-height: 20px;" height="20">&nbsp;</td>
        </tr>

        </tbody>
    </table>

@endif