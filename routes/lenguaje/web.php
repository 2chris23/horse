<?php
/*ARCHIVO ORIGINAL DE RESPALDO DE RUTAS EN IDIOMAS*/
//Route::get('fbicon/flat', function () { return view('assets.partial.FbIcons'); });
Route::get('fbicon/flat', 'Functions@DecodeIpapi');
Route::group(['ttl' => 60], function () {
    Route::get('/FacebookPost', 'FacebookController@Programas1dia')->name('PublicacionesProgramadasFb');
    Route::get('/FacebookProg', 'FacebookController@ProgramarCaballoDia')->name('PublicacionesProgramadasFbDia');
    Route::get('/kokokaka', 'PublicController@BackupDiario');
    Route::get('/kokokakb', 'Functions@ActualizarMoneda');
    Route::group(['middleware' => 'Compresion'], function () {
        Route::group(['domain' => 'app.' . Config('aplication.host')], function () {
            route::get('/', 'HomeController@indexlanding')->name('landinghome');
        });
        Route::get('/', 'PortalController@index')->name('portal');
        Route::group(['middleware' => "CompresionMax"], function () {
            Route::get('/portal/js/modernizr.min.js', 'PublicController@RetornaJsModer')->name('Modernizer.js');
            Route::get('/landing/js/jquery.easing.js', 'HomeController@RetornaJsEasing')->name('Easing.js');
            Route::get('/bs-timepicker.js', 'PublicController@RetornaBSjs')->name('BTimepicjer.js');
            Route::get('/portal/css/search.min.css', 'HomeController@RetornaCssSearch')->name('Search.css');
            Route::get('/lazy.js', 'PublicController@RetornaJsLazy')->name('lazy.js');
            Route::get('/js.js', 'HomeController@RetornaJsLanding')->name('homejs');
            Route::get('/clock.js', 'HomeController@RetornaClockJs')->name('ClockJs');
            Route::get('/clock.css', 'HomeController@RetornaClockCss')->name('ClockCss');
            Route::get('/css.css', 'HomeController@RetornaCssLanding')->name('homecss');
            Route::get('/portal.css', 'PublicController@RetornaCssPortal')->name('CssPortal');/*Revisar este*/
            Route::get('/portal.js', 'PublicController@RetornaJsPortal')->name('JsPortal');/*Revisar este*/
        });
        Route::get('/sitemap', 'PublicController@CrearMapaSitioIndex');
        Route::get('/limpiar', 'PublicController@Limpiar');
        Route::post('paises', 'PublicController@Paises')->name('country.ajax');
        Route::post('provincia', 'PublicController@Estados')->name('state.ajax');
        Route::post('ciudad', 'PublicController@Ciudades')->name('city.ajax');
        Route::post('moneda', 'PublicController@Moneda')->name('Moneda.ajax');
        Route::get('/trad', 'PublicController@ProbarEsto')->name('pruebatexto');
        //Captchas
        Route::post('report', 'PortalController@ReportarCaballo')->name('ReportarCaballo');
        Route::post('send', 'PortalController@EnviarCaballo')->name('EnviarCaballo');
        Route::get('/detalle/{id?}', 'StudController@DetailedHorse')->name('MyHorseDetailed2');
        Route::get('/print/{ids?}', 'PublicController@PreviewCaballos')->name('VersionImpresa');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::post('logout', 'PublicController@Salir')->name('logout');
        if (config('app.env') == 'local') {
            Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');
            Route::get('traduce', 'PublicController@trad')->name('logsd');
            Route::get('traduce', 'PublicController@unico')->name('logsd');
            Route::get('fakeemail', 'PublicController@fakemail')->name('emailfake');
        }
        Route::get('testsoporte/{tipo?}', 'MailController@fakeNuevo');
        route::get('error', 'PublicController@error')->name('error');
        route::get('Lang/{lang?}', 'PublicController@ChangeLang')->name('lengauje');
        route::get('Moneda/{mon?}', 'PublicController@CambioMoneda')->name('monedas');
        route::post('addphone/', 'PublicController@OtroTelefono')->name('addphone');
        Route::get('/Caballo/{slug?}', 'PortalController@caballo')->name('portalcaballo');
        Route::post('/Caballo/{slug?}', 'PortalController@ContactoCaballoVenta')->name('contactocaballoventa');
        Route::get('/Raza/{raza?}/{orden?}', 'PortalController@PorRaza')->name('portalporraza');
        Route::post('/Busqueda', 'BusquedaController@BuscarPais')->name('buscarpais');
        Route::post('/Raza/{raza?}/{orden?}', 'PortalController@PorRaza')->name('portalporrazapost');
        Route::get('/lista', 'PortalController@PorRaza')->name('listaportal');
        Route::get('/Buscar', 'PortalController@PorRaza')->name('probusqueda');
        Route::group(['middleware' => 'CompresionMax'], function () {
            route::post('/lista', 'PortalController@PorRaza')->name('NuevaBusqueda');
            Route::post('/Buscar', 'PortalController@PorRaza')->name('probusquedapost');
        });
        Route::get('/lista.js', 'PublicController@RetornaJsLista')->name('Listajs');/*Revisar este*/
        Route::get('/lista.css', 'PublicController@RetornaCssLista')->name('Listacss');/*Revisar este*/
        Route::get('/lista5', 'PortalController@PorRaza')->name('lista5');
        Route::get('/Caballoestado/{country?}/{state?}', 'PortalController@PorEstado')->name('portalporestado');
        Route::get('/AD', 'PortalController@indexAD')->name('portalad');
        Route::get('/css/theme/0/{slug?}/css.css', 'PublicController@RetornaCssTema0')->name('CssTheme0');/*Revisar este*/
        Route::get('/js/theme/0/{slug?}/js.js', 'PublicController@RetornaJsTema0')->name('JsTheme0');/*Revisar este*/
        Route::get('/css/theme/1/{slug?}/css.css', 'PublicController@RetornaCssTema1')->name('CssTheme1');/*Revisar este*/
        Route::get('/js/theme/1/{slug?}/js.js', 'PublicController@RetornaJsTema1')->name('JsTheme1');/*Revisar este*/
        Route::get('/css/theme/2/{slug?}/css.css', 'PublicController@RetornaCssTema2')->name('CssTheme2');/*Revisar este*/
        Route::get('/js/theme/2/{slug?}/js.js', 'PublicController@RetornaJsTema2')->name('JsTheme2');/*Revisar este*/
        Route::get('/css/theme/3/{slug?}/css.css', 'PublicController@RetornaCssTema3')->name('CssTheme3');/*Revisar este*/
        Route::get('/js/theme/3/{slug?}/js.js', 'PublicController@RetornaJsTema3')->name('JsTheme3');/*Revisar este*/
        Route::post('/js/theme/3/{slug?}/data.json', 'TablasController@BusquedaOlonkar')->name('DatosTema3');/*Revisar este*/
        Route::get('/css/theme/4/{slug?}/css.css', 'PublicController@RetornaCssTema4')->name('CssTheme4');/*Revisar este*/
        Route::get('/js/theme/4/{slug?}/js.js', 'PublicController@RetornaJsTema4')->name('JsTheme4');/*Revisar este*/
        Route::get('/css/theme/5/{slug?}/css.css', 'PublicController@RetornaCssTema5')->name('CssTheme5');/*Revisar este*/
        Route::get('/js/theme/5/{slug?}/js.js', 'PublicController@RetornaJsTema5')->name('JsTheme5');/*Revisar este*/
        Route::get('/css/theme/6/{slug?}/css.css', 'PublicController@RetornaCssTema6')->name('CssTheme6');/*Revisar este*/
        Route::get('/js/theme/6/{slug?}/js.js', 'PublicController@RetornaJsTema6')->name('JsTheme6');/*Revisar este*/
        Route::get('/js/theme/6t/{slug?}/work.css', 'PublicController@RetornaCssTrabajoTema6')->name('TrabajoCssTheme6');/*Revisar este*/
        Route::post('/stripepost', 'PayPalCurl@StripePost')->name('stripepost');
        Route::get('/RegenerarC', 'PayPalCurl@payWithStripe')->name('paywithstripe');
        Route::get('/FBS', 'FacebookController@AutoPost')->name('paywithstripe2');
        Route::get('wpcss.css', 'HomeController@RetornaCssWP')->name('fakewpcss');
        Route::get('wp-login.php', 'Functions@FakeWpGet')->name('fakewp');
        Route::get('wp-admin', 'Functions@FakeWpGet')->name('fakewp');
        Route::post('wp-login.php', 'Functions@FakeWpPost')->name('fakewppost');
        Route::group(['prefix' => 'prueba'], function () {
            Route::get('modelo1/{slug}', 'PruebasController@ClientDetail2');
            Route::get('olx/{slug?}', 'OlxController@ExportarDivendo');
        });
        Route::get('/FBT', 'FacebookController@ObtenerPagina')->name('user.fb');
    });
    Route::get('/dashboard', function () {
        /*
        $d = new  App\Http\Controllers\MailController();
        $d->PruebaEmail();
        */
    })->name('pruebaemail');
    Auth::routes();
    Route::get('Validacion/{token?}', 'TokenActivacion@Activar')->name('activacion.confirmar');
    Route::post('Validacion', 'TokenActivacion@PrimeraClave')->name('activacion.Clave');
    route::post('/contacto', 'PublicController@Contacto')->name('contacto.accion');
    Route::post('/register', 'Auth\RegisterController@register')->name('registerpost');
    Route::group(['prefix' => 'authv1'], function () {
        Route::get('/{provider}', 'FacebookController@redirectToProvider')->name('LogeoSocial');
        Route::get('/facebook/callback', 'FacebookController@FacebookCallBack')->name('FacebooCallBack');
    });
    Route::get('/login1', function () {
        return view('auth.login');
    })->name('login1');
    Route::post('password/reset', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('olvidopost');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('OlvidoGet');
    Route::get('passwordreset/{token?}', 'Auth\ForgotPasswordController@ResetToken')->name('olvidotoken');
    Route::post('reseting', 'Auth\ForgotPasswordController@RestaurarContrasena')->name('restaurarcontra');
    Route::get('/suscripcion', 'PortalController@SuscripcionIndex')->name('SuscripcionIndex');
    Route::get('/contacto', 'PortalController@ContactoIndex')->name('ContactoIndex');
    Route::get('/publicidad', 'PortalController@PublicidadIndex')->name('PublicidadIndex');
    /*Se quedan abajo para que se evalie de ultimo*/
    Route::group(['middleware' => 'Compresion', 'ttl' => 60], function () {
        Route::get('/tablehorse.js', 'PublicController@RetornaJsTabla')->name('JsTablaCaballo');
        Route::get('/{slug}', 'StudController@ClientDetail')->name('MyPage');
        Route::get('/{slug}/Contacto', 'StudController@ClientContact')->name('MyContact');
        Route::get('/{slug}/Galeria', 'StudController@ClientGallery')->name('MyGallery');
        Route::get('/{slug}/Galeria2', 'StudController@ClientGallery2')->name('MyGallery2');
        Route::get('/{slug}/Galeria2c', 'StudController@ClientGallery2config')->name('MyGallery2post');
        Route::get('/{slug}/Video', 'StudController@ClientVideo')->name('MyVideo');
        Route::get('/{slug}/Instalaciones', 'StudController@ClientInstalation')->name('MyInstalation');
        Route::get('/{slug}/Instalaciones2', 'StudController@ClientInstalationCentro')->name('MyInstalation2');
        Route::get('/{slug}/Ventas/', 'StudController@ClientSell')->name('MySell');
        Route::get('/{slug}/Ventas/{horse?}', 'StudController@DetailedHorseVenta')->name('MySellDetailSell');
        Route::get('/{stud?}/detalle/{horse?}', 'StudController@DetailedHorse')->name('MyHorseDetailed');
    });
    Route::get('/{slug}/Vista2', 'StudController@ClientDetail2')->name('MyPage223');
    Route::get('/{slug}/Caballo/{v?}/{type?}', 'StudController@ClientHorses')->name('MyHorses');/*Revisar este*/
    Route::get('/{slug}/Caballo', 'StudController@ClientHorses')->name('MyHorsesV1');/*Revisar este*/
    Route::get('/{slug}/working', 'TrabajoController@index')->name('TrabajoIndex');
    Route::post('/{slug}/working', 'TrabajoController@indexpost')->name('TrabajoIndexPost');
    Route::group(['domain' => \Config::get('aplication.host')], function () {
        Route::get('/{slug?}', 'StudController@ClientDetail')->name('MyPageBase');
        Route::get('/{stud?}/detalle/{horse?}', 'StudController@DetailedHorse')->name('MyHorseDetailedBase');
        Route::get('/Caballo/{slug?}', 'PortalController@caballo')->name('portalcaballobase');
    });
    Route::group(['middleware' => "Compresion"], function () {
        Route::group(['middleware' => "XFrame"], function () {
            route::get('mundialprice/{slug?}', 'PublicController@MonedasCaballo')->name('MonedaCaballo');
            route::get('mundialcub/{slug?}', 'PublicController@CubricionCaballo')->name('CubricionCaballo');
            route::get('getprice/{slug?}', 'PublicController@ObtenerPrecioCaballo')->name('ObtenerPrecioCaballo');
            route::post('getprice', 'PublicController@ObtenerPrecioCaballos')->name('ObtenerPrecioCaballos');
            route::post('getcubris', 'PublicController@ObtenerCubricionesCaballos')->name('ObtenerCubricionCaballos');
            route::post('getpricetool', 'PublicController@ObtenerPreciosCaballos')->name('ObtenerPreciosCaballos');
            route::post('getcubritool', 'PublicController@ObtenerCubricionesCaballos')->name('ObtenerCubricionesCaballos');
        });
    });
    Route::get('r/uuoopp', 'Functions@BorrarDatosSession');
});
