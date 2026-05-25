<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Models\Usuario;

/*
|--------------------------------------------------------------------------
| LOGIN API
|--------------------------------------------------------------------------
*/

Route::post('/login', function (Request $request) {
    $user = Usuario::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Credenciales inválidas'
        ], 401);
    }

    $token = $user->createToken('token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user'  => $user
    ]);
});

/*
|--------------------------------------------------------------------------
| LOGOUT API
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'Sesión cerrada correctamente'
    ]);
});

/*
|--------------------------------------------------------------------------
| API PROTEGIDA
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    // Usuario autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Ejemplo: CRUD protegido de clientes
    Route::apiResource('clientes', \App\Http\Controllers\ClienteController::class);

    // Ejemplo: CRUD protegido de consultorías
    Route::apiResource('consultorias', \App\Http\Controllers\ConsultoriaController::class);

    // Ejemplo: CRUD protegido de solicitudes
    Route::apiResource('solicitudes', \App\Http\Controllers\SolicitudController::class);
});
