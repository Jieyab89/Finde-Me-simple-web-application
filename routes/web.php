<?php

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

//routes landing page

route::get('/', 'LandingController@index')->name('welcome');
//routes menu
Route::get('/feeds', 'MenuController@index')->name('index');
Route::get('/about', 'MenuController@about')->name('about');
Route::get('/pricing', 'MenuController@pricing')->name('pricing');
Route::get('/contact-us', 'MenuController@contact')->name('contact');
Route::get('/user-list', 'MenuController@userlist')->name('list');
//end routes menu

Auth::routes(); //auth rotes

//user routes
Route::get('/home', 'HomeController@dashboard')->name('home');
Route::get('/user-activity', 'UserController@activity')->name('activity');
Route::get('/user-edit-post/{post:id}', 'UserController@editpost')->name('users.post.edit');
Route::any('/user-edit-post-update/{post:id}', 'UserController@updatepost')->name('users.post.update');
Route::any('/hapus/post/{id}', 'UserController@delpost')->name('users.post.hapus');
Route::get('/profiles/users', 'UserController@profiles')->name('users.profiles');
//Route::any('/profile/update/users', 'UserController@updateprofiles')->name('user.update');
Route::put('/profile/users/update', 'UserController@update')->name('users.update');
//end user routes

//post routes
Route::get('/post', 'UserController@post')->name('post');
Route::post('/posting/upload', 'UserController@store')->name('upload.post');
//end post routes
