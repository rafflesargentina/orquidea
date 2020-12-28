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
| Traducción
| Aquí es donde puede registrar rutas API para su aplicación.
| RouteServiceProvider carga estas rutas dentro de un grupo al que se le
| asigna el grupo de middleware "api". ¡Disfruta construyendo tu API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
