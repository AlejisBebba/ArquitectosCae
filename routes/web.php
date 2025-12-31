<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\ContactoController;

// Página principal
Route::view('/', 'paginaprincipal')->name('inicio');


// Rutas estáticas de contenido
Route::view('/acerca', 'acerca')->name('acerca');
Route::view('/servicios', 'servicios')->name('servicios');
Route::view('/valores', 'valores')->name('valores');
Route::view('/contacto', 'contacto')->name('contacto');

// Rutas para Clientes (CRUD)
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/crear', [ClienteController::class, 'crear'])->name('clientes.crear');
Route::post('/clientes', [ClienteController::class, 'guardar'])->name('clientes.guardar');
Route::get('/clientes/{cliente}/editar', [ClienteController::class, 'editar'])->name('clientes.editar');
Route::put('/clientes/{cliente}', [ClienteController::class, 'actualizar'])->name('clientes.actualizar');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'eliminar'])->name('clientes.eliminar');

Route::get('/saludo', [SaludoController::class, 'mostrar'])->name('saludo');

Route::get('/admin/mensajes', [App\Http\Controllers\ContactoController::class, 'admin'])->name('admin.mensajes');
Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria');
// Ruta para que el formulario de la galería pueda enviar las fotos
Route::post('/galeria', [GaleriaController::class, 'guardar'])->name('galeria.guardar');