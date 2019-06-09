<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\AuthorEloquentRepo;
use App\Http\Repositories\RepositoryInterfaces\AuthorRepoInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        //$this->app->bind('App\Http\Repositories\RepositoryInterfaces\AuthorRepoInterface', 'App\Http\Repositories\AuthorEloquentRepo');
        $this->app->bind(AuthorRepoInterface::class, AuthorEloquentRepo::class);
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
