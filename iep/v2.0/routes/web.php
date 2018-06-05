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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'isAdmin']], function () {

    Route::get('/', 'AdminPageController@index')->name('admin.index');
    Route::resource('/news', '\App\Http\Controllers\CRUDControllers\NewsController', ['as' => 'admin']);

});

Route::group(['prefix' => 'director', 'namespace' => 'Director', 'middleware' => ['auth', 'isDirector']], function () {

    Route::get('/', 'DirectorPageController@index')->name('director.index');

});

Route::group(['prefix' => 'teacher', 'namespace' => 'Teacher', 'middleware' => ['auth', 'isTeacher']], function () {

    Route::get('/', 'TeacherPageController@index')->name('teacher.index');
    Route::resource('/news', '\App\Http\Controllers\CRUDControllers\NewsController', ['as' => 'teacher']);
    Route::get('/settings', 'TeacherPageController@settings')->name('teacher.settings');

});

Route::group(['prefix' => 'student', 'namespace' => 'Student', 'middleware' => ['auth', 'isStudent']], function () {

    Route::get('/', 'StudentPageController@index')->name('student.index');
    Route::get('/settings', 'StudentPageController@settings')->name('student.settings');

});

Route::group(['prefix' => 'elder', 'namespace' => 'Elder', 'middleware' => ['auth', 'isElder']], function () {

    Route::get('/', 'ElderPageController@index')->name('elder.index');


});

Route::group(['prefix' => 'parent', 'namespace' => 'Parent', 'middleware' => ['auth', 'isParent']], function () {

    Route::get('/', 'ParentPageController@index')->name('parent.index');


});
