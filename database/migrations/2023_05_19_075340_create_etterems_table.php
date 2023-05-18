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
        Schema::create('etterems', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->string('cim');
            $table->string('telszam');
            $table->unsignedBigInteger('tulajID');
            $table->timestamps();
            $table->foreign('tulajID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etterems');
    }
};
