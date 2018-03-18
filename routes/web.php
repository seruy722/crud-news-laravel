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

Route::prefix('news')->group(function () {
    Route::get('index', 'NewsController@index')->name('news.index');

    Route::get('create', 'NewsController@create')->name('news.create');

    Route::post('add', 'NewsController@add')->name('news.add');

    Route::get('show', 'NewsController@show')->name('news.show');

    Route::get('/{id}/view', 'NewsController@view')->name('news.view');

    Route::post('/{id}/update', 'NewsController@update')->name('news.update');

    Route::get('/{id}/edit', 'NewsController@edit')->name('news.edit');

    Route::get('/{id}/destroy', 'NewsController@destroy')->name('news.destroy');
});
