<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Matchveto extends Migration
{
    public function up() {
        Schema::create('mapvetos', function (Blueprint $table) {

            //Setting Attributes
            $table->uuid('vetolog_id')->primary();
            $table->uuid('match_id');
            $table->Boolean('team_1_ready');
            $table->Boolean('team_2_ready');
            $table->timestamp('vote_timer')->nullable();
            $table->uuid('team_1_ban_1')->nullable();
            $table->uuid('team_2_ban_1')->nullable();
            $table->uuid('team_1_ban_2')->nullable();
            $table->uuid('team_2_ban_2')->nullable();
            $table->uuid('team_1_pick')->nullable();
            $table->uuid('team_2_pick')->nullable();
            $table->uuid('decider_map')->nullable();
            
            //Settings the Foreign Keys
          // $table->foreign('match_id')->references('match_id')->on('matches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('mapvetos');
    }
}
