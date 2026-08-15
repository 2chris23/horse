<?php
Route::group(['ttl' => 60,

], function () {
    Route::get('/backtrup', 'PublicController@Backtrup')->name('MakebackUp');
    Route::get('/MonBackup', 'PublicController@MonitorBackup')->name('MonitorBackup');
    Route::group(['middleware' => 'Admin'], function () {
        Route::get('/LogAs', 'AdministradorController@MostrarUsuarios')->name('LoginAs');
        Route::post('/LogAs', 'AdministradorController@MostrarUsuariosPost')->name('LoginAsPost');
        Route::get('/LogAs/{id?}', 'AdministradorController@MostrarUsuariosGet')->name('LoginAsGet');
        Route::get('/GenerarSitio', 'PublicController@CrearMapaSitioIndex');
        route::post('perfil', 'AdministradorController@GuardarDatosAdmin')->name('AdminPerfilPost');
        route::get('Inicios', 'IniciosController@ListadoDeIngresos')->name('ListadoDeIngresos');
        Route::group(['prefix' => "Facebook"], function () {
            Route::get('/js/calendar.js', 'PublicController@RetornaJsFaceCalendar')->name('CalendarFacebookJsAdmin');
            Route::get('/', 'FacebookController@MostrarPanelFacebook')->name('FacebookAdmin');// Borrar
            Route::post('/', 'FacebookController@ProgramarPublicacion')->name('ProgramarPublicacionAdmin');// Borrar
            Route::get('/MisPaginas', 'FacebookController@ListarPaginas')->name('MisPaginasAdmin');// Borrar
            Route::post('/MisPaginas', 'FacebookController@GuardarDatosPagina')->name('MisPaginasAdminPost');// Borrar
            Route::post('/ClearPost', 'FacebookController@BorrarPost')->name('BorrarPostAdmin');// Borrar
            Route::get('/Privacidad', 'FacebookController@Privacidad')->name('privacidadlAdmin');// Borrar
            Route::post('/Delete', 'FacebookController@BorrarDatosFb')->name('BorrarDatosFbAdmin');// Borrar
            Route::get('/Autoriza', 'FacebookController@SolicitarAutorizacion')->name('AutorizacionFacebook');// Borrar
            Route::get('/Sociales', 'FacebookController@ObtenerPagina')->name('Obten');// Borrar
        });
        Route::group(['prefix' => 'Clientes'], function () {
            Route::get('/', 'AdministradorController@PosibleClienteIndex')->name('clientes.index');
            Route::get('/Nuevo', 'AdministradorController@PosibleClienteNuevo')->name('clientes.create');
            Route::get('/Edit/{id?}', 'AdministradorController@PosibleClienteEditar')->name('clientes.edit');
            Route::post('/Nuevo', 'AdministradorController@GuardarCliente')->name('clientes.store');
        });
        Route::group(['prefix' => 'Yeguadas'], function () {
            Route::get('/', 'AdministradorController@YeguadasIndex')->name('yeguadas.index');
            Route::get('/Mostrar/{id?}', 'AdministradorController@YeguadasShow')->name('yeguadas.show');
            Route::get('/Nuevo', 'AdministradorController@YeguadasNueva')->name('yeguadas.create');
            Route::get('/Editar/{id?}', 'AdministradorController@YeguadasEdit')->name('yeguadas.edit');
            Route::post('/Nuevo', 'AdministradorController@GuardarNuevaYeguada')->name('yeguadas.new');
            Route::post('/save', 'AdministradorController@YeguadasSalvar')->name('yeguadas.store');
        });
        Route::group(['prefix' => 'Edicion'], function () {
            Route::get('/Videos/{id?}', 'AdministradorController@VideoIndex')->name('yeguadas.videos');
            Route::get('/Caballos/{id?}', 'AdministradorController@HorseIndex')->name('yeguadas.caballos');
            Route::get('/Fotos/{id?}', 'AdministradorController@GaleriaShow')->name('yeguadas.fotos');
            Route::get('/Perfil/{id?}', 'AdministradorController@EditarUsuario')->name('yeguadas.perfil');
            Route::get('/Yeguada/{id?}', 'AdministradorController@YeguadasEdit')->name('yeguadas.editar');
        });
        Route::group(['prefix' => 'Usuario'], function () {
            Route::post('/save', 'AdministradorController@NuevoUsuarioSave')->name('usuario.save');
            Route::get('/Nuevo', 'AdministradorController@NuevoUsuario')->name('usuario.create');
            Route::post('/Nuevo', 'AdministradorController@NuevoUsuarioUpdate')->name('usuario.update');
        });
        Route::group(['prefix' => 'Visita'], function () {
            Route::get('/', 'AdministradorController@VisitasIndex')->name('visita.index');
        });
        Route::group(['prefix' => 'Caballos'], function () {
            Route::get('/Razas', 'AdministradorController@RazaIndex')->name('razasa.index');
            Route::post('/Razas', 'AdministradorController@CambioStatusRaza')->name('CambioStatusRaza');
            Route::get('/', 'AdministradorController@AllHorses')->name('caballo.index');
            Route::post('/Borrar', 'AdministradorController@BorrarCaballo')->name('caballo.borrar');
            Route::get('/Editar/{id?}', 'AdministradorController@EditarCaballo')->name('caballo.editar');
            Route::post('/Editar/{id?}', 'AdministradorController@EditarCaballoPost')->name('caballo.editarpost');
        });
        Route::group(['prefix' => 'ventas'], function () {
            Route::get('/', 'AdministradorController@VentasAdmin')->name('ventas.index');
            Route::post('/datos', 'AdministradorController@VentasAdminPost')->name('ventas.datos');
        });
        Route::group(['prefix' => 'Servicios'], function () {
            Route::get('/', 'AdministradorController@ServiciosAdmin')->name('servicios.index');
            Route::post('/', 'AdministradorController@PrecioMensualidad')->name('FijarPrecioPost');
            Route::post('/NuevoCodigo', 'AdministradorController@GuardarNuevoCodigoPromo')->name('GuardarNuevoCodigo');
        });
        Route::group(['prefix' => 'Soporte'], function () {
            Route::get('/', 'PublicController@SoporteIndex')->name('soporte.index');
        });
        Route::group(['prefix' => 'Fotos'], function () {
            Route::get('/', 'AdministradorController@AllPhoto')->name('fotos.index');
            Route::get('/carta', 'AdministradorController@AllPhotoCard')->name('fotos.indexcarta');
            Route::get('/get', 'AdministradorController@AllPhotoPost')->name('fotospost.index');
        });
        Route::group(['prefix' => 'Videos'], function () {
            Route::get('/', 'AdministradorController@AllVideo')->name('videos.index');
            Route::get('/carta', 'AdministradorController@AllVideoCard')->name('videos.indexcarta');
        });
        route::get("Imagenes", "AdministradorController@FixImagenes")->name('ProcesarImagen');
        route::get("Opciones", "AdministradorController@OpcionesAdmin")->name('OpcionesAdmin');
        route::get("Iconos", "AdministradorController@Iconos")->name('iconos');
        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');
        Route::get('traduce/{lng?}/{gr?}', 'PublicController@TransG1')->name('traducir1');
        Route::group(['prefix' => 'Traduccion'], function () {
            Route::get('/', '\Barryvdh\TranslationManager\Controller@getIndex')->name('traducir1');
        });
        Route::get('admin/FakeMail', 'MailController@FakeMail')->name('FakeMail');
        Route::get('/FakeNot/{notification?}', 'MailController@ContactoMail')->name('fakenotifi');
        Route::get('/Monedas/llenar', 'MonedasController@LlenarBase')->name('Monedas.inicial');
        Route::get('/Monedas', 'MonedasController@ListarMonedas')->name('Monedas.lista');
        Route::post('/Monedas', 'MonedasController@EstablecerActiva')->name('Monedas.status');
        Route::post('/DatoMonedas', 'MonedasController@DevolverElementosMoneda')->name('Monedas.data');
        Route::post('/GuardarMonedas', 'MonedasController@GuardarDatosBasicos')->name('Monedas.save');
    });
});
