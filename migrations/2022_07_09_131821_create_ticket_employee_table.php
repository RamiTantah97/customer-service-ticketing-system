<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_employees', function (Blueprint $table) {
            $table->id('te_id');
            $table->timestamps();
            $table->foreignId('u_id');
            $table->foreignId('t_id');
            $table->integer('sendOrReceive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_employee');
    }
}
