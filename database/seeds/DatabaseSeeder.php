<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        //$this->call(BooksTableSeeder::class);
        //$this->call(BorrowersTableSeeder::class);
        //$this->call(AuthorsTableSeeder::class);
        //$this->call(BookAuthorTableSeeder::class);
        //$this->call(BorrowingTableSeeder::class);

    }
}
