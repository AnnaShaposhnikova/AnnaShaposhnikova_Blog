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

Route::get('/', 'HomeController@home')->name('home');
Route::get('/categories', 'CategoryController@category')->name('category');
Route::get('/categories/create', 'CategoryController@create')->name('categoryCreate');
Route::post('/categories/save', 'CategoryController@save')->name('categorySave');
Route::get('/categories/update/{category}', 'CategoryController@update')->name('categoryUpdate');
Route::post('/categories/store/{category}', 'CategoryController@store')->name('categoryStore');
Route::get('/categories/delite/{category}', 'CategoryController@delite')->name('categoryDelite');

Route::get('/tags', 'TagController@tag')->name('tag');
Route::get('/tags/create', 'TagController@create')->name('tagCreate');
Route::post('/tags/save', 'TagController@save')->name('tagSave');
Route::get('/tags/update/{tag}', 'TagController@update')->name('tagUpdate');
Route::post('/tags/store/{tag}', 'TagController@store')->name('tagStore');
Route::get('/tags/delite/{tag}', 'TagController@delite')->name('tagDelite');

Route::get('/posts', 'PostController@post')->name('post');
Route::get('/posts/create', 'PostController@create')->name('postCreate');
Route::post('/posts/save', 'PostController@save')->name('postSave');
Route::get('/posts/update/{post}', 'PostController@update')->name('postUpdate');
Route::post('/posts/store/{post}', 'PostController@store')->name('postStore');
Route::get('/posts/delite/{post}', 'PostController@delite')->name('postDelite');

Route::get('/comments', 'CommentController@comment')->name('comment');
Route::get('/comments/create', 'CommentController@create')->name('commentCreate');
Route::post('/comments/save', 'CommentController@save')->name('commentSave');
Route::get('/comments/update/{comment}', 'CommentController@update')->name('commentUpdate');
Route::post('/comments/store/{comment}', 'CommentController@store')->name('commentStore');
Route::get('/comments/delite/{comment}', 'CommentController@delite')->name('commentDelite');

Route::get('/users', 'UserController@user')->name('user');
Route::get('/users/create', 'UserController@create')->name('userCreate');
Route::post('/users/save', 'UserController@save')->name('userSave');
Route::get('/users/update/{user}', 'UserController@update')->name('userUpdate');
Route::post('/users/store/{user}', 'UserController@store')->name('userStore');
Route::get('/users/delite/{user}', 'UserController@delite')->name('userDelite');