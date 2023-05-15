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
        Schema::create('rendelestetels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rendelesID');
            $table->unsignedBigInteger('etelID');
            $table->integer('darab');
            $table->timestamps();
            $table->foreign('rendelesID')->references('id')->on('rendeleses');
            $table->foreign('etelID')->references('id')->on('etels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendelestetels');
    }
};
