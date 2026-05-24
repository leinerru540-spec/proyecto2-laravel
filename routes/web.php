<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConsultoriaController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::view('/', 'index')->name('index');

Route::view('/login', 'auth.login')->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');


Route::view('/registro', 'auth.registro')->name('register');

// En una ruta /dashboard o similar
Route::get('/dashboard', function () {
    if (Auth::user()->rol_id == 2) {
        return redirect('/admin');
    }
    return redirect('/solicitudes');
})->middleware('auth');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::view('/admin', 'admin.admin');

    Route::resource('usuarios', UsuarioController::class);

    Route::resource('roles', RolController::class);

    Route::resource('clientes', ClienteController::class);
});

/*
|--------------------------------------------------------------------------
| USUARIOS AUTENTICADOS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::resource('solicitudes', SolicitudController::class);

    Route::resource('consultorias', ConsultoriaController::class);

    Route::view('/perfil', 'user.user');
});
