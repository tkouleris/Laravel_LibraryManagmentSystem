<?php

    namespace App\Http\Repositories\RepositoryInterfaces;

    use App\Http\Repositories\RepositoryInterfaces\BaseRepoInterface;

    interface BookRepoInterface extends BaseRepoInterface{
        public function delete_record_byID( $id );
    }