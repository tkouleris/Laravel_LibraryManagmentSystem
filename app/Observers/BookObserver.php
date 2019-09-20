<?php

namespace App\Observers;

use App\Models\Book;
use App\Models\Borrowing;

class BookObserver
{
    public function deleting(Book $book)
    {
        $id = $book->id;
        Borrowing::where('book_id','=',$id)->delete();
    }
}