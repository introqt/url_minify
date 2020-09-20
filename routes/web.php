<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'UrlController@index')->name('url.index');
Route::post('url', 'UrlController@create')->name('url.create');
Route::get('{url}', 'UrlController@link')->name('url.link');
