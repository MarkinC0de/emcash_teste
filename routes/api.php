<?php

use App\Http\Controllers\CalculateAreaController;
use App\Http\Controllers\RectangleController;
use App\Http\Controllers\TriangleController;
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

Route::controller(RectangleController::class)->group(function () {
    Route::get('/rectangle', 'index');
    Route::post('/rectangle', 'store');
    Route::delete('/rectangle/{rectangle}', 'destroy');
});

Route::controller(TriangleController::class)->group(function () {
    Route::get('/triangle', 'index');
    Route::post('/triangle', 'store');
    Route::delete('/triangle/{triangle}', 'destroy');
});

Route::controller(CalculateAreaController::class)->group(function () {
    Route::get('/calculate-rectangle/{rectangle}', 'calculateAreaRectangle');
    Route::get('/calculate-triangle/{triangle}', 'calculateAreaTriangle');
});