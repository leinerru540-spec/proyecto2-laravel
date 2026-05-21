<?php

namespace App\Http\Controllers;

use App\Models\Consultoria;
use Illuminate\Http\Request;

class ConsultoriaController extends Controller
{
    public function index()
    {
        return response()->json(Consultoria::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'tipo' => 'required|string'
        ]);

        $consultoria = Consultoria::create($request->all());
        return response()->json($consultoria, 201);
    }

    public function show($id)
    {
        return response()->json(Consultoria::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $consultoria = Consultoria::findOrFail($id);
        $consultoria->update($request->all());
        return response()->json($consultoria);
    }

    public function destroy($id)
    {
        Consultoria::destroy($id);
        return response()->json(['message' => 'Consultoría eliminada']);
    }
}
