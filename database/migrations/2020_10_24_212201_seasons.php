<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Seasons extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('league_seasons', function (Blueprint $table) {
            $table->uuid('season_id')->primary();
            $table->text("season_name");
            $table->timestamp("season_start");
            $table->timestamp("season_end");
            $table->integer("registered_teams");
            $table->integer("registered_players");
            $table->boolean("is_active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
