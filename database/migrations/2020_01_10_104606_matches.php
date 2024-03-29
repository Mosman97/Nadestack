<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Matches extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('matches', function (Blueprint $table) {
            $table->uuid('match_id')->primary();
            $table->bigInteger('team_1_id');
            $table->bigInteger('team_2_id');
            $table->uuid('vetolog_id');
            $table->bigInteger('state');
            $table->longtext('match_results')->nullable();
            $table->longtext('match_log')->nullable();
            $table->boolean('match_closed');
            $table->dateTime('match_date');
            $table->dateTime('team_1_confirmation_date');
            $table->dateTime('team_2_confirmation_date');
            $table->bigInteger('sug_team_id');
            $table->string('server_ip');
            $table->timestamps();



            //Settings the Foreign Keys
            //$table->foreign('vetolog_id')->references('vetolog_id')->on('mapvetos');
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
