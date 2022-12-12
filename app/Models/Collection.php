<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pokemon\Pokemon;
use Illuminate\Support\Facades\DB;

class Collection extends Model
{
    use HasFactory;

    public function addCards(?array $card_ids){
        if($card_ids == null){
            return;
        }
        foreach($card_ids as $id){
            DB::table('collectionrelationships')->insert(
                ['collection_id' => $this->id,
                'card_id' => $id
            ]);
        }
        $this->num_cards = $this->num_cards + count($card_ids);
    }

    public function getCards()
    {
        $cards = DB::table('collectionrelationships')->select('card_id')->where('collection_id', $this->id)->get();
        $return = collect();
        foreach($cards as $id){
            $return->add(Pokemon::Card()->find($id->card_id));
        }
        $this->num_cards = count($return);
        return $return;
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
