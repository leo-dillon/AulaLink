<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::post('/user/create', [RegisterController::class, 'store'])
    -> name('user.create');
