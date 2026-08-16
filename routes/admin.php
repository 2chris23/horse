<?php
Route::group(['ttl' => 60,
    'prefix' => (app()->bound('request') ? LaravelLocalization::setLocale() : '') . "/panel/",
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
            Route::get('/fullcalendar.js', 'PublicController@RetornaJsFullCalebdar')->name('FullCalendar.js');
            route::get('mundialprice/{slug?}', 'PublicController@MonedasCaballo')->name('MonedaCaballoAdmin');
            route::get('mundialcub/{slug?}', 'PublicController@CubricionCaballo')->name('CubricionCaballoAdmin');
            route::get('getprice/{slug?}', 'PublicController@ObtenerPrecioCaballo')->name('ObtenerPrecioCaballoAdmin');
            route::post('getprice', 'PublicController@ObtenerPrecioCaballos')->name('ObtenerPrecioCaballosAdmin');
            route::post('getcubris', 'PublicController@ObtenerCubricionesCaballos')->name('ObtenerCubricionCaballosAdmin');
            Route::get('/js/panel.js', 'PublicController@RetornaJsPanel')->name('PanelJs');
            Route::get('/css/panel.css', 'PublicController@RetornaCssPanel')->name('PanelCss');


            Route::get('/js/datepicker.js', 'PublicController@RetornaJsTime')->name('TimeJs');

            Route::get('/css/datepicker.css', 'PublicController@RetornaCssTime')->name('TimeCss');
        });

        //});

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
            //Route::post('/colores', 'StudController@setSliders')->name('landingcolor');
            Route::group(['prefix' => 'front'], function () {
                Route::group(['prefix' => 'users'], function () {
                    Route::post('/list', 'UserController@listusers')->name('city.index');
                    Route::post('/getinfo', 'UserController@getinfo')->name('city.index');
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
            Route::group(['prefix' => "Pais"], function () {
                Route::resource('/', 'CountryController');
                Route::get('/', 'CountryController@index')->name('country.index');
                Route::post('/', 'CountryController@SetPrimary')->name('country.change');
                Route::get('/Nuevo', 'CountryController@create')->name('country.create');
                Route::get('/Ver/{id?}', 'CountryController@show')->name('country.show');
                Route::get('/Editar/{id?}', 'CountryController@edit')->name('country.edit');
            });


            Route::group(['prefix' => "Caballos"], function () {
                //Route::resource('/', 'HorseController');
                Route::group(['middleware' => 'Compresion'], function () {
                    Route::get('/', 'HorseController@index')->name('caballoc.index');
                    Route::get('/index.js', 'HorseController@IndexJs')->name('cliente.horse.indexjs');
                    Route::get('/index.css', 'HorseController@IndexCss')->name('cliente.horse.indexcss');
                    Route::get('/Editar/{id?}', 'HorseController@edit2')->name('horse.edit');
                    Route::get('/Editar/{id?}.js', 'HorseController@HorseEditJs')->name('horseEditJs');
                });


                Route::post('/Favorito/{id?}', 'HorseController@setFav')->name('caballoc.fav');
                Route::post('/delete/{id?}', 'HorseController@Borrar')->name('caballoc.del');
                Route::get('/Nuevo', 'HorseController@create2')->name('horse.create');
                Route::get('/Edit2/{id?}', 'HorseController@edit2')->name('caballoc.e2');
                Route::post('/save2', 'HorseController@save2')->name('caballoc.s2');
                Route::post('/Update2/{id?}', 'HorseController@update2')->name('caballoc.se2');
                //Route::get('/l2', 'HorseController@index2')->name('horse2.index');
                //Route::get('/Nuevo', 'HorseController@create')->name('horse.create');
                Route::post('/Nuevo', 'HorseController@store')->name('horse.store');
                Route::post('/Update/{id?}', 'HorseController@update')->name('horse.update');
                Route::post('/vendido/{id?}', 'HorseController@Vendido')->name('horse.vendido');
                Route::get('/Ver/{id?}', 'HorseController@show')->name('horse.show');
                //Route::get('/Editar/{id?}', 'HorseController@edit')->name('horse.edit');

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
                //Route::resource('/', 'GalleryController');
                //Route::get('/', 'GalleryController@index')->name('gallery.index');
                //Route::get('/Nuevo', 'GalleryController@create')->name('gallery.create');
                //Route::get('/Ver/{id?}', 'GalleryController@show')->name('gallery.show');
                //Route::get('/Editar/{id?}', 'GalleryController@edit')->name('gallery.edit');
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
                //Route::get('/Ver', 'PhotoController@show')->name('photo.show');
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
                //Route::resource('/', 'StudController');
                //Route::get('/', 'StudController@index')->name('stud.index');

                Route::get('/', 'StudController@create')->name('stud.create');
                Route::get('/stud.js', 'PublicController@RetornaJsStudJs')->name('stud.js');
                Route::post('/', 'StudController@store')->name('stud.store');
                //Route::post('/User', 'StudController@NewStud')->name('stud.newuser');
                //Route::get('/Ver/{id?}', 'StudController@show')->name('stud.show');
                //Route::get('/Editar/{id?}', 'StudController@edit')->name('stud.edit');
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
                //Route::get('/', 'SellController@index')->name('sell.index');
                //Route::get('/', 'SellController@index')->name('sell.create');
                Route::get('/', 'SellController@create')->name('sell.create');
                /*Route::post('/', 'SellController@DatosRango')->name('sell.cambio');*/
                Route::post('/', 'SellController@BusquedaSimple')->name('sell.cambio');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });
            Route::group(['prefix' => "Soporte"], function () {
                //Route::resource('/', 'SellController');
                Route::get('/', 'PublicController@SoporteUsuario')->name('support.index');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.create');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                //Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                //Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });
            Route::group(['prefix' => "Opciones"], function () {
                //Route::resource('/', 'SellController');
                Route::get('/', 'PublicController@OpcionesUsuario')->name('options.index');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.create');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                //Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                //Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });
            Route::group(['prefix' => "Suscripcion"], function () {
                //Route::resource('/', 'SellController');
                //Route::get('/', 'SuscripcionController@Indice')->name('suscripcion.index');
                Route::get('/css.css', 'PublicController@RetornaCssPlanes')->name('suscripcion.css');
                Route::get('/js.js', 'PublicController@RetornaJsPlanes')->name('suscripcion.js');

                Route::get('/', 'SuscripcionController@Planes1')->name('suscripcion.index');
                //Route::get('/Planes1', 'SuscripcionController@Planes')->name('suscripcion.plan');
                Route::get('/Planes', 'SuscripcionController@Planes1')->name('suscripcion.plan');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.create');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                //Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                //Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });
            Route::group(['prefix' => "Notification"], function () {
                //Route::resource('/', 'SellController');
                Route::get('/', 'NotificationsController@index')->name('notifi.index');
                Route::get('/Show/{id?}', 'NotificationsController@show')->name('notifi.show');
                Route::get('/Seen/{notification?}', 'NotificationsController@MarcarVisto')->name('notifi.seen');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                //Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                //Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });

            Route::group(['prefix' => "Works"], function () {
                //Route::resource('/', 'SellController');
                Route::get('/', 'TrabajoController@GetAplicaStud')->name('Aplications.index');
                Route::get('/Show/{id?}', 'TrabajoController@Show')->name('Aplications.show');
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                //Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                //Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });
            Route::group(['prefix' => "Correos"], function () {
                //Route::resource('/', 'SellController');
                Route::group(['middleware' => 'Compresion'], function () {
                    Route::get('/js.js', 'PublicController@RetornaJsMail')->name('MailJs');
                    Route::get('/css.css', 'PublicController@RetornaCssMail')->name('MailCss');
                });
                Route::get('/', 'ExportarController@Inicio')->name('exportar.index');
                Route::post('/', 'ExportarController@ObtenerElementos')->name('exportar.indexpost');
                Route::group(['middleware' => "XFrame"], function () {
                    Route::post('/PW', 'ExportarController@ObtenerElementosAjax')->name('exportar.indexpostpv');
                });
                //Route::get('/Nuevo', 'SellController@create')->name('sell.index');
                //Route::get('/Ver/{id?}', 'SellController@show')->name('sell.show');
                //Route::get('/Editar/{id?}', 'SellController@edit')->name('sell.edit');
            });
            Route::post('/social', 'SocialNetworkController@store')->name('social.save');

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
            Route::post('bye', 'PublicController@EraseMedia')->name('erase.media');
            Route::post('SlidersData/{id?}', 'PublicController@DataSliders')->name('obtenerdatoslider');
            Route::post('SetTittle/{id?}', 'PublicController@SetDataSliders')->name('setdatoslider');
            //Route::get('1mes', 'PaypalController@Pago1mes')->name('1mes');
            Route::get('PagoSuscripcion/{mnt?}', 'PaypalController@Pago1mes')->name('PagoSuscripcion');
            Route::post('PagoSuscripcion', 'PaypalController@Pago1mes')->name('PagoSuscripcionPost');
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
                Route::get('/home', 'StudController@IndiceCliente')->name('iniciocliente');
            });
            //Route::get('testp', 'PaypalController@SaveFakeSuscr');
            //Route::get('testd', 'PaypalController@GetOrdensFake');
            /*********/
            /*PAYPAL*/
            /********/
            Route::get('MarcaPrueba', 'MailController@FormatoMasivo')->name('PruebaMarca');
        });
        Route::group(['middleware' => 'Compresion'], function () {
            //Route::post('CaballoIndex.json', 'TablasController@AdminHorses')->name('HorsesIndexAdmin');
            Route::get('CaballoIndex.json', 'TablasController@AdminHorses')->name('HorsesIndexAdmin');

            Route::get('Videos.json', 'TablasController@Videos')->name('VideosIndexAdmin');
        });
        Route::get('Fotos.json', 'TablasController@Fotos')->name('FotosIndexAdmin');


    });
});
