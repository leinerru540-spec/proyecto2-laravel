<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        return response()->json(Rol::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string'
        ]);

        $rol = Rol::create($request->all());
        return response()->json($rol, 201);
    }

    public function show($id)
    {
        return response()->json(Rol::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);
        $rol->update($request->all());
        return response()->json($rol);
    }

    public function destroy($id)
    {
        Rol::destroy($id);
        return response()->json(['message' => 'Rol eliminado']);
    }
}
