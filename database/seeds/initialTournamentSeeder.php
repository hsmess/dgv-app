<?php

use Illuminate\Database\Seeder;

class initialTournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //SEEDING based on previous finishes
        $tournament = new \App\Tournament();
        $tournament->name = 'Tuesday Tourney - 28/04';
        $tournament->start_time = \Carbon\Carbon::parse('2020-04-28 20:00:00');
        $tournament->max_players = 32;
        $tournament->structure = 0;
        $tournament->host_user_id = 1;
        $tournament->save();
        $base_ntrcid = \App\TournamentRoundCard::latest()->first()->id ?? 0;

        $rounds = collect(config('enums.structure')[$tournament->structure]['master_structure'])->map(function ($item){
            return count($item);
        });
        $rt = 1;
        $cumulative_games = $rounds->map(function ($item) use (&$rt){
            $return = $rt;
            $rt += $item;
            return $return;
        });
        $rounds->each(function ($cards, $i) use ($tournament,$base_ntrcid, $cumulative_games){
            $round = new \App\TournamentRound();
            $round->tournament_id = $tournament->id;
            $round->order = $i;
            $round->max_players_per_card = 4;
            $round->max_cards = $cards;
            $round->prioritise_cards = 1;
            $round->save();
            //TODO: WORK OUT WHAT NEEDS TO BE 0, WHAT NEEDS TO START ON A NUMBER (AS KEYS ARE CONTINUAL IN CONFIG)
            $rt = $cumulative_games[$i];
            for($j=$rt;$j<$cards+$rt;$j++)
            {
                $card = new \App\TournamentRoundCard();
                $card->tournament_round_id = $round->id;
                $card->number_of_games = config('enums.structure')[$tournament->structure]['number_of_games'][$i-1];
                $card->number_of_players_progress = count(config('enums.structure')[$tournament->structure]['master_structure'][$i][$j]);
                $card->save();
                for($k=0;$k<$card->number_of_players_progress; $k++)
                {
                    $meta = new \App\TournamentRoundCardInstruction();
                    $meta->tournament_round_card_id = $card->id;
                    $meta->finishing_position = $k+1;
                    $meta->next_tournament_round_card_id = config('enums.structure')[$tournament->structure]['master_structure'][$i][$j][$k] + $base_ntrcid;
                    $meta->save();
                }
            }
        });
    }
}
