<?php

use App\Http\Controllers\LaboratoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


    Route::get('/laboratories', [LaboratoryController::class, 'listLaboratory']); // Lista de laboratorios
    Route::get('/laboratories/search', [LaboratoryController::class, 'searchLaboratory']); // Búsqueda con filtros
    Route::get('/laboratories/{laboratory}', [LaboratoryController::class, 'show']); // Mostrar un laboratorio específico
    Route::post('/laboratories', [LaboratoryController::class, 'store']); // Crear un laboratorio
    Route::put('/laboratories/{laboratory}', [LaboratoryController::class, 'update']); // Actualizar laboratorio
    Route::delete('/laboratories/{laboratory}', [LaboratoryController::class, 'destroy']); // Eliminar laboratorio
