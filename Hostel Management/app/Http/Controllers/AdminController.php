<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Auth;
use App\User;
use App\Institute;
use App\Hostel;
use App\Department;
use App\Student;

class AdminController extends Controller
{


    public function home()
    {
        $user = Auth::user();
        $hostels = Hostel::join('institutes','institutes.id','hostels.institute_id')->where('hostels.user_id',$user->id)->select('hostels.*','institutes.name','institutes.address','institutes.type','institutes.user_id','institutes.code')->get();
        //return $hostels;
        //$students = 
        //return $hostels;
        return view('admin.home',['hostels'=>$hostels]);
    }

    public function editMyHostel(Request $request){
        $hostel = Hostel::where('hostels.id',$request->id)->join('institutes','institutes.id','hostels.institute_id')->select('hostels.*','institutes.name','institutes.address','institutes.type','institutes.user_id','institutes.code')->first();
        //return $hostel;
        //return $hostel;
        return view('admin.edithostel',['hostel'=>$hostel]);
    }

    public function saveHostel(Request $request){
        //return $request;
        $hostel = Hostel::find($request->id);
        $hostel->building_name = $request->building_name;
        $hostel->address = $request->address;
        $hostel->room_count = $request->room_count;
        $hostel->students_capacity = $request->capacity;
        if($hostel->save())
            return redirect('/admin');
        else 
            return 'something went wrong';
    }

    public function getAddStudents(Request $request){
        $hostel_id = $request->id;
        $hostel = Hostel::find($hostel_id)->first();
        //$departments = Department::all();
        $departments = Institute::find($hostel->institute_id)->departments;
        return view('admin.addstudents',['hostel'=>$hostel,'departments'=>$departments]);
    }

    public function savestudent(Request $request){
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = (new FastExcel)->import($path, function ($line) {
                $department = Department::where('short_code',$line['department'])->first()->pluck('id');
    return Student::create([
        'roll_no' => $line['roll_no'],
        'name' => $line['name'],
        'father_name' => $line['father_name'],
        'department_id' => $department[0],
        'year' => $line['year'],
        'mobile' => $line['mobile'],
        'gender' => $line['gender']
    ]);
});
            if($data){
                return 'inserted';
            }
            else{
                return 'error';
            }
   
        }
        dd('Request data does not have any files to import.'); 
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
