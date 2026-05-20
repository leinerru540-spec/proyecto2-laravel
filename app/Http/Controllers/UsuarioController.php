<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index() {
    return response()->json(Usuario::all());
}

public function store(Request $request) {
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:usuarios',
        'password' => 'required|string|min:6',
        'rol_id' => 'required|integer'
    ]);

    $usuario = Usuario::create($validated);
    return response()->json($usuario);
}


public function show($id) {
    return response()->json(Usuario::findOrFail($id));
}

public function update(Request $request, $id) {
    $usuario = Usuario::findOrFail($id);
    $usuario->update($request->all());
    return response()->json($usuario);
}

public function destroy($id) {
    Usuario::destroy($id);
    return response()->json(['message' => 'Usuario eliminado']);
}

}
