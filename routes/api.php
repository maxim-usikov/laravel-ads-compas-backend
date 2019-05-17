<?php

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;

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

Route::middleware('auth:api')->group(function () {
    Route::get('/me', function (Request $request) {
        return new UserResource($request->user());
    });

    Route::get('/search/books', 'API\SearchBookController')
        ->name('search.books');
});

Route::apiResource('books', 'API\BookController')->only(['index']);
