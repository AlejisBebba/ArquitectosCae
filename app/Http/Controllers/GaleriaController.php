<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request; // ESTA ES LA LÍNEA QUE FALTA

class GaleriaController extends Controller
{
    public function index()
    {
        $imagenes = [];
        // Verificamos si la carpeta existe para evitar el error de la línea 20
        if (File::exists(public_path('imagenes'))) {
            $files = File::files(public_path('imagenes'));

            foreach ($files as $file) {
                $imagenes[] = [
                    'nombre' => pathinfo($file, PATHINFO_FILENAME),
                    'archivo' => basename($file),
                ];
            }
        }

        return view('galeria', compact('imagenes'));
    }

    public function store(Request $request)
    {
        // 1. Validamos que sea una imagen real y no muy pesada
        $request->validate([
            'titulo' => 'required|string|max:100',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // 2. Guardamos la imagen en la carpeta 'imagenes'
        if ($request->hasFile('foto')) {
            $nombreImagen = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('imagenes'), $nombreImagen);
        }

        return back()->with('success', '¡Proyecto subido con éxito!');
    }
}