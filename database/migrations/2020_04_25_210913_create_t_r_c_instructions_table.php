<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRCInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_round_card_instructions', function (Blueprint $table) {
            $table->id();
            $table->integer('tournament_round_card_id');
            $table->integer('finishing_position');
            $table->integer('next_tournament_round_card_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournament_round_card_instructions');
    }
}
