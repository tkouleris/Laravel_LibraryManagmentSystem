<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Author;

class AuthorController extends Controller
{

    public function insert_new_author(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'firstname'=> 'required|max:50',
            'lastname' => 'required|max:50',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

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
