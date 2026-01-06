<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\ContactoController;
use Database\Seeders\UsuarioAdminSeeder;
use Illuminate\Support\Facades\Artisan;

// --- RUTAS PÚBLICAS (Todos pueden ver) ---
Route::view('/', 'paginaprincipal')->name('inicio');
Route::view('/acerca', 'acerca')->name('acerca');
Route::view('/servicios', 'servicios')->name('servicios');
Route::view('/valores', 'valores')->name('valores');
Route::view('/contacto', 'contacto')->name('contacto');
Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria');
Route::get('/saludo', [SaludoController::class, 'mostrar'])->name('saludo');

// --- RUTAS PROTEGIDAS (Solo el jefe con Login) ---
Route::middleware(['auth'])->group(function () {
    
    // Subida de fotos y proyectos
    Route::post('/galeria', [GaleriaController::class, 'store'])->name('galeria.store');

    // Administración de mensajes de contacto
    Route::get('/admin/mensajes', [ContactoController::class, 'admin'])->name('admin.mensajes');

    // Gestión de Clientes (CRUD)
    Route::resource('clientes', ClienteController::class)->except(['index']);
    // Nota: El index de clientes podrías dejarlo fuera si quieres que sea público
});

// Ruta especial para procesar el formulario de contacto (pública)
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');
// Esta ruta es solo para crear al jefe, la borraremos después
Route::get('/crear-admin-secreto', function () {
    Artisan::call('db:seed', ['--class' => 'UsuarioAdminSeeder']);
    return "¡Usuario Administrador creado con éxito en Render!";
});