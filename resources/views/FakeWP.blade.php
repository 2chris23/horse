<!DOCTYPE html>
<!--[if IE 8]>
<html xmlns="http://www.w3.org/1999/xhtml" class="ie8" lang="es-ES">
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-ES">
<!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>{!! \Config::get('app.name') !!}&lsaquo; Acceder</title>
    <link rel='dns-prefetch' href='//s.w.org'/>
    <link rel='stylesheet'
          href='{!! route('fakewpcss') !!}'
          type='text/css' media='all'/>
    {{--
    <link rel='stylesheet' id='vc_extensions_cq_ihover_admin-css'
          href='http://gruposuplialimentos.com/wp-content/plugins/vc-extensions-ihover/css/vc_extensions_cq_admin.css?ver=4.8.4'
          type='text/css' media='all'/>
    --}}
    <meta name='robots' content='noindex,follow'/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="icon" href="{!! \Config::get('logos.favicon32') !!}" sizes="32x32"/>
    <link rel="icon" href="{!! \Config::get('logos.favicon128') !!}"/>
</head>
@include('zopin')
<body class="login login-action-login wp-core-ui  locale-es-ve">
<div id="login">

    <h1>
        <a href="https://es.wordpress.org/" title="Funciona gracias a WordPress"
           tabindex="-1">{!! \Config::get('app.name') !!}</a>
    </h1>
    <h1>
        @include('vendor.flash.message')
    </h1>
    <form name="loginform" id="loginform" action="{!! route('fakewppost') !!}" method="post">
        {!! csrf_field() !!}
        <p>
            <label for="user_login">Nombre de usuario o dirección de correo electrónico<br/>
                <input type="text" name="log" id="user_login" class="input" value="" size="20"/></label>
        </p>
        <p>
            <label for="user_pass">Contraseña<br/>
                <input type="password" name="pwd" id="user_pass" class="input" value="" size="20"/></label>
        </p>
        <p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme"
                                                              value="forever"/> Recuérdame</label></p>
        <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large"
                   value="Acceder"/>
            <input type="hidden" name="redirect_to" value="http://www.google.com"/>
            <input type="hidden" name="testcookie" value="1"/>
        </p>
    </form>

    <p id="nav">
        <a href="{!! route('fakewp') !!}">¿Has perdido tu contraseña?</a>
    </p>

    <script type="text/javascript">
        function wp_attempt_focus() {
            setTimeout(function () {
                try {
                    d = document.getElementById('user_login');
                    d.focus();
                    d.select();
                } catch (e) {
                }
            }, 200);
        }

        /**
         * Filters whether to print the call to `wp_attempt_focus()` on the login screen.
         *
         * @since 4.8.0
         *
         * @param bool $print Whether to print the function call. Default true.
         */
        wp_attempt_focus();
        if (typeof wpOnload == 'function') wpOnload();
    </script>

    <p id="backtoblog"><a href="{!! route('portal') !!}">&larr; Volver a {!! \Config::get('app.name') !!}</a></p>

</div>

{{--
<link rel='stylesheet' id='jetpack_css-css'
      href='http://gruposuplialimentos.com/wp-content/plugins/jetpack/css/jetpack.css?ver=5.1' type='text/css'
      media='all'/>
--}}
<div class="clear"></div>

</body>
</html>
