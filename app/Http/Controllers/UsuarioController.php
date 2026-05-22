<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Listar usuarios
    public function index()
    {
        return response()->json(Usuario::with('rol')->get(), 200);
    }

    public function create()
    {
        return view('usuarios.usuario-form', ['usuario' => null]);
    }

    // Crear usuario
    public function store(Request $request)
    {
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol_id' => 3 // Asignar rol por defecto (cliente)
        ]);

        return response()->json($usuario, 201);
    }

    // Mostrar usuario por ID
    public function show($id)
    {
        return response()->json(Usuario::with('rol')->findOrFail($id), 200);
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol_id' => $request->rol_id
        ]);

        return response()->json($usuario, 200);
    }

    // Eliminar usuario
    public function destroy($id)
    {
        Usuario::destroy($id);
        return response()->json(null, 204);
    }
}
