<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class News extends Migration {

    public function up() {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('news_id');
            $table->longtext('news_title');
            $table->string("news_subheading");
            $table->string('news_author');
            $table->longtext('news_content');
            $table->timestamps();
        });

        Schema::create('newscomments', function (Blueprint $table) {
            $table->bigIncrements('newscomment_id')->primaray();
            $table->bigInteger('news_id')->unsigned();
            $table->foreign('news_id')->references('news_id')->on('news');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->longText('comment');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('news');
        Schema::dropIfExists('newscomments');
    }

}
