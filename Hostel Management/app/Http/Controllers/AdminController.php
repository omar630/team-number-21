<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Institute;
use App\Hostel;
use App\Department;

class AdminController extends Controller
{


    public function home()
    {
        $user = Auth::user();
        $hostels = Hostel::join('institutes','institutes.id','hostels.institute_id')->where('hostels.user_id',$user->id)->select('hostels.*','institutes.name','institutes.address','institutes.type','institutes.user_id')->get();
        //return $hostels;
        //$students = 
        //return $hostels;
        return view('admin.home',['hostels'=>$hostels]);
    }

    public function editMyHostel(Request $request){
        $hostel = Hostel::find($request->id)->join('institutes','institutes.id','hostels.institute_id')->first();
        //return $hostel;
        return view('admin.edithostel',['hostel'=>$hostel]);
    }

    public function saveHostel(Request $request){
        //return $request;
        $hostel = Hostel::find($request->hostel_id)->first();
        $hostel->building_name = $request->building_name;
        $hostel->address = $request->address;
        $hostel->room_count = $request->room_count;
        $hostel->students_capacity = $request->capacity;
        $hostel->save();
        return redirect('/admin');
    }

    public function getAddStudents(Request $request){
        $hostel_id = $request->id;
        $hostel = Hostel::find($hostel_id)->first();
        //$departments = Department::all();
        $departments = Institute::find($hostel->institute_id)->departments;
        return view('admin.addstudents',['hostel'=>$hostel,'departments'=>$departments]);
    }

    public function savestudent(Request $request){
        return $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
