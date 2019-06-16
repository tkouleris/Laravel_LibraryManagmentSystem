<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\RepositoryInterfaces\BorrowingsRepoInterface;
use App\Borrower;
use App\Borrowing;

class BorrowingsController extends Controller
{
    protected $borrowingsRepo;

    public function __construct(BorrowingsRepoInterface $borrowings)
    {
        $this->borrowingsRepo = $borrowings;
    }


    public function getBorrowings(Request $request)
    {
        $borrowing_records = $this->borrowingsRepo->get_all_limit_by();

        return view('borrowings',['borrowing_records'=>$borrowing_records]);
    }
}
