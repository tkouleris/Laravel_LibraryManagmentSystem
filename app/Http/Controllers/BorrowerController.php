<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function insert_new_author(AuthorInsertRequest $request)
    {

        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $dob = $request['dob'];
        $address = $request['address'];
        $phone = $request['phone'];


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
}
