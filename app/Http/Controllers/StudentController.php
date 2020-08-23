<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Session;

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




//        $batches=Batch::with(array('shift'=>function($query){
//            $query->select('id','shift_name');
//        }))->with(array('department'=>function($query){
//            $query->select('id','department_name');
//        }))->get();





//        dd($batches);

        return view('admin.student.create',compact('batches'));
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
}
