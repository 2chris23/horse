@php

    $titulo = $dat['titulo'];
    $contenido = $dat['contenido'];


    $linkfb =(empty($linkfb))?'https://www.facebook.com/HorsesWorldSale':$linkfb;// config::get('otra.hfacebook');
    $linktwitter =(empty($linktwitter))?'https://twitter.com/HorsesWorldSale':$linktwitter;// config::get('otra.hfacebook');
    $linkyoutube =(empty($linkyoutube))?'https://www.youtube.com/channel/UChiF4HXkQIECHyRacOu1aCQ':$linkyoutube;// config::get('otra.hfacebook');
    $naranja = "#fa6900";
    $logo = url('assets/img/logo2.png');
    $logo = url(\Config::get('logos.logoh150'));
    $logo1 = url(\Config::get('logos.logohwsblanco150'));
    $urlapp = route('portal');
    /*Contenido arriba y titulo*/
    $titulo= (isset($titulo))?$titulo:'Horses <span style="color: #fa6900;">World </span> Sale';
    $contenido= (isset($contenido))?$contenido:'';
    $boton= (isset($boton))?$boton:'';
    /*Contenido arriba y titulo*/
    $derechos= 'Horses<span style="color: #fa6900;">World</span>Sale.com';
    $derechos= $logo1;
    /*Contenido abajo y footer*/
    /*Logos laterales*/

    $link= (isset($url))?$url:'';

    /*Logos laterales*/
    $twlogo= (isset($twlogo))?$twlogo:'';
    $twlogo1= (isset($twlogo1))?$twlogo1:'';
    $twl = url('img/social/iconotwit1.png');
    $ytl = url('img/social/iconoyou1.png');
    $fbl = url('img/social/iconoface1.png');
@endphp
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body style="margin:0;">
{{--Espacio superior --}}
<table cellpadding="0" cellspacing="0" border="0" width="100%" height="20"
       style="background-color:#f8f8f8;margin:0 auto"
       align="center" bgcolor="#9b9b9b">
    <tbody>
    <tr></tr>
    </tbody>
</table>

