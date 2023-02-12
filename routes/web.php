<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('register', [UserController::class, 'create']);

Route::post('register', [UserController::class, 'store']);

Route::get('login', [UserController::class, 'login']);

Route::post('login', [UserController::class, 'authenticate']);

Route::resource('users', UserController::class)->except([
    'create',
    'store'
]);