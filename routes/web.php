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
    return redirect("feeds");
});

Route::view('/check_email','mails.two_factor_code_mail');
Route::group(['middleware'=>['auth','twofactor'],'namespace'=>"User"],function(){
    Route::view('/welcome','welcome');
    Route::post('/connect/{id}', 'ConnectionController@connect')->name('connect');
    Route::resource('/comment',"CommentController");
    Route::resource('/feeds', 'FeedController',[
        'names'=>[
            'index'=>'feeds'
        ]
    ]);
    Route::resource('profile', 'ProfileController');
    Route::resource('memes', 'MemeController');
});


//Authentications
Route::post('verify/resend','Auth\TwoFactorAuthenticationController@resend')->name('verify.resend');
Route::resource('verify','Auth\TwoFactorAuthenticationController')->only(['index','store']);

Auth::routes();


