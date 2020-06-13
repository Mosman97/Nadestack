<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumPostsDeleted extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_posts_deleted', function (Blueprint $table) {
            $table->increments('forum_delete_id');
            $table->bigInteger('user_id');
            $table->bigInteger('admin_id');
            $table->integer('forum_post_id')->unsigned();
            $table->foreign('forum_post_id')->references('forum_post_id')->on('forum_posts');
            $table->longtext('post_content');
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
        Schema::dropIfExists('forum_posts_deleted');
    }
}
