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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/activarCuenta', 'ActivarCuentaController@activarCuenta');
Route::get('/activarCuentaSMS', 'ActivarCuentaController@activarCuentaSMS');
//api de otros pagos
Route::group(['prefix'=>'otrospagos'], function(){
    Route::post('condeu01','OtrosPagosController@condeu01req');
    Route::post('notpag01','OtrosPagosController@notpag01req');
    Route::post('revpag01','OtrosPagosController@revpag01req');
});
