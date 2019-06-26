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
        $Borrowers = factory(App\Borrower::Class, 10000)->create();
    }
}
