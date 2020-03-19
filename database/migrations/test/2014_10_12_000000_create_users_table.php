<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('steamid')->unique()->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->bigInteger('team_id')->nullable();
            $table->longtext('user_settings')->nullable();
            $table->string("forname")->nullable();
            $table->string("lastname")->nullable();
            $table->date("birthday")->nullable();
            $table->longtext("profiledescription")->nullable();
            $table->string("twitter_url")->nullable();
            $table->string("twitch_url")->nullable();
            $table->string("instagram_url")->nullable();
            $table->string("youtube_url")->nullable();
            $table->string("faceit_url")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        //Changing the Start Value of Auto Increment to Hide some Datbase Structure
        DB::statement("ALTER TABLE users AUTO_INCREMENT = 5135;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
