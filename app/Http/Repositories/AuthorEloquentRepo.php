<?php

    namespace App\Http\Repositories;

    use App\Models\Author;
    use App\Http\Repositories\RepositoryInterfaces\AuthorRepoInterface;

    class AuthorEloquentRepo implements AuthorRepoInterface{

        protected $model;


        public function __construct(Author $author)
        {
            $this->model = $author;
        }


        public function get_all_limit_by($limit = 0)
        {
            if( $limit <= 0) $authors = $this->model::paginate(10);
            if( $limit > 0 ) $authors = $this->model::all()->take($limit);
            return $authors;
        }


        public function get_record_by_id($id)
        {
            $author = $this->model::findOrFail($id);
            return $author;
        }


        public function create_record($data)
        {
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $dob = $data['dob'];
            $bio = $data['bio'];

            $author = $this->model::create(
                [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'dob' => $dob,
                    'bio' => $bio,
                ]
            );

            return $author;
        }


        public function update_record($data)
        {
            $authorid = $data->authorid;
            $author = $this->model::findOrFail($authorid);

            $author->firstname = $data->firstname;
            $author->lastname = $data->lastname;
            $author->dob = $data->dob;
            $author->bio = $data->bio;

            $author->save();

            return $author;
        }

        public function delete_record_byID($id)
        {
            $author = $this->model::findOrFail($id);

            $author->delete();

            return $author;
        }

        public function get_total_records()
        {
            return count($this->model::all());
        }

    }