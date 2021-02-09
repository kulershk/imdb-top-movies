<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//movie api calls
Route::get('/movies', 'Api@topMovies');
Route::get('/movie/{movie}', 'Api@getMovie');
Route::prefix('comment')->group(function () {
    Route::get('/get/{movie}', 'Api@getComments');
    Route::post('/post', 'Api@postComment');
});
