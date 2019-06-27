<?php

use Illuminate\Database\Seeder;

class BookAuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<=10000; $i ++){

            $max_authors = rand(1,3);

            for($j=0 ; $j < $max_authors ; $j++){
                DB::table('book_author')->insert([
                    'book_id' => $i,
                    'author_id' => rand(1,10000),
                ]);
            }

        }

    }
}
