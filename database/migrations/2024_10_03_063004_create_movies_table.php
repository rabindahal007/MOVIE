<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); // Primary key, auto-increment
            $table->integer('tmdb_id')->unique(); // ID from TMDB API
            $table->string('title');
            $table->string('original_title')->nullable();
            $table->text('overview')->nullable();
            $table->date('release_date')->nullable();
            $table->decimal('popularity', 10, 2)->nullable();
            $table->decimal('vote_average', 3, 1)->nullable();
            $table->integer('vote_count')->nullable();
            $table->string('poster_path')->nullable(); // Path to the poster image
            $table->string('backdrop_path')->nullable(); // Path to the backdrop image
            $table->string('genre_ids')->nullable(); // Comma-separated genre IDs
            $table->string('language', 10)->nullable(); // Original language
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
