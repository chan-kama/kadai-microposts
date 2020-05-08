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

Route::get('/', function () {
    return view('welcome');
});

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
    // URL（/signup）にgetリクエストを送ると、コントローラー「Auth\RegisterController」内のアクション「showRegistrationForm」を実行
    // name()でこのルーティングに「signup.get」と命名

Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
    // URL（/signup）にpostリクエストを送ると、コントローラー「Auth\RegisterController」内のアクション「register」を実行
    // name()でこのルーティングに「signup.post」と命名
    
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');