<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\ProcesosController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\ResponsablesController;
use App\Http\Controllers\Roles_userController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;

/*Route::get('/', function () {
    return view('welcome');
});*/

//AUTENTICACIÓN (con seguridad)
Route::middleware(['security'])->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/check-auth', [AuthController::class, 'checkAuth'])->name('auth.check');
});

//INICIO (protegido)
Route::middleware(['auth'])->group(function () {
    Route::get('/inicio', [LoginController::class, 'showInicio'])->name('inicio');
    Route::post('/inicio', [LoginController::class, 'showInicio'])->name('inicio');
});

//PROCESOS (protegidos)
Route::middleware(['auth'])->group(function () {
//PROCESO -> ASESORIA
Route::get('/procesos/asesoria_derecho', [ProcesosController::class, 'index'])->name('asesoria');
//PROCESO -> AUDITORIA
Route::get('/procesos/auditoria_fiscal', [ProcesosController::class, 'auditoria'])->name('auditoria');
//PROCESO -> CAPACITACION
Route::get('/procesos/capacitacion_legislativa', [ProcesosController::class, 'capacitacion'])->name('capacitacion');
//PROCESO -> CONSULTA_JURIDICA
Route::get('/procesos/consulta_juridica_empresarial', [ProcesosController::class, 'consultaJuridica'])->name('consulta_juridica_empresarial');
//PROCESO -> CONSULTA_TRIBUTARIA
Route::get('/procesos/consulta_tributaria', [ProcesosController::class, 'consultaTributaria'])->name('consulta_tributaria');
//PROCESO -> DEFENSA
Route::get('/procesos/defensa_fiscal', [ProcesosController::class, 'defensa'])->name('defensa');
//PROCESO -> PLANEACION
Route::get('/procesos/planeacion_fiscal', [ProcesosController::class, 'planeacion'])->name('planeacion');
//PROCESO -> REGULACION
Route::get('/procesos/regulacion_fiscal', [ProcesosController::class, 'regulacion'])->name('regulacion');
});

//DETALLES Y USUARIOS (protegidos)
Route::middleware(['auth'])->group(function () {
//DETALLES -> DETALLE
Route::get('/detalles/detalle', [DetallesController::class, 'index'])->name('detalle');

//USUARIOS -> USUARIO
Route::get('/usuarios/registro_usuario', [ResponsablesController::class, 'index'])->name('usuario');
//USUARIOS -> PERSONAL ADMINISTRATIVO
Route::get('/usuarios/registro_personal', [Roles_userController::class, 'index'])->name('personal');
//USUARIOS -> RESPONSABLES
Route::get('/usuarios/responsables', [ResponsablesController::class, 'index'])->name('responsables');
});

// Rutas API para procesos (guardar, actualizar, eliminar)
Route::post('/procesos', [ProcesosController::class, 'store'])->name('procesos.store');
Route::put('/procesos/{id}', [ProcesosController::class, 'update'])->name('procesos.update');
Route::delete('/procesos/{id}', [ProcesosController::class, 'destroy'])->name('procesos.destroy');

// Rutas para responsables (guardar, actualizar, eliminar)
Route::post('/responsables', [App\Http\Controllers\ResponsablesController::class, 'store'])->name('responsables.store');
Route::put('/responsables/{id}', [App\Http\Controllers\ResponsablesController::class, 'update'])->name('responsables.update');
Route::delete('/responsables/{id}', [App\Http\Controllers\ResponsablesController::class, 'destroy'])->name('responsables.destroy');

// Rutas para usuarios (guardar, actualizar, eliminar)
Route::post('/usuarios', [App\Http\Controllers\UserController::class, 'store'])->name('usuarios.store');
Route::put('/usuarios/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('usuarios.destroy');

// Rutas para personal (guardar, actualizar, eliminar)
Route::post('/personal', [App\Http\Controllers\PersonalController::class, 'store'])->name('personal.store');
Route::put('/personal/{id}', [App\Http\Controllers\PersonalController::class, 'update'])->name('personal.update');
Route::delete('/personal/{id}', [App\Http\Controllers\PersonalController::class, 'destroy'])->name('personal.destroy');

// Rutas para reportes (protegidas)
Route::middleware(['auth'])->group(function () {
    Route::get('/reports/dashboard', [ReportController::class, 'dashboard'])->name('reports.dashboard');
    Route::get('/reports/generate', [ReportController::class, 'generateReport'])->name('reports.generate');
    Route::get('/reports/export-csv', [ReportController::class, 'exportCSV'])->name('reports.export-csv');
    Route::get('/reports/export-pdf', [ReportController::class, 'exportPDF'])->name('reports.export-pdf');
    Route::get('/reports/statistics', [ReportController::class, 'apiStatistics'])->name('reports.statistics');
    Route::get('/reports/detailed', [ReportController::class, 'detailedReport'])->name('reports.detailed');
});


