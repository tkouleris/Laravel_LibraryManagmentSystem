<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowerRequest;
use App\Http\Repositories\RepositoryInterfaces\BorrowerRepoInterface;

class BorrowerController extends Controller
{

    protected $borrowerRepo;

    public function __construct(BorrowerRepoInterface $borrower)
    {
        $this->borrowerRepo = $borrower;
    }


    public function insert_new_borrower(BorrowerRequest $request)
    {
        return $this->borrowerRepo->create_record($request);
    }


    public function get_borrower($id)
    {
        return $this->borrowerRepo->get_record_by_id($id);
    }


    public function update_borrower(BorrowerRequest $request)
    {
        return $this->borrowerRepo->update_record($request);
    }

    public function getBorrowers()
    {
        $borrowers = $this->borrowerRepo->get_all_limit_by(0);
        return view('borrowers',['borrowers' => $borrowers]);
    }
}
