<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;

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


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RidersController;
use App\Http\Controllers\ProviderController;


Route::get('/plantilla', function () {
    
    return view('contenido');
});
Route::get('/', function () {
    
    return view('welcome');
});

Route::resource('rider', RidersController::class);

Route::resource('provider', ProviderController::class);

Route::get('provider/{provider}', [ProviderController::class, 'show']);


//------------------------- Logica login ---------------------------------
Route::get('/login',[UsersController::class, 'showLogin'])->name('login');
Route::post('/login',[UsersController::class, 'login']);
Route::get('/logout',[UsersController::class, 'logout']);


Route::middleware(['auth'])->group(function(){
    Route::get('/home', function (){
        $user = Auth::user();

        return view('home', compact('user'));
    });
});
// -----------------------------------------------------------------------