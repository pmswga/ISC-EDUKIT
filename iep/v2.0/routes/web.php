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
Route::get('/personal', function() {
    return view('pages.personal');
})->name('personal');
Route::get('/teachers', function() {
    return view('pages.teachers');
})->name('teachers');


Route::get('/home', 'HomeController@index')->name('home');
