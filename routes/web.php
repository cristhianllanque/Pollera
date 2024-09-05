<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AlquilerController;

// Ruta para la página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas para gestión de clientes y alquileres, solo accesibles para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('alquileres', AlquilerController::class);
});

// Ruta para el dashboard, requiere autenticación y verificación de email
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas para la gestión del perfil de usuario, requiere autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Incluir las rutas de autenticación generadas por Breeze
require __DIR__.'/auth.php';
