<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\RepositoryInterfaces\BorrowingsRepoInterface;

class BorrowingsController extends Controller
{
    protected $borrowingsRepo;

    public function __construct(BorrowingsRepoInterface $borrowings)
    {
        $this->borrowingsRepo = $borrowings;
    }


    public function getBorrowings(Request $request)
    {
        $borrowings = $this->borrowingsRepo->get_all_limit_by(5);

        //dd($borrowings);

        return view('borrowings');

    }
}
