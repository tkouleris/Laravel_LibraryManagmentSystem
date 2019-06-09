<?php

    namespace App\Http\Repositories\RepositoryInterfaces;

    interface BookRepoInterface{

        public function get_all_limit_by( $limit );
        public function get_record_by_id( $id );
        public function create_record( $data );
        public function update_record( $data );

    }