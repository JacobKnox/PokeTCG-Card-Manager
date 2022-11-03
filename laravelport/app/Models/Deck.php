<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    use HasFactory;

    public function cards()
    {
        return $this->belongsToMany(Card::class, 'deckrelationships');
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
