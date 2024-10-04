<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Services\TmdbService; // Ensure you include the TmdbService
use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected $tmdbService;

    public function __construct(TmdbService $tmdbService)
    {
        $this->tmdbService = $tmdbService; // Initialize the TmdbService
    }

    public function index()
    {
        $movies = Movie::all(); // Retrieve all movies
        return view('movies', compact('movies')); // Pass movies to the view
    }

    public function search(Request $request)
    {
        $request->validate(['query' => 'required|string|max:255']); // Validate the input
        
        // Call the search method from TmdbService
        $movies = $this->tmdbService->searchMovies($request->input('query'));

        // Return the movies as a JSON response
        return response()->json($movies);
    }
}
