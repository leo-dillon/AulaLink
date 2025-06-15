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
use App\Http\Controllers\school\SchoolController;
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


// -------------- SCHOOL --------------

// Route::get('/instituciones/buscar', [InstitucionController::class, 'lookFor']);

// buscar todas las escuelas
Route::get('school', [SchoolController::class, 'getAll']);

// buscar todas las escuelas por nombre
Route::get('school/name/{name}', [SchoolController::class, 'getByName']);

// Buscar una escuela por id
Route::get('school/id/{id}', [SchoolController::class, 'getById']);

// crear Escuela
Route::post('/school', [SchoolController::class, 'create']);

// Editar Escuela
Route::put('/school/{id}', [SchoolController::class, 'edit']);

// Eliminar Escuela
Route::delete("/school/{id}", [SchoolController::class, 'delete']);

// vista de edicion de la institucion
Route::get('/Editar/Institucion/{id}', [EditInstitucionController::class, 'edit']);
// envia la edicion
Route::put('/Editar/Institucion/{id}', [EditInstitucionController::class, 'update']);

// ------------------------------------

Route::post('/pago', [PagoController::class, 'store']);


//
Route::get('/usuario-rol-escuela', [UsuarioRolEscuelaController::class, 'index']);
Route::post('/usuario-rol-escuela', [UsuarioRolEscuelaController::class, 'store']);

// -------------- ROL --------------

// Traer todos los roles
Route::get('/role', [RoleController::class, 'index']);

// Trear un rol por el nombre
Route::get('/role/{rolName}/name', [RoleController::class, 'getRoleByName'])
    -> name('role.getByName');

// Traer un rol por su id
Route::get('/role/{idRole}/id', [RoleController::class, 'getRoleById'])
    ->name('role.getById');

// Crear un rol
Route::post('/role', [RoleController::class, 'create'])
    -> name('role.create');

// Editar un rol
Route::put('/role/{id}', [RoleController::class, 'edit'])
    -> name('role.edit');

// Delete rol
Route::delete('/role/{id}', [RoleController::class, 'delete'])
    -> name('role.delete');

// ---------------------------------
