<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::middleware('auth:api')->group(function () {

    Route::resource('trabajadoras','App\Http\Controllers\Api\TrabajadorasController');

    });
Route::post('login', ['App\Http\Controllers\Api\UserController'::class,'login']);

