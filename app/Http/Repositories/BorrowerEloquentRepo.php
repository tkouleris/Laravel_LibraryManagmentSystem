<?php

    namespace App\Http\Repositories;

    use App\Borrower;
    use App\Http\Repositories\RepositoryInterfaces\BorrowerRepoInterface;

    class BorrowerEloquentRepo implements BorrowerRepoInterface{

        protected $model;


        public function __construct(Borrower $borrower)
        {
            $this->model = $borrower;
        }


        public function get_all_limit_by($limit = 0)
        {
            if( $limit <= 0 ) $borrowers = $this->model::all();
            if( $limit > 0 ) $borrowers = $this->model::all()->take($limit);
            return $borrowers;
        }


        public function get_record_by_id($id)
        {
            $borrower = $this->model::findOrFail($id);
            return $borrower;
        }


        public function create_record($data)
        {
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $dob = $data['dob'];
            $address = $data['address'];
            $phone = $data['phone'];


            $borrower = $this->model::create(
                [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'dob' => $dob,
                    'address' => $address,
                    'phone' => $phone,
                ]
            );

            return $borrower;
        }


        public function update_record($data)
        {
            $borrowerid = $data->borrowerid;
            $borrower = $this->model::findOrFail($borrowerid);

            $borrower->firstname = $data->firstname;
            $borrower->lastname = $data->lastname;
            $borrower->dob = $data->dob;
            $borrower->address = $data->address;
            $borrower->phone = $data->phone;

            $borrower->save();

            return $borrower;
        }


    }