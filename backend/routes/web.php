<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo', function(){
    return response() -> json([
        'message' => "Este es un mensaje"
    ]);
}); 
// Route::get('/onePager', [HomeController::class, 'onePager'])
// ->name('home.onepager');

// Route::post('user/create', [RegisterController::class, 'store'])
// ->name('user.create');