<?php

use App\Http\Controllers\LaboratoryController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


//Rutas para Laboratory controlador CRUD LABORATORY
Route::get('/laboratories', [LaboratoryController::class, 'listLaboratory']); // Lista de laboratorios
Route::get('/laboratories/search', [LaboratoryController::class, 'searchLaboratory']); // Búsqueda con filtros
Route::get('/laboratories/{laboratory}', [LaboratoryController::class, 'show']); // Mostrar un laboratorio específico
Route::post('/laboratories', [LaboratoryController::class, 'store']); // Crear un laboratorio
Route::put('/laboratories/{laboratory}', [LaboratoryController::class, 'update']); // Actualizar laboratorio
Route::delete('/laboratories/{laboratory}', [LaboratoryController::class, 'destroy']); // Eliminar laboratorio