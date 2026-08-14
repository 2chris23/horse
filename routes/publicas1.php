<?php
/*LaravelLocalization::transRoute('rutas_publicas.')*/
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['Compresion', 'localize', 'localizationRedirect'], 'ttl' => 60], function () {
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

Route::get('/{slug}/Caballo', 'StudController@ClientHorses')->name('MyHorsesV1');
Route::get('/{slug}/working', 'TrabajoController@index')->name('TrabajoIndex');
Route::post('/{slug}/working', 'TrabajoController@indexpost')->name('TrabajoIndexPost');
