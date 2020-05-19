<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Game;
use App\Player;
use App\ProgressionRule;
use App\Round;
use App\Tournament;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TournamentController extends Controller
{
//    public function create(Request $request)
//    {
//        if(Auth::user()->is_admin)
//        {
//            $formats = config('enums.formats');
//            return view('tournaments.create',compact('formats'));
//        }
//        else{
//            $request->session()->flash('error', __('You are not an administrator. Please check you should be trying to do this.'));
//            return redirect()->back();
//        }
//
//
//    }
//
//    public function store(Request $request)
//    {
//        if(Auth::user()->is_admin)
//        {
//            $tournament = new Tournament();
//            $tournament->start_time = $request->start_time;
//            $tournament->name = $request->tournament_name;
//            $tournament->format = $request->dgv_format;
//            $tournament->status = 0;
//            $tournament->save();
//            //CREATE THE ROUNDS
//            $mount = collect(config('enums.format_details')[$tournament->format]['rounds']);
//            $format_details = $mount->mapWithKeys(function ($item, $key) use ($tournament){
//                $round = new Round();
//                $round->tournament_id = $tournament->id;
//                $round->name = $item['name'];
//                $round->players_per_group_min = $item['players_per_group_min'];
//                $round->players_per_group_max = $item['players_per_group_max'];
//                $round->order = $key;
//                $round->save();
//                collect($item['progression'])->each(function ($item2) use ($round){
//                    $rule = new ProgressionRule();
//                    $rule->round_id = $round->id;
//                    $rule->number_of_players = $item2['number'];
//                    $rule->progression_round_id = $item2['round'];
//                    $rule->condition = $item2['condition'] ?? null;
//                    $rule->save();
//                });
//                for($i=0;$i<$item['games'];$i++)
//                {
//                    $game = new Game();
//                    $game->round_id = $round->id;
//                    $game->save();
//                }
//                return [$key => $round->id];
//            });
//            $request->session()->flash('status', __('Success, the tournament has been created.'));
//            return redirect()->to('/tournaments');
//        }
//        $request->session()->flash('error', __('You must be an admin to start a tournament'));
//        return redirect()->back();
//
//    }
//
//    public function index()
//    {
//        $tournaments = Tournament::where('status', '<', 3)->orderBy('status', 'desc')->get();
//
//        return view('home', compact('tournaments'));
//    }
//    public function showRegistration(Tournament $tournament)
//    {
//        return view('register',compact('tournament'));
//    }
//    public function register(Tournament $tournament, Request $request)
//    {
//        if($tournament->authUserIsRegistered())
//        {
//            $request->session()->flash('error', __('You are already registered for this tournament. It starts ' . $tournament->start_time->diffForHumans()));
//            return redirect()->to('/tournaments');
//        }
//        if(Player::where('tournament_id',$tournament->id)->count() < config('enums.format_details')[$tournament->format]['players']['max'])
//        {
//            $player = new Player();
//            $player->user_id = Auth::user()->id;
//            $player->tournament_id = $tournament->id;
//            $player->dgv_name = $request->disc_golf_valley_name;
//            $player->save();
//            $request->session()->flash('status', __('You are registered. You will recieve an email reminder 2 hours before the start, if the start is more than two hours away.'));
//            return redirect()->to('/tournaments');
//        }
//        else{
//            $request->session()->flash('error', __('The tournament is already full'));
//            return redirect()->to('/tournaments');
//        }
//
////        $user = Auth::user();
////        $user->disc_golf_valley_name = $request->disc_golf_valley_name;
////        $user->save();
////        if($tournament->players->count() >= $tournament->max_players)
////        {
////            $request->session()->flash('error', __('This tournament is full, apologies. Please try again later, or we will see you next time.'));
////            return redirect()->back();
////        }
////        else{
////            $tournamentPlayer = TournamentPlayer::where('tournament_id',$tournament->id)->where('user_id',Auth::user()->id)->first();
////            if($tournamentPlayer)
////            {
////                $request->session()->flash('status', __('You were already registered for this tournament'));
////                return redirect()->back();
////            }
////            $tp = TournamentPlayer::create(['tournament_id' => $tournament->id,'user_id' => Auth::user()->id]);
////            $request->session()->flash('status', __('You have been registered'));
////            return redirect()->to('tournaments/'.$tournament->id);
////        }
//    }
//    public function playerDashboard(Tournament $tournament, Request $request)
//    {
//        $player = Player::where('tournament_id',$tournament->id)->where('user_id',Auth::user()->id)->first();
//        if($player == null)
//        {
//            $request->session()->flash('error', __('You are not registered'));
//            return redirect()->back();
//        }
//        return view('dashboards.playerdashboard',compact('tournament','player'));
//    }
//    public function adminDashboard(Tournament $tournament, Request $request)
//    {
//        $tournament = Tournament::find($tournament->id)->with('players.user')->with('rounds')->first();
//        if(!Auth::user()->is_admin)
//        {
//            $request->session()->flash('error', __('Redirected. You are not an administrator'));
//            return redirect()->to('tournaments/'.$tournament->id.'/spectate');
//        }
//        $tournament->players = $tournament->players->map(function ($item){
//            $item->name = $item->user->name;
//            $item->avatar = $item->user->avatar;
//            return $item;
//        });
//        return view('dashboards.admindashboard',compact('tournament'));
//    }
//    public function streamerDashboard(Tournament $tournament, Request $request)
//    {
//        return view('dashboards.streamerdashboard',compact('tournament'));
//    }
    public function incrementBatch(Request $request)
    {
        $batch = new Batch();
        $batch->is_hops = $request->hops == 1 ? true : false;
        $batch->save();
        return redirect()->back();
    }
}
