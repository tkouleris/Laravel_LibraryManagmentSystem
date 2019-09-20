<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function authors()
    {
        return $this->belongsToMany('App\Models\Author','book_author');
    }

    public function beingBorrowed()
    {
        return $this->belongsToMany('App\Models\Borrower','borrowing');
    }
}
