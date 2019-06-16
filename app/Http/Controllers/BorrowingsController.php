<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\RepositoryInterfaces\BorrowingsRepoInterface;
use App\Http\Repositories\RepositoryInterfaces\BorrowerRepoInterface;
use App\Http\Repositories\RepositoryInterfaces\BookRepoInterface;
use App\Http\Requests\BorrowingRequest;


class BorrowingsController extends Controller
{
    protected $borrowingsRepo;
    protected $booksRepo;
    protected $borrowerRepo;

    public function __construct(BorrowingsRepoInterface $borrowings, BorrowerRepoInterface $borrower, BookRepoInterface $books)
    {
        $this->borrowingsRepo = $borrowings;
        $this->borrowerRepo = $borrower;
        $this->booksRepo = $books;
    }


    public function getBorrowings(Request $request)
    {
        $borrowing_records = $this->borrowingsRepo->get_all_limit_by();
        $booksList = $this->booksRepo->get_all_limit_by();
        $borrowerList = $this->borrowerRepo->get_all_limit_by();


        return view('borrowings',[
            'borrowing_records'=>$borrowing_records,
            'Books'=>$booksList,
            'Borrowers'=>$borrowerList,
            ]);
    }

    public function insert_new_borrow_record(BorrowingRequest $request)
    {
        return $this->borrowingsRepo->create_record($request);
    }
}
