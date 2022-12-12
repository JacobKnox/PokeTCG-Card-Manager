<?php

namespace App\Http\Controllers;

use Pokemon\Pokemon;
use App\Http\Controllers\UserController;

Pokemon::Options(['verify' => true]);
Pokemon::ApiKey(env("POKEMON_API_KEY"));

class PokemonController extends Controller
{
    public static function card($id)
    {
        return view('cardpage', ['card' => Pokemon::Card()->find($id), 'decks' => UserController::getUser()->decks, 'collections' => UserController::getUser()->collections]);
    }

    public static function cards($size, $num){
        $cards = Pokemon::Card()->page($num)->pageSize($size)->all();
        return view('cards', ['cards' => $cards, 'num' => $num, 'size' => $size]);
    }

    public static function set($id)
    {
        return view('setpage', ['set' => Pokemon::Set()->find($id)]);
    }
}
