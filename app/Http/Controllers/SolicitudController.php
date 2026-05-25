<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\Cliente;
use App\Models\Consultoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{
    // LISTAR
    public function index()
    {
        if (Auth::user()->rol_id == 2) {

            $solicitudes = Solicitud::all();
        } else {

            $solicitudes = Solicitud::where(
                'usuario_id',
                Auth::user()->id
            )->get();
        }

        return view('solicitudes.solicitudes', compact('solicitudes'));
    }

    // FORM CREAR
    public function create()
    {
        return view('solicitudes.solicitud-form', [
            'solicitudForm'    => new Solicitud(),
            'clientes'         => Cliente::all(),
            'consultorias'     => Consultoria::all(),
            'estadosSolicitud' => ['Pendiente', 'En proceso', 'Finalizada']
        ]);
    }

    public function show($id)
    {
        return response()->json(Solicitud::with(['cliente', 'consultoria'])->findOrFail($id));
    }

    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'correo_solicitante' => 'required|email',
            'nombre_solicitante' => 'required|string',
            'descripcion' => 'required|string',
            'estado' => 'nullable|string',
            'fecha' => 'nullable|date',
            'cliente_id' => 'required|exists:clientes,id',
            'consultoria_id' => 'required|exists:consultorias,id',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        Solicitud::create([
            'correo_solicitante' => $request->correo_solicitante,
            'nombre_solicitante' => $request->nombre_solicitante,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado ?? 'Pendiente',
            'fecha' => $request->fecha ?? now()->toDateString(),
            'cliente_id' => $request->cliente_id,
            'consultoria_id' => $request->consultoria_id,
            'usuario_id' => $request->usuario_id,
        ]);

        return redirect()
            ->route('solicitudes.index')
            ->with('success', 'Solicitud creada correctamente');
    }

    // FORM EDITAR
    public function edit($id)
    {
        $solicitud = Solicitud::findOrFail($id);

        return view('solicitudes.solicitud-form', [
            'solicitudForm' => $solicitud,
            'selectedCliente' => $solicitud->cliente,
            'clientes' => Cliente::all(),
            'consultorias' => Consultoria::all(),
            'estadosSolicitud' => ['Pendiente', 'En proceso', 'Finalizada']
        ]);
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
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

        $solicitud = Solicitud::findOrFail($id);

        $solicitud->update([
            'correo_solicitante' => $request->correo_solicitante,
            'nombre_solicitante' => $request->nombre_solicitante,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'fecha' => $request->fecha,
            'cliente_id' => $request->cliente_id,
            'consultoria_id' => $request->consultoria_id,
            'usuario_id' => $request->usuario_id,
        ]);

        return redirect()
            ->route('solicitudes.index')
            ->with('success', 'Solicitud actualizada correctamente');
    }

    // ELIMINAR
    public function destroy($id)
    {
        Solicitud::destroy($id);

        return redirect()
            ->route('solicitudes.index')
            ->with('success', 'Solicitud eliminada correctamente');
    }
}
