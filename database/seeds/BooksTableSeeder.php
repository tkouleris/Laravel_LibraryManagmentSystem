<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'title' => 'Lord Of the Rings 1',
            'isbn10' => '1234567890',
            'isbn13' => 'abc1234567890',
            'year' => 1994,
            'edition' => 1,
        ]);

        DB::table('books')->insert([
            'title' => 'Lord Of the Rings 2',
            'isbn10' => '1234567890',
            'isbn13' => 'abc1234567890',
            'year' => 1994,
            'edition' => 1,
        ]);

        DB::table('books')->insert([
            'title' => 'Lord Of the Rings 3',
            'isbn10' => '1234567890',
            'isbn13' => 'abc1234567890',
            'year' => 1994,
            'edition' => 1,
        ]);
    }
}
