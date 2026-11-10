<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    });*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('modulos/list', [ModuloController::class, 'index'])->name('api.v1.modulos.index');
Route::post('modulos/store', [ModuloController::class, 'salida'])->name('api.v1.modulos.store');
Route::get('modulos/{id}', [ModuloController::class, 'show'])->name('api.v1.modulos.show');
Route::put('modulos/{modulos}', [ModuloController::class, 'update'])->name('api.v1.modulos.update');
Route::delete('modulos/{modulos}', [ModuloController::class, 'destroy'])->name('api.v1.modulos.destroy');

Route::get('profesors/list', [ProfesorController::class, 'index'])->name('api.v1.profesors.index');
Route::post('profesors/store', [ProfesorController::class, 'salida'])->name('api.v1.profesors.store');
Route::get('profesors/{id}', [ProfesorController::class, 'show'])->name('api.v1.profesors.show');
Route::put('profesors/{profesors}', [ProfesorController::class, 'update'])->name('api.v1.profesors.update');
Route::delete('profesors/{profesors}', [ProfesorController::class, 'destroy'])->name('api.v1.profesors.destroy');

Route::get('alumnos/list', [AlumnoController::class, 'index'])->name('api.v1.alumnos.index');
Route::post('alumnos/store', [AlumnoController::class, 'salida'])->name('api.v1.alumnos.store');
Route::get('alumnos/{id}', [AlumnoController::class, 'show'])->name('api.v1.alumnos.show');
Route::put('alumnos/{alumnos}', [AlumnoController::class, 'update'])->name('api.v1.alumnos.update');
Route::delete('alumnos/{alumnos}', [AlumnoController::class, 'destroy'])->name('api.v1.alumnos.destroy');




