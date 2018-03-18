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

Route::get('news/index','NewsController@index')->name('news.index');

Route::get('news/create','NewsController@create')->name('news.create');

Route::post('news/add','NewsController@add')->name('news.add');

Route::get('news/show','NewsController@show')->name('news.show');

Route::get('news/{id}/view','NewsController@view')->name('news.view');

Route::post('news/{id}/update','NewsController@update')->name('news.update');

Route::get('news/{id}/edit','NewsController@edit')->name('news.edit');

Route::get('news/{id}/destroy','NewsController@destroy')->name('news.destroy');