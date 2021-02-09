<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Models\Movies;
use Illuminate\Http\Request;

class CommentRepository {

    /**
     * @param $movie
     * @return mixed
     */
    public function getComments($movie)
    {
        return Comment::where('id_imdb', $movie)->orderByDesc('created_at')->get();
    }

    /**
     * @param Request $request
     * @return array|string[]
     */
    public function addComment(Request $request)
    {
        if (!isset($request->movie) || !isset($request->text) || !isset($request->name))
        {
            return ['error' => true, 'message' => 'Missing parameters'];
        }

        if (!Movies::where('id_imdb', $request->movie)->exists())
        {
            return ['error' => true, 'message' => 'Movie doesnt exist'];
        }

        if (Comment::where('ip', $request->ip())->whereBetween('created_at', [now()->subMinutes(1), now()])->exists())
        {
            return ['error' => true, 'message' => 'You recently posted comment wait a little bit!'];
        }

        Comment::create([
            'id_imdb' => $request->movie,
            'name' => $request->name,
            'text' => $request->text,
            'ip' => $request->ip(),
        ]);

        return ['message' => 'Comment added!'];

    }

}
