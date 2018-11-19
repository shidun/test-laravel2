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

Route::get('/home', 'HomeController@index')->name('home');

Route::any('upload', 'StudentController@upload')->name('upload');

Route::any('mail', 'StudentController@mail')->name('mail');

Route::any('cache1', 'StudentController@cache1')->name('cache1');

Route::any('cache2', 'StudentController@cache2')->name('cache2');

Route::any('error', 'StudentController@error')->name('error');

Route::any('queue', 'StudentController@queue')->name('queue');