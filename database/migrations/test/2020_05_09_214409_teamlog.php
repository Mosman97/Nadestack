<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB;

class Teamlog extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('teamlogs', function (Blueprint $table) {
            $table->uuid('action_id')->primary();
            $table->uuid("action_parent_id")->null();
            $table->bigInteger("user_id");
            $table->foreignId('team_id')->null();
            $table->text('action');
            $table->text('logtext');
            $table->timestamps();
        });

        //Creating Action Categories
        // Insert some stuff
        DB::table('teamlogs')->insert(
                array(
                    'action' => 'team_create',
                )
        );
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('teamlogs');
    }

}
