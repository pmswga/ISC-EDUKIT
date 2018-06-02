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

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'student', 'namespace' => 'Student'], function () {

    Route::get('/', function () {
        return view('student.index');
    });
    Route::get('/info', function () {
        return "This is student personal info";
    });

});
