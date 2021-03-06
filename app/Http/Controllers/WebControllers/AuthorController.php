<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorInsertRequest;
use App\Http\Repositories\RepositoryInterfaces\AuthorRepoInterface;

class AuthorController extends Controller
{
    protected $authorRepo;

    public function __construct(AuthorRepoInterface $author)
    {
        $this->authorRepo = $author;
    }

    public function insert_new_author(AuthorInsertRequest $request)
    {
        $this->authorRepo->create_record($request);
        return redirect('dashboard');
    }

    public function get_author($id)
    {
        return $this->authorRepo->get_record_by_id($id);
    }

    public function update_author(AuthorInsertRequest $request)
    {
        $this->authorRepo->update_record($request);
        return redirect('dashboard');
    }


    public function getAuthors()
    {
        $authors = $this->authorRepo->get_all_limit_by(0);
        return view('authors',['authors' => $authors]);
    }

    public function deleteAuthor_record($id)
    {
        return $this->authorRepo->delete_record_byID($id);
    }
}
