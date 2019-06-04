<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookInsertRequest;

use App\Book;
use App\Author;

class BookController extends Controller
{

    public function insert_new_book(BookInsertRequest $request)
    {
        $book = new Book;

        $book->title = $request['title'];
        $book->isbn10 = $request['isbn10'];
        $book->isbn13 = $request['isbn13'];
        $book->year = $request['year'];
        $book->save();

        $author0 = $request['author0'];
        $author1 = $request['author1'];
        $author2 = $request['author2'];



        $author = Author::find([$author0, $author1, $author2]);
        $book->authors()->attach($author);
    }
}
