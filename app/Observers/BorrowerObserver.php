<?php

namespace App\Observers;

use App\Borrower;
use App\Borrowing;

class BorrowerObserver
{
    public function deleting(Borrower $borrower)
    {
        $id = $borrower->id;
        Borrowing::where('borrower_id','=',$id)->delete();
    }
}