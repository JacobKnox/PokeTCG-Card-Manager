<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    public function decks()
    {
        return $this->belongsToMany(Deck::class, 'deckrelationships');
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'collectionrelationships');
    }
}
