<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowerRequest;
use App\Borrower;

class BorrowerController extends Controller
{
    public function insert_new_borrower(BorrowerRequest $request)
    {

        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $dob = $request['dob'];
        $address = $request['address'];
        $phone = $request['phone'];


        $borrower = Borrower::create(
            [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'dob' => $dob,
                'address' => $address,
                'phone' => $phone,
            ]
        );

        return redirect('dashboard');
    }


    public function get_borrower(Borrower $borrower)
    {
        //$author = Author::findOrFail($id);


        return $borrower;
    }
}
