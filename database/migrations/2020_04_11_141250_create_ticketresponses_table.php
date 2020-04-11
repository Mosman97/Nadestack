<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketresponsesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ticketresponses', function (Blueprint $table) {
            $table->bigIncrements('ticket_response_id');
            $table->bigInteger('user_id');
            $table->longtext('content');
            $table->bigIncrements("attached_file_id_1")->nullable();
            $table->string('title');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('ticketresponses');
    }

}
