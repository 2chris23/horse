<table class="" border="0" align="center" width="100%" cellspacing="0" cellpadding="0" style="width: 100% ;">
    <tbody>
    <tr>
        <!-- Background -->
        <td bgcolor="#fff" align="center">
            <table class="table600" border="0" width="600" cellspacing="0" cellpadding="0"
                   style="width: 600px ;">
                <tbody>
                <tr>
                    <td style="font-size: 1px; line-height: 10px;" height="10">&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 400; color: #5e5e5e; line-height: 24px;"
                        align="center">
                        <singleline label="title"><a href="{!! route('portal') !!}">
                                <img
                                        height="40" width="200"
                                        {{--src="{!! url(\Config::get('logos.blanco750X')) !!}"--}}
                                        src="{!! url(\Config::get('logos.logoh250')) !!}"
                                        alt="HorsesWorldSale.com" style="width: 200px ; height: 40px">
                            </a></singleline>
                    </td>
                </tr>
                <tr>
                    <td style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 400; color: #5e5e5e; line-height: 24px;"
                        align="center">
                        <singleline label="title">
                            {{--{!! trans('portal.allright') !!}--}}

                            <a href="{!! route('portal') !!}" class="copyright" style="color:#5e5e5e;">
                                HorsesWoldSale.com</a>
                            ©
                            {!! Funciones::CurrentYear()!!}
                            {!! trans('portal.allright') !!}
                        </singleline>


                    </td>
                </tr>
                <tr>
                    <td style="font-size: 1px; line-height: 10px;" height="10">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>