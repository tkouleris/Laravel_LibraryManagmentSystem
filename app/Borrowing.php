<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    public function booksBorrowed()
    {
        return $this->hasMany('App\Book','id','book_id')->with('authors');
    }

    public function borrowerBorrowed()
    {
        return $this->hasMany('App\Borrower','id','borrower_id');
    }
}
