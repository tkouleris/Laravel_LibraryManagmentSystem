<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookInsertRequest;

use App\Http\Repositories\RepositoryInterfaces\BookRepoInterface;
use App\Http\Repositories\RepositoryInterfaces\AuthorRepoInterface;

class BookController extends Controller
{

    protected $bookRepo;
    protected $authorRepo;

    public function __construct(BookRepoInterface $book, AuthorRepoInterface $author)
    {
        $this->bookRepo = $book;
        $this->authorRepo = $author;
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
        $books = $this->bookRepo->get_all_limit_by();
        $authors = $this->authorRepo->get_all_limit_by($this->authorRepo->get_total_records());

        return view('books',['books' => $books, 'authors'=>$authors]);
    }

    public function deleteBook_record($id)
    {
        return $this->bookRepo->delete_record_byID($id);
    }
}
