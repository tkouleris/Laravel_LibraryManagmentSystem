<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\RepositoryInterfaces\AuthorRepoInterface;
use App\Http\Repositories\RepositoryInterfaces\BorrowerRepoInterface;
use App\Http\Repositories\RepositoryInterfaces\BookRepoInterface;

class DashboardController extends Controller
{

    protected $authorRepo;
    protected $borrowerRepo;
    protected $bookRepo;

    public function __construct(AuthorRepoInterface $author, BorrowerRepoInterface $borrower, BookRepoInterface $book)
    {
        $this->authorRepo = $author;
        $this->borrowerRepo = $borrower;
        $this->bookRepo = $book;
    }


    public function getDashboardData(Request $request)
    {
        $books = $this->bookRepo->get_all_limit_by(5);
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
