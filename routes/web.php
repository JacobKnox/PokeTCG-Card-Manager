<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\PokemonController;

Route::get('register', [UserController::class, 'create']);

Route::post('register', [UserController::class, 'store']);

Route::get('login', [UserController::class, 'login']);

Route::post('login', [UserController::class, 'authenticate']);

Route::resource('users', UserController::class)->except([
    'create',
    'store'
]);

Route::resource('decks', DeckController::class);

Route::resource('collections', CollectionController::class);