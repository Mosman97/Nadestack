<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Divisions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('league_divisons', function (Blueprint $table) {
            $table->uuid('divison_id')->primary();
            $table->foreignId('season_id');
            $table->text("divison_name");
            $table->integer("team_limit");
            $table->integer("rank");
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
        //
    }
}
