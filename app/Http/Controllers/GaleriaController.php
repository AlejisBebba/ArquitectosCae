<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class GaleriaController extends Controller
{
    public function index()
    {
        $imagenes = [];
        $files = File::files(public_path('imagenes'));

        foreach ($files as $file) {
            $imagenes[] = [
                'nombre' => pathinfo($file, PATHINFO_FILENAME),
                'archivo' => basename($file),
            ];
        }

        return view('galeria', compact('imagenes'));
    }
}
