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
        Schema::create('users_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId("users_id")->references('id')->on('users');
            $table->foreignId("movies_id")->references('id')->on('movies');
            $table->integer("stars");
            $table->string("comment", 240)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_reviews');
    }
};
