<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Importante para reconocer a los usuarios
use Illuminate\Support\Facades\Hash; // Importante para encriptar la clave

class UsuarioAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Creamos al jefe con sus credenciales
        User::create([
            'name' => 'Jefe Colegio de Arquitectos',
            'email' => 'admin@arquitectoscae.com',
            'password' => Hash::make('Arquitecto2026*'), // La clave se guarda encriptada
        ]);
    }
}