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
            $table->string('team_logo')->nullable();
            $table->string('team_password');
            $table->string('team_desc')->nullable();
            $table->integer('team_admin_userid');
            $table->longtext('team_member_id')->nullable();
            $table->longtext('team_socials')->nullable();
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
        //
    }

}
