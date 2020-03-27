<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class News extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('news_id');
            $table->longtext('news_title');
            $table->string("news_subheading");
            $table->string('news_author');
            $table->longtext('news_content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('news');
    }

}
