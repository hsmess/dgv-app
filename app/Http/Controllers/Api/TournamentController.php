<?php

namespace App\Http\Controllers\Api;

use App\Events\AdminNewMessage;
use App\Http\Controllers\Controller;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TournamentController extends Controller
{
    public function start(Tournament $tournament)
    {
        $tournament->state = 1;
        $tournament->save();
        event(new AdminNewMessage(['message' => 'hello world','state'=> 1]));
        return response()->json(true);
    }

}
