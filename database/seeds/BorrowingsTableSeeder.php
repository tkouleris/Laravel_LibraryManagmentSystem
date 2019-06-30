<?php

use Illuminate\Database\Seeder;

class BorrowingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<=10000; $i ++){

            $book_id = rand(1,10000);
            $borrower_id = rand(1,10000);

            $borrow_date = self::book_borrow_date();
            $returned_date = null;
            if( $this->book_is_returned() == true){
                //$returned_date = strtotime($borrow_date);
                $returned_date = date( "Y-m-d", strtotime( "$borrow_date +1 day" ) );
                //$returned_date = strtotime("+7 day", $borrow_date);
                //$returned_date = date('Y-m-d',$returned_date);
            }

            DB::table('borrowings')->insert([
                'book_id' => $book_id,
                'borrower_id' => $borrower_id,
                'borrow_date' => $borrow_date,
                'return_date' => $returned_date,
                'created_at' => now(),
            ]);

        }

    }

    /**
     *
     * @return bool
     */
    private function book_is_returned(){
        if( rand(1,5) == 1) return false;

        return true;
    }

    /**
     *
     * @return string
     */
    private function book_borrow_date()
    {
        $timestamp = mt_rand(1, time());

        return date("Y-m-d", $timestamp);;
    }
}
