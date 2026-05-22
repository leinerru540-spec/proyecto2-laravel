<?php

use Illuminate\Support\Facades\Route;

// Ruta inicial → login
Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Registro
Route::get('/registro', function () {
    return view('auth.registro');
});

// Clientes
Route::get('/clientes', function () {
    return view('clientes.clientes');
});

// Consultorías
Route::get('/consultorias', function () {
    return view('consultorias.consultorias');
});

// Solicitudes
Route::get('/solicitudes', function () {
    return view('solicitudes.solicitudes');
});

// Usuarios
Route::get('/usuarios', function () {
    return view('usuarios.usuarios');
});

// Index (está dentro de carpeta usuarios)
Route::get('/index', function () {
    return view('usuarios.index');
});

// Admin
Route::get('/admin', function () {
    return view('admin.admin');
});

// User
Route::get('/user', function () {
    return view('user.user');
});

