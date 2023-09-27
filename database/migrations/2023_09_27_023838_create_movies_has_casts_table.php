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
        Schema::create('movies_has_casts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("movies_id")->references('id')->on('movies');
            $table->foreignId("casts_id")->references('id')->on('casts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies_has_casts');
    }
};
