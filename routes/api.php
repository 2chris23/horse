<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
/*
Route::get('/test',function(Request $request){
    \Log::critical('Entrando en test revisa');
   dd($request->all());
});
*/


Route::get('/testa/{$id}', function (Request $request) {
    \Log::critical('Entrando en test revisa por post');
    $s = $request->all();
    \Log::critical($s);
    return json_encode($s);
    //->middleware('ApiV2')
//})->middleware('ApiV2');
});

Route::get('/test/{$email}', function (Request $request) {
    \Log::critical('Entrando en test revisa por post');
    $s = $request->all();
    \Log::critical($s);
    return json_encode($s);
    //->middleware('ApiV2')
})->middleware('ApiV2');
//});
