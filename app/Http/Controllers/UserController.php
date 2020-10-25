<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;

class UserController extends MasterController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'))->with('i',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'room_no' => 'required|unique:rooms',
            'building' => 'required',
            'capacity' => 'required',
        ],
            [
                'room_no.required' => 'Enter Room No',
                'capacity.required' => 'Enter Capacity',
                'room_no.unique' => 'Room no already exist',
                'building.required' => 'Enter Building Name'
            ]);

        $room = new Room();
        $room->building = $request->building;
        $room->room_no = $request->room_no;
        $room->capacity = $request->capacity;
        $room->room_type = $request->room_type;
        $room->save();

        Session::flash('message', 'Room created successfully');
        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $is_teacher = User::where('id',$id)->pluck('is_teacher')->first();
        if($is_teacher == 'yes'){
            $user = Teacher::with(['department','rank','user','teachers_offday.day'])->where('user_id',$id)->first();
        }else{
            $user = User::where('id',$id)->first();
        }

        return view('admin.user.show', compact('user','id','is_teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'room_no' => 'required|unique:rooms,room_no,' . $room->id,
            'capacity' => 'required',
            'building' => 'required',
        ],
            [
                'room_no.required' => 'Enter Room No',
                'room_no.unique' => 'Room no already exist',
                'capacity.required' => 'Enter Capacity',
                'building.required' => 'Enter Building Name'
            ]);

        $room->building = $request->building;
        $room->room_no = $request->room_no;
        $room->room_type = $request->room_type;
        $room->capacity = $request->capacity;
        $room->is_active = $request->is_active;
        $room->save();

        Session::flash('message', 'Room updated successfully');
        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
//        $user->delete();
        $user->is_active = $request->is_active;

        Session::flash('delete-message', 'Room deleted successfully');
        return redirect()->route('rooms.index');
    }
}
