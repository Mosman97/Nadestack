<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchCategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('search_categories', function (Blueprint $table) {
            $table->increments('search_category_id');
            $table->bigInteger('search_ranking');
            $table->string('search_category_icon');
            $table->string('search_category_text');
        });

        DB::table('search_categories')->insert(
                array(
                    'search_category_id' => 1,
                    'search_ranking' => 1,
                    'search_category_icon' => 'fa fa-shield-alt',
                    'search_category_text' => 'Player'
                )
        );
        DB::table('search_categories')->insert(
                array(
                    'search_category_id' => 2,
                    'search_ranking' => 2,
                    'search_category_icon' => 'fa fa-shield-alt',
                    'search_category_text' => 'Team'
                )
        );
        DB::table('search_categories')->insert(
                array(
                    'search_category_id' => 3,
                    'search_ranking' => 3,
                    'search_category_icon' => 'fa fa-shield-alt',
                    'search_category_text' => 'News'
                )
        );
        DB::table('search_categories')->insert(
                array(
                    'search_category_id' => 4,
                    'search_ranking' => 4,
                    'search_category_icon' => 'fa fa-shield-alt',
                    'search_category_text' => 'Forum'
                )
        );
        DB::table('search_categories')->insert(
                array(
                    'search_category_id' => 5,
                    'search_ranking' => 5,
                    'search_category_icon' => 'fa fa-shield-alt',
                    'search_category_text' => 'Comment'
                )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('search_categories');
    }

}
