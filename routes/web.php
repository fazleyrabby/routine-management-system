<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/routine', 'HomeController@routineView')->name('routine');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('teachers/requests', 'TeacherController@requests')->name('teachers.requests');
    Route::resource('sessions', 'SessionController');
    Route::resource('shifts', 'ShiftController');
    Route::resource('rooms', 'RoomController');
    Route::resource('departments', 'DepartmentController');
    Route::resource('teachers', 'TeacherController');
    Route::resource('courses', 'StudentController');
    Route::resource('batches', 'BatchController');
    Route::resource('sections', 'SectionController');
    Route::resource('users', 'UserController');
    Route::resource('courses', 'CourseController');
    Route::resource('routine_committee', 'RoutineCommitteeController');
});

#============================ *Logout Route* ============================#

Route::get('/logout', function(){
    Auth::logout();
    Session::flush();
    return Redirect::to('login');
});
