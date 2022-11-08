<?php

use Illuminate\Support\Facades\Route;
use Pokemon\Models\Card;
use Pokemon\Pokemon;

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

Route::get('/collections', function(){
    return view('collections');
});

Route::get('/decks', function(){
    return view('decks');
});

Route::get('/registerlogin', function(){
    return view('registerlogin');
});

Route::get('/card/{id}', function($id){
    $card = Pokemon::Card()->find($id);
    return view('card', ['card' => $card]);
});

Route::get('/cards/pagesize={size}&pagenum={num}', function($size, $num){
    return view('cards', ['size' => intval($size), 'num' => intval($num)]);
});