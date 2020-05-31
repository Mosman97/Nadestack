<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_reports', function (Blueprint $table) {
            $table->increments('forum_report_id');
            $table->bigInteger('user_id');
            $table->integer('forum_post_id')->unsigned();
            $table->foreign('forum_post_id')->references('forum_post_id')->on('forum_posts');
            $table->longtext('forum_report_message');
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
        Schema::dropIfExists('forum_reports');
    }
}
