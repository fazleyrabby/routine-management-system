<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\DayWiseSlot;
use App\Models\FullRoutine;
use App\Models\RoutineCommittee;
use App\Models\Section;
use App\Models\SectionStudent;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Batch;
use App\Models\Room;
use App\Models\TeachersOffday;
use App\Models\YearlySession;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\Auth;

class FullRoutineController extends MasterController
{
    public function index($yearly_session)
    {
//        $time_slot_id = 2;

//        $all_slot = DayWiseSlot::with(['time_slot' => function ($query) {
//            $query->select('*')->orderBy('from');
//        }])->where('day_id',1)->get();
//
//        $selected_slot = TimeSlot::where('id', $time_slot_id)->first();
//
//        echo "<pre>";
//        echo "<style> *{font-size: 17px; font-family: 'consolas'; } </style>";
//        foreach ($all_slot as $slots){
////            print_r($slots->time_slot);
//
//                echo "ID-".$slots->time_slot->id."  From-".$slots->time_slot->from;
//                echo "<br>";
//                echo "      To-".$slots->time_slot->to;
//                echo "<br>";
//                echo "<br>";
//
//        }



//        function closest($array, $number) {

//            sort($array);
//            foreach ($array as $a) {
//                if ($a->from > $number->from)
//
//                    return $a;
//            }
//            return end($array);
//        }
//
//        echo closest($all_slot, $selected_slot);

//        echo "<br>";
//        echo "Selected Slot :";
//        echo "<br>";
//        echo "Id-".$selected_slot->id."  From-".$selected_slot->from;
//        echo "<br>";
//        echo "      To-".$selected_slot->to;
//        echo "<br>";

//        exit();

        $slots = Day::with(['routine','routine.course','routine.teacher','routine.teacher.user','routine.room','routine.day','routine.time_slot'])->get();

        $day_wise_slots = DayWiseSlot::with('day','time_slot')->get();

//dd($slots[0]);

        $sections = Student::select('*','sections.id as section_id','batch.id as batch_id')
            ->leftJoin('section_students', 'section_students.student_id', '=', 'students.id')
            ->leftJoin('sections', 'sections.id', '=', 'section_students.section_id')
            ->leftJoin('batch', 'students.batch_id', '=', 'batch.id')
            ->leftJoin('shifts', 'shifts.id', '=', 'batch.shift_id')
            ->leftJoin('departments', 'departments.id', '=', 'batch.department_id')
            ->where('batch.is_active','yes')
            ->get();

        $last_created_by = FullRoutine::select('users.firstname','users.lastname','routine.created_at')->leftJoin('users','users.id','=','routine.created_by')->orderBy('routine.created_at','DESC')->get()->first();
        $last_edited_by = FullRoutine::select('users.firstname','users.lastname','routine.updated_at')->leftJoin('users','users.id','=','routine.edited_by')->orderBy('routine.updated_at','DESC')->whereNotNull('routine.edited_by')->get()->first();


        $teachers = Teacher::with(['user','rank'])->where('is_active','yes')->get();

        $request_check = RoutineCommittee::where('receiver_id', Auth::user()->id)->first();


//        $teachers = Teacher::with(['user' => function ($query) {
//            $query->select('id','firstname','lastname');
//        },'rank' => function ($query) {
//            $query->select('id','rank')->where('is_active','yes');
//        }
//        ])->where('is_active','yes')->get();

        $courses = Course::where('is_active','yes')->get();
        $rooms = Room::where('is_active','yes')->get();

        return view('admin.routine.index', compact('sections','slots','rooms','teachers','courses','yearly_session','day_wise_slots','request_check','last_created_by','last_edited_by'));
    }

    public function batch_search(){
        $sessions = YearlySession::with('session')->get();
        $batches = Student::select('*','sections.id as section_id','batch.id as batch_id')
            ->leftJoin('section_students', 'section_students.student_id', '=', 'students.id')
            ->leftJoin('sections', 'sections.id', '=', 'section_students.section_id')
            ->leftJoin('batch', 'students.batch_id', '=', 'batch.id')
            ->leftJoin('shifts', 'shifts.id', '=', 'batch.shift_id')
            ->leftJoin('departments', 'departments.id', '=', 'batch.department_id')
            ->leftJoin('yearly_sessions', 'yearly_sessions.id', '=', 'students.yearly_session_id')
            ->leftJoin('shift_sessions', 'shift_sessions.session_id', '=', 'yearly_sessions.session_id')
            ->get();


        return view('admin.routine.batch_search', compact('sessions','batches'));
    }

