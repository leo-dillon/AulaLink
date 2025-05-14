<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\EliminateController;
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Vista: Iniciar Sesión
Route::get('/login', [LoginController::class, 'create'])->name('login.create');
// Enviar formulario de login
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

// Vista: Registrarse
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
// Enviar formulario de registro
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/eliminar/usuario/{id}', [EliminateController::class, 'destroy'])->name('Eliminate.destroy');


