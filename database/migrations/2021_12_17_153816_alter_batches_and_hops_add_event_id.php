<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBatchesAndHopsAddEventId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('d_g_v_media', function (Blueprint $table) {
            $table->integer('event_id')->nullable();
        });
        Schema::table('batches', function (Blueprint $table) {
            $table->integer('event_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('d_g_v_media', function (Blueprint $table) {
            $table->dropColumn('event_id');
        });
        Schema::table('batches', function (Blueprint $table) {
            $table->dropColumn('event_id');
        });
    }
}
