<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumTables extends Migration {

    public function up() {
        Schema::create('forum_categories', function (Blueprint $table) {
            $table->increments('forum_category_id');
            $table->bigInteger('forum_ranking');
            $table->longtext('forum_category_title');
            $table->string('forum_category_icon');
            $table->longtext('forum_category_text');
        });

        Schema::create('forum_threads', function (Blueprint $table) {
            $table->increments('forum_thread_id');
            $table->longtext('forum_thread_title');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('forum_category_id')->unsigned();
            $table->foreign('forum_category_id')->references('forum_category_id')->on('forum_categories');
            $table->tinyInteger('is_closed')->default('0');
            $table->timestamps();
        });

        Schema::create('forum_posts', function (Blueprint $table) {
            $table->increments('forum_post_id');
            $table->bigInteger('user_id');
            $table->integer('forum_thread_id')->unsigned();
            $table->foreign('forum_thread_id')->references('forum_thread_id')->on('forum_threads');
            $table->longtext('forum_post_content');
            $table->tinyInteger('is_deleted')->default('0');
            $table->timestamps();
        });

        Schema::create('forum_posts_deleted', function (Blueprint $table) {
            $table->increments('forum_delete_id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('users');
            $table->integer('forum_post_id')->unsigned();
            $table->foreign('forum_post_id')->references('forum_post_id')->on('forum_posts');
            $table->longtext('post_content');
            $table->timestamps();
        });

        Schema::create('forum_reports', function (Blueprint $table) {
            $table->increments('forum_report_id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('forum_post_id')->unsigned();
            $table->foreign('forum_post_id')->references('forum_post_id')->on('forum_posts');
            $table->longtext('forum_report_message');
            $table->timestamps();
        });

        //Adding Forum Categories

        DB::table('forum_categories')->insert(
                array(
                    'forum_category_id' => 1,
                    'forum_ranking' => 1,
                    'forum_category_title' => "General Discussion",
                    'forum_category_icon' => 'fa fa-shield-alt',
                    'forum_category_text' => 'General discussions about any eSports related topics'
                )
        );

        DB::table('forum_categories')->insert(
                array(
                    'forum_category_id' => 2,
                    'forum_ranking' => 2,
                    'forum_category_title' => "Player searching a team",
                    'forum_category_icon' => 'fa fa-users',
                    'forum_category_text' => 'If you\'re a player who currently a looking for a team. This is the place to go!'
                )
        );


        DB::table('forum_categories')->insert(
                array(
                    'forum_category_id' => 3,
                    'forum_ranking' => 3,
                    'forum_category_title' => "Team searching a player",
                    'forum_category_icon' => 'fa fa-user-plus',
                    'forum_category_text' => 'If you\'re a player who currently a looking for a team. This is the place to go!'
                )
        );

        DB::table('forum_categories')->insert(
            array(
                'forum_category_id' => 4,
                'forum_ranking' => 4,
                'forum_category_title' => "Competition Area",
                'forum_category_icon' => 'fa fa-trophy',
                'forum_category_text' => 'Here you can talk/discuss about leagues, tournaments and events'
            )
        );

        DB::table('forum_categories')->insert(
            array(
                'forum_category_id' => 5,
                'forum_ranking' => 5,
                'forum_category_title' => "Broadcast",
                'forum_category_icon' => 'fa fa-video',
                'forum_category_text' => 'Here you can talk/discuss about VODs, demos, livestreams, fragclips and similar stuff. Feel free to introduce yourself to the community!'
            )
        );

        DB::table('forum_categories')->insert(
            array(
                'forum_category_id' => 6,
                'forum_ranking' => 6,
                'forum_category_title' => "Feedback",
                'forum_category_icon' => 'fa fa-comment',
                'forum_category_text' => 'Here you can provide suggestions for improvement. We all can learn from each other, maybe you got the right idea what we could change in the future!'
            )
        );

        DB::table('forum_categories')->insert(
            array(
                'forum_category_id' => 7,
                'forum_ranking' => 7,
                'forum_category_title' => "Off-Topic",
                'forum_category_icon' => 'fa fa-bookmark',
                'forum_category_text' => 'Discussions on anything not seriously related to eSports or Nadestack'
            )
        );

        DB::table('forum_categories')->insert(
            array(
                'forum_category_id' => 8,
                'forum_ranking' => 8,
                'forum_category_title' => "Hardware & Tweaks",
                'forum_category_icon' => 'fa fa-desktop',
                'forum_category_text' => 'Here you can discuss about any technical stuff like talking about the newest hardware!'
            )
        );



        /*  INSERT INTO `forum_categories` (`forum_categories_id`, `forum_ranking`, `forum_categories_title`, `forum_categories_icon`, `forum_categories_text`) VALUES
          (1, 1, 'General Discussion', 'fa fa-shield-alt', 'General discussions about any eSports related topics'),
          (2, 2, 'Player searching a team', 'fa fa-users', 'If you\'re a player who currently a looking for a team. This is the place to go!'),
          (3, 3, 'Team searching a player', 'fa fa-user-plus', 'If you\'re a team who\'s currently looking for new valuable players. This is the place to go!'),
          (4, 4, 'Competition Area', 'fa fa-trophy', 'Here you can talk/discuss about leagues, tournaments and events'),
          (5, 5, 'Broadcast', 'fa fa-video', 'Here you can talk/discuss about VODs, demos, livestreams, fragclips and similar stuff. Feel free to introduce yourself to the community!'),
          (6, 6, 'Feedback', 'fa fa-comment', 'Here you can provide suggestions for improvement. We all can learn from each other, maybe you got the right idea what we could change in the future!'),
          (7, 7, 'Off-Topic', 'fa fa-bookmark', 'Discussions on anything not seriously related to eSports or Nadestack'),
          (8, 8, 'Hardware & Tweaks', 'fa fa-desktop', 'Here you can discuss about any technical stuff like talking about the newest hardware!'); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('forum_categories');
        Schema::dropIfExists('forum_threads');
        Schema::dropIfExists('forum_posts');
        Schema::dropIfExists('forum_posts_deleted');
        Schema::dropIfExists('forum_reports');
    }

}
