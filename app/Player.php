<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
    public function round()
    {
        return $this->belongsToMany(Round::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function scores()
    {
        return $this->belongsToMany(Game::class,'scores');
    }

}
