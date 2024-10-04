<?php

namespace App\Services;

use GuzzleHttp\Client;

class TmdbService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('TMDB_API_KEY'); // Store your API key in .env file
    }

    public function searchMovies($query)
    {
        $response = $this->client->get("https://api.themoviedb.org/3/search/movie", [
            'query' => [
                'api_key' => $this->apiKey,
                'query' => $query,
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function getMovieDetails($id)
    {
        $response = $this->client->get("https://api.themoviedb.org/3/movie/{$id}", [
            'query' => [
                'api_key' => $this->apiKey,
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }
}
