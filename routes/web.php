<?php

use Illuminate\Support\Facades\Route;

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


//------------------------- Logica registro ---------------------------------

Route::get('/register', [UsersController::class, 'showRegister'])->name('register');
Route::post('/register',[UsersController::class, 'register']);

// -----------------------------------------------------------------------
Route::get('nav', function () {
    return view('nav/index');
});

Route::resource('rider', RidersController::class);

Route::resource('provider', ProviderController::class);

//Route::get('provider/{provider}', [ProviderController::class, 'show']);