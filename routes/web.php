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
//basic routes


Route::get('/', 'PagesController@index');
Route::get('/welcome', 'PagesController@default')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Task Resource
Route::resource('tasks', 'TaskController');

//route to mark completion
Route::put('complete/{task}', 'TaskController@complete')->name('complete');

//route to search task
Route::get('search', 'TaskController@search')->name('search');