    public function batch_wise_view(Request $request){

        $batch_id = $request->batch_id;
        $y_session_id = $request->y_session_id;

        list($batch_id, $section_id) = explode(',', $batch_id);

        $slots = Day::with(['routine' => function ($query) use ($batch_id,$y_session_id,$section_id) {
            if ($section_id != ''){
                $query->select('id','teacher_id','batch_id','section_id','room_id','day_id','time_slot_id','course_id','yearly_session_id','room_id')->where('batch_id', $batch_id)->where('yearly_session_id',$y_session_id)->where('section_id',$section_id);
            }else{
                $query->select('id','teacher_id','batch_id','section_id','room_id','day_id','time_slot_id','course_id','yearly_session_id','room_id')->where('batch_id', $batch_id)->where('yearly_session_id',$y_session_id);
            }
        },'routine.course' => function ($query) {
            $query->select('id','course_name','course_code','course_type');
        },'routine.teacher' => function ($query) {
            $query->select('id','user_id')->where('is_active','yes');
        },'routine.room' => function ($query) {
            $query->select('id','room_type','building','room_no')->where('is_active','yes');
        }
        ])->get();


        $day_wise_slots = DayWiseSlot::with('day','time_slot')->get();

        $batch = Student::select('*','sections.id as section_id','batch.id as batch_id')
            ->leftJoin('section_students', 'section_students.student_id', '=', 'students.id')
            ->leftJoin('sections', 'sections.id', '=', 'section_students.section_id')
            ->leftJoin('batch', 'students.batch_id', '=', 'batch.id')
            ->leftJoin('shifts', 'shifts.id', '=', 'batch.shift_id')
            ->leftJoin('departments', 'departments.id', '=', 'batch.department_id')
            ->leftJoin('yearly_sessions', 'yearly_sessions.id', '=', 'students.yearly_session_id')
            ->leftJoin('shift_sessions', 'shift_sessions.session_id', '=', 'yearly_sessions.session_id')
            ->where('batch.id',$batch_id)
            ->where(function($query) use ($section_id){
                if ($section_id != ''){
                    $query->where('sections.id',$section_id);
                }
            })->first();

        return view('admin.routine.batch_wise_view', compact('slots','y_session_id','batch','day_wise_slots'));

    }

    public function teacher_search(){
        $sessions = YearlySession::with('session')->get();
        $teachers = Teacher::with(['user','rank'])->where('is_active','yes')->get();

        $teacher_id = Auth::user()->id;
        $y_session_id = YearlySession::where('is_active','yes')->orderBy('id','DESC')->pluck('id')->first();


//        $slots = Day::with(['day_wise_slot','day_wise_slot.time_slot','day_wise_slot.routine','day_wise_slot.routine.course','day_wise_slot.routine.room'])->get();




        $slots = Day::with(['routine' => function ($query) use ($teacher_id,$y_session_id) {
            $query->select('id','teacher_id','batch_id','section_id','room_id','day_id','time_slot_id','course_id','yearly_session_id','room_id')->where('teacher_id', $teacher_id)->where('yearly_session_id',$y_session_id);
        },'routine.course' => function ($query) {
            $query->select('id','course_name','course_code','course_type');
        },'routine.teacher' => function ($query) use ($teacher_id) {
            $query->select('id','user_id')->where('is_active','yes')->where('id', $teacher_id);
        },'routine.room' => function ($query) {
            $query->select('id','room_type','building','room_no')->where('is_active','yes');
        },'routine.batch' => function ($query) {
            $query->select('id','batch_no','department_id','shift_id')->where('is_active','yes');
        },'routine.batch.department' => function ($query) {
            $query->select('id','department_name')->where('is_active','yes');
        },'routine.batch.shift' => function ($query) {
            $query->select('id','slug')->where('is_active','yes');
        }
        ])->get();

        $day_wise_slots = DayWiseSlot::with('day','time_slot')->get();

        $teacher_detail = Teacher::with(['user','rank'])->where('is_active','yes')->where('id', $teacher_id)->first();

        return view('admin.routine.teacher_search', compact('sessions','teachers','slots','y_session_id','teacher_detail','day_wise_slots'));
    }

