<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        return response()->json(Roles::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string'
        ]);

        $rol = Roles::create($request->all());
        return response()->json($rol, 201);
    }

    public function show($id)
    {
        return response()->json(Roles::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $rol = Roles::findOrFail($id);
        $rol->update($request->all());
        return response()->json($rol);
    }

    public function destroy($id)
    {
        Roles::destroy($id);
        return response()->json(['message' => 'Rol eliminado']);
    }
}
