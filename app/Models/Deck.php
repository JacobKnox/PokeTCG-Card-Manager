<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pokemon\Pokemon;
use Illuminate\Support\Facades\DB;

class Deck extends Model
{
    use HasFactory;

    public function setCards(?array $card_ids){
        DB::table('deckrelationships')->where('deck_id', $this->id)->delete();
        $this->num_cards = 0;
        $this->addCards($card_ids);
    }

    public function addCards(?array $card_ids){
        if($card_ids == null){
            return;
        }
        foreach($card_ids as $id){
            DB::table('deckrelationships')->insert(
                ['deck_id' => $this->id,
                'card_id' => $id
            ]);
        }
        $this->num_cards = $this->num_cards + count($card_ids);
    }

    public function getCards()
    {
        $cards = DB::table('deckrelationships')->select('card_id')->where('deck_id', $this->id)->get();
        $this->num_cards = count($cards);
        $return = collect();
        foreach($cards as $id){
            $return->add(Pokemon::Card()->find($id->card_id));
        }
        return $return;
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
