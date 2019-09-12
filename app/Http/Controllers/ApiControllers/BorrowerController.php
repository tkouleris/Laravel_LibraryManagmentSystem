<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BorrowerResource;
use App\Http\Requests\BorrowerRequest;
use App\Http\Repositories\RepositoryInterfaces\BorrowerRepoInterface;

class BorrowerController extends Controller
{

    protected $borrowerRepo;

    public function __construct(BorrowerRepoInterface $borrower)
    {
        $this->borrowerRepo = $borrower;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowers = $this->borrowerRepo->get_all_limit_by(0);
        return BorrowerResource::collection( $borrowers );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BorrowerRequest $request)
    {
        $borrower = $this->borrowerRepo->create_record($request);

        return response()->json($borrower, 201);
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
        $borrower = $this->borrowerRepo->get_record_by_id($id);
        return new BorrowerResource( $borrower );

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
    public function update(BorrowerRequest $request, $id)
    {
        $borrower = $this->borrowerRepo->get_record_by_id($id);

        $update_args = array();
        $update_args['borrowerid'] = $id;

        $update_args['firstname'] = $request->has('firstname')?$request->firstname :$borrower->firstname;

        $update_args['lastname'] = $request->has('lastname')?$request->lastname :$borrower->lastname;

        $update_args['dob'] = $request->has('dob')?$request->dob :$borrower->dob;

        $update_args['address'] = $request->has('address')?$request->address :$borrower->address;

        $update_args['phone'] = $request->has('phone')?$request->phone :$borrower->phone;

        $borrower = $this->borrowerRepo->update_record((object)$update_args);
        return response()->json($borrower, 200);
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
