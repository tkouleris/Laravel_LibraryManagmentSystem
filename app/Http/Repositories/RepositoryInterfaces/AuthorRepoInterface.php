<?php

    namespace App\Http\Repositories\RepositoryInterfaces;

    use App\Http\Repositories\RepositoryInterfaces\BaseRepoInterface;

    interface AuthorRepoInterface extends BaseRepoInterface{
        public function get_total_records();

    }