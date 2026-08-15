<?php
/*ARCHIVO ORIGINAL DE RESPALDO DE RUTAS EN IDIOMAS*/
//Route::get('fbicon/flat', function () { return view('assets.partial.FbIcons'); });


Route::group(['ttl' => 60], function () {


//Dropify
//http://demo.lorvent.com/demo_admire/admire2_fixed_menu/file_upload.html
//https://stackoverflow.com/questions/37678885/how-to-add-working-dropify-inputs-dynamically
//http://www.jqueryscript.net/demo/jQuery-Plugin-To-Beautify-File-Inputs-with-Custom-Styles-Dropify/
//https://github.com/JeremyFagis/dropify


//http://laraveldaily.com/how-to-check-current-url-or-route/
    /*
     *
     Lenguajes
    https://github.com/barryvdh/laravel-translation-manager
    https://quickadminpanel.com/blog/10-best-laravel-packages-for-multi-language-projects/


    Galerias de imagenes

    https://tympanus.net/Development/GammaGallery/  https://github.com/codrops/GammaGallery

    http://bashooka.com/coding/responsive-jquery-image-gallery-plugins/
    https://tympanus.net/codrops/2012/11/06/gamma-gallery-a-responsive-image-gallery-experiment/
    http://thecodude.com/demo/html/ukskins/slideshow.html *
    http://plugins.roninwp.com/gallery/load-more-with-category/  *
    http://preview.codecanyon.net/item/flow-gallery-html5-multimedia-gallery/full_screen_preview/10741414?_ga=2.209894933.1017187871.1508231532-1991273181.1500082262  *
    https://codecanyon.net/item/square-photo-gallery/5811066?s_rank=19 *
    http://preview.codecanyon.net/item/gallery-factory/full_screen_preview/11219294?_ga=2.209894933.1017187871.1508231532-1991273181.1500082262 *
    http://thecodude.com/demo/html/ukskins/calltoaction.html# *

    https://www.google.co.ve/search?q=jquery+image+wall+mosaic&oq=jquery+gallery+wall&aqs=chrome.3.69i57j0l5.5401j0j7&sourceid=chrome&ie=UTF-8


    https://www.ventadecaballos.es/venta-de-caballos.php

    */
    /*Galeria de video http://unitegallery.net/*/
//https://wasi.co pagina de ejemplo del servicio
//http://demo.lorvent.com/demo_admire/admire2_fixed_header/advanced_tables.html
    /*Laravel 5.3 requiere php 5.6.4+, en caso de ser necesario, atento a esta pagina
    https://laravel.com/docs/5.3/upgrade#upgrade-5.3.0 para buscar hacer un downgrade*/
// ftp del sitio
// epiz_20767474
// RaDwcZMZio
// ftp.epizy.com
//epiz_20767474_horses	epiz_20767474	(Your cPanel Password)	sql311.epizy.com	Admin

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | This file is where you may define all of the routes that are handled
    | by your application. Just tell Laravel the URIs it should respond
    | to using a Closure or controller method. Build something great!
    |
    */

//Route::post('/facebook', 'PhotoController@fakefb')->name('FakeFb');
//Route::post('/facebook_', 'PhotoController@fakefb2')->name('FakeFb2');

//Compresion


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
            Route::get('traduce', 'PublicController@unico')->name('logsd');
            Route::get('fakeemail', 'PublicController@fakemail')->name('emailfake');
            //Route::get('fakeValidacion', 'PublicController@fakeValidacion')->name('fakeValidacion');

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

        /** PASADO A RUTA PUBLICA **/
        Route::get('/lista', 'PortalController@PorRaza')->name('listaportal');
        Route::get('/Buscar', 'PortalController@PorRaza')->name('probusqueda');
        Route::group(['middleware' => 'CompresionMax'], function () {
            route::post('/lista', 'PortalController@PorRaza')->name('NuevaBusqueda');
            Route::post('/Buscar', 'PortalController@PorRaza')->name('probusquedapost');
        });

        Route::get('/lista.js', 'PublicController@RetornaJsLista')->name('Listajs');/*Revisar este*/
        Route::get('/lista.css', 'PublicController@RetornaCssLista')->name('Listacss');/*Revisar este*/

        Route::get('/lista5', 'PortalController@PorRaza')->name('lista5');

        /*Route::get('/lista', 'PortalController@index5')->name('listaportal');
        route::post('/lista', 'PublicController@NuevaBusqueda')->name('NuevaBusqueda');
        Route::get('/lista5', 'PortalController@index5')->name('lista5');*/

        /** PASADO A RUTA PUBLICA **/

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


        /*Route::get('/RegenerarC','Functions@RegenerarCaballo');*/
//Route::get('/RegenerarC','PayPalCurl@PruebaStripe');
        Route::post('/stripepost', 'PayPalCurl@StripePost')->name('stripepost');
//Route::get('/stripe','PayPalCurl@payWithStripe')->name('paywithstripe');
        Route::get('/RegenerarC', 'PayPalCurl@payWithStripe')->name('paywithstripe');
        Route::get('/FBS', 'FacebookController@AutoPost')->name('paywithstripe2');
//    Route::get('/FBS', 'FacebookController@LoginSdk')->name('paywithstripe2');

//Route::get('/RegenerarC/{notification?}','MailController@ContactoMail')->name('paywithstripe');


        /**/
        /*
        Route::get('wp-login.php', function (Request $r) {
            return view('FakeWP');
        })->name('fakewp');
        */
        Route::get('wpcss.css', 'HomeController@RetornaCssWP')->name('fakewpcss');
        Route::get('wp-login.php', 'Functions@FakeWpGet')->name('fakewp');
        Route::get('wp-admin', 'Functions@FakeWpGet')->name('fakewpadmin');
        Route::post('wp-login.php', 'Functions@FakeWpPost')->name('fakewppost');
        /*
        Route::post('wp-login.php', function (Request $r) {
            $f = json_encode($r->all());
            \Log::critical("Entrando en wp-login POST $f");
            flash('Datos incorrectos')->error();
            return view('FakeWP');
        })->name('fakewppost');
        */


        /*
        Route::get('/RegenerarC22222',function(){
            phpinfo();
        })->name('paywithstripe');
        */
        Route::group(['prefix' => 'prueba'], function () {
            Route::get('modelo1/{slug}', 'PruebasController@ClientDetail2');
            Route::get('olx/{slug?}', 'OlxController@ExportarDivendo');

        });
        Route::get('/FBT', 'FacebookController@ObtenerPagina')->name('user.fb');
    });

    /*

    Route::get('/dashboard', function () {

        $d = new  App\Http\Controllers\MailController();
        $d->PruebaEmail();

    })->name('pruebaemail');
    */


    // Auth::routes(); Reemplazado por rutas explícitas para Laravel 11 sin laravel/ui
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//Route::get('Validacion/{token?}', 'TokenActivacion@show')->name('activacion.confirmar');
    Route::get('Validacion/{token?}', 'TokenActivacion@Activar')->name('activacion.confirmar');
    Route::post('Validacion', 'TokenActivacion@PrimeraClave')->name('activacion.Clave');
    route::post('/contacto', 'PublicController@Contacto')->name('contacto.accion');
    
    // Ruta temporal para limpiar la caché en Plesk
    Route::get('/limpiar-cache', function () {
    try {
        \Artisan::call('config:clear');
    } catch (\Exception $e) {}
    try {
        \Artisan::call('view:clear');
    } catch (\Exception $e) {}
    try {
        \Artisan::call('route:clear');
    } catch (\Exception $e) {}
    try {
        \Artisan::call('cache:clear');
    } catch (\Exception $e) {}
    
    return 'Caché de vistas, rutas, configuración y aplicación borradas exitosamente.';
});


    /*
    Route::get('/', function () {
        $buscar = \Config::get('aplication.host');
        $r = str_replace($buscar, '', $_SERVER['SERVER_NAME']);
    //dd($r);
        if ($r == 'app.') {
            return redirect()->route('landinghome');
            return view('frontend.landing.index');

        } else {
            return redirect()->route('portal');
        }

        return redirect()->route('home');
    });
    */
    /*
    Route::get('/landing', function () {
        $buscar = \Config::get('aplication.host');
        $r = str_replace($buscar, '', $_SERVER['SERVER_NAME']);
        //dd($r);

        if ($r == 'app.') {

            return view('frontend.landing.index');

        } else {
            return redirect()->route('portal');
        }

        return redirect()->route('home');
    });
    */
    Route::post('/register', 'Auth\RegisterController@register')->name('registerpost');


    Route::get('/login1', function () {
        return view('auth.login');
    })->name('login1');
    /*
    Route::get('/login2', function () {
        return view('auth.login2');
    })->name('login2');
    Route::get('/login3', function () {
        return view('auth.login3');
    })->name('login3');
    */
    /*
    Route::get('/register1', function () {
        return view('auth.register');
    })->name('register1');
    Route::get('/register2', function () {
        return view('auth.register2');
    })->name('register2');
    Route::get('/register3', function () {
        return view('auth.register3');
    })->name('register3');
    */
