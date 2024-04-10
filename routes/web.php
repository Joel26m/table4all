<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RidersController;
use App\Http\Controllers\ProviderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('nav', function () {
    return view('nav/index');
});

Route::resource('rider', RidersController::class);

Route::resource('provider', ProviderController::class);

//Route::get('provider/{provider}', [ProviderController::class, 'show']);