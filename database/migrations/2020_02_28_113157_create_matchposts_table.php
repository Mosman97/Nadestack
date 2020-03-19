<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/**
 * This Migration is responsible for all Match posts
 */
class CreateMatchpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchposts', function (Blueprint $table) {
            $table->bigIncrements('matchpost_id')->primaray();
            $table->uuid('match_id');
            $table->bigInteger('user_id');
            $table->longText('comment');
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
        Schema::dropIfExists('matchposts');
    }
}
