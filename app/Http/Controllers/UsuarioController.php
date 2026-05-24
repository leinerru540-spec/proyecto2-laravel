<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Listar usuarios
    public function index()
    {
        return view('usuarios.usuarios', ['usuarios' => Usuario::with('rol')->get()]);
    }

    public function create()
    {
        return view('usuarios.usuario-form', ['usuario' => null, 'roles' => \App\Models\Rol::all()]);
    }

    // Crear usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|email|unique:usuarios,email',
            'rol_id'   => 'required|exists:roles,id',
            'password' => 'required|min:6',
        ]);

        Usuario::create([
            'nombre'   => $request->nombre,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'rol_id'   => $request->rol_id,
        ]);

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuario creado correctamente');
    }

    // Mostrar usuario por ID
    public function show($id)
    {
        return response()->json(Usuario::with('rol')->findOrFail($id), 200);
    }

    public function edit($id)
    {
        return view('usuarios.usuario-form', [
            'usuario' => Usuario::findOrFail($id),
            'roles'   => \App\Models\Rol::all()
        ]);
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|email|unique:usuarios,email,' . $id,
            'rol_id'   => 'required|exists:roles,id',
            'password' => 'nullable|min:6',
        ]);

        $usuario = Usuario::findOrFail($id);

        $data = [
            'nombre' => $request->nombre,
            'email'  => $request->email,
            'rol_id' => $request->rol_id,
        ];

        // Solo actualizar contraseña si se proporcionó una
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $usuario->update($data);

        $usuario->update($data);

        if (Auth::id() == $usuario->id) {
            Auth::setUser($usuario->fresh());
            return redirect('/admin')->with('success', 'Usuario actualizado correctamente');
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }

    // Eliminar usuario
    public function destroy($id)
    {
        Usuario::destroy($id);

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuario eliminado correctamente');
    }
}
