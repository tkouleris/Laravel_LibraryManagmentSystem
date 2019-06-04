<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'dob',
        'bio',
    ];

    public function books()
    {
        return $this->belongsToMany('App\Book','book_author');
    }
}
