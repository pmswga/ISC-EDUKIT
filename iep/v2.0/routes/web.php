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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/history', 'HistoryPageController@index')->name('history');
Route::get('/teachers', 'TeacherPageController@index')->name('teachers');
Route::get('/news', 'NewsPageController@index')->name('news');
Route::get('/main-schedule', 'MainSchedulePageController@index')->name('main-schedule');
Route::get('/change-schedule', 'ChangeSchedulePageController@index')->name('change-schedule');


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'student', 'namespace' => 'Student'], function () {

    Route::get('/', 'StudentController@index')->name('student.index');
    Route::get('/info', 'StudentController@info')->name('student.info');


});
