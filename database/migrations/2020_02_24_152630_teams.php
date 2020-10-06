<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Teams extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('team_id');
            $table->string('team_name');
            $table->string('team_tag');
            $table->string('team_orga')->nullable;
            $table->string('team_logo')->nullable();
            $table->string('team_password');
            $table->string('team_desc')->nullable();
            $table->smallInteger('team_reamining_slots');
            $table->bigInteger('team_admin_id');
            $table->bigInteger('team_captain_1_id')->nullable();
            $table->bigInteger('team_captain_2_id')->nullable();
            $table->bigInteger('team_manager_id')->nullable();
            $table->bigInteger("team_coach_id")->nullable();
            $table->string("team_website")->nullable();
            $table->string("twitter_url")->nullable();
            $table->string("twitch_url")->nullable();
            $table->string("instagram_url")->nullable();
            $table->string("youtube_url")->nullable();
            $table->timestamps();
        });

        //Changing the Start Value of Auto Increment to Hide some Datbase Structure
        DB::statement("ALTER TABLE teams AUTO_INCREMENT = 21042;");
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::dropIfExists('teams');
    }

}
