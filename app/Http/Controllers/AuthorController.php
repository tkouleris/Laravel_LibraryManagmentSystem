<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthorInsertRequest;

use App\Author;

class AuthorController extends Controller
{

    public function insert_new_author(AuthorInsertRequest $request)
    {
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $dob = $request['dob'];
        $bio = $request['bio'];

        $author = new Author();
        $author->firstname = $firstname;
        $author->lastname = $lastname;
        $author->dob = $dob;
        $author->bio = $bio;


        $author->save();

        return redirect('dashboard');
    }
}
