<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tickets extends Migration {

    public function up() {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('ticket_id');
            $table->bigInteger('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->string("category");
            $table->string('title');
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::create('ticketresponses', function (Blueprint $table) {
            $table->bigIncrements('ticket_response_id');
            $table->bigInteger("ticket_id")->unsigned();
            $table->foreign('ticket_id')->references('ticket_id')->on('tickets');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->longtext('content');
            $table->bigInteger("attached_file_id_1")->nullable();
            $table->bigInteger("attached_file_id_2")->nullable();
            $table->bigInteger("attached_file_id_3")->nullable();
            $table->timestamps();
        });

    }

    public function down() {
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('ticketresponses');
    }

}
