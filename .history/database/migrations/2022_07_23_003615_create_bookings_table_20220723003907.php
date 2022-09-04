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
        if(Schema::hasTable('bookings')) return;  
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('phone_number');
            $table->string('email');
            $table->integer('adults');
            $table->integer('children')->default(0);
            $table->decimal('price');
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
