<?php

namespace App\Http\Controllers\Api;

use App\Events\AdminNewMessage;
use App\Http\Controllers\Controller;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TournamentController extends Controller
{
    public function updateStatus(Tournament $tournament, int $status)
    {
        $tournament->status = $status;
        $tournament->save();
        event(new AdminNewMessage(['message' => 'hello world','state'=> $status]));
        if($status == 2)
        {
           $tournament->notifyAllPlayersOfStart();
        }



        return response()->json(true);
    }
    public function roundCompleted(Tournament $tournament, int $status)
    {
        //Handle the round completion
        //event(new AdminNewMessage(['message' => 'hello world','state'=> $status]));
        return response()->json(true);
    }

}
