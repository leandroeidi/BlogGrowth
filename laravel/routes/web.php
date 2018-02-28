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

Route::get('/', 'BlogController@list_posts');

Route::get('/post/{id}', 'BlogController@post_detailed');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/admin/list', 'AdminController@list_posts');

Route::get('/admin/new-post', 'AdminController@new_post');

Route::post('/admin/new-post', 'AdminController@insert_new_post');

Route::get('/admin/edit-post/{id}', 'AdminController@edit_post');

Route::post('/admin/edit-post', 'AdminController@update_post');

Route::post('/admin/delete-posts', 'AdminController@delete_posts');
