<?php

use Illuminate\Support\Facades\Route;

use Intervention\Image\ImageManagerStatic as Image;
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
//Route::get('/', function (){
//   $img = Image::make('https://source.unsplash.com/1280x720');
//   $img->resize(300, 200)->save('new'.rand ( 1 , 100 ).'.jpg');
////   $img->save('new.jpg',5);
//});
Route::get('/', 'HomeController@index')->name('home');
Route::get('/routine', 'HomeController@routine')->name('routine');
Route::post('/routine_view', 'HomeController@routine_view')->name('routine_view');
Route::post('/routine_print', 'HomeController@routine_print')->name('routine_print');
Route::post('reset_password_with_token', 'UserController@resetPassword')->name('reset_password_with_token');


Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('teachers/requests', 'TeacherController@requests')->name('teachers.requests');
    Route::resource('sessions', 'SessionController');
    Route::resource('shift_sessions', 'ShiftSessionController');
    Route::resource('yearly_sessions', 'YearlySessionController');
//    Route::get('yearly_sessions/delete/{}', 'YearlySessionController@index')->name('admin');
//    Route::post('yearly_session','YearlySessionController@status')->name('yearly_session.status');
    Route::resource('shifts', 'ShiftController');
    Route::resource('rooms', 'RoomController');
    Route::resource('departments', 'DepartmentController');
    Route::resource('teachers', 'TeacherController');
    Route::resource('courses', 'StudentController');
    Route::resource('batches', 'BatchController');
    Route::resource('sections', 'SectionController');
    Route::resource('users', 'UserController');
    Route::get('profile_edit/{id}', 'UserController@profile_edit')->name('profile_edit');
    Route::get('password_edit', 'UserController@password_edit')->name('password_edit');
    Route::post('password_update', 'UserController@password_update')->name('password_update');

    Route::resource('ranks', 'TeacherRankController');
    Route::resource('students', 'StudentController');

    Route::get('students_create/{id}', 'StudentController@create')->name('students_create');

    Route::get('teachers_offday/{id}', 'TeachersOffdayController@create')->name('teachers_offday');
    Route::post('teachers_offday_store', 'TeachersOffdayController@store')->name('teachers_offday_store');

    Route::get('theory_section/{id}', 'StudentController@theory_section')->name('theory_section');
    Route::post('theory_section_store', 'StudentController@theory_section_store')->name('theory_section_store');

    Route::post('lab_section_store', 'StudentController@lab_section_store')->name('lab_section_store');
    Route::get('lab_section/{id}', 'StudentController@lab_section')->name('lab_section');

    Route::resource('section_students', 'SectionStudentController');
    Route::resource('courses', 'CourseController');
    Route::resource('assign_courses', 'AssignCourseController');

    Route::resource('time_slots', 'TimeSlotController');

    //Day wise time slot & class slot
    Route::get('day_wise_slots', 'DayWiseSlotController@index')->name('day_wise_slots');
    Route::get('day_wise_slot_create/{id}', 'DayWiseSlotController@create')->name('day_wise_slot_create');
    Route::post('day_wise_slot_store', 'DayWiseSlotController@store')->name('day_wise_slot_store');
    Route::post('day_wise_slot_destroy/{id}', 'DayWiseSlotController@destroy')->name('day_wise_slot_destroy');

    Route::get('full_routine/{yearly_session}', 'FullRoutineController@index')->name('full_routine');
    Route::post('routine_create', 'FullRoutineController@create')->name('routine_create');
    Route::post('routine_reset', 'FullRoutineController@reset')->name('routine_reset');

    Route::post('class_slot_update', 'FullRoutineController@class_slot_update')->name('class_slot_update');

    Route::post('teacher_wise_view', 'FullRoutineController@teacher_wise_view')->name('teacher_wise_view');

    Route::get('teacher_search', 'FullRoutineController@teacher_search')->name('teacher_search');
    Route::get('batch_search', 'FullRoutineController@batch_search')->name('batch_search');
    Route::post('batch_wise_view', 'FullRoutineController@batch_wise_view')->name('batch_wise_view');
    Route::post('teacher_wise_print', 'FullRoutineController@teacher_wise_print')->name('teacher_wise_print');

    Route::post('routine_committee_invite', 'RoutineCommitteeController@store')->name('routine_committee_invite');

    Route::post('temp_routine_access', 'RoutineCommitteeController@temp_routine_access')->name('temp_routine_access');



    Route::post('routine_committee_status', 'RoutineCommitteeController@routine_committee_status')->name('routine_committee_status');

    Route::get('roles', 'AdminController@roles')->name('roles');





});

#============================ *Logout Route* ============================#

Route::get('/logout', function(){
    Auth::logout();
    Session::flush();
    return Redirect::to('login');
});
