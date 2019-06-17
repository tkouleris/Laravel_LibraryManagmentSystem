<?php

    namespace App\Http\Repositories;

    use App\Book;
    use App\Author;
    use App\Http\Repositories\RepositoryInterfaces\BookRepoInterface;

    class BookEloquentRepo implements BookRepoInterface{

        protected $model;

        public function __construct(Book $book)
        {
            $this->model = $book;
        }


        public function get_all_limit_by($limit = 0)
        {
            if( $limit <= 0){
                $books = $this->model::all();
                $books->load('authors');
            }

            if( $limit > 0 ) $books = $this->model::all()->take($limit);
            return $books;
        }


        public function get_record_by_id($id)
        {
            $book = $this->model::with('authors')->findOrFail($id);
            return $book;
        }


        public function create_record($data)
        {

            $this->model->title = $data['title'];
            $this->model->isbn10 = $data['isbn10'];
            $this->model->isbn13 = $data['isbn13'];
            $this->model->year = $data['year'];
            $this->model->save();

            $author0 = $data['author0'];
            $author1 = $data['author1'];
            $author2 = $data['author2'];

            $author = Author::find([$author0, $author1, $author2]);
            $this->model->authors()->attach($author);

            return $this->model;
        }


        public function update_record($data)
        {
            $bookid = $data->bookid;
            $book  = $this->model::findOrFail($bookid);

            $book->title = $data['title'];
            $book->isbn10 = $data['isbn10'];
            $book->isbn13 = $data['isbn13'];
            $book->year = $data['year'];
            $book->save();

            $author0 = $data['author0'];
            $author1 = $data['author1'];
            $author2 = $data['author2'];

            $author = Author::find([$author0, $author1, $author2]);
            $book->authors()->sync($author);

            return $book;
        }

        public function delete_record_byID($id)
        {
            return $this->model::destroy($id);
        }
    }