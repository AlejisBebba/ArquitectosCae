<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// --- RUTAS PÚBLICAS (Lo que todos ven) ---
Route::get('/', function () { return view('paginaprincipal'); })->name('inicio');
Route::view('/acerca', 'acerca')->name('acerca');
Route::view('/servicios', 'servicios')->name('servicios');
Route::view('/valores', 'valores')->name('valores');
Route::get('/galeria', [App\Http\Controllers\GaleriaController::class, 'index'])->name('galeria');
Route::get('/contacto', [App\Http\Controllers\ContactoController::class, 'index'])->name('contacto');

// --- RUTAS DE ADMINISTRACIÓN (Protegidas) ---
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Aquí puedes mover tus rutas de "crear cliente" o "subir foto" para que solo el jefe las use
});

require __DIR__.'/auth.php';

// --- RUTAS DE EMERGENCIA Y ACTIVACIÓN ---
Route::get('/arreglar-tablas', function () {
    Artisan::call('migrate --force');
    return "Tablas actualizadas correctamente.";
});

Route::get('/crear-admin-secreto', function () {
    \App\Models\User::updateOrCreate(
        ['email' => 'admin@arquitectoscae.com'],
        [
            'name' => 'Administrador',
            'password' => \Illuminate\Support\Facades\Hash::make('Arquitecto2026*'),
        ]
    );
    return "¡Usuario Administrador creado con éxito!";
});