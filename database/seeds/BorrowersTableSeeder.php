<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BorrowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('borrowers')->insert([
            'firstname' => 'Thodoris',
            'lastname' => 'Kouleris',
            'dob' => Carbon::parse('1982-09-22'),
            'address' => 'Kremou, 69-71, Kallithea',
            'phone' => '2103256987',
        ]);

        DB::table('borrowers')->insert([
            'firstname' => 'Antonia',
            'lastname' => 'Elnamparaoui',
            'dob' => Carbon::parse('1991-01-17'),
            'address' => 'Kremou, 69-71, Kallithea',
            'phone' => '2103256987',
        ]);

        DB::table('borrowers')->insert([
            'firstname' => 'Nikola',
            'lastname' => 'Tesla',
            'dob' => Carbon::parse('1982-09-22'),
            'address' => 'Unknown',
            'phone' => '',
        ]);
    }
}
