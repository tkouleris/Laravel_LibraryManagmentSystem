<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'dob',
        'address',
        'phone',
    ];
}
