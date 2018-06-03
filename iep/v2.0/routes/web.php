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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', 'AdminPageController@index')->name('admin');
    Route::resource('/news', 'NewsController', ['as' => 'admin']);

});

Route::group(['prefix' => 'student', 'namespace' => 'Student', 'middleware' => ['auth', 'isStudent']], function () {

    Route::get('/', 'StudentController@index')->name('student.index');
    Route::get('/info', 'StudentController@info')->name('student.info');

});

Route::group(['prefix' => 'teacher', 'namespace' => 'Teacher', 'middleware' => ['auth', 'isTeacher']], function () {

    Route::get('/', 'TeacherController@index')->name('teacher.index');
    Route::get('/info', 'TeacherController@info')->name('teacher.info');

});
