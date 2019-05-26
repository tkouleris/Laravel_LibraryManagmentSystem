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

Route::get('/dashboard', 'DashboardController@getDashboardData')->name('dashboard');
Route::get('/books', 'BooksController@getBooks');
Route::post('/newauthor',
    [
        'uses'=>'AuthorController@insert_new_author','as'=>'newauthor'
    ]
);

Route::get("/author/{id}", "AuthorController@get_author");

