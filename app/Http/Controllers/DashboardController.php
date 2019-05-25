<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Borrower;
use App\Author;

class DashboardController extends Controller
{
    public function getDashboardData(Request $request){

        $books = Book::all()->take(5);
        $borrowers = Borrower::all()->take(5);
        $authors = Author::all()->take(5);



        return view('dashboard',
            [
                'books' => $books,
                'borrowers'=>$borrowers,
                'authors'=>$authors
            ]
        );
    }
}
