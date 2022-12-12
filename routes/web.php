<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PokemonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/collections', [UserController::class, 'collections']);

Route::get('/decks', [UserController::class, 'decks']);

Route::get('/card/{id}', [PokemonController::class, 'card']);

Route::get('/set/{id}', [PokemonController::class, 'set']);

Route::get('/cards/pagesize={size}&pagenum={num}', [PokemonController::class, 'cards']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'login']);