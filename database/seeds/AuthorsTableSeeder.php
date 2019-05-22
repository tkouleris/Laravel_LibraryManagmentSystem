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
        DB::table('authors')->insert([
            'firstname' => 'Thodoris',
            'lastname' => 'Kouleris',
            'dob' => Carbon::parse('1982-09-22'),
            'bio' => 'this is a bio',
        ]);

        DB::table('authors')->insert([
            'firstname' => 'Antonia',
            'lastname' => 'Elnamparaoui',
            'dob' => Carbon::parse('1992-01-18'),
            'bio' => 'this is a bios',
        ]);

    }
}
