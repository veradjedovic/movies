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

Auth::routes();

Route::get('/', 'FrontendController@index')->name('home')->middleware('auth');

// Categories
Route::get('/categories/edit', 'CategoryController@index')->name('categories.edit')->middleware('auth');

// Movies
Route::get('/movies/edit', 'MovieController@index')->name('movies.edit')->middleware('auth');

