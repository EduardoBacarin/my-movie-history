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
        Schema::create('movies_has_directors', function (Blueprint $table) {
            $table->id();
            $table->foreignId("movies_id")->references('id')->on('movies');
            $table->foreignId("directors_id")->references('id')->on('directors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies_has_directors');
    }
};
