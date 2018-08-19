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

Route::get('/hell', function () {
    return view('hell');
})->name('hell');

Route::get('/education-unit-1', function () {
    return view('pages.education_units.unit_1');
})->name('education-unit-1');

Route::get('/education-unit-2', function () {
    return view('pages.education_units.unit_2');
})->name('education-unit-2');

Route::get('/education-unit-3', function () {
    return view('pages.education_units.unit_3');
})->name('education-unit-3');

Route::get('/price', function () {
    return view('pages.price');
})->name('price');

Route::get('/admission-documents', function () {
    return view('pages.admission-documents');
})->name('admission-documents');

Route::get('/schedule', 'Pages\SchedulePageController@index')->name('schedule');

Route::get('/personal', function () {
    return view('pages.personal');
})->name('personal');

Route::get('/teachers', function () {
    return view('pages.teachers');
})->name('teachers');

Route::resource('/feedback', 'FeedbackController');



Route::group(['prefix' => 'student', 'namespace' => 'Accounts', 'middleware' => ['auth', 'isStudent']], function () {

    Route::get('/', 'StudentController@index')->name('student.index');
    Route::get('/settings', 'StudentController@settings')->name('student.settings');

});

Route::group(['prefix' => 'elder', 'namespace' => 'Accounts', 'middleware' => ['auth', 'isElder']], function () {

    Route::get('/', 'ElderController@index')->name('elder.index');

});

Route::group(['prefix' => 'parent', 'namespace' => 'Accounts', 'middleware' => ['auth', 'isParent']], function () {

    Route::get('/', 'ParentController@index')->name('parent.index');

});
    
Route::group(['prefix' => 'admin', 'namespace' => 'Accounts', 'middleware' => ['auth', 'isAdmin']], function () {

    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/users', '\App\Http\Controllers\CRUD\UserController@index')->name('admin.accounts.index');
    Route::get('/settings', 'AdminController@settings')->name('admin.settings');

    // Temp routes

    Route::get('/news/add', function () {
        return view('accounts.admin.news.add');
    });

    Route::get('/news', function () {
        return view('accounts.admin.news.index');
    });

    /*!
        Resource routes
    */

    Route::resource('/units', '\App\Http\Controllers\CRUD\Lists\ListEducationUnitController');
    Route::resource('/groups', '\App\Http\Controllers\CRUD\GroupController');
    Route::resource('/subjects', '\App\Http\Controllers\CRUD\SubjectController');

});
