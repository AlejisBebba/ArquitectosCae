<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\ContactoController;

// 1. Página principal
Route::view('/', 'paginaprincipal')->name('inicio');

// 2. Rutas estáticas de contenido (Cargan la vista directamente)
Route::view('/acerca', 'acerca')->name('acerca');
Route::view('/servicios', 'servicios')->name('servicios');
Route::view('/valores', 'valores')->name('valores');
Route::view('/contacto', 'contacto')->name('contacto'); // Arregla el error de carga visual

// 3. Rutas de Contacto (Procesamiento)
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');
Route::get('/admin/mensajes', [ContactoController::class, 'admin'])->name('admin.mensajes');

// 4. Rutas de Galería (Administración y Visualización)
Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria');
Route::post('/galeria', [GaleriaController::class, 'guardar'])->name('galeria.guardar');

// 5. Rutas para Clientes (CRUD Completo)
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/crear', [ClienteController::class, 'crear'])->name('clientes.crear');
Route::post('/clientes', [ClienteController::class, 'guardar'])->name('clientes.guardar');
Route::get('/clientes/{cliente}/editar', [ClienteController::class, 'editar'])->name('clientes.editar');
Route::put('/clientes/{cliente}', [ClienteController::class, 'actualizar'])->name('clientes.actualizar');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'eliminar'])->name('clientes.eliminar');

// 6. Otras rutas
Route::get('/saludo', [SaludoController::class, 'mostrar'])->name('saludo');