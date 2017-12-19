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


Auth::routes();

Route::get('/home', 'PostController@PostPage')->name('home');

Route::get('/createpost', 'PostController@PostPage')->name('PostPage');

Route::post('/submitpost', 'PostController@SubmitPost')->name('SubmitPost');

Route::post('/submitcomment','CommentController@SubmitComment')->name('SubmitComment');

Route::get('/deletepost/{id}','PostController@DeletePost');