//route::get('img/{folder?}/{type?}/{w?}/{h?}/{name?}','PublicController@ImagenCache')->name('imgcache');
//route::get('rre', function(){ dd(public_path()); });


    Route::post('password/reset', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('olvidopost');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('OlvidoGet');
    Route::get('passwordreset/{token?}', 'Auth\ForgotPasswordController@ResetToken')->name('olvidotoken');
    Route::post('reseting', 'Auth\ForgotPasswordController@RestaurarContrasena')->name('restaurarcontra');
//route::get('OlvidoContrasena', 'DummyController@showLinkRequestForm')->name('OlvidoGet');
//route::post('OlvidoContrasena', 'DummyController@sendResetLinkEmail')->name('olvidopost');


    Route::get('/suscripcion', 'PortalController@SuscripcionIndex')->name('SuscripcionIndex');
    Route::get('/contacto', 'PortalController@ContactoIndex')->name('ContactoIndex');
    Route::get('/publicidad', 'PortalController@PublicidadIndex')->name('PublicidadIndex');
    /*Se quedan abajo para que se evalie de ultimo*/
    /*
    'middleware' => ['localize'] // Route translate middleware
    */
    /*****************************************/
    /*****************************************/
    /*****************************************/

    Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['Compresion', 'localize', ], 'ttl' => 60], function () {
        Route::get('/tablehorse.js', 'PublicController@RetornaJsTabla');
        Route::get('/{slug}', 'StudController@ClientDetail');
        Route::get('/{slug}/Contacto', 'StudController@ClientContact');
        Route::get('/{slug}/Galeria', 'StudController@ClientGallery');
        Route::get('/{slug}/Galeria2', 'StudController@ClientGallery2');
        Route::get('/{slug}/Galeria2c', 'StudController@ClientGallery2config');
        Route::get('/{slug}/Video', 'StudController@ClientVideo');
        Route::get('/{slug}/Instalaciones', 'StudController@ClientInstalation');
        Route::get('/{slug}/Instalaciones2', 'StudController@ClientInstalationCentro');
        Route::get('/{slug}/Ventas/', 'StudController@ClientSell');
        Route::get('/{slug}/Ventas/{horse?}', 'StudController@DetailedHorseVenta');
        Route::get('/{stud?}/detalle/{horse?}', 'StudController@DetailedHorse')->name('MyHorseDetailed');
    });
    //Route::group(['middleware' => ['Compresion']], function () {

        Route::get('/{slug}/Caballo', 'StudController@ClientHorses');
        Route::get('/{slug}/working', 'TrabajoController@index');
        Route::post('/{slug}/working', 'TrabajoController@indexpost');
        Route::get('/{slug}/Caballo/{v?}/{type?}', 'StudController@ClientHorses');
        /*****************************************/
        /*****************************************/
        /*****************************************/
        Route::get('/{slug}/Vista2', 'StudController@ClientDetail2')->name('MyPage223');
        //Route::get('/{slug}/Horse/{v?}/{type?}', function($slug,$v,$type){echo "$slug  $v  $type";})->name('MyHorses');/*Revisar este*/
        Route::get('/{slug}', 'StudController@ClientDetail')->name('MyPageBase');
        Route::get('/{stud}/detalle/{horse?}', 'StudController@DetailedHorse')->name('MyHorseDetailedBase');
        Route::get('/Caballo/{slug?}', 'PortalController@caballo')->name('portalcaballo');
    //});

    Route::group(['middleware' => "Compresion", 'XFrame'], function () {
        route::get('mundialprice/{slug?}', 'PublicController@MonedasCaballo')->name('MonedaCaballo');
        route::get('mundialcub/{slug?}', 'PublicController@CubricionCaballo')->name('CubricionCaballo');
        route::get('getprice/{slug?}', 'PublicController@ObtenerPrecioCaballo')->name('ObtenerPrecioCaballo');
        route::post('getprice', 'PublicController@ObtenerPrecioCaballos')->name('ObtenerPrecioCaballos');
        route::post('getcubris', 'PublicController@ObtenerCubricionesCaballos')->name('ObtenerCubricionCaballos');
        route::post('getpricetool', 'PublicController@ObtenerPreciosCaballos')->name('ObtenerPreciosCaballos');
        route::post('getcubritool', 'PublicController@ObtenerCubricionesCaballos')->name('ObtenerCubricionesCaballos');
    });
    Route::get('r/uuoopp', 'Functions@BorrarDatosSession');
//Route::get('/{slug}/Caballo/{v?}/{type?}', 'StudController@ClientHorses')->name('fakese');/*Revisar este
//https://medium.com/@alberto1el/share-laravel-5-3-session-across-domains-for-the-same-application-232312b03177
//https://laravel.io/forum/03-14-2014-multiple-domains-how-to-share-login
//https://stackoverflow.com/questions/26821648/laravel-share-session-data-over-multiple-domains
//https://www.google.co.ve/search?q=laravel+share-session-from-multiple-domain&oq=laravel+share-session-from-multiple-domain&aqs=chrome..69i57j69i60l3j69i59j69i60.1340j0j7&sourceid=chrome&ie=UTF-8
//https://laracasts.com/discuss/channels/laravel/share-session-from-multiple-domains-but-on-same-server?page=1
//https://github.com/appstract/laravel-multisite
//https://github.com/appstract/laravel-blade-directives
//https://github.com/appstract
//https://subinsb.com/set-same-cookie-on-different-domains/
//https://www.technologyshouters.com/

});
