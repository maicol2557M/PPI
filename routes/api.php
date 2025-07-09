<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcesosController;
use App\Http\Controllers\ResponsablesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ReportController;

// Rutas API públicas para desarrollo
Route::get('/user', function (Request $request) {
    return $request->user();
});

// API para obtener todos los procesos
Route::get('/procesos', [ProcesosController::class, 'apiIndex']);
Route::get('/procesos/{id}', [ProcesosController::class, 'apiShow']);

// API para responsables
Route::get('/responsables', [ResponsablesController::class, 'apiIndex']);
Route::get('/responsables/{id}', [ResponsablesController::class, 'apiShow']);

// API para usuarios
Route::get('/usuarios', [UserController::class, 'apiIndex']);
Route::get('/usuarios/{id}', [UserController::class, 'apiShow']);

// API para personal
Route::get('/personal', [PersonalController::class, 'apiIndex']);
Route::get('/personal/{id}', [PersonalController::class, 'apiShow']);

// API para reportes
Route::get('/reports/generate', [ReportController::class, 'generateReport']);
Route::get('/reports/statistics', [ReportController::class, 'apiStatistics']);
Route::get('/reports/detailed', [ReportController::class, 'detailedReport']);

// API para estadísticas
Route::get('/statistics/general', [App\Http\Controllers\StatisticsController::class, 'generalStatistics']);
Route::get('/statistics/by-type', [App\Http\Controllers\StatisticsController::class, 'statisticsByType']);
Route::get('/statistics/by-user', [App\Http\Controllers\StatisticsController::class, 'statisticsByUser']);
Route::get('/statistics/by-date', [App\Http\Controllers\StatisticsController::class, 'statisticsByDate']);
Route::get('/statistics/top-processes', [App\Http\Controllers\StatisticsController::class, 'topProcessesByValue']);
Route::get('/statistics/financial-summary', [App\Http\Controllers\StatisticsController::class, 'financialSummary']);
Route::get('/statistics/optimized-query', [App\Http\Controllers\StatisticsController::class, 'optimizedQuery']);
