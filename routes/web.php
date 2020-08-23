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
Route::get('/dashboard', 'WebControllers\DashboardController@getDashboardData')->name('dashboard')->middleware('auth');


// Books
Route::get('/books', 'WebControllers\BookController@getBooks')->name('books')->middleware('auth');
Route::post('/newbook',['uses'=>'WebControllers\BookController@insert_new_book','as'=>'newbook'])->middleware('auth');
Route::get("/book/{book}", "WebControllers\BookController@get_book")->middleware('auth');
Route::post("/updatebook", ['uses' => "WebControllers\BookController@update_book", 'as'=>'updatebook'])->middleware('auth');
Route::delete("/book/{id}", "WebControllers\BookController@deleteBook_record")->middleware('auth');

// Author
Route::get('/authors', 'WebControllers\AuthorController@getAuthors')->name('authors')->middleware('auth');
Route::post('/newauthor',
    [
        'uses'=>'WebControllers\AuthorController@insert_new_author','as'=>'newauthor'
    ]
)->middleware('auth');
Route::get("/author/{id}", "WebControllers\AuthorController@get_author")->middleware('auth');
Route::post("/updateauthor", ['uses' => "WebControllers\AuthorController@update_author", 'as'=>'updateauthor'])->middleware('auth');
Route::delete("/author/{id}", "WebControllers\AuthorController@deleteAuthor_record")->middleware('auth');


// Borrower
Route::get('/borrowers', 'WebControllers\BorrowerController@getBorrowers')->name('borrowers')->middleware('auth');
Route::post('/newborrower',
    [
        'uses'=>'WebControllers\BorrowerController@insert_new_borrower','as'=>'newborrower'
    ]
)->middleware('auth');

Route::get("/borrower/{id}", "WebControllers\BorrowerController@get_borrower")->middleware('auth');
Route::post("/updateborrower", ['uses' => "WebControllers\BorrowerController@update_borrower", 'as'=>'updateborrower'])->middleware('auth');
Route::delete("/borrower/{id}", "WebControllers\BorrowerController@deleteBorrower_record")->middleware('auth');


// Borrowings
Route::get('/borrowings', 'WebControllers\BorrowingsController@getBorrowings')->name('borrowings')->middleware('auth');
Route::post('/newborrowing',
    [
        'uses'=>'WebControllers\BorrowingsController@insert_new_borrow_record','as'=>'newborrowing'
    ]
)->middleware('auth');
Route::post('/updateborrowing',
    [
        'uses'=>'WebControllers\BorrowingsController@update_borrowing','as'=>'updateborrowing'
    ]
)->middleware('auth');
Route::get("/borrowing/{id}", "WebControllers\BorrowingsController@getBorrowing_record")->middleware('auth');
//Route::post("/updateborrowing", "WebControllers\BorrowingsController@update_borrowing")->name('updateborrowing')->middleware('auth');
Route::delete("/borrowing/{id}", "WebControllers\BorrowingsController@deleteBorrowing_record")->middleware('auth');


// User
Route::post("/passwordchange", ['uses'=>"WebControllers\UserController@password_change", 'as'=>'passwordchange'])->middleware('auth');


