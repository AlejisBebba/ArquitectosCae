<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class SaludoController extends Controller
{
    public function mostrar()
    {
        $colegio = 'Colegio de Arquitectos El Oro';
        $clientes = Cliente::all();

        return view('saludo', compact('colegio', 'clientes'));
    }
}
