<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Repositories\RepositoryInterfaces\AuthorRepoInterface;
use App\Http\Repositories\RepositoryInterfaces\BorrowerRepoInterface;

class DashboardController extends Controller
{

    protected $authorRepo;
    protected $borrowerRepo;

    public function __construct(AuthorRepoInterface $author, BorrowerRepoInterface $borrower)
    {
        $this->authorRepo = $author;
        $this->borrowerRepo = $borrower;
    }


    public function getDashboardData(Request $request){

        $books = Book::all()->take(5);
        $borrowers = $this->borrowerRepo->get_all_limit_by(5);
        $authors = $this->authorRepo->get_all_limit_by(5);

        return view('dashboard',
            [
                'books' => $books,
                'borrowers'=>$borrowers,
                'authors'=>$authors
            ]
        );
    }
}
