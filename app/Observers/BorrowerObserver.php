<?php

namespace App\Observers;

use App\Models\Borrower;
use App\Models\Borrowing;

class BorrowerObserver
{
    public function deleting(Borrower $borrower)
    {
        $id = $borrower->id;
        Borrowing::where('borrower_id','=',$id)->delete();
    }
}