<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password'
    ];

    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string, string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function setUsername(String $newUsername){
        $this->username = $newUsername;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setEmail(String $newEmail){
        $this->email = $newEmail;
    }

    public function getEmail(){
        return $this->email;
    }

    public function decks()
    {
        return $this->hasMany(Deck::class, 'user_id');
    }

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }
}
