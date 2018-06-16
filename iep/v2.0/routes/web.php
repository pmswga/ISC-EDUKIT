<?php


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'Pages\IndexPageController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
