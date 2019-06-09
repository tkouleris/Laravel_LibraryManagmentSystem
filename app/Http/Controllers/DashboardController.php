<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Borrower;
use App\Http\Repositories\RepositoryInterfaces\AuthorRepoInterface;

class DashboardController extends Controller
{

    protected $authorRepo;

    public function __construct(AuthorRepoInterface $author)
    {
        $this->authorRepo = $author;
    }


    public function getDashboardData(Request $request){

        $books = Book::all()->take(5);
        $borrowers = Borrower::all()->take(5);
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
