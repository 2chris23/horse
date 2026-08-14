<?php

/*LaravelLocalization::transRoute('rutas_publicas.')*/
/*
Route::group(['domain' => 'app.' . Config('aplication.host')], function () {
    route::get('/', 'HomeController@indexlanding')->name('landinghome');
});

Route::get('/', 'PortalController@index')->name('portal');
Route::group([
    'domain' => Config('aplication.host'),
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'Compresion',
        'localize',
        'localizationRedirect',
        'localeSessionRedirect',
        'localeViewPath'
    ],
    'ttl' => 60], function () {
    Route::group(['domain' => 'app.' . Config('aplication.host')], function () {
        route::get('/', 'HomeController@indexlanding')->name('landinghome');
    });
    Route::get('/', 'PortalController@index')->name('portal');
});
*/
Route::group([
    'domain' => Config('aplication.host'),
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['Compresion', 'localize', 'localizationRedirect', 'localeSessionRedirect', 'localeViewPath'], 'ttl' => 60], function () {


    /***/
    /***/
    /******************* PORTAL DE BUSQUEDA *********************/
    /***/
    /***/

    Route::get(LaravelLocalization::transRoute('rutas_publicas.listaportal'), 'PortalController@PorRaza');// 'listaportal');// /lista
    Route::get(LaravelLocalization::transRoute('rutas_publicas.probusqueda'), 'PortalController@PorRaza');// 'probusqueda');// /buscar
    Route::group(['middleware' => 'CompresionMax'], function () {
        route::post(LaravelLocalization::transRoute('rutas_publicas.NuevaBusqueda'), 'PortalController@PorRaza');// 'NuevaBusqueda'); // /lista
        Route::post(LaravelLocalization::transRoute('rutas_publicas.probusquedapost'), 'PortalController@PorRaza');// 'probusquedapost'); // buscar
    });

    Route::get(LaravelLocalization::transRoute('rutas_publicas.Listajs'), 'PublicController@RetornaJsLista');// 'Listajs');/*Revisar este*/ // lista.js
    Route::get(LaravelLocalization::transRoute('rutas_publicas.Listacss'), 'PublicController@RetornaCssLista');// 'Listacss');/*Revisar este*/ // lista.css

    Route::get(LaravelLocalization::transRoute('rutas_publicas.lista5'), 'PortalController@PorRaza');// 'lista5'); // lista5

    /*Route::get('/lista', 'PortalController@index5');// 'listaportal');
    route::post('/lista', 'PublicController@NuevaBusqueda');// 'NuevaBusqueda');
    Route::get('/lista5', 'PortalController@index5');// 'lista5');*/
    /***/
    /***/
    /******************* PORTAL DE BUSQUEDA *********************/
    /***/
    /***/


    Route::get(LaravelLocalization::transRoute('rutas_publicas.JsTablaCaballo'), 'PublicController@RetornaJsTabla')
        ->name('JsTablaCaballo');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyPage'), 'StudController@ClientDetail')
        ->name('MyPage');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyContact'), 'StudController@ClientContact')
        ->name('MyContact');



    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyGallery'), 'StudController@ClientGallery')
        ->name('MyGallery');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyGallery2'), 'StudController@ClientGallery2')
        ->name('MyGallery2');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyGallery2post'), 'StudController@ClientGallery2config')
        ->name('MyGallery2post');

    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyHorseDetailed'), 'StudController@DetailedHorse')
        ->name('MyHorseDetailed');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyVideo'), 'StudController@ClientVideo')
        ->name('MyVideo');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyInstalation'), 'StudController@ClientInstalation')
        ->name('MyInstalation');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyInstalation2'), 'StudController@ClientInstalationCentro')
        ->name('MyInstalation2');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MySell'), 'StudController@ClientSell')
        ->name('MySell');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MySellDetailSell'), 'StudController@DetailedHorseVenta')
        ->name('MySellDetailSell');

    Route::get(LaravelLocalization::transRoute('rutas_publicas.Caballos'), 'StudController@ClientHorses')
        ->name('MyHorsesV1');/*Revisar este*/
    Route::get(LaravelLocalization::transRoute('rutas_publicas.Trabajo'), 'TrabajoController@index')
        ->name('TrabajoIndex');
    Route::post(LaravelLocalization::transRoute('rutas_publicas.Trabajo'), 'TrabajoController@indexpost')->name('TrabajoIndexPost');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyHorses'), 'StudController@ClientHorses')->name('MyHorses');
    //Route::post(LaravelLocalization::transRoute('rutas_publicas.CaballoPortalDetalle'), 'StudController@ClientHorses')->name('MyHorses');
//Route::get('/{slug}/Horse/{v?}/{type?}', function($slug,$v,$type){echo "$slug  $v  $type";})->name('MyHorses');/*Revisar este*/

});