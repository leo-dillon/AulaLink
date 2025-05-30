<?php

use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\RegisterController;
use App\Http\Controllers\user\EditController;
use App\Http\Controllers\user\GetByIdController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\EditInstitucionController;
use App\Http\Controllers\UsuarioRolEscuelaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DatosRolController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\user\GetUserSchoolController;

Route::post('/user/create', [RegisterController::class, 'store'])
    -> name('user.create');

Route::post('/user/login', [LoginController::class, 'auth'])
    -> name('user.login');

Route::get('/user/{id}', [GetByIdController::class, 'getUser'])
    -> name('user.id');

Route::post('/user/logout', [LoginController::class, 'logout'])
    -> name('user.logout');

Route::post('/user/edit/{id}', [EditController::class, 'editUser'])
    -> name('user.edit');

/**
 * Usuario tiene escuela ?
 * Si => trae id escuela y nombre
 * No => trae vacio
 */
Route::get('/user/{id}/escuela', [GetUserSchoolController::class, 'getUserSchool'])
    -> name('user.school');

Route::get('/instituciones/buscar', [InstitucionController::class, 'lookFor']);
// crea las instituciones
Route::post('/CreateInstituciones', [InstitucionController::class, 'store']);
// vista de edicion de la institucion
Route::get('/Editar/Institucion/{id}', [EditInstitucionController::class, 'edit']);
// envia la edicion
Route::put('/Editar/Institucion/{id}', [EditInstitucionController::class, 'update']);

Route::post('/pago', [PagoController::class, 'store']);


//
Route::get('/usuario-rol-escuela', [UsuarioRolEscuelaController::class, 'index']);
Route::post('/usuario-rol-escuela', [UsuarioRolEscuelaController::class, 'store']);
Route::get('/roles', [RoleController::class, 'index']);


Route::get('/campos-dinamicos/{idUsuario}', [DatosRolController::class, 'obtenerCampos']);
Route::post('/datos-roles', [DatosRolController::class, 'store']);
