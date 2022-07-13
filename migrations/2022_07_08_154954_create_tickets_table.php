<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('t_id');
            $table->timestamps();
            $table->foreignId('communication_id');
            $table->foreignId('senderE_id');
            $table->foreignId('receiverE_id');
            $table->foreignId('p_id');
            $table->text('description');
            $table->integer('priority');
            $table->integer('state');
            $table->binary('archived');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
