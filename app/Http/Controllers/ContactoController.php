<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    // AGREGA ESTA FUNCIÓN PARA QUE LA PÁGINA CARGUE
    public function index()
    {
        return view('contacto');
    }

    public function enviar(Request $request)
    {
        // Esto valida que los campos no lleguen vacíos
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required',
        ]);

        // Retornaremos un mensaje de éxito
        return back()->with('success', '¡Gracias! Tu mensaje ha sido enviado correctamente.');
    }
}