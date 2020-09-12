<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
use App\Models\SectionStudent;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with(['batch','batch.shift','batch.department'])->orderBy('id', 'DESC')->get();
        return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batches = Batch::with(['shift','department'])->get();

        $sections = Section::where('is_active','yes')->get();

        return view('admin.student.create',compact('batches','sections'));
//        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        die(json_encode($request->all()));
        $this->validate($request, [
            'number_of_student' => 'required',
            'batch_id' => 'required|unique:students'
        ],
            [
                'batch_id.unique' => 'Data already exists for this batch',
                'batch_id.required' => 'Enter Batch',
                'number_of_student.required' => 'Enter Number of Student',
            ]);



        $student = new Student();
        $student->number_of_student = $request->number_of_student;
        $student->batch_id = $request->batch_id;
        $student->save();

        Session::flash('message', 'Student assigned successfully');
        return redirect()->route('students.index');
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
    public function edit(Student $student)
    {
        $batches = Batch::with(['shift','department'])->get();
        return view('admin.student.edit', compact('batches','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

        $this->validate($request, [
            'number_of_student' => 'required',
            'batch_id' => 'required|unique:students,batch_id,' . $student->id
        ],
            [
                'number_of_student.required' => 'Enter Section',
                'batch_id.unique' => 'Data already exist for this batch',
            ]);

        $student->number_of_student = $request->number_of_student;
        $student->batch_id = $request->batch_id;
        $student->save();

        Session::flash('message', 'Student Number updated successfully');
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        Session::flash('delete-message', 'Number of student deleted successfully');
        return redirect()->route('students.index');
    }


    public function theory_section($id){
        $sections = Section::where('type','theory')->get();
        $students = Student::with(['batch','batch.shift','batch.department'])->orderBy('id', 'DESC')->where('students.id', $id)->get();
        $student = $students[0];
        return view('admin.student.theory_section',compact('sections','student'));
    }

    public function theory_section_store(Request $request){

        $total_student = 0;

        foreach ($request->student_section as $student_section){
            $total_student += $student_section['student'];
        }

        if ($total_student == intval($request->total_students)) {
            foreach($request->student_section as $key => $student_section){
                    $data[] = [
                        'students_id' => $request->students_id,
                        'section_id' => $student_section['section'],
                        'students' => $student_section['student'],
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                }
            SectionStudent::insert($data);
            Session::flash('message', 'Section Assigned');
            return redirect()->route('theory_section',$request->students_id);
        }else{
            Session::flash('error', 'Total Student number not matched');
            return redirect()->route('theory_section',$request->students_id);
        }

    }

    public function lab_section($id){
        $sections = Section::where('type','lab')->get();
        $students = Student::with(['batch','batch.shift','batch.department'])->orderBy('id', 'DESC')->where('students.id', $id)->get();
        $student = $students[0];
        return view('admin.student.lab_section',compact('sections','student'));
    }

    public function lab_section_store(Request $request){

        $total_student = 0;

        foreach ($request->student_section as $student_section){
            $total_student += $student_section['student'];
        }

        if ($total_student == intval($request->total_students)) {
            foreach($request->student_section as $key => $student_section){
                $data[] = [
                    'students_id' => $request->students_id,
                    'section_id' => $student_section['section'],
                    'students' => $student_section['student'],
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            SectionStudent::insert($data);
            Session::flash('message', 'Section Assigned');
//            return redirect()->route('theory_section',$request->students_id);
            return redirect()->route('admin.student.index');
        }else{
            Session::flash('error', 'Total Student number not matched');
            return redirect()->route('theory_section',$request->students_id);
        }

    }

}
