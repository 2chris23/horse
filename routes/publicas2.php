<?php
Route::group([
    'domain' => Config('aplication.host'),
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['Compresion', 'localize',  'localeSessionRedirect', 'localeViewPath'], 'ttl' => 60], function () {
    /*LaravelLocalization::transRoute('rutas_publicas.')*/

    Route::get(LaravelLocalization::transRoute('rutas_publicas.JsTablaCaballo'), 'PublicController@RetornaJsTabla')->name('JsTablaCaballo');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyPage'), 'StudController@ClientDetail')->name('MyPage');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyContact'), 'StudController@ClientContact')->name('MyContact');

    Route::get('/{slug}/Galeria', 'StudController@ClientGallery')->name('MyGallery');
    Route::get('/{slug}/Galeria2', 'StudController@ClientGallery2')->name('MyGallery2');
    Route::get('/{slug}/Galeria3', 'StudController@ClientGallery2config')->name('MyGallery2post');
    /*

    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyGallery'), 'StudController@ClientGallery')->name('MyGallery');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyGallery2'), 'StudController@ClientGallery2')->name('MyGallery2');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyGallery2post'), 'StudController@ClientGallery2config')->name('MyGallery2post');
     */
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyVideo'), 'StudController@ClientVideo')->name('MyVideo');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyInstalation'), 'StudController@ClientInstalation')->name('MyInstalation');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyInstalation2'), 'StudController@ClientInstalationCentro')->name('MyInstalation2');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MySell'), 'StudController@ClientSell')->name('MySell');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MySellDetailSell'), 'StudController@DetailedHorseVenta')->name('MySellDetailSell');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.MyHorseDetailed'), 'StudController@DetailedHorse')->name('MyHorseDetailed');
    Route::get(LaravelLocalization::transRoute('rutas_publicas.Caballos'), 'StudController@ClientHorses')->name('MyHorsesV1');/*Revisar este*/
    Route::get(LaravelLocalization::transRoute('rutas_publicas.Trabajo'), 'TrabajoController@index')->name('TrabajoIndex');
    Route::post(LaravelLocalization::transRoute('rutas_publicas.Trabajo'), 'TrabajoController@indexpost')->name('TrabajoIndexPost');
});
