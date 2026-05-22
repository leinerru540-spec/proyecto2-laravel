<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConsultoriaController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::post('/login', function (Request $request) {
    $user = \App\Models\Usuario::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Credenciales inválidas'], 401);
    }

    $token = $user->createToken('token')->plainTextToken;

    return response()->json(['token' => $token]);
});

// Registro público de usuarios
Route::post('/usuarios', [UsuarioController::class, 'store']);

// Rutas protegidas con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('usuarios', UsuarioController::class)->except(['store']);
    Route::apiResource('roles', RolController::class);
    Route::apiResource('clientes', ClienteController::class);
    Route::apiResource('consultorias', ConsultoriaController::class);
    Route::apiResource('solicitudes', SolicitudController::class);
});
