<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Http\Resources\BookCollection;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // NOTE: can be refactored with Request class and Model scopes
        // NOTE: or custom fitler implementation
        $perPage = 10;
        $query = Book::query();

        if ($request->filled('title')) {
            $query->where('title', 'like', "%{$request->get('title')}%");
        }

        // NOTE: fetch with all authors
        /*
        if ($request->filled('authorName')) {
            $authorName = $request->get('authorName');
            $authorNameFilter = function ($query) use ($authorName) {
                $query->where('name', 'like', "%{$authorName}%");
            };

            $query->whereHas('authors', $authorNameFilter);
        }

        $query->with('authors');
         */

        // NOTE: fetch only authors that match authorName
        if ($request->filled('authorName')) {
            $authorName = $request->get('authorName');
            $authorNameFilter = function ($query) use ($authorName) {
                $query->where('name', 'like', "%{$authorName}%");
            };

            $query->with(['authors' => $authorNameFilter])
                  ->whereHas('authors', $authorNameFilter);
        } else {
            $query->with('authors');
        }

        $books = $query->paginate($perPage);

        return new BookCollection($books);
    }
}
