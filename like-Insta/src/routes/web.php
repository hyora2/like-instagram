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


Route::get('posting','PostingController@index');
Route::post('posting', 'PostingController@upload');
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::post('home', 'HomeController@onePostdelete');

 // Route::post('user', 'User\UserController@updateUser');
 Route::get('welcome', 'User\UserController@index');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('profile/{username?}', 'ProfileController@index');
Route::get('mypage', 'ProfileController@mypageindex');
Route::get('liked/{post_id?}','LikeController@likedindex');
Route::post('like', 'LikeController@add');



Route::get('github', 'Github\GithubController@top');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
