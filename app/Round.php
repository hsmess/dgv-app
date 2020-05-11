<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    public function games()
    {
        return $this->hasMany(Game::class);
    }
    public function players()
    {
        return $this->belongsToMany(Player::class);
    }
}