    public function teacher_wise_view(Request $request){

        $teacher_id = $request->teacher_id;
        $y_session_id = $request->y_session_id;

//        $slots = Day::with(['day_wise_slot','day_wise_slot.time_slot','day_wise_slot.routine','day_wise_slot.routine.course','day_wise_slot.routine.room'])->get();


        $slots = Day::with(['routine' => function ($query) use ($teacher_id,$y_session_id) {
            $query->select('id','teacher_id','batch_id','section_id','room_id','day_id','time_slot_id','course_id','yearly_session_id','room_id')->where('teacher_id', $teacher_id)->where('yearly_session_id',$y_session_id);
        },'routine.course' => function ($query) {
            $query->select('id','course_name','course_code','course_type');
        },'routine.teacher' => function ($query) use ($teacher_id) {
            $query->select('id','user_id')->where('is_active','yes')->where('id', $teacher_id);
        },'routine.room' => function ($query) {
            $query->select('id','room_type','building','room_no')->where('is_active','yes');
        },'routine.batch' => function ($query) {
            $query->select('id','batch_no','department_id','shift_id')->where('is_active','yes');
        },'routine.batch.department' => function ($query) {
            $query->select('id','department_name')->where('is_active','yes');
        },'routine.batch.shift' => function ($query) {
            $query->select('id','slug')->where('is_active','yes');
        }
        ])->get();

        $day_wise_slots = DayWiseSlot::with('day','time_slot')->get();

        $teacher_detail = Teacher::with(['user','rank'])->where('is_active','yes')->where('id', $teacher_id)->first();

        return view('admin.routine.teacher_wise_view', compact('slots','y_session_id','teacher_detail','day_wise_slots'));
    }

    public function teacher_wise_print(Request $request){

        $teacher_id = $request->teacher_id;
        $y_session_id = $request->y_session_id;

//        $slots = Day::with(['day_wise_slot','day_wise_slot.time_slot','day_wise_slot.routine','day_wise_slot.routine.course','day_wise_slot.routine.room'])->get();

        $slots = Day::with(['routine' => function ($query) use ($teacher_id,$y_session_id) {
            $query->select('id','teacher_id','batch_id','section_id','room_id','day_id','time_slot_id','course_id','yearly_session_id','room_id')->where('teacher_id', $teacher_id)->where('yearly_session_id',$y_session_id);
        },'routine.course' => function ($query) {
            $query->select('id','course_name','course_code','course_type');
        },'routine.teacher' => function ($query) use ($teacher_id) {
            $query->select('id','user_id')->where('is_active','yes')->where('id', $teacher_id);
        },'routine.room' => function ($query) {
            $query->select('id','room_type','building','room_no')->where('is_active','yes');
        },'routine.batch' => function ($query) {
            $query->select('id','batch_no','department_id','shift_id')->where('is_active','yes');
        },'routine.batch.department' => function ($query) {
            $query->select('id','department_name')->where('is_active','yes');
        },'routine.batch.shift' => function ($query) {
            $query->select('id','slug')->where('is_active','yes');
        }
        ])->get();



        $y_session = YearlySession::with('session')->where('id', $y_session_id)->first();


        $day_wise_slots = DayWiseSlot::with('day','time_slot')->get();



        $teacher_detail = Teacher::with(['user','rank'])->where('is_active','yes')->where('id', $teacher_id)->first();


        $data = compact('slots','y_session_id','teacher_detail','day_wise_slots','y_session');
//        return view('routine_print', $data);
//        $section = $batch->section_name != '' ? "_".$batch->section_name : '';

        $pdf_name = $teacher_detail->user->firstname."_".$teacher_detail->user->lastname."_".$y_session->session->session_name."_".$y_session->year;
//        return view('admin.routine.teacher_wise_print',$data);

        $pdf = PDF::loadView('admin.routine.teacher_wise_print',$data);

        return $pdf->download('routine_'.$pdf_name.".pdf");
    }


