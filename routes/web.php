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

Route::get('/', 'FrontController@index');
Route::get('contact', 'FrontController@contact');
Route::post('contact', 'FrontController@contact_save');
Route::get('team', 'FrontController@team');
Route::get('project/show/{id}', 'FrontController@show');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
