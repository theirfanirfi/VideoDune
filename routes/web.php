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

Route::get('/login', 'LoginController@index')->name('login');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/video/{id}', 'HomeController@Video')->name('video');
Route::get('/videos', 'HomeController@Videos')->name('videos');
Route::get('/myvideos', 'HomeController@myvideos')->name('myvideos');
