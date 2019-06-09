<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorInsertRequest;

use App\Author;
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

}
