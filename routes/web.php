<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {


    if (Auth::check()) return view('dashboard');

    return view('auth.login');
});

Auth::routes();


// Dashboard
Route::get('/dashboard', 'DashboardController@getDashboardData')->name('dashboard');


// Books
Route::get('/books', 'BookController@getBooks')->name('books');
Route::post('/newbook',
    [
        'uses'=>'BookController@insert_new_book','as'=>'newbook'
    ]
);
Route::get("/book/{book}", "BookController@get_book");
Route::post("/updatebook", ['uses' => "BookController@update_book", 'as'=>'updatebook']);


// Author
Route::get('/authors', 'AuthorController@getAuthors')->name('authors');
Route::post('/newauthor',
    [
        'uses'=>'AuthorController@insert_new_author','as'=>'newauthor'
    ]
);
Route::get("/author/{id}", "AuthorController@get_author");
Route::post("/updateauthor", ['uses' => "AuthorController@update_author", 'as'=>'updateauthor']);


// Borrower
Route::get('/borrowers', 'BorrowerController@getBorrowers')->name('borrowers');
Route::post('/newborrower',
    [
        'uses'=>'BorrowerController@insert_new_borrower','as'=>'newborrower'
    ]
);

Route::get("/borrower/{id}", "BorrowerController@get_borrower");
Route::post("/updateborrower", ['uses' => "BorrowerController@update_borrower", 'as'=>'updateborrower']);

// Borrowings
Route::get('/borrowings', 'BorrowingsController@getBorrowings')->name('borrowings');
Route::post('/newborrowing',
    [
        'uses'=>'BorrowingsController@insert_new_borrow_record','as'=>'newborrowing'
    ]
);
Route::get("/borrowing/{id}", "BorrowingsController@getBorrowing_record");
