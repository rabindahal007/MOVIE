<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the default
    protected $table = 'movies';

    // Fillable attributes to allow mass assignment
    protected $fillable = [
        'tmdb_id',
        'title',
        'original_title',
        'overview',
        'release_date',
        'popularity',
        'vote_average',
        'vote_count',
        'poster_path',
        'backdrop_path',
        'genre_ids',
        'language',
    ];

    // Optionally define relationships here
    // For example, if a movie has many reviews:
    // public function reviews()
    // {
    //     return $this->hasMany(Review::class);
    // }
}
