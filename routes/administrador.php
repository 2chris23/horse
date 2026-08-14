<?php
Route::group(['ttl' => 60,
    'prefix' => LaravelLocalization::setLocale() . "/admin/",
], function () {
    Route::get('/backtrup', 'PublicController@Backtrup')->name('MakebackUp');
    Route::get('/MonBackup', 'PublicController@MonitorBackup')->name('MonitorBackup');
    Route::get('/Asociados', 'AsociadosController@Index')->name('Asociados.index');
    Route::get('/Asociados/New', 'AsociadosController@Nuevo')->name('Asociados.new');
    Route::get('/Asociados/Edit/{user?}', 'AsociadosController@Edit')->name('Asociados.edit');
    Route::post('/Asociados/Save', 'AsociadosController@Save')->name('Asociados.save');
    /*
     *
     *
     * Usuario: contacto@horsesworldsale.com
    Servidor de correo saliente (SMTP): smtp.horsesworldsale.com
    Servidor de correo entrante (POP/IMAP/IMAP SSL): mail.horsesworldsale.com
    Contraseña: la indicada en el momento del alta del buzón. Si no la recuerdas, se puede actualizar desde la sección "Cambio de contraseña" del apartado Buzones
    Acceso a WebMail
     */
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
//Route::group(['middleware' => 'Compresion'], function () {
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
            //Route::get('/', 'FacebookController@MostrarPanelFacebook')->name('ObtenerPagina');// Borrar
            Route::post('/', 'FacebookController@ProgramarPublicacion')->name('ProgramarPublicacionAdmin');// Borrar
            Route::get('/MisPaginas', 'FacebookController@ListarPaginas')->name('MisPaginasAdmin');// Borrar
            Route::post('/MisPaginas', 'FacebookController@GuardarDatosPagina')->name('MisPaginasAdminPost');// Borrar

            Route::post('/ClearPost', 'FacebookController@BorrarPost')->name('BorrarPostAdmin');// Borrar
            Route::get('/Privacidad', 'FacebookController@Privacidad')->name('privacidadlAdmin');// Borrar
            Route::post('/Delete', 'FacebookController@BorrarDatosFb')->name('BorrarDatosFbAdmin');// Borrar


            Route::get('/Autoriza', 'FacebookController@SolicitarAutorizacion')->name('AutorizacionFacebook');// Borrar
            Route::get('/Sociales', 'FacebookController@ObtenerPagina')->name('Obten');// Borrar
            //Route::resource('/', 'GalleryController');
            //Route::get('/', 'GalleryController@index')->name('gallery.index');
            //Route::get('/Nuevo', 'GalleryController@create')->name('gallery.create');
            //Route::get('/Ver/{id?}', 'GalleryController@show')->name('gallery.show');
            //Route::get('/Editar/{id?}', 'GalleryController@edit')->name('gallery.edit');
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
            //Route::get('/', 'AdministradorController@YeguadasIndex')->name('yeguadas.index');
            //Route::get('/Editar/{id?}', 'AdministradorController@EditarUsuario')->name('usuario.edit');
            Route::post('/save', 'AdministradorController@NuevoUsuarioSave')->name('usuario.save');
            Route::get('/Nuevo', 'AdministradorController@NuevoUsuario')->name('usuario.create');
            Route::post('/Nuevo', 'AdministradorController@NuevoUsuarioUpdate')->name('usuario.update');
        });
        Route::group(['prefix' => 'Visita'], function () {
            Route::get('/', 'AdministradorController@VisitasIndex')->name('visita.index');
            //Route::get('/Editar/{id?}', 'AdministradorController@EditarUsuario')->name('visita.edit');
            //Route::post('/save', 'AdministradorController@NuevoUsuarioSave')->name('visita.save');
            //Route::get('/Nuevo', 'AdministradorController@NuevoUsuario')->name('visita.create');
            //Route::post('/Nuevo', 'AdministradorController@NuevoUsuarioUpdate')->name('visita.update');
        });
        Route::group(['prefix' => 'Caballos'], function () {
            Route::get('/Razas', 'AdministradorController@RazaIndex')->name('razasa.index');
            Route::post('/Razas', 'AdministradorController@CambioStatusRaza')->name('CambioStatusRaza');
            Route::get('/', 'AdministradorController@AllHorses')->name('caballo.index');
            Route::post('/Borrar', 'AdministradorController@BorrarCaballo')->name('caballo.borrar');

            Route::get('/Editar/{id?}', 'AdministradorController@EditarCaballo')->name('caballo.editar');
            Route::post('/Editar/{id?}', 'AdministradorController@EditarCaballoPost')->name('caballo.editarpost');
            //Route::get('/Editar/{id?}', 'AdministradorController@EditarUsuario')->name('visita.edit');
            //Route::post('/save', 'AdministradorController@NuevoUsuarioSave')->name('visita.save');
            //Route::get('/Nuevo', 'AdministradorController@NuevoUsuario')->name('visita.create');
            //Route::post('/Nuevo', 'AdministradorController@NuevoUsuarioUpdate')->name('visita.update');
        });
        Route::group(['prefix' => 'ventas'], function () {
            Route::get('/', 'AdministradorController@VentasAdmin')->name('ventas.index');
            Route::post('/datos', 'AdministradorController@VentasAdminPost')->name('ventas.datos');
            //Route::post('/Borrar', 'AdministradorController@BorrarCaballo')->name('caballo.borrar');
            //Route::get('/Editar/{id?}', 'AdministradorController@EditarUsuario')->name('visita.edit');
            //Route::post('/save', 'AdministradorController@NuevoUsuarioSave')->name('visita.save');
            //Route::get('/Nuevo', 'AdministradorController@NuevoUsuario')->name('visita.create');
            //Route::post('/Nuevo', 'AdministradorController@NuevoUsuarioUpdate')->name('visita.update');
        });
        Route::group(['prefix' => 'Servicios'], function () {
            Route::get('/', 'AdministradorController@ServiciosAdmin')->name('servicios.index');
            Route::post('/', 'AdministradorController@PrecioMensualidad')->name('FijarPrecioPost');
            Route::post('/NuevoCodigo', 'AdministradorController@GuardarNuevoCodigoPromo')->name('GuardarNuevoCodigo');
            //Route::post('/Borrar', 'AdministradorController@BorrarCaballo')->name('caballo.borrar');
            //Route::get('/Editar/{id?}', 'AdministradorController@EditarUsuario')->name('visita.edit');
            //Route::post('/save', 'AdministradorController@NuevoUsuarioSave')->name('visita.save');
            //Route::get('/Nuevo', 'AdministradorController@NuevoUsuario')->name('visita.create');
            //Route::post('/Nuevo', 'AdministradorController@NuevoUsuarioUpdate')->name('visita.update');
        });
        Route::group(['prefix' => 'Soporte'], function () {
            //Route::get('/', 'AdministradorController@SoporteAdmin')->name('soporte.index');
            //tickets.index
            /*
            Route::get('/', function(){
                return redirect()->route('tickets.index');
            })->name('soporte.index');
            */
            Route::get('/', 'PublicController@SoporteIndex')->name('soporte.index');
            //Route::post('/Borrar', 'AdministradorController@BorrarCaballo')->name('caballo.borrar');
            //Route::get('/Editar/{id?}', 'AdministradorController@EditarUsuario')->name('visita.edit');
            //Route::post('/save', 'AdministradorController@NuevoUsuarioSave')->name('visita.save');
            //Route::get('/Nuevo', 'AdministradorController@NuevoUsuario')->name('visita.create');
            //Route::post('/Nuevo', 'AdministradorController@NuevoUsuarioUpdate')->name('visita.update');
        });
        Route::group(['prefix' => 'Fotos'], function () {
            Route::get('/', 'AdministradorController@AllPhoto')->name('fotos.index');
            Route::get('/carta', 'AdministradorController@AllPhotoCard')->name('fotos.indexcarta');
            //Route::post('/', 'AdministradorController@AllPhotoPost')->name('fotospost.index');
            Route::get('/get', 'AdministradorController@AllPhotoPost')->name('fotospost.index');
            //Route::get('/Editar/{id?}', 'AdministradorController@EditarUsuario')->name('visita.edit');
            //Route::post('/save', 'AdministradorController@NuevoUsuarioSave')->name('visita.save');
            //Route::get('/Nuevo', 'AdministradorController@NuevoUsuario')->name('visita.create');
            //Route::post('/Nuevo', 'AdministradorController@NuevoUsuarioUpdate')->name('visita.update');
        });
        Route::group(['prefix' => 'Videos'], function () {
            Route::get('/', 'AdministradorController@AllVideo')->name('videos.index');
            Route::get('/carta', 'AdministradorController@AllVideoCard')->name('videos.indexcarta');
            //Route::get('/Editar/{id?}', 'AdministradorController@EditarUsuario')->name('visita.edit');
            //Route::post('/save', 'AdministradorController@NuevoUsuarioSave')->name('visita.save');
            //Route::get('/Nuevo', 'AdministradorController@NuevoUsuario')->name('visita.create');
            //Route::post('/Nuevo', 'AdministradorController@NuevoUsuarioUpdate')->name('visita.update');
        });

        route::get("Imagenes", "AdministradorController@FixImagenes")->name('ProcesarImagen');
        route::get("Opciones", "AdministradorController@OpcionesAdmin")->name('OpcionesAdmin');
        route::get("Iconos", "AdministradorController@Iconos")->name('iconos');
        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');
        Route::get('traduce/{lng?}/{gr?}', 'PublicController@TransG1')->name('traducir1');
        //Route::get('unico/{lng?}/{file?}', 'PublicController@unico')->name('traducir1');
        Route::group(['prefix' => 'Traduccion'], function () {
            /*
            Route::post('/add/{group}', '\Barryvdh\TranslationManager\Controller@postAdd')->name('traducir2');
            Route::post('/delete/{group}/{key}', '\Barryvdh\TranslationManager\Controller@postDelete')->name('traducir3');
            Route::post('/edit/{group}', '\Barryvdh\TranslationManager\Controller@postEdit')->name('traducir4');
            Route::post('/find', '\Barryvdh\TranslationManager\Controller@postFind')->name('traducir5');
            Route::post('/import', '\Barryvdh\TranslationManager\Controller@postImport')->name('traducir6');
            Route::post('/publish/{group}', '\Barryvdh\TranslationManager\Controller@postPublish')->name('traducir7');
            Route::get('/view/{group?}', '\Barryvdh\TranslationManager\Controller@getView')->name('traducir8');
            Route::post('/{group?}', '\Barryvdh\TranslationManager\Controller@getIndex')->name('traducir9');
            */
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