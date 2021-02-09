<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Repositories\CommentRepository;
use App\Repositories\MoviesRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Api extends Controller
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var MoviesRepository
     */
    private $moviesRepository;

    /**
     * Api constructor.
     * @param CommentRepository $commentRepository
     * @param MoviesRepository $moviesRepository
     */
    public function __construct(
        CommentRepository $commentRepository,
        MoviesRepository $moviesRepository
    ) {
        $this->commentRepository = $commentRepository;
        $this->moviesRepository = $moviesRepository;
    }

    /**
     * @return JsonResponse
     */
    public function topMovies(): JsonResponse
    {
        return response()->json($this->moviesRepository->getTopMovies());
    }

    /**
     * @param Request $request
     * @param $movie
     *
     * @return JsonResponse
     */
    public function getComments(Request $request, $movie): JsonResponse
    {
        return response()->json($this->commentRepository->getComments($movie));
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function postComment(Request $request): JsonResponse
    {
        return response()->json($this->commentRepository->addComment($request));
    }

    /**
     * @param Request $request
     * @param $movie
     * @return JsonResponse
     */
    public function getMovie(Request $request, $movie): JsonResponse {
        return response()->json($this->moviesRepository->getMovieDetails($movie));
    }
}
