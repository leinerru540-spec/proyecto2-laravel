<?php
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\ConsultoriaController;

Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('roles', RolController::class);
Route::apiResource('solicitudes', SolicitudController::class);
Route::apiResource('consultorias', ConsultoriaController::class);


