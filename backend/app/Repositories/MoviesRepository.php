<?php

namespace App\Repositories;

use App\Models\Movies;

class MoviesRepository {

    /**
     *
     */
    public function  getTopMovies() {
        $movies = Movies::orderBy('ranking')->get();
        foreach ($movies as $movie) {
            $movie->comments = $movie->comments()->count();
        }

        return $movies;
    }

    /**
     * @param $movie
     * @return array
     */
    public function getMovieDetails($movie) {
        $movie = Movies::where('id_imdb', $movie)->first();
        if (!isset($movie->title)) {
            return ['error' => true, 'message' => 'Movie does not exist!'];
        }

        return $movie;
    }

    /**
     * @throws \Exception
     */
    public function fetchTopMovies() {
        $content = file_get_contents("https://www.myapifilms.com/imdb/top?token=".env("MYAPIFILMS_TOKEN")."&format=json&data=0");
        $parsed = json_decode($content);

        if (isset($parsed->error)) {
            throw new \Exception("Myapifilms error");
        }

        if (isset($parsed->data)) {
            Movies::truncate();
            $data = $parsed->data;

            foreach ($data->movies as $movie) {
                Movies::Create([
                    'title' => $movie->title,
                    'year' => $movie->year,
                    'url_poster' => $movie->urlPoster,
                    'id_imdb' => $movie->idIMDB,
                    'rating' => $movie->rating,
                    'ranking' => $movie->ranking,
                ]);
            }
        }
    }

}
