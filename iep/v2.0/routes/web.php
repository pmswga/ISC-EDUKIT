<?php

Auth::routes();

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
