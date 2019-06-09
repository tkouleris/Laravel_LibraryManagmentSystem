<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Repositories\AuthorEloquentRepo;
use App\Http\Repositories\RepositoryInterfaces\AuthorRepoInterface;

use App\Http\Repositories\BorrowerEloquentRepo;
use App\Http\Repositories\RepositoryInterfaces\BorrowerRepoInterface;

use App\Http\Repositories\BookEloquentRepo;
use App\Http\Repositories\RepositoryInterfaces\BookRepoInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthorRepoInterface::class, AuthorEloquentRepo::class);
        $this->app->bind(BorrowerRepoInterface::class, BorrowerEloquentRepo::class);
        $this->app->bind(BookRepoInterface::class, BookEloquentRepo::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
