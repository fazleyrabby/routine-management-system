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
    Route::resource('routine_committee', 'RoutineCommitteeController');
    Route::resource('time_slots', 'TimeSlotController');

    //Day wise time slot & class slot
    Route::get('day_wise_slots', 'DayWiseSlotController@index')->name('day_wise_slots');
    Route::get('day_wise_slot_create/{id}', 'DayWiseSlotController@create')->name('day_wise_slot_create');
    Route::post('day_wise_slot_store', 'DayWiseSlotController@store')->name('day_wise_slot_store');
    Route::post('day_wise_slot_destroy/{id}', 'DayWiseSlotController@destroy')->name('day_wise_slot_destroy');

    Route::get('full_routine', 'FullRoutineController@index')->name('full_routine');

});

#============================ *Logout Route* ============================#

Route::get('/logout', function(){
    Auth::logout();
    Session::flush();
    return Redirect::to('login');
});
