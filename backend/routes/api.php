<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\EditInstitucionController;

Route::post('/user/create', [RegisterController::class, 'store'])
    -> name('user.create');

Route::post('/user/login', [LoginController::class, 'auth'])
    -> name('user.login');

Route::post('/user/logout', [LoginController::class, 'auth'])
    -> name('user.logout');

// crea las instituciones
Route::post('/CreateInstituciones', [InstitucionController::class, 'store']);
// vista de edicion de la institucion
Route::get('/Editar/Institucion/{id}', [EditInstitucionController::class, 'edit']);
// envia la edicion
Route::put('/Editar/Institucion/{id}', [EditInstitucionController::class, 'update']);
