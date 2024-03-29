<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Teamlog extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('teamlogs', function (Blueprint $table) {
            $table->uuid('action_id')->primary();
            $table->uuid("action_parent_id")->nullable();
            $table->bigInteger("user_id")->nullable();
            $table->foreignId('team_id')->nullable();
            $table->bigInteger("target_id")->nullable();
            $table->text('action');
            $table->text('logtext')->nullable();
            $table->timestamps();
        });

        //Creating Action Categories
        //Creating team_create Action
        DB::table('teamlogs')->insert(
                array(
                    'action_id' => Ramsey\Uuid\Nonstandard\Uuid::uuid4(),
                    'action_parent_id' => null,
                    'user_id' => null,
                    'team_id' => null,
                    'action' => 'team_created',
                    'logtext' => null
                )
        );
        //Creating team_leave Action
        DB::table('teamlogs')->insert(
                array(
                    'action_id' => Ramsey\Uuid\Nonstandard\Uuid::uuid4(),
                    'action_parent_id' => null,
                    'user_id' => null,
                    'team_id' => null,
                    'action' => 'team_leave',
                    'logtext' => null
                )
        );

        //Creating team_closed Action
        DB::table('teamlogs')->insert(
                array(
                    'action_id' => Ramsey\Uuid\Nonstandard\Uuid::uuid4(),
                    'action_parent_id' => null,
                    'user_id' => null,
                    'team_id' => null,
                    'action' => 'team_closed',
                    'logtext' => null
                )
        );

        //Creating Role Transfer Action

        DB::table('teamlogs')->insert(
                array(
                    'action_id' => Ramsey\Uuid\Nonstandard\Uuid::uuid4(),
                    'action_parent_id' => null,
                    'user_id' => null,
                    'team_id' => null,
                    'action' => 'memberrole_changed',
                    'logtext' => null
                )
        );

        //Creating Player Join Action

        DB::table('teamlogs')->insert(
                array(
                    'action_id' => Ramsey\Uuid\Nonstandard\Uuid::uuid4(),
                    'action_parent_id' => null,
                    'user_id' => null,
                    'team_id' => null,
                    'action' => 'member_joined',
                    'logtext' => null
                )
        );

        //Creating Player Left Action
        DB::table('teamlogs')->insert(
                array(
                    'action_id' => Ramsey\Uuid\Nonstandard\Uuid::uuid4(),
                    'action_parent_id' => null,
                    'user_id' => null,
                    'team_id' => null,
                    'action' => 'member_left',
                    'logtext' => null
                )
        );
        //Creating Player kicked Action
        DB::table('teamlogs')->insert(
                array(
                    'action_id' => Ramsey\Uuid\Nonstandard\Uuid::uuid4(),
                    'action_parent_id' => null,
                    'user_id' => null,
                    'team_id' => null,
                    'action' => 'member_kicked',
                    'logtext' => null
                )
        );
        //Creating Team Settings Update Action
        DB::table('teamlogs')->insert(
                array(
                    'action_id' => Ramsey\Uuid\Nonstandard\Uuid::uuid4(),
                    'action_parent_id' => null,
                    'user_id' => null,
                    'team_id' => null,
                    'action' => 'settings_changed',
                    'logtext' => null
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
