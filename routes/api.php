<?php
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConsultoriaController;
use App\Http\Controllers\SolicitudController;

Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('roles', RolController::class);
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('consultorias', ConsultoriaController::class);
Route::apiResource('solicitudes', SolicitudController::class);
