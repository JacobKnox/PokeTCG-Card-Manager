<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('register', [UserController::class, 'create']);

Route::resource('users', UserController::class)->except([
    'create'
]);


#Route::resource('user', UserController::class, array('names' => array('create' => 'user.register')));