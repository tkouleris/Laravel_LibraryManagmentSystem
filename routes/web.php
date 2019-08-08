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


    if (Auth::check()) return redirect('dashboard');

    return view('auth.login');
});

Auth::routes();


// Dashboard
Route::get('/dashboard', 'DashboardController@getDashboardData')->name('dashboard')->middleware('auth');


// Books
Route::get('/books', 'BookController@getBooks')->name('books')->middleware('auth');
Route::post('/newbook',['uses'=>'BookController@insert_new_book','as'=>'newbook'])->middleware('auth');
Route::get("/book/{book}", "BookController@get_book")->middleware('auth');
Route::post("/updatebook", ['uses' => "BookController@update_book", 'as'=>'updatebook'])->middleware('auth');
Route::delete("/book/{id}", "BookController@deleteBook_record")->middleware('auth');

// Author
Route::get('/authors', 'AuthorController@getAuthors')->name('authors')->middleware('auth');
Route::post('/newauthor',
    [
        'uses'=>'AuthorController@insert_new_author','as'=>'newauthor'
    ]
)->middleware('auth');
Route::get("/author/{id}", "AuthorController@get_author")->middleware('auth');
Route::post("/updateauthor", ['uses' => "AuthorController@update_author", 'as'=>'updateauthor'])->middleware('auth');
Route::delete("/author/{id}", "AuthorController@deleteAuthor_record")->middleware('auth');


// Borrower
Route::get('/borrowers', 'BorrowerController@getBorrowers')->name('borrowers')->middleware('auth');
Route::post('/newborrower',
    [
        'uses'=>'BorrowerController@insert_new_borrower','as'=>'newborrower'
    ]
)->middleware('auth');

Route::get("/borrower/{id}", "BorrowerController@get_borrower")->middleware('auth');
Route::post("/updateborrower", ['uses' => "BorrowerController@update_borrower", 'as'=>'updateborrower'])->middleware('auth');
Route::delete("/borrower/{id}", "BorrowerController@deleteBorrower_record")->middleware('auth');


// Borrowings
Route::get('/borrowings', 'BorrowingsController@getBorrowings')->name('borrowings')->middleware('auth');
Route::post('/newborrowing',
    [
        'uses'=>'BorrowingsController@insert_new_borrow_record','as'=>'newborrowing'
    ]
)->middleware('auth');
Route::get("/borrowing/{id}", "BorrowingsController@getBorrowing_record")->middleware('auth');
Route::post("/updateborrowing", ['uses' => "BorrowingsController@update_borrowing", 'as'=>'updateborrowing'])->middleware('auth');
Route::delete("/borrowing/{id}", "BorrowingsController@deleteBorrowing_record")->middleware('auth');


// User
Route::post("/passwordchange", ['uses'=>"UserController@password_change", 'as'=>'passwordchange'])->middleware('auth');


