<?php
    Route::get('/', 'PortalController@index')->name('portal');
//Route::get('/lista', 'PortalController@index5')->name('listaportal');
//Route::get('/lista5', 'PortalController@index5')->name('lista5');
//Route::get('/Caballo/{id?}', 'PortalController@caballo')->name('portalcaballo');
//Route::get('/Raza/{raza?}/{orden?}', 'PortalController@PorRaza')->name('portalporraza');
//Route::get('/Caballoestado/{country?}/{state?}', 'PortalController@PorEstado')->name('portalporestado');

    Route::get('/lista', 'PortalController@index5')->name('listaportal');
    route::post('/lista', 'PublicController@NuevaBusqueda')->name('NuevaBusqueda');
    Route::get('/lista5', 'PortalController@index5')->name('lista5');
    Route::get('/suscripcion', 'PortalController@SuscripcionIndex')->name('SuscripcionIndex');
    Route::get('/contacto', 'PortalController@ContactoIndex')->name('ContactoIndex');
    Route::get('/publicidad', 'PortalController@PublicidadIndex')->name('PublicidadIndex');
    Route::get('/Caballo/{slug?}', 'PortalController@caballo')->name('portalcaballo');
    Route::get('/Raza/{raza?}/{orden?}', 'PortalController@PorRaza')->name('portalporraza');
    Route::get('/Caballoestado/{country?}/{state?}', 'PortalController@PorEstado')->name('portalporestado');

    Route::get('/', 'PortalController@index')->name('portal');

    /*
    Route::get('/lista1', 'PortalController@index1')->name('portal1');
    Route::get('/lista2', 'PortalController@index2')->name('portal2');
    Route::get('/lista3', 'PortalController@index3')->name('portal3');
    Route::get('/lista4', 'PortalController@index4')->name('portal4');
    Route::get('/lista5', 'PortalController@index5')->name('portal5');
    Route::get('/lista6', 'PortalController@index6')->name('portal6');
    Route::get('/lista7', 'PortalController@index7')->name('portal7');
    */
