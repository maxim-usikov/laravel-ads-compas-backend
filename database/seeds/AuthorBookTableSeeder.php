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

        $authors->each(function($author) use($books) {
            $ids = $books->random(rand(3, 5))->pluck('id')->toArray();
            $author->books()->sync($ids);
        });
    }
}
