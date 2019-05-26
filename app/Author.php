<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'dob',
        'bio'
    ];
}
