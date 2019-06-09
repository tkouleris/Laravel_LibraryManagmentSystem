<?php

    namespace App\Http\Repositories;

    use App\Author;
    use App\Http\Repositories\RepositoryInterfaces\AuthorRepoInterface;

    class AuthorEloquentRepo implements AuthorRepoInterface{
        protected $model;

        public function __construct(Author $author) {
            $this->model = $author;
        }

        public function get_all_limit_by($number_of_rows){

            $authors = $model::all()->take($number_of_rows);
            return $authors;
        }
    }