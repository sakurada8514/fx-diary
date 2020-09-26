<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

//会員登録
 Route::post('/register', 'Auth\RegisterController@register')->name('register');

 //ログイン
 Route::post('/login', 'Auth\LoginController@login')->name('login');

 //ログアウト
 Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

 //ログイン中のユーザー情報
 Route::get('/user', function() {
     return Auth::user();
 })->name('user');