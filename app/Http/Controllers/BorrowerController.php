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
        return $borrower;
    }

    public function update_borrower(BorrowerRequest $request)
    {
        $borrowerid = $request->borrowerid;
        $borrower = Borrower::findOrFail($borrowerid);

        $borrower->firstname = $request->firstname;
        $borrower->lastname = $request->lastname;
        $borrower->dob = $request->dob;
        $borrower->address = $request->address;
        $borrower->phone = $request->phone;

        $borrower->save();

        return redirect('dashboard');
    }
}
