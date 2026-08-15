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

use App\Http\Controllers\StudController;

$host = "horse.ingcarlosalvarado.com.ve";




Route::get('/limpiar', function () {
    //$exitCode = Artisan::call('route:cache');
    //echo '<h1>Limpiando cache</h1><br>';
    $exitCode = Artisan::call('route:clear');
    echo '<h1>Limpiando Ruta</h1><br>';
    $exitCode = Artisan::call('view:clear');
    echo '<h1>Limpiando Vista</h1><br>';
    $exitCode = Artisan::call('config:cache');
    echo '<h1>Limpiando Configuracion</h1><br>';
    $exitCode = Artisan::call('optimize');
    echo '<h1>Optimizando</h1><br>';
    return '<h1>Reoptimized class loader</h1>';
});
/*
Route::get('/dashboard', function () {
    //return view('landing.welcome');
    return view('layouts.base');
});
Route::get('/landing', function () {
    return view('landing.maxima');
});
*/
/*Tema temporal http://foxythemes.net/preview/products/maisonnette/?theme=blue-sky*/

/*Ruta publica*/
Route::post('cliente/paises', 'PublicController@Paises')->name('cliente.country.ajax');
Route::post('cliente/provincia', 'PublicController@Estados')->name('cliente.state.ajax');
Route::post('cliente/ciudad', 'PublicController@Ciudades')->name('cliente.city.ajax');
/*Ruta publica*/

