<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_hops');
            $table->timestamps();
        });
        Schema::table('d_g_v_media', function (Blueprint $table) {
            $table->integer('batch_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batches');
        Schema::table('d_g_v_media', function (Blueprint $table) {
            $table->dropColumn('batch_id');
        });
    }
}
