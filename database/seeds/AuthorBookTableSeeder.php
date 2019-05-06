<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Book;

class AuthorBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = App\Author::all();
        $books = App\Book::all();

        $books->each(function($book) use($authors) {
            $ids = $authors->random(rand(3, 5))->pluck('id')->toArray();
            $book->authors()->sync($ids);
        });
    }
}