Route::group(['prefix' => 'Cliente'], function () {
    /*Id actualmente es solo el id de usuario, este pasara a ser un tipo slug*/
    Route::get('/{id?}', 'StudController@ClientDetail')->name('cliente.MyPage');
    Route::get('/{id?}/Contacto', 'StudController@ClientContact')->name('cliente.MyContact');
    Route::get('/{id?}/Galeria', 'StudController@ClientGallery')->name('cliente.MyGallery');
    Route::get('/{id?}/Caballos/{type?}', 'StudController@ClientHorses')->name('cliente.MyHorses');
    Route::get('/{id?}/Instalaciones', 'StudController@ClientInstalation')->name('cliente.MyInstalation');
    Route::get('/{id?}/Ventas', 'StudController@ClientSell')->name('cliente.MySell');
    Route::get('/luis/{id?}', 'StudController@luis')->name('cliente.MyPage2');/*Borrar*/
});
Route::group(['domain' => "$host", 'middleware' => 'Autentificado', 'prefix' => 'panel'], function () {

    Route::get('/MiPerfil', 'UserController@profile')->name('cliente.user.profile');
    Route::post('/MiPerfil', 'UserController@profileupdate')->name('cliente.user.profile.update');
    Route::group(['prefix' => 'front'], function () {
        Route::group(['prefix' => 'users'], function () {
            Route::post('/list', 'UserController@listusers')->name('cliente.city.index');
            Route::post('/getinfo', 'UserController@getinfo')->name('cliente.city.info');
        });
    });
    Route::group(['prefix' => "Ciudad"], function () {
        Route::resource('/', 'CityController');
        Route::get('/', 'CityController@index')->name('cliente.city.index');
        Route::get('/Nuevo', 'CityController@create')->name('cliente.city.create');
        Route::get('/Ver/{id?}', 'CityController@show')->name('cliente.city.show');
        Route::get('/Editar/{id?}', 'CityController@edit')->name('cliente.city.edit');
    });

    Route::group(['prefix' => "color"], function () {
        Route::resource('/', 'ColorController');
        Route::get('/', 'ColorController@index')->name('cliente.color.index');
        Route::get('/Nuevo', 'ColorController@create')->name('cliente.color.create');
        Route::get('/Ver/{id?}', 'ColorController@show')->name('cliente.color.show');
        Route::get('/Editar/{id?}', 'ColorController@edit')->name('cliente.color.edit');
    });

    Route::group(['prefix' => "Pais"], function () {
        Route::resource('/', 'CountryController');
        Route::get('/', 'CountryController@index')->name('cliente.country.index');
        Route::get('/Nuevo', 'CountryController@create')->name('cliente.country.create');
        Route::get('/Ver/{id?}', 'CountryController@show')->name('cliente.country.show');
        Route::get('/Editar/{id?}', 'CountryController@edit')->name('cliente.country.edit');
    });


    Route::group(['prefix' => "Pasarela"], function () {
        Route::resource('/', 'GatewayController');
        Route::get('/', 'GatewayController@index')->name('cliente.gateway.index');
        Route::get('/Nuevo', 'GatewayController@create')->name('cliente.gateway.create');
        Route::get('/Ver/{id?}', 'GatewayController@show')->name('cliente.gateway.show');
        Route::get('/Editar/{id?}', 'GatewayController@edit')->name('cliente.gateway.edit');
    });
    Route::group(['prefix' => "Caballos"], function () {
        Route::resource('/', 'HorseController');
        Route::get('/', 'HorseController@index')->name('cliente.horse.index');
        Route::get('/index.js', 'HorseController@IndexJs')->name('cliente.horse.indexjs');
        Route::get('/index.css', 'HorseController@IndexCss')->name('cliente.horse.indexcss');

        Route::get('/l2', 'HorseController@index2')->name('cliente.horse2.index');
        Route::get('/Nuevo', 'HorseController@create')->name('cliente.horse.create');
        Route::post('/Nuevo', 'HorseController@store')->name('cliente.horse.store');
        Route::get('/Ver/{id?}', 'HorseController@show')->name('cliente.horse.show');
        Route::get('/Editar/{id?}', 'HorseController@edit')->name('cliente.horse.edit');
    });

    Route::group(['prefix' => "Pagos"], function () {
        Route::resource('/', 'GalleryController');
        Route::get('/', 'GalleryController@index')->name('cliente.gallery.index');
        Route::get('/Nuevo', 'GalleryController@create')->name('cliente.gallery.create');
        Route::get('/Ver/{id?}', 'GalleryController@show')->name('cliente.gallery.show');
        Route::get('/Editar/{id?}', 'GalleryController@edit')->name('cliente.gallery.edit');
    });

    Route::group(['prefix' => "Personal"], function () {
        Route::resource('/', 'PersonalController');
        Route::get('/', 'PersonalController@index')->name('cliente.personal.index');
        Route::get('/Nuevo', 'PersonalController@create')->name('cliente.personal.create');
        Route::get('/Ver/{id?}', 'PersonalController@show')->name('cliente.personal.show');
        Route::get('/Editar/{id?}', 'PersonalController@edit')->name('cliente.personal.edit');
    });

    Route::group(['prefix' => "fotos"], function () {
        Route::resource('/', 'PhotoController');
        Route::get('/', 'PhotoController@index')->name('cliente.photo.index');
        Route::get('/Nuevo', 'PhotoController@create')->name('cliente.photo.create');
        Route::get('/Ver/{id?}', 'PhotoController@show')->name('cliente.photo.show');
        //Route::get('/Ver', 'PhotoController@show')->name('cliente.photo.show');
        Route::get('/Editar/{id?}', 'PhotoController@edit')->name('cliente.photo.edit');
    });

    Route::group(['prefix' => "Raza"], function () {
        Route::resource('/', 'RazaController');
        Route::get('/', 'RazaController@index')->name('cliente.raza.index');
        Route::get('/Nuevo', 'RazaController@create')->name('cliente.raza.create');
        Route::get('/Ver/{id?}', 'RazaController@show')->name('cliente.raza.show');
        Route::get('/Editar/{id?}', 'RazaController@edit')->name('cliente.raza.edit');
    });

    Route::group(['prefix' => "Sexo"], function () {
        Route::resource('/', 'SexController');
        Route::get('/', 'SexController@index')->name('cliente.sex.index');
        Route::get('/Nuevo', 'SexController@create')->name('cliente.sex.create');
        Route::get('/Ver/{id?}', 'SexController@show')->name('cliente.sex.show');
        Route::get('/Editar/{id?}', 'SexController@edit')->name('cliente.sex.edit');
    });

    Route::group(['prefix' => "Estado"], function () {
        Route::resource('/', 'StateController');
        Route::get('/', 'StateController@index')->name('cliente.state.index');
        Route::get('/Nuevo', 'StateController@create')->name('cliente.state.create');
        Route::get('/Ver/{id?}', 'StateController@show')->name('cliente.state.show');
        Route::get('/Editar/{id?}', 'StateController@edit')->name('cliente.state.edit');
    });

    Route::group(['prefix' => "Yeguada"], function () {
        Route::resource('/', 'StudController');
        Route::get('/', 'StudController@index')->name('cliente.stud.index');

        Route::get('/Nuevo', 'StudController@create')->name('cliente.stud.create');
        Route::post('/Nuevo', 'StudController@store')->name('cliente.stud.store');
        Route::get('/Ver/{id?}', 'StudController@show')->name('cliente.stud.show');
        Route::get('/Editar/{id?}', 'StudController@edit')->name('cliente.stud.edit');
    });
    Route::group(['prefix' => "Estilo"], function () {
        Route::resource('/', 'StyleController');
        Route::get('/', 'StyleController@index')->name('cliente.style.index');
        Route::get('/Nuevo', 'StyleController@create')->name('cliente.style.create');
        Route::get('/Ver/{id?}', 'StyleController@show')->name('cliente.style.show');
        Route::get('/Editar/{id?}', 'StyleController@edit')->name('cliente.style.edit');
    });

    Route::group(['prefix' => "Usuario"], function () {
        Route::resource('/', 'UserController');
        Route::get('/', 'UserController@index')->name('cliente.users.index');
        Route::get('/Nuevo', 'UserController@create')->name('cliente.users.create');
        Route::get('/Ver/{id?}', 'UserController@show')->name('cliente.users.show');
        Route::get('/Editar/{id?}', 'UserController@edit')->name('cliente.users.edit');
        Route::post('save', 'UserController@store')->name('cliente.users.save');
    });

    Route::group(['prefix' => "Videos"], function () {
        Route::resource('/', 'VideoController');
        Route::get('/', 'VideoController@index')->name('cliente.video.index');
        Route::get('/Nuevo', 'VideoController@create')->name('cliente.video.create');
        Route::get('/Ver/{id?}', 'VideoController@show')->name('cliente.video.show');
        Route::get('/Editar/{id?}', 'VideoController@edit')->name('cliente.video.edit');
    });
    Route::group(['prefix' => "Ventas"], function () {
        Route::resource('/', 'SellController');
        Route::get('/', 'SellController@index')->name('cliente.sell.index');
        Route::get('/Nuevo', 'SellController@create')->name('cliente.sell.create');
        Route::get('/Ver/{id?}', 'SellController@show')->name('cliente.sell.show');
        Route::get('/Editar/{id?}', 'SellController@edit')->name('cliente.sell.edit');
    });
});
Route::group(array('domain' => "$host"), function () {
    // Auth::routes();
    Route::get('/cliente/home', 'HomeController@index')->name('cliente.home');
    Route::get('/', function () {
        return redirect()->route('home');
        //return view('welcome');
    });

    Route::get('/landing', function () {
        return redirect()->route('home');
        //return view('welcome');
    });
    Route::post('/register', 'Auth\RegisterController@register')->name('cliente.registerpost');


    Route::get('/login1', function () {
        return view('auth.login');
    })->name('cliente.login1');
    Route::get('/login2', function () {
        return view('auth.login2');
    })->name('cliente.login2');
    Route::get('/login3', function () {
        return view('auth.login3');
    })->name('cliente.login3');

    Route::get('/register1', function () {
        return view('auth.register');
    })->name('cliente.register1');
    Route::get('/register2', function () {
        return view('auth.register2');
    })->name('cliente.register2');
    Route::get('/register3', function () {
        return view('auth.register3');
    })->name('cliente.register3');
    /*Ajustar las rutas para los tipo de login y los registros*/


});


