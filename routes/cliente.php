<?php

$fa = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';


Route::group(
    [
        'domain' => $fa,
    ], function () use ($fa) {


    Route::group(['middleware' => "CompresionMax"], function () {

        route::get('mundialprice/{slug?}', 'PublicController@MonedasCaballo')->name('MonedaCaballo');
        route::get('mundialcub/{slug?}', 'PublicController@CubricionCaballo')->name('CubricionCaballo');
        route::get('getprice/{slug?}', 'PublicController@ObtenerPrecioCaballo')->name('ObtenerPrecioCaballo');
        route::post('getprice', 'PublicController@ObtenerPrecioCaballos')->name('ObtenerPrecioCaballos');
        route::post('getcubris', 'PublicController@ObtenerCubricionesCaballos')->name('ObtenerCubricionCaballos');
        route::post('getpricetool', 'PublicController@ObtenerPreciosCaballos')->name('ObtenerPreciosCaballos');
        route::post('getcubritool', 'PublicController@ObtenerCubricionesCaballos')->name('ObtenerCubricionesCaballos');
//Route::group(['middleware' => "CompresionMax"], function () {
        Route::get('/portal/js/modernizr.min.js', 'PublicController@RetornaJsModer')->name('Modernizer.js');
        Route::get('/landing/js/jquery.easing.js', 'HomeController@RetornaJsEasing')->name('Easing.js');
        Route::get('/bs-timepicker.js', 'PublicController@RetornaBSjs')->name('BTimepicjer.js');
        Route::get('/portal/css/search.min.css', 'HomeController@RetornaCssSearch')->name('Search.css');
        Route::get('/js.js', 'HomeController@RetornaJsLanding')->name('homejs');
        Route::get('/clock.js', 'HomeController@RetornaClockJs')->name('ClockJs');
        Route::get('/clock.css', 'HomeController@RetornaClockCss')->name('ClockCss');
        Route::get('/css.css', 'HomeController@RetornaCssLanding')->name('homecss');
        Route::get('/portal.css', 'PublicController@RetornaCssPortal')->name('CssPortal');
        Route::get('/portal.js', 'PublicController@RetornaJsPortal')->name('JsPortal');


        Route::get('/lazy.js', 'PublicController@RetornaJsLazy')->name('lazy.js');
        route::get('Moneda/{mon?}', 'PublicController@CambioMoneda')->name('monedas');
        Route::get('/sitemap', 'PublicController@CrearMapaSitioIndex');
        Route::get('/limpiar', 'PublicController@Limpiar');

        Route::post('paises', 'PublicController@Paises')->name('country.ajax');
        Route::post('provincia', 'PublicController@Estados')->name('state.ajax');
        Route::post('ciudad', 'PublicController@Ciudades')->name('city.ajax');
        Route::post('moneda', 'PublicController@Moneda')->name('Moneda.ajax');
        Route::get('/trad', 'PublicController@ProbarEsto')->name('pruebatexto');

        Route::get('/css/theme/0/{slug?}/css.css', 'PublicController@RetornaCssTema0')->name('CssTheme0');
        Route::get('/js/theme/0/{slug?}/js.js', 'PublicController@RetornaJsTema0')->name('JsTheme0');
        Route::get('/css/theme/1/{slug?}/css.css', 'PublicController@RetornaCssTema1')->name('CssTheme1');
        Route::get('/js/theme/1/{slug?}/js.js', 'PublicController@RetornaJsTema1')->name('JsTheme1');


        Route::get('/css/theme/2/{slug?}/css.css', 'PublicController@RetornaCssTema2')->name('CssTheme2');
        Route::get('/js/theme/2/{slug?}/js.js', 'PublicController@RetornaJsTema2')->name('JsTheme2');

        Route::get('/css/theme/3/{slug?}/css.css', 'PublicController@RetornaCssTema3')->name('CssTheme3');
        Route::get('/js/theme/3/{slug?}/js.js', 'PublicController@RetornaJsTema3')->name('JsTheme3');
        Route::post('/js/theme/3/{slug?}/data.json', 'TablasController@BusquedaOlonkar')->name('DatosTema3');


        Route::get('/css/theme/4/{slug?}/css.css', 'PublicController@RetornaCssTema4')->name('CssTheme4');
        Route::get('/js/theme/4/{slug?}/js.js', 'PublicController@RetornaJsTema4')->name('JsTheme4');

        Route::get('/css/theme/5/{slug?}/css.css', 'PublicController@RetornaCssTema5')->name('CssTheme5');
        Route::get('/js/theme/5/{slug?}/js.js', 'PublicController@RetornaJsTema5')->name('JsTheme5');

        Route::get('/css/theme/6/{slug?}/css.css', 'PublicController@RetornaCssTema6')->name('CssTheme6');
        Route::get('/js/theme/6/{slug?}/js.js', 'PublicController@RetornaJsTema6')->name('JsTheme6');
        Route::get('/js/theme/6t/{slug?}/work.css', 'PublicController@RetornaCssTrabajoTema6')->name('TrabajoCssTheme6');
        route::get('Lang/{lang?}', 'PublicController@ChangeLang')->name('lengauje');

    });
    /*
    Route::get('/', 'StudController@ClientDetail')->name('MyPage');
    Route::get('Detalle/{horse?}', 'StudController@DetailedHorse')->name('MyHorseDetailed');
    Route::get('JsTablaCaballo.js', 'PublicController@RetornaJsTabla')->name('JsTablaCaballo');
    Route::get('/Contacto', 'StudController@ClientContact')->name('MyContact');
    Route::get('/Galeria', 'StudController@ClientGallery')->name('MyGallery');
    Route::get('/Galeria2', 'StudController@ClientGallery2')->name('MyGallery2');
    Route::get('/Galeria3', 'StudController@ClientGallery2config')->name('MyGallery2post');
    Route::post('report', 'PortalController@ReportarCaballo')->name('ReportarCaballo');

    Route::get('/detalle/{id?}', 'StudController@DetailedHorse')->name('MyHorseDetailed2');
    Route::get('/print/{ids?}', 'PublicController@PreviewCaballos')->name('VersionImpresa');

    route::post('/contacto', 'PublicController@Contacto')->name('contacto.accion');
    Route::get('/{slug}/Ventas/', 'StudController@ClientSell')->name('MySell');
    Route::get('/{slug}/Ventas/{horse?}', 'StudController@DetailedHorseVenta')->name('MySellDetailSell');


    Route::get('Video', 'StudController@ClientVideo')->name('MyVideo');
    Route::get('/Instalaciones', 'StudController@ClientInstalation')->name('MyInstalation');
    Route::get('/Instalaciones2', 'StudController@ClientInstalationCentro')->name('MyInstalation2');
    Route::get('/Ventas/', 'StudController@ClientSell')->name('MySell');
    Route::get('/Ventas/{horse?}', 'StudController@DetailedHorseVenta')->name('MySellDetailSell');
*/
    route::post('/contacto', 'PublicController@Contacto')->name('contacto.accion');
    Route::get('/print/{ids?}', 'PublicController@PreviewCaballos')->name('VersionImpresa');
    Route::post('/Caballo/{slug?}', 'PortalController@ContactoCaballoVenta')->name('contactocaballoventa');
    Route::post('send', 'PortalController@EnviarCaballo')->name('EnviarCaballo');
    Route::group([
        //'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            'CompresionMax',
            'localize',
            
            'localeSessionRedirect',
            'localeViewPath'
        ], 'ttl' => 60], function () {
        Route::get(LaravelLocalization::transRoute('rutas_cliente.MyPage'), 'StudController@ClientDetail')->name('MyPage');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.JsTablaCaballo'), 'PublicController@RetornaJsTabla')->name('JsTablaCaballo');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.MyContact'), 'StudController@ClientContact')->name('MyContact');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.MyGallery'), 'StudController@ClientGallery')->name('MyGallery');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.MyGallery2'), 'StudController@ClientGallery2')->name('MyGallery2');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.MyGallery2post'), 'StudController@ClientGallery2config')->name('MyGallery2post');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.MyHorseDetailed'), 'StudController@DetailedHorse')->name('MyHorseDetailed');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.MyHorseDetailed2'), 'StudController@DetailedHorse')->name('MyHorseDetailed2');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.MyVideo'), 'StudController@ClientVideo')->name('MyVideo');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.MyInstalation'), 'StudController@ClientInstalation')->name('MyInstalation');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.MyInstalation2'), 'StudController@ClientInstalationCentro')->name('MyInstalation2');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.MySell'), 'StudController@ClientSell')->name('MySell');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.MySellDetailSell'), 'StudController@DetailedHorseVenta')->name('MySellDetailSell');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.Caballos'), 'StudController@ClientHorses')->name('MyHorsesV1');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.Trabajo'), 'TrabajoController@index')->name('TrabajoIndex');
        Route::post(LaravelLocalization::transRoute('rutas_cliente.Trabajo'), 'TrabajoController@indexpost')->name('TrabajoIndexPost');
        Route::get(LaravelLocalization::transRoute('rutas_cliente.MyHorses'), 'StudController@ClientHorsesByHost')->name('MyHorses');
        Route::get("/login", 'StudController@Login')->name('Login');
        //Route::post(LaravelLocalization::transRoute('rutas_cliente.CaballoPortalDetalle'), 'StudController@ClientHorses')->name('MyHorses');
