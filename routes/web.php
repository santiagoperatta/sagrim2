<?php

use App\Http\Controllers\ArchivoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HonorarioController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\InfoTrabajoController;
use App\Http\Controllers\InfoPersonalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/expedientes/create', [ExpedienteController::class, 'create'] )->middleware(['auth', 'verified'])->name('expedientes.create');
Route::get('/informacion/create/{expedienteId}', [InfoPersonalController::class, 'create'] )->middleware(['auth', 'verified'])->name('info-personal.create');
Route::get('/infotrabajo/create/{expedienteId}', [InfoTrabajoController::class, 'create'] )->middleware(['auth', 'verified'])->name('info-trabajo.create');
Route::get('/honorarios/create/{expedienteId}', [HonorarioController::class, 'create'] )->middleware(['auth', 'verified'])->name('honorario.create');
Route::get('/expedientes/{id}', [ExpedienteController::class, 'show'])->name('expedientes.show');

Route::get('/subida-archivos', [ArchivoController::class, 'create'])->middleware(['auth'])->name('archivos.create');
require __DIR__.'/auth.php';
