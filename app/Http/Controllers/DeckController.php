<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DeckController extends Controller
{
    public static function clear($id){
        DB::table('deckrelationships')->where('deck_id', $id)->delete();
    }
}
