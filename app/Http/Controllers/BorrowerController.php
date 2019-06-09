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
        $this->borrowerRepo->create_record($request);
        return redirect('dashboard');
    }


    public function get_borrower($id)
    {
        return $this->borrowerRepo->get_record_by_id($id);
    }


    public function update_borrower(BorrowerRequest $request)
    {
        $this->borrowerRepo->update_record($request);
        return redirect('dashboard');
    }
}
