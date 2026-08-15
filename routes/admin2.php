<?php
Route::group(['ttl' => 60,
    'middleware' => ['localize', ] // Route translate middleware
], function () {

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
//use App\Http\Controllers\HomeController;
//Route::group(['middleware' => 'Compresion'], function () {
    Route::group(['middleware' => 'Autentificado'], function () {
        Route::get('/icofb.css', 'HomeController@RetornaCssFacebookIcon')->name('CssFbIcon');
        Route::group(['middleware' => 'Compresion'], function () {
            Route::get(LaravelLocalization::transRoute('rutas_admin.FullCalendar.js'), 'PublicController@RetornaJsFullCalebdar')->name('FullCalendar.js');
            route::get(LaravelLocalization::transRoute('rutas_admin.MonedaCaballoAdmin'), 'PublicController@MonedasCaballo')->name('MonedaCaballoAdmin');
            route::get(LaravelLocalization::transRoute('rutas_admin.CubricionCaballoAdmin'), 'PublicController@CubricionCaballo')->name('CubricionCaballoAdmin');
            route::get(LaravelLocalization::transRoute('rutas_admin.ObtenerPrecioCaballoAdmin'), 'PublicController@ObtenerPrecioCaballo')->name('ObtenerPrecioCaballoAdmin');
            route::post(LaravelLocalization::transRoute('rutas_admin.ObtenerPrecioCaballosAdmin'), 'PublicController@ObtenerPrecioCaballos')->name('ObtenerPrecioCaballosAdmin');
            route::post(LaravelLocalization::transRoute('rutas_admin.ObtenerCubricionCaballosAdmin'), 'PublicController@ObtenerCubricionesCaballos')->name('ObtenerCubricionCaballosAdmin');
            route::post(LaravelLocalization::transRoute('rutas_admin.ObtenerPreciosCaballosAdmin'), 'PublicController@ObtenerPreciosCaballos')->name('ObtenerPreciosCaballosAdmin');
            route::post(LaravelLocalization::transRoute('rutas_admin.ObtenerCubricionesCaballosAdmin'), 'PublicController@ObtenerCubricionesCaballos')->name('ObtenerCubricionesCaballosAdmin');
            Route::get(LaravelLocalization::transRoute('rutas_admin.PanelJs'), 'PublicController@RetornaJsPanel')->name('PanelJs');
            Route::get(LaravelLocalization::transRoute('rutas_admin.PanelCss'), 'PublicController@RetornaCssPanel')->name('PanelCss');


            Route::get(LaravelLocalization::transRoute('rutas_admin.TimeJs'), 'PublicController@RetornaJsTime')->name('TimeJs');
            Route::get(LaravelLocalization::transRoute('rutas_admin.TimeCss'), 'PublicController@RetornaCssTime')->name('TimeCss');
        });
        //});

        Route::get(LaravelLocalization::transRoute('rutas_admin.user.profile'), 'UserController@profile')->name('user.profile');
        Route::post(LaravelLocalization::transRoute('rutas_admin.user.profile.update'), 'UserController@profileupdate')->name('user.profile.update');
        Route::post(LaravelLocalization::transRoute('rutas_admin.user.psw'), 'UserController@CambioPsw')->name('user.psw');
        Route::post(LaravelLocalization::transRoute('rutas_admin.ThemesPost'), 'PlantillasController@Cambiar')->name('ThemesPost');
        Route::post(LaravelLocalization::transRoute('rutas_admin.PrepaFb'), 'PublicController@PrepararCaballo')->name('PrepaFb');
        Route::get(LaravelLocalization::transRoute('rutas_admin.exportar.caballo'), 'ExportarController@ExportarAnuncio')->name('exportar.caballo');;
        Route::group(['middleware' => 'Firstlog'], function () {


            Route::post(LaravelLocalization::transRoute('rutas_admin.stud.seo'), 'StudController@Seo')->name('stud.seo');
            Route::post(LaravelLocalization::transRoute('rutas_admin.stud.chateo'), 'StudController@chateo')->name('stud.chateo');
            Route::post(LaravelLocalization::transRoute('rutas_admin.stud.headfoot'), 'StudController@headfoot')->name('stud.headfoot');
            Route::post(LaravelLocalization::transRoute('rutas_admin.stud.colorin'), 'StudController@colorin')->name('stud.colorin');
            Route::post(LaravelLocalization::transRoute('rutas_admin.stud.domain'), 'StudController@Dominio')->name('stud.domain');
            Route::post(LaravelLocalization::transRoute('rutas_admin.stud.ImagenCabecera'), 'StudController@ImagenCabecera')->name('stud.ImagenCabecera');
            Route::post(LaravelLocalization::transRoute('rutas_admin.stud.ImagenAgua'), 'StudController@ImagenAgua')->name('stud.ImagenAgua');
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.temas')], function () {
                Route::get(LaravelLocalization::transRoute('rutas_admin.Themes'), 'PlantillasController@Index')->name('Themes');
                Route::get(LaravelLocalization::transRoute('rutas_admin.ThemesJs'), 'PlantillasController@RetornaJsTema')->name('ThemesJs');
                Route::get(LaravelLocalization::transRoute('rutas_admin.ThemesCss'), 'PlantillasController@RetornaCssTema')->name('ThemesCss');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.Contactos')], function () {
                Route::get(LaravelLocalization::transRoute('rutas_admin.StudClientes.index'), 'ClientesController@ClientesYeguada')->name('StudClientes.index');
                Route::get(LaravelLocalization::transRoute('rutas_admin.StudClientes.crear'), 'ClientesController@ClientesCrearYeguada')->name('StudClientes.crear');
                Route::post(LaravelLocalization::transRoute('rutas_admin.StudClientes.guardar'), 'ClientesController@ClientesGuardarYeguada')->name('StudClientes.guardar');
                Route::get(LaravelLocalization::transRoute('rutas_admin.StudClientes.edit'), 'ClientesController@ClientesEditarYeguada')->name('StudClientes.edit');
                Route::post(LaravelLocalization::transRoute('rutas_admin.StudClientes.delete'), 'ClientesController@BorrarContacto')->name('StudClientes.delete');
                Route::post(LaravelLocalization::transRoute('rutas_admin.StudClientes.fav'), 'ClientesController@EstablecerFavorito')->name('StudClientes.fav');
            });
            Route::post(LaravelLocalization::transRoute('rutas_admin.FacebookDatoCaballo'), 'FacebookController@ObtenerDatoCaballo')->name('FacebookDatoCaballo');
            Route::post(LaravelLocalization::transRoute('rutas_admin.imagenes'), 'FileController@Imagen')->name('imagenes');
            Route::post(LaravelLocalization::transRoute('rutas_admin.landingslider'), 'StudController@setSliders')->name('landingslider');
            Route::post(LaravelLocalization::transRoute('rutas_admin.imgs_gallery'), 'StudController@setGallery')->name('imgs_gallery');
            Route::post(LaravelLocalization::transRoute('rutas_admin.imgs_instalations'), 'StudController@imagen_instalations')->name('imgs_instalations');
            Route::post(LaravelLocalization::transRoute('rutas_admin.landingcolor'), 'StudController@setLandingColor')->name('landingcolor');
            //Route::post('/colores', 'StudController@setSliders')->name('landingcolor');
            Route::group(['prefix' => 'front'], function () {
                Route::group(['prefix' => 'users'], function () {
                    Route::post('/list', 'UserController@listusers')->name('city.index');
                    Route::post('/getinfo', 'UserController@getinfo')->name('city.indexinfo');
                });
            });
            /*
                    Route::group(['prefix' => "Ciudad"], function () {
                        Route::resource('/', 'CityController');
                        Route::get('/', 'CityController@index')->name('city.index');
                        Route::get('/Nuevo', 'CityController@create')->name('city.create');
                        Route::get('/Ver/{id?}', 'CityController@show')->name('city.show');
                        Route::get('/Editar/{id?}', 'CityController@edit')->name('city.edit');
                    });
                    Route::group(['prefix' => "color"], function () {
                        Route::resource('/', 'ColorController');
                        Route::get('/', 'ColorController@index')->name('color.index');
                        Route::get('/Nuevo', 'ColorController@create')->name('color.create');
                        Route::get('/Ver/{id?}', 'ColorController@show')->name('color.show');
                        Route::get('/Editar/{id?}', 'ColorController@edit')->name('color.edit');
                    });
                    Route::group(['prefix' => "Pasarela"], function () {
                        Route::resource('/', 'GatewayController');
                        Route::get('/', 'GatewayController@index')->name('gateway.index');
                        Route::get('/Nuevo', 'GatewayController@create')->name('gateway.create');
                        Route::get('/Ver/{id?}', 'GatewayController@show')->name('gateway.show');
                        Route::get('/Editar/{id?}', 'GatewayController@edit')->name('gateway.edit');
                    });
                    */
            /*
                    Route::group(['prefix' => "Personal"], function () {
                        Route::resource('/', 'PersonalController');
                        Route::get('/', 'PersonalController@index')->name('personal.index');
                        Route::get('/Nuevo', 'PersonalController@create')->name('personal.create');
                        Route::get('/Ver/{id?}', 'PersonalController@show')->name('personal.show');
                        Route::get('/Editar/{id?}', 'PersonalController@edit')->name('personal.edit');
                    });
            */
            /*
           Route::group(['prefix' => "Estilo"], function () {
               Route::resource('/', 'StyleController');
               Route::get('/', 'StyleController@index')->name('style.index');
               Route::get('/Nuevo', 'StyleController@create')->name('style.create');
               Route::get('/Ver/{id?}', 'StyleController@show')->name('style.show');
               Route::get('/Editar/{id?}', 'StyleController@edit')->name('style.edit');
           });
    */
            /*
            Route::group(['prefix' => "Usuario"], function () {
                Route::resource('/', 'UserController');
                Route::get('/', 'UserController@index')->name('users.index');
                Route::get('/Nuevo', 'UserController@create')->name('users.create');
                Route::get('/Ver/{id?}', 'UserController@show')->name('users.show');
                Route::get('/Editar/{id?}', 'UserController@edit')->name('users.edit');
                Route::post('save', 'UserController@store')->name('users.save');
            });
    */
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.pais')], function () {
                Route::resource('/', 'CountryController');


                Route::get(LaravelLocalization::transRoute('rutas_admin.country.index'), 'CountryController@index')->name('country.index');
                Route::post(LaravelLocalization::transRoute('rutas_admin.country.change'), 'CountryController@SetPrimary')->name('country.change');
                Route::get(LaravelLocalization::transRoute('rutas_admin.country.create'), 'CountryController@create')->name('country.create');
                Route::get(LaravelLocalization::transRoute('rutas_admin.country.show'), 'CountryController@show')->name('country.show');
                Route::get(LaravelLocalization::transRoute('rutas_admin.country.edit'), 'CountryController@edit')->name('country.edit');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.Caball')], function () {
                //Route::resource('/', 'HorseController');
                Route::group(['middleware' => 'Compresion'], function () {
                    Route::get(LaravelLocalization::transRoute('rutas_admin.caballoc.index'), 'HorseController@index')->name('caballoc.index');
                    Route::get(LaravelLocalization::transRoute('rutas_admin.cliente.horse.indexjs'), 'HorseController@IndexJs')->name('cliente.horse.indexjs');
                    Route::get(LaravelLocalization::transRoute('rutas_admin.cliente.horse.indexcss'), 'HorseController@IndexCss')->name('cliente.horse.indexcss');
                    Route::get(LaravelLocalization::transRoute('rutas_admin.horse.edit'), 'HorseController@edit2')->name('horse.edit');
                    Route::get(LaravelLocalization::transRoute('rutas_admin.horseEditJs'), 'HorseController@HorseEditJs')->name('horseEditJs');
                });
                Route::post(LaravelLocalization::transRoute('rutas_admin.caballoc.fav'), 'HorseController@setFav')->name('caballoc.fav');
                Route::post(LaravelLocalization::transRoute('rutas_admin.caballoc.del'), 'HorseController@Borrar')->name('caballoc.del');
                Route::get(LaravelLocalization::transRoute('rutas_admin.caballoc.n2'), 'HorseController@create2')->name('caballoc.n2');
                Route::get(LaravelLocalization::transRoute('rutas_admin.horse.create'), 'HorseController@create2')->name('horse.create');
                Route::get(LaravelLocalization::transRoute('rutas_admin.caballoc.e2'), 'HorseController@edit2')->name('caballoc.e2');
                Route::post(LaravelLocalization::transRoute('rutas_admin.caballoc.s2'), 'HorseController@save2')->name('caballoc.s2');
                Route::post(LaravelLocalization::transRoute('rutas_admin.caballoc.se2'), 'HorseController@update2')->name('caballoc.se2');
                //Route::get('/l2', 'HorseController@index2')->name('horse2.index');
                //Route::get('/Nuevo', 'HorseController@create')->name('horse.create');
                Route::post(LaravelLocalization::transRoute('rutas_admin.horse.store'), 'HorseController@store')->name('horse.store');
                Route::post(LaravelLocalization::transRoute('rutas_admin.horse.update'), 'HorseController@update')->name('horse.update');
                Route::post(LaravelLocalization::transRoute('rutas_admin.horse.vendido'), 'HorseController@Vendido')->name('horse.vendido');
                Route::get(LaravelLocalization::transRoute('rutas_admin.horse.show'), 'HorseController@show')->name('horse.show');
                //Route::get('/Editar/{id?}', 'HorseController@edit')->name('horse.edit');
                Route::post(LaravelLocalization::transRoute('rutas_admin.horse.sendmail'), 'ExportarController@EnviarUnico')->name('horse.sendmail');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.Face')], function () {
                Route::get(LaravelLocalization::transRoute('rutas_admin.CalendarFacebookJs'), 'PublicController@RetornaJsFaceCalendar')->name('CalendarFacebookJs');
                route::get(LaravelLocalization::transRoute('rutas_admin.TimeZone'), 'Functions@ObtenerTimeZone')->name('TimeZone');
                Route::get(LaravelLocalization::transRoute('rutas_admin.ObtenerPagina'), 'FacebookController@MostrarPanelFacebook')->name('ObtenerPagina');// Borrar
                Route::post(LaravelLocalization::transRoute('rutas_admin.ProgramarPublicacion'), 'FacebookController@ProgramarPublicacion')->name('ProgramarPublicacion');// Borrar
                Route::get(LaravelLocalization::transRoute('rutas_admin.MisPaginas'), 'FacebookController@ListarPaginas')->name('MisPaginas');// Borrar
                Route::post(LaravelLocalization::transRoute('rutas_admin.MisPaginasPost'), 'FacebookController@GuardarDatosPagina')->name('MisPaginasPost');// Borrar
                Route::post(LaravelLocalization::transRoute('rutas_admin.BorrarPost'), 'FacebookController@BorrarPost')->name('BorrarPost');// Borrar
                Route::get(LaravelLocalization::transRoute('rutas_admin.privacidadl'), 'FacebookController@Privacidad')->name('privacidadl');// Borrar
                Route::post(LaravelLocalization::transRoute('rutas_admin.BorrarDatosFb'), 'FacebookController@BorrarDatosFb')->name('BorrarDatosFb');// Borrar
                Route::post(LaravelLocalization::transRoute('rutas_admin.ConfigurarPublicacion'), 'FacebookController@ConfiguracionProgramaciones')->name('ConfigurarPublicacion');// Borrar
                Route::get(LaravelLocalization::transRoute('rutas_admin.AutorizacionFacebook'), 'FacebookController@SolicitarAutorizacion')->name('AutorizacionFacebook');// Borrar
                Route::get(LaravelLocalization::transRoute('rutas_admin.Obten'), 'FacebookController@ObtenerPagina')->name('Obten');// Borrar

                //Route::resource('/', 'GalleryController');
                //Route::get('/', 'GalleryController@index')->name('gallery.index');
                //Route::get('/Nuevo', 'GalleryController@create')->name('gallery.create');
                //Route::get('/Ver/{id?}', 'GalleryController@show')->name('gallery.show');
                //Route::get('/Editar/{id?}', 'GalleryController@edit')->name('gallery.edit');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.desing')], function () {
                Route::get(LaravelLocalization::transRoute('rutas_admin.gallery.index'), 'GalleryController@index2')->name('gallery.index');// Borrar
                Route::group(['middleware' => 'Compresion'], function () {
                    Route::get(LaravelLocalization::transRoute('rutas_admin.gallery.indexcss'), 'GalleryController@RetornaCssGallery')->name('gallery.indexcss');// Borrar
                    Route::get(LaravelLocalization::transRoute('rutas_admin.gallery.indexjs'), 'GalleryController@RetornaJsGallery')->name('gallery.indexjs');// Borrar
                });
                Route::get(LaravelLocalization::transRoute('rutas_admin.gallery2.index'), 'GalleryController@index2')->name('gallery2.index');// Borrar
                Route::get(LaravelLocalization::transRoute('rutas_admin.gallery2.index2'), 'GalleryController@index3')->name('gallery2.index2');// Borrar
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.foto')], function () {
                Route::group(['middleware' => 'Compresion'], function () {
                    Route::get(LaravelLocalization::transRoute('rutas_admin.foto.js'), 'PublicController@RetornaJsFoto')->name('foto.js');
                    Route::get(LaravelLocalization::transRoute('rutas_admin.dropfoto.js'), 'PublicController@RetornaJsFotoDropZone')->name('dropfoto.js');
                    Route::resource('/', 'PhotoController');
                    Route::get(LaravelLocalization::transRoute('rutas_admin.photo.index'), 'PhotoController@index')->name('photo.index');
                });
                Route::post(LaravelLocalization::transRoute('rutas_admin.photo.changeorder'), 'PhotoController@ChangeOrder')->name('photo.changeorder');
                Route::get(LaravelLocalization::transRoute('rutas_admin.photo.create'), 'PhotoController@create')->name('photo.create');
                Route::get(LaravelLocalization::transRoute('rutas_admin.photo.show'), 'PhotoController@show')->name('photo.show');
                //Route::get('/Ver', 'PhotoController@show')->name('photo.show');
                Route::get(LaravelLocalization::transRoute('rutas_admin.photo.edit'), 'PhotoController@edit')->name('photo.edit');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.Raza')], function () {
                Route::resource('/', 'RazaController');
                Route::get(LaravelLocalization::transRoute('rutas_admin.raza.index'), 'RazaController@index')->name('raza.index');
                Route::get(LaravelLocalization::transRoute('rutas_admin.raza.create'), 'RazaController@create')->name('raza.create');
                Route::get(LaravelLocalization::transRoute('rutas_admin.raza.show'), 'RazaController@show')->name('raza.show');
                Route::get(LaravelLocalization::transRoute('rutas_admin.raza.edit'), 'RazaController@edit')->name('raza.edit');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.sexo')], function () {
                Route::resource('/', 'SexController');
                Route::get(LaravelLocalization::transRoute('rutas_admin.sex.index'), 'SexController@index')->name('sex.index');
                Route::get(LaravelLocalization::transRoute('rutas_admin.sex.create'), 'SexController@create')->name('sex.create');
                Route::get(LaravelLocalization::transRoute('rutas_admin.sex.show'), 'SexController@show')->name('sex.show');
                Route::get(LaravelLocalization::transRoute('rutas_admin.sex.edit'), 'SexController@edit')->name('sex.edit');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.Estado')], function () {
                Route::resource('/', 'StateController');
                Route::get(LaravelLocalization::transRoute('rutas_admin.state.index'), 'StateController@index')->name('state.index');
                Route::get(LaravelLocalization::transRoute('rutas_admin.state.create'), 'StateController@create')->name('state.create');
                Route::get(LaravelLocalization::transRoute('rutas_admin.state.show'), 'StateController@show')->name('state.show');
                Route::get(LaravelLocalization::transRoute('rutas_admin.state.edit'), 'StateController@edit')->name('state.edit');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.stud')], function () {
                //Route::resource('/', 'StudController');
                //Route::get('/', 'StudController@index')->name('stud.index');
                Route::get(LaravelLocalization::transRoute('rutas_admin.stud.create'), 'StudController@create')->name('stud.create');
                Route::get(LaravelLocalization::transRoute('rutas_admin.stud.js'), 'PublicController@RetornaJsStudJs')->name('stud.js');
                Route::post(LaravelLocalization::transRoute('rutas_admin.stud.store'), 'StudController@store')->name('stud.store');
                //Route::post('/User', 'StudController@NewStud')->name('stud.newuser');
                //Route::get('/Ver/{id?}', 'StudController@show')->name('stud.show');
                //Route::get('/Editar/{id?}', 'StudController@edit')->name('stud.edit');
            });
            //
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.videos')], function () {
                Route::group(['middleware' => 'Compresion'], function () {
                    //Route::get('/js.js', 'PublicController@RetornaJsVideo')->name('video.js');
                    //Route::get('/js.js', 'PublicController@RetornaJsVideo')->name('video.js');
                    Route::get(LaravelLocalization::transRoute('rutas_admin.video.js'), 'PublicController@RetornaJsVideo')->name('video.js');
                    Route::resource('/', 'VideoController');
                    Route::get(LaravelLocalization::transRoute('rutas_admin.video.index'), 'VideoController@index')->name('video.index');
                    //Route::get('/', 'VideoController@index')->name('video.index');
                    Route::get(LaravelLocalization::transRoute('rutas_admin.video.create'), 'VideoController@index')->name('video.create');
                    /*
                    Route::post('/other', 'VideoController@store')->name('video.other');
                Route::get('/Nuevo', 'VideoController@create')->name('video.create');
                Route::get('/Ver/{id?}', 'VideoController@show')->name('video.show');
                Route::get('/Editar/{id?}', 'VideoController@edit')->name('video.edit');
                    */
                });
                Route::post(LaravelLocalization::transRoute('rutas_admin.video.other'), 'VideoController@store')->name('video.other');
                Route::get(LaravelLocalization::transRoute('rutas_admin.video.create'), 'VideoController@create')->name('video.create');
                Route::get(LaravelLocalization::transRoute('rutas_admin.video.show'), 'VideoController@show')->name('video.show');
                Route::get(LaravelLocalization::transRoute('rutas_admin.video.edit'), 'VideoController@edit')->name('video.edit');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.sell')], function () {
                Route::resource('/', 'SellController');
                //Route::get('/', 'SellController@index')->name('sell.index');
                //Route::get('/', 'SellController@index')->name('sell.create');

                Route::get(LaravelLocalization::transRoute('rutas_admin.sell.create'), 'SellController@create')->name('sell.create');
                /*Route::post('/', 'SellController@DatosRango')->name('sell.cambio');*/
                Route::post(LaravelLocalization::transRoute('rutas_adminsell.cambio.'), 'SellController@BusquedaSimple')->name('sell.cambio');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                Route::get(LaravelLocalization::transRoute('rutas_admin.sell.show'), 'SellController@show')->name('sell.show');
                Route::get(LaravelLocalization::transRoute('rutas_admin.sell.edit'), 'SellController@edit')->name('sell.edit');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.soporte')], function () {
                //Route::resource('/', 'SellController');
                Route::get(LaravelLocalization::transRoute('rutas_admin.support.index'), 'PublicController@SoporteUsuario')->name('support.index');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.create');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                //Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                //Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.opciones')], function () {
                //Route::resource('/', 'SellController');
                Route::get(LaravelLocalization::transRoute('rutas_admin.options.index'), 'PublicController@OpcionesUsuario')->name('options.index');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.create');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                //Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                //Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.suscripcion')], function () {
                //Route::resource('/', 'SellController');
                //Route::get('/', 'SuscripcionController@Indice')->name('suscripcion.index');
                Route::get(LaravelLocalization::transRoute('rutas_admin.suscripcion.css'), 'PublicController@RetornaCssPlanes')->name('suscripcion.css');
                Route::get(LaravelLocalization::transRoute('rutas_admin.suscripcion.js'), 'PublicController@RetornaJsPlanes')->name('suscripcion.js');
                Route::get(LaravelLocalization::transRoute('rutas_admin.suscripcion.index'), 'SuscripcionController@Planes1')->name('suscripcion.index');
                //Route::get('/Planes1', 'SuscripcionController@Planes')->name('suscripcion.plan');
                Route::get(LaravelLocalization::transRoute('rutas_admin.suscripcion.plan'), 'SuscripcionController@Planes1')->name('suscripcion.plan');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.create');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                //Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                //Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.notifi')], function () {
                //Route::resource('/', 'SellController');
                Route::get(LaravelLocalization::transRoute('rutas_admin.notifi.index'), 'NotificationsController@index')->name('notifi.index');
                Route::get(LaravelLocalization::transRoute('rutas_admin.notifi.show'), 'NotificationsController@show')->name('notifi.show');
                Route::get(LaravelLocalization::transRoute('rutas_admin.notifi.seen'), 'NotificationsController@MarcarVisto')->name('notifi.seen');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                //Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                //Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.work')], function () {
                //Route::resource('/', 'SellController');
                Route::get(LaravelLocalization::transRoute('rutas_admin.Aplications.index'), 'TrabajoController@GetAplicaStud')->name('Aplications.index');
                Route::get(LaravelLocalization::transRoute('rutas_admin.Aplications.show'), 'TrabajoController@Show')->name('Aplications.show');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                //Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                //Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });
            Route::group(['prefix' => LaravelLocalization::transRoute('rutas_admin.correos')], function () {
                //Route::resource('/', 'SellController');
                Route::group(['middleware' => 'Compresion'], function () {
                    Route::get(LaravelLocalization::transRoute('rutas_admin.MailJs'), 'PublicController@RetornaJsMail')->name('MailJs');
                    Route::get(LaravelLocalization::transRoute('rutas_admin.MailCss'), 'PublicController@RetornaCssMail')->name('MailCss');
                });
                Route::get(LaravelLocalization::transRoute('rutas_admin.exportar.index'), 'ExportarController@Inicio')->name('exportar.index');
                Route::post(LaravelLocalization::transRoute('rutas_admin.exportar.indexpost'), 'ExportarController@ObtenerElementos')->name('exportar.indexpost');
                Route::group(['middleware' => "XFrame"], function () {
                    Route::post(LaravelLocalization::transRoute('rutas_admin.exportar.indexpostpv'), 'ExportarController@ObtenerElementosAjax')->name('exportar.indexpostpv');
                });
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                //Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                //Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });
            Route::post(LaravelLocalization::transRoute('rutas_admin.social.save'), 'SocialNetworkController@store')->name('social.save');

            /*
            Route::get('/jjuufftt159753', function () {
                $d = \App\fake::where('id', '!=', 0)->get();
                foreach ($d as $k => $v) {
                    echo "<strong>" . $v->email . "</strong> Pass: " . $v->pass . "<br>";
                }
                exit();
                //return view('auth.register3');
            });
            */

            Route::post(LaravelLocalization::transRoute('rutas_admin.erase.media'), 'PublicController@EraseMedia')->name('erase.media');
            Route::post(LaravelLocalization::transRoute('rutas_admin.obtenerdatoslider'), 'PublicController@DataSliders')->name('obtenerdatoslider');
            Route::post(LaravelLocalization::transRoute('rutas_admin.setdatoslider'), 'PublicController@SetDataSliders')->name('setdatoslider');
            //Route::get('1mes', 'PaypalController@Pago1mes')->name('1mes');
            Route::get(LaravelLocalization::transRoute('rutas_admin.PagoSuscripcion'), 'PaypalController@Pago1mes')->name('PagoSuscripcion');
            Route::post(LaravelLocalization::transRoute('rutas_admin.PagoSuscripcionPost'), 'PaypalController@Pago1mes')->name('PagoSuscripcionPost');
            /*********/
            /*PAYPAL*/
            /********/
            Route::get('payment', array(
                'as' => 'payment',
                'uses' => 'PaypalController@postPayment',
            ));
            Route::get('payment/status', array(
                'as' => 'payment.status',
                'uses' => 'PaypalController@getPaymentStatus',
            ));
            Route::group(['middleware' => 'Compresion'], function () {
                Route::get(LaravelLocalization::transRoute('rutas_admin.iniciocliente'), 'StudController@IndiceCliente')->name('iniciocliente');
                //Route::get('/', 'StudController@IndiceCliente')->name('iniciocliente');
            });
            //Route::get('testp', 'PaypalController@SaveFakeSuscr');
            //Route::get('testd', 'PaypalController@GetOrdensFake');
            /*********/
            /*PAYPAL*/
            /********/
            Route::get(LaravelLocalization::transRoute('rutas_admin.PruebaMarca'), 'MailController@FormatoMasivo')->name('PruebaMarca');
        });

        //LaravelLocalization::transRoute('rutas_admin.')
        Route::group(['middleware' => 'Compresion'], function () {
            //Route::post('CaballoIndex.json', 'TablasController@AdminHorses')->name('HorsesIndexAdmin');
            Route::get(LaravelLocalization::transRoute('rutas_admin.HorsesIndexAdmin'), 'TablasController@AdminHorses')->name('HorsesIndexAdmin');
            Route::get(LaravelLocalization::transRoute('rutas_admin.VideosIndexAdmin'), 'TablasController@Videos')->name('VideosIndexAdmin');
        });
        Route::get(LaravelLocalization::transRoute('rutas_admin.FotosIndexAdmin'), 'TablasController@Fotos')->name('FotosIndexAdmin');
    });
});
