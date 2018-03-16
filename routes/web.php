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

Auth::routes();

Route::get('/', ['uses' => 'MainController@index', 'as' => 'main']);
Route::get('/products/{alias}', ['uses' => 'ProductController@index', 'as' => 'product']);
Route::get('/category/{alias}', ['uses' => 'CategoryController@index', 'as' => 'category']);

Route::get('/home', 'HomeController@index')->name('home');
