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

        return response()->json([
            'message' => 'Credenciales inválidas'
        ], 401);
    }

    $token = $user->createToken('token')->plainTextToken;

    return response()->json([

        'token' => $token,

        'rol_id' => $user->rol_id,

        'redirect' =>
        $user->rol_id == 2
            ? '/admin'
            : '/consultorias'
    ]);
});


Route::post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'Sesión cerrada']);
});


// Rutas protegidas con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('usuarios', UsuarioController::class)->except(['store']);
    Route::apiResource('roles', RolController::class);
    Route::apiResource('clientes', ClienteController::class);
    Route::apiResource('consultorias', ConsultoriaController::class);
    Route::apiResource('solicitudes', SolicitudController::class);
});

// Rutas protegidas para admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.admin');
    });

    Route::get('/usuarios', function () {
        return view('usuarios.usuarios');
    });
    Route::get('/roles', function () {
        return view('roles.roles');
    });
    Route::get('/clientes', function () {
        return view('clientes.clientes');
    });
    Route::get('/consultorias', function () {
        return view('consultorias.consultorias');
    });
    Route::get('/solicitudes', function () {
        return view('solicitudes.solicitudes');
    });
    Route::get('/perfil', function () {
        return view('user.user');
    });
});

// Rutas protegidas para usuarios normales
Route::middleware(['auth'])->group(function () {
    Route::get('/solicitudes', function () {
        return view('solicitudes.solicitudes');
    });
    Route::get('/perfil', function () {
        return view('user.user');
    });
});
