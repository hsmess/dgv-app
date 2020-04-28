<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentPlayer extends Model
{
    protected $guarded = [];

    public function player()
    {
        return $this->belongsTo(User::class);
    }
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
