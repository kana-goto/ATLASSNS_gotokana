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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'], function() {

Route::get('/top','PostsController@index');
Route::post('post/create','PostsController@create');
Route::post('post/update','PostsController@update');
Route::get('post/{id}/delete','PostsController@delete');

Route::get('/profile','UsersController@show');
Route::post('/profile','UsersController@profile');

Route::get('/search','UsersController@index');
Route::post('/search','UsersController@search');

Route::get('/followList','FollowsController@followList');
Route::get('/followerList','FollowsController@followerList');

Route::post('/users/{user}/follow','FollowsController@follow')->name('follow');
Route::delete('/users/{user}/unfollow','FollowsController@unfollow')->name('unfollow');

Route::get('/users/{id}/user_profile','FollowsController@profile');

Route::get('/logout', 'Auth\LoginController@logout');

});
