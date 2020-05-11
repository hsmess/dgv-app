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
        $user = new \App\User();
        $user->id = 1;
        $user->name = 'Harry Messenger';
        $user->email = 'harry@harrymessenger.co.uk';
        $user->avatar = 'https://graph.facebook.com/v3.3/546191346279586/picture?type=normal';
        $user->password = '$2y$10$tgCk39Me7HBcpZPexLnJn.0.N7t9a.yM020n2vOOMR4rzi/8Hq5/m';
        $user->is_admin = 1;
        $user->save();

    }
}
