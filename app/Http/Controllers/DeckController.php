<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Deck;

class DeckController extends Controller
{
    public static function clear($id){
        DB::table('deckrelationships')->where('deck_id', $id)->delete();
    }

    public static function newDeck($name, $description){
        $deck = new Deck();
        $deck->name = $name;
        $deck->description = $description;
        $deck->num_cards = 0;
        $deck->user_id = UserController::getUser()->id;
        $deck->save();
    }
}
