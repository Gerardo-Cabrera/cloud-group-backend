<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EntidadeController;
use App\Http\Controllers\PuestosLaboraleController;
use App\Http\Controllers\TrabajadoreController;
use App\Http\Controllers\UsuarioController;
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

Route::middleware('auth:api')->get('/usuarios', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login']);

Route::delete('logout', [LoginController::class, 'logout']);

Route::apiResource('categorias', CategoriaController::class);

Route::apiResource('entidades', EntidadeController::class);

Route::apiResource('puestos-laborales', PuestosLaboraleController::class);

Route::apiResource('trabajadores', TrabajadoreController::class);

Route::apiResource('usuarios', UsuarioController::class);
