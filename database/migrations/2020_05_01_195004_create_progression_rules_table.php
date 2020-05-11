<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressionRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progression_rules', function (Blueprint $table) {
            $table->id();
            $table->integer('round_id');
            $table->integer('number_of_players');
            $table->integer('progression_round_id')->nullable();//Null means eliminated
            $table->string('condition')->nullable();//Null means eliminated
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
        Schema::dropIfExists('progression_rules');
    }
}
