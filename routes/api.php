<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Books
Route::get('books', 'ApiControllers\BookController@index');
Route::get('book/{id}', 'ApiControllers\BookController@show');

// Authros
Route::get('authors', 'ApiControllers\AuthorController@index');
Route::get('author/{id}', 'ApiControllers\AuthorController@show');

// Borrowers
Route::get('borrowers', 'ApiControllers\BorrowerController@index');
Route::get('borrower/{id}', 'ApiControllers\BorrowerController@show');


// only authenticated routes
// Route::middleware('auth.basic')->group(function(){


// });



Route::fallback(function(){
    return response()->json(['message' => 'Resource Not Found!'], 404);
});
