<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookInsertRequest;

use App\Http\Repositories\RepositoryInterfaces\BookRepoInterface;

class BookController extends Controller
{

    protected $bookRepo;

    public function __construct(BookRepoInterface $book)
    {
        $this->bookRepo = $book;
    }


    public function insert_new_book(BookInsertRequest $request)
    {
        return $this->bookRepo->create_record($request);
    }


    public function get_book($id)
    {
        return $this->bookRepo->get_record_by_id($id);
    }


    public function update_book(BookInsertRequest $request)
    {
        return $this->bookRepo->update_record($request);
    }


    public function getBooks()
    {
        $books = $this->bookRepo->get_all_limit_by(0);
        return view('books',['books' => $books]);
    }
}