Route::group(array('domain' => "{account}.$host"), function () {
    /*
    Route::get('/', function ($account) {
        // ...
        echo "$account";
        exit();
        return Redirect::to("https://$host" . '/' . $account);
    });
    Route::get('/home', function ($account) {
        // ...
        echo "$account";
        exit();
        return Redirect::to("https://$host" . '/' . $account);
    });
*/
    Route::get('/', function ($account) {
        // ...
        dd($account);
        $s = new StudController($account);
        return $s->ClientDetail($account);
        Route::get('/', 'StudController@ClientDetail')->name('cliente.MyPage')->setParameter('account',$account);

    });
    //Route::get('/', 'StudController@ClientDetail')->name('cliente.MyPage')->setParameter('account',$account);
    Route::get('/Contacto', 'StudController@ClientContact')->name('cliente.MyContact');
    Route::get('/Galeria', 'StudController@ClientGallery')->name('cliente.MyGallery');
    Route::get('/Caballos/{type?}', 'StudController@ClientHorses')->name('cliente.MyHorses');
    Route::get('/Instalaciones', 'StudController@ClientInstalation')->name('cliente.MyInstalation');
    Route::get('/Ventas', 'StudController@ClientSell')->name('cliente.MySell');
    Route::get('/luis', 'StudController@luis')->name('cliente.MyPage2');/*Borrar*/

});
