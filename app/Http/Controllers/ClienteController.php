<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function crear()
    {
        return view('clientes.crear');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre'   => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:clientes,email'],
            'telefono' => ['nullable', 'string', 'max:20'],
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.crear')->with('success', '¡Cliente guardado correctamente!');
    }

    public function editar(Cliente $cliente)
    {
        return view('clientes.editar', compact('cliente'));
    }

    public function actualizar(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre'   => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:clientes,email,' . $cliente->id],
            'telefono' => ['nullable', 'string', 'max:20'],
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', '¡Cliente actualizado correctamente!');
    }

    public function eliminar(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', '¡Cliente eliminado correctamente!');
    }
}
