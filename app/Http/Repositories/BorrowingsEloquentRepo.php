<?php

    namespace App\Http\Repositories;

    use App\Borrowing;
    use App\Book;
    use App\Borrower;
    use App\Http\Repositories\RepositoryInterfaces\BorrowingsRepoInterface;

    class BorrowingsEloquentRepo implements BorrowingsRepoInterface{

        protected $model;

        public function __construct(Borrowing $borrowing)
        {
            $this->model = $borrowing;
        }


        public function get_all_limit_by($limit = 0)
        {
            if( $limit <= 0){
                $borrowing_records = $this->model->with('booksBorrowed')
                                                    ->with('borrowerBorrowed')
                                                    ->orderBy('borrow_date', 'DESC')
                                                    ->get();
            }

            if( $limit > 0 )
                $borrowing_records = $this->model->with('booksBorrowed')
                                                  ->with('borrowerBorrowed')
                                                  ->all()
                                                  ->take($limit);

            return $borrowing_records;
        }


        public function get_record_by_id($id)
        {
            $borrow_record = $this->model::with('booksBorrowed')->with('borrowerBorrowed')->findOrFail($id);
            return $borrow_record;
        }


        public function create_record($data)
        {
            $book_id = $data['book_id'];
            $borrower_id = $data['borrower_id'];

            $this->model->borrow_date = $data['borrow_date'];
            $this->model->return_date = $data['return_date'];
            $this->model->borrower_id = $borrower_id;
            $this->model->book_id = $book_id;
            $this->model->save();

            $book_id = $data['book_id'];
            $borrower_id = $data['borrower_id'];

            return $this->model;
        }


        public function update_record($data)
        {
            $borrowingid = $data->borrowingid;
            $borrowing = $this->model::findOrFail($borrowingid);

            $borrowing->borrower_id = $data->borrower_id;
            $borrowing->book_id = $data->book_id;
            $borrowing->borrow_date = $data->borrow_date;
            $borrowing->return_date = $data->return_date;
            $borrowing->save();

            return $borrowing;
        }


    }