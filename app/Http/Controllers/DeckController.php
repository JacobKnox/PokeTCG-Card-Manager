<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Deck;

class DeckController extends Controller
{
    public static function clear($id){
        DB::table('deckrelationships')->where('deck_id', $id)->delete();
    }

    public static function addCard(Request $request, $deckid = null, $cardid = null){
        if($deckid == null || $cardid == null){
            $input = $request->all();
            $deckid = $input['deckid'];
            $cardid = $input['cardid'];
        }
        $deck = Deck::where('id', intval($deckid))->first();
        $deck->addCards([$cardid]);

        return back();
    }

    public static function newDeck(Request $request){
        $input = $request->all();

        $deck = new Deck();
        $deck->name = $input['name'];
        $deck->description = $input['description'];
        $deck->num_cards = 0;
        $deck->user_id = UserController::getUser()->id;
        $deck->save();

        return back();
    }
}
