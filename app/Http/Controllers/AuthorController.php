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


        $author = Author::create(
            [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'dob' => $dob,
                'bio' => $bio,
            ]
        );

        return redirect('dashboard');
    }

    public function get_author($id)
    {
        $author = Author::findOrFail($id);


        return $author;
    }

    public function update_author(AuthorInsertRequest $request)
    {
        $authorid = $request->authorid;
        $author = Author::find($authorid);

        $author->firstname = $request->firstname;
        $author->lastname = $request->lastname;
        $author->dob = $request->dob;
        $author->bio = $request->bio;

        $author->save();

        return redirect('dashboard');
    }

}
