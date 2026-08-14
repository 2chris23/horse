<?php
Route::post('paises', 'PublicController@Paises')->name('country.ajax');
Route::post('provincia', 'PublicController@Estados')->name('state.ajax');
Route::post('ciudad', 'PublicController@Ciudades')->name('city.ajax');


route::get('Lang/{lang?}', 'PublicController@ChangeLang')->name('lengauje');
Route::group(['domain' => 'app.' . Config('aplication.host')], function () {
    route::get('/', 'HomeController@indexlanding')->name('landinghome');
});



if (config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');
    Route::get('traduce', 'PublicController@trad')->name('logsd');
    Route::get('traduce', 'PublicController@unico')->name('logsd');
    Route::get('fakeemail', 'PublicController@fakemail')->name('emailfake');
    //Route::get('fakeValidacion', 'PublicController@fakeValidacion')->name('fakeValidacion');

}
Route::get('/lista', 'PortalController@index5')->name('listaportal');
route::post('/lista', 'PublicController@NuevaBusqueda')->name('NuevaBusqueda');
Route::get('/lista5', 'PortalController@index5')->name('lista5');
Route::get('/suscripcion', 'PortalController@SuscripcionIndex')->name('SuscripcionIndex');
Route::get('/contacto', 'PortalController@ContactoIndex')->name('ContactoIndex');
Route::get('/publicidad', 'PortalController@PublicidadIndex')->name('PublicidadIndex');
Route::get('/Caballo/{slug?}', 'PortalController@caballo')->name('portalcaballo');
Route::post('/Caballo/{slug?}', 'PortalController@ContactoCaballoVenta')->name('contactocaballoventa');
Route::get('/Raza/{raza?}/{orden?}', 'PortalController@PorRaza')->name('portalporraza');
Route::post('/Raza/{raza?}/{orden?}', 'PortalController@PorRaza')->name('portalporrazapost');

Route::get('/Caballoestado/{country?}/{state?}', 'PortalController@PorEstado')->name('portalporestado');





Route::group(['domain' => \Config::get('aplication.host')], function () {
    Route::get('/', 'PortalController@index')->name('portal');
    Route::get('/AD', 'PortalController@indexAD')->name('portalad');
});



/*Route::get('/RegenerarC','Functions@RegenerarCaballo');*/
