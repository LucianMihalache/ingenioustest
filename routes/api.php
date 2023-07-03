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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(\App\Modules\Invoices\Api\Http\InvoiceController::class)
    ->prefix('/invoice')
    ->group(function () {
        Route::get('/{invoice}', 'show');
        Route::post('/approve/{invoice}', 'approve');
        Route::post('/reject/{invoice}', 'reject');
    });
