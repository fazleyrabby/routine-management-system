<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\Session;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $time_slots = TimeSlot::all();
        return view('admin.time_slot.index',compact('time_slots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.time_slot.create');
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
            'from' => 'required',
            'to' => 'required'
        ],
            [
                'from.required' => 'Enter from time',
                'to.required' => 'Enter to time',
            ]);
        $time_slot = new TimeSlot();
        $time_slot->from = $request->from;
        $time_slot->to = $request->to;

        $time_slot->save();


        Session::flash('message', 'Time Slot added successfully');
        return redirect()->route('time_slots.index');
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
    public function edit(TimeSlot $time_slot)
    {
        return view('admin.time_slot.edit', compact('time_slot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimeSlot $time_slot,Request $request)
    {
        $this->validate($request, [
            'from' => 'required|unique:time_slots,from,' . $time_slot->id,
            'to' => 'required|unique:time_slots,to,' . $time_slot->id
        ],
            [
                'from.required' => 'Enter from time',
                'to.required' => 'Enter to time',
                'from.unique' => 'Already exists',
                'to.unique' => 'Already exists',
            ]);


        $time_slot->from = $request->from;
        $time_slot->to = $request->to;

        $time_slot->save();


        Session::flash('message', 'Time Slot updated successfully');
        return redirect()->route('time_slots.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeSlot $time_slot)
    {
        $time_slot->delete();
        Session::flash('delete-message', 'Time slot deleted successfully');
        return redirect()->route('time_slots.index');
    }
}