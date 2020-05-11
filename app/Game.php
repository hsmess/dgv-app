<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
