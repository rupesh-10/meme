<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:web')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace'=>'Api'],function(){
    Route::resource('/memes','MemeController');
    Route::get('/like/{id}', 'LikeDislikeController@like')->name('like');
    Route::get('/dislike/{id}', 'LikeDislikeController@dislike')->name('dislike');
    });
