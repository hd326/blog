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

Route::resource('posts', 'PostController');

Route::resource('categories', 'CategoryController', ['except' => ['create']]);

Route::resource('tags', 'TagController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
