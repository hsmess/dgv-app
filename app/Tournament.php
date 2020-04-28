<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $dates = ['start_time'];
    public function players()
    {
        return $this->hasMany(TournamentPlayer::class);
    }
    public function rounds()
    {
        return $this->hasMany(TournamentRound::class);
    }
}
