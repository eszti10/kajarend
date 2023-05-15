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
        Schema::create('felhasznalos', function (Blueprint $table) {
            $table->id();
            $table->string('fnev');
            $table->string('jelszo');
            $table->string('email');
            $table->string('vnev');
            $table->string('knev');
            $table->string('cim');
            $table->unsignedBigInteger('jogosultsagID');
            $table->timestamps();
            $table->foreign('jogosultsagID')->references('id')->on('jogosultsags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('felhasznalos');
    }
};
