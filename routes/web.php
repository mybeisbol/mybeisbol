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

Route::get('/dashboard/{id?}', 'DashboardController@index');

///Resources
Route::resource('/categories', 'CategoryController');
Route::resource('/admins', 'AdminController');


Route::get('/javascript/', 'AdminController@javascript');