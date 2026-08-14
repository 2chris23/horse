<?php
Route::group(['ttl' => 60,

], function () {
    Route::group(['middleware' => 'Autentificado'], function () {
        Route::get('/icofb.css', 'HomeController@RetornaCssFacebookIcon')->name('CssFbIcon');
        Route::group(['middleware' => 'Compresion'], function () {
            Route::get('/fullcalendar.js', 'PublicController@RetornaJsFullCalebdar')->name('FullCalendar.js');
            route::get('mundialprice/{slug?}', 'PublicController@MonedasCaballo')->name('MonedaCaballoAdmin');
            route::get('mundialcub/{slug?}', 'PublicController@CubricionCaballo')->name('CubricionCaballoAdmin');
            route::get('getprice/{slug?}', 'PublicController@ObtenerPrecioCaballo')->name('ObtenerPrecioCaballoAdmin');
            route::post('getprice', 'PublicController@ObtenerPrecioCaballos')->name('ObtenerPrecioCaballosAdmin');
            route::post('getcubris', 'PublicController@ObtenerCubricionesCaballos')->name('ObtenerCubricionCaballosAdmin');
            route::post('getpricetool', 'PublicController@ObtenerPreciosCaballos')->name('ObtenerPreciosCaballosAdmin');
            route::post('getcubritool', 'PublicController@ObtenerCubricionesCaballos')->name('ObtenerCubricionesCaballosAdmin');
            Route::get('/js/panel.js', 'PublicController@RetornaJsPanel')->name('PanelJs');
            Route::get('/css/panel.css', 'PublicController@RetornaCssPanel')->name('PanelCss');
            Route::get('/js/datepicker.js', 'PublicController@RetornaJsTime')->name('TimeJs');
            Route::get('/css/datepicker.css', 'PublicController@RetornaCssTime')->name('TimeCss');
        });
        Route::get('/MiPerfil', 'UserController@profile')->name('user.profile');
        Route::post('/MiPerfil', 'UserController@profileupdate')->name('user.profile.update');
        Route::post('/psw', 'UserController@CambioPsw')->name('user.psw');
        Route::post('/Themes', 'PlantillasController@Cambiar')->name('ThemesPost');
        Route::post('/preparafb', 'PublicController@PrepararCaballo')->name('PrepaFb');
        Route::get('export/{slug?}', 'ExportarController@ExportarAnuncio')->name('exportar.caballo');;
        Route::group(['middleware' => 'Firstlog'], function () {
            Route::post('/SEO', 'StudController@Seo')->name('stud.seo');
            Route::post('/CHAT', 'StudController@chateo')->name('stud.chateo');
            Route::post('/HF', 'StudController@headfoot')->name('stud.headfoot');
            Route::post('/Clr', 'StudController@colorin')->name('stud.colorin');
            Route::post('/Dom', 'StudController@Dominio')->name('stud.domain');
            Route::post('/headimg', 'StudController@ImagenCabecera')->name('stud.ImagenCabecera');
            Route::post('/waterimg', 'StudController@ImagenAgua')->name('stud.ImagenAgua');
            Route::group(['prefix' => "Themes"], function () {
                Route::get('/', 'PlantillasController@Index')->name('Themes');
                Route::get('/js.js', 'PlantillasController@RetornaJsTema')->name('ThemesJs');
                Route::get('/css.css', 'PlantillasController@RetornaCssTema')->name('ThemesCss');
            });
            Route::group(['prefix' => "Contactos"], function () {
                Route::get('/', 'ClientesController@ClientesYeguada')->name('StudClientes.index');
                Route::get('/New', 'ClientesController@ClientesCrearYeguada')->name('StudClientes.crear');
                Route::post('/New', 'ClientesController@ClientesGuardarYeguada')->name('StudClientes.guardar');
                Route::get('/Edit/{id?}', 'ClientesController@ClientesEditarYeguada')->name('StudClientes.edit');
                Route::post('/delete', 'ClientesController@BorrarContacto')->name('StudClientes.delete');
                Route::post('/fav', 'ClientesController@EstablecerFavorito')->name('StudClientes.fav');
            });
            Route::post('/HorseFacebook', 'FacebookController@ObtenerDatoCaballo')->name('FacebookDatoCaballo');
            Route::post('/imagen', 'FileController@Imagen')->name('imagenes');
            Route::post('/img_sliders', 'StudController@setSliders')->name('landingslider');
            Route::post('/img_gallery', 'StudController@setGallery')->name('imgs_gallery');
            Route::post('/img_instalations', 'StudController@imagen_instalations')->name('imgs_instalations');
            Route::post('/colores', 'StudController@setLandingColor')->name('landingcolor');
            Route::group(['prefix' => 'front'], function () {
                Route::group(['prefix' => 'users'], function () {
                    Route::post('/list', 'UserController@listusers')->name('city.index');
                    Route::post('/getinfo', 'UserController@getinfo')->name('city.index');
                });
            });
            Route::group(['prefix' => "Pais"], function () {
                Route::resource('/', 'CountryController');
                Route::get('/', 'CountryController@index')->name('country.index');
                Route::post('/', 'CountryController@SetPrimary')->name('country.change');
                Route::get('/Nuevo', 'CountryController@create')->name('country.create');
                Route::get('/Ver/{id?}', 'CountryController@show')->name('country.show');
                Route::get('/Editar/{id?}', 'CountryController@edit')->name('country.edit');
            });
            Route::group(['prefix' => "Caballos"], function () {
                Route::group(['middleware' => 'Compresion'], function () {
                    Route::get('/', 'HorseController@index')->name('caballoc.index');
                    Route::get('/index.js', 'HorseController@IndexJs')->name('cliente.horse.indexjs');
                    Route::get('/index.css', 'HorseController@IndexCss')->name('cliente.horse.indexcss');
                    Route::get('/Editar/{id?}', 'HorseController@edit2')->name('horse.edit');
                    Route::get('/Editar/{id?}.js', 'HorseController@HorseEditJs')->name('horseEditJs');
                });
                Route::post('/Favorito/{id?}', 'HorseController@setFav')->name('caballoc.fav');
                Route::post('/delete/{id?}', 'HorseController@Borrar')->name('caballoc.del');
                Route::get('/Nuevo2', 'HorseController@create2')->name('caballoc.n2');
                Route::get('/Nuevo', 'HorseController@create2')->name('horse.create');
                Route::get('/Edit2/{id?}', 'HorseController@edit2')->name('caballoc.e2');
                Route::post('/save2', 'HorseController@save2')->name('caballoc.s2');
                Route::post('/Update2/{id?}', 'HorseController@update2')->name('caballoc.se2');
                Route::post('/Nuevo', 'HorseController@store')->name('horse.store');
                Route::post('/Update/{id?}', 'HorseController@update')->name('horse.update');
                Route::post('/vendido/{id?}', 'HorseController@Vendido')->name('horse.vendido');
                Route::get('/Ver/{id?}', 'HorseController@show')->name('horse.show');
                Route::post('/SendByMail', 'ExportarController@EnviarUnico')->name('horse.sendmail');
            });
            Route::group(['prefix' => "Facebook"], function () {
                Route::get('/js/calendar.js', 'PublicController@RetornaJsFaceCalendar')->name('CalendarFacebookJs');
                route::get('/timezone', 'Functions@ObtenerTimeZone')->name('TimeZone');
                Route::get('/', 'FacebookController@MostrarPanelFacebook')->name('ObtenerPagina');// Borrar
                Route::post('/', 'FacebookController@ProgramarPublicacion')->name('ProgramarPublicacion');// Borrar
                Route::get('/MisPaginas', 'FacebookController@ListarPaginas')->name('MisPaginas');// Borrar
                Route::post('/MisPaginas', 'FacebookController@GuardarDatosPagina')->name('MisPaginasPost');// Borrar
                Route::post('/ClearPostUser', 'FacebookController@BorrarPost')->name('BorrarPost');// Borrar
                Route::get('/Privacidad', 'FacebookController@Privacidad')->name('privacidadl');// Borrar
                Route::post('/Delete', 'FacebookController@BorrarDatosFb')->name('BorrarDatosFb');// Borrar
                Route::post('/Config', 'FacebookController@ConfiguracionProgramaciones')->name('ConfigurarPublicacion');// Borrar
                Route::get('/Autoriza', 'FacebookController@SolicitarAutorizacion')->name('AutorizacionFacebook');// Borrar
                Route::get('/Sociales', 'FacebookController@ObtenerPagina')->name('Obten');// Borrar
            });
            Route::group(['prefix' => "Desing"], function () {
                Route::get('/', 'GalleryController@index2')->name('gallery.index');// Borrar
                Route::group(['middleware' => 'Compresion'], function () {
                    Route::get('/css.css', 'GalleryController@RetornaCssGallery')->name('gallery.indexcss');// Borrar
                    Route::get('/js.js', 'GalleryController@RetornaJsGallery')->name('gallery.indexjs');// Borrar
                });
                Route::get('/desing2', 'GalleryController@index2')->name('gallery2.index');// Borrar
                Route::get('/desing33', 'GalleryController@index3')->name('gallery2.index');// Borrar
            });
            Route::group(['prefix' => "fotos"], function () {
                Route::group(['middleware' => 'Compresion'], function () {
                    Route::get('/js.js', 'PublicController@RetornaJsFoto')->name('foto.js');
                    Route::get('/djs.js', 'PublicController@RetornaJsFotoDropZone')->name('dropfoto.js');
                    Route::resource('/', 'PhotoController');
                    Route::get('/', 'PhotoController@index')->name('photo.index');
                });
                Route::post('/CambioOrden', 'PhotoController@ChangeOrder')->name('photo.changeorder');
                Route::get('/Nuevo', 'PhotoController@create')->name('photo.create');
                Route::get('/Ver/{id?}', 'PhotoController@show')->name('photo.show');
                Route::get('/Editar/{id?}', 'PhotoController@edit')->name('photo.edit');
            });
            Route::group(['prefix' => "Raza"], function () {
                Route::resource('/', 'RazaController');
                Route::get('/', 'RazaController@index')->name('raza.index');
                Route::get('/Nuevo', 'RazaController@create')->name('raza.create');
                Route::get('/Ver/{id?}', 'RazaController@show')->name('raza.show');
                Route::get('/Editar/{id?}', 'RazaController@edit')->name('raza.edit');
            });
            Route::group(['prefix' => "Sexo"], function () {
                Route::resource('/', 'SexController');
                Route::get('/', 'SexController@index')->name('sex.index');
                Route::get('/Nuevo', 'SexController@create')->name('sex.create');
                Route::get('/Ver/{id?}', 'SexController@show')->name('sex.show');
                Route::get('/Editar/{id?}', 'SexController@edit')->name('sex.edit');
            });
            Route::group(['prefix' => "Estado"], function () {
                Route::resource('/', 'StateController');
                Route::get('/', 'StateController@index')->name('state.index');
                Route::get('/Nuevo', 'StateController@create')->name('state.create');
                Route::get('/Ver/{id?}', 'StateController@show')->name('state.show');
                Route::get('/Editar/{id?}', 'StateController@edit')->name('state.edit');
            });
            Route::group(['prefix' => "Yeguada"], function () {
                Route::get('/', 'StudController@create')->name('stud.create');
                Route::get('/stud.js', 'PublicController@RetornaJsStudJs')->name('stud.js');
                Route::post('/', 'StudController@store')->name('stud.store');
            });
            Route::group(['prefix' => "Videos"], function () {
                Route::group(['middleware' => 'Compresion'], function () {
                    Route::get('/js.js', 'PublicController@RetornaJsVideo')->name('video.js');
                    Route::resource('/', 'VideoController');
                    Route::get('/', 'VideoController@index')->name('video.index');
                });
                Route::post('/other', 'VideoController@store')->name('video.other');
                Route::get('/Nuevo', 'VideoController@create')->name('video.create');
                Route::get('/Ver/{id?}', 'VideoController@show')->name('video.show');
                Route::get('/Editar/{id?}', 'VideoController@edit')->name('video.edit');
            });
            Route::group(['prefix' => "Venta"], function () {
                Route::resource('/', 'SellController');
                Route::get('/', 'SellController@create')->name('sell.create');
                Route::post('/', 'SellController@BusquedaSimple')->name('sell.cambio');
                Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });
            Route::group(['prefix' => "Soporte"], function () {
                Route::get('/', 'PublicController@SoporteUsuario')->name('support.index');
            });
            Route::group(['prefix' => "Opciones"], function () {
                Route::get('/', 'PublicController@OpcionesUsuario')->name('options.index');
            });
            Route::group(['prefix' => "Suscripcion"], function () {
                Route::get('/css.css', 'PublicController@RetornaCssPlanes')->name('suscripcion.css');
                Route::get('/js.js', 'PublicController@RetornaJsPlanes')->name('suscripcion.js');
                Route::get('/', 'SuscripcionController@Planes1')->name('suscripcion.index');
                Route::get('/Planes', 'SuscripcionController@Planes1')->name('suscripcion.plan');
            });
            Route::group(['prefix' => "Notification"], function () {
                Route::get('/', 'NotificationsController@index')->name('notifi.index');
                Route::get('/Show/{id?}', 'NotificationsController@show')->name('notifi.show');
                Route::get('/Seen/{notification?}', 'NotificationsController@MarcarVisto')->name('notifi.seen');
            });
            Route::group(['prefix' => "Works"], function () {
                Route::get('/', 'TrabajoController@GetAplicaStud')->name('Aplications.index');
                Route::get('/Show/{id?}', 'TrabajoController@Show')->name('Aplications.show');
            });
            Route::group(['prefix' => "Correos"], function () {
                Route::group(['middleware' => 'Compresion'], function () {
                    Route::get('/js.js', 'PublicController@RetornaJsMail')->name('MailJs');
                    Route::get('/css.css', 'PublicController@RetornaCssMail')->name('MailCss');
                });
                Route::get('/', 'ExportarController@Inicio')->name('exportar.index');
                Route::post('/', 'ExportarController@ObtenerElementos')->name('exportar.indexpost');
                Route::group(['middleware' => "XFrame"], function () {
                    Route::post('/PW', 'ExportarController@ObtenerElementosAjax')->name('exportar.indexpostpv');
                });
            });
            Route::post('/social', 'SocialNetworkController@store')->name('social.save');
            Route::post('bye', 'PublicController@EraseMedia')->name('erase.media');
            Route::post('SlidersData/{id?}', 'PublicController@DataSliders')->name('obtenerdatoslider');
            Route::post('SetTittle/{id?}', 'PublicController@SetDataSliders')->name('setdatoslider');
            //Route::get('1mes', 'PaypalController@Pago1mes')->name('1mes');
            Route::get('PagoSuscripcion/{mnt?}', 'PaypalController@Pago1mes')->name('PagoSuscripcion');
            Route::post('PagoSuscripcion', 'PaypalController@Pago1mes')->name('PagoSuscripcionPost');
            Route::get('payment', array(
                'as' => 'payment',
                'uses' => 'PaypalController@postPayment',
            ));
            Route::get('payment/status', array(
                'as' => 'payment.status',
                'uses' => 'PaypalController@getPaymentStatus',
            ));
            Route::group(['middleware' => 'Compresion'], function () {
                Route::get('/home', 'StudController@IndiceCliente')->name('iniciocliente');
            });
            Route::get('MarcaPrueba', 'MailController@FormatoMasivo')->name('PruebaMarca');
        });
        Route::group(['middleware' => 'Compresion'], function () {
            Route::get('CaballoIndex.json', 'TablasController@AdminHorses')->name('HorsesIndexAdmin');
            Route::get('Videos.json', 'TablasController@Videos')->name('VideosIndexAdmin');
        });
        Route::get('Fotos.json', 'TablasController@Fotos')->name('FotosIndexAdmin');
    });
});