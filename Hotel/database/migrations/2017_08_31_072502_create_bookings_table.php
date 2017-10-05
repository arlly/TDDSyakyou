<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('booking_date');
            $table->integer('room_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('room_id')
              ->references('id')
              ->on('rooms')
              ->onDelete('cascade')
              ->onUpdate('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('bookings');
    }
}
