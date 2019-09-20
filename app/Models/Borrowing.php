<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    public function booksBorrowed()
    {
        return $this->hasMany('App\Models\Book','id','book_id')->with('authors');
    }

    public function borrowerBorrowed()
    {
        return $this->hasMany('App\Models\Borrower','id','borrower_id');
    }
}
