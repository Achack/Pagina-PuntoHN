<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});

Route::get('/register', [RegistroController::class, 'index']) -> name('register');
Route::post('/register', [RegistroController::class, 'store']);

Route::get('/login', [LoginController::class,'index']) -> name('login');
Route::post('/login', [LoginController::class,'store']);

Route::post('/logout', [LogoutController::class,'store']) -> name('logout');

Route::get('/muro', [PostController::class,'index']) -> name('post.index');


