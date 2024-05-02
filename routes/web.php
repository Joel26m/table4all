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


use App\Http\Controllers\RidersController;
use App\Http\Controllers\ProviderController;



Route::get('/plantilla', function () {
    
    return view('contenido');
});
Route::get('/', function () {
    
    
    return view('landing');
});

Route::get('/admin', function () {
    
    
    return view('layouts/principal');
});

Route::get('/landing', function () {
    
    return view('landing');
});
Route::resource('rider', RidersController::class);

Route::resource('provider', ProviderController::class);

Route::get('provider/{provider}', [ProviderController::class, 'show']);


//------------------------- Logica login ---------------------------------
Route::get('/login',[UsersController::class, 'showLogin'])->name('login');
Route::post('/login',[UsersController::class, 'login']);
Route::get('/logout',[UsersController::class, 'logout']) ->name('logout');


Route::middleware(['auth'])->group(function(){
    Route::get('/home_provider{ID}', function (){
        $user = Auth::user();

        return view('home_provider', compact('user'));
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/nav', function (){
        $user = Auth::user();
        return view('nav/index', compact('user'));
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function (){
        $user = Auth::user();

        return view('usuariosad/index', compact('user'));
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


// -----------------------------------------------------------------------

Route::get('/loader', function () {
    return view('loader/loader');
});


//---admin routes --------------------------------
Route::resource('admin', UsersController::class);
