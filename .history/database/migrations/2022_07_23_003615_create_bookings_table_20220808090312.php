<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // if(Schema::hasTable('bookings')) return;  
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->timestamp('checkin')->nullable();
            $table->timestamp('checkout')->nullable();
            $table->integer('customer_id');
            $table->integer('room_id');
            $table->integer('guest');
            // $table->integer('adults');
            // $table->integer('children')->default(0);
            $table->decimal('price');
            $table->text('note');
            $table->boolean('payment')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
