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
        Schema::create('rendeleses', function (Blueprint $table) {
            $table->id();
            $table->string('megjegyzés');
            $table->datetime('datum');
            $table->unsignedBigInteger('felhasznaloID');
            $table->unsignedBigInteger('statuszID');
            $table->unsignedBigInteger('fizetesmodID');
            $table->unsignedBigInteger('futarID');
            $table->timestamps();
            $table->foreign('felhasznaloID')->references('id')->on('users');
            $table->foreign('statuszID')->references('id')->on('statuszs');
            $table->foreign('fizetesmodID')->references('id')->on('fizetesmods');
            $table->foreign('futarID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendeleses');
    }
};