{{--Espacio superior --}}
<table cellpadding="0" cellspacing="0" border="0" width="100%"
       style="background-color:#f8f8f8;margin:0 auto"
       align="center" bgcolor="#9b9b9b">
    <tbody>
    <tr>
        <td align="center" style="background-color:#f8f8f8;margin:0 auto" bgcolor="#9b9b9b">
            <!-- section-2 "navbar" -->
            <table class="table_full editable-bg-color bg_color_ffffff editable-bg-image" bgcolor="#ffffff" width="600"
                   align="center" cellspacing="0" cellpadding="0" border="0"
                   style="background-image: url(#); background-position: top center; background-repeat: no-repeat; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
            >
                <tbody>
                <tr width="100%">
                    <td width="100%">
                        <table class="table1" width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td height="30">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- Logo -->
                                    <table class="no_float" width="138" align="center" border="0" cellspacing="0"
                                           cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <!-- Logo3 -->
                                                {{--
                                                <a href="{!! $urlapp !!}" class="editable-img">
                                                    <img editable="true"
                                                         src="{!! $logo !!}"
                                                         style="display:block; line-height:0; font-size:0; border:0; margin: 0 auto;"
                                                         border="0" alt="image">
                                                </a>
                                                --}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="25">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- END logo -->
                                    {{--
                                    <!-- Nav menu -->
                                    <table class="no_float" width="" align="right" border="0" cellspacing="0"
                                           cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <!-- Home -->
                                            <td mc:edit="text201"
                                                style="color: #282828; font-size: 14px; font-weight: 500; font-family: &#39;lato&#39;, Helvetica, sans-serif; mso-line-height-rule: exactly;"
                                                class="text_color_282828">
                                                <div class="editable-text">
                                                    <span class="text_container">
            <a href="{!! url('') !!}" style="text-decoration: none; color: #282828;">Home</a>
            </span>
                                                </div>
                                            </td>
                                            <td width="50">
                                            </td>
                                            <!-- Work -->
                                            <td mc:edit="text202"
                                                style="color: #282828; font-size: 14px; font-weight: 500; font-family: &#39;lato&#39;, Helvetica, sans-serif; mso-line-height-rule: exactly;"
                                                class="text_color_282828">
                                                <div class="editable-text">
                                                    <span class="text_container">
            <a href="{!! url('') !!}" style="text-decoration: none; color: #282828;">Work</a>
            </span>
                                                </div>
                                            </td>
                                            <td width="50">
                                            </td>
                                            <!-- Contact -->
                                            <td mc:edit="text203"
                                                style="color: #282828; font-size: 14px; font-weight: 500; font-family: &#39;lato&#39;, Helvetica, sans-serif; mso-line-height-rule: exactly;"
                                                class="text_color_282828">
                                                <div class="editable-text">
                                                    <span class="text_container">
            <a href="{!! url('') !!}" style="text-decoration: none; color: #282828;">Contact</a>
            </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="30">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- END nav menu -->
                                    --}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- END wrapper -->

            <!-- section-4 -->
            <table class="table_full editable-bg-color bg_color_ffffff editable-bg-image" bgcolor="#ffffff" width="600"
                   align="center" cellspacing="0" cellpadding="0" border="0"
                   style="border-bottom: 1px solid #ededed;background-image: url(#); background-position: top center; background-repeat: no-repeat; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                   background="{!! url('') !!}">
                <tbody>
                <tr>
                    <td>
                        <table class="table1" width="460" align="center" border="0" cellspacing="0" cellpadding="0"
                               style="margin: 0 auto;">
                            <!-- padding-top -->
                            <tbody>
                            <tr>
                                <td height="30">
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="text_color_282828"
                                    style="color: #282828; font-size: 18px;  font-family: Raleway, Helvetica, sans-serif; mso-line-height-rule: exactly;">
                                    <div class="editable-text" style="font-size: 18px; font-weight: 600;">
                                        <span class="text_container">
                                            {!! $titulo !!}
                                        </span>
                                        <span style="font-size: 10px;">
                                            {!! $link !!}

                                        </span>
                                    </div>
                                </td>
                            </tr>

                            {{--
                            <!-- horizontal gap -->
                            <tr>
                                <td height="20">
                                </td>
                            </tr>

                            <tr>
                                <td height="10" align="center"
                                    style="background-image: url(http://emails.castellab.com/supermail/images/line-1.png); background-repeat: no-repeat; background-position: center center;">
                                </td>
                            </tr>
                            --}}
                            <!-- horizontal gap -->
                            <tr>
                                <td height="20">
                                </td>
                            </tr>

                            <tr>
                                <td align="left" class="text_color_4d4d4d"
                                    style="color: #4d4d4d; font-size: 15px; line-height: 2;  font-family: &#39;Open Sans&#39;, Helvetica, sans-serif; mso-line-height-rule: exactly;">
                                    <div class="editable-text">
                                        <span class="text_container" style="line-height: 2;">
                                            {!! $contenido !!}
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td height="20">
                                </td>
                            </tr>
                            <tr>
                                <td align="center" class="text_color_4d4d4d"
                                    style="color: #4d4d4d; font-size: 15px; line-height: 2;  font-family: &#39;Open Sans&#39;, Helvetica, sans-serif; mso-line-height-rule: exactly;">
                                    <div class="editable-text">
                                        <span class="text_container" style="line-height: 2;">

                                            {!! $boton !!}
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <!-- padding-bottom -->
                            <tr>
                                <td height="30">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- END container -->
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- END wrapper -->


            <!-- section-9 -->
            {{--fa6900--}}
            <table class="table_full editable-bg-color bg_color_fa6900 editable-bg-image" bgcolor="#000" width="600"
                   align="center" cellspacing="0" cellpadding="0" border="0"
                   style="background-image: url(#); background-position: top center; background-repeat: no-repeat; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                   background="{!! url('') !!}">
                <tbody>
                <tr>
                    <td>
                        <table class="table1" width="600" align="center" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td height="20">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="table1-2" align="left" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <!-- Logo1 -->
                                                        <!-- Redes sociales aqui-->
                                                        <td width="25" {{--height="50" --}}
                                                                {{--style="padding-top: 5px;"--}}
                                                        >
                                                            <div class="editable-img">
                                                                <a href="{!! url($linkfb) !!}"
                                                                   target="_blank">
                                                                    <img editable="true"
                                                                         src="{!! $fbl !!}"
                                                                         width="25"
                                                                         style="display:inline-block;margin-right: 10px; line-height:0; font-size:0; border:0; max-width: 25px;    margin-left: 25px;"
                                                                         border="0" alt="">
                                                                </a>
                                                            </div>

                                                        </td>
                                                        <td width="25" {{--height="50" --}}{{--style="padding-top: 5px;"--}}>
                                                            <div class="editable-img">
                                                                <a href="{!! url($linktwitter) !!}"
                                                                   target="_blank">
                                                                    <img editable="true"
                                                                         src="{!! $twl !!}"
                                                                         width="25"
                                                                         style="display:inline-block;margin-right: 10px; line-height:0; font-size:0; border:0; max-width: 25px;    "
                                                                         border="0" alt="">
                                                                </a>
                                                            </div>

                                                        </td>

                                                        <td width="25" {{--height="50" --}}{{--style="padding-top: 5px;"--}}>
                                                            <div class="editable-img">
                                                                <a href="{!! url($linkyoutube) !!}"
                                                                   target="_blank">
                                                                    <img editable="true"
                                                                         src="{!! $ytl !!}"
                                                                         width="25"
                                                                         style="display:inline-block;margin-right: 10px; line-height:0; font-size:0; border:0; max-width: 25px;"
                                                                         border="0" alt="">
                                                                </a>
                                                            </div>

                                                        </td>


                                                        <!-- aqui -->
                                                        <td align="left"
                                                            class="center_content text_color_ffffff"
                                                            style="line-height: 2;color: #ffffff; font-size: 14px; font-weight: 500; font-family: &#39;lato&#39;, Helvetica, sans-serif; mso-line-height-rule: exactly;">
                                                            <div class="editable-text"
                                                                 style="line-height: 1;     margin-right: 20px;"
                                                                 width="80">
													<span class="text_container">
														<a href="{!! $twlogo1 !!}"
                                                           class="text_color_ffffff"
                                                           style="text-decoration: none; color: #ffffff;">
                                                            {{--Twett--}}
                                                        </a>
													</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="25">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table1-2" align="right" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <!-- twitter -->
                                                        <td width="30" style="padding-top: 5px;">
                                                            <div class=" editable-img">
                                                                {{--
                                                                <img editable="true"
                                                                     src="{!! $logo !!}"
                                                                     width="14"
                                                                     style="display: inline-block;margin-right: 10px; line-height:0; font-size:0; border:0;"
                                                                     border="0" alt="">
                                                                --}}
                                                            </div>
                                                        </td>
                                                        <td align="left"
                                                            class="center_content text_color_ffffff"
                                                            {{--height="50"--}}
                                                            style="line-height: 1; color: #ffffff; font-size: 14px; font-weight: 500; font-family: &#39;lato&#39;, Helvetica, sans-serif; mso-line-height-rule: exactly; vertical-align: middle;">
                                                            <div class="editable-text"
                                                                 style="line-height: 1;     margin-right: 20px;">
													<span class="text_container">
														<a href="{!! $urlapp !!}" target="_blank"
                                                           class="text_color_ffffff"
                                                           style="text-decoration: none; color: #ffffff;">
                                                            {{--{!! $derechos !!}--}}
                                                            <img editable="true"
                                                                 src="{!! $logo1 !!}"
                                                                 style="display:block; line-height:0; font-size:0; border:0; margin: 0 auto;"
                                                                 border="0" alt="image">
                                                        </a>
													</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="30">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- END Wrapper -->

            {{--
                        <!-- section-9 -->
                        <table class="table_full editable-bg-color bg_color_fa6900 editable-bg-image" bgcolor="#1b1b1b" width="600"
                               align="center" cellspacing="0" cellpadding="0" border="0"
                               style="background-image: url(#); background-position: top center; background-repeat: no-repeat; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                               background="{!! url('') !!}">
                            <tbody>
                            <tr>
                                <td>
                                    <table class="table1" width="600" align="center" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td height="20">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table class="table1-2" align="left" border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <table align="center" border="0" cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                <tr>
                                                                    <!-- Logo1 -->
                                                                    <td width="80" height="50" style="padding-top: 5px;">
                                                                        <div class="editable-img">
                                                                            <img editable="true"
                                                                                 src="{!! $logo !!}"
                                                                                 width="80"
                                                                                 style="display:inline-block;margin-right: 10px; line-height:0; font-size:0; border:0; max-width: 80px;    margin-left: 25px;"
                                                                                 border="0" alt="">
                                                                        </div>
                                                                    </td>
                                                                    <!-- aqui -->
                                                                    <td align="left"
                                                                        class="center_content text_color_ffffff"
                                                                        style="line-height: 2;color: #ffffff; font-size: 14px; font-weight: 500; font-family: &#39;lato&#39;, Helvetica, sans-serif; mso-line-height-rule: exactly;">
                                                                        <div class="editable-text"
                                                                             style="line-height: 1;     margin-right: 20px;"
                                                                             width="80">
                                                                <span class="text_container">
                                                                    <a href="{!! $twlogo1 !!}"
                                                                       class="text_color_ffffff"
                                                                       style="text-decoration: none; color: #ffffff;">

                                                                    </a>
                                                                </span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="25">
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table1-2" align="right" border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <table align="center" border="0" cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                <tr>
                                                                    <!-- twitter -->
                                                                    <td width="30" style="padding-top: 5px;">
                                                                        <div class=" editable-img">
                                                                            {{--
                                                                            <img editable="true"
                                                                                 src="{!! $logo !!}"
                                                                                 width="14"
                                                                                 style="display: inline-block;margin-right: 10px; line-height:0; font-size:0; border:0;"
                                                                                 border="0" alt="">

                                                                        </div>
                                                                    </td>
                                                                    <td align="left"
                                                                        class="center_content text_color_ffffff"
                                                                        height="50"
                                                                        style="line-height: 3; color: #ffffff; font-size: 14px; font-weight: 500; font-family: &#39;lato&#39;, Helvetica, sans-serif; mso-line-height-rule: exactly; vertical-align: middle;">
                                                                        <div class="editable-text">
                                                        <span class="text_container" style="margin-right: 20px">
                                                            <a href="{!! route('landinghome') !!}" class="text_color_7cb342"
                                                               style="text-decoration: none; color: #fa6900;">
                                                                Comienza a publicar
                                                            </a>
                                                        </span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="30">
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- END Wrapper -->
            {{--
                        org

                        <!-- section-10 "footer"  -->
                        <table class="table_full editable-bg-color bg_color_1b1b1b editable-bg-image" bgcolor="#1b1b1b" width="600"
                               align="center" cellspacing="0" cellpadding="0" border="0"
                               style="background-image: url(#); background-position: top center; background-repeat: no-repeat; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                               background="{!! url('') !!}">
                            <tbody>
                            <tr>
                                <td>
                                    <table class="table1" width="600" align="center" border="0" cellspacing="0" cellpadding="0"
                                           style="margin: 0 auto;">
                                        <tbody>
                                        <tr>
                                            <td height="35">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!-- Logo -->
                                                <table class="no_float" width="300" align="left" border="0" cellspacing="0"
                                                       cellpadding="0">

                                                    <tbody>
                                                    <tr>
                                                        <!-- Logo2 -->
                                                        <td align="center">
                                                            <a href="{!! url('') !!}" class="editable-img">
                                                                <img editable="true"
                                                                     src="{!! $logo !!}"
                                                                     width="80"
                                                                     style="display:block; line-height:0; font-size:0; border:0; margin: 0 auto !important;"
                                                                     border="0" alt="image">
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td height="25">
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                                <!-- END logo -->

                                                <table class="no_float" width="300" align="rigth" border="0" cellspacing="0"
                                                       cellpadding="0">

                                                    <tbody>
                                                    <tr>
                                                        <!-- Unsubscribe -->
                                                        <td style="color: #fa6900; font-size: 16px; font-weight: 400; font-family: &#39;Open Sans&#39;, Helvetica, sans-serif; mso-line-height-rule: exactly;">
                                                            <div class="editable-text">
                                                        <span class="text_container">
                                                            <a href="{!! route('landinghome') !!}" class="text_color_7cb342"
                                                               style="text-decoration: none; color: #fa6900;">
                                                                Comienza a publicar
                                                            </a>
                                                        </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- padding-bottom -->
                                                    <tr>
                                                        <td height="25">
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>


                        <!-- End Wrapper -->
                        --}}
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
