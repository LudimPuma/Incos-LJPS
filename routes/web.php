<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
Route::view('/', 'login')->name('login');
Route::post('/iniciar-sesion', [LoginController::class, 'login'])->name('iniciar-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::view('/principal', 'principal')->name('principal');
    // crud
    Route::resource('usuarios', UserController::class)->middleware('can:admin');
    Route::resource('roles', RoleController::class)->middleware('can:admin');;
    Route::resource('permissions', PermisoController::class)->middleware('can:admin');
    Route::resource('docentes', DocenteController::class);
    Route::resource('carreras', CarreraController::class);
    Route::resource('tipos_modalidad', TipoModalidadController::class);

    //formulario
    Route::resource('formulario_modalidad', FormularioModalidadController::class);
    Route::post('/obtener-docentes/{carreraId}', 'FormularioModalidadController@obtenerDocentes');

    //reportes
    Route::view('/Por_Gestion', 'reportes.Por_Gestion')->name('Por.Gestion');
    Route::post('/reporte-anual-Modalidades', 'FormularioModalidadController@reporte_anual')->name('reporte.anual.modalidad');



});














