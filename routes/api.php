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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Categories
Route::get('/categories', 'Api\CategoryController@index')->name('categories.index');
Route::post('/categories', 'Api\CategoryController@store')->name('categories.store');
Route::get('/categories/list', 'Api\CategoryController@list')->name('categories.list');
Route::get('/categories/{category}/movies', 'Api\CategoryController@listMoviesOfCategory')->name('categories.contacts');
Route::put('/categories/{category}', 'Api\CategoryController@update')->name('categories.update');
Route::delete('/categories/{category}', 'Api\CategoryController@destroy')->name('categories.destroy');
Route::get('/categories/{category}/edit', 'Api\CategoryController@edit')->name('categories.edit');

// Movies
Route::get('/movies', 'Api\MovieController@index')->name('movies.index');
Route::post('/movies', 'Api\MovieController@store')->name('movies.store');
Route::put('/movies/{movie}', 'Api\MovieController@update')->name('movies.update');
Route::delete('/movies/{movie}', 'Api\MovieController@destroy')->name('movies.destroy');
Route::get('/movies/{movie}/edit', 'Api\MovieController@edit')->name('movies.edit');



