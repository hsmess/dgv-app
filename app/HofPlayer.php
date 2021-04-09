<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HofPlayer extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function media()
    {
        return $this->belongsTo(DGVMedia::class);
    }
}
