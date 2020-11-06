<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeagueTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Seasons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('season_start');
            $table->date('season_end');
            $table->bigInteger('registered_teams');
            $table->bigInteger('registered_players');
            $table->boolean('is_active');
            $table->bigInteger('team_limit');
            $table->date('reg_end');
            $table->timestamps();
        });

        Schema::create('Season_Registration', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('season_id');
            $table->bigInteger('team_id');
            $table->date('reg_date');
            $table->timestamps();
        });

        Schema::create('Divisions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('season_id');
            $table->string('name');
            $table->bigInteger('team_limit');
            $table->bigInteger('rank');
            $table->timestamps();
        });

        Schema::create('MatchStats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('match_id');
            $table->bigInteger('map_id');
            $table->bigInteger('team_1_rounds');
            $table->bigInteger('team_2_rounds');
            $table->timestamps();
        });

        Schema::create('PlayerStats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('match_stats_id');
            $table->bigInteger('player_id');
            $table->timestamps();
        });

        Schema::create('RoundStats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('match_stats_id');
            $table->bigInteger('team_id');
            $table->bigInteger('round');
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
        Schema::dropIfExists('Seasons');
        Schema::dropIfExists('Season_Registration');
        Schema::dropIfExists('Divisions');
        Schema::dropIfExists('MatchStats');
        Schema::dropIfExists('PlayerStats');
        Schema::dropIfExists('RoundStats');
    }
}
