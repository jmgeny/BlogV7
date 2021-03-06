<?php

use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'blog');

Auth::routes();

//web
Route::get('blog', 'Web\PageController@blog')->name('blog');
Route::get('misPost/{user_id}','Web\PageController@misPost')->name('misPost');

Route::get('entrada/{slug}','Web\PageController@post')->name('post');

Route::get('categoria/{slug}', 'Web\PageController@category')->name('category');
Route::get('etiqueta/{slug}','Web\PageController@tag')->name('tag');

//admin

Route::resource('posts','Admin\PostController')->names('admin.posts');
Route::resource('categories','Admin\CategoryController')->names('admin.categories');
Route::resource('tags','Admin\TagController')->names('admin.tags');
