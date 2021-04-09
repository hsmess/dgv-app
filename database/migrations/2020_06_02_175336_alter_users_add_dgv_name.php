<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersAddDgvName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('disc_golf_valley_name')->nullable();
        });
        Schema::table('d_g_v_media', function (Blueprint $table) {
            $table->boolean('is_hof')->default(0);
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
            $table->dropColumn('is_hof');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('disc_golf_valley_name');
        });
    }
}
