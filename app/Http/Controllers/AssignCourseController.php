<?php

namespace App\Http\Controllers;

use App\Models\AssignCourse;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\YearlySession;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AssignCourseController extends MasterController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assign_courses = AssignCourse::with(['teacher','session','course','teacher.user','teacher.rank','session.session','batch','batch.shift','batch.department'])->get();
//        dd($courses);
//        $course = AssignCourse::all();
//        dd($assign_courses);
        return view('admin.assign_course.index',compact('assign_courses'))->with('i',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batches = Batch::with(['shift','department'])->get();
        $teachers = Teacher::with(['user'])->get();
        $courses = Course::where('is_active','yes')->get();
        $sessions = YearlySession::with('session')->where('is_active','yes')->get();

        return view('admin.assign_course.create',compact('batches','teachers','courses','sessions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existData = AssignCourse::where([
            ['teacher_id',$request->teacher_id],
            ['session_id',$request->session_id],
            ['course_id',$request->course_id]
        ])->first();


        $this->validate($request, [
            'session_id' => 'required',
            'teacher_id' => 'required',
            'course_id' => 'required',
            'batch_id' => 'required'
        ],
            [
                'session_id.unique' => 'Session already assigned',
                'teacher_id.unique' => 'Teacher already assigned',
                'course_id.unique' => 'Course already assigned',
                'batch_id.unique' => 'Batch already assigned',
            ]);

        $assign_course = new AssignCourse();
        $assign_course->session_id = $request->session_id;
        $assign_course->teacher_id = $request->teacher_id;
        $assign_course->course_id = $request->course_id;
        $assign_course->batch_id = $request->batch_id;
        $assign_course->save();

        if ($existData){
            Session::flash('error', 'Data already assigned');
            return redirect()->route('assign_courses.create');
        }else{
            $assign_course->save();
            Session::flash('message', 'Data assigned successfully');
            return redirect()->route('assign_courses.index');
        }

////        dd($request->all());
//        $count = AssignCourse::where('teacher_id',$request->teacher_id)->where('session_id',$request->session_id)->get()->count();
////        dd($count);
//        if ($count == 0){
//            foreach ($request->course_id as $key => $course) {
//                $data[] = [
//                    'teacher_id' => $request->teacher_id,
//                    'session_id' => $request->session_id,
//                    'batch_id' => $request->batch_id,
//                    'course_id' => $course,
//                    'created_at' => now(),
//                    'updated_at' => now()
//                ];
//            }
////            AssignCourse::where('teacher_id',$request->teacher_id)->delete();
//            AssignCourse::insert($data);
//            return redirect()->route('assign_courses.index');
//        }
//        else{
//            Session::flash('message', 'Already assigned for this teacher');
//            return redirect()->route('assign_courses.create');
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignCourse $assign_course)
    {
        $batches = Batch::with(['shift','department'])->get();
        $teachers = Teacher::with(['user'])->get();
        $courses = Course::where('is_active','yes')->get();
        $sessions = YearlySession::with('session')->where('is_active','yes')->get();
        return view('admin.assign_course.edit', compact('batches','teachers','courses','sessions','assign_course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignCourse $assign_course)
    {
        $existData = AssignCourse::where([
            ['id','!=',$assign_course->id],
            ['teacher_id',$request->teacher_id],
            ['session_id',$request->session_id],
            ['course_id',$request->course_id]
        ])->first();

        $this->validate($request, [
            'session_id' => 'required',
            'teacher_id' => 'required',
            'course_id' => 'required',
            'batch_id' => 'required'
        ],
            [
                'session_id.unique' => 'Session already assigned',
                'teacher_id.unique' => 'Teacher already assigned',
                'course_id.unique' => 'Course already assigned',
                'batch_id.unique' => 'Batch already assigned',
            ]);

        $assign_course->session_id = $request->session_id;
        $assign_course->teacher_id = $request->teacher_id;
        $assign_course->course_id = $request->course_id;
        $assign_course->batch_id = $request->batch_id;


        if ($existData){
            Session::flash('error', 'Data already assigned');
            return redirect()->route('assign_courses.edit', $assign_course->id);
        }else{
            $assign_course->save();
            Session::flash('message', 'Data assigned successfully');
            return redirect()->route('assign_courses.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignCourse $assignCourse)
    {
        $assignCourse->delete();
        Session::flash('delete-message', 'Data deleted successfully');
        return redirect()->route('assign_courses.index');
    }
}
