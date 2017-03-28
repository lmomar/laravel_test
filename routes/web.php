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

Route::group(['middleware' => ['auth', 'role']], function() {

    /* get users */
    Route::get('/users', 'UserController@index')->name('users');

    /* add user */
    Route::get('users/create', 'UserController@create')->name('show_add_user');
    Route::post('users/store', 'UserController@store')->name('add_user');

    /* delete user */
    Route::get('users/delete/{id}', 'UserController@delete')->name('delete_user')->where('id', '[0-9]+');

    /* update user */

    Route::get('users/edit/{id}', 'UserController@edit')->name('show_edit_user')->where('id', '[0-9]+');
    Route::Put('users/update/{id}', 'UserController@update')->name('update_user')->where('id', '[0-9]+');
});
Route::group(['middleware' => 'auth'], function() {
    /* add article */
    Route::get('articles/add', 'ArticleController@create')->name('view_add_article');
    Route::post('article/store', 'ArticleController@store')->name('add_article');
});


Route::get('/articles', 'ArticleController@index')->name('articles_list');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
