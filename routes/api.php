<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Api\ProviderController;
use App\Http\Controllers\Api\ProviderMenusController;
use App\Http\Controllers\Api\CollectionController;
use App\Http\Controllers\Api\DeliveriesController;
use App\Http\Controllers\Api\BeneficiaryController;


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
Route::get('provider/{provider}/collections', [ProviderController::class, 'Collections']);
Route::apiResource('user', UsersController::class);

Route::apiResource('collection', CollectionController::class);
Route::apiResource('delivery', DeliveriesController::class);
Route::apiResource('beneficiary', BeneficiaryController::class);
Route::apiResource('providerMenus', ProviderMenusController::class);




