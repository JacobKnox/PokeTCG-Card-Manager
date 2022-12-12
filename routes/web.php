<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\CollectionController;

Route::view('/', 'index');

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'login']);

Route::get('/collections', [UserController::class, 'collections']);

Route::get('/decks', [UserController::class, 'decks']);

Route::get('/card/{id}', [PokemonController::class, 'card']);

Route::get('/set/{id}', [PokemonController::class, 'set']);

Route::get('/cards/pagesize={size}&pagenum={num}', [PokemonController::class, 'cards']);

Route::get('/newdeck', [DeckController::class, 'newDeck']);

Route::get('/addcard/to=deck', [DeckController::class, 'addCard']);

Route::get('/newcollection', [CollectionController::class, 'newCollection']);

Route::get('/addcard/to=collection', [CollectionController::class, 'addCard']);