<?php


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Main menu

Route::get('/', 'Pages\IndexPageController@index')->name('index');
Route::get('/news', function () {
    return view('pages.news');
})->name('news');
Route::get('/contacts', function () {
    return view('pages.contacts');
})->name('contacts');

// Left menu

Route::get('/education-unit-1', function() {
    return view('pages.education_units.unit_1');
})->name('education-unit-1');

Route::get('/education-unit-2', function() {
    return view('pages.education_units.unit_2');
})->name('education-unit-2');

Route::get('/education-unit-3', function() {
    return view('pages.education_units.unit_3');
})->name('education-unit-3');

Route::get('/schedule', 'Pages\SchedulePageController@index')->name('schedule');
Route::get('/personal', function() {
    return view('pages.personal');
})->name('personal');
Route::get('/teachers', function() {
    return view('pages.teachers');
})->name('teachers');


Route::get('/home', 'HomeController@index')->name('home');
