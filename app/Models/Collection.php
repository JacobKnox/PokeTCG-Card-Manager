<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pokemon\Models\Card;
use Illuminate\Support\Facades\DB;

class Collection extends Model
{
    use HasFactory;

    public array $cards;

    public function add_card(String $card_id){
        array_push($cards, $card_id);
        DB::table('collectionrelationships')->insert(
            ['collection_id' => $this->id,
            'card_id' => $card_id
        ]);
    }

    public function cards()
    {
        return $this->cards;
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
