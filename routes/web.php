<?php
use Illuminate\Support\Facades\Route;

// Ruta de inicio
Route::get('/', function () {
    return view('index');
});

// Ruta login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    return view('consultorias.consultorias');
})->name('login.post');

// Registro
Route::get('/registro', function () {
    return view('auth.registro');
});

Route::post('/registro', function () {
    return view('auth.login');
});

// Clientes
Route::get('/clientes', function () {
    return view('clientes.clientes');
});

Route::get('/clientes/nuevo', function () {
    return view('clientes.cliente-form', ['cliente' => null]);
});
route::post('/clientes/nuevo', function () {
    return view('clientes.clientes');
});

// Consultorías
Route::get('/consultorias', function () {
    return view('consultorias.consultorias');
});

Route::get('/consultorias/nueva', function () {
    return view('consultorias.consultoria-form', ['consultoria' => null]);
});

Route::post('/consultorias/nueva', function () {
    return view('consultorias.consultorias');
});

// Solicitudes
Route::get('/solicitudes', function () {
    return view('solicitudes.solicitudes');
});

Route::get('/solicitudes/nueva', function () {
    return view('solicitudes.solicitud-form', ['solicitud' => null]);
});

Route::post('/solicitudes/nueva', function () {
    return view('solicitudes.solicitudes');
});

// Usuarios
Route::get('/usuarios', function () {
    return view('usuarios.usuarios');
});


Route::get('/usuarios/nuevo', function () {
    return view('usuarios.usuario-form', ['usuario' => null]);
});

// Admin
Route::get('/admin', function () {
    return view('admin.admin');
});

// User
Route::get('/user', function () {
    return view('user.user');
});

Route::get('/perfil', function () {
    return view('user.user');
});
