<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeRedirectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\EliminateController;
use App\Http\Controllers\Auth\EditarController;
// Route::get('/', [HomeController::class, 'index'])
// ->name('home.index');
            // si estoy reguistrado es una paguina y si no estoy es otra
Route::get('/', HomeRedirectController::class)->name('home.redirect');

// Asegurate de tener estas rutas creadas:
Route::get('/dashboard', [HomeController::class, 'index'])
->name('home.index')
->middleware('auth');

Route::get('/onePager', [HomeController::class, 'onePager'])
->name('home.onepager');

// Vista: Iniciar Sesión
Route::get('/iniciar-sesion', [LoginController::class, 'login'])
->name('login.index');
// Enviar formulario de login
Route::post('/iniciar-sesion', [LoginController::class, 'authenticate'])
->name('login.authenticate');
// envia formulario de cerrar sesion
Route::post('/cerrar-sesion', [LoginController::class, 'logout'])
->name('login.logout')
->middleware('auth');

// Vista: Registrarse
Route::get('/register', [RegisterController::class, 'create'])
->name('register.create');
// Enviar formulario de registro
Route::post('/register', [RegisterController::class, 'store'])
->name('register.store');
 // Enviar Eiminar
    // ⬇  canboar por Delete
Route::get('/eliminar/usuario/{id}', [EliminateController::class, 'destroy'])
->name('Eliminate.destroy')
->middleware('auth');
//Vista editar Usuario
Route::get('/editar/usuario/{id}', [EditarController::class, 'edit'])
->name('UserEdit')
->middleware('auth');
// manda la edicion del Usuario
Route::put('/editar/usuario/{id}', [EditarController::class, 'update'])
->name('UserUpdate')
->middleware('auth');


