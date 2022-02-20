<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\GrupoCompraController;
use App\Http\Controllers\GrupoVentaController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('producto', ProductoController::class);
Route::apiResource('compra', CompraController::class);
Route::apiResource('venta', VentaController::class);
Route::apiResource('grupoCompra', GrupoCompraController::class);
Route::apiResource('grupoVenta', GrupoVentaController::class);



Route::group(['prefix' => 'producto', 'middleware' => 'guest'], function () {
    Route::post('/resumenVentas', [ProductoController::class, 'resumenVentas']);
    Route::post('/buscarProducto', [ProductoController::class, 'buscarProducto']);
});

Route::group(['prefix' => 'grupoCompra', 'middleware' => 'guest'], function () {
    Route::post('/storeConCompras', [GrupoCompraController::class, 'storeConCompras']);
});
