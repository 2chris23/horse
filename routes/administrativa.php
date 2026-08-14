<?php
Route::get('/sitemap', 'PublicController@CrearMapaSitioIndex');
Route::get('/limpiar', 'PublicController@Limpiar');
Route::get('/FacebookPost', 'FacebookController@Programas1dia')->name('PublicacionesProgramadasFb');
Route::get('/FacebookProg', 'FacebookController@ProgramarCaballoDia')->name('PublicacionesProgramadasFbDia');
Route::get('/kokokaka', 'PublicController@BackupDiario');
Route::get('/kokokakb', 'Functions@ActualizarMoneda');
Route::get('/17239426/errores', 'ErroresDBController@Index');
Route::group(['prefix' => 'authv1'], function () {
    Route::get('/{provider}', 'FacebookController@redirectToProvider')->name('LogeoSocial');
    Route::get('/facebook/callback', 'FacebookController@FacebookCallBack')->name('FacebooCallBack');
});
Route::get('fbicon/flat', 'Functions@DecodeIpapi');
Route::get('caballito/actualizar', function () {
    set_time_limit(600);
    $h = \App\Model\Horse::where('id', "!=", 0)->get();
    $i = 0;
    foreach ($h as $k => $v) {
        $i = $i + 1;
        $v->ActualizarBusqueda();
        $v->ActualizarSlug();
        //$v->push();
    }
});