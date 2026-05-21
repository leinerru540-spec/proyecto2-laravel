<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index()
    {
        return response()->json(Solicitud::with(['cliente', 'consultoria', 'usuario'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'correo_solicitante' => 'required|email',
            'nombre_solicitante' => 'required|string',
            'descripcion' => 'required|string',
            'estado' => 'required|string',
            'fecha' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
            'consultoria_id' => 'required|exists:consultorias,id',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        $solicitud = Solicitud::create($request->all());
        return response()->json($solicitud, 201);
    }

    public function show($id)
    {
        return response()->json(Solicitud::with(['cliente', 'consultoria', 'usuario'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->update($request->all());
        return response()->json($solicitud);
    }

    public function destroy($id)
    {
        Solicitud::destroy($id);
        return response()->json(['message' => 'Solicitud eliminada']);
    }
}

