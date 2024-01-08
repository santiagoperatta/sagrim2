<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HonorarioController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\InfoTrabajoController;
use App\Http\Controllers\InfoPersonalController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\MisExpedientesController;
use App\Http\Controllers\ExpedientesVisadosController;

Route::get('/', function () {
    return view('mis-expedientes.show');
})->middleware(['auth', 'verified'])->name('mis-expedientes.show');

Route::get('/', function () {
    return view('/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/expedientes/pdf/{expedienteId}', [ExpedienteController::class, 'pdf'] )->middleware(['auth', 'verified'])->name('expedientes.pdf');

Route::get('/expedientes/create', [ExpedienteController::class, 'create'] )->middleware(['auth', 'verified'])->name('expedientes.create');
Route::get('/informacion/create/{expedienteId}', [InfoPersonalController::class, 'create'] )->middleware(['auth', 'verified'])->name('info-personal.create');

Route::get('/infotrabajo/create/{expedienteId}', [InfoTrabajoController::class, 'create'] )->middleware(['auth', 'verified'])->name('info-trabajo.create');

Route::get('/honorarios/create/{expedienteId}', [HonorarioController::class, 'create'] )->middleware(['auth', 'verified'])->name('honorario.create');

Route::get('/expedientes/{id}', [ExpedienteController::class, 'show'])->name('expedientes.show');

Route::get('/expedientesvisados', [ExpedientesVisadosController::class, 'show'])->name('expedientes-visados.show');

Route::get('/misexpedientes', [MisExpedientesController::class, 'show'])->name('mis-expedientes.show');

Route::get('/subida-archivos/{expedienteId}', [ArchivoController::class, 'create'])->middleware(['auth'])->name('archivos.create');

//Notificaciones
Route::get('/notificaciones', NotificacionController::class)->middleware(['auth', 'verified'])->name('notificaciones');
require __DIR__.'/auth.php';
