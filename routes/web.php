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
    return redirect("feed");
});

Route::post('/connect/{id}', 'ConnectionController@connect')->name('connect');

Route::post('/comment/{id}', "CommentController@store")->name('comment');
Route::post('/comment/update/{id}', 'CommentController@update')->name('comment.update');
Route::delete('/comment/destroy/{id}', 'CommentController@destroy')->name('comment.delete');
Auth::routes();

Route::get('/feed', 'HomeController@index')->name('feed');
Route::resource('profile', 'ProfileController');
Route::resource('memes', 'MemeController');
