<?php

use App\Http\Controllers\Blog\PostController;
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
Route::get('/about', 'Blog\HomeController@about')->name('about');
Route::get('/contact', 'Blog\HomeController@contact')->name('contact');

Route::group(['prefix' => 'post', 'namespace' => 'Blog'], function () {
   Route::get('/', 'PostController@index')->name('blog.post.index');
   Route::get('/{post}', 'PostController@show')->name('blog.post.show');

   Route::post('/{post}/comment', 'CommentController@store')->middleware('auth')->name('blog.post.comment.store');
   Route::post('/{post}/like', 'LikeController@update')->middleware('auth')->name('blog.post.like.update');
});

   Route::get('/category', 'Blog\CategoryController@index')->name('blog.category.index');
   Route::get('/category/{category}/posts', 'Blog\CategoryController@show')->name('blog.category.show');


Route::prefix('admin')->name('blog.admin.')->namespace('Blog\Admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('/', 'HomeController');
    Route::resource('/category', 'CategoryController')->except(['show']);
    Route::resource('/post', 'PostController');
    Route::resource('/article', 'ArticleController');
    Route::resource('/tag', 'TagController')->only(['index', 'create', 'store', 'destroy']);
    Route::resource('/user', 'UserController');
});

Route::prefix('personal')->name('blog.personal.')->namespace('Blog\Personal')->middleware(['auth'])->group(function () {
    Route::resource('/', 'HomeController');
    Route::resource('/comment', 'CommentController');
    Route::resource('/liked', 'LikedController');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
