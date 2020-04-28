<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\TournamentPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TournamentController extends Controller
{
    public function showRegister(Tournament $tournament)
    {
        return view('register',compact('tournament'));
    }
    public function register(Tournament $tournament, Request $request)
    {
        $user = Auth::user();
        $user->disc_golf_valley_name = $request->disc_golf_valley_name;
        $user->save();
        if($tournament->players->count() >= $tournament->max_players)
        {
            $request->session()->flash('error', __('This tournament is full, apologies. Please try again later, or we will see you next time.'));
            return redirect()->back();
        }
        else{
            $tournamentPlayer = TournamentPlayer::where('tournament_id',$tournament->id)->where('user_id',Auth::user()->id)->first();
            if($tournamentPlayer)
            {
                $request->session()->flash('status', __('You were already registered for this tournament'));
                return redirect()->back();
            }
            $tp = TournamentPlayer::create(['tournament_id' => $tournament->id,'user_id' => Auth::user()->id]);
            $request->session()->flash('status', __('You have been registered'));
            return redirect()->to('tournaments/'.$tournament->id);
        }
    }
    public function playerDashboard(Tournament $tournament, Request $request)
    {
        $tournamentPlayer = TournamentPlayer::where('tournament_id',$tournament->id)->where('user_id',Auth::user()->id)->first();
        if($tournamentPlayer == null)
        {
            $request->session()->flash('error', __('Redirected to spectator dashboard. You are not registered'));
            return redirect()->to('tournaments/'.$tournament->id.'/spectate');
        }
        return view('dashboards.playerdashboard',compact('tournament'));
    }
    public function adminDashboard(Tournament $tournament, Request $request)
    {
        if(!Auth::user()->is_admin)
        {
            $request->session()->flash('error', __('Redirected to spectator dashboard. You are not running this tournament'));
            return redirect()->to('tournaments/'.$tournament->id.'/spectate');
        }
        return view('dashboards.admindashboard',compact('tournament'));
    }
    public function streamerDashboard(Tournament $tournament, Request $request)
    {
        return view('dashboards.streamerdashboard',compact('tournament'));
    }
}
