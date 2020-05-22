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

Route::get('/', 'MicropostsController@index');

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

// ユーザ機能
Route::group(['middleware' => 'auth'], function () {      // Route::groupでルーティンググループを作成
                                            // 'middleware' => ['auth']でこのルーティンググループ内ではログイン認証が必要
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);     // usersにアクセスした時の7つの基本ルーティングを作成
                                            // ただし、今回はindex（ユーザ一覧）とshow（ユーザ詳細）だけに限定
    
    Route::group(['prefix' => 'users/{id}'], function() {
       Route::post('follow', 'UserFollowController@store')->name('user.follow');
       Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
       Route::get('followings', 'UsersController@followings')->name('users.followings');
       Route::get('followers', 'UsersController@followers')->name('users.followers');
       Route::get('favorites', 'UsersController@favorites')->name('users.favorites'); 
    });
    
    Route::group(['prefix' => 'microposts/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });    
                                            
    Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'destroy']]);
});