    public function create(Request $request)
    {
        $day_wise_slot = DayWiseSlot::where('day_id', $request->day_id)->where('time_slot_id', $request->time_slot_id)->pluck('class_slot')->first();
        $course = Course::where('id', $request->course_id)->select('course_type')->first();
        $exist_class_slots = FullRoutine::where('day_id', $request->day_id)->where('time_slot_id', $request->time_slot_id)->count();
//        $day_id = $day_wise_slot->day_id;

        if ($request->routine_id != ''){
            // Checking existing data
            $exists = FullRoutine::where([
                ['batch_id', $request->batch_id],
                ['routine.id','!=', $request->routine_id],
                ['section_id', $request->section_id],
                ['day_id', $request->day_id],
                ['time_slot_id', $request->time_slot_id],
                ['teacher_id', $request->teacher_id],
                ['course_id', $request->course_id],
                ['room_id', $request->room_id],
                ['yearly_session_id', $request->yearly_session_id],
            ])->count();


            // Checking if room wise time slot data exists
            $exist_room_time_slot = FullRoutine::where([
                ['routine.room_id', $request->room_id],
                ['routine.id','!=', $request->routine_id],
                ['routine.day_id', $request->day_id],
                ['routine.time_slot_id', $request->time_slot_id],
                ['routine.yearly_session_id', $request->yearly_session_id]
            ])->count();

            // Checking if teacher wise time slot data exists
            $exist_teacher_time_slot = FullRoutine::where([
                ['routine.day_id', $request->day_id],
                ['routine.time_slot_id', $request->time_slot_id],
                ['routine.id','!=', $request->routine_id],
                ['routine.teacher_id', $request->teacher_id],
                ['routine.yearly_session_id', $request->yearly_session_id]
            ])->count();


            // Checking theory class teacher wise
            $theory_count = FullRoutine::leftJoin('courses', 'courses.id', '=', 'routine.course_id')
                ->where([
                    ['routine.teacher_id', $request->teacher_id],
                    ['routine.id','!=', $request->routine_id],
                    ['routine.yearly_session_id', $request->yearly_session_id],
                    ['routine.day_id', $request->day_id],
                    ['courses.course_type', '0'],
                ])->count();


            // Checking theory class teacher & batch wise
            $batch_theory_count = FullRoutine::leftJoin('courses', 'courses.id', '=', 'routine.course_id')
                ->where([
                    ['routine.batch_id', $request->batch_id],
                    ['routine.id','!=', $request->routine_id],
                    ['routine.section_id', $request->section_id],
                    ['routine.teacher_id', $request->teacher_id],
                    ['routine.yearly_session_id', $request->yearly_session_id],
                    ['routine.day_id', $request->day_id],
                    ['courses.course_type', '0'],
                ])->count();
        }else{
            // Checking existing data
            $exists = FullRoutine::where([
                ['batch_id', $request->batch_id],
                ['section_id', $request->section_id],
                ['day_id', $request->day_id],
                ['time_slot_id', $request->time_slot_id],
                ['teacher_id', $request->teacher_id],
                ['course_id', $request->course_id],
                ['room_id', $request->room_id],
                ['yearly_session_id', $request->yearly_session_id],
            ])->count();

            $exist_room_time_slot = FullRoutine::where([
                ['routine.room_id', $request->room_id],
                ['day_id', $request->day_id],
                ['time_slot_id', $request->time_slot_id],
                ['routine.yearly_session_id', $request->yearly_session_id]
            ])->count();

            // Checking if teacher wise time slot data exists
            $exist_teacher_time_slot = FullRoutine::where([
                ['day_id', $request->day_id],
                ['time_slot_id', $request->time_slot_id],
                ['routine.teacher_id', $request->teacher_id],
                ['routine.yearly_session_id', $request->yearly_session_id]
            ])->count();


            // Checking theory class teacher wise
            $theory_count = FullRoutine::leftJoin('courses', 'courses.id', '=', 'routine.course_id')
                ->where([
                    ['routine.teacher_id', $request->teacher_id],
                    ['routine.yearly_session_id', $request->yearly_session_id],
                    ['routine.day_id', $request->day_id],
                    ['courses.course_type', '0'],
                ])->count();


            // Checking theory class teacher & batch wise
            $batch_theory_count = FullRoutine::leftJoin('courses', 'courses.id', '=', 'routine.course_id')
                ->where([
                    ['routine.batch_id', $request->batch_id],
                    ['routine.section_id', $request->section_id],
                    ['routine.teacher_id', $request->teacher_id],
                    ['routine.yearly_session_id', $request->yearly_session_id],
                    ['routine.day_id',  $request->day_id],
                    ['courses.course_type', '0'],
                ])->count();
        }

        // Checking if assigned day is teacher's off day
        $teacher_offday = TeachersOffday::where([
            ['teacher_id', $request->teacher_id],
            ['day_id', $request->day_id],
        ])->count();


        $routine = new FullRoutine;
        $routine->batch_id = $request->batch_id;
        $routine->section_id = $request->section_id;
        $routine->time_slot_id = $request->time_slot_id;
        $routine->day_id = $request->day_id;
        $routine->teacher_id = $request->teacher_id;
        $routine->course_id = $request->course_id;
        $routine->room_id = $request->room_id;
        $routine->created_by = Auth::user()->id;
        $routine->yearly_session_id = $request->yearly_session_id;

        //If data exists
        if ($exists == 0){
            //If data room wise time slot data exists
            if ($exist_room_time_slot > 0){
                $message = ['type' => 'error','text' => 'Can not assign class on same room at same time slot'];
                return json_encode($message);
            }
            //If batch wise theory class more than 2
            if($batch_theory_count == 1 && $course->course_type == "0") {
                $message = ['type' => 'error','text' => 'Can not take 2 consecutive theory classes of same batch'];
                return json_encode($message);
            }
            //If theory class more than 3
            if($theory_count == 2 && $course->course_type == "0") {
                $message = ['type' => 'error','text' => 'Can not take 3 consecutive theory classes'];
                return json_encode($message);
            }
            //If teachers offday
            if ($teacher_offday > 0){
                $message = ['type' => 'error','text' => 'Cannot assign class on offday'];
                return json_encode($message);
            }
            //If data exists on same teacher and same time slot
            if ($exist_teacher_time_slot == 0){

//                If total class exceeds from given class slot

                    if ($request->routine_id == ''){
                        if ($day_wise_slot == $exist_class_slots) {
                            $message = ['type' => 'error','text' => 'Class slot limit exceeded!'];
                            return json_encode($message);
                        }

                        if ($routine->save()){

                            $message = ['type' => 'success','text' => 'Data Successfully Inserted'];
                        }else{

                            $message = ['type' => 'error','text' => 'Data already exists for current data!'];

                        }
                    }else{
                        FullRoutine::where('id', '=', $request->routine_id)
                            ->update(array(
                                'batch_id' => $request->batch_id,
                                'section_id' => $request->section_id,
                                'day_id' => $request->day_id,
                                'time_slot_id' => $request->time_slot_id,
                                'teacher_id' => $request->teacher_id,
                                'course_id' => $request->course_id,
                                'edited_by' => Auth::user()->id,
                                'room_id' => $request->room_id,
                                'yearly_session_id' => $request->yearly_session_id,
                            ));
                        $message = ['type' => 'success','text' => 'Data Successfully Updated'];
                    }

            }else{

                $message = ['type' => 'error','text' => 'This Time slot already assigned for this teacher'];
            }
        }
        else{

            $message = ['type' => 'error','text' => 'Data already exists!!!'];
        }

        return json_encode($message);
    }


    public function  class_slot_update(Request $request){
        $id = $request->id;
        $total_slot = $request->total_slot;
        if (Auth::user()->role == 'admin'){
            DayWiseSlot::where("id", $id)->update(["class_slot" => $total_slot]);
        }

    }

    public function reset(Request $request){
        $yearly_session_id = $request->yearly_session_id;
        FullRoutine::where("yearly_session_id", $yearly_session_id)->delete();
    }
}



