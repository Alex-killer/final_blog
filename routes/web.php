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

Route::get('/', 'Blog\HomeController@index')->name('home');

Route::group(['prefix' => 'post', 'namespace' => 'Blog'], function () {
   Route::get('/', 'PostController@index')->name('blog.post.index');
   Route::get('/{post}', 'PostController@show')->name('blog.post.show');

//   Route::get('/{post}/comment', 'CommentController@index')->name('blog.post.comment.index');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
