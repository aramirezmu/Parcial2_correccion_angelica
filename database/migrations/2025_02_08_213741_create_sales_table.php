<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('movie_id'); 
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->integer('number_of_tickets');
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
