<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tournament extends Model
{
    protected $dates = ['start_time'];
    public function rounds()
    {
        return $this->hasMany(Round::class);
    }
    public function players()
    {
        return $this->hasMany(Player::class);
    }
    public function users()
    {
        return $this->hasManyThrough(User::class,Player::class);
    }

    public function authUserIsRegistered()
    {
        if(Player::where('tournament_id',$this->id)->where('user_id',Auth::user()->id)->first() != null)
        {
            return true;
        }
        return false;
    }
    public function getTotalRegisteredPlayersAttribute()
    {
        return $this->players()->count();
    }
}
