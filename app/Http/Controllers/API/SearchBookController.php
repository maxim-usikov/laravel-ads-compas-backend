<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Http\Resources\BookCollection;
use App\Http\Requests\SearchBookForm;

class SearchBookController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SearchBookForm $request)
    {
        $limit = 10;
        $query = Book::query();
        $q = $request->get('q');

        $query->where('title', 'like', "%{$q}%")
              ->orWhereHas('authors', function($query) use($q) {
                  $query->where('name', 'like', "%{$q}%");
              });
        $query->with('authors');
        $query->limit($limit);

        $books = $query->get();

        return new BookCollection($books);
    }
}
