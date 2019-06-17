<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\BookObserver;
use App\Book;

class EloquentEventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Book::observe(BookObserver::class);
    }
}
