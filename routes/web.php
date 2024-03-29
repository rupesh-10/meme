<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return redirect("home");
});

Route::post('/connect/{id}', 'ConnectionController@connect')->name('connect');
Route::get('/like/{id}', 'LikeDislikeController@like')->name('like');
Route::get('/dislike/{id}', 'LikeDislikeController@dislike')->name('dislike');
Route::post('/comment/{id}', "CommentController@store")->name('comment');
Route::post('/comment/update/{id}', 'CommentController@update')->name('comment.update');
Route::delete('/comment/destroy/{id}', 'CommentController@destroy')->name('comment.delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('profile', 'ProfileController');
Route::resource('memes', 'MemeController');
