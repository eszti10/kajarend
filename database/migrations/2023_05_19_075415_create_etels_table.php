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
        Schema::create('etels', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->integer('ar');
            $table->unsignedBigInteger('kategoriaID');
            $table->unsignedBigInteger('etteremID');
            $table->timestamps();
            $table->foreign('kategoriaID')->references('id')->on('kategorias');
            $table->foreign('etteremID')->references('id')->on('etterems');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etels');
    }
};
