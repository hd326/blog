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
Route::get('/blog', 'BlogController@getIndex')->name('blog.index');

Route::get('/blog/{slug}', 'BlogController@getSingle')->name('blog.single')->where('slug', '[\w\d\-\_]+');
    
Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/contact', 'PagesController@contact');

Route::post('/contact', 'PagesController@postContact');

Route::resource('posts', 'PostController');

Route::resource('categories', 'CategoryController', ['except' => ['create']]);

Route::resource('tags', 'TagController');

//Route::resource('comments', 'CommentController', ['except' => ['create']]);


Route::get('comments/{id}/edit', 'CommentController@edit')->name('comments.edit');
Route::post('comments/{id}', 'CommentController@update')->name('comments.update');
Route::post('comments/{id}', 'CommentController@store')->name('comments.store');
Route::delete('comments/{id}', 'CommentController@destroy')->name('comments.destroy');
Route::get('comments/{id}/delete', 'CommentController@delete')->name('comments.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
