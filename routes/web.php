<?php

use Illuminate\Support\Facades\Route;
use Pokemon\Pokemon;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

Route::get('/card/{id}', function(String $id){
    $card = Pokemon::Card()->find($id);
    return view('cardpage', ['card' => $card]);
});

Route::get('/set/{id}', function(String $id){
    $set = Pokemon::Set()->find($id);
    return view('setpage', ['set' => $set]);
});

Route::get('/cards/pagesize={size}&pagenum={num}', function(int $size, int $num){
    return view('cards', ['size' => $size, 'num' => $num]);
});

Route::get('/logout', function(Request $request){
    return UserController::logout($request);
});

Route::get('/register', function(Request $request){
    if($request->has('username')){
        return UserController::register($request);
    }
    return view('register');
});

Route::get('/login', function(Request $request){
    return UserController::login($request);
});