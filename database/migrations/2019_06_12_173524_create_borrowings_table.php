<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('borrower_id')->unsigned();
            $table->foreign('borrower_id')->references('id')->on('borrowers');
            $table->bigInteger('book_id')->unsigned();
            $table->foreign('book_id')->references('id')->on('books');
            $table->date('borrow_date');
            $table->date('return_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowings');
    }
}
