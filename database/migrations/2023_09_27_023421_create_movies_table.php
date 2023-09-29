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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->foreignId("genres_id")->references('id')->on('genres');
            $table->foreignId("types_id")->references('id')->on('types');
            $table->string("name", 250);
            $table->string("banner", 250);
            $table->string("cover", 250);
            $table->longText("sinopsys");
            $table->date("release_date")->nullable();
            $table->string("imdb_url", 250)->nullable();
            $table->string("country", 250)->nullable();
            $table->string("lenght")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
