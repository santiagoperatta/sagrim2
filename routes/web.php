<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HonorarioController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\InfoTrabajoController;
use App\Http\Controllers\InfoPersonalController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ControlPrevioController;
use App\Http\Controllers\MisExpedientesController;
use App\Http\Controllers\ExpedientesVisadosController;
use App\Http\Controllers\ExpedientesEnviadosController;

Route::get('/', function () {
    return view('mis-expedientes.show');
})->middleware(['auth', 'verified'])->name('mis-expedientes.show');

Route::get('/', function () {
    return view('/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/pendientes', function () {
    return view('/pendientes');
})->middleware(['auth', 'verified'])->name('pendientes');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/expedientes/pdf/{expedienteId}', [ExpedienteController::class, 'pdf'] )->middleware(['auth', 'verified'])->name('expedientes.pdf');

Route::get('/expedientes/create', [ExpedienteController::class, 'create'] )->middleware(['auth', 'verified'])->name('expedientes.create');
Route::get('/informacion/create/{expedienteId}', [InfoPersonalController::class, 'create'] )->middleware(['auth', 'verified'])->name('info-personal.create');
Route::get('/informacion/edit/{infoPersonal}', [InfoPersonalController::class, 'edit'] )->middleware(['auth', 'verified'])->name('info-personal.edit');

Route::get('/infotrabajo/create/{expedienteId}', [InfoTrabajoController::class, 'create'] )->middleware(['auth', 'verified'])->name('info-trabajo.create');
Route::get('/infotrabajo/edit/{infoTrabajo}', [InfoTrabajoController::class, 'edit'] )->middleware(['auth', 'verified'])->name('info-trabajo.edit');

Route::get('/honorarios/create/{expedienteId}', [HonorarioController::class, 'create'] )->middleware(['auth', 'verified'])->name('honorario.create');
Route::get('/honorarios/edit/{honorarios}', [HonorarioController::class, 'edit'] )->middleware(['auth', 'verified'])->name('honorario.edit');

Route::get('/expedientes/{id}', [ExpedienteController::class, 'show'])->name('expedientes.show');

Route::get('/controlprevio', [ControlPrevioController::class, 'show'])->name('controlprevio.show');

Route::get('/expedientesvisados', [ExpedientesVisadosController::class, 'show'])->name('expedientes-visados.show');
Route::get('/expedientesenviados', [ExpedientesEnviadosController::class, 'show'])->name('expedientes-enviados.show');

Route::get('/subida-archivos/{expedienteId}', [ArchivoController::class, 'create'])->middleware(['auth'])->name('archivos.create');
Route::get('/subida-archivos/edit/{expedienteId}', [ArchivoController::class, 'edit'])->middleware(['auth'])->name('archivos.edit');

Route::post('/descargar-archivos', [ArchivoController::class, 'descargarArchivos'])->name('descargar-archivos');

Route::get('/admin/usuarios', [UserController::class, 'index'])->middleware(['auth', 'verified', 'rol.admin'])->name('admin.usuarios.index');
Route::put('/usuarios/{user}/update-role', [UserController::class, 'updateRole'])->name('usuarios.updateRole');
//Notificaciones
Route::get('/notificaciones', NotificacionController::class)->middleware(['auth', 'verified'])->name('notificaciones');
require __DIR__.'/auth.php';
