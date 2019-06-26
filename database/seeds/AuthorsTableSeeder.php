<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Authors = factory(App\Author::Class, 10000)->create();

    }
}
