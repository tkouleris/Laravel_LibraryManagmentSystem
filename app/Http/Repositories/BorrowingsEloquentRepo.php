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
            // $bookid = $data->bookid;
            // $book  = $this->model::findOrFail($bookid);

            // $book->title = $data['title'];
            // $book->isbn10 = $data['isbn10'];
            // $book->isbn13 = $data['isbn13'];
            // $book->year = $data['year'];
            // $book->save();

            // $author0 = $data['author0'];
            // $author1 = $data['author1'];
            // $author2 = $data['author2'];

            // $author = Author::find([$author0, $author1, $author2]);
            // $book->authors()->sync($author);

            // return $book;
        }


    }