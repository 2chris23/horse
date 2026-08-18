@php($img = isset($img)?$img:null)
@php($nombre = isset($nombre)?$nombre:null)
@php($alt = isset($alt)?$alt:null)
@php($c_des = isset($c_des)?$c_des:null)
@php($link = isset($link)?$link:null)
<table class="full-width"
       style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; padding-top: 10px;width: 183px"
       border="0"
       align="left" width="183" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
        <td align="center" class="corte">
            <a href="{!! $link !!}">
                <img class="img-full" src="{!! $img !!}"
                     alt="{!! $alt !!}" width="183" height="122">
            </a>
        </td>
    </tr>
    <tr>
        <td style="font-size: 1px; line-height: 20px;" height="20">&nbsp;</td>
    </tr>
    <tr>
        <td style="font-family: 'Raleway', sans-serif; font-size: 20px; font-weight: 700; color: #333333; letter-spacing: 2px; line-height: 22px;"
            align="center">
            <singleline label="title">{!! $nombre !!}</singleline>
        </td>
    </tr>
    <tr>
        <td style="font-size: 1px; line-height: 10px;" height="10">&nbsp;</td>
    </tr>
    <tr>
        <td style="font-family: 'Raleway', sans-serif; font-size: 13px; font-weight: 400; color: #8f96a1; line-height: 24px;"
            align="center">
            <multiline>
                {!! $c_des !!}

            </multiline>
        </td>
    </tr>
    </tbody>
</table>
