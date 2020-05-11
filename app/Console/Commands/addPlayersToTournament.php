<?php

namespace App\Console\Commands;

use App\Player;
use App\Tournament;
use App\User;
use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class addPlayersToTournament extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tournament:players {tournament}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tournament = Tournament::find($this->argument('tournament'));
        $config = config('enums.format_details')[$tournament->id]['players'];
        $rand = $this->ourRand(config('enums.format_details')[$tournament->id]['players']['min'],config('enums.format_details')[$tournament->id]['players']['max']);
        for($i=0;$i<$rand;$i++)
        {
            $faker = Factory::create();
            $user = new User();
            $user->email = $faker->email;
            $user->name = $faker->name;
            $user->avatar = "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80";
            $user->password = bcrypt('depot1');
            $user->save();
            $player = new Player();
            $player->user_id = $user->id;
            $player->dgv_name = $faker->word;
            $player->tournament_id = $tournament->id;
            $player->save();
        }
    }

    public function ourRand($min,$max)
    {
       return $max - mt_rand(mt_rand($min, $max),$max);
    }
}
