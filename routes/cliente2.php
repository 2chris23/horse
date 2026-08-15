<?php
/*Galeria de video http://unitegallery.net/*/
//https://wasi.co pagina de ejemplo del servicio
//http://demo.lorvent.com/demo_admire/admire2_fixed_header/advanced_tables.html
/*Laravel 5.3 requiere php 5.6.4+, en caso de ser necesario, atento a esta pagina
https://laravel.com/docs/5.3/upgrade#upgrade-5.3.0 para buscar hacer un downgrade*/
// ftp del sitio epiz_20767474    clave RaDwcZMZio   y la url  ftp.epizy.com
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
/*Id actualmente es solo el id de usuario, este pasara a ser un tipo slug*/
//Route::group(['middleware' => 'web'], function () {


Route::get('/', 'StudController@ClientDetail')->name('MyPage');
Route::get('/Contacto', 'StudController@ClientContact')->name('MyContact');
route::post('/contacto', 'PublicController@Contacto')->name('contacto.accion');
Route::post('/Caballo/{slug?}', 'PortalController@ContactoCaballoVenta')->name('contactocaballoventa');

Route::get('/Galeria', 'StudController@ClientGallery')->name('MyGallery');
Route::get('/Video', 'StudController@ClientVideo')->name('MyVideo');

Route::get('/Instalaciones', 'StudController@ClientInstalation')->name('MyInstalation');
Route::get('/Ventas/', 'StudController@ClientSell')->name('MySell');
Route::get('/Ventas/{horse?}', 'StudController@DetailedHorseVenta')->name('MySellDetailSell');
Route::get('/detalle/{horse?}', 'StudController@DetailedHorse')->name('MyHorseDetailed');
//Route::get('/{slug}/Horse/{v?}/{type?}', function($slug,$v,$type){echo "$slug  $v  $type";})->name('MyHorses');/*Revisar este*/
Route::get('/{slug}/Caballo/{v?}/{type?}', 'StudController@ClientHorses')->name('MyHorses');/*Revisar este*/
Route::get('/{slug}/Caballo/{v?}/{type?}/333', 'StudController@ClientHorses')->name('MyHorses123');/*Revisar este*/


/*

    Route::get('/{slug}', 'StudController@ClientDetail')->name('MyPage');
    Route::get('/{slug}/Contacto', 'StudController@ClientContact')->name('MyContact');
    Route::get('/{slug}/Galeria', 'StudController@ClientGallery')->name('MyGallery');
    Route::get('/{slug}/Video', 'StudController@ClientVideo')->name('MyVideo');

    Route::get('/{slug}/Instalaciones', 'StudController@ClientInstalation')->name('MyInstalation');
    Route::get('/{slug}/Ventas/', 'StudController@ClientSell')->name('MySell');
    Route::get('/{slug}/Ventas/{horse?}', 'StudController@DetailedHorseVenta')->name('MySellDetailSell');
    Route::get('/{stud?}/detalle/{horse?}', 'StudController@DetailedHorse')->name('MyHorseDetailed');
   // Route::get('/{slug}/Horse/{v?}/{type?}', function($slug,$v,$type){echo "$slug  $v  $type";})->name('MyHorses');  rev este
    Route::get('/{slug}/Caballo/{v?}/{type?}', 'StudController@ClientHorses')->name('MyHorses');/*Revisar este*/
//Route::get('/luis/{id?}', 'StudController@luis')->name('MyPage2');
/*
 Route::get('/{id?}', 'StudController@ClientDetail')->name('MyPage');
Route::get('/{id?}/Contacto', 'StudController@ClientContact')->name('MyContact');
Route::get('/{id?}/Galeria', 'StudController@ClientGallery')->name('MyGallery');
Route::get('/{id?}/Video', 'StudController@ClientVideo')->name('MyVideo');
Route::get('/{id?}/Caballos/{type?}', 'StudController@ClientHorses')->name('MyHorses');
Route::get('/{id?}/Instalaciones', 'StudController@ClientInstalation')->name('MyInstalation');
Route::get('/{id?}/Ventas', 'StudController@ClientSell')->name('MySell');
Route::get('/{stud?}/detalle/{horse?}', 'StudController@DetailedHorse')->name('MyHorseDetailed');
Route::get('/luis/{id?}', 'StudController@luis')->name('MyPage2');//borrar
*/

//})->with('slug', Str::slug($slug));
Route::get('Lang/{lang?}', 'PublicController@ChangeLang')->name('lengauje');
Route::group(['domain' => \Config::get('aplication.host')], function () {
    Route::get('/', 'PortalController@index')->name('portal');

    Route::get('/AD', 'PortalController@indexAD')->name('portalad');
});
