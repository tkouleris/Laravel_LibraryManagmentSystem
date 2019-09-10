<?php

namespace App\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\RepositoryInterfaces\BorrowingsRepoInterface;
use App\Http\Repositories\RepositoryInterfaces\BorrowerRepoInterface;
use App\Http\Repositories\RepositoryInterfaces\BookRepoInterface;
use App\Http\Resources\BorrowingResource;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowing_records = $this->borrowingsRepo->get_all_limit_by();
        return BorrowingResource::collection( $borrowing_records );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
