<?php

namespace App\Http\Controllers;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::orderBy('id', 'DESC')->get();
        return view('admin.section.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'section_name' => 'required|max:1|unique:sections'
        ],
            [
                'section_name.required' => 'Enter Section',
                'section_name.unique' => 'Section already exist',
            ]);

        $section = new Section();
        $section->section_name = $request->section_name;
        $section->slug = strtolower($request->section_name);
        $section->is_active = 1;
        $section->save();

        Session::flash('message', 'Section created successfully');
        return redirect()->route('sections.index');
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
    public function edit(Section $section)
    {
        return view('admin.section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $this->validate($request, [
            'section_name' => 'required|max:1|unique:sections,section_name,' . $section->id
        ],
            [
                'section_name.required' => 'Enter Section',
                'section_name.unique' => 'Section already exist',
            ]);

        $section->section_name = $request->section_name;
        $section->slug = strtolower($request->section_name);
        $section->is_active = $request->is_active;
        $section->save();

        Session::flash('message', 'Section Updated successfully');
        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
        Session::flash('delete-message', 'Section deleted successfully');
        return redirect()->route('sections.index');
    }
}
