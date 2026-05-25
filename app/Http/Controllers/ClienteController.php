<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes.clientes', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.cliente-form', ['cliente' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|email',
            'telefono' => 'required|string',
            'empresa' => 'required|string'
        ]);
        
        $cliente = Cliente::create($request->all());
        return redirect()->route('clientes.index');
    }

    public function show($id)
    {
        return response()->json(Cliente::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|email',
            'telefono' => 'required|string',
            'empresa' => 'required|string'
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index');
    }

    public function edit(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.cliente-form', compact('cliente'));
    }

    public function destroy($id)
    {
        Cliente::destroy($id);

        return redirect()->route('clientes.index');}
}
