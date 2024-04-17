<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\ProviderController;
use App\Http\Controllers\Api\CollectionController;


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

Route::apiResource('provider', ProviderController::class);
Route::apiResource('user', UsersController::class);

Route::apiResource('collection', CollectionController::class);
Route::apiResource('delivery', DeliveryController::class);


