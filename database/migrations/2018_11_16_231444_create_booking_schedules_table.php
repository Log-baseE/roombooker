<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('booking_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');

            $table->foreign('booking_id')
                  ->references('id')->on('booking_drafts')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_schedules');
    }
}
