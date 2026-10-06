<?php

use App\Http\Controllers\PlatoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Módulo de Administración
Route::prefix('platos')->group(function () {
    Route::get('/', [PlatoController::class, 'index'])->name('platos.index');
    Route::get('/crear', [PlatoController::class, 'create'])->name('platos.create');
    Route::post('/', [PlatoController::class, 'store'])->name('platos.store');
    Route::get('/{id}/editar', [PlatoController::class, 'edit'])->name('platos.edit');
    Route::put('/{id}', [PlatoController::class, 'update'])->name('platos.update');
    Route::delete('/{id}', [PlatoController::class, 'destroy'])->name('platos.destroy');
});

// Módulo Público (Carta del Restaurante)
Route::prefix('menu')->group(function () {
    Route::get('/', [PlatoController::class, 'menu'])->name('menu.index');
    Route::get('/{id}', [PlatoController::class, 'show'])->name('menu.show');
});