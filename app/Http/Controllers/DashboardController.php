<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Borrower;

class DashboardController extends Controller
{
    public function getDashboardData(Request $requset){
        $books = Book::all();
        $borrowers = Borrower::all();

        return view('dashboard', ['books' => $books, 'borrowers'=>$borrowers]);
    }
}
