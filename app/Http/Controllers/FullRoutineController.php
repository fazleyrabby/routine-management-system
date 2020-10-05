<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Section;
use App\Models\SectionStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\TimeSlot;

class FullRoutineController extends Controller
{
    public function index()
    {
        $days = Day::all();
        $timeslots = TimeSlot::all();
//        $sections = SectionStudent::with(['student','batch','batch.shift','batch.department','section_student','yearly_session','yearly_session.shift_session','yearly_session.shift_session.session','section_student.section'])->get();

        $sections = Student::select('*','sections.id as section_id','batch.id as batch_id')
//            ->leftJoin('sessions', 'sessions.id', '=', 'shift_sessions.session_id')
//            ->leftJoin('shift_sessions', 'shift_sessions.id', '=', 'shift_sessions.session_id')
            ->leftJoin('section_students', 'section_students.student_id', '=', 'students.id')
            ->leftJoin('sections', 'sections.id', '=', 'section_students.section_id')
            ->leftJoin('batch', 'students.batch_id', '=', 'batch.id')
            ->leftJoin('shifts', 'shifts.id', '=', 'batch.shift_id')
            ->leftJoin('departments', 'departments.id', '=', 'batch.department_id')
            ->get();

//        dd($sections);
        return view('admin.full_routine.index', compact('days','timeslots','sections'));
    }
}
