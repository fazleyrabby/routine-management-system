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
    Route::resource('shift_sessions', 'ShiftSessionController');
    Route::resource('yearly_sessions', 'YearlySessionController');
//    Route::get('yearly_sessions/delete/{}', 'YearlySessionController@index')->name('admin');
    Route::delete('yearly_session/{year}','YearlySessionController@destroy')->name('yearly_session.destroy');
    Route::resource('shifts', 'ShiftController');
    Route::resource('rooms', 'RoomController');
    Route::resource('departments', 'DepartmentController');
    Route::resource('teachers', 'TeacherController');
    Route::resource('courses', 'StudentController');
    Route::resource('batches', 'BatchController');
    Route::resource('sections', 'SectionController');
    Route::resource('users', 'UserController');
    Route::resource('ranks', 'TeacherRankController');
    Route::resource('students', 'StudentController');
    Route::get('theory_section/{id}', 'StudentController@theory_section')->name('theory_section');
    Route::post('theory_section_store', 'StudentController@theory_section_store')->name('theory_section_store');
    Route::post('lab_section', 'StudentController@lab_section')->name('lab_section');
    Route::get('lab_section/{id}', 'StudentController@lab_section')->name('lab_section');
    Route::resource('section_students', 'SectionStudentController');
    Route::resource('courses', 'CourseController');
    Route::resource('assign_courses', 'AssignCourseController');
    Route::resource('routine_committee', 'RoutineCommitteeController');
    Route::resource('time_slots', 'TimeSlotController');
    Route::resource('full_routine', 'FullRoutineController');
});

#============================ *Logout Route* ============================#

Route::get('/logout', function(){
    Auth::logout();
    Session::flush();
    return Redirect::to('login');
});