//Route::get('/Horse/{v?}/{type?}', function($slug,$v,$type){echo "$slug  $v  $type";})->name('MyHorses');


    });
});
Route::group([
    'domain' => Config('aplication.host'),
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['Compresion', 'localize',  'localeSessionRedirect', 'localeViewPath'], 'ttl' => 60], function () {
    /***/
    /***/
    /******************* PORTAL DE BUSQUEDA *********************/
    /***/
    /***/
    Route::get('/', 'PortalController@index')->name('portal');
    Route::get(LaravelLocalization::transRoute('rutas_cliente.listaportal'), 'PortalController@PorRaza');// 'listaportal');// /lista
    Route::get(LaravelLocalization::transRoute('rutas_cliente.probusqueda'), 'PortalController@PorRaza');// 'probusqueda');// /buscar
    Route::group(['middleware' => 'CompresionMax'], function () {
        route::post(LaravelLocalization::transRoute('rutas_cliente.NuevaBusqueda'), 'PortalController@PorRaza');// 'NuevaBusqueda'); // /lista
        Route::post(LaravelLocalization::transRoute('rutas_cliente.probusquedapost'), 'PortalController@PorRaza');// 'probusquedapost'); // buscar
    });

    Route::get(LaravelLocalization::transRoute('rutas_cliente.Listajs'), 'PublicController@RetornaJsLista');// 'Listajs'); // lista.js
    Route::get(LaravelLocalization::transRoute('rutas_cliente.Listacss'), 'PublicController@RetornaCssLista');// 'Listacss'); // lista.css

    Route::get(LaravelLocalization::transRoute('rutas_cliente.lista5'), 'PortalController@PorRaza');// 'lista5'); // lista5

    /*Route::get('/lista', 'PortalController@index5');// 'listaportal');
    route::post('/lista', 'PublicController@NuevaBusqueda');// 'NuevaBusqueda');
    Route::get('/lista5', 'PortalController@index5');// 'lista5');*/
    /***/
    /***/
    /******************* PORTAL DE BUSQUEDA *********************/
    /***/
    /***/

    Route::get('/{slug?}', 'StudController@ClientDetail')->name('MyPageBase');
    Route::get('/{stud?}/detalle/{horse?}', 'StudController@DetailedHorse')->name('MyHorseDetailedBase');
    Route::get('/Caballo/{slug?}', 'PortalController@caballo')->name('portalcaballobase');

});





