<?php


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Main menu

Route::get('/', 'Pages\IndexPageController@index')->name('index');
Route::get('/contacts', function () {
    return view('pages.contacts');
})->name('contacts');

// Left menu

Route::get('/schedule', 'Pages\SchedulePageController@index')->name('schedule');


Route::get('/home', 'HomeController@index')->name('home');
