<?php

namespace App\Observers;

use App\Book;
use App\Borrowing;

class BookObserver
{
    public function deleting(Book $book)
    {
        $id = $book->id;
        Borrowing::where('book_id','=',$id)->delete();
    }